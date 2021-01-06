@extends('layout.admin.main')

@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="info-box bg-blue hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">swap_vertical_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">TRANSAKSI PINJAM</div>
                        <div class="number count-to" style="margin-top:0;">{{ $data->total_transaction }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="info-box bg-amber hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">layers</i>
                    </div>
                    <div class="content">
                        <div class="text">JUMLAH BUKU</div>
                        <div class="number count-to" style="margin-top:0">{{ $data->total_book }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="info-box bg-red hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        <div class="text">Data Siswa</div>
                        <div class="number count-to" style="margin-top:0">{{ $data->total_student }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script type="text/javascript">
        $('li[menu="dashboard"]').addClass('active')
    </script>
@endpush
