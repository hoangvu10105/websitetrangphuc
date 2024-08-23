let navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick =()  =>{
   navbar.classList.add('active');
}

document.querySelector('#nav-close').onclick =()  =>{
    navbar.classList.remove('active');
 }

 let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick =()  =>{
   searchForm.classList.add('active');
}

document.querySelector('#close-search').onclick =()  =>{
   searchForm.classList.remove('active');
 }

 window.onscroll =() =>{
   navbar.classList.remove('active');

   if(window.scrollY > 0){
    document.querySelector('.header').classList.add('active');
   }else{
    document.querySelector('.header').classList.remove('active');
   }
 };

 window.onload =() =>{
  if(window.scrollY > 0){
   document.querySelector('.header').classList.add('active');
  }else{
   document.querySelector('.header').classList.remove('active');
  }
};


 var swiper = new Swiper(".home-slider", {
  loop:true,
  grabCursor:true,
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev",
   },
 });

 var swiper = new Swiper(".product-slider", {
  loop:true,
  grabCursor:true,
  spaceBetween:20,
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev",
   },
   breakpoints:{
    0:{
      slidesPerView:1,
    },
    640:{
      slidesPerView:2,
    },
    640:{
      slidesPerView:3,
    },
    640:{
      slidesPerView:4,
    },
   },
 });

 let countDate = new Date('Dec 20, 2023 10:10:00').getTime();

function CountDown (){

  let now = new Date().getTime();
  gap = countDate - now;
  let second = 1000;
  let minute = second * 60;
  let hour = minute * 60; 
  let day = hour * 24;

  let d = Math.floor(gap / (day));
  let h = Math.floor((gap % (day)) / (hour));
  let m = Math.floor((gap % (hour)) / (minute));
  let s = Math.floor((gap % (minute)) / (second));

  document.getElementById('day').innerText = d;
  document.getElementById('hour').innerText = h;
  document.getElementById('minute').innerText = m;
  document.getElementById('second').innerText = s;
}

setInterval(function(){
CountDown();
},1000)