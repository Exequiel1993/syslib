<?php

namespace App\Http\Controllers;

use App\DataTables\MarcaDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Repositories\MarcaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Informe;
use DB;

class MarcaController extends AppBaseController
{
    /** @var  MarcaRepository */
    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepo)
    {
        $this->marcaRepository = $marcaRepo;
    }

    /**
     * Display a listing of the Marca.
     *
     * @param MarcaDataTable $marcaDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $buscar = $request->get('buscarTexto');
        $informe = Informe::find(1);


         $marca=DB::table('marcas')
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

        if ($request->exists('filtrar')) {

            if(!is_null($desde) && !is_null($hasta) ){

                    $marca=DB::table('marcas')
                        ->whereBetween('created_at',[$desde,$hasta])
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

                    

                    return view('marcas.index',["marca"=>$marca,'desde'=>$desde,'hasta'=>$hasta]);
            }
            
            if(!is_null($desde) && is_null($hasta)){

                    $marca=DB::table('marcas')
                        ->where('created_at','>=',$desde)
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

                    

                    return view('marcas.index',["marca"=>$marca,'desde'=>$desde,'hasta'=>$hasta]);
            }

        }

        if ($request->exists('pdf')) {

            $reporte = \App::make('dompdf.wrapper');
            $nombreInforme = "Marcas";
           

            if(!is_null($desde) && !is_null($hasta) ){

                    $marca =DB::table('marcas')
                        ->whereBetween('created_at',[$desde,$hasta])
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            }

             if(!is_null($desde) && is_null($hasta)){

                    $marca =DB::table('marcas')
                        ->where('created_at','>=',$desde)
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            }

           

            $reporte->loadView('reportes.informeMarca',compact('marca','informe','desde','hasta','nombreInforme'))->setPaper('a4');

            return $reporte->download('Reporte' . '.pdf');
            //return $tipoArticulo;

        }
        
        if (!is_null($buscar)) {

            $query = trim($request->get('buscarTexto'));
                    $marca=DB::table('marcas')
                        ->where('nombre','LIKE','%'.$query.'%')
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            
            return view('marcas.index',compact('marca'));
        }

       

        //return $marcaDataTable->render('marcas.index');

        return view('marcas.index',compact('marca','desde','hasta'));
    }

    /**
     * Show the form for creating a new Marca.
     *
     * @return Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created Marca in storage.
     *
     * @param CreateMarcaRequest $request
     *
     * @return Response
     */
    public function store(CreateMarcaRequest $request)
    {
        $input = $request->all();

        $marca = $this->marcaRepository->create($input);

        Flash::success('Marca guardada correctamente.');

        return redirect(route('marcas.index'));
    }

    /**
     * Display the specified Marca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error('Marca no encontrado');

            return redirect(route('marcas.index'));
        }

        return view('marcas.show')->with('marca', $marca);
    }

    /**
     * Show the form for editing the specified Marca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error('Marca no encontrado');

            return redirect(route('marcas.index'));
        }

        return view('marcas.edit')->with('marca', $marca);
    }

    /**
     * Update the specified Marca in storage.
     *
     * @param  int              $id
     * @param UpdateMarcaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarcaRequest $request)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error('Marca no encontrado');

            return redirect(route('marcas.index'));
        }

        $marca = $this->marcaRepository->update($request->all(), $id);

        Flash::success('Marca actualizada correctamente.');

        return redirect(route('marcas.index'));
    }

    /**
     * Remove the specified Marca from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marca = $this->marcaRepository->find($id);

        if (empty($marca)) {
            Flash::error('Marca no encontrado');

            return redirect(route('marcas.index'));
        }

        $this->marcaRepository->delete($id);

        Flash::success('Marca eliminado correctamente.');

        return redirect(route('marcas.index'));
    }
}
