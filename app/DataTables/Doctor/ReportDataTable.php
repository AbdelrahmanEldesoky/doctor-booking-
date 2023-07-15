<?php

namespace App\DataTables\Doctor;

use App\Models\Hospital;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Speciality;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReportDataTable extends DataTable
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
            ->editColumn('schedule.date', function ($query) {
                return $query->schedule->date;
            })
            ->filterColumn('schedule.date', function($query, $keyword) {
                return $query->orWhereHas('schedule', function($q) use($keyword) {
                    $q->where('date', 'like', "%{$keyword}%");
                });
            })
            ->editColumn('schedule.interval', function ($query) {
                return $query->schedule->interval;
            })
            ->filterColumn('schedule.interval', function($query, $keyword) {
                return $query->orWhereHas('schedule', function($q) use($keyword) {
                    $q->where('interval', 'like', "%{$keyword}%");
                });
            })
            ->editColumn('schedule.from', function ($query) {
                return $query->schedule->from;
            })
            ->filterColumn('schedule.from', function($query, $keyword) {
                return $query->orWhereHas('schedule', function($q) use($keyword) {
                    $q->where('from', 'like', "%{$keyword}%");
                });
            })
            ->editColumn('schedule.to', function ($query) {
                return $query->schedule->to;
            })
            ->filterColumn('schedule.to', function($query, $keyword) {
                return $query->orWhereHas('schedule', function($q) use($keyword) {
                    $q->where('to', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['rating','schedule.date','schedule.interval','schedule.from','schedule.to']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = Report::query()->where('doctor_id',Auth::user()->id);
        if($this->date)
        {
            list($start,$end) = getRangeDate($this->date);
            $model = $model->whereHas('schedule',function($q) use($start,$end){
                     $q->whereDate('date','>=',$start)->whereDate('date','<=',$end);
                     });
           
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
                    'excel', 'csv', 'pdf',
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
            ['data' => 'schedule.date', 'name' => 'schedule.date', 'title' => 'Session', 'orderable' => false],
            ['data' => 'schedule.from', 'name' => 'schedule.from', 'title' => 'From', 'orderable' => false],
            ['data' => 'schedule.to', 'name' => 'schedule.to', 'title' => 'To', 'orderable' => false],
            ['data' => 'schedule.interval', 'name' => 'schedule.interval', 'title' => 'Duration', 'orderable' => false],
            ['data' => 'session_amount', 'name' => 'session_amount', 'title' => 'Session Price', 'orderable' => false],
            ['data' => 'paid_amount', 'name' => 'paid_amount', 'title' => 'Paid Price', 'orderable' => false],
        ];
    }

   /**
    * Get filename for export.
    *
    * @return string
    */
   protected function filename()
   {
       return 'Report' . date('YmdHis');
   }

    // public function excel()
    // {
    //     // TODO: Implement excel() method.
    // }

    // public function csv()
    // {
    //     // TODO: Implement csv() method.
    // }

    // public function pdf()
    // {
    //     // TODO: Implement pdf() method.
    // }
}
