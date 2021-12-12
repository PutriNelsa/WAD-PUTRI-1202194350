<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 


class CrudController extends Controller{

// public function index(){
//     return view('home');
// }

// //vaccine controller
// public function vaccine(){

//   $data = DB::table('vaccines')->orderBy('id', 'desc')->distinct()->paginate(5);
//   return view('vaccine/vaccine',['data' => $data]);
// }

// public function addvaccine(){
//   return view('vaccine/addvaccine');
// }

// public function insertvaccine(Request $request){
  
//   $name = $request->input('name');
//   $images ='vaccine_'.$name.'.pdf';

//   $request->file('images')->move(public_path('/uploads/vaccine/' ), $images);
//   $image_path = './uploads/vaccine/'.$images;

//   $query = DB::table('vaccines')->insert(
//     [
//     'name' => $request->input('name'), 
//     'price' => $request->input('price'), 
//     'description' => $request->input('description'),
//     'image' => $image_path

//     ] );
//     return redirect()->route('crud.vaccine');
 
// }

// public function editvaccine($id){
//   $data = DB::table('vaccines')->where('id',$id)->first();

//    return view('vaccine/editvaccine',['data' => $data]);

// }

// public function updatevaccine(Request $request,$id){

//   if(!$request->images){
//     $data = DB::table('vaccines')->where('id',$id)->first();
//     $image_path = $data->image;
//   }else{
//     $name = $request->input('name');
//     $images ='image_'.$name.'.pdf';
//     $request->file('images')->move(public_path('/uploads/vaccine/' ), $images);
//     $image_path = './uploads/vaccine/'.$images;
  
//   }
//   $query = DB::table('vaccines')
//     ->where('id', $id)
//     ->update([
//       'name' => $request->input('name'), 
//       'price' => $request->input('price'), 
//       'description' => $request->input('description'),
//       'image' => $image_path  
//        ]);
//           return redirect()->route('crud.vaccine');
   
// }

public function deletevaccine($id){
  $data = DB::table('vaccines')->where('id',$id)->first();
  $image_path = $data->image;
  File::delete($image_path);

  DB::table('vaccines')->where('id',$id)->delete();

  return redirect()->route('crud.vaccine');

}

//patient controller
public function patient(){
  $data = DB::table('patients')->orderBy('id', 'desc')->distinct()->paginate(5);
  return view('patient/patient',['data' => $data]);
}

public function patient_getvaccine(){
  $data = DB::table('vaccines')->orderBy('id', 'desc')->distinct()->paginate(5);
  return view('patient/getvaccine',['data' => $data]);

}

public function insertpatient(Request $request){
  // dd($request->all());
  $id = $request->id;
  $name = $request->name;
  return view('patient/insertpatient',['id' => $id],['name' => $name]);
}

public function actioninsertpatient(Request $request){
  //dd($request->all());
  $nik = $request->input('nik');
  $images ='ktp_'.$nik.'.pdf';

  $request->file('ktp')->move(public_path('/uploads/patient/' ), $images);
  $image_path = './uploads/patient/'.$images;

  $query = DB::table('patients')->insert(
    [
    'vaccine_id' => $request->input('vaccine_id'), 
    'name' => $request->input('name'), 
    'nik' => $request->input('nik'), 
    'alamat' => $request->input('alamat'),
    'no_hp' => $request->input('no_hp'),
    'image_ktp' => $image_path
    ] );
    return redirect()->route('crud.patient');
}

public function editpatient($id){
  $data = DB::table('patients')->where('id',$id)->first();

   return view('patient/editpatient',['data' => $data]);

}

public function updatepatient(Request $request,$id){

  if(!$request->ktp){
    $data = DB::table('patients')->where('id',$id)->first();
    $image_path = $data->image_ktp;
  }else{
    $name = $request->input('name');
    $images ='ktp_'.$name.'.pdf';
    $request->file('images')->move(public_path('/uploads/patient/' ), $images);
    $image_path = './uploads/patient/'.$images;
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
          return redirect()->route('crud.patient');
   
}

public function deletepatient($id){
  $data = DB::table('patients')->where('id',$id)->first();
  $image_path = $data->image_ktp;
  File::delete($image_path);

  DB::table('patients')->where('id',$id)->delete();

  return redirect()->route('crud.patient');

}



}
