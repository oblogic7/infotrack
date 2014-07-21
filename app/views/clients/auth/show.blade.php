@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        <a href="{{ URL::route('clients.show', [$client->id]) }}">{{ $client->name }}</a>
        <small>Authentication Details for {{ $auth->name }}</small>
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
                    @if (Access::userAuthorized($auth->roles->lists('name')) )
                        <a class="btn btn-default btn-xs pull-right" href="{{ URL::route('clients.auth.edit', [$client->id, $auth->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                    @endif
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    @if(Access::userAuthorized($auth->roles->lists('name')) )
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
        </div>

        <div class="col-sm-6">
            {{ $activityLogView }}
        </div>

    </div>
</section>

@stop
