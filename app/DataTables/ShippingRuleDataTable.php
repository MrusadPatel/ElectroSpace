<?php

namespace App\DataTables;

use App\Models\ShippingRule;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippingRuleDataTable extends DataTable
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
            $editBtn = "<a href='".route('shipping-rule.edit',$query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<form action='".route('shipping-rule.destroy',$query->id)."' method='POST' style='display:inline;'>
                        ".csrf_field()."
                        ".method_field('DELETE')."
                        <button type='submit' class='btn btn-danger ms-2 delete-item'>
                            <i class='far fa-trash-alt'></i>
                        </button>
                      </form>";

            return $editBtn.$deleteBtn;
         })
        ->addColumn('status',function($query)
        {
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
        ->addColumn('type', function($query){
            if($query->type === 'min_cost'){
                return '<i class="badge badge-primary">Minimum Order Amount</i>';
            }else {
                return '<i class="badge badge-success">Flate Amount</i>';
            }
        })
        ->addColumn('min_cost', function($query){
            if($query->type === 'min_cost'){
                return 'Rs. '.$query->min_cost;
            }else {
                return 'Rs. 0';
            }
        })
        ->addColumn('cost', function($query){
            return 'Rs. '.$query->cost;
        })
        ->rawColumns(['action','status','type'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ShippingRule $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('shippingrule-table')
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
            Column::make('id'),
            Column::make('name'),
            Column::make('type'),
            Column::make('min_cost'),
            Column::make('cost'),
            Column::make('status'),
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
        return 'ShippingRule_' . date('YmdHis');
    }
}
