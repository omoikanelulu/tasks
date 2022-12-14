<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->task()
        ->orderBy('completion_date', 'asc')
        ->orderBy('expiration_date', 'asc')
        ->orderBy('registration_date', 'asc')
        ->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        return view('tasks.create', compact($task));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new Task();
        $task->fill($request->all());
        $task->user_id = Auth::user()->id;
        $task->registration_date = date('Y-m-d');
        $task->save();
        return redirect()->route('tasks.show', $task);
    }

    /**
     * Display the specified resource.
     *
     * @param  Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $this->checkUserId($task);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->checkUserId($task);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $this->checkUserID($task);
        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->checkUserId($task);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    /**
     * ????????????????????????id????????????????????????id?????????????????????HttpException?????????
     *
     * @param \App\Models\Task $task
     * @param integer $status
     * @return void
     */
    public function checkUserId(Task $task, int $status = 404)
    {
        // ????????????????????????id????????????????????????id??????????????????????????????
        if (Auth::user()->id != $task->user_id) {
            // ?????????????????????????????????
            abort($status);
        }
    }
}
