<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=['company_id', 'nama', 'email'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
