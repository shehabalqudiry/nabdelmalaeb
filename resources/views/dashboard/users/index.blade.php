@extends('dashboard.layouts.app')

@section('title', __('المشرفين'))
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title mb-2">{{ __('المشرفين') }}</h3>
          @if (auth()->user()->hasPermission('users_create'))
            <a href="{{ route('dashboard.users.create') }}" class="btn btn-icon btn-primary">
                <i class="fa fa-plus"></i>
                {{ __('اضافة') }}
            </a>
          @endif
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">

              <form action="{{ route('dashboard.users.index') }}" method="GET" class="input-group-append">
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
    </div>
    <!-- /.card -->
    {{ $users->appends(request()->query())->links() }}
    </div>
</div><!-- /.row -->
@endsection
