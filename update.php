<!DOCTYPE html>

<?php include 'db.php';

$id= (int)$_GET['id'];


$sql1 = "SELECT * from movimientos where id ='$id'";

$rows = $db->query($sql1);

$row= $rows->fetch_assoc();

$cuenta= $row['cuenta'];
$valor = $row['valor'];

if(isset($_POST['send'])){


	$fecha = htmlspecialchars($_POST['fecha']);
	$valor = htmlspecialchars($_POST['valor']);
	$categoria = htmlspecialchars($_POST['Categoria']);
	$detalle = htmlspecialchars($_POST['detalle']);
	$cuenta = htmlspecialchars($_POST['cuenta']);







$sql2 = "UPDATE movimientos set fecha='$fecha', valor='$valor', Categoria='$categoria', detalle='$detalle', cuenta='$cuenta' WHERE id ='$id'";

$val = $db->query($sql2);



printf("Errormessage: %s\n", $db->error);

header('location: stock.php');

}


?>
<html>
	<head>
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css">
		<title>Conga</title>
	</head>
	<body>
		<div class="container">

		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10 col-md-offset-1" >
				    	<table class="table">

					     	<hr><br>
								<form method="post" >
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<?php
													$sql = "SELECT * FROM cuentas";
													$result = $db->query($sql);
													if ($result->num_rows > 0) {
														echo "<select class='form-control' name='cuenta' required>";
														echo "<option selected value='".$row['cuenta']."'>" . $row['cuenta']. "</option>";
														// output data of each row
														while($row = $result->fetch_assoc()) {
															echo "<option value='" . $row['nomCuen'] . "'>" . $row['nomCuen'] . "</option>";
															}
														echo "</select>";
													} 
												?>
											</div>
											<div class="col-md-6">
												<?php $sql = "select * from movimientos where id='$id'";
												$rows = $db->query($sql);

												$row= $rows->fetch_assoc();
												?>
												<select class="form-control" name="usuario" required>
													<option selected disabled value="<?php echo $row['usuario'];?>"><?php echo $row['usuario'];?></option>
													<option value="Dani">Dani</option>
													<option value="Andy">Andy</option>
												</select>
											</div>
										</div>
												<br>
												<div class="row">
													<div class="col-md-6">
														<input type="date" required id="fecha" class="form-control" name="fecha" value="<?php echo $row['fecha'];?>">
													</div>
													<div class="col-md-6">
														<input type="text" required name="valor" class="form-control" value="<?php echo $row['valor'];?>" placeholder="<?php echo $row['valor'];?>">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-12">
														<input type="text" required name="detalle" class="form-control" value="<?php echo $row['detalle'];?>">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-6 btn-group" role="group">
														<button type="button" class="btn btn-outline-primary">Transfer</button>
														<button type="button" class="btn btn-outline-primary">Gasto</button>
														<button type="button" class="btn btn-outline-primary">Ingreso</button>
													</div>
													<div class="col-md-6">
														<?php
																$sql = "SELECT * FROM categorias";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	echo "<select class='form-control' name='Categoria' required>";
																	echo "<option selected value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																	
																	}
																	echo "</select>";
																	
																};																
														?>

													</div>
											
									</div>
									
									<p></p>
									
									<p></p>
									
									<br>
									
								
								</div>
									 <input type="submit" name="send" value="Agregar Registro" class="btn btn-success">&nbsp;
								 <a href="stock.php" class="btn btn-warning">Volver</a>
							</form>
				    	</div>
			 	  </div>
			 </div>
		 </body>
	</html>
