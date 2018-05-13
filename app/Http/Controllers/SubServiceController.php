<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subservice;
use App\Service;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     // Fungsi untuk pesan
    public function getMessage ($name, $type) {
        $msg = 'Sub Layanan <strong>'.$name.'</strong> berhasil di <strong>'.$type.'</strong>';
        return $msg;
    }     

    public function index()
    {
        return redirect('services');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($currentServiceId)
    {
        $services = Service::All();
        return view('subservices.create', compact('services', 'currentServiceId'));
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
            'name'       => 'required',
            'service_id' => 'required'
        ]);

        // dd($request);
        
        Subservice::create([
            'name'       => $request->name,
            'service_id' => $request->service_id   
        ]);

        $msg = $this->getMessage($request->name, 'Tambah');
        
        return redirect('services')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('services');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::All();        
        // $subservice = Subservice::with('service')->where('id', $id)->first();
        $subservice = Subservice::findOrFail($id);
        return view('subservices.edit', compact('services','subservice'));
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
        // dd("update");
        $this->validate($request, [
            'name'       => 'required',
            'service_id' => 'required'
        ]);

        // dd($request);
        $subservice = Subservice::findOrFail($id);
        $name       = $subservice->name;
        
        $subservice->update([
            'name'       => $request->name,
            'service_id' => $request->service_id
        ]);

        $msg = $this->getMessage($name, 'Edit');
        
        return redirect('services')->with('msg', $msg);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subservice = Subservice::findOrFail($id);
        $name       = $subservice->name;
        $subservice->delete();        
      
        $msg = $this->getMessage($name, 'Hapus');

        return redirect('services')->with('msg', $msg); 
    }
}
