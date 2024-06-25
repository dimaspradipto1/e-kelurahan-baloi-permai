<?php

namespace App\DataTables;

use App\Models\Pendatang;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendatangDataTable extends DataTable
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
            ->addColumn('tanggal_datang', function($pendatang){
                return date('d/m/Y', strtotime($pendatang->tanggal_datang));
            })
            
            ->addColumn('action', function($pendatang){
                return '
                <a href="'.route('pendatang.edit', $pendatang->id).'" class="btn btn-sm btn-warning text-white px-3"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                
                <form class="d-inline" action="'.route('pendatang.destroy', $pendatang->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
                ';
            })
            ->rawColumns(['action', 'tanggal_datang'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pendatang $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pendatang-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
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
            Column::make('nik')->title('NIK'),
            Column::make('warga')->title('Nama Warga'),
            Column::make('alamat_asal')->title('Alamat Asal'),
            Column::make('kelurahan')->title('Kelurahan'),
            Column::make('kecamatan')->title('Kecamatan'),
            Column::make('alamat_tujuan')->title('Alamat Tujuan'),
            Column::make('rt')->title('TUJUAN RT'),
            Column::make('rw')->title('TUJUAN RW'),
            Column::make('tanggal_datang')->title('Tanggal Datang'),
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
        return 'Pendatang_' . date('YmdHis');
    }
}
