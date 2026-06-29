<?php
class UserData
{
    public static function getLogin($cedula, $upass)
    {
        try {
            $sql = "SELECT * FROM personas p, usuarios u
                       WHERE p.cedula=u.persona_cedula
                       AND u.persona_cedula=:pcedula LIMIT 1";
            $conexion = Database::getCon();
            $stmt = $conexion->prepare($sql);
            $stmt->bindparam(":pcedula", $cedula);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
                if (MD5($upass) == $userRow['upassword']) {
                    if ($userRow['activo'] == 1) {


                        $sql_roles = "SELECT idrol 
                                            FROM usuario_roles 
                                            WHERE persona_cedula = :pcedula";

                        $stmt_roles = $conexion->prepare($sql_roles);
                        $stmt_roles->execute([':pcedula' => $cedula]);

                        $lista_de_ids_roles = $stmt_roles->fetchAll(PDO::FETCH_COLUMN, 0);

                        // --- PASO 3: Guardar en la Sesión ---

                        // Aquí está lo que pediste: un array de IDs
                        $_SESSION['roles'] = $lista_de_ids_roles; // Ej: [1, 4, 6]
                        $_SESSION['user_idrol'] = $_SESSION['roles'][0] ?? null;
                        $_SESSION['user_cedula'] = $userRow['persona_cedula'];
                        $_SESSION['user_apenom'] = $userRow['apellidos'] . ' ' . $userRow['nombres'];

                        $_SESSION['user_error'] = null;
                        $_SESSION['last_time'] = time();

                        //******************* Cargar perfil ***************

                        $sql = "SELECT * FROM roles WHERE idrol=:pidrol";
                        $conexion = Database::getCon();
                        $stmt = $conexion->prepare($sql);
                        $stmt->bindparam(":pidrol", $_SESSION['user_idrol']);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['user_rol'] = $row['rol_nombre'];

                        //******* actualiza acceso al sistema *******

                        $sql = "UPDATE usuarios SET ultimo_acceso=CURRENT_TIMESTAMP
                                WHERE persona_cedula=:pcedula";
                        $conexion = Database::getCon();
                        $stmt = $conexion->prepare($sql);
                        $stmt->bindparam(":pcedula", $_SESSION['user_cedula']);
                        $stmt->execute();



                        //******************* AUXILIARES ************************************
 
                        $_SESSION['mensaje'] = "";



                        return true;
                    } else {
                        $_SESSION['user_error'] = "Estimado usuario, usted NO tiene autorización para utilizar el sistema, consulte al Administrador";
                        return false;
                    }
                } else {
                    $_SESSION['user_error'] = "Usuario y/o Contraseña incorrectas..!!!";
                    return false;
                }
            } else {
                $_SESSION['user_error'] = "Usuario y/o Contraseña incorrectas..!!!";
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }




    public static function verificaSession()
    {

        if (isset($_SESSION['user_idrol']) && $_SESSION['user_idrol'] != null) {
            if ((time() - $_SESSION['last_time']) < 1800) {
                $_SESSION['last_time'] = time();
            } else
                Core::redir("./?view=logout");
        } else {
            Core::redir("./?view=logout");
        }
    }


    public static function redirect($url)
    {
        View::load("login");
    }


}
