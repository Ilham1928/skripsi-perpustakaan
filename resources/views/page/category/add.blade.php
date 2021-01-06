@push('css')
    <style media="screen">
        hr { border: 1px solid black; }
    </style>
@endpush
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{ url('admin/category/add') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-md-6">
                        <h4 class="modal-title">Tambah {{ $title }}</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                                <label>Nama Kategori</label>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input required type="text" class="form-control" name="name" value="{{ request()->old('name') ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
