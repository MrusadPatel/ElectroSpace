<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
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
            $editBtn = "<a href='".route('brand.edit',$query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<form action='".route('brand.destroy',$query->id)."' method='POST' style='display:inline;'>
                        ".csrf_field()."
                        ".method_field('DELETE')."
                        <button type='submit' class='btn btn-danger ms-2 delete-item'>
                            <i class='far fa-trash-alt'></i>
                        </button>
                      </form>";

            return $editBtn.$deleteBtn;
         })
        ->addColumn('logo',function($query){
            return $img= "<img width='100px' height='60px' src='".asset($query->logo)."'></img>";
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
        ->addColumn('is_featured',function($query)
        {
            $active = "<i class='badge badge-info' >Yes</i>";
            $inactive = "<i class='badge badge-danger' >No</i>";
            if($query->status==1)
            {
                return $active;
            }
            else{
                return $inactive;
            }
        })
        ->rawColumns(['logo','action','status','is_featured'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('brand-table')
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
            
            Column::make('id')->width('10px'),
            Column::make('logo')->width('100px'),
            Column::make('name')->width('200px'),
            Column::make('is_featured')->width('50px'),
            Column::make('status')->width('50px'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brand_' . date('YmdHis');
    }
}
