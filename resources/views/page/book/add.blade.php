@push('css')
    <link rel="stylesheet" href="{{ asset('yearpicker/yearpicker.css') }}">
    <style media="screen">
        hr { border: 1px solid black; }
    </style>
@endpush
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{ url('admin/book/add') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-md-6">
                        <h4 class="modal-title">Tambah Data Buku</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-sm btn-primary pull-right" style="margin-left:10px;">Save</button>
                        <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>ID Buku :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="uuid" value="{{ request()->old('uuid') ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Kategori Buku :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="category_id">
                                            <option value="">--- Silakan Pilih ---</option>
                                            @foreach($category as $value)
                                                <option value="{{ $value->category_id }}">{{ $value->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Judul Buku :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" value="{{ request()->old('name') ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Pengarang</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="writer" value="{{ request()->old('writer') ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Penerbit</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="publisher" value="{{ request()->old('publisher') ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Tahun Terbit</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="yearpicker form-control" name="publish_date" value="{{ request()->old('publish_date') ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Jml. Buku</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="stock" value="{{ request()->old('stock') ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('js')
    <script src="{{ asset('yearpicker/yearpicker.js') }}" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
            $(".yearpicker").yearpicker({
                year: 2021,
                startYear: 1880,
                endYear: 2030
            });
        });
    </script>
@endpush
