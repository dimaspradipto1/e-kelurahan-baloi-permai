<?php

namespace App\DataTables;

use App\Models\SuratKeterangan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuratKeteranganDataTable extends DataTable
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
            ->addColumn('tanggal_surat', function($suratKeterangan){
                return date('d/m/Y', strtotime($suratKeterangan->tanggal_surat));
            })
            ->addColumn('action', function($suratKeterangan){
                return '
                <a href="'.route('surat-keterangan.edit', $suratKeterangan->id).'" class="btn btn-warning btn-sm text-white px-3"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                <form action="'.route('surat-keterangan.destroy', $suratKeterangan->id).'" method="POST" style="display: inline">
                  '.csrf_field().'
                  '.method_field('DELETE').'
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                </form>
                
                ';
            })
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SuratKeterangan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('suratketerangan-table')
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
            Column::make('nomor_surat')->title('Nomor Surat'),
            Column::make('tanggal_surat')->title('Tanggal Surat'),
            Column::make('nama_pemohon')->title('Nama Pemohon'),
            Column::make('alamat_pemohon')->title('Alamat Pemohon'),
            Column::make('keperluan')->title('Keperluan'), 
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
        return 'SuratKeterangan_' . date('YmdHis');
    }
}
