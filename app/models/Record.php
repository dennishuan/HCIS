<?php

class Record extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'records';
    
    protected $fillable = ['stated_compl', 'subjective', 'objective', 'assessment', 'prescription', 'remarks', 'plan'];

    public static $rules = [
        'stated_compl' => 'required',
        'subjective' => 'required',
        'objective' => 'required',
        'assessment' => 'required',
        'prescription' => 'required',
        'remarks' => 'required',
        'plan' => 'required'
    ];


    public function isValid()
    {
        //Valid the input.
        $validation = Validator::make($this->attributes, static::$rules);

        if($validation->passes())
        {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }


}