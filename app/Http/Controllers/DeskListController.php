<?php

namespace App\Http\Controllers;

use App\DeskList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\DeskListResource;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeskListStoreRequest;

class DeskListController extends Controller
{

    public function index(Request $request)
    {

        $desks = DeskListResource::collection(DB::table('desk_lists')
            ->where('desk_id',$request->desk_id)
            ->get()
        );

        return $desks->toJson();
    }


    public function store(DeskListStoreRequest $request)
    {

//        $request->validate([
//            'name'=> 'required|max:255',
//            'desk_id'=> 'required|integer|exists:desks,id',
//        ]);
        $request->validate([]);
        $deskL = new DeskList();
        //$deskL->id = $request->input('id');
        $deskL->name = $request->input('name');
        $deskL->desk_id = $request->input('desk_id');
        $deskL->save();

        return new DeskListResource($request);
    }

    public function show($id)
    {
         $deskList = new DeskListResource($id);
        return $deskList->toJson();
    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function update(Request $request, DeskList $deskList)
    {
        //
//         $deskList->update($request->validated());
//
//        $d = new DeskListResource($deskList);
//        return $d->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeskList $deskList)
    {
         $deskList->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
