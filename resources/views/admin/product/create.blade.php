@extends('admin.layouts.master')
@section('main-content')


<section class="pt-5 ">
    <div class="row justify-content-center">
    <div class="col-12 mt-5 pt-4 align-self-end">
        <div class="card ms-4 me-3">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Create Product</h4>
            </div>  
          </div>
          <div class="card-body">
           
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif
           <form action="{{route('product.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label>Thumb Image</label>
                    <div>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9 p-0">
                    <input type="text" class="form-control input-full" name="name" value="{{old('name')}}" placeholder="Enter Input">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-inline col-md-92 ">
                            <label for="defaultSelect" class="col-md-3 col-form-label">Category Id</label>
                            <select class="form-select form-control main-category" id="defaultSelect" name="category">
                              <option value="">Select</option>
                              @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-inline col-md-92 ">
                            <label for="defaultSelect" class="col-md-3 col-form-label ">Sub Category Id</label>
                            <select class="form-select form-control sub-category" id="defaultSelect" name="sub_category">
                              <option value="">Select</option>
                              
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-inline col-md-92 ">
                            <label for="defaultSelect" class="col-md-3 col-form-label">Child Category Id</label>
                            <select class="form-select form-control child-category" id="defaultSelect" name="child_category">
                              <option value="">Select</option>
                              
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-inline col-md-12 ">
                            <label for="defaultSelect" class="col-md-3 col-form-label">Brand</label>
                            <select class="form-select form-control" id="defaultSelect" name="brand">
                              <option value="">Select</option>
                              @foreach($brands as $brand)
                              <option value="{{$brand->id}}">{{$brand->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-3 col-form-label">SKU</label>
                            <div class="col-md-12 p-0">
                            <input type="text" class="form-control input-full" id="inlineinput" value="{{old('sku')}}"  name="sku" placeholder="Enter Input">
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-3 col-form-label">Price</label>
                            <div class="col-md-12 p-0">
                            <input type="text" class="form-control input-full" id="inlineinput" name="price" value="{{old('price')}}"  placeholder="Enter Input">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-3 col-form-label">Offer Price</label>
                            <div class="col-md-12 p-0">
                            <input type="text" class="form-control input-full" id="inlineinput" name="offer_price" value="{{old('offer_price')}}"  placeholder="Enter Input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-3 col-form-label">Offer Start Date</label>
                            <div class="col-md-9 p-0">
                            <input type="date" class="form-control input-full" id="inlineinput" name="offer_start_date" value="{{old('offer_start_date')}}"  placeholder="Enter Input">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-3 col-form-label">Offer End Date</label>
                            <div class="col-md-9 p-0">
                            <input type="date" class="form-control input-full" id="inlineinput" name="offer_end_date" value="{{old('offer_end_date')}}"  placeholder="Enter Input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label">Short Description</label>
                    <div class="col-md-12 p-0">
                        <textarea class="form-control" id="exampleFormControlTextarea1"  name="short_description" value="{{old('short_description')}}"   rows="1    "></textarea>
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label">Long Description</label>
                    <div class="col-md-12 p-0">
                        <textarea class="form-control summernote" id="exampleFormControlTextarea1"  name="long_description" value="{{old('long_description')}}"   rows="5"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-inline ">
                            <label for="inlineinput" class="col-md-3 col-form-label">Stock Quantity</label>
                            <div class="col-md-12 p-0">
                            <input type="number" class="form-control input-full" min="0" id="inlineinput" name="qty" value="{{old('qty')}}"  placeholder="Enter Input">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-inline col-md-12 ">
                            <label for="defaultSelect" class="col-md-3 col-form-label">Product Type</label>
                            <select class="form-select form-control" id="defaultSelect" name="product_type">
                              <option value="">Select</option>
                              <option value="new_arrival">New Arrival</option>
                              <option value="featured">Featured</option>
                              <option value="top_product">Top Product</option>
                              <option value="best_product">Best Product</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-inline col-md-12 ">
                            <label for="defaultSelect" class="col-md-3 col-form-label">Status</label>
                            <select class="form-select form-control" id="defaultSelect" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                

                <button class="btn btn-success" type="submit">Create</button>

            </form>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
  $(document).ready(function(){
      $('body').on('change', '.main-category', function(e){
          let id = $(this).val();
          $.ajax({
              method: 'GET',
              url: "{{url('redirect/admin/product/get-subcategories')}}",
              data: {
                  id:id
              },
              success: function(data){
                  $('.sub-category').html('<option value="">Select</option>')

                  $.each(data, function(i, item){
                      $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                  })
              },
              error: function(xhr, status, error){
                  console.log(error);
              }
          })
      })

    //   get all child category
      $('body').on('change', '.sub-category', function(e){
          let id = $(this).val();
          $.ajax({
              method: 'GET',
              url: "{{url('redirect/admin/product/get-childcategories')}}",
              data: {
                  id:id
              },
              success: function(data){
                  $('.child-category').html('<option value="">Select</option>')

                  $.each(data, function(i, item){
                      $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
                  })
              },
              error: function(xhr, status, error){
                  console.log(error);
              }
          })
      })

    //   getting summernote for textarea
      $('.summernote').summernote({
        height:100
      });

  })
</script>

@endpush