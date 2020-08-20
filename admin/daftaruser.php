<section class="content-header">
    <h1>
        User<small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"> Dashboard</a></li>
        <li class="active">User</li>
    </ol>
</section>
<section class="content" id="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a class="btn btn-primary" href="index.php?page=buatuser"><i class="fa fa-plus-square"></i> Buat Baru</a>
            <!-- <div class="box-tools pull-right">
              <form action="daftarpengiriman.php" method="GET">
                <div class="input-group" style="width: 200px;">
                  <input type="text" class="form-control" name="search" v-model="cari" v-on:keyup="load" placeholder="Cari no. resi">
                </div>
              </form>
            </div> -->
        </div>
        
        <div class="table-responsive">
            <div class="box-body">
                <table class="table table-striped table-hover table-condensed table-bordered" id="tabel">
                <thead class="bg-primary">
                  <tr>
                    <th>Nama</th>
                    <th>No. KTP</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include "../config/config.php";
                    $query = mysqli_query($con, "SELECT a.*, b.role as namarole FROM user a JOIN roles b ON a.role_id = b.id ORDER BY created_at ASC");
                    while($data = mysqli_fetch_array($query)){
                      echo "<tr>
                        <td>".$data['nama']."</td>
                        <td>".$data['noktp']."</td>
                        <td>".$data['notelp']."</td>
                        <td>".$data['alamat']."</td>
                        <td>".$data['username']."</td>
                        <td>".$data['namarole']."</td>
                        <td>
                          <div class='btn-group'>
                          <button data-toggle='dropdown' class='btn btn-default dropdown-toggle' type='button' aria-expanded='false'>
                          <span class='caret'></span> Aksi
                          </button>
                          <ul class='dropdown-menu pull-right'>
                            <li><a href='' id='edit' recid='".$data['id']."'><i class='fa fa-edit'></i> Edit</a></li>
                            <li><a href='' id='hapus' recid='".$data['id']."'><i class='fa fa-print'></i> Hapus</a></li>
                          </ul>
                        </div>
                        </td>
                      </tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
			<p style="height: 50px;">&nbsp;</p>
        </div>
        
    </div>
</section>
<script>
 
  $(document).ready(function() {
    $('#tabel').on('click','#edit',function(e){
      e.preventDefault();
        var $this =$(this);
        bootbox.confirm('Edit?',function(a){
            if(a == true){
                $.ajax({
                    url : 'edituser.php',
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
    $('#tabel').on('click', '#hapus', function(e){
      e.preventDefault();
      var $this = $(this);
      bootbox.confirm('Yakin akan dihapus?', function(a){
        if(a===true){
          $.ajax({
            url: 'proses/hapususer.php',
            type: 'post',
            data: 'id='+ $this.attr('recid'),
            success:function(data){
              bootbox.alert(data);
              window.location.href = 'index.php?page=daftaruser';
            },
            error:function(data){
              bootbox.alert(data);
            }
          })
        }
      })
    })
  })
</script>