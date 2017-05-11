<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items=Item::all();
        return view('todo.index',compact('items'));
    }
    public function store(Request $r)
    {
        $item =new Item;
        $item->text =$r->text;
        $item->save();
        return 'done';
    }
    public function del(Request $r)
    {
        Item::where('id','=',$r->id)->delete();
    }
    public function trash(Request $r)
    {
        Item::where('id','=',$r->id)->delete();
    }
    public function update(Request $r)
    {
        $item = Item::find($r->id);
        $item->text = $r->value;
        $item->save();


    }

}
