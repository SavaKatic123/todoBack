<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use JWTAuth;
use App\Task;

class TasksController extends Controller
{
    public function getTasks(Request $request) {
      //$user = JWTAuth::parseToken()->toUser();
      $user = Auth::user();
      $tasks = $user->tasks;
      
      return $tasks;
      
    }

    public function newTask(Request $request) {
      $name = $request->input('newtask')['task']['name'];
      $desc = $request->input('newtask')['task']['desc'];
      
      $user = Auth::user();

      Task::create([
        'user_id' => $user['id'],
        'name' => $name,
        'desc' => $desc,
        'done' => false,
        'priority' => false,
      ]);
    }

    public function changeTask(Request $request) {
      $name = $request->input('changetask')['task']['name'];
      $desc = $request->input('changetask')['task']['desc'];
      $user = Auth::user();

      $task = Task::where('name', $name)->first();
      $task['desc'] = $desc;
      $task->save();
    }

    public function deleteTask(Request $request) {
      $name = $request->input('deletetask')['task']['name'];
      $desc = $request->input('deletetask')['task']['desc'];

      $task = Task::where('name', $name)->where('desc', $desc)->first();
      $task->delete();
    }

    public function finishTask(Request $request) {
      $name = $request->input('finishtask')['task']['name'];
      $desc = $request->input('finishtask')['task']['desc'];

      $task = Task::where('name', $name)->first();
      $task['done'] = true;
      $task->save();
    }

    public function changePriority(Request $request) {
      $name = $request->input('changepriority')['task']['name'];
      $desc = $request->input('changepriority')['task']['desc'];

      $task = Task::where('name', $name)->first();
      $task['priority'] = ! $task['priority'];
      $task->save();
    }

}