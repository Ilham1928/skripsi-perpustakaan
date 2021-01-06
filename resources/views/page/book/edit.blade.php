@push('css')
    <link rel="stylesheet" href="{{ asset('yearpicker/yearpicker.css') }}">
    <style media="screen">
        hr { border: 1px solid black; }
    </style>
@endpush
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form jq="edit" enctype="multipart/form-data" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-md-6">
                        <h4 class="modal-title">Tambah {{ $title }}</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-sm btn-primary pull-right" style="margin-left:10px;">Save</button>
                        <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="form-horizontal">
                        @if($errors->any())
                            <h4 style="text-align:center; color:red">{{$errors->first()}}</h4>
                        @endif
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Cover :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" autocomplete="off" class="form-control" name="cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 0;"></div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>ID Buku :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" disabled required autocomplete="off" class="form-control" name="uuid" jq="uuid">
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
                                        <select required autocomplete="off" class="form-control show-tick" name="category_id" jq="category_id">
                                            <option value="">--- Silakan Pilih ---</option>
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
                                        <input required autocomplete="off" type="text" class="form-control" name="name" jq="name">
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
                                        <input required autocomplete="off" type="text" class="form-control" name="writer" jq="writer">
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
                                        <input required autocomplete="off" type="text" class="form-control" name="publisher" jq="publisher">
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
                                        <input required autocomplete="off" type="text" class="yearpicker form-control" name="publish_at" jq="publish_at" />
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
                                        <input required autocomplete="off" type="number" class="form-control" name="stock" jq="stock">
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
    <script type="text/javascript">
        function edit(id) {
            $.ajax({
                url: '{{ url("/admin/book/edit") }}' +'/'+ id,
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                timeout: 5000,
                success: function(res){
                    if (res.code === 200) {
                        category(res.data.category_id)
                        $('#edit').modal('show')
                        $('input[jq="uuid"]').val(res.data.uuid)
                        $('input[jq="name"]').val(res.data.name)
                        $('input[jq="writer"]').val(res.data.writer)
                        $('input[jq="publisher"]').val(res.data.publisher)
                        $('input[jq="publish_at"]').val(res.data.publish_at.split('-').shift(-1))
                        $('input[jq="stock"]').val(res.data.stock)
                        $('form[jq="edit"]').attr('action', '{{ url("admin/book/edit/") }}' +'/'+ id)
                    }else{
                        window.location.replace('admin/book')
                    }
                }
            })
        }

        function category(id) {
            $.ajax({
                url: '{{ url("/admin/book/category") }}',
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                timeout: 5000,
                success: function(res){
                    if (res.code === 200) {
                        $.map(res.data, (item) => {
                            let selected = item.category_id === id ? 'selected' : ''
                            $('select[jq="category_id"]').append(
                                '<option '+ selected +' value="'+ item.category_id +'">'+item.name+'</option>'
                            )
                        })
                        $('select[jq="category_id"]').selectpicker('refresh')
                    }else{
                        window.location.replace('admin/book')
                    }
                }
            })
        }
    </script>
@endpush
