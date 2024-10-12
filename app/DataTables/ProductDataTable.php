<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $editBtn = "<a href='".route('product.edit',$query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<form action='".route('product.destroy',$query->id)."' method='POST' style='display:inline;'>
                            ".csrf_field()."
                            ".method_field('DELETE')."
                            <button type='submit' class='btn btn-danger ms-2 delete-item'>
                                <i class='far fa-trash-alt'></i>
                            </button>
                          </form>";
            $imageBtn = "<a href='".route('product-image-gallery.index',['product' => $query->id])."' class='btn btn-success ms-1'><i class='bi bi-images'></i></a>";

            return $editBtn.$deleteBtn.$imageBtn;
        })
        ->addColumn('image', function($query){
            return "<img width='90px' src='".asset($query->thumb_image)."' ></img>";
        })
        ->addColumn('product_type', function($query){
            switch ($query->product_type) {
                case 'new_arrival':
                    return '<i class="badge badge-success">New Arrival</i>';
                    break;
                case 'featured':
                    return '<i class="badge badge-warning">Featured Product</i>';
                    break;
                case 'top_product':
                    return '<i class="badge badge-info">Top Product</i>';
                    break;

                case 'best_product':
                    return '<i class="badge badge-danger">Top Product</i>';
                    break;

                default:
                    return '<i class="badge badge-dark">None</i>';
                    break;
            }
        })
        ->addColumn('status', function($query){
            $active = "<i class='badge badge-info' >Active</i>";
                $inactive = "<i class='badge badge-danger' >Inactive</i>";
                if($query->status==1)
                {
                    return $active;
                }
                else{
                    return $inactive;
                }
        })
        ->rawColumns(['image', 'product_type', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('id')->width(10),
            Column::make('image')->width(90),
            Column::make('name')->width(150),
            Column::make('price')->width(50),
            Column::make('product_type')->width(10),
            Column::make('status')->width(50),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(180)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
