<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'village_id',
        'chambre_id',
        'date_arrivee',
        'date_depart',
        'nombre_chambres',
        'prix_total'
    ];
}
