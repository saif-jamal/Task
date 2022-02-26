<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalstaffRequest;
use App\Models\medicalStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class medicalStaffController extends Controller
{
    //show  page of info
    public function index(){
        $medicalstaffs=medicalStaff::all();
        return view('Dashboard.Medicalstaff.medicalstaff',['medicalstaff'=>$medicalstaffs]);
    }


    //view
    public function view($id){
        $medicalstaff=medicalStaff::findOrFail($id);
        return view('Dashboard.Medicalstaff.medicalstaffview',['medicalstaff'=>$medicalstaff]);
    }

    //create
    public function create(){
        return view('Dashboard.Medicalstaff.create');
    }


    //store
    public function store(MedicalstaffRequest $request){

        //save image or pdf file
        $image="";
        if($request->hasFile('image')){
            $image = "medicalstaff_" . time() . '_' . rand(0, 1000) . '.' . $request['image']->extension();
            $request['image']->move(public_path('/medicalstaff/img/'), $image);
        }

        medicalStaff::create([
            'name'=>$request->name,
            'specialty'=>$request->specialty,
            'image'=>$image,
        ]);

        return redirect()->route('medicalstaffs')->with(['create_medicalstaff'=>'medical staff added success']);

    }

    //edit
    public function edit($id){
        $medicalstaff=medicalStaff::findOrFail($id);

        return view('Dashboard.Medicalstaff.update',['medicalstaff'=>$medicalstaff]);
    }

    //update
    public function update(Request $request){
        $medicalstaff=medicalStaff::findOrFail($request->medicalstaff_id);

        //save image or pdf file
        $image="";

        if($request->hasFile('image')){

            if (File::exists(public_path('/medicalstaff/img/' . $medicalstaff->image))) {
                File::delete(public_path('/medicalstaff/img/' . $medicalstaff->image));
            }

            $image = "medicalstaff_" . time() . '_' . rand(0, 1000) . '.' . $request['image']->extension();
            $request['image']->move(public_path('/medicalstaff/img/'), $image);

        }

        $medicalstaff->update([
            'name'=>$request->name,
            'specialty'=>$request->specialty,
            'image'=>$image,
        ]);

        return redirect()->route('medicalstaffs')->with(['medicalstaff_updated'=>'updated successfully']);
    }

    //delete
    public function delete($id){
        $medicalstaff=medicalStaff::findOrFail($id);


            if (File::exists(public_path('/medicalstaff/img/' . $medicalstaff->image))) {
                File::delete(public_path('/medicalstaff/img/' . $medicalstaff->image));
            }


        $medicalstaff->delete();
        return redirect()->route('medicalstaffs')->with(['medicalstaff_deleted'=>'done!']);

    }




}


















