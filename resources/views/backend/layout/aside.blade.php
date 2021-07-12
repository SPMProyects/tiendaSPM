<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{asset('back/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{asset('back/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
    </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
        </button>
        </div>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Configuracion sitio
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('config.general')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Generales</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('config.home')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pagina Inicio</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('config.company')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pagina Empresa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('config.chat-rrss-contact')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Chat, RRSS y contacto</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('config.email')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Correo electronico</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('config.popup')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pop Ups</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('backend.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Dashboard
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Usuarios
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lista</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Categorias
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lista</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Monedas
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('currencies.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lista</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('currencies.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Imagenes
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('images.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lista</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('images.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subir</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Productos
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('products.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lista</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Ordenes
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('orders.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lista</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('orders.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear</p>
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