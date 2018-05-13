@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">Edit Siswa</div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </div>
                    @endif                     
                    <form action="/services/{{ $service->id }}" method="POST">
                        <div class="form-group">
                            <label for="name">Nama Layanan</label>
                            <input name="name" type="text" class="form-control" placeholder="Nama Layanan" value="{{ old('name') ? old('name') : $service->name }}" >
                        </div>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="text-right" role="group">
                            <a href="/services" class="btn btn-danger" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
