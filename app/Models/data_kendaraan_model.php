<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_kendaraan_model extends Model
{
    protected $guarded = [];
    protected $table = 'data_kendaraan';
    protected $primaryKey = 'nopol';
    protected $keyType = 'string';
    use HasFactory;
}
