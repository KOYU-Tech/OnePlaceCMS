<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('content-manage.dashboard') }}" class="brand-link">
        <img src="/images/administration/logo.png" alt="{{ config('app.name', 'Content Cloud') }}" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Content Cloud') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                    <a href="" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('content-manage.dashboard') }}" class="nav-link {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Управление</li>
                <li class="nav-item has-treeview {{ currentRouteNamedOfArray(['admin.article.*', 'admin.category.*', 'admin.tag.*', 'admin.lang.*', 'admin.menu.*', 'admin.slider.*', 'admin.setting.*']) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ currentRouteNamedOfArray(['admin.article.*', 'admin.category.*', 'admin.tag.*', 'admin.lang.*', 'admin.menu.*', 'admin.slider.*', 'admin.setting.*']) ? 'active' : '' }}">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Контент
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Route::currentRouteNamed('admin.article.*') ? 'active' : '' }}">
                                <i class="fa fa-pencil-square-o nav-icon"></i>
                                <p>Страницы</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Route::currentRouteNamed('admin.category.*') ? 'active' : '' }}">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Категории</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Route::currentRouteNamed('admin.tag.*') ? 'active' : '' }}">
                                <i class="fa fa-tags nav-icon"></i>
                                <p>Теги</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Route::currentRouteNamed('admin.slider.*') ? 'active' : '' }}">
                                <i class="fa fa-picture-o nav-icon"></i>
                                <p>Слайдеры</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Route::currentRouteNamed('admin.menu.*') ? 'active' : '' }}">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Меню</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Route::currentRouteNamed('admin.setting.*') ? 'active' : '' }}">
                                <i class="fa fa-cogs nav-icon"></i>
                                <p>Настройки</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Route::currentRouteNamed('admin.user.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteNamed('admin.user.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Пользователи
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Route::currentRouteNamed('admin.user.*') ? 'active' : '' }}">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Список пользователей</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>