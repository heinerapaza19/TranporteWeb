# Resumen del Proyecto TranporteWeb

## 📋 Información General

*Tecnologías:*
- Framework: Laravel 11
- Frontend: AdminLTE 3 + Bootstrap 5
- Build Tool: Vite
- CSS: SASS + Tailwind CSS

## 🗂 Estructura del Proyecto

### Modelos de Datos (8 entidades principales)

1. *Empresa* - Gestión de empresas de transporte
   - Campos: nombre, color, teléfono, dirección, logo, correo_login, password_login
   - Relaciones: hasMany (Chofer, Vehiculo, Ruta)

2. *Chofer* - Información de conductores
   - Campos: nombres, apellidos, DNI, licencia, teléfono, ruta_asignada, estado_licencia, educacion_vial
   - Relaciones: belongsTo (Empresa), hasMany (Vehiculo)

3. *Vehiculo* - Vehículos de transporte
   - Campos: placa, modelo, color, capacidad, revision_tecnica, SOAT
   - Relaciones: belongsTo (Empresa, Chofer)

4. *Ruta* - Rutas de transporte
   - Campos: nombre, descripcion, color
   - Relaciones: belongsTo (Empresa), hasMany (Paradero)

5. *Paradero* - Paraderos o estaciones
   - Campos: nombre, latitud, longitud
   - Relaciones: belongsTo (Ruta)

6. *Seguimiento* - GPS tracking
   - Campos: latitud, longitud, velocidad, fecha_hora
   - Relaciones: belongsTo (Vehiculo)

7. *Usuario* - Usuarios del sistema
   - Campos: nombre, correo, password, rol (admin/chofer/cliente)
   - Relaciones: hasMany (ChatbotMensaje)

8. *ChatbotMensaje* - Historial de chatbot
   - Campos: pregunta, respuesta, fecha_hora
   - Relaciones: belongsTo (Usuario)

### Controladores Existentes

✅ *Implementados:*
- EmpresaAuthController - Login y autenticación de empresas
- VehiculoController - CRUD de vehículos
- HomeController - Dashboard general

❌ *Faltantes (referenciados en routes pero no existen):*
- AdminController - Panel de administrador general
- ChoferController - CRUD de choferes

### Sistema de Autenticación

*Middlewares:*
- EmpresaAuth - Middleware personalizado para proteger rutas de empresa
- Configurado en bootstrap/app.php como alias 'empresa.auth'

*Sistema de Sesiones:*
- Las empresas se autentican con correo y contraseña
- Sesión almacena: empresa_id, empresa_nombre, empresa_logo

### Rutas Definidas

php
/                              → Dashboard público
/admin                         → Panel admin (falta AdminController)
/home                          → Dashboard usuario (requiere auth)
/vehiculo                      → Listado vehículos
/empresa/login                 → Login de empresas
/empresa/dashboard             → Panel empresa (protegido)
/empresa/logout                → Logout

// Rutas protegidas (middleware empresa.auth):
/chofer/store                  → Crear chofer
/chofer/{id}                   → Actualizar/eliminar chofer
/vehiculo/store                → Crear vehículo
/vehiculo/{id}                 → Actualizar/eliminar vehículo


### Datos de Prueba (Seeders)

*Empresas (4):*
1. San Román - correo: sanroman@transporte.com, password: sanroma25
2. Línea 18 - correo: linea18@transporte.com, password: linea18
3. Línea 22 - correo: linea22@transporte.com, password: linea22
4. Línea 55 - correo: linea55@transporte.com, password: linea55

*Choferes:* 16 choferes (4 por empresa)

*Vehículos:* 16 vehículos (4 por empresa)

*Usuarios:* Admin, 2 choferes, 1 cliente

### Vistas Existentes


resources/views/
├── auth/              → Login, registro, reset password
├── empresa/
│   ├── login.blade.php
│   └── dashboard.blade.php
├── vehiculo/
│   └── vehiculo.blade.php
├── layouts/
│   └── app.blade.php
├── dashboard.blade.php → Página principal
└── home.blade.php      → Dashboard usuario


## ⚠ Problemas Identificados

1. *Controladores faltantes:*
   - AdminController::index() llamado en rutas pero no existe
   - ChoferController con métodos store/update/destroy pero no existe

2. *Funcionalidad incompleta:*
   - El dashboard de empresa necesita la vista completa
   - CRUD de choferes sin implementar
   - Panel admin sin implementar

## 🎯 Funcionalidades Implementadas

✅ Sistema de login/logout para empresas
✅ Middleware de autenticación personalizado
✅ CRUD básico de vehículos
✅ Estructura de base de datos completa
✅ Seeders con datos de prueba
✅ Layout base con AdminLTE

## 📝 Pendientes de Implementar

❌ Panel de administrador general
❌ CRUD completo de choferes
❌ Dashboard de empresa funcional
❌ Gestión de rutas y paraderos
❌ Sistema de seguimiento GPS
❌ Chatbot para usuarios
❌ Gestión de permisos y roles

## 🔧 Configuración

*Dependencias principales:*
- laravel/framework: ^11.31
- jeroennoten/laravel-adminlte: ^3.15
- Bootstrap 5.2.3
- Tailwind CSS 3.4.13

*Scripts disponibles:*
bash
composer dev      # Levantar servidor + build de assets
npm run dev       # Desarrollo Vite
npm run build     # Build producción


## 🎨 Arquitectura

- *MVC Pattern* - Separación clara de responsabilidades
- *Eloquent ORM* - Modelos con relaciones bien definidas
- *Blade Templates* - Sistema de vistas con herencia
- *Middleware Authentication* - Sistema custom de autenticación
- *Seeders* - Datos de prueba organizados por entidad

## 🚀 Estado del Proyecto

El proyecto está en *desarrollo temprano*. Tiene una base sólida con:
- Estructura de BD completa
- Modelos y relaciones bien definidas
- Sistema de autenticación básico funcional
- Falta implementar la lógica de negocio y vistas completas