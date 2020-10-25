<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class Company extends Model
{
    use HasFactory, HasHashSlug;

    protected $fillable = [
        'name'
    ];

    public function companyUser(){
        return $this->hasMany('App\Models\CompanyUser');
    }

    public function customer(){
        return $this->hasMany('App\Models\Customer');
    }
}
