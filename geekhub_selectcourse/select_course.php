<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title> Geekhub - ������� ��������� ������ � ���� �� </title>
</head>
<body>

<?php
include "settings.php";
if(!mysql_connect(HostName,UserName,Password))
{ echo "�� ���� ����������� � �����".DBName."!<br>";
echo mysql_error();
exit;
}
mysql_select_db(DBName);

$login=$_REQUEST['login'];
$pass=$_REQUEST['pass'];
$query="select * from $tablename where email='$login' and cell='$pass'";
//echo "query=$query<p>\n";
$r=mysql_query($query);
if ($r)
 {
  $num_res=mysql_num_rows($r);
  echo "<H1> ������� ����, �� ���� �� ������ ��������� ��������:</H1>";
  echo "<form action=submit_course.php type=post>\n";
  echo "<input type=hidden name='login' value='$login'>\n";
  echo "<input type=hidden name='pass' value='$pass'>\n";
  echo '<select name="course">';
  echo "\n";
  for($i=0; $i<$num_res; $i++)            
   {  
    $f=mysql_fetch_array($r);
    $courseid=$f['course'];
    $coursename=$coursenames[$courseid];
    echo "<option value=$courseid> $coursename </option>\n";
   }
   echo "</select>\n<p><input type=submit value='��������'></form>";

 }
else
 { echo "��� ���� � ������ ���, ��� �� ��������� ��������";
 }

?>
</body>
</html>