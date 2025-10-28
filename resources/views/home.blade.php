@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenido a tu panel de administración 🚀</p>
@stop

@section('css')
    {{-- Estilos personalizados --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Usamos un observador para esperar a que AdminLTE cargue el navbar completo
    const observer = new MutationObserver(() => {
        const topnav = document.querySelector('.navbar-nav.ml-auto'); // sección derecha del topbar (donde está el buscador)

        // Solo crear el botón si existe el topnav y aún no está el botón
        if (topnav && !document.getElementById('btnTheme')) {

            // Crear el botón de modo claro/oscuro
            const btn = document.createElement('button');
            btn.id = 'btnTheme';
            btn.innerHTML = '🌙'; // icono inicial
            btn.className = 'btn btn-dark btn-sm ml-2';
            btn.style.borderRadius = '50%';
            btn.style.width = '36px';
            btn.style.height = '36px';
            btn.style.fontSize = '18px';
            btn.title = 'Cambiar modo claro/oscuro';

            // Insertar el botón a la derecha del buscador
            topnav.appendChild(btn);

            // Verificar modo guardado
            const darkEnabled = localStorage.getItem('dark-mode') === 'true';
            if (darkEnabled) {
                document.body.classList.add('dark-mode');
                btn.innerHTML = '☀️';
                btn.classList.replace('btn-dark', 'btn-warning');
            }

            // Evento click
            btn.addEventListener('click', () => {
                const isDark = document.body.classList.toggle('dark-mode');
                if (isDark) {
                    btn.innerHTML = '☀️';
                    btn.classList.replace('btn-dark', 'btn-warning');
                } else {
                    btn.innerHTML = '🌙';
                    btn.classList.replace('btn-warning', 'btn-dark');
                }
                localStorage.setItem('dark-mode', isDark);
            });

            // Detener el observador
            observer.disconnect();
        }
    });

    // Iniciar el observador para esperar el topnav
    observer.observe(document.body, { childList: true, subtree: true });
});
</script>
@stop
