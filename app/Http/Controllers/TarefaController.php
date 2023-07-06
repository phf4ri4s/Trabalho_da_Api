<?php

namespace App\Http\Controllers;

use App\Models\tarefa;
use App\Http\Requests\StoretarefaRequest;
use App\Http\Requests\UpdatetarefaRequest;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class TarefaController extends Controller
{
    
    public function index(string $cod)
    {
        
        $task = tarefa::find($cod);
        if(!$task){
            return "nao existe";
        }
        return $task;
    }

    
    public function create()
    {
        

    }

    
    public function store(Request $request)
    {
        
        $task = new tarefa;

        $task->title = $request->input("title");
        $task->descricao = $request->input("descricao");

        if($request->input("status")== "Completo" || $request->input("status") == "Incompleto"){

            $task->status = $request->input("status");
            $task->save();
            return "Cadastrado.";

        }
        else{
            return "Status Invalido, Coloque Incompleto ou Completo";

        }


    }

    
    public function show()
    {
        
        $task = tarefa::all();
        if(!$task){
            return "nao existe";
        }
        return $task;
    }


    
    public function edit(Request $request, string $cod)
    {
        
        $task = tarefa::find($cod);


        $task->title = $request->input("title");
        $task->descricao = $request->input("descricao");
        {

            $task->status = $request->Input("status");

            $task->save();
            return "Alterado.";

        }
        
    }

   
    public function update()
    {
        

    }

   
    public function destroy(string $cod)
    {
        
        $warn = tarefa::find($cod);
        $warn->delete();
    }
}
