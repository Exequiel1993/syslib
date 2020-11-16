<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tipoController extends Controller
{
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

        
        if ($request) {
            $query = trim($request->get('buscarTexto'));
            $tipoArticulo=DB::table('tipo_articulos')->where('nombre','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
            ;

            return view('tipo_articulos.index',["tipoArticulo"=>$tipoArticulo,"buscarTexto"=>$query]);
        }
    }

    
}
