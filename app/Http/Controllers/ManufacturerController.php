<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\Manufacturer;
use App\Models\Types;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all gadget manufacturers
        return view('manufacturers.manufacturers', ['manufacturers' => Manufacturer::all(), 'types' => Types::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreManufacturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManufacturerRequest $request)
    {
        //create new gadget type
        $type = $request->type;
        $manufacturer = $request->manufacturer;
        $manufacturerid = $request->manufacturerid

        try{
            $create = Manufacturer::updateOrCreate(
                ['id' => $manufacturerid],
                ['type' => $type, 'manufacturer' => $manufacturer]
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'info' => $e->getMessage()
            ]);
        }

        if($create){

            //log the event

            $this->logevent("Successfully added device manufacturer of ".$type."  and manufacturer ".$manufacturer." to the database.");


            return response()->json([
                'message' => 'success',
                'info' => 'Device Manufacturer Successfully Added'
            ]);

        }else{

            //log the event

            $this->logevent("Attempted to added device manufacturer of ".$type."  and manufacturer ".$manufacturer." to the database, but failed because.");


            return response()->json([
                'message' => 'error',
                'info' => 'Unable to add device manufacturer to the database, please try again.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManufacturerRequest  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        //
    }
}
