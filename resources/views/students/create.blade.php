@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">Tambah Siswa</div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </div>
                    @endif                     
                    <form action="/students" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="code">NIS</label>
                                <input name="code" type="text" class="form-control" placeholder="Nomor Induk Siswa" value="{{ old('code') }}" >
                            </div>
                                <div class="form-group col-md-8">
                                <label for="name">Nama</label>
                                <input name="name" type="text" class="form-control" placeholder="Nama Siswa" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="level">Tingkat</label>
                                <select name="level" class="form-control">
                                    <option></option>
                                    @for ($i = 10; $i <= 12; $i++)
                                        <option {{ old('level') == $i ? 'selected' : ''}}>
                                            {{ $i }}
                                        </option>
                                    @endfor    
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="program">Jurusan</label>
                                <select name="program" class="form-control">
                                    <option></option>
                                    @foreach ($programs as $program)
                                        <option {{ old('program') == $program ? 'selected' : ''}}>{{ $program }}</option>
                                    @endforeach          
                                </select>
                            </div>    
                            <div class="form-group col-md-4">
                                <label for="room">Ruangan</label>
                                <select name="room" class="form-control">
                                    <option></option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option {{ old('room') == $i ? 'selected' : ''}}>
                                            {{ $i }}
                                        </option>
                                    @endfor 
                                </select>
                            </div>                                                    
                        </div>
                        {{ csrf_field() }}
                        <div class="text-right" role="group">
                            <a href="/students" class="btn btn-danger" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
