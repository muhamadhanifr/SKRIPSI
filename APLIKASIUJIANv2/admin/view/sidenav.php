<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    FTI UNIBBA
                </a>
            </div>

            <ul class="nav">

            <?php 

                function menu($link, $icon, $title){
                    $item = '<li class="">
                                <a href="'.$link.'">
                                    <i class="pe-7s-'.$icon.'"></i>
                                    <p>'.$title.'</p>
                                </a>
                            </li>';
                    return $item;
                }

             ?>

            <?php 

                if ($pecah['level'] ==='admin') 
                {
                    echo menu("index.php?halaman=udos","help2","User Dosen");
                    echo menu("index.php?halaman=ta","help2","Tahun Ajaran");
                    echo menu("index.php?halaman=tmtk","help2","Matakuliah");
                    echo menu("index.php?halaman=mhs","help2","Mahasiswa");
                    echo menu("index.php?halaman=akt","help2","Angkatan");
                    echo menu("index.php?halaman=u","help2","Ujian Semester");
                    // echo menu("index.php?halaman=jdwl","help2","Jadwal Ujian");
                    echo menu("index.php?halaman=usus","help2","Ujian Susulan");
                    echo menu("index.php?halaman=sk","help2","SK Ajar");
                    echo menu("index.php?halaman=trans","help2","Transkrip Nilai");
                }
                elseif ($pecah['level'] === 'dosen')
                {
                    echo menu("index.php?halaman=editprofiledosen","help2","Profile Dosen");
                }


             ?>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <!--  <i class="pe-7s-help2"></i> -->
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="logout.php">
                               Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>