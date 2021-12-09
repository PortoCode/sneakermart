<?php

namespace App\DataTables;

use DB;
use App\Models\Store;
use App\Services\DataTablesDefaults;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Services\DataTable;

class StoreDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $stores = Store::select(
            "stores.*",
            DB::raw("(
                    SELECT users.name
                    FROM users
                    WHERE users.id = stores.seller_id
                ) as seller_name"),
            DB::raw("CONCAT(stores.address, ', Nº ',
                    CONCAT(stores.address_number, ' - ',
                        CONCAT(stores.neighborhood, ' - ',
                            CONCAT(stores.city, '/',
                                CONCAT(stores.state, ' (',
                                    CONCAT(stores.zipcode, ')')
                                )
                            )
                        )
                    )
                ) as full_address"),
        );

        $datatable = DataTables::of($stores)
            ->filterColumn('seller_name', function ($query, $keyword) {
                $query->whereRaw("(
                                    SELECT users.name
                                    FROM users
                                    WHERE users.id = stores.seller_id
                                ) like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('full_address', function ($query, $keyword) {
                $query->whereRaw("CONCAT(stores.address, ', Nº ',
                                    CONCAT(stores.address_number, ' - ',
                                        CONCAT(stores.neighborhood, ' - ',
                                            CONCAT(stores.city, '/',
                                                CONCAT(stores.state, ' (',
                                                    CONCAT(stores.zipcode, ')')
                                                )
                                            )
                                        )
                                    )
                                ) like ?", ["%{$keyword}%"]);
            })
            ->addColumn("action", "admin.stores.datatables_actions")
            ->rawColumns(["action", "name"]);

        return $datatable;
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
            "seller_name" => [
                "name" => "seller_name",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.seller_id")
            ],
            "name" => [
                "name" => "name",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.name")
            ],
            "full_address" => [
                "name" => "full_address",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.full_address")
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stores_datatable_' . time();
    }
}
