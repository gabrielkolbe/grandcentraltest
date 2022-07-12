<style>
.menu_hide {
display:none;
}
</style>


<script>

'use strict';

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") {
  throw new Error("AdminLTE requires jQuery");
}


$.AdminLTE = {};


$(function () {
  //Easy access to options
  var o = $.AdminLTE.options;

  //Activate the layout maker
  $.AdminLTE.layout.activate();

  //Enable sidebar tree view controls
  $.AdminLTE.tree('.sidebar');

  $('.btn-group[data-toggle="btn-toggle"]').each(function () {
    var group = $(this);
    $(this).find(".btn").click(function (e) {
      group.find(".btn.active").removeClass("active");
      $(this).addClass("active");
      e.preventDefault();
    });

  });
});

/* ----------------------
 * - AdminLTE Functions -
 * ----------------------
 * All AdminLTE functions are implemented below.
 */

/* prepareLayout
 * =============
 * Fixes the layout height in case min-height fails.
 *
 * @type Object
 * @usage $.AdminLTE.layout.activate()
 *        $.AdminLTE.layout.fix()
 *        $.AdminLTE.layout.fixSidebar()
 */
$.AdminLTE.layout = {
  activate: function () {
    var _this = this;
    _this.fix();
    _this.fixSidebar();
    $(window, ".wrapper").resize(function () {
      _this.fix();
      _this.fixSidebar();
    });
  },
  fix: function () {
    //Get window height and the wrapper height
    var neg = $('.main-header').outerHeight() + $('.main-footer').outerHeight();
    var window_height = $(window).height();
    var sidebar_height = $(".sidebar").height();
    //Set the min-height of the content and sidebar based on the
    //the height of the document.
    if ($("body").hasClass("fixed")) {
      $(".content-wrapper, .right-side").css('min-height', window_height - $('.main-footer').outerHeight());
    } else {
      if (window_height >= sidebar_height) {
        $(".content-wrapper, .right-side").css('min-height', window_height - neg);
      } else {
        $(".content-wrapper, .right-side").css('min-height', sidebar_height);
      }
    }
  },
  fixSidebar: function () {
    //Make sure the body tag has the .fixed class
    if (!$("body").hasClass("fixed")) {
      if (typeof $.fn.slimScroll != 'undefined') {
        $(".sidebar").slimScroll({destroy: true}).height("auto");
      }
      return;
    } else if (typeof $.fn.slimScroll == 'undefined' && console) {
      console.error("Error: the fixed layout requires the slimscroll plugin!");
    }
    //Enable slimscroll for fixed layout
    if ($.AdminLTE.options.sidebarSlimScroll) {
      if (typeof $.fn.slimScroll != 'undefined') {
        //Distroy if it exists
        $(".sidebar").slimScroll({destroy: true}).height("auto");
        //Add slimscroll
        $(".sidebar").slimscroll({
          height: ($(window).height() - $(".main-header").height()) + "px",
          color: "rgba(0,0,0,0.2)",
          size: "3px"
        });
      }
    }
  }
};


/* Tree()
 * ======
 * Converts the sidebar into a multilevel
 * tree view menu.
 *
 * @type Function
 * @Usage: $.AdminLTE.tree('.sidebar')
 */
$.AdminLTE.tree = function (menu) {
  var _this = this;

  $("li a", $(menu)).click(function (e) {
    //Get the clicked link and the next element
    var $this = $(this);
    var checkElement = $this.next();

    //Check if the next element is a menu and is visible
    if ((checkElement.is('.nav_sidebar')) && (checkElement.is(':visible'))) {
      //Close the menu
      checkElement.slideUp('normal', function () {
        checkElement.removeClass('menu-open');
        //Fix the layout in case the sidebar stretches over the height of the window
        //_this.layout.fix();
      });
      checkElement.parent("li").removeClass("active");
    }
    //If the menu is not visible
    else if ((checkElement.is('.nav_sidebar')) && (!checkElement.is(':visible'))) {
      //Get the parent menu
      var parent = $this.parents('ul').first();
      //Close all open menus within the parent
      var ul = parent.find('ul:visible').slideUp('normal');
      //Remove the menu-open class from the parent
      ul.removeClass('menu-open');
      //Get the parent li
      var parent_li = $this.parent("li");

      //Open the target menu and add the menu-open class
      checkElement.slideDown('normal', function () {
        //Add the class active to the parent li
        checkElement.addClass('menu-open');
        parent.find('li.active').removeClass('active');
        parent_li.addClass('active');
        //Fix the layout in case the sidebar stretches over the height of the window
        _this.layout.fix();
      });
    }
    //if this isn't a link, prevent the page from being redirected
    if (checkElement.is('.nav_sidebar')) {
      e.preventDefault();
    }
  });
};

</script>

<div class="sidebar"  style="padding-left:20px; padding-right:20px">
 <nav class="sidebar-nav">
          <div class="sidebar-header">
            <div style="text-align:center; margin-top:5px; margin-bottom:0px;">
              <a href="/dashboard" class="Dashboard">LOGO</a>
           </div>
            <button class="nav-toggler nav-toggler-sm sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm">
              <span class="sr-only">Toggle nav</span>
            </button>
          </div>

          <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">

            <ul id="nav_sidebar" class="nav nav-pills nav-stacked">
              <li class=""><a href="#" class="subtitle"><i class="fa fa-fw fa-wrench"></i> Operations</a>
                  <ul class="nav_sidebar">
                    <li><a href="/dashboard/business_settings">Business Settings"</a></li>
                    <li><a href="/dashboard/settings">Site Settings"</a></li>
                  </ul>
                </li>
            
            </ul> 

          </div>
        </nav>
</div>