@extends('layouts.AD')
@section('contentadmin')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">DATA {{ $judul }}</div>
				{!! Form::open(['method'=>'GET','url'=>'admin2/type/cari','role'=>'search'])  !!}
				<br>
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" name="search"  placeholder="Cari Data...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" > Cari </button>
						<a href="{{ url('admin1/type') }}" class="btn btn-primary"> Refresh Data </a>
					</span>
				</div>
				{!! Form::close() !!}
				<div class="card-body">
					<a href="{{ url('admin1/dashboard') }}" class="btn btn-danger btn-xs mb-2">Kembali</a>
					<a href="{{ url('admin1/type/tambah') }}" class="btn btn-primary btn-xs mb-2">Tambah</a>

					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>Nama Type</th>
								<th width="25%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($type as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nama_type }}</td>
								<td>
									<a href="{{ url('admin1/type/edit/'.$row->id) }}" class="btn btn-info" > Ubah</a>
									&nbsp;
									<a href="{{ url('admin1/type/hapus/'.$row->id) }}" class="btn btn-danger"
									onclick="return confirm('Anda yakin?')" > Hapus </a>
								</td>
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