@auth
@else
@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <form name="captcha-contact-us" id="captcha-contact-us" method="post" action="{{route('captcha-validation')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Никнейм</label>
                <input type="text" id="username" name="username" class="@error('username') is-invalid @enderror form-control">
                @error('username')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Сообщение</label>
                <textarea name="message" class="@error('message') is-invalid @enderror form-control"></textarea>
                @error('message')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-4 mb-4">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                        ↻
                    </button>
                </div>
            </div>
            <div class="form-group mb-4">
                <input id="captcha" type="text" name="captcha" class="@error('captcha') is-invalid @enderror form-control" placeholder="Введите проверку" name="captcha">
                @error('captcha')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>
@endauth