@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        {{ $client->name }} <small>New SEO Service</small>
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
                <i class="fa fa-exclamation"></i>
                Adding this SEO service will indicate that this domain has been cleared for additional SEO work by the client (billable).
            </div>
        </div>
    </div>

    <div class="row">

        <form role="form" class="form-horizontal" action="{{ URL::route('clients.services.store', [$client->id, 'type' => 'seo']) }}" method="POST">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="domain">Domain Name</label>

                                <div class="col-md-5">
                                    <input id="domain" name="domain" type="text" placeholder="" class="form-control input-md" value="{{ Input::old('domain') }}" autofocus="">
                                    <span class="help-block">Enter the domain name to which this service applies. <br/>Do not enter www or http://.</span>
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
