<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VillageModel;

class Villages extends BaseController
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

        $model = new VillageModel();

        return view('admin/villages/index', [
            'villages' => $model->findAll()
        ]);
    }

    public function ajouter()
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        return view('admin/villages/ajouter');
    }

    public function enregistrer()
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $model = new VillageModel();

        $nom = trim($this->request->getPost('nom'));

        if ($nom === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Le nom du village est obligatoire.');
        }

        $model->insert([
            'nom'         => $nom,
            'departement' => trim($this->request->getPost('departement')),
            'image'       => trim($this->request->getPost('image')),
            'slug'        => trim($this->request->getPost('slug')),
            'description' => trim($this->request->getPost('description'))
        ]);

        return redirect()->to('/admin/villages')
            ->with('success', 'Village ajouté avec succès.');
    }

    public function modifier($id)
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $model = new VillageModel();
        $village = $model->find($id);

        if (!$village) {
            return redirect()->to('/admin/villages')
                ->with('error', 'Village introuvable.');
        }

        return view('admin/villages/modifier', [
            'village' => $village
        ]);
    }

    public function enregistrerModification($id)
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $model = new VillageModel();
        $village = $model->find($id);

        if (!$village) {
            return redirect()->to('/admin/villages')
                ->with('error', 'Village introuvable.');
        }

        $nom = trim($this->request->getPost('nom'));

        if ($nom === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Le nom du village est obligatoire.');
        }

        $model->update($id, [
            'nom'         => $nom,
            'departement' => trim($this->request->getPost('departement')),
            'image'       => trim($this->request->getPost('image')),
            'slug'        => trim($this->request->getPost('slug')),
            'description' => trim($this->request->getPost('description'))
        ]);

        return redirect()->to('/admin/villages')
            ->with('success', 'Village modifié avec succès.');
    }

    public function supprimer($id)
    {
        if ($redirect = $this->verifierAdmin()) {
            return $redirect;
        }

        $model = new VillageModel();
        $village = $model->find($id);

        if (!$village) {
            return redirect()->to('/admin/villages')
                ->with('error', 'Village introuvable.');
        }

        $model->delete($id);

        return redirect()->to('/admin/villages')
            ->with('success', 'Village supprimé avec succès.');
    }
}
