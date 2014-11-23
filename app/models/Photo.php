<?php

class Photo extends Eloquent{

	public $timestamps = false;

	protected $fillable = array('ref','image');

}
