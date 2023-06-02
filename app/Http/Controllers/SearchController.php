<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Models\Gadgets;
use App\Models\Search;

class SearchController extends Controller
{
    //show a single device for guest user
    public function submitsearch(Request $request){

        //ger user info
        $ip = $request->ip(); //Dynamic IP address
        $currentUserInfo = Location::get($ip);

        $search = Gadgets::where([['type', $request->type], ['manufacturer', $request->manufacturer], ['serialno', $request->serialno]])->get();

        if($search->count() != 0){
            //insert to search history
            Search::create(
                ['type' => $request->type],
                ['manufacturer' => $request->manufacturer],
                ['serialno' => $request->serialno],
                ['devicestatus' => $search[0]->status],
                ['deviceid' => $search[0]->id],
                ['owner' => $search[0]->owner],
                ['searchlocation' => $currentUserInfo],
                ['searchstatus' => 'Found'],
                ['created_at' => date('Y-m-d H:i:s')]
            );


            //log the event
            $this->logevent("A search was performed for a device of type ".$request->type." and manufacturer ".$request->manufacturer." with serial no ".$request->serialno." was found and the current status of the device is ".$search[0]->status.".");

            return response()->json([
                'message' => 'succes',
                'info' => 'Record found',
                'result' => $search
            ]);

        }else{

            //insert to search history
            Search::create(
                ['type' => $request->type],
                ['manufacturer' => $request->manufacturer],
                ['serialno' => $request->serialno],
                ['searchstatus' => 'Not Found'],
                ['searchlocation' => $currentUserInfo],
                ['created_at' => date('Y-m-d H:i:s')]
            );

            //log the event
            $this->logevent("A search was performed for a device of type ".$request->type." and manufacturer ".$request->manufacturer." with serial no ".$request->serialno.". No record was found in the database.");

            return response()->json([
                'message' => 'error',
                'info' => 'This device is not currently registered on this platform.'
            ]);

        }

    }
}
