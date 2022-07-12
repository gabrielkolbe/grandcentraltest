    <div class="row">
        <div class="col-md-12">
          <h3>Select colours for the following sections</h3>
            <BR>
            <a class = 'btn btn-primary btn-sm' onclick="return sendajax('/app/templates/tradesman/modals/sections/topbar_hideshow.php');">hide/show</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=topbar');" style="background-color:<?php echo $topbar ?>" >Background colour</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=topbar_font');" style="background-color:<?php echo $topbar_font; ?>" >Font colour</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=topbar_fonthover');" style="background-color:<?php echo $topbar_fonthover; ?>" >Font hover over colour</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=topbar_social');" style="background-color:<?php echo $topbar_social; ?>" >Colour Social Media Buttons</a>
        </div>
    </div>
    
<div class="mb-3">
  <small>Default colours: Background colour #2064b7; Font colour: #acc8e8; Font hover over colour: #ffffff; Colour Social Media Buttons: #2f7ddb; </small>
  <small style="color:red">Reset browser cache after each colour change to see the colour change <BR>
  (On PC: Ctrl + Shift + Delete -> Cached images and files -> Clear data)</small>
  <BR>
</div> 