<?php

namespace App\DataTables;

use App\Models\KetuaRtRW;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KetuaRtRWDataTable extends DataTable
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
            ->addcolumn('DT_RowIndex', '')
            ->addColumn('nama', function($ketuartrw){
                return $ketuartrw->nama;
            })
            ->addColumn('tanggal_lahir', function($ketuartrw){
                return date('d/m/Y', strtotime($ketuartrw->tanggal_lahir));
            })
            ->addColumn('tmt_awal', function($ketuartrw){
                return date('d/m/Y', strtotime($ketuartrw->tmt_awal));
            })

            ->addColumn('action', function($ketuartrw){
                return '
                    <a href="'. route('ketua-rt-rw.edit', $ketuartrw->id) .'" class="btn btn-sm btn-warning text-white px-3 mb-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                    <form action="'. route('ketua-rt-rw.destroy', $ketuartrw->id) .'" method="POST" style="display: inline">
                        '. method_field('DELETE') . csrf_field() .'
                        <button type="submit" class="btn btn-sm btn-danger mb-2" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                    </form>

                ';
            })
            
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KetuaRtRW $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('ketuartrw-table')
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
            Column::make('nama')->title('NAMA'),
            Column::make('tempat_lahir')->title('TEMPAT LAHIR'),
            Column::make('tanggal_lahir')->title('TANGGAL LAHIR'),
            Column::make('rw')->title('RW'),
            Column::make('rt')->title('RT'),
            Column::make('no_sk')->title('NO SK'),
            Column::make('tmt_awal')->title('TMT AWAL'),
            Column::make('alamat')->title('ALAMAT'),
            Column::make('pekerjaan')->title('PEKERJAAN'),
            Column::make('no_hp')->title('NO HP'),
            Column::make('nik')->title('NIK'),
            Column::make('npwp')->title('NPWP'),
            Column::make('keterangan')->title('KETERANGAN'),
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
        return 'KetuaRtRW_' . date('YmdHis');
    }
}
