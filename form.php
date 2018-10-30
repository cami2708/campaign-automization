<html>
	<head>
		
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
			// This code checks if at least one checkbox is check from each type of name
			jQuery(document).ready(function($) {
			  var requiredCheckboxes = $(':checkbox[required]');
			  requiredCheckboxes.on('change', function(e) {
			    var checkboxGroup = requiredCheckboxes.filter('[name="' + $(this).attr('name') + '"]');
			    var isChecked = checkboxGroup.is(':checked');
			    checkboxGroup.prop('required', !isChecked);
			  });
			});
		</script>
		<!-- This file is the form with the information of the program -->
		<form action="convert-linkedin.php" method="post" enctype="multipart/form-data">
			Nombre del programa línea 1: <input type="text" name="programName1" maxlength="100" required="true" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase();"> <br>
			Nombre del programa línea 2: <input type="text" name="programName2" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase();"> <br>
			Tipo de programa: <br>
			<input type="radio" name="programType" value="CURSO" required="true"> Curso <br>
			<input type="radio" name="programType" value="DIPLOMADO"> Diplomado <br>
			<input type="radio" name="programType" value="MAGÍSTER"> Magíster <br>
			<input type="radio" name="programType" value="MBA"> MBA <br>
			<input type="radio" name="programType" value="DOCTORADO"> Doctorado <br>
			Facultad: <br>
			<input type="checkbox" name="facultyCode" value="fic" required="true"> Facultad de Ingeniería y Ciencias <br>
			<input type="checkbox" name="facultyCode" value="env" required="true"> Escuela de Negocios <br>
			<input type="checkbox" name="facultyCode" value="der" required="true"> Facultad de Derecho <br>
			<input type="checkbox" name="facultyCode" value="psi" required="true"> Escuela de Psicología <br>
			<input type="checkbox" name="facultyCode" value="per" required="true"> Escuela de Periodismo <br>
			<input type="checkbox" name="facultyCode" value="fal" required="true"> Facultad de Artes Liberales <br>
			<input type="checkbox" name="facultyCode" value="gob" required="true"> Escuela de Gobierno <br>
			<input type="checkbox" name="facultyCode" value="dis" required="true"> Design Lab <br>
			Hero (tamaño recomendado 1200x627px):  <input type="file" name="hero" accept="image/*" required="true"> <br>
			Fecha de inicio: <input type="date" name="startDate" required="true"><br>
			Logo colaborador:  <input type="file" name="colaborador" accept="image/*"> <br>
			Tema: 
			<select name="color"> 
				<option value="#0073A3">Finanzas</option>
				<option value="#E8CF00">Marketing y ventas</option>
				<option value="#6F9A2F">Estrategia e innovación</option>
				<option value="#9663A0">Liderazgo</option>
				<option value="#F6A342">Personas y organización</option>
				<option value="#B81211">Inmobiliario</option>
				<option value="#C53D7A">Operaciones</option>
				<option value="#DD480D">Gobierno corporativo</option>
				<option value="#FBBD00">Empresas familiares</option>
			</select><br>
			<input type="submit" value="Enviar"> 
	
		</form>
	
	</body>
</html>
