<?php

namespace App\DataTables;

use App\Models\Jalanan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JalananDataTable extends DataTable
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
            ->addCOlumn('tanggal_lahir', function($jalanan){
                return date('d/m/Y', strtotime($jalanan->tanggal_lahir));
            })
            ->addColumn('action', function($jalanan){
                return '
                <a href="'.route('jalanan.edit', $jalanan->id).'" class="btn btn-sm btn-warning text-white px-3"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                <form action="'.route('jalanan.destroy', $jalanan->id).'" method="POST" style="display: inline">
                  '.csrf_field().'
                  '.method_field('DELETE').'
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                </form>
                ';
            })
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Jalanan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('jalanan-table')
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
            Column::make('nama')->title('Nama'),
            Column::make('nik')->title('NIK'),
            Column::make('kk')->title('KK'),
            Column::make('jenis_kelamin')->title('Jenis Kelamin'),
            Column::make('tempat_lahir')->title('Tempat Lahir'),
            Column::make('tanggal_lahir')->title('Tanggal Lahir'),
            Column::make('agama')->title('Agama'),
            Column::make('alamat')->title('Alamat'),
            Column::make('rt')->title('RT'),
            Column::make('rw')->title('RW'),
            Column::make('no_hp')->title('No HP'),
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
        return 'Jalanan_' . date('YmdHis');
    }
}