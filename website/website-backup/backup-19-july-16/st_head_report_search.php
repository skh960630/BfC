<?php
	include ('includes/login_check.php');
	include ('conn.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<script src="st_report_search.js"></script>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="images/Picture1.jpg">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
	<tr>
	  <td colspan="2" align="center"><?php include('includes/header.php') ; ?>
      </td>
	</tr>
	<tr>
	  <td colspan="2" class="text12">
	  <table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
		<tr>
		  <td align="right" valign="top" height="10" ><a href="acronyms.php" class="back_menu" target="_blank">Acronyms</a>&nbsp;|| &nbsp;<a href="main_state.php?page=report" class="back_menu"><strong>Report Page</strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="85%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
			<tr>
			  <td width="100%" colspan="3" align="center" class="backheads"><strong>Expenditure Report Search (State)</strong></td>
			</tr>
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
			<tr>
			  <td colspan="3"><table width="91%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td width="155">&nbsp;&nbsp;&nbsp;Select State:</td>
			  <td colspan="4">
			    <select name="state_id" onChange="showUser1(this.value)">
				<option value="" selected>Select</option>
				<?php
					if($admin_level=='sub'){
						$sub_query="and state_id='".$user_state_id."'";
					}else if($admin_level=='super'){
						$sub_query=" ";
					}
					$sel_state="select * from haq_state where state_status='active' $sub_query order by state_name";
					$res_state=mysql_query($sel_state);
					while($fetch_state = mysql_fetch_array($res_state)){ ?>
				<option value="<?php echo $fetch_state['state_id']; ?>" ><?php echo $fetch_state['state_name'];?></option> 
				<? }?>
			  </select></td>
			  <td colspan="2" align="left" >Select Year :</td>
			  <td colspan="2" align="left" ><select name="bud_year">
                <option value="" selected>Select</option>
                <?
						$sel_year="select * from haq_year where year_status='active' order by year_id";
						$res_year=mysql_query($sel_year);
						while($fetch_year = mysql_fetch_array($res_year)){ ?>
                <option value="<?php echo $fetch_year['year_name']; ?>" ><?php echo $fetch_year['year_name'];?></option>
                <? }?>
              </select></td>
			  </tr>
			<tr>
			  <td width="155">&nbsp;&nbsp;&nbsp;Select Major Head:</td>
			  <td colspan="4" id="txtHint1">
			    <select name="major_head_id" onChange="showUser2(this.value)">
			      <option value="" selected>Select</option>
			      </select></td>
			  <td colspan="2" align="left">Select Sub Major Head :</td>
			  <td colspan="2" align="left" id="txtHint2"><select name="sub_major_id" onChange="showUser3(this.value)">
                <option value="" >Select</option>
              </select></td>
			  </tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;Select Minor Head:</td>
			  <td colspan="4" id="txtHint3">
			    <select name="minor_id" onChange="showUser4(this.value)">
			      <option value="" >Select</option>
			      </select></td>
			  <td colspan="2" align="left" >Select General Head :</td>
			  <td colspan="2" align="left" id="txtHint4"><select name="gen_id" onChange="showUser5(this.value)">
                <option value="" >Select</option>
              </select></td>
			  </tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;Select Sub Head:</td>
			  <td colspan="4" align="left" id="txtHint5"><select name="sub_id" onChange="showUser6(this.value)">
                <option value="" >Select</option>
              </select></td>
			  <td colspan="2" align="left">Select Detail Head :</td>
			  <td colspan="2" id="txtHint6" align="left">
			    <select name="detail_id" onChange="showUser7(this.value)">
			      <option value="" >Select</option>
			      </select></td>
			  </tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;Select Object Head :</td>
			  <td colspan="4" align="left" id="txtHint7"><select name="object_id" onChange="showUser8(this.value)">
                <option value="" >Select</option>
              </select></td>
			  <td align="left" colspan="2">Select Other Head :</td>
			  <td colspan="2" align="left" id="txtHint8">
			    <select name="other_id">
			      <option value="" >Select</option>
			      </select></td>
			  </tr>
			<tr>
			  <td colspan="9">&nbsp;&nbsp;&nbsp;</td>
			  </tr>
			<tr>
			  <td colspan="9" align="center"><input name="submit" type="submit" id="submit" value="Search">
			      &nbsp;</div></td>
			  </tr>
<?php
			if (isset($_REQUEST['submit'])){ 
				$select_head_report=mysql_query("select * from haq_head_expend_state where major_head_id='".$_REQUEST['major_head_id']."' and sub_major_head_id='".$_REQUEST['sub_major_id']."' and minor_head_id='".$_REQUEST['minor_id']."' and gen_head_id='".$_REQUEST['gen_id']."' and sub_head_id='".$_REQUEST['sub_id']."' and detail_head_id='".$_REQUEST['detail_id']."' and object_head_id='".$_REQUEST['object_id']."' and other_head_id='".$_REQUEST['other_id']."' and expend_year='".$_REQUEST['bud_year']."' and expend_status='active'");
				$result_head_report=mysql_fetch_array($select_head_report);
				

			
/*				$select_head_report=mysql_query("select * from haq_head_expend_union where expend_status='active' ".$query1." ");
				$result_head_report=mysql_fetch_array($select_head_report);
*/				
?>	
	
				<tr>
				  <td height="25" colspan="9" class="txt"> Search Result For <br>
				  <?php 
			  		$select_major_head=mysql_query("select * from haq_st_major_head where major_head_id='".$_REQUEST['major_head_id']."' and major_head_status='active'");
					$result_major_head=mysql_fetch_array($select_major_head);
					$select_state=mysql_query("select * from haq_state where state_id='".$result_major_head['state_id']."' and state_status='active'");
					$result_state=mysql_fetch_array($select_state);

					$select_department=mysql_query("select * from haq_st_department where department_id='".$result_major_head['department_id']."' and department_status='active'");
					$result_department=mysql_fetch_array($select_department);

					$select_sector=mysql_query("select * from haq_sector where sector_id='".$result_major_head['sector_id']."' and sector_status='active'");
					$result_sector=mysql_fetch_array($select_sector);

					$select_program=mysql_query("select * from haq_st_program where program_id='".$result_head_report['program_id']."' and program_status='active'");
					$result_program=mysql_fetch_array($select_program);

				  		//$sel_value=mysql_query("select * from haq_head where head_id='".$_REQUEST['head_id']."'");
						//$rel_value=mysql_fetch_array($sel_value);
						echo  " State = ". $result_state['state_name'] ." <br> Department = ". $result_department['department_name'] ." <br> Sector =  ". $result_sector['sector_name'] ." <br> Programme = ". $result_program['program_name'] ." <br> Year = ". $_REQUEST['bud_year'] ;
						
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("State Expenditure Result Search"," "," "," "," "," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=Year."-".$_REQUEST['bud_year'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=" ";
				$_SESSION['report_values'][$i][3]=" ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=1;
				$_SESSION['report_values'][$i][0]=State."-".$result_state['state_name'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=" ";
				$_SESSION['report_values'][$i][3]=" ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=2;
				$_SESSION['report_values'][$i][0]=Department."-".$result_department['department_name'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=" ";
				$_SESSION['report_values'][$i][3]=" ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=3;
				$_SESSION['report_values'][$i][0]=Sector."-".$result_sector['sector_name'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=" ";
				$_SESSION['report_values'][$i][3]=" ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=4;
				$_SESSION['report_values'][$i][0]=Programme."-".$result_program['program_name'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=" ";
				$_SESSION['report_values'][$i][3]=" ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=5;
				$_SESSION['report_values'][$i][0]=Investment."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=Plan." ";
				$_SESSION['report_values'][$i][3]=Non." ".Plan." ";
				$_SESSION['report_values'][$i][4]=Total." ";
				$_SESSION['report_values'][$i][5]=Grand." ".Total." ";
				$i=6;
				$_SESSION['report_values'][$i][0]=Budget." ".Estimate." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$result_head_report['be_rev_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['be_rev_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_head_report['be_rev_total']." ";
				$_SESSION['report_values'][$i][5]=$result_head_report['be_grand_total']." ";
				$i=7;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$result_head_report['be_cap_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['be_cap_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_head_report['be_cap_total']." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=8;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$result_head_report['be_plan_total']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['be_non_plan_total']." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=9;
				$_SESSION['report_values'][$i][0]=Revised." ".Estimate." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$result_head_report['re_rev_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['re_rev_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_head_report['re_rev_total']." ";
				$_SESSION['report_values'][$i][5]=$result_head_report['re_grand_total']." ";
				$i=10;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$result_head_report['re_cap_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['re_cap_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_head_report['re_cap_total']." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=11;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$result_head_report['re_plan_total']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['re_non_plan_total']." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=12;
				$_SESSION['report_values'][$i][0]=Actual." ".Expenditure." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$result_head_report['ae_rev_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['ae_rev_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_head_report['ae_rev_total']." ";
				$_SESSION['report_values'][$i][5]=$result_head_report['ae_grand_total']." ";
				$i=13;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$result_head_report['ae_cap_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['ae_cap_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_head_report['ae_cap_total']." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=14;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$result_head_report['ae_plan_total']." ";
				$_SESSION['report_values'][$i][3]=$result_head_report['ae_non_plan_total']." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=15;

				  ?></td>
				</tr>
				<?php if($result_head_report['vi_sche']=='no'){?>
				<tr>
				  <td height="25" colspan="2" class="txt"><strong>Year </strong></td>
				  <td colspan="3" class="txt"><strong>Investment</strong></td>
				  <td width="89" height="25" class="txt"><strong>Plan</strong></td>
				  <td width="67" height="25" class="txt"><strong>Non Plan </strong></td>
				  <td width="59" height="25" class="txt"><strong>Total</strong></td>
				  <td width="98" height="25" class="txt"><strong>Grand Total</strong></td>
				</tr>
				<tr>
				  <td colspan="2" rowspan="12" class="txt"><strong><?php echo $_REQUEST['bud_year'] ; ?></strong></td>
				  <td width="128" rowspan="3" class="txt"><strong>Budget Estimate</strong></td>
				  <td colspan="2" class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_head_report['be_rev_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['be_rev_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['be_rev_total'] ;?></td>
				  <td rowspan="3" class="txt"><strong><?php echo $result_head_report['be_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td colspan="2" class="txt">Capital</td>
				  <td height="26" class="txt"><?php echo $result_head_report['be_cap_plan'] ;?></td>
				  <td height="26" class="txt"><?php echo $result_head_report['be_cap_non_plan'] ;?></td>
				  <td height="26" class="txt"><?php echo $result_head_report['be_cap_total'] ;?></td>
				  </tr>
				<tr>
				  <td colspan="2" class="txt">Debt Expenditures </td>
				  <td height="25" class="txt"><?php echo $result_head_report['be_debt_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['be_debt_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['be_debt_total'] ;?></td>
				</tr>
				<tr>
				  <td colspan="3" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['be_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['be_non_plan_total'] ;?></strong></td>
				  <td height="12" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="3" class="txt"><strong>Revised Estimate</strong></td>
				  <td colspan="2" class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_head_report['re_rev_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['re_rev_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['re_rev_total'] ;?></td>
				  <td rowspan="3" class="txt"><strong><?php echo $result_head_report['re_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td colspan="2" class="txt">Capital</td>
				  <td height="25" class="txt"><?php echo $result_head_report['re_cap_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['re_cap_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['re_cap_total'] ;?></td>
				  </tr>
				<tr>
				  <td colspan="2" class="txt">Debt Expenditures</td>
				  <td height="24" class="txt"><?php echo $result_head_report['re_debt_plan'] ;?></td>
				  <td height="24" class="txt"><?php echo $result_head_report['re_debt_non_plan'] ;?></td>
				  <td height="24" class="txt"><?php echo $result_head_report['re_debt_total'] ;?></td>
				</tr>
				<tr>
				  <td colspan="3" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['re_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['re_non_plan_total'] ;?></strong></td>
				  <td height="12" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="3" class="txt"><strong>Actual Expenditure</strong></td>
				  <td colspan="2" class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_rev_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_rev_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_rev_total'] ;?></td>
				  <td rowspan="3" class="txt"><strong><?php echo $result_head_report['ae_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td colspan="2" class="txt">Capital</td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_cap_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_cap_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_cap_total'] ;?></td>
				  </tr>
				<tr>
				  <td colspan="2" class="txt">Debt Expenditures</td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_debt_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_debt_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_head_report['ae_debt_total'] ;?></td>
				</tr>
				<tr>
				  <td height="30" colspan="3" class="txt"><strong>Total</strong></td>
				  <td height="30" class="txt"><strong><?php echo $result_head_report['ae_plan_total'] ;?></strong></td>
				  <td height="30" class="txt"><strong><?php echo $result_head_report['ae_non_plan_total'] ;?></strong></td>
				  <td height="30" colspan="2" align="center"><?php if($admin_level =='super' or ($admin_level =='sub' && $user_state_id==$result_head_report['state_id'] )){ ?><a href="st_head_report_edit.php?expend_id=<?php echo $result_head_report['expend_id'] ; ?>" class="back_menu">Edit</a><?php } ?></td>
				  </tr>
				<?php } else if ($result_head_report['vi_sche']=='yes'){ ?>
				<tr>
				  <td height="25" colspan="2" class="txt"><strong>Year </strong></td>
				  <td colspan="3" class="txt"><strong>Investment</strong></td>
				  <td width="89" height="25" class="txt"><strong>Plan</strong></td>
				  <td width="67" height="25" class="txt"><strong>Non Plan </strong></td>
				  <td width="59" height="25" class="txt"><strong>Total</strong></td>
				  <td width="98" height="25" class="txt"><strong>Grand Total</strong></td>
				</tr>
				<tr>
				  <td colspan="2" rowspan="15" class="txt"><strong><?php echo $_REQUEST['bud_year'] ; ?></strong></td>
				  <td width="128" rowspan="4" class="txt"><strong>Budget Estimate</strong></td>
				  <td width="67" rowspan="2" class="txt">Revenue</td>
				  <td width="74" class="txt">General</td>
				  <td height="11" class="txt"><?php echo $result_head_report['be_rev_gen_p'] ;?></td>
				  <td height="11" class="txt"><?php echo $result_head_report['be_rev_gen_n_p'] ;?></td>
				  <td rowspan="2" class="txt"><?php echo $result_head_report['be_rev_total'] ;?></td>
				  <td rowspan="4" class="txt"><strong><?php echo $result_head_report['be_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">VI Schedule </td>
				  <td height="12" class="txt"><?php echo $result_head_report['be_rev_vi_p'] ;?></td>
				  <td height="12" class="txt"><?php echo $result_head_report['be_rev_vi_n_p'] ;?></td>
				  </tr>
				<tr>
				  <td rowspan="2" class="txt">Capital</td>
				  <td class="txt">General</td>
				  <td height="3" class="txt"><?php echo $result_head_report['be_cap_gen_p'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_head_report['be_cap_gen_n_p'] ;?></td>
				  <td rowspan="2" class="txt"><?php echo $result_head_report['be_cap_total'] ;?></td>
				  </tr>
				<tr>
				  <td class="txt">VI Schedule </td>
				  <td height="4" class="txt"><?php echo $result_head_report['be_cap_vi_p'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_head_report['be_cap_vi_n_p'] ;?></td>
				  </tr>
				<tr>
				  <td colspan="3" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['be_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['be_non_plan_total'] ;?></strong></td>
				  <td height="12" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="4" class="txt"><strong>Revised Estimate</strong></td>
				  <td rowspan="2" class="txt">Revenue</td>
				  <td class="txt">General</td>
				  <td height="11" class="txt"><?php echo $result_head_report['re_rev_gen_p'] ;?></td>
				  <td height="11" class="txt"><?php echo $result_head_report['re_rev_gen_n_p'] ;?></td>
				  <td rowspan="2" class="txt"><?php echo $result_head_report['re_rev_total'] ;?></td>
				  <td rowspan="4" class="txt"><strong><?php echo $result_head_report['re_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">VI Schedule </td>
				  <td height="12" class="txt"><?php echo $result_head_report['re_rev_vi_p'] ;?></td>
				  <td height="12" class="txt"><?php echo $result_head_report['re_rev_vi_n_p'] ;?></td>
				  </tr>
				<tr>
				  <td rowspan="2" class="txt">Capital</td>
				  <td class="txt">General</td>
				  <td height="3" class="txt"><?php echo $result_head_report['re_cap_gen_p'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_head_report['re_cap_gen_n_p'] ;?></td>
				  <td rowspan="2" class="txt"><?php echo $result_head_report['re_cap_total'] ;?></td>
				  </tr>
				<tr>
				  <td class="txt">VI Schedule </td>
				  <td height="4" class="txt"><?php echo $result_head_report['re_cap_vi_p'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_head_report['re_cap_vi_n_p'] ;?></td>
				  </tr>
				<tr>
				  <td colspan="3" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['re_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_head_report['re_non_plan_total'] ;?></strong></td>
				  <td height="12" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="4" class="txt"><strong>Actual Expenditure</strong></td>
				  <td rowspan="2" class="txt">Revenue</td>
				  <td class="txt">General</td>
				  <td height="11" class="txt"><?php echo $result_head_report['ae_rev_gen_p'] ;?></td>
				  <td height="11" class="txt"><?php echo $result_head_report['ae_rev_gen_n_p'] ;?></td>
				  <td rowspan="2" class="txt"><?php echo $result_head_report['ae_rev_total'] ;?></td>
				  <td rowspan="4" class="txt"><strong><?php echo $result_head_report['ae_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">VI Schedule </td>
				  <td height="12" class="txt"><?php echo $result_head_report['ae_rev_vi_p'] ;?></td>
				  <td height="12" class="txt"><?php echo $result_head_report['ae_rev_vi_n_p'] ;?></td>
				  </tr>
				<tr>
				  <td rowspan="2" class="txt">Capital</td>
				  <td class="txt">General</td>
				  <td height="3" class="txt"><?php echo $result_head_report['ae_cap_gen_p'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_head_report['ae_cap_gen_n_p'] ;?></td>
				  <td rowspan="2" class="txt"><?php echo $result_head_report['ae_cap_total'] ;?></td>
				  </tr>
				<tr>
				  <td class="txt">VI Schedule </td>
				  <td height="4" class="txt"><?php echo $result_head_report['ae_cap_vi_p'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_head_report['ae_cap_vi_n_p'] ;?></td>
				  </tr>
				<tr>
				  <td height="30" colspan="3" class="txt"><strong>Total</strong></td>
				  <td height="30" class="txt"><strong><?php echo $result_head_report['ae_plan_total'] ;?></strong></td>
				  <td height="30" class="txt"><strong><?php echo $result_head_report['ae_non_plan_total'] ;?></strong></td>
				  <td height="30" colspan="2" align="center"><?php if($admin_level =='super' or ($admin_level =='sub' && $user_state_id==$result_head_report['state_id'] )){ ?><a href="vi_head_report_edit.php?expend_id=<?php echo $result_head_report['expend_id'] ; ?>" class="back_menu">Edit</a><?php } ?></td>
				  </tr>
			
				<?php } ?>
				<tr>
				  <td height="30" colspan="9" align="center">&nbsp;&nbsp;<a href="export_report.php?fn=State Expenditure Result Search">Download in Excel</a></td>
				  </tr>
				<?php } ?>
		  </table></td>
			</tr>
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
		  </table>
		  </form> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top"></td>
		</tr> 
	  </table></td>
	</tr>
	<tr>
	  <td colspan="2"><?php include ('includes/footer.php') ; ?>
	  </td>
    </tr>
  </table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
var frmvalidator = new Validator("form1");
frmvalidator.addValidation("bud_year","req","Please Select Year");
//frmvalidator.addValidation("head_id","req","Please Select Head");
//frmvalidator.addValidation("head_name","req","Please Select Head Name");
</script>