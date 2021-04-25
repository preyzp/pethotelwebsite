@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Type</div>
                <div class="card-body">
                    {{ Form::model($type, array('action' => $action, 'files' => true, 'method' => $method)) }}
                    <div class="form-group">
                        {{ Form::label('nama_type', 'NAMA TYPE') }}
                        {{ Form::text('nama_type',null,array('class'=>'form-control','placeholder' => 'Nama Type','autofocus')) }}
                        <span class="text-danger">{{ $errors->first('nama_type') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection