@extends('layouts.AD')
@section('contentadmin')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">DATA {{ $judul }}</div>
				{!! Form::open(['method'=>'GET','url'=>'admin2/pethotel/cari','role'=>'search'])  !!}
				<br>
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" name="search"  placeholder="Cari Data...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" > Cari </button>
						<a href="{{ url('admin2/kandang') }}" class="btn btn-primary"> Refresh Data </a>
					</span>
				</div>
				{!! Form::close() !!}
				<div class="card-body">
					<a href="{{ url('admin2/kandang/tambah') }}" class="btn btn-primary btn-xs mb-2">Tambah</a>
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>Nama Pet Hotel</th>
								<th>Type Kandang</th>
								<th>Deskripsi</th>
								<th>Harga</th>
								<th>Jumlah Kandang</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ($kandang as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->pethotel->nama_pethotel}}</td>
								<td>{{ $row->type->nama_type}}</td>
								<td>{{ $row->deskripsi }}</td>
								<td>Rp. {{ $row->harga }}</td>
								<td>{{ $row->jumlah_kandang }}</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection