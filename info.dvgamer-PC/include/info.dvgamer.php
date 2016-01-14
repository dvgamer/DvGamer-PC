<?php 
include ("language/thai.php");
include ("connect.php");
include ("php.function.php");

function MainBody($case,$page,$sort,$by,$id,$login,$user) {
	require ("language/thai.php");
	switch ($case) {
	case "listgame" : 
		mysql_query("USE dvgamer_info;");
		  $sql = "Select list_id from dvg_listgame;";
		  $result = mysql_query($sql);
		  $totalrow = mysql_num_rows($result);
	?>

    <table width="75%" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
    <tr>
        <td>
        <div class="main_head"><div>
          <div><strong>.: 
              <a href="index.php?option=home"><?php echo $DVG_HOME; ?></a> --&gt; <?php echo $DVG_LISTGAME . $totalrow . $DVG_GAME; ?> :.</strong><br>
        <img class="line" src="images/head_line.png"></div></div></div>
        </td>
    </tr>
    <tr>
      <td>
        <div class="main_body"><div><div>
        <center>&nbsp;<?php
		if ($id == "addsuccess") {
		echo "<div class=\"blue\">";
		echo $NEW_GAME_SUCCESS;
		echo "</div><br />";
		} elseif ($id == "editsuccess") {
		echo "<div class=\"blue\">";
		echo $EDIT_GAME_SUCCESS;
		echo "</div><br />";
		}
		if (!isset($by)) { $by = "asc"; }
		if ($page) { $pages = "&page=" . $page;	}
		
		If ($by == "asc") {
			$by = "DESC";
			$bys = "&by=desc";
		} else {
			$by = "ASC";
			$bys = "&by=asc";
		}		
		
        ?></center>
        <table class="listgame" align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top" width="33" height="20"><strong>
            
            <a style="color:#000;" href="index.php?option=listgame&sort=list_id<?php echo $bys . $pages; ?>">No.</a>
            <?php if($by == "DESC") { ?><img src="images/bullet_DESC.png" border="0" /> <?php } ?> 
            
            </strong></td>
            <td valign="top" align="left" width="278" ><strong><a style="color:#000;" href="index.php?option=listgame&sort=gname<?php echo $bys . $pages; ?>">Name</a></strong></td>
            <td valign="top" align="left" width="75" ><strong><a style="color:#000;" href="index.php?option=listgame&sort=grelease<?php echo $bys . $pages; ?>">Release</a></strong></td>
            <td valign="top" align="left" width="124" ><strong><a style="color:#000;" href="index.php?option=listgame&sort=genre_id<?php echo $bys . $pages; ?>">Genre</a></strong></td>
            <td valign="top" align="left" width="65" ><strong><a style="color:#000;" href="index.php?option=listgame&sort=box_id<?php echo $bys . $pages; ?>">Box</a></strong></td>
            <td valign="top" align="left" width="65" ><strong><a style="color:#000;" href="index.php?option=listgame&sort=gsizes<?php echo $bys . $pages; ?>">Size</a></strong></td>
            <td valign="top" align="left" width="80"><strong>Resource</strong></td>
          </tr>
          <?php
		  $pagesize = 30;
		  
		  $totalpage = (int) ($totalrow / $pagesize);
		  if ($totalrow % $pagesize != 0) {
			  $totalpage += 1;
		  }
		  if (isset($page)) {
			  $pagestart = $pagesize * ($page - 1);
		  } else {
			  $page = 1;
			  $pagestart = 0;
		  }
		  
		  if (!isset($sort)) { $sort = "list_id"; }
		  
		  $sql = "Select * from dvg_listgame ORDER BY $sort $by limit $pagestart, $pagesize;";
		  $result = mysql_query($sql);
		  
		  		  
		  while ($dblistgame = mysql_fetch_array($result)) {
			  echo "<tr>";
			  echo "<td align=\"middle\" height=\"24\">" . $dblistgame['list_id'] . "</td>";
			  echo "<td align=\"left\">";
			  if ($login == true and $user == "admin") { 
			  		echo "<a href=\"index.php?option=edit&id=" . $dblistgame['list_id'] . "\"><img src=\"images/edit.png\" border=\"0\" /></a>&nbsp;&nbsp;";
			  }
			  echo "<a href=\"index.php?option=viewgame&id=" . $dblistgame['list_id'] . "\">" . $dblistgame['gName'] . "</a></td>";
			  echo "<td align=\"left\">" . $dblistgame['grelease'] . "</td>";
			  echo "<td align=\"left\">" . GenreName($dblistgame['genre_id']) . "</td>";
			  echo "<td align=\"left\">" . BoxName($dblistgame['box_id']) . "</td>";
			  echo "<td align=\"left\">" . $dblistgame['gSizes'] . " MB</td>";
			  echo "<td align=\"left\">";
			  if ($login == true and $user == "admin") { 
					echo "<a href=\"index.php?option=delete&id=" . $dblistgame['list_id'] . "\"><img src=\"images/delete.png\" border=\"0\" /></a>&nbsp;";
			  } else {
				  echo "<strong>N/A</strong>";			  
			  }
			  echo "</td>";
			  echo "</tr>";
		  }
		  ?>
        </table><br /><br /><br /><center>
        <?php
		$query = "index.php?option=listgame&sort=" . $sort . "";
		for ($i=1; $i<=$totalpage; $i++) {
			if ($i == $page) {
				if ($i == 1) {
					echo "<input type=\"button\" class=\"page\" disabled=\"disabled\" value=\"|< First\"/>";
					echo "<input type=\"button\" class=\"page\" disabled=\"disabled\" value=\"<< Back Page\"/>";
				} elseif ($i == $totalpage) {
					echo "<input type=\"button\" class=\"page\" disabled=\"disabled\" value=\"Next Page >>\"/>";
					echo "<input type=\"button\" class=\"page\" disabled=\"disabled\" value=\"Last >|\"/>";
				} else {
					echo "<input type=\"button\" class=\"page\" disabled=\"disabled\" value=\"$i\"/>";
				}
			} else {
				if ($i == 1) {
					echo "<input type=\"button\" class=\"page\" onclick=\"location.href='" . $query . "&page=$i'\" value=\"|< First\"/>";
					echo "<input type=\"button\" class=\"page\" onclick=\"location.href='" . $query . "&page=" . ($page - 1) . "'\" value=\"<< Back Page\"/>";
				} elseif ($i == $totalpage) {
					echo "<input type=\"button\" class=\"page\" onclick=\"location.href='" . $query . "&page=" . ($page + 1) . "'\" value=\"Next Page >>\"/>";
					echo "<input type=\"button\" class=\"page\" onclick=\"location.href='" . $query . "&page=$i'\" value=\"Last >|\"/>";
				} else {
					echo "<input type=\"button\" class=\"page\" onclick=\"location.href='" . $query . "&page=$i'\" value=\"$i\"/>";
				}
			}
		}
		?>
        </center></div>
        </div></div>
      </td>
    </tr>
    <tr>
        <td>
        <div class="main_foot"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
</table><br>
	<?php 
	break;
	case "add" : ?>
    <script language="javascript">
	function CheckAdd() {
		document.getElementById("cross").innerHTML = "<img src=images/cross.png border=0 align=absmiddle />";
	}
	</script>
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
    <tr>
        <td>
        <div class="main_head"><div>
          <div><strong>.: <a href="index.php?option=home"><?php echo $DVG_HOME; ?></a> --&gt; <?php echo $DVG_ADDGAME; ?> :.</strong><br>
          <img class="line" src="images/head_line.png" ></div></div></div>
        </td>
    </tr>
    <tr>
      <td>
      <form name="fromadd" class="main_body" method="post" action="newgame.php" style=" margin-bottom:0px;">
        <div>
          <div>
        <center>&nbsp;<?php
		if ($page == "fail") {
		echo "<div class=\"red\">";
		echo $NEW_GAME_FAIL;
		echo "</div><br />";
		}
        ?></center>
          <center>
            <table class="viewgame" width="350" border="0" align="center">
                  <tr>
                    <td width="80"><?php echo $LIST_NAME; ?>: </td>
                    <td width="260">
                    <input name="name" type="text" size="40" maxlength="255" id="inputbox"><span style="margin-left:5px;" id="cross">&nbsp;</span>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $LIST_GENRE;  ?>:</td>
                    <td>
                      <?php 
					  $sql = "Select * from dvg_genre;";
					  $result = mysql_query($sql);
					   $row = mysql_num_rows($result);
					   echo "<select id=\"listmenu\" name=\"listgenre\">";
					   for ($i=0; $i<=($row - 1); $i++) {
						   echo "<option value=\"" . mysql_result($result, $i, 'genre_id') . "\">";
						   echo mysql_result($result, $i, 'name') ;
						   echo "</option>"; 
					   }
					  echo "</select>";					   
					  ?>                      
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $LIST_SIZE; ?>: </td>
                    <td><input name="sizes" type="text" size="10" maxlength="5" id="inputbox">
                    MB</td>
                  </tr>
                                    <tr>
                    <td><?php echo $LIST_BOX; ?>:</td>
                    <td>
                      <?php 
					  $sql = "Select * from dvg_box;";
					  $result = mysql_query($sql);
					   $row = mysql_num_rows($result);
					   echo "<select id=\"listmenu\" name=\"listbox\">";
					   for ($i=0; $i<=($row - 1); $i++) {
						   echo "<option value=\"" . mysql_result($result, $i, 'box_id') . "\">";
						   echo mysql_result($result, $i, 'name') ;
						   echo "</option>"; 
					   }
					  echo "</select>";
					  ?>
                    </td>
                  </tr>

                  <tr>
                    <td><?php echo $LIST_UNIT; ?>:</td>
                    <td><input name="unit" type="text" value="1" size="5" maxlength="1" id="inputbox"><?php echo $LIST_UNITS; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><br>
                    <?php echo $LIST_HOWTO; ?>: </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                    <textarea name="howto" cols="50" rows="8" id="inputbox"><?php echo $LIST_HOWTO_TEMPATE; ?></textarea>
                    </td>
                  </tr>
                </table>  
           
              <br>
                <br>
                  <input type="submit" name="Send" class="button" value="<?php echo $DVG_ADD; ?>">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="Reset" type="reset" class="button" value="<?php echo $DVG_RESET; ?>">
                </center>
          </div></div></form>
      </td>
    </tr>
    <tr>
        <td>
        <div class="main_foot"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
</table><br>
	<?php break;
	case "edit" : ?>
	<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0"  class="main">
    <tr>
        <td>
        <div class="main_head"><div>
          <div>
		  
          <strong>
          <?php
		  	$sql = "Select * from dvg_listgame where list_id=$id;";
		  	$result = mysql_query($sql);
		  ?>
          .: <a href="index.php?option=home"><?php echo $DVG_HOME; ?></a> --&gt; <a href="index.php?option=listgame"><?php echo $DVG_LISTGAME; ?></a> --&gt; <?php echo $EDIT_GAME; ?> <?php echo mysql_result($result, 0, 'gName'); ?>:. </strong><br>
        <img class="line" src="images/head_line.png">

         </div></div></div>
        </td>
    </tr>
    <tr>
      <td>
        <form class="main_body" method="post" action="editgame.php" style=" margin-bottom:0px;"><div>
          <div>
        <center>&nbsp;<?php
		if ($page == "fail") {
		echo "<div class=\"red\">";
		echo $EDIT_GAME_FAIL;
		echo "</div><br />";
		}
        ?></center>
          <table class="viewgame" width="360" border="0" align="center">
            <tr>
              <td width="80"><?php echo $LIST_NAME; ?>: </td>
              <td width="270"><label>
                
                <input name="name" type="text" id="inputbox" value="<?php echo mysql_result($result, 0, 'gName'); ?>"  size="40" maxlength="255">
              </label></td>
            </tr>
            <tr>
              <td><?php echo $LIST_GENRE;  ?>:</td>
              <td>
                      <?php 
					  $sqllist = "Select * from dvg_genre;";
					  $resultlist = mysql_query($sqllist);
					   $row = mysql_num_rows($resultlist);
					   echo "<select id=\"listmenu\" name=\"listgenre\">";
					   for ($i=0; $i<=($row - 1); $i++) {
						   echo "<option ";
						   if (mysql_result($result, 0, 'genre_id') == mysql_result($resultlist, $i, 'genre_id')) {
							   echo "selected";
						   }
						   echo " value=\"" . mysql_result($resultlist, $i, 'genre_id') . "\">";
						   echo mysql_result($resultlist, $i, 'name') ;
						   echo "</option>"; 
					   }
					  echo "</select>";					   
					  ?>                      
              </td>
            </tr>
            <tr>
              <td><?php echo $LIST_SIZE; ?>: </td>
              <td><input name="sizes" type="text" id="inputbox" value="<?php echo mysql_result($result, 0, 'gSizes'); ?>"  size="10" maxlength="5"> 
                MB</td>
            </tr>
            <tr>
              <td><?php echo $LIST_BOX; ?>:</td>
              <td>
                      <?php 
					  $sqllist = "Select * from dvg_box;";
					  $resultlist  = mysql_query($sqllist);
					   $row = mysql_num_rows($resultlist);
					   echo "<select id=\"listmenu\" name=\"listbox\">";
					   for ($i=0; $i<=($row - 1); $i++) {
						   echo "<option ";
						   if (mysql_result($result, 0, 'box_id') == mysql_result($resultlist, $i, 'box_id')) {
							   echo "selected";
						   }
						   echo " value=\"" . mysql_result($resultlist , $i, 'box_id') . "\">";
						   echo mysql_result($resultlist , $i, 'name') ;
						   echo "</option>"; 
					   }
					  echo "</select>";
					  ?>
              </td>
            </tr>
            <tr>
              <td><?php echo $LIST_UNIT; ?>:</td>
              <td><input name="unit" type="text" id="inputbox" value="<?php echo mysql_result($result, 0, 'gUnit'); ?>" size="5" maxlength="1">
                <?php echo $LIST_UNITS; ?></td>
            </tr>
            <tr>
              <td colspan="2"><br>
                <?php echo $LIST_HOWTO; ?>: </td>
              </tr>
            <tr>
              <td colspan="2"><textarea name="howto" cols="50" rows="8" id="inputbox" ><?php echo mysql_result($result, 0, 'gHowto'); ?></textarea></td>
              </tr>
          </table>
          <br>
                <input name="list_id" type="hidden" value="<?php echo $id; ?>" />
            <br>
                <center>
                  <input type="submit" name="Send" class="button" value="<?php echo $EDIT_GAME; ?>">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="Reset" type="reset" class="button" value="<?php echo $EDIT_RESET; ?>">
            </center>

        </div>
        </div></form>
      </td>
    </tr>
    <tr>
        <td>
        <div class="main_foot"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
</table><br>
	<?php break;
	case "viewgame" : ?>
    
 	<?php break;
	case "delete" : ?>
	<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0"  class="main">
    <tr>
        <td>
        <div class="main_head"><div>
          <div>
          <strong>.: <?php echo $DVG_HOME; ?> :.</strong> <br>
        <img class="line" src="images/head_line.png">

         </div></div></div>
        </td>
    </tr>
    <tr>
      <td>
        <form class="main_body" method="post" action="deletegame.php"><div><div><br />
        	<?php 
			$sql = "Select * from dvg_listgame where list_id=$id;";
		  	$result = mysql_query($sql);
			?>            
            <center><h1><font color="#FF0000"><?php echo $DELETE_GAME_CHECK . mysql_result($result, 0, 'gName') . " ?"; ?></font></h1>
            <input type="hidden" name="delglist_id" value="<?php echo $id; ?>" />
            <input name="Submit" type="submit" class="button" value="<?php echo $DELETE_GAME_OK; ?>">
            <input type="button" class="button" onClick="history.back();" value="<?php echo $DELETE_GAME_CANCEL; ?>">
            </center>
        </div></div></form>
      </td>
    </tr>
    <tr>
        <td>
        <div class="main_foot" style="margin-top:-12px;"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
</table><br>
	<?php break;
 	}
}
?>