<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateBorrowedRecordRequest;
use App\Http\Requests\EditBorrowedRecordRequest;
use App\Models\BorrowedRecord;

class BorrowedRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = BorrowedRecord::all();
        return view ('welcome', ["borrowed_records" => $records]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBorrowedRecordRequest $request)
    {
        BorrowedRecord::create($request->all());
        return redirect() -> route('welcome');
    }


    /**
     * Show the form for editing the specified resource.
     */

    // pass the id as a parameter
    public function edit($id)
    {
        $borrowed = BorrowedRecord::findOrFail($id);

        return view('edit', ["borrowed" => $borrowed]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBorrowedRecordRequest $request, $id)
    {
        //
        $borrowed = BorrowedRecord::findOrFail($id);
        $borrowed->update($request->all());

        $borrowed->save();
        return redirect()->route('welcome');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $borrowed = BorrowedRecord::findOrFail($id);
        $borrowed -> delete();

        return redirect()->route('welcome');
    }
}
