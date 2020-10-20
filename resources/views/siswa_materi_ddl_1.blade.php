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
						<h3>DDL (<i>Data Definition Language</i>)</h3>
                    </div>
                    <div class="card-body">
                        <h6><b>Pengertian DDL</b></h6>
                        <p style="font-size: 12pt">	DDL adalah sebuah metode Query SQL yang berguna untuk mendefinisikan 
                            data pada sebuah Database.
                            </br>
                            </br>
                        </p>
                        <h6><b>Type Data pada MySQL</b></h6>
                        <p style="font-size: 12pt; text-align:justify">	Tipe data adalah suatu bentuk pemodelan data yang dideklarasikan pada saat melakukan pembuatan tabel. Tipe data ini akan mempengaruhi setiap data yang akan dimasukkan ke dalam sebuah tabel. 
                            Data yang akan dimasukkan harus sesuai dengan tipe data yang dideklarasikan.
                            </br>
                            </br>
                            Berbagai type data pada MySQL dapat dilihat pada tabel berikut :
                        </p>
                        <table class="table table-bordered tabel-materi">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 25%; text-align:center">Type Data</th>
                                    <th scope="col" style="width: 75%; text-align:center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>TINYINT</td>
                                    <td>Ukuran 1 byte. Bilangan bulat terkecil, dengan jangkauan untuk bilangan
                                    bertanda: -128 sampai dengan 127 dan untuk yang tidak bertanda : 0 s/d 255. 
                                    Bilangan tak bertandai dengan kata UNSIGNED</td>
                                </tr>
                                <tr>
                                    <td>SMALLINT</td>
                                    <td>Ukuran 2 Byte. Bilangan bulat dengan jangkauan untuk bilangan bertanda : -32768 
                                        s/d 32767 dan untuk yang tidak bertanda : 0 s/d 65535</td>
                                </tr>
                                <tr>
                                    <td>MEDIUMINT</td>
                                    <td>Ukuran 3 byte. Bilangan bulat dengan jangkauan untuk bilangan bertanda : -8388608 
                                        s/d 8388607 dan untuk yang tidak bertanda : 0 s/d 16777215</td>
                                </tr>
                                <tr>
                                    <td>INT</td>
                                    <td>Ukuran 4 byte. Bilangan bulat dengan jangkauan untuk bilangan bertanda :
                                        -2147483648 s/d 2147483647 dan untuk yang tidak bertanda : 0 s/d 4294967295
                                    </td>
                                </tr>
                                <tr>
                                    <td>INTEGER</td>
                                    <td>Ukuran 4 byte. Sinonim dari int</td>
                                </tr>
                                <tr>
                                    <td>BIGINT</td>
                                    <td>Ukuran 8 byte. Bilangan bulat terbesar dengan jangkauan untuk bilangan bertanda :
                                        -9223372036854775808 s/d 9223372036854775807 dan untuk yang tidak bertanda : 0 s/d 1844674473709551615
                                    </td>
                                </tr>
                                <tr>
                                    <td>FLOAT</td>
                                    <td>Ukuran 4 byte. Bilangan pecahan</td>
                                </tr>
                                <tr>
                                    <td>DOUBLE</td>
                                    <td>Ukuran 8 byte. Bilangan pecahan</td>
                                </tr>
                                <tr>
                                    <td>DOUBLEPRECISION</td>
                                    <td>Ukuran 8 byte. Bilangan pecahan</td>
                                </tr>
                                <tr>
                                    <td>REAL</td>
                                    <td>Ukuran 8 byte. Sinonim dari DOUBLE</td>
                                </tr>
                                <tr>
                                    <td>DECIMAL(M, D)</td>
                                    <td>Ukuran M byte. Bilangan pecahan, misalnya DECIMAL
                                        (5,2 dapat digunakan untuk menyimpan bilangan -99,99 s/d 99,99</td>
                                </tr>
                                <tr>
                                    <td>NUMERIC(M, D)</td>
                                    <td>Ukuran M byte. Sinonim dari DECIMAL, misalnya NUMERIC(5,2) 
                                        dapat digunakan untuk menyimpan bilangan -99,99 s/d 99,99</td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 12pt; text-align:center"><b>Tipe data untuk bilangan<i>(number)</i></b></p>
                    </div>
                </div>
            </div>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{2}}">2</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{3}}">3</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{4}}">4</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{5}}">5</a></li>
                <li class="page-item">
                <a class="page-link" href="/materi/ddl/{{2}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

