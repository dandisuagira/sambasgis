@extends('template_frontend.master')
@section('title','Tentang Aplikasi')
@section('content')
    <!-- About section  -->
    <section class="about" id="about">
        <div class="container">
            <div class="columms">
                <div class="col col1" data-aos="fade-right">
                    <div class="image">
                        <img src="{{asset('doob/img/aboutimg.svg')}}" alt="">
                    </div>
                </div>
                <div class="col col2" data-aos="fade-left">
                    <div class="text">
                        <h4>BANGGA MENJADI</h4>
                        <h2>MASYARAKAT KABUPATEN SAMBAS</h2>
                        <p>Sambas dengan segudang prestasi, tak terlepas dari keistimewaan warganya yang andil berkiprah dalam mensukseskan pembangunan. Sebuah bukti bahwa warga Sambas mampu menjawab berbagai tantangan. Terimakasih. Semoga semakin berprestasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End About section -->
@endsection