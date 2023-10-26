<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Scripts -->
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/css/forum.css',
    'resources/css/main.css',
    ])
</head>

<body>
    <header id="main__header">
        <div class="header__container">

            <div class="logo">
                <img src="{{ asset('files/logo-webinord-clair.png') }}" alt="">
            </div>
            @auth
            <div class="notif" data-idtrack="{{auth()->user()->id}}">
                <i class="fa fa-bell"></i>
                <p class="notif__int">
                    {{ $NotifsCount }}
                </p>
                <div class="notifications__center">
                    @foreach($notifications as $notification)
                    @php
                    $readNotification = $notificationRead->where('notif_id', $notification->id)->where('user_id', auth()->user()->id)->isNotEmpty();
                    @endphp
                    <a class="user__notif" href="{{$notification->notif_link}}" data-notifId="{{$notification->id}}">
                        <div class="notification">
                            <li class="notif__subject">
                                {{ $notification->sujet }} <!-- Assuming 'message' is the field you want to display -->
                            </li>
                            <div class="unread__visual">
                            @if(!$readNotification)
                                <i class="unread__dot"></i>
                            @endif
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <script>
                let notifsBell = document.querySelector(".notif")
                let notificationsCenter = document.querySelector(".notifications__center")
                let notifsInt = document.querySelector(".notif__int")
                let userNotifs = document.querySelectorAll(".user__notif")

                notifsBell.addEventListener("click", ev => {
                    notificationsCenter.classList.toggle('open__notif')
                    ev.currentTarget.classList.toggle('ajax__ready')
                    if (!ev.currentTarget.classList.contains('ajax__ready')) {
                        let xhttp = new XMLHttpRequest()
                        let userId = ev.currentTarget.getAttribute('data-idtrack')
                        let sParams = 'userId=' + encodeURIComponent(userId)
                        xhttp.onreadystatechange = function() {
                            if (this.readyState === 4) {
                                if (this.status === 200) {
                                    console.log('Notifications updated')
                                    notifsInt.innerHTML = "0"
                                } else {
                                    console.error("Error updating notifications.");
                                }
                            }
                        };
                        xhttp.open("POST", `/update-notifs-check/${userId}`, true);
                        xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send(sParams);
                    }
                })

                for (let userNotif of userNotifs) {
                    userNotif.addEventListener("click", event => {
                        let xhttp = new XMLHttpRequest()
                        let user_id = "{{auth()->user()->id}}"
                        let notif_id = event.currentTarget.getAttribute("data-notifId")
                        let Params = 'user_id=' + encodeURIComponent(user_id) + '&notif_id=' + encodeURIComponent(notif_id)
                        xhttp.onreadystatechange = function() {
                            if (this.readyState === 4) {
                                if (this.status === 200) {
                                    console.log('Notifications updated')
                                    notifsInt.innerHTML = "0"
                                } else {
                                    console.error("Error updating notifications.");
                                }
                            }
                        };
                        xhttp.open("POST", `/singleNotifsReadUpdate`, true);
                        xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send(Params);
                    })
                }
            </script>
            @endauth

        </div>

    </header>
    <main>
        <p>main page</p>
        @yield('content')
    </main>
</body>