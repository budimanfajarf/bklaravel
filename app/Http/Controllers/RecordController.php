<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Subservice;
use App\Service;
use App\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            // !Complete
            $records = Record::with('subservice','students')->orderBy('date', 'desc')->orderBy('id', 'desc')->paginate(3);            
        } else {
            $records = Record::with('subservice','students')->orderBy('date', 'desc')->orderBy('id', 'desc')->paginate(3);
        }
        return view('records.index', compact('records', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::with('subservices')->get();
        return view('records.create', compact('services'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date'          => 'required',
            'subservice_id' => 'required',
            'place'         => 'required',
            'desc'          => 'required',
            'info'          => 'required',
            'students.id.0' => 'required'
        ]);   

        // Save to record
        $record = Record::create([
            'date'          => $request->date,
            'subservice_id' => $request->subservice_id,
            'place'         => $request->place,
            'desc'          => $request->desc,
            'info'          => $request->info
        ]);    
        
        // Save to record_student
        $record->students()->attach($request->students['id']);

        return redirect('record')->with('msg', 'Bimbingan berhasil di <strong>Submit</strong>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::with('subservice','students')->findOrFail($id);
        return view('records.single', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record   = Record::with('students')->findOrFail($id);
        $services = Service::with('subservices')->get();
        return view('records.edit', compact('record','services'));         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date'          => 'required',
            'subservice_id' => 'required',
            'place'         => 'required',
            'desc'          => 'required',
            'info'          => 'required',
            'students.id.0' => 'required'
        ]);  

        $record = Record::findOrFail($id);

        // Update record
        $record->update([
            'date'          => $request->date,
            'subservice_id' => $request->subservice_id,
            'place'         => $request->place,
            'desc'          => $request->desc,
            'info'          => $request->info
        ]);    
        
        // Update record_student
        $record->students()->sync($request->students['id']);

        return redirect('record')->with('msg', 'Bimbingan berhasil di <strong>Update</strong>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Record::findOrFail($id)->delete();
        return redirect('record')->with('msg', 'Bimbingan berhasil di <strong>Hapus</strong>');
    }
}
