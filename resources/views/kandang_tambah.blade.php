@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kandang</div>
                <div class="card-body">
                    {{ Form::model($kandang, array('action' => $action, 'files' => true, 'method' => $method)) }}
                    <div class="form-group">
                        <label for="pethotel_id">Nama Pet Shop</label>
                        {{ Form::select('pethotel_id',\App\Pethotel::pluck('nama_pethotel','id'),null,['class' =>  'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('pethotel_id') }}</span>
                    </div>
                      <div class="form-group">
                        <label for="type_id">Type Kandang</label>
                        {{ Form::select('type_id',\App\Type::pluck('nama_type','id'),null,['class' =>  'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('type_id') }}</span>
                    </div>
                     <div class="form-group">
                        {{ Form::label('deskripsi', 'Deskripsi Kandang') }}
                        {{ Form::textarea('deskripsi',null,array('class'=>'form-control','placeholder' => 'Deskripsi Kandang')) }}
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                     </div>
                    <div class="form-group">
                        {{ Form::label('harga', 'Harga/Kandang') }}
                        {{ Form::text('harga',null,array('class'=>'form-control','placeholder' => 'Harga/Kandang')) }}
                        <span class="text-danger">{{ $errors->first('harga') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('jumlah_kandang', 'Jumlah Kandang') }}
                        {{ Form::text('jumlah_kandang',null,array('class'=>'form-control','placeholder' => 'Jumlah Kandang')) }}
                        <span class="text-danger">{{ $errors->first('jumlah_kandang') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection