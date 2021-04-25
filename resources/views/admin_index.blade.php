@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">DATA {{ $judul }}</div>
				{!! Form::open(['method'=>'GET','url'=>'admin2/admin/cari','role'=>'search'])  !!}
				<br>
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" name="search"  placeholder="Cari Data...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" > Cari </button>
						<a href="{{ url('admin2/admin') }}" class="btn btn-primary"> Refresh Data </a>
					</span>
				</div>
				{!! Form::close() !!}
				<div class="card-body">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>Admin</th>
								<th>Email</th>
								<th width="25%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($admin as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->email }}</td>
								<td>	
									<a href="{{ url('admin2/admin/edit/'.$row->id) }}" class="btn btn-info" > Ubah</a>
									&nbsp;
									<a href="{{ url('admin2/admin/hapus/'.$row->id) }}" class="btn btn-danger"
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