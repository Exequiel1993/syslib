<?php

namespace App\Http\Controllers;

use App\DataTables\TipoArticuloDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTipoArticuloRequest;
use App\Http\Requests\UpdateTipoArticuloRequest;
use App\Repositories\TipoArticuloRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\TipoArticulo;
use App\Models\Informe;
use DB;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Database\Eloquent\Collection;

class TipoArticuloController extends AppBaseController
{
    /** @var  TipoArticuloRepository */
    private $tipoArticuloRepository;
   

    public function __construct(TipoArticuloRepository $tipoArticuloRepo)
    {
        $this->tipoArticuloRepository = $tipoArticuloRepo;
    }

    /**
     * Display a listing of the TipoArticulo.
     *
     * @param TipoArticuloDataTable $tipoArticuloDataTable
     * @return Response
     */
    /*
    public function index(TipoArticuloDataTable $tipoArticuloDataTable)
    {

        return $tipoArticuloDataTable->render('tipo_articulos.index');
    }
    */

    public function index(Request $request)
    {

        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $tipo = $request->get('buscarTexto');

        $informe = Informe::find(1);


        //$tipoArticulo=DB::table('tipo_articulos')->orderby('id','desc')->paginate(7);

        //$tipoArticulo = TipoArticulo::with(['nombre']);
/*
        $query = new TipoArticulo;

        $query = $query->newQuery();


        $tipoArticulo = new EloquentDataTable($query);
*/

        $tipoArticulo=DB::table('tipo_articulos')
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
  
        if ($request->exists('filtrar')) {

            if(!is_null($desde) && !is_null($hasta) ){

                    $tipoArticulo=DB::table('tipo_articulos')
                        ->whereBetween('created_at',[$desde,$hasta])
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

                    

                    return view('tipo_articulos.index',["tipoArticulo"=>$tipoArticulo,'desde'=>$desde,'hasta'=>$hasta]);
            }
            
            if(!is_null($desde) && is_null($hasta)){

                    $tipoArticulo=DB::table('tipo_articulos')
                        ->where('created_at','>=',$desde)
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

                    

                    return view('tipo_articulos.index',["tipoArticulo"=>$tipoArticulo,'desde'=>$desde,'hasta'=>$hasta]);
            }

        }
/*
        if(!is_null($desde)){
             
             $tipoArticulo=$tipoArticulo->where('created_at','>=',$desde);
        }*/


        if ($request->exists('pdf')) {

            $reporte = \App::make('dompdf.wrapper');
            $nombreInforme = "Tipo de articulo";
            
            if(!is_null($desde) && !is_null($hasta) ){

                    $tipoArticulo=DB::table('tipo_articulos')
                        ->whereBetween('created_at',[$desde,$hasta])
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            }

             if(!is_null($desde) && is_null($hasta)){

                    $tipoArticulo=DB::table('tipo_articulos')
                        ->where('created_at','>=',$desde)
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            }

           

            $reporte->loadView('reportes.informeTipoArticulo',compact('tipoArticulo','informe','desde','hasta','nombreInforme'))->setPaper('a4');

            return $reporte->download('Reporte' . '.pdf');
            //return $tipoArticulo;

        }
        
        if (!is_null($tipo)) {

            $query = trim($request->get('buscarTexto'));
                    $tipoArticulo=DB::table('tipo_articulos')
                        ->where('nombre','LIKE','%'.$query.'%')
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            
            return view('tipo_articulos.index',compact('tipoArticulo'));
        }

        
        


        return view('tipo_articulos.index',compact('tipoArticulo','desde','hasta'));
        //return $tipoArticulo;

    }

    /**
     * Show the form for creating a new TipoArticulo.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_articulos.create');
    }

    /**
     * Store a newly created TipoArticulo in storage.
     *
     * @param CreateTipoArticuloRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoArticuloRequest $request)
    {
        $input = $request->all();

        $tipoArticulo = $this->tipoArticuloRepository->create($input);

        Flash::success('Tipo Articulo guardado correctamente.');

        return redirect(route('tipoArticulos.index'));
    }

    /**
     * Display the specified TipoArticulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoArticulo = $this->tipoArticuloRepository->find($id);

        if (empty($tipoArticulo)) {
            Flash::error('Tipo Articulo no encontrado');

            return redirect(route('tipoArticulos.index'));
        }

        return view('tipo_articulos.show')->with('tipoArticulo', $tipoArticulo);
    }

    /**
     * Show the form for editing the specified TipoArticulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoArticulo = $this->tipoArticuloRepository->find($id);

        if (empty($tipoArticulo)) {
            Flash::error('Tipo Articulo no encontrado');

            return redirect(route('tipoArticulos.index'));
        }

        return view('tipo_articulos.edit')->with('tipoArticulo', $tipoArticulo);
    }

    /**
     * Update the specified TipoArticulo in storage.
     *
     * @param  int              $id
     * @param UpdateTipoArticuloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoArticuloRequest $request)
    {
        $tipoArticulo = $this->tipoArticuloRepository->find($id);

        if (empty($tipoArticulo)) {
            Flash::error('Tipo Articulo no encontrado');

            return redirect(route('tipoArticulos.index'));
        }

        $tipoArticulo = $this->tipoArticuloRepository->update($request->all(), $id);

        Flash::success('Tipo Articulo actualizado correctamente.');

        return redirect(route('tipoArticulos.index'));
    }

    /**
     * Remove the specified TipoArticulo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoArticulo = $this->tipoArticuloRepository->find($id);

        if (empty($tipoArticulo)) {
            Flash::error('Tipo Articulo no encontrado');

            return redirect(route('tipoArticulos.index'));
        }

        $this->tipoArticuloRepository->delete($id);

        Flash::success('Tipo Articulo eliminado correctamente.');

        return redirect(route('tipoArticulos.index'));
    }
}
