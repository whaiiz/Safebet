 /*
  **********************************************************
  * OPAQUE NAVBAR SCRIPT
  **********************************************************
  */

  // Toggle tranparent navbar when the user scrolls the page

  $(window).scroll(function() {
    if($(this).scrollTop() > 50)  /*height in pixels when the navbar becomes non opaque*/ 
    {
        $('.opaque-navbar').addClass('opaque');
    } else {
        $('.opaque-navbar').removsection
{
  background:yellow;
}
.banner
{
  background:red;
  min-height:200px;
}
.banner .row
{
  text-align:center;
  margin-top:50px;
}
.banner h1
{
  color:white;
}



/***********************************************************************
*  OPAQUE NAVBAR SECTION
***********************************************************************/
.opaque-navbar {
    background-color: rgba(0,0,0,0.5);
  /* Transparent = rgba(0,0,0,0) / Translucent = (0,0,0,0.5)  */
    height: 60px;
    border-bottom: 0px;
    transition: background-color .5s ease 0s;
}

.opaque-navbar.opaque {
    background-color: black;
    height: 60px;
    transition: background-color .5s ease 0s;
}

ul.dropdown-menu {
    background-color: black;
}


@media (max-width: 992px) {
  body
  {
    background:red;
  }
  .opaque-navbar {
    background-color: black;
    height: 60px;
    transition: background-color .5s ease 0s;
}

}



eClass('opaque');
    }
});