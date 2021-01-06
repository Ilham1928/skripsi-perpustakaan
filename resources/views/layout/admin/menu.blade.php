<section>
    <aside id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li menu="dashboard">
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="material-icons">settings_input_svideo</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li menu="student">
                    <a href="{{ url('admin/student') }}">
                        <i class="material-icons">supervisor_account</i>
                        <span>Data Siswa</span>
                    </a>
                </li>
                <li menu="borrow">
                    <a href="pages/helper-classes.html">
                        <i class="material-icons">swap_vertical_circle</i>
                        <span>Data Peminjaman</span>
                    </a>
                </li>
                <li menu="book">
                    <a href="{{ url('admin/book') }}">
                        <i class="material-icons">layers</i>
                        <span>Data Buku</span>
                    </a>
                </li>
                <li menu="category">
                    <a href="{{ url('admin/category') }}">
                        <i class="material-icons">view_module</i>
                        <span>Kategori Buku</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</section>
