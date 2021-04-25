@extends('layouts.AD')
@section('contentadmin')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">{{ $judul }}</div>
				{!! Form::open(['method'=>'GET','url'=>'admin1/pethotel/cari','role'=>'search'])  !!}
				<br>
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" name="search"  placeholder="Cari Data...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" > Cari </button>
						<a href="{{ url('admin1/pethotel') }}" class="btn btn-primary"> Refresh Data </a>
					</span>
				</div>
				{!! Form::close() !!}
				<div class="card-body">
					<a href="{{ url('admin1/dashboard') }}" class="btn btn-danger btn-xs mb-2"> Kembali </a>	
					<a href="{{ url('admin1/pethotel/tambah') }}" class="btn btn-primary btn-xs mb-2">Tambah</a>
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>Nama Pemilik</th>
								<th>Nama Pet Hotel</th>
								<th>Alamat</th>
								<th>Telp</th>
								<th>Email</th>
								<th>Kategori Pet Hotel</th>
								<th width="25%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pethotel as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nama_pemilik }}</td>
								<td>{{ $row->nama_pethotel }}</td>
								<td>{{ $row->alamat_pethotel }}</td>
								<td>{{ $row->telp }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->kategori_pethotel }}</td>
								<td>
									<a href="{{ url('admin1/pethotel/edit/'.$row->id) }}" class="btn btn-info" > Ubah</a>
									&nbsp;
									<a href="{{ url('admin1/pethotel/hapus/'.$row->id) }}" class="btn btn-danger"
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