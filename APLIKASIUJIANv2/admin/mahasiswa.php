<?php 
    
    if (input::get('submit') === 'Simpan Data') {
        $user->tambah_datamhs(array(
            'NIM'  => input::get('NIM'),
            'password'  => password_hash(input::get('password'), PASSWORD_DEFAULT),
            'namamahasiswa'  => input::get('namamahasiswa'),
            'programstudi'  => input::get('programstudi'),
            'angkatan'      => input::get('angkatan'),
            'level'     => 'mahasiswa'
            ));
        echo "<script>location='index.php?halaman=mhs';</script>";
    }

    if (input::get('submit') == 'Edit Data') {
           $user->edit_datamhs(array(
            'namamahasiswa' => input::get('enamamahasiswa'),
            'angkatan'      => input::get('eangkatan'),
            ),input::get('edid'));
           echo "<script>location='index.php?halaman=mhs';</script>";
        }

 ?>


<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right" data-toggle="modal" data-target="#modalmhs">Tambah Mahasiswa</button>
                                <h4 class="title" style="color: white;">Data Daftar Matakuliah</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 10px">
                                <table id="tabelmhs" class="table table-hover table-striped">
                                    <thead>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Program Studi</th>
                                        <th>Angkatan</th>
                                        <th class="pull-right">Aksi</th>
                                        
                                    </thead>
                                    <tbody id="datamhsdisini">
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
        <!-- Modal Tambah Data Mahasiswa -->
        <div class="modal fade modalmhs" id="modalmhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header colorblue">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Tabah Data Mahasiswa</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formmhs" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" name="NIM" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="namamahasiswa" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="Password" name="password" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="form-control" name="programstudi" required="">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </div>  

                            <?php $dtangkatan = $user->get_angkatan() ?>  
                            <div class="form-group">
                                <label>Angkatan</label>
                                <select class="form-control" name="angkatan" required="">
                                    <option value="">Silahkan Pilih</option>
                                    <?php foreach ($dtangkatan as $dataangkatan): ?>
                                        <option value="<?php echo $dataangkatan['nama']; ?>"><?php echo $dataangkatan['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <!-- <button class="btn btn-primary btn-fill" name="submit" onclick="tambahmtk()">Simpan</button> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin: 5px">Tutup</button>
                            <input type="submit" class="btn btn-primary btn-fill pull-right" name="submit" value="Simpan Data" style="margin: 5px">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--Modal Edit Mahasiswa-->
        <div class="modal fade modaleditmhs" id="modaleditmhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: orange">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Edit Data Mahasiswa</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="eformmhs" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="hidden" name="edid" class="edid">
                                <input type="text" name="eNIM" class="form-control NIM" disabled="">
                            </div>

                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="enamamahasiswa" class="form-control namamahasiswa" required="">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="Password" name="epassword" class="form-control password" disabled="">
                            </div>

                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="form-control" name="eprogramstudi" disabled="">
                                    <option class="prodi" style="background-color: red"></option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </div>  

                            <?php $dtangkatan = $user->get_angkatan() ?>  
                            <div class="form-group">
                                <label>Angkatan</label>
                                <select class="form-control" name="eangkatan" required="">
                                    <option class="angkatan" style="background-color: red"></option>
                                    <?php foreach ($dtangkatan as $dataangkatan): ?>
                                        <option value="<?php echo $dataangkatan['nama']; ?>"><?php echo $dataangkatan['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>        
                        </div>
                        <div class="modal-footer">
                            <!-- <button class="btn btn-primary btn-fill" name="submit" onclick="tambahmtk()">Simpan</button> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin: 5px">Tutup</button>
                            <input type="submit" class="btn btn-primary btn-fill pull-right" name="submit" value="Edit Data" style="margin: 5px">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Edit Mahasiswa-->
        <div class="modal fade modaldetailmhs" id="modaldetailmhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><b>Detail Data Mahasiswa</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="dformmhs" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="hidden" name="edid" class="edid">
                                <input type="text" name="eNIM" class="form-control NIM" disabled="">
                            </div>

                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="enamamahasiswa" class="form-control namamahasiswa" disabled="">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="Password" name="epassword" class="form-control password" disabled="">
                            </div>

                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="form-control" name="eprogramstudi" disabled="">
                                    <option class="prodi" style="background-color: red"></option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </div>  

                            <?php $dtangkatan = $user->get_angkatan() ?>  
                            <div class="form-group">
                                <label>Angkatan</label>
                                <select class="form-control" name="eangkatan" disabled="">
                                    <option class="angkatan" style="background-color: red"></option>
                                    <?php foreach ($dtangkatan as $dataangkatan): ?>
                                        <option value="<?php echo $dataangkatan['nama']; ?>"><?php echo $dataangkatan['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <!-- <button class="btn btn-primary btn-fill" name="submit" onclick="tambahmtk()">Simpan</button> -->
                            <!-- <input type="submit" class="btn btn-primary btn-fill pull-right" name="submit" value="Edit Data" style="margin: 5px"> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>


<script type="text/javascript">
    $(document).ready(function(){
        ambildatamhs();
    }); 


    $(document).on("click", ".editmhs", function(){

        $("#modaleditmhs").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdatamhs';
        getdatamhs(val,aksi);

    });

    $(document).on("click", ".detailmhs", function(){

        $("#modaldetailmhs").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdatamhs';
        getdatamhs(val,aksi);

    });

    $(document).on("click", ".hapusmhs", function(){

        let val = $(this).attr("value");
        let aksi = 'hapusdatamhs';
        // console.log(val);
        hapusdatamhs(val,aksi);

    });

</script>