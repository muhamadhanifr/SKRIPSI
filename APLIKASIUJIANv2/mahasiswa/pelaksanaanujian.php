<?php if (session::get('level')!=='mahasiswa'): ?>
    <?php echo "<script>location='hal404.php';</script>"; ?>
<?php endif ?>

<?php $data = $user->getinfo_datajadwalujianid($_GET['id'])?>
<?php $dataujian = $user->getinfo_dataujianid($data['idjenisujian']) ?>
<?php $datamhs = $user->get_datamahasiswa(session::get('username')) ?>
<?php $tampil = $data['soaltampil']; ?>

<?php 

// Query data pada tabel nilaipermtk
// dimana NIM = $datamhs['NIM'] dan idjadwalujian = $data['id']
$datanilai = $user->ck_dbnilaipermtk($datamhs['NIM'],$data['id']);

date_default_timezone_set("Asia/Bangkok");
    $waktumulai = date_create($data['waktupelaksanaan']);
    date_add($waktumulai, date_interval_create_from_date_string('+'.$data["durasiujian"].' minutes'));
    $waktuselesai = date_format($waktumulai, 'Y-m-d H:i:s');

    $tanggalsekarang = date('Y-m-d H:i:s');

    if ($tanggalsekarang>$waktuselesai) {
        if ($datanilai['nilai'] == '') {
            echo "<script>alert('Anda terlambat mengikuti ujian')</script>";
            echo "<script>location='index.php?halaman=du';</script>";
            die();
        }
    }elseif ($tanggalsekarang<$data['waktupelaksanaan']) {
        echo "<script>alert('Anda belum dapat mengikuti ujian')</script>";
        echo "<script>location='index.php?halaman=du';</script>";
        die();
    }else{
        $ws = strtotime($waktuselesai);
        $ts = strtotime($tanggalsekarang);
        $timeujian = $ws-$ts;
        session::set('timer', $timeujian);
    }


    if (input::get('simpanjawaban')==='Simpan Jawaban') {

        // $idnilai = password_hash($datamhs['NIM'], PASSWORD_DEFAULT);

        // $fields = array(
        // 'id'            =>  $idnilai,
        // 'NIM'           =>  $datamhs['NIM'],
        // 'idjadwalujian' =>  $data['id'],
        // 'idmatakuliah'  =>  $data['idmatakuliah'],
        // );
        // $user->tambah_datanilaiujianmhs($fields);

        for ($i=0; $i < $tampil ; $i++) { 

            $input = array(

                'pilihanjawaban'    => input::get('pg'.$i),

            );
            $user->simpan_datajawabanmhs($input,input::get('ids'.$i));
        }
        $user->hitungnilaimhs('ujiansemester',$datanilai['id']);
        echo "<script>location='index.php?halaman=puj&t=$_GET[t]&id=$_GET[id]';</script>";
    }

 ?>


<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px;">
                                <h3 class="title" style="color: white"><?php echo $dataujian['namaujian'] ?> </h3>

                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
                                            <div class="col-md-12">
                                            <?php 

                                                if (empty($datanilai)) {
                                                    // memanggil fungsi acaksoal dimana
                                                    // 'ujiansemester' sebagai aksi dan $data['id'] sebagai idjadwalujian
                                                    $datasoal = $user->acaksoal('ujiansemester',$data['id']);

                                                    if (!empty($datasoal)) {
                                                        $idnilai = password_hash($datamhs['NIM'], PASSWORD_DEFAULT);

                                                        $fields = array(
                                                            'id'            =>  $idnilai,
                                                            'NIM'           =>  $datamhs['NIM'],
                                                            'idjadwalujian' =>  $data['id'],
                                                            'idmatakuliah'  =>  $data['idmatakuliah'],
                                                            );
                                                        // query insert untuk tabel nilaipermtk
                                                        $user->tambah_datanilaiujianmhs($fields);
                                                    
                                                            $no=1;
                                                            for ($i=0; $i < $tampil; $i++) {
                                                                $input = array(
                                                                    'NIM'               => $datamhs['NIM'],
                                                                    'soal'              => $datasoal[$i]['idsoal'],
                                                                    'idnilaimtk'        => $idnilai,
                                                                    );
                                                                // query insert untuk tabel jawabanujianmhs
                                                                $user->tambah_datajawabanmhs($input);
                                                            }
                                                            echo "<script>location='index.php?halaman=puj&t=$_GET[t]&id=$_GET[id]';</script>";

                                                        }else{
                                                            echo '<div class="form-group">';
                                                            echo '<p align="center">Soal Belum Tersedia<em></p>';
                                                            echo '</div>';
                                                        }
                                                            
                                                }else{
                                                    // memanggil fungsi acaksoal dimana
                                                    // 'ujiansemester' sebagai aksi dan $datanilai['id'] sebagai idjadwalujian
                                                    $datasoal = $user->acaksoalada('ujiansemester',$datanilai['id']);

                                                    $count=count($datasoal);
                                                    $no=1;
                                                    for ($i=0; $i < $tampil; $i++) {
                                                        $getdatasoal = $user->getdata_soalsoal($datasoal[$i]['soal']);
                                                        echo "<p>".$no.". ".$getdatasoal['soal']."</p>";
                                                        echo '<input type="hidden" name="soal'.$i.'" value="'.$datasoal[$i]['soal'].'">';
                                                        echo '<div class="form-group">';
                                                        $datapg = $user->acakpg($getdatasoal['pilihanganda']);
                                                        // print_r($datasoal[$i]['pilihanjawaban']);
                                                        foreach ($datapg as $pg) {
                                                                if ($datasoal[$i]['pilihanjawaban'] === $pg) {
                                                                    echo '<input type="radio" class="pg" name="pg'.$i.'" data-id="'.$i.'" value="'.$pg.'" checked="" style="margin : 10px">'.$pg.'<input type="hidden" name="ids'.$i.'" value="'.$datasoal[$i]['id'].'"><br>';
                                                                }else{
                                                                    echo '<input type="radio" class="pg" name="pg'.$i.'" data-id="'.$i.'" value="'.$pg.'" style="margin : 10px">'.$pg.'<input type="hidden" name="ids'.$i.'" value="'.$datasoal[$i]['id'].'"><br>';
                                                                }
                                                        }
                                                        
                                                        echo "</div><br>";
                                                        $no++;
                                                    }
                                                }
                                                
                                             ?>
                                             </div>
                                    </div>
                                    <hr>
                                    <?php if (empty($datanilai['nilai'])): ?>
                                        <div class="clearfix">
                                            <input type="submit" name="simpanjawaban" class="btn btn-primary btn-fill pull-right" value="Simpan Jawaban">
                                        </div>
                                    <?php else: ?>
                                        <div class="clearfix">
                                            <a href="index.php?halaman=du" class="btn btn-secondary pull-right">Kembali</a>
                                        </div>
                                    <?php endif ?>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 timerprofile" id="timerprofile">
                        <div class="card card-user">
                            <div class="colorblue" align="left">
                            <?php if (!empty($datanilai['nilai'])): ?>
                                <div class="row" >
                                    <div class="header" align="center">
                                        <h4 class="title" style="color: white"><b>Nilai Anda</b></h4>
                                        <p class="Nilai" style="font-size: 40px; color: white"><?php echo $datanilai['nilai']; ?></p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-md-5" align="right">
                                        <div class="header">
                                            <h4 class="title" style="color: white"><b>Menit</b></h4>
                                            <p class="menitujian" style="font-size: 40px; color: white"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <h4></h4>
                                        <p style="font-size: 45px; color: white">:</p>
                                    </div>
                                    <div class="col-md-5" align="left">
                                        <div class="header">
                                            <h4 class="title" style="color: white"><b>Detik</b></h4>
                                            <p class="detikujian" style="font-size: 40px; color: white"></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
                            </div>
                        </div>
                        <div class="card card-user">
                            <div class="image colorblue">
                                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/avatar.png" alt="..."/>

                                      <h4 class="title"><?php echo $datamhs['namamahasiswa']; ?><br />
                                         <!-- <small><?php echo $datamhs['namamahasiswa']; ?></small> -->
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> <?php echo $datamhs['alamat']; ?>
                                </p>
                            </div>
                            <hr>
                            <?php if (empty($datanilai['nilai'])): ?>
                                <div class="text-center" style="padding: 20px">
                                    <?php 

                                    for ($j=0; $j < $tampil; $j++) { 
                                        $see = $j+1;
                                        echo '<button href="#" class="btn btn-simple btn-fill btn-success isi isi'.$j.'" style="font-size:9px; margin:5px; display:none">'.$see.'</button>';
                                        echo '<button href="#" class="btn btn-simple btn-fill btn-danger kosong kosong'.$j.'" style="font-size:9px; margin:5px">'.$see.'</button>';
                                    }

                                    ?>

                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<script type="text/javascript">
    $(document).ready(function(){
        let no=<?php echo $tampil ?>;
        let waktu = <?php echo session::get('timer'); ?>;
        var counter = setInterval(timerprofile, 1000);

        function timerprofile(){
            let menit = Math.floor(waktu/60);
            let detik = waktu % 60;
            //Do code for showing the number of seconds here
            $(".menitujian").html(menit);
            $(".detikujian").html(detik);
            if (waktu <= 0)
            {
                clearInterval(counter);
             //counter ended, do something here
             alert('Done');
             sessionStorage.removeItem('timer');
            return;
             }
             waktu--;
        }


        // $(".isi").hide();
        // $(".kosong").show();

        $(".pg").on("change", function(){
            let val = $(this).data('id');
            console.log(val);
            if ($(this).is(":checked")) {
                    $(".isi"+val).show();
                    $(".kosong"+val).hide();
                }
            });

    });

</script>