<?php

// PHP variable to store the host address
$db_host  = "127.0.0.1";
// PHP variable to store the username
$db_uid  = "k4669624_pemilu";
// PHP variable to store the password
$db_pass = "pemilu2014";
// PHP variable to store the Database name
$db_name  = "k4669624_pemilu";
// PHP variable to store the result of the PHP function 'mysql_connect()' which establishes the PHP & MySQL connection
$db_con = mysql_connect($db_host,$db_uid,$db_pass) or die('could not connect');
mysql_select_db($db_name);
$sql = "select suara from anggota where nama_anggota='".$_POST['nama_anggota']."'";
$result = mysql_query($sql);
if (mysql_num_rows($result)>0) {
    $data = mysql_fetch_array($result);
    $addsuara = $data['suara'] + 1;
    $sql_update = "update anggota set suara='".$addsuara."' where anggota.nama_anggota='".$_POST['nama_anggota']."'";
    mysql_query($sql_update);
    $sql_update = "update pemilih set sudah_pilih='1' where pemilih.no_pemilih='".$_POST['no_pemilih']."'";
    mysql_query($sql_update);
    mysql_close();
}