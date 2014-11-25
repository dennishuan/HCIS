<?php

class Files extends \Eloquent {
	protected $fillable = ['path', 'record_id'];

	protected $table = 'files';


	public function record()
	{
		return $this->belongsTo('record');
	}
}
