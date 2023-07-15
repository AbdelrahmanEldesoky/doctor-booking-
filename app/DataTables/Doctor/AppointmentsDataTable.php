<?php

namespace App\DataTables\Doctor;

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
    protected $type;

    public function __construct()
    {
        $this->date = session('date');
        $this->type = session('type');
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
            ->editColumn('patient.name', function ($query) {
                return $query->patient->name;
            })
            ->editColumn('patient.email', function ($query) {
                return $query->patient->email;
            })
            ->editColumn('schedule.day', function ($query) {
                return $query->schedule->date;
            })
            ->editColumn('action', function ($query) {
                return view('doctor.appointments.action',get_defined_vars());
            })->rawColumns(['action','patient.name','patient.email','schedule.date']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = Appointment::query()->with(['doctor','patient','schedule'])->where('doctor_id',Auth::user()->id);
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
        if(session('type'))
        {
            $type = session('type');
            $model =$model->whereHas('schedule',function($query) use($type){
               return $query->where('schedule_type',$type);
            });
        }
       $modal =  $model->get();
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
            ['data' => 'patient.name', 'name' => 'patient.name', 'title' => 'Patient', 'orderable' => false,'exportable' => true],
            ['data' => 'patient.email', 'name' => 'patient.email', 'title' => 'Email', 'orderable' => false],
            ['data' => 'schedule.day', 'name' => 'schedule.day', 'title' => 'Day', 'orderable' => false],
            ['data' => 'from', 'name' => 'from', 'title' => 'Date', 'orderable' => false],
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->searchable(false)
            ->width(60)
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
