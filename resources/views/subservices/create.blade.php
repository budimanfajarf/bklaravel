@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">Tambah Sub Layanan</div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </div>
                    @endif                     
                    <form action="/subservices" method="POST">
                        <div class="form-group">
                            <label for="service_id">Sub layanan dari</label>
                            <select name="service_id" class="form-control">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        @if (old('service_id'))
                                            @if (old('service_id') == $service->id)
                                                selected
                                            @endif
                                        @else
                                            @if ($currentServiceId == $service->id)
                                                selected
                                            @endif
                                        @endif                                          
                                    >{{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label for="name">Nama Sub Layanan</label>
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
