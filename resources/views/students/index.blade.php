@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Siswa</div>
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('msg') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>    
                    @endif                    
                    <a href="{{ url('/students/create') }}" class="btn btn-primary" role="button" >Tambah Siswa</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=$students->firstItem() @endphp
                                @foreach ($students as $student)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $student->code }}</td>
                                        <td>{{ $student->name }}</td> 
                                        <td>{{ $student->class }}</td> 
                                        <td>
                                            <a href="/students/{{ $student->id }}" class="btn btn-info btn-sm" role="button">View</a>
                                            <a href="/students/{{ $student->id }}/edit" class="btn btn-primary btn-sm" role="button">Edit</a>
                                            <form action="/students/{{ $student->id }}" method="POST" style="display:inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">  
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td> 
                                    </tr>  
                                    @php $i++ @endphp                              
                                @endforeach
                            </tbody>
                        </table> 
                    </div> 
                    {{ $students->appends(Request::input())->render() }}                  
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
