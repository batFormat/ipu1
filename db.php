<?php 
require 'libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=ls','root', '' );

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();