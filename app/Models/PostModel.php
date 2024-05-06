<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';

//    public $timestamps = false;
    protected $fillable= [
        'user_id',
        'post_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
