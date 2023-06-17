<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\logs;
use App\Models\notifications;
use App\Models\Gadgets;
use App\Models\Types;
use App\Models\Manufacturer;
use App\Models\User;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //log event to the database
    public static function logevent($action){

        $logs = logs::create([
            'user' => Auth::user()->id,
            'action' => $action,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }



    //send notification on the system
    public static function createnotification($staff, $type, $title, $status, $location){

        $logs = logs::create([
            'staff' => $staff,
            'type' => $type,
            'title' => $title,
            'status' => $status,
            'location' => $location,
            'created_at' => date('Y-m-d H:i:s'),
            
        ]);

    }



    //get total types of a particular device
    public static function totaltype($type){

        return Gadgets::where('type', $type)->count();
    }


    public static function typename($type){

        return Types::where('id', $type)->value('type');
    }


    public static function manufacturername($type){

        return Manufacturer::where('id', $type)->value('manufacturer');
    }


    public static function username($user){

        return User::find($user)->value('name');
    }
}
