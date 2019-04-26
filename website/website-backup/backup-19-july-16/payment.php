<?php
	session_start() ;
	include ('conn.php');
//	include ('forum_login_check.php');
/*	
	$select_packageval=mysql_query("select * from package where package_name='".$_REQUEST['f_Package']."'");
	$result_packageval=mysql_fetch_array($select_packageval);
	$vat_amount=$result_packageval['package_rate']*$result_packageval['package_vat']/100;
	$item_code="PP".$result_packageval['package_id'];
	$total_amount=$result_packageval['package_rate']+$vat_amount;
	$random_num=$_REQUEST['random'];	
	$random=substr(md5($random_num), 0, 10);
*/	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="stylesheet/css.css" type=text/css rel=stylesheet>
</head>

<body>
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	  <td width="905" height="767" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td class="last_top_bg">&nbsp;</td>
		</tr>
		<tr>
		  <td height="228" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
			<tr>
			  <td width="10%" height="96" valign="top"></td>
			  <td width="80%" valign="top">
			  <?php if($_REQUEST['f_PaymentType']=='Credit Card'){ ?>
			  <!--form action="https://www.paypal.com/cgi-bin/webscr" method="post" enctype="" name="form1"-->
			  <form action="https://www.sandbox.paypal.com/webscr" method="post" enctype="" name="form1">  
		  		<!--form action='expresscheckout.php' METHOD='POST'-->
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="11" align="right"><img src="images/left_corner.gif" width="11" height="39" /></td>
                    <td height="39" background="images/top_bg.gif"><h1>Payment Detail</h1></td>
                    <td width="12"><img src="images/right_corner.gif" width="12" height="39" /></td>
                  </tr>
                  <tr>
                    <td rowspan="4" valign="bottom" background="images/left_bg.gif">&nbsp;</td>
                    <td height="10"></td>
                    <td rowspan="4" valign="bottom" background="images/right_bg.gif">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="30" align="right" class="text">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table cellspacing="0" cellpadding="5" width="100%" align="center" border="0">
                      <tr>
                        <td class="DETAILS-border1" width="213"><strong>Business Name :</strong></td>
                        <td class="DETAILS-border1" colspan="2">&nbsp;<?php echo $_REQUEST['f_BusinessName']; ?></td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2"><strong>First Name :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_FirstName']; ?></td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2"><strong>Last Name :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_LastName'];?></td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2"><strong>Email Address :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_Email']; ?></td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2"><strong>Phone :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_Phone']; ?></td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2"><strong>Mobile :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_Mobile']; ?></td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2"><strong>Web Address :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_Fax']; ?></td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2" valign="top"><strong>Packages :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_Package']; ?></td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="DETAILS-border2" valign="top"><strong>Package Amount:</strong></td>
                        <td class="DETAILS-border2" colspan="2"> &euro;199</td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2" valign="top"><strong>Package VAT:</strong></td>
                        <td class="DETAILS-border2" colspan="2"> &euro;0</td>
                      </tr>
                      <tr>
                        <td class="DETAILS-border2" valign="top"><strong>Total Amount :</strong></td>
                        <td class="DETAILS-border2" colspan="2"> <strong>&euro;199</strong></td>
                      </tr>
                        <td class="DETAILS-border2"><strong>Payment Method :</strong></td>
                        <td class="DETAILS-border2" colspan="2">&nbsp;<?php echo $_REQUEST['f_PaymentType']; ?></td>
                      </tr>
                      <tr>
                        <td align="middle">&nbsp;</td>
                        <td><input type="hidden" name="business_name" value="<?php echo $_REQUEST['f_BusinessName'] ; ?>" /><input type="hidden" name="first_name" value="<?php echo $_REQUEST['f_FirstName'] ; ?>" /><input type="hidden" name="last_name" value="<?php echo $_REQUEST['f_LastName'] ; ?>" /><input type="hidden" name="email_add" value="<?php echo $_REQUEST['f_Email'] ; ?>" /><input type="hidden" name="phone_no" value="<?php echo $_REQUEST['f_Phone'] ; ?>" /><input type="hidden" name="mobile_no" value="<?php echo $_REQUEST['f_Mobile'] ; ?>" /><input type="hidden" name="fax_no" value="<?php echo $_REQUEST['f_Fax'] ; ?>" /><input type="hidden" name="package_name" value="<?php echo $_REQUEST['f_Package'] ; ?>" /><input type="hidden" name="package_id" value="<?php echo $result_packageval['package_id'] ; ?>" /><input type="hidden" name="package_amount" value="<?php echo $result_packageval['package_rate'] ; ?>" /><input type="hidden" name="package_vat" value="<?php echo $result_packageval['package_vat'] ; ?>" /><input type="hidden" name="package_total" value="<?php echo $result_packageval['package_id'] ; ?>" /><input type="hidden" name="package_mode" value="<?php echo $total_amount ; ?>" /></td>
                      </tr>
                      <tr>
                        <td align="middle">&nbsp;</td>
                        <?php if($_REQUEST['f_PaymentType']=='Credit Card'){
					  ?>
                        <td><input type="hidden" name="cmd" value="_xclick" />
                            <input type="hidden" name="business" value="atulma_1278004492_biz@yahoo.com" />
                            <input type="hidden" name="item_name" value="<?php echo $_REQUEST['f_Package']; ?>" />
                            <input type="hidden" name="amount" value="199" />
                            <input type="hidden" name="tax" value="<?php echo $vat_amount; ?>" />
                            <input type="hidden" name="item_number" value="<?php echo $item_code ; ?>" />
                            <input type="hidden" name="no_shipping" value="0" />
                            <input type="hidden" name="no_note" value="1" />
                            <input type="hidden" name="currency_code" value="EUR" />
                            <input type="hidden" name="lc" value="IE" />
                            <input type="hidden" name="bn" value="PP-BuyNowBF" />
							<INPUT TYPE="hidden" NAME="return" value="http://www.haqcrc.org/budget/admin/pay_thanks.php">
                            <input type="hidden" name="cancel_return" value="http://www.haqcrc.org/budget/admin/pay_error.php">
							<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
							
							<!--input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif' border='0' align='top' alt='PayPal - The safer, easier way to pay online!'/-->
							
							
							
<!--/form--></td>
                        <?php } else { ?>
                        <td ><input type="submit" value="SUBMIT" name="Submit" /></td>
                        <?php } ?>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td valign="top" background="."><img src="images/left_bt_corner.gif" width="11" height="39" /></td>
                    <td background="images/bottom_bg.gif"><img src="images/bottom_bg.gif" width="1" height="39" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /> 
					</td>
                    <td valign="top"><img src="images/right_bt_corner.gif" width="12" height="39" /></td>
                  </tr>
                </table>
				<?php } else {
					$now=date('Y-m-d');
					$payment_detail=mysql_query("insert into tbl_payment (business_name, first_name, last_name, email_address, pay_phone, pay_mobile, pay_fax, pay_package_name, pay_package_id, pay_package_amount, pay_package_vat, pay_package_total, payment_method, random_number, payment_status, payment_date) values ('".$_REQUEST['f_BusinessName']."', '".$_REQUEST['f_FirstName']."', '".$_REQUEST['f_LastName']."', '".$_REQUEST['f_Email']."', '".$_REQUEST['f_Phone']."', '".$_REQUEST['f_Mobile']."', '".$_REQUEST['f_Fax']."', '".$_REQUEST['f_Package']."', '".$result_packageval['package_id']."', '".$result_packageval['package_rate']."', '".$vat_amount."', '".$total_amount."', '".$_REQUEST['f_PaymentType']."', '".$random."', 'unpaid', '".$now."')");
					 ?>
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="11" align="right"><img src="images/left_corner.gif" width="11" height="39" /></td>
                    <td height="39" background="images/top_bg.gif"><h1>Contact Us</h1></td>
                    <td width="12"><img src="images/right_corner.gif" width="12" height="39" /></td>
                  </tr>
                  <tr>
                    <td rowspan="4" valign="bottom" background="images/left_bg.gif">&nbsp;</td>
                    <td height="10"></td>
                    <td rowspan="4" valign="bottom" background="images/right_bg.gif">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="10"><strong> <h1>Your refrence number is "<?php echo ucwords($random); ?>". Please mention this number for further steps. </hl></strong></td>
                  </tr>
                  <tr>
                    <td><p><br><strong>The Health Clinic<br />
                      43 The Woods,
                            <br />
                          Rathdrum,
                          <br />
                          Co. Wicklow </strong></p>
                      </td>
                  </tr>
                  <tr>
                    <td height="125" align="right" class="text"></td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td valign="top" background="."><img src="images/left_bt_corner.gif" width="11" height="39" /></td>
                    <td background="images/bottom_bg.gif"></td>
                    <td valign="top"><img src="images/right_bt_corner.gif" width="12" height="39" /></td>
                  </tr>
                </table>

				<?php } ?>
			  </form></td>
			  <td width="10%" valign="top"></td>
			</tr>
			<tr>
			  <td colspan="3" valign="top">&nbsp;</td>
			</tr>
		  </table></td>
		</tr>
	  </table>
	  </td>
	</tr>
  </table>
</body>
</html>