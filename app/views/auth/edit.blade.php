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
        <div class="col-xs-12">
            @include('_partials.messages')
        </div>
    </div>


    <div class="row">

        <form role="form" class="form-horizontal" action="{{ URL::route('credentials.update', $auth->id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Website Name</label>

                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="{{ $auth->name }}" autofocus>
                                    <span class="help-block">Enter the name of the website or service for which this login is used.  Do not enter the client name as it will be automatically appended when necessary.</span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="label">Login Page</label>

                                <div class="col-md-5">
                                    <input id="url" name="url" type="url" placeholder="" class="form-control input-md" value="{{ $auth->url }}">
                                    <span class="help-block">Enter the url of the login page where these credentials can be used.</span>
                                </div>
                            </div>
                            <hr/>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="label">Username</label>

                                <div class="col-md-5">
                                    <input id="username" name="username" type="text" placeholder="" class="form-control input-md" value="{{ $auth->username }}">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>

                                <div class="col-md-5">
                                    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" value="{{ $auth->password }}">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password_confirm">Confirm Password</label>

                                <div class="col-md-5">
                                    <input id="password_confirm" name="password_confirm" type="password" placeholder="" class="form-control input-md" value="{{ $auth->password }}">
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="clients">Clients</label>

                                <div class="col-md-5">
                                    <select name="clients[]" id="clients" multiple="" class="chosen" data-placeholder="Select a client...">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" @if ($auth->forClients->contains($client->id)) selected @endif>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">If these credentials are used to access client information, select those clients here.</span>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="roles">Permissions</label>

                                <div class="col-md-5">

                                    <select multiple="" name="roles[]" class="chosen form-control input-md" data-placeholder="Select a role...">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if ($auth->roles->contains($role->id)) selected @endif>{{ $role->name }}</option>
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
                            <a class="btn btn-default" href="{{ URL::route('credentials.index') }}">Cancel</a>
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
