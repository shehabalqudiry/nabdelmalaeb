<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Image;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware(['permission:users_create'])->only('create');
		$this->middleware(['permission:users_read'])->only('index');
		$this->middleware(['permission:users_update'])->only('edit');
		$this->middleware(['permission:users_delete'])->only('destroy');
	}
	public function index(Request $request)
	{
		$users = User::whereRoleIs(['admin', 'editor'])->where(function ($q) use ($request) {
			return $q->when($request->search, function ($query) use ($request) {
				return $query->where('name', 'like', '%' . $request->search . '%');
			});
		})->latest()->paginate(10);
		return view('dashboard.users.index', compact(['users']));
	}


	public function create()
	{
		$roles = Role::all()->except(1);
		return view('dashboard.users.create', compact(['roles']));
	}

	public function store(Request $request)
	{
		$request->validate([
			'name'          => 'required',
			'email'         => 'required|unique:users',
			'password'      => 'required',
			'image'         => 'image',
			'role'          => 'required',
			'permissions'   => 'required',
		]);
		$data = $request->except(['password', 'image', 'role', 'permissions']);

		$data['password'] = bcrypt($request->password);

		if ($request->image) {
			Image::make($request->image)->resize(300, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('../uploads/users/' . $request->image->hashName()));

			$data['image'] = $request->image->hashName();
		} else {
			$data['image'] = 'default.png';
		}

		$user = User::create($data);
		$user->attachRole($request->role);
		$user->syncPermissions($request->permissions);

		session()->flash('success', __('تم اضافة البيانات بنجاح'));
		return redirect()->route('dashboard.users.index');
	}

	public function editProfile(User $user)
	{
	    $user = auth()->user();
		return view('dashboard.users.edit_profile', compact(['user']));
	}

	public function updateProfile(User $user, Request $request)
	{
	    $user = auth()->user();
		$request->validate([
			'name'          => 'required',
			'email'         => ['required', Rule::unique('users')->ignore($user->id)],
			'password'      => 'nullable',
			'image'         => 'nullable|image',
		]);
		$data = $request->except(['password', 'image']);
		if ($request->password) {
			$data['password'] = bcrypt($request->password);
		} else {
			$data['password'] = $user->password;
		}

		if ($request->image) {
			Image::make($request->image)->resize(300, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('../uploads/users/' . $request->image->hashName()));

			$data['image'] = $request->image->hashName();
		} else {
			$data['image'] = $user->image;
		}

		$user->update($data);

		session()->flash('success', __('تم تعديل البيانات بنجاح'));
		return redirect()->route('dashboard.users.index');
	}
	
	public function edit(User $user)
	{
		$roles = Role::all()->except(1);
		return view('dashboard.users.edit', compact(['user', 'roles']));
	}
	
	public function update(User $user, Request $request)
	{
		$request->validate([
			'name'          => 'required',
			'email'         => ['required', Rule::unique('users')->ignore($user->id)],
			'password'      => 'nullable',
			'image'         => 'nullable|image',
			'role'          => 'required',
			'permissions'   => 'required|min:1',
		]);
		$data = $request->except(['password', 'image', 'role', 'permissions']);
		if ($request->password) {
			$data['password'] = bcrypt($request->password);
		} else {
			$data['password'] = $user->password;
		}

		if ($request->image) {
			Image::make($request->image)->resize(300, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('../uploads/users/' . $request->image->hashName()));

			$data['image'] = $request->image->hashName();
		} else {
			$data['image'] = $user->image;
		}

		$user->update($data);
		$user->syncRoles([$request->role]);
		$user->syncPermissions($request->permissions);

		session()->flash('success', __('تم تعديل البيانات بنجاح'));
		return redirect()->route('dashboard.users.index');
	}


	public function destroy(User $user)
	{
		if ($user->image != 'default.png') {
			Storage::disk('public_uploads')->delete('users/' . $user->image);
		};

		$user->delete();

		session()->flash('success', __('تم حذف البيانات بنجاح'));
		return redirect()->back();
	}
}
