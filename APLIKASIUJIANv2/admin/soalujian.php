<?php 
    if (input::get('submit')=="Simpan Data") {
        $jumlahsoal = input::get('jumlahsoal');
    }
    
	if (input::get('simpansemua')==="Simpan Semua") {
        $jawaban = input::get('pjawaban');
        $input = array(
                'soal'       => input::get('soal'),
                'pilihan'    => input::get('pilihan'),
                'pjawaban'   => input::get('pjawaban'),
            );
        echo "<pre>";
        print_r($input);
        die();
		$user->tambah_tambahjadwalujian(array(
            'namajadwal'    => $datajenisujian['namaujian'],
            'matakuliah'    => input::get('ckmtk'),
            'tanggalujian'  => input::get('tanggalujian'),
            'angkatan'      => input::get('angkatan'),
            ));
	}

    // if ($_GET['jmls']=='') {
    //     echo "<script>modaljumlahsoal</script>";
    // }
 ?>

<div class="content">
        
            <div class="container-fluid" id="fi">
                <div class="row tempatform">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <h3 class="title" style="color: white">SOAL UJIAN</h3>
                                <p><em style="color: white; font-size: 12px">Silahkan Tentukan Matakuliah yang diujiankan, tanggal pelaksanaan ujian setiap matakuliah, dan diperuntukan angkatan berapa</em></p>
                            </div>

                            
                            <div class="content">
                                <div class="row">
                                    <div class="container-fluid formsoal" style="padding: 30px">
                                        <?php if (!empty($jumlahsoal)): ?>
                                            <?php for ($i=0; $i < $jumlahsoal; $i++) { 
                                                echo '
                                                    <label>Soal</label><textarea class="form-control" name="soal"></textarea><br>
                                                    <label>Pilihan</label>
                                                    <div class="pilihanrb">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="pjawaban" data-id="1" class="pjawaban'.$i.'" style="margin-top: 15px">
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <input type="text" name="pilihan1" class="form-control pilihan1" style="margin: 2px">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="pjawaban" data-id="2" class="pjawaban'.$i.'" style="margin-top: 15px">
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <input type="text" name="pilihan2" class="form-control pilihan2" style="margin: 2px">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="pjawaban" data-id="3" class="pjawaban'.$i.'" style="margin-top: 16px">
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <input type="text" name="pilihan3" class="form-control pilihan3" style="margin: 2px">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="pjawaban" data-id="4" class="pjawaban'.$i.'" style="margin-top: 16px">
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <input type="text" name="pilihan4" class="form-control pilihan4" style="margin: 2px">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="pjawaban" data-id="5" class="pjawaban'.$i.'" style="margin-top: 16px">
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <input type="text" name="pilihan5" class="form-control pilihan5" style="margin: 2px">
                                                                    </div>
                                                                </div><!-- 
                                                                <div class="col-md-1">
                                                                    <button class="btn btn-success btn-fill pull-left tambahrb">+</button>
                                                                </div> -->
                                                            </div>
                                                    </div>
                                                 </div>
                                                 <br><hr>';
                                            } ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <input type="submit" name="simpansemua" class="btn btn-fill btn-primary pull-right simpansemua" value="Simpan Semua" style="margin-right: 5px ">
                </form>
                <!-- <button class="btn btn-primary btn-fill pull-right simpansemua" style="margin-right: : 5px">Simpan Semua</button> -->
            </div>
        </div>

<?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',  'TITLE MODAL',                                 'IDFORM',           'STYLE',)
            $fungsiview->headerformmodal("modaljumlahsoal",      "Masukan jumlah soal yang akan diinputkan",     "formjumlah soal",     "background-color: green; color:white");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                 'TYPE',     'NAME',         'REQUIRED')
            $fungsiview->formtext("Jumlah Soal",            "number",     "jumlahsoal",  "required");

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('tambah');

     ?>


<script type="text/javascript">

    

	$(document).ready(function(){
        $(".table").DataTable({
        stateSave: true,
        aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
    });
        <?php if (empty($jumlahsoal)) : ?>
            $('#datakosong').append('<p>Soal Masih Belum Dimasukan<p>');
            $('#modaljumlahsoal').modal('show');
        <?php endif ?>
    });

        
        $(document).on("change", ".pjawaban", function(){
            var jawab = $(this).data('id');
            var jawaban = document.getElementById('pilihan'+jawab).value;
            console.log(jawaban);
        })
        
</script>