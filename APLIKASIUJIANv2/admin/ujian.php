<?php 
    $datajenisujian = $user->get_jenisujian();

    if (input::get('submit') == 'Simpan Data') {

           $user->tambah_dataujian(array(
            'namaujian'  => input::get('namaujian')."-".input::get('tahunajaran'),
            'tipeujian'  => input::get('namaujian'),
            'tahunajaran'  => input::get('tahunajaran'),
            ));

        echo "<script>location='index.php?halaman=u';</script>";
        }

    if (input::get('submit') == 'Edit Data') {

           $user->edit_dataujian(array(
            'namaujian'  => input::get('enamaujian')."-".input::get("etahunajaran"),
            'tipeujian'  => input::get('enamaujian'),
            'tahunajaran'  => input::get('etahunajaran'),
            ),input::get('edid'));

        echo "<script>location='index.php?halaman=u';</script>";
        }

 ?>



<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right tambahdataujian">Tambah Ujian</button>
                                <h4 class="title" style="color: white;">Data Daftar Ujian</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>

                                <?php 
                                    $fungsiview->headertabel();
                                    ?>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Ujian</th>
                                        <th>Daftar Matakuliah</th>
                                        <th class="pull-right">Aksi</th>
                                    </tr>
                                </thead>
                                    <?php 
                                                $no=1;
                                        ?>
                                    <?php if (!empty($datajenisujian)): ?>
                                        <?php foreach ($datajenisujian as $dataujian): ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $dataujian['namaujian']; ?></td>
                                            <td><a href="index.php?halaman=jumtk&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>&id=<?php echo $dataujian['id'] ?>" class="btn btn-primary" style="font-size: 10px">LIHAT JADWAL</button></a></td>
                                            <td class="pull-right">
                                                <button class="btn btn-info detailujian" name="detailujian" style="font-size: 10px" value="<?php echo $dataujian['id']; ?>"><i class="fa fa-eye"></i></button>
                                                <button class="btn btn-warning editdataujian" name="editujian" style="font-size: 10px" value="<?php echo $dataujian['id']; ?>"><i class="fa fa-edit"></i></button>
                                                <a href="index.php?halaman=hdt&d=u&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>&id=<?php echo $dataujian['id'] ?>" class="btn btn-danger hapusdataujian" style="font-size: 10px"><i class="fa fa-trash"></i></button></a>
                                            </td>

                                        </tr>
                                        <?php $no++ ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                        
                                <?php
                                    $fungsiview->footertabel();
                                 ?>

</body>


 <?php 
        
        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',   'TITLE MODAL',                 'IDFORM',               'STYLE',)
            $fungsiview->headerformmodal("modaltambahujian",   "Tambah Data Ujian",         "formtambahujian",     "background-color: green; color:white");
                $gettahunajaran = $user->get_ta();
            

                // MEMANGGIL FUNGSI INPUT ('LABEL',              'TYPE',             'NAME',                        'REQUIRED')
                $fungsiview->formtext("Nama Ujian",              "text",             "namaujian",                   "required");
                

                // MEMANGGIL FUNGSI FORM SELECT ('LABEL&PLACEHOLDER',               'NAME',             'REQUIRED')
                $fungsiview->headerformselect   ("Tahun Ajaran",                    "tahunajaran",      "");

                    foreach ($gettahunajaran as $datata) { ?>
                        <option value="<?php echo $datata['nama']  ?>"><?php echo $datata['nama'] ?></option>
                    <?php }
                $fungsiview->footerformselect();


        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('tambah');

?>


<?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS', 'TITLE MODAL',               'IDFORM',       'STYLE',)
            $fungsiview->headerformmodal("modaldetailujian",   "Detail Ujian");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                         'TYPE',     'NAME',                       'REQUIRED')
                $fungsiview->formtext("Nama Ujian",                 "text",     "dnamaujian",               "disabled");
                $fungsiview->formtext("Tahun Ajaran",               "text",     "dtahunajaran",             "disabled");


        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal();

?> 

<?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',          'TITLE MODAL',            'IDFORM',                 'STYLE',)
            $fungsiview->headerformmodal("modaleditujian",          "Edit Ujian",              "formeditujian",         "background-color:yellow");
                $gettahunajaran = $user->get_ta();


            // MEMANGGIL FUNGSI INPUT (     'LABEL',                        'TYPE',             'NAME',                         'REQUIRED')
                $fungsiview->formtext(      "Nama Ujian",                   "text",             "enamaujian",                   "");


            // MEMANGGIL FUNGSI FORM SELECT (   'LABEL&PLACEHOLDER',      'NAME',             'REQUIRED')
                $fungsiview->headerformselect ( "Tahun Ajaran",           "etahunajaran",      "");

                        echo '<option name="fetahunajaran" id="fetahunajaran"></option>';
                    foreach ($gettahunajaran as $datata) { ?>
                        <option value="<?php echo $datata['nama']  ?>"><?php echo $datata['nama'] ?></option>
                    <?php }

                $fungsiview->footerformselect();

            // MEMANGGIL FUNGSI INPUT ('LABEL',        'TYPE',          'NAME',                 'REQUIRED')
                    $fungsiview->formtext("",          "hidden",        "edid",                 "");

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('edit');

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
    });


    $(document).on("click", ".tambahdataujian", function(){
        $("#modaltambahujian").modal('show');
    });


    $(document).on("click", ".detailujian", function(){
        $("#modaldetailujian").modal('show');
            let val = $(this).attr("value");
            let aksi = 'getdataujian';
            $.ajax({
                "type"      : "GET",
                "data"      : "val="+val+
                              "&aksi="+aksi,
                "url"       : "fungsi/getdata.php",
                success : function(result){
                    var resultOBJ = JSON.parse(result);
                        $('#dnamaujian').val(resultOBJ.tipeujian);
                        $('#dtahunajaran').val(resultOBJ.tahunajaran);
                }
            });
    });


    $(document).on("click", ".editdataujian", function(){

        $("#modaleditujian").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdataujian';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
                          "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);

                    $('#enamaujian').val(resultOBJ.tipeujian);
                    $('#fetahunajaran').val(resultOBJ.tahunajaran);
                    $('#fetahunajaran').html(resultOBJ.tahunajaran);
                    $('#edid').val(resultOBJ.id);

            }
        });

    });

</script>