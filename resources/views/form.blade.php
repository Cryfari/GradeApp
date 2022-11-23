@extends('Base')
@section('Content')
<div class="container px-5 my-5">
    <form method="post" action="{{  isset($data)? route('updateprocess', [$data->id, $data->image]) : route('addprocess') }}" enctype="multipart/form-data">
        @csrf
        @if (isset($data))
            @method('put')
        @endif
        <div class="form-floating mb-3">
            <input class="form-control" name="nama"  type="text" placeholder="Nama" data-sb-validations="required" value="{{ isset($data) ? $data->nama:'' }}"/>
            <label for="nama">Nama</label>
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="kehadiran" type="number" min=0 max=15 placeholder="Kehadiran" data-sb-validations="required" value="{{ isset($data) ? $data->kehadiran:'' }}" />
            <label for="kehadiran">Kehadiran</label>
            <div class="invalid-feedback" data-sb-feedback="kehadiran:required">Kehadiran is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="tugas" type="number" min=0 max=100 placeholder="Nilai Tugas" data-sb-validations="required" value="{{ isset($data) ? $data->tugas:'' }}" />
            <label for="nilaiTugas">Nilai Tugas</label>
            <div class="invalid-feedback" data-sb-feedback="nilaiTugas:required">Nilai Tugas is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="uts" type="number" min=0 max=100 placeholder="Nilai UTS" data-sb-validations="required" value="{{ isset($data) ? $data->uts:'' }}" />
            <label for="nilaiUts">Nilai UTS</label>
            <div class="invalid-feedback" data-sb-feedback="nilaiUts:required">Nilai UTS is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="uas" type="number" min=0 max=100 placeholder="Nilai UAS" data-sb-validations="required" value="{{ isset($data) ? $data->uas:'' }}" />
            <label for="nilaiUas">Nilai UAS</label>
            <div class="invalid-feedback" data-sb-feedback="nilaiUas:required">Nilai UAS is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input name="image" type="file" name="image" data-sb-validations="required" accept="image/*"/>
            <div class="invalid-feedback" data-sb-feedback="gambar:required">Gambar is required.</div>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
