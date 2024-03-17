<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");

        /*===== VARIABLES CSS =====*/
        :root {
            --nav-width: 92px;

            /*===== Colores =====*/
            --first-color: #6a6975;
            --bg-color: #54397e;
            --sub-color: #B6CEFC;
            --white-color: #FFF;
            --black-color: black;

            /*===== Fuente y tipografia =====*/
            --body-font: 'Poppins', sans-serif;
            --normal-font-size: 1rem;
            --small-font-size: .875rem;

            /*===== z index =====*/
            --z-fixed: 100;
        }


        /*===== BASE =====*/
        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }

        body {
            position: relative;
            margin: 0;
            padding: 2rem 0 0 6.75rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s;
        }

        h1 {
            margin: 0;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        /*===== l NAV =====*/
        .l-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--bg-color);
            color: var(--white-color);
            padding: 1.5rem 1.5rem 2rem;
            transition: .5s;
            z-index: var(--z-fixed);
        }

        /*===== NAV =====*/
        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .nav__brand {
            display: grid;
            grid-template-columns: max-content max-content;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4rem;
        }

        .nav__toggle {
            font-size: 1.25rem;
            padding: .75rem;
            cursor: pointer;
        }

        .nav__logo {
            color: var(--white-color);
            font-weight: 600;
        }

        .nav__link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: .75rem;
            padding: .75rem;
            color: var(--white-color);
            border-radius: .5rem;
            margin-bottom: 1rem;
            transition: .3s;
            cursor: pointer;
        }

        .nav__link:hover {
            background-color: var(--first-color);
        }

        .nav__icon {
            font-size: 1.25rem;
        }

        .nav__name {
            font-size: var(--small-font-size);
        }

        /*Expander menu*/
        .expander {
            width: calc(var(--nav-width) + 9.25rem);
        }

        /*Add padding body*/
        .body-pd {
            padding: 2rem 0 0 16rem;
        }

        /*Active links menu*/
        /* .active {
            background-color: var(--first-color);
        } */   

        /*===== COLLAPSE =====*/
        .collapse {
            grid-template-columns: 20px max-content 1fr;
        }

        .collapse__link {
            justify-self: flex-end;
            transition: .5s;
        }

        .collapse__menu {
            display: none;
            padding: .75rem 2.25rem;
        }

        .collapse__sublink {
            color: var(--sub-color);
            font-size: var(--small-font-size);
            display: block;
            /* or display: inline-block; */
            margin-bottom: 10px;

        }

        .collapse__sublink:hover {
            color: var(--black-color);
        }

        /*Show collapse*/
        .showCollapse {
            display: block;
        }

        /*Rotate icon*/
        .rotate {
            transform: rotate(180deg);
        }
    </style>
</head>

<body id="body-pd">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <div class="nav__brand">
                    <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                    <a href="#" class="nav__logo">{{ Auth::user()->name }}</a>
                </div>
                <div class="nav__list">
                    <a href="/password-analysis" class="nav__link" id="dashboard-link">
                        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Home Page</span>
                    </a>
                    <a href="/dashboard" class="nav__link" id="passwords-link">
                        <ion-icon name="add-circle-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Passwords</span>
                    </a>


                    <a href="/passwordGen" class="nav__link" id="generate-passwords-link">
                        <ion-icon name="color-wand-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Generate <br>Passowords</span>
                    </a>


                    <a href="/CustomWordlist" class="nav__link" id="custom-wordlist-link">
                        <ion-icon name="terminal-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Generate Custom <br>Wordlist</span>
                    </a>

                    <a href="/password-check" class="nav__link" id="check-password-strength-link">
                        <ion-icon name="construct-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Check Passowrd <br>Strength</span>
                    </a>

                    <div class="nav__link collapse" id="settings-link">
                        <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Settings</span>

                        <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                        <ul class="collapse__menu">
                            <a href="/master/change" class="collapse__sublink"><b>Change Master Passowrd</b></a>
                            <a href="/login/change" class="collapse__sublink"><b>Change Login Password</b></a>
                            <a href="/account/delete" class="collapse__sublink"><b>Delete Your Account</b></a>
                        </ul>
                    </div>


                </div>
            </div>

            <a href="/logout" class="nav__link" id="logout-link">
                <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

    <script>
        /*===== EXPANDER MENU  =====*/
        const showMenu = (toggleId, navbarId, bodyId) => {
            const toggle = document.getElementById(toggleId),
                navbar = document.getElementById(navbarId),
                bodypadding = document.getElementById(bodyId)

            if (toggle && navbar) {
                toggle.addEventListener('click', () => {
                    navbar.classList.toggle('expander')

                    bodypadding.classList.toggle('body-pd')
                })
            }
        }
        showMenu('nav-toggle', 'navbar', 'body-pd')

        /*===== LINK ACTIVE  =====*/
        // Link active menu
        const linkColor = document.querySelectorAll('.nav__link');

        // Function to set active link
        function setActiveLink() {
            const url = window.location.href;
            linkColor.forEach(link => {
                if (link.href === url) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // Call setActiveLink on page load
        document.addEventListener('DOMContentLoaded', setActiveLink);


        /*===== COLLAPSE MENU  =====*/
        const linkCollapse = document.getElementsByClassName('collapse__link')
        var i

        for (i = 0; i < linkCollapse.length; i++) {
            linkCollapse[i].addEventListener('click', function () {
                const collapseMenu = this.nextElementSibling
                collapseMenu.classList.toggle('showCollapse')

                const rotate = collapseMenu.previousElementSibling
                rotate.classList.toggle('rotate')
            })
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
