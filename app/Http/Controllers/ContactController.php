<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        if (($g_id = $r->get('group_id')))
        {
            $contacts=Contact::where('group_id','=',$g_id)->paginate(5);

        }
        else
        {
            $contacts=Contact::paginate(5);

        }
        return view('contact_manger.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=[];
        foreach( Group::all() as $group)
        {
            $groups[$group->id] =$group->name;
        }
        return view('contact_manger.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact =new Contact;
        $contact->group_id = $request->group_id;
        $contact->name = $request->name;
        $contact->company = $request->company;
        $contact->email = $request->email;
        $contact->phoneNumber = $request->phoneNumber;
        $contact->save();
        return redirect('all-contacts');
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
        //
    }
    public function storeGroup(Request $request)
    {
            $this->validate($request,[
                'name' => 'required'
            ]);
            $group=Group::create($request->all());
            return response()->json(['success'=>true,'group'=>$group]);
    }


}
