@extends('dashboard.layouts.app')

@section('title', __('الاعلانات'))
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title mb-2">{{ __('الاعلانات') }}</h3>
          @if (auth()->user()->hasPermission('banners_create')) 
            <a href="{{ route('dashboard.banners.create') }}" class="btn btn-icon btn-primary">
                <i class="fa fa-plus"></i>
                {{ __('اضافة') }}
            </a>
          @endif
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                
              <form action="{{ route('dashboard.banners.index') }}" method="GET" class="input-group-append">
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
              <th>{{ __('الاعلان') }}</th>
              <th>{{ __('خيارات') }}</th>
            </tr>
            @foreach($banners as $banner)
            <tr>
              <td>{{ $banner->name }}</td>
              <td>
                @if (auth()->user()->hasPermission('banners_update'))
                <a href="{{ route('dashboard.banners.edit', $banner->id) }}" class="btn btn-sm btn-success ml-2"><i class="fa fa-edit"></i> 
                    {{ __('تعديل') }}</a>
                @endif
                @if (auth()->user()->hasPermission('banners_delete'))
                    <form action="{{ route('dashboard.banners.destroy', $banner->id) }}" method="post" style="display:inline-block;">
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
    {{ $banners->appends(request()->query())->links() }}
    </div>
  </div><!-- /.row -->
@endsection
