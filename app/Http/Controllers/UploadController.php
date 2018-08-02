<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{	
	public function index(){
		$url = route('route-file');
		return view('fileupload', ['rota'=>$url]);
	}

	public function store(Request $request){
		$request->file('imagem');	
        $imageName = time().'.'.$request->imagem->extension();
        $request->imagem->move(public_path('images'), $imageName);
        return back()
    		->with('success','Upload realizado com sucesso!')
    		->with('path',$imageName);
		//return $request->imagem->store('public');
		/*$request->all();
		$file = $request->file('image');
		dd($file);
 		if($request->hasFile('image')){
 			$path = $request->image->path();
			$extension = $request->image->extension();
 			$arrayName = array('jpeg','png','pdf','docx');
			if (in_array($extension, $arrayName)) {
				return $request->image->store('public');
				//return nl2br("{$file} \n Upload Concluido \n {$path} \n {$extension}");
			} else {
				return nl2br("{$file} \n Upload não foi concluido \n {$path} \n {$extension}");
			}
		}else{
			return "Nenhum arquivo foi selecionado!";
		} */	
	}

	public function show(){
		
		$files = Storage::allfiles('public/Uploads');
		foreach ( $files as $row ) {
			print("<img style='width:150px;height:150px;' src='http://localhost/www/CrudLaravel/storage/app/$row' /><br/>");		
		}
		//Storage::makeDirectory('public/imgs');
		//Storage::deleteDirectory('public/uploads');
		return '';
	}   
}
