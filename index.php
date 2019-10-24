<?php
	include 'includes/koneksi.php';

	function querySelect($sql){
		global $conn;
		$result = mysqli_query($conn, $sql);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		return $rows;
		// return mysqli_error($conn);
	}

	$getid = $_POST["id"];

	$hasil = querySelect("SELECT nama FROM peserta WHERE no_registrasi LIKE '%$getid%' OR nama LIKE '%$getid%'");
	$hasil = $hasil[0]['nama'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Certificate Online</title>
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12 col-md-offset-3">
				<div class="card">
					<div class="card-header">
						<h2>e-Sertifikat SSGT</h2>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<form action="index.php" method="post">
								<strong>Please enter your name</strong><br>
	
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="id" placeholder="first name or last name" aria-label="Recipient's username" aria-describedby="button-addon2">
									<div class="input-group-append">
										<button type="submit" class="btn btn-outline-success" name="certificate" id="button-addon2">Check</button>
									</div>
								</div>
							</form>
						</li>
						<li class="list-group-item">
							<form action="certificate.php" method="post">
								<strong>It's your name?</strong><br>
								<div class="input-group mb-3">
									<!-- <input type="text" class="form-control" name="id" placeholder="first name or last name" aria-label="Recipient's username" aria-describedby="button-addon2"> -->
									<input type="text" class="form-control" name="namadisable" disabled="yes" value="<?php
										if (!empty($getid)) { //berfungsi verifikasi, menampilkan nama hasil input saja tapi tidak dikirim ke untuk dicetak (certificate.php) karena status input tersebut disable
											echo "$hasil";
										}
										else {
											echo "your name will shown automatic";	
										} 
									?>" >
									<div class="input-group-append">
										<input type="hidden" name="namacetak" value="<?php
											if (!empty($getid)) { //berfungsi mengirim nama yang telah diinput dan sesuai untuk di cetak ke (certificate.php)
												echo "$hasil";
											}
											else {
												echo "";	
											} 
											?>">
										<input id="get" type="submit" class="btn btn-outline-success" value="Get Certificate Now" name="certificate"></input>
										<!-- <button type="submit" class="btn btn-outline-success" name="certificate" id="button-addon2">Check</button> -->
									</div>
								</div>
			
							</form>
						
						</li>
						<li class="list-group-item">
						<h4><strong>Notes:</strong> After certificate generated please save as file.jpg</h4>

						</li>
					</ul>				
					<!-- <div class="card-body"> -->



					<!-- </div> -->
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
