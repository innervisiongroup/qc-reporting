<?php

class Report extends \Eloquent {
	protected $fillable = [];

    public function project()
    {
        return $this->belongsTo('Project');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tests()
    {
        return $this->hasMany('Test');
    }

    

}