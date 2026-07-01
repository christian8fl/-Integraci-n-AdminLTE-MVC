<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Obtener la vista y la acción actual
$view = isset($_GET['view']) ? $_GET['view'] : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// 1. Si es la acción de procesar login, la dejamos pasar directamente
if ($action === 'processlogin') {
    // Continuar al controlador de login
} else {
    // 2. Vistas públicas (no requieren sesión)
    $vistas_publicas = ['login', 'registro', 'index'];

    if (!in_array($view, $vistas_publicas)) {

        // 3. Control de Autenticación: Si no hay sesión, al login directo
        if (!isset($_SESSION['user_id'])) {
            header("Location: ./?view=login");
            exit();
        }

        // 4. Matriz de Permisos por Rol
        // 1 = Admin, 2 = Guía/Operador, 3 = Cliente
        $permisos_por_rol = [
            1 => [
                'introduccion',
                'mision_vision',
                'agendar',
                'paquetes',
                'clientes',
                'resenas',
                'responsables',
                'galeria' 
            ],
            2 => [
                'introduccion',
                'mision_vision',
                'agendar',
                'paquetes',
                'resenas',
                'galeria' 
            ],
            3 => [
                'introduccion',
                'mision_vision',
                'paquetes',
                'agendar',
                'resenas',
                'galeria' 
            ]
        ];

        $rol_actual = isset($_SESSION['id_rol']) ? (int)$_SESSION['id_rol'] : 0;

        // 5. Validación de Autorización Segura (Evita el bucle infinito)
        if (!isset($permisos_por_rol[$rol_actual]) || !in_array($view, $permisos_por_rol[$rol_actual])) {

            // Destruimos la sesión para limpiar estados corruptos y evitar bucles
            session_destroy();

            // Redirigimos a la vista PÚBLICA de login informando el error
            header("Location: ./?view=login&error=acceso_denegado");
            exit();
        }
    }
}

// Carga normal de tu arquitectura de software
include "core/autoload.php";
define('ROOT_PATH', dirname(__DIR__) . '/plantilla_admin/');

$lb = new Lb();
$lb->loadModule("index");
