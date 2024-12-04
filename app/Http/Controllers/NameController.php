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
            'Index/Tables',
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
        // return inertia('Index/Create');
        return inertia('Modals/CreateModal');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    // //     // dd($request->all());
    // //    Name::create([
    // //     ...$request->validate([
    // //         'fname' => 'required',
    // //     ])
    // //    ]);
    // //    return redirect()->route('names.index');
    // $request->validate([
    //     'fname' => 'required|string|max:255',
    // ]);
    // $existingRecord = Name::where('fname', $request->input('fname'))->first();

    // if ($existingRecord) {
    //     return back()->with('error');

    // } else {
    //     $name = new Name;
    //     $name->fname = $request->input('fname');
    //     $name->save();
    //     // Flash a success message
    //     return redirect()->route('names.index')->with('success');
    // }

    public function store(Request $request)
{
    $request->validate([
        'fname' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ]);

    $existingRecord = Name::where('fname', $request->input('fname'))->exists();

    if ($existingRecord)
    {
        return response()->json(['message' => 'error'], 200);
    }
     else
      {
        $name = new Name;
        $name->fname = $request->input('fname');
        $name->status = $request->input('status');
        $name->save();

        // return redirect()->route('names.index')->with('sucess');

        return response()->json(['message' => 'success', 'redirect' => route('tables')], );

    }
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
    public function edit(Name $name )
    {
        return inertia('Index/Edit',
        // return inertia('Modals/EditModal',
        [
            'names' => $name
        ]);
    }

    // public function edit($id)
    // {
    //     $item = Name::findOrFail($id);
    //     return inertia('Modals/EditModal', ['item' => $item]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Name $name)
    { $request->validate([
        'fname' => 'required',
        'status' => 'required',
    ]);
        // dd($request->name);
        $name
        ->where('id',$request->name)
        ->update([
            'fname' => $request->fname,
            'status' => $request->status,
           ])
          ;

           return redirect()->route('tables');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Name $name)
    {
        $name -> delete();

        return redirect() -> back();
    }

    public function main_layout()
    {
        return inertia('Index/Dashboard');
    }
}
