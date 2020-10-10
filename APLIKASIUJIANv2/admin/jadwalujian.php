<?php 

	$datajenisujian = $user->get_datajenisujian($_GET['id']);
	$datajadwalujian = $user->getdatajadwalujianmtk($datajenisujian['id']);



	if (input::get('submit')==="Simpan Semua") {
        $wkt = count(input::get('waktupelaksanaan'));
        for ($i=0; $i < $wkt; $i++) { 
            $input = array(
                'waktupelaksanaan'    => input::get('waktupelaksanaan')[$i],
            );
            $user->edit_datajadwalmatakuliah($input,input::get('edid')[$i]);
        }
        echo "<script>location='index.php?halaman=jumtk&t=$_GET[t]&id=$_GET[id]';</script>";
	}

    if (input::get('submit') === 'Simpan Data') {
        $ckmtk = count(input::get('ckmtk'));
        if ($ckmtk >= 1) {
            for ($i=0; $i < $ckmtk; $i++) { 
                $dtmtk = $user->get_datamtk(input::get('ckmtk')[$i]);
                $input = array(
                    'idjenisujian'  => $datajenisujian['id'],
                    'namaujian'     => "(".$dtmtk['namamatakuliah'].") ".input::get('programstudi').$datajenisujian['namaujian']." Angkatan-".input::get('angkatan'),
                    'programstudi'  => input::get('programstudi'),
                    'angkatan'      => input::get('angkatan'),
                    'idmatakuliah'  => input::get('ckmtk')[$i],
                );
                $user->tambahjadwalujianmtk($input);
           }
        }else{
            $user->tambahjadwalujian(array(
                'idjenisujian'  => $datajenisujian['id'],
                'namaujian'     => "(".input::get('ckmtk').") ".input::get('programstudi').$datajenisujian['namaujian']." Angkatan-".input::get('angkatan'),
                'programstudi'  => input::get('programstudi'),
                'angkatan'      => input::get('angkatan'),
                'idmatakuliah'  => input::get('ckmtk'),
            ));
        }
        echo "<script>location='index.php?halaman=jumtk&t=$_GET[t]&id=$_GET[id]';</script>";
    }


        
 ?>
<div class="content">
            <div class="container-fluid" id="fi">
                <div class="row">
                    <div class="container-fluid" style="margin: 20px">
                        <button class="btn btn-fill btn-success pull-right tambahjadwal">Tentukan Jadwal</button>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            <form method="post">
                                <div class="header colorblue" style="padding: 20px">
                                    <h3 class="title" style="color: white;"><?php echo $datajenisujian['namaujian']; ?></h3>
                                    <p><em style="color: white; font-size: 12px">Silahkan Tentukan tanggal dan waktu pelaksanaan ujian setiap matakuliah</em></p>
                                </div>

                                <?php 
                                    $fungsiview->headertabel();
                                ?>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Matakuliah</th>
                                        <th>Prodi dan Angkatan</th>
                                        <th>Tanggal dan Waktu Pelaksanaan</th>
                                        <th class="pull-right">Aksi</th>
                                    </tr>
                                </thead>

                                    <?php 
                                                $no=1;
                                        ?>

                                    <?php if (!empty($datajadwalujian)): ?>
                                        <?php foreach ($datajadwalujian as $datajadwal): ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                            <?php 
                                                $getmtk = $user->get_datamtk($datajadwal['idmatakuliah']);
                                                echo $getmtk['namamatakuliah'];
                                            ?>
                                            </td>
                                            <td><?php echo $datajadwal['programstudi']."-".$datajadwal['angkatan']; ?></td>
                                            <td>
                                                <?php if ($datajadwal['waktupelaksanaan'] !== '0000-00-00 00:00:00'): ?>
                                                    <?php echo $fungsiview->tanggal($datajadwal['waktupelaksanaan']) ?>
                                                <?php else: ?>
                                                    <input class="datetime form-control" autocomplete="off" name="waktupelaksanaan[]"><input type="hidden" name="edid[]" value="<?php echo $datajadwal['id'] ?>">
                                                <?php endif ?>
                                            
                                            </td>
                                            <td class="pull-right">
                                                <a href="index.php?halaman=hdt&d=hjumtk&id=<?php echo $datajadwal['id'] ?>&tt=<?php echo $_GET['t'] ?>&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>&iduj=<?php echo $_GET['id']; ?>" class="btn btn-danger hapusdatajadwal" style="font-size: 10px; margin: 2px"><i class="fa fa-trash"></i></button></a>
                                            </td>

                                        </tr>
                                        <?php $no++ ?>
                                        <?php endforeach ?>

                                    <?php endif ?>
                                        
                                <?php
                                    $fungsiview->footertabel();
                                ?>

                                <input type="submit" name="submit" class="btn btn-primary btn-fill pull-right tambahform" align="center" value="Simpan Semua">
                                </form>
                            </div>
                        </div>

<?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS', 'TITLE MODAL',                   'IDFORM',           'STYLE',)
            $fungsiview->headerformmodal("modaltambahjadwal",   "Tambah Data Angkatan",     "formtambahakt",     "background-color: green; color:white");
            $dataskajar = $user->get_dataskajar($datajenisujian['tahunajaran']);


            $getangkatan = $user->get_angkatan();
                // MEMANGGIL FUNGSI FORM SELECT ('LABEL&PLACEHOLDER',               'NAME',             'REQUIRED')
                $fungsiview->headerformselect   ("Angkatan",                        "angkatan",       "");
                echo '<optgroup label="Silahkan Pilih">';
                foreach ($getangkatan as $dataangkatan) { ?>
                <option value="<?php echo $dataangkatan['nama']  ?>"><?php echo $dataangkatan['nama'] ?></option>
                <?php }

            $fungsiview->footerformselect();
            echo "<br>";

            $fungsiview->headerformselect   ("Program Studi",      "programstudi",       "");
                echo '<optgroup label="Silahkan Pilih">';
                echo '<option value="Teknik Informatika">Teknik Informatika</option>';
                echo '<option value="Sistem Informasi">Sistem Informasi</option>';
            $fungsiview->footerformselect();

            echo "<br>";
            echo "<label>Pilih Matakuliah</label>";
            $dataskajar = $user->get_dataskajar($datajenisujian['tahunajaran']);
                $fungsiview->headertabel();
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th><input type="checkbox" class="ckall"></th>';
                            echo '<th>Matakuliah</th>';
                            echo '<th>Semester</th>';
                        echo '</tr>';
                    echo '</thead>';
                        $no=1;
                        if (!empty($dataskajar)):
                            foreach ($dataskajar as $datask):
                                $idmtk = $datask['idmatakuliah'];
                                    echo '<tr>';
                                    $datamtk = $user->get_datamtk($idmtk);
                                        echo '<td><input type="Checkbox" name="ckmtk[]" class="ckmtk" value="'.$datamtk['idmatakuliah'].'"></td>';
                                        echo '<td>'.$datamtk['namamatakuliah'].'</td>';            
                                        echo '<td>'.$datamtk['lembaga'].'-Sem'.$datamtk['semester'].'</td>';            
                                    echo '</tr>';
                                    $no++;
                            endforeach;
                        endif;

                $fungsiview->footertabel();


        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('tambah');

     ?>

 

<script type="text/javascript">
    $(".datetime").datetimepicker();

	$(document).ready(function(){
        $(".table").DataTable({
        stateSave: true,
        aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
    });
        $("#fmtk").show();
        $(".lihatform").hide();

    });



    $(document).on("click", ".tambahjadwal", function(){

        $("#modaltambahjadwal").modal('show');

    });

        $(document).on("change", ".ckmtk", function(){
            let val = $(".ckmtk").val();
            $(".tanggalujian"+val).hide();
            console.log(val);
        });

        $('.ckall').on('change', function() {     
                $('.ckmtk').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.ckmtk').change(function(){ //".checkbox" change 
            if($('.ckmtk:checked').length == $('.checkbox').length){
                   $('.ckall').prop('checked',true);
            }else{
                   $('.ckall').prop('checked',false);
            }
        });
    
</script>