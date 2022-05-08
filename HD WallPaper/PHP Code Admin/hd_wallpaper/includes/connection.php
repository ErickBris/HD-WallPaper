<?php 
    session_start();
 
	//local db 
	
	if($_SERVER['HTTP_HOST']=="localhost")
	{
	$serverIp="localhost";
	$userName="root";
	$password="";
	$dbname="hdwallpaper_client";
	
	}else
	{
	//Live
	 
	$serverIp="HOSTNAME";
	$userName="USERNAME";
	$password="PASSWORD";
	$dbname="DATABASE";
	}
	$cn=mysql_connect($serverIp,$userName,$password) OR Die("Couldn't Connect - ".mysql_error());
	$link=mysql_select_db($dbname,$cn)or Die("Couldn't SELCECT - ".mysql_error()); 
	

?> 
	 
 