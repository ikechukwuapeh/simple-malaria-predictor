<?php 
session_start();
$connect = mysqli_connect("localhost","root","","malaria");

function sanitize($input)
{
	global $connect;
	$input= trim($input);
	$input = strip_tags($input);
	$input = mysqli_real_escape_string($connect,$input);
	
	return $input;
}

if (isset($_POST['check_user'])) {
	$email = sanitize($_POST['email']);
	$fullname = sanitize ($_POST['fullname']);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$insertuser = mysqli_query($connect,"INSERT INTO users (fullname,email) VALUES('$fullname','$email')");
		if ($insertuser) {
			echo "yes";
			$_SESSION['fullname'] = $fullname; 

		}else{
			echo "An error occured";
		}
	}else{
		$err_flag = true;
		echo "invalid email address";
	}
	
}

if (isset($_POST['predictor'])) {
	$chosen_humidity = $_POST['chosen_humidity'];	
	$hum_value = $_POST['hum_value'];	
	$chosen_age = $_POST['chosen_age'];
	// echo $chosen_age *2;
	$age_value = $_POST['age_value'];
	// echo $age_value;
	//echo $age_value * $chosen_age;
	$chosen_blood_group = $_POST['chosen_blood_group'];	
	$bg_value = $_POST['bg_value'];	
	$chosen_mosquito_type = $_POST['chosen_mosquito_type'];	
	$mosq_value = $_POST['mosq_value'];	
	$chosen_gender = $_POST['chosen_gender'];	
	$gen_value = $_POST['gen_value'];
	$chosen_temperature = $_POST['chosen_temperature'];	
	$temp_value = $_POST['temp_value'];	

	//check if any of the values to be chosen are empty
	if (($chosen_humidity == ""  || $chosen_age = "") || ($chosen_blood_group == "" || $chosen_mosquito_type == "")|| ($chosen_gender == "" || $chosen_temperature =="")) {
		echo "All fields must be filled";
	}else{
		
	 	$chosen_age = $_POST['chosen_age'];
		// echo $chosen_age *2;
		$age_value = $_POST['age_value'];
		//get the possible probabilities of each of the factors occuring
		$pos_hum_prob = $chosen_humidity * $hum_value;
		$pos_temp_prob = $chosen_temperature * $temp_value;
		$pos_age_prob = $chosen_age * $age_value;
		$pos_mosquito_type_prob = $chosen_mosquito_type * $mosq_value;
		$pos_gender_prob = $chosen_gender * $gen_value;
		$pos_blood_group_prob = $chosen_blood_group * $bg_value;

		//get the general positive probability and multiply by 0.55 because Nigerians are more probable to have malaria
		$pos_prob = $pos_hum_prob * $pos_age_prob * $pos_temp_prob *  $pos_mosquito_type_prob * $pos_gender_prob * $pos_blood_group_prob * 0.55;

		//get the possible probabilites of their not occuring
		$neg_hum_prob = (1 - $chosen_humidity) * $hum_value;
		$neg_temp_prob = (1 - $chosen_temperature) * $temp_value;
		$neg_age_prob = (1 - $chosen_age) * $age_value;
		$neg_mosquito_type_prob = (1 - $chosen_mosquito_type) * $mosq_value;
		$neg_gender_prob = (1 - $chosen_gender) * $gen_value;
		$neg_blood_group_prob = (1 - $chosen_blood_group) * $bg_value;

		//get the general negative probability and multiply by 0.5 because we assume Nigerians are less probable not to have malaria
		$neg_prob = $neg_hum_prob * $neg_temp_prob * $neg_age_prob  * $neg_mosquito_type_prob * $neg_gender_prob * $neg_blood_group_prob * 0.45;


		//get the normalizer
		$normalizer = $pos_prob + $neg_prob;

		//malaria probability
		$malaria_probability = ($pos_prob/$normalizer) *100;

		echo "You have $malaria_probability % probability of having malaria!";

	}



		

}


 ?>