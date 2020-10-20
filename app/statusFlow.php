<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusFlow extends Model
{
    protected $guard = 'status_flow_tables';
    protected $table = 'status_flow_tables';

    protected $fillable = [
        'tahapan', 
        'status',
        'id_siswa'
    ];
}
