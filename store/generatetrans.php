<?php
session_start();
function createRandomPassword() {
					$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 3) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$letter = createRandomPassword();
function numberletter() {
					$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$passii = '' ;
					while ($i <= 2) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$passii = $passii . $tmp;
						$i++;
					}
					return $passii;
				}
				$ccnumbers = numberletter();
$confirmation = $letter.'-'.$ccnumbers;
session_regenerate_id();
$_SESSION['SESS_MEMBER_ID'] = $confirmation;

session_write_close();
header("location: index.php");
?>