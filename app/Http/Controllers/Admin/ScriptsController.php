<?php

namespace App\Http\Controllers\Admin;

use App\Models\Script;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Scripts\StoreScriptRequest;

class ScriptsController extends Controller
{
    public function index(){

    	$scripts = Script::latest()->paginate(25);
    	
    	return view('admin.scripts-pages/index', compact('scripts'));
    }

    public function show(Script $script){

    	return view('admin.scripts-pages/show', compact('script'));
    }

    public function create(){
    	
    	return view('admin.scripts-pages/create');
    }

    public function store(StoreScriptRequest $request){
        $request->merge(['active'=>$request->has('active')]);
    	$script = Script::create($request->all());

    	return redirect()->route('admin.scripts.index')
    				->with('success', trans('scripts.success.created'));
    }

    public function edit(Script $script){

    	return view('admin.scripts-pages/edit', compact('script'));
    }

    public function update(Script $script, StoreScriptRequest $request){

        $request->merge(['active'=>$request->has('active')]);
        $script->update($request->all());
    	
    	return redirect()->route('admin.scripts.index')
    			     ->with('success', trans('scripts.success.updated'));
    }

    public function delete(Script $script){

    	$script->delete();
    	
    	return redirect()->route('admin.scripts.index')
                    ->with('success', trans('scripts.success.deleted'));
    }
}
