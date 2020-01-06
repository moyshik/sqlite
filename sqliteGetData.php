<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.dt{
			width:100%;
		}
		.dt tr td{
			width:25%;
			border:0px solid red;
			padding:9px;
			font-size:25px;
		}
	</style>
</head>
<body>

<table border="0" class="dt">

<?php
	$trs="<tr>";
	$tre="</tr>";
	$tds="<td>";
	$tde="</td>";

   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('search.db');
      }
   }
   
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }

   $sql =<<<EOF
      SELECT * from search;
EOF;

   $res = $db->query($sql);
   while($row = $res->fetchArray(SQLITE3_ASSOC) ) {
      echo $trs ;
      echo $tds. $row['id'] .$tde;
      echo $tds. $row['name'] .$tde;
      echo $tds. $row['keyword'].$tde;
      echo $tds."<a href='".$row['url']."' >".$row['url']."</a>".$tde;
      echo $tre;
   }
   echo "Operation done successfully\n";
   $db->close();
?>



</table>
</body>
</html>