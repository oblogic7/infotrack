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
                                    $service->label }}</a></td>
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
                            <td class="col-xs-12 col-sm-6">
                                <a href="{{ URL::route('clients.auth.show', [$login->id]) }}">{{ $login->name }}</a>
                            </td>
                            <td class="hidden-xs">
                                {{ $login->username }}
                            </td>
                            <td><input class="password" type="password" value="{{ $login->password }}" readonly /></td>
                            <td>
                                <a class="btn btn-default btn-flat btn-sm" href="{{ $login->url }}"
                                   data-toggle="tooltip" data-original-title="Open login page" target="_blank"><i
                                        class="fa fa-link"></i></a>

                            </td>

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
                            <th class="text-right">Type</th>
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
                            <td class="text-right">{{ $contact->type }}</td>
                            <td class="text-right">

                                @if ($contact->email)
                                <a href="mailto:{{ $contact->email }}" data-toggle="tooltip"
                                   data-original-title="{{ $contact->email }}"><i class="fa fa-envelope"> </i></a>
                                @endif

                                @if ($contact->phone)
                                <i class="fa fa-phone" data-toggle="tooltip" data-original-title="{{ $contact->phone }}"> </i>
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

            <!-- Chat box -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Log</h3>
                    <div class="box-tools pull-right">
                        <div class="btn-group" data-toggle="btn-toggle" >
                            <button type="button" class="filter btn btn-default btn-sm active" data-toggle="tooltip" title="All Messages" data-filter="">All</button>
                            <button type="button" class="filter btn btn-default btn-sm" data-toggle="tooltip" title="System Messages" data-filter="system"><i class="fa fa-gear"></i></button>
                            <button type="button" class="filter btn btn-default btn-sm" data-toggle="tooltip" title="User Messages" data-filter="user"><i class="fa fa-user"></i></button>
                        </div>
                    </div>
                </div>
                <div class="box-body chat" id="chat-box">
                    @foreach ($client->allActivity as $item)
                        @if($item->message_type == 'system')
                            <!-- log item -->
                            <div class="item" data-message-type="{{ $item->message_type }}">
                                <i class="fa fa-2x fa-gears text-muted"></i>
                                <p class="message text-muted">
                                    <span class="name">
                                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $item->created_at }}</small>
                                    </span>
                                    {{ $item->message }}
                                </p>
                            </div><!-- /.log -->
                        @else
                            <!-- chat item -->
                            <div class="item" data-message-type="{{ $item->message_type }}">
                                <i class="fa fa-2x fa-pencil-square text-green"></i>
                                <p class="message">
                                    <a href="#" class="name">
                                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $item->created_at }}</small>
                                        {{ $item->user->name }}
                                    </a>
                                    {{ $item->message }}
                                </p>
                            </div><!-- /.item -->
                        @endif
                    @endforeach

                </div><!-- /.chat -->
                <div class="box-footer">
                    <form action="{{ URL::route('clients.activity.store', [$client->id]) }}" method="POST">
                        <div class="input-group">
                            <input class="form-control" name="message" placeholder="Type message..."/>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.box (chat box) -->


        </div>
    </div>
</section>
<!-- /.content -->
@stop