<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserBook extends Model
{
    public function book(){
        return $this->belongsTo(book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;

}
