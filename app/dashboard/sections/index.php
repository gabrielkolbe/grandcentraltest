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

<a class = 'btn btn-primary btn-sm' onclick="return sendajax('/app/dashboard/modals/sections/add_section.php');">add section</a>
<BR><BR>
<label>Re-order sections by: Drag, drop and Save will set the order of display on the menu</label>
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('reorder_pages'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />



     <table class="table table-striped" align="center" border="0" cellspacing="0" cellpadding="0" id="sort">
            <thead>
                <tr>
                    <th width="30%">Name</th>
                    <th width="20%">Type</th>
                    <th width="10%">Show in</th>
                    <th width="30%">Menu</th>
                    <th width="10%" class="actions">>></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($sections as $section){ 
                ?>
                 <tr draggable='true' ondragstart='start()' ondragover='dragover()'>
                    <td><input type="hidden" name="rank[]" value="<?= $section['slug'] ?>">  <?= $section['name'] ?></td>
                    <td><?= $section['type'] ?></td> 
                    <td><?php if($section['displaymenu'] == 'yes') { ?><img src="/styles/images/unlock.png" alt="unlock" width="20px">  <?php } else { ?><img src="/styles/images/lock.png" alt="unlock" width="20px">  <?php } ?></td>
                    <td><?= $section['menu'] ?></td>
                    <td class="actions">
                        <a href="/dashboard/section_edit/<?= $section['slug'] ?>/<?= $section['type'] ?>" class="btn btn-warning btn-sm">edit</a>
                        <?php if($section['source'] == 'new') { ?><a class = 'btn btn-danger btn-sm' onclick="return sendajax('/app/dashboard/modals/sections/delete_section.php?slug=<?= $section['slug'] ?>');">Delete</a><?php } ?>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
        <button class="btn btn-primary float-end" type="submit" id="btn">Save Order</button> 
        <label>Default Section sets</label><BR><BR>
    <?php if(APP == 'workshop') { ?>
        <h3>SET A</h3>
        <h6>Promo A, What we do A, About A, What we offer A, Gallery A,Pricing A,Testimonials A, Map Contact A</h6> 
    <?php } ?>
    <?php if(APP == 'tradesman') { ?>
        <h6>Default order: Promo Slider, Services, Why, Reviews, About, Hiring, Projects, Shop, FAQ's, Contact</h6> 
    <?php } ?>    
</form> 
