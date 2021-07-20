console.log('hello');
// .................................................................

let Nav_main_container = document.getElementsByClassName("nav_container");
var scroll1=window.pageYOffset;
window.addEventListener("scroll", () => {
  var scroll2=window.pageYOffset;
  if (scroll1>scroll2) {
    Nav_main_container[0].style.visibility='visible'
  } else {
    Nav_main_container[0].style.visibility='hidden'  
  }
  scroll1=scroll2
});

// ..............................................................
window.onload=function(){
    // .............................................................
    let menu = document.getElementById("menu-icon-containerid");
    var temp = "true";
    menu.addEventListener("click", () => {
      let listitems = document.getElementsByClassName("list_items");
      var menu_icon = document.getElementById("menu_icon");
      if (temp === "true") {
        menu_icon.classList.add("open");
        temp = "false";
        // ...................................
        for (var i = 0; i < listitems.length; i++) {
          listitems[i].style.transform = "translate(0px)";
          listitems[i].style.height = "auto";
          listitems[i].style.width = "auto";
        }
      } else {
        menu_icon.classList.remove("open");
        temp = "true";
        // .................................
        for (var i = 0; i < listitems.length; i++) {
          listitems[i].style.transform = "translate(150px)";
          listitems[i].style.height = "0px";
          listitems[i].style.width = "0px";
        }
      }
    });
    // .................who we are..................................

}
