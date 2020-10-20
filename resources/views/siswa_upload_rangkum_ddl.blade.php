@extends('layouts.siswa_app')

@section('content')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Merangkum materi DDL</h5>                            
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Rangkum materi DDL</a></li>                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        @if ($message = Session::get('success'))
            <div class="col-sm-12">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    {{ $message }}
                </div>
            </div>
        @endif

        @if ($message = Session::get('failed'))
            <div class="col-sm-12">
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    {{ $message }}
                </div>
            </div>
        @endif
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-header" style="height: 100px;">
						<h3>Rangkuman materi DDL (<i>Data Definition Language</i>)</h3>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 12pt">
                            Silahkan anda rangkum materi DDL dari paparan text penjelasan
                            mengenai DDL dan tayangan video yang sudah disajikan ! 
                            </br>
                            </br>
                            Jika sudah dirangkum pada software pengolah kata (word, wps, dll), 
                            anda upload file tersebut dengan menekan tombol dibawah ini !
                            </br>
                            </br>
                            File yang diupload ekstensi (.doc, .docx, .pdf) maksimal ukuran 2mb.
                            </br>
                            Dengan format nama ('No.absen'_'Nama'_Rangkuman_ddl)
                        </p>
                        <form action="/rangkum/ddl/{{'ddl'}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="chooseFile" class=" form-control-label">Upload rangkuman anda :</label>
                            <input class="btn-upload" type="file" id="chooseFile" name="file" required>
                            
                            <div class="form-group tombol-submit">
                                <button type="submit" class="btn btn-lg btn-primary btn-block btn-upload-submit">
                                    Kumpulkan Rangkuman
                                </button>                           
                            </div>
                    </div>
                </div>
            </div>                  
        </div>
    </div>    
</div>
@endsection

