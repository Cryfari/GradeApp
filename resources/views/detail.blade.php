@extends('Base')
@section('Content')
<div class="container">
    <div>
        <a href="{{ route('nilai') }}" class="btn btn-success">Kembali ke Daftar</a>
    </div>
    <br>
    <div class="m-auto w-50 border border-1 border-primary p-5 shadow mb-3">
        <center><img src="{{ asset('storage/images/'.$data->image) }}" alt="logo" class="img-fluid"></center>
        <h2 class="mt-4">{{$data->nama}}</h2>
        <br>
        <p>Kehadiran : {{$data->kehadiran}}</p>
        <p>Nilai Tugas : {{$data->tugas}}</p>
        <p>Nilai UTS : {{$data->uts}}</p>
        <p>Nilai UAS : {{$data->uas}}</p>
        <p>Nilai Akhir : {{$data->akhir}}</p>
        <p>Grade : {{$data->grade}}</p>
        <center><h1>{{$data->ket}}</h1></center>
    </div>
</div>
@endsection
