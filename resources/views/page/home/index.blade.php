@extends('layout.web.main')

@section('content')
    <div class="s002">
        <form action="{{ url('result') }}" method="get">
            <fieldset>
                <legend style="font-size:25px;">Masuka dua atau lebih kata kunci dari judul, pengarang, atau subyek</legend>
            </fieldset>
            <div class="inner-form">
                <div class="input-field first-wrap">
                    <input autocomplete="off" id="search" type="text" name="keyword" placeholder="Apa yang kamu cari?" />
                </div>
                <div class="input-field fifth-wrap">
                    @csrf
                    <button class="btn-search" type="submit">Pencarian</button>
                </div>
            </div>
        </form>
    </div>
@endsection
