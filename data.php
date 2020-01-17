<?php

    session_start();
    if(!isset($_SESSION['favorite'])){
        $_SESSION['favorite']= [];
    }

    // Vérification de la requete ajax côté serveur
    function isAjaxRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest";
    }

    // si le serveur ne reçoit pas d'ajax, alors nous quittons le script
    if(!isAjaxRequest()){
        exit;
    }

    /*
    *** traitement des favoris
    */

    if($_POST){
        //print_r($_POST);
        $id = isset($_POST['id'])? $_POST['id'] : "";
        //echo $id;

        // nous passons la donnée dans un filtre REGEX acceptant 1 ou plusieurs nombres et qui conservera cette valeur
        if(preg_match("/post-(\d+)/", $id, $filter)){
            //print_r($filter);
            $id = $filter[1];
            if(!in_array($id, $_SESSION['favorite'])){
                $_SESSION['favorite'][] = $id;
            }

            // traitement du retrait des favoris
            if(isset($_POST['a'])){
                if(in_array($id, $_SESSION['favorite']) && $_POST['a']=="remove"){
                    unset($_SESSION['favorite'][$id]);
                }
            }

            print "true";
        }else{
            print "false";
        }
    }

    /*
    *** traitement de la deconnexion
    */

    if($_GET){
        //print_r($_GET);
        if(isset($_GET['a'])&& $_GET['a']== 'deconnect'){
            session_destroy();
            print"true";
        }
    }

?>