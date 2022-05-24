<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;

class Meja extends Model
{
    use HasFactory;
    protected $fillable = ['id'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

}
