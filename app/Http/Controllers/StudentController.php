<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    // Untuk diakses di tambah dan edit
    public $programs = array("TKJ", "TMM", "TEI");

    // Fungsi untuk mendapatkan kelas siswa
    public function getClass ($level, $program, $room) {
        return $level.' '.$program.' '.$room;
    }

    // Fungsi untuk pesan
    public function getMessage ($code, $type) {
        $msg = 'Siswa dengan NIS <strong>'.$code.'</strong> berhasil di <strong>'.$type.'</strong>';
        return $msg;
    }
    
    public function index()
    {
        $students = Student::paginate(5);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = $this->programs;
        return view('students.create', compact('programs'));
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
            'code'    => 'required|digits_between:9,10',
            'name'    => 'required',
            'level'   => 'required',
            'program' => 'required',
            'room'    => 'required'
        ]);

        $class = $this->getClass($request->level, $request->program, $request->room);

        Student::create([
            'code'    => $request->code,
            'name'    => $request->name,
            'level'   => $request->level,
            'program' => $request->program,
            'room'    => $request->room,
            'class'   => $class            
        ]);   

        $msg = $this->getMessage($request->code, 'Tambah');
        
        return redirect('students')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.single', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $programs = $this->programs;
        return view('students.edit', compact('student', 'programs'));
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
            'code'    => 'required|digits_between:9,10',
            'name'    => 'required',
            'level'   => 'required',
            'program' => 'required',
            'room'    => 'required'
        ]);

        $class = $this->getClass($request->level, $request->program, $request->room);

        $student = Student::findOrFail($id);
        $code    = $student->code;

        $student->update([
            'code'    => $request->code,
            'name'    => $request->name,
            'level'   => $request->level,
            'program' => $request->program,
            'room'    => $request->room,
            'class'   => $class            
        ]);   

        $msg = $this->getMessage($code, 'Edit');
        
        return redirect('students')->with('msg', $msg);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $code    = $student->code;
        $student->delete();        
      
        $msg = $this->getMessage($code, 'Hapus');

        return redirect('students')->with('msg', $msg); 
    }

    public function api($search = null)
    {
        if($search != null)
        {
            $students = Student::where('name', 'like', '%'.$search.'%')->orWhere('code', 'like', '%'.$search.'%')->get();
            return $students;    
        }
    }
}
