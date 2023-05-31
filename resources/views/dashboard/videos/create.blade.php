@extends('dashboard.layouts.app')

@section('title', __('الفيديوهات') . ' | ' . __('اضافة فيديو'))
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">{{ __('اضافة فيديو') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('dashboard.videos.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">{{ __('عنوان الفيديو') }}</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"
                                placeholder="{{ __('اكتب عنوان الفيديو') }}">
                        </div>
                        <div class="form-group">
                            <label for="desc">{{ __('وصف') }}</label>
                            <input type="text" name="desc" value="{{ old('desc') }}" class="form-control" id="desc"
                                placeholder="{{ __('اكتب وصف مختصر للفيديو') }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube_url">{{ __('تضمين الفيديو') }}</label>
                            <textarea type="text" name="youtube_url" class="form-control" id="youtube_url"
                                placeholder="{{ __('اكتب نص تضمين الفيديو من اليوتيوب') }}">{{ old('youtube_url') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="league_id">{{ __('الدوري') }}</label>
                            <select class="form-control" id="league_id" name="league_id">
                                <option>{{ __('اختار الدوري او البطولة المرتبط بها هذا الفيديو') }}</option>
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
    </div>
@endsection
