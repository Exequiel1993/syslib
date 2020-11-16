<?php

namespace App\Http\Controllers;

use App\DataTables\InformeDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateInformeRequest;
use App\Http\Requests\UpdateInformeRequest;
use App\Repositories\InformeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Storage;
use App\Models\Informe;
use DB;


class InformeController extends AppBaseController
{
    /** @var  InformeRepository */
    private $informeRepository;

    public function __construct(InformeRepository $informeRepo)
    {
        $this->informeRepository = $informeRepo;
    }

    /**
     * Display a listing of the Informe.
     *
     * @param InformeDataTable $informeDataTable
     * @return Response
     */
    public function index(InformeDataTable $informeDataTable)
    {

        //$informe = $this->informeRepository->find(1);

        //$informe = Informe::find(1);

        $informe=DB::table('informeS')
                        ->orderby('id','desc')
                        ->whereNull('deleted_at')
                        ->paginate(7);


        return view('informes.index',compact('informe'));
    }

    /**
     * Show the form for creating a new Informe.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('informes.create');
    }

    /**
     * Store a newly created Informe in storage.
     *
     * @param CreateInformeRequest $request
     *
     * @return Response
     */
    public function store(CreateInformeRequest $request)
    {
        $input = $request->all();

       $informe = $this->informeRepository->create($input);

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('images',$request->file('imagen'));
            $informe->fill(['imagen'=>asset($path)])->save();
        }

        Flash::success('Informe guardado correctamente');


        return redirect(route('informes.index'));
    }

    /**
     * Display the specified Informe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informe = $this->informeRepository->find($id);




        if (empty($informe)) {
            Flash::error('Informe not found');

            return redirect(route('informes.index'));
        }

        return view('informes.show')->with('informe', $informe);
    }

    /**
     * Show the form for editing the specified Informe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informe = $this->informeRepository->find($id);

        if (empty($informe)) {
            Flash::error('Informe not found');

            return redirect(route('informes.index'));
        }

        return view('informes.edit')->with('informe', $informe);
    }

    /**
     * Update the specified Informe in storage.
     *
     * @param  int              $id
     * @param UpdateInformeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformeRequest $request)
    {
        $informe = $this->informeRepository->find($id);

        if (empty($informe)) {
            Flash::error('Informe no encontrado');

            return redirect(route('informes.index'));
        }

        $informe = $this->informeRepository->update($request->all(), $id);

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('images',$request->file('imagen'));
            $informe->fill(['imagen'=>asset($path)])->save();
        }

        Flash::success('Informe updated successfully.');

        return redirect(route('informes.index'));
    }

    /**
     * Remove the specified Informe from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informe = $this->informeRepository->find($id);

        if (empty($informe)) {
            Flash::error('Informe not found');

            return redirect(route('informes.index'));
        }

        $this->informeRepository->delete($id);

        Flash::success('Informe deleted successfully.');

        return redirect(route('informes.index'));
    }
}
