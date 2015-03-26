<script src="{$PUBLIC_DIR}/js/agri_form.js" type="text/javascript"></script>
<div class="container">

{if $form_type==2}
         <h1 style="color : gray;">[{$title_message}] id :{$h_mc_id}</h1>
	<form class="form-horizontal" name='form1' id="form1" action="{$PHP_DIR}/sv_edit_up.php" method='post'>
{else}
	<h1 style="color : gray;">{$title_message}</h1>
	<form class="form-horizontal" name='form1' id="form1" action="{$PHP_DIR}/sv_add_new.php" method='post'>
{/if}
<input type="hidden" name="h_mc_id" id="h_mc_id"  value="{$h_mc_id}"/>
<div class="form-group">
	<div class="col-sm-6" align="right">
{if $form_type==BM_FORM_TYP_EDIT }
		<A HREF="#" id="btn-save-sv-edit">
		<button class="btn btn-primary btn-lg">Save</button>
		</A>
		&nbsp;&nbsp;
<!--
<A HREF="#" class="btn-delete">
		<A HREF="#" onClick="form_delete_sv({$PHP_DIR}/sv_delete.php , id);">
		<button type="button" class="btn btn-warning  btn-lg">Delete</button>
		</A>
 -->
<a href="#" onClick="form_delete_sv('{$PHP_DIR}/sv_delete.php' , {$h_mc_id} );" class="btn btn-warning  btn-lg">Delete22</a>

{else}
		<A HREF="#" id="btn-save-sv-new">
		<button class="btn btn-primary btn-lg"> Save </button>
		</A>
		&nbsp;&nbsp
{/if}
	  </div>
</div>
  <div class="form-group">
        <label class="col-sm-2" for="">Server Name</label>
	<div class="col-sm-3">
	<input type="text" class="form-control" maxlength="40" name="txt_sv_name" id="txt_sv_name" placeholder="Server-01" value="{$dat[0].sv_name }">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-2" for="">detail</label>
	<div class="col-sm-6">
    <input type="text" class="form-control" maxlength="60" name="txt_biko" id="txt_biko" placeholder="detail, tomato.." value="{$dat[0].biko }">
	</div>
  </div>

   </form>
<hr />
<a href="{$BM_ROOT_DIR}/">
<button class="btn btn-default btn-lg"> Back </button>
</a>
</div>




