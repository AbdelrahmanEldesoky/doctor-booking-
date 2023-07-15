<?php

namespace App\DataTables\Doctor;

use App\Models\DoctorClinic;
use App\Models\Schedule;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class ClinicDataTable extends DataTable
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
            ->editColumn('city', function ($query) {
                return $query->myCity ? $query->myCity->name : '-';
            })
            ->filterColumn('city', function($query, $keyword) {
                return $query->orWhereHas('myCity', function($q) use($keyword) {
                    $q->where('name_en', 'like', "%{$keyword}%");
                });
            })
            ->editColumn('area', function ($query) {
                return $query->myArea ? $query->myArea->name : '-';
            })
            ->filterColumn('area', function($query, $keyword) {
                return $query->orWhereHas('myArea', function($q) use($keyword) {
                    $q->where('name_en', 'like', "%{$keyword}%");
                });
            })

            ->addColumn('_', function($query){
                return  '<div class="d-flex">
                <a href="'.route('doctor.clinics.destroy',$query->id).'"
                         class=" delete-btn btn btn-danger mr-1">
                          <i class="fa fa-trash" class="mr-50"></i>
                      </a>
                      <a href="'.route('doctor.clinics.create',$query->id).'"
                         class=" btn btn-primary ">
                          <i class="fa fa-edit" class="mr-50"></i>
                      </a>
                      </div>';
            })
            ->rawColumns(['_','city','area']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = DoctorClinic::query()->where('is_show',1)->where('doctor_id',Auth::user()->id);

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
            ['data' => 'name_en', 'name' => 'name_en', 'title' => trans('site.name_en'), 'orderable' => false],
            ['data' => 'name_ar', 'name' => 'name_ar', 'title' => trans('site.name_arabic'), 'orderable' => false],
            ['data' => 'city', 'name' => 'city', 'title' =>  trans('site.CITY'), 'orderable' => false],
            ['data' => 'area', 'name' => 'area', 'title' =>  trans('site.AREA'), 'orderable' => false],
            Column::computed(trans('_'))
            ->exportable(false)
            ->printable(false)
            ->searchable(false)
            ->width(60)
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
