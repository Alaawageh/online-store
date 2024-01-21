<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','image'];
    public function setImageAttribute ($image)
    {
        $newImageName = uniqid() . '_' . 'image' . '.' . $image->extension();
        $image->move(public_path('images/categories') , $newImageName);
        return $this->attributes['image'] ='/'.'images/categories'.'/' . $newImageName;
    }
    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
