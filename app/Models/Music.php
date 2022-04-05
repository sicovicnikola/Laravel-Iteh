<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Music extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'duration'];
    // protected $guarded = [];


    public function genre(){
        
        return $this->belongsTo(Genre::class);
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    }
 
}
