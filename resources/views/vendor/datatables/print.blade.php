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
              border-collapse: collapse;
              border-spacing: 0;
              margin-bottom: 20px;
            }

            table th,
            table td {
              padding: 5px;
              background: #EEEEEE;
              text-align: center;
              border-bottom: 1px solid #FFFFFF;

            }

            table th {
              white-space: nowrap;        
              font-weight: normal;
            }

            table td {
              text-align: right;
            }
       </style>

    </head>
    <body>
         <header class="clearfix">
          <div id="logo">
            <img src="C:\Users\Usuario\Desktop\Carpeta\syslib\resources\views\example2\logo.png">
          </div>
          <div id="company">
            
            <div>455 Foggy Heights, AZ 85004, US</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">company@example.com</a></div>
            
          </div>
          </div>
         </header>

        <main>
          <div id="details" class="clearfix">
            <div id="client">
              <div class="to">INVOICE TO:</div>
              <h2 class="name">John Doe</h2>
              <div class="address">796 Silver Harbour, TX 79273, US</div>
              <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
            </div>
            <div id="invoice">
              <h1>INVOICE 3-2-1</h1>
              <div class="date">Date of Invoice: 01/06/2014</div>
              <div class="date">Due Date: 30/06/2014</div>
            </div>
          </div>

        <hr style="color: #000000" style="width: 100%">


        <table class="table table-bordered table-condensed table-striped">
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
