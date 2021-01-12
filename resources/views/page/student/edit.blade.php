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
                        <button type="submit" class="btn btn-sm btn-primary pull-right" style="margin-left:10px;">Save</button>
                        <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>NISN :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input required type="number" disabled autocomplete="off" class="form-control" name="nisn" jq="nisn">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Nama :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input required type="text" autocomplete="off" class="form-control" name="name" jq="name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Kelas :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input required type="text" autocomplete="off" class="form-control" name="class" jq="class">
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
    <script type="text/javascript">
        function edit(id) {
            $.ajax({
                url: '{{ url("/admin/student/edit") }}' +'/'+ id,
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                timeout: 5000,
                success: function(res){
                    if (res.code === 200) {
                        $('#edit').modal('show')
                        $('input[jq="nisn"]').val(res.data.nisn)
                        $('input[jq="name"]').val(res.data.name)
                        $('input[jq="class"]').val(res.data.class)
                        $('form[jq="edit"]').attr('action', '{{ url("admin/student/edit/") }}' +'/'+ id)
                    }else{
                        window.location.replace('admin/student')
                    }
                }
            })
        }
    </script>
@endpush
