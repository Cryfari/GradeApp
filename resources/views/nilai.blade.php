@extends('Base')
@section('Content')
<table class="table table-bordered table-striped">


    <div>
        <a href="{{ route('add') }}" class="btn btn-success">Tambah Baru</a>
    </div>
    <br>
    <thead>
        <tr>
            <th >No</th>
            <th >Nama</th>
            <th >Kehadiran</th>
            <th >Nilai Tugas</th>
            <th >Nilai UTS</th>
            <th >Nilai UAS</th>
            <th >Nilai Akhir</th>
            <th >Grade</th>
            <th>Ket</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($datas as $index=>$data)
            <tr>
                <td> {{ $index+1 }} </td>
                <td> {{ $data->nama }} </td>
                <td> {{ $data->kehadiran }} </td>
                <td> {{ $data->tugas }} </td>
                <td> {{ $data->uts }} </td>
                <td> {{ $data->uas }} </td>
                <td> {{ $data->akhir }} </td>
                <td>{{ $data->grade}} </td>
                <td> {{ $data->ket }} </td>
                <td>
                    <a href="{{ route('detail', $data->id) }}" class="btn btn-warning btn-sm">detail</a>
                    <a href="{{ route('update', $data->id) }}" class="btn btn-primary btn-sm">ubah</a>
                    <a href="{{ route('delete', $data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">hapus</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10"><center><h5>Data tidak ditemukan</h5></center></td>
            </tr>

        @endforelse






    </tbody>
</table>
@endsection
