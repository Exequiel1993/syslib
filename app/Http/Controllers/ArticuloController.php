<?php

namespace App\Http\Controllers;

use App\DataTables\ArticuloDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Repositories\ArticuloRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Http\Controllers\Auth;
use App\Models\Articulo;
use Storage;

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
    public function index(ArticuloDataTable $articuloDataTable)
    {
        return $articuloDataTable->render('articulos.index');
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
        $input = $request->all();

        $articulo = $this->articuloRepository->create($input);

        if ($request->hasfile('imagen')) {
          //  $file=$request->file('imagen');
          //  $name=time().$file->getClientOriginalName();
          //  $file->move(public_path().'/images/',$name);
              $path = Storage::disk('public')->put('imagenes',$request->file('imagen'));
              $articulo->fill(['imagen'=>asset($path)])->save();
        }

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

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

        return view('articulos.show')->with('articulo', $articulo);
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
