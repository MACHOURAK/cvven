<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\VillageModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Vérification de la session admin
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $reservationModel = new ReservationModel();
        $villageModel     = new VillageModel();

        $data = [
            'reservations' => $reservationModel->findAll(),
            'villages'     => $villageModel->findAll(),
        ];

        return view('admin/dashboard', $data);
    }
}