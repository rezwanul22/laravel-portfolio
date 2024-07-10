<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServiceMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function list()
    {
        $service = service::all();
        return view('back-end.services.list',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('back-end.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate(

            [

            'icon'        =>'required|string',
            'title'       =>'required|string',
            'description' =>'required|string',

           ]);

           $service = new service();
           $service->icon        = $request->icon;
           $service->title       = $request->title;
           $service->description = $request->description;

           $service->save();

           return redirect()->route('main.create')->with('success','New Service Create Successfully');

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $service = service::find ($id);
        return view('back-end.services.edit',compact('service'));


    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate(

            [

            'icon'        =>'required|string',
            'title'       =>'required|string',
            'description' =>'required|string',

           ]);

           $service = service::find($id);
           $service->icon        = $request->icon;
           $service->title       = $request->title;
           $service->description = $request->description;

           $service->save();

           return redirect()->route('main.create.list')->with('success',' Service Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $service =service::find($id);
        $service->delete();
        return  redirect()->route('main.create.list')->with('success',' Service Delete Successfully');

    }
}
