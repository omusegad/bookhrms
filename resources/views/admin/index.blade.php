@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Admin</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row mb-3">
                    <div class="col-lg-4">
                        <input type="text" id="myInput" class="form-control"  placeholder="Search for names ......">
                    </div>
               </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-right no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php ($count = 1)
                              @foreach($users as $user)
                                <tr>
                                <td>{{$count++}}</td>
                                    <td>
                                        {{$user->fname }} {{$user->lName }}
                                    </td>

                                    <td>{{$user->email }}</td>

                                    <td>
                                       @foreach ($user->roles as $item)
                                                {{  $item->name }},
                                       @endforeach
                                    </td>
                                    <td class="text-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> </a>
                                    </td>
                                </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Delete Employee Modal -->
            <div class="modal custom-modal fade" id="edit_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Edit Role</h3>
                                <p>Are you sure want to Edit?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                       Edit role
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Employee Modal -->

        </div>
        <!-- /Page Wrapper -->
@endsection
