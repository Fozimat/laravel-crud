@extends('layouts.master')
@section('title', 'Edit Data Siswa')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inputs</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="{{ $siswa->nama_depan }}" placeholder="Masukkan nama depan . . .">
                                    <div class="form-group">
                                        <label for="nama_belakang">Nama Belakang</label>
                                        <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Masukkan nama depan . . ." value="{{ $siswa->nama_belakang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" class="custom-select" id="jenis_kelamin">
                                            <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" value="{{ $siswa->agama }}" name="agama" class="form-control" id="agama" placeholder="Masukkan agama . . .">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $siswa->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content1');
<h1>Edit Data Siswa</h1>
@if(session('sukses'))
<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
    {{ session('sukses') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <form action="/siswa/{{$siswa->id}}/update" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="{{ $siswa->nama_depan }}" placeholder="Masukkan nama depan . . .">
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Masukkan nama depan . . ." value="{{ $siswa->nama_belakang }}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Nama Belakang</label>
                    <select name="jenis_kelamin" class="custom-select" id="jenis_kelamin">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" value="{{ $siswa->agama }}" name="agama" class="form-control" id="agama" placeholder="Masukkan agama . . .">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $siswa->alamat }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
</div>
@endsection