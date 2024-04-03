<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\account_pengguna;
use App\Models\kendaraan;

class DashboardadminController extends Controller
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
                        return redirect('/login');
                    }
                    elseif ($Data_account->role == 'admin')
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

                        return view ('pages.portal.admin.dashboard',compact('getdatapengguna','getdataakun'));
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

    public function ViewKendaraan(Request $request)
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
                        return redirect('/login');
                    }
                    elseif ($Data_account->role == 'admin')
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

                        $getdatakendaraan =
                        [
                            'data' => kendaraan::select('*')->get(),
                        ];
                        // dd($getdatakendaraan);

                        return view ('pages.portal.admin.kendaraanview',compact('getdatapengguna','getdataakun','getdatakendaraan'));
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

    public function TambahKendaraan(Request $request)
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
                        return redirect('/login');
                    }
                    elseif ($Data_account->role == 'admin')
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

                        return view ('pages.portal.admin.kendaraantambah',compact('getdatapengguna','getdataakun'));
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

    public function createkendaraan(Request $request)
    {
        $merk = $request->input('merk');
        $model = $request->input('model');
        $plat = $request->input('plat');
        $denda = $request->input('denda');

        $record_kendaraan =
        [
            'code_kendaraan' => rand(1,999999),
            'merk_kendaraan' => $merk,
            'model_kendaraan' => $model,
            'plat_kendaraan' => $plat,
            'nominal_denda' => $denda,
            'status_kendaraan' => 'tersedia'
        ];

        // dd($record_kendaraan);

        kendaraan::create($record_kendaraan);
        return redirect('/portal/admin/kendaraan/view')->with('success-sistem', 'Berhasil ditambah');

    }




}
