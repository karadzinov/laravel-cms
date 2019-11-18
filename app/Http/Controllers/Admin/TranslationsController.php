<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Translations\{Translation, TranslationFile};

class TranslationsController extends Controller
{
	const LANG_DIR  = '../resources/lang/';
    const EN_DIR    = '../resources/lang/en/';

    public function index(){
    	$translations = $this->findLanguagesAndFiles();

        $activeLanguages = Language::where('active', '=', 1)->get();
        $activeCodes = $activeLanguages->pluck('code')->toArray();
        $availableFolders = $this->scanLangFolder();
        $difference = array_diff($activeCodes, $availableFolders);
        $withoutFiles = [];
        foreach($difference as $diff){
            $withoutFiles[]=$activeLanguages->where('code', '=', $diff)->first();
        }
        
	  	return view('admin/translations/index', compact('translations', 'withoutFiles'));
    }

    public function scanLangFolder(){
        
        $folders = array_diff(scandir(self::LANG_DIR), ['.', '..', 'vendor']);

        return $folders;
    }

    public function findLanguagesAndFiles(){
        
        $languages = $this->scanLangFolder();
        $activeLangs = Language::where('active', '=', 1)->pluck('code')->toArray();
        $translations = [];
        foreach($languages as $language){
           if(in_array($language, $activeLangs)){
                $files = array_diff(scandir(self::LANG_DIR . $language), ['.', '..', 'vendor']);
                $items = [];
                foreach($files as $file){
                    $file = str_replace('.php', '', $file);
                    $route = route('admin.translations.edit', compact('language', 'file'));
                    $item = new TranslationFile($file, $route);
                    $items[] = $item;
                }
                $translation = new Translation($language, $items);

                $translations[] = $translation;
           }
        }

        return collect($translations);
    }

    public function writeToFile($array, $file){
    	$write = '<?php return' . PHP_EOL . var_export($array, true) . PHP_EOL . ';';
    	
    	file_put_contents($file, $write);
    	
    	return;
    }

    public function show($language){
 		try {
            $directory = self::LANG_DIR.$language;
            $items = array_diff(scandir($directory), ['.', '..']);
            $files = [];
            foreach($items as $file){
                $file = str_replace('.php', '', $file);
                $route = route('admin.translations.edit', compact('language', 'file'));
                $file = new TranslationFile($file, $route);
                $files[] = $file;
            }

            return view('admin/translations/show', compact('language','files'));       
            } catch (Exception $e) {
                return redirect()->route('admin.translations.index')->with('error', '404 error');
                
            }  	
    }

    public function create(){
        $languages = Language::all();

        $view = view('admin/partials/translations/languageSelector', compact('languages'))->render();
        
        return response()->json([
            'status' => 200,
            'view' => $view
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 404]);
        }

        $language = Language::findOrFail($request->get('id'));
        (!$language->active) ? $language->update(['active' => 1]) : '';
        try {
            //copy english directory with new language code name
            $src = self::EN_DIR;
            $dst = self::LANG_DIR . $language->code;
            $newDirectory = $this->copyEnglishDirectory($src, $dst);
            $language->update(['folder'=>true]);
            return response()->json(
                [
                    'status'        => 200,
                    'language'      =>$language->native,
                    'redirectRoute' => route('admin.translations.show', $language->code)
                ]);
       } catch (Exception $e) {

            return response()->json(['status'=>500]);
       }

    }

    public function addRemoveLanguages(Request $request){
        
        $ids = $request->get('ids');
        $deactivate = $this->deactivateLanguagesIfNecessary($ids);

        foreach($ids as $key => $id){
            $language = Language::findOrFail($id);
            if(!$language->active){
               $language->update(['active'=>true]);
            }
        }

        return response()->json(['status'=>200]);
    }

    public function deactivateLanguagesIfNecessary($ids){
        
        $activeLangs = Language::where('active', '=', 1)->get();
        $active = $activeLangs->pluck('id')->toArray();
        $difference = array_diff($active, $ids);

        if(count($difference)){
            foreach($difference as $id){
                $language = $activeLangs->where('id', '=', $id)->first();
                $language->update(['active'=>false]);
            }
        }

        return true;
    }

    public function copyEnglishDirectory($src, $dst) {
       $dir = opendir($src); 
       @mkdir($dst); 
       while(false !== ( $file = readdir($dir)) ) { 
           if (( $file != '.' ) && ( $file != '..' )) { 
               if ( is_dir($src . '/' . $file) ) { 
                   copyEnglishDirectory($src . '/' . $file,$dst . '/' . $file); 
               } 
               else { 
                   copy($src . '/' . $file,$dst . '/' . $file); 
               } 
           } 
       } 
       closedir($dir);

       return true;
    }

    public function edit($language, $file, Request $request){
    	
    	try {
            $content = include(self::LANG_DIR . $language . '/'.$file.'.php');
            $arrayDepth = $this->array_depth($content);
               $data = compact('content', 'language', 'file', 'arrayDepth');
            
               if($request->ajax()){
                   $data['parent'] = null;
                   return view('admin/partials/translations/items', $data)->render();
               }

            return view('admin/translations/edit', $data); 
        } catch (Exception $e) {
            
            return redirect()->route('admin.translations.index')->with('error', '404 error');
        }
    }

    public function update($language, $file, Request $request){
    	
    	try {
	    	$json = $request->get('data');
	    	$array = json_decode($json, true);
	    	$file = self::LANG_DIR . $language . '/' . $file . '.php';
	    	
	    	$content = $this->writeToFile($array, $file);

			return response()->json(['status'=>200]);
    	} catch (Exception $e) {
    		
			return response()->json(['status'=>500]);
    	}
    }

    public function array_depth(array $array) {
	    $max_depth = 1;

	    foreach ($array as $value) {
	        if (is_array($value)) {
	            $depth = $this->array_depth($value) + 1;

	            if ($depth > $max_depth) {
	                $max_depth = $depth;
	            }
	        }
	    }

	    return $max_depth;
	}
}
