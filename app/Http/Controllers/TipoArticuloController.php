<?php

namespace App\Http\Controllers;

use App\DataTables\TipoArticuloDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTipoArticuloRequest;
use App\Http\Requests\UpdateTipoArticuloRequest;
use App\Repositories\TipoArticuloRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

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
    public function index(TipoArticuloDataTable $tipoArticuloDataTable)
    {
        return $tipoArticuloDataTable->render('tipo_articulos.index');
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
