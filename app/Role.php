<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use Softdeletes;
    
    protected $fillable = [
        'display_name', 'description', 'is_admin',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
