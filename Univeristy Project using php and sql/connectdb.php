<?php 
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","helpdesk");

$msg=" ";
/*$dbhandle = mysql_connect('localhost', 'root' ,'') or die("Unable to connect to MySQL");
        mysql_select_db("act", $dbhandle);
*/
$dbhandle =new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to connect to MySQL");
if ($dbhandle->connect_error) {
    die("Connection failed: " . $dbhandle->connect_error);
} 
//        mysql_select_db(DATABASE, $dbhandle);

/*$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{  }
  */
?>
<body>
</body>
</html>