<style>
tr:nth-of-type(odd) { background-color: #fff; }
tr:nth-of-type(even) { background-color: #ccc; }
.sorttxt { cursor: move; line-height:1.5em;}

td,tr,th{
 border-collapse: collapse;
 cursor:all-scroll;
}
table{
 border-collapse: collapse;
 -webkit-user-select: none; /* Safari */
 -ms-user-select: none; /* IE 10+ and Edge */
 user-select: none; /* Standard syntax */
}
</style>
<script>
 var row;
function start(){
  row = event.target;
}
function dragover(){
  var e = event;
  e.preventDefault();

  let children= Array.from(e.target.parentNode.parentNode.children);
  if(children.indexOf(e.target.parentNode)>children.indexOf(row))
    e.target.parentNode.after(row);
  else
    e.target.parentNode.before(row);
}
</script>
<?php if($page['displaymenu'] == 'yes') { ?><img src="/styles/images/unlock.png" alt="unlock" class="float-end" width="50px">  <?php } else { ?><img src="/styles/images/lock.png" alt="unlock" class="float-end" width="50px">  <?php } ?>
<a class = 'btn btn-primary btn-sm' onclick="return sendajax('/app/dashboard/modals/pages/edit_page.php?slug=<?php echo SLUG; ?>');">Edit Page</a>
<a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/pages/add_sections.php?slug=<?php echo SLUG; ?>');">Add Sections</a>  
<BR><BR>
<label>Re-order sections by: Drag, drop and Save will set order for <?php echo SLUG; ?> page</label>
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('reorder_pages'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />
<input name="slug" type="hidden" value="<?php echo SLUG; ?>">



     <table class="table table-striped" align="center" border="0" cellspacing="0" cellpadding="0" id="sort">
            <thead>
                <tr>
                    <th width="95%">Name</th>
                    <th width="10%" class="actions">>></th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;
                $token =  generate_token();
                foreach ($sections as $section){ 
                ?>
                 <tr draggable='true' ondragstart='start()' ondragover='dragover()'>
                    <td><input type="hidden" name="rank[]" value="<?= $section['section_slug'] ?>"> <?= $section['section_name'] ?></td>
                    <td class="actions">
                        <a class = 'btn btn-danger btn-sm' onclick="return sendajax('/app/dashboard/modals/pages/remove_section.php?slug=<?php echo SLUG; ?>&section=<?= $section['section_slug'] ?>');">Remove</a> 
                    </td>
                </tr>
                <?php $i++;  } ?>

            </tbody>
        </table>
        <button class="btn btn-primary float-end" type="submit" id="btn">Save Order</button> 

</form>