<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title> Geekhub - ������� �������� ������ � ���� �� </title>
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

$query="select count(id) as num,course from $tablename where is_selected=1;";
//echo "query=$query<p>\n";
$r=mysql_query($query);
if ($r)
 {
  $num_res=mysql_num_rows($r);
  echo "<H1> C��������� ����������� �� �����:</H1>";
  echo "<table border=2>\n";
  echo "<th>����</th><th>ʳ������ �����������</th>\n";
  for($i=0; $i<$num_res; $i++)            
   {  
    $f=mysql_fetch_array($r);
    $courseid=$f['course'];
    $coursename=$coursenames[$courseid];
    $numparticipants=$f['num'];
    echo "<tr><td>$coursename</td><td>$numparticipants</td></tr>\n";
   }
   echo "</table>\n";


 }
?>
</body>
</html>