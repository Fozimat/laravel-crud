<table class="table" style="border: 1px solid #ddd">
	<thead>
		<tr>
			<td>NAMA LENGKAP</td>
			<td>JENIS KELAMIN</td>
			<td>AGAMA</td>
			<td>RATA-RATA NILAI</td>
		</tr>
	</thead>
	<tbody>
		@foreach($siswa as $s)
			<tr>
				<td>{{ $s->nama_lengkap() }}</td>
				<td>{{ $s->jenis_kelamin }}</td>
				<td>{{ $s->agama }}</td>
				<td>{{ $s->rataRataNilai() }}</td>
			</tr>
		@endforeach
	</tbody>
</table>