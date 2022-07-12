    <div class="row">
        <div class="col-md-12">
          <h3>Select colours for the following sections</h3>
            <BR>
            <a class = 'btn btn-primary btn-sm' onclick="return sendajax('/app/templates/tradesman/modals/sections/logobar_upload.php');">upload logo</a>
            <a class = 'btn btn-primary btn-sm' onclick="return sendajax('/app/templates/tradesman/modals/sections/logobar_hideshow.php');">hide/show</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=logobar');" style="background-color:<?php echo $logobar; ?>" >Background colour</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=logobar_teltime');" style="background-color:<?php echo $logobar_teltime; ?>" >Telephone Number & Time Colour</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=logobar_emaildays');" style="background-color:<?php echo $logobar_emaildays; ?>" >Email Number & Days Colour</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=logobar_iconcolours');" style="background-color:<?php echo $logobar_iconcolours; ?>" >Icon colours</a>
        </div>
    </div>
    
<div class="mb-3">
  <small>Default colours: Background colour #fff; Telephone Number & Time Colour: #343E49; Email Number & Days Colour: #6c8198; Icon colours: #2f7ddb; </small>
  <small style="color:red">Reset browser cache after each colour change to see the colour change <BR>
  (On PC: Ctrl + Shift + Delete -> Cached images and files -> Clear data)</small>
  <BR>
</div>

<h1>Logo</h1>

<img src="<?php echo IMAGEPATH.$setting['logo']; ?>" alt="logo" style="border-radius: <?php echo $setting['logoradius']; ?>%;"> 
