<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function images()
    {
        return $this->hasMany(GalleryImage::class, 'gallery_id');
    }
}