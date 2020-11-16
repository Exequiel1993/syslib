<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Print Table</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
       <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
       <style type="text/css">

          .clearfix:after {
            content: "";
            display: table;
            clear: both;
          }
                
          #logo {
            float: left;
            margin-top: 8px;
          }

          #logo img {
            height: 70px;
          }
    
          #company {
            
            text-align: right;
          }

          #details {
            margin-bottom: 2%;
          }

          #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float:left;
            
          }

          #client .to {
            color: #777777;
          }

          h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
          }

          #invoice {
            
            text-align: right;
          }

          #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;

          }

          #invoice .date {
            font-size: 1.1em;
          }

          a {
            color: #0087C3;
            text-decoration: none;
          }

          body {
            position: relative;
            width: 19cm;  
            height: 29.7cm; 
            margin: 0 auto; 
            color: #555555;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 14px; 
            font-family: SourceSansPro;
          }

          header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
          }

          table {
              width: 100%;
              
              border-radius: 20px
              border: red 5px solid
            }

            table th,
            table td {
              padding: 5px;
              text-align: center;
              border-bottom: 1px solid #FFFFFF;

            }

            table th {
              white-space: nowrap;        
              font-weight: normal;
              text-align: left;
              background: #00FFFF;
              

            }

            table td {
              text-align: left;
              background: #EEEEEE;
            }
       </style>

    </head>
    <body>
         <header class="clearfix">
          <div id="logo">
            
            <img src="C:\Users\Usuario\Desktop\Carpeta\syslib\resources\views\example2\logo.png">



          </div>
          <div id="company">
            
            <div>{{$informe->empresa}}</div>
            <div>{{$informe->direccion}}</div>
            <div>Tel:{{$informe->telefono}}</div>
          </div>
          </div>
         </header>

        <main>
          <div id="details" class="clearfix">
            <div id="client">
              <div class="to">Generado Por:</div>
              <h2 class="name">{{Auth::user()->name}}</h2>
              <div class="address">{{Auth::user()->phone}}</div>
              <div class="email"><a href="">{{Auth::user()->email}}</a></div>
              <div class="name">Fecha:{{now()->format('d/m/yy')}}</div>
            </div>
            <div id="invoice">
              <h1>Informe de {{$nombreInforme}}</h1>
              <div class="date">Fecha desde: {{$desde}}</div>
              <div class="date">Fecha hasta: {{$hasta}}</div>
            </div>
          </div>

        <hr style="color: #000000" style="width: 100%">


        <table >
            
        	<thead >
        		<tr class="bg-primary">
        				
                    	<th>Nombre</th>
                    	<th>Fecha de Creacion</th>
                </tr> 
            </thead>			  
        		      	
            @foreach($tipoArticulo as $data)
	                <tr class="bg-success">
	                            
	                            <td>{!! $data->nombre !!}</td>
	                            <td>{!! $data->created_at!!}</td>
	                    
	                </tr>
            @endforeach
        </table>
        </div>
    </body>
</html>
