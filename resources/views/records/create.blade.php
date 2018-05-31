@extends('layouts.app')

@section('content')
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 
<script src="{{ asset('js/students.js') }}"></script> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Tambah Bimbingan</div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </div>
                    @endif                     
                    <form action="/record" method="POST" class="row">
                        <div class="col-md-6">
                            <div class="card-header text-center">Rincian Kegiatan</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input name="date" type="date" class="form-control" value="{{ old('date') }}" >
                                </div>  
                                <div class="form-group">
                                    <label for="subservice_id">Kegiatan</label>
                                    <select name="subservice_id" class="form-control">
                                        <option></option>
                                        @foreach ($services as $service)
                                            <optgroup label="{{ $service->name }}">
                                            @foreach ($service->subservices as $subservice)
                                                <option value="{{ $subservice->id }}" {{ old('subservice_id') == $subservice->id ? 'selected' : '' }}
                                                >{{ $subservice->name }}</option>
                                            @endforeach    
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="place">Tempat</label>
                                    <input name="place" type="text" class="form-control" value="{{ old('place') }}" >
                                </div>
                                <div class="form-group">
                                    <label for="desc">Uraian Kegiatan</label>
                                    <textarea name="desc" rows="4" class="form-control">{{ old('desc') }}</textarea>
                                </div>   
                                <div class="form-group">
                                    <label for="info">Keterangan</label>
                                    <textarea name="info" rows="2" class="form-control">{{ old('info') }}</textarea>
                                </div>                
                            </div>                   
                        </div>
                        <div class="col-md-6">
                            <div class="card-header text-center">Siswa yang Bersangkutan</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="search">Cari Siswa</label>
                                    <input name="search" id="search" type="text" class="form-control" autocomplete="off" placeholder="Cari Siswa dengan Nama atau Nim" >
                                </div>
                                <div id="table_container"></div>
                                <br>
                                <div id="table_added_container">
                                    @if (old("students"))
                                        <label>Siswa yang sudah ditambahkan</label>
                                        <table id="table_added" class="table table-striped">
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>                                     
                                        @foreach (old("students") as $student)                  <tr>
                                                <td>How???? {{ $student }}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>  
                        </div>
                        {{ csrf_field() }}
                        <div class="col-md-12 text-right" role="group">
                            <br>
                            <a href="/record" class="btn btn-danger btn-lg" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                        </div>                        
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
