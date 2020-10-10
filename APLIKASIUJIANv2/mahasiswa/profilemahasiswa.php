<?php if (session::get('level')!=='mahasiswa'): ?>
    <?php echo "<script>location='hal404.php';</script>"; ?>
<?php endif ?>

<?php $data = $user->get_datamahasiswa(session::get('username')) ?>


<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header" style="padding: 20px">
                                <a href="index.php?halaman=ef" class="btn btn-primary btn-fill pull-right" style="font-size: 10px">Update Profile</button></a>
                                <h3 class="title"><?php echo $data['namamahasiswa']; ?></h3>

                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>NIM</label>
                                                <label></label>
                                                <input type="text" class="form-control" disabled placeholder="NIM" value="<?php echo $data['NIM']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" disabled placeholder="Nama Lengkap" value="<?php echo $data['namamahasiswa']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Angkatan</label>
                                                <input type="text" class="form-control" disabled placeholder="Angkatan" value="<?php echo $data['angkatan'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" disabled placeholder="Email" value="<?php echo $data['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No Hp</label>
                                                <input type="text" class="form-control" disabled placeholder="No Hp" value="<?php echo $data['nohp'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="5" class="form-control" disabled placeholder="Alamat Rumah"><?php echo $data['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image colorblue" style="background-color: blue">
                                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/avatar.png" alt="..."/>

                                      <h4 class="title"><?php echo $data['namamahasiswa']; ?><br />
                                         <!-- <small><?php echo $data['namamahasiswa']; ?></small> -->
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> <?php echo $data['alamat']; ?>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
<!--                                 <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button> -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>