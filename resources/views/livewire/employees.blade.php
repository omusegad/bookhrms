<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table table-condensed table-bordered" id="employeesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th class="text-right no-sort">Action</th>
                    </tr>
                </thead>
                <tbody>
             @php ($count = 1)
              @foreach($users as $user)
                <tr>
                    <td>{{$count++ }}</td>
                    <td>{{$user->employeeID }}</td>
                    <td>
                        <h2 class="table-avatar">
                            <a href="{{ route('employees.edit',$user->id)}}">{{$user->fName }} {{$user->lName }}<span>Dep: </span></a>
                        </h2>
                    </td>
                    <td>{{$user->email }}</td>
                    <td>{{$user->fName }}</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('employees.edit',$user->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            </div>
                        </div>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
