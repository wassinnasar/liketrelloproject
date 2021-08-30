<?php

namespace App\Http\Controllers;

use App\Desk;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeskController extends Controller
{

    public function index()
    {

        $desks = Desk::all();
        return $desks->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255|unique:desks,name'
        ]);
        $desk = new Desk();
        $desk->name = $request->input('name');
        $desk->save();

         return new DeskResource($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show(Desk $desk)
    {

        $desk = new DeskResource($desk);
        return $desk->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {


        $desk->update($request->validated());

        $d = new DeskResource($desk);
        return $d->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desk $desk)
    {

        $desk->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
