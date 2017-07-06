<style type="text/css">
    .mr{
        margin-bottom: 10px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Admin </h5>
            </div>
            <div class="ibox-content">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal4" onclick="viewTambah()"><i class="fa fa-plus"></i> Tambah Admin</button>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Nomor HP</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody id="adminText">
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="row mr" >
                    <label class="col-sm-3 ">Nama</label>
                    <div class="col-sm-9"><input type="text" class="form-control" id="Inama"></div>
                </div>
                <div class="row mr">
                    <label class="col-sm-3 ">Nomor HP</label>
                    <div class="col-sm-9"><input type="text" class="form-control" id="Inope"></div>
                </div>
                <div class="row mr">
                    <label class="col-sm-3 ">Password</label>
                    <div class="col-sm-9"><input type="text" class="form-control" id="Ipass">
                    <span id="Iket">*Input Password untuk mengganti </span></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="simpan()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var Jadmin=[];
    var Jid=0;
    var jenis='tambah';
    function selectData(){
        $('#adminText').html('<tr><td colspan="4"><h4 align="center">Loading...</h4></td></tr>');
        $.ajax({
            // type:"POST",
            url: "{{URL::to('admin/administrator/show')}}",
            success: function(hasil) {
                Jadmin = $.parseJSON(hasil);
                $('#adminText').html('');

                for (var i=0;i<Jadmin.length;++i){
                    $('#adminText').append('<tr><td>'+(i+1)+'</td><td>'+Jadmin[i].nama+'</td><td>'+Jadmin[i].no_telp+'</td><td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal4" onclick="viewEdit('+i+')">Edit</button><button class="btn btn-danger" style="margin-left:10px;" onclick="hapus('+Jadmin[i].id_admin+')">Hapus</button></td></tr>');
                }
            }
        });
    }
    selectData();

    function viewEdit(i){
        jenis='edit';
        Jid=i;
        $('#Inama').val(Jadmin[i].nama);
        $('#Inope').val(Jadmin[i].no_telp);
        $('#Ipass').val('-');
        $('#Iket').show();
    }
    function viewTambah(){
        jenis='tambah';
        $('#Inama').val();
        $('#Inope').val();
        $('#Ipass').val();
        $('#Iket').hide();
    }

    function simpan(){
        if(jenis=='tambah'){
            insert();
        }else if(jenis=='edit'){
            update();
        }
    }

    function insert(){
        var Inama = $('#Inama').val();
        var Inope = $('#Inope').val();
        var Ipass = $('#Ipass').val();
        $.ajax({
            type:"POST",
            url: "{{URL::to('admin/administrator/create')}}",
            data:"nama="+Inama+"&nope="+Inope+"&pass="+Ipass+"&_token={{ csrf_token() }}",
            success: function(hasil) {
                if(hasil == 'success'){
                    selectData();
                    swal("Berhasil!", "Data berhasil di input !", "success");
                }else{
                    swal("Gagal", "Data gagal di input", "error");
                }
            }
        });
    }
    function update(){
        var Inama = $('#Inama').val();
        var Inope = $('#Inope').val();
        var Ipass = $('#Ipass').val();

        $.ajax({
            type:"POST",
            url: "{{URL::to('admin/administrator/edit')}}",
            data:"ex="+Jadmin[Jid].id_admin+"&nama="+Inama+"&nope="+Inope+"&pass="+Ipass+"&_token={{ csrf_token() }}",
            success: function(hasil) {
                if(hasil == 'success'){
                    selectData();
                    swal("Berhasil!", "Data berhasil di perbaharui", "success");
                }else{
                    swal("Gagal", "Data gagal di perbaharui", "error");
                }
            }
        });
    }
    function hapus(id){
        swal({
            title: "Apakah anda yakin ?",
            text: "Akun tidak dapat dikembalikan !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type:"POST",
                url: "{{URL::to('admin/administrator/hapus/')}}",
                data:"ex="+id+"&_token={{ csrf_token() }}",
                success: function(hasil) {
                    if(hasil == 'success'){
                        selectData();
                        swal("Berhasil!", "Data berhasil di hapus.", "success");
                    }else{
                        swal("Gagal", "Data gagal di hapus", "error");
                    }
                }
            });   
        });
    }


</script>