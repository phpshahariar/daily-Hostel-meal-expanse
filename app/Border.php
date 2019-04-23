<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Border extends Model
{
    protected $table= 'borders';
    protected $fillable= ['name', 'date', 'breakfast', 'dinner', 'lunch'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }



}
