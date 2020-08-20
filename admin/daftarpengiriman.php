<section class="content-header">
    <h1>
        Pengiriman Barang<small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"> Dashboard</a></li>
        <li class="active">Pengiriman Barang</li>
    </ol>
</section>
<section class="content" id="content">
    <div class="box box-primary">
        <div class="box-header with-border">
          <?php
            if($_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 4) {
                echo "<a href='cetakpengiriman.php' target='_blank' class='btn btn-info'><i class='fa fa-print'></i> Cetak Laporan</a>";
            } else {
          ?>
            <a class="btn btn-primary" href="index.php?page=inputpengiriman"><i class="fa fa-plus-square"></i> Buat Baru</a>
          <?php } ?>
            <div class="box-tools pull-right">
              <form action="daftarpengiriman.php" method="GET">
                <div class="input-group" style="width: 200px;">
                  <input type="text" class="form-control" name="search" v-model="cari" v-on:keyup="load" placeholder="Cari no. resi">
                </div>
              </form>
            </div>
        </div>
        
        <div class="table-responsive">
            <div class="box-body">
                <table class="table table-striped table-hover table-condensed table-bordered" id="tabel">
                <thead class="bg-primary">
                  <tr>
                    <th>No. Resi</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Tujuan</th>
                    <th>Nama Pengirim</th>
                    <th>Alamat Pengirim</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Provinsi</th>
                    <th>Status Pengiriman</th>
                    <?php
                      if($_SESSION['role_id'] == 2) {
                                 
                      } else {
                    ?>
                    <th>Aksi</th>
                  <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <div v-if="pengiriman.length > 0">
                    <tr v-for="(index,value) in pengiriman" :key="index">
                      <td>{{ value.noresi }}</td>
                      <td>{{ value.tgl_kirim }}</td>
                      <td>{{ value.kotapenerima }}</td>
                      <td>{{ value.namapengirim }}</td>
                      <td>{{ value.alamatpengirim }}</td>
                      <td>{{ value.kotapengirim }}</td>
                      <td>{{ value.kodepospengirim }}</td>
                      <td>{{ value.provpengirim }}</td>
                      <td><strong :class="value.sts_kirim==1?'text-warning':(value.sts_kirim==0?'text-muted':'text-success')">
                        {{ (value.sts_kirim == 1)?'Sedang Dalam Pengiriman':(value.sts_kirim == 0?'Belum diproses':'Paket Sudah Diterima') }}
                      </strong></td>
                            <?php
                              if($_SESSION['role_id'] == 2) {
                                  
                              } else {
                            ?>
                      <td>
                        <div class="btn-group">
                          <button data-toggle='dropdown' class='btn btn-default dropdown-toggle' type='button' aria-expanded='false'>
                          <span class='caret'></span> Aksi
                          </button>
                          <ul class="dropdown-menu pull-right">
                            <li><a href="" id="edit" :recid="value.id"><i class="fa fa-edit"></i> Edit</a></li>
                            <li><a target="_blank" :href="'invoice.php?noresi='+value.noresi" id="cetak"><i class="fa fa-print"></i> Cetak Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                          <?php } ?>
                    </tr>
                  </div>
                  <div v-else>
                    <strong class="text-danger"><i>Data Tidak Ditemukan!</i></strong>
                  </div>
                </tbody>
              </table>
            </div>
			<p style="height: 50px;">&nbsp;</p>
        </div>
        
    </div>
</section>
<script>
  new Vue({
    el: '#content',
    data: {
      cari: '',
      pengiriman: {},
    },
    methods: {
      load(){
        if(this.cari == ''){
          axios.get('services/PengirimanApi.php').then(response => {
            // console.log(response.data);
            this.pengiriman = response.data.data;
          }).catch(error => {
            console.log(error.response.status);
          })
        } else {
          axios.get('services/PengirimanApi.php',{
            params: {
              cari: this.cari
            }
          }).then(response => {
            // console.log(response.data);
            this.pengiriman = response.data.data;
          }).catch(error => {
            console.log(error.response.status);
          })
        }
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