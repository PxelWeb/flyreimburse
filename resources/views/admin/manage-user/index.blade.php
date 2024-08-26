@extends('admin.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User List</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.manage-user.create')}}" class="btn btn-primary">+ Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
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
        $(document).ready(function (){

            $('body').on('click','.delete-item',function (event){
            event.preventDefault();

            let deleteUrl = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {


                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,

                        success: function (data){
                           if (data.status == 'success'){
                               Swal.fire(
                                   'Deleted!',
                                   data.message
                               )
                               window.location.reload();
                           }else if(data.status == 'error'){
                               Swal.fire(
                                   "Can't Delete",
                                   data.message,
                                   'error'
                           )
                           }
                        },
                        error : function (xhr,status,error){
                            console.log(error)
                        }
                    })
                }
            });
        })


            $('body').on('click','.change-status',function (){
                let isChecked = $(this).is(':checked')
                let id = $(this).data('id')

                $.ajax({
                    url: '{{route('admin.manage-user.update-status')}}',
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success:function (data){
                        toastr.success(data.message)
                    },
                    error:function (xhr,status,error){
                        console.log(error)
                    }


                })
            })
        })
    </script>
@endpush
