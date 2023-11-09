<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_alamat extends Model
{
    protected $guarded = [];

    protected $with = ['Village'];
    protected $table = 'data_alamat';
    use HasFactory;


    public function Village()
    {
        return $this->belongsTo(Village::class, 'villages_id', 'id');
    }
}
