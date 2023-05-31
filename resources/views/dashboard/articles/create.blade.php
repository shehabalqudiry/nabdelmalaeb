@extends('dashboard.layouts.app')

@section('title', __('المقالات') . ' | ' . __('اضافة مقال'))
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">{{ __('اضافة مقال') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('dashboard.articles.store') }}" method="POST"
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
                                        src="{{ asset('uploads/articles/default.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">{{ __('عنوان المقال') }}</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"
                                placeholder="{{ __('عنوان المقال') }}">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ __('نص مصغر') }}</label>
                            <input type="text" name="excerpt" value="{{ old('excerpt') }}" class="form-control" id="excerpt"
                                placeholder="{{ __('يمكنك كتابة تصغير للمقال او نبذة تشويقية للمقال') }}">
                            <span>{{ __('يجب ان يكون ضمن المقال') }}</span>
                        </div>
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <small>{{ __('محتوي المقال') }}</small>
                                </h3>
                                <!-- tools box -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="remove"
                                        data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <textarea placeholder="{{ __('المقال') }}" id="body" name="body" style="width: 100%">
                                        {{ old('body') }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="form-group">
                            <label>{{ __('حصري') }}</label>
                            <select class="form-control" name="exclusive">
                                <option value="0">{{ __('لا') }}</option>
                                <option value="1">{{ __('نعم') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('الدوري') }}</label>
                            <select class="form-control" name="league_id">
                                @foreach ($leagues as $league)
                                    <option value="{{ $league->id }}">{{ $league->name }}</option>
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
        <!--/.col (left) -->
    </div>
@endsection
