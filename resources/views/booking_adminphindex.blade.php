@extends('layouts.ADPH')
@section('contentadminph')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-14">
			<div class="card">
				<div class="card-header">{{ $judul }}</div>
				{!! Form::open(['method'=>'GET','url'=>'adminph/booking/cari','role'=>'search'])  !!}
				<br>
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" name="search"  placeholder="Cari Data...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" > Cari </button>
						<a href="{{ url('adminph/booking') }}" class="btn btn-primary"> Refresh Data </a>
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
								<td>Rp. {{ $row->total_harga }}</td>
								<td>{{ $row->status }}</td>
								<td>
									@if ($row->status === "Belum Konfirmasi")
									<a href="{{ url('adminph/booking/editbooking/'.$row->idbooking) }}" class="btn btn-info" >Konfirmasi</a>
									&nbsp;
									<a href="{{ url('adminph/booking/hapusbooking/'.$row->idbooking) }}" class="btn btn-danger"
									onclick="return confirm('Anda yakin?')" > Cancel </a>
									@else
									<a href="{{ url('adminph/booking/outbooking/'.$row->idbooking) }}" class="btn btn-info" >Check-Out</a>
									&nbsp;
									<a href="{{ url('adminph/booking/hapusbooking/'.$row->id) }}" class="btn btn-danger"
									onclick="return confirm('Anda yakin?')" > Cancel </a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$booking->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection