<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        return inertia(
            'Index/Index',
        [
          'names' => Name::all()
        ]);
    }

    public function tables()
    {
        return inertia('Index/Tables',
    [
        'names' => Name::all()
    ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Index/Create');
        // return inertia('Modals/CreateModal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Name::create([
        ...$request->validate([
            'fname' => 'required',
        ])
       ]);
       return redirect()->route('names.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Name $name)
    {
        return inertia('Index/Edit',
        [
            'names' => $name
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Name $name)
    {  $request->validate([
        'fname' => 'required',
    ]);
        // dd($request->names);
        $name  
        ->where('id' ,$request->names)
        ->update([
            'fname' => $request->fname,
           ])
          ;
           
           return redirect()->route('names.index');
           
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Name $name)
    {
        $name -> delete();

        return redirect() -> back();
    }
}
