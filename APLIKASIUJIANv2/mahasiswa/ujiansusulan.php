<?php if (session::get('level')!=='mahasiswa'): ?>
    <?php echo "<script>location='hal404.php';</script>"; ?>
<?php endif ?>
<?php 
    $data = $user->get_datamahasiswa(session::get('username'));
    $getjenisujiansusulan = $user->get_jenisujiansusulan($taaktif['nama']);
    
// $getjadwalbyprodi = $user->getjadwalbyprodi(session::get('programstudi'));
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
        <a href="#">
            <div class="col-md-4">
                <div class="card colorblue">
                    <div class="header" style="padding: 10px; color: white">
                        <h4 class="title" style="color: white">Ujian Belum Selesai</h4>
                            <span style="font-size: 10px">Tahun Ajaran <?php echo $taaktif['nama'] ?></span><span class="btn-primary"><i class="fa fa-book pull-right" style="font-size: 40px; margin-right: 50px; color: white"></i></span>
                            <?php 

                                $jnsus = $user->getjmlujiansusulan($data['NIM'],'Belum Selesai');
                                $cjnsus = count($jnsus);

                             ?>
                            <p style="font-size:30px"><b><?php echo $cjnsus; ?></b></p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col-md-4">
                <div class="card colorblue">
                    <div class="header" style="padding: 10px; color: white">
                        <h4 class="title" style="color: white">Jumlah Ujian Susulan</h4>
                            <span style="font-size: 10px">Tahun Ajaran <?php echo $taaktif['nama'] ?></span><span class="btn-primary"><i class="fa fa-book pull-right" style="font-size: 40px; margin-right: 50px; color: white"></i></span>
                            <?php 
                                $cuh = count($getjenisujiansusulan);
                             ?>
                            <p style="font-size:30px"><b>0</b></p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col-md-4">
                <div class="card colorblue">
                    <div class="header" style="padding: 10px; color: white">
                        <h4 class="title" style="color: white">Ujian Telah Selesai</h4>
                            <span style="font-size: 10px">Tahun Ajaran <?php echo $taaktif['nama'] ?></span><span class="btn-primary"><i class="fa fa-book pull-right" style="font-size: 40px; margin-right: 50px; color: white"></i></span>
                            <?php 

                                $jnsuhd = $user->getjmlujiansusulan($data['NIM'],'Selesai');
                                $cjnsuhd = count($jnsuhd);                                

                             ?>
                            <p style="font-size:30px"><b><?php echo $cjnsuhd; ?></b></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
            <div class="header colorblue" style="padding: 20px">
                <!-- <a href="#index.php?halaman=editprofiledosen" class="btn btn-primary btn-fill pull-right" style="font-size: 10px">Update Profile</button></a> -->
                <h3 class="title" style="color: white"><b>
                  <?php echo "Daftar Ujian Susulan Belum Selesai" ?>
              </b></h3>
            </div>

          <div class="content">
            <?php if (!empty($getjenisujiansusulan)): ?>                    
                <?php foreach ($getjenisujiansusulan as $datajadwalujiansusulan): ?>
                    <?php if ($datajadwalujiansusulan['status'] === 'Selesai'): ?>
                    <?php else: ?>
                        <?php if ($datajadwalujiansusulan['NIM'] === $data['NIM']): ?>
                            <?php $cknilaius = $user->ck_dbnilaiperus($data['NIM'],$datajadwalujiansusulan['id']) ?>
                            <?php if (!empty($cknilaius['nilai'])): ?>
                            <?php else: ?>
                            <?php $datajadwalujiansemester = $user->get_datajadwalujiansemester($datajadwalujiansusulan['idjadwalujian']) ?>
                            <?php $datadatamatakuliah = $user->get_datamatakuliah($datajadwalujiansemester['idmatakuliah']); ?>
                            <a href="index.php?halaman=pujs&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>&id=<?php echo $datajadwalujiansusulan['id']; ?>" style="color: grey">
                                <div class="card" style="background-color: #f2f2f2 ">
                                    <div class="header">
                                      <div class="col-md-6" style="padding: 10px">
                                        <i class="fa fa-book" style="font-size: 40px; margin-right: 20px"></i>
                                        <span style="font-size: 20px"><?php echo $datadatamatakuliah['idmatakuliah']."-".$datadatamatakuliah['namamatakuliah']; ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                          <h4 class="title pull-right"><?php echo $fungsiview->tanggal($datajadwalujiansusulan['waktupelaksanaan']); ?></h4>
                                      </div>
                                      <div class="row">
                                        <div class="content" align="right">


                                            <div class="col-md-6">
                                                <span class="stats">Waktu Mulai </span>
                                                <p><?php echo $fungsiview->jam($datajadwalujiansusulan['waktupelaksanaan']); ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="stats">Waktu Selesai</span>
                                                <?php 

                                                $waktumulai = date_create($datajadwalujiansusulan['waktupelaksanaan']);
                                                date_add($waktumulai, date_interval_create_from_date_string('+'.$datajadwalujiansemester['durasiujian'].' minutes'));
                                                $waktuselesai = date_format($waktumulai, 'Y-m-d H:i:s');

                                                ?>
                                                <p><?php echo $fungsiview->jam($waktuselesai); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row" style="margin: 10px;">
                                    <div class="content">
                                        <div class="row">
                                            <?php if ($datajadwalujiansemester['durasiujian'] === '0'): ?>
                                                <?php echo '<span style="color:red"><em>*Soal Belum Tersedia</e,></span>' ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endif ?>
                    <?php endif ?>
                <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if ($cjnsus === 0): ?>
                    <p class="text-center">Tidak ada ujian susulan</p>
                <?php else: ?>
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

                    <h4 class="title"><?php echo $data['namamahasiswa']; ?><br />
                     <!-- <small><?php echo $data['namamahasiswa']; ?></small> -->
                 </h4>
             </a>
         </div>
         <p class="description text-center"> <?php echo $data['alamat']; ?>
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
    $(".seeform").show();
    $(".hideform").hide();
    $(".ttable").slideUp();
});

  $(document).on("click", ".seeform", function(){
    $(".hideform").show();
    $(".seeform").hide();
    $(".ttable").slideDown();
});

  $(document).on("click", ".hideform", function(){
    $(".hideform").hide();
    $(".seeform").show();
    $(".ttable").slideUp();
});
</script>