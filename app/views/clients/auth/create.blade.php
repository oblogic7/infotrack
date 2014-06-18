@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        {{ $client->name }}
        <small>New Credentials</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            @include('_partials.messages')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-info">
                <i class="fa fa-2x fa-exclamation"> </i>
                This form is used to create login credentials that are specific to <strong>{{ $client->name }}</strong>. If these credentials are also used to access or manage data or services for any another client, it should be entered as a Younger Associates account and <strong>{{ $client->name }}</strong> should be specified as a client on that entry.
            </div>
        </div>
    </div>


    <div class="row">

        <form role="form" class="form-horizontal" action="{{ URL::route('clients.auth.store', [$client->id]) }}" method="POST">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Website Name</label>

                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="{{ Input::old('name') }}" autofocus>
                                    <span class="help-block">Enter the name of the website or service for which this login is used.  Do not enter the client name as it will be automatically appended when necessary.</span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="label">Login Page</label>

                                <div class="col-md-5">
                                    <input id="url" name="url" type="url" placeholder="" class="form-control input-md" value="{{ Input::old('url') }}">
                                    <span class="help-block">Enter the url of the login page where these credentials can be used.</span>
                                </div>
                            </div>
                            <hr/>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="label">Username</label>

                                <div class="col-md-5">
                                    <input id="username" name="username" type="text" placeholder="" class="form-control input-md" value="{{ Input::old('username') }}">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>

                                <div class="col-md-5">
                                    <input id="password" name="password" type="password" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password_confirm">Confirm Password</label>

                                <div class="col-md-5">
                                    <input id="password_confirm" name="password_confirm" type="password" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="roles">Permissions</label>

                                <div class="col-md-5">

                                    <select multiple="" name="roles[]" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">Select the groups that should have access to this login information.  Leave blank for no restriction.</span>
                                </div>
                            </div>


                        </fieldset>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer clearfix">
                        <!-- Button -->
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ URL::route('clients.show', [ $client->id ]) }}">Cancel</a>
                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-success"
                                   value="Save">
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

@stop
