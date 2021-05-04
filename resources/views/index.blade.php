<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>{{ $title}}</title>
</head>

<body>
    <div class="container">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/logout/') }}" class="btn btn-primary mt-3">Выйти</a>
            @else
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#login">
                Войти
            </button>
            @endauth
        </div>
        @endif
        <hr>
        <h1 class="text-center">{{ $page_title}}</h1>
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        $(function() {
            $("#add").on('click', function(e) {
                e.preventDefault();
                let Data = $('form').serializeArray();
                for (d of Data) {
                    if ((d.name == "username" || d.name == "message" || d.name == "g-recaptcha-response") && d.value == "") {
                        $('#error').modal('toggle');
                        return 0;
                    }
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('/')}}",
                    type: "POST",
                    data: Data,
                    dataType: 'json',
                    success: function(res) {
                        location.reload();
                        console.log(res);
                    }
                })
            });
        })

        function edit(num) {
            let Data = $('#id_form_' + num).serializeArray();
            for (d of Data) {
                if ((d.name == "username" || d.name == "message" || d.name == "g-recaptcha-response") && d.value == "") {
                    $('#error').modal('toggle');
                    return 0;
                }
            }
            Data.push({
                name: "id",
                value: num
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('edit')}}",
                type: "POST",
                data: Data,
                dataType: 'json',
                success: function(res) {
                    $('#success').modal('toggle');
                }
            })
        };

        function deleted(num) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleted')}}",
                type: "POST",
                data: {
                    id: num,
                },
                dataType: 'json',
                success: function(res) {
                    location.reload();
                    console.log(res);
                }
            })
        };
    </script>
</body>

</html>