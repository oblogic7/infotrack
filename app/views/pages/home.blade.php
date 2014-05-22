@extends('layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row">

        <form role="form" class="form-horizontal"  method="POST">
            <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                <div class="box box-success">
                    <!-- form start -->
                    <div class="box-body text-center">

                        <img src="/assets/img/ya-logo.png" alt=""><br/><br/>
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="name" name="name" type="text" placeholder="Start here..." class="form-control input-md" value="{{ Input::old('name') }}" required="">
                                    <span class="help-block"></span>
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
    <script>
        $('document').ready(function() {
            $("[data-toggle='offcanvas']").trigger('click');
        });
    </script>
@stop
