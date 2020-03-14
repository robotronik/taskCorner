<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->where('statut', '<', 'abandonne')->orderBy('created_at', 'desc')->get();
        return $tasks->toJson();
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'social' => 'url',
            'type' => 'required',
            'motif' => 'required',
            'description' => 'required',
            'statut' => 'required',
        ]);
        $task = DB::table('tasks')->insert([
            'nom' => $validateData['nom'],
            'prenom' => $validateData['prenom'],
            'email' => $validateData['email'],
            'tel' => $validateData['tel'],
            'social' => $validateData['social'],
            'type' => $validateData['type'],
            'motif' => $validateData['motif'],
            'description' => $validateData['description'],
            'statut' => $validateData['statut'],
        ]);
        return response()->json('Task created!');
    }

    public function show($id){
        $task = DB::table('tasks')->find($id);
        return $task->toJson();
    }

    public function edit(Task $task){
        $task->statut = 1;
        $task->update();
        return response()->json('Task updated!');
    }
}
