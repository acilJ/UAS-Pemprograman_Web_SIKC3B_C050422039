<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Request\StoreSubjectRequest;
use App\Http\Request\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = DB::table('subjects')
        ->when($request->input('title'), function ($query, $title){
            return $query->where('title', 'like', '%' . $title . '%');
        })
        ->select('id', 'title', 'lecturer_id', DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as created_at'))
        ->orderBy('id', 'asc')
        ->paginate(15);
        return view('pages.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('pages.subjects.create');
    }

    public function store(Request $request)
    {
        Subject::create([
            'title' => $request['title'],
            'lecturer_id' => $request['lecturer_id'],
        ]);
        return redirect(route('subject.index'))-with('success', 'Create New Subject Successfully');
    }

    public function edit(Subject $subject)
    {
        return view('pages.subjects.edit')->with('subject', $subject);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $validate = $request->validate();
        $subject->update(validated);
        return redirect()->route('subject.index')->with('success', 'Edit Subject Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('succes', 'Delete Subject Successsfully');
    }
}
