<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = "guests";
    protected $fillable = [
        "nama",
        "alamat",
        "tujuan",
        "tanggal"
    ];
}
