<?php

namespace App\Http\Controllers;

use App\Video;
use App\League;
use Illuminate\Http\Request;


function make_slug($string = null, $separator = "-")
{
    if (is_null($string)) {
        return "";
    }

    // Remove spaces from the beginning and from the end of the string
    $string = trim($string);

    // Lower case everything
    // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
    $string = mb_strtolower($string, "UTF-8");;

    // Make alphanumeric (removes all other characters)
    // this makes the string safe especially when used as a part of a URL
    // this keeps latin characters and arabic charactrs as well
    $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئ ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ف ق ك ل م ن ه و ي ة ى]/u", "", $string);

    // Remove multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}

class VideoController extends Controller
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
        $videos = Video::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('title', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);

        return view('dashboard.videos.index', compact(['videos']));
	}

	public function create()
	{
        $leagues = League::all();
        return view('dashboard.videos.create', compact(['leagues']));
	}

	public function store(Request $request)
	{
        $request->validate([
            'league_id'     => 'required',
            'title'         => 'required|max:255',
            'desc'          => 'nullable',
            'youtube_url'   => 'required',
        ]);
        $data['slug']       = make_slug($request->title);

        Video::create($request->all());

        session()->flash('success', __('تم إضافة البيانات بنجاح'));
        return redirect()->route('dashboard.videos.index');
	}

	public function edit(Video $video)
	{
        $leagues = League::all();
        return view('dashboard.videos.edit', compact(['video','leagues']));
	}


	public function update(Video $video, Request $request)
	{
        $request->validate([
            'league_id'     => 'required',
            'title'         => 'required|max:255',
            'desc'          => 'nullable',
            'youtube_url'   => 'required',
        ]);

        $data['slug']       = make_slug($request->title);
        $video->update($request->all());

        session()->flash('success', __('تم تعديل البيانات بنجاح'));
        return redirect()->route('dashboard.videos.index');
	}

	public function destroy(Video $video)
	{

        $video->delete();
        session()->flash('success', __('تم حذف البيانات بنجاح'));
        return redirect()->back();
	}
}
