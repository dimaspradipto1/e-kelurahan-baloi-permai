<?php

namespace App\DataTables;

use App\Models\Pindah;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PindahDataTable extends DataTable
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

            ->addColumn('kelurahan', function($pindah){
                return $pindah->kelurahan;
            })

            ->addColumn('kecamatan', function($pindah){
                return $pindah->kecamatan;
            })

           ->addColumn('tanggal_pindah', function($pindah){
                return date('d/m/Y', strtotime($pindah->tanggal_pindah));
            })

            ->addColumn('action', function($pindah){
                return '
                
                <form class="d-inline" action="'.route('pindah.destroy', $pindah->id).'" method="POST">
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
    public function query(Pindah $model): QueryBuilder
    {
        return $model->newQuery()->with(['warga', 'kelurahan']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pindah-table')
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
            Column::make('nik')->title('NIK'),
            Column::make('warga')->title('Nama Warga'),
            Column::make('alamat_asal')->title('Alamat Asal'),
            Column::make('rt')->title('ASAL RT'),
            Column::make('rw')->title('ASAL RW'),
            Column::make('alamat_tujuan')->title('Alamat Tujuan'),
            Column::make('kelurahan')->title('Kelurahan'),
            Column::make('kecamatan')->title('Kecamatan'),
            Column::make('tanggal_pindah')->title('Tanggal Pindah'),
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
        return 'Pindah_' . date('YmdHis');
    }
}
