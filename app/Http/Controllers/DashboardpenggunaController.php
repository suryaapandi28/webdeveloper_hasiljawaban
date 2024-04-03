<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\account_pengguna;
use App\Models\peminjaman_kendaraan;
use App\Models\kendaraan;

class DashboardpenggunaController extends Controller
{
    public function Dashboard(Request $request)
    {
        $idsess =    $request->session()->get('idcode');
        $getsessionval =$this->validationlogin($idsess);
        if($getsessionval == 'invalid')
        {
            return redirect('/login')->with('error-SignIn', 'Anda Harus Login');
        }
        else
        {
            $Data_account = account_pengguna::where('code_account',$idsess)->first();
                if($Data_account->role == 'pengguna')
                    {
                        $getyourdataviewpengguna = $this->getdatapengguna($idsess);
                        $getyourdataviewakun = $this->getdataakun($idsess);

                        $getdatapengguna =
                        [
                            'nama_akun' => $getyourdataviewpengguna->nama,
                        ];

                        $getdataakun =
                        [
                            'role' => $getyourdataviewakun->role,
                        ];

                        return view ('pages.portal.pengguna.dashboard',compact('getdatapengguna','getdataakun'));
                    }
                    elseif ($Data_account->role == 'admin')
                    {
                        return redirect('/login');
                    }
                    elseif ($Data_account->role == 'super_admin')
                    {
                        return redirect('/login');
                    }
                    else
                    {
                        return redirect('/login')->with('error-SignIn', 'Maaf akun ini tidak memiliki role');
                    }


        }
    }

    public function Viewpinjam(Request $request)
    {
        $idsess =    $request->session()->get('idcode');
        $getsessionval =$this->validationlogin($idsess);
        if($getsessionval == 'invalid')
        {
            return redirect('/login')->with('error-SignIn', 'Anda Harus Login');
        }
        else
        {
            $Data_account = account_pengguna::where('code_account',$idsess)->first();
                if($Data_account->role == 'pengguna')
                    {
                        $getyourdataviewpengguna = $this->getdatapengguna($idsess);
                        $getyourdataviewakun = $this->getdataakun($idsess);


                        $getdatapengguna =
                        [
                            'nama_akun' => $getyourdataviewpengguna->nama,
                        ];

                        $getdataakun =
                        [
                            'role' => $getyourdataviewakun->role,
                        ];
                        $getdatapeminjam =
                        [
                            'data' => peminjaman_kendaraan::select('*')->get(),
                        ];

                        return view ('pages.portal.pengguna.peminjamanview',compact('getdatapengguna','getdataakun','getdatapeminjam'));
                    }
                    elseif ($Data_account->role == 'admin')
                    {
                        return redirect('/login');
                    }
                    elseif ($Data_account->role == 'super_admin')
                    {
                        return redirect('/login');
                    }
                    else
                    {
                        return redirect('/login')->with('error-SignIn', 'Maaf akun ini tidak memiliki role');
                    }


        }
    }

    public function Tambahpinjam(Request $request)
    {
        $idsess =    $request->session()->get('idcode');
        $getsessionval =$this->validationlogin($idsess);
        if($getsessionval == 'invalid')
        {
            return redirect('/login')->with('error-SignIn', 'Anda Harus Login');
        }
        else
        {
            $Data_account = account_pengguna::where('code_account',$idsess)->first();
                if($Data_account->role == 'pengguna')
                    {
                        $getyourdataviewpengguna = $this->getdatapengguna($idsess);
                        $getyourdataviewakun = $this->getdataakun($idsess);


                        $getdatapengguna =
                        [
                            'nama_akun' => $getyourdataviewpengguna->nama,
                        ];

                        $getdataakun =
                        [
                            'role' => $getyourdataviewakun->role,
                        ];

                        $getdatakendaraan =
                        [
                            'data' => kendaraan::select('*')->where('status_kendaraan','tersedia')->get(),
                        ];

                        // dd($getdatakendaraan);

                        return view ('pages.portal.pengguna.peminjamantambah',compact('getdatapengguna','getdataakun','getdatakendaraan'));
                    }
                    elseif ($Data_account->role == 'admin')
                    {
                        return redirect('/login');
                    }
                    elseif ($Data_account->role == 'super_admin')
                    {
                        return redirect('/login');
                    }
                    else
                    {
                        return redirect('/login')->with('error-SignIn', 'Maaf akun ini tidak memiliki role');
                    }


        }
    }
    public function Tambahnextpinjam(Request $request,$idkendaraan)
    {
        $idsess =    $request->session()->get('idcode');
        $getsessionval =$this->validationlogin($idsess);
        if($getsessionval == 'invalid')
        {
            return redirect('/login')->with('error-SignIn', 'Anda Harus Login');
        }
        else
        {
            $Data_account = account_pengguna::where('code_account',$idsess)->first();
                if($Data_account->role == 'pengguna')
                    {

                        $getyourdataviewpengguna = $this->getdatapengguna($idsess);
                        $getyourdataviewakun = $this->getdataakun($idsess);
                        $getyourdataviewkendaraan = kendaraan::select('*')->get();

                        $getdatapengguna =
                        [
                            'nama_akun' => $getyourdataviewpengguna->nama,
                        ];

                        $getdataakun =
                        [
                            'role' => $getyourdataviewakun->role,
                        ];

                        // dd($getdatakendaraan);

                        return view ('pages.portal.pengguna.peminjamannextambah',compact('getdatapengguna','getdataakun'));
                    }
                    elseif ($Data_account->role == 'admin')
                    {
                        return redirect('/login');
                    }
                    elseif ($Data_account->role == 'super_admin')
                    {
                        return redirect('/login');
                    }
                    else
                    {
                        return redirect('/login')->with('error-SignIn', 'Maaf akun ini tidak memiliki role');
                    }


        }
    }

    public function createpeminjam(Request $request)
    {

    }
}
