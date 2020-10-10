<?php if (session::get('level')!=='mahasiswa'): ?>
    <?php echo "<script>location='hal404.php';</script>"; ?>
<?php endif ?>

<?php 
    $data = $user->get_datajenisujianharianwhereid($_GET['id']);
    $datamhs = $user->get_datamahasiswa(session::get('username'));
    $datanilai = $user->ck_dbnilaiujianharian($datamhs['NIM'],$data['id']);
    $tampil = $data['soaltampil'];

    if (input::get('submit') === 'Simpan Data') {
        $inkode = input::get('inkodeujian');
        if ($inkode !== $data['kodeujian']) {
            echo "<script>alert('Kode Yang Dimasukan Salah!');</script>";
            echo "<script>location='index.php?halaman=ujh';</script>";
        }else{
            $inkodeujian = $inkode;

            $datasoal = $user->acaksoal('ujianharian',$data['kodeujianharian']);
            if (!empty($datasoal)) {
                $idnilai = password_hash($datamhs['NIM'], PASSWORD_DEFAULT);

                $fields = array(
                    'id'                    =>  $idnilai,
                    'NIM'                   =>  $datamhs['NIM'],
                    'idjadwalujianharian'   =>  $data['id'],
                    'idmatakuliah'          =>  $data['idmatakuliah'],
                    'status'                =>  'Dimulai',
                    );
                $user->tambah_datanilaiujianharian($fields);
                $no=1;
                for ($i=0; $i < $tampil; $i++) {
                    $input = array(
                        'NIM'               => $datamhs['NIM'],
                        'soal'              => $datasoal[$i]['idsoal'],
                        'kodeujianharian'   => $idnilai,
                        );
                    $user->tambah_datajawabanujianharian($input);
                }
            }
            echo "<script>location='index.php?halaman=pujh&t=$_GET[t]&id=$_GET[id]';</script>";
        }
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
                'NIM'               => $datamhs['NIM'],
                'soal'              => input::get('soal'.$i),
                'pilihanjawaban'    => input::get('pg'.$i),
                'kodeujianharian'   => $datanilai['id'],
            );
            $user->simpan_datajawabanuhmhs($input,input::get('ids'.$i));
        }
        $user->hitungnilaimhs('ujianharian',$datanilai['id']);
        echo "<script>location='index.php?halaman=pujh&t=$_GET[t]&id=$_GET[id]';</script>";
    }    
?>


<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px;">
                                <h3 class="title" style="color: white"><?php echo $data['idmatakuliah'] ?> </h3>

                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
                                            <div class="col-md-12">
                                            <?php 
                                                if (!empty($datanilai)) {
                                                    $datasoal = $user->acaksoalada('ujianharian',$datanilai['id']);
                                                    $count=count($datasoal);
                                                    $no=1;
                                                    for ($i=0; $i < $tampil; $i++) {
                                                        $getdatasoal = $user->getdata_soalujianharian($datasoal[$i]['soal']);
                                                        echo "<p>".$no.". ".$getdatasoal['soal']."</p>";
                                                        echo '<input type="hidden" name="soal'.$i.'" value="'.$datasoal[$i]['soal'].'">';
                                                        echo '<div class="form-group">';
                                                        $datapg = $user->acakpg($getdatasoal['pilihanganda']);
                                                        // print_r($datasoal[$i]['pilihanjawaban']);
                                                        foreach ($datapg as $pg) {
                                                                if ($datasoal[$i]['pilihanjawaban'] === $pg) {
                                                                    echo '<input type="radio" class="pg" name="pg'.$i.'" data-id="'.$i.'" value="'.$pg.'" checked="" style="margin : 10px">'.$pg.'<input type="hidden" name="ids'.$i.'" value="'.$datasoal[$i]['soal'].'"><br>';
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
                                            <a href="index.php?halaman=ujh" class="btn btn-secondary pull-right">Kembali</a>
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
                                         <<!-- small><?php echo $datamhs['namamahasiswa']; ?></small> -->
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

<?php // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',      'TITLE MODAL',      'IDFORM',           'STYLE',)
$fungsiview->headerformmodal("modalkodeujian",     "Kode Ujian;",     "formkodeujian",   "background-color: green; color:white");
?>
<form method="post">
<div class="content">
    <div class="form-group">
        <label><b>Masukan Kode Ujian</b></label>
        <input type="text" name="inkodeujian" class="form-control inkodeujian" style="margin: 2px" required="">
    </div>
</div>

<?php // MEMANGGIL FUNGSI FOOTER MODAL
$fungsiview->footerformmodal('tambah');
?>
</form>






<script type="text/javascript">
    $(document).ready(function(){

            let status = '<?php echo $datanilai['status']; ?>';
            console.log(status);
            if (status === 'Dimulai') {
                let time = <?php echo $data['durasiujian'] ?>;
                let waktu = time*60;
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
                 return;
             }
             waktu--;
         }
     }


        // $("#modalkodeujian").modal('show');
        <?php if (empty($datanilai) AND empty($inkodeujian)) : ?>
            $('#modalkodeujian').modal('show');
        <?php endif ?>

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