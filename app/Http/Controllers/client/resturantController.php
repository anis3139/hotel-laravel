<?php

namespace App\Http\Controllers\client;

use App\FacilitiesModel;
use App\OthersModel;
use App\SocialModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResturantImageModel;
use App\ResturantMenuModel;
use App\ResturantModel;
use App\RoomModel;
use App\TestimonialModel;

class resturantController extends Controller
{
    public function resturantIndex(){
        $othersData= json_decode(OthersModel::orderBy('id', 'desc')->get()->first());
        $socialData= json_decode(SocialModel::orderBy('id', 'desc')->get()->first());
        $HomeTestimonialData= json_decode(TestimonialModel::orderBy('id', 'desc')->limit(3)->get());
        $ResturantImage= json_decode(ResturantImageModel::orderBy('id', 'desc')->get());
        $ResturantMenu= json_decode(ResturantMenuModel::orderBy('id', 'desc')->get());
        $ResturantAbout= json_decode(ResturantModel::orderBy('id', 'desc')->get()->first());
        $facilities= json_decode(FacilitiesModel::all());
        $rooms=RoomModel::all();
        return view('client.resturant',[
            'othersData'=>$othersData,
            'socialData'=>$socialData,
            'HomeTestimonialDatas'=>$HomeTestimonialData,
            'ResturantImages'=>$ResturantImage,
            'ResturantMenus'=>$ResturantMenu,
            'ResturantAbout'=>$ResturantAbout,
            'rooms'=>$rooms,
            'facilities'=> $facilities
        ]);
    }
}
