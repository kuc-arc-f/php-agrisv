<script src="{$PUBLIC_DIR}/js/app_mc_index.js" type="text/javascript"></script>
<div class="container">
  <div class="row">
    <div class="col-sm-12" style="margin-bottom: 10px;">&nbsp;<h2 style="color: green;">{$title_message}</h2>
    </div>
  </div>
<form name="form1" id="form1" method="post">
	<table style="width:100%;" class="table table-striped table-hover">
	<tbody>
	  <tr>
		<th>sv-ID</th>
		<th>Server<br />Name</th>
		<th>detail</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	  </tr>
{foreach from =$result item="dat" key="key" name="loopName"}
	  <tr height="60px" >
		<td>{$dat.id}</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id} , '{$s_nowStr}');">
		<p style="font-size : 18;">{$dat.sv_name}</p></td>
		<td>{$dat.biko }</td>
		  <td>
			<a href="{$PHP_DIR}/mc_index.php?sv_id={$dat.id}" class="btn btn-default btn-lg">Detail</a>
<!--
			<A HREF="{$PHP_DIR}/mc_index.php?sv_id={$dat.id}">
			<i class="glyphicon glyphicon-zoom-in"></i>
			</A>
 -->
		  </td>
		  <td>
			<a href="{$PHP_DIR}/sv_edit.php?id={$dat.id}" class="btn btn-default">edit</a>
<!--
			<A HREF="{$PHP_DIR}/mc_edit.php?id={$dat.id}"><i class="glyphicon glyphicon-pencil"></i>
 -->
			</A>
		  </td>
	  </tr>

{/foreach}
	</tbody>
	</table>
</form>
<A HREF="{$PHP_DIR}/sv_add.php">
<button class="btn btn-success"> Add Server</button>
</A>
</div>

<!-- --> 
<div id="store">
    <!-- End_Main -->
  </div> 
</div>
</body>
</html>

