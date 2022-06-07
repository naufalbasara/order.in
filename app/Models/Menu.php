<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPesanan;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaMenu', 'harga', 'kategori'
    ];

    public function detailpesanan() {
        return $this->hasMany(DetailPesanan::class);
    }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? null, function ($query, $search) {
    //         $query->where('namaMenu', 'like', '%' . $search . '%')
    //             ->orWhere('harga', 'like', '%' . $search . '%');
    //     });
    // }
}
