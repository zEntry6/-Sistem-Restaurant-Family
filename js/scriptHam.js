// Toggle class active

const navbarNav = document.querySelector('.navbar-nav');

// ketika hamburger di click
document.querySelector('#Hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
};

// klick di luar sidebar untuk keluar

const hamburger = document.querySelector('#Hamburger-menu');

document.addEventListener('click', function(e){
 if(!hamburger.contains(e.target) && !navbarNav.contains(e.target)){
  navbarNav.classList.remove('active');
 }
});