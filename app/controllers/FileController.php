<?php

class FileController extends \BaseController {

	public function profile($file){
		return Response::download(storage_path('img/profile/'. $file));
	}
}
