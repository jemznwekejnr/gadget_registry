<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gadgets;
use App\Models\History;

use Auth;

class MyController extends Controller
{
    //Authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registereddevice(){

        $devices = Gadgets::where('owner', Auth::user()->id)->get();

        return view('mine.registereddevice', ['devices' => $devices]);
    }


    public function searcheddevice(){

        $historys = History::where('owner', Auth::user()->id)->get();

        return view('mine.searcheddevice', ['historys' => $historys]);
    }

    public function dashboard(){

        $devices = Gadgets::where('owner', Auth::user()->id)->orderBy('created_at', 'desc')->limit(5)->get();

        $historys = History::where('owner', Auth::user()->id)->orderBy('created_at', 'desc')->limit(5)->get();

        $total = Gadgets::where('owner', Auth::user()->id)->count();

        $inuse = Gadgets::where([['owner', Auth::user()->id], ['status', 'In Use']])->count();

        $stolen = Gadgets::where('owner', Auth::user()->id)
                    ->where(function($query) {
                        $query->where('status', 'Misplaced')
                              ->orWhere('status', 'Stolen');
                    })->count();

        $sold = Gadgets::where('owner', Auth::user()->id)
                    ->where(function($query) {
                        $query->where('status', 'Sold')
                              ->orWhere('status', 'Damaged');
                    })->count();

        return view('dashboard', ['devices' => $devices, 'historys' => $historys, 'total' => $total, 'inuse' => $inuse, 'stolen' => $stolen, 'sold' => $sold]);
    }
}
