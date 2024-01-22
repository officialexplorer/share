
/*スクロール時に反応*/

window.addEventListener("scroll",function(){
  const elm = document.getElementsByClassName("back");
  const scroll = this.window.pageYOffset;

  if(scroll>100){
      elm.classList.add("active");
  } else {
      elm.classList.remove("active");
  }
});