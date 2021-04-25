@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($admin, array('action' => $action, 'files' => true, 'method' => $method, 'files' => true)) }}
                    <div class="row justify-content-center mt30">
                        <h2>REGISTRASI ADMIN</h2>
                        <div class="col-md-12 col-12" style="margin-bottom:20px;">
                            <div class="contact_form">
                                {{ Form::model($admin, array('action' => $action, 'files' => true, 'method' => $method, 'files' => true)) }}
                                <div class="form-group">
                                    {{ Form::label('name', 'Nama Admin') }}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email Admin') }}
                                    {{ Form::email('email',null,['class'=>'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
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
@endsection