<?php

namespace App\DataTables;

use App\Models\AhliWarise;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AhliWariseDataTable extends DataTable
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
            ->addColumn('tanggal', function($ahliwarise){
                return date('d/m/Y', strtotime($ahliwarise->tanggal));
            })
            ->addColumn('action', function($ahliwarise){
                return '
                <a href="'.route('ahli-waris.edit', $ahliwarise->id).'" class="btn btn-sm btn-warning text-white px-3"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                <form action="'.route('ahli-waris.destroy', $ahliwarise->id).'" method="POST" style="display: inline">
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
    public function query(AhliWarise $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('ahliwarise-table')
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
            Column::make('tanggal')->title('TANGGAL PELAPORAN'),
            Column::make('nik')->title('NIK'),
            Column::make('nama_meninggal')->title('NAMA ALMARHUM'),
            Column::make('nik_pemohon')->title('NIK PEMOHON'),
            Column::make('nama_pemohon')->title('NAMA PEMOHON'),
            Column::make('alamat_pemohon')->title('ALAMAT PEMOHON'),
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
        return 'AhliWarise_' . date('YmdHis');
    }
}
