  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="text-center">
        <a href="/" class="brand-link">
          <img src="{{ asset('dashboard/dist/img/logo.png') }}" width="90" class="img-circle"
               style="opacity: .8">
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ auth()->user()->image_path }}" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a href="{{ route('dashboard.editProfile',auth()->user()->id ) }}" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('dashboard.home') }}" class="nav-link">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>{{ __('الرئيسية') }}</p>
              </a>
            </li>
            {{--  @if(auth()->user()->hasPermission('categories_read'))
            <li class="nav-item">
              <a href="{{ route('dashboard.categories.index') }}" class="nav-link">
                <i class="nav-icon fa fa-server"></i>
                <p>{{ __('التصنيفات') }}</p>
              </a>
            </li>
            @endif  --}}
            @if(auth()->user()->hasPermission('leagues_read'))
            <li class="nav-item">
              <a href="{{ route('dashboard.leagues.index') }}" class="nav-link">
                <i class="nav-icon fa fa-futbol-o"></i>
                <p>{{ __('الدوريات') }}</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('matches_read'))
            <li class="nav-item">
              <a href="{{ route('dashboard.matches.index') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>{{ __('مباريات اليوم') }}</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('videos_read'))
            <li class="nav-item">
              <a href="{{ route('dashboard.videos.index') }}" class="nav-link">
                <i class="nav-icon fa fa-video-camera"></i>
                <p>{{ __('فيديوهات') }}</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('users_read'))
            <li class="nav-item">
              <a href="{{ route('dashboard.users.index') }}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>{{ __('المشرفين') }}</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('articles_read'))
            <li class="nav-item">
              <a href="{{ route('dashboard.articles.index') }}" class="nav-link">
                <i class="nav-icon fa fa-newspaper-o"></i>
                <p>{{ __('المقالات') }}</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('banners_read'))
            <li class="nav-item">
              <a href="{{ route('dashboard.banners.index') }}" class="nav-link">
                <i class="nav-icon fa fa-bullhorn"></i>
                <p>{{ __('الإعلانات') }}</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->hasRole('super_admin'))
            <li class="nav-item">
              <a href="{{ route('dashboard.settings.edit', 1) }}" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>{{ __('إعدادات الموقع') }}</p>
              </a>
            </li>
            @endif
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
