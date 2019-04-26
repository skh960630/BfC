<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>SignUp</title>

<script language = "Javascript">
/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

function ValidateForm(){

	var fname=document.frmSample.fname
	if ((fname.value==null)||(fname.value=="")){
		alert("Please Enter your First name")
		fname.focus()
		return false
	}
	var lname=document.frmSample.lname
	if ((lname.value==null)||(lname.value=="")){
		alert("Please Enter your Last name")
		lname.focus()
		return false
	}

	var emailID=document.frmSample.txtEmail
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	var phone=document.frmSample.phone
	if ((phone.value==null)||(phone.value=="")){
		alert("Please Enter your Phone number")
		phone.focus()
		return false
	}
	var agree=document.frmSample.agree
	if(!agree.checked){alert("Please check MontVox Business Center service Terms & Conditions");
return false; } 
	return true
 }


</script>
	<link href="css/template_css.css" rel="stylesheet" type="text/css" />
	 <style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.style10 {font-size: 18; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style13 {font-size: 12px}
.style15 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style16 {font-size: 18px; font-weight: bold; color: #CC6633}
.style17 {color: #000000}
-->
     </style>
    <style type="text/css">
<!--
.style15 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style16 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style17 {font-size: 12px}
.style21 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style21 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style22 {font-size: 18px}
.style23 {font-size: 24px}
.style24 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style24 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style25 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style25 {font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style26 {color: #000000}
.style26 {font-size: 12px}
-->
    </style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
		<FORM ACTION="https://www.paypal.com/cgi-bin/webscr" METHOD="POST" name="frmSample" id="contact" onsubmit="return ValidateForm()">
			<INPUT TYPE="hidden" NAME="cmd" VALUE="_xclick">
			<INPUT TYPE="hidden" NAME="business" VALUE="rajiv_1278093478_biz@gmail.com">
			<INPUT TYPE="hidden" NAME="undefined_quantity" VALUE="1">
			  <input type="hidden" name="amount" value="199" />
			    <input type="hidden" name="no_shipping" value="0" />
                            <input type="hidden" name="no_note" value="1" />
                            <input type="hidden" name="currency_code" value="EUR" />
                            <input type="hidden" name="lc" value="IE" />
							 <input type="hidden" name="item_name" value="MONTVOX BUSINESS CENTER ONE (1) YEAR MEMBERSHIP" />
							
			  							<INPUT TYPE="hidden" NAME="return" value="http://www.haqcrc.org/budget/admin/pay_thanks.php">
                            <input type="hidden" name="cancel_return" value="http://www.haqcrc.org/budget/admin/pay_error.php">
                            <div id="mainWrap" class="signupPage">
            <div id="contentWrap">
              <h1 align="center" class="style16 style23">Sign-up</h1>
	            <table width="564" border="0" align="center">
                  <tr>
                    <td width="128" height="40" class="style21"><div align="left">First Name</div></td>
                    <td width="426"><span class="style1 style15">
                    <input name="fname" type="text" class="style10" value="<?php echo $_POST['fname'];?>" size="50" />
                    </span></td>
                  </tr>
                  <tr>
                    <td height="38"><div class="inputWrap style15">
                      <div class="label"></div>
                      <div class="style21">
                        <div align="left">Last  Name</div>
                      </div>
                      </div>
                      <div class="inputWrap style16"></div></td>
                    <td><span class="style1 style15">
                    <input name="lname" type="text" class="style10" value="<?php echo $_POST['lname'];?>" size="50" />
                    </span></td>
                  </tr>
                  <tr>
                    <td height="38"><div class="inputWrap style16">
                      <div class="label"></div>
                    </div>
                      <div class="inputWrap style15">
                        <div class="style21">
                          <div align="left">Email </div>
                        </div>
                      </div>
                      <div class="inputWrap style16"></div></td>
                    <td><span class="style1 style16">
                    <input name="txtEmail" type="text" class="style10" value="<?php echo $_POST['txtEmail'];?>" size="50" />
                    </span></td>
                  </tr>
                  <tr>
                    <td height="42"><div class="inputWrap style15">
                      <div class="style1"> </div>
                      <div class="style15">
                        <div align="left">Telephone</div>
                      </div>
                    </div>
                    <div class="inputWrap style15"></div></td>
                    <td><span class="style1 style15">
                    <input name="phone" type="text" class="style10" value="<?php echo $_POST['phone'];?>" size="50" />
                    </span></td>
                  </tr>
                  <tr>
                    <td height="49" colspan="2"><div align="center"><span class="style15">
                    </span><span class="style24">
                      <input type="checkbox" name="confirm2" value="<?php echo $_POST['confirm'];?>" />
  I confirm that I officially represent this company either as employee, owner or marketing partner</span></div></td>
                  </tr>
                  <tr>
                    <td colspan="2"><p class="style13 style15 style16"><span class="style15 style16 style22">MONTVOX BUSINESS CENTER ONE (1) YEAR MEMBERSHIP 199&euro; </span> </p>                      
                      <p class="style13 style15 style17 style16">Including:</p>
                      <ul class="style10 ">
                        <li class="style15 style17">Unlimited use of location based and social media marketing services via Montvox Business Center </li>
                        <li class="style15 style17">Linking to Twitter, Facebook, Foursquare and Google Buzz </li>
                        <li class="style15 style17">Weekly MontVox business newsletter </li>
                        <li class="style15 style17">"Check-in Here" door sticker </li>
                        <li class="style15 style17">All updates and new services are free-of-charge </li>
                    </ul>                      </td>
                  </tr>
                  <tr>
                    <td colspan="2"><div class="inputWrap style16">
                      <div class="label"></div>
                    </div>
                      <div class="inputWrap style16">
                        <div class="style1"></div>
                      </div>
                      <div class="inputWrap style16">
                      <div class="style1"></div>
                      </div>                      <div class="inputWrap style16">
                        <div class="style1"></div>
                      </div>                      <div class="inputWrap style16"></div>                      
                      <div align="left"><span class="style1 style16"><span class="style26">
                      <input name="agree" type="checkbox" id="agree3" value="checkbox" />
                      </span></span><span class="style25">I agree on MontVox Business Center service Terms &amp; Conditions</span> </div></td>
                  </tr>
                  <tr>
                    <td height="52" colspan="2"><div class="signupinfo style16">
                      <div class="inputWrap">
                        <div class="label"></div>
                      </div>
                      <div class="inputWrap">                        </div>
                      </div>
                      <div class="signuplist style16">
                        <div align="center">
                          <input name="submit" type="submit" class="style16" value="Pay 199&euro; Via Paypal" />
                        </div>
                    </div></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
              </table>
                
             
               
                </div>
            </div>
          </form>
	  </div>

		
<script type="text/JavaScript">
	function change_check(div_id,field_id) {
		if(document.getElementById(div_id).className=='check_box') {
			document.getElementById(div_id).className='check_box_checked';
			document.getElementById(field_id).value=1;
		} else {
			document.getElementById(div_id).className='check_box';
			document.getElementById(field_id).value='0';
		}
	}
</script>
		
		<div id="mainWrap" class="signupPage">
		<div id="contentWrap">
			<h1>&nbsp;</h1>
		  </div>
		</div>
</div>
</body>

</html>