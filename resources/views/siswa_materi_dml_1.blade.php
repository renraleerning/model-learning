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
                            <h5 class="m-b-10">Materi DML</h5>                            
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Materi DML</a></li>                          
                            <li class="breadcrumb-item"><a href="#!">1</a></li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
						<h3>DML (<i>Data Manipulation Language</i>)</h3>
                    </div>
                    <div class="card-body">
                        <h6><b>Pengertian DML</b></h6>
                        <p style="font-size: 12pt">	
                            DML adalah sebuah metode Query yang dapat digunakan apabila DDL telah terjadi, sehingga fungsi dari Query DML ini untuk 
                            melakukan pemanipulasian database yang telah dibuat.
                            </br>
                            </br>
                        </p>
                        <h6><b>Fungsi dari DML Beberapa fungsi atau kegunaan dari DML diantaranya adalah sebagai berikut : </b></h6>
                        <ol type="a">
                            <li> Pengambilan informasi yang disimpan dalam basis data  </li>
                            <li> Penyisipan informasi baru ke basis data </li>
                            <li> Penghapusan informasi dari basis data </li>
                            <li> Modifikasi informasi yang disimpan dalam basis data  </li>
                        </ol>
                        <p style="font-size: 12pt; text-align:center">Perhatikan video dibawah ini !</p>
                        <iframe class="video-materi"
                            src="https://drive.google.com/file/d/1G4K9wPeTyMyRv5eLqOXgYk4sG51zGD-o/preview" width="640" height="480">
                        </iframe>
                    </div>
                </div>
            </div>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="/materi/dml/{{2}}">2</a></li>
                <li class="page-item">
                <a class="page-link" href="/materi/dml/{{2}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

