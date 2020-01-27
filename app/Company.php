<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Company extends Model
{
    protected $fillable=['nama', 'email', 'logo', 'website'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function setLogoAttribute($logo)
    {
        if(!empty($this->attributes['logo'])){
            Storage::delete($this->attributes['logo']);
        }
        $this->attributes['logo'] = $logo->store('company');
    }

    // public function getLogoAttribute($logo)
    // {
    //     return Storage::download($logo);
    // }
}
