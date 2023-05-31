@extends('dashboard.layouts.app')

@section('title', __('المقالات'))
@section('content')
<div class="row">
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
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">

              <form action="{{ route('dashboard.articles.index') }}" method="GET" class="input-group-append">
                @csrf
                <input type="text" name="search" class="form-control float-right" placeholder="{{ __('بحث ...') }}" value="{{ request()->search }}">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
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
    </div>
    <!-- /.card -->
    {{ $articles->appends(request()->query())->links() }}
    </div>
</div><!-- /.row -->
@endsection
