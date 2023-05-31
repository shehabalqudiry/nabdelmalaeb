@extends('dashboard.layouts.app')

@section('title', __('الدوريات') . ' | ' . __('اضافة دوري'))
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">{{ __('اضافة دوري') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('dashboard.leagues.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('اسم الدوري') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                                placeholder="{{ __('اسم الدوري') }}">
                        </div>
                        <div class="form-group">
                            <label for="desc">{{ __('وصف') }}</label>
                            <input type="text" name="desc" value="{{ old('desc') }}" class="form-control" id="desc"
                                placeholder="{{ __('اكتب وصف مختصر للدوري') }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('التصنيف') }}</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option>{{ __('اختار تصنيف الدوري') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
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
    </div>
@endsection
