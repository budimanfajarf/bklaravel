@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Bimbingan</div>
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('msg') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>    
                    @endif                    
                    <a href="{{ url('/record/create') }}" class="btn btn-primary" role="button" >Tambah Bimbingan</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Tempat</th>
                                    <th scope="col">Uraian Kegiatan</th>
                                    <th scope="col">Keterangan</th>    
                                    <th scope="col">Siswa yang bersangkutan</th>                   <th scope="col">Aksi</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=$records->firstItem() @endphp
                                @foreach ($records as $record)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $record->date }}</td>
                                        <td>{{ $record->subservice->name }}</td> 
                                        <td>{{ $record->place }}</td>
                                        <td>{{ $record->desc }}</td> 
                                        <td>{{ $record->info }}</td> 
                                        <td>
                                            @foreach ($record->students as $student)
                                                <a href="/students/{{ $student->id }}">{{ $student->name }}</a>,&nbsp;    
                                            @endforeach
                                        </td> 
                                        <td>
                                            <a href="/record/{{ $record->id }}" class="btn btn-info btn-sm" role="button">View</a>
                                            <a href="/record/{{ $record->id }}/edit" class="btn btn-primary btn-sm" role="button">Edit</a>
                                            <form action="/record/{{ $record->id }}" method="POST" style="display:inline">
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
                    {{ $records->appends(Request::input())->render() }}                  
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
