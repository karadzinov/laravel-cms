<?php

namespace App\Http\Controllers\Admin;

use App\Models\Script;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $request->merge(['active'=>$request->has('active')]);
    	$script = Script::create($request->all());

    	return redirect(route('admin.scripts.index'))
    				->with('success', 'Successifully Created Script.');
    }

    public function edit(Script $script){

    	return view('scripts-pages/edit', compact('script'));
    }

    public function update(Script $script, StoreScriptRequest $request){

        $request->merge(['active'=>$request->has('active')]);
        $script->update($request->all());
    	
    	return redirect(route('admin.scripts.show', $script->id))
    			     ->with('success', 'Script Successfully Updated');
    }

    public function delete(Script $script){

    	$script->delete();
    	
    	return redirect(route('admin.scripts.index'))
                    ->with('success', 'Successfully Deleted Script');
    }
}
