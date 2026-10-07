<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ChambreModel;
use App\Models\VillageModel;

class Chambres extends BaseController
{
    private function verifierAdmin()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $chambreModel = new ChambreModel();
        $villageModel = new VillageModel();

        $chambres = $chambreModel->findAll();
        $villages = $villageModel->findAll();

        return view('admin/chambres/index', [
            'chambres' => $chambres,
            'villages' => $villages
        ]);
    }

    public function ajouter()
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $villageModel = new VillageModel();

        return view('admin/chambres/ajouter', [
            'villages' => $villageModel->findAll()
        ]);
    }

    public function enregistrer()
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $model = new ChambreModel();

        $nom = trim($this->request->getPost('nom'));

        if ($nom === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Le nom de la chambre est obligatoire.');
        }

        $model->insert([
            'village_id'       => $this->request->getPost('village_id'),
            'nom'              => $nom,
            'capacite'         => $this->request->getPost('capacite'),
            'prix'              => $this->request->getPost('prix'),
            'nombre_disponible' => $this->request->getPost('nombre_disponible')
        ]);

        return redirect()->to('/admin/chambres')
            ->with('success', 'Chambre ajoutée avec succès.');
    }

    public function modifier($id)
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $chambreModel = new ChambreModel();
        $villageModel = new VillageModel();

        $chambre = $chambreModel->find($id);

        if (!$chambre) {
            return redirect()->to('/admin/chambres')
                ->with('error', 'Chambre introuvable.');
        }

        return view('admin/chambres/modifier', [
            'chambre' => $chambre,
            'villages' => $villageModel->findAll()
        ]);
    }

    public function enregistrerModification($id)
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $model = new ChambreModel();

        $chambre = $model->find($id);

        if (!$chambre) {
            return redirect()->to('/admin/chambres')
                ->with('error', 'Chambre introuvable.');
        }

        $nom = trim($this->request->getPost('nom'));

        if ($nom === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Le nom de la chambre est obligatoire.');
        }

        $model->update($id, [
            'village_id'        => $this->request->getPost('village_id'),
            'nom'               => $nom,
            'capacite'          => $this->request->getPost('capacite'),
            'prix'               => $this->request->getPost('prix'),
            'nombre_disponible' => $this->request->getPost('nombre_disponible')
        ]);

        return redirect()->to('/admin/chambres')
            ->with('success', 'Chambre modifiée avec succès.');
    }

    public function supprimer($id)
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $model = new ChambreModel();

        $chambre = $model->find($id);

        if (!$chambre) {
            return redirect()->to('/admin/chambres')
                ->with('error', 'Chambre introuvable.');
        }

        $model->delete($id);

        return redirect()->to('/admin/chambres')
            ->with('success', 'Chambre supprimée avec succès.');
    }
}