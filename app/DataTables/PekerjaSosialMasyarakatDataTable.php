<?php

namespace App\DataTables;

use App\Models\PekerjaSosialMasyarakat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PekerjaSosialMasyarakatDataTable extends DataTable
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
        ->addColumn('tanggal_lahir', function ($pekerjaSosialMasyarakat) {
            return date('d/m/Y', strtotime($pekerjaSosialMasyarakat->tanggal_lahir));
        })
        ->addColumn('action', function ($pekerjaSosialMasyarakat) {
            return '
                <a href="' . route('pekerja-sosial-masyarakat.edit', $pekerjaSosialMasyarakat->id) . '" class="btn btn-sm btn-warning text-white px-3"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                
                <form action="' . route('pekerja-sosial-masyarakat.destroy', $pekerjaSosialMasyarakat->id) . '" method="POST" class="d-inline">
                ' . csrf_field() . '
                ' . method_field('delete') . '
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                </form>
            ';
        })
        ->rawColumns(['action', 'tanggal_lahir'])
        ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PekerjaSosialMasyarakat $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pekerjasosialmasyarakat-table')
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
        return 'PekerjaSosialMasyarakat_' . date('YmdHis');
    }
}
