@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        YA Authentication Details
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

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    <div class="box-tools">

                        <a href="{{ URL::route('credentials.create') }}" class="btn btn-default btn-xs btn-flat pull-right"><i class="glyphicon glyphicon-plus"></i></a>

                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>

                        @foreach($credentials as $auth)
                        <tr>
                            <td>
                                <a href="{{ URL::route('credentials.show', [$auth->id]) }}">{{ $auth->name }}</a>
                            </td>
                            <td>
                                @if( Access::userAuthorized($auth->roles->lists('name')) )
                                    <a class="btn btn-xs btn-default pull-right" href="{{ URL::route('credentials.edit', $auth->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop