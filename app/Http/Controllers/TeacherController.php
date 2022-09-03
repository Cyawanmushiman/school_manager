<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.index', [
            'teachers' => Teacher::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Teacher $teacher)
    {
        $inputs = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|max:255|numeric',
            'career' => 'required|max:10000',
        ]);

        $teacher->name = $inputs['name'];
        $teacher->age = $inputs['age'];
        $teacher->career = $inputs['career'];

        $teacher->save();
        return back()->with('message', '講師を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('teachers.show', [
            'teacher' => Teacher::findOrFail($id),
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
        return view('teachers.edit',[
            'teacher' => Teacher::findOrFail($id),
        ]);
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
        $teacher = Teacher::findOrFail($id);
        $inputs = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|max:255|numeric',
            'career' => 'required|max:10000',
        ]);

        $teacher->name = $inputs['name'];
        $teacher->age = $inputs['age'];
        $teacher->career = $inputs['career'];

        $teacher->update();
        return back()->with('message', '講師を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index')->with('message','講師を削除しました');
    }
}
