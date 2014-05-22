@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        {{ $client->name }} <small>New Contact</small>
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

        <form role="form" class="form-horizontal" action="{{ URL::route('clients.contacts.store', $client->id) }}" method="POST">
            <div class="col-xs-6">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Contact Name</label>

                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="{{ Input::old('name') }}" required="">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>

                                <div class="col-md-5">
                                    <input id="email" name="email" type="email" placeholder="" class="form-control input-md" value="{{ Input::old('email') }}">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="phone">Phone</label>

                                <div class="col-md-5">
                                    <input id="phone" name="phone" type="phone" placeholder="" class="form-control input-md" value="{{ Input::old('type') }}">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="type">Type</label>
                                <div class="col-md-4">
                                    <select id="type" name="type" class="form-control">
                                        <option value="General Contact">General Contact</option>
                                        <option value="Technical Contact">Technical Contact</option>
                                        <option value="Billing Contact">Billing Contact</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Multiple Checkboxes -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="primary">Primary Contact?</label>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label for="primary-0">
                                            <input type="checkbox" name="primary" id="primary-0" value="1">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>



                        </fieldset>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer clearfix">
                        <!-- Button -->
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ URL::route('clients.show', [ $client->id ]) }}">Cancel</a>
                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-success" value="Save">
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

@stop
