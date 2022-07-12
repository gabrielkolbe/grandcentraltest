		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/dashboard">
          <span class="align-middle">Dashboard</span>
        </a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Setup
					</li>

					<li class="sidebar-item" id="a2">
						<a class="sidebar-link" href="/dashboard/business_settings"> 
                <i class="align-middle" data-feather="globe"></i> <span class="align-middle">Business Settings</span>
            </a>
					</li>


					<li class="sidebar-item" id="a3">
						<a class="sidebar-link" href="/dashboard/social_settings">
              <i class="align-middle" data-feather="wifi"></i> <span class="align-middle">Social Settings</span>
            </a>
					</li>

          
					<li class="sidebar-header">
						Content
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/dashboard/sections">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Sections</span>
            </a>
					</li>

          <li class="sidebar-item">
						<a class="sidebar-link" href="/dashboard/pages">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Pages</span>
            </a>
					</li>
          
          
					<li class="sidebar-item">
						<a class="sidebar-link" href="/dashboard/images">
              <i class="align-middle" data-feather="image"></i> <span class="align-middle">Image Library</span>
            </a>
					</li>
   
       		</ul>   
        <BR><BR><BR>
			</div>
		</nav>
<script>
$(document).ready(function() {

    $("li.sidebar-item").click(function(event) {
        //sessionStorage.setItem("menuitem",event.target.id);
        if(event.target.id != ''){
          sessionStorage.menuitem = event.target.id;
        }
    });
    
    id = sessionStorage.getItem("menuitem");
    var element = document.getElementById(id);
    element.classList.add("active");

});
</script>