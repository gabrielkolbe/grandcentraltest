
 <style>
 /* Hamburger */
.hamburger {
  height: 10px;
  margin: 20px;
  justify-items: center;
  z-index: 120;
  text-align: right;
  float:right;
}

.hamburger div {
  background-color: rgb(61, 61, 61);
  position: relative;
  width: 30px;
  height: 2px;
  margin-top: 3px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}


#toggle {
  display: none;
}

#toggle:checked ~ .menu {
  height: 250px;
}


/* Menu */
.menu {
  width:10%;
  background-color: #1a1b29;
  margin: 20px;
  padding: 0;
  list-style: none;
  clear: both;
  text-align: right;
  height: 0px;
  overflow: hidden;
  transition: height .4s ease;
  z-index: 120;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  float:right;
  min-width: 140px;
}

.menu a:first-child {
  margin-top: 10px;
}

.menu a:last-child {
  margin-bottom: 20px;
}

nav .menu a{
  color: #fff;
    padding: 0;
    font-size: 12px;
    line-height: 20px;
    vertical-align: top;
    text-transform: uppercase;
    position: relative;
    display: block;
    padding: 20px 20px 0 20px;
    text-decoration: none;
    line-height: 20px;
}

</style>
<section class="p-menu1">
  <nav id="navbar" class="navigation" role="navigation">
    <input id="toggle" type="checkbox" />
    <label class="hamburger" for="toggle">
      <div class="top"></div>
      <div class="meat"></div>
      <div class="bottom"></div>
    </label>
  
    <nav class="menu">
      <a href="/">Home</a>
      <a href="jingmethod">The Jing Method</a>
      <a href="massage_therapy">Massage Therapy</a>
      <a href="group_pilates_classes">Group Pilates Classes</a>
      <a href="private_pilates_classes">Private Pilates Classes</a>
      <a href="oxford">Oxford</a>
      <a href="faringdon">Faringdon</a>
      <a href="carterton">Carterton</a>
    </nav>
         
</nav>
</section>      