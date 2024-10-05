<div class="form-container d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="form-container-title">
            <h3 class="text-center">Add New Post</h3>
        </div>
        <form id="post-form" method="post" enctype="multipart/form-data" class="create-form col-12 align-middle">
        @csrf
            <div class="mb-3">
                <textarea id="description" class="form-control add-textarea" name="description" type="text" placeholder="Write Your Post Here"></textarea>
            </div>

            <div class="mb-3">
                <input id="images" class="form-control file-upload" name="images[]" type="file" multiple>
            </div>
            <a id="form-button" class="btn btn-dark col-12">Submit</a>
            <div class="alert alert-success create-form-alert text-center col-12 align-self-center mb-0"  style="margin-top: 30px" role="alert">
                Post Added Successfully
            </div>
        </form>
    </div>
</div>

@section('style')
    <style>
    </style>
@endsection
