<?php 

    $user->getjadwalujianmtk()

 ?>


<div class="content">
	<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="card colorblue" style="padding: 20px">
                <div class="kosong">
                    <form method="post">
                    	<div class="row">
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label style="color: white">Matakuliah</label>
                    				<select class="form-control filtmtk">
                    				    <?php foreach ($user->getjadwalujianmtk() as $datajadwal): ?>
                                            <?php $mtk = $user->get_datamtk($datajadwal['idmatakuliah']) ?>
                                            <option value="<?php echo $datajadwal['idmatakuliah'] ?>"><?php echo $mtk['namamatakuliah']; ?></option>
                                        <?php endforeach ?>
                    				</select>
                    			</div>
                    		</div>
                    		<div class="col-md-6"></div>
                    	</div>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <div class="row tempatform">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="card">
                        <div class="header colorblue" style="padding: 20px">
                            <button class="btn btn-success btn-fill pull-right printpdf" style="display: none">Cetak</button>
                            <h3 class="title" style="color: white">Daftar Nilai Mahasiswa</h3>
                            <p><em style="color: white; font-size: 12px" class="judul"></em></p>
                        </div>
                        <div class="content">
                            <table id="tabeltranskrip" class="table table-hover table-striped">
                            	<head>
                            		<tr>
                            			<th>No</th>
                            			<th>NIM</th>
                            			<th>Nama Mahasiswa</th>
                            			<th>Nilai</th>
                            		</tr>
                            	</head>
                            	<tbody id="datatranskrip">
                            		
                            	</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<script type="text/javascript">
	
$(document).ready(function(){

});
$(document).on("change",".filtmtk",function(){
	var filt = $(".filtmtk").val();
    $(".printpdf").show();
	var aksi = 'getnilaimtk';
    console.log(filt)

let dataHandler = $("#datatranskrip");
	dataHandler.html("");
	$.ajax({
            "type"      : "GET",
            "data"      : "val="+filt+
            "&aksi="+aksi,
            "url"       : "fungsi/getdata.php",
            success : function(result){
                    console.log(result);
                    var resultOBJ = JSON.parse(result);
                    // console.log(resultOBJ);
                    var no =1;
                    $.each(resultOBJ, function(key, val){
                        var newRow = $("<tr>");
                        newRow.html(
                            "<td>"+no+"</td>"+
                            "<td>"+val.NIM+"</td>"+
                            "<td>"+val.namamahasiswa+"</td>"+
                            "<td>"+val.nilai+"</td>"                           
                            );
                        dataHandler.append(newRow);
                        no++;
                    });
                }
            });
});

$(document).on("click", ".printpdf", function(){
     window.print()
})

</script>