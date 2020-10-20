<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileTanya extends Model
{
    protected $guard = 'pertanyaan';
    protected $table = 'pertanyaan';

    protected $fillable = [
        'nama_file', 
        'file_path',
        'materi_pertanyaan',
        'catatan',
        'status',
        'id_siswa'
    ];

    public function user(){
        return $this->belongsTo('App\User',  'id_siswa', 'id');
    }
}
