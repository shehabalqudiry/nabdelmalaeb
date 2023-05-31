<?php

namespace App\Http\Controllers;

use App\Category;
use App\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function __construct()
	{
		$this->middleware(['permission:leagues_create'])->only('create');
		$this->middleware(['permission:leagues_read'])->only('index');
		$this->middleware(['permission:leagues_update'])->only('edit');
		$this->middleware(['permission:leagues_delete'])->only('destroy');
	}

  public function index(Request $request)
  {
    $leagues = League::where(function ($q) use ($request) {
        return $q->when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        });
    })->latest()->paginate(10);

    return view('dashboard.leagues.index',compact(['leagues']));
  }

  public function create()
  {
    $categories = Category::all();
    return view('dashboard.leagues.create',compact(['categories']));
  }


  public function store(Request $request)
  {
    $request->validate([
        'name'          => 'required|max:255',
        'desc'          => 'nullable',
        'category_id'   => 'required',
    ]);

    League::create($request->all());
    session()->flash('success', __('تم إضافة البيانات بنجاح'));
    return redirect()->route('dashboard.leagues.index');
  }

  public function edit(League $league)
  {
    $categories = Category::all();
    return view('dashboard.leagues.edit',compact(['league','categories']));
  }

  public function update(League $league, Request $request)
  {
    $request->validate([
        'name'          => 'required|max:255',
        'desc'          => 'nullable',
        'category_id'   => 'required',
    ]);

    $league->update($request->all());

    session()->flash('success', __('تم تعديل البيانات بنجاح'));
    return redirect()->route('dashboard.leagues.index');
  }

  public function destroy(League $league)
  {
    $league->delete();

    session()->flash('success', __('تم حذف البيانات بنجاح'));
    return redirect()->back();
  }

}

?>
