<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_kecelakaan extends Model
{
    protected $guarded = [];
    protected $table = 'data_kecelakaan';
    // protected $with = ['alamat_tkp', 'alamat_korban'];
    use HasFactory;

    public function alamat_tkp()
    {
        return $this->hasOne(data_alamat::class, 'data_kecelakaan_id', 'id')->where('jenis', 'tkp');
    }
    public function alamat_korban()
    {
        return $this->hasOne(data_alamat::class, 'data_kecelakaan_id', 'id')->where('jenis', 'korban');
    }
}
