<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Models\account_pengguna;


abstract class Controller
{
    //
    public function validationlogin($idsession)
    {
        if(is_null($idsession))
        {
            $message = 'invalid';
            return $message;
        }
        else
        {
            $message = 'Success';
            return $message;
        }
    }

    public function getdatapengguna($idsession)
    {
        $Data_account = pengguna::where('code_account',$idsession)->first();
        return $Data_account;
    }
    public function getdataakun($idsession)
    {
        $Data_account = account_pengguna::where('code_account',$idsession)->first();
        return $Data_account;
    }

}
