<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\service;
use App\Models\portfolio;

class ForntendController extends Controller
{
    public function index(){
        $main    = Main::first();
        $service = service::all();
        $portfolios = portfolio::all();
        return view('Fornt-end.index',compact('main','service','portfolios'));
    }
}
