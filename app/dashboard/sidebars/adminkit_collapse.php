<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="/dashboard">
					<span class="sidebar-brand-text align-middle">
						Dashboard
					</span>
				</a>


				<ul class="sidebar-nav">

					<li class="sidebar-item heading" id="se">
						<a data-bs-target="#setup" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<i class="align-middle" data-feather="settings"></i>  <span class="align-middle">Setup</span> 
						</a>
						<ul id="setup" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/business_settings">Business Settings</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/settings">Site Settings</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/social_settings">Social Settings</a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="/dashboard/terms">Terms &amp; Conditions</a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="/dashboard/privacy">Privacy Policy</a></li>
						</ul>
					</li>

          <li class="sidebar-item heading" id="cs">
						<a data-bs-target="#content" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<i class="align-middle" data-feather="grid"></i>  <span class="align-middle">Content</span> 
						</a>
						<ul id="content" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/sort_pages">Page Sections</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/images">Image Library</a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="/dashboard/logo">Chose a Logo</a></li>
						</ul>
					</li>

          <li class="sidebar-item heading" id="co">
						<a data-bs-target="#communication" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<i class="align-middle" data-feather="heart"></i>  <span class="align-middle">Communication</span> 
						</a>
						<ul id="communication" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/emails">Emails</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/contacts">Contacts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/mailinglists">Mailing Lists</a></li>
						</ul>
					</li>
          
          <li class="sidebar-item heading" id="de">
						<a data-bs-target="#design" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<i class="align-middle" data-feather="scissors"></i>  <span class="align-middle">Design</span> 
						</a>
						<ul id="design" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
							<li class="sidebar-item active"><a class="sidebar-link" href="/dashboard/colours">Change Colours</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/fonts">Change Fonts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/icons">Icons 1</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="/dashboard/bootstrapicons">Icons 2</a></li>
						</ul>
					</li>
				</ul>
		</nav>
<script>
$(document).ready(function() {
$("li.heading").click(function () {
    $(".heading").removeClass("active");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("active");   
});


$("ul li .sidebar-item").click(function () {
    $("ul li .sidebar-item").removeClass("active");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("active");   
});

});

$(document).ready(function() {

    $("li.sidebar-item").click(function(event) {
        //sessionStorage.setItem("menuitem",event.target.id); 
        if(event.target.id != ''){
          sessionStorage.menuitem = event.target.id;
        }
    });
    
    //id = sessionStorage.getItem("menuitem");
    id = 'se'
    var element = document.getElementById(id);
    element.classList.add("active");
    $("ul li .sidebar-item").removeClass("active");

});


</script>