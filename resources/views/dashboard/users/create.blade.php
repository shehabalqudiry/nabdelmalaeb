@extends('dashboard.layouts.app')

@section('title', __('المشرفين') . ' | ' . __('اضافة مشرف'))
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-8 m-auto">
        <!-- general form elements -->
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">{{ __('اضافة مشرف') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('الاسم') }}</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="{{ __('الاسم') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('البريد الالكتروني') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1"
                            placeholder="{{ __('البريد الالكتروني') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ __('كلمة المرور') }}</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="{{ __('كلمة المرور') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">{{ __('الصورة') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" value="{{ old('image') }}" id="image" name="image" hidden>
                                <label class="btn btn-success" for="image">{{ __('تحميل') }}</label>
                            </div>
                            <div class="m-2">
                                <img class="m-auto img-preview" width="150"
                                    src="{{ asset('uploads/users/default.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('دور المشرف') }}</label>
                        <select class="form-control" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @php
                                $models = [
                                    'users' => 'المشرفين',
                                    'leagues' => 'الدوريات',
                                    'matches' => 'المباريات',
                                    'articles' => 'المقالات',
                                    'videos' => 'الفيديوهات',
                                    'categories' => 'التصنيفات',
                                ];
                                $perm = [
                                    'create' => 'اضافة',
                                    'read' => 'عرض',
                                    'update' => 'تعديل',
                                    'delete' => 'حذف',
                                ];
                            @endphp
                            <!-- Custom Tabs -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">{{ __('الصلاحيات') }}</h3>
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach ($models as $key_model => $m)
                                            <li class="nav-item"><a
                                                    class="nav-link {{ $key_model == 'users' ? 'active' : '' }}"
                                                    href="#tab_{{ $key_model }}"
                                                    data-toggle="tab">{{ __($m) }}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                        <div class="tab-content">
                                        @foreach ($models as $key_model => $m)
                                            <div class="tab-pane {{ $key_model == 'users' ? 'active' : '' }}" id="tab_{{ $key_model }}">
                                                @foreach ($perm as $key_perm => $p)
                                                    <label class="m-3"><input type="checkbox" name="permissions[]"
                                                            value="{{ $key_model }}_{{ $key_perm }}">
                                                        {{ __($p) }}</label>
                                                @endforeach
                                            </div>
                                            <!-- /.tab-pane -->
                                        @endforeach
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                            </div>
                            <!-- ./card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
@endsection
