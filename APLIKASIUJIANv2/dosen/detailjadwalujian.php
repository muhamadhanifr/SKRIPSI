<?php if (session::get('level')!=='dosen'): ?>
    <?php echo "<script>location='hal404.php';</script>"; ?>
<?php endif ?>

<?php 

    $datajadwalujianmatakuliah = $user->get_datajadwalujianmatakuliahwhereid($_GET['id']);
    $datanamamatakuliah = $user->get_datamatakuliah($datajadwalujianmatakuliah['idmatakuliah']);
    $datasoalujianmatakuliah = $user->ambil_datasoalujianmatakuliahwhereidjadwalujian($_GET['id']);


    if (input::get('submit')=="Simpan Data") {
        $jumlahsoal = input::get('jumlahsoal');
    }

    if (input::get('submit')=="Tambah Data") {
        $countsoalsoal = count(input::get('pilihansoal'));
        if ($countsoalsoal > 0) {
            $explodepilihansoal = implode("`", input::get('pilihansoal'));
            $inputsoal = array(
                'idjadwalujian' => $_GET['id'],
                'idmatakuliah'  => $datajadwalujianmatakuliah['idmatakuliah'],
                'soal'          => input::get('soalsoal'),
                'pilihanganda'  => $explodepilihansoal,
                'jawabansoal'   => input::get('jawabansoal')

                );
        }
        $user->tambahsoaljadwalujian($inputsoal);
        echo "<script>location='index.php?halaman=dju&t=$_GET[t]&id=$_GET[id]';</script>";
    }
    
	if (input::get('simpansemua')==="Simpan Semua") {
        $countsoal = count(input::get('soal'));
        if ($countsoal>0) {
            for ($j=0; $j < $countsoal; $j++) { 
                $countpilihan = count(input::get('pilihan'.$j));
                if ($countpilihan>1) {
                    $dataimplodepilihan = implode("`", input::get('pilihan'.$j));                }
                $input = array(
                'idjadwalujian'     => $_GET['id'],
                'idmatakuliah'      => $datajadwalujianmatakuliah['idmatakuliah'],
                'soal'              => input::get('soal')[$j],
                'pilihanganda'      => $dataimplodepilihan,
                'jawabansoal'       => input::get('jawaban')[$j],
            );
                $user->tambahsoaljadwalujian($input);
            }
            $user->tambahketentuanjadwalujian(array(
                    'ketentuanujian'    => input::get('ketentuanpelaksanaanujian'),
                    'durasiujian'       => input::get('durasiujian'),
                    'soaltampil'   => input::get('soaltampil'),
                    ),$_GET['id']);

        }
        echo "<script>location='index.php?halaman=dju&t=$_GET[t]&id=$_GET[id]';</script>";
        
		// $user->tambah_tambahjadwalujian(array(
  //           'namajadwal'    => $datajenisujian['namaujian'],
  //           'matakuliah'    => input::get('ckmtk'),
  //           'tanggalujian'  => input::get('tanggalujian'),
  //           'angkatan'      => input::get('angkatan'),
  //           ));
	}
    
    // if ($_GET['jmls']=='') {
    //     echo "<script>modaljumlahsoal</script>";
    // }
 ?>

<div class="content">
    <?php if (empty($jumlahsoal)): ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="card" style="padding: 20px">
                <div class="kosong" align="center">
                    <?php if (empty($datasoalujianmatakuliah)): ?>
                        <p><em>Soal Belum Anda Masukan</em></p>
                        <button class="btn btn-success tambahsoal">Tambah Soal</button>
                    <?php else: ?>
                        <button class="btn btn-success tambahdatasoal">Tambah Soal</button>
                    <?php endif ?>
                </div>
            </div>
            </div>
        </div>
    <?php else: ?>
    <form method="post" id="myForm" role="form" data-toggle="validator" accept-charset="utf-8">
        <div id="smartwizard">
            <ul class="nav">
                <li>
                    <a class="nav-link" href="#step-1">
                        <!-- <img src="../assets/img/avatar.png" width="50"> -->
                        <i class="fa fa-book" style="font-size: 20px"></i><br>
                        Soal Ujian<br><small>Masukan Soal Ujian</small>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-2">
                        <!-- <img src="../assets/img/avatar.png" width="50"> --><i class="fa fa-newspaper" style="font-size: 20px"></i><br>
                        Ketentuan Ujian<br><small>Ketentuan Pelaksanaan Ujian</small>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-3">
                        <!-- <img src="../assets/img/avatar.png" width="50"> --><i class="fa fa-clock" style="font-size: 20px"></i><br>
                        Durasi dan Jumlah Soal<br><small>Durasi Ujian dan Jumlah Soal Yang Diujiankan</small>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel">
                        <div class="row tempatform">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="row">
                                    

                                    <?php if (!empty($jumlahsoal)): ?>
                                        <?php for ($i=0; $i < $jumlahsoal; $i++) { 
                                            echo '
                                            <div class="card">
                                            <div class="row">
                                            <div id="step-1" role="form" data-toggle="validator" style="padding:30px">
                                                <div class="form-group">
                                                    <label><b>Soal</b></label><textarea class="form-control insoal'.$i.'" name="soal[]" data-idsoal="'.$i.'" required=""></textarea>
                                                    <div class="help-block with-errors"></div><br>
                                                </div>
                                                <label><b>Pilihan</b></label>
                                                <div class="form-group">
                                                    <div class="col-md-1">
                                                        <input type="radio" name="pjawaban'.$i.'" data-id="'.$i.'1" data-i="'.$i.'" class="pjawaban" style="margin-top: 15px" required="">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <input type="text" name="pilihan'.$i.'[]" class="form-control pilihan1" id="pilihan'.$i.'1" style="margin: 2px" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-1">
                                                        <input type="radio" name="pjawaban'.$i.'" data-id="'.$i.'2" data-i="'.$i.'" class="pjawaban" style="margin-top: 15px" required="">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <input type="text" name="pilihan'.$i.'[]" class="form-control pilihan2" style="margin: 2px" id="pilihan'.$i.'2" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-1">
                                                        <input type="radio" name="pjawaban'.$i.'" data-id="'.$i.'3" data-i="'.$i.'"class="pjawaban" style="margin-top: 16px" required="">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <input type="text" name="pilihan'.$i.'[]" class="form-control pilihan3" style="margin: 2px" id="pilihan'.$i.'3" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-1">
                                                        <input type="radio" name="pjawaban'.$i.'" data-id="'.$i.'4" data-i="'.$i.'"class="pjawaban" style="margin-top: 16px" required="">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <input type="text" name="pilihan'.$i.'[]" class="form-control pilihan4" style="margin: 2px" id="pilihan'.$i.'4" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-1">
                                                        <input type="radio" name="pjawaban'.$i.'" data-id="'.$i.'5" data-i="'.$i.'"class="pjawaban" style="margin-top: 16px" required="">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <input type="text" name="pilihan'.$i.'[]" class="form-control pilihan5" style="margin: 2px" id="pilihan'.$i.'5" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label><b>Jawaban</b></label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="jawaban" class="form-control jawaban'.$i.'" style="margin: 2px" disabled="">
                                                        <div class="help-block with-errors"></div>
                                                        <input type="hidden" name="jawaban[]" class="jawaban'.$i.'">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        <hr></div></div>';
                                    } ?>                                         
                                <?php endif ?>
                                <br>
                            </div><br>
                        </div>

                    </div>
                </div>
                <div id="step-2" role="form" data-toggle="validator" style="padding:30px">
                    <div class="row">
                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card" style="padding: 20px">
                                <label><b>Ketentuan Pelaksanaan Ujian Online</b></label>
                                <textarea class="form-control" name="ketentuanpelaksanaanujian" rows="15" cols="30" required=""></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="step-3" role="form" data-toggle="validator" style="padding:30px">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card" style="padding: 20px">
                                <label><b>Durasi Pelaksanaan Ujian</b></label>
                                <input type="number" name="durasiujian" class="form-control" placeholder="Durasi (Menit)" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="card" style="padding: 20px">
                                <label><b>Jumlah Soal Yang Ditampilkan (MAX = <?php echo $jumlahsoal; ?>)</b></label>
                                <input type="number" name="soaltampil" class="form-control" placeholder="Jumlah Soal Tampil" max="<?php echo $jumlahsoal; ?>" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                            <input type="submit" name="simpansemua" align="center" class="btn btn-fill btn-primary pull-right simpansemua" value="Simpan Semua" style="margin-right: 5px ">
                        </div>
                    </div>
                </div>

            
        </div>
    </div>
    </form>
    <?php endif ?>
    

    
    <?php if (!empty($datasoalujianmatakuliah)): ?>
        <div class="row tempatform">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="card">
                        <div class="header colorblue" style="padding: 20px">
                            <h3 class="title" style="color: white">SOAL UJIAN MATAKULIAH <?php echo $datanamamatakuliah['namamatakuliah']; ?></h3>
                            <p><em style="color: white; font-size: 12px">Daftar pertanyaan Ujian Matakuliah <?php echo $datanamamatakuliah['namamatakuliah']; ?></em></p>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="container-fluid formsoal" style="padding: 30px">
                                    <?php 
                                        $countsoal = count($datasoalujianmatakuliah);
                                        if ($countsoal>0) { 
                                            for ($z=0; $z < $countsoal; $z++) { 
                                                $no = $z+1;
                                    ?>
                                    <div class="card">
                                        <a href="index.php?halaman=hdt&d=sl&id=<?php echo $datasoalujianmatakuliah[$z]['idsoal'] ?>&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>" class="pull-right btn btn-danger btn-fill"><i class="fa fa-trash"></i></a>
                                        <div class="row">
                                            <div class="form-group pull-left" style="padding: 20px">
                                            <?php echo '<p><b>'.$no.'. '.$datasoalujianmatakuliah[$z]['soal'].'</b></p>'; ?>
                                            <?php 

                                            $hexplodepilihan = explode("`", $datasoalujianmatakuliah[$z]['pilihanganda']);
                                            $counthexplode = count($hexplodepilihan);
                                            for ($y=0; $y < $counthexplode; $y++) { 
                                                echo '<div class="container-fluid">';
                                                if ($y === 0) {
                                                    echo 'A. '.$hexplodepilihan[$y];
                                                }elseif ($y === 1) {
                                                    echo 'B. '.$hexplodepilihan[$y];
                                                }elseif ($y === 2) {
                                                    echo 'C. '.$hexplodepilihan[$y];
                                                }elseif ($y === 3) {
                                                    echo 'D. '.$hexplodepilihan[$y];
                                                }elseif ($y === 4) {
                                                    echo 'e. '.$hexplodepilihan[$y];
                                                }
                                                echo '</div>';
                                            }

                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }} ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    


<?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',  'TITLE MODAL',                                 'IDFORM',           'STYLE',)
            $fungsiview->headerformmodal("modaljumlahsoal",      "Masukan jumlah soal yang akan diinputkan",     "formjumlah soal",     "background-color: green; color:white");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                 'TYPE',     'NAME',         'REQUIRED')
            $fungsiview->formtext("Jumlah Soal",            "number",     "jumlahsoal",  "required");

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('tambah');

     ?>

     <?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',      'TITLE MODAL',      'IDFORM',           'STYLE',)
            $fungsiview->headerformmodal("modaltambahsoal",     "Masukan soal",     "formdatasoal",     "background-color: green; color:white");
    ?>
        <div class="content">
            <div class="form-group">
                <label><b>Soal</b></label>
                <textarea class="form-control soal" name="soalsoal" placeholder="Masukan Soal" required=""></textarea>
            </div>
            <label><b>Pilihan</b></label>
            <div class="form-group">
                <div class="col-md-1">
                <input type="radio" name="pjawabansoal" data-id="1" class="pjawabansoal" style="margin-top: 15px" required="">
                </div>
                <div class="col-md-11">
                    <input type="text" name="pilihansoal[]" id="pilihansoal1" class="form-control pilihan" style="margin: 2px" required="">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1">
                <input type="radio" name="pjawabansoal" data-id="2" class="pjawabansoal" style="margin-top: 15px" required="">
                </div>
                <div class="col-md-11">
                    <input type="text" name="pilihansoal[]" id="pilihansoal2" class="form-control pilihan" style="margin: 2px" required="">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1">
                <input type="radio" name="pjawabansoal" data-id="3" class="pjawabansoal" style="margin-top: 15px" required="">
                </div>
                <div class="col-md-11">
                    <input type="text" name="pilihansoal[]" id="pilihansoal3" class="form-control pilihan" style="margin: 2px" required="">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1">
                <input type="radio" name="pjawabansoal" data-id="4" class="pjawabansoal" style="margin-top: 15px" required="">
                </div>
                <div class="col-md-11">
                    <input type="text" name="pilihansoal[]" id="pilihansoal4" class="form-control pilihan" style="margin: 2px" required="">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1">
                <input type="radio" name="pjawabansoal" data-id="5" class="pjawabansoal" style="margin-top: 15px" required="">
                </div>
                <div class="col-md-11">
                    <input type="text" name="pilihansoal[]" id="pilihansoal5" class="form-control pilihan" style="margin: 2px" required="">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <label><b>Jawaban</b></label>
                </div>
                <div class="col-md-12">
                    <input type="text" name="jawabansoal" class="form-control jawabansoal" style="margin: 2px" disabled="">
                    <div class="help-block with-errors"></div>
                    <input type="hidden" name="jawabansoal" class="jawabansoal">
                </div>
            </div>
        </div>
    <?php 

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('tambahdata');

     ?>


<script type="text/javascript">

    

	$(document).ready(function(){
        $('#smartwizard').smartWizard({
            theme : 'dots',
            keyboardSettings: {
                  keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
              },
        });

        $(".table").DataTable();
        <?php if (empty($datasoalujianmatakuliah) AND empty($jumlahsoal)) : ?>
            $('#modaljumlahsoal').modal('show');
        <?php endif ?>
    });


        $(document).on("change", ".pjawaban", function(){
            var jawab = $(this).data('id');
            var i = $(this).data('i');
            var soal = $(".classsoal")
            var jawaban = document.getElementById('pilihan'+jawab).value;
            $(".jawaban"+i).val(jawaban)

        });

        $(document).on("click", ".tambahsoal", function(){
            $('#modaljumlahsoal').modal('show');
        });

        $(document).on("click", ".tambahdatasoal", function(){

            $('#modaltambahsoal').modal('show');

            $(document).on("change", ".pjawabansoal", function(){
            var jawaban = $(this).data('id');
            var jawabannya = document.getElementById('pilihansoal'+jawaban).value;
            $(".jawabansoal").val(jawabannya)

            });
        });
        
</script>