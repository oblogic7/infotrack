@extends('layouts.master')

@section('content')

<section class="content-header clearfix">

    <h1 class="col-sm-8">
        {{ $client->name }}
    </h1>

    <span class="pull-right text-muted">{{ $client->updated_at }}</span>
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

    <!-- /.row -->
    <div class="row">
        <div class="col-md-6">

            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-dashboard"></i>

                    <h3 class="box-title">Services</h3>

                    <div class="box-tools pull-right">

                        <div class="btn-group">
                            <button class="btn btn-default btn-xs btn-flat dropdown-toggle" data-toggle="dropdown"><i
                                    class="glyphicon glyphicon-plus"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'domain']) }}">Domain Registration</a></li>
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'hosting']) }}">Web Hosting</a></li>
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'seo']) }}">SEO</a></li>
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'ssl']) }}">SSL Certificate</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if ($client->services->count() > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Domain</th>
                            <th class="text-right">Service Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client->services as $service)
                        <tr>
                            <td><a href="{{ URL::route('clients.services.show', [$client->id, $service->id]) }}">{{
                                    $service->domain }}</a></td>
                            <td class="text-right">{{ $service->type }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info text-center">
                        This client does not have any services. <br/><br/>

                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs btn-flat dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-plus"> </i> Add Service
                            </button>
                            <ul class="dropdown-menu text-left" role="menu">
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'domain']) }}">Domain Registration</a></li>
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'hosting']) }}">Web Hosting</a></li>
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'seo']) }}">SEO</a></li>
                                <li><a href="{{ URL::route('clients.services.create', [$client->id, 'type' => 'ssl']) }}">SSL Certificate</a></li>
                            </ul>
                        </div>


                    </div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-lock"></i>

                    <h3 class="box-title">Credentials</h3>

                    <div class="box-tools pull-right">
                        <a class="btn btn-default btn-xs btn-flat pull-right"
                           href="{{ URL::route('clients.auth.create', [$client->id]) }}"><i
                                class="glyphicon glyphicon-plus"> </i></a>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if ($client->credentials->count() > 0)
                    <table class="table credentials-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>URL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client->credentials as $login)
                        <tr>

                            @if( Access::hasRole($login->roles->lists('name')) )

                                <td>
                                    <a href="{{ URL::route('clients.auth.show', [$client->id, $login->id]) }}">{{ $login->name }}</a>
                                </td>
                                <td class="hidden-xs">
                                    {{ $login->username }}
                                </td>
                                <td><input class="password unmask-pass" type="password" value="{{ $login->password }}" readonly /></td>
                                <td>
                                    <a class="btn btn-default btn-flat btn-sm" href="{{ $login->url }}"
                                       data-toggle="tooltip" data-original-title="Open login page" target="_blank"><i
                                            class="fa fa-link"></i></a>

                                </td>

                            @else

                                <td colspan="4">
                                    {{ $login->name }}
                                    <i class="fa fa-2x fa-lock pull-right" data-toggle="tooltip" data-title="Access to this item is restricted to the following roles: @foreach($login->roles->lists('name') as $name) <br/>{{ strtoupper($name)}} @endforeach"> </i>
                                </td>

                            @endif

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info text-center">
                        This client does not have any login information. <br/><br/>
                        <a class="btn btn-xs btn-flat btn-default"
                           href="{{ URL::route('clients.auth.create', [$client->id] ) }}"><i
                                class="glyphicon glyphicon-plus"> </i> Add Login</a>
                    </div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">

            <div class="box box-danger">

                <div class="box-header">
                    <i class="fa fa-bullhorn"></i>

                    <h3 class="box-title">Contacts</h3>

                    <div class="box-tools pull-right">
                        <a class="btn btn-default btn-xs btn-flat pull-right"
                           href="{{ URL::route('clients.contacts.create', [$client->id]) }}"><i
                                class="glyphicon glyphicon-plus"> </i></a>

                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @if ($client->contacts->count() > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client->contacts as $contact)
                        <tr class="">
                            <td class="small-col">
                                @if ($contact->primary)
                                <i class="fa fa-star"></i>
                                @endif
                            </td>
                            <td><a href="{{ URL::route('clients.contacts.show', [$contact->id]) }}">{{ $contact->name }}</a></td>
                            <td>{{ $contact->type }}</td>
                            <td>
                                @if ($contact->phone)
                                <i class="fa fa-phone"> </i> {{ $contact->phone }}
                                @endif
                            </td>
                            <td>

                                @if ($contact->email)
                                <a href="mailto:{{ $contact->email }}"><i class="fa fa-envelope"> </i></a>
                                @endif

                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info text-center">
                        This client does not have any contacts listed. <br/><br/>
                        <a class="btn btn-xs btn-flat btn-default"
                           href="{{ URL::route('clients.contacts.create', [$client->id] ) }}"><i
                                class="glyphicon glyphicon-plus"> </i> Add Contact</a>
                    </div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            {{ $activityLogView }}


        </div>
    </div>
</section>
<!-- /.content -->
@stop