<?php

use App\Models\Category;


function getCategories()
{
    return Category::orderBy('name')->take(4)->get();
}

?>