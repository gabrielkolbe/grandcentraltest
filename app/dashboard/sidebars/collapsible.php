<style>
.bi {
  vertical-align: -.125em;
  pointer-events: none;
  fill: currentColor;
}

.dropdown-toggle { outline: 0; }

.nav-flush .nav-link {
  border-radius: 0;
}

.btn-toggle {
  display: inline-flex;
  align-items: center;
  padding: .25rem .5rem;
  font-weight: 600;
  color: rgba(0, 0, 0, .65);
  background-color: transparent;
  border: 0;
}
.btn-toggle:hover,
.btn-toggle:focus {
  color: rgba(0, 0, 0, .85);
  background-color: #d2f4ea;
}

.btn-toggle::before {
  width: 1.25em;
  line-height: 0;
  content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
  transition: transform .35s ease;
  transform-origin: .5em 50%;
}

.btn-toggle[aria-expanded="true"] {
  color: rgba(0, 0, 0, .85);
}
.btn-toggle[aria-expanded="true"]::before {
  transform: rotate(90deg);
}

.btn-toggle-nav a {
  display: inline-flex;
  padding: .1875rem .5rem;
  margin-top: .125rem;
  margin-left: 1.25rem;
  text-decoration: none;
}
.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
  background-color: #d2f4ea;
}

.scrollarea {
  overflow-y: auto;
}

.fw-semibold { font-weight: 600; }
.lh-tight { line-height: 1.25; }

 .highlight {
  background-color: #d2f4ea;
 }
</style>

    <div class="flex-shrink-0 p-3 bg-white" >
    <a href="/dashboard" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-5 fw-semibold">Menu</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="<?php if(SIDEBAR == 'setup') { echo 'true'; } else {  echo 'false';} ?>">
          Setup
        </button>
        <div class="collapse <?php if(SIDEBAR == 'setup') { echo 'show'; } ?>" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/dashboard/business_settings" class="link-dark rounded" id="a1">Business Settings</a></li>
            <li><a href="/dashboard/settings" class="link-dark rounded" id="a2">Site Settings</a></li>
            <li><a href="/dashboard/social_settings" class="link-dark rounded" id="a3">Social Settings</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="<?php if(SIDEBAR == 'content') { echo 'true'; } else {  echo 'false';} ?>">
          Content
        </button>
        <div class="collapse <?php if(SIDEBAR == 'content') { echo 'show'; } ?>" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/dashboard/pages" class="link-dark rounded"  id="b1">Page Sections</a></li>
            <li><a href="/dashboard/sort_pages" class="link-dark rounded"  id="b2">Page Order</a></li>
            <li><a href="/dashboard/images" class="link-dark rounded" id="b3">Image Library</a></li>
            <li><a href="/dashboard/images_add" class="link-dark rounded" id="b4">Add Image</a></li>
            <li><a href="/dashboard/logo" class="link-dark rounded" id="b5">Choose logo</a></li>
          </ul>
        </div>
      </li>


      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="<?php if(SIDEBAR == 'communication') { echo 'true'; } else {  echo 'false';} ?>">
          Communication
        </button>
        <div class="collapse <?php if(SIDEBAR == 'communication') { echo 'show'; } ?>" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/dashboard/emails" class="link-dark rounded" id="c1">Emails</a></li>
            <li><a href="/dashboard/contacts" class="link-dark rounded" id="c2">Contacts</a></li>
            <li><a href="/dashboard/mailinglists" class="link-dark rounded" id="c2">Mailing Lists</a></li>
          </ul>                                      
        </div>
      </li>
      
        <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="<?php if(SIDEBAR == 'design') { echo 'true'; } else {  echo 'false';} ?>">
          Design
        </button>
        <div class="collapse <?php if(SIDEBAR == 'design') { echo 'show'; } ?>" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/dashboard/icons" class="link-dark rounded" id="d1">Icons</a></li>
            <li><a href="/dashboard/bootstrapicons" class="link-dark rounded" id="d2">Bootstrap Icons</a></li>
          </ul>                                      
        </div>
      </li>
    </ul>
  </div>
  
  <script>
  
  /* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

$(document).ready(function() {

    $("a").click(function(event) {
        //sessionStorage.setItem("menuitem",event.target.id);
        if(event.target.id != ''){
          sessionStorage.menuitem = event.target.id;
        }
    });
    
    id = sessionStorage.getItem("menuitem");
    var element = document.getElementById(id);
    element.classList.add("highlight");

});


</script>