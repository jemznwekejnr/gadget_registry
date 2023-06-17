<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gadgets;
use App\Models\Manufacturer;
use App\Models\Types;

use Auth;

class GadgetController extends Controller
{
    //Authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all gadgets
        return view('gadgets.index', ['gadgets' => Gadgets::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show gadget creation form
        //fetch all gadget types
        return view('gadgets.create', ['types' => Types::all()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        //check if device is currently in use
        if(Gadgets::where([['type', $request->type], ['manufacturer', $request->manufacturer], ['serialno', $request->serialno], ['model', $request->model], ['status', 'In Use']])->count() == 1){

            //log the event
            $this->logevent("Attempted to add a device of type ".$request->type." with serial no ".$request->serialno." to the database, but failed because the device is currently in use.");

            return response()->json([
                'message' => 'error',
                'info' => 'This device is currently in use by another user and cannot be re-registered'
            ]);
        }

        //create new gadget type
        try{
            $pics = $request->file('picture');
            $picsurl = $pics->store('assets/attachments');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'info' => $e->getMessage()
            ]);
        }


        try{
            $proof = $request->file('proof');
            $proofurl = $proof->store('assets/attachments');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'info' => $e->getMessage()
            ]);
        }


        try{
            $gadget = Gadgets::create(
                ['type' => $request->type,
                'manufacturer' => $request->manufacturer,
                'model' => $request->model,
                'imei1' => $request->imei1,
                'imei2' => $request->imei2,
                'serialno' => $request->serialno,
                'year' => $request->year,
                'picture' => $picsurl,
                'ownersproof' => $proofurl,
                'purchasedate' => $request->purchasedate,
                'owner' => Auth::user()->id,
                'status' => 'In Use',
                'created_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s')]
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'info' => $e->getMessage()
            ]);
        }


        if($gadget){

            //log the event

            $this->logevent("Successfully added a device of type ".$request->type." with serial no ".$request->serialno." to the database.");


            return response()->json([
                'message' => 'success',
                'info' => 'Device Successfully Created'
            ]);

        }else{

            //log the event

            $this->logevent("Attempted to add a device of type ".$request->type." with serial no ".$request->serialno." to the database, but failed.");


            return response()->json([
                'message' => 'error',
                'info' => 'Unable to create device at the moment, please try again.'
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gadgets = Gadgets::where('id', $id)->get();

        //dump($gadgets[0]->picture);
        
        return view('gadgets.profile', ['gadgets' => Gadgets::where('id', $id)->get()]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //fetch single gadget by id
        return view('gadgets.edit', ['gadgets' => Gadgets::where('id', $id)->get(), 'types' => Types::all()]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        //update gadget details
        if(!empty($request->picture)){
            try{
                $pics = $request->file('picture');
                $picsurl = $pics->store('assets/attachments');
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'error',
                    'info' => $e->getMessage()
                ]);
            }
        }else{
            $picsurl = Gadgets::find($request->id)->value('picture');
        }


        if(!empty($request->ownersproof)){
            try{
                $proof = $request->file('ownersproof');
                $proofurl = $proof->store('assets/attachments');
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'error',
                    'info' => $e->getMessage()
                ]);
            }
        }else{
            $proofurl = Gadgets::find($request->id)->value('ownersproof');
        }


        try{
            $gadget = Gadgets::where('id', $request->id)->update(
                ['type' => $request->type,
                'manufacturer' => $request->manufacturer,
                'model' => $request->model,
                'imei1' => $request->imei1,
                'imei2' => $request->imei2,
                'serialno' => $request->serialno,
                'year' => $request->year,
                'picture' => $picsurl,
                'ownersproof' => $proofurl,
                'purchasedate' => $request->purchasedate,
                'status' => $request->status,
                'updated_by' => Auth::user()->id,
                'updated_at' => date('Y-m-d H:i:s')]
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'info' => $e->getMessage()
            ]);
        }


        if($gadget){

            //log the event

            $this->logevent("Successfully updated a device of type ".$request->type." with serial no ".$request->serialno." to the database.");


            return response()->json([
                'message' => 'success',
                'info' => 'Device Successfully Updated'
            ]);

        }else{

            //log the event

            $this->logevent("Attempted to update a device of type ".$request->type." with serial no ".$request->serialno." to the database, but failed.");


            return response()->json([
                'message' => 'error',
                'info' => 'Unable to update device at the moment, please try again.'
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //softdelete record
        $sno = Gadgets::find($id)->serialno;
        $type = Gadgets::find($id)->type;
        if(Gadgets::destroy($id)){

            //log the event

            $this->logevent("Successfully deleted device of type ".$type." and serial no ".$sno." from the database.");


            return response()->json([
                'message' => 'success',
                'info' => 'Device Successfully Deleted'
            ]);

        }else{

            //log the event

            $this->logevent("Attempted to delete device of type ".$type." and serial no ".$sno." from the database, but failed.");


            return response()->json([
                'message' => 'error',
                'info' => 'Unable to delete device at the moment, please try again.'
            ]);
        }
    }


    

}
