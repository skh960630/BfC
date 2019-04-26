<table width="99%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DDE4EC">
<?php 
	if($_REQUEST['page']=="admin"){
			if($admin_level == 'super' && $admin_user == '1'){
?>

      <tr>
        <td height="24" bgcolor="#DFE6EE">&nbsp;</td>
        <td height="24" colspan="2" bgcolor="#DFE6EE"><strong>ADMIN MANAGEMENT</strong></td>
        </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="edit_admin.php" class="back_menu">Edit Admin Detail</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="state.php" class="back_menu">State</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="user.php" class="back_menu">State User</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="guest.php" class="back_menu">Guest User</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="logout.php?mode=logout" class="back_menu">Log Out</a></td>
      </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5">
		</td>
        </tr>

		<?php
			}
}
	if($_REQUEST['page']=="report"){
?>
      <tr>
        <td align="center" valign="top" bgcolor="#DFE6EE">&nbsp;</td>
        <td height="22" colspan="2" align="left" bgcolor="#DFE6EE"><strong>REPORTS</strong></td>
        </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
        </tr>
      <tr>
        <td width="9%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td  align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td width="84%" bgcolor="#F1F3F8"><a href="union_budget.php" class="back_menu">Union Budget</a></td>
      </tr>
<!--      <tr>
        <td width="10%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" colspan="2" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="state_budget.php" class="back_menu">State Budget</a></td>
      </tr>
-->      <tr>
        <td width="9%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td  align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="social_sector.php" class="back_menu">Social Sector </a></td>
      </tr>
<!--      <tr>
        <td width="10%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" colspan="2" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="st_sector.php" class="back_menu">Social Sector (State)</a></td>
      </tr>
      <tr>
        <td width="10%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" colspan="2" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="head_report.php" class="back_menu">Head Report</a></td>
      </tr>
-->      
	  <tr>
        <td width="9%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td  align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="head_report_search.php" class="back_menu">Expenditure Report Search</a></td>
      </tr>
      <tr>
        <td width="9%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td  align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="bfc_union.php" class="back_menu">Budget for Children</a></td>
      </tr>
<!--      <tr>
        <td width="10%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" colspan="2" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="bfc_state.php" class="back_menu">BFC Report For State</a></td>
      </tr>
-->      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
        </tr>
		<?php
		}
			if($_REQUEST['page']=="entry"){
			if($admin_level == 'super' && $admin_user == '1'){
		?>
      <tr>
        <td height="24" bgcolor="#DFE6EE">&nbsp;</td>
        <td height="24" colspan="3" bgcolor="#DFE6EE"><strong>DATA ENTRY</strong></td>
        </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
        </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8">
		<a href="ministry.php" class="back_menu">Ministry</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="sector.php" class="back_menu">Sector </a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="programme.php" class="back_menu">Programme</a></td>
      </tr>
      <tr>
        <td width="9%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td width="84%" bgcolor="#F1F3F8"><a href="department.php" class="back_menu">Department</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="year.php" class="back_menu">Year</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="major_head.php?level=union" class="back_menu">Major Head</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="sub_major_head.php?level=union" class="back_menu">Sub Major Head</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="minor_head.php?level=union" class="back_menu">Minor Head</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="sub_head.php?level=union" class="back_menu">Sub Head</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="detail_head.php?level=union" class="back_menu">Detail Head</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="object_head.php?level=union" class="back_menu">Object Head</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="other_head.php?level=union" class="back_menu">Other Head</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td width="84%" bgcolor="#F1F3F8"><a href="union_budget_entry.php" class="back_menu">Union Budget</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="social_sec_entry.php" class="back_menu">Social Sector</a></td>
      </tr>
      <!--tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="acronyms.php" class="back_menu" target="_blank">Acronyms</a></td>
      </tr-->
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
        </tr>
		<?php
			}
			}
		?>
	  <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="50"></td>
        </tr>
    </table>
