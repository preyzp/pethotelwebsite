<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{asset('assets/img/fav.png')}}">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>PetHotel.com</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{asset('assets/css/linearicons.css ')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    </head>
    <body>
        <header id="header" id="home">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                        @if (Auth::guard('member')->check() == false)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/profil') }}">Profil Website</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('caripethotel/hasil-cari') }}">Pet Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('member/daftar') }}">Daftar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('member/form-login') }}">Login</a>
                            </li>
                            @else
                           <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/profil') }}">Profil Website</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('caripethotel/hasil-cari') }}">Pet Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/') }}">Booking Member</a>
                            </li>
                           
                            <li><a class="nav-link" href="{{ url('member/logout') }}">Logout</a></li>
                            @endif
                        </ul>
                        
                        </nav><!-- #nav-menu-container -->
                    </div>
                </div>
                </header><!-- #header -->
                <!-- start banner Area -->
                <section class="banner-area relative" id="home">
                    <div class="overlay overlay-bg"></div>
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                Edit Profil
                                </h1>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End banner Area -->
                
                <!-- Start Volunteer-form Area -->
                <section class="Volunteer-form-area section-gap">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="menu-content pb-60 col-lg-9">
                                <div class="title text-center">
                                    <p>Silahkan isi form di bawah ini untuk mengubah data anda</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{ Form::model($member, array('action' => $action, 'files' => true, 'method' => $method, 'files' => true)) }}
                    <div class="row justify-content-center mt30">
                        <h2>                  </h2>
                        <div class="col-md-12 col-12" style="margin-bottom:20px;">
                            <div class="contact_form">
                                {{ Form::model($member, array('action' => $action, 'files' => true, 'method' => $method, 'files' => true)) }}
                                <div class="form-group">
                                    {{ Form::label('nama', 'Nama Lengkap') }}
                                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email Member') }}
                                    {{ Form::email('email',null,['class'=>'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('no_hp', 'HP') }}
                                    {{ Form::text('no_hp',null,array('class'=>'form-control')) }}
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}
                                    {{ Form::password('password',array('class'=>'form-control')) }}
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password_confirmation', 'Konfirmasi Password') }}
                                    {{ Form::password('password_confirmation',array('class'=>'form-control')) }}
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                                {!! Form::submit($btn_submit, ['class' => 'genric-btn primary']) !!}
                                    
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    </div>
                    </div>
                </section>
                <!-- End Volunteer-form Area -->
                
                <!-- start footer Area -->
                <footer class="footer-area">
                    <div class="container">
                        <div class="row pt-120 pb-80">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-footer-widget">
                                    <h6>About Us</h6>
                                    <p>
                                        
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4  col-md-6">
                                <div class="single-footer-widget mail-chimp">
                                    <h6 class="mb-20">Contact Us</h6>
                                    <ul class="list-contact">
                                        <li class="flex-row d-flex">
                                            <div class="icon">
                                                <span class="lnr lnr-home"></span>
                                            </div>
                                            <div class="detail">
                                                <h4>Talang Banjar, Kota Jambi</h4>
                                                <p>
                                                    Talang Banjar Permai blok D/6
                                                </p>
                                            </div>
                                        </li>
                                        <li class="flex-row d-flex">
                                            <div class="icon">
                                                <span class="lnr lnr-phone-handset"></span>
                                            </div>
                                            <div class="detail">
                                                <h4>0812-8010-7534</h4>
                                            </div>
                                        </li>
                                        <li class="flex-row d-flex">
                                            <div class="icon">
                                                <span class="lnr lnr-envelope"></span>
                                            </div>
                                            <div class="detail">
                                                <h4>pethotelJambi@gmail.com</h4>
                                                <p>
                                                    Hubungi kami kapan saja!
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text">
                        <div class="container">
                            <div class="row footer-bottom d-flex justify-content-between">
                                <p class="col-lg-8 col-sm-6 footer-text m-0 text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a>ZAKARIJUS</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End footer Area -->
                <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
                <script src="{{ asset('assets/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"') }}></script>
                <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
                <script type="text/javascript" src={{ asset('assets/"https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"') }}></script>
                <script src="{{ asset('assets/js/easing.min.js') }}"></script>
                <script src="{{ asset('assets/js/hoverIntent.js') }}"></script>
                <script src="{{ asset('assets/js/superfish.min.js') }}"></script>
                <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
                <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
                <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
                <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
                <script src="{{ asset('assets/js/mail-script.js') }}"></script>
                <script src="{{ asset('assets/js/main.js') }}"></script>
            </body>
        </html>


