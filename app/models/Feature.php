<?php

class Feature extends \Eloquent {
	protected $fillable = [];

    public static $rules = [
        'name' => 'required',
    ];

    public function project()
    {
        return $this->belongsTo('Project');
    }
}