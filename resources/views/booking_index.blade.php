@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">{{ $judul }}</div>
				{!! Form::open(['method'=>'GET','url'=>'admin2/booking/cari','role'=>'search'])  !!}
				<br>
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" name="search"  placeholder="Cari Data...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" > Cari </button>
						<a href="{{ url('admin2/booking') }}" class="btn btn-primary"> Refresh Data </a>
					</span>
				</div>
				{!! Form::close() !!}
				<div class="card-body">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>Nama Member</th>
								<th>Type Kandang</th>
								<th>Pet Hotel</th>
								<th>Tanggal Masuk</th>
								<th>Lama Inap</th>
								<th>Total Harga</th>
								<th>Status</th>

								<th width="20%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($booking as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->member->nama}}</td>
								<td>{{ $row->kandang->type->nama_type}}</td>
								<td>{{ $row->kandang->pethotel->nama_pethotel }}</td>
								<td>{{ $row->tgl_checkin }}</td>
								<td>{{ $row->lama_inap }}</td>
								<td>{{ $row->total_harga }}</td>
								<td>{{ $row->status }}</td>
								<td>
														&nbsp;
									<a href="{{ url('admin2/booking/hapus/'.$row->id) }}" class="btn btn-danger"
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