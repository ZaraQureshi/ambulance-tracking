// const navSlide=()=>{
//   const burger=document.querySelector('.burger');
//   const nav=document.querySelector('.nav_content');
  
  
//       burger.addEventListener('click',()=>{
//       nav.classList.toggle('nav-active'); 
  
      
      
//       });
      
// }
// navSlide();

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
