<?php

namespace App\Controllers;

use App\Models\VillageModel;
use App\Models\ChambreModel;
use App\Models\ServiceModel;

class Villages extends BaseController
{
    public function index()
    {
        $model = new VillageModel();

        $villages = $model->findAll();

        return view('villages', [
            'villages' => $villages
        ]);
    }

    public function show($slug)
    {
        $villageModel = new VillageModel();
        $chambreModel = new ChambreModel();
        $serviceModel = new ServiceModel();

        // Récupérer le village
        $village = $villageModel
            ->where('slug', $slug)
            ->first();

        if (!$village) {
            return "Village introuvable";
        }

        // Récupérer les chambres du village
        $chambres = $chambreModel
            ->where('village_id', $village['id'])
            ->findAll();

        // Récupérer les services du village
        $services = $serviceModel
            ->where('village_id', $village['id'])
            ->findAll();

        // Ajouter les chambres et services au village
        $village['chambres'] = $chambres;
        $village['services'] = $services;

        return view('village', [
            'village' => $village
        ]);
    }
}