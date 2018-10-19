<?php

namespace ArtisanCMS\CMS\Models;

use Illuminate\Database\Eloquent\Model;

class Starter extends Model
{
    protected $guarded = [];
    
    public function doesThisWork()
    {
        return true;
    }
}
