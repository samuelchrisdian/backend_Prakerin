<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = "Informasi";

    protected $fillable = [
      'nama_wisata', 'nama_jalan', 'hari', 'jalan', 'harga_tiket', 'cocok_untuk', 'created_at', 'updated_at'
    ];
}
