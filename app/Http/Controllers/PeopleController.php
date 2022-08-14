<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Interest;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;


class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       
       // $people = People::all();
        $people = People::where('name','like',"%".$request->get("search")."%")->paginate(5);
        $search = $request->get("search");
        return view('index', compact(['people', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interests = Interest::all();
        return view('create', compact('interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'surnname' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile_number' => 'required|numeric',
            'national_id' => 'required|max:13',
            'language' => 'required|max:255',
            'birth_date' => 'required|max:255',
            'interests' => 'required|array'
        ]);
     
        $person = People::create($storeData);
        $person->interests()->attach($storeData['interests']); 
        dispatch(new SendEmailJob($storeData));
        return redirect('/people')->with('completed', 'Person has been saved!');
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
        $person = People::findOrFail($id);
        $interests = Interest::all();
        return view('edit', compact(['person', 'interests']));
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
 
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'surnname' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile_number' => 'required|numeric',
            'national_id' => 'required|max:255',
            'language' => 'required|max:255',
            'birth_date' => 'required|max:255',
            'interests' => 'required|array'
        ]); 

 
        $person = People::findOrFail($id); 
        $person->interests()->detach();
        $person->interests()->attach($updateData['interests']); 
        unset($updateData['interests']);
        $person->update($updateData);
        dispatch(new SendEmailJob($updateData));
        return redirect('/people')->with('completed', 'Person has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::findOrFail($id);
        $people->delete();

        return redirect('/people')->with('completed', 'Person has been deleted');
    }
}
