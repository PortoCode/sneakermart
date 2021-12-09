<?php

namespace App\DataTables;

use App\Models\User;
use App\Services\DataTablesDefaults;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->addAction(['width' => '100px', 'printable' => false, "title" => \Lang::get("datatables.action")])
            ->parameters(DataTablesDefaults::getParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            "id" => [
                "name" => "id",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.id")
            ],
            "name" => [
                "name" => "name",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.name")
            ],
            "email" => [
                "name" => "email",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.email")
            ],
            "phone_number" => [
                "name" => "phone_number",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.phone_number")
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
        return 'users_datatable_' . time();
    }
}
