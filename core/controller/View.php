<?php

// View.php
// @brief Una vista corresponde a cada componente visual dentro de un modulo para el proyecto Eco Mirador.

class View {
    /**
    * @function load
    * @brief La función load carga la vista correspondiente al módulo activo
    **/ 
    public static function load($view){
        // Si no se solicita ninguna vista específica por la URL (?view=...), cargamos 'introduccion' por defecto
        if(!isset($_GET['view'])){
            $default_view = "core/modules/" . Module::$module . "/view/" . $view . "/widget-default.php";
            if(file_exists($default_view)){
                include $default_view;
            } else {
                // Forzar la carga de la introducción de Eco Mirador
                include "core/modules/" . Module::$module . "/view/introduccion/widget-default.php";
            }
        }else{
            if(View::isValid()){
                include "core/modules/" . Module::$module . "/view/" . $_GET['view'] . "/widget-default.php";               
            }else{
                View::Error("<div class='alert alert-danger m-3'><b>Error 404:</b> La sección <b>" . htmlspecialchars($_GET['view']) . "</b> no se encuentra configurada en el sistema de Eco Mirador.</div>");
            }
        }
    }

    /**
    * @function isValid
    * @brief Valida la existencia de la carpeta de la vista y su archivo base widget-default.php
    **/ 
    public static function isValid(){
        $valid = false;
        if(isset($_GET["view"])){
            if(file_exists("core/modules/" . Module::$module . "/view/" . $_GET['view'] . "/widget-default.php")){
                $valid = true;
            }
        }
        return $valid;
    }

    public static function Error($message){
        print $message;
    }
}

?>