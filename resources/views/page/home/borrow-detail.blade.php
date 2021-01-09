<div class="modal" id="detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  style="background: rgb(255 255 255 / 68%)">
            <div class="modal-body">
                <form method="post">
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
                    <div class="d-flex">
                        <label class="form-control-label font-weight-bold col-sm-2">Tanggal Pinjam</label>
                        <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                        <label class="col-md" jq="borrow_date"></label>
                    </div>
                    <div class="d-flex" jq="borrow">
                        <label class="form-control-label font-weight-bold col-sm-2">Tanggal Kembali</label>
                        <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                        <label class="col-md" jq="return_date"></label>
                    </div>
                    <div class="d-none" jq="return">
                        <label class="form-control-label font-weight-bold col-sm-2">Tanggal Kembali</label>
                        <label class="form-control-label font-weight-bold col-xs-1"> : </label>
                        <label class="col-md">
                            @csrf
                            <input type="date" required jq="return_date" name="return_date" class="form-control col-md-5">
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-search" data-dismiss="modal">Tutup</button>
                    <button type="button" jq="borrow" class="btn btn-search" onclick="borrow()">Perpanjang</button>
                    <button type="submit" class="btn btn-search d-none" jq="save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
<script type="text/javascript">

    function detail(id) {
        var user_id = '{{ $_COOKIE["__idx"] ?? "" }}'
        $.ajax({
            url: '{{ url("borrow/detail") }}' +'/'+ id,
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
                    $('label[jq="borrow_date"]').empty().append(res.data.borrow_date)
                    $('label[jq="return_date"]').empty().append(res.data.return_date)
                    $('input[jq="return_date"]').val(res.data.return_date)
                    $('img[jq="cover"]').attr('src', res.data.cover)
                    $('form[method="post"]').attr('action', '{{ url("borrow/update") }}' + '/' + id)
                }else{
                    $('#detail').modal('close')
                }
            }
        })
    }

    function borrow() {
        var type = '{{ $_COOKIE["is_user"] ?? "" }}'

        if (!type || type === "") {
            window.location.assign('login')
        }else{
            $('div[jq="return"]').removeClass('d-none').addClass('d-flex')
            $('button[jq="borrow"]').addClass('d-none')
            $('div[jq="borrow"]').addClass('d-none').removeClass('d-flex')
            $('button[jq="save"]').removeClass('d-none')
        }
    }

    function cancel() {
        $('div[jq="return"]').removeClass('d-flex').addClass('d-none')
        $('button[jq="borrow"]').renoveClass('d-none')
        $('div[jq="borrow"]').renoveClass('d-none')
        $('button[jq="save"]').addClass('d-none')
    }
</script>
@endpush
