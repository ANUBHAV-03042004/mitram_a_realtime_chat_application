<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- user id for vuejs real time chat -->
    @if (!Auth::guest())
        <meta name="user-id" content="{{ Auth::user()->id }}">
    @endif

    <title>{{ config('app.name', 'MitRam') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Font Awesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   
    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
         .notification-bell i {
            font-size: 28px;
            padding: 11px 24px;
            margin-top:10px;
           transform:translateX(-40px);
        }
        
        .bxs-bell {
            color: red;
        }
        
        .bxs-bell-off {
            color: blue;
        }
        /* Chat box styles */
        .chat-box {
            padding: 10px 20px;
            border: 0.5px solid red;
        }

        /* Scrollbar styles */
        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }

        /* User and message wrapper styles */
        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }

        .use, .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover {
            background: #eeeeee;
        }

        /* Message styles */
        .pending, .pendin {
            position: absolute;
            left: 13px;
            top: 9px;
            background: red;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .message-wrapper {
            padding: 10px;
            height: 536px;
        }

        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: lightgray;
        }

        .sent {
            background: orange;
            float: right;
            text-align: right;
        }

        /* Dropdown styles */
        .navba {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navba a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdow {
            float: right;
            overflow: hidden;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: green;
            width: 10%;
            right: 0;
        }

        .dropdow:hover .dropdown-content {
            display: block;
        }

        /* Header color */
        .headcolor {
            background-color: black;
        }

        /* Additional styles */
        .btn-light {
            background-color: black;
            border-color: #f8f9fa;
            color: cornsilk;
        }

        .media-body p {
            margin: 6px 0;
            color: currentcolor;
            font-size: 35px;
            font-weight: 900;
        }
          /* Dropdown styles update */
          .dropdown {
            display: inline-block;
            vertical-align: middle;
        }

        .dropdown .dropbtn {
            padding: 8px 16px;
            background-color: #3498DB;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .dropdown-content {
            min-width: 200px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .dropdown-content h4 {
            margin: 0;
            padding: 8px;
        }

        .dropdown-content a {
            padding: 12px 16px;
            display: block;
            color: #333;
            text-decoration: none;
        }

        .dropdown-content a:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div id="app" class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="custom-bg shadow headcolor text-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
            {{ $slot ?? '' }}
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <!-- Chat Script -->
    <script>
        var receiver_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function () {
            // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
            var pusher = new Pusher('bfd20b158fd43c34a573', {
                cluster: 'ap3'
            });
            var status = my_id;  
            var channel = pusher.subscribe(status);
            channel.bind('App\\Events\\Notify', function(data) {
                if (my_id == data.from) {
                    $('#' + data.to).click();
                } else if (my_id == data.to) {
                    if (receiver_id == data.from) {
                        $('#' + data.from).click();
                    } else {
                        var pending = parseInt($('#' + data.from).find('.pending').html());
                        if (pending) {
                            $('#' + data.from).find('.pending').html(pending + 1);
                        } else {
                            $('#' + data.from).append('<span class="pending">1</span>');
                        }
                    }
                }
            });

            // User click handlers
            $('.user').click(function () {
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();

                receiver_id = $(this).attr('id');
                
                $.ajax({
                    type: "get",
                    url: "messag/" + receiver_id,
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        scrollToBottomFunc();
                    }
                });
            });

            // Message handlers
            $(document).on('keyup', '#id,#message', function (e) {
                $("input").css("background-color", "whitew");
                var message = $("input[name=message]").val();
                var id = $("input[name=id]").val();

                if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    $(this).val('');
                    var datastr = "id=" + id + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "message",
                        data: datastr,
                        cache: false,
                        success: function (data) {},
                        error: function (jqXHR, status, err) {},
                        complete: function () {
                            scrollToBottomFunc();
                        }
                    });
                }
            });
        });

        // Scroll to bottom function
        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 50);
        }

        // Dropdown functions
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        };
    </script>
</body>
</html>