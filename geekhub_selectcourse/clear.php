<?php
// там - усі налаштування
include "settings.php";
if(!mysql_connect(HostName,UserName,Password))
{ echo "Не могу соединиться с базой".DBName."!<br>";
echo mysql_error();
exit;
}

echo "Creating databases";
$r=mysql_query("drop database if exists $tablename");
echo "Deleting database. Result=";
if ($r) 
echo "ok"; 
else 
echo "err";
echo "<p>";
$r=mysql_query("create database $tablename");
echo "Creating database. Result=";
if ($r) 
echo "ok"; 
else 
echo "err";
echo "<p>";
mysql_select_db(DBName);
$r=mysql_query("drop table if exists $tablename");
$r=mysql_query("create table $tablename(id int not null auto_increment primary key, email char (20), cell char(20), course int, is_selected int)");
if ($r) 
echo "ok"; 
else 
{
echo "err";
echo mysql_error();
}

echo "<p>";

$r=mysql_query("insert into $tablename(email , cell, course) values( 'chdn6026@mail.ru','380982372098',1)");
if ($r) 
echo "ok"; 
else 
{
echo "err";
echo mysql_error();
}
echo "<p>";
$r=mysql_query("insert into $tablename(email , cell, course) values( 'chdn6026@mail.ru','380982372098',2)");
if ($r) 
echo "ok"; 
else 
{
echo "err";
echo mysql_error();
}
echo "<p>";

?>