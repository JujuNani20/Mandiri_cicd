<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
        //
    }

    

    public function process(Request $request){
        $user = User::where('email', $request->email)->first();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            if(Auth::user()->getRoleNames()->first() == 'konselor')
                return redirect()->route('konselor.profile');

            if(Auth::user()->getRoleNames()->first() == 'pengguna')
                return redirect()->route('pengguna.profile');

            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Username atau password salah!');
        }


    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password"=> $request->password
        ])->assignRole('pengguna');
        Pengguna::create([
            "user_id" => $user->id,
            "nama" => $request->name,
            "jurusan" => $request->jurusan,
        ]);
        return redirect()->route('login')->with('success', 'Berhasil Mendaftarkan akun!');

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

    public function forgotPassword(){
        return view('forgot-password');
    }

    public function sendEmail(Request $request){

        $user = User::where('email', $request->email)->first();
        if($user == null)
            return redirect()->back()->with('error', 'Email tidak terdaftar di database kami');

        $to_name = $user->name;
        $to_email = $user->email;
        $data = [
            'nama' => $to_name
        ];

        Mail::send('mail.forgot', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Password Baru');

            $message->from(env('MAIL_FROM_ADDRESS'), "Pemberitahuan Lupa Password");
        });

        $user->update([
            'password' => 'qzwrsyd2'
        ]);

        return redirect()->route('login')->with('success', 'Email Berhasil Terkirim');

    }
}
