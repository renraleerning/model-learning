<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\statusFlow;

class checkFlowController extends Controller
{
    public function Flow(){
        $id = Auth::user()->id;
        $adaGa = statusFlow::where('id_siswa',$id)->first();

        if(isset($adaGa)!= 1){
            $flow = statusFlow::create([
                'tahapan' => 'materiDDL',            
                'status' => '1',
                'id_siswa' => $id
            ]);
        }

        return redirect('/materi/dml/1');
    }

    public function FlowDML(){
        $id = Auth::user()->id;
        $materi = 'materiDML';

        $adaGa = statusFlow::where([
            ['tahapan', '=', $materi],
            ['id_siswa', '=', $id],
            ])->first();

        if(isset($adaGa)!= 1){
            $flow = statusFlow::create([
                'tahapan' => 'materiDML',            
                'status' => '1',
                'id_siswa' => $id
            ]);
        }

        return redirect()->route('rangkum.ddl');
    }
}
