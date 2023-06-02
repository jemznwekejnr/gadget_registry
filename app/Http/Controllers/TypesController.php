<?php

namespace App\Http\Controllers;
use App\Models\Types;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;

class TypesController extends Controller
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
        //fetch all gadget types
        return view('types.types', ['types' => Types::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show gadget types creation form
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        //create new gadget type
        $type = $request->type;
        $typeid = $request->typeid;

        if(Types::where('type', $type)->count() > 0){

            return response()->json([
                'message' => 'error',
                'info' => 'This device category has already been registered'
            ]);

        }

        try{
            $types = Types::updateOrCreate(
                ['id' => $typeid],
                ['type' => $type, 'created_by' => Auth::user()->id, 'created_at' => date('Y-m-d H:i:s')]
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'info' => $e->getMessage()
            ]);
        }

        if($types){

            //log the event

            $this->logevent("Successfully added gadget type ".$type." to the database.");


            return view('types.results', ['types' => Types::all()]);

        }else{

            //log the event

            $this->logevent("Attempted to update gadget type ".$type." to the database, but failed because.");


            return response()->json([
                'message' => 'error',
                'info' => 'Unable to gadget type .'.$type.' to the database, please try again.'
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
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        /*if(Flight::destroy($id)){

            //log the event

            $this->logevent("Successfully deleted gadget type ".$type." from the database.");


            return response()->json([
                'message' => 'success',
                'info' => 'Gadget Type Successfully Deleted'
            ]);

        }else{

            //log the event

            $this->logevent("Attempted to delete gadget type ".$type." from the database, but failed because.");


            return response()->json([
                'message' => 'error',
                'info' => 'Unable to delete gadget type .'.$type.' to the database, please try again.'
            ]);
        }*/
    }
}
