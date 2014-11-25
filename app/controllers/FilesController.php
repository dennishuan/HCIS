<?php

class FilesController extends \BaseController {

	public function profile($filename){
		return Response::download(storage_path('files/profile/'. $filename));
	}

	public function record($filename){
		return Response::download(storage_path('files/record/'. $filename));
	}
}
