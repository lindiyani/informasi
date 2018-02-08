<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    //
    protected $fillable = ['id','judul','isi','tanggal','ket'];
}
