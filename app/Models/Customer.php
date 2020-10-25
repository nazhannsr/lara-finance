<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class Customer extends Model
{
    use HasFactory, HasHashSlug;

    protected $fillable = [
        'user_id', 'company_id'
    ];

    public function company(){
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function transaction(){
        return $this->hasMany('App\Models\Transaction', 'customer_id');
    }
}
