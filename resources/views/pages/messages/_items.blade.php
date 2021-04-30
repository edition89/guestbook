<div class="messages">
    @if(! $messages->isEmpty())
        @foreach ($messages as $message)
            <div class="card my-3">
                <div class="card-body">
                    <h3 class="card-title">
                        <span>#{!! $message->id !!} {!! $message->username !!}</span>
                    </h3>
                    <div class="card-text">
                        {!! $message->message !!}
                    </div>
                    <hr>
                    
                    <p style="text-align: right">{!! $message->created_at !!}</p>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {!! $messages->render() !!}
        </div>
    @endif
</div>