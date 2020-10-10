<?php 
    $datadosen = $user->get_dosen();
    $datamahasiswa = $user->get_mahasiswa();
 ?>



<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header colorblue" style="padding: 20px">
                                <button class="btn btn-success btn-fill pull-right" data-toggle="modal" data-target="#modalmtk">Tambah Matakuliah</button>
                                <h4 class="title" style="color: white;">Data Daftar Matakuliah</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>NIDN</th>
                                        <th>Nama Dosen</th>
                                        <th class="pull-right">Aksi</th>
                                        
                                    </thead>
                                    <tbody>
                                        <?php 
                                                $no=1;
                                        ?>
                                        <?php foreach ($datadosen as $dtdosen): ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $dtdosen['namadosen']; ?></td>
                                            <td class="pull-right">
                                                <button class="btn btn-info btn-fill" style="font-size: 10px">Detail</button>
                                                <button class="btn btn-warning btn-fill" style="font-size: 10px">Edit</button>
                                                <button class="btn btn-danger btn-fill" style="font-size: 10px">Hapus</button>
                                            </td>
                                            
                                        </tr>
                                        <?php $no++ ?>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    
                </div>
            </div>
        </div>



</body>
        <!-- Modal -->
<div class="modal fade" id="modalmtk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
            <div class="">
                <label>Nama Matakuliah</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="">
                <label>Dosen Pengajar</label>
                <input type="text" name="nama" class="form-control">
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


