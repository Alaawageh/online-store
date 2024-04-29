<?php

use App\Models\Category;


function getCategories()
{
    return Category::where('status',true)->orderBy('name')->take(4)->get();
}

?>