<?php

namespace App\Http\Controllers;

use App\Models\Suratmasuk;
use App\Models\Suratkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $totalsuratkeluar = Suratkeluar::where('email_user', Auth::user()->email)->count('id');
        $totalsuratmasuk = Suratmasuk::where('email_user', Auth::user()->email)->count('id');
        if (Auth::check()){
            return view('kontendashboard', [
                'totalsuratkeluar' => $totalsuratkeluar,
                'totalsuratmasuk' => $totalsuratmasuk
            ]);
        }else{
            return redirect()->route('login');
        }
        
        
    }

}
