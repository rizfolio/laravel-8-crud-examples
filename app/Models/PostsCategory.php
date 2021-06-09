<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsCategory extends Model
{
    use HasFactory;

    protected $fillable = ['posts_id','category_id'];

    protected $guarded = ['posts_id','category_id'];

    protected $table = "post_category";

}
