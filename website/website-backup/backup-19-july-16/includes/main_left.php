<table width="99%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DDE4EC">
      <tr>
        <td align="center" valign="top" bgcolor="#DFE6EE">&nbsp;</td>
        <td height="22" colspan="2" align="left" bgcolor="#DFE6EE"><strong>LEVEL</strong></td>
        </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
        </tr>
      <tr>
        <td width="10%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="main_union.php" class="back_menu">UNION</a></td>
      </tr>
      <tr>
        <td width="10%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="main_state.php" class="back_menu">STATE</a></td>
      </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
        </tr>
      <tr>
        <td height="24" bgcolor="#DFE6EE">&nbsp;</td>
        <td height="24" colspan="2" bgcolor="#DFE6EE"><strong>ADMIN MANAGEMENT</strong></td>
        </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
      </tr>
		<?php
			if($admin_level == 'super' && $admin_user == '1'){
		?>
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
		<?php
			}
		?>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="programme.php" class="back_menu">Programme</a></td>
      </tr>
      <tr>
        <td width="10%" align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td width="7%" align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td width="83%" bgcolor="#F1F3F8"><a href="department.php" class="back_menu">Department</a></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="year.php" class="back_menu">Year</a></td>
      </tr>
		<?php
			if($admin_level == 'super' && $admin_user == '1'){
		?>
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
		<?php
			}
		?>
      <tr>
        <td align="center" valign="top" bgcolor="#F1F3F8">&nbsp;</td>
        <td align="left" valign="top" bgcolor="#F1F3F8"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
        <td bgcolor="#F1F3F8"><a href="logout.php?mode=logout" class="back_menu">Log Out</a></td>
      </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5">
		</td>
        </tr>
	  <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F1F3F8" height="5"></td>
        </tr>
    </table>