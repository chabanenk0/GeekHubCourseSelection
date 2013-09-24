<?php
include "settings.php";
if(!mysql_connect(HostName,UserName,Password))
{ echo "Не могу соединиться с базой".DBName."!<br>";
echo mysql_error();
exit;
}
mysql_select_db(DBName);
$login=$_REQUEST['login'];
$pass=$_REQUEST['pass'];
$course=$_REQUEST['course'];
$r=mysql_query("select * from $tablename where email='$login' and cell='$pass'");
if ($r)
 {
  $num_res=mysql_num_rows($r);
   for ($i=0;$i<$num_res;$i++)
   { 
    $f=mysql_fetch_array($r);
    $course_id=$f[id];
    if ($course_id==$course)
    {    
     $query2="update $tablename set is_selected=1 where id=$course_id";
    }
    else
    {    
     $query2="update $tablename set is_selected=0 where id=$course_id"; // удаляем другие курсы, чтобы только один был выбран
    }
    //echo $query2;
    $r1=mysql_query($query2);
   }
   header('Location: statistics.php');
 }
else
 { echo "Вас нема у списку тих, хто має проходити співбесіду";
 }

?>
</body>
</html>