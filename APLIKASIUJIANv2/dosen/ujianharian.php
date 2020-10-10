
 <?php 
     $taaktif = $user->get_taaktif('Aktif');
     $dataskajar = $user->get_dataskajarwherenamadosen(session::get('namadosen'),$taaktif['nama']);

     if (input::get('submit') === 'Simpan Data') {
        $nama = input::get('idmatakuliah')."-".input::get('angkatan');
        $kodeujianharian    = password_hash($nama, PASSWORD_DEFAULT);
         $fields = array(
                'kodeujianharian'   => $kodeujianharian,
                'idmatakuliah'      =>  input::get('idmatakuliah'),
                'waktupelaksanaan'  =>  input::get('waktupelaksanaan'),
                'angkatan'          =>  input::get('angkatan'),
                'tahunajaran'       =>  $taaktif['nama'],
                'kodeujian'         =>  password_hash($taaktif['nama'], PASSWORD_DEFAULT),
            );
         $user->tambahujianharian($fields);
         echo "<script>location='index.php?halaman=tsuh&t=$kodeujianharian';</script>";
     }
 ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid baba" style="margin: 20px">
                        <button class="btn btn-fill btn-success pull-right tambahuh">Tambah Data</button>
                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($dataskajar)): ?>
                        <?php foreach ($dataskajar as $sk): ?>
                            <?php $getujianharian = $user->get_dataujianharianwhidmtk($sk['idmatakuliah'], $taaktif['nama']); ?>
                            <?php $countuh = count($getujianharian) ?>
                            <?php if (!empty($getujianharian)): ?>
                                <a class="menuuh" data-id="<?php echo $sk['idmatakuliah']; ?>">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="header">
                                                    
                                                    <h5 class="title"><?php $dmtk = $user->get_datamatakuliah($sk['idmatakuliah']); echo $dmtk['namamatakuliah']; ?></h5>

                                                    <div class="content">
                                                        <div class="row">
                                                            <!-- <div class="col-md-8"> -->
                                                            <span class="stats" style="font-size: 10px">JUMLAH UJIAN HARIAN </span><span class="btn-primary"><i class="fa fa-book pull-right" style="font-size: 40px; margin-right: 50px"></i></span>
                                                            <p style="font-size:30px"><b><?php echo $countuh; ?></b></p>
                                                <!-- </div>
 -->                                                <!-- <div class="col-md-4">
                                                    <span><i class="fa fa-book" style="font-size: 40px"></i></span>
                                                </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> 
                            <?php endif ?>
                        <?php endforeach ?>    
                    <?php endif ?>
                </div>


                <?php if (!empty($dataskajar)): ?>
                    <div id="haha">
                        
                    </div>
                    <?php foreach ($dataskajar as $sk): ?>
                        <?php $getujianharian = $user->get_dataujianharianwhidmtk($sk['idmatakuliah'], $taaktif['nama']); ?>
                        <?php $countuh = count($getujianharian) ?>
                        <?php if (!empty($getujianharian)): ?>
                        <div class="row datanyauh" style="display: none" id="<?php echo $sk['idmatakuliah'] ?>">
                            <div class="col-md-12">
                                <div class="card">
                                    <form method="post">
                                        <div class="header colorblue" style="padding: 20px;">
                                            <h3 class="title" style="color: white">Daftar Ujian Harian Matakuliah <?php $dmtk = $user->get_datamatakuliah($sk['idmatakuliah']); echo $dmtk['namamatakuliah']; ?></h3>
                                        </div>
                                        <?php $fungsiview->headertabel();?>
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Matakuliah</th>
                                                <th>Waktu Pelaksanaan</th>
                                                <th>Durasi Ujian</th>
                                                <th>Soal Yang Ditampilkan</th>
                                                <th class="pull-right">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            <?php foreach ($getujianharian as $dataujianharian): ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td>
                                                        <?php 
                                                        $datamtk = $user->get_datamatakuliah($dataujianharian['idmatakuliah']);
                                                        echo $datamtk['namamatakuliah'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($dataujianharian['waktupelaksanaan'] !== '0000-00-00 00:00:00'): ?>
                                                            <?php echo $fungsiview->tanggal($dataujianharian['waktupelaksanaan']) ?>
                                                        <?php else: ?>
                                                            <?php echo $dataujianharian['waktupelaksanaan']; ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?php echo $dataujianharian['durasiujian']." Menit"; ?></td>
                                                    <td><?php echo $dataujianharian['soaltampil']; ?></td>
                                                    <td><a href="index.php?halaman=tsuh&t=<?php echo $dataujianharian['kodeujianharian']; ?>" class="btn btn-primary pull-right" style="font-size: 10px">Lihat Soal</a></td>
                                                </tr>
                                                <?php $no++ ?>
                                            <?php endforeach ?>
                                        </tbody>

                                        

                                        <?php
                                        $fungsiview->footertabel();
                                        ?>
                                        <input type="submit" name="submit" class="btn btn-primary btn-fill pull-right tambahform" align="center" value="Simpan Semua">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
                </div>
                </div>

<?php $fungsiview->headerformmodal("modaltambahuh",   "Tambah Data Surat Keterangan KBM",     "formtambahuh",     "background-color: green; color:white");?>
    <form method="post">
        <div class="form-group">
            <label>Matakuliah</label>
            <select name="idmatakuliah" class="form-control idmatakuliah" required="">
                <option value="" style="background-color: red">Silahkan Pilih</option>
                <?php foreach ($dataskajar as $dtmtk): ?>
                    <?php $datamtk = $user->get_datamatakuliah($dtmtk['idmatakuliah']);?>
                    <option value="<?php echo $datamtk['idmatakuliah']; ?>" class="form-control"><?php echo $datamtk['idmatakuliah']." - ".$datamtk['namamatakuliah']."- SEM(".$datamtk['semester'].")"; ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label>Waktu Pelaksanaan</label>
            <input class="datetime form-control" autocomplete="off" name="waktupelaksanaan" required="">
        </div>

        <div class="form-group">
            <label>Angkatan</label>
            <select name="angkatan" class="form-control angkatan" required="">
                <option value="" style="background-color: red">Silahkan Pilih</option>
                <?php $dtangkatan = $user->get_dtangkatan(); ?>
                <?php foreach ($dtangkatan as $dataangkatan): ?>
                    <?php $datamtk = $user->get_datamatakuliah($dtmtk['idmatakuliah']);?>
                    <option value="<?php echo $dataangkatan['nama']; ?>" class="form-control"><?php echo $dataangkatan['nama'];?></option>
                <?php endforeach ?>
            </select>
        </div>
    
<?php $fungsiview->footerformmodal('tambah');?>
</form>


<script type="text/javascript">
    $(document).ready(function(){
        $(".datetime").datetimepicker();
    });

    $(document).on("click", ".menuuh", function(){
        let id = $(this).data('id');
        let html = $("#"+id).html();
        $("#haha").html(html);
        // console.log(id/);
        // $("#"+id).show();
    });

    $(document).on("click", ".tambahuh", function(){
        $("#modaltambahuh").modal('show');
    })

</script>
