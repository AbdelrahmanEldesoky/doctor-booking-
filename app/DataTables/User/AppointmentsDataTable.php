<?php

namespace App\DataTables\User;

use App\Models\Appointment;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;


class AppointmentsDataTable extends DataTable
{
    protected $date;
    protected $status;

    public function __construct()
    {
        $this->date = session('date');
        $this->status = session('status');
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
            ->editColumn('doctor.name', function ($query) {
                return $query->doctor ? $query->doctor->name :'';
            })
            ->editColumn('doctor.email', function ($query) {
                return $query->email ? $query->doctor->email :'';
            })
            ->editColumn('schedule.day', function ($query) {
                return $query->schedule ? $query->schedule->date : '';
            })
            ->editColumn('join_url', function ($query) {
                return view('user.appointments.join',get_defined_vars());
            })
            ->editColumn('action', function ($query) {
                return '<div class="d-flex">
                <a href="'.route('user.appointments.show',$query->id).'" style="margin-right:10px" class="btn btn-primary h-100 mr-2 user_show_appointment"><i class="fa fa-eye"></i></a>
                </div>';
            })->rawColumns(['action','join_url','patient.name','patient.email','schedule.date']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = Appointment::query()->with(['doctor','hospital','patient','schedule'])->where('patient_id',Auth::user()->id);
        if(session('status'))
        {
            $model =$model->where('status',session('status'));
        }
        if(session('date'))
        {
            $date = Carbon::parse(session('date'));
            $model =$model->whereHas('patient',function($query) use($date){
               return $query->whereDate('date',$date);
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
            ['data' => 'doctor.name', 'name' => 'doctor.name', 'title' => 'Doctor', 'orderable' => false,'exportable' => true],
            ['data' => 'join_url', 'name' => 'join_url', 'title' => 'Join Url', 'orderable' => false,'exportable' => true],
            ['data' => 'schedule.day', 'name' => 'schedule.day', 'title' => 'Day', 'orderable' => false],
            ['data' => 'from', 'name' => 'from', 'title' => 'Date', 'orderable' => false],
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->searchable(false)
            ->width(250)
            ->addClass('text-center hide-search'),
        ];
    }

   /**
    * Get filename for export.
    *
    * @return string
    */
   protected function filename()
   {
       return 'Appointments' . date('YmdHis');
   }

    // public function excel()
    // {
    //     dd($this->request->columns);
    // }

    // public function csv()
    // {
    //     // TODO: Implement csv() method.
    // }

    // public function pdf()
    // {
    //     dd(123);
    // }
}
