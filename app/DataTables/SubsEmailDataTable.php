<?php

namespace App\DataTables;

use App\Models\SubsEmail;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SubsEmailDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'subs_emails.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SubsEmail $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubsEmail $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                // 'dom'       => 'Bfrtip',
                'dom'       => 'fBrtlip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',]
                    
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    // protected function getColumns()
    // {
    //     return [
    //         'group_email_id',
    //         'email',
    //         'active',
    //         'comment',
    //         'subs'
    //     ];
    // }

    protected function getColumns()
    {
        return [
        [
            'data' => 'group_email_id',
            'name' => 'group_email_id',
            'title' => 'Группа'
        ],
        [
            'data' => 'email',
            'name' => 'email',
            'title' => 'Email'
        ],
        [
            'data' => 'active',
            'name' => 'active',
            'title' => 'Активна'
        ],
        [
            'data' => 'comment',
            'name' => 'comment',
            'title' => 'Комментарий'
        ],

        [
            'data' => 'subs',
            'name' => 'subs',
            'title' => 'Подписан'
        ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'subs_emailsdatatable_' . time();
    }
}
