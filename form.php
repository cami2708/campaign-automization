<html>
	<head>

	</head>
	<body>
	<!-- This file is the form with the information of the program -->
	<form action="convert-linkedin.php" method="post" enctype="multipart/form-data">
		Nombre del programa línea 1: <input type="text" name="programName1" maxlength="100"> <br>
		Nombre del programa línea 2: <input type="text" name="programName2"> <br>
		Facultad: <br>
		<input type="radio" name="facultyCode" value="ing"> Facultad de Ingeniería y ciencias <br>
		<input type="radio" name="facultyCode" value="env"> Escuela de negocios <br>
		<input type="radio" name="facultyCode" value="ing"> Facultad de derecho <br>
		<input type="radio" name="facultyCode" value="ing"> Escuela de Psicología <br>
		<input type="radio" name="facultyCode" value="ing"> Facultad de Comunicaciones <br>
		<input type="radio" name="facultyCode" value="ing"> Escuela de Gobierno <br>
		<input type="radio" name="facultyCode" value="ing"> Design Lab <br>
		Hero (tamaño recomendado 1200x627px):  <input type="file" name="hero" accept="image/*"> <br>
		Fecha de inicio: <input type="date" name="startDate"><br>
		<input type="submit" value="Enviar"> 

	</form>

	</body>
</html>
