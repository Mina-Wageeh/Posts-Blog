@extends('layouts.site')

@section('content')
    <div class="form-container d-flex flex-column justify-content-center align-items-center">
        <form id="client-form" method="post" enctype="multipart/form-data" class="create-form col-4 align-middle">
            @csrf
            <div class="mb-3">
                <h3 class="text-center">Create User</h3>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-control" name="name" type="text">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input id="age" class="form-control" name="age" type="text">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input id="photo" class="form-control" name="photo" type="file">
            </div>

            <a id="form-button" class="btn btn-dark col-12">Submit</a>
            <div class="alert alert-success create-form-alert text-center col-12 align-self-center m-0" role="alert">
                Client Added Successfully
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click' , '#form-button' , function (e){
                e.preventDefault()
                var formData = new FormData($('#client-form')[0])
                $.ajax({
                    type: 'post',
                    enctype : 'multipart/form-data',
                    url: '{{route('user.store')}}',
                    data: formData,
                    processData : false,
                    contentType : false,
                    cache : false,
                    success : function(data)
                    {
                        $( ".create-form-alert" ).slideDown(1000).delay(2000).slideUp(1000);
                    }
                })
            })
        });
    </script>
@endsection
