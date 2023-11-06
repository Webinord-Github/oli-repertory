<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'url',
        'content',
        'user_id',
    ];
    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($page) {
    //         $user = $page->user;
    //         $notification = $user->notifications()->first();

    //         if ($notification) {
    //             $notification->increment('count');
    //         } else {
    //             $user->notifications()->create(['count' => 1]);
    //         }
    //     });
    // }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}


