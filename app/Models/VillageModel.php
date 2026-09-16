<?php

namespace App\Models;

use CodeIgniter\Model;

class VillageModel extends Model
{
    protected $table = 'villages';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nom',
        'departement',
        'image',
        'slug',
        'description'
    ];
}
