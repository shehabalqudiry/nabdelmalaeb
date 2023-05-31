@extends('dashboard.layouts.app')

@section('title', __('الصفحةالشخصية') . ' | ' . __('تعديل'))
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-8 m-auto">
        <!-- general form elements -->
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">{{ __('تعديل الملف الشخصي') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('الاسم') }}</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="{{ __('الاسم') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('البريد الالكتروني') }}</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1"
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
                                <input type="file" class="custom-file-input" id="image" name="image" hidden>
                                <label class="btn btn-success" for="image">{{ __('تحميل') }}</label>
                            </div>
                            <div class="m-2">
                                <img class="m-auto img-preview" width="150"
                                    src="{{ $user->image_path }}">
                            </div>
                        </div>
                    </div>
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
