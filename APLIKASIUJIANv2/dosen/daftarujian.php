<?php 
  if (session::get('level') !== 'dosen') {
    echo "<script>location='hal404.php';</script>";
  }

  $taaktif = $user->get_taaktif('Aktif');
  $getjenisujian = $user->get_datajenisujianwheretaaktif($taaktif['nama']);
  $dataskajar = $user->get_dataskajarwherenamadosen(session::get('namadosen'),$taaktif['nama']);
  $datadosen = $user->get_datadosen(session::get('username'));

 ?>



<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?php $cju = count($getjenisujian) ?>
      <?php foreach ($getjenisujian as $datajenisujian): ?>
        <a href="#">
          <?php if ($cju === 2): ?>
            <div class="col-md-6 menuujian" data-id="<?php echo $datajenisujian['id'].'|'.$datajenisujian['namaujian'] ?>">
          <?php else: ?>
            <div class="col-md-4 menuujian" data-id="<?php echo $datajenisujian['id'].'|'.$datajenisujian['namaujian'] ?>">
          <?php endif ?>
            
                <div class="card colorblue">
                    <div class="header" style="padding: 10px; color: white">
                        <h4 class="title" style="color: white"><?php echo $datajenisujian['namaujian']; ?></h4>
                            <span style="font-size: 10px"><?php echo "JUMLAH MATAKULIAH YANG DIUJIANKAN"; ?></span><span class="btn-primary"><i class="fa fa-book pull-right" style="font-size: 40px; margin-right: 50px; color: white"></i></span>
                            <p style="font-size:30px"><b>
                              <?php 
                                    $getjadwalujian = $user->data_jadwalujian($datajenisujian['id']);
                                    echo count($getjadwalujian);
                                 ?>
                            </b></p>
                    </div>
                </div>
            </div>
        </a>
      <?php endforeach ?>
        
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
            <div class="header colorblue" style="padding: 20px">
                <!-- <a href="#index.php?halaman=editprofiledosen" class="btn btn-primary btn-fill pull-right" style="font-size: 10px">Update Profile</button></a> -->
                <h3 class="title namajenisujian" style="color: white">Daftar Jadwal Ujian</h3>

            </div>
            <div class="content" id="daftarujian" >
                <?php if (empty($getjadwalujian)): ?>
                  <p class="text-center"> Jadwal Ujian Belum Tersedia</p>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image colorblue" style="background-color: blue">
                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
            </div>
            <div class="content">
                <div class="author">
                 <a href="#">
                    <img class="avatar border-gray" src="assets/img/avatar.png" alt="..."/>

                    <h4 class="title"><?php echo $datadosen['namadosen']; ?>
                 </h4><br>
             </a>
         </div>
         <p class="description text-center"> <?php echo $datadosen['alamat']; ?>
         </p>
     </div>
     <hr>
<!--        <div class="text-center">
        <button href="#" class="btn btn-simple">Ujian Harian</button>
        <button href="#" class="btn btn-simple">Ujian Susulan</button>
        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

    </div> -->
</div>
</div>

</div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function(){

});


  $(document).on("click", ".menuujian", function(){
    let menu = $(this).data('id');
    console.log(menu);
    let dt = menu.split("|");
    $(".namajenisujian").html("Daftar "+dt[1]);

    let aksi = 'getjadwalujianbyidujianfordosen';
    let dataHandler = $("#daftarujian");
    dataHandler.html("");
    $.ajax({
            "type"      : "GET",
            "data"      : "val="+dt[0]+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    console.log(result);
                    var t = '<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT) ?>';
                    var resultOBJ = JSON.parse(result);
                    // // console.log(resultOBJ);
                    // var no =1;
                    $.each(resultOBJ, function(key, val){

                      if (val.jumlahsoal == 0) {
                            val.jumlahsoal = '<em style="color:red">Segera Masukan Soal Sebelum Tanggal Pelaksanaan!</em>';
                        }

                        var newRow = $("<div>")
                        newRow.html(
                            '<a href="index.php?halaman=dju&t='+t+'&id='+val.idjadwalujian+'" style="color: grey">'+
                                '<div class="card" style="background-color: #f2f2f2 ">'+
                                '<div class="header">'+
                                          '<div class="col-md-6" style="padding: 10px">'+
                                            '<i class="fa fa-book" style="font-size: 40px; margin-right: 20px"></i>'+
                                            '<span style="font-size: 20px">'+val.idmatakuliah+'-'+val.namamatakuliah+'</span>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<div class="row">'+
                                              '<h4 class="title pull-right">'+val.tanggalpelaksanaan+'</h4>'+
                                          '</div>'+
                                          '<div class="row">'+
                                            '<div class="content" align="right">'+
                                                '<div class="col-md-6">'+
                                                    '<span class="stats">Waktu Mulai </span>'+
                                                    '<p>'+val.waktustart+'</p>'+
                                                '</div>'+
                                                '<div class="col-md-6">'+
                                                    '<span class="stats">Waktu Selesai</span>'+
                                                    '<p>'+val.waktufinish+'</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<br>'+
                                    '<div class="row" style="margin: 10px;">'+
                                        '<div class="content">'+
                                            '<div class="row">'+
                                                '<p>'+val.jumlahsoal+'</p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            );
                        dataHandler.append(newRow);
                        // no++;
                    });
                }
            });
  });


</script>