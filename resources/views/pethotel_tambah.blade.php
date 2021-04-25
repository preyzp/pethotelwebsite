@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TAMBAH pethotel</div>
                <div class="card-body">
                    {{ Form::model($pethotel, array('action' => $action, 'files' => true, 'method' => $method)) }}
                     <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email',null,array('class'=>'form-control','placeholder' => 'Email Pethotel','autofocus')) }}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password',null,array('class'=>'form-control','placeholder' => 'Password','autofocus')) }}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                     <div class="form-group">
                                    {{ Form::label('password_confirmation', 'Konfirmasi Password') }}
                                    {{ Form::password('password_confirmation',array('class'=>'form-control')) }}
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                    <div class="form-group">
                        {{ Form::label('nama_pemilik', 'Pemilik Pet Hotel') }}
                        {{ Form::text('nama_pemilik',null,array('class'=>'form-control','placeholder' => 'Nama Pemilik','autofocus','rows'=>'3',)) }}
                        <span class="text-danger">{{ $errors->first('alamat_pethotel') }}</span>
                    </div>
                     <div class="form-group">
                        {{ Form::label('jenis_kelamin', 'Jenis Kelamin') }}
                        {!! Form::select('jenis_kelamin',['L' => 'Laki-Laki',
                            'P' => 'Perempuan'], null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('foto_ktp', 'Foto KTP') }}
                        {!! Form::file('foto_ktp', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('foto_ktp') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nama_pethotel', 'Nama Pet Hotel') }}
                        {{ Form::text('nama_pethotel',null,array('class'=>'form-control','placeholder' => 'Nama Pet Hotel','autofocus')) }}
                        <span class="text-danger">{{ $errors->first('nama_pethotel') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('alamat_pethotel', 'Alamat Pet Hotel') }}
                        {{ Form::textarea('alamat_pethotel',null,array('class'=>'form-control','placeholder' => 'Alamat Pet Hotel','autofocus')) }}
                        <span class="text-danger">{{ $errors->first('alamat_pethotel') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telp', 'Nomor Telpon') }}
                        {{ Form::text('telp',null,array('class'=>'form-control','placeholder' => 'Nomor Telp','autofocus')) }}
                        <span class="text-danger">{{ $errors->first('telp') }}</span>
                    </div>
                     <div class="form-group">
                        {{ Form::label('foto', 'Foto Pet Hotel') }}
                        {!! Form::file('foto', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('foto') }}</span>
                    </div>
                     <div class="form-group">
                        {{ Form::label('foto2', 'Foto KTP') }}
                        {!! Form::file('foto2', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('foto2') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kategori_pethotel', 'Kategori') }}
                        {!! Form::select('kategori_pethotel',['Pet Hotel Anjing' => 'Pet Hotel Anjing',
                            'Pet Hotel Kucing' => 'Pet Hotel Kucing','Pet Hotel Anjing&Kucing' => 'Pet Hotel Anjing&Kucing'], null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('kategori_pethotel') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection