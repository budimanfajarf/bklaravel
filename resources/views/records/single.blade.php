@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">View Bimbingan</div>
                <div class="card-body">                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header text-center">Rincian Kegiatan</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input name="date" type="date" readonly class="form-control" value="{{ $record->date }}" >
                                </div>  
                                <div class="form-group">
                                    <label for="subservice">Kegiatan</label>
                                    <input name="subservice" type="text" readonly class="form-control" value="{{ $record->subservice->name }}" >         
                                </div> 
                                <div class="form-group">
                                    <label for="place">Tempat</label>
                                    <input name="place" type="text" readonly class="form-control" value="{{ $record->place }}" >
                                </div>
                                <div class="form-group">
                                    <label for="desc">Uraian Kegiatan</label>
                                    <textarea name="desc" readonly class="form-control"> {{ $record->desc }}</textarea>
                                </div>   
                                <div class="form-group">
                                    <label for="info">Keterangan</label>
                                    <textarea name="info" readonly class="form-control">{{ $record->info }}</textarea>
                                </div>                
                            </div>                   
                        </div>
                        <div class="col-md-6">
                            <div class="card-header text-center">Siswa yang Bersangkutan</div>
                            <div class="card-body">
                                <div id="table_added_container">
                                    <table id="table_added" class="table table-striped">
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                        </tr>  
                                    @foreach ($record->students as $student)
                                        <tr>
                                            <td>{{ $student["code"] }}</td>
                                            <td>{{ $student["name"] }}</td>
                                            <td>{{ $student["class"] }}</td>
                                        </tr>
                                    @endforeach
                                    </table>
                                </div>
                            </div>  
                        </div>
                        {{ csrf_field() }}
                        <div class="col-md-12 text-right" role="group">
                            <br>
                            <a href="/record" class="btn btn-secondary btn-lg" role="button">Back</a>
                            <form action="/record/{{ $record->id }}" method="POST" style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">  
                                <button class="btn btn-danger btn-lg">Delete</button>
                            </form>
                            <a href="/record/{{ $record->id }}/edit" class="btn btn-primary btn-lg" role="button">Edit</a>                            
                            <a href="/record/{{ $record->id }}/pdf" class="btn btn-info btn-lg" role="button">Print</a>
                        </div>                        
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
