<?php
	session_start() ;
	include ('conn.php');
//	include ('forum_login_check.php');
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Advertising --- Payments Page</title>
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
			  <form action="payment.php" method="post" enctype="multipart/form-data" name="form1"><table width="100%" order="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="11" align="right"><img src="images/left_corner.gif" width="11" height="39" /></td>
				  <td height="39" background="images/top_bg.gif"><h1>ADD A LISTING</h1></td>
				  <td width="12"><img src="images/right_corner.gif" width="12" height="39" /></td>
				</tr>
				<tr>
				  <td rowspan="5" background="images/left_bg.gif"><img src="images/left_bg.gif" width="11" height="3" /></td>
				  <td height="10"></td>
				  <td rowspan="5" background="images/right_bg.gif"><img src="images/right_bg.gif" width="12" height="2" /></td>
				</tr>
				<tr>
				  <td><p class="text"><strong>Adding your listing is a simple process:</strong><br /><br />
				  <strong>STEP 1 : </strong>Enter your Personal &amp; Business   Details<br />
				  <strong>STEP 2 : </strong>Select a Listing Package<br />
				  <strong>STEP 3   : </strong>Enter your Payment Preference<br />
				  <strong>STEP 4 : </strong>Review and   confirm all your details<br /></p>
				  </td>
				</tr>
				<tr>
				  <td><hr width="100%" color="#DFEEFF" noshade="noshade" size="3" /></td>
				</tr>
				<tr>
				  <td align="right" height="30" class="text">*(Mandatory Fields)</td>
				</tr>
				<tr>
				  <td><TABLE cellSpacing="0" cellPadding="5" width="100%" align="center" border="0">
					<TR>
					  <TD class=DETAILS-border6 colSpan=3>STEP 1 - PERSONAL DETAILS</TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border1 width=175><STRONG>Business Name :</STRONG></TD>
					  <TD class=DETAILS-border1 colSpan=2><INPUT class=FORMS-textfield maxLength=250 size=50 name=f_BusinessName> </TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>First Name :</STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><INPUT class=FORMS-textfield maxLength=128 size=50 name=f_FirstName></TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>Last Name :</STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><INPUT class=FORMS-textfield maxLength=128 size=50 name=f_LastName></TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>Email Address  :</STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><INPUT class=FORMS-textfield maxLength=128 size=50 name=f_Email></TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>Phone :</STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><INPUT class=FORMS-textfield onblur=checkSpaceNumber(this) maxLength=20 size=50 name=f_Phone></TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>Mobile :</STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><INPUT class=FORMS-textfield maxLength=20 size=50 name=f_Mobile> </TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>Web Address  :</STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><INPUT class=FORMS-textfield onblur=checkSpaceNumber(this) maxLength=20 size=50 name=f_Fax> </TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>Where did you hear about us? </STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><SELECT class=FORMS-listmenu4 name=f_ReferredBy> 
						<OPTION value="" selected>Please select...</OPTION>
						<OPTION value=Google>Google</OPTION>
						<OPTION value=Yahoo>Yahoo</OPTION>
						<OPTION value=NineMSN>NineMSN</OPTION>
						<OPTION value="Other Search Engine">Other Search Engine</OPTION>
						<OPTION value=Newspaper>Newspaper</OPTION>
						<OPTION value=Magazine>Magazine</OPTION>
						<OPTION value=Flyers>Flyers</OPTION>
						<OPTION value="Sales Agent">Sales Agent</OPTION>
						<OPTION value="Word of Mouth">Word of Mouth</OPTION>
						<OPTION value=Other>Other</OPTION>
					  </SELECT></TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border6 colSpan=3>STEP 2 - PACKAGES - Please select your package type</TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2 vAlign=top><STRONG>Packages :</STRONG></TD>
					  <TD class=DETAILS-border2 width=410><TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
						<TR>
						  <TD class=DETAILS-text2 width=27 colspan="4">199</TD>
						</TR>
					  </TABLE></TD>
					  <TD class=DETAILS-border2 width=0></TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border6 colSpan=3>STEP 3 - PAYMENT OPTIONS</TD>
					</TR>
					<TR>
					  <TD class=DETAILS-border2><STRONG>Select a Payment Option * :</STRONG></TD>
					  <TD class=DETAILS-border2 colSpan=2><SELECT class=FORMS-listmenu4 name=f_PaymentType> 
						<OPTION value="" selected>Please select...</OPTION>
						<OPTION value="Credit Card">Credit Card</OPTION>
						<OPTION value="Direct Deposit">Cheque/Postal order payments to:</OPTION>
					  </SELECT></TD>
					</TR>
					<TR>
					  <TD align=middle>&nbsp; </TD>
					  <TD colSpan=2><INPUT type=submit value="SUBMIT" name=Submit></TD>
					</TR>
				  </TABLE></td>
				</tr>
				<tr>
				  <td background="images/left_bg.gif"><img src="images/left_bt_corner.gif" width="11" height="39" /></td>
				  <td background="images/bottom_bg.gif"><img src="images/bottom_bg.gif" width="1" height="39" /></td>
				  <td background="images/right_bg.gif"><img src="images/right_bt_corner.gif" width="12" height="39" /></td>
				</tr>
			  </table></form></td>
			  <td width="10%" valign="top"></td>
			</tr>
			<tr>
			  <td colspan="3" valign="top">&nbsp;</td>
			</tr>
		  </table></td>
		</tr>
	  </table></td>
	</tr>
  </table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
var frmvalidator = new Validator("form1");
frmvalidator.addValidation("f_PaymentType","req","Please Select Payment Option");
//frmvalidator.addValidation("f_Email","req","Please enter Email Address");
//frmvalidator.addValidation("f_Email","email");
</script>
