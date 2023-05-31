@extends('dashboard.layouts.app')
@section('title', 'الرئيسية')
@section('content')
{{-- =================  أهم مباريات اليوم  ================ --}}
@if (auth()->user()->hasPermission('matches_read'))
<div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title mb-2">{{ __('اهم مباريات اليوم') }}</h3>
          @if (auth()->user()->hasPermission('matches_create'))
            <a href="{{ route('dashboard.matches.create') }}" class="btn btn-icon btn-primary">
                <i class="fa fa-plus"></i>
                {{ __('اضافة') }}
            </a>
          @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>{{ __('الفريق المضيف') }}</th>
              <th>{{ __('VS') }}</th>
              <th>{{ __('الفريق الزائر') }}</th>
              <th>{{ __('يوم المباراة') }}</th>
              <th>{{ __('خيارات') }}</th>
            </tr>
            @foreach($matches as $match)
            <tr>
              <td>{{ $match->home_team }}</td>
              <td>VS</td>
              <td>{{ $match->away_team }}</td>
              <td>
                  @php
                      $date = new Jenssegers\Date\Date($match->timing, 'EET');
                      $date->setLocale('ar');
                      if(Jenssegers\Date\Date::now() > $date){echo 'انتهت المباراة';}else {echo $date->format('h:i a');}
                  @endphp
              </td>
              <td>
                @if (auth()->user()->hasPermission('matches_update'))
                <a href="{{ route('dashboard.matches.edit', $match->id) }}" class="btn btn-sm btn-success ml-2"><i class="fa fa-edit"></i>
                    {{ __('تعديل') }}</a>
                @endif
                @if (auth()->user()->hasPermission('matches_delete'))
                    <form action="{{ route('dashboard.matches.destroy', $match->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('delete')
                        <button class="delete btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i>{{ __('حذف') }}</button>
                    </form>
                @endif
            </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div><!-- /.card -->
    </div>
</div><!-- /.row -->
@endif
<div class="row">
    @if (auth()->user()->hasPermission('leagues_read'))
    {{-- =================  البطولات  ================ --}}
    <div class="col-12 col-md-6">
        <div class="card mt-4">
          <div class="card-header">
            <h2 class="card-title mb-2">{{ __('الدوريات') }}</h2>
            @if (auth()->user()->hasPermission('leagues_create'))
              <a href="{{ route('dashboard.leagues.create') }}" class="btn btn-icon btn-sm btn-primary">
                  <i class="fa fa-plus"></i>
                  {{ __('اضافة') }}
              </a>
            @endif
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tr>
                <th>{{ __('الاسم') }}</th>
                <th>{{ __('خيارات') }}</th>
              </tr>
              @foreach($leagues as $league)
              <tr>
                <td>{{ $league->name }}</td>
                <td>
                  @if (auth()->user()->hasPermission('leagues_update'))
                  <a href="{{ route('dashboard.leagues.edit', $league->id) }}" class="btn btn-sm btn-success ml-2"><i class="fa fa-edit"></i>
                      {{ __('تعديل') }}</a>
                  @endif
                  @if (auth()->user()->hasPermission('leagues_delete'))
                      <form action="{{ route('dashboard.leagues.destroy', $league->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('delete')
                        <button class="delete btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i>{{ __('حذف') }}</button>
                    </form>
                  @endif
              </td>
              </tr>
              @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>
    @endif
        @if (auth()->user()->hasPermission('users_read'))
    {{-- =================  المشرفين  ================ --}}
    <div class="col-12 col-md-6">
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title mb-2">{{ __('المشرفين') }}</h3>
          @if (auth()->user()->hasPermission('users_create'))
            <a href="{{ route('dashboard.users.create') }}" class="btn btn-icon btn-primary">
                <i class="fa fa-plus"></i>
                {{ __('اضافة') }}
            </a>
          @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>{{ __('المشرف') }}</th>
              <th>{{ __('الدور') }}</th>
              <th>{{ __('خيارات') }}</th>
            </tr>
            @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->roles->first()->display_name }}</td>
              <td>
                @if (auth()->user()->hasPermission('users_update'))
                <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-success ml-2"><i class="fa fa-edit"></i>
                    {{ __('تعديل') }}</a>
                @endif
                @if (auth()->user()->hasPermission('users_delete'))
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('delete')
                        <button class="delete btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i>{{ __('حذف') }}</button>
                    </form>
                @endif
            </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div><!-- /.card -->
    </div>
    @endif
</div><!-- /.row -->


<div class="row">
    @if (auth()->user()->hasPermission('articles_read'))
    {{-- =================  المقالات  ================ --}}
    <div class="col-12">
        <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title mb-2">{{ __('المقالات') }}</h3>
            @if (auth()->user()->hasPermission('articles_create'))
            <a href="{{ route('dashboard.articles.create') }}" class="btn btn-icon btn-primary">
                <i class="fa fa-plus"></i>
                {{ __('اضافة') }}
            </a>
            @endif

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
            <tr>
                <th>{{ __('عنوان المقال') }}</th>
                <th>{{ __('الدوري') }}</th>
                <th>{{ __('خيارات') }}</th>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->league->name }}</td>
                <td>
                @if (auth()->user()->hasPermission('articles_update'))
                <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-sm btn-success ml-2"><i class="fa fa-edit"></i>
                    {{ __('تعديل') }}</a>
                @endif
                @if (auth()->user()->hasPermission('articles_delete'))
                    <form action="{{ route('dashboard.articles.destroy', $article->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('delete')
                        <button class="delete btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i>{{ __('حذف') }}</button>
                    </form>
                @endif
            </td>
            </tr>
            @endforeach
            </table>
        </div>
        <!-- /.card-body -->
        </div><!-- /.card -->
    </div>
    @endif
</div><!-- /.row -->

@endsection
