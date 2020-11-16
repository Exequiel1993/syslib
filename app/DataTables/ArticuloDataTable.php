<?php

namespace App\DataTables;

use App\Models\Articulo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Carbon;

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

        
        $start_date = $this->request()->get('start_date');
        $end_date = $this->request()->get('end_date');

        $query = $model->newQuery()->with(['tipo','marca']);

        if (!empty($start_date) || !empty($end_date)) {
            
            $sdate =  Carbon::parse($start_date);
            $edate =  Carbon::parse($end_date);

            $query = $query->whereBetween('created_at',[$sdate,$edate]);
            
        }else{
            //query = $query->select();
            //$query = $query->where('codigoUnico','=','ASDF123'); Ver mas tarde
        }

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('dataTableBuilder')      
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
                    
                    [   
                        'extend'    => 'pdf',
                        'className' => 'btn btn-default btn-sm no-corner',
                        
                    ],
                    /*
                    [   
                        'extend' => 'pdf',
                        'text' => 'PDF',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'customize'=> 'function (doc) {
                                            //Remove the title created by datatTables
                                            doc.content.splice(0,1);
                                            //Create a date string that we use in the footer. Format is dd-mm-yyyy
                                            var now = new Date();
                                            var jsDate = now.getDate()+"-"+(now.getMonth()+1)+"-"+now.getFullYear(); }', 
                    ],
                    */
                   /* 
                   /* ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'tipo'=> new \Yajra\DataTables\Html\Column
                        ([
                            'title'=>'TipoArticulo',
                            'data'=>'tipo.nombre',
                            'name'=>'tipo.nombre'
                        ]),
           //'imagen',
            'marca'=> new \Yajra\DataTables\Html\Column(['title'=>'Marca','data'=>'marca.nombre','name'=>'marca.nombre']),
            //'descripcion',
            'Stock'=> new \Yajra\DataTables\Html\Column(['title'=>'Stock','data'=>'cantidad','name'=>'cantidad']),
            'precioVenta'
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
