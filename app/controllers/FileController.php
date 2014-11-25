<?php

class FileController extends \BaseController {

	public function profile($file){
		return Response::download(public_path('img/profile/'. $file));
	}
}
