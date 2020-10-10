
<?php 

    $dataskajar = $user->get_dataskajarincrud('tahunajaran');

    if (input::get('submit') == 'Simpan Data') {
        $ckmtk = count(input::get('ckmtk'));
        for ($i=0; $i < $ckmtk; $i++) { 
            $fields = array(
                'namask'            => input::get('tahunajaran')."/".input::get('ckmtk')[$i],
                'tahunajaran'       => input::get('tahunajaran'),
                'idmatakuliah'      => input::get('ckmtk')[$i],
                );
            $user->tambah_dataskajar($fields);
        }  
        die();
        echo "<script>location='index.php?halaman=sk';</script>"; 
    }

    if (input::get('submit')==="Simpan Semua") {
        $indos = count(input::get('iddosen'));
        for ($i=0; $i < $indos; $i++) { 
            if (input::get('iddosen')[$i] !== '' AND input::get('angkatan')[$i] !== '') {
               $input = array(
                'namadosen'    => input::get('iddosen')[$i],
                );
                $hasil = $user->edit_datadosensk($input,input::get('edid')[$i]);
            }else{
                echo "<script>location='index.php?halaman=sk';</script>";
            }
        }
        echo "<script>location='index.php?halaman=sk';</script>";
    }

 ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid" style="margin: 20px">
                        <button class="btn btn-fill btn-success pull-right tambahsk">Tambah Data</button>
                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($dataskajar)): ?>
                        <?php foreach ($dataskajar as $sk): ?>
                            <?php $newta = str_replace('/', '-', $sk['tahunajaran']); ?>
                            <a class="menusk" data-ta="<?php echo $newta; ?>">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="header">
                                        <?php $dtask = $user->get_dataskajarwhid($sk['tahunajaran']); ?>
                                        <?php $countsk = count($dtask); ?>
                                        <h4 class="title"><?php echo $sk['tahunajaran']; ?></h4>

                                        <div class="content">
                                            <div class="row">
                                                <!-- <div class="col-md-8"> -->
                                                    <span class="stats" style="font-size: 10px">JUMLAH MATAKULIAH </span><span class="btn-primary"><i class="fa fa-book pull-right" style="font-size: 40px; margin-right: 50px"></i></span>
                                                    <p style="font-size:30px"><b><?php echo $countsk ?></b></p>
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
                        <?php endforeach ?>    
                    <?php endif ?>
                </div>
                <?php if (!empty($dataskajar)): ?>
                    <div id="haha">
                        
                    </div>
                    <?php foreach ($dataskajar as $sk): ?>
                        <?php $tabta = str_replace('/', '-', $sk['tahunajaran']); ?>
                        <div class="row datanyask" id="<?php echo $tabta ?>" style="display: none;">
                            <div class="col-md-12">
                                <div class="card">
                                    <form method="post">
                                        <div class="header colorblue" style="padding: 20px;">
                                            <h3 class="title" style="color: white">Surat Keputusan Tahun Ajaran <?php echo $sk['tahunajaran']; ?></h3>
                                        </div>
                                        <div class="col-md-12" style="padding: 20px">
                                        <table id="tabelskajar" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Matakuliah</th>
                                                <th>Prodi dan Semester</th>
                                                <th>Dosen Pengajar</th>
                                                <th class="pull-right">Aksi</th>
                                            </tr>
                                        </thead>

                                        <?php 
                                        $no=1;
                                        ?>

                                        <?php $skthajaran = $user->skajarthajaran($sk['tahunajaran']) ?>
                                        <?php if (!empty($skthajaran)): ?>
                                            <?php foreach ($skthajaran as $datask): ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td>
                                                        <?php 
                                                        $datamtk = $user->get_datamtk($datask['idmatakuliah']);
                                                        echo $datamtk['namamatakuliah'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $datamtk['lembaga']."- Sem".$datamtk['semester']; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($datask['namadosen']!==''): ?>
                                                            <?php echo $datask['namadosen']; ?>
                                                        <?php else: ?>
                                                            <?php 
                                                            $getdosen = $user->get_dosen();
                                                                //MEMANGGIL FUNGSI FORM SELECT ('LABEL&PLACEHOLDER','NAME',      'REQUIRED')
                                                            $fungsiview->headerformselect   ("",                "iddosen[]",  "");
                                                            echo '<option value=""" style="background-color:red">Silahkan Pilih';
                                                            foreach ($getdosen as $datadosen) { ?>
                                                            <option value="<?php echo $datadosen['namadosen']  ?>"><?php echo $datadosen['namadosen'] ?></option>
                                                            <?php }
                                                            $fungsiview->footerformselect();
                                                            echo '<input type="hidden" name="edid[]" value='.$datask['id'].'>';
                                                            ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td class="pull-right">
                                                        <a href="index.php?halaman=hdt&d=sk&id=<?php echo $datask['id'] ?>&t=<?php echo password_hash(input::get('halaman'), PASSWORD_DEFAULT); ?>" class="btn btn-danger hapusdatask" style="font-size: 10px"><i class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                                <?php $no++ ?>
                                            <?php endforeach ?>

                                        <?php endif ?>

                                        </table>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary btn-fill pull-right tambahform" align="center" value="Simpan Semua">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>


<?php $fungsiview->headerformmodal("modaltambahsk",   "Tambah Data Surat Keterangan KBM",     "formtambahsk",     "background-color: green; color:white");?>
    <form method="post">
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <select name="tahunajaran" class="form-control tahunajaran" required="">
                <option value="">Silahkan Pilih</option>
                <?php $gettahunajaran = $user->get_ta(); ?>
                <?php foreach ($gettahunajaran as $datata): ?>
                    <option value="<?php echo $datata['nama']; ?>"><?php echo $datata['nama']; ?></option>
                <?php endforeach ?>
            </select>
            <input type="hidden" name="filt">
        </div>

        <table id="tabeltambahskajar" class="table table-hover table-striped">
            <thead>
                <th><input type="checkbox" id="selectAll" name="selectAll"><input type="hidden" name="all" id="ckall"></th>
                <th>Nama Matakuliah</th>
                <th>Semester</th>

            </thead>
            <tbody id="datatambahskajardisini">

            </tbody>
        </table>
    
<?php $fungsiview->footerformmodal('tambah');?>
</form>

    <?php 

// MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS', 'TITLE MODAL',               'IDFORM',       'STYLE',)
    $fungsiview->headerformmodal("modaldetailsk",   "Detail Data SK");

// MEMANGGIL FUNGSI INPUT ('LABEL',                 'TYPE',     'NAME',             'REQUIRED')
    $fungsiview->formtext("Tahun Ajaran",           "text",     "dtahunajaran",     "disabled");
    $fungsiview->formtext("Kode Matakuliah",        "text",     "dmatakuliah",   "disabled");
    $fungsiview->formtext("Nama Dosen Pengajar",    "text",     "dnamadosen",       "disabled");
    $fungsiview->formtext("Angkatan",               "text",     "dnamaakt",         "disabled");

// MEMANGGIL FUNGSI FOOTER MODAL
    $fungsiview->footerformmodal();

    ?> 

                    



<script type="text/javascript">
    
$(document).ready(function () {
    $(".datanyask").hide(); 
    
});

    $(document).on("click", ".tambahsk", function(){
        $("#modaltambahsk").modal('show');
    });

    $(document).on("click", ".menusk", function(){
        let tahunajaran = $(this).data('ta');
        let a   = $("#"+tahunajaran).html();
        $("#haha").html(a);
        // console.log(a);
        // // if (tahunajaran != '') {}
        // // $("#"+tahunajaran).show();
            $('#tabelskajar').dataTable({
            stateSave: true,
            aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ],
        });
    });

    $(document).on("change", ".tahunajaran", function(){
        let tahunajaran = $(".tahunajaran").val();
        let value = tahunajaran;
        let aksi = 'getdatatahunajaran';
        getdatatahunajaran(value,aksi);
    });

    $("#selectAll").click(function(){
        $(".ckmtk").prop('checked', $(this).prop('checked'));
    });

    
</script>
