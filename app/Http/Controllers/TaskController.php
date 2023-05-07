<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Task::create([
            'description' =>  $request ->description,
            'expiration'  =>  $request ->expiration,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $task->update([
            'description' => $request-> description,
            'expiration' => $request-> expiration
        ]);


        // $task-> description = $request->description;
        // $task-> expiration = $request->expiration;
        // $task->save();

        return redirect ('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/dashboard');
    }
}
