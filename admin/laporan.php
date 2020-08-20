<section class="content-header">
    <h1>
        Laporan Bulanan<small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"> Dashboard</a></li>
        <li class="active">Laporan Bulanan</li>
    </ol>
</section>
<section class="content" id="content">
    <div class="box box-primary">
        <!-- <div class="box-header with-border">
            <a class="btn btn-primary" href="index.php?page=inputpengiriman"><i class="fa fa-plus-square"></i> Buat Baru</a>
            <div class="box-tools pull-right">
              <form action="daftarpengiriman.php" method="GET">
                <div class="input-group" style="width: 200px;">
                  <input type="text" class="form-control" name="search" v-model="cari" v-on:keyup="load" placeholder="Cari no. resi">
                </div>
              </form>
            </div>
        </div> -->
        
        <div class="no-padding" style="background: #eaeaea">
          <br>
          <div class="row">
            <div class="col-sm-3">
              <div class="box box-solid box-default">
                <div class="box-body">
                  <select class="form-control" name="bulan" v-model="bulan">
                    <option value=""> - </option>
                    <option value="01"> Januari </option>
                    <option value="02"> Februari </option>
                    <option value="03"> Maret </option>
                    <option value="04"> April </option>
                    <option value="05"> Mei </option>
                    <option value="06"> Juni </option>
                    <option value="07"> Juli </option>
                    <option value="08"> Agustus </option>
                    <option value="09"> September </option>
                    <option value="10"> Oktober </option>
                    <option value="11"> November </option>
                    <option value="12"> Desember </option>
                  </select>
                  <br>
                  <button @click="load" class="btn btn-success" type="button" style="width: 100%">Proses</button>
                  <br>
                  <br>
                  <a class="btn btn-info" :href="'cetaklaporan.php?bulan='+bulan" target="_blank" style="width: 100%" :disabled="(pengiriman.length > 0)?false:true"> Cetak</a>
                </div>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="table-responsive">
                  <!-- <div class="box-body"> -->
                      <table class="table table-striped table-hover table-condensed table-bordered" id="tabel">
                      <thead class="bg-primary">
                        <tr>
                          <th>No. Resi</th>
                          <th>Nama Pengirim</th>
                          <th>Tujuan</th>
                          <th>Tanggal Pengiriman</th>
                          <th>Biaya</th>
                        </tr>
                      </thead>
                        <div v-if="pengiriman.length > 0">
                          <tr v-for="(index,value) in pengiriman" :key="index">
                            <td>{{ value.noresi }}</td>
                            <td>{{ value.namapengirim }}</td>
                            <td>{{ hurufdepan(value.kotapenerima) }}</td>
                            <td>{{ value.tgl_kirim }}</td>
                            <td align="right">{{ ribuan(value.totbiaya) }}</td>
                          </tr>
                          <tr style="background-color: #3e3e3e; color: white;">
                            <td colspan="4">
                              <b>Total</b>
                            </td>
                            <td align="right"> {{ ribuan(total) }} </td>
                          </tr>
                        </div>
                        <div v-else>
                          <strong class="text-danger"><i>Data Tidak Ditemukan!</i></strong>
                        </div>
                    </table>
                  <!-- </div> -->
            <p style="height: 50px;">&nbsp;</p>
              </div>
            </div>
          </div>
        </div>
        
    </div>
</section>
<script>
  new Vue({
    el: '#content',
    data: {
      bulan: '<?php echo date('m'); ?>',
      pengiriman: {},
      total: 0,
    },
    methods: {
      load(){
          axios.get('services/getPengirimanByBulan.php',{
            params: {
              bulan: this.bulan
            }
          }).then(response => {
            console.log(response);
            this.pengiriman = response.data.data
            this.total = response.data.total;
          }).catch(error => {
            console.log(error);
          })
        
      },
      ribuan(nomer) {
        return nomer.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      },
      hurufdepan(str) {
         var splitStr = str.toLowerCase().split(' ');
         for (var i = 0; i < splitStr.length; i++) {
             // You do not need to check if i is larger than splitStr length, as your for does that for you
             // Assign it back to the array
             splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
         }
         // Directly return the joined string
         return splitStr.join(' '); 
      },
    },
    created(){
      this.load();
    }
  })

  $(document).ready(function() {
    $('#tabel').on('click','#edit',function(e){
      e.preventDefault();
        var $this =$(this);
        bootbox.confirm('Edit?',function(a){
            if(a == true){
                $.ajax({
                    url : 'editpengiriman.php',
                    type : 'get',
                    data: 'id=' + $this.attr('recid'),
                    success:function(html){
                        $('#loading-state').fadeOut("slow");
                        $('#utama').html(html);
                    }
                });
            }
        });
    });
  })
</script>