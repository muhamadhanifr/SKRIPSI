<?php if (session::get('level')!=='dosen'): ?>
    <?php echo "<script>location='hal404.php';</script>"; ?>
<?php endif ?>

<?php 

    $datajadwalujianharian = $user->get_datajadwalujianharian($_GET['t']);
    $datanamamatakuliah = $user->get_datamatakuliah($datajadwalujianharian['idmatakuliah']);
    $datasoalujianharian = $user->ambil_datasoalujianharianwherekodeujianharian($_GET['t']);


    if (input::get('submit')=="Simpan Data") {
        $jumlahsoal = input::get('jumlahsoal');
    }

    if (input::get('submit')=="Tambah Data") {
        $countsoalsoal = count(input::get('pilihansoal'));
        if ($countsoalsoal > 0) {
            $explodepilihansoal = implode("`", input::get('pilihansoal'));
            $inputsoal = array(
                'kodeujianharian'	=> $_GET['t'],
                'soal'          	=> input::get('soalsoal'),
                'pilihanganda'  	=> $explodepilihansoal,
                'jawabansoal'   	=> input::get('jawabansoal')

                );
        }
        $user->tambahsoaljadwalujianharian($inputsoal);
        echo "<script>location='index.php?halaman=tsuh&t=$_GET[t]';</script>";
    }
    
	if (input::get('simpansemua')==="Simpan Semua") {
        $countsoal = count(input::get('soal'));
        if ($countsoal>0) {
            for ($j=0; $j < $countsoal; $j++) { 
                $countpilihan = count(input::get('pilihan'.$j));
                if ($countpilihan>1) {
                    $dataimplodepilihan = implode("`", input::get('pilihan'.$j));                }
                $input = array(
                'kodeujianharian'   => $_GET['t'],
                'soal'              => input::get('soal')[$j],
                'pilihanganda'      => $dataimplodepilihan,
                'jawabansoal'       => input::get('jawaban')[$j],
            );
                $user->tambahsoaljadwalujianharian($input);
            }
            $user->tambahketentuanjadwalujianharian(array(
                    'ketentuanujian'    => input::get('ketentuanpelaksanaanujian'),
                    'durasiujian'       => input::get('durasiujian'),
                    'soaltampil'   		=> input::get('soaltampil'),
                    ),$_GET['t']);

        }
        echo "<script>location='index.php?halaman=tsuh&t=$_GET[t]';</script>";
        
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
            <div class="card">
                <div class="kosong" align="center">
                	<div class="header" style="padding: 10px">
                		<div class="content">
		                    <?php if (empty($datasoalujianharian)): ?>
		                        <p><em>Soal Belum Anda Masukan</em></p>
		                        <button class="btn btn-success tambahsoal">Tambah Soal</button>
		                    <?php else: ?>
		                        <button class="btn btn-success tambahdatasoal">Tambah Soal</button>
		                        <hr>
		                        <div class="ketentuan" style="display: none">
		                        	<div class="form-group">
		                        		<label>Ketentuan</label>
		                        		<p><?php echo $datajadwalujianharian['ketentuanujian']; ?></p>
		                        	</div>
		                        	<div class="col-md-4">
		                        		<div class="form-group">
		                        			<label>Durasi Ujian</label>
		                        			<p><?php echo $datajadwalujianharian['durasiujian']." Menit"; ?></p>
		                        		</div>
		                        	</div>
		                        	<div class="col-md-4">
		                        		<div class="form-group">
		                        			<label>Waktu Pelaksanaan</label>
		                        			<p><?php echo $fungsiview->tanggal($datajadwalujianharian['waktupelaksanaan']); ?></p>
		                        		</div>
		                        	</div>
		                        	<div class="col-md-4">
		                        		<div class="form-group">
		                        			<label>Jumlah Soal Yang Ditampilkan</label>
		                        			<p><?php echo $datajadwalujianharian['soaltampil']; ?></p>
		                        		</div>
		                        	</div>
		                        	<div class="row">
		                        	<div class="col-md-4"></div>
		                        	<div class="col-md-4">
		                        		<div class="form-group">
		                        			<label>Kode Ujian</label>
		                        			<input type="text" class="form-control text-center" disabled="" value="<?php echo $datajadwalujianharian['kodeujian']; ?>">
		                        		</div>
		                        	</div>
		                        	<div class="col-md-4"></div>
		                        	</div>
		                        	<hr>
		                        </div>
		                    <?php endif ?>
                    	</div>
                    	<div class="stats lihatketentuan">
                    		<a class="seekt"> Lihat Ketentuan </a><a class="hidekt" style="display: none"> Tutup</a>
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
                        <br>
                        Soal Ujian<br><small>Masukan Soal Ujian</small>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-2">
                        <br>
                        Ketentuan Ujian<br><small>Ketentuan Pelaksanaan Ujian</small>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#step-3">
                        <br>
                        Durasi Ujian dan Jumlah Soal<br><small>Durasi Ujian dan Jumlah Soal Yang Ditampilkan</small>
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
                                <label><b>Durasi Pelaksanaan Ujian (SATUAN = MENIT)</b></label>
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
    

    
    <?php if (!empty($datasoalujianharian)): ?>
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
                                        $countsoal = count($datasoalujianharian);
                                        if ($countsoal>0) { 
                                            for ($z=0; $z < $countsoal; $z++) { 
                                                $no = $z+1;
                                    ?>
                                    <div class="card">
                                        <a href="index.php?halaman=hdt&d=sluh&id=<?php echo $datasoalujianharian[$z]['idsoal'] ?>&t=<?php echo $datasoalujianharian[$z]['kodeujianharian']; ?>" class="pull-right btn btn-danger btn-fill"><i class="fa fa-trash"></i></a>
                                        <div class="row">
                                            <div class="form-group pull-left" style="padding: 20px">
                                            <?php echo '<p><b>'.$no.'. '.$datasoalujianharian[$z]['soal'].'</b></p>'; ?>
                                            <?php 

                                            $hexplodepilihan = explode("`", $datasoalujianharian[$z]['pilihanganda']);
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
        <?php if (empty($datasoalujianharian) AND empty($jumlahsoal)) : ?>
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

        $(document).on("click", ".seekt", function(){
            $('.ketentuan').slideDown();
            $('.hidekt').show();
            $('.seekt').hide();
        });
        $(document).on("click", ".hidekt", function(){
            $('.ketentuan').slideUp();
            $('.hidekt').hide();
            $('.seekt').show();
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