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
                            <h5 class="m-b-10">Materi DDL</h5>                            
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Materi DDL</a></li>
                            <li class="breadcrumb-item"><a href="#!">2</a></li>                              
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
						<h3>DDL (<i>Data Definition Language</i>)</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered tabel-materi">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 25%; text-align:center">Type Data</th>
                                    <th scope="col" style="width: 75%; text-align:center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>DATETIME</td>
                                    <td>Ukuran 8 byte. Kombinasi tanggal dan jam, dengan jangkauan dari 
                                        ‘1000-01-01 00:00:00’ s/d ‘9999-12-31 23:59:59’
                                    </td>
                                </tr>
                                <tr>
                                    <td>DATE</td>
                                    <td>Ukuran 3 Byte. Tanggal dengan jangkauan 
                                        dari ‘1000-01-01’ s/d ‘9999-12-31’
                                    </td>
                                </tr>
                                <tr>
                                    <td>TIMESTAMP</td>
                                    <td>Ukuran 4 byte. Kombinasi tanggal dan jam, dengan jangkauan 
                                        dari ‘1970-01-01 00:00:00’ s/d ‘2037’
                                    </td>
                                </tr>
                                <tr>
                                    <td>TIME</td>
                                    <td>Ukuran 3 byte. Waktu dengan jangkauan 
                                        dari ‘839:59:59’ s/d ‘838:59:59’
                                    </td>
                                </tr>
                                <tr>
                                    <td>YEAR</td>
                                    <td>Ukuran 1 byte. Data tahun antara 1901 s/d 2155</td>
                                </tr>                                
                            </tbody>
                        </table>
                        <p style="font-size: 12pt; text-align:center"><b>Tipe data untuk tanggal dan jam</b></p>
                        </br>
                        <table class="table table-bordered tabel-materi">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 25%; text-align:center">Type Data</th>
                                    <th scope="col" style="width: 75%; text-align:center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>CHAR</td>
                                    <td>Mampu menangani data hingga 255 karakter. Tipe data CHAR mengharuskan untuk memasukkan 
                                        data yang telah ditentukan oleh kita.
                                    </td>
                                </tr>
                                <tr>
                                    <td>VARCHAR</td>
                                    <td>Mampu menangani data hingga 255 karakter. Tipe data VARCHAR tidak mengharuskan untuk 
                                        memasukkan data yang telah ditentukan oleh kita.
                                    </td>
                                </tr>
                                <tr>
                                    <td>TINYBLOB, TINYTEXT</td>
                                    <td>Ukuran 255 byte. Mampu menangani data 
                                        sampai 2^8-1 data.
                                    </td>
                                </tr>
                                <tr>
                                    <td>BLOB, TEXT</td>
                                    <td>Ukuran 65535 byte. Type string yang mampu menangani 
                                        data hingga 2^16-1 (16M-1) data. 
                                    </td>
                                </tr>
                                <tr>
                                    <td>MEDIUMBLOB, MEDIUMTEXT</td>
                                    <td>Ukuran 16777215 byte. Mampu menyimpan data hingga 2^24-1 (16M-1) data.</td>
                                </tr>
                                <tr>
                                    <td>LONGBLOB, LONGTEXT</td>
                                    <td>Ukuran 4294967295 byte. Mampu menyimpan data hingga berukuran GIGA BYTE. Tipe data ini 
                                        memiliki batas penyimpanan hingga 2^32-1 (4G-1) data.
                                    </td>
                                </tr>
                                <tr>
                                    <td>ENUM(‘nilai1’,’nilai2’,…,’nilaiN’)</td>
                                    <td>Ukuran 1 atau 2 byte. Tergantung jumlah nilai enumerasinya (maksimum 65535 nilai)</td>
                                </tr>    
                                <tr>
                                    <td>SET(‘nilai1’,’nilai2’,…,’nilaiN’)</td>
                                    <td>1,2,3,4 atau 8 byte, tergantung jumlah anggota himpunan (maksimum 64 anggota)</td>
                                </tr>                                     
                            </tbody>
                        </table>
                        <p style="font-size: 12pt; text-align:center"><b>Tipe data untuk karakter dan lain-lain</b></p>
                    </div>
                </div>
            </div>
            <ul class="pagination">
                <li class="page-item">
                <a class="page-link" href="/materi/ddl/{{1}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{1}}">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{3}}">3</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{4}}">4</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{5}}">5</a></li>
                <li class="page-item">
                <a class="page-link" href="/materi/ddl/{{3}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

