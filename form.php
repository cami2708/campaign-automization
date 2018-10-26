<html>
	<head>
		
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
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
			Nombre del programa línea 1: <input type="text" name="programName1" maxlength="100" required="true"> <br>
			Nombre del programa línea 2: <input type="text" name="programName2"> <br>
			Tipo de programa: <br>
			<input type="radio" name="programType" value="curso" required="true"> Curso <br>
			<input type="radio" name="programType" value="diplomado"> Diplomado <br>
			<input type="radio" name="programType" value="magíster"> Magíster <br>
			<input type="radio" name="programType" value="mba"> MBA <br>
			<input type="radio" name="programType" value="doctorado"> Doctorado <br>
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
			<input type="submit" value="Enviar"> 
	
		</form>
	
	</body>
</html>
