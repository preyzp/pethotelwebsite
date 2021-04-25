@extends('layouts.TF')
@section('informasi')

<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="{{ asset('assets') }}/img/bg/bg-img.png">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                       Selamat Datang <b>{{ Auth::guard('member')->user()->nama }}</b>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

