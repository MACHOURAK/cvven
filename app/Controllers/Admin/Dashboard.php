<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\VillageModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $reservationModel = new ReservationModel();
        $villageModel     = new VillageModel();

        $reservations = $reservationModel
            ->orderBy('id', 'DESC')
            ->findAll();

        $villages = $villageModel->findAll();

        return view('admin/dashboard', [
            'reservations' => $reservations,
            'villages'     => $villages,
        ]);
    }
}