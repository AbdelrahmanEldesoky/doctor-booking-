<?php

namespace App\DataTables\Doctor;

use App\Models\User;
use App\Models\Schedule;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class ScheduleDataTable extends DataTable
{
    protected $date;

    public function __construct()
    {
        $this->date = session('date');
    }
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
            ->editColumn('date', function ($query) {
                return  trans('site.'.$query->date) ;
            })
            ->editColumn('interval', function ($query) {
                return $query->interval_type == 'interval' ? $query->interval : 'Full Time' ;
            })
            ->editColumn('clinic', function ($query) {
                return $query->clinic ? $query->clinic->name : '-' ;
            })
            ->filterColumn('clinic', function($query, $keyword) {
                return $query->orWhereHas('clinic', function($q) use($keyword) {
                    $q->where('name_en', 'like', "%{$keyword}%");
                });
            })
            ->addColumn('_', function($query){
                return  '<div class="d-flex">
                <a href="'.route('doctor.schedules.destroy',$query->id).'"
                     class=" delete-btn btn btn-danger mr-1">
                     <i class="fa fa-trash" class="mr-50"></i>
                    </a> 
                      <a href="'.route('doctor.schedules.edit',$query->id).'"
                         class=" btn btn-primary edit_schedule">
                          <i class="fa fa-edit" class="mr-50"></i>
                      </a>
                      </div>';
            })
            ->rawColumns(['_','users.doctor_appointments_count']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = Schedule::query()->where('is_show',1)->where('user_id',Auth::user()->id)->latest('created_at');
        if($this->date)
        {
            list($start,$end) = getRangeDate($this->date);
            $model = $model->whereDate('date','>=',$start)->whereDate('date','<=',$end);
        }
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
            ['data' => 'date', 'name' => 'date', 'title' => trans('site.Day'), 'orderable' => false],
            ['data' => 'from', 'name' => 'from', 'title' => trans('site.from'), 'orderable' => false],
            ['data' => 'to', 'name' => 'to', 'title' => trans('site.to'), 'orderable' => false],
            ['data' => 'interval', 'name' => 'interval', 'title' => trans('site.Interval'), 'orderable' => false],
            ['data' => 'status', 'name' => 'status', 'title' => trans('site.Status'), 'orderable' => false],
            ['data' => 'clinic', 'name' => 'clinic', 'title' => trans('site.clinic'), 'orderable' => false],
            // ['data' => 'session_price', 'name' => 'session_price', 'title' => 'Egyption Price', 'orderable' => false],
            // ['data' => 'session_price_outside', 'name' => 'session_price_outside', 'title' => 'Outsider Price', 'orderable' => false],
            // ['data' => 'patients', 'name' => 'patients', 'title' => 'Appointments', 'orderable' => false],
            Column::computed('_')
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
