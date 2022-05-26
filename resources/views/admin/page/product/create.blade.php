@extends('admin.share.master')
@section('page-title')
<div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Create Product</h3>
      </div>
      <div class="col-6">
      </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <form method="post" action="{{Route('product.post')}}">
        @csrf
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="form theme-form">
              <div class="row">
                <div class="col-3">
                  <div class="mb-3">
                    <label>Name Product</label>
                    <input class="form-control" name="name_product" type="text" data-bs-original-title="" title="">
                  </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label>Category</label>
                        <select class="form-select" name="category_id">
                            <option selected="" disabled="" value="">Choose</option>
                            @foreach ($category as $value )
                            <option value="{{$value->id}}">{{$value->name_category}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-2">
                      <label>Price Product</label>
                      <input class="form-control" name="price" type="number" min="1000" data-bs-original-title="" title="">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label>Qty Product</label>
                      <input class="form-control" name="qty" type="number" min="1" data-bs-original-title="" title="">
                    </div>
                  </div>
                <div class="col-3">
                    <label>Image Product</label>
                    <div class="input-group">
                        <input id="image" name="image_product" class="form-control">
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
                  <button class="btn btn-success" type="submit" data-bs-original-title="" title="">Create Product</button>
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
