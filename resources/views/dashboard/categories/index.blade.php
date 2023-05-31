@extends('dashboard.layouts.app')

@section('title', __('التصنيفات'))
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title mb-2">{{ __('التصنيفات') }}</h3>
          @if (auth()->user()->hasPermission('categories_create'))
            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-icon btn-primary">
                <i class="fa fa-plus"></i>
                {{ __('اضافة') }}
            </a>
          @endif
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">

              <form action="{{ route('dashboard.categories.index') }}" method="GET" class="input-group-append">
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
              <th>{{ __('الاسم') }}</th>
              <th>{{ __('خيارات') }}</th>
            </tr>
            @foreach($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>
                @if (auth()->user()->hasPermission('categories_update'))
                <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-success ml-2"><i class="fa fa-edit"></i>
                    {{ __('تعديل') }}</a>
                @endif
                @if (auth()->user()->hasPermission('categories_delete'))
                    <label class="btn btn-sm btn-danger" for="formDelete">
                        <i class="fa fa-trash"></i>
                        {{ __('حذف') }}</label>
                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post" hidden>
                        @csrf
                        @method('delete')
                        <input class="delete" type="submit" id="formDelete">
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
    {{ $categories->appends(request()->query())->links() }}
    </div>
</div><!-- /.row -->
@endsection
