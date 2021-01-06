<div class="modal" id="detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  style="background: rgb(255 255 255 / 68%)">
            <div class="modal-body">
                <div class="card-content">
                    <div class="card-img">
                        <img jq="cover" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <label class="form-control-label font-weight-bold col-sm-2">Nama Buku</label>
                    <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                    <label class="col-md" jq="name"></label>
                </div>
                <div class="d-flex">
                    <label class="form-control-label font-weight-bold col-sm-2">Penulis</label>
                    <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                    <label class="col-md" jq="writer"></label>
                </div>
                <div class="d-flex">
                    <label class="form-control-label font-weight-bold col-sm-2">Penerbit</label>
                    <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                    <label class="col-md" jq="publisher"></label>
                </div>
                <div class="d-flex">
                    <label class="form-control-label font-weight-bold col-sm-2">Tahun Terbit</label>
                    <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                    <label class="col-md" jq="publish_at"></label>
                </div>
                <div class="d-flex">
                    <label class="form-control-label font-weight-bold col-sm-2">ID Buku</label>
                    <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                    <label class="col-md" jq="uuid"></label>
                </div>
                <div class="d-flex">
                    <label class="form-control-label font-weight-bold col-sm-2">Stok Buku</label>
                    <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                    <label class="col-md" jq="stock"></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-search" data-dismiss="modal">Tutup</button>
                <a href="{{ url('borrow') }}" class="btn btn-search" data-dismiss="modal">Pinjam</a>
            </div>
        </div>
    </div>
</div>

@push('js')
<script type="text/javascript">
    function detail(id) {
        $.ajax({
            url: '{{ url("detail") }}' +'/'+ id,
            type: 'GET',
            dataType: 'json',
            async: true,
            cache: false,
            timeout: 5000,
            success: function(res){
                if (res.code === 200) {
                    $('#detail').modal('show')
                    $('label[jq="name"]').empty().append(res.data.name)
                    $('label[jq="writer"]').empty().append(res.data.writer)
                    $('label[jq="publisher"]').empty().append(res.data.uuid)
                    $('label[jq="publish_at"]').empty().append(res.data.publish_at.split('-').shift(-1))
                    $('label[jq="uuid"]').empty().append(res.data.uuid)
                    $('label[jq="stock"]').empty().append(res.data.stock)
                    $('img[jq="cover"]').attr('src', res.data.cover)
                }else{
                    $('#detail').modal('close')
                }
            }
        })
    }
</script>
@endpush
