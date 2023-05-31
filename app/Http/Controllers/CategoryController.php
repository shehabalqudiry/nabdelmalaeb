<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
	{
		$this->middleware(['permission:categories_create'])->only('create');
		$this->middleware(['permission:categories_read'])->only('index');
		$this->middleware(['permission:categories_update'])->only('edit');
		$this->middleware(['permission:categories_delete'])->only('destroy');
	}

  public function index(Request $request)
  {
    $categories = Category::where(function ($q) use ($request) {
        return $q->when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        });
    })->latest()->paginate(10);
    return view('dashboard.categories.index', compact(['categories']));
  }

  public function create()
  {
    return view('dashboard.categories.create');
  }


  public function store(Request $request)
  {
    $request->validate([
        'name'  => 'required|max:255',
    ]);

    Category::create($request->all());

    session()->flash('success', __('تم اضافة البيانات بنجاح'));
    return redirect()->route('dashboard.categories.index');

  }


  public function edit(Category $category)
  {
    return view('dashboard.categories.edit', compact(['category']));
  }

  public function update(Category $category, Request $request)
  {
    $request->validate([
        'name'  => 'required|max:255',
    ]);

    $category->update($request->all());

    session()->flash('success', __('تم تعديل البيانات بنجاح'));
    return redirect()->route('dashboard.categories.index');
  }

  public function destroy(Category $category)
  {
    $category->delete();

    session()->flash('success', __('تم حذف البيانات بنجاح'));
    return redirect()->back();
  }

}

?>
