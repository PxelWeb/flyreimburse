@extends('admin.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Email Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                        <div class="card border">
                                            <div class="card-body">
                                                <form id="email-config-form" action="{{route('admin.email-config.update')}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{@$emailSettings->email}}">
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <label>Mail Host</label>
                                                        <input type="text" class="form-control" name="host" value="{{@$emailSettings->host}}">
                                                    </div>
                                    
                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Smtp username</label>
                                                                <input type="text" class="form-control" name="username" value="{{@$emailSettings->username}}">
                                                            </div>
                                                        </div>
                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Smtp password</label>
                                                                <input type="text" class="form-control" name="password" value="{{@$emailSettings->password}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Mail port</label>
                                                                <input type="text" class="form-control" name="port" value="{{@$emailSettings->port}}">
                                                            </div>
                                                        </div>
                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Mail Encryption</label>
                                                                <select name="encryption" id="" class="form-control">
                                                                    <option {{@$emailSettings->encryption == 'tls' ? 'selected' : ''}} value="tls">TLS</option>
                                                                    <option {{@$emailSettings->encryption == 'ssl' ? 'selected' : ''}} value="ssl">SSL</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <button type="submit" class="btn btn-primary email-update">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
<script>
        $(document).ready(function (){

            $('#email-config-form').on('submit',function (event){
            event.preventDefault();
            let form = this;
            Swal.fire({
                title: "Are you sure?",
                text: "Do you have right credentials for the email?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
        })
    </script>
@endpush




