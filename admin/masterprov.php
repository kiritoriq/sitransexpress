<section class="content-header">
    <h1>
        Master Provinsi<small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"> Dashboard</a></li>
        <li class="active">Master Provinsi</li>
    </ol>
</section>
<section class="content" id="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Daftar Provinsi</h3>
        </div>
        
            <div class="box-body">
                <table class="table table-striped table-hover table-condensed table-bordered" id="tabel">
                <thead class="bg-primary">
                  <tr>
                    <th>Id</th>
                    <th>Provinsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // include "../config/config.php";
                    $q = new Query();
                    $select = $q->selectAll('provinces');
                    $view = $q->store($select);
                    // var_dump($view);
                    foreach($view as $rs => $i){
                      echo "<tr>
                          <td>".$i[0]."</td>
                          <td>".$i[1]."</td>
                        </tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
			<p style="height: 50px;">&nbsp;</p>
        
    </div>
</section>
<script>
 
  $(document).ready(function() {
    $('#tabel').DataTable();
  })
</script>