<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('welcome', ['categories' => $categories]);
    }

    public function showAds($category_id)
    {
        $category = Category::findOrFail($category_id);
        $advertisements = Advertisement::where('category_id', $category_id)->get();
        
        return view('advertisement', ['category' => $category, 'advertisements' => $advertisements]);
    }

    public function create()
    {
        $user = Auth::user();
        if($user && ($user->id === 1))
        {
            return view('createCategory');
        }else{
            return redirect()->route('login')->with('error', 'brak uprawnien.');
        }       

        // return view('createCategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|alpha',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

       
    $category = new Category;
    $category->name = $request->name;

    if ($request->hasFile('img')) {
        $imagePath = $request->file('img')->store('public/img');
        $imageName = basename($imagePath);
        $category->img = $imageName;
    }

    $category->save();

        return redirect()->route('welcome')->with('success', 'Kategoria została dodana.');
    }
    
    public function deleteCategory(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        // sprawdzenie czy kategoria ma ogloszenia
        if ($category->advertisements()->exists()) {
            return redirect()->route('welcome')->with('error', 'Nie można usunąć kategorii, ponieważ zawiera ogłoszenia.');
        }

        $category->delete();

        return redirect()->route('welcome')->with('success', 'Kategoria została pomyślnie usunięta.');
    }

    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        
        $user = Auth::user();
        if($user && ($user->id === 1))
        {
            return view('editCategory', compact('category'));
        }else{
            return redirect()->route('login')->with('error', 'brak uprawnien.');
        } 
    }

    public function update(Request $request, $categoryId)
    {
    $category = Category::findOrFail($categoryId);
    
    $category->name = $request->name;

    $category->save();

    return redirect()->route('welcome')->with('success', 'Kategoria została pomyślnie zaktualizowana.');
    }

}
