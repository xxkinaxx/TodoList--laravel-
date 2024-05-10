<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Todolist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todo = Todolist::where('user_id', Auth()->user()->id)->get();
        return view('todo.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'activity' => 'required'
        ]);

        Todolist::create([
            'user_id' => Auth::id(),
            'activity' => $request->activity,
            'deadline' => $request->deadline
        ]);

        return redirect()->back()->with('success', 'List successfuly created');
        
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todolist::findOrFail($id);
        $todo->status = 'complete';
        $todo->save();

        return redirect()->back()->with('success', 'You have done the activity');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todolist::findOrFail($id);

        $todo->delete();

        return redirect()->back()->with('success', 'You have delete the activity');
    }
}
