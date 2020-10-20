<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Files;
use App\FileTanya;
use App\FilePrediksi;
use Auth;
use Exception;
use File;

class fileUploadController extends Controller
{

    //rangkuman
    public function upload($materi, Request $req){
        
        $user_id = Auth::user()->id;

        $this->validate($req,
        [
            'file' => 'required|mimes:doc,docx,pdf|max:2048'
        ]);
        
        $fileModel = new Files;

        if($req->file()){
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->nama_file = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            if($materi == 'dml'){
                $fileModel->materi_rangkuman = 'dml';
            }else{
                $fileModel->materi_rangkuman = 'ddl';
            }
            $fileModel->status = 'NC';
            $fileModel->id_siswa = $user_id;
            $fileModel->save();

            if($materi == 'dml'){
                return redirect()->route('rangkum.dml')
                ->with('success','Rangkuman berhasil dikumpulkan, tunggu tinjauan dari guru ya !')
                ->with('file', $fileName);
            }else{
                return redirect()->route('rangkum.ddl')
                ->with('success','Rangkuman berhasil dikumpulkan, tunggu tinjauan dari guru ya !')
                ->with('file', $fileName);
            }
        }else{
            if($materi == 'dml'){
                return redirect()->route('rangkum.dml')
                ->with('failed','Rangkuman gagal dikumpulkan periksa kembali ketentuannya !')
                ->with('file', $fileName);
            }else{
                return redirect()->route('rangkum.ddl')
                ->with('failed','Rangkuman gagal dikumpulkan periksa kembali ketentuannya !')
                ->with('file', $fileName);
            }            
        }       
    }
    
    //upload revisi rangkuman
    public function uploadRevisi($id_materi, Request $req){      
      
        $rangkumRevisi = Files::where('id',$id_materi)->first();
        try{
            File::delete($rangkumRevisi->file_path);
            
            $validator = Validator::make($req->all(),
            [
                'file' => 'mimes:doc,docx,pdf |max:4096',
            ]);

            $fileModel = new Files;
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $rangkumRevisi->nama_file = time().'_'.$req->file->getClientOriginalName();
            $rangkumRevisi->file_path = '/storage/' . $filePath;
            $rangkumRevisi->status = 'NC';            
            $rangkumRevisi->catatan = null;
            $rangkumRevisi->save();

            if($rangkumRevisi->materi_rangkuman == 'ddl'){
                return redirect()->route('rangkum.ddl')
                    ->with('success','Rangkuman revisi berhasil diupload');
            }else{
                return redirect()->route('rangkum.dml')
                    ->with('success','Rangkuman revisi berhasil diupload');
            }
        }catch(Exception $e){
            if($rangkumRevisi->materi_rangkuman == 'ddl'){
                return redirect()->route('rangkum.ddl')
                    ->with('failed','Gagal upload revisi rangkuman');
            }else{
                return redirect()->route('rangkum.dml')
                    ->with('failed','Gagal upload revisi rangkuman');
            }
        }   
    }

    //pertanyaan
    public function uploadPertanyaan($materi, Request $req){
        $user_id = Auth::user()->id;

        $this->validate($req,
        [
            'file' => 'required|mimes:doc,docx,pdf|max:2048'
        ]);
        
        $fileModel = new FileTanya;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->nama_file = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            
            if($materi == 'dml'){
                $fileModel->materi_pertanyaan = 'dml';
            }else{
                $fileModel->materi_pertanyaan = 'ddl';
            }

            $fileModel->status = 'NC';
            $fileModel->id_siswa = $user_id;
            $fileModel->save();

            if($materi == 'dml'){
                return redirect()->route('tanya.dml')
                ->with('success','Pertanyaan berhasil dikumpulkan, tunggu tinjauan dari guru ya !')
                ->with('file', $fileName);
            }else{
                return redirect()->route('tanya.ddl')
                ->with('success','Pertanyaan berhasil dikumpulkan, tunggu tinjauan dari guru ya !')
                ->with('file', $fileName);
            }
        }else{
            if($materi == 'dml'){
                return redirect()->route('tanya.dml')
                ->with('failed','Pertanyaan gagal dikumpulkan, periksa kembali ketentuan filenya !')
                ->with('file', $fileName);
            }else{
                return redirect()->route('tanya.ddl')
                ->with('failed','Pertanyaan gagal dikumpulkan, periksa kembali ketentuan filenya !')
                ->with('file', $fileName);
            }            
        }       
    }

    //upload revisi pertanyaan
    public function uploadRevisiPertanyaan($id_materi, Request $req){      
      
        $tanyaRevisi = FileTanya::where('id',$id_materi)->first();
        try{
            File::delete($tanyaRevisi->file_path);
            
            $validator = Validator::make($req->all(),
            [
                'file' => 'mimes:doc,docx,pdf |max:4096',
            ]);

            $fileModel = new Files;
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $tanyaRevisi->nama_file = time().'_'.$req->file->getClientOriginalName();
            $tanyaRevisi->file_path = '/storage/' . $filePath;
            $tanyaRevisi->status = 'NC';            
            $tanyaRevisi->catatan = null;
            $tanyaRevisi->save();

            if($tanyaRevisi->materi_pertanyaan == 'ddl'){
                return redirect()->route('tanya.ddl')
                    ->with('success','Rangkuman revisi berhasil diupload');
            }else{
                return redirect()->route('tanya.dml')
                    ->with('success','Rangkuman revisi berhasil diupload');
            }
        }catch(Exception $e){
            if($tanyaRevisi->materi_pertanyaan == 'ddl'){
                return redirect()->route('tanya.ddl')
                    ->with('failed','Gagal upload revisi rangkuman');
            }else{
                return redirect()->route('tanya.dml')
                    ->with('failed','Gagal upload revisi rangkuman');
            }
        }   
    }

    //prediksi
    public function uploadPrediksi($materi, Request $req){
        $user_id = Auth::user()->id;

        $this->validate($req,
        [
            'file' => 'required|mimes:doc,docx,pdf|max:2048'
        ]);
        
        $fileModel = new FilePrediksi;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->nama_file = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            
            if($materi == 'dml'){
                $fileModel->materi_prediksi = 'dml';
            }else{
                $fileModel->materi_prediksi = 'ddl';
            }

            $fileModel->status = 'NC';
            $fileModel->id_siswa = $user_id;
            $fileModel->save();

            if($materi == 'dml'){
                return redirect()->route('prediksi.dml')
                ->with('success','Prediksi berhasil dikumpulkan, tunggu tinjauan dari guru ya !')
                ->with('file', $fileName);
            }else{
                return redirect()->route('prediksi.ddl')
                ->with('success','Prediksi berhasil dikumpulkan, tunggu tinjauan dari guru ya !')
                ->with('file', $fileName);
            }
        }else{
            if($materi == 'dml'){
                return redirect()->route('prediksi.dml')
                ->with('failed','Prediksi gagal dikumpulkan, periksa kembali ketentuan filenya !')
                ->with('file', $fileName);
            }else{
                return redirect()->route('prediksi.ddl')
                ->with('failed','Prediksi gagal dikumpulkan, periksa kembali ketentuan filenya !')
                ->with('file', $fileName);
            }            
        }       
    }

    //upload revisi prediksi
    //upload revisi pertanyaan
    public function uploadRevisiPrediksi($id_materi, Request $req){      
      
        $prediksiRevisi = FilePrediksi::where('id',$id_materi)->first();
        try{
            File::delete($prediksiRevisi->file_path);
            
            $validator = Validator::make($req->all(),
            [
                'file' => 'mimes:doc,docx,pdf |max:4096',
            ]);

            $fileModel = new Files;
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $prediksiRevisi->nama_file = time().'_'.$req->file->getClientOriginalName();
            $prediksiRevisi->file_path = '/storage/' . $filePath;
            $prediksiRevisi->status = 'NC';            
            $prediksiRevisi->catatan = null;
            $prediksiRevisi->save();

            if($prediksiRevisi->materi_prediksi == 'ddl'){
                return redirect()->route('prediksi.ddl')
                    ->with('success','Rangkuman revisi berhasil diupload');
            }else{
                return redirect()->route('prediksi.dml')
                    ->with('success','Rangkuman revisi berhasil diupload');
            }
        }catch(Exception $e){
            if($prediksiRevisi->materi_prediksi == 'ddl'){
                return redirect()->route('prediksi.ddl')
                    ->with('failed','Gagal upload revisi rangkuman');
            }else{
                return redirect()->route('prediksi.dml')
                    ->with('failed','Gagal upload revisi rangkuman');
            }
        }   
    }
}
