<?php

namespace App\DataTables\Admin;

use Carbon\Carbon;
use App\Models\Completed;
use App\Models\Application;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CompletedDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action',function($query){
                $viewBtn ="<a href=".route('admin.application-details',$query->id)." class='btn btn-primary mr-2'><i class='fas fa-eye'></i></i></i></a>";
                return $viewBtn;
            })->addColumn('case_number',function($query){
                return '#'.$query->id;
            })
            ->addColumn('full_name',function($query){
                return explode(',',$query->username)[0];
            })
            ->addColumn('delay',function($query){

                //FlightDelayed
                if($query->reason == 'flight_delayed' && $query->delay == 1){
                    return '<i class="badge badge-success">Delayed > 3Hours</i>';
                }elseif($query->reason == 'flight_delayed' && $query->delay == 0){
                    return '<i class="badge badge-danger">Delayed < 3Hours</i>';

                    //FlightCancelled
                }elseif($query->reason == 'flight_cancelled' && $query->delay == 1){
                    return '<i class="badge badge-success">Cancelled < 14Dite</i>';
                }elseif($query->reason == 'flight_cancelled' && $query->delay == 0){
                    return '<i class="badge badge-danger"> Cancelled > 14Dite</i>'; 
                }

                //DeniedBoarding
                elseif($query->reason == 'denied_boarding' && $query->delay == 1){
                    return '<i class="badge badge-success">Denied > 3Hours</i>';
                }elseif($query->reason == 'denied_boarding' && $query->delay == 0){
                    return '<i class="badge badge-danger">Denied < 3Hours</i>';
                }

                //ScheduleChange
                elseif($query->reason == 'schedule_change' && $query->delay == 1){
                    return '<i class="badge badge-success">Change > 14Days</i>';
                }elseif($query->reason == 'schedule_change' && $query->delay == 0){
                    return '<i class="badge badge-danger">Change < 14Days</i>'; 
                }

                //TransitLoss
                elseif($query->reason =='transit_loss' && $query->delay == 1){
                    return '<i class="badge badge-success">TransitLoss > 3Hours</i>';
                }elseif($query->reason == 'transit_loss' && $query->delay == 0){
                    return '<i class="badge badge-danger">TransitLoss < 3Hours</i>';
                }

                //FlightDiverted
                elseif($query->reason == 'flight_diverted' && $query->delay == 1){
                    return '<i class="badge badge-success">Diverted > 3Hours</i>';
                }elseif($query->reason == 'flight_divered' && $query->delay == 0){
                    return '<i class="badge badge-danger">Diverted < 3Hours</i>';
                }
            })  
            ->addColumn('status',function($query){
                switch ($query->status){
                    case 'new_arrival';
                    return '<i class="badge badge-primary">New Arrival</i>';
                    break;
                    case 'delivered';
                        return '<i class="badge badge-warning">Delivered</i>';
                        break;
                    case 'in_pay_process';
                        return '<i class="badge badge-info">Pay Process</i>';
                        break;
                    case 'refused';
                        return '<i class="badge badge-danger">Refused</i>';
                        break;
                    case 'completed';
                        return '<i class="badge badge-success">Completed</i>';
                        break;
                    default:
                        return '<i class="badge badge-dark">None</i>';
                }
            })
            ->rawColumns(['action','delay','status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Application $model): QueryBuilder
    {
        $query =  $model->where('status','completed')->where(function($model){
            $model->where('user_id','!=',Auth::user()->id)
            ->orWhereNull('user_id');
        })->newQuery();

        if($this->request()->has('start_date') && $this->request()->has('end_date')){
            $startDate = Carbon::createFromFormat('Y-m-d',$this->request()->get('start_date'))->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d',$this->request()->get('end_date'))->endOfDay();

            if($startDate && $endDate){
                $query->whereBetween('created_at',[$startDate,$endDate]);
            }
        }
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('completed-table')
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
            Column::make('case_number')->width(30)->name('id'),
            Column::make('flight_number')->width(30),
            Column::make('booking_number')->width(30),
            Column::make('full_name')->name('username'),
            Column::make('from'),
            Column::make('to'),
            Column::make('date'),
            Column::make('airline'),
            Column::make('delay')->name('reason'),
            Column::make('status'),
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
        return 'Completed_' . date('YmdHis');
    }
}
