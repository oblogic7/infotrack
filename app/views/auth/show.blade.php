@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        Younger Associates
        <small>{{ $auth->name }}</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-success">

                <div class="box-header">
                    <i class="fa fa-lock"></i>

                    <h3 class="box-title">Authentication Details</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    @if( Access::userAuthorized($auth->roles->lists('name')) )
                        <dl class="dl-horizontal">
                            <dt>User</dt>
                            <dd>{{ $auth->username }}</dd>
                            <dt>Password</dt>
                            <dd><input class="password unmask-pass" type="password" value="{{ $auth->password }}" readonly/></dd>
                            <dd>
                                <a class="btn btn-default btn-flat btn-sm" href="{{ $auth->url }}" target="_blank">Open Login Page</a>

                            </dd>
                        </dl>

                    @else

                        <div class="alert alert-danger">
                            You do not have permission to view this login information.
                        </div>

                    @endif
                </div>

            </div>

            @if ($auth->forClients->count() > 0)
                <div class="box box-error">

                    <div class="box-header">
                        <i class="fa fa-briefcase"></i>

                        <h3 class="box-title">Clients</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="help-block">The clients listed below use this login to access the associated service.</div>
                        <ul class="list-unstyled">

                            @foreach($auth->forClients as $client)
                                <li>{{ $client->name }}</li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            @endif
        </div>

        <div class="col-sm-6">
            {{ $activityLogView }}
        </div>



    </div>
</section>

@stop
