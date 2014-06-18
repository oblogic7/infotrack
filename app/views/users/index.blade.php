@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        User Management
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>

                                <td>
                                    <div class="form-group">
                                        <select class="form-control">
                                            @foreach($roles as $role)
                                            <option value="">None</option>
                                                @if ($user->role && $user->role->id == $role->id)
                                                    <option selected>{{ $role->name }}</option>
                                                @else
                                                    <option>{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop