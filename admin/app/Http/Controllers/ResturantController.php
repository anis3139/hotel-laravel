<?php

namespace App\Http\Controllers;

use App\ResturantImageModel;
use App\ResturantMenuModel;
use App\ResturantModel;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
   public function ResturantIndex(){
    $results = json_decode(ResturantModel::orderBy('id', 'desc')->get()->first());
   
    return view('admin.Resturant', [
        'results'=>$results
    ]);
    }

    public function addTitle(Request $request)
    {
        $title = $request->input("title");

        $valuecheck = (ResturantModel::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = ResturantModel::where('id', '=',  $valuecheck['0']->id)->update(['title' => $title]);
        }
        else{
            $result = ResturantModel::insert(['title' => $title]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function addDescription(Request $request)
    {
        $description = $request->input("description");



        $valuecheck = (ResturantModel::orderBy('id', 'desc')->get());

        try {
            
        
        if( count($valuecheck)>0){
            $result = ResturantModel::where('id', '=',  $valuecheck['0']->id)->first();
            $result->description = $description;
            $result->save();  
            
        }
        else{
            $result =new  ResturantModel();
            $result->description = $description;
            $result->save();

        }
    } catch (\Throwable $th) {
       return response()->json(array('error'=>$th));
    }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }






    public function addResturantVideo(Request $request)
    {
        $video = $request->input("video");
        $valuecheck = (ResturantModel::orderBy('id', 'desc')->get());

        try {  
        
        if( count($valuecheck)>0){
            $result = ResturantModel::where('id', '=',  $valuecheck['0']->id)->first();
            $result->video = $video;
            $result->save();  
            
        }
        else{
            $result =new  ResturantModel();
            $result->video = $video;
            $result->save();

        }
    } catch (\Throwable $th) {
       return response()->json(array('error'=>$th));
    }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    // --------------
    // Resturant Image
    //-----------------


    public function getResturantImageData()
    {
        $results = json_decode(ResturantImageModel::orderBy('id', 'desc')->get());
        return $results;
        dd($results);
    }


    function ResturantAboutImageDelete(Request $req)
    {
        $id = $req->input('id');
        $result = ResturantImageModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }




    function ResturantAboutImageAdd(Request $req)
    {
       
     
        $fileName=$req->file('photo')->getClientOriginalName();
        $photoPath =  $req->file('photo')->move(public_path('images/'), $fileName);
        $imageRealPath=asset('images')."/".$fileName;
      

            try {
                $result = ResturantImageModel::insert([
                    
                    'image' => $imageRealPath,
                    
                ]);
            } catch (\Throwable $th) {
              return response()->json(array('error'=>$th));
            }

       
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }




    //-----------------
    //Get Resturant Data
    //------------------
    public function getResturantMenuData()
 {
     $menu_results = json_decode(ResturantMenuModel::orderBy('id', 'desc')->get());

     return $menu_results;
 }




}