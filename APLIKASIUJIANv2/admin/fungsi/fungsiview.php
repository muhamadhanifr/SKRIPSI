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
		return $tanggal.' '.$bulan.' '.$tahun.' (Jam-'.$jam.':'.$menit.')';

	}

	function headertabel(){
		echo 
		'
		<div class="content table-responsive table-full-width" style="margin: 10px">
			<table class="table tabel table-hover table-striped">
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
		echo'		<input type="'.$type.'" id="'.$name.'" name="'.$name.'" class="form-control '.$name.'" placeholder="'.$label.'" '.$required.'>
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
		echo'<select name="'.$name.'" class="form-control form-control-alternative '.$name.'" placeholder="'.$label.'" '.$required.'>';
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

	function modaljumlahsoal($no)
	{
		echo '
                <label>Soal</label><textarea class="form-control" name="soal"></textarea><br>
                <label>Pilihan</label>
                <div class="pilihanrb">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-1">
                                    <input type="radio" name="pjawaban" data-id="1" class="pjawaban'.$i.'" style="margin-top: 15px">
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="pilihan1" class="form-control pilihan1" style="margin: 2px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-1">
                                    <input type="radio" name="pjawaban" data-id="2" class="pjawaban'.$i.'" style="margin-top: 15px">
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="pilihan2" class="form-control pilihan2" style="margin: 2px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-1">
                                    <input type="radio" name="pjawaban" data-id="3" class="pjawaban'.$i.'" style="margin-top: 16px">
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="pilihan3" class="form-control pilihan3" style="margin: 2px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-1">
                                    <input type="radio" name="pjawaban" data-id="4" class="pjawaban'.$i.'" style="margin-top: 16px">
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="pilihan4" class="form-control pilihan4" style="margin: 2px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-1">
                                    <input type="radio" name="pjawaban" data-id="5" class="pjawaban'.$i.'" style="margin-top: 16px">
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="pilihan5" class="form-control pilihan5" style="margin: 2px">
                                </div>
                            </div><!-- 
                            <div class="col-md-1">
                                <button class="btn btn-success btn-fill pull-left tambahrb">+</button>
                            </div> -->
                        </div>
        		</div>
             </div>';
	}
}
 ?>
