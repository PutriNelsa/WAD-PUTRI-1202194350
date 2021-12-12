<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 


class Vaccine extends Controller{

    public function index(){
        $vaccines = DB::table('vaccines')->orderBy('id', 'asc')->get();
        return view('vaccine/index', ['vaccines' => $vaccines]);
    }
    
    public function add(){
        return view('vaccine/add');
    }

    public function insertData(Request $request){
        $name = $request->input('name');
        $images ='image_'.$name.'.jpg';

        $request->file('img')->move(public_path('/uploads/vaccine/img/' ), $images);
        $image_path = '/uploads/vaccine/img/'.$images;

        $query = DB::table('vaccines')->insert(
            [
            'name' => $request->input('name'), 
            'price' => $request->input('price'), 
            'description' => $request->input('desc'),
            'image' => $image_path

            ] );
        return redirect()->route('vaccine.index');
    }

    public function edit($id){
        $vaccines = DB::table('vaccines')->where('id',$id)->first();
      
        return view('vaccine/edit',['vaccines' => $vaccines]);
      
    }
    public function update(Request $request,$id){

        if(!$request->img){
          $data = DB::table('vaccines')->where('id',$id)->first();
          $image_path = $data->image;
        }
        else{
          $name = $request->input('name');
          $images ='image_'.$name.'.jpg';
          $request->file('img')->move(public_path('/uploads/vaccine/img/' ), $images);
          $image_path = '/uploads/vaccine/img/'.$images;
        }
        $query = DB::table('vaccines')
          ->where('id', $id)
          ->update([
            'name' => $request->input('name'), 
            'price' => $request->input('price'), 
            'description' => $request->input('desc'),
            'image' => $image_path  
             ]);
        return redirect()->route('vaccine.index');
         
    }
    public function delete($id){
        $vaccines = DB::table('vaccines')->where('id',$id)->first();
        $image_path = $vaccines->image;
        File::delete($image_path);
        DB::table('vaccines')->where('id',$id)->delete();
        return redirect()->route('vaccine.index');
    }

}