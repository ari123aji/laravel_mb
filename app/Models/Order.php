<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Order extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul_lagu'
            ]
        ];
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
