<?php

namespace App\Models;

use App\Models\CheckIn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'uni_id';

    protected $with = ['cekin'];

    public function getSlug()
    {
        return 'uni_id';
    }

    public function cekin()
    {
        return $this->hasOne(CheckIn::class, 'uni_id', 'uni_id');
    }
}
