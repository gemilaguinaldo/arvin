<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseCategory extends Model
{
    use Softdeletes;

    protected $fillable = [
        'display_name', 'description'
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
