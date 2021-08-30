<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $table ='items';

    protected $fillable = ['item',];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
