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
        <style>
            
            th,td {
                 border: black 2px solid;
                    }
            .container{
                background:#470063;
                display: flex;

            }
            .item{
                
            }

            .dimencion{
                height: 40%;
                padding: 1em;
                margin: 10px;
                float: left;
            }
        </style>
        <div >
            <img src="C:\Users\Usuario\Desktop\Carpeta\syslib\public\images\logo-red-black.png" alt="logo" width="200px">
        </div>
        <hr style="color: #000000" style="width: 100%">
       
    </head>
    <body>
         <div class="container" >
            <div class="item dimencion" >
            <h2>Nombre Empresa</h2>
            <div>
                <label>Direccion:</label>
            </div>
            <div>
                <label>Telefono:</label>
            </div>
            <div>
                <label>Cuit:</label>
            </div>
        </div>
        <div class="dimencion" style="width: 10%"></div>
        <div class="item dimencion" >
            <h2>Articulos disponibles</h2>
            <div>
                <label>Fecha Desde:</label>
            </div>
            <div>
                <label>Fecha hasta:</label>
            </div>
        </div>
        </div>
        <div style="clear: both;">
            <hr style="color: #000000" style="width: 100%">
            <table class="table table-bordered table-condensed table-striped" style="width: 100%">
            @foreach($data as $row)
                @if ($row == reset($data)) 
                    <tr>
                        @foreach($row as $key => $value)
                            <th>{!! $key !!}</th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    @foreach($row as $key => $value)
                        @if(is_string($value) || is_numeric($value))
                            <td>{!! $value !!}</td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
        </div>
    </body>
</html>
