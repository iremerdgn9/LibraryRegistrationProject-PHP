<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_registrationdb";

$connect = new mysqli($servername, $username, $password, $dbname);

$full_name="";
$email="";
$password="";

$errorMessage= "";
$successMessage= "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
do {
        if (empty($full_name) || empty($email) || empty($password)) {
            $errorMessage = "all the fields required";
            break;
        }
        // add new kitap kaydı to database

            $sql = "insert into logintablo(full_name, email, password) VALUES ('$full_name', '$email', '$password');";
        $result = $connect->query($sql);

        if (!$result) {
            $errorMessage= "error: $sql <br> $connect->error";
			break;
        }
        $full_name="";
		$email="";
		$password="";
        $successMessage = "kitap kaydı eklendi";
        header("location:login.php");
		exit;
    }
        while (false);
}
    $connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Registration Project</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library registration Project</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
</html>

<body>

<header>
	<!--- <span onclick="this.innerHTML='IBP project'">Library Registration Project</span><br>
     <span id="tt" onclick="fun()"></span>
 --->
	<img src="yazilimci1kadin.jpg" alt="Avatar Logo" style="width:75px; float: left" class="rounded-pill">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="button">
					<a href="index.php" class="btn btn-outline-success">Tüm Kitaplar</a>
					<a href="edit.php" class="btn btn-outline-warning"> Kitap ekle</a>
					<a href="index.php" class="btn btn-outline-info">Kitap güncelle</a>
					<a href="index.php" class="btn btn-outline-danger">Kitap sil</a>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="button" style="float: right">
					<a href="login.php" class="btn btn-outline-primary">LOG IN</a>
				</div>
				<div class="button" style="float: right">
					<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
						İREM ERDOĞAN
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="edit.php">Link 1</a></li>
						<li><a class="dropdown-item" href="login.php">Link 2</a></li>
						<li><a class="dropdown-item" href="create.php">Link 3</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>


<section>
    <nav> <!----navigation bar -->

        <div class="row mt-4">
            <div class="column-1">
                <div class="btn btn btn btn-group-vertical">
                    <a href="index.php" class="btn btn-outline-danger">Tüm Kitaplar</a>
                    <a href="create.php" class="btn btn-outline-warning">Kitap Ekle</a>
                    <a href="edit.php" class="btn btn-outline-danger">Kitap Güncelle</a>
                    <a href="delete.php" class="btn btn-outline-warning">Kitap Sil</a>
				</div>
            </div>
        </div>
    </nav>



    <article> <!--index bölümü------->

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
            <form  method="post">
                <div class="row">
                    <div class="column-1">
                        <label>Ad-soyad:</label>
                    </div>
                    <div class="column-2">
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>" required>
                        <span class="message"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="column-1">
                        <label>Email:</label>
                    </div>
                    <div class="column-2">
                        <input type="email" name="email" value="<?php echo $email; ?>" required>
                        <span class="message"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="column-1">
                        <label>Password:</label>
                    </div>
                    <div class="column-2">
                        <input type="password" name="password" value="<?php echo $password; ?>" required>
                        <span class="password"></span>
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
                        <input type="submit" value="submit">
						<a class="btn btn-outline-primary" href="index.php" role="button">CANCEL</a>
                    </div>
                </div>
			</form>

		<table class="table table-hover table-scripted">
			<thead>
			<tr>
				<th>Ad Soyad</th>
				<th>email</th>
				<th>password</th>
				<td>
					<div class="btn-group">
						<a href="login.php" class="btn btn-success">Ekle</a>
					</div>
				</td>
			</tr>
			</thead>
			<tbody>
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "library_registrationdb";

            $connect = new mysqli($servername, $username, $password, $dbname);
            if ($connect->connect_error) {
                die("connect this database failed due to." . $connect->connect_error);
            }
            $sql = "select * from logintablo";
            $result = $connect->query($sql);
            /*$rowdata= isset($rowdata['rowdata']);*/

            //if($result -> num_rows> 0){
            while($rowdata = $result->fetch_assoc()){
                echo "
							<tr>
                            	<td>$rowdata[full_name]</td>
                            	<td>$rowdata[email]</td>
                            	<td>$rowdata[password]</td>
                            </tr>
							";
            }
            // }
            ?>
			</tbody>
		</table>
        </div>

    </article>
</section>

<footer>  <!----footer ----->
    this is footer
    <legend style="text-align: end">Designed by İREM ERDOĞAN</legend><br>

</footer>

</body>
</html>