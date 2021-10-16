<?php

namespace App\DataTables;

use App\Categories;
use Carbon\Carbon;
use Illuminate\Support\HtmlString;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoriesDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($item){
                return new HtmlString('<span class="badge">'.Carbon::parse($item->created_at)->format('Y-m-d').'</span>');
            })
            ->editColumn('status',function ($item){
                if ($item->status == "1"){
                    return new HtmlString('<span class="badge badge-success">Habilitado</span>');
                }else{
                    return  new HtmlString('<span class="badge badge-danger">Desabilitado</span>');
                }
            })
            ->addColumn('action', function ($item) {
                $button ='
                          <a class="btn btn-primary" href="' . route('categories.show', $item->id) . '">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>';
                return $button;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\CategoriesDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Categories $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('categoriesdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'responsive' => true,
                'paging' => true,
                'searching' => true,
                'info' => true,
                'searchDelay' => 150,
                'language' => [
                    'url' => url('json/spanish.json')
                ],
            ])
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create')->text('<i class="fa fa-plus"></i> Crear'),
                Button::make('excel')->text('<i class="fa fa-file-excel-o"></i> Exportar'),
                Button::make('print')->text('<i class="fa fa-print"></i> Imprimir'),
                Button::make('reload')->text('<i class="fa fa-reload"></i> Refrescar'),
                Button::make('reset')->text('<i class="fa fa-undo"></i> Resetear')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')->title('Acción'),
            Column::make('id'),
            Column::make('name')->title('Nombre'),
            Column::make('status')->title('Estado'),
            Column::make('created_at')->title('F.Creación'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Categories_' . date('YmdHis');
    }
}
