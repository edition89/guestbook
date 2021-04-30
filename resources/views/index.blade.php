<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>{{ $title}}</title>
</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#login">
            Войти
        </button>
        <hr>
        <h1 class="text-center">{{ $page_title}}</h1>
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $("#add").on('click', function(e) {
                console.log('run')
                e.preventDefault();
                var Data = $('form').serializeArray();
                $.ajax({
                    url: "{{url('/')}}",
                    type: "POST",
                    data: Data,
                    dataType: 'json',
                    success:function(res){
                        $('#id_form_messages')[0].reset();
                        $('#success').modal('toggle');
                        console.log(res);
                    }
                })
            });
        })
    </script>
</body>

</html>