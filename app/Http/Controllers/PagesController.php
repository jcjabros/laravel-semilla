<?php

namespace App\Http\Controllers;
use App\HomeSlider;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $homeSlider = HomeSlider::get()->first();
        return view('pages.index')->with('homeSlider',$homeSlider);
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $data = Array(
              'title' => 'Services',
              'services'=>['Survey','ALTA','Flood Zone']  
        );
        return view('pages.services')->with($data);
    }
}
