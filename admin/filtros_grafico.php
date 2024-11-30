<form action="graficos.php">
	<input type="hidden" name="filtro" value="modalidad">
	<div class="row">
		<div class="col-lg-3">
			<label for=""> Seleccione Modalidad: </label>
		</div>
		<div class="col-lg-5">
			<select name="modalidad" class="form-control" required>
				<option value="">Seleccione...</option>
				<?php foreach($mbd->query("SELECT * from modalidad") as $fila_m) { ?>
					<option value="<?php echo $fila_m['id']; ?>">
						<?php echo $fila_m['nombre']; ?>	
					</option>
				<?php } ?>
			</select>
		</div>
		<div class="col-lg-3">
			<button class="btn btn-primary">
				<i class="fa fa-search"></i> Buscar
			</button>
			<button class="btn btn-link" type="button" onclick="imprimir()">
				<i class="fa fa-print text-info" style="font-size: 15pt;"></i>
			</button>
		</div>
	</div>
</form>