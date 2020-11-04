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
              
              'account_name'   => $this -> account_name,
              'account_number'    => $this -> account_num,
              'account_amount' => $this -> account_amount
		);
	}

	public function return_user_name($newname)
	{
		$this-> account_name = $newname;
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

	function delete_user($ac_nu){
		if(!count($this->members)){
			return "no user found";
		}
		$c=0;
		foreach($this->members as $key => $val){
			$user=$this->members[$key]->return_user_data();
			if($user['account_number']==$ac_nu){
				unset($this->members[$key]);
				$c++;
			}
		}	
		if($c>0){
			return "delete user success";
			}
		else{
			return "user not found";
			}
	}
	
	
	function edit_user($ac_nu,$name){
		if(!count($this->members)){
			return "no user found";
		}
		$c=0;
		foreach($this->members as $key => $val){
			$user=$this->members[$key]->return_user_data();
			if($user['account_number']==$ac_nu){
				$this->members[$key]->return_user_name($name);
				$c++;
			}
		}	
		if($c>0){
			return "update  user success";
			}
		else{
			return "user not found";
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
	
	?>
<table border="3" >
<tr  style="color: red;">
	<td># </td>
    <td>name</td>
    <td>account</td>
    <td>amount</td>
</tr>	
	<?php
    $i=1;
	foreach($result as $val){
			?>
            <tr  style="color: blue;">
            	<td><?php echo $i++; ?></td>
                <td><?php echo $val['account_name']?></td>
                <td><?php echo $val['account_number']?></td>
                <td><?php echo $val['account_amount']?></td>
            </tr>
            <?php
	}
	echo '</table>';
	}

echo '<hr>';
echo $oj_oficer->delete_user(101);


$result=$oj_oficer->show_all_member();
if(!is_array($result)){
	echo $result;
}
else{ 

?>
<table border="1">
<tr style="color: red;">
	<td>#</td>
    <td>name</td>
    <td>account</td>
    <td>amount</td>
</tr>	
	<?php
    $i=1;
	foreach($result as $val){
			?>
            <tr style="color: blue;">
            	<td><?php echo $i++; ?></td>
                <td><?php echo $val['account_name']?></td>
                <td><?php echo $val['account_number']?></td>
                <td><?php echo $val['account_amount']?></td>
            </tr>
            <?php
	}
	echo '</table>';
	}
	
echo "<hr>";
echo $oj_oficer->edit_user(104,"name_update");


$result=$oj_oficer->show_all_member();
if(!is_array($result)){
	echo $result;
}
else{ 

?>
<table border="1">
<tr style="color: red;">
	<td>#</td>
    <td>name</td>
    <td>account</td>
    <td>amount</td>
</tr>	
	<?php
    $i=1;
	foreach($result as $val){
			?>
            <tr style="color: blue;">
            	<td><?php echo $i++; ?></td>
                <td><?php echo $val['account_name']?></td>
                <td><?php echo $val['account_number']?></td>
                <td><?php echo $val['account_amount']?></td>
            </tr>
            <?php
	}
	echo '</table>';
	}


 ?>