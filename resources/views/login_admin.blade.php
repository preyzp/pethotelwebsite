<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  
{{ Form::model(null, array('action' => $action, 'files' => true, 'method' => $method, 'files' => true)) }}
        <div class="row justify-content-center mt30">            
            <h2>LOGIN ADMIN</h2>
            <div class="col-md-12 col-12" style="margin-bottom:20px;">
                <div class="contact_form">
                    
                    @if(Session::has('pesan'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{ Session::get('pesan') }}
                        </div>                
                    @endif

                    <div class="form-group">    
                        {{ Form::label('email', 'Email Admin') }}    
                        {{ Form::email('email',old('username'),['class'=>'form-control']) }}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password',array('class'=>'form-control')) }}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>    

                    {!! Form::submit($btn_submit, ['class' => 'btn btn-primary']) !!}
                </div>
            </div>            
        </div>
    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
