<?php

namespace App\Models;

use App\Models\Reservasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckIn extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reservasi()
    {
        return $this->hasOne(Reservasi::class, 'uni_id', 'uni_id');
    }
}
