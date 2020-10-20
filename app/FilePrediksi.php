<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePrediksi extends Model
{
    protected $guard = 'prediksi';
    protected $table = 'prediksi';

    protected $fillable = [
        'nama_file', 
        'file_path',
        'materi_prediksi',
        'catatan',
        'status',
        'id_siswa'
    ];

    public function user(){
        return $this->belongsTo('App\User',  'id_siswa', 'id');
    }
}
