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
                        </div>
                    </div>
                    <div class="body">
                        @if($message = Session::get('success'))
                        <h4 style="text-align:center; color:#43e443">{{ $message }}</h4>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
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
                                                <td>{{ $value->nisn }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->class }}</td>
                                                <td>
                                                    <button onclick="edit('{{ $value->user_id }}')" class="btn btn-sm btn-success">Edit</button>
                                                    <a href="{{ url('admin/student/delete/' . $value->user_id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('page.student.edit')
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script type="text/javascript">
        $('li[menu="student"]').addClass('active')
    </script>
@endpush
