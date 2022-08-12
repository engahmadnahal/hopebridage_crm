<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;

class UserDataTable extends DataTables
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    // public function dataTable($query)
    // {
    //     $dataTable = new EloquentDataTable($query);

    //     return $dataTable->addColumn('action', 'user.action');
    // }

    // /**
    //  * Get query source of dataTable.
    //  *
    //  * @param \App\User $model
    //  * @return \Illuminate\Database\Eloquent\Builder
    //  */
    // public function query(User $model)
    // {
    //     return $model->newQuery()->select($this->getColumns());
    // }

    // /**
    //  * Optional method if you want to use html builder.
    //  *
    //  * @return \Yajra\DataTables\Html\Builder
    //  */
    // public function html()
    // {
    //     return $this->builder()
    //                 ->columns($this->getColumns())
    //                 ->minifiedAjax()
    //                 ->addAction(['width' => '80px'])
    //                 ->parameters([
    //                     'dom'     => 'Bfrtip',
    //                     'order'   => [[0, 'desc']],
    //                     'buttons' => [
    //                         'create',
    //                         'export',
    //                         'print',
    //                         'reset',
    //                         'reload',
    //                     ],
    //                 ]);
    // }

    // /**
    //  * Get columns.
    //  *
    //  * @return array
    //  */
    // protected function getColumns()
    // {
    //     return [
    //         'id',
    //         'add your columns',
    //         'created_at',
    //         'updated_at'
    //     ];
    // }

    // /**
    //  * Get filename for export.
    //  *
    //  * @return string
    //  */
    // protected function filename()
    // {
    //     return 'user_' . time();
    // }
}
