<!-- Chat box -->
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Log</h3>
        <div class="box-tools pull-right">
            <div class="btn-group" data-toggle="btn-toggle" >
                <button type="button" class="filter btn btn-default btn-sm active" data-toggle="tooltip" title="All Messages" data-filter="">All</button>


                <button type="button" class="filter btn btn-default btn-sm" data-toggle="tooltip" title="Show messages for this entity." data-filter="self"><i class="fa fa-cube"></i></button>
                <button type="button" class="filter btn btn-default btn-sm" data-toggle="tooltip" title="Show messages for child entities." data-filter="child"><i class="fa fa-cubes"></i></button>
                <button type="button" class="filter btn btn-default btn-sm" data-toggle="tooltip" title="Show system messages." data-filter="system"><i class="fa fa-gear"></i></button>
                <button type="button" class="filter btn btn-default btn-sm" data-toggle="tooltip" title="Show user messages." data-filter="user"><i class="fa fa-user"></i></button>
            </div>
        </div>
    </div>
    <div class="box-body chat" id="chat-box">
        @foreach ($activity as $item)
        @if($item->message_type == 'system')
        <!-- log item -->
        <div class="item" data-message-type="{{ $item->message_type }} @if($item->isChild)child @else self @endif">
            <i class="fa fa-2x fa-gears text-muted"></i>
            <p class="message text-muted">
                <span class="name">
                    <small class="text-muted pull-right text-right"><i class="fa fa-clock-o"></i> {{ $item->created_at }}<br/>{{ $item->user->name }}</small>
                </span>
                @if($item->isChild)
                    <i data-toggle="tooltip" data-title="Message for a child entity." class="fa fa-cubes text-muted"></i>
                @else
                    <i data-toggle="tooltip" data-title="Message for this entity." class="fa fa-cube text-muted"></i>
                @endif

                @if($item->service) (<b>{{$item->service->domain}}</b>) @endif
                {{ $item->message }}
            </p>
        </div><!-- /.log -->
        @else
        <!-- chat item -->
        <div class="item" data-log-message data-message-type="{{ $item->message_type }} @if($item->isChild)child @else self @endif">
            <i class="fa fa-2x fa-user text-muted"></i>
            <p class="message">
                <a href="#" class="name">
                    <small class="text-muted pull-right text-right"><i class="fa fa-clock-o"></i> {{ $item->created_at }}<br/>{{ $item->user->name }}</small>
                </a>
                @if($item->isChild)
                    <i data-toggle="tooltip" data-title="Message for child entity." class="fa fa-cubes text-muted"></i>
                @else
                    <i data-toggle="tooltip" data-title="Message for this entity." class="fa fa-cube text-muted"></i>
                @endif

                @if($item->service) (<b>{{$item->service->domain}}</b>) @endif
                {{ $item->message }}
            </p>
        </div><!-- /.item -->
        @endif
        @endforeach

    </div><!-- /.chat -->
    <div class="box-footer">
        <form action="{{ $formRoute }}" method="POST">
            <div class="input-group">
                <input class="form-control" name="message" placeholder="Type message..."/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </form>
    </div>
</div><!-- /.box (chat box) -->