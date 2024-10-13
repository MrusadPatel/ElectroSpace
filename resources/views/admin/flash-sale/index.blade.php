@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-1 align-self-end">
          <div class="page-header mb-2 mt-1">
            <h4 class="page-title">Flash Sale</h4>
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
                <a href="#">Manage Website</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Flash Sale</a>
            </li>
            </ul>
        </div>

        <div class="card mb-2">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Flash Sale End Date</h4>
              </div>
            </div>
            <div class="card-body p-1">
                <form action="{{route('flash-sale.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group form-inline row">
                        <label for="inlineinput" class="col-md-3 col-form-label">Sale End Date</label>
                        <div class="col-md-3 p-0">
                        <input type="date" class="form-control input-full " id="inlineinput" name="sale_end_date" value="{{$flashSale->end_date}}"  placeholder="Enter Input">
                        </div>
                        <button class="btn btn-success col-md-1 ms-5" type="submit">Save</button>
                    </div>
                </form>
            </div>
          </div>

          <div class="card  mb-2">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Add Flash Sale Products</h4>
              </div>
            </div>
            <div class="card-body p-1">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                 @endif
                <form action="{{route('flash-sale.add-product')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-3 col-form-label">Add Products</label>
                                <div class="col-md-12 p-0">
                                    <select class="form-select" id="searchableSelect" name="product" style="width: 100%;">
                                        <option value="">Choose an option</option>
                                        @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group form-inline col-md-12 ">
                                <label for="defaultSelect" class="col-md-3 col-form-label">Show At Home</label>
                                <select class="form-select form-control" id="defaultSelect" name="show_at_home">
                                  <option value="">Select</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-inline col-md-12 ">
                                <label for="defaultSelect" class="col-md-3 col-form-label">Status</label>
                                <select class="form-select form-control" id="defaultSelect" name="status">
                                  <option value="">Select</option>
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success col-md-1 ms-5 mb-2" type="submit">Save</button>
                </form>
            </div>
          </div>

            <div class="card ">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">All Flash Sale Products</h4>
                </div>
              </div>
              <div class="card-body">
                
                {{$dataTable->table()}}
                
              </div>
            </div>
          </div>
        </div>
    </section>
   
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

  <script>
    $(document).ready(function() {
        $('#searchableSelect').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: 'Choose an option',
            allowClear: true
        });
    });
</script>
@endpush