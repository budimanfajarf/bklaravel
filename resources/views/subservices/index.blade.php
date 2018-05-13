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
                                <strong class="lead">{{ $service->name }}</strong>
                                &nbsp;&nbsp;
                                <a href="/subservices/{{ $service->id }}/create"><span class="badge badge-primary badge-pill" style="font-size:100%">Add</span></a>                                
                                <a href="/services/{{ $service->id }}/edit"><span class="badge badge-primary badge-pill" style="font-size:100%">Edit</span></a>
                                <form action="/services/{{ $service->id }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">  
                                    <button class="btn badge badge-danger badge-pill" style="font-size:100%">Delete</button>
                                </form>                                 
                                <ul class="list-group list-group-flush">
                                @foreach ($service->subservices as $subservice)
                                    <li class="list-group-item">{{ $subservice->name }}
                                        &nbsp;&nbsp;
                                        <a href="/subservices/{{ $subservice->id }}/edit" style="font-size: 110%;"><span class="badge badge-primary badge-pill">Edit</span></a>
                                        <a href="" style="font-size: 110%;"><span class="badge badge-danger badge-pill">Delete</span></a>
                                    </li>
                                @endforeach
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
