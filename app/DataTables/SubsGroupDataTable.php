<?php

namespace App\DataTables;

use App\Models\SubsGroup;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SubsGroupDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'subs_groups.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SubsGroup $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubsGroup $model)
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
                'dom'       => 'fBrtlip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    //['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',]
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        // return [
        //     'active',
        //     'name',
        //     'comment'
        // ];

        return [

        [
            'data' => 'name',
            'name' => 'name',
            'title' => 'Наименование'
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
        return 'subs_groupsdatatable_' . time();
    }
}
