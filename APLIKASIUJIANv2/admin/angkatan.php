<?php 

    if (input::get('submit') == 'Simpan Data') {

           $user->tambah_dataakt(array(
            'nama'  => input::get('angkatan'),
            ));

        echo "<script>location='index.php?halaman=akt';</script>";
        }

    if (input::get('submit') == 'Edit Data') {

           $user->edit_dataakt(array(
            'nama'  => input::get('eangkatan'),
            ),input::get('edid'));

        echo "<script>location='index.php?halaman=akt';</script>";
        }

 ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right" data-toggle="modal" data-target="#modalangkatan">Tambah Angkatan</button>
                                <h4 class="title" style="color: white;">Data Daftar Angkatan</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 10px">
                                <table id="tabelangkatan" class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Angkatan</th>
                                        <th class="pull-right">Aksi</th>
                                        
                                    </thead>
                                    <tbody id="dataangkatandisini">
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
        <!-- Modal Tambah Data Angkatan -->
        <div class="modal fade modalangkatan" id="modalangkatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header colorblue">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Tabah Data Angkatan</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formangkatan" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Angkatan</label>
                                <input type="text" name="angkatan" class="form-control" required="">
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


        <!--Modal Edit Angkatan-->
        <div class="modal fade modaleditangkatan" id="modaleditangkatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: orange">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Edit Data Angkatan</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="eformangkatan" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Angkatan</label>
                                <input type="hidden" name="edid" class="edid">
                                <input type="text" name="eangkatan" class="form-control angkatan" required ="">
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

        <!--Modal Detail Angkatan-->
        <div class="modal fade modaldetailangkatan" id="modaldetailangkatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><b>Detail Data Angkatan</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="dformangkatan" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Angkatan</label>
                                <input type="hidden" name="edid" class="edid">
                                <input type="text" name="eangkatan" class="form-control angkatan" disabled="">
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
        ambildataangkatan();
    }); 


    $(document).on("click", ".editangkatan", function(){

        $("#modaleditangkatan").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdataangkatan';
        getdataakt(val,aksi);
    });

    $(document).on("click", ".detailangkatan", function(){

        $("#modaldetailangkatan").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdataangkatan';
        getdataakt(val,aksi);

    });

    $(document).on("click", ".hapusangkatan", function(){

        let val = $(this).attr("value");
        let aksi = 'hapusdataangkatan';
        hapusdataakt(val,aksi);

    });

</script>