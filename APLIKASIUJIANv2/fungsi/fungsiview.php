<?php

class fungsiview
{

	function tanggal($tgl){
		$namabulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Agustus", "September", "Oktober", "November", "Desember");
		$tanggal = substr($tgl, 8,2);
		$bulan = $namabulan[(int)substr($tgl, 5,2)];
		$tahun = substr($tgl, 0,4);
		$jam = substr($tgl, 11,2);
		$menit = substr($tgl, 14,2);
		return $tanggal.' '.$bulan.' '.$tahun;

	}

	function jam($tgl){
		$namabulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Agustus", "September", "Oktober", "November", "Desember");
		$tanggal = substr($tgl, 8,2);
		$bulan = $namabulan[(int)substr($tgl, 5,2)];
		$tahun = substr($tgl, 0,4);
		$jam = substr($tgl, 11,2);
		$menit = substr($tgl, 14,2);
		return $jam.':'.$menit;
	}

	function headertabel(){
		echo 
		'
		<div class="content table-responsive table-full-width" style="margin: 10px">
			<table class="table table-hover table-striped">
		';
	}


	function footertabel(){
		echo 			'
					</table>
				</div>';
	}

	function headerformmodal($modalid,$title,$idform='',$style=''){
		echo 
		'
		<div class="modal fade" id="'.$modalid.'" class="'.$modalid.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="'.$style.'">
						<h4 class="modal-title" id="exampleModalLabel" >'.$title.'</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form id="'.$idform.'" method="post">
		';
	}

	function footerformmodal($simpan=''){
				echo 
				'		
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>';
									if ($simpan==='tambah') {
										echo '<input type="submit" name="submit" class="btn btn-primary" value="Simpan Data">';
									}elseif ($simpan==='edit') {
										echo '<input type="submit" name="submit" class="btn btn-primary" value="Edit Data">';
									}elseif ($simpan==='tambahdata') {
										echo '<input type="submit" name="submit" class="btn btn-primary" value="Tambah Data">';
									}
									
				echo '				</div>

							</form>
						</div>
					</div>
				</div>
				</div>
		';
	}


	function formtext($label,$type,$name,$required=''){
		echo 
		'
			<div class="">';
			if ($label!=='') {
				$this->label($label);
			}
		echo'		<input type="'.$type.'" id="'.$name.'" name="'.$name.'" class="form-control" placeholder="'.$label.'" '.$required.'>
			</div><br>
		';
	}

	function formtextarea($label,$name,$required=''){
		echo 
		'
			<div class="">';
			if ($label!=='') {
				$this->label($label);
			}
		echo'
				<textarea class="form-control soal" id="'.$name.'" name="'.$name.'" placeholder="'.$label.'"'.$required.'></textarea>
			</div><br>
		';
	}


	function label($label){
		echo '<label class="form-control-label" for="input-email">'.$label.'</label>';
	}

	function headerformselect($label, $name, $required=''){

			if ($label!=='') {
				$this->label($label);
			}
		echo'<select name="'.$name.'" class="form-control form-control-alternative" placeholder="'.$label.'" '.$required.'>';
		}

	function footerformselect(){			
		echo	'</select>
	';
	}

	function formcheckbox($label,$name,$required=''){
		echo 
		'
			<div class="">';
			if ($label!=='') {
				$this->label($label);
			}
		echo'		<input type="checkbox" id="'.$name.'" name="'.$name.'[]" class="form-control" placeholder="'.$label.'" '.$required.'>
			</div>
		';
	}

}
 ?>
