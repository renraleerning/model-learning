<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    
    protected $guard = 'rangkuman';
    protected $table = 'rangkuman';

    protected $fillable = [
        'nama_file', 
        'file_path',
        'materi_rangkuman',
        'catatan',
        'status',
        'id_siswa'
    ];

    public function user(){
        return $this->belongsTo('App\User',  'id_siswa', 'id');
    }
}
