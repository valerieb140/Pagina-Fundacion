<?php



class EnlacesPaginas{

    public function enlacesPaginasModel($enlaceModel){
        $modulo= null;

        if (isset($enlaceModel)) {

            if($enlaceModel=="inicio" ||
            $enlaceModel=="nosotros" ||
            $enlaceModel=="noticias" ||
            $enlaceModel=="servicios"){

                $modulo="views/modulos/".$enlaceModel.".php";

            }

        }

        return $modulo;
    }

}


class redireccionarPaginas{

    public function redireccionarPaginasModel($valorModel){
        $noticia= null;

        if (isset($valorModel)) {

            if(is_numeric($valorModel)){
                $noticia="views/Redireccionar/redireccionar1.php";
            }
            
        }

        return $noticia;
    }

}


class respuestaApi{
    
    public function respuestaApiModel($variable){

        include_once '../bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $sql = 'SELECT * FROM '. $variable ;
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();

        $datos = $sentencia->fetchAll();

        return $datos;
    }

}


class respuestaPeticionesPaginas{

    public function respuestaInicioModel(){
        
        //include_once '../bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $consulta = "SELECT id_slider, img_sld, titulo_sld, descrip_sld, enlace_sld FROM slider"; //SLIDER
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datos[0] = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $consulta = "SELECT id_noticia, titulo_not, contenido_not, fecha_not, img_not, descrip_not FROM noticia ORDER BY id_noticia DESC LIMIT 4";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datos[1] = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

    public function respuestaNosotrosModel(){

        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $consulta = "SELECT id_galeria, img_gal, tit_img_gal FROM galeria"; //GALERIA
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dataGal = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $dataGal;
    }

    public function respuestaNoticiasModel(){

        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $consulta = "SELECT id_noticia, titulo_not, contenido_not, fecha_not, img_not, descrip_not FROM noticia ORDER BY id_noticia DESC"; //NOTICIAS
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $data;

    }

    public function respuestaServiciosModel(){

        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $consulta = "SELECT id_taller, nombre_tal, descrip_tal, inicio_tal, duracion_tal, horario_tal, img_tal FROM taller"; //TALLER
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data[0] = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $consulta = "SELECT id_curso, nombre_cur, descrip_cur, inicio_cur, duracion_cur, horario_cur, img_cur FROM curso"; //CURSO
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data[1] = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $data;

    }
}


?>