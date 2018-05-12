@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">View Siswa</div>
                <div class="card-body">                  
                    <form action="/students/{{ $student->id }}" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="code">NIS</label>
                                <input name="code" type="text" class="form-control" placeholder="Nomor Induk Siswa" value="{{ $student->code }}" >
                            </div>
                            <div class="form-group col-md-5">
                                <label for="name">Nama</label>
                                <input name="name" type="text" class="form-control" placeholder="Nama Siswa" value="{{ $student->name }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="class">Kelas</label>
                                <input name="class" type="text" class="form-control" placeholder="Kelas Siswa" value="{{ $student->class }}">
                            </div>                            
                        </div>
                        <div class="text-right" role="group">
                            <a href="/students" class="btn btn-info" role="button">Back</a>
                            <a href="/students/{{ $student->id }}/edit" class="btn btn-primary" role="button">Edit</a>
                            <form action="/students/{{ $student->id }}" method="POST" style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">  
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
