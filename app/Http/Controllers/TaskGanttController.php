<?php

namespace App\Http\Controllers;

use App\Models\TaskGantt;
use Illuminate\Http\Request;

class TaskGanttController extends Controller
{
    public function store(Request $request)
    {
        $task = new TaskGantt();

        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has('progress') ? $request->progress : 0;
        $task->parent = $request->parent;

        $task->save();

        return response()->json([
            'action' => 'inserted',
            'tid' => $task->id,
        ]);
    }

    public function update($id, Request $request)
    {
        $task = TaskGantt::find($id);

        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has('progress') ? $request->progress : 0;
        $task->parent = $request->parent;

        $task->save();

        return response()->json([
            'action' => 'updated',
        ]);
    }

    public function destroy($id)
    {
        $task = TaskGantt::find($id);
        $task->delete();

        return response()->json([
            'action' => 'deleted',
        ]);
    }
}
