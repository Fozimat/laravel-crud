@extends('layouts.master')
@section('title', 'Data Siswa')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Siswa</h3>
                            <div class="right">
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                    <i class="lnr lnr-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NAMA DEPAN</th>
                                        <th scope="col">NAMA BELAKANG</th>
                                        <th scope="col">JENIS KELAMIN</th>
                                        <th scope="col">AGAMA</th>
                                        <th scope="col">ALAMAT</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_siswa as $siswa)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_depan }}</td></a>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang }}</td></a>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>
                                            <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE HOVER -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Masukkan nama depan . . .">
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Masukkan nama depan . . .">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email . . .">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" class="custom-select" id="jenis_kelamin">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" name="agama" class="form-control" id="agama" placeholder="Masukkan agama . . .">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
    @stop