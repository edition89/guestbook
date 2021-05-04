<div class="messages">
    @if(! $messages->isEmpty())
    @foreach ($messages as $message)
    <form method="POST" id="id_form_{!! $message->id !!}">
        <div class="card my-3">
            <div class="card-body">
                <h3 class="card-title">
                    <span>#{!! $message->id !!}
                        @auth
                        <input type="text" class="form-control" placeholder="Никнейм" name="username" id="username" value="{!! $message->username !!}">
                        @else
                        {!! $message->username !!}
                        @endauth
                    </span>
                </h3>
                <div class="card-text">
                    @auth
                    <div class="form-group">
                        <label for="formessage">Сообщение: *</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control">{!! $message->message !!}</textarea>
                    </div>
                    @else
                    {!! $message->message !!}
                    @endauth
                </div>
                <hr>
                @auth
                <div class="pull-right">
                    <span class="btn btn-success" onclick="edit({!! $message->id !!})"><i class="fas fa-pencil-alt"></i></span>
                    <span class="btn btn-danger" onclick="deleted({!! $message->id !!})"><i class="fas fa-trash"></i></span>
                </div>
                <br>
                <p>{!! $message->created_at !!}</p>
                @endauth
            </div>
        </div>
    </form>
    @endforeach
    <div class="text-center">
        {!! $messages->render() !!}
    </div>
    @endif
</div>