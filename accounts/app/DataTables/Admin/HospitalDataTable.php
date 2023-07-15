<?php

namespace App\DataTables\Admin;

use App\Models\Hospital;
use App\Models\User;
use App\Models\Speciality;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HospitalDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     * @throws \Yajra\DataTables\Exceptions\Exception
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($query) {
                return date('Y/m/d', strtotime($query->created_at));
            })
            ->addColumn('action', function ($query){
                return '<div> <a class="btn btn-primary" href="'.route('admin.hospitals.edit',$query->id).'" data-name="'.$query->name.'"><i class="fa fa-eye"></i></a>
                          <a href="'.route('admin.hospitals.destroy',$query->id).'"
                                   class=" delete-btn btn btn-danger">
                                    <i class="fa fa-trash" class="mr-50 text-danger"></i>
                                </a>
                                <a class="btn btn-primary" href="'.route('admin.hospitals.appointments',$query->id).'" >Appointments</a>
                                </div>';
            })->rawColumns(['action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = User::query()->where('role','hospital')->where('is_show',1);
        return $this->applyScopes($model);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row align-items-center"<"col-md-2" l><"col-md-6" B><"col-md-4"f>><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">')
            ->parameters([
                "buttons" => [
                ],
                "processing" => true,
                "autoWidth" => false,
                'initComplete' => "function () {
                            $('.dt-buttons').addClass('btn-group btn-group-sm')
                            this.api().columns().every(function (colIndex) {
                                var column = this;
                                var input = document.createElement(\"input\");
                                input.className = \"form-control form-control-sm h-3\";
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? val : '', false, false, true).draw();
                                });

                                $('#dataTable thead').append($('#dataTable tfoot tr'));
                            });


                        }",
                'drawCallback' => "function () {
                        }"
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'id','width' => 50],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'orderable' => false],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email', 'orderable' => false],
            // ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Submission Date'],
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->addClass('text-center hide-search'),
        ];
    }

//    /**
//     * Get filename for export.
//     *
//     * @return string
//     */
//    protected function filename()
//    {
//        return 'Categories_' . date('YmdHis');
//    }

    public function excel()
    {
        // TODO: Implement excel() method.
    }

    public function csv()
    {
        // TODO: Implement csv() method.
    }

    public function pdf()
    {
        // TODO: Implement pdf() method.
    }
}
