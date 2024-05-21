<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=id15880133_gpsuri;charset=utf8', 'id15880133_gpsistemagabinnete', 'G^80szF[R/Me&uYd');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
