@extends('layout.admin.main')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>{{ $title }}</h2>
                        <div class="header-dropdown m-r--5">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">Tambah Data</button>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Buku</th>
                                        <th>Kategori Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Jml. Buku</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Buku</th>
                                        <th>Kategori Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Jml. Buku</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if($data->isEmpty())
                                        <tr>
                                            <td colspan="10" style="text-align:center">Belum Ada Data</td>
                                        </tr>
                                    @else
                                        @foreach($data as $row => $value)
                                            <tr>
                                                <td>{{ $row+1 }}</td>
                                                <td>{{ $value->uuid }}</td>
                                                <td>{{ $value->category_name }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->writer }}</td>
                                                <td>{{ $value->publisher }}</td>
                                                <td>{{ date('Y', strtotime($value->publish_date)) }}</td>
                                                <td>{{ $value->stock }}</td>
                                                <td>
                                                    <a href="{{ url('book/edit/' . $value->book_id) }}" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="{{ url('book/delete/' . $value->book_id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('page.book.add')
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script type="text/javascript">
        $('li[menu="book"]').addClass('active')
    </script>
@endpush
