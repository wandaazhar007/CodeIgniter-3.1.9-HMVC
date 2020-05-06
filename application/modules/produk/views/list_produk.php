<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="" class="btn btn-primary view-data2" id="22" data-toggle="modal" data-target="#exampleModal">test tombol</a>
                <table id="tabel_produk" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Barcode</th>
                            <th width="30%">Nama Produk</th>
                            <th width="10%">Price</th>
                            <th width="10%">Stok</th>
                            <th width="10%">Expired Date</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>


<!--Modal-->
<!-- <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="detailModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Profil Dokter</h4>
            </div>
            <div class="modal-body">

                <div id="getModal">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div> -->


<!-- /modals -->
<div class="modal fade" id="detailModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                <div id="resultProduk">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->