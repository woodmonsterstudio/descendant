<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $fillable = ['name','local_name','dob'];

    public function parents()
    {
        return $this->belongsToMany(Member::class, 'relation', 'member_id', 'parent_id');
    }

    public function children()
    {
        return $this->belongsToMany(Member::class, 'relation', 'parent_id', 'member_id')->wherePivot('spouse', 0);
    }
    public function spouse()
    {
        return $this->belongsToMany(Member::class, 'relation', 'parent_id', 'member_id')->wherePivot('spouse', 1);
    }
     public function scopeToplevel($query)
    {
        return $query->doesntHave('parents')->get()->intersect($query->has('children')->get());
    }

 	public function getAgeAttribute()
 	{
 		return \Carbon::parse($this->dob)->diffInYears(\Carbon::now());
 	}   
}
