<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PusatData extends Model
{
    protected $table = 'pusat_data';

    protected $fillable = [
        'nama_dokumen',
        'url_link'
    ];

    public $timestamps = false;
}