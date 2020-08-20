<section class="content-header">
      <h1>
        Input User
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>User</li>
        <li class="active">Input</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-bold"><i class="fa fa-pencil"></i> Input Detail Pengiriman Barang</h3>
        </div>
        <div class="box-body">
          <form action="index.php?page=simpanuser" class="form-horizontal" method="POST" id="simpan">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label col-sm-3">Nama Lengkap:</label>
                <div class="col-sm-7">
                  <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">No. KTP:</label>
                <div class="col-sm-7">
                  <input type="text" name="noktp" class="form-control" placeholder="Masukkan Nomor KTP">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Alamat:</label>
                <div class="col-sm-7">
                  <textarea name="alamat" class="form-control" rows=3></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">No. Telepon:</label>
                <div class="col-sm-7">
                  <input type="text" name="notelp" class="form-control" placeholder="Masukkan Nomor Telepon">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Username:</label>
                <div class="col-sm-7">
                  <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Role:</label>
                <div class="col-sm-7">
                  <select name="roleid" class="form-control">
                    <option value=""> .:Pilihan:. </option>
                    <option value="1"> Program Administrator </option>
                    <option value="2"> Pimpinan </option>
                    <option value="3"> Administrasi </option>
                    <option value="4"> Sopir </option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Password:</label>
                <div class="col-sm-7">
                  <input type="password" id="password1" name="password1" class="form-control">
                </div>
              </div>
              <div id="pas2" class="form-group">
                <label class="control-label col-sm-3">Konfirmasi Password:</label>
                <div class="col-sm-7">
                  <input type="password" id="password2" name="password2" class="form-control">
                </div>
                <span><p id=pesan></p></span>
              </div>
              <!-- <div class="col-sm-offset-3 col-sm-4"><p id="pesan"></p></div> -->
            </div>
          </div>
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                  <button type="submit" id="savebtn" name="simpan" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                        &nbsp;
                        &nbsp;
                  <a href="index.php?page=daftaruser" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
                  <!-- <button type="button" href="pdf.php" class="btn btn-info" <?php if ($sts == 'Belum'){?> disabled <?php } else {?> / <?php } ?>><i class="fa fa-print"></i> Cetak Form</button> -->
                </div>
              </div>
            </div>
            
        </form>
        </div>
      </div>
    </section>
    <!-- /.content -->

<script>
  function cekpassword(){
    // console.log('hai');
    var pas1 = $('#password1').val();
    console.log(pas1);
    var pas2 = $('#password2').val();
    console.log(pas2);
    if(pas2 != pas1){
      $('#pas2').removeClass('has-success');
      $('#pas2').addClass('has-error');
      $('#pesan').css('color','red');
      $('#pesan').html('<i class="fa fa-times"></i> Password tidak sama');
    } else {
      $('#pas2').removeClass('has-error');
      $('#pas2').addClass('has-success');
      $('#pesan').css('color','green');
      $('#pesan').html('<i class="fa fa-check"></i>');
    }
  }

  $(document).ready(function() {
    $('#password2').on('keyup', cekpassword);
    // $('#provinsipenerima').on('change',carikotapenerima);
    // $('#simpan').validateEngine();
    // $('#simpan').on('submit', function(e) {
    //   var $this = $(this);
    //   e.preventDefault();
    //   bootbox.confirm('Simpan data?',function(a){
    //             if (a == true){
    //                 $.ajax({
    //                     url : 'proses/inputpengiriman.php',
    //                     type : 'POST',
    //                     data : $this.serialize(),
    //                     success:function(response){
    //                       console.log(response);
    //                     },
    //                 });
    //             }
    //         });
    // })
  })
</script>
