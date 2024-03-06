<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<body>
    <p>Hello,</p>
    <p>We're excited to share a card with you!</p>
    
    <!-- Generating dynamic URL using Laravel's url() helper function -->
    <p>Click the link below to view the card:</p>
    <p><a href="{{ url('/card/' . $card->reference) }}">View Card</a></p>
    
    <p>Best regards,<br>Your Team</p>
</body>
</html>