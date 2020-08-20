
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <!-- solid sales graph -->
          <div class="box box-info with-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Grafik Pengiriman</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box box-success with-gradient">
            <div class="box-header">
              <h3 class="box-title">Daftar Pelanggan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed table-bordered">
                  <thead class="bg-success">
                    <th>Kode Pelanggan</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                  </thead>
                  <tbody>
                    <?php
                      include "../config/config.php";
                      $query = mysqli_query($con, "SELECT * FROM master_pelanggan ORDER BY created_at DESC");
                      while($data = mysqli_fetch_array($query)){
                        echo "
                        <tr>
                          <td>".$data['kdplg']."</td>
                          <td>".$data['nama']."</td>
                          <td>".$data['alamat']."</td>
                          <td>".$data['notelp']."</td>
                        </tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
<?php
  include '../config/config.php';

  $awal = date('m', strtotime('2020-01-01'));
  $akhir = date('m', strtotime('2020-12-31'));
  $tahun = date('Y');
  // echo $awal;
  $data = "";
  while($awal <= $akhir){
      $query = mysqli_query($con, "SELECT COUNT(*) as jml FROM tr_pengiriman WHERE MONTH(tgl_kirim) = '".$awal."' AND YEAR(tgl_kirim) = '".$tahun."'");
      $item = mysqli_fetch_array($query);
    if($awal < 10 && $awal != '01'){
      $data .= "{y: '".$tahun."-0".$awal."', pengiriman: ".$item['jml']."},";
      // echo "{y: ".$tahun."-0".$awal.", pengiriman: ".$item['jml']."},";
    } else {
      $data .= "{y: '".$tahun."-".$awal."', pengiriman: ".$item['jml']."},";
      // echo "{y: ".$tahun."-".$awal.", pengiriman: ".$item['jml']."},";
    }
    $awal ++;
  }
?>
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
       // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [<?php echo $data; ?>],
      xkey: 'y',
      ykeys: ['pengiriman'],
      labels: ['Jumlah Pengiriman'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#tanggalan').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        // $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })
  })
</script>