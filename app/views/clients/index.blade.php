@extends('layouts.master')

@section('content')

<section class="content-header">
	<h1>
		Clients
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
			<div class="box">
				<div class="box-header">

					<div class="box-tools">
						<!--                <div class="input-group">-->
						<!--                    <input type="text" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Filter"/>-->
						<!---->
						<!--                    <div class="input-group-btn">-->
						<!--                        <div class="btn btn-sm btn-default"><i class="fa fa-filter"></i></div>-->
						<!--                    </div>-->
						<!--                </div>-->
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>Name</th>
							<th></th>
						</tr>

						@foreach($clients as $client)
						<tr>
							<td>
								<a href="{{ URL::route('clients.show', [$client->id]) }}">{{ $client->name }}</a>
							</td>
							<td>
								<a class="pull-right" href="{{ URL::route('clients.edit', [$client->id]) }}"><i class="glyphicon glyphicon-edit"> </i></a>
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