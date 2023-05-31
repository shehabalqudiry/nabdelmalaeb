@extends('dashboard.layouts.app')

@section('title', __('الإعلانات') . ' | ' . __('اضافة إعلان'))
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">{{ __('اضافة إعلان') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('dashboard.banners.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('الصورة') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" value="{{ old('image') }}" id="image" name="image" hidden>
                                    <label class="btn btn-success" for="image">{{ __('تحميل') }}</label>
                                </div>
                                <div class="m-2">
                                    <img class="m-auto img-preview" width="250"
                                        src="{{ asset('uploads/banners/default.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('اسم الإعلان') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                                placeholder="{{ __('اسم الإعلان') }}">
                        </div>
                        <div class="form-group">
                            <label for="text">{{ __('وصف الإعلان') }}</label>
                            <input type="text" name="text" value="{{ old('text') }}" class="form-control" id="name"
                                placeholder="{{ __('وصف الإعلان يتم وضعه بدلا من الصورة اذا كانت غير موجوده') }}">
                        </div>
                        <div class="form-group">
                            <label for="url">{{ __('الرابط') }}</label>
                            <input type="text" name="url" value="{{ old('url') }}" class="form-control" id="name"
                                placeholder="{{ __('الرابط الإعلان') }}">
                        </div>
                        <div class="form-group">
                            <label for="status">{{ __('حالة الإعلان') }}</label>
                            <select class="form-control" id="status" name="status">
                                <option>{{ __('حالة الإعلان نشط او غير نشط') }}</option>
                                <option value="0">{{ __('غير نشط') }}</option>
                                <option value="1">{{ __('نشط') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col col-md-3">
                                <label for="place" class="form-control-label">{{ __('مكان الإعلان') }}</label>
                            </div>
                            @php
                                $places = [
                                	1  => 'الصفحة الرئيسية',
                                	2  => 'الصفحة الرئيسية 2',
                                	3  => 'المقالات',
                                	4  => 'المقالات 2',
                                	5  => 'المقالات العاجله',
                                	6  => 'المقالات العاجله 2',
                                	7  => 'صفحة تفاصيل المقال',
                                	8  => 'صفحة تفاصيل المقال 2',
                                	9  => 'صفحة الدوري',
                                	10 => 'صفحة الدوري 2',
                                	11 => 'صفحة المباريات',
                                	12 => 'صفحة المباريات 2',
                                	13 => 'صفحة التصنيف',
                                	14 => 'صفحة التصنيف 2',
                                	15 => 'الفيديوهات',
                                	16 => 'الفيديوهات 2'
                                ];
                                
                            @endphp
                            <div class="col-12 col-md-9">
                                <select class="form-control" id="place" name="place">
                                    <option value="">{{ __('أمكان الإعلان ظهور الإعلان في الاماكن المخصصة') }}</option>
                                    @foreach($places as $i => $p)
                                    <option value="{{ $i }}">{{ __($p) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('اضافة') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="form-group mt-4">
            <div class="col col-md-4 align-item-center">
                <label class="form-control-label">{{ __('معاينة الاعلان') }}</label>
            </div>
            <div class="col col-md-4 text-center">
                <div class="card banner_image_preview">
                    <img src="{{ asset('uploads/banners/default.png') }}" class="banner_image_preview card-img-top img-preview" width="300">
                  </div>
            </div>
        </div>
    </div>
@endsection
