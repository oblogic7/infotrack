@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        <a href="{{ URL::route('clients.show', [$auth->client->id]) }}">{{ $auth->client->name }}</a>
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
                </div>
                <!-- /.box-header -->

                <div class="box-body">

                    <dl class="dl-horizontal">
                        <dt>User</dt>
                        <dd>{{ $auth->username }}</dd>
                        <dt>Password</dt>
                        <dd><input class="password unmask-pass" type="password" value="{{ $auth->password }}" readonly/></dd>
                        <dd>
                            <a class="btn btn-default btn-flat btn-sm" href="{{ $auth->url }}" target="_blank">Open Login Page</a>

                        </dd>
                    </dl>
                </div>

            </div>
        </div>

        <div class="col-sm-6">
            {{ $activityLogView }}
        </div>

    </div>
</section>

@stop
