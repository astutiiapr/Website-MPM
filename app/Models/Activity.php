<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_pelaksanaan',
        'foto_kegiatan',
        'deskripsi'
    ];

    public $timestamps = false;
}