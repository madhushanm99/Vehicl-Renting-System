<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','vehi_rentl');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


function error_show($message,$lvl){
    if($lvl == 0){
        echo "<div class='alert alert-success' role='alert'><strong>Success:</strong>".$message."</div>";
    }
    if($lvl == 1){
        echo "<div class='alert alert-danger' role='alert'><strong>Error:</strong>".$message."</div>";
    }
}

?>