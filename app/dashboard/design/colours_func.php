<?php

if($postit == "adjust_colours") {
        
        $buttons= $_POST['buttons'];
        $buttons2= $_POST['buttons2'];
        $topbar= $_POST['topbar'];
        $logobar= $_POST['logobar'];
        $myservices= $_POST['myservices'];
        $whyus= $_POST['whyus'];
        $reviews= $_POST['reviews'];
        $about= $_POST['about'];
        $hiring= $_POST['hiring'];
        $projects =$_POST['projects'];
        $shop= $_POST['shop'];
        $faq= $_POST['faq'];
        $contact= $_POST['contact'];
        $bottomaddress= $_POST['bottomaddress'];
        $bottom= $_POST['bottom'];
        
        
        $update = [
          'buttons' => $buttons,
          'buttons2' => $buttons2,
          'topbar' => $topbar,
          'logobar' => $logobar,
          'myservices' => $myservices,
          'whyus' => $whyus,
          'reviews' => $reviews,
          'about' => $about,
          'hiring' => $hiring,
          'projects' => $projects,    
          'shop' => $shop,
          'faq' => $faq,
          'contact' => $contact,
          'bottomaddress' => $bottomaddress,
          'bottom' => $bottom,                  
        ];
      
        $sql = "UPDATE colours SET buttons=:buttons, buttons2=:buttons2, topbar=:topbar, logobar=:logobar, myservices=:myservices, whyus=:whyus, reviews=:reviews, 
        about=:about, hiring=:hiring, projects=:projects, shop=:shop, faq=:faq, contact=:contact, bottomaddress=:bottomaddress, bottom=:bottom";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);


$newcss = '
<style>

*/body {
    font-family: "Lato",  sans-serif;
    color: #343E49;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    padding-top: 50px;
}
h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
}
p {
    margin-bottom: 15px;
    line-height: 1.5;
}
a {
    color: '.$buttons.';
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    text-decoration: none;
}
a:hover, a:active {
    text-decoration: underline;
    color: #2370cd;
    text-decoration: underline;
}
a:focus {
    text-decoration: none;
    color: #2370cd;
    outline: none;
}
.btn, a.btn {
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    font-weight: 700;
    padding: 8px 20px;
}
.btn:hover, a.btn:hover {
    text-decoration: none;
}
.btn:focus, a.btn:focus {
    box-shadow: none;
}
a.btn-cta, .btn-cta {
    font-size: 16px;
    padding: 12px 25px;
    padding-top: 13px;
    font-weight: 900;
}
a.btn-theme-primary, .btn-theme-primary {
    background: '.$buttons2.';
    border: none;
    color: #fff;
}
a.btn-theme-primary:hover, a.btn-theme-primary:active, a.btn-theme-primary:focus, .btn-theme-primary:hover, .btn-theme-primary:active, .btn-theme-primary:focus {
    background: #00af51;
    border: none;
    color: #fff;
    outline: none;
}
a.btn-theme-secondary, .btn-theme-secondary {
    background: '.$buttons.';
    border: none;
    color: #fff;
}
a.btn-theme-secondary:hover, a.btn-theme-secondary:active, a.btn-theme-secondary:focus, .btn-theme-secondary:hover, .btn-theme-secondary:active, .btn-theme-secondary:focus {
    background: #2370cd;
    border: none;
    color: #fff;
    outline: none;
}
.form-control {
    box-shadow: none;
    height: 45px;
    border-color: #ccc;
    font-size: 16px;
}
.form-control::-webkit-input-placeholder {
    color: #ccc;
}
.form-control:-moz-placeholder {
    color: #ccc;
}
.form-control::-moz-placeholder {
    color: #ccc;
}
.form-control:-ms-input-placeholder {
    color: #ccc;
}
.form-control:focus {
    border-color: #bfbfbf;
    box-shadow: none;
}
textarea.form-control {
    height: auto;
}
input[type="text"], input[type="email"], input[type="password"], input[type="submit"], input[type="button"], textarea {
    -moz-appearance: none;
    appearance: none;
    -webkit-appearance: none;
}
.form-group {
    margin-bottom: 30px;
}
#back-to-top {
    background-color: '.$topbar.';
    color: #fff;
    text-align: center;
    display: inline-block;
    z-index: 30;
    width: 36px;
    height: 36px;
    border-radius: 2px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
}
#back-to-top:hover {
    background: #1c59a2;
    color: #fff;
}
#back-to-top svg {
    margin-top: 5px;
}
.carousel-fade .carousel-item {
    opacity: 0.5;
    transition: opacity .75s ease-in-out;
}
.carousel-fade .carousel-item.active {
    opacity: 1;
    display: block;
}
.carousel-indicators {
    bottom: 30px;
    margin-bottom: 0;
}
.carousel-indicators li {
    background-color: rgba(255, 255, 255, 0.2);
    border: none;
    width: 10px;
    height: 10px;
    margin: 0;
    margin-right: 10px;
    border-radius: 50%;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
}
.carousel-indicators li.active {
    background-color: rgba(0, 0, 0, 0.5);
    width: 11px;
    height: 11px;
    margin: 0;
    margin-right: 10px;
}
.carousel-indicators li:last-child {
    margin-right: 0;
}
.section {
    padding-top: 70px;
    padding-bottom: 70px;
    
}

#shop {
    background-color: '.$shop.';
}

#services {
    background-color: '.$myservices.';
}


.section-title {
    margin-top: 0;
    margin-bottom: 30px;
    font-weight: 800;
    font-size: 28px;
    max-width: 760px;
    margin-left: auto;
    margin-right: auto;
}
.section-intro {
    margin-top: 0;
    margin-bottom: 60px;
    font-size: 16px;
    max-width: 760px;
    margin-left: auto;
    margin-right: auto;
}
.blueimp-gallery>a.next, .blueimp-gallery>a.prev {
    color: #fff !important;
}
.topbar {
    background: '.$topbar.';
    color: #fff;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 20;
}
.topbar.topbar-scrolled {
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
}
.topbar .social-container {
    position: absolute;
    right: 30px;
    top: 9px;
}
.topbar .social-list {
    margin-bottom: 0;
}
.topbar .social-item a {
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background: rgba(255, 255, 255, 0.2);
    text-align: center;
    padding-top: 4px;
}
.topbar .social-item a .svg-inline--fa {
    color: rgba(255, 255, 255, 0.8);
}
.topbar .social-item a:hover {
    background: rgba(255, 255, 255, 0.2);
}
.topbar .social-item a:hover .fa {
    color: #fff;
}
.branding {
    padding-top: 75px;
    padding-bottom: 30px;
    background: '.$logobar.';
}
h1.logo {
    margin: 0;
    display: inline-block;
}
h1.logo img {
    vertical-align: inherit;
}
.header-info-list {
    margin-bottom: 0;
    margin-top: 5px;
}
.header-info-list .info-item {
    position: relative;
    padding-left: 42px;
    line-height: 1.2;
    margin-right: 30px;
}
.header-info-list .info-item:last-child {
    margin-right: 0;
}
.header-info-list .info-item a {
    color: #343E49;
}
.header-info-list .info-main {
    display: block;
    color: #343E49;
    font-weight: bold;
    font-size: 16px;
}
.header-info-list .info-main a {
    color: #343E49;
}
.header-info-list .info-sub {
    display: block;
    color: #6c8198;
    font-size: 14px;
}
.header-info-list .info-sub a {
    color: #6c8198;
}
.header-info-list .custom-icon {
    font-size: 34px;
    position: absolute;
    left: 0;
    top: 0;
    color: '.$buttons.';
}
.navbar {
    padding: 0;
    min-height: 50px;
}
.navbar-toggler {
    margin-right: 0;
    margin-top: 0;
    background: none;
    position: relative;
    margin-top: 8px;
    margin-bottom: 10px;
    text-align: right;
    border: none;
    padding: 0;
    position: absolute;
    top: 2px;
    right: 0;
}
.navbar-toggler:focus {
    outline: none;
    box-shadow: none;
}
.navbar-nav {
    font-weight: bold;
    min-height: 50px;
}
.main-nav .nav-link {
    color: rgba(255, 255, 255, 0.7);
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 10px 0;
    margin-right: 15px;
}
.main-nav .nav-link:focus, .main-nav .nav-link:hover {
    background: none;
    outline: none;
    text-decoration: none;
}
.main-nav .nav-item.active .nav-link {
    color: #fff;
}
.footer {
    background-color: '.$bottomaddress.';
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
}
.footer a {
    color: rgba(255, 255, 255, 0.7);
}
.footer a:hover {
    color: #fff;
}
.footer .col-title {
    font-size: 18px;
    color: #fff;
    margin-top: 0;
    margin-bottom: 20px;
}
.footer .social-item {
    font-size: 16px;
}
.footer .social-item a {
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background: rgba(255, 255, 255, 0.1);
    text-align: center;
    padding-top: 4px;
}
.footer .social-item a .fa {
    color: rgba(255, 255, 255, 0.8);
}
.footer .social-item a:hover {
    background: rgba(255, 255, 255, 0.2);
}
.footer .social-item a:hover .fa {
    color: #fff;
}
.footer-col {
    padding: 0 30px;
    margin-bottom: 30px;
}
.footer-col .business-hours-list li {
    margin-bottom: 10px;
}
.footer-col .intro {
    margin-bottom: 15px;
}
.footer-contact-list .item {
    position: relative;
    margin-bottom: 15px;
    padding-left: 32px;
}
.footer-contact-list .custom-icon {
    position: absolute;
    font-size: 22px;
    color: #fff;
    left: 0;
}
.footer-main {
    padding-bottom: 60px;
    padding-top: 60px;
}
.bottombar {
    background-color: '.$topbar.';
    padding-top: 15px;
    padding-bottom: 15px;
    color: rgba(255, 255, 255, 0.4);
}
.bottombar a {
    color: rgba(255, 255, 255, 0.4);
}
.bottombar a:hover {
    color: #fff;
}
.copyright {
    font-size: 13px;
}
.footer-menu {
    margin-top: 15px;
    margin-bottom: 0;
}
.footer-menu li {
    margin-bottom: 5px;
}
.footer-menu li:last-child {
    margin-bottom: 0;
}
.footer-menu a {
    color: rgba(255, 255, 255, 0.3);
}
.promo-section {
    position: relative;
}

.services-section .item {
    margin-bottom: 60px;
}
.services-section .item-inner {
    padding: 0 15px;
    height: 100%}
.services-section .item-title {
    color: #113560;
    margin-top: 0;
    margin-bottom: 15px;
    font-size: 18px;
}
.services-section .custom-icon {
    margin-bottom: 15px;
    display: inline-block;
    color: '.$buttons.';
    font-size: 68px;
}
.services-section .cta-area {
    margin-top: 45px;
}
.why-section {
    background: '.$whyus.';
    color: #fff;
}
.why-section .section-title {
    margin-bottom: 30px;
}
.reasons {
    max-width: 600px;
}
.reasons .fa-check {
    color: #00c85d;
}
.reasons .item {
    margin-bottom: 30px;
}
.reasons .item-title {
    font-size: 20px;
}
.reasons .item-desc {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
}
.badges-list {
    margin-top: 60px;
}
.badges-list .badge-item {
    margin-right: 30px;
    margin-bottom: 30px;
}
.badges-list .badge-item:last-child {
    margin-right: 0;
}
.badges-list img {
    max-height: 90px;
    vertical-align: middle;
}
.reviews-section {
    background: '.$reviews.';
    color: #fff;
}
.reviews-section .rating {
    margin-bottom: 15px;
}
.reviews-section .rating .svg-inline--fa {
    color: #FEB415;
}
.reviews-section .customer-profile {
    display: inline-block;
    margin: 0 auto;
    width: 60px;
    height: 60px;
    margin-bottom: 10px;
}
.reviews-section .inner {
    padding: 30px;
}
.reviews-section .quote {
    border-left: none;
    padding: 0;
    font-size: 14px;
    position: relative;
    padding-left: 20px;
    text-align: left;
}
.reviews-section .quote .svg-inline--fa {
    position: absolute;
    left: -8px;
    color: rgba(255, 255, 255, 0.6);
    color: rgba(0, 0, 0, 0.4);
    font-size: 18px;
}
.reviews-section .source {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.8);
}
.reviews-section .source a {
    color: rgba(255, 255, 255, 0.8);
}
.reviews-section .source a:hover {
    color: #fff;
}
.tns-nav {
    display: block;
    margin-top: 1rem;
    position: absolute;
    text-align: center;
    width: 100%}
.tns-nav button {
    width: 9px;
    height: 9px;
    padding: 0;
    margin: 0 5px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.4);
    border: 0;
}
.tns-nav button.tns-nav-active {
    background: rgba(255, 255, 255, 0.6);
}
.tns-nav button:focus {
    outline: none;
}
.about-section {
        background: '.$about.';
}
.about-desc {
    max-width: 720px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 30px;
}
.about-figure {
    max-width: 720px;
    margin-left: auto;
    margin-right: auto;
}
.callout-section {
    background: '.$hiring.';
    color: #fff;
    padding-top: 45px;
    padding-bottom: 45px;
}
.callout-section .section-title {
    margin-bottom: 5px;
}
.callout-btn {
    margin-top: 15px;
}
.projects-section {
    background: '.$projects.';
}
.projects-section .sub-title {
    font-size: 20px;
    margin-top: 0;
    margin-bottom: 30px;
}
.projects-section .item-inner {
    padding: 15px;
}
.projects-section .project-item {
    position: relative;
    height: 360px;
    overflow: hidden;
}
.projects-section .project-item:hover .info-mask {
    margin-top: 0;
}
.projects-section .info-mask {
    position: absolute;
    display: block;
    width: 100%;
    height: 360px;
    background: #fff;
    margin-top: 280px;
    -webkit-transition: margin-top 0.4s ease-in-out;
    -moz-transition: margin-top 0.4s ease-in-out;
    -ms-transition: margin-top 0.4s ease-in-out;
    -o-transition: margin-top 0.4s ease-in-out;
}
.projects-section .info-mask .mask-inner {
    position: relative;
    padding: 30px;
    height: 360px;
}
.projects-section .info-mask span {
    display: block;
}
.projects-section .info-mask .title {
    font-weight: bold;
    margin: 0;
    font-size: 18px;
    padding-bottom: 30px;
}
.projects-section .info-mask .desc {
    margin-bottom: 15px;
    font-size: 14px;
}
.projects-section .info-mask .link {
    position: absolute;
    display: block;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}
.projects-section .img-holder {
    position: absolute;
    width: 100%;
    height: 360px;
}

.latest-projects {
    margin-bottom: 60px;
}
.photos-wrapper .item {
    margin-bottom: 15px;
}
.photos-wrapper .item a {
    display: inline-block;
    background: #113560;
    max-width: 100%;
    overflow: hidden;
}
.photos-wrapper .item a img {
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
}
.photos-wrapper .item a img:hover {
    -webkit-opacity: .7;
    -moz-opacity: .7;
    opacity: .7;
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -ms-transform: scale(1.05);
    -o-transform: scale(1.05);
}
.shop-section .products .item {
    margin-bottom: 30px;
}
.shop-section .products .item-inner {
    position: relative;
}
.shop-section .product-info {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 0;
    left: 0;
    padding: 15px;
}
.shop-section .product-info:hover .product-title {
    padding-top: 40px;
}
.shop-section .product-info:hover .product-desc {
    -webkit-opacity: 1;
    -moz-opacity: 1;
    opacity: 1;
}
.shop-section .product-info-inner {
    position: relative;
    width: 100%;
    height: 100%}
.shop-section .product-link {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
}
.shop-section .product-title {
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    margin-top: 0;
    margin-bottom: 10px;
    padding-top: 50px;
    font-weight: 900;
    font-size: 18px;
}
.shop-section .product-desc {
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    font-size: 14px;
    -webkit-opacity: 0;
    -moz-opacity: 0;
    opacity: 0;
    font-weight: bold;
}
.shop-section .btn-store {
    margin-top: 30px;
    margin-bottom: 30px;
}
.faq-section {
    background-color: '.$faq.';
}
.faq-section .section-title {
    margin-bottom: 60px;
}
.faq-section .accordion-item {
    box-shadow: none;
    border: none;
    background: #fff;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
}
.faq-section .accordion-button {
    text-decoration: none;
    padding: 0;
    color: #343E49;
    background: none;
    box-shadow: none;
}
.faq-section .accordion-button:after {
    display: none;
}
.faq-section .accordion-header {
    font-size: 18px;
    margin-bottom: 0;
    position: relative;
    padding-left: 30px;
}
.faq-section .accordion-header .fa-question-circle {
    position: absolute;
    left: 5px;
    top: 3px;
    color: #343E49;
}
.faq-section .accordion-header a {
    color: #2f7ddb;
}
.faq-section .accordion-body {
    font-size: 16px;
    padding: 30px;
    padding-top: 15px;
}
.contact-section {
    background-color: '.$contact.';
    color: #fff;
    padding-top: 90px;
    padding-bottom: 90px;
}
.contact-section .contact-title {
    margin-top: 0;
    margin-bottom: 30px;
}
.contact-intro {
    max-width: 760px;
    margin: 0 auto;
    margin-bottom: 30px;
}
.contact-form {
    max-width: 760px;
    padding: 60px;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    margin: 0 auto;
    margin-bottom: 30px;
}
.contact-info-list {
    margin-bottom: 30px;
    margin-bottom: 45px;
}
.contact-info-list .custom-icon {
    width: 46px;
    height: 46px;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 50%;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    display: inline-block;
    margin: 0 auto;
    color: #fff;
    font-size: 24px;
    margin-bottom: 15px;
    font-weight: 600;
    padding-top: 10px;
}
.contact-info-list .info {
    display: block;
}
.contact-info-list .item {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    margin-right: 30px;
    line-height: 1.2;
    font-size: 16px;
}
.contact-info-list .item:last-child {
    margin-right: 0;
}
.contact-info-list a {
    color: #fff;
}
.contact-form label.error {
    font-size: 14px;
    font-family: "Lato",  sans-serif;
    color: #CD3D2B;
    margin-top: 5px;
}
@media (max-width: 767px) {
    .topbar .social-container {
    right: inherit;
    left: 15px;
}
.topbar .navbar-collapse {
    margin-top: 50px;
}
.navbar-expand-md .navbar-nav {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}
.branding {
    text-align: center;
}
h1.logo {
    float: none !important;
    text-align: center;
    margin-bottom: 30px;
    display: block;
}
h1.logo img {
    margin: 0 auto;
}
.header-info-list {
    margin: 0 auto;
    float: none !important;
    text-align: left;
    display: inline-block;
}
.header-info-list .custom-icon {
    font-size: 26px;
}
.header-info-list .info-item {
    display: block;
    margin-bottom: 15px;
    margin-right: 0;
    padding-left: 34px;
}
.contact-form {
    padding: 0px;
    background: none;
}
.footer-col {
    margin-bottom: 30px;
}
.footer-col:last-child {
    margin-bottom: 0;
}
}@media (min-width: 768px) {
    .modal-dialog {
    width: 80%}
.nav>li>a {
    margin-right: 0px;
}
.navbar-expand-md .navbar-nav .nav-link {
    padding-top: 16px;
}
}@media (min-width: 992px) {
    .nav>li>a {
    margin-right: 15px;
}
}body {
    overflow-x: hidden;
}
.config-trigger {
    position: absolute;
    top: 30px;
    left: -36px;
    width: 36px;
    height: 36px;
    background: #222;
    color: #fff;
    text-align: center;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -webkit-border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 0;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    text-decoration: none;
}
.config-trigger:hover {
    background: #000;
    text-decoration: none;
}
.config-trigger:hover .svg-inline--fa {
    color: #fff;
}
.config-trigger .svg-inline--fa {
    font-size: 20px;
    margin-top: 7px;
    display: block;
    color: rgba(255, 255, 255, 0.8);
}
.config-panel {
    position: fixed;
    top: 160px;
    z-index: 1000;
    width: 190px;
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
}
.config-panel.config-panel-open {
    right: 0;
}
.config-panel.config-panel-hide {
    right: -190px;
}
.config-panel .panel-inner {
    position: relative;
    background: #222;
    color: #fff;
    padding: 15px;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -webkit-border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 0;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
}
.config-panel .panel-title {
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 14px;
    text-transform: uppercase;
}
.config-panel label {
    color: #fff;
}
.config-panel #color-options {
    margin-bottom: 0px;
}
.config-panel #color-options li a {
    display: block;
    width: 40px;
    height: 20px;
    border: 2px solid transparent;
    margin-bottom: 10px;
}
.config-panel #color-options li a:hover {
    -webkit-opacity: .9;
    -moz-opacity: .9;
    opacity: .9;
    border: 2px solid rgba(255, 255, 255, 0.8);
}
.config-panel #color-options li.active a {
    border: 2px solid #fff;
}
.config-panel #color-options li.theme-1 a {
    background: #2f7ddb;
}
.config-panel #color-options li.theme-2 a {
    background-color: #53B153;
}
.config-panel #color-options li.theme-3 a {
    background-color: #4E7EAC;
}
.config-panel #color-options li.theme-4 a {
    background-color: #48B7B8;
}
.config-panel #color-options li.theme-5 a {
    background-color: #A06081;
}
.config-panel #color-options li.theme-6 a {
    background-color: #8A7247;
}
.config-panel .close {
    position: absolute;
    right: 5px;
    top: 5px;
    color: #fff;
}
.config-panel .close .svg-inline--fa {
    color: #fff;
    font-size: 18px;
}
</style>';

$css_file = $_SERVER["DOCUMENT_ROOT"].'/'.APP."/css/theme.css";

unlink($css_file);
$newfile = fopen($css_file, "w") or die("Unable to open file!");
fwrite($newfile, $newcss);
fclose($newfile);

        $_SESSION['message']="The colours has been updated";
    
    
     }


    $find = $db->prepare("SELECT * FROM colours");
    $find->execute();
    $colours = $find->fetch();
    
    
?>