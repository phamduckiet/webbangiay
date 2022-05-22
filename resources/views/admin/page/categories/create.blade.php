@extends('admin.share.master')
@section('page-title')
<div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Create Category</h3>
      </div>
      <div class="col-6">
      </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <form method="post" action="{{Route('Category.post')}}">
        @csrf
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="form theme-form">
              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <label>Name Category</label>
                    <input class="form-control" name="name_category" type="text" data-bs-original-title="" title="">
                  </div>
                </div>
                <div class="col-6">
                    <label>Image Category</label>
                    <div class="input-group">
                        <input id="image" name="image_category" class="form-control">
                        <a data-input="image" data-preview="holder-icon" class="lfm btn btn-light">
                            Choose
                        </a>
                    </div>
                    <img id="holder-icon" class="img-thumbnail" style="width:333px; height:300px">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                <script>
                    $('.lfm').filemanager('image');
                </script>
                </div>
              </div>
            </div>
            <div class="row text-center">
                <div class="card-body">
                  <button class="btn btn-success" type="submit" data-bs-original-title="" title="">Create Category</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
  </div>
@endsection
