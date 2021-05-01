<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function show()
    {

        $categories = Category::where('user_id', auth()->id())->get();

        return view('partials.sidenav', [
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'name'    => 'bail|required|min:3',
            'user_id' => 'bail|required',
        ]);

        Category::create($validate);

        return redirect()->back();
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->back();
    }

}
