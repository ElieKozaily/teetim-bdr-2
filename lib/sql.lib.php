<?php

// Constante qui dépendent de chaque projet et qui doivent être secrete
// Donc : il faut les placer en dehors du chemin du site web
// Il faut apprendre comment faire ca par nous même un jour 

const HOTE = "db";
const UTIL = "teetim";
const MDP ="teetim";
const BD = "teetim";
    //Librairie de code pour manipuler les données relationnelles
    function connexion(){
        $dsn = "mysql:host=".HOTE. ";dbname=".BD.";charset=utf8mb4";
        return new PDO($dsn, UTIL, MDP, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }

    function requete(){

    }

    function creer(){

    }

    function lire(){

    }

    function modifier(){

    }

    function suprimmer(){

    }
?>