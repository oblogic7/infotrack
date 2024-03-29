@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        <a href="{{ URL::route('clients.show', [$client->id]) }}">{{ $client->name }}</a>
        <small>New Contact</small>
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

        <form role="form" class="form-horizontal" action="{{ URL::route('clients.contacts.update', [$client->id, $contact->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT" />
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Contact Name</label>

                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="{{ $contact->name }}" required="" autofocus="">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>

                                <div class="col-md-5">
                                    <input id="email" name="email" type="email" placeholder="" class="form-control input-md" value="{{ $contact->email }}">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="phone">Phone</label>

                                <div class="col-md-5">
                                    <input id="phone" name="phone" type="phone" placeholder="" class="form-control input-md" value="{{ $contact->phone }}">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="type">Type</label>
                                <div class="col-md-4">
                                    <select id="type" name="type" class="form-control">
                                        <option value="General Contact" @if($contact->type == 'General Contact')selected@endif>General Contact</option>
                                        <option value="Technical Contact" @if($contact->type == 'Technical Contact')selected@endif>Technical Contact</option>
                                        <option value="Billing Contact" @if($contact->type == 'Billing Contact')selected@endif>Billing Contact</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Multiple Checkboxes -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="primary">Primary Contact?</label>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label for="primary-0">
                                            <input type="checkbox" name="primary" id="primary-0" value="1" @if ($contact->primary) checked @endif>
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
