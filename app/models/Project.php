<?php

class Project extends \Eloquent {
	protected $fillable = [];

    public static $rules = [
        'name' => 'required',
        'url'  => 'required',
    ];


    public function features()
    {
        return $this->hasMany('Feature');
    }

    public function versions()
    {
        return $this->hasMany('Version');
    }

    public function reports()
    {
        return $this->hasMany('Report');
    }
}