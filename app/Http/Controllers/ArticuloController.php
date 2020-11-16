<?php

namespace App\Http\Controllers;

use App\DataTables\ArticuloDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Repositories\ArticuloRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Http\Controllers\Auth;
use App\Models\Articulo;
use App\Models\TipoArticulo;
use App\Models\Marca;
use Storage;
use DB;
use Illuminate\Support\CollectionstdClass;
use App\Models\Informe;

class ArticuloController extends AppBaseController
{
    /** @var  ArticuloRepository */
    private $articuloRepository;

    public function __construct(ArticuloRepository $articuloRepo)
    {
        $this->articuloRepository = $articuloRepo;
    }

    /**
     * Display a listing of the Articulo.
     *
     * @param ArticuloDataTable $articuloDataTable
     * @return Response
     */
    public function index(Request $request) 
    {
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $buscar = $request->get('buscarTexto');

         $informe = Informe::find(1);
        /*
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');


        if ($request->exists('pdf')) {

          $articuloDataTable->printPreview();
          //return   view('prueba',compact('data'))  ;
          /*
          $articulo = \App::make('dompdf.wrapper');
          $articulo->loadView('prueba', compact('data'));
          
          return $articulo->download('PDFarticulos.pdf');
*/
        //}*/

        $articulo=DB::table('articulos')
                        ->join('tipo_articulos','articulos.tipoArticulo_id','=','tipo_articulos.id')
                        ->join('marcas','articulos.marca_id','=','marcas.id')
                        ->select('articulos.*','tipo_articulos.nombre as tipoArticulo','marcas.nombre as marca')
                        ->whereNull('articulos.deleted_at')
                        ->paginate(7);

        if ($request->exists('filtrar')) {

            if(!is_null($desde) && !is_null($hasta) ){

                    $articulo=DB::table('articulos')
                        ->join('tipo_articulos','articulos.tipoArticulo_id','=','tipo_articulos.id')
                        ->join('marcas','articulos.marca_id','=','marcas.id')
                        ->select('articulos.*','tipo_articulos.nombre as tipoArticulo','marcas.nombre as marca')
                        ->whereBetween('articulos.created_at',[$desde,$hasta])
                        ->whereNull('articulos.deleted_at')
                        ->paginate(7);

                    return view('articulos.index',["articulo"=>$articulo,'desde'=>$desde,'hasta'=>$hasta]);
            }
            
            if(!is_null($desde) && is_null($hasta)){

                    $articulo=DB::table('articulos')
                        ->join('tipo_articulos','articulos.tipoArticulo_id','=','tipo_articulos.id')
                        ->join('marcas','articulos.marca_id','=','marcas.id')
                        ->select('articulos.*','tipo_articulos.nombre as tipoArticulo','marcas.nombre as marca')
                        ->where('articulos.created_at','>=',$desde)
                        ->whereNull('articulos.deleted_at')
                        ->paginate(7);

                    

                    return view('articulos.index',["articulo"=>$articulo,'desde'=>$desde,'hasta'=>$hasta]);
            }

        }


        if ($request->exists('pdf')) {

            $reporte = \App::make('dompdf.wrapper');
            $nombreInforme = "Articulos";
           

            if(!is_null($desde) && !is_null($hasta) ){

                    $articulo=DB::table('articulos')
                        ->join('tipo_articulos','articulos.tipoArticulo_id','=','tipo_articulos.id')
                        ->join('marcas','articulos.marca_id','=','marcas.id')
                        ->select('articulos.*','tipo_articulos.nombre as tipoArticulo','marcas.nombre as marca')
                        ->whereBetween('articulos.created_at',[$desde,$hasta])
                        ->whereNull('articulos.deleted_at')
                        ->paginate(7);
            }

             if(!is_null($desde) && is_null($hasta)){

                    $articulo=DB::table('articulos')
                        ->join('tipo_articulos','articulos.tipoArticulo_id','=','tipo_articulos.id')
                        ->join('marcas','articulos.marca_id','=','marcas.id')
                        ->select('articulos.*','tipo_articulos.nombre as tipoArticulo','marcas.nombre as marca')
                        ->where('articulos.created_at','>=',$desde)
                        ->whereNull('articulos.deleted_at')
                        ->paginate(7);
            }

    
            $reporte->loadView('reportes.informeArticulo',compact('articulo','informe','desde','hasta','nombreInforme'))->setPaper('a4');

            return $reporte->download('Reporte' . '.pdf');
            //return $tipoArticulo;

        }


        //DD($articulo);

        //return $articuloDataTable->render('articulos.index'); 
        return view('articulos.index', compact('articulo','desde','hasta')); 
        //return $articulo;     
    }

    /**
     * Show the form for creating a new Articulo.
     *
     * @return Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created Articulo in storage.
     *
     * @param CreateArticuloRequest $request
     *
     * @return Response
     */
    public function store(CreateArticuloRequest $request)
    {
        //$input = $request->all();
        
        //$articulo = $this->articuloRepository->create($input);
        $articulo = new Articulo;
        $articulo->codigoUnico = $request->input('codigoUnico');
        $articulo->tipoArticulo_id = $request->input('tipoArticulo_id');
        $articulo->marca_id=$request->input('marca_id');
        $articulo->cantidad=$request->input('cantidad');//Ver
        $articulo->descripcion=$request->input('descripcion');
        //$articulo->precioVenta=$request->input('precioVenta');
        $articulo->stockMinimo=$request->input('stockMinimo');
        $articulo->stockMaximo=$request->input('stockMaximo');
    
        if ($request->hasfile('imagen')) {
          //  $file=$request->file('imagen');
          //  $name=time().$file->getClientOriginalName();
          //  $file->move(public_path().'/images/',$name);
              $path = Storage::disk('public')->put('imagenes',$request->file('imagen'));
              $articulo->fill(['imagen'=>asset($path)])->save();
        }

        $articulo->save();
        Flash::success('Articulo guardado correctamente.');

        return redirect(route('articulos.index'));
    }

    /**
     * Display the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articulo = $this->articuloRepository->find($id);
        

        $tipoArticulo = TipoArticulo::find($articulo->tipoArticulo_id);
        $marca = Marca::find($articulo->marca_id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

       
        return view('articulos.show',compact('tipoArticulo','marca'))->with('articulo', $articulo);
    }

    /**
     * Show the form for editing the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articulo = $this->articuloRepository->find($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

        return view('articulos.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified Articulo in storage.
     *
     * @param  int              $id
     * @param UpdateArticuloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticuloRequest $request)
    {
        $articulo = $this->articuloRepository->find($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

        $articulo = $this->articuloRepository->update($request->all(), $id);

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('imagenes',$request->file('imagen'));
            $articulo->fill(['imagen'=>asset($path)])->save();
        }

        Flash::success('Articulo actualizado correctamente.');

        return redirect(route('articulos.index'));
    }

    /**
     * Remove the specified Articulo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Articulo $articulo)
    {
        /*
        $articulo = $this->articuloRepository->find($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

        $this->articuloRepository->delete($id);

        Flash::success('Articulo eliminado correctamente.');

        return redirect(route('articulos.index'));
        */

        $articulo->delete();

        return $this->sendSuccess('Usuario eliminado correctamente.');
    }
}
