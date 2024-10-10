@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-4 align-self-end">
          <div class="page-header">
            <h4 class="page-title">Child Category</h4>
            <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Manage Category</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Child Category</a>
            </li>
            </ul>
        </div>
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title text-body-secondary">Create Child Categories</h4>
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
                    
                <form action="{{route('child-category.store')}}" method="POST" >
                     @csrf
                
                     <div class="form-group form-inline col-md-9 ">
                        <label for="defaultSelect" class="col-md-3 col-form-label">Category</label>
                        <select class="form-select form-control main-category" id="defaultSelect" name="category">
                          <option value="">Select</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group form-inline col-md-9 ">
                      <label for="defaultSelect" class="col-md-3 col-form-label ">Sub Category</label>
                      <select class="form-select form-control sub-category" id="defaultSelect" name="sub_category">
                        <option value="">Select</option>
                        
                      </select>
                  </div>

                <div class="form-group form-inline">
                    <label class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9 p-0">
                    <input type="text" class="form-control input-full" name="name" value="{{old('name')}}" placeholder="Enter Input">
                    </div>
                </div>
                
                <div class="form-group form-inline col-md-9 ">
                    <label for="defaultSelect" class="col-md-3 col-form-label">Status</label>
                    <select class="form-select form-control" id="defaultSelect" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                      
                    </select>
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
              url: "{{url('redirect/admin/get-subcategories')}}",
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

  })
</script>

@endpush