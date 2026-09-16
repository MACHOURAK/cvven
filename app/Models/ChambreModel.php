<?php

namespace App\Models;

use CodeIgniter\Model;

class ChambreModel extends Model
{
    protected $table = 'chambres';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'village_id',
        'nom',
        'capacite',
        'prix',
        'nombre_disponible'
    ];
}
