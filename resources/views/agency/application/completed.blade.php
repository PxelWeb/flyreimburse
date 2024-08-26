@extends('agency.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Application</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Completed Applications</h4>
                        </div>
                        <div class="card-body">
                            <form id="filter-form" class="form-inline mb-3" action="{{ route('excel.completed') }}">
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
            
            window.LaravelDataTables["completed-table"].ajax.url(
                window.LaravelDataTables["completed-table"].ajax.url().split('?')[0] + 
                '?start_date=' + startDate + '&end_date=' + endDate
            ).load();
        });

        document.getElementById('clear-button').addEventListener('click',function(){
            document.getElementById('start_date').value = '';
            document.getElementById('end_date').value = '';

            window.LaravelDataTables["completed-table"].ajax.url(
                window.LaravelDataTables["completed-table"].ajax.url().split('?')[0]
            ).load();
        })
    </script>
@endpush
