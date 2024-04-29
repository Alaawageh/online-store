<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\storeRequest;
use App\Http\Requests\Category\updateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withoutGlobalScope('status')->paginate(10);
        return view('backend.category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(storeRequest $request)
    {
        $categories = Category::create($request->safe()->all());
        return redirect(route('category.index', $categories))->with(['success'=>'Created Successfully']);
    }

    public function edit(Category $category)
    {
        return view('backend.category.edit',[
            'category' => $category
        ]);
    }
    public function update(updateRequest $request, Category $category)
    {
        $category->update($request->safe()->all());
        return redirect(route('category.index'))->with(['update'=>'Updated Successfully']);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with(['delete'=>'Deleted Successfully']);
    }
    public function changeStatus(Category $category)
    {
        $category->update(['status' => !$category->status]);
        return redirect(route('category.index'))->with(['update'=>'Updated Successfully']);

    }


}
