@if($errors->any())
        <div class="alert alert-danger col-xs-12">{{$errors->first()}}</div>
@endif

@if (Alert::has('error'))
{{ Alert::first('error') }}
@endif

@if (Alert::has('info'))
    {{ Alert::all('info') }}
@endif