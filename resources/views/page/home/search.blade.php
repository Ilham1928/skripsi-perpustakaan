@extends('layout.web.main')

@push('css')
    <style media="screen">
        .input-search { height: 40px; background: rgba(255, 255, 255, 0.5); border:none; padding: 0 10px; }
        .input-search:focus { outline: none; }
        .btn-search { width: 100px; border-radius: none !important; border: none; cursor: pointer; background: #fff; color: #000; }
        .btn-search:focus { outline: none; }
        .btn-search:hover { background: whitesmoke; }
        .position-right { left: 20px; position: relative; }
        section{
            padding: 100px 0;
        }
        .card-content {
            padding: 10px;
        	border: 4px;
        	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            background: rgba(255, 255, 255, 0.5);
        }

        .card-img {
        	position: relative;
        	overflow: hidden;
        	border-radius: 0;
        	z-index: 1;
        }

        .card-img img {
        	width: 100%;
        	height: auto;
        	display: block;
        }

        .card-img span {
        	position: absolute;
            top: 15%;
            left: 12%;
            background: #1ABC9C;
            padding: 6px;
            color: #fff;
            font-size: 12px;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            transform: translate(-50%,-50%);
        }
    </style>
@endpush

@section('content')
<div style="background: rgb(0 0 0 / 0.44); height:99vh">
    <hr style="border:1px solid #fff; margin:0">
    <div class="container-fluid mt-5">
        <form action="{{ url('result') }}" method="post">
            <div class="offset-md-5 offset-lg-6 col-lg-6 col-md-7">
                <div class="input-group ">
                    @csrf
                    <input type="text" placeholder="Masukan kata kunci" class="w-75 input-search" name="keyword" value="">
                    <button type="submit" class="btn-search" name="button">Cari</button>
                </div>
            </div>
        </form>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
            <h4 class="text-white">Hasil Pencarian : {{ $keyword }}</h4>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5">
            <div class="row">
                @if($data->isEmpty())
                    <h4 class="text-white offset-md-1">Tidak ada hasil ...</h4>
                @else
                    @foreach($data as $value)
                        <div class="col-md-2 mb-5 mt-5">
                            <div class="card-content">
                                <div class="card-img">
                                    <img src="{{ $value->cover }}" alt="">
                                </div>
                                <div class="card-desc">
                                    <h4 class="mb-0">{{ $value->name }}</h4>
                                    <p class="mb-0">Penulis : {{ $value->writer }}</p>
                                    <p class="mb-0">Penerbit : {{ $value->publisher }}</p>
                                    <small>{{ date('Y', strtotime($value->publish_at)) }}</small>
                                    <hr>
                                    <center>
                                        <a href="#" class="btn btn-sm btn-search">Detail</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
