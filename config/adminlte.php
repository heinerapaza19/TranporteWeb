<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Título del panel
    |--------------------------------------------------------------------------
    |
    | Aquí puedes cambiar el título predeterminado de tu panel de administración.
    |
    */

    'title' => 'Panel de Transporte',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Activa o desactiva el favicon (icono del sitio).
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Fuentes de Google
    |--------------------------------------------------------------------------
    |
    | Permite o no el uso de fuentes externas de Google.
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Logo del panel
    |--------------------------------------------------------------------------
    |
    | Cambia el logo que aparece en la esquina superior izquierda del panel.
    |
    */

    'logo' => '<b>Transporte</b>App',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_alt' => 'Logo Transporte',

    /*
    |--------------------------------------------------------------------------
    | Logo de autenticación (login/registro)
    |--------------------------------------------------------------------------
    |
    | Configura un logo alternativo para las pantallas de login o registro.
    |
    */

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

    /*
    |--------------------------------------------------------------------------
    | Animación del precargador
    |--------------------------------------------------------------------------
    |
    | Configura la animación mostrada mientras se carga la aplicación.
    |
    */

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

    /*
    |--------------------------------------------------------------------------
    | Menú de usuario
    |--------------------------------------------------------------------------
    |
    | Activa y personaliza el menú del usuario en la esquina superior derecha.
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Diseño (Layout)
    |--------------------------------------------------------------------------
    |
    | Modifica la estructura general del panel (menú lateral, topnav, etc.).
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Clases CSS para las vistas de autenticación
    |--------------------------------------------------------------------------
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Clases CSS del panel principal
    |--------------------------------------------------------------------------
    */

    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_topnav' => 'navbar-white navbar-light',

    /*
    |--------------------------------------------------------------------------
    | Barra lateral (Sidebar)
    |--------------------------------------------------------------------------
    |
    | Configura la apariencia y comportamiento del menú lateral.
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Barra lateral derecha (Control Sidebar)
    |--------------------------------------------------------------------------
    |
    | Configura la barra lateral derecha (si la usas).
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',

    /*
    |--------------------------------------------------------------------------
    | URLs principales
    |--------------------------------------------------------------------------
    |
    | Define las rutas principales del panel (dashboard, login, logout, etc.)
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',

    /*
    |--------------------------------------------------------------------------
    | Integración con Laravel Mix / Vite
    |--------------------------------------------------------------------------
    |
    | Si usas Laravel Mix o Vite para compilar tus assets, puedes configurarlo.
    |
    */

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Ítems del menú
    |--------------------------------------------------------------------------
    |
    | Configura el contenido del menú lateral y la barra superior.
    |
    */

    'menu' => [
        // Ítems de la barra superior
        [
            'type' => 'navbar-search',
            'text' => 'Buscar...',
            'topnav_right' => true,
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Ítems de la barra lateral
        [
            'text' => 'Inicio',
            'url' => '/',
            'icon' => 'fas fa-fw fa-home',
        ],
        [
            'text' => 'Repartidores',
            'url' => 'admin/repartidores',
            'icon' => 'fas fa-fw fa-motorcycle',
        ],
        [
            'text' => 'Clientes',
            'url' => 'admin/clientes',
            'icon' => 'fas fa-fw fa-users',
        ],
        [
            'text' => 'Administrador',
            'url' => 'admin/administrador',
            'icon' => 'fas fa-fw fa-users',
        ],
        [
            'text' => 'Pedidos',
            'url' => 'admin/pedidos',
            'icon' => 'fas fa-fw fa-box',
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

    /*
    |--------------------------------------------------------------------------
    | Filtros de menú
    |--------------------------------------------------------------------------
    |
    | Determinan cómo se muestran y filtran los ítems del menú.
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins
    |--------------------------------------------------------------------------
    |
    | Activa los plugins que desees usar (DataTables, SweetAlert, etc.)
    |
    */

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

    /*
    |--------------------------------------------------------------------------
    | Modo IFrame (pestañas dentro del panel)
    |--------------------------------------------------------------------------
    |
    | Configura el modo IFrame si deseas usar pestañas internas.
    |
    */

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

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Activa la compatibilidad con Livewire si la estás utilizando.
    |
    */

    'livewire' => false,
];
