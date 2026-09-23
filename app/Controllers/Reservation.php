```php
<?php

namespace App\Controllers;

use App\Models\VillageModel;
use App\Models\ChambreModel;
use App\Models\ReservationModel;

class Reservation extends BaseController
{
    public function index()
    {
        // Récupérer les informations envoyées dans l'URL
        $villageId = $this->request->getGet('village_id');
        $chambreId = $this->request->getGet('chambre_id');

        $dateArrivee = $this->request->getGet('date_arrivee');
        $dateDepart = $this->request->getGet('date_depart');
        $nombreChambres = $this->request->getGet('nombre_chambres');

        // Vérifier les identifiants
        if (!$villageId || !$chambreId) {
            return "Erreur : veuillez sélectionner une chambre depuis la page du village.";
        }

        // Modèles
        $villageModel = new VillageModel();
        $chambreModel = new ChambreModel();

        // Récupérer le village
        $village = $villageModel->find($villageId);

        // Récupérer la chambre
        $chambre = $chambreModel->find($chambreId);

        // Vérifier les données
        if (!$village || !$chambre) {
            return "Erreur : village ou chambre introuvable.";
        }

        // Vérifier le prix
        if (!isset($chambre['prix'])) {
            return "Erreur : le prix de la chambre est introuvable.";
        }

        // Vérifier le stock
        if (!isset($chambre['nombre_disponible'])) {
            return "Erreur : le nombre de chambres disponibles est introuvable.";
        }

        $prix = $chambre['prix'];
        $nombreDisponible = $chambre['nombre_disponible'];

        $nombreNuits = null;
        $prixTotal = null;
        $erreur = null;

        // Vérifier les dates
        if ($dateArrivee && $dateDepart) {

            $arrivee = new \DateTime($dateArrivee);
            $depart = new \DateTime($dateDepart);

            if ($depart <= $arrivee) {

                $erreur = "La date de départ doit être après la date d'arrivée.";

            } else {

                $nombreNuits = $arrivee->diff($depart)->days;
            }
        }

        // Vérifier le nombre de chambres
        if ($nombreChambres !== null && $nombreChambres < 1) {

            $erreur = "Le nombre de chambres doit être au minimum de 1.";
        }

        // Vérifier les disponibilités
        if (
            $nombreChambres !== null &&
            $nombreChambres >= 1 &&
            $nombreChambres > $nombreDisponible
        ) {

            $erreur = "Il ne reste que "
                . $nombreDisponible
                . " chambre(s) disponible(s).";
        }

        // Calcul du prix
        if (
            $prix &&
            $nombreNuits &&
            $nombreChambres &&
            $nombreChambres >= 1 &&
            $nombreChambres <= $nombreDisponible
        ) {

            $prixTotal =
                $prix
                * $nombreNuits
                * $nombreChambres;
        }

        // Afficher la page
        return view('reservation', [
            'village' => $village,
            'chambre' => $chambre,
            'prix' => $prix,
            'nombreDisponible' => $nombreDisponible,
            'villageId' => $villageId,
            'chambreId' => $chambreId,
            'dateArrivee' => $dateArrivee,
            'dateDepart' => $dateDepart,
            'nombreNuits' => $nombreNuits,
            'nombreChambres' => $nombreChambres,
            'prixTotal' => $prixTotal,
            'erreur' => $erreur
        ]);
    }


    public function confirm()
    {
        // Récupérer les données du formulaire
        $villageId = $this->request->getPost('village_id');
        $chambreId = $this->request->getPost('chambre_id');

        $dateArrivee = $this->request->getPost('date_arrivee');
        $dateDepart = $this->request->getPost('date_depart');
        $nombreChambres = (int) $this->request->getPost('nombre_chambres');

        // Récupérer le nom et le prénom du client
        $nomClient = $this->request->getPost('nom_client');
        $prenomClient = $this->request->getPost('prenom_client');

        // Vérifier le nom et le prénom
        if (!$nomClient || !$prenomClient) {
            return "Erreur : veuillez renseigner le nom et le prénom du client.";
        }

        // Vérifier les identifiants
        if (!$villageId || !$chambreId) {
            return "Erreur : village ou chambre introuvable.";
        }

        // Vérifier le nombre de chambres
        if ($nombreChambres < 1) {
            return "Erreur : le nombre de chambres doit être au minimum de 1.";
        }

        // Vérifier les dates
        if (!$dateArrivee || !$dateDepart) {
            return "Erreur : veuillez renseigner les dates d'arrivée et de départ.";
        }

        $arrivee = new \DateTime($dateArrivee);
        $depart = new \DateTime($dateDepart);

        if ($depart <= $arrivee) {
            return "Erreur : la date de départ doit être après la date d'arrivée.";
        }

        // Modèles
        $villageModel = new VillageModel();
        $chambreModel = new ChambreModel();
        $reservationModel = new ReservationModel();

        // Récupérer le village
        $village = $villageModel->find($villageId);

        // Récupérer la chambre
        $chambre = $chambreModel->find($chambreId);

        // Vérifier les données
        if (!$village || !$chambre) {
            return "Erreur : village ou chambre introuvable.";
        }

        if (!isset($chambre['prix'])) {
            return "Erreur : le prix de la chambre est introuvable.";
        }

        if (!isset($chambre['nombre_disponible'])) {
            return "Erreur : le nombre de chambres disponibles est introuvable.";
        }

        // Vérifier le stock
        if ($nombreChambres > $chambre['nombre_disponible']) {

            return "Erreur : il ne reste que "
                . $chambre['nombre_disponible']
                . " chambre(s) disponible(s).";
        }

        // Nombre de nuits
        $nombreNuits = $arrivee->diff($depart)->days;

        // Prix total
        $prixTotal =
            $chambre['prix']
            * $nombreNuits
            * $nombreChambres;

        // Démarrer une transaction
        $db = \Config\Database::connect();

        $db->transStart();

        // Enregistrer la réservation
        $reservationModel->insert([
            'village_id' => $villageId,
            'chambre_id' => $chambreId,
            'date_arrivee' => $dateArrivee,
            'date_depart' => $dateDepart,
            'nombre_chambres' => $nombreChambres,
            'prix_total' => $prixTotal,
            'statut' => 'Confirmée',
            'nom_client' => $nomClient,
            'prenom_client' => $prenomClient
        ]);

        // Retirer les chambres réservées
        $nouveauStock =
            $chambre['nombre_disponible']
            - $nombreChambres;

        $chambreModel->update($chambreId, [
            'nombre_disponible' => $nouveauStock
        ]);

        // Fin de la transaction
        $db->transComplete();

        // Vérifier la transaction
        if ($db->transStatus() === false) {
            return "Erreur : impossible d'enregistrer la réservation.";
        }

        // Afficher la confirmation
        return view('confirmation', [
            'village' => $village,
            'chambre' => $chambre,
            'dateArrivee' => $dateArrivee,
            'dateDepart' => $dateDepart,
            'nombreNuits' => $nombreNuits,
            'nombreChambres' => $nombreChambres,
            'prixTotal' => $prixTotal,
            'nomClient' => $nomClient,
            'prenomClient' => $prenomClient
        ]);
    }


    public function liste()
    {
        $db = \Config\Database::connect();

        $reservations = $db->table('reservations')
            ->select(
                'reservations.*,
                villages.nom AS village_nom,
                chambres.nom AS chambre_nom'
            )
            ->join(
                'villages',
                'villages.id = reservations.village_id'
            )
            ->join(
                'chambres',
                'chambres.id = reservations.chambre_id'
            )
            ->orderBy('reservations.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('reservations', [
            'reservations' => $reservations
        ]);
    }


    public function supprimer($id)
    {
        $reservationModel = new ReservationModel();
        $chambreModel = new ChambreModel();

        // Récupérer la réservation
        $reservation = $reservationModel->find($id);

        if (!$reservation) {
            return "Erreur : réservation introuvable.";
        }

        // Si elle est déjà annulée
        if (isset($reservation['statut']) && $reservation['statut'] == 'Annulée') {
            return redirect()->to('/reservations');
        }

        // Récupérer la chambre
        $chambre = $chambreModel->find(
            $reservation['chambre_id']
        );

        if (!$chambre) {
            return "Erreur : chambre introuvable.";
        }

        // Rendre les chambres disponibles
        $nouveauStock =
            $chambre['nombre_disponible']
            + $reservation['nombre_chambres'];

        // Transaction
        $db = \Config\Database::connect();

        $db->transStart();

        // Remettre les chambres disponibles
        $chambreModel->update(
            $reservation['chambre_id'],
            [
                'nombre_disponible' => $nouveauStock
            ]
        );

        // Modifier le statut
        $reservationModel->update(
            $id,
            [
                'statut' => 'Annulée'
            ]
        );

        $db->transComplete();

        if ($db->transStatus() === false) {
            return "Erreur : impossible d'annuler la réservation.";
        }

        return redirect()->to('/reservations');
    }


    public function modifier($id)
    {
        $reservationModel = new ReservationModel();

        $reservation = $reservationModel->find($id);

        if (!$reservation) {
            return "Erreur : réservation introuvable.";
        }

        return view('modifier_reservation', [
            'reservation' => $reservation
        ]);
    }


    public function enregistrerModification($id)
    {
        $reservationModel = new ReservationModel();
        $chambreModel = new ChambreModel();

        // Récupérer la réservation
        $reservation = $reservationModel->find($id);

        if (!$reservation) {
            return "Erreur : réservation introuvable.";
        }

        // Récupérer les nouvelles données
        $nomClient = $this->request->getPost('nom_client');
        $prenomClient = $this->request->getPost('prenom_client');

        $dateArrivee = $this->request->getPost('date_arrivee');
        $dateDepart = $this->request->getPost('date_depart');
        $nombreChambres = (int) $this->request->getPost('nombre_chambres');

        // Vérifier le nom et le prénom
        if (!$nomClient || !$prenomClient) {
            return "Erreur : veuillez renseigner le nom et le prénom du client.";
        }

        // Vérifier les dates
        if (!$dateArrivee || !$dateDepart) {
            return "Erreur : veuillez renseigner les dates.";
        }

        $arrivee = new \DateTime($dateArrivee);
        $depart = new \DateTime($dateDepart);

        if ($depart <= $arrivee) {
            return "Erreur : la date de départ doit être après la date d'arrivée.";
        }

        // Vérifier le nombre de chambres
        if ($nombreChambres < 1) {
            return "Erreur : le nombre de chambres doit être au minimum de 1.";
        }

        // Récupérer la chambre
        $chambre = $chambreModel->find(
            $reservation['chambre_id']
        );

        if (!$chambre) {
            return "Erreur : chambre introuvable.";
        }

        // Ancien nombre de chambres
        $ancienNombre =
            (int) $reservation['nombre_chambres'];

        // Calcul de la différence
        $difference =
            $nombreChambres
            - $ancienNombre;

        // Si on demande plus de chambres
        if ($difference > 0) {

            if ($difference > $chambre['nombre_disponible']) {

                return "Erreur : il ne reste que "
                    . $chambre['nombre_disponible']
                    . " chambre(s) disponible(s).";
            }

            $nouveauStock =
                $chambre['nombre_disponible']
                - $difference;
        }

        // Si on rend des chambres disponibles
        elseif ($difference < 0) {

            $nouveauStock =
                $chambre['nombre_disponible']
                + abs($difference);
        }

        // Si le nombre ne change pas
        else {

            $nouveauStock =
                $chambre['nombre_disponible'];
        }

        // Calcul du nombre de nuits
        $nombreNuits =
            $arrivee->diff($depart)->days;

        // Calcul du nouveau prix
        $prixTotal =
            $chambre['prix']
            * $nombreNuits
            * $nombreChambres;

        // Transaction
        $db = \Config\Database::connect();

        $db->transStart();

        // Mettre à jour le stock
        $chambreModel->update(
            $reservation['chambre_id'],
            [
                'nombre_disponible' => $nouveauStock
            ]
        );

        // Mettre à jour la réservation
        $reservationModel->update(
            $id,
            [
                'nom_client' => $nomClient,
                'prenom_client' => $prenomClient,
                'date_arrivee' => $dateArrivee,
                'date_depart' => $dateDepart,
                'nombre_chambres' => $nombreChambres,
                'prix_total' => $prixTotal,
                'statut' => 'Confirmée'
            ]
        );

        $db->transComplete();

        if ($db->transStatus() === false) {
            return "Erreur : impossible de modifier la réservation.";
        }

        return redirect()->to('/reservations');
    }
}