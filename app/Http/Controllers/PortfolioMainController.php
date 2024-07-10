<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\portfolio;

use function Livewire\store;

class PortfolioMainController extends Controller
{

    public function list()
    {
        $portfolios = portfolio::all();
        return view('back-end.portfolios.list',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('back-end.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
             $request->validate(

            [

            'title'       =>'required|string',
            'sub_title'   =>'required|string',
            'big_image'   =>'required|image',
            'small_image' =>'required|image',
            'description' =>'required|string',
            'client'      =>'required|string',
            'category'    =>'required|string',

           ]);

           $portfolios = new portfolio();
           $portfolios->title          = $request->title;
           $portfolios->sub_title      = $request->sub_title;
           $portfolios->description    = $request->description;
           $portfolios->client         = $request->client;
           $portfolios->category       = $request->category;


           $big_file = $request->file('big_image');
           Storage::putFile('public/img/', $big_file);
           $portfolios->big_image = 'storage/img/'.$big_file->hashName();

           $small_file = $request->file('small_image');
           Storage::putFile('public/img/', $small_file);
           $portfolios->small_image = 'storage/img/'.$small_file->hashName();

           $portfolios->save();

           return redirect()->route('portfolios.create')->with('success','New Portfolio Create Successfully');

    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $portfolio = portfolio::find ($id);
        return view('back-end.portfolios.edit',compact('portfolio'));


    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate(


            [

                'title'       =>'required|string',
                'sub_title'   =>'required|string',
                'description' =>'required|string',
                'client'      =>'required|string',
                'category'    =>'required|string',

               ]);

               $portfolios = portfolio::find($id);
               $portfolios->title          = $request->title;
               $portfolios->sub_title      = $request->sub_title;
               $portfolios->description    = $request->description;
               $portfolios->client         = $request->client;
               $portfolios->category       = $request->category;


               if($request->file('big_image')){
               $big_file = $request->file('big_image');
               Storage::putFile('public/img/', $big_file);
               $portfolios->big_image = 'storage/img/'.$big_file->hashName();

                }

               if($request->file('small_image')){
               $small_file = $request->file('small_image');
               Storage::putFile('public/img/', $small_file);
               $portfolios->small_image = 'storage/img/'.$small_file->hashName();

               }

               $portfolios->save();

               return redirect()->route('portfolios.create.list')->with('success',' Portfolio Update Successfully');
            }

            public function destroy(string $id)
            {
                $portfolio =portfolio::find($id);
                @unlink(public_path($portfolio->big_image));
                @unlink(public_path($portfolio->small_image));
                $portfolio->delete();
                return  redirect()->route('portfolios.create.list')->with('success',' portfolios Delete Successfully');

            }

}
