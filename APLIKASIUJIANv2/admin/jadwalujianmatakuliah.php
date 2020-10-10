<?php 

    $datajadwalujian = $user->getjadwalujianmtk();

    if (input::get('submit')==="Edit Data") {
        echo input::get('wkt');
        $user->edit_datajadwalmatakuliah(array(
            'waktupelaksanaan'    => input::get('waktupelaksanaan'),
            ),input::get('edid'));
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
                                <div class="header colorblue" style="padding: 20px">
                                    <h3 class="title" style="color: white;">Daftar Jadwal Ujian</h3>
                                    <p><em style="color: white; font-size: 12px">Silahkan Tentukan tanggal dan waktu pelaksanaan ujian setiap matakuliah</em></p>
                                </div>

                                <?php 
                                    $fungsiview->headertabel();
                                ?>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th width="400">Nama Ujian</th>
                                        <th>Tanggal dan Waktu Pelaksanaan</th>
                                        <th>Durasi Ujian</th>
                                        <th>Status</th>
                                        <th class="pull-right">Aksi</th>
                                    </tr>
                                </thead>

                                    <?php 
                                                $no=1;
                                        ?>

                                    <?php if (!empty($datajadwalujian)): ?>
                                        <form method="post">
                                        <?php foreach ($datajadwalujian as $datajadwal): ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $datajadwal['namaujian']; ?></td>
                                            <td>
                                                <?php if ($datajadwal['waktupelaksanaan'] == '0000-00-00 00:00:00'): ?>
                                                    <?php echo "0000-00-00 00:00:00"; ?>
                                                <?php else: ?>
                                                    <?php echo $datajadwal['waktupelaksanaan']; ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                            <?php if ($datajadwal['durasiujian'] == ''): ?>
                                                <div class="btn-fill btn-warning badge" style="font-size: 10px;"><b>Belum Di Atur</b></div>
                                            <?php else: ?>
                                                <?php echo $datajadwal['durasiujian']; ?>
                                            <?php endif ?>
                                            </td>
                                            <td><?php echo $datajadwal['status']; ?></td>
                                            <td class="pull-right">
                                                <button class="btn btn-info detailjadwal" name="detailjadwal" style="font-size: 10px" value="<?php echo $datajadwal['id']; ?>"><i class="fa fa-eye"></i></button>
                                                <button class="btn btn-warning editdatajadwal" name="editdatajadwal" style="font-size: 10px" value="<?php echo $datajadwal['id']; ?>"><i class="fa fa-edit"></i></button>
                                                <a href="index.php?halaman=hdt&d=hjwl&id=<?php echo $datajadwal['id'] ?>&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>&iduj=<?php echo $datajadwal['id']; ?>" class="btn btn-danger hapusdatajadwal" style="font-size: 10px; margin: 2px"><i class="fa fa-trash"></i></button></a>
                                            </td>

                                        </tr>
                                        <?php $no++ ?>
                                        <?php endforeach ?>

                                    <?php endif ?>
                                        
                                <?php
                                    $fungsiview->footertabel();
                                ?>
                                


     <?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',      'TITLE MODAL',               'IDFORM',       'STYLE',)
            $fungsiview->headerformmodal("modaldetailjadwal",   "Detail Data Jadwal Ujian");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                         'TYPE',     'NAME',                 'REQUIRED')
            $fungsiview->formtext("Nama Ujian",                     "text",     "dnamaujian",           "disabled");
            $fungsiview->formtext("Waktu Pelaksanaan",              "text",     "dwaktupelaksanaan",    "disabled");
            $fungsiview->formtext("Durasi Ujian",                   "text",     "ddurasi",              "disabled");
            $fungsiview->formtext("Jumlah Soal Yang Ditampilkan",   "text",     "djmlsoal",             "disabled");
            $fungsiview->formtext("Angkatan",                       "text",     "dakt",                 "disabled");
            $fungsiview->formtext("Status",                         "text",     "dstatus",              "disabled");

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal();

     ?>

     <?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',      'TITLE MODAL',               'IDFORM',       'STYLE',)
            $fungsiview->headerformmodal("modaleditjadwal",   "Edit Data Jadwal Ujian");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                         'TYPE',     'NAME',                 'REQUIRED')
            $fungsiview->formtext("Nama Ujian",                     "text",     "enamaujian",           "disabled");
            $fungsiview->formtext("Waktu Pelaksanaan",              "text",     "edatetime",             "");
            $fungsiview->formtext("Durasi Ujian",                   "text",     "edurasi",              "disabled");
            $fungsiview->formtext("Jumlah Soal Yang Ditampilkan",   "text",     "ejmlsoal",             "disabled");
            $fungsiview->formtext("Angkatan",                       "text",     "eakt",                 "disabled");
            $fungsiview->formtext("Status",                         "text",     "estatus",              "disabled");

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal();

     ?>

<script type="text/javascript">
    $(".datetime").datetimepicker({
        format : "d-M-Y H:i:s",
    });
    $(".edatetime").datetimepicker({
        format : "d-M-Y H:i:s",
    });

    $(document).ready(function(){
        $(".table").DataTable({
        stateSave: true,
        aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
    });

    });

    $(document).on("click", ".detailjadwal", function(){

        $("#modaldetailjadwal").modal('show');

        let val = $(this).attr("value");
        let aksi = 'getdatajadwalujianmtk';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
                          "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                    $('#dnamaujian').val(resultOBJ.namaujian);
                    $('#dwaktupelaksanaan').val(resultOBJ.waktupelaksanaan);
                    $('#ddurasi').val(resultOBJ.durasiujian);
                    $('#djmlsoal').val(resultOBJ.jumlahsoalyangditampilkan);
                    $('#dakt').val(resultOBJ.angkatan);
                    $('#dstatus').val(resultOBJ.status);

            }
        });
    });

    $(document).on("click", ".editdatajadwal", function(){

        $("#modaleditjadwal").modal('show');

        let val = $(this).attr("value");
        let aksi = 'getdatajadwalujianmtk';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
                          "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                    $('#enamaujian').val(resultOBJ.namaujian);
                    $('#edatetime').val(resultOBJ.waktupelaksanaan);
                    $('#edurasi').val(resultOBJ.durasiujian);
                    $('#ejmlsoal').val(resultOBJ.jumlahsoalyangditampilkan);
                    $('#eakt').val(resultOBJ.angkatan);
                    $('#estatus').val(resultOBJ.status);

            }
        });

    });


</script>