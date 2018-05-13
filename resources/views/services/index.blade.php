@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Layanan</div>
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('msg') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>    
                    @endif                    
                    <a href="{{ url('/services/create') }}" class="btn btn-primary" role="button" >Tambah Layanan</a>
                    <br><br>
                    <ul class="list-group">
                        @foreach ($services as $service)
                            <li class="list-group-item">
                                <div style="padding: 10px;">
                                    <strong class="lead" style="font-weight: 600">{{ $service->name }}</strong>
                                    &nbsp;&nbsp;                         
                                    <a href="/services/{{ $service->id }}/edit" class="btn btn-primary">Edit</a>
                                    <form action="/services/{{ $service->id }}" method="POST" style="display:inline">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">  
                                        <button class="btn btn-danger">Delete</button>
                                    </form> 
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($service->subservices as $subservice)
                                        <li class="list-group-item">{{ $subservice->name }}
                                            &nbsp;&nbsp;
                                            <a href="/subservices/{{ $subservice->id }}/edit" class="btn btn-outline-primary btn-sm">Edit</a>
                                            <form action="/subservices/{{ $subservice->id }}" method="POST" style="display:inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">  
                                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>                                         
                                        </li>
                                    @endforeach
                                    <li class="list-group-item">
                                        <a href="/subservices/{{ $service->id }}/create"><span class="btn btn-outline-primary btn-sm">Tambah sub Layanan</span></a>
                                    </li>
                                </ul>
                            </li>
                        @endforeach                           
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
