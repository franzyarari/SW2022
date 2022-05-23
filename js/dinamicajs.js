

//________________________________________________________ Cambio de bar header nav menu principal fondo__________________________________________________
   
     let nav = document.getElementById('MEB');

      function mifuncion(sw){
        var pic;

        let Desplazamiento = window.pageYOffset;

          if (Desplazamiento >=40){
      
              nav.classList.remove('bg-one-nav');
              nav.className = ('bg-two-nav');
              nav.style.transition = '0.5s';
              pic = "img/logostsb.png";
          }
      
         else{
              nav.classList.remove('bg-two-nav');
              nav.className = ('bg-one-nav');
              nav.style.transition = '0.5s';
              pic = "img/logostsb.png";
          }
          document.getElementById("logo").src = pic;
      }
    //   /////////////sfd
 window.addEventListener('load', function(){
    mifuncion();
  });
      
window.addEventListener('scroll',function(){
      mifuncion();
     });


// _______________________________________________________________________________________Slider Cambiar Automatico_____________________________________________________
if(document.querySelector('#container-slider')){
  setInterval('fntExecuteSlide("next")',9000);
}
//------------------------------ LIST SLIDER -------------------------
if(document.querySelector('.listslider')){
  let link = document.querySelectorAll(".listslider li a");
  link.forEach(function(link) {
     link.addEventListener('click', function(e){
        e.preventDefault();
        let item = this.getAttribute('itlist');
        let arrItem = item.split("_");
        fntExecuteSlide(arrItem[1]);
        return false;
     });
   });
}

function fntExecuteSlide(side){
   let parentTarget = document.getElementById('slider');
   let elements = parentTarget.getElementsByTagName('li');
   let curElement, nextElement;

   for(var i=0; i<elements.length;i++){

       if(elements[i].style.opacity==1){
           curElement = i;
           break;
       }
   }
   if(side == 'prev' || side == 'next'){

       if(side=="prev"){
           nextElement = (curElement == 0)?elements.length -1:curElement -1;
       }else{
           nextElement = (curElement == elements.length -1)?0:curElement +1;
       }
   }else{
       nextElement = side;
       side = (curElement > nextElement)?'prev':'next';

   }
   //RESALTA LOS PUNTOS
   let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
   elementSel[curElement].classList.remove("item-select-slid");
   elementSel[nextElement].classList.add("item-select-slid");
   elements[curElement].style.opacity=0;
   elements[curElement].style.zIndex =0;
   elements[nextElement].style.opacity=1;
   elements[nextElement].style.zIndex =1;
}