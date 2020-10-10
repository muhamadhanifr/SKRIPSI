<?php 

class validasi
{
	private $passed = false,
			$error = array();

	public function check($items = array())
	{
		foreach ($items as $item => $rules) { 
			foreach ($rules as $rule => $isirule) {
				
				switch ($rule) {
					case 'required':
						if (trim(input::get($item)) == false && $isirule == true) {
							$this->adderror("$item tidak boleh kosong");
						}
						break;
					case 'max':
						if (strlen(input::get($item)) > $isirule) {
							$this->adderror("$item maksimal $isirule karakter");
						}
					case 'match':
						if (input::get($item) != input::get($isirule)) {
							$this->adderror("$item tidak sama dengan $isirule");
						}
						break;
					
					default:
						break;
				}
			}
		}

		if (empty($this->error)) 
		{
			$this->passed = true;
		}

		return $this;
	}

	private function adderror($errors){
		$this->error[] = $errors;
	}

	public function _errors()
	{
		return $this->error;
	}

	public function _passed()
	{
		return $this->passed;
	}

}

 ?>