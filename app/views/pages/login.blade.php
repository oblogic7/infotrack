@extends('layouts.bare')

@section('content')


<section class="content">

<div class="col-sm-6 col-sm-offset-3 text-center">
    @include('_partials.messages')
    <a class="google-btn" href='{{ $authUrl }}'></a>
</div>

</section>
@stop
