<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
   // protected $fillable=['title','name','location','description','tags','email'];

    public function scopeFilter($query,array $filters){

        if($filters['tag']?? false){
            $query->where('tags','like','%'.request('tag').'%');
        }

        
        if($filters['search']?? false){
            $query->where('title','like','%'.request('search').'%')
            ->orWhere('name','like','%'.request('search').'%')
            ->orWhere('tags','like','%'.request('search').'%')
            ->orWhere('location','like','%'.request('search').'%');
        }
    }

    //relationship to user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
