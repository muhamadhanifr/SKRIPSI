<?php 

	if (input::get('simpansemua')==="Simpan Semua") {
        $jawaban = input::get('pjawaban');
        $input = array(
                'soal'       => input::get('soal'),
                'pilihan'    => input::get('pilihan'),
                'pjawaban'   => input::get('pjawaban'),
            );
        echo "<pre>";
        var_dump($input);
        die();
		$user->tambah_tambahjadwalujian(array(
            'namajadwal'    => $datajenisujian['namaujian'],
            'matakuliah'    => input::get('ckmtk'),
            'tanggalujian'  => input::get('tanggalujian'),
            'angkatan'      => input::get('angkatan'),
            ));
	}
 ?>

<div class="content">
        <h3 class="title">SOAL UJIAN</h3>
        
            <div class="container-fluid" id="fi">
                <div class="row tempatform">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header" style="padding: 20px">
                            	<button class="btn btn-warning btn-fill pull-right closeform" style="font-size: 10px; margin-right: 5px">_</button>
                                <button class="btn btn-info btn-fill pull-right lihatform" style="font-size: 10px; margin-right: 5px">see</button>
                                <h3 class="title">SOAL UJIAN</h3>
                                <p><em style="color: red; font-size: 12px">Silahkan Tentukan Matakuliah yang diujiankan, tanggal pelaksanaan ujian setiap matakuliah, dan diperuntukan angkatan berapa</em></p>
                            </div>

                            <div class="content">
                            	<form method="post" class="fsoal" id="fsoal">
                                    <label>Soal</label><textarea class="form-control" name="soal"></textarea><br>
                                    <label>Pilihan</label>
                                    <div class="pilihanrb">
                                        <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" name="pilihan[]" class="form-control pilihan" style="margin: 10px">
                                                    <input type="text" name="pilihan[]" class="form-control pilihan" style="margin: 10px">
                                                    <input type="text" name="pilihan[]" class="form-control pilihan" style="margin: 10px">
                                                    <input type="text" name="pilihan[]" class="form-control pilihan" style="margin: 10px">
                                                    <input type="text" name="pilihan[]" class="form-control pilihan" style="margin: 10px">
                                                </div>
                                            </div>
                            		</div>
                                    
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-success btn-fill pull-right tambahform" style="margin-right: : 5px">Tambah Form</button>
                <input type="submit" name="simpansemua" class="btn btn-fill btn-primary pull-right simpansemua" value="Simpan Semua" style="margin-right: 5px ">
                </form>
                <!-- <button class="btn btn-primary btn-fill pull-right simpansemua" style="margin-right: : 5px">Simpan Semua</button> -->
            </div>
        </div>

<script type="text/javascript">
	$(document).ready(function(){
        $(".table").DataTable();
        $(".fsoal").show();
        $(".lihatform").hide();

    });


        $(document).on("click", ".closeform", function(){
            $(".fsoal").slideUp();
            $(".lihatform").show();
            $(".closeform").hide();
        });

	    $(document).on("click", ".lihatform", function(){
	        $(".fsoal").slideDown();
	        $(".lihatform").hide();
	        $(".closeform").show();
	    });

        $(document).on("click", ".tambahrb", function(e){
            let no = 1;
            e.preventDefault();
            $(".pilihanrb").append('<div class="row">'+
                '<div class="col-md-6">'+
                    '<input type="text" name="pilihan[]" class="form-control pilihan">'+
                '</div>'+
                '<div class="col-md-1">'+
                    '<button class="btn btn-success btn-fill pull-left tambahrb">+</button>'+
                '</div></div>');
        });

        $(document).on("click", ".tambahform", function(){
            let no=1;
            $(".tempatform").append(
                '<div class="col-md-12">'+
                        '<div class="card">'+
                            '<div class="header" style="padding: 20px">'+
                                '<button class="btn btn-warning btn-fill pull-right closeform" style="font-size: 10px; margin-right: 5px">_</button>'+
                                '<button class="btn btn-info btn-fill pull-right lihatform" style="font-size: 10px; margin-right: 5px">see</button>'+
                                '<h3 class="title">SOAL UJIAN</h3>'+
                                '<p><em style="color: red; font-size: 12px">Silahkan Tentukan Matakuliah yang diujiankan, tanggal pelaksanaan ujian setiap matakuliah, dan diperuntukan angkatan berapa</em></p>'+
                            '</div>'+

                            '<div class="content">'+
                                '<form method="post" class="fsoal">'+
                                    '<label>Soal</label><textarea class="form-control" name="soal"></textarea><br>'+
                                    '<label>Pilihan</label>'+
                                        '<div class="row">'+
                                            '<div class="col-md-1">'+
                                                '<input type="radio" name="pjawaban[]" class="pull-right" value="1" style="margin: 25%">'+
                                            '</div>'+
                                            '<div class="col-md-6">'+
                                                '<input type="text" name="pilihan1" class="form-control pilihan1">'+
                                            '</div>'+
                                            '<div class="col-md-1">'+
                                                '<button class="btn btn-success btn-fill pull-left tambah">+</button>'+
                                            '</div>'+
                                        '</div>'+
                                    
                                    
                            '</div>'+
                        '</div>'+
                    '</div>')
        });
    
        // $(document).on("click", ".simpansemua", function(){
        //     let val = $("#fsoal").serialize();

        //     console.log(val);
        // });
</script>