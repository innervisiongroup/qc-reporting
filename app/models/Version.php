<?php

class Version extends \Eloquent {
	protected $fillable = [];

    public static $rules = [
        'name' => 'required',
    ];
    
}