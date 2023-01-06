<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function createStudent()
    {
        return view('register');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'jk' => 'required',
            'nama' => 'required',
            'smp' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'no_hp_ayah' => 'required',
            'no_hp_ibu' => 'required',
            'referensi' => 'required',
        ]);

        Student::create([
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'nama' => $request->nama,
            'smp' => $request->smp,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_hp_ayah' => $request->no_hp_ayah,
            'no_hp_ibu' => $request->no_hp_ibu,
            'referensi' => $request->referensi,
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->nisn),
        ]);

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('pdf', $request->nisn);
    }

    public function pdfStudent($nisn)
    {
        $student = Student::get();
        $student = Student::where('nisn', $nisn)->first();
        return view('pdf', compact('student'));
    }

}
