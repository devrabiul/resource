<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Jarvis') }}</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #020404;
            color: #eee;
            height: 100vh;
            font-family: "Poppins";
            padding-inline: clamp(1.5rem, 2vw, 2rem);
            overflow: hidden;
            max-height: 100vh;
        }

        /*# Header */
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            width: 100%;
            height: fit-content;
            position: relative;
            top: 0;
            font-size: 12px;
            padding-top: 30px;
        }

        header .logo {
            font-weight: bold;
        }

        header .menu-items {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
        }

        header .menu-items a {
            color: #eee;
            text-decoration: none;
        }

        header .menu-items .special {
            background-color: #eee;
            color: #020404;
            padding: 3px 5px;
            border-radius: 0.3rem;
        }

        header .lang {
            display: flex;
        }

        /*# Hero Section */
        /*? BG GIF */
        .bg-gif video {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            object-position: 50% 85%;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /*? Hero ctr */
        .ctr {
            position: absolute;
            bottom: 2rem;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }

        .left-ctr-1 h1 {
            margin: 10px 0px;
            line-height: 1.5rem;
            font-size: 50px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .left-ctr-2 {
            display: flex;
            width: 100%;
            padding-top: 30px;
        }

        .left-ctr-2 .left-ctr-2-1 {
            width: 40%;
        }

        .left-ctr-2 .left-ctr-2-2 {
            margin: 0px 20px;
        }

        .left-ctr-2 .left-ctr-2-2 p {
            margin-bottom: 4px;
            text-decoration: underline;
        }

        .left-ctr-2 p {
            font-size: 10px;
            line-height: 170%;
            color: #a0a0a0;
        }

        .ctr .right-ctr {
            margin-right: 2rem;
            background-color: #eee;
            color: #020404;
            width: 500px;
            height: fit-content;
            font-size: 10px;
            padding: 15px 20px;
            border-radius: 10px;
        }

        .right-ctr-box {
            display: flex;
            align-items: center;
            width: 100%;
            flex-direction: column;
            height: fit-content;
        }

        .right-ctr-box .right-ctr-box-inner-1,
        .right-ctr-box .right-ctr-box-inner-2 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .right-ctr-box h1 {
            font-size: 15px;
        }

        .right-ctr-box p {
            font-size: 10px;
        }

        span {
            overflow: hidden;
            display: block;
        }

    </style>

</head>

<body>

    <!--! ------------------------------- Header -------------------------------- -->
    <header>
        <div class="logo"></div>

        <div class="lang">
            <div class="lang-en">
                @if (Route::has('login'))
                <div>
                    @auth
                    <a  style="text-decoration: none;color:#fff;padding:15px;" href="{{ url('/home') }}"
                        class="">Home</a>
                    @else
                    <a  style="text-decoration: none;color:#fff;padding:15px;" href="{{ route('login') }}"
                        class="">Log
                        in</a>

                    @if (Route::has('register'))
                    <a  style="text-decoration: none;color:#fff;padding:15px;" href="{{ route('register') }}"
                        class="">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </header>

    <!--! ---------------------------- Hero Section ----------------------------- -->
    <!--# BG GIF -->
    <div class="bg-gif">
        <video src="https://github.com/devrabiul/resource/raw/main/video/background.mp4" autoplay loop></video>
    </div>

    <!--# Hero ctr -->
    <div class="ctr">
        <!--! left-ctr -->
        <div class="left-ctr">
            <div class="left-ctr-1">
                <span>
                    <h1>Are You</h1>
                </span>
                <span>
                    <h1>Ready For</h1>
                </span>
                <span>
                    <h1>Big Challanges ?</h1>
                </span>
            </div>
            <div class="left-ctr-2">
                <div class="left-ctr-2-1">
                    <p>
                        Holography are your ticket into the largest and fastest growing Online Casino Network on the
                        Blockchain. With only 10,000 VIP members ever to be minted, Holo grant holders access to the new
                        world
                        of Defi Gambling. Holo grant proof of ownership on the Ethereum Blockchain.
                    </p>
                </div>
            </div>
        </div>
        <div class="right-ctr">
            <div class="right-ctr-box">
                <div class="right-ctr-box-inner-1">
                    <h1>Hello Sir.</h1>
                    <p>Today</p>
                </div>
                <div class="right-ctr-box-inner-2">
                    <p>Welcome to the new Adventure.</p>
                    <h1><img src="https://raw.githubusercontent.com/devrabiul/resource/main/img/sunlight.png" width="15" alt="" style="margin-right: 5px" /> {{ date('d M, Y') }} </h1>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script>
        const tl = gsap.timeline();
        tl.from([".logo, .menu-items a, .lang"], {
                duration: 1,
                opacity: 0,
                y: 40,
                stagger: {
                    amount: 0.4
                }
            })
            .from(
                ".left-ctr h1", {
                    opacity: 0,
                    duration: 1,
                    y: 100,
                    skewY: 10,
                    stagger: {
                        amount: 0.4
                    }
                },
                "-=1"
            )
            .from(
                [".left-ctr-2-1, .left-ctr-2-2"], {
                    opacity: 0,
                    duration: 1,
                    y: 100,
                    stagger: {
                        amount: 0.4
                    }
                },
                "-=1"
            )
            .from(".right-ctr", {
                duration: 1,
                x: 500,
                skewX: 50
            }, "-=1");

    </script>
</body>

</html>
