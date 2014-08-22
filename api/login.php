<?php

  // PHP variable to store the host address
 $db_host  = "127.0.0.1";
 // PHP variable to store the username
 $db_uid  = "root";
 // PHP variable to store the password
 $db_pass = "deadpirate";
 // PHP variable to store the Database name  
 $db_name  = "pemilu"; 
        // PHP variable to store the result of the PHP function 'mysql_connect()' which establishes the PHP & MySQL connection  
 $db_con = mysql_connect($db_host,$db_uid,$db_pass) or die('could not connect');
 mysql_select_db($db_name);
 $sql = "SELECT * FROM pemilih WHERE no_pemilih='".$_POST['no_pemilih']."'";
 $result = mysql_query($sql);
 if (mysql_num_rows($result)>0) {
 	while($row=mysql_fetch_assoc($result))
  	$output[]=$row;
 	print(json_encode($output));
 	mysql_close();
 }

?>