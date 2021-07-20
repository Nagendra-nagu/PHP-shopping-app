var cl=document.getElementById('cl')
let btn_icon = "false";
cl.addEventListener('click',()=>{
 if(btn_icon==='false'){
     cl.classList.add('open')
     document.getElementById('nav-iconsid').style.transform='translate(0px,120px)';
     btn_icon='true'
 }else{
     cl.classList.remove('open')
     document.getElementById('nav-iconsid').style.transform='translate(200px,120px)';
     btn_icon='false'
 }
})
// ........................................
var swiper = new Swiper(".blog-slider", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    mousewheel: {
      invert: false,
    },
    // autoHeight: true,
    pagination: {
      el: ".blog-slider__pagination",
      clickable: true,
    },
  });
  