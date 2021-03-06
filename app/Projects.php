<?php namespace App;
use Illuminate\Database\Eloquent\Model;

// instance of Posts class will refer to posts table in database

class Projects extends Model {
    //restricts columns from modifying
    protected $guarded = [];
    // posts has many comments

    // returns the instance of the user who is author of that post
    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }
}