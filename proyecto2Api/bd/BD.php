<?php
$pdo=null;
$host="localhost:3306";
$user="root";
$password="";
$bd="proyectocupones";

function conectar(){
    try{
        $GLOBALS['pdo']=new PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        print "Error!: No se pudo conectar a la bd ".$bd."<br/>";
        print "\nError!: ".$e."<br/>";
        die();
    }
}

function desconectar() {
    $GLOBALS['pdo']=null;
}

function metodoGet($query){
    try{
        conectar();
        $sentencia=$GLOBALS['pdo']->prepare($query);
        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $sentencia->execute();
        desconectar();
        return $sentencia;
    }catch(Exception $e){
        die("Error: ".$e);
    }
}
/*---------------------------------- */
function metodoGetProcedure($query) {
    try {
        conectar();
        $sentencia = $GLOBALS['pdo']->prepare($query);

        $sentencia->setFetchMode(PDO::FETCH_ASSOC);

        $sentencia->execute();

        $results = [];
        do {
            $results[] = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } while ($sentencia->nextRowset());

        desconectar();
        return $results;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}


/*------------------------------------------------ */

function metodoPost($query, $queryAutoIncrement){
    try{
        conectar();
        $sentencia=$GLOBALS['pdo']->prepare($query);
        $sentencia->execute();
        $idAutoIncrement=metodoGet($queryAutoIncrement)->fetch(PDO::FETCH_ASSOC);
        $resultado=array_merge($idAutoIncrement, $_POST);
        $sentencia->closeCursor();
        desconectar();
        return $resultado;
    }catch(Exception $e){
        die("Error: ".$e);
    }
}

function metodoPostImg($url, $idCupon){
    try {
        conectar();
        $stmt = $GLOBALS['pdo']->prepare("CALL InsertOrUpdateImagenCupon(?, ?)");
        $stmt->bindParam(1, $url, PDO::PARAM_STR);
        $stmt->bindParam(2, $idCupon, PDO::PARAM_INT);
        $stmt->execute();
        desconectar();
        return "Procedimiento almacenado ejecutado con éxito.";
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}



function metodoPut($query) {
    try {
        conectar();
        $sentencia = $GLOBALS['pdo']->prepare($query);
        $resultado = $sentencia->execute();
        $sentencia->closeCursor();
        desconectar();
        return $resultado; // Devuelve true en caso de éxito, false en caso de error
    } catch (Exception $e) {
        die("Error: " . $e);
    }
}

function metodoDelete($query){
    try{
        conectar();
        $sentencia=$GLOBALS['pdo']->prepare($query);
        $sentencia->execute();
        $sentencia->closeCursor();
        desconectar();
        return $_GET['id'];
    }catch(Exception $e){
        die("Error: ".$e);
    }
}

?>