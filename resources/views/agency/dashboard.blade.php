@extends('agency.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('agency.all-applications') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Applications</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalApplications }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('agency.new-arrival-application') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>New Arrival Applications</h4>
                            </div>
                            <div class="card-body">
                                {{ $newArrivalAppilcations }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('agency.delivered-application') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Delivered Applications</h4>
                            </div>
                            <div class="card-body">
                             {{ $deliveredApplications }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('agency.in-pay-process-application') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>In Pay Process Applications</h4>
                            </div>
                            <div class="card-body">
                                {{  $inPayProcessApplications }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('agency.refused-application') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Refused Applications</h4>
                            </div>
                            <div class="card-body">
                             {{ $refusedApplications }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('agency.completed-application') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Completed Applications</h4>
                            </div>
                            <div class="card-body">
                              {{  $completedApplications }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Applications</h4>
                        </div>
                        <div class="card-body">
                            <form id="filter-form" class="form-inline mb-3" action="{{ route('excel.all-application') }}">
                                <div class="form-group mr-2">              
                                    <input type="date" id="start_date" class="form-control datepicker" name="start_date">
                                </div>
                                <div class="form-group mr-2">                             
                                    <input type="date" id="end_date" class="form-control datepicker" name="end_date">
                                </div>
                                <button type="button" class="btn btn-primary" id="filter-button">Filter</button>
                                <button type="button" class="btn btn-secondary ml-1" id="clear-button">Clear</button>
                                <button type="submit" class="btn btn-success ml-2">Download Via Excel</button>
                            </form>
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        document.getElementById('filter-button').addEventListener('click', function () {
            let startDate = document.getElementById('start_date').value;
            let endDate = document.getElementById('end_date').value;
            
            window.LaravelDataTables["application-table"].ajax.url(
                window.LaravelDataTables["application-table"].ajax.url().split('?')[0] + 
                '?start_date=' + startDate + '&end_date=' + endDate
            ).load();
        });

        document.getElementById('clear-button').addEventListener('click',function(){
            document.getElementById('start_date').value = '';
            document.getElementById('end_date').value = '';

            window.LaravelDataTables["application-table"].ajax.url(
                window.LaravelDataTables["application-table"].ajax.url().split('?')[0]
            ).load();
        })
    </script>
@endpush