<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;
use App\Models\User;
 

class Post extends Model
{
    use HasFactory;
     
    protected $dates =  ['delete_at'];
    protected $table = 'posts';
    protected $fillable = [
        'title','content','user-id','slag','photo'

    ];

    public function user(){

        return $this->belongsTo('App\Models\User','user-id');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

}
