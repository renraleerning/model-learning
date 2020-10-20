<?php

namespace App\Http\Controllers;

use App\FilePrediksi;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Files;
use App\FileTanya;
use App\statusFlow;

class SiswaController extends Controller
{

    public function __construct()
    {        
        $this->middleware('auth');        
    }

    public function index(){
        if(Auth::user()->roles == 'siswa'){
            return view('siswa_dashboard');
        }else{
            return redirect()->route('guru.dashboard');
        }
    }

    public function showMateriView(){
        return view('siswa_materi');
    }

    public function materiDDL($page){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }
        if($page == 1){
            return view('siswa_materi_ddl_1');
        }elseif($page == 2){
            return view('siswa_materi_ddl_2');
        }elseif($page == 3){
            return view('siswa_materi_ddl_3');
        }elseif($page == 4){
            return view('siswa_materi_ddl_4');
        }else{
            return view('siswa_materi_ddl_5');
        }
    }

    public function materiDML($page){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }
        //cek sudah sampai akhir materi ddl
        $step = 'materiDDL';
        $user_id = Auth::user()->id;

        $tahapan = statusFlow::where([
            ['tahapan', '=', $step],
            ['id_siswa', '=', $user_id],
            ])->first();
               
        if(isset($tahapan)){
            if($page == 1){
                return view('siswa_materi_dml_1');
            }elseif($page == 2){
                return view('siswa_materi_dml_2');
            }
        }else{
            return view('siswa_konfirmasi_tahapan');
        }
    }
    
    public function showRangkumDDL(){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }

        $user_id = Auth::user()->id;
        $materi = 'ddl';
        $step = 'materiDML';
        
        $tahapan = statusFlow::where([
            ['tahapan', '=', $step],
            ['id_siswa', '=', $user_id],
            ])->first();
        
        if(isset($tahapan)){
            $r = Files::where([
                ['materi_rangkuman', '=', $materi],
                ['id_siswa', '=', $user_id],
            ])->first();
    
            if(isset($r) == 1){        
                return view('siswa_rangkum_ddl', ['r'=>$r]);
            }else{
                return view('siswa_upload_rangkum_ddl');
            }
        }else{
            return view('siswa_konfirmasi_tahapan_dml');
        }
    }

    public function showTanyaDDL(){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }

        $user_id = Auth::user()->id;
        $materi = 'ddl';
        $materi_sebelumnya = 'dml';

        $rx = Files::where([
            ['materi_rangkuman', '=', $materi_sebelumnya],
            ['id_siswa', '=', $user_id],
        ])->first();

        if(isset($rx) && $rx->status == 'C'){
            $p = FileTanya::where([
                ['materi_pertanyaan', '=', $materi],
                ['id_siswa', '=', $user_id],
            ])->first();
            
            //cek sudah/belum upload pertanyaan 
            $p = FileTanya::where([
                ['materi_pertanyaan', '=', $materi],
                ['id_siswa', '=', $user_id],
            ])->first();
            
            if(isset($p) == 1){        
                return view('siswa_tanya_ddl', ['p'=>$p]);
            }else{
                return view('siswa_upload_tanya_ddl');
            }
        }elseif(isset($rx) && $rx->status != 'C'){
            return redirect()->route('rangkum.dml')
                    ->with('failed','Anda belum dapat membuat pertanyaan ddl, karena rangkuman dml anda belum ditinjau atau masih belum lengkap !'); 
        }else{
            return view('siswa_konfirmasi_tahapan_rangkum_dml');
        }
    }

    public function showPrediksiDDL(){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }

        $user_id = Auth::user()->id;
        $materi = 'ddl';
        $materi_sebelumnya = 'dml';

        $rx = FileTanya::where([
            ['materi_pertanyaan', '=', $materi_sebelumnya],
            ['id_siswa', '=', $user_id],
        ])->first();

        if(isset($rx) && $rx->status == 'C'){
            $p = FilePrediksi::where([
                ['materi_prediksi', '=', $materi],
                ['id_siswa', '=', $user_id],
            ])->first();
    
            if(isset($p) == 1){        
                return view('siswa_prediksi_ddl', ['p'=>$p]);
            }else{
                return view('siswa_upload_prediksi_ddl');
            }
        }elseif(isset($rx) && $rx->status != 'C'){
            return redirect()->route('tanya.dml')
                ->with('failed','Anda belum dapat membuat prediksi ddl, 
                        karena pertanyaan dml anda belum ditinjau atau masih belum lengkap !'); 
        }else{
            return view('siswa_konfirmasi_tahapan_tanya_dml');
        }
    }

    public function showTanyaDML(){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }
        $user_id = Auth::user()->id;
        $materi = 'dml';
        $materi_sebelumnya = 'ddl';

        $rx = FileTanya::where([
            ['materi_pertanyaan', '=', $materi_sebelumnya],
            ['id_siswa', '=', $user_id],
        ])->first();
        
        if(isset($rx) && $rx->status == 'C'){
            //cek sudah/belum upload pertanyaan ddl
            $p = FileTanya::where([
                ['materi_pertanyaan', '=', $materi],
                ['id_siswa', '=', $user_id],
            ])->first();

            if(isset($p) == 1){        
                return view('siswa_tanya_dml', ['p'=>$p]);
            }else{
                return view('siswa_upload_tanya_dml');
            }
        }elseif(isset($rx) && $rx->status != 'C'){
            return redirect()->route('tanya.ddl')
                    ->with('failed','Anda belum dapat membuat pertanyaan materi dml, 
                            karena pertanyaan ddl anda belum ditinjau atau masih belum lengkap !');
        }else{
            return view('siswa_konfirmasi_tahapan_tanya_ddl');
        }
        
    }

    public function showRangkumDML(){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }

        $user_id = Auth::user()->id;
        $materi = 'dml';
        $materi_sebelumnya = 'ddl';

        $rx = Files::where([
            ['materi_rangkuman', '=', $materi_sebelumnya],
            ['id_siswa', '=', $user_id],
        ])->first();

        if(isset($rx) == 1 && $rx->status == 'C'){            
            $r = Files::where([
                ['materi_rangkuman', '=', $materi],
                ['id_siswa', '=', $user_id],
            ])->first();

            //cek sudah/belum upload rangkuman dml
            if(isset($r) == 1){        
                return view('siswa_rangkum_dml', ['r'=>$r]);
            }else{
                return view('siswa_upload_rangkum_dml');
            }
        }elseif(isset($rx) == 1 && $rx->status != 'C'){
            return redirect()->route('rangkum.ddl')
                    ->with('failed','Anda belum dapat merangkum dml, karena rangkuman ddl anda belum ditinjau atau masih belum lengkap !');
        }else{
            return view('siswa_konfirmasi_tahapan_rangkum_ddl');
        }
    }

    public function showPrediksiDML(){
        if(Auth::user()->roles != 'siswa'){
            return redirect()->back();
        }
        $user_id = Auth::user()->id;
        $materi = 'dml';
        $materi_sebelumnya = 'ddl';

        $rx = FilePrediksi::where([
            ['materi_prediksi', '=', $materi_sebelumnya],
            ['id_siswa', '=', $user_id],
        ])->first();

        if(isset($rx) == 1 && $rx->status == 'C'){  
            $p = FilePrediksi::where([
                ['materi_prediksi', '=', $materi],
                ['id_siswa', '=', $user_id],
            ])->first();

            if(isset($p) == 1){        
                return view('siswa_prediksi_dml', ['p'=>$p]);
            }else{
                return view('siswa_upload_prediksi_dml');
            }
        }elseif(isset($rx) == 1 && $rx->status != 'C'){
            return redirect()->route('prediksi.ddl')
                    ->with('failed','Anda belum dapat memprediksi dml, karena prediksi ddl anda belum ditinjau atau masih belum lengkap !');
        }else{
            return view('siswa_konfirmasi_tahapan_prediksi_ddl');
        }
    }
}
