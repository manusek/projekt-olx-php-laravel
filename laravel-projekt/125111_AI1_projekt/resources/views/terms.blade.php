<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulamin Tablicy Ogłoszeń</title>
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
        }
        
        .content {
            text-align: center;
            width: 80%;
            max-width: 800px;
            border: 2px solid #000;
            padding: 20px;
            background-color: #E5E8E8;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 7px;
        }
        
        ul {
            text-align: left;

            padding: 0;
        }
        
        li {
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
    <a href="{{ url('/home') }}" class="back-link">
            <img src="{{ asset('storage/img/back.png') }}" alt="Wróć">
            Wróć na stronę główną
        </a>
        <h1>Regulamin Tablicy Ogłoszeń</h1>
        <p>Witaj na naszej tablicy ogłoszeń. Prosimy o zapoznanie się z regulaminem.</p>
        <ul>
            <li>Ogłoszenia muszą być zgodne z obowiązującym prawem.</li>
            <li>Zakazane jest publikowanie treści obraźliwych lub wulgarnych.</li>
            <li>Administratorzy zastrzegają sobie prawo do usuwania ogłoszeń naruszających regulamin.</li>
            <li>Ogłoszenia muszą być prawdziwe i rzetelne.</li>
            <li>Zakazuje się spamowania i publikowania ogłoszeń wielokrotnie.</li>
            <li>Ogłoszenia nie mogą zawierać treści promujących przemoc, nienawiść, dyskryminację.</li>
            <li>Wszystkie ogłoszenia muszą być umieszczane w odpowiednich kategoriach.</li>
            <li>Zakazane jest podawanie fałszywych danych kontaktowych.</li>
            <li>Użytkownicy są odpowiedzialni za treść publikowanych ogłoszeń.</li>
            <li>Administracja nie ponosi odpowiedzialności za transakcje zawarte na podstawie ogłoszeń.</li>
            <li>Ogłoszenia nie mogą naruszać praw autorskich ani praw własności intelektualnej.</li>
            <li>Zakazuje się zamieszczania ogłoszeń z ofertami nielegalnych produktów i usług.</li>
            <li>Administracja zastrzega sobie prawo do zmiany regulaminu w dowolnym czasie.</li>
            <li>Użytkownik zgadza się na przetwarzanie swoich danych osobowych zgodnie z polityką prywatności serwisu.</li>
            <li>W przypadku naruszenia regulaminu użytkownik może zostać zablokowany.</li>
            <li>Reklamacje i zgłoszenia naruszeń należy kierować do administratorów serwisu.</li>
        </ul>
    </div>
   
</body>
</html>
