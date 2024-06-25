<?php

namespace App\DataTables;

use App\Models\Kematian;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\RowColumnInformation;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KematianDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('tanggal_kematian', function($kematian){
                return date('d/m/Y', strtotime($kematian->tanggal_kematian));
            })
            ->addColumn('action', function($kematian){
                return '
                
                <form action="'.route('kematian.destroy', $kematian->id).'" method="POST" class="d-inline">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa-solid fa-trash-can"></i> Delete</button>
                </form>

                ';
            })
            ->setRowId('DT_RowIndex');

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Kematian $model): QueryBuilder
    {
        return $model->newQuery();
        
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder 
    {
        return $this->builder()
                    ->setTableId('kematian-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->addTableClass('table table-bordered table-hover')
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
                    
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No'),
            Column::make('warga')->title('Nama Warga'),
            Column::make('jenis_kematian')->title('Sebab Kematian'),
            Column::make('tempat')->title('Tempat Kematian'),
            Column::make('tanggal_kematian')->title('Tanggal Kematian'),
            Column::make('jenis_kelamin')->title('jenis Kelamin'),
            Column::make('rt')->title('RT'),
            Column::make('rw')->title('RW'),
            Column::make('keterangan')->title('Keteranan Laopran ke Kelurahan'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(200)
                    ->addClass('text-center'), 
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Kematian_' . date('YmdHis');
    }
}
