<div class="post-container empty-post-body" style="margin-bottom: 30px">
    <div class="post-header d-flex justify-content-between align-items-center">
        <div class="post-id col-4 d-flex justify-content-start">
            <h6 class="fw-bold">ID : <span class="post_id_text"></span></h6>
        </div>
        <div class="post-actions col-4 d-flex justify-content-end">
            <a class="btn edit-btn" href="">Edit</a>
            <a post_id="" class="btn delete-btn">Delete</a>
        </div>
    </div>

    <hr>

    <div class="bg-transparent border-dark text-center post-description"></div>

    <hr>

    <div class="comment-container">
        <form id="comment-form" method="post" class="d-flex justify-content-between">
            @csrf
            <div class="comment-input-cont col-10">
                <input id="comment-input" class="form-control comment-input" name="comment" type="text" placeholder="Add Your Comment">
            </div>
            <div class="comment-button-cont col-2 d-flex justify-content-end">
                <a class="btn btn-success comment-button col-10">Comment</a>
            </div>
        </form>
        <div class="comments-main-container">
            <div class="cloned-comments">
            </div>
        </div>
    </div>

</div>

