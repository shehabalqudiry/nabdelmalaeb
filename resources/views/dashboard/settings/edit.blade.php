@extends('dashboard.layouts.app')

@section('title', __('بيانات الموقع') . ' | ' . __('تعديل'))
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">{{ __('تعديل بيانات الموقع') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('dashboard.settings.update', 1) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('الشعار') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" value="{{ old('logo') }}" id="image" name="logo" hidden>
                                    <label class="btn btn-success" for="image">{{ __('تحميل') }}</label>
                                </div>
                                <div class="m-2">
                                    <img class="m-auto img-preview" width="250"
                                        src="{{ $setting->image_path }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('بانر الصفحة الرئيسية') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" value="{{ old('banner') }}" id="banner" name="banner" hidden>
                                    <label class="btn btn-success" for="banner">{{ __('تحميل') }}</label>
                                </div>
                                <div class="m-2">
                                    <img class="m-auto img-preview" width="250"
                                        src="{{ asset('uploads/settings/' . $setting->banner) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sitename">{{ __('إسم الموقع') }}</label>
                            <input type="text" name="sitename" value="{{ $setting->sitename }}" class="form-control" id="sitename"
                                placeholder="{{ __('إسم الموقع') }}">
                        </div>
                        <div class="form-group">
                            <label for="desc">{{ __('نبذة مختصرة عن الموقع') }}</label>
                            <textarea placeholder="{{ __('نبذة مختصرة عن الموقع') }}" id="desc" name="desc" class="form-control">{{ $setting->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('البريد الالكتروني') }}</label>
                            <input type="email" name="email" value="{{ $setting->email }}" class="form-control" id="email"
                                placeholder="{{ __('البريد الالكتروني') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">{{ __('العنوان') }}</label>
                            <input type="text" name="address" value="{{ $setting->address }}" class="form-control" id="address"
                                placeholder="{{ __('العنوان') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('الهاتف') }}</label>
                            <input type="text" maxlength="35" name="phone" value="{{ $setting->phone }}" class="form-control" id="phone"
                                placeholder="{{ __('الهاتف') }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook">{{ __('Facebook Link') }}</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control" id="facebook"
                                placeholder="{{ __('Facebook Link') }}">
                        </div>
                        <div class="form-group">
                            <label for="twitter">{{ __('Twitter Link') }}</label>
                            <input type="text" name="twitter" value="{{ $setting->twitter }}" class="form-control" id="twitter"
                                placeholder="{{ __('Twitter Link') }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">{{ __('Youtube Link') }}</label>
                            <input type="text" name="youtube" value="{{ $setting->youtube }}" class="form-control" id="youtube"
                                placeholder="{{ __('Youtube Link') }}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('تعديل') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
