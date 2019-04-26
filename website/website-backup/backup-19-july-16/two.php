<?php
ob_start();
include ('conn.php');


//
//////////////////////////////////////////////////
/////////// DO NOT EDIT THIS PART OF FILE ////////
//////////////////////////////////////////////////
/*$dbh=mysql_connect ($dbhost, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ($dbname);




*/
?>
<html>
<head>
<title>welcome</title>
</head>
<body>
<form name="form1" method="post" action="">
<table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
<tr>
						  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Year :</td>
						  <td colspan="2" align="left">From : &nbsp;&nbsp; 
							<select name="year_from">
							<option value="" selected>Select</option>
							<?php
								$sel_year="select * from haq_year where year_status='active' order by year_code";
								$res_year=mysql_query($sel_year);
								while($fetch_year = mysql_fetch_array($res_year)){ ?>
							<option value="<?php echo $fetch_year['year_code']; ?>" ><?php echo $fetch_year['year_name'];?></option> 
							<? }?>
							  </select></td>
						  <td colspan="2" align="left">&nbsp;To : &nbsp;&nbsp;
							<select name="year_to">
							  <option value="" selected>Select</option>
							  <?php
								$sel_year="select * from haq_year where year_status='active' order by year_code";
								$res_year=mysql_query($sel_year);
								while($fetch_year = mysql_fetch_array($res_year)){ ?>
							  <option value="<?php echo $fetch_year['year_code']; ?>" ><?php echo $fetch_year['year_name'];?></option>
							  <? }?>
							</select></td>
							</tr>			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Sector :</td>
			  <td colspan="2" align="left"><select name="sector_id">
                <option value="" selected>Select</option>
                <?
					$sel_query="select * from haq_sector where sector_status='active' order by sector_name";
					$res_query=mysql_query($sel_query);
					while($fetch_query = mysql_fetch_array($res_query)){ ?>
                <option value="<?php echo $fetch_query['sector_id']; ?>" ><?php echo $fetch_query['sector_name'];?></option>
                <? }?>
              </select></td>
			  <td colspan="2" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
			  </tr>
				<tr>
				  <td height="25" colspan="6" class="txt" align="right">&nbsp;</td>
				</tr>
				<tr>
				  <td height="25" colspan="6" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td width="122" height="25" class="txt"><strong>Year </strong></td>
				  <td colspan="2" class="txt" align="center"><strong>Budget Estimate</strong></td>
				  <td height="25" colspan="2" align="center" class="txt"><strong>Revised Estimate</strong></td>
				  <td height="25" class="txt" align="center"><strong>Actual Expenditure</strong></td>
			    </tr>

<?php
			if (isset($_REQUEST['submit'])){
									if($_REQUEST['year_from'] > $_REQUEST['year_to']){
										$error="Invalid Year Range Selected";
									
						?>
										<tr>
										  <td height="25" align="center" colspan="6" class="error"><?php echo $error ; ?></td>
										  </tr>
						<?php
									}else {


			$select_year="select * from haq_year where year_status='active' and year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' order by year_id";
			$result_year=mysql_query($select_year);
			$tsv = array();

while($fetch_year=mysql_fetch_array($result_year))
{
$tsv[] = implode("\t", $fetch_year);
}

$tsv = implode("\r\n", $tsv);
$filename = "dataname.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
echo $tsv;

			{

				$select_budget_report="select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total, a.expend_year from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_type='".$_REQUEST['level']."' and a.expend_status='active' and a.expend_year='".$fetch_year['year_name']."' group by a.expend_year";
				$result_budget_report=mysql_query($select_budget_report);
				$fetch_budget_report=mysql_fetch_array($result_budget_report);
				$sum_be_grand= $fetch_budget_report['be_total']/10000 ;
				$sum_re_grand= $fetch_budget_report['re_total']/10000 ;
				$sum_ae_grand= $fetch_budget_report['ae_total']/10000 ;


			$select_sector_report="select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total, a.expend_year from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and b.sector_id='".$_REQUEST['sector_id']."' and a.expend_type='".$_REQUEST['level']."' and a.expend_year='".$fetch_year['year_name']."' group by a.expend_year";
			$result_sector_report=mysql_query($select_sector_report);
			$fetch_sector_report=mysql_fetch_array($result_sector_report);
			if($fetch_budget_report['expend_year'] !=0 && $fetch_sector_report['expend_year'] !=0){					
			$sector_be_grand= $fetch_sector_report['be_total']/10000 ;
			$sector_re_grand= $fetch_sector_report['re_total']/10000 ;
			$sector_ae_grand= $fetch_sector_report['ae_total']/10000 ;
			$be_percent=$sector_be_grand/$sum_be_grand*100;
			$re_percent=$sector_re_grand/$sum_re_grand*100;
			$ae_percent=$sector_ae_grand/$sum_ae_grand*100;

?>	
	
				<tr>
				  <td class="txt"><strong><?php echo $fetch_budget_report['expend_year'] ; ?></strong></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($be_percent, 2)."%" ; ?></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($re_percent, 2)."%" ; ?></td>
				  <td class="txt" align="center"><?php echo round($ae_percent, 2)."%" ; ?></td>
				</tr>
<?php
}	}

				$total_budget=mysql_query("select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and a.expend_type='".$_REQUEST['level']."' and a.expend_status='active'");
				$result_budget=mysql_fetch_array($total_budget);
				$per_be= $result_budget['be_total']/10000 ;
				$per_re= $result_budget['re_total']/10000 ;
				$per_ae= $result_budget['ae_total']/10000 ;


			$sector_budget=mysql_query("select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and b.sector_id='".$_REQUEST['sector_id']."' and a.expend_type='".$_REQUEST['level']."'");
			$result_sector=mysql_fetch_array($sector_budget);
			$sector_be= $result_sector['be_total']/10000 ;
			$sector_re= $result_sector['re_total']/10000 ;
			$sector_ae= $result_sector['ae_total']/10000 ;
			if($per_be !=0 && $per_re !=0 && $per_ae!=0){
			$avg_be=$sector_be/$per_be*100;
			$avg_re=$sector_re/$per_re*100;
			$avg_ae=$sector_ae/$per_ae*100;

?>			
				<tr>
				  <td class="txt"><strong>Average</strong></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($avg_be, 2)."%" ; ?></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($avg_re, 2)."%" ; ?></td>
				  <td class="txt" align="center"><?php echo round($avg_ae, 2)."%" ; ?></td>
				</tr>
				<tr>
				  <td height="30" colspan="6">&nbsp;</td>
				  </tr>
				<?php } } }?>
		  </table>
<?PHP



exit;
?>
</body>





</html>

