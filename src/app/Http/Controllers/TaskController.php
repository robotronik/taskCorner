<?php

namespace App\Http\Controllers;

use App\Task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::where('statut', '<', 'abandonne')->orderBy('created_at', 'desc')->get();
        return $tasks->toJson;
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
        $tasks = Task::create([
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
        $project = Task::
        return $project->toJson();
    }

    public function edit(Project $project){
        return response()->json('Task updated!');
    }
}
