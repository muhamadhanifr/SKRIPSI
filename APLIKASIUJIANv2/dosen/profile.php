<?php if (session::get('level')!=='dosen'): ?>
    <?php echo "<script>location='hal404.php';</script>"; ?>
<?php endif ?>

<?php $datadosen = $user->get_datadosen(session::get('username')); ?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header" style="padding: 20px">
                                <a href="index.php?halaman=editprofiledosen" class="btn btn-primary btn-fill pull-right" style="font-size: 10px">Update Profile</button></a>
                                <h3 class="title">Profile <?php echo $datadosen['namadosen']; ?></h3>

                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" disabled placeholder="Username" value="<?php echo $datadosen['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>NIDN</label>
                                                <input type="text" class="form-control" disabled placeholder="NIDN" value="<?php echo $datadosen['NIDN']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" disabled placeholder="Nama Lengkap" value="<?php echo $datadosen['namadosen']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" disabled placeholder="Email" value="<?php echo $datadosen['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No Hp</label>
                                                <input type="text" class="form-control" disabled placeholder="No Hp" value="<?php echo $datadosen['nohp']  ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No Rekening</label>
                                                <input type="text" class="form-control" disabled placeholder="No Rekening" value="<?php echo $datadosen['norek'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="5" class="form-control" disabled placeholder="Alamat Rumah"><?php echo $datadosen['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 baba">
                        <div class="card card-user">
                            <div class="image colorblue">
                                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/avatar.png" alt="..."/>

                                      <h4 class="title"><?php echo $datadosen['namadosen']; ?>
                                      </h4><br>
                                    </a>
                                </div>
                                <p class="description text-center"> <?php echo $datadosen['alamat']; ?>
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
