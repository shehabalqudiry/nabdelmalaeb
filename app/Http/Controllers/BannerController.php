<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
class BannerController extends Controller
{
    public function __construct()
	{
		$this->middleware(['permission:banners_create'])->only('create');
		$this->middleware(['permission:banners_read'])->only('index');
		$this->middleware(['permission:banners_update'])->only('edit');
		$this->middleware(['permission:banners_delete'])->only('destroy');
	}

  public function index(Request $request)
  {
      $banners = Banner::where(function ($q) use ($request) {
        return $q->when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        });
    })->latest()->paginate(10);
      return view('dashboard.banners.index', compact(['banners']));
  }


  public function create()
  {
    return view('dashboard.banners.create');
  }


  public function store(Request $request)
  {
    $request->validate([
        'name'      => 'required',
        'url'       => 'required',
        'text'      => 'required',
        'image'     => 'nullable|image',
        'place'     => 'required|min:1',
        'status'    => 'required|min:1',
    ]);

    $data = $request->except(['image']);

    if ($request->image) {
            Image::make($request->image)->resize(350, 280)->save(public_path('../uploads/banners/' . $request->image->hashName()));
        $data['image'] = $request->image->hashName();
    } else {
        $data['image'] = 'default.png';
    }

    Banner::create($data);

    session()->flash('success', __('تم اضافة البيانات بنجاح'));
    return redirect()->route('dashboard.banners.index');
  }


  public function edit(Banner $banner)
  {
    return view('dashboard.banners.edit', compact(['banner']));
  }


  public function update(Banner $banner, Request $request)
  {
    $request->validate([
        'name'      => 'required',
        'url'       => 'required',
        'text'      => 'required',
        'image'     => 'image',
        'place'     => 'required',
        'status'    => 'required',
    ]);

    $data = $request->except(['image']);

    if ($request->image) {
        Image::make($request->image)->resize(350, 280)->save(public_path('../uploads/banners/' . $request->image->hashName()));

        if ($banner->image != 'default.png') {
            Storage::disk('public_uploads')->delete('banners/' . $banner->image);
        };
        $data['image'] = $request->image->hashName();
    } else {
        $data['image'] = $banner->image;
    }

    $banner->update($data);

    session()->flash('success', __('تم تعديل البيانات بنجاح'));
    return redirect()->route('dashboard.banners.index');
  }


  public function destroy(Banner $banner)
  {
    if ($banner->image != 'default.png') {
        Storage::disk('public_uploads')->delete('banners/' . $banner->image);
    };

    $banner->delete();

    session()->flash('success', __('تم حذف البيانات بنجاح'));
    return redirect()->back();
  }

}

?>
