<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                margin: 0;
                display: flex;
                background-color: #f8fafc;
                color: #333;
                height: 100vh;
            }
            .navbar {
                background-color: #333;
                color: #fff;
                padding: 1rem;
                width: 200px;
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .navbar a {
                color: #fff;
                margin: 1rem 0;
                text-decoration: none;
                font-weight: 600;
                padding: 0.5rem;
                width: 100%;
                text-align: center;
            }
            .navbar a.active {
                background-color: #007bff;
                border-radius: 0.25rem;
            }
            .container {
                text-align: center;
                padding: 2rem;
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .title {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }
            .group-name {
                font-size: 2rem;
                margin-bottom: 2rem;
            }
            .member-list {
                list-style: none;
                padding: 0;
                font-size: 1.2rem;
            }
            .member-list li {
                margin: 0.5rem 0;
            }
            .btn {
                display: inline-block;
                padding: 0.5rem 1rem;
                color: #fff;
                background-color: #007bff;
                text-decoration: none;
                border-radius: 0.25rem;
            }
            .btn-info {
                background-color: #17a2b8;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="/surat" class="nav-link">Beranda Surat</a>
            <a href="/validasi" class="nav-link">Validasi Surat</a>
            <a href="/pelaporan" class="nav-link">Pelaporan</a>
        </div>
        <div class="container">
            <div class="title">PELAPORAN DAN VALIDASI SURAT</div>
            <div class="group-name">KELOMPOK A4</div>
            <ul class="member-list">
                <li>Ni Made Ayu Wirasih (2208561014)</li>
                <li>Ni Komang Ayu Juliana (22085561046)</li>
                <li>Febrian Valentino Agape (2208561070)</li>
                <li>Kadek Wina Septhiana (2208561132)</li>
            </ul>
            <a href="/surat" class="btn btn-info">Lihat Data Surat</a>
        </div>

        <!-- JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var links = document.querySelectorAll('.nav-link');
                links.forEach(function(link) {
                    link.addEventListener('click', function() {
                        links.forEach(function(link) {
                            link.classList.remove('active');
                        });
                        this.classList.add('active');
                    });
                });

                // Set active link based on current URL
                var currentPath = window.location.pathname;
                links.forEach(function(link) {
                    if (link.getAttribute('href') === currentPath) {
                        link.classList.add('active');
                    }
                });
            });
        </script>
    </body>
</html>
