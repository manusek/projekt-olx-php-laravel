<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomoc Techniczna</title>
    <style>
        body {
            background-image: url('storage/img/background.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }
        .content {
            text-align: center;
            width: 80%;
            max-width: 800px;
            border: 2px solid #000;
            padding: 20px;
            background-color: #E5E8E8;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content ul {
            text-align: left;
            list-style-type: none;
            padding: 0;
        }
        .content li {
            margin-bottom: 10px;
        }
        .back-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            margin-bottom: 20px;
        }
        .back-link img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <a href="{{ url('/') }}" class="back-link">
            <img src="{{ asset('storage/img/back.png') }}" alt="Wróć">
            Wróć na stronę główną
        </a>
        <h1>Pomoc Techniczna</h1>
        <p>Jeśli masz jakiekolwiek problemy techniczne, skontaktuj się z nami za pomocą poniższych informacji:</p>
        <ul>
            <li>Email: support@example.com</li>
            <li>Telefon: 123-456-789</li>
            <li>Godziny pracy: Pon-Pt, 9:00 - 17:00</li>
            <li>FAQ: <a href="{{ url('/faq') }}">Często zadawane pytania</a></li>
        </ul>
    </div>
</body>
</html>
