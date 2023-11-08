<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_alamat extends Model
{
    protected $guarded = [];
    
    protected $with = ['Province','District','Regency','Village'];
    protected $table = 'data_alamat';
    use HasFactory;

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
    public function District()
    {
        return $this->belongsTo(District::class);
    }
    public function Regency()
    {
        return $this->belongsTo(Regency::class);
    }
    public function Village()
    {
        return $this->belongsTo(Village::class);
    }
}
