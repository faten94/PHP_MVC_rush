<?php 
// Errors display

//!\\ ATTENTION A ENLEVER LORS DU DEPLOIMENT - on ne veut pas que ces fonctions apparaissent dans le code lorsque le site sera publique.
error_reporting(E_ALL);
ini_set('display_errors', true);


// Sessions

ini_set('session.cookie_lifetime', false);
session_start();