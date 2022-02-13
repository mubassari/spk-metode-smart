<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Param;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = ['id_alternatif', 'id_kriteria', 'id_parameter'];

    public function alternatif()
    {
        return $this->belongsToMany(Alternatif::class);
    }
    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class);
    }
    public function parameter()
    {
        return $this->belongsToMany(Parameter::class);
    }
}
