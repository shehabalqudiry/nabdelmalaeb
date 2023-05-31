@extends('dashboard.layouts.app')

@section('title', __('المباريات') . ' | ' . __('تعديل مبارة'))
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">{{ __('تعديل مبارة') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('dashboard.matches.update', $match->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="league_id">{{ __('الدوري') }}</label>
                            <select class="form-control" id="league_id" name="league_id">
                                <option>{{ __('اختار دوري المبارة') }}</option>
                                @foreach ($leagues as $league)
                                    <option @if($league->id == $match->league_id) selected @endif value="{{ $league->id }}">{{ $league->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="home_team">{{ __('الفريق المضيف') }}</label>
                            <input type="text" name="home_team" value="{{ $match->home_team }}" class="form-control" id="home_team"
                                placeholder="{{ __('الفريق المضيف') }}">
                        </div>
                        <div class="form-group">
                            <label for="away_team">{{ __('الفريق الزائر') }}</label>
                            <input type="text" name="away_team" value="{{ $match->away_team }}" class="form-control" id="away_team"
                                placeholder="{{ __('الفريق الزائر') }}">
                        </div>
                        <div class="form-group">
                            {{-- @dd($match->timing) --}}
                            <label for="timing">{{ __('توقيت المباراة') }}</label>
                            @php
                                $date = new Jenssegers\Date\Date($match->timing, 'EET');
                                $date->setLocale('ar');
                                if(Jenssegers\Date\Date::now() > $date){echo 'انتهت المباراة';}else {echo $date->format('h:i a');}
                            @endphp

                            <input type="datetime-local" name="timing" value="{{ $date->format('Y-m-dTh:i') }}" class="form-control" id="timing">
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
    </div>
@endsection
