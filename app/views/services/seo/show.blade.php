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
                    <h3 class="box-title">Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl  class="dl-horizontal">
                        <dt>Domain</dt>
                        <dd>{{ $service->domain }}</dd>
                    </dl>
                    <div class="help-block">This domain has been cleared for SEO work by the client.</div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <div class="col-md-6">
            {{ $activityLogView }}
        </div>
    </div>
</section>

@stop
