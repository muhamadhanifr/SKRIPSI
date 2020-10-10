<?php 

    if (input::get('submit') == 'Simpan Data') {

           $user->tambah_datadosen(array(
            'username'  => input::get('username'),
            'password'  => password_hash(input::get('password'), PASSWORD_DEFAULT),
            'namadosen'  => input::get('namadosen'),
            'NIDN'      => input::get('NIDN'),
            'email'     => input::get('email'),
            'nohp'      => input::get('nohp'),
            'norek'     => input::get('norek'),
            'level'     => 'dosen'
            ));
           echo "<script>location='index.php?halaman=udos';</script>";
        }

    if (input::get('submit') == 'Edit Data') {

           $user->edit_datadosen(array(
            'email'     => input::get('eemail'),
            'nohp'      => input::get('enohp'),
            'norek'     => input::get('enorek'),
            ),input::get('edid'));
           echo "<script>location='index.php?halaman=udos';</script>";
        }

 ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right" data-toggle="modal" data-target="#modaldosen">Tambah dosen</button>
                                <h4 class="title" style="color: white;">Data Daftar dosen</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 10px">
                                <table id="tabeldosen" class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Dosen</th>
                                        <th>NIDN</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th class="pull-right">Aksi</th>
                                        
                                    </thead>
                                    <tbody id="datadosendisini">
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
        <!-- Modal Tambah Data dosen -->
        <div class="modal fade modaldosen" id="modaldosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header colorblue">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Tabah Data dosen</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formdosen" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required="">
                            </div> 

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required="">
                            </div> 

                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input type="text" name="namadosen" class="form-control" required="">
                            </div> 

                            <div class="form-group">
                                <label>NIDN</label>
                                <input type="number" name="NIDN" class="form-control" required="">
                            </div> 

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div> 

                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input type="number" name="nohp" class="form-control">
                            </div> 

                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input type="number" name="norek" class="form-control">
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


        <!--Modal Edit dosen-->
        <div class="modal fade modaleditdosen" id="modaleditdosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: orange">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Edit Data dosen</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="eformdosen" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" name="edid" class="edid">
                                <input type="text" name="eusername" class="form-control username" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="epassword" class="form-control password" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input type="text" name="enamadosen" class="form-control namadosen" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>NIDN</label>
                                <input type="number" name="eNIDN" class="form-control NIDN" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="eemail" class="form-control email" required="">
                            </div> 

                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input type="number" name="enohp" class="form-control nohp" required="">
                            </div> 

                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input type="number" name="enorek" class="form-control norek" required="">
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

        <!--Modal Detail dosen-->
        <div class="modal fade modaldetaildosen" id="modaldetaildosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><b>Detail Data dosen</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="dformdosen" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control username" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control password" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input type="text" name="namadosen" class="form-control namadosen" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>NIDN</label>
                                <input type="number" name="NIDN" class="form-control NIDN" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control email" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input type="number" name="nohp" class="form-control nohp" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input type="number" name="norek" class="form-control norek" disabled="">
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
        ambildatadosen();
    }); 


    $(document).on("click", ".editdosen", function(){

        $("#modaleditdosen").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdatadosen';
        getdatadosen(val,aksi);
    });

    $(document).on("click", ".detaildosen", function(){

        $("#modaldetaildosen").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdatadosen';
        getdatadosen(val,aksi);

    });

    $(document).on("click", ".hapusdosen", function(){

        let val = $(this).attr("value");
        let aksi = 'hapusdatadosen';
        hapusdatadosen(val,aksi);

    });

</script>