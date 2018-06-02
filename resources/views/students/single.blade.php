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
                                <input name="code" type="text" class="form-control" placeholder="Nomor Induk Siswa" value="{{ $student->code }}" readonly>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="name">Nama</label>
                                <input name="name" type="text" class="form-control" placeholder="Nama Siswa" value="{{ $student->name }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="class">Kelas</label>
                                <input name="class" type="text" class="form-control" placeholder="Kelas Siswa" value="{{ $student->class }}" readonly>
                            </div>                            
                        </div>
                        <div class="text-right" role="group">
                            <a href="/students" class="btn btn-secondary" role="button">Back</a>
                            <a href="/students/{{ $student->id }}/edit" class="btn btn-primary" role="button">Edit</a>
                            <form action="/students/{{ $student->id }}" method="POST" style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" readonly>  
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </form> 
                    <br>
                    @if ($student->records()->count())
                        <div class="card-header text-center">Bimbingan yang telah dilaksanakan oleh {{ $student->name }}</div>
                        <div class="card-body table-responsive">                        
                            <table class="table table-striped">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kegiatan</th>
                                        <th scope="col">Aksi</th>                         
                                    </tr>
                                @foreach ($student->records()->orderBy('date', 'desc')->get() as $index => $record)
                                    <tr>
                                        <td> {{ $index+1 }} </td>
                                        <td> {{ $record->date }} </td>
                                        <td> {{ $record->subservice->name }} </td>
                                        <td>
                                            <a href="/record/{{ $record->id }}" class="btn btn-outline-info btn-sm" role="button">View</a>
                                        </td>                                
                                    </tr>
                                @endforeach
                                </table> 
                        </div>                                                        
                    @else
                        <div class="card-header text-center">Belum ada bimbingan yang dilaksanakan oleh {{ $student->name }} </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
