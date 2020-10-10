<script type="text/javascript">
	
	function ambildatamhs(){
		let dataHandler = $("#datamhsdisini");
        dataHandler.html("");
        let val     = '';
        let tabel   = 'mahasiswa';
        let aksi    = 'get';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi+"&tabel="+tabel,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    // console.log(result);
                    var resultOBJ = JSON.parse(result);
                    // console.log(resultOBJ);
                    $.each(resultOBJ, function(key, val){
                        var newRow = $("<tr>");
                        newRow.html(
                            "<td>"+val.NIM+"</td>"+
                            "<td>"+val.namamahasiswa+"</td>"+
                            "<td>"+val.programstudi+"</td>"+
                            "<td>"+val.angkatan+"</td>"+
                            "<td> <button class='btn btn-danger pull-right hapusmhs' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-trash'></i></button>"+
                            "<button class='btn btn-warning pull-right editmhs' name='edit' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-edit'></i></button>"+
                            "<button class='btn btn-info pull-right detailmhs' name='detail' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-eye'></i></button></td>"
                            );
                        dataHandler.append(newRow);
                    });
                    $('#tabelmhs').DataTable({
                        stateSave: true,
                        aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                        ],
                    });
                }
            });
    }

    function getdatamhs(value,aksii){
        let val = value;
        let aksi = aksii;
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                $('.NIM').val(resultOBJ.NIM);
                $('.password').val(resultOBJ.password);
                $('.namamahasiswa').val(resultOBJ.namamahasiswa);
                $('.prodi').val(resultOBJ.programstudi);
                $('.prodi').html(resultOBJ.programstudi);
                $('.angkatan').val(resultOBJ.angkatan);
                $('.angkatan').html(resultOBJ.angkatan);
                $('.edid').val(resultOBJ.id);

            }
        });
    }

    function hapusdatamhs(value,aksii){
        let val = value;
        let aksi = aksii;
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                window.location.reload();
                alert('Data Terhapus');
            }
        });
    }


    function ambildataangkatan(){
        let dataHandler = $("#dataangkatandisini");
        dataHandler.html("");
        let val     = '';
        let tabel   = 'angkatan';
        let aksi    = 'get';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi+"&tabel="+tabel,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    // console.log(result);
                    var resultOBJ = JSON.parse(result);
                    // console.log(resultOBJ);
                    var no = 1
                    $.each(resultOBJ, function(key, val){
                        var newRow = $("<tr>");
                        newRow.html(
                            "<td>"+no+"</td>"+
                            "<td>"+val.nama+"</td>"+
                            "<td> <button class='btn btn-danger pull-right hapusangkatan' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-trash'></i></button>"+
                            "<button class='btn btn-warning pull-right editangkatan' name='edit' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-edit'></i></button>"+
                            "<button class='btn btn-info pull-right detailangkatan' name='detail' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-eye'></i></button></td>"
                            );
                        no++;
                        dataHandler.append(newRow);
                    });
                    $('#tabelangkatan').DataTable({
                        stateSave: true,
                        aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                        ],
                    });
                }
            });
    }

    function getdataakt(value,aksii){
        let val = value;
        let aksi = aksii;

        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                $('.angkatan').val(resultOBJ.nama);
                $('.edid').val(resultOBJ.id);

            }
        });
    }

    function hapusdataakt(value,aksii){
        let val = value;
        let aksi = aksii;
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                window.location.reload();
                alert('Data Terhapus');
            }
        });
    }


    function ambildatadosen(){
        let dataHandler = $("#datadosendisini");
        dataHandler.html("");
        let val     = '';
        let tabel   = 'dosen';
        let aksi    = 'get';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi+"&tabel="+tabel,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    // console.log(result);
                    var resultOBJ = JSON.parse(result);
                    // console.log(resultOBJ);
                    var no = 1
                    $.each(resultOBJ, function(key, val){
                        var newRow = $("<tr>");
                        newRow.html(
                            "<td>"+no+"</td>"+
                            "<td>"+val.namadosen+"</td>"+
                            "<td>"+val.NIDN+"</td>"+
                            "<td>"+val.email+"</td>"+
                            "<td>"+val.nohp+"</td>"+
                            "<td> <button class='btn btn-danger pull-right hapusdosen' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-trash'></i></button>"+
                            "<button class='btn btn-warning pull-right editdosen' name='edit' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-edit'></i></button>"+
                            "<button class='btn btn-info pull-right detaildosen' name='detail' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-eye'></i></button></td>"
                            );
                        no++;
                        dataHandler.append(newRow);
                    });
                    $('#tabeldosen').DataTable({
                        stateSave: true,
                        aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                        ],
                    });
                }
            });
    }

    function getdatadosen(value,aksii){
        let val = value;
        let aksi = aksii;

        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                $('.username').val(resultOBJ.username);
                $('.namadosen').val(resultOBJ.namadosen);
                $('.password').val(resultOBJ.password);
                $('.NIDN').val(resultOBJ.NIDN);
                $('.email').val(resultOBJ.email);
                $('.nohp').val(resultOBJ.nohp);
                $('.norek').val(resultOBJ.norek);
                $('.edid').val(resultOBJ.id);

            }
        });
    }

    function hapusdatadosen(value,aksii){
        let val = value;
        let aksi = aksii;
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                window.location.reload();
                alert('Data Terhapus');
            }
        });
    }

    function ambildatamatakuliah(){
        let dataHandler = $("#datamatakuliahdisini");
        dataHandler.html("");
        let val     = 'semester';
        let tabel   = 'matakuliah';
        let aksi    = 'getshort';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi+"&tabel="+tabel,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    // console.log(result);
                    var resultOBJ = JSON.parse(result);
                    // console.log(resultOBJ);
                    var no = 1
                    $.each(resultOBJ, function(key, val){
                        var newRow = $("<tr>");
                        newRow.html(
                            "<td>"+no+"</td>"+
                            "<td>"+val.idmatakuliah+"</td>"+
                            "<td>"+val.namamatakuliah+"</td>"+
                            "<td>Semester-"+val.semester+"</td>"+
                            "<td> <button class='btn btn-danger pull-right hapusmatakuliah' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-trash'></i></button>"+
                            "<button class='btn btn-warning pull-right editmatakuliah' name='edit' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-edit'></i></button>"+
                            "<button class='btn btn-info pull-right detailmatakuliah' name='detail' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-eye'></i></button></td>"
                            );
                        no++;
                        dataHandler.append(newRow);
                    });
                    $('#tabelmatakuliah').DataTable({
                        stateSave: true,
                        aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                        ],
                    });
                }
            });
    }

    function getdatamatakuliah(value,aksii){
        let val = value;
        let aksi = aksii;

        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                $('.idmatakuliah').val(resultOBJ.idmatakuliah);
                $('.namamatakuliah').val(resultOBJ.namamatakuliah);
                $('.dsemester').val('Semester-'+resultOBJ.semester);
                $('.programstudi').val(resultOBJ.programstudi);
                $('.programstudi').html(resultOBJ.programstudi);
                $('.semester').val(resultOBJ.semester);
                $('.semester').html('Semester-'+resultOBJ.semester)
                $('.edid').val(resultOBJ.id);

            }
        });
    }

    function hapusdatamatakuliah(value,aksii){
        let val = value;
        let aksi = aksii;
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                window.location.reload();
                alert('Data Terhapus');
            }
        });
    }


    function ambildatatahunajaran(){
        let dataHandler = $("#datatahunajarandisini");
        dataHandler.html("");
        let val     = '';
        let tabel   = 'tahunajaran';
        let aksi    = 'getshort';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi+"&tabel="+tabel,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    // console.log(result);
                    var resultOBJ = JSON.parse(result);
                    // console.log(resultOBJ);
                    var no = 1
                    $.each(resultOBJ, function(key, val){
                        var newRow = $("<tr>");
                        newRow.html(
                            "<td>"+no+"</td>"+
                            "<td>"+val.nama+"</td>"+
                            "<td><button class='btn btn-primary btn-fill pull-right hapusmatakuliah' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'>"+val.status+"</button></td>"+
                            "<td> <button class='btn btn-danger pull-right hapusmatakuliah' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-trash'></i></button>"+
                            "<button class='btn btn-warning pull-right editmatakuliah' name='edit' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-edit'></i></button>"+
                            "<button class='btn btn-info pull-right detailmatakuliah' name='detail' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-eye'></i></button></td>"
                            );
                        no++;
                        dataHandler.append(newRow);
                    });
                    $('#tabeltahunajaran').DataTable({
                        stateSave: true,
                        aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                        ],
                    });
                }
            });
    }

    function getdatatahunajaran(value,aksii){
        let val = value;
        let aksi = aksii;

        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                let filter = resultOBJ.semester;
                tambahskajar(filter);
            }
        });
    }

    function skajarperthajaran(value=''){
        let dataHandler = $("#bodiskajarperthajaran");
        dataHandler.html("");
        let val     = value;
        let tabel   = 'skajar';
        let aksi    = 'skajarperthajaran';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi+"&tabel="+tabel,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    // console.log(result);
                    var resultOBJ = JSON.parse(result);
                    // console.log(resultOBJ);
                    var no = 1
                    $.each(resultOBJ, function(key, val){
                        var newRow = $("<tr>");
                        newRow.html(
                            "<td>"+no+"</td>"+
                            "<td>"+val.idmatakuliah+"</td>"+
                            "<td><button class='btn btn-primary btn-fill pull-right hapusmatakuliah' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'>"+val.status+"</button></td>"+
                            "<td> <button class='btn btn-danger pull-right hapusmatakuliah' name='delete' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-trash'></i></button>"+
                            "<button class='btn btn-warning pull-right editmatakuliah' name='edit' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-edit'></i></button>"+
                            "<button class='btn btn-info pull-right detailmatakuliah' name='detail' value='"+val.id+"' style='font-size:10px; margin-right:1px'><i class='fa fa-eye'></i></button></td>"
                            );
                        no++;
                        dataHandler.append(newRow);
                    });
                    // $('#tabeltahunajaran').DataTable({
                    //     stateSave: true,
                    //     aLengthMenu: [
                    //     [25, 50, 100, 200, -1],
                    //     [25, 50, 100, 200, "All"]
                    //     ],
                    // });
                }
            });
    }


    function tambahskajar(value){
        console.log(value);
        let dataHandler = $("#datatambahskajardisini");
        let val     = value;
        let tabel   = 'matakuliah';
        let aksi    = 'getdtskajar';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
            "&aksi="+aksi+"&tabel="+tabel,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    dataHandler.html('');
                    var resultOBJ = JSON.parse(result);
                    // var no = 1
                    $.each(resultOBJ, function(key, val){
                        var newRow = "<tr>";
                        newRow +=
                            "<td><input type='checkbox' name='ckmtk[]' class='ckmtk' value='"+val.idmatakuliah+"'></td>"+
                            "<td>"+val.namamatakuliah+"</td>"+
                            "<td>"+val.semester+"</td>"
                            ;
                        newRow += "</tr>"

                        // no++;
                        dataHandler.append(newRow);
                    });


                }
            });
    }

</script>