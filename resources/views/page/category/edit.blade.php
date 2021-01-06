@push('css')
    <style media="screen">
        hr { border: 1px solid black; }
    </style>
@endpush
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form jq="edit" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-md-6">
                        <h4 class="modal-title">Ubah {{ $title }}</h4>
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
                                        <input autocomplete="off" required jq="edit" type="text" class="form-control" name="name">
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

@push('js')
    <script type="text/javascript">
        function edit(id) {
            $.ajax({
                url: '{{ url("/admin/category/edit") }}' +'/'+ id,
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                timeout: 5000,
                success: function(res){
                    if (res.code === 200) {
                        $('#edit').modal('show')
                        $('input[jq="edit"]').val(res.data.name)
                        $('form[jq="edit"]').attr('action', '{{ url("admin/category/edit/") }}' +'/'+ id)
                    }else{
                        window.location.replace('admin/category')
                    }
                }
            })
        }
    </script>
@endpush
