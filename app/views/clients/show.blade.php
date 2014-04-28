@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        {{ $client->name }}
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
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">

                <div class="box-header">
                    <i class="fa fa-bullhorn"></i>

                    <h3 class="box-title">Contacts</h3>

                    <a class="btn btn-default btn-xs pull-right"
                       href="{{ URL::route('clients.contacts.create', [$client->id]) }}"><i
                            class="glyphicon glyphicon-plus"> </i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if ($client->contacts->count() > 0)
                    <table class="table table-hover">
                        <tbody>
                        @foreach($client->contacts as $contact)
                        <tr class="">
                            <td class="small-col">
                                @if ($contact->primary)
                                <i class="fa fa-star"></i>
                                @endif
                            </td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->type }}</td>
                            <td>

                                @if ($contact->phone)
                                <i class="glyphicon glyphicon-phone-alt"> </i>
                                @endif

                                @if ($contact->email)
                                <i class="glyphicon glyphicon-envelope"> </i>
                                @endif

                            </td>
                            <td>
                                <a href="{{ URL::route('clients.contacts.edit', [$client->id, $contact->id]) }}"><i
                                        class="glyphicon glyphicon-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        No contact data for this client. You should <a
                            href="{{ URL::route('clients.contacts.create', [$client->id] ) }}">add one</a>!
                    </div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-dashboard"></i>

                    <h3 class="box-title">Services</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover">
                        <tbody>
                            @if ($client->services->count() > 0)
                                @foreach($client->services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->type }}</td>
                                        <td>
                                        </td>
                                        <td>
                                            <a href="{{ URL::route('clients.services.edit', [$client->id, $service->id]) }}"><i
                                                    class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <div class="alert alert-info text-center">
                                            No contact data for this client. You should <a href="{{ URL::route('clients.contacts.create', [$client->id] ) }}">create one</a>!
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
@stop