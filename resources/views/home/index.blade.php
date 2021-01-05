<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('home.css') }}" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-light justify-content-between" style="background:rgba(2, 30, 34, 0.42);">
        <a class="navbar-brand text-white font-weight-bold" style="font-size:30px;">Perpustakaan Online</a>
        <form class="form-inline">
            <button class="btn text-white btn-white mr-sm-2" style="background:rgba(255, 255, 255, 0.26);" type="button">Data Peminjam Buku</button>
            <button class="btn text-white btn-white my-2 my-sm-0" style="background:rgba(255, 255, 255, 0.26);" type="button">Search</button>
        </form>
    </nav>
    <div class="s002">
        <form>
            <fieldset>
                <legend style="font-size:25px;">Masuka dua atau lebih kata kunci dari judul, pengarang, atau subyek</legend>
            </fieldset>
            <div class="inner-form">
                <div class="input-field first-wrap">
                    <input id="search" type="text" placeholder="What are you looking for?" />
                </div>
                <div class="input-field fifth-wrap">
                    <button class="btn-search" type="button">SEARCH</button>
                </div>
            </div>
        </form>
    </div>
</body>
<footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</footer>
</html>
