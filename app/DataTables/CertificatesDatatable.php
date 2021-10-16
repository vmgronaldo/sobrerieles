<?php

namespace App\DataTables;


use App\Certificates;
use Carbon\Carbon;
use Illuminate\Support\HtmlString;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CertificatesDatatable extends DataTable
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
            ->editColumn('model_id', function ($item){
                return new HtmlString('<span class="badge">'.$item->model->firstname.' '.$item->model->lastname.'</span>');
            })
            ->editColumn('course_id', function ($item){
                return new HtmlString('<span class="badge">'.$item->course->curso.'</span>');
            })
            ->editColumn('created_at', function ($item){
                return new HtmlString('<span class="badge">'.$item->created_at->diffForHumans().'</span>');
            })
            ->addColumn('action', function ($item) {
                $button ='
                          <a class="btn btn-primary" target="_blank" href="' . route('certificates.show', $item->id) . '">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>';
                return $button;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\CertificatesDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Certificates $model)
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
                    ->setTableId('certificatesdatatable-table')
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
            Column::make('id')->title('Codigo'),
            Column::make('model_id')->title('Participante'),
            Column::make('course_id')->title('Curso'),
            Column::make('date')->title('F.Creación'),
            Column::make('created_at')->title('Hace'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Certificates_' . date('YmdHis');
    }
}
