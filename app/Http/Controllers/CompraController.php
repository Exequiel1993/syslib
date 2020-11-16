<?php

namespace App\Http\Controllers;

use App\DataTables\CompraDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Repositories\CompraRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Compra;
use App\Models\Detalle;
use App\Models\Articulo;
use App\Models\Proveedor;
use DB;
use App\Models\Informe;

class CompraController extends AppBaseController
{
    /** @var  CompraRepository */
    private $compraRepository;

    public function __construct(CompraRepository $compraRepo)
    {
        $this->compraRepository = $compraRepo;
    }

    /**
     * Display a listing of the Compra.
     *
     * @param CompraDataTable $compraDataTable
     * @return Response
     */
    public function index(Request $request)
    {

        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $buscar = $request->get('buscarTexto');

        $informe = Informe::find(1);


        $compra=DB::table('compras')
                        ->join('proveedors','compras.proveedor_id','=','proveedors.id')
                        ->select('compras.*','proveedors.nombre as proveedor')
                        ->whereNull('compras.deleted_at')
                        ->paginate(7);
        
        if ($request->exists('filtrar')) {

            if(!is_null($desde) && !is_null($hasta) ){


                    $compra=DB::table('compras')
                        ->join('proveedors','compras.proveedor_id','=','proveedors.id')
                        ->select('compras.*','proveedors.nombre as proveedor')
                        ->whereBetween('compras.created_at',[$desde,$hasta])
                        ->whereNull('compras.deleted_at')
                        ->paginate(7);

                    return view('compras.index',["compra"=>$compra,'desde'=>$desde,'hasta'=>$hasta]);
            }
            
            if(!is_null($desde) && is_null($hasta)){


                    $compra=DB::table('compras')
                        ->join('proveedors','compras.proveedor_id','=','proveedors.id')
                        ->select('compras.*','proveedors.nombre as proveedor')
                        ->where('compras.created_at','>=',$desde)
                        ->whereNull('compras.deleted_at')
                        ->paginate(7);

                    

                    return view('compras.index',["compra"=>$compra,'desde'=>$desde,'hasta'=>$hasta]);
            }

        }

         if ($request->exists('pdf')) {

            $reporte = \App::make('dompdf.wrapper');
            $nombreInforme = "Compras";
           

            if(!is_null($desde) && !is_null($hasta) ){

                    $compra=DB::table('compras')
                        ->join('proveedors','compras.proveedor_id','=','proveedors.id')
                        ->select('compras.*','proveedors.nombre as proveedor')
                        ->whereBetween('compras.created_at',[$desde,$hasta])
                        ->whereNull('compras.deleted_at')
                        ->paginate(7);
            }

             if(!is_null($desde) && is_null($hasta)){

                    $compra=DB::table('compras')
                        ->join('proveedors','compras.proveedor_id','=','proveedors.id')
                        ->select('compras.*','proveedors.nombre as proveedor')
                        ->where('compras.created_at','>=',$desde)
                        ->whereNull('compras.deleted_at')
                        ->paginate(7);
            }

    
            $reporte->loadView('reportes.informeCompra',compact('compra','informe','desde','hasta','nombreInforme'))->setPaper('a4');

            return $reporte->download('Reporte' . '.pdf');
            //return $tipoArticulo;

        }


        //DD($compra);
        //return $compraDataTable->render('compras.index');
        return view('compras.index',compact('compra','desde','hasta'));
    }

    /**
     * Show the form for creating a new Compra.
     *
     * @return Response
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created Compra in storage.
     *
     * @param CreateCompraRequest $request
     *
     * @return Response
     */
    public function store(CreateCompraRequest $request)
    {
        
        try {

            DB::beginTransaction();

            $compra = new Compra;

            $compra->proveedor_id = $request->input('proveedor_id');
            $compra->numeroComprobante = $request->input('numeroComprobante');
            $compra->total = $request->input('total');
            $compra->save();

            $idarticulo = $request->input('idarticulo_unico');
            $cantidad = $request->input('cantidad_articulo');
            $precioCompra = $request->input('precio_compra');
            $subtotal = $request->input('subtotal');;

            $cont = 0;
            
            while ($cont < count($idarticulo)){
                $detalle = new Detalle();
                $detalle->articulo_id = $idarticulo[$cont];
                $arti = Articulo::find($idarticulo[$cont]);
                $arti->cantidad =  $arti->cantidad + $cantidad[$cont];
                $arti->save();
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precioCompra = $precioCompra[$cont];
                $detalle->subtotal = $subtotal[$cont];
                $detalle->compra_id = $compra->id;
                $detalle->save();
                $cont=$cont+1;
            }

            DB::commit();
            
        } catch (Exception $e) {
            
            DB::rollback();
        }

/*
        $input = $request->all();
        $compra = $this->compraRepository->create($input);
        $input = $request->query('cantidad',150);
    
        $input[] = 
        $input[] = $request->input('numeroComprobante');
        $input[] = $request->input('articulo_id');
        $input[] = $request->input('cantidad');
        $input[] = $request->input('precioCompra');
        $input[] = $request->input('total');

       

        Flash::success('Compra guardada correctamente.');*/

        return redirect(route('compras.index'));

        //return $input;
    }

    /**
     * Display the specified Compra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$compra = $this->compraRepository->find($id);
        //$proveedor = Proveedor::find($compra->proveedor_id);
        $compra=DB::table('compras')
                        ->join('proveedors','compras.proveedor_id','=','proveedors.id')
                        ->select('compras.*','proveedors.nombre as proveedor')
                        ->where('compras.id','=',$id)
                        ->whereNull('compras.deleted_at')
                        ->get();

        $detalle=DB::table('compras')
                        ->join('detalles','detalles.compra_id','=','compras.id')
                        ->join('articulos','detalles.articulo_id','=','articulos.id')
                        ->select('compras.*','detalles.*','articulos.*')
                        ->where('compras.id','=',$id)
                        ->whereNull('compras.deleted_at')
                        ->paginate(7);

        


        if (empty($detalle)) {
            Flash::error('Compra no encontrada');

            return redirect(route('compras.index'));
        }

        return view('compras.show',compact('detalle','compra'));
        //DD($detalle);
    }

    /**
     * Show the form for editing the specified Compra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compra = $this->compraRepository->find($id);

        if (empty($compra)) {
            Flash::error('Compra no encontrada');

            return redirect(route('compras.index'));
        }

        return view('compras.edit')->with('compra', $compra);
    }

    /**
     * Update the specified Compra in storage.
     *
     * @param  int              $id
     * @param UpdateCompraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompraRequest $request)
    {
        $compra = $this->compraRepository->find($id);

        if (empty($compra)) {
            Flash::error('Compra no encontrada');

            return redirect(route('compras.index'));
        }

        $compra = $this->compraRepository->update($request->all(), $id);

        Flash::success('Compra actualizada correctamente.');

        return redirect(route('compras.index'));
    }

    /**
     * Remove the specified Compra from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compra = $this->compraRepository->find($id);

        if (empty($compra)) {
            Flash::error('Compra no encontrada');

            return redirect(route('compras.index'));
        }

        $this->compraRepository->delete($id);

        Flash::success('Compra eliminada correctamente.');

        return redirect(route('compras.index'));
    }
}
