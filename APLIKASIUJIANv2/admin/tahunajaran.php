<?php 
    $datatahunajaran = $user->get_ta();

 
    if (input::get('submit') == 'Simpan Data') {

           $user->tambah_datata(array(
            'nama'          => input::get('namata')."-".input::get('semester'),
            'tahunajaran'   => input::get('namata'),
            'semester'      => input::get('semester'),
            'status'        => 'Tidak Aktif',
            ));

        echo "<script>location='index.php?halaman=ta';</script>";
        }

    if (input::get('submit') == 'Edit Data') {

           $user->edit_datata(array(
            'nama'          => input::get('enamata')."-".input::get('esemester'),
            'tahunajaran'   => input::get('enamata'),
            'semester'  => input::get('esemester'),
            ),input::get('edid'));

        echo "<script>location='index.php?halaman=ta';</script>";
        }

    if (input::get('submit') == 'Aktifkan') {
        $dataaktif = $user->get_datataaktif('Aktif');
        if (!empty($dataaktif)) {
            echo "<script>alert('Non Aktifkan Terlebih Dahulu $dataaktif[nama]');</script>";
            echo "<script>location='index.php?halaman=ta';</script>";
        }else{
            $user->edit_datata(array(
                    'status'    => 'Aktif',
                ),input::get('edsts'));
            echo "<script>location='index.php?halaman=ta';</script>";
        }
    }elseif (input::get('submit') == 'Non Aktifkan') {
        $user->edit_datata(array(
                    'status'    => 'Tidak Aktif',
        ),input::get('edsts'));
        echo "<script>location='index.php?halaman=ta';</script>";
    }
 ?>




<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right tambahdatata">Tambah Tahun Ajaran</button>
                                <h4 class="title" style="color: white;">Data Daftar Tahun Ajaran</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>

                                <?php 
                                    $fungsiview->headertabel();
                                ?>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Tahun Ajaran</th>
                                        <th>Status</th>
                                        <th>Ubah Status</th>
                                        <th class="pull-right">Aksi</th>
                                    </tr>
                                </thead>

                                    <?php 
                                                $no=1;
                                        ?>

                                    <?php if (!empty($datatahunajaran)): ?>

                                        <?php foreach ($datatahunajaran as $datata): ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $datata['nama']; ?></td>
                                            <td><?php echo $datata['status']; ?></td>
                                            <td><form method="post">
                                                <input type="hidden" name="edsts" value="<?php echo $datata['id'] ?>">
                                                <?php if ($datata['status']=='Aktif'): ?>
                                                    <input type="submit" name="submit" class="btn btn-warning btn-fill" id="nonaktifkan" style="font-size: 9px" value="Non Aktifkan">
                                                <?php else: ?>
                                                    <input type="submit" name="submit" class="btn btn-primary btn-fill" id="aktifkan" style="font-size: 9px" value="Aktifkan">
                                                <?php endif ?>
                                            </form></td>
                                            <td class="pull-right">
                                                <button class="btn btn-info detailta" name="detailta" style="font-size: 9px" value="<?php echo $datata['id']; ?>"><i class="fa fa-eye"></i></button>
                                                <button class="btn btn-warning editdatata" name="editta" style="font-size: 9px" value="<?php echo $datata['id']; ?>"><i class="fa fa-edit"></i></button>
                                                <a href="index.php?halaman=hdt&d=ta&id=<?php echo $datata['id'] ?>&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>" class="btn btn-danger hapusdatata" style="font-size: 9px"><i class="fa fa-trash"></i></button></a>
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

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS', 'TITLE MODAL',                   'IDFORM',           'STYLE',)
            $fungsiview->headerformmodal("modaltambahta",   "Tambah Data Tahun Ajaran",     "formtambahta",     "background-color: green; color:white");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                 'TYPE',     'NAME',     'REQUIRED')
            $fungsiview->formtext("Tahun Ajaran",       "text",     "namata",   "required");
        // MEMANGGIL FUNGSI FORM SELECT ('LABEL&PLACEHOLDER',               'NAME',             'REQUIRED')
                $fungsiview->headerformselect   ("Semester",                    "semester");
                    echo '<option value="Ganjil">Ganjil</option>';
                    echo '<option value="Genap">Genap</option>';
                    echo '<option value="Pendek">Pendek</option>';
                $fungsiview->footerformselect();

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('tambah');

     ?>

     <?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS', 'TITLE MODAL',               'IDFORM',       'STYLE',)
            $fungsiview->headerformmodal("modaldetailta",   "Detail Data Tahun Ajaran");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                 'TYPE',     'NAME',     'REQUIRED')
            $fungsiview->formtext("Tahun Ajaran",           "text",     "dnamata",  "disabled");
            $fungsiview->formtext("Semester",               "text",     "dsemester", "disabled");

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal();

     ?> 

      <?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS',  'TITLE MODAL',              'IDFORM',       'STYLE',)
            $fungsiview->headerformmodal("modaleditta",     "Edit Data Tahun Ajaran",   "formeditta",   "background-color:yellow");

        // MEMANGGIL FUNGSI INPUT   ('LABEL',                   'TYPE',     'NAME',       'REQUIRED')
            $fungsiview->formtext   ("Tahun Ajaran",            "text",    "enamata");
        // MEMANGGIL FUNGSI FORM SELECT ('LABEL&PLACEHOLDER',               'NAME',             'REQUIRED')
                    $fungsiview->headerformselect   ("Semester",            "esemester");
                        echo '<option id="fesemester" selected></option>';
                        echo '<option value="Ganjil">Ganjil</option>';
                        echo '<option value="Genap">Genap</option>';
                        echo '<option value="Pendek">Pendek</option>';
                    $fungsiview->footerformselect();
            $fungsiview->formtext   ("",                      "hidden",  "edid");

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


    $(document).on("click", ".tambahdatata", function(){

        $("#modaltambahta").modal('show');

    });


    $(document).on("click", ".detailta", function(){

        $("#modaldetailta").modal('show');
       
        let val = $(this).attr("value");
        let aksi = 'getdatata';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
                          "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                    $('#dnamata').val(resultOBJ.tahunajaran);
                    $('#dsemester').val(resultOBJ.semester);

            }
        });

    });


    $(document).on("click", ".editdatata", function(){

        $("#modaleditta").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdatata';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
                          "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);

                    $('#enamata').val(resultOBJ.tahunajaran);
                    $('#fesemester').html(resultOBJ.semester);
                    $('#fesemester').val(resultOBJ.semester);
                    $('#edid').val(resultOBJ.id);

            }
        });

    });




</script>

