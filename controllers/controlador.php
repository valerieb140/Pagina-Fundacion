<?php
    

    class mvccontroller{

        
        #Mostrando plantilla principal
        #-----------------------------------------------------------
        public function plantilla (){
            include "views/plantillaPrincipal.php";
        }


        #Redireccionando a Paginas del Sitio
        #-----------------------------------------------------------
        public function enlacesPaginasController (){

            $enlace = (isset($_GET['action'])) ? $_GET['action'] : '';

            $clase = new EnlacesPaginas();
            $respuesta = $clase-> enlacesPaginasModel($enlace);

            if (isset($respuesta)){
            include $respuesta;}
            
        }

        #Redireccionando a Noticia Especifica
        #-----------------------------------------------------------
        public function redireccionarController (){
            
            $valor = (isset($_GET['id'])) ? $_GET['id'] : '';

            $clasNot = new redireccionarPaginas();
            $noticia = $clasNot-> redireccionarPaginasModel($valor);

            if (isset($noticia)){
            include $noticia;}
            
        }

        #Peticiones de BD para las paginas
        #-----------------------------------------------------------
        public function peticionPaginasController($pagina){

            $clasPeticion = new respuestaPeticionesPaginas();
            $clasModel = 'respuesta'.$pagina.'Model';
            $array = $clasPeticion-> $clasModel();

            return $array;

        }


        # API
        #-----------------------------------------------------------
        public function apiController ($variable){

            $clasApi = new respuestaApi();
            $array = $clasApi-> respuestaApiModel($variable);

            return $array;
            
        }


    }

?>