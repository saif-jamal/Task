<?php

namespace App\Http\Controllers;

use App\Models\medicalStaff;
use App\Models\News;
use App\Models\Patients;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::all();
        $patients=Patients::all();
        $medicalstaff=medicalStaff::all();
        $news=News::all();

        return view('home',['users'=>$users,'Patients'=>$patients,'medicalstaff'=>$medicalstaff,'news'=>$news]);
    }
}
