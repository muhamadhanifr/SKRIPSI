<?php 
    $datajenisujiansusulan = $user->get_ujiansusulan();

    if (input::get('submit') == 'Simpan Data') {
        $exid = explode('|', input::get('kodejadwal'));
        $enim = explode(',', input::get('nimmhs'));
        $cenim = count($enim);
        for ($k=0; $k < $cenim-1; $k++) { 
           $fields = array(
            'kodeujiansusulan'  => password_hash($exid[0], PASSWORD_DEFAULT),
            'idjadwalujian'     => $exid[0],
            'waktupelaksanaan'  => input::get('waktupelaksanaan'),
            'NIM'               => $enim[$k],
            'tahunajaran'       => $taaktif['nama'],
            'status'            => 'Belum Selesai',
            ); 
           $user->tambahujiansusulan($fields);
        }
        die();

        echo "<script>location='index.php?halaman=u';</script>";
        }

    // if (input::get('submit') == 'Edit Data') {

    //        $user->edit_dataujian(array(
    //         'namaujian'  => input::get('enamaujian')."-".input::get("etahunajaran"),
    //         'tipeujian'  => input::get('enamaujian'),
    //         'tahunajaran'  => input::get('etahunajaran'),
    //         ),input::get('edid'));

    //     echo "<script>location='index.php?halaman=u';</script>";
    //     }

 ?>



<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right tambahdataujiansusulan">Buat Ujian Susulan</button>
                                <h4 class="title" style="color: white;">Data Daftar Ujian Susulan</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>

                                <?php 
                                    $fungsiview->headertabel();
                                    ?>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Matakuliah</th>
                                        <th>NIM Mahasiswa</th>
                                        <th>Waktu Pelaksanaan</th>
                                        <th class="pull-right">Aksi</th>
                                    </tr>
                                </thead>
                                    <?php 
                                                $no=1;
                                        ?>
                                    <?php if (!empty($datajenisujiansusulan)): ?>
                                        <?php foreach ($datajenisujiansusulan as $dataujian): ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                                <?php 
                                                    $datajadwal = $user->getdatajadwalujianmtkwhereidjadwal($dataujian['idjadwalujian']);
                                                    $mtk = $user->get_datamtk($datajadwal['idmatakuliah']);
                                                    echo $mtk['namamatakuliah'];
                                                 ?>

                                            </td>
                                            <td><?php echo $dataujian['NIM']; ?></td>
                                            <td><?php echo $fungsiview->tanggal($dataujian['waktupelaksanaan']); ?></td>
                                            <td class="pull-right">
                                                <a href="index.php?halaman=hdt&d=u&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>&id=<?php echo $dataujian['id'] ?>" class="btn btn-danger hapusdataujian" style="font-size: 10px"><i class="fa fa-trash"></i></button></a>
                                            </td>

                                        </tr>
                                        <?php $no++ ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                        
                                <?php
                                    $fungsiview->footertabel();
                                 ?>

</body>


<?php $fungsiview->headerformmodal("modaltambahujiansusulan",   "Tambah Data Surat Keterangan KBM",     "formtambahsk",     "background-color: green; color:white");?>
    <form method="post">
        
        <div class="form-group">
            <label>Jadwal Ujian Semester Tahun Ajaran <?php echo $taaktif['nama']; ?></label><br>
                <div class="ui-widget">
                    <input type="text" name="kodejadwal" class="form-control" id="idjadwalujian">
                </div>
            <input type="hidden" name="filt">
        </div>

        <div class="form-group">
            <label>Waktu Pelaksanaan</label><br>
                <input type="text" name="waktupelaksanaan" class="waktupelaksanaan datetime form-control" autocomplete="off">
            <input type="hidden" name="filt">
        </div>

        <div class="form-group">
            <label>NIM Mahasiswa</label><br>
                <div class="ui-widget">
                    <textarea name="nimmhs" class="form-control" id="nimmhs" disabled=""></textarea>
                </div>
            <input type="hidden" name="filt">
        </div>
    
<?php $fungsiview->footerformmodal('tambah');?>
</form>



<style>
.ui-autocomplete{
  z-index:2150000000;
}
</style>
<script type="text/javascript">
          $(function() {
            var availableTags = [
            <?php foreach ($user->getjadwalujianmtk() as $gtjdwl) {
                $mtk = $user->get_datamtk($gtjdwl['idmatakuliah']);
                echo "'".$gtjdwl['id']."|".$gtjdwl['idmatakuliah']."-".$mtk['namamatakuliah']."',";
            } ?>
            ];

            $( "#idjadwalujian" ).autocomplete({
              source: availableTags
          });
        });

            $( function() {
            var mhs = [
                <?php foreach ($user->get_mhs() as $nimMhs): ?>
                <?php echo "'".$nimMhs['NIM']."',"; ?>
            <?php endforeach ?>
            ];
            function split( val ) {
              return val.split( /,\s*/ );
          }
          function extractLast( term ) {
              return split( term ).pop();
          }

          $( "#nimmhs" )
              // don't navigate away from the field on tab when selecting an item
              .on( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB &&
                    $( this ).autocomplete( "instance" ).menu.active ) {
                  event.preventDefault();
          }
      })
              .autocomplete({
                minLength: 0,
                source: function( request, response ) {
                  // delegate back to autocomplete, but extract the last term
                  response( $.ui.autocomplete.filter(
                    mhs, extractLast( request.term ) ) );
              },
              focus: function() {
                  // prevent value inserted on focus
                  return false;
              },
              select: function( event, ui ) {
                  var terms = split( this.value );
                  // remove the current input
                  terms.pop();
                  // add the selected item
                  terms.push( ui.item.value );
                  // add placeholder to get the comma-and-space at the end
                  terms.push( "" );
                  this.value = terms.join( ", " );
                  return false;
              }
          });
          });

    $(document).ready(function(){
        $(".datetime").datetimepicker()

        $(".table").DataTable({
        stateSave: true,
        aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
    });

    $(document).on("click", ".tambahdataujiansusulan", function(){
        $("#modaltambahujiansusulan").modal('show');
    });


    $(document).on("click", ".detailujian", function(){
        $("#modaldetailujian").modal('show');
            let val = $(this).attr("value");
            let aksi = 'getdataujian';
            $.ajax({
                "type"      : "GET",
                "data"      : "val="+val+
                              "&aksi="+aksi,
                "url"       : "fungsi/getdata.php",
                success : function(result){
                    var resultOBJ = JSON.parse(result);
                        $('#dnamaujian').val(resultOBJ.tipeujian);
                        $('#dtahunajaran').val(resultOBJ.tahunajaran);
                }
            });
    });


    $(document).on("click", ".editdataujian", function(){

        $("#modaleditujian").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdataujian';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
                          "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);

                    $('#enamaujian').val(resultOBJ.tipeujian);
                    $('#fetahunajaran').val(resultOBJ.tahunajaran);
                    $('#fetahunajaran').html(resultOBJ.tahunajaran);
                    $('#edid').val(resultOBJ.id);

            }
        });

    });

    $(document).on("keyup","#idjadwalujian", function(){
        var rbang = $(this).val();
        if (rbang !== '') {
            $("#nimmhs").attr('disabled',false);
        }
    });
  });

</script>