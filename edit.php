<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_registrationdb";

$connect = new mysqli($servername, $username, $password, $dbname); //create connection


$kitap_id = "";
$kitap_name = "";
$yazar = "";
$tür ="";

$errorMessage= "";
$successMessage= "";

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(!isset($_GET["kitap_id"])){
		header("location: index.php");
		exit;
	}
	$kitap_id = $_GET["kitap_id"];

	$sql = "SELECT * FROM kitapkaydıtablo WHERE kitap_id=$kitap_id";
	$result = $connect->query($sql);
	$rowdata = $result->fetch_assoc();

	if(!$rowdata){
		header("location: index.php");
		exit;
	}

    $kitap_id = $rowdata["kitap_id"];
    $kitap_name = $rowdata["kitap_name"];
    $yazar = $rowdata["yazar"];
    $tür= $rowdata["tür"];
}
else{
    $kitap_id = $_POST["kitap_id"];
    $kitap_name = $_POST["kitap_name"];
    $yazar = $_POST["yazar"];
    $tür = $_POST["tür"];

	do{
		if(empty($kitap_id) || empty($kitap_name) || empty($yazar) || empty($tür)){
			$errorMessage = "all the fields are required";
			break;
			}
		$sql ="UPDATE kitapkaydıtablo ".
		"SET kitap_name= '$kitap_name', yazar= '$yazar', tür= '$tür'".
		"WHERE kitap_id='$kitap_id'";

		$result = $connect->query($sql);

		if(!$result){
			$errorMessage = "invalid query: .$connect->error";
			break;
		}
		$successMessage = "kitap kaydı başarıyla güncellendi.";
		header("location: index.php");
		exit;

	} while(false);
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Library registration</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
</html>
<script>
    window.onload= function(){
        document.getElementById("full_name").focus();
    }
    function fun(){
        window.alert("kaydetme başarılı!...");
    }

    function validate(){
        let x = document.getElementById("full_name").value; /*validate fonksiyonu fname boşsa bir uyarı mesajı döndürür ve formun gönderilmesini önler. */
        if(x==""){
            alert("name should be filled");
            return false;
        }
    }
</script>
<body>

<header>
	<span onclick="this.innerHTML='IBP'">Library Registration Form with Database Integration</span><br>
	<span id="tt" onclick="fun()"></span>
</header>

<script>
    document.getElementById("tt").innerHTML= "irem erdoğan";
    document.getElementById("tt").style.border="1px solid brown";
</script>

<section>
	<nav>
		<ol>
			<li>
				<a href="create.php">form Page</a>
			</li>
			<li>
				<a href="index.php">index Page</a>
			</li>
		</ol>
	</nav>
	<article>
		<div class="container">
            <?php
            if(!empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>
			<form method="post">
				<input type="hidden" name="kitap_id" value="<?php echo $kitap_id; ?>">
				<div class="row">
					<div class="column-1">
						<label>Kitap id:</label>
					</div>
					<div class="column-2">
						<input type="text" name="kitap_id" value="<?php echo $kitap_id; ?>" required>
						<span class="message"></span>
					</div>
				</div>

				<div class="row">
					<div class="column-1">
						<label>Kitap Adı:</label>
					</div>
					<div class="column-2">
						<input type="text" name="kitap_name" value="<?php echo $kitap_name; ?>" required>
						<span class="message"></span>
					</div>
				</div>

				<div class="row">
					<div class="column-1">
						<label>Yazar:</label>

					</div>
					<div class="column-2">
						<input type="text" name="yazar" value="<?php echo $yazar; ?>" required>
						<span class="message"></span>

					</div>
				</div>

				<div class="row">
					<div class="column-1">
						<label>Türü:</label>
					</div>
					<div class="column-2">
						<input type="hidden" value="<?php echo $tür; ?>">
						<input type="radio" id="roman" name="tür" value="roman" required>
						<label for="roman">Roman</label><br>
						<input type="radio" id="hikaye" name="tür" value="hikaye" required>
						<label for="hikaye">Hikaye</label><br>
						<input type="radio" id="anı" name="tür" value="anı" required>
						<label for="hikaye">Anı</label><br>
						<input type="radio" id="biyografi" name="tür" value="biyografi" required>
						<label for="hikaye">Biyografi</label><br>
					</div>
				</div>

                <?php
                if(!empty($successMessage)){
                    echo"
                    <div class='row'>
                    	<div class='column-1'>
                    		<div class='alert alert-success alert-dismissable fade show' role='alert'>
                    			<strong>$successMessage</strong>
                    			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    		</div>
                    	</div>
                    </div>
                    ";
                }
                ?>
				<div class="row">
					<div class="column-1">
						<label></label>
					</div>
					<div class="column-2">
						<button type="submit" class="btn btn-primary" value="submit">SUBMİT</button>
						<a class="btn btn-outline-primary" href="index.php" role="button">CANCEL</a>
					</div>
				</div>
			</form>
		</div>

	</article>
</section>

<footer>
	this is footer
	<legend style="text-align: end">Designed by İREM ERDOĞAN</legend><br>

</footer>

</body>
</html>