@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">Tambah Layanan</div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </div>
                    @endif                     
                    <form action="/services" method="POST">
                        <div class="form-group">
                            <label for="name">Nama Layanan</label>
                            <input name="name" type="text" class="form-control" placeholder="Nama Layanan" value="{{ old('name') }}" >
                        </div>
                        {{ csrf_field() }}
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
