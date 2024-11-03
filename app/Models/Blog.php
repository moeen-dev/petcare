<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var arry<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'category_id',
        'is_publish',
    ];

    public function blogCategory()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'category_id');
    }
}
