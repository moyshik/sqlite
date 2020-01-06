<?php
	$sq="'";
	$id=$_POST['id'];
	$name=$sq.$_POST['name'].$sq;
	$keyword=$sq.$_POST['keyword'].$sq;
	$url=$sq.$_POST['url'].$sq;
	
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('search.db');
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
   }

   $sql =<<<EOF
      INSERT INTO search(id,name,keyword,url)
      VALUES ($id,$name,$keyword,$url);
EOF;

   $res = $db->exec($sql);
   if(!$res) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
?>