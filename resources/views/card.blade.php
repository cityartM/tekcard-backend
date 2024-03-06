<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/card_style.css') }}">
</head>
<body>

    <div class="card-bg">
        <div class="title px-4 py-3 d-flex justify-content-between align-items-center">
            <h5>Preview Card</h5>
            <span>x</span>
        </div>
        <div class="cover-image">
            <img src="https://www.shutterstock.com/image-photo/blue-helix-human-dna-structure-600nw-1669326868.jpg" alt="cover image">
        </div>
        <div class="card-infos">
            <div class="profile-image">
                <img src="{{ $card->getFirstMediaUrl('card_avatar') }}" alt="profile image">
            </div>
            <div class="tdb">
                <h3 class="name">{{ $card->full_name}}</h3>
                <p class="desc">{{ $card->job_title}}</p>
                <a>  <button class="save-button">Save contact</button> </a>
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

        <div class="card-bottom">
            <button class="add-card-btn">Add card</button>
            <button class="save-card-btn">Save card</button>
        </div>
        <form method="POST" action="{{ route('send-card-by-email', ['card' => $card->id]) }}">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="send-email-btn">Send Card via Email</button>
        </form>
    </div>
    
</body>
</html>