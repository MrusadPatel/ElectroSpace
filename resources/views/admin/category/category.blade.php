@extends('admin.layouts.master')
@section('main-content')
        
<div class="container">
    <div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Category</h4>
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
            <a href="#">Category</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Add Category</a>
        </li>
        </ul>
    </div>
    <div class="page-category">

        <!-- Begin Page Content -->
        <div class="container">
         <div class="row justify-content-center"> 
            <div class="col-4 ">  
                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <p class="h3">Add Category</p>
                    <div class="mb-3">
                    <label for="categoryName" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="categoryName" aria-describedby="emailHelp">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
         </div>
        </div>
        <!-- End Page Content -->


    </div>
    </div>
</div>

@endsection