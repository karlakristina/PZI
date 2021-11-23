<?php



ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

 $db_host= "localhost";
 $db_user = "root";
 $db_password = "";
 $db_name = "pzi_projekt";
 $mysqli= new mysqli($db_host, $db_user, $db_password, $db_name);
 // Check conncetion
 if ($mysqli->connect_errno) {
	 echo "Failed to connect to MySQL:" . $mysqli -> connect_error;
	 exit();
 }    else {
     echo "Uspjesno ste spojeni na bazu!";
	 $sql = "SELECT * FROM users";
	 
	 $result = $mysqli ->query($sql);
	 
	 if ($result) {
		 $row = $result-> fetch_row();
		 echo json_encode($row) ;
	 }
	 $ime = $_GET["first_name"];
$prezime = $_GET["last_name"];

//var_dump($_GET);
$insert_query = "INSERT INTO users (first_name, last_name) values ('$ime', '$prezime')";
var_dump($insert_query);
$result = $mysqli->query($insert_query);
echo $result; 
	 
		 
		 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Laragon</title>
		
		<form>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="first_name" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="last_name" value="Doe"><br><br>
  <input type="submit" value="Submit">
  </form>


        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Karla';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            .opt {
                margin-top: 30px;
            }

            .opt a {
              text-decoration: none;
              font-size: 150%;
            }
            
            a:hover {
              color: red;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title" title="Laragon">Laragon</div>
     
                <div class="info"><br />
                      <?php print($_SERVER['SERVER_SOFTWARE']); ?><br />
                      PHP version: <?php print phpversion(); ?>   <span><a title="phpinfo()" href="/?q=info">info</a></span><br />
                      Document Root: <?php print ($_SERVER['DOCUMENT_ROOT']); ?><br />

                </div>
                <div class="opt">
                  <div><a title="Getting Started" href="https://laragon.org/docs">Getting Started</a></div>
                </div>
            </div>

        </div>
    </body>
</html>