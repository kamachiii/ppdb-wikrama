<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $web = true;
        $payments = Payment::get();
        foreach ($payments as $payment) {
            if($payment->user == Auth::user()->password) {
                $web = false;
            }
        }
        return view('partials.dashboard', compact('web'))
                ->with(['title' => 'Dashboard']);
    }

    public function payment()
    {
        $web = true;
        $payments = Payment::get();
        foreach ($payments as $payment) {
            if($payment->user == Auth::user()->password) {
                $web = false;
            }
        }

        if($web == false) {
            return redirect()->route('dashboard');
        }
        return view('student.payment')
            ->with(['title' => 'Payment']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePayment(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'nama' => 'required',
            'nominal' => 'required',
            'image' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png',
        ]);

        $students = Student::get();
        foreach($students as $student){
            if($student->nama == $request->username){
                $data = $student->nisn;
            }
        }

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSave = $filename . '' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/img', $filenameSave);
        } else {
            $filenameSave = 'noimage.jpg';
        }

        Payment::create([
            'user' => Auth::user()->password,
            'bank' => $request->bank,
            'nama' => $request->nama,
            'nominal' => $request->nominal,
            'image' => $filenameSave,
        ]);

        return redirect()->route('payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
