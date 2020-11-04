<?php 

class member{

	private $account_name=NULL;
	private $account_num=NULL;
	private $account_amount=0;
	private $account_pin=NULL;

	public function __construct($acname,$acnum,$acamt,$acpin)
	{
		$this -> account_name = $acname;
		$this -> account_num = $acnum;
		$this -> account_amount = $acamt;
		$this -> account_pin = $acpin;

	}

	public function return_user_data()
	{
		return  array(
              
              'account_name  '   => $this -> account_name,
              'account_number  '    => $this -> account_num,
              'account_amount  ' => $this -> account_amount
		);
	}
}


class officer{

    private $members = [];
    
	function creat_user($ac_name,$ac_num,$ac_amt,$ac_pin)
	{
		array_push($this ->members, new member($ac_name, $ac_num, $ac_amt, $ac_pin));
	}

	function count_member()
	{
		echo "number of members : ";
		echo count($this -> members).'<br>'.'<br>'.'<br>';
	}

	function show_all_member()
	{
		$user_info = [];

		if (!count($this -> members)) {
			
			echo "user not found";
		}
		 else {
			
			foreach ($this ->members as $key => $value) {
				
				$user = $this ->members[$key] -> return_user_data();
				array_push($user_info, $user);
			}
			return $user_info ;
		}
	}
}

$oj_oficer = new officer();

$oj_oficer ->creat_user('deepak',101,1000,007);
$oj_oficer ->creat_user('ump',102,2000,800);
$oj_oficer ->creat_user('garima',103,3000,900);
$oj_oficer ->creat_user('kavita',104,4000,010);

$oj_oficer ->count_member();

$result = $oj_oficer -> show_all_member();

if (!is_array($result)) {
	
    echo $result;

} else {
	
	foreach ($result as $key1 => $value1) {
		foreach ($value1 as $key2 => $value2) {
			

			echo $key2.'=>'.$value2.'<br>';
		}
		echo '<hr>';
		
	}
}

 ?>