<nav class="navbar navbar-light justify-content-between" style="background:rgb(0 0 0 / 0.44);">
    <a class="navbar-brand text-white font-weight-bold" style="font-size:30px;">Perpustakaan Online</a>
    <div class="form-inline">
        <?php if(!empty(request()->segment(1))) { ?>
            <a class="btn text-white btn-white mr-sm-2" style="background:rgba(255, 255, 255, 0.26);" href="{{ url('/') }}">Home</a>
        <?php } ?>
        <button class="btn text-white btn-white mr-sm-2" style="background:rgba(255, 255, 255, 0.26);" type="button">Data Peminjam Buku</button>
        <?php if(!empty($_COOKIE['is_user'])) { ?>
            <a class="btn text-white btn-white my-2 my-sm-0" style="background:rgba(255, 255, 255, 0.26);" href="{{ url('/logout') }}">Logout</a>
        <?php }else{ ?>
            <a class="btn text-white btn-white my-2 my-sm-0" style="background:rgba(255, 255, 255, 0.26);" href="{{ url('/login') }}">Login</a>
        <?php } ?>
    </div>
</nav>
