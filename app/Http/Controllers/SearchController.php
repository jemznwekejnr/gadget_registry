<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Models\Gadgets;
use App\Models\Search;
use App\Models\Manufacturer;
use App\Models\History;
use App\Models\User;

use Auth;

class SearchController extends Controller
{
    //show a single device for guest user
    public function submitsearch(Request $request){

        //ger user info
        $ip = $request->ip(); //Dynamic IP address
        $currentUserInfo = Location::get($ip);
        //dd($request);

        if($request->searchtype == "Advance Search"){
            $searchtext = $request->searchtextadvance;
            $types = $request->types;
            $manufacturer = $request->manufacturer;
            $manufactureyear = $request->manufactureyear;
            $model = $request->model;
            $status = $request->status;
            $registeryear = $request->registeryear;


            if(empty($searchtext) && empty($types) && empty($manufacturer) && empty($manufactureyear) && empty($model) && empty($status) && empty($registeryear)){

                return response()->json([
                    'message' => 'error',
                    'info' => "Provide atleast one parameter to conduct search."
                ]);

            }

            if(empty($searchtext)){
                $searchtext = "0";
            }

            if(empty($types)){
                $types = "0";
            }

            if(empty($manufacturer)){
                $manufacturer = "0";
            }

            if(empty($manufactureyear)){
                $manufactureyear = "0";
            }

            if(empty($model)){
                $model = "0";
            }

            if(empty($status)){
                $status = "0";
            }

            if(empty($registeryear)){
                $registeryear = "0";
            }



            /*$searchs = Gadgets::where([
                            ['type', $types], 
                            ['manufacturer', $manufacturer], 
                            ['model', $model], 
                            ['year', $manufactureyear], 
                            ['status', $status],
                            ['created_at', 'LIKE', $registeryear.'%']])
                    ->where(function($query) use ($searchtext) {
                        $query->where('imei1', $searchtext)
                              ->orWhere('imei2', $searchtext)
                              ->orWhere('serialno', $searchtext);
                    })->get();*/
                    //dd($searchtext);
            $searchs = Gadgets::where('type', $types) 
                            ->orWhere('manufacturer', $manufacturer) 
                            ->orWhere('model', $model) 
                            ->orWhere('year', $manufactureyear) 
                            ->orWhere('status', $status)
                            ->orWhere('created_at', 'LIKE', $registeryear.'%')
                            ->orWhere('imei1', $searchtext)
                            ->orWhere('imei2', $searchtext)
                            ->orWhere('serialno', $searchtext)
                            ->get();

            if($searchs->count() > 0){
            //insert to search history
                $searchid = array();
            foreach($searchs as $search){
                $searchid[] = $search->id;
                History::create(
                    ['searchlevel' => 'Advance Search',
                    'serialno' => $searchtext,
                    'type' => $types,
                    'manufacturer' => $manufacturer,
                    'model' => $model,
                    'manufactureyear' => $manufactureyear,
                    'registrationyear' => $registeryear,
                    'devicestatus' => $search->status,
                    'deviceid' => $search->id,
                    'owner' => $search->owner,
                    'searchlocation' => $currentUserInfo,
                    'searchstatus' => 'Found',
                    'searchtype' => $request->searchtype,
                    'created_at' => date('Y-m-d H:i:s')]
                );


                //log the event
                $this->logevent("A search was performed for a device IMEI OR Serial No ".$searchtext." and was found at ".$currentUserInfo." and the current status of the device is ".$search->status);

                if($search->status == 'Misplaced' || $search->status == 'Stolen'){
                    
                    //send email to device owner
                    $username = User::find($search->owner)->value('name');
                    $useremail = User::find($search->owner)->value('email');
                    
                    try{
                        //send email to the person concerned
                        Mail::send('emails.gadgetfoundemail', ['username' => $username, 'useremail' => $useremail, 'location' => $currentUserInfo], function ($message) use ($username, $useremail, $location) {
                        $message->to($useremail, $username)->subject('Update on your missing device');
                        $message->from('info@jarvis.com', 'JARVIS');
                        });
                    }catch(\Exception $e){
                        
                    }

                        //create notification for device owner
                        $this->createnotification($search->owner, 'Missing Device', 'Your missing '.$search->manufacturer.' '.$search->type.' '.$search->model.' was searched for at '.$currentUserInfo.', this means that this device is likely to be at this location.', 'Unread', 'mygadgets');
                    }
                }

                return response()->json([
                    'message' => 'success',
                    'info' => $searchs->count().' Record found',
                    'result' => $search,
                    'total' => $searchs->count(),
                    'records' => $searchid
                ]);

            }else{

                //insert to search history
                History::create(
                    ['searchlevel' => 'Advance Search',
                    'serialno' => $searchtext,
                    'type' => $types,
                    'manufacturer' => $manufacturer,
                    'model' => $model,
                    'manufactureyear' => $manufactureyear,
                    'registrationyear' => $registeryear,
                    'devicestatus' => $status,
                    'searchlocation' => $currentUserInfo,
                    'searchstatus' => 'Not Found',
                    'searchtype' => $request->searchtype,
                    'created_at' => date('Y-m-d H:i:s')]
                );

                //log the event
                $this->logevent("A search was performed for a device IMEI OR Serial No ".$searchtext." and at ".$currentUserInfo." and the device was not found in the database.");

                return response()->json([
                    'message' => 'error',
                    'info' => "We can't find any device in the system registered with the information provided at the moment."
                ]);

            }

    }else{

        $searchtext = $request->searchtextbasic;

        if(empty($searchtext)){

            return response()->json([
                    'message' => 'error',
                    'info' => "Please provide serial no, IMEI, VIN etc. to search record."
                ]);

        }

        $searchs = Gadgets::where('imei1', $searchtext)
                        ->orWhere('imei2', $searchtext)
                        ->orWhere('serialno', $searchtext)
                        ->get();

        if($searchs->count() > 0){
            $searchid = array();
            //insert to search history
            foreach($searchs as $search){
                $searchid[] = $search->id;
                History::create(
                    ['searchlevel' => 'Basic Search',
                    'serialno' => $searchtext,
                    'devicestatus' => $search->status,
                    'deviceid' => $search->id,
                    'owner' => $search->owner,
                    'searchlocation' => $currentUserInfo,
                    'searchstatus' => 'Found',
                    'searchtype' => $request->searchtype,
                    'created_at' => date('Y-m-d H:i:s')]
                );


                //log the event
                $this->logevent("A search was performed for a device IMEI OR Serial No ".$searchtext." and was found at ".$currentUserInfo." and the current status of the device is ".$search->status);

                if($search->status == 'Misplaced' || $search->status == 'Stolen'){
                    
                    //send email to device owner
                    $username = User::find($search->owner)->value('name');
                    $useremail = User::find($search->owner)->value('email');
                    
                    try{
                        //send email to the person concerned
                        Mail::send('emails.gadgetfoundemail', ['username' => $username, 'useremail' => $useremail, 'location' => $currentUserInfo], function ($message) use ($username, $useremail, $location) {
                        $message->to($useremail, $username)->subject('Update on your missing device');
                        $message->from('info@jarvis.com', 'JARVIS');
                        });
                    }catch(\Exception $e){
                        
                    }

                        //create notification for device owner
                        $this->createnotification($search->owner, 'Missing Device', 'Your missing '.$search->manufacturer.' '.$search->type.' '.$search->model.' was searched for at '.$currentUserInfo.', this means that this device is likely to be at this location.', 'Unread', 'mygadgets');
                    }
            }

                return response()->json([
                    'message' => 'success',
                    'info' => $searchs->count().' Record found',
                    'search' => $searchtext,
                    'total' => $searchs->count(),
                    'records' => $searchid
                ]);

            }else{

                History::create(
                    ['searchlevel' => 'Basic Search',
                    'serialno' => $searchtext,
                    'searchlocation' => $currentUserInfo,
                    'searchstatus' => 'Not Found',
                    'searchtype' => $request->searchtype,
                    'created_at' => date('Y-m-d H:i:s')]
                );


                //log the event
                $this->logevent("A search was performed for a device IMEI OR Serial No ".$searchtext." at ".$currentUserInfo." and the device was not found.");

                return response()->json([
                    'message' => 'error',
                    'info' => "We can't find any device registered with the serial number or IMEI provided at this search level, you can explore our advance search for more robust search."
                ]);

            }

        }

    }

    public function fetchmanufacturers($id){

        return view('gadgets.manufacturers', ['manufacturers' => Manufacturer::where('type', $id)->orderBy('manufacturer', 'asc')->get()]);
    }


    public function fetchmodel($id){

        return view('gadgets.models', ['models' => Gadgets::where('type', $id)->groupBy('model')->get()]);
    }

    public function checkemailexist($email){

        if(User::where('email', $email)->count() == 1){
            return response()->json([
                'message' => 'error'
            ]);
        }else{
            return response()->json([
                'message' => 'success'
            ]);
        }
    }


    public function searchresult($records){

        $total = explode(",", $records);
        $gadgets = array();

        for($i=1; $i<=count($total); $i++){

            $gadgets[] = Gadgets::where('id', $i)->get();
        }
            //dd($gadgets);

        return view('searchresult', ['gadgets' => $gadgets]);
    }

    
}
