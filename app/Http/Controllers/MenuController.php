<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('menuItems')->get();
        return view('menu.index', compact('categories'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('menu.categories', compact('categories'));
    }

    public function categoryMenu(Category $category)
    {
        $categories = Category::all();
        $category->load('menuItems');
        return view('menu.category_menu', compact('categories', 'category'));
    }

    public function showItem(\App\Models\MenuItem $menuItem)
    {
        return view('menu.item', compact('menuItem'));
    }
}
