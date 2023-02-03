<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $table= 'profile';

    protected $fillable = [
        'province',
        'user_id',
        'bio',
        'facebook'
    ];
    
    public function user(){

        return $this->belongsTo('App\Models\User','user_id');
    }

}
