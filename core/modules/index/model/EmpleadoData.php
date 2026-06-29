<?php

class EmpleadoData
{

    public static function getAllEmpleados()
    {
        try {
            $sql = "SELECT * from emple
                    ORDER BY apenom";

            $conexion = Database::getCon();
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $lista;
            } else
                return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public static function updateFotoByID($cedula, $foto)
    {
        try {
            $sql = "UPDATE emple 
                            SET foto=:pfoto
                            WHERE cedula=:pcedula";
            $conexion = Database::getCon();
            $stmt = $conexion->prepare($sql);
            $stmt->bindparam(":pfoto", $foto);
            $stmt->bindparam(":pcedula", $cedula);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
