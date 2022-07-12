  <h1>Footer Section</h1>  
    <div class="row">
        <div class="col-md-12">
          <h3>Select colours for the following sections</h3>
            <BR>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=footerbg');" style="background-color:<?php echo $footerbg; ?>" >Footer Background</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=footertext');" style="background-color:<?php echo $footertext; ?>" >Footer Text</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=footerheadings');" style="background-color:<?php echo $footerheadings; ?>" >Footer Headings</a>
        </div>
    </div>
      <small>Default colours: Footer Background #113560; Footer Text: #FFF; Footer Headings: #FFF; </small>
      <BR<BR>
  <h1>Bottom Bar</h1>  
    <div class="row">
        <div class="col-md-12">
          <h3>Select colours for the following sections</h3>
            <BR>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=bottombarbg');" style="background-color:<?php echo $bottombarbg ?>" >Background Bottom Bar</a>
            <a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/dashboard/modals/colours.php?action=bottombartext');" style="background-color:<?php echo $bottombartext; ?>" >Bottom Bar Text</a>
        </div>
    </div>
    
<div class="mb-3">
  <small>Default colours: Bottom Bar background #2064b7; Bottom Bar Text: #113560; </small>
  <small style="color:red">Reset browser cache after each colour change to see the colour change <BR>
  (On PC: Ctrl + Shift + Delete -> Cached images and files -> Clear data)</small>
  <BR>
</div> 