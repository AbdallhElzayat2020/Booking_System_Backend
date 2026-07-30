<?php

namespace App\DataTables;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendingListingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('thumbnail_image', function ($listing) {
                return view('dashboard.listings.datatable.thumbnail_image', ['listing' => $listing]);
            })
            ->addColumn('Category', function ($listing) {
                return $listing->category->title;
            })
            ->addColumn('Location', function ($listing) {
                return $listing->location->title;
            })
            ->addColumn('Created_by', function ($listing) {
                return $listing->user->name;
            })
            ->addColumn('Approved', function ($listing) {
                return view('dashboard.listings.datatable.is_approved', ['listing' => $listing]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Listing $model): QueryBuilder
    {
        return $model->newQuery()
            ->pending()
            ->with([
                'category',
                'location',
                'user',
            ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pendinglisting-table')
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
            Column::make('thumbnail_image'),
            Column::make('title'),
            Column::make('Category'),
            Column::make('Location'),
            Column::make('Created_by'),
            Column::make('Approved'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PendingListing_' . date('YmdHis');
    }
}
