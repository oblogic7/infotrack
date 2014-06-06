@extends('layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row">

        <form role="form" class="form-horizontal"  method="POST">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="box box-success">
                    <!-- form start -->
                    <div class="box-body text-center">

                        <img src="/assets/img/ya-logo.png" alt=""><br/><br/>
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-sm-12 col-md-8 col-md-offset-2">
                                    <input id="name" class="typeahead" data-typeahead-source="clients" type="text" placeholder="Type to search..." class="form-control input-lg" value="{{ Input::old('name') }}" required="">
                                    <input type="submit" style="display: none;"/>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </form>
    </div>
</section>

@stop

@section('scripts')

@stop
