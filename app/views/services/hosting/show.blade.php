@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        <a href="{{ URL::route('clients.show', [$client->id]) }}">{{ $client->name }}</a>
        <small>{{ $service->type }} for ({{ $service->domain }}) </small>
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

        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header">
                    <i class="fa fa-certificate"></i>
                    <h3 class="box-title">Certificate Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl  class="dl-horizontal">
                        <dt>Domain</dt>
                        <dd>{{ $service->domain }}</dd>
                        <dt>CMS</dt>
                        <dd>{{ $service->cms }}</dd>
                        <dt>Database</dt>
                        <dd>@if ($service->database) Yes @else No @endif</dd>

                    </dl>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <div class="col-md-6">
            {{ $activityLogView }}
        </div>

    </div>
</section>

@stop
