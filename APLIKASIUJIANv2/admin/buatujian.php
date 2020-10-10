<div class="content">
	<form method="post" id="myForm" role="form" data-toggle="validator" accept-charset="utf-8">
	<div id="smartwizard">
		<ul class="nav">
			<li>
				<a class="nav-link" href="#step-1">
					<img src="../assets/img/avatar.png" width="50"><br>
					Step TItle 1<br><small>Step Description 1</small>
				</a>
			</li>
			<li>
				<a class="nav-link" href="#step-2">
					<img src="../assets/img/avatar.png" width="50"><br>
					Step TItle 2<br><small>Step Description 2</small>
				</a>
			</li>
			<li>
				<a class="nav-link" href="#step-3">
					<img src="../assets/img/avatar.png" width="50"><br>
					Step TItle 3<br><small>Step Description 3</small>
				</a>
			</li>
			<li>
				<a class="nav-link" href="#step-4">
					<img src="../assets/img/avatar.png" width="50"><br>
					Step TItle 4<br><small>Step Description 4</small>
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="step-1" role="form" data-toggle="validator" style="padding:30px">
				<div class="container">
					<div class="col-md-12">
                            <div class="row" style="padding: 30px;">
                            	<div class="form-group">
                            		<h4>Tentukan Tahun Ajaran</h4>
                            		<div class="col-md-12">
                            			<div class="card" style="padding: 20px">
                            				<label><b>Tahun Ajaran</b></label>
                            				<?php $datata = $user->get_ta() ?>
                            				<select class="form-control getta" name="tahunajaran" required="">
                            					<option value="">Silahkan Pilih</option>
                            					<?php foreach ($datata as $datatahunajaran): ?>
                            						<option value="<?php echo $datatahunajaran['nama']; ?>"><?php echo $datatahunajaran['nama']; ?></option>
                            					<?php endforeach ?>
                            					
                            				</select>
                            				<div class="help-block with-errors"></div>
                            			</div>
                            		</div>
                            	</div>
                            </div>
					</div>
				</div>
			</div>
			<div id="step-2" role="form" data-toggle="validator" style="padding:30px">
				<div class="container">
					<div class="col-md-12">
                            <div class="row" style="padding: 30px;">
                            	<div class="form-group">
                            		<h4>Surat Keterangan KBM</h4>
                            		<div class="col-md-1"></div>
                            		<div class="col-md-10">
                            			<div class="card">
                            				<div class="header colorblue" style="padding: 20px">
                            					<button class="btn btn-success btn-fill pull-right" data-toggle="modal" data-target="#modalmtk">Tambah Matakuliah</button>
                            					<h4 class="title" style="color: white;">Data Daftar Matakuliah</h4>
                            					<!-- <p class="category">Here is a subtitle for this table</p> -->
                            				</div>
                            				<div class="content table-responsive table-full-width" style="margin: 10px">
                            					<table id="tabelsk" class="table table-hover table-striped">
                            						<thead>
                            							<th>Tahun Ajaran</th>
                            							<th>Matakuliah</th>
                            							<th>Dosen Pengajar</th>
                            							<th>Angkatan</th>
                            							<th class="pull-right">Aksi</th>

                            						</thead>
                            						<tbody id="dataskdisini">

			    <!--                                     <?php 
			                                                $no=1;
			                                        ?>
			                                        <?php foreach ($datamtk as $datamatakuliah): ?>
			                                            <tr>
			                                            <td><?php echo $no; ?></td>
			                                            <td><?php echo $datamatakuliah['namamatakuliah']; ?></td>
			                                            <td class="pull-right">
			                                                <button class="btn btn-info btn-fill" style="font-size: 10px">Detail</button>
			                                                <button class="btn btn-warning btn-fill" style="font-size: 10px">Edit</button>
			                                                <button class="btn btn-danger btn-fill" style="font-size: 10px">Hapus</button>
			                                            </td>
			                                            
			                                        </tr>
			                                        <?php $no++ ?>
			                                    <?php endforeach ?> -->

			                                </tbody>
			                            </table>

			                        </div>
			                    </div>
                            	</div>
                            </div>
					</div>
				</div>
			</div>
			</div>
			<div id="step-3" class="tab-pane" role="tabpanel">
				Step content 3
			</div>
			<div id="step-4" class="tab-pane" role="tabpanel">
				Step content 4
			</div>
		</div>
	</div>
	</form>
</div>


<?php 

        // MEMANGGIL FUNGSI HEADER MODAL ('NAMA ID&CLASS', 'TITLE MODAL',                   'IDFORM',           'STYLE',)
            $fungsiview->headerformmodal("modaltambahakt",   "Tambah Data Angkatan",     "formtambahakt",     "background-color: green; color:white");

        // MEMANGGIL FUNGSI INPUT ('LABEL',                 'TYPE',     'NAME',         'REQUIRED')
            $fungsiview->formtext("Angkatan",               "text",     "namaangkatan", "required");

        // MEMANGGIL FUNGSI FOOTER MODAL
            $fungsiview->footerformmodal('tambah');

     ?>


<script type="text/javascript">
	$(document).ready(function(){
		$('#smartwizard').smartWizard({
			theme : 'dots',
		});

		var oTable = $('.myclass').dataTable({
			stateSave: true,
			lengthMenu: [5,20, 50, 100, 200, 500],
		});
	})

	$(document).on("click", ".tambahdataakt", function(){
        $("#modaltambahakt").modal('show');
    });

    $(document).on("change",".getta", function(){
    	let datata = $(".getta").val();
    	console.log(datata);

    	let dataHandler = $("#dataskdisini");
    	dataHandler.html("");
    	let val = datata;
        let aksi = 'getdataskta';
        $.ajax({
            "type"      : "GET",
            "data"      : "val="+val+
                          "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                var resultOBJ = JSON.parse(result);
                console.log(resultOBJ);
                $.each(resultOBJ, function(key, val){
                	var newRow = $("<tr>");
                	newRow.html(
					"<td>"+val.tahunajaran+"</td>"+
					"<td>"+val.idmatakuliah+"</td>"+
					"<td>"+val.namadosen+"</td>"+
					"<td>"+val.angkatan+"</td>"+
					"<td> <button class='btn btn-warning pull-right' name='edit' value='"+val.id+"' style='font-size:10px; margin:5px'>Edit</button>"+
					"<button class='btn btn-danger pull-right' name='delete' value='"+val.id+"' style='font-size:10px; margin:5px'>Delete</button></td>"
					);
				dataHandler.append(newRow);
                //     $('#dnamaakt').val(resultOBJ.nama);
                });
                $('#tabelsk').DataTable({
                	stateSave: true,
                	lengthMenu: [5,20, 50, 100, 200, 500],
                });

            }
        });
    });


</script>