<?php
  include "../config/config.php";
  $getnomax = mysqli_query($con, "SELECT max(no) as max FROM tr_pengiriman");
  $nomax = mysqli_fetch_array($getnomax);
  // echo $nomax['max']+1;
  // echo $data['max']+1;
  $nomor = date('d').date('m').date('Y').str_pad(($nomax['max']+1),5,0, STR_PAD_LEFT);
?>
<section class="content-header">
      <h1>
        Input Pengiriman Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Pengiriman</li>
        <li class="active">Input</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="col-md-6">
            <h3 class="box-title text-bold"><i class="fa fa-pencil"></i> Input Detail Pengiriman Barang</h3>
          </div>
          <div class="col-md-6">
            <h3 class="box-title text-bold"><i class="fa fa-send"></i> Data Pengirim</h3>
          </div>
        </div>
        <div class="box-body">
          <form action="index.php?page=simpanpengiriman" class="form-horizontal" method="POST" id="simpan">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-3 control-label">No. Resi:</label>
                <div class="col-sm-7">
                  <input type="text" name="noresi" class="form-control" value="<?php echo $nomor; ?>" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Pengiriman:</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <input type="text" class="form-control tgl" name="tglkirim" placeholder="Masukkan Tanggal Kirim"/>
                    <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" name="jamkirim" class="form-control jam" placeholder="Masukkan Jam Kirim">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Penerima:</label>
                  <div class="col-sm-9">
                    <input type="text" name="namapenerima" class="form-control" placeholder="Masukkan Nama penerima">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Penerima:</label>
                  <div class="col-sm-9">
                    <textarea name="alamatpenerima" class="form-control" placeholder="Masukkan Alamat penerima" rows="5"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Provinsi:</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="provinsipenerima" v-model='provinsi' name="provpenerima" @change="cekharga">
                        <?php
                        include "../config/config.php";
                        $query = "SELECT * FROM provinces";
                        $hasil = mysqli_query($con, $query);
                        while($data = mysqli_fetch_array($hasil))
                        {
                          echo "<option value='".$data['id']."'>".$data['namaprov']."</option>";
                        }
                        ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kota:</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="kotapenerima" value="" selected="selected" name="kotapenerima">
                        <option value=""> - </option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Pos:</label>
                      <div class="col-sm-6">
                        <input type="text" name="kodepospenerima" class="form-control" placeholder="Kode Pos">
                      </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">No. Telepon:</label>
                  <div class="col-sm-9">
                    <input type="text" name="telppenerima" class="form-control" placeholder="Masukkan No. Telp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Biaya Pengiriman:</label>
                  <div class="col-sm-7">
                    <input type="text" name="biayapengiriman" class="form-control" placeholder="Masukkan Biaya" v-model="harga" readonly/><span> *Harga per Kg</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Berat (KG):</label>
                  <div class="col-sm-7">
                    <input type="text" name="beratbarang" class="form-control" @keyup="cekharga" v-model="berat" placeholder="Minimal 10 kg, jika 1-9 kg harga = 20.000">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Total Bayar:</label>
                  <div class="col-sm-7">
                    <input type="text" name="totalbayar" class="form-control" placeholder="Masukkan Biaya" v-model="totbayar" readonly/>
                  </div>
                </div>
              <!-- <div class="form-group">
                <label class="col-sm-3 control-label">Tujuan:</label>
                <div class="col-sm-7">
                  <input type="text" name="tujuan" class="form-control" placeholder="Kota Tujuan">
                </div>
              </div> -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                      <p><label><input @change="cekdaftar" type="radio" name="cekkirim" value="1" v-model="cekkirim"> Sudah pernah mengirim</label>&nbsp;&nbsp;&nbsp; <label><input @change="cekdaftar" type="radio" name="cekkirim" value="0" v-model="cekkirim"> Belum pernah mengirim</label></p>
                    </div>
                  </div>
                  <div v-show="cekkirim == 1">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kode Pelanggan:</label>
                      <div class="col-sm-5">
                        <select name="kdplg" id="kdplg" class="form-control select2" v-model="kdplg">
                          <option value="">.:Pilihan:.</option>
                          <?php
                            include "../config/config.php";
                            $query = mysqli_query($con, "SELECT * FROM master_pelanggan");
                            while($data = mysqli_fetch_array($query)){
                              echo "<option value='".$data['kdplg']."'>".$data['kdplg']." - ".$data['nama']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- v-else -->
                  <div v-else>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kode Pelanggan:</label>
                      <div class="col-sm-5">
                        <input type="text" name="kdplg2" class="form-control" maxlength="4" placeholder="Contoh: P001; P002; dst..">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Pengirim:</label>
                      <div class="col-sm-9">
                        <input type="text" name="namapengirim" class="form-control" v-model="pelanggan.nama" v-bind:value="pelanggan.nama" placeholder="Masukkan Nama Pengirim">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Alamat Pengirim:</label>
                      <div class="col-sm-9">
                        <textarea name="alamatpengirim" class="form-control" v-model="pelanggan.alamat" v-bind:value="pelanggan.alamat" placeholder="Masukkan Alamat Pengirim" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Provinsi:</label>
                      <div class="col-sm-9"> 
                        <select class="form-control" id="provinsi" name="provpengirim" v-model="pelanggan.id_provinsi">
                            <?php
                            include "../config/config.php";

                            $query = "SELECT * FROM provinces";
                            $hasil = mysqli_query($con, $query);
                            while($data = mysqli_fetch_array($hasil))
                            {
                              echo "<option value='".$data['id']."' :selected=(".$data['id']."==pelanggan.id_provinsi)?true:false>".$data['namaprov']."</option>";
                            }
                            ?>
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kota:</label>
                        <div class="col-sm-9">
                          <select class="form-control kota" id="kota" name="kotapengirim" v-model="pelanggan.kota">
                            <option value=""> - </option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kode Pos:</label>
                          <div class="col-sm-6">
                            <input type="text" name="kodepospengirim" class="form-control" v-model="pelanggan.kodepos" v-bind:value="pelanggan.kodepos" placeholder="Kode Pos">
                          </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No. Telepon:</label>
                      <div class="col-sm-9">
                        <input type="text" name="telppengirim" class="form-control" v-model="pelanggan.notelp" v-bind:value="pelanggan.notelp" placeholder="Masukkan No. Telp">
                      </div>
                    </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Deskripsi Pengiriman:</label>
                    <div class="col-sm-9">
                      <input type="text" name="deskripsipengirim" id="desk" class="form-control" placeholder="Masukkan Deskripsi Pengiriman">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-7">
                      <p>Ada barang berbahaya? &nbsp;&nbsp;<label><input type="radio" name="isbahaya" value="1"> Ya</label>&nbsp; <label><input type="radio" name="isbahaya" value="0"> Tidak</label></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Keterangan Pengiriman:</label>
                    <div class="col-sm-9">
                      <textarea name="ketpengirim" class="form-control" placeholder="Masukkan Keterangan Pengiriman"></textarea>
                    </div>
                  </div>
              <!-- <div class="form-group">
                <label class="col-sm-3 control-label">Jenis Pengiriman:</label>
                <div class="col-sm-7">
                  <input type="text" name="jenispengiriman" class="form-control" placeholder="Masukkan Jenis Pengiriman">
                </div>
              </div> -->
              
            </div>
          </div>
          <!-- <br>
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
                
              </div>

              <div class="col-md-6">
              </div>
            </div> -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                  <button type="submit" id="savebtn" name="simpan" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
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
  Vue.directive('select', {
      twoWay: true,
      bind: function (el, binding, vnode) {
        $(el).select2().on("select2:select", (e) => {
          // v-model looks for
          //  - an event named "change"
          //  - a value with property path "$event.target.value"
          el.dispatchEvent(new Event('change', { target: e.target }));
        });
      },
    });
  var app = new Vue({
    el: '#content',
    data: {
      kdplg: "",
      cekkirim:0,
      pelanggan: {},
      harga:0,
      provinsi:"",
      berat:"",
      totbayar:0
    }, 
    methods: {

      cekharga(){
        if(this.berat == "" || this.berat > 9){
          this.harga = 0;
          axios.get("proses/cekharga.php?id_prov="+this.provinsi)
            .then(response => {
              console.log(response);
              this.harga = response.data;
              this.totbayar = this.harga * this.berat;
            })
            .catch(error => {
              console.log(error.response);
            })
        } else {
          this.harga = 20000;
          this.totbayar = this.harga * this.berat;
        }
      },
      cekpelanggan(){
        axios.get("proses/cekpelanggan.php?kdplg="+this.kdplg)
          .then(response => {
            var data = response.data;
            console.log(data);
            if(data.status === 200) {
              $('#pesan').html("<i class='fa fa-check'></i> "+data.message);
            } else {
              $('#pesan').html("<i class='fa fa-times'></i> "+data.message);
            }
          })
          .catch(error => {

          })
      },
      cekdaftar(){
        $('#kdplg').select2({});
        this.kdplg = "";
        this.pelanggan = {};
      },
      carikota(id){
        var kota = this.pelanggan.id_kota;
          $.ajax({
              url: 'proses/carikota.php',
              type: 'GET',
              data: {'id_prov': id, 'id_kota': kota},
              success:function(response){
                  $('.kota').html(response);
              }
          });
       },
      isipelanggan(){
        this.kdplg = $('#kdplg').val();
        console.log(this.kdplg);
        axios.get('proses/cekpelanggan.php?kdplg='+this.kdplg)
          .then(response => {
            var data = response.data;
            console.log(data);
            this.pelanggan = data.data[0];
            this.carikota(this.pelanggan.id_provinsi);
            $('#desk').focus();
          })
          .catch(error => {

          })
      },
      ribuan(nomer) {
        return nomer.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
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

   $('#kdplg').change(function(){
    app.isipelanggan();
   })

  $(document).ready(function() {
    $('#kdplg').select2({})
    $('.tgl').datetimepicker({format: "DD-MM-YYYY"});
    $('.jam').datetimepicker({
      format: "HH:mm:ss",
    });
    $('#provinsi').on('change',carikota);
    $('#provinsipenerima').on('change',carikotapenerima);
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
