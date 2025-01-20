window.addEventListener('scroll', () => {
    const header = document.querySelector('.sticky-header');
  
    if (window.scrollY > 0) {
      header.classList.add('scrolling');
    } else {
      header.classList.remove('scrolling');
    }
  });

  const menuButton = document.querySelector("#menu-trigger");
  const menu = document.querySelector('.header-right');
  const menuIcon = menuButton.querySelector('i');

  menuButton.addEventListener('click', () => {
    menu.classList.toggle('mobile-menu-open');
    menuIcon.classList.toggle('fa-bars');
    menuIcon.classList.toggle('fa-close');
  });