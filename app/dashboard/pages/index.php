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

<a class = 'btn btn-primary btn-sm' onclick="return sendajax('/app/dashboard/modals/sections/add_page.php');">add page</a>
<BR><BR>
<label>Re-order pages by: Drag, drop and Save</label> <BR>
<small>Pages that are set as open will be displayed in the order they are here</small>
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('reorder_pages'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />



     <table class="table table-striped" align="center" border="0" cellspacing="0" cellpadding="0" id="sort">
            <thead>
                <tr>
                    <th width="30%">Name</th>
                    <th width="20%">Menu Name</th>
                    <th width="20%">Display in Menu</th>
                    <th width="20%">Link to</th>
                    <th width="10%" class="actions">>></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($pages as $page){ 
                ?>
                 <tr draggable='true' ondragstart='start()' ondragover='dragover()'>
                    <td><?= $page['name'] ?></td>
                    <td><?= $page['menu'] ?></td>
                    <td><input type="hidden" name="rank[]" value="<?= $page['slug'] ?>"> <?php if($page['displaymenu'] == 'yes') { ?><img src="/styles/images/unlock.png" alt="unlock" width="20px">  <?php } else { ?><img src="/styles/images/lock.png" alt="unlock" width="20px">  <?php } ?></td>
                    <td>/<?= $page['slug'] ?></td>
                    <td class="actions">
                        <a href="/dashboard/edit_page/<?= $page['slug'] ?>" class="btn btn-warning btn-sm">edit</a>
                        <?php if($page['source'] == 'new') { ?><a class = 'btn btn-danger btn-sm' onclick="return sendajax('/app/dashboard/modals/pages/delete_page.php?slug=<?= $page['slug'] ?>');">Delete</a><?php } ?>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
        <button class="btn btn-primary float-end" type="submit" id="btn">Save Order</button> 
</form> 

