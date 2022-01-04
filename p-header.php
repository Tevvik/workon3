<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="wp-content/themes/loveoutfits/node_modules/bootstrap/scss/co" type="text/css" charset="utf-8"> -->
    <title>Home</title>
    <!-- C:\xampp\htdocs\loveoutfits\wp-content\themes\loveoutfits\css -->
    <link rel="stylesheet" href="wp-content/themes/loveoutfits/css/style.css">
    <link rel="stylesheet" href="wp-content/themes/loveoutfits/fontawesome/css/all.min.css">
    <!-- fonts pushter poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Pushster&display=swap" rel="stylesheet">
</head>
<body>
    <!-- cookies -->
    <div id="cookies_wrapper">
        <ul>
            <li>
                <h4>Two0e preferencje prywatności</h4>
                <p>Wraz z naszymi partnerami przechowujemy i/lub uzyskujemy dostęp do informacji w urządzeniu, takich jak unikatowe identyfikatory w plikach cookie, w celu przetwarzania danych osobowych. Możesz zaakceptować wybory lub nimi zarządzać, w tym masz prawo do sprzeciwu w przypadku występowania prawnie uzasadnionych interesów. Kliknij „Zarządzaj plikami cookies” lub w dowolnym momencie odwiedź stronę polityki prywatności. Te wybory zostaną przekazane naszym partnerom i nie będą miały wpływu na twoje możliwości korzystania z Loveoutfits <a class="a_line" href="#">Polityka cookies</a></p>
            </li>
            <li>
                <h4>Przetwarzamy dane w następujących celach:</h4>
                <p>Użycie dokładnych danych geolokalizacyjnych. Aktywne skanowanie charakterystyki urządzenia do celów identyfikacji. Przechowywanie informacji na urządzeniu lub dostęp do nich. Spersonalizowane reklamy i treści, pomiar reklam i treści, opinie odbiorców, rozwój produktu. <a class="a_line" href="#">Lista partnerów (dostawców)</a></p>
            </li>
            <li>
                <a onclick="coockieshide()" class="a_btn close" href="#">Zgoda na wszystkie</a>
                <a onclick="coockieshide()" class="a_line close" href="#">Zarządaj plikami cookies</a>
            </li>
        </ul>
    </div>
    <!-- top nav -->
    <nav class="top_nav">
        <ul id="logo">
            <li><a href="#"><img src="http://localhost/loveoutfits/wp-content/uploads/2022/01/small_logo.png" alt="logo"></a></li>
            <li><a href="#">Love outfits</a></li>
            <li><a href="wp-content/themes/loveoutfits/js/script.js" class="icon mobilemenu" onclick="mobileMenu()">
            <i class="fa fa-bars"></i></li>
        </a>
        </ul>
        <input class="icon search" type="text" placeholder="szukaj"/>
        <ul class="m_icons_menu" >
            <li><i class="fas fa-user"></i></li>
            <li><i class="fas fa-shopping-cart"></i></li>
            <li><a class="a_btn" href="#">Sprzedaj teraz</a></li>
        </ul>
    </nav>
    <!-- main nav -->
    <nav class="main_nav">
        <ul>
                <div  class="mobile_icons_menu" >
                        <ul>
                            <li><i class="fas fa-user"></i></li>
                            <li><i class="fas fa-shopping-cart"></i></li>
                            <li><a class="a_btn" href="#">Sprzedaj teraz</a></li>
                        </ul>
                </div>
            <li><a href="#">Kobiety</a>
                <div class="menu_tab">
                    <div class="menu_tab_line">
                        <ul>
                            <li><a href="#">Zobacz wszystkie</a></li>
                            <li><a href="#">Ubrania</a></li>
                            <li><a href="#">Obuwie</a></li>
                            <li><a href="#">Torby</a></li>
                            <li><a href="#">Akcesoria</a></li>
                            <li><a href="#">Kosmetyki</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li><a href="#">Zobacz wszystkie</a></li>
                            <li><a href="#">Bluzy i swetry</a></li>
                            <li><a href="#">Sukienki</a></li>
                            <li><a href="#">Topy, koszulki</a></li>
                            <li><a href="#">Spodnie i legginsy</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li><a href="#">Płaszcze</a></li>
                            <li><a href="#">Żakiety</a></li>
                            <li><a href="#">Jeansy</a></li>
                        </ul>
                    </div>
                </div></li>
            <li><a href="#">Mężczyźni</a>
                <div class="menu_tab">
                    <div class="menu_tab_line">
                        <ul>
                            <li><a href="#">Zobacz wszystkie</a></li>
                            <li><a href="#">Ubrania</a></li>
                            <li><a href="#">Buty</a></li>
                            <li><a href="#">Akcesoria</a></li>
                            <li><a href="#">Pielęgnacja</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li><a href="#">Zobacz wszystkie</a></li>
                            <li><a href="#">Płaszcze i kurtki</a></li>
                            <li><a href="#">Garnitury i marynarki</a></li>
                            <li><a href="#">Spodnie</a></li>
                            <li><a href="#">Skarpetki i bielizna</a></li>
                            <li><a href="#">Odzież sportowa</a></li>
                            <li><a href="#">Inna odzież męska</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li><a href="#">Spodnie jeansowe</a></li>
                            <li><a href="#">Koszulki</a></li>
                            <li><a href="#">Swetry</a></li>
                            <li><a href="#">Szorty</a></li>
                        </ul>
                    </div>
                </div></li>
            <li><a href="#">O nas</a>
            <div class="menu_tab">
                <div>
                    <h4>Dowiedz się więcej</h4>
                    <ul>
                        <li><a href="#">Jak to działa</a></li>
                        <li><a href="#">Centrum pomocy</a></li>
                        <li><a href="#">Aktualności</a></li>
                    </ul>
                </div>
                <div>
                    <h4>O Firmie</h4>
                    <ul>
                        <li><a href="#">O nas</a></li>
                        <li><a href="#">Współpraca</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Nasze zasady</h4>
                    <ul>
                        <li><a href="#">Polityka prywatności</a></li>
                        <li><a href="#">Polityka bezpieczeństwa</a></li>
                        <li><a href="#">Polityka Cookies</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Prywatność</h4>
                    <ul>
                        <li><a href="#">Ustawienia ciasteczek</a></li>
                    </ul>
                </div>
            </div></li>
        </ul>
    </nav>