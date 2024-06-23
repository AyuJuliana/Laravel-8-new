<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Validasi dan Pelaporan Surat</title>

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
            .navbar a, .dropdown-toggle, .dropdown-menu a {
                color: #fff;
                margin: 1rem 0;
                text-decoration: none;
                font-weight: 600;
                padding: 0.5rem;
                width: 100%;
                text-align: center;
                font-family: 'Figtree', sans-serif;
                font-size: 16px; /* Ensure consistent font size */
            }
            .navbar a.active, .dropdown-toggle.active {
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
            .dropdown {
                position: relative;
                display: inline-block;
                width: 100%;
            }
            .dropdown-toggle {
                background-color: #333;
                border: none;
                width: 100%;
                text-align: center;
                padding: 0.5rem;
                cursor: pointer;
                border-radius: 0.25rem;
                font-family: 'Figtree', sans-serif;
                font-weight: 600;
                font-size: 16px; /* Ensure consistent font size */
            }
            .dropdown-menu {
                display: none;
                position: absolute;
                background-color: #333;
                width: 100%;
                z-index: 1;
                top: 100%;
                left: 0;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                border-radius: 0.25rem;
            }
            .dropdown-menu a {
                padding: 12px 16px;
                display: block;
                text-align: center;
                font-family: 'Figtree', sans-serif;
                font-weight: 600;
                font-size: 16px; /* Ensure consistent font size */
            }
            .dropdown-menu a:hover {
                background-color: #575757;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="/surat" class="nav-link">Beranda Surat</a>
            <!-- validasi button -->
            <div class="dropdown">
                <button class="dropdown-toggle">Validasi</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/letters">Validasi Operator</a></li>
                    <li><a class="dropdown-item" href="/letters/secretary">Validasi Sekretaris Desa</a></li>
                    <li><a class="dropdown-item" href="/letters/chief">Validasi Kepala Desa</a></li>
                </ul>
            </div>
            <a href="/pelaporan" class="nav-link">Pelaporan</a>
        </div>
        <div class="container">
            <div class="title">PELAPORAN DAN VALIDASI SURAT</div>
            <div class="group-name">KELOMPOK A4</div>
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

                // Dropdown functionality
                var dropdownToggle = document.querySelector('.dropdown-toggle');
                var dropdownMenu = document.querySelector('.dropdown-menu');

                dropdownToggle.addEventListener('click', function() {
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                    this.classList.toggle('active');
                });

                // Hide dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.style.display = 'none';
                        dropdownToggle.classList.remove('active');
                    }
                });
            });
        </script>
    </body>
</html>
