<?php

namespace App\DataTables;

use DB;
use App\Models\Product;
use App\Services\DataTablesDefaults;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $products = Product::select(
            "products.*",
            DB::raw("(
                SELECT stores.name
                FROM stores
                WHERE stores.id = products.store_id
            ) as store_name"),
            DB::raw("(
                SELECT product_infos.brand
                FROM product_infos
                WHERE product_infos.product_id = products.id
                LIMIT 1
            ) as product_info_brand"),
            DB::raw("(
                SELECT product_infos.model
                FROM product_infos
                WHERE product_infos.product_id = products.id
                LIMIT 1
            ) as product_info_model"),
            DB::raw("FORMAT((
                SELECT product_infos.price
                FROM product_infos
                WHERE product_infos.product_id = products.id
                LIMIT 1
            ), 2, 'de_DE') as product_info_price"),
        );

        $datatable = DataTables::of($products)
            ->filterColumn('store_name', function ($query, $keyword) {
                $query->whereRaw("(
                    SELECT stores.name
                    FROM stores
                    WHERE stores.id = products.store_id
                ) like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('product_info_brand', function ($query, $keyword) {
                $query->whereRaw("(
                    SELECT product_infos.brand
                    FROM product_infos
                    WHERE product_infos.product_id = products.id
                    LIMIT 1
                ) like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('product_info_model', function ($query, $keyword) {
                $query->whereRaw("(
                    SELECT product_infos.model
                    FROM product_infos
                    WHERE product_infos.product_id = products.id
                    LIMIT 1
                ) like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('product_info_price', function ($query, $keyword) {
                $query->whereRaw("FORMAT((
                    SELECT product_infos.price
                    FROM product_infos
                    WHERE product_infos.product_id = products.id
                    LIMIT 1
                ), 2, 'de_DE') like ?", ["%{$keyword}%"]);
            })
            ->addColumn("action", "admin.products.datatables_actions")
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
            "store_name" => [
                "name" => "store_name",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.store_id")
            ],
            "name" => [
                "name" => "name",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.name")
            ],
            "product_info_brand" => [
                "name" => "product_info_brand",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.brand")
            ],
            "product_info_model" => [
                "name" => "product_info_model",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.model")
            ],
            "product_info_price" => [
                "name" => "product_info_price",
                "render" => "(data!=null)? ((data.length>180)? data.substr(0,180)+'...' : data) : '-'",
                "title" => \Lang::get("attributes.price")
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
        return 'products_datatable_' . time();
    }
}
