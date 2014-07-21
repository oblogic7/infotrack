@extends('layouts.master')

@section('content')

<section class="content-header">
    <h1>
        {{ $client->name }}
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
                    <h3 class="box-title">Domain Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl  class="dl-horizontal">
                        <dt>Domain Provider</dt>
                        <dd>{{ $service->provider }}</dd>
<!--                        <dt>Created</dt>-->
<!--                        <dd>{{ $service->launch_date->toFormattedDateString() }}</dd>-->
<!--                        <dt>Expires</dt>-->
<!--                        <dd>{{ $service->expires->toFormattedDateString() }}</dd>-->
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
