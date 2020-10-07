<?php

namespace App\DataTables;

use App\Models\Articulo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ArticuloDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'articulos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Articulo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Articulo $model)
    {

        return $model->newQuery()->with(['tipo','marca']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'ordering'=>false,                 //////Habilita o desabilita funcion de orden
                //'stateSave' => true,             /////Almacena el estado
                //'order'     => [[1, 'desc']],     /////Indica la columna y tipo de orden
                'language'=> ['url'=>'//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',],
                'paging'=>true,
                'buttons'   => [
                 /*   ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],*/
                    
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'codigoUnico',
            'tipo'=> new \Yajra\DataTables\Html\Column(['title'=>'TipoArticulo','data'=>'tipo.nombre','name'=>'tipo.nombre']),
           //'imagen',
            'marca'=> new \Yajra\DataTables\Html\Column(['title'=>'Marca','data'=>'marca.nombre','name'=>'marca.nombre']),
            'descripcion',
            'cantidad',
            'precioVenta',
            'stockMinimo',
            'stockMaximo'
            //'marca_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'articulos_datatable_' . time();
    }


}
