<?php

namespace App\Http\Controllers;

use App\Article;
use App\League;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;


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

class ArticleController extends Controller
{

	public function __construct()
	{
		$this->middleware(['permission:articles_create'])->only('create');
		$this->middleware(['permission:articles_read'])->only('index');
		$this->middleware(['permission:articles_update'])->only('edit');
		$this->middleware(['permission:articles_delete'])->only('destroy');
	}

	public function index(Request $request)
	{
		$articles = Article::where(function ($q) use ($request) {
			return $q->when($request->search, function ($query) use ($request) {
				return $query->where('title', 'like', '%' . $request->search . '%');
			});
		})->latest()->paginate(10);
		return view('dashboard.articles.index', compact(['articles']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $leagues = League::all();
        $users = User::whereRoleIs(['admin', 'editor'])->get();
        return view('dashboard.articles.create', compact(['leagues','users']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $request->validate([
            'title'         => 'required|max:255',
            'body'          => 'required',
            'image'         => 'image',
            'exclusive'     => 'required',
            'excerpt'       => 'required|max:255',
            'league_id'     => 'required',
        ]);

        $data = $request->except(['image','user_id']);

        if ($request->image) {
			Image::make($request->image)->save(public_path('../uploads/articles/' . $request->image->hashName()));

			$data['image']  = $request->image->hashName();
		} else {
			$data['image']  = 'default.png';
        }
        $data['user_id']    = auth()->user()->id;
        $data['slug']       = make_slug($request->title);

        Article::create($data);

        session()->flash('success', __('تم اضافة البيانات بنجاح'));
		return redirect()->route('dashboard.articles.index');
	}

	public function edit(Article $article)
	{
        $leagues = League::all();;
        return view('dashboard.articles.edit', compact(['leagues','article']));
	}

	public function update(Article $article, Request $request)
	{
        $request->validate([
            'title'         => 'required|max:255',
            'body'          => 'required',
            'image'         => 'image',
            'exclusive'     => 'required',
            'excerpt'       => 'required|max:255',
            'league_id'     => 'required',
        ]);

        $data = $request->except(['image','user_id']);

        if ($request->image) {
			Image::make($request->image)->resize(300, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('../uploads/articles/' . $request->image->hashName()));
            if ($article->image != 'default.png') {
                Storage::disk('public_uploads')->delete('articles/' . $article->image);
            };
			$data['image']  = $request->image->hashName();
		} else {
			$data['image']  = $article->image;
        }
        $data['user_id']    = auth()->user()->id;
        $data['slug']       = make_slug($request->title);

        $article->update($data);

        session()->flash('success', __('تم تعديل البيانات بنجاح'));
		return redirect()->route('dashboard.articles.index');
	}

	public function destroy(Article $article)
	{
        if ($article->image != 'default.png') {
			Storage::disk('public_uploads')->delete('articles/' . $article->image);
		};

		$article->delete();

		session()->flash('success', __('تم حذف البيانات بنجاح'));
		return redirect()->back();
    }
}
