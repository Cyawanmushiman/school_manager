<?php

namespace App\Http\Controllers;

use App\Models\Couse;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('couses.index', [
            'couses' => Couse::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('couses.create', [
            'teachers' => Teacher::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Couse $couse)
    {
        // dd($request);
        $inputs = $request->validate([
            'title' => 'required|max:255',
            'deadline' => 'required',
            'numpeople' => 'required',
            'body' => 'required|max:10000',
            'adress' => 'required|max:255',
            'date' => 'required',
            'amount' => 'required',
        ]);

        $couse->title = $inputs['title'];
        $couse->teacher_id = $request->teacher_id;
        $couse->deadline = $inputs['deadline'];
        $couse->numpeople = $inputs['numpeople'];
        $couse->body = $inputs['body'];
        $couse->adress = $inputs['adress'];
        $couse->date = $inputs['date'];
        $couse->amount = $inputs['amount'];

        $couse->save();
        return back()->with('message', '講座を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('couses.show',[
            'couse' => Couse::findOrFail($id),
        ]);
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
}
