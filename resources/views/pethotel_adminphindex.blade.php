@extends('layouts.ADPH')
@section('contentadminph')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">{{ $judul }}</div>
				<div class="card-body">
					<a href="{{ url('adminph/pethotel/edit/'.Auth::guard('adminph')->user()->id)}}" class="btn btn-primary btn-xs mb-2"> Ubah </a>
					<a href="{{ url('adminph/dashboard') }}" class="btn btn-danger btn-xs mb-2"> Kembali </a>	
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<td width="20%" align="left">Nama Pet Hotel</td>
								<td><b>{{Auth::guard('adminph')->user()->nama_pethotel }}</b></td>	
							</tr>
							<tr>
								<td width="20%" align="left">Nama Pemilik</td>
								<td><b>{{Auth::guard('adminph')->user()->nama_pemilik }}</b></td>
							</tr>
							<tr>
								<td width="20%" align="left">Telp</td>
								<td><b>{{Auth::guard('adminph')->user()->telp }}</b></td>
							</tr>
							<tr>
								<td width="20%" align="left">Email</td>
								<td><b>{{Auth::guard('adminph')->user()->email }}</b></td>
							</tr>
							<tr>
								<td width="20%" align="left">Alamat</td>
								<td><b>{{Auth::guard('adminph')->user()->alamat_pethotel }}</b></td>
							</tr>
							<tr>
								<td width="20%" align="left">Foto</td>
								<td><b>{{Auth::guard('adminph')->user()->foto }}</b></td>
							</tr>
							<tr>
								<td width="20%" align="left">Kategori Pet Hotel</td>
								<td><b>{{Auth::guard('adminph')->user()->kategori_pethotel }}</b></td>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection