@extends('layout.web.main')

@section('content')
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
@endsection
