@extends('layouts.AD')
@section('contentadmin')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ $judul }}</div>
				{!! Form::open(['method'=>'GET','url'=>'admin2/admin/cari','role'=>'search'])  !!}
				<br>
					
					
						<a href="{{ url('admin1/admin') }}" class="btn btn-primary"> Refresh Data </a>
						<a href="{{ url('admin1/dashboard') }}" class="btn btn-danger"> Kembali </a>
					
				{!! Form::close() !!}
				<div class="card-body">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>Admin</th>
								<th>Email</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ($admin as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->email }}</td>
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