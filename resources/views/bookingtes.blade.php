<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>Nama Pet Hotel</th>
								<th>Type Kandang</th>
								<th>Deskripsi</th>
								<th>Harga</th>
								<th>Jumlah Kandang</th>
								<th width="20%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($kandang as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->pethotel->nama_pethotel}}</td>
								<td>{{ $row->type->nama_type}}</td>
								<td>{{ $row->deskripsi }}</td>
								<td>{{ $row->harga }}</td>
								<td>{{ $row->jumlah_kandang }}</td>
								<td>
									<a href="{{ url('admin2/kandang/edit/'.$row->id) }}" class="btn btn-info" > Ubah</a>
									&nbsp;
									<a href="{{ url('admin2/kandang/hapus/'.$row->id) }}" class="btn btn-danger"
									onclick="return confirm('Anda yakin?')" > Hapus </a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>