<?php

namespace App\Models;

use App\Models\Tipe;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keuangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['format', 'rupiah', 'multiply'];

    protected $with = ['tipes', 'satuans', 'user']; // N + 1

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function satuans()
    {
        return $this->hasOne(Satuan::class, 'satuan_id', 'satuan_id');
    }

    public function tipes()
    {
        return $this->hasOne(Tipe::class, 'tipe_id', 'tipe_id');
    }

    public function verify()
    {
        return $this->hasOne(VerifyId::class, 'verify_id', 'verify_id');
    }

    public function getMultiplyAttribute() {
        return $this->attributes['harga'] * $this->attributes['jumlah'];
    }

    public function getFormatAttribute()
    {
        return $this->rupiah . ' x ' . $this->attributes['jumlah'] . ' ' . $this->satuans->attributes['satuan'];
    }

    public function getRupiahAttribute()
    {
        return "Rp".number_format($this->attributes['harga'],0,',','.');
    }

}
