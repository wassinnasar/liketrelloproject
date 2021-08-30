<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    public function itemForm()
    {
        return view ('addItem');
    }
    public  function addItem(Request $request)
    {
        $item = $request->input('item');
        $itm = new Item();
        $itm->item = $item;
        $itm->user_id = Auth::id();
        $itm->save();
          return response()->json($itm);
       // return redirect()->route('showItems');
    }
    public function showItems()
    {
        $items = DB::table('items')->get();

        return View::make('showItems',['items'=>$items]);
    }
    public function showMyItems()
    {
        Gate::authorize('view-protected-part');
       $userItems = User::find(Auth::id())->items;

       return View::make('showMyItems',compact('userItems'));
    }
    public function deleteItem($item_id)
    {
       $item = Item::find($item_id);
       $item->delete();
        return redirect()->route('showItems');
    }
}
