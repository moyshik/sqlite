<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('search.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      CREATE TABLE search(id INT PRIMARY KEY NOT NULL,name TEXT NOT NULL, keyword TEXT NOT NULL, url TEXT NOT NULL);
EOF;

   $res = $db->exec($sql);
   if(!$res){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>