<?php

namespace App\DataTables\Admin;

use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;


class RevenueDataTable extends DataTable
{

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
            ->editColumn('online', function ($query) {
                
                if(session('from_date'))
                {
                    
         return Appointment::where('doctor_id',$query->id)->where('type','online')->whereDate('from','>=',session('from_date'))->whereDate('from','<=',session('to_date'))->count();
                  
                }
                return $query->doctorAppointments ? $query->doctorAppointments->where('type','online')->count() : 0;
            })
            ->editColumn('offline', function ($query) {
                
                   if(session('from_date'))
                {
        return Appointment::where('doctor_id',$query->id)->where('type','ofline')->whereDate('from','>=',session('from_date'))->whereDate('from','<=',session('to_date'))->count();

                }
                return $query->doctorAppointments ? $query->doctorAppointments->where('type','ofline')->count() : 0;
            })
             ->editColumn('gross', function ($query) {
                 if(session('from_date') && $query->reports)
                {
                    return $query->reports()->whereHas('appointment',function($q){
                     $q->whereDate('from','>=',session('from_date'))->whereDate('from','<=',session('to_date'));
                     })->sum('paid_amount');
                }
                return $query->reports ? $query->reports->sum('paid_amount') : 0;
            })
            ->editColumn('net', function ($query) {
                $reports =  $query->reports;
                   if(session('from_date') && $query->reports)
                {
                    $reports =  $query->reports()->whereHas('appointment',function($q){
                     $q->whereDate('from','>=',session('from_date'))->whereDate('from','<=',session('to_date'));
                     })->get();
                }
               return view('admin.setting.revenue', get_defined_vars());
            })
            ->rawColumns(['online','offline','gross','net']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = User::query()->where('role','doctor')->with(['reports','doctorAppointments']);
    
        // if($this->date)
        // {
        //     $date = Carbon::parse($this->date);
        //     $model =$model->whereHas('patient',function($query) use($date){
        //       return $query->whereDate('date',$date);
        //     });
        // }
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
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'orderable' => false,'exportable' => true],
            ['data' => 'online', 'name' => 'online', 'title' => 'Online Appointments', 'orderable' => false,'searchable' => false],
            ['data' => 'offline', 'name' => 'offline', 'title' => 'Offline Appointments', 'orderable' => false,'searchable' => false],
            ['data' => 'gross', 'name' => 'gross', 'title' => 'Gross Revenue', 'orderable' => false,'searchable' => false],
            ['data' => 'net', 'name' => 'net', 'title' => 'Net Revenue', 'orderable' => false,'searchable' => false],
            // Column::computed('action')
            // ->exportable(false)
            // ->printable(false)
            // ->searchable(false)
            // ->width(60)
            // ->addClass('text-center hide-search'),
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
