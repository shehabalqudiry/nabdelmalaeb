@extends('dashboard.layouts.app')

@section('title', __('المباريات') . ' | ' . __('اضافة مبارة'))
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">{{ __('اضافة مبارة') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('dashboard.matches.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="league_id">{{ __('الدوري') }}</label>
                            <select class="form-control" id="league_id" name="league_id">
                                <option>{{ __('اختار دوري المبارة') }}</option>
                                @foreach ($leagues as $league)
                                    <option value="{{ $league->id }}">{{ $league->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="home_team">{{ __('الفريق المضيف') }}</label>
                            <input type="text" name="home_team" value="{{ old('home_team') }}" class="form-control" id="home_team"
                                placeholder="{{ __('الفريق المضيف') }}">
                        </div>
                        <div class="form-group">
                            <label for="away_team">{{ __('الفريق الزائر') }}</label>
                            <input type="text" name="away_team" value="{{ old('away_team') }}" class="form-control" id="away_team"
                                placeholder="{{ __('الفريق الزائر') }}">
                        </div>
                        <div class="form-group">
                            <label for="timing">{{ __('توقيت المباراة') }}</label>
                            <input type="datetime-local" name="timing" value="{{ old('timing') }}" class="form-control" id="timing"
                                placeholder="{{ __('توقيت المباراة') }}">
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
