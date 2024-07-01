<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Form styling */
        form {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .send-email-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .send-email-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/card_style.css') }}">
</head>
<body>

    <div class="card-bg">
        <div class="title px-4 py-3 d-flex justify-content-between align-items-center">
            <h5>Preview Card</h5>
            <a href="javascript:history.back();" class="btn btn-sm btn-black" style="text-decoration: none; color: black;">X</a>
        </div>
        <div class="cover-image">
            <img src="{{ $card->background?->getFirstMediaUrl('background') }}" alt="cover image">
        </div>
        <div class="card-infos">
            <div class="profile-image">
                <img src="{{ $card->getFirstMediaUrl('card_avatar') }}" alt="profile image">
            </div>
            <div class="tdb">
                <h3 class="name">{{ $card->full_name}}</h3>
                <p class="desc">{{ $card->job_title}}</p>

            </div>
        </div>
        <div class="social-media">
            <div class="">
                <b>Social media</b>
            </div>
            <div class="holder">
                @foreach($cardApps as $app)
                    <div class="social-box">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Facebook_logo_36x36.svg/2048px-Facebook_logo_36x36.svg.png" alt="">
                        <p>{{ $app->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>


        <form method="POST" action="{{ route('send-card-by-email', ['card' => $card->id]) }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" class="send-email-btn">Send Card via Email</button>
    </form>
    </br>
    </div>

</body>
</html>
