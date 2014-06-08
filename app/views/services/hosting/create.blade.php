@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        {{ $client->name }} <small>New Web Hosting Service</small>
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

        <form role="form" class="form-horizontal" action="{{ URL::route('clients.services.store', [$client->id, 'type' => 'hosting']) }}" method="POST">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="domain">Domain Name</label>

                                <div class="col-md-5">
                                    <input id="domain" name="domain" type="text" placeholder="" class="form-control input-md" value="{{ Input::old('domain') }}">
                                    <span class="help-block">Enter the domain name to which this service applies. <br/>Do not enter www or http://.</span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="cms">CMS</label>

                                <div class="col-md-5">
                                    <input id="cms" name="cms" type="text" placeholder="" class="form-control input-md" value="{{ Input::old('cms') }}">
                                    <span class="help-block">Enter the name of the CMS in use for this site.</span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="database">Database</label>

                                <div class="col-md-5">
                                    <input id="database" name="database" type="checkbox" placeholder="" class="pull-left form-control input-sm" @if (Input::old('database')) checked @endif>
                                    <span class="help-block">Check the box if this site uses a database.</span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="launch_date">Launch Date</label>

                                <div class="col-md-5">
                                    <input id="launch_date" name="launch_date" type="date" placeholder="" class="pull-left form-control input-md" value="{{ Input::old('launch_date') }}">
                                    <span class="help-block">Select the date when this site was launched.</span>
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
