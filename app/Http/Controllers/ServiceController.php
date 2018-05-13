<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subservice;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     // Fungsi untuk pesan
    public function getMessage ($name, $type) {
        $msg = 'Layanan <strong>'.$name.'</strong> berhasil di <strong>'.$type.'</strong>';
        return $msg;
    }     

    public function index()
    {
        $services = Service::with("subservices")->get();
        // dd($services);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("create");
        return view('services.create');
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
            'name'    => 'required'
        ]);

        // dd("store");
        
        Service::create([
            'name'    => $request->name           
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
        // dd("edit".$id);
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
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
            'name'    => 'required'
        ]);

        // dd("update");
        $service = Service::findOrFail($id);
        $name    = $service->name;
        
        $service->update([
            'name' => $request->name           
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
        // dd("destroy");
        $service = Service::findOrFail($id);
        $name    = $service->name;
        $service->delete();        
      
        $msg = $this->getMessage($name, 'Hapus');

        return redirect('services')->with('msg', $msg); 
    }
}
