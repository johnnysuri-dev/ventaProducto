<?php 
session_start();
if (isset($_SESSION['usuario'])) {
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>articulos</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; ?>		
	</head>
	<body>
		<div class="container">
			<h1>Categorias</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCategorias">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" name="categoria" id="categoria">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaCategoriaLoad"></div>
				</div>
			</div>
		</div>
	</body>
	</html>
<script type="text/javascript">
	$(document).ready(function(){
	$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
	$('#btnAgregaCategoria').click(function(){
		acios=validarFormVacio('frmCategorias');
			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}
		datos=$('#frmCategorias').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/categorias/agregaCategoria.php",
			success:function(r){
				if (r==1) {
					$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
					alertify.success(" se inserto de forma exitosa");
				}else{
					alertify.error("fallo al agregar");
				}

			}
		});
	});
	
	});
</script>
<?php 
}
else{
	header("location:../index.php");
}
?>