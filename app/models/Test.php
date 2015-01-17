<?php

class Test extends \Eloquent {
	protected $fillable = [];

    public function report()
    {
        return $this->belongsTo('Report');
    }

    public function feature()
    {
        return $this->belongsTo('Feature');
    }

    public function platform()
    {
        return $this->belongsTo('Platform');
    }

    public function getPassAttribute()
    {
        if (is_null($this->report) OR is_null($this->feature) OR is_null($this->platform)) {
            return false;
        }
        return true;
    }
}