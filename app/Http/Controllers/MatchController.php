<?php

namespace App\Http\Controllers;

use App\League;
use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
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
    $matches = Match::where(function ($q) use ($request) {
        return $q->when($request->search, function ($query) use ($request) {
            return $query->where('home_team', 'like', '%' . $request->search . '%')
                         ->orWhere('away_team', 'like', '%' . $request->search . '%');
        });
    })->latest()->paginate(10);

    return view('dashboard.matches.index', compact(['matches']));
  }

  public function create()
  {
      $leagues = League::all();
      return view('dashboard.matches.create', compact(['leagues']));
  }

  public function store(Request $request)
  {
    $request->validate([
        'league_id'     => 'required',
        'home_team'     => 'required',
        'away_team'     => 'required',
        'timing'        => 'required',
    ]);

    Match::create($request->all());

    session()->flash('success', __('تم إضافة البيانات بنجاح'));
    return redirect()->route('dashboard.matches.index');
  }

  public function edit(Match $match)
  {
    $leagues = League::all();
    return view('dashboard.matches.edit', compact(['match','leagues']));
  }

  public function update(Match $match,Request $request)
  {
    $request->validate([
        'league_id'     => 'required',
        'home_team'     => 'required',
        'away_team'     => 'required',
        'timing'        => 'required',
    ]);

    $match->update($request->all());

    session()->flash('success', __('تم تعديل البيانات بنجاح'));
    return redirect()->route('dashboard.matches.index');
  }

  public function destroy(Match $match)
  {
    $match->delete();
    
    session()->flash('success', __('تم حذف البيانات بنجاح'));
    return redirect()->back();
  }

}

?>
