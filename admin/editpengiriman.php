<section class="content-header">
      <h1>
        Edit Pengiriman Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Pengiriman</li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-bold"><i class="fa fa-pencil"></i> Edit Pengiriman Barang</h3>
        </div>
        <div class="box-body">
          <form action="index.php?page=updatepengiriman" class="form-horizontal" method="POST">
          <div class="row">
            <div class="col-md-6">
              <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
              <div class="form-group">
                <label class="col-sm-3 control-label">No. Resi:</label>
                <div class="col-sm-7">
                  <input type="text" name="noresi" class="form-control" v-model="form.noresi" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Pengiriman:</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <input type="text" class="form-control tgl" name="tglkirim" v-model="form.tgl_kirim" placeholder="Masukkan Tanggal Kirim" readonly/>
                    <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" name="jamkirim" class="form-control jam" v-model="form.jam_kirim" placeholder="Masukkan Jam Kirim" readonly/>
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="col-sm-3 control-label">Tujuan:</label>
                <div class="col-sm-7">
                  <input type="text" name="tujuan" class="form-control" v-model="form.tujuan" placeholder="Kota Tujuan" readonly/>
                </div>
              </div> -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-3 control-label">Berat (KG):</label>
                <div class="col-sm-7">
                  <input type="text" name="beratbarang" class="form-control" v-model="form.berat" placeholder="Masukkan Berat Barang" readonly/>
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="col-sm-3 control-label">Jenis Pengiriman:</label>
                <div class="col-sm-7">
                  <input type="text" name="jenispengiriman" class="form-control" placeholder="Masukkan Jenis Pengiriman">
                </div>
              </div> -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Biaya Pengiriman:</label>
                <div class="col-sm-7">
                  <input type="text" name="biayapengiriman" class="form-control" v-model="form.biaya" placeholder="Masukkan Biaya" readonly/>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Total Bayar:</label>
                  <div class="col-sm-7">
                    <input type="text" name="totalbayar" class="form-control" placeholder="Masukkan Biaya" v-model="form.totbiaya" readonly/>
                  </div>
                </div>
            </div>
          </div>
          <br>
                  <!-- <hr class="no-padding" style="margin-top: 10px !important; margin-bottom: 10px !important;"> -->
            <div class="row">
              <div class="col-sm-10">
                <div class="col-sm-5">
            <h4 class="text-bold"><i class="fa fa-send"></i> Data Pengirim</h4>
                </div>
                <div class="col-sm-5">
                  <h4 class="text-bold pull-right"><i class="fa fa-gift"></i> Data Penerima</h4>
                </div>
              </div>
            </div>
            <hr class="no-padding" style="margin-top: 10px !important; margin-bottom: 10px !important;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Pengirim:</label>
                  <div class="col-sm-9">
                    <input type="text" name="namapengirim" v-model="form.namapengirim" class="form-control" placeholder="Masukkan Nama Pengirim" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Pengirim:</label>
                  <div class="col-sm-9">
                    <textarea name="alamatpengirim" class="form-control" v-model="form.alamatpengirim" placeholder="Masukkan Alamat Pengirim" rows="5" readonly/></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Provinsi:</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="provinsi" v-model="form.provpengirim" name="provpengirim" readonly>
                        <?php
                        include "../config/config.php";
                        $query = "SELECT * FROM provinces";
                        $hasil = mysqli_query($con, $query);
                        while($data = mysqli_fetch_array($hasil))
                        {
                          echo "<option value='".$data['id']."' :selected=(".$data['id']."==form.provpengirim)?true:false>".$data['namaprov']."</option>";
                        }
                        ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kota:</label>
                    <div class="col-sm-9">
                      <select class="form-control kota" id="kota" v-model="form.kotapengirim" name="kotapengirim" readonly>
                        <option value=""> - </option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Pos:</label>
                      <div class="col-sm-6">
                        <input type="text" name="kodepospengirim" class="form-control" v-model="form.kodepospengirim" placeholder="Kode Pos" readonly/>
                      </div>
                </div>
                <!-- <div class="form-group">
                  <label class="col-sm-3 control-label">Negara:</label>
                  <div class="col-sm-9">
                    <input type="text" name="negarapengirim" class="form-control" placeholder="Masukkan Negara Pengirim">
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">No. Telepon:</label>
                  <div class="col-sm-9">
                    <input type="text" name="telppengirim" class="form-control" v-model="form.telppengirim" placeholder="Masukkan No. Telp" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Deskripsi Pengiriman:</label>
                  <div class="col-sm-9">
                    <input type="text" name="deskripsipengirim" class="form-control" v-model="form.deskripsipengirim" placeholder="Masukkan Deskripsi Pengiriman" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-7">
                    <p>Ada barang berbahaya? &nbsp;&nbsp;<label><input type="radio" name="isbahaya" value="1" checked="check1" readonly> Ya</label>&nbsp; <label><input type="radio" name="isbahaya" value="0" checked="=check2" readonly> Tidak</label></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan Pengiriman:</label>
                  <div class="col-sm-9">
                    <textarea name="ketpengirim" class="form-control" v-model="form.ketpengirim" placeholder="Masukkan Keterangan Pengiriman" readonly/></textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Penerima:</label>
                  <div class="col-sm-9">
                    <input type="text" name="namapenerima" class="form-control" v-model="form.namapenerima" placeholder="Masukkan Nama penerima" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Penerima:</label>
                  <div class="col-sm-9">
                    <textarea name="alamatpenerima" class="form-control" v-model="form.alamatpenerima" placeholder="Masukkan Alamat penerima" rows="5" readonly/></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Provinsi:</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="provinsipenerima" name="provpenerima" v-model="form.provpenerima" readonly>
                        <?php
                        include "../config/config.php";
                        $query = "SELECT * FROM provinces";
                        $hasil = mysqli_query($con, $query);
                        while($data = mysqli_fetch_array($hasil))
                        {
                          echo "<option value='".$data['id']."' :selected=(".$data['id']."==form.provpenerima)?true:false>".$data['namaprov']."</option>";
                        }
                        ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kota:</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="kotapenerima" v-model="form.kotapenerima" name="kotapenerima" readonly>
                        <option value=""> - </option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Pos:</label>
                      <div class="col-sm-6">
                        <input type="text" name="kodepospenerima" class="form-control" v-model="form.kodepospenerima" placeholder="Kode Pos" readonly/>
                      </div>
                </div>
                <!-- <div class="form-group">
                  <label class="col-sm-3 control-label">Negara:</label>
                  <div class="col-sm-9">
                    <input type="text" name="negarapenerima" class="form-control" placeholder="Masukkan Negara penerima">
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">No. Telepon:</label>
                  <div class="col-sm-9">
                    <input type="text" name="telppenerima" class="form-control" v-model="form.telppenerima" placeholder="Masukkan No. Telp" readonly/>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="col-sm-3 control-label">Deskripsi Barang:</label>
                  <div class="col-sm-9">
                    <input type="text" name="deskripsibarang" class="form-control" v-model="form.deskripsibarang" placeholder="Masukkan Deskripsi Barang" readonly/>
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Status Pengiriman:</label>
                  <div class="col-sm-9">
                    <select name="sts_kirim" class="form-control">
                      <option value="" :selected="(form.sts_kirim==)?true:false"> .:Pilihan:. </option>
                      <option value="1" :selected="(form.sts_kirim==1)?true:false"> Sedang Dalam Proses </option>
                      <option value="2" :selected="(form.sts_kirim==2)?true:false"> Paket Sudah Diterima </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                        &nbsp;
                        &nbsp;
                  <a href="index.php?page=daftarpengiriman" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
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
  var id = "<?php echo $_GET['id']; ?>"
  new Vue({
    el: '#content',
    data: {
      id: '',
      check1: false,
      check2: false,
      form: {}
    },
    methods: {
      getData(){
        axios.get('services/getPengirimanApi.php?id='+id)
        .then(response => {
          console.log(response.data);
          var data = response.data.data[0];
          console.log(data.noresi);
          this.form = data;
          if(data.isbahaya == 1){
            this.check1 = true;
          } else {
            this.check2 = true;
          }
          this.carikota(data.provpengirim);
          this.carikotapenerima(data.provpenerima);
          // this.form.noresi = data.noresi;
        })
      },
      carikota(id){
        var kota = this.form.kotapengirim;
          $.ajax({
              url: 'proses/carikota.php',
              type: 'GET',
              data: {'id_prov': id, 'id_kota': kota},
              success:function(response){
                  $('.kota').html(response);
              }
          });
       },
      carikotapenerima(id){
        var kota = this.form.kotapenerima;
          $.ajax({
              url: 'proses/carikota.php',
              type: 'GET',
              data: {'id_prov': id, 'id_kota': kota},
              success:function(response){
                  $('#kotapenerima').html(response);
              }
          });
      }
    },
    created(){
      this.getData();
    }
  })
  function carikota(e){
      e.preventDefault();
      var id = $('#provinsi').val();
      $.ajax({
          url: 'proses/carikota.php',
          type: 'GET',
          data: {'id_prov': id},
          success:function(response){
              $('.kota').html(response);
          }
      });
   }

   function carikotapenerima(e){
      e.preventDefault();
      var id = $('#provinsipenerima').val();
      $.ajax({
          url: 'proses/carikota.php',
          type: 'GET',
          data: {'id_prov': id},
          success:function(response){
              $('#kotapenerima').html(response);
          }
      });
   }

  $(document).ready(function() {
    $('.tgl').datetimepicker({format: "DD-MM-YYYY"});
    $('.jam').datetimepicker({
      format: "HH:mm:ss",
    })
    // $('#provinsi').on('change',carikota);
    // $('#provinsipenerima').on('change',carikotapenerima);
  })
</script>