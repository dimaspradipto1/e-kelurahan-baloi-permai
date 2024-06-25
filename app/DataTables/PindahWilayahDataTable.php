<?php

namespace App\DataTables;

use App\Models\PindahWilayah;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PindahWilayahDataTable extends DataTable
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
            ->addColumn('warga', function($pindah){
                return $pindah->warga;
            })
            ->addColumn('tanggal_pindah', function($pindah){
                return date('d/m/Y', strtotime($pindah->tanggal_pindah));
            })
            ->addColumn('action', function($pindah){
                return '
                <a href="'.route('pindah_wilayah.edit', $pindah->id).'" class="btn btn-sm btn-warning text-white px-3"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                <form class="d-inline" action="'.route('pindah_wilayah.destroy', $pindah->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
                ';
            })
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PindahWilayah $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pindahwilayah-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
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
            Column::make('nik')->title('NIK WARGA'),
            Column::make('alamat_asal')->title('ALAMAT ASAL'),
            Column::make('rt')->title('RT ASAL'),
            Column::make('rw')->title('RW ASAL'),
            Column::make('rt_tujuan')->title('RT TUJUAN'),
            Column::make('rw_tujuan')->title('RW TUJUAN'),
            Column::make('alamat_tujuan')->title('ALAMAT TUJUAN'),
            Column::make('tanggal_pindah')->title('TANGGAL PINDAH'),
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
        return 'PindahWilayah_' . date('YmdHis');
    }
}
