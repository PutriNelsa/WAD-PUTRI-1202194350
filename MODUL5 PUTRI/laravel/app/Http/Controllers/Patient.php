<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 


class Patient extends Controller {

    public function index(){
        $patient = DB::table('patients')
        ->select('patients.*', 'vaccines.name as nama_vaksin')
        ->join('vaccines', 'patients.vaccine_id', '=', 'vaccines.id')
        ->orderBy('patients.id', 'asc')->get();
        return view('patient/index',['patient' => $patient]);
      }
      
      public function get_vaccine(){
        $vaccines = DB::table('vaccines')->orderBy('id', 'desc')->get();
        return view('patient/get_vaccine',['vaccines' => $vaccines]);  
      }
      
      public function add(Request $request){
        $id = $request->id;
        $name = $request->name;
        return view('patient/add',['id' => $id],['name' => $name]);
      }
      
      public function insert(Request $request){
        $nik = $request->input('nik');
        $images ='ktp_'.$nik.'.jpg';
      
        $request->file('ktp')->move(public_path('/uploads/patient/img/' ), $images);
        $image_path = '/uploads/patient/img/'.$images;
      
        $query = DB::table('patients')->insert(
          [
          'vaccine_id' => $request->input('vaccine_id'), 
          'name' => $request->input('name'), 
          'nik' => $request->input('nik'), 
          'alamat' => $request->input('alamat'),
          'no_hp' => $request->input('no_hp'),
          'image_ktp' => $image_path
          ] );
          return redirect()->route('patient.index');
      }
      
      public function edit($id){
        $patient = DB::table('patients')->where('id',$id)->first();
      
         return view('patient/edit',['patient' => $patient]);
      
      }
      
      public function update(Request $request,$id){
      
        if(!$request->ktp){
          $data = DB::table('patients')->where('id',$id)->first();
          $image_path = $data->image_ktp;
        }else{
          $name = $request->input('name');
          $images ='ktp_'.$name.'.pdf';
          $request->file('images')->move(public_path('/uploads/patient/img/' ), $images);
          $image_path = '/uploads/patient/img/'.$images;
        }
      
        $query = DB::table('patients')
          ->where('id', $id)
          ->update([
            'vaccine_id' => $request->input('vaccine_id'), 
            'name' => $request->input('name'), 
            'nik' => $request->input('nik'), 
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'image_ktp' => $image_path
             ]);
                return redirect()->route('patient.index');
         
      }
      
      public function delete($id){
        $patient = DB::table('patients')->where('id',$id)->first();
        $image_path = $patient->image_ktp;
        File::delete($image_path);
      
        DB::table('patients')->where('id',$id)->delete();
      
        return redirect()->route('patient.index');
      
      }

}