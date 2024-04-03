<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\account_pengguna;
use App\Models\pengguna;

class AccountPenggunaController extends Controller
{
    public function Login(Request $request)
    {
        return view ('pages.login');
    }

    public function Register(Request $request)
    {
        return view ('pages.register');
    }

    public function Val_Register(Request $request)
    {
        $email = $request->input('email');
        $password = hash('sha256',$request->input('password'));
        $nama = $request->input('nama');
        $tlp = $request->input('tlp');
        $sim = $request->input('sim');
        $alamat = $request->input('alamat');

        $Data_account = account_pengguna::where('email',$email)->first();
        if(is_null($Data_account))
        {

            $cd_account =rand(1,99999999);
            $record_account =
                [
                    'user_id' => rand(1,9999),
                    'code_account' => $cd_account,
                    'email' => $email,
                    'password' => $password,
                    'status_account' => 'active',
                    'role' => 'pengguna'

                ];

                $record_pengguna =
                [
                    'code_pengguna' => rand(1,99999999),
                    'code_account' => $cd_account,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'no_hp' => $tlp,
                    'no_sim' => $sim

                ];

                account_pengguna::create($record_account);
                pengguna::create($record_pengguna);

                return redirect('/login')->with('success-SignIn', 'Berhasil terdaftar');

        }
        else
        {
            return redirect('/login')->with('error-SignIn', 'Akun terdaftar');
        }


        dd($email,$password,$nama,$tlp,$sim,$alamat);
    }

    public function Val_Login(Request $request)
    {
        $email = $request->input('email');
        $password = hash('sha256',$request->input('password'));

        $Data_email = account_pengguna::where('email',$email)->first();
        if($Data_email)
        {
            $Data_pass = account_pengguna::where('password',$password)->first();
            if($Data_pass)
            {
                if($Data_pass->status_account == 'active')
                {
                    if($Data_pass->role == 'pengguna')
                    {

                        $request->session()->put('idcode', $Data_pass->code_account);
                        return redirect('/portal/pengguna/dashboard');
                    }
                    elseif ($Data_pass->role == 'admin')
                    {
                        $request->session()->put('idcode', $Data_pass->code_account);
                        return redirect('/portal/admin/dashboard');
                    }
                    elseif ($Data_pass->role == 'super_admin')
                    {
                        return redirect('/portal/super-admin');
                    }
                    else
                    {
                        return redirect('/login')->with('error-SignIn', 'Maaf akun ini tidak memiliki role');
                    }
                }
                else
                {
                    return redirect('/login')->with('error-SignIn', 'Maaf akun anda telah di Nonaktifkan');
                }

            }
            else
            {
                return redirect('/login')->with('error-SignIn', 'Password Anda Salah');
            }
        }
        else
        {
            return redirect('/login')->with('error-SignIn', 'Email Belum Terdaftar');
        }
    }

    public function Logout(Request $request)
    {
        $request->session()->forget('idcode');
        return redirect('/login')->with('success-SignIn', 'Berhasil keluar');
    }
}
