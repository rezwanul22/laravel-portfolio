<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;



class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $main = Main::first();

         return view('back-end.dashboard.main',compact('main'));
    }

    public function update(Request $request)
    {
       $request->validate(

        [

        'title'    =>'required|string',
        'sub_title'=>'required|string',

       ]);

       $main = Main::first();
       $main->title     = $request->title;
       $main->sub_title = $request->sub_title;

       if($request->file('bc_img')){

        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img/','bc_img.' . $img_file->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.' . $img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/','resume.' . $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.' . $pdf_file->getClientOriginalExtension();
        }

        $main->save();

        return redirect()->route('main.update')->with('success',"Main page data has been successfully");


       }

    }

}
