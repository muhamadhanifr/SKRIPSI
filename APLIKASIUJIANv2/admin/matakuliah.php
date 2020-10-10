<?php 

    if (input::get('submit') == 'Simpan Data') {

           $user->tambah_datamtk(array(
            'idmatakuliah'          => input::get('idmatakuliah'),
            'namamatakuliah'        => input::get('namamatakuliah'),
            'lembaga'               => input::get('lembaga'),
            'ganjilgenap'           => input::get('ganjilgenap'),
            'semester'              => input::get('semester'),
            ));

        echo "<script>location='index.php?halaman=tmtk';</script>";
        }

    if (input::get('submit') == 'Edit Data') {

           $user->edit_datamtk(array(
            'namamatakuliah'        => input::get('enamamatakuliah'),
            'lembaga'               => input::get('lembaga'),
            'ganjilgenap'           => input::get('ganjilgenap'),
            'semester'              => input::get('esemester'),
            ),input::get('edid'));

        echo "<script>location='index.php?halaman=tmtk';</script>";
        }

 ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right" data-toggle="modal" data-target="#modalmatakuliah">Tambah matakuliah</button>
                                <h4 class="title" style="color: white;">Data Daftar matakuliah</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 10px">
                                <table id="tabelmatakuliah" class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Kode Matakuliah</th>
                                        <th>Nama Matakuliah</th>
                                        <th>Semester</th>
                                        <th class="pull-right">Aksi</th>
                                        
                                    </thead>
                                    <tbody id="datamatakuliahdisini">
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
        <!-- Modal Tambah Data matakuliah -->
        <div class="modal fade modalmatakuliah" id="modalmatakuliah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header colorblue">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Tabah Data matakuliah</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php 

                        $getdatamtk = $user->get_matakuliah();
                        $countmtk = count($getdatamtk);
                        $lem = $countmtk-1;
                        $nidmtk = $getdatamtk[$lem]['id']+1;

                     ?>
                    <form id="formmatakuliah" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tingkatan Matakuliah</label>
                                <select class="form-control lembaga" name="lembaga" required="">
                                    <option value="" style="background-color: red">Silahkan Pilih</option>
                                    <option value="TIF">Teknik Informatika</option>
                                    <option value="SIF">Sistem Informasi</option>
                                </select>
                            </div> 

                            <div class="form-group">
                                <label>Kode Matakuliah</label>
                                <input type="hidden" name="idmatakuliah" class="form-control idmatakuliah" required="">
                                <input type="text" name="kodematakuliah" class="form-control kodematakuliah" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Nama matakuliah</label>
                                <input type="text" name="namamatakuliah" class="form-control namamatakuliah" required="">
                            </div>  

                            <div class="form-group">
                                <label>Ganjil / Genap</label>
                               <!--  <select class="form-control ganjilgenap" name="ganjilgenap" required="">
                                    <option value="" style="background-color: red">Silahkan pilih</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select> -->
                                <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" name="ganjilgenap" class="ganjilgenap" value="Ganjil" required="">Ganjil
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" name="ganjilgenap" class="ganjilgenap" value="Genap" required="">Genap
                                </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-control sem" name="semester" required="">
                                    <option value="" style="background-color: red">Silahkan pilih</option>
                                    <option class="semGanjil" value="1">Semester1</option>
                                    <option class="semGenap" value="2">Semester2</option>
                                    <option class="semGanjil" value="3">Semester3</option>
                                    <option class="semGenap" value="4">Semester4</option>
                                    <option class="semGanjil" value="5">Semester5</option>
                                    <option class="semGenap" value="6">Semester6</option>
                                    <option class="semGanjil" value="7">Semester7</option>
                                    <option class="semGenap" value="8">Semester8</option>
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


        <!--Modal Edit matakuliah-->
        <div class="modal fade modaleditmatakuliah" id="modaleditmatakuliah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: orange">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: white"><b>Edit Data matakuliah</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="eformmatakuliah" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Matakuliah</label>
                                <input type="hidden" name="edid" class="edid">
                                <input type="text" name="eidmatakuliah" class="form-control idmatakuliah" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Nama Matakuliah</label>
                                <input type="text" name="enamamatakuliah" class="form-control namamatakuliah" required="">
                            </div>  

                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-control" name="esemester" required="">
                                    <option class="semester" style="background-color: red"></option>
                                    <option value="1">Semester1</option>
                                    <option value="2">Semester2</option>
                                    <option value="3">Semester3</option>
                                    <option value="4">Semester4</option>
                                    <option value="5">Semester5</option>
                                    <option value="6">Semester6</option>
                                    <option value="7">Semester7</option>
                                    <option value="8">Semester8</option>
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

        <!--Modal Detail matakuliah-->
        <div class="modal fade modaldetailmatakuliah" id="modaldetailmatakuliah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><b>Detail Data matakuliah</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="dformmatakuliah" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Matakuliah</label>
                                <input type="hidden" name="edid" class="edid">
                                <input type="text" name="eidmatakuliah" class="form-control idmatakuliah" disabled="">
                            </div> 

                            <div class="form-group">
                                <label>Nama Matakuliah</label>
                                <input type="text" name="namamatakuliah" class="form-control namamatakuliah" disabled="">
                            </div>  

                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" name="dsemester" class="form-control dsemester" disabled="">
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
        ambildatamatakuliah();
    }); 

    $(document).on("change", ".lembaga", function(){
        var noid = <?php echo $nidmtk; ?>;
        let kodelem = $(".lembaga").val();
        if (kodelem!='') {
            $(".kodematakuliah").val(kodelem+noid);
            $(".idmatakuliah").val(kodelem+noid);
        }else{
            $(".kodematakuliah").val('');
            $(".idmatakuliah").val('');
        }
    });

    $(document).on("click", ".ganjilgenap", function(){
        let ganjilgenap = $(".ganjilgenap:checked").val();
        if (ganjilgenap=='Ganjil') {
            $(".semGanjil").show();
            $(".semGenap").hide();
        }else if(ganjilgenap == 'Genap'){
            $(".semGanjil").hide();
            $(".semGenap").show();
        }else{
            $(".semGanjil").show();
            $(".semGenap").show();
        }
    });


    $(document).on("click", ".editmatakuliah", function(){

        $("#modaleditmatakuliah").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdatamatakuliah';
        getdatamatakuliah(val,aksi);
    });

    $(document).on("click", ".detailmatakuliah", function(){

        $("#modaldetailmatakuliah").modal('show');
        let val = $(this).attr("value");
        let aksi = 'getdatamatakuliah';
        getdatamatakuliah(val,aksi);

    });

    $(document).on("click", ".hapusmatakuliah", function(){

        let val = $(this).attr("value");
        let aksi = 'hapusdatamatakuliah';
        hapusdatamatakuliah(val,aksi);

    });

</script>