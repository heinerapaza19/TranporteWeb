<?php

return [

    'title' => 'Panel de Transporte',
    'title_prefix' => '',
    'title_postfix' => '',

    'use_ico_only' => false,
    'use_full_favicon' => false,

    'google_fonts' => [
        'allowed' => true,
    ],

    'logo' => '<b>Transporte</b>App',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_alt' => 'Logo Transporte',

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Logo Autenticación',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Imagen de carga',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => true,

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_btn' => 'btn-flat btn-primary',

    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_topnav' => 'navbar-dark navbar-gray-dark',

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Ítems del menú (Navbar y Sidebar)
    |--------------------------------------------------------------------------
    */
    'menu' => [
        // Ítems de la barra superior
        [
            'type' => 'navbar-search',
            'text' => 'Buscar...',
            'topnav_right' => true,
        ],
        [
            'text' => '',
            'topnav_right' => true,
            'icon' => 'fas fa-adjust', // 🌙/☀️ icono del modo
            'id' => 'btnThemeTop',
            'classes' => 'nav-link',
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Ítems del menú lateral
        [
            'text' => 'Inicio',
            'url' => '/',
            'icon' => 'fas fa-fw fa-home',
        ],
        [
            'text' => 'Rutas de Transporte',
            'url'  => 'rutas',
            'icon' => 'fas fa-route',
        ],
        [
    'text' => 'Vehículos',
    'url'  => 'micro',
    'icon' => 'fas fa-car',
],

    [
        'text'    => 'Administrador',
        'icon'    => 'fas fa-fw fa-users',
        'submenu' => [
        [
            'text' => 'Empresa San Román',
            'url'  => 'empresa/login?empresa=sanroman',
            'icon' => 'fas fa-bus text-info',
        ],
        [
            'text' => 'Línea 18',
            'url'  => 'empresa/login?empresa=linea18',
            'icon' => 'fas fa-bus text-success',
        ],
        [
            'text' => 'Línea 22',
            'url'  => 'empresa/login?empresa=linea22',
            'icon' => 'fas fa-bus text-primary',
        ],
        [
            'text' => 'Línea 55',
            'url'  => 'empresa/login?empresa=linea55',
            'icon' => 'fas fa-bus text-warning',
        ],
    ],
],


        [
            'text' => 'Conductores',
            'url'  => 'chofer',
            'icon' => 'fas fa-id-card', 
        ],
        [
            'text' => 'Reportes',
            'url' => 'admin/reportes',
            'icon' => 'fas fa-fw fa-chart-bar',
        ],
        ['header' => 'CUENTA DE USUARIO'],
        [
            'text' => 'Perfil',
            'url' => 'admin/perfil',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'Cambiar contraseña',
            'url' => 'admin/password',
            'icon' => 'fas fa-fw fa-lock',
        ],
        ['header' => 'SISTEMA'],
        [
            'text' => 'Configuración',
            'icon_color' => 'cyan',
            'url' => 'admin/configuracion',
        ],
        [
            'text' => 'Cerrar sesión',
            'url' => 'logout',
            'icon' => 'fas fa-fw fa-sign-out-alt',
        ],
    ],

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
    ],

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
        ],
    ],

    'livewire' => false,
];
