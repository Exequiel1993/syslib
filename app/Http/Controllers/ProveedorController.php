<?php

namespace App\Http\Controllers;

use App\DataTables\ProveedorDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Repositories\ProveedorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Informe;
use DB;
use App\Models\Proveedor;

class ProveedorController extends AppBaseController
{
    /** @var  ProveedorRepository */
    private $proveedorRepository;

    public function __construct(ProveedorRepository $proveedorRepo)
    {
        $this->proveedorRepository = $proveedorRepo;
    }

    /**
     * Display a listing of the Proveedor.
     *
     * @param ProveedorDataTable $proveedorDataTable
     * @return Response
     */
    public function index(Request $request)
    {

        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $buscar = $request->get('buscarTexto');
        $informe = Informe::find(1);

        $proveedor=DB::table('proveedors')
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

        //Filtro 
        if ($request->exists('filtrar')) {

            if(!is_null($desde) && !is_null($hasta) ){

                    $proveedor=DB::table('proveedors')
                        ->whereBetween('created_at',[$desde,$hasta])
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

                    

                    return view('proveedors.index',["proveedor"=>$proveedor,'desde'=>$desde,'hasta'=>$hasta]);
            }
            
            if(!is_null($desde) && is_null($hasta)){

                    $proveedor=DB::table('proveedors')
                        ->where('created_at','>=',$desde)
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);

                    

                    return view('proveedors.index',["proveedor"=>$proveedor,'desde'=>$desde,'hasta'=>$hasta]);
            }
        }

            if ($request->exists('pdf')) {

            $reporte = \App::make('dompdf.wrapper');
            $nombreInforme = "Proveedores";
           

            if(!is_null($desde) && !is_null($hasta) ){

                    $proveedor =DB::table('proveedors')
                        ->whereBetween('created_at',[$desde,$hasta])
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            }

             if(!is_null($desde) && is_null($hasta)){

                    $proveedor =DB::table('proveedors')
                        ->where('created_at','>=',$desde)
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);
            }
            $reporte->loadView('reportes.informeProveedor',compact('proveedor','informe','desde','hasta','nombreInforme'))->setPaper('a4');

            return $reporte->download('Reporte' . '.pdf');
            //return $tipoArticulo;

        }

        



        //DD($proveedor);

        //return $proveedorDataTable->render('proveedors.index');
        return view('proveedors.index',compact('proveedor','desde','hasta'));
    }

    /**
     * Show the form for creating a new Proveedor.
     *
     * @return Response
     */
    public function create()
    {
        return view('proveedors.create');
    }

    /**
     * Store a newly created Proveedor in storage.
     *
     * @param CreateProveedorRequest $request
     *
     * @return Response
     */
    public function store(CreateProveedorRequest $request)
    {
        $input = $request->all();

        $proveedor = $this->proveedorRepository->create($input);

        Flash::success('Proveedor saved successfully.');

        return redirect(route('proveedors.index'));
    }

    /**
     * Display the specified Proveedor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedors.index'));
        }

        return view('proveedors.show')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for editing the specified Proveedor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedors.index'));
        }

        return view('proveedors.edit')->with('proveedor', $proveedor);
    }

    /**
     * Update the specified Proveedor in storage.
     *
     * @param  int              $id
     * @param UpdateProveedorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProveedorRequest $request)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedors.index'));
        }

        $proveedor = $this->proveedorRepository->update($request->all(), $id);

        Flash::success('Proveedor updated successfully.');

        return redirect(route('proveedors.index'));
    }

    /**
     * Remove the specified Proveedor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedors.index'));
        }

        $this->proveedorRepository->delete($id);

        Flash::success('Proveedor deleted successfully.');

        return redirect(route('proveedors.index'));
    }
}
