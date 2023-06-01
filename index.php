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
                    <a href="create.php" class="btn btn-outline-warning"> Kitap ekle</a>
                    <a href="edit.php" class="btn btn-outline-info">Kitap güncelle</a>
                    <a href="delete.php" class="btn btn-outline-danger">Kitap sil</a>
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
						<li><a class="dropdown-item" href="create.php">Link 1</a></li>
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
        <div class="row mt-4">
            <div class="column-1">
                <table class="table table-hover table-scripted">
                    <thead>
                    <tr>
                        <th>Kitap ID</th>
                        <th>Kitap Adı</th>
                        <th>Yazar</th>
                        <th>Türü</th>
						<th>İşlemler</th>
						<td>
							<div class="btn-group">
								<a href="create.php" class="btn btn-success">Ekle</a>
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
                    $sql = "select * from kitapkaydıtablo";
                    $result = $connect->query($sql);
                    /*$rowdata= isset($rowdata['rowdata']);*/

                    //if($result -> num_rows> 0){
                        while($rowdata = $result->fetch_assoc()){
                            echo "
							<tr>
                            	<td>$rowdata[kitap_id]</td>
                            	<td>$rowdata[kitap_name]</td>
                            	<td>$rowdata[yazar]</td>
                            	<td>$rowdata[tür]</td>
                            	<td>
									<a href='edit.php?kitap_id=$rowdata[kitap_id]' class='btn btn-secondary'>Güncelle</a>
									<a href='delete.php?kitap_id=$rowdata[kitap_id]' class='btn btn-danger'>Kaldır</a>
								</td>
                            </tr>
							";
                        }
                   // }
                    ?>
					</tbody>
                </table>
            </div>
		</div>
    </div>


</article>
</section>

<footer>  <!----footer ----->
    this is footer
    <legend style="text-align: end">Designed by İREM ERDOĞAN</legend><br>

</footer>

</body>
