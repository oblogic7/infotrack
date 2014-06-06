@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        Add Client
    </h1>
    <!--		<ol class="breadcrumb">-->
    <!--			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
    <!--			<li><a href="#">Tables</a></li>-->
    <!--			<li class="active">Simple</li>-->
    <!--		</ol>-->

</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            @include('_partials.messages')
        </div>
    </div>

    <div class="row">

        <form role="form" class="form-horizontal" action="{{ URL::route('clients.store') }}" method="POST">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Client Name</label>

                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="{{ Input::old('name') }}" autofocus>

                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer clearfix">
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ URL::route('clients.index') }}">Cancel</a>
                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-success" value="Save">
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

@stop
