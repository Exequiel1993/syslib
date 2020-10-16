<!DOCTYPE html>
<html>
<head>
	<title>Tabla de Articulos</title>
	 <style>
            body {margin: 20px}
            th,td {
 				 border: black 2px solid;
					}
	 </style>
</head>
<body>
	<img src="C:\Users\Usuario\Desktop\Carpeta\syslib\public\images\homero.jpeg" alt="logo" width="200px">
	<p>Tabla Articulos</p>
	<div class="container">
		<table >
		  <thead>
		    <tr>
		      <th scope="col">CodigoUnico</th>
		      <th scope="col">Descripcion</th>
		      <th scope="col">Cantidad</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($articulo as $articulos )
		    <tr>
		      <th scope="row">{{$articulos->codigoUnico}}</th>
		      <td>{{$articulos->descripcion}}</td>
		      <td>{{$articulos->cantidad}}</td>
		    </tr>
		    @endforeach

		     
		  </tbody>
		</table>
	</div>
</body>
</html>