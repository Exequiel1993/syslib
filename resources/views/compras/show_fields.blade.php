			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="table-responsive">
                               <table id="marca" class="table table-striped table-bordered table-condensend table-sm table-dark" >

                                  <thead class="bg-primary">
                                      <th>Articulo</th>
                                      <th>Cantidad</th>
                                      <th>Precio Compra</th>
                                      <th>SubTotal</th>
                       
                                      
                                  </thead>
                                  @foreach ($detalle as $data)
                                      <tr class="bg-success">
                                          <td>{{$data->codigoUnico}}</td>
                                          <td>{{$data->cantidad}}</td>
                                          <td>{{$data->precioCompra}}</td>
                                          <td>${{$data->subtotal}}</td>
                                          
                                      </tr>
                                  @endforeach
                                      <tr>
                                      	<td><h4>Total</h4></td>
                                      	<td></td>
                                      	<td></td>
        
                                      	<td><h4>${{$data->total}}</h4></td>
                                      </tr>	
                               </table>
                          </div>
                      

                      </div>
