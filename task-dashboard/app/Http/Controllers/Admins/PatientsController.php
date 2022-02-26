<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PatientsController extends Controller
{
    //show  page of info
    public function index(){
        $patients=Patients::all();
        return view('Dashboard.Patients.Patients',['patients'=>$patients]);
    }

    //view
    public function view($id){
      $patient=Patients::findOrFail($id);
      return view('Dashboard.Patients.patientview',['patient'=>$patient]);
    }

    //create
    public function create(){
       return view('Dashboard.Patients.create');
    }


    //store
    public function store(PatientRequest $request){

         //save image or pdf file
        $imageOrpdf="";
        $type='';
        if($request->hasFile('result')){
            if($request['result']->extension()=='jpg'||$request['result']->extension()=='jpeg' ||$request['result']->extension()=='png') {
                $imageOrpdf = "patient_" . time() . '_' . rand(0, 1000) . '.' . $request['result']->extension();
                $request['result']->move(public_path('/patients/img'), $imageOrpdf);
                $type='image';
            }else{
                $imageOrpdf = "patient_" . time() . '_' . rand(0, 1000) . '.' . $request['result']->extension();
                $request['result']->move(public_path('/patients/pdf'), $imageOrpdf);
                $type='pdf';
            }
        }

        Patients::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'result'=>$imageOrpdf,
            'type'=>$type
        ]);

        return redirect()->route('patients')->with(['create_patient'=>'patient added success']);

    }

   //edit
    public function edit($id){
        $patient2=Patients::findOrFail($id);

        return view('Dashboard.Patients.update',['patient'=>$patient2]);
    }

    //update
    public function update(Request $request){
        $patient=Patients::findOrFail($request->patient_id);

        //save image or pdf file
        $imageOrpdf=$patient->result;
        $type=$patient->type;

        if($request->hasFile('result')){

            if($patient->type==='image') {
                if (File::exists(public_path('/patients/img/' . $patient->result))) {
                    File::delete(public_path('/patients/img/' . $patient->result));
                }
            }else{
                if (File::exists(public_path('/patients/pdf/' . $patient->result))) {
                    File::delete(public_path('/patients/pdf/' . $patient->result));
                }
            }

            if($request['result']->extension()=='jpg'||$request['result']->extension()=='jpeg' ||$request['result']->extension()=='png') {
                $imageOrpdf = "patient_" . time() . '_' . rand(0, 1000) . '.' . $request['result']->extension();
                $request['result']->move(public_path('/patients/img'), $imageOrpdf);
                $type='image';
            }else{
                $imageOrpdf = "patient_" . time() . '_' . rand(0, 1000) . '.' . $request['result']->extension();
                $request['result']->move(public_path('/patients/pdf'), $imageOrpdf);
                $type='pdf';
            }
        }

        $patient->update([
            'name'=>$request->name,
            'age'=>$request->age,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'result'=>$imageOrpdf,
            'type'=>$type
        ]);

        return redirect()->route('patients')->with(['update_patient'=>'patient updated successfully']);
    }

    //delete
    public function delete($id){
       $patient=Patients::findOrFail($id);

       if($patient->type==='image') {
           if (File::exists(public_path('/patients/img/' . $patient->result))) {
               File::delete(public_path('/patients/img/' . $patient->result));
           }
       }else{
           if (File::exists(public_path('/patients/pdf/' . $patient->result))) {
               File::delete(public_path('/patients/pdf/' . $patient->result));
           }
       }

       $patient->delete();
        return redirect()->route('patients')->with(['patient_deleted'=>'done!']);

    }

}
