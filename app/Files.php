<?php
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['path', 'record_id'];

    protected $table = 'files';


    public function record()
    {
        return $this->belongsTo('record');
    }
}
