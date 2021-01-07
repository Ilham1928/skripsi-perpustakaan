@extends('layout.admin.main')

@push('css')
    <style media="screen">
        .d-none {
            display: none !important;
        }
    </style>
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>{{ $title }}</h2>
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
                                        <th>ID Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
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
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->student_name }}</td>
                                                <td>{{ $value->class }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->borrow_date)) }}</td>
                                                <td>
                                                    <span jq="return-text-{{ $value->borrow_id }}">
                                                        {{ date('d-m-Y', strtotime($value->return_date)) }}
                                                    </span>
                                                    <input type="date" class="form-control d-none"  name="return_date"
                                                        value="{{ $value->return_date }}"
                                                        jq="return-input-{{ $value->borrow_id }}"
                                                    />
                                                </td>
                                                <td>
                                                    <button jq="btn-save-{{ $value->borrow_id }}" onclick="update('{{ $value->borrow_id }}')" class="btn btn-sm btn-primary d-none">Simpan</button>
                                                    <button jq="btn-cancel-{{ $value->borrow_id }}" onclick="cancelIncrease('{{ $value->borrow_id }}')" class="btn btn-sm btn-danger d-none">Batal</button>

                                                    <button jq="btn-increase-{{ $value->borrow_id }}" onclick="increaseRental('{{ $value->borrow_id }}')" class="btn btn-sm btn-primary">Perpanjang</button>
                                                    <a jq="btn-delete-{{ $value->borrow_id }}" href="{{ url('admin/borrow/delete/' . $value->borrow_id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script type="text/javascript">
        $('li[menu="borrow"]').addClass('active')

        function increaseRental(id) {
            $('button[jq="btn-save-'+ id +'"]').removeClass('d-none')
            $('button[jq="btn-cancel-'+ id +'"]').removeClass('d-none')

            $('button[jq="btn-increase-'+ id +'"]').addClass('d-none')
            $('a[jq="btn-delete-'+ id +'"]').addClass('d-none')

            $('input[jq="return-input-'+ id +'"]').removeClass('d-none')
            $('span[jq="return-text-'+ id +'"]').addClass('d-none')
        }

        function cancelIncrease(id) {
            $('button[jq="btn-save-'+ id +'"]').addClass('d-none')
            $('button[jq="btn-cancel-'+ id +'"]').addClass('d-none')

            $('button[jq="btn-increase-'+ id +'"]').removeClass('d-none')
            $('a[jq="btn-delete-'+ id +'"]').removeClass('d-none')

            $('input[jq="return-input-'+ id +'"]').addClass('d-none')
            $('span[jq="return-text-'+ id +'"]').removeClass('d-none')
        }

        function update(id) {
            $.ajax({
                url: '{{ url("/admin/borrow/edit") }}' +'/'+ id,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    borrow_id: id,
                    return_date: $('input[jq="return-input-'+ id +'"]').val()
                },
                async: true,
                cache: false,
                timeout: 5000,
                success: function(res){
                    if (res.code === 200) {
                        window.location.reload()
                    }
                }
            })
        }
    </script>
@endpush
