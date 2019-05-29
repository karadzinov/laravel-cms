<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;
use App\Http\Requests\Scripts\StoreScriptRequest;

class ScriptsController extends Controller
{
    public function index(){

    	$scripts = Script::all();
    	
    	return view('scripts-pages/index', compact('scripts'));
    }

    public function show(Script $script){

    	return view('scripts-pages/show', compact('script'));
    }

    public function create(){
    	
    	return view('scripts-pages/create');
    }

    public function store(StoreScriptRequest $request){
    	$script = new Script();
    	$script->name = $request->get('name');
    	$script->code = $request->get('code');
    	$script->active = $request->has('active');
    	$script->save();

    	return redirect(route('scripts.index'))
    					->with('success', 'Successifully Created Script.');
    }

    public function edit(Script $script){

    	return view('scripts-pages/edit', compact('script'));
    }

    public function update(Script $script, StoreScriptRequest $request){

    	$script->name = $request->get('name');
    	$script->code = $request->get('code');
    	$script->active = $request->has('active');
    	$script->save();
    	
    	return redirect(route('scripts.show', $script->id))
    					->with('success', 'Script Successfully Updated');
    }

    public function delete(Script $script){

    	$script->delete();
    	
    	return redirect(route('scripts.index'))->with('success', 'Successfully Deleted Script');
    }
}
