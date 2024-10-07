@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
        <div class="row justify-content-center">
        <div class="col-10 mt-5 pt-4 align-self-end">
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">Add Row</h4>
                  <a href="{{route('slider.create')}}" class="btn btn-primary btn-round ms-auto">
                    {{-- <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal"> --}}
                        <i class="fa fa-plus"></i>
                        Create New
                    {{-- </button> --}}
                </a>
                </div>
              </div>
              <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <h5 class="modal-title">
                          <span class="fw-mediumbold"> New</span>
                          <span class="fw-light"> Row </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="small">
                          Create a new row using this form, make sure you
                          fill them all
                        </p>
                        <form>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Name</label>
                                <input id="addName" type="text" class="form-control" placeholder="fill name">
                              </div>
                            </div>
                            <div class="col-md-6 pe-0">
                              <div class="form-group form-group-default">
                                <label>Position</label>
                                <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group form-group-default">
                                <label>Office</label>
                                <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" id="addRowButton" class="btn btn-primary">
                          Add
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          Close
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="add-row_length"><label>Show <select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="add-row_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                    <thead>
                      <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 249.613px;">Name</th><th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 363.612px;">Position</th><th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 204.275px;">Office</th><th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th></tr>
                    </thead>
                    <tfoot>
                      <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Action</th></tr>
                    </tfoot>
                    <tbody>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    <tr role="row" class="odd">
                        <td class="sorting_1">Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>
                          <div class="form-button-action">
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                              <i class="fa fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr><tr role="row" class="even">
                        <td class="sorting_1">Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>
                          <div class="form-button-action">
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                              <i class="fa fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr><tr role="row" class="odd">
                        <td class="sorting_1">Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>
                          <div class="form-button-action">
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                              <i class="fa fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr><tr role="row" class="even">
                        <td class="sorting_1">Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>
                          <div class="form-button-action">
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                              <i class="fa fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr><tr role="row" class="odd">
                        <td class="sorting_1">Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>
                          <div class="form-button-action">
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                              <i class="fa fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr></tbody>
                  </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">Showing 1 to 5 of 10 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="add-row_previous"><a href="#" aria-controls="add-row" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="add-row" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="add-row" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="add-row_next"><a href="#" aria-controls="add-row" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
   
@endsection