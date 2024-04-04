<?php

namespace App\Http\Controllers\Konselor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class KonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        return view('konselor.profile');
    }

    public function profileUpdateFoto(Request $request){
        $this->validate($request, [
            'image'  =>'required',
        ]);

        $file = $request->image;
        $path = 'files/konselor/profile/';
        $nameFile = $file->getClientOriginalName();
        if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
        $file->move($path, $nameFile);

        Auth::user()->update([ 
            'image'  => $path.$nameFile
        ]);

        return redirect()->route('konselor.profile')->with('success', 'Foto Profil telah diubah!');
    }


    public function profileUpdate(Request $request){
        $this->validate($request, [
            'current_password'  =>'required',
            'password'          => 'required|confirmed',
        ]);

        if(!Hash::check($request->current_password, Auth::user()->password))
            return redirect()->route('konselor.profile')->with('error', 'Password sekarang tidak cocok!');

        Auth::user()->update([
            'password'  => $request->password
        ]);

        return redirect()->route('konselor.profile')->with('success', 'Password telah diubah!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
