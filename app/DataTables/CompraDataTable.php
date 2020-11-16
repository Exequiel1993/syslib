<?php

namespace App\DataTables;

use App\Models\Compra;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CompraDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'compras.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Compra $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Compra $model)
    {
        return $model->newQuery()->with(['proveedor']);
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
                'ordering'=>false,
                //'stateSave' => true,
                //'order'     => [[0, 'desc']],
                'language'=> ['url'=>'//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',],
                'paging'=>true,
                'buttons'   => [
               /*     ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'fecha' => new \Yajra\DataTables\Html\Column(['title'=>'Fecha','data'=>'created_at','name'=>'created_at']),
            'proveedor' => new \Yajra\DataTables\Html\Column(['title'=>'Proveedor','data'=>'proveedor.nombre','name'=>'proveedor.nombre']),
            //'articulo_id',
            'comprobante' => new \Yajra\DataTables\Html\Column(['title'=>'N° Comprobante','data'=>'numeroComprobante','name'=>'numeroComprobante']),
            'total',
            //'articulo' => new \Yajra\DataTables\Html\Column(['title'=>'Articulo','data'=>'articulo.codigoUnico','name'=>'articulo.codigoUnico']),
            
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'compras_datatable_' . time();
    }
}
