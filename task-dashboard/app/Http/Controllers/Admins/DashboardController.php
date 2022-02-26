<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\medicalStaff;
use App\Models\News;
use App\Models\Patients;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){

        $users=User::all();
        $patients=Patients::all();
        $medicalstaff=medicalStaff::all();
        $news=News::all();

        return view('Dashboard.Dashboard',['users'=>$users,'Patients'=>$patients,'medicalstaff'=>$medicalstaff,'news'=>$news]);
    }
}
