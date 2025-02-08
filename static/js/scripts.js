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

jQuery(document).ready(function($) {
  $(".owl-carousel").owlCarousel({
    loop: true,
    items: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    itemElement: "figure",
  });
});

  document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.querySelector('.featured-img');
    const thumbnails = document.querySelectorAll('.product-card-gallery img');

    if(mainImage && thumbnails.length > 0) {
      thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener('click', () => {
          const src = thumbnail.getAttribute('src');
          document.querySelector('.current-gallery-item').classList.remove('current-gallery-item');
          mainImage.setAttribute('src', src);
          thumbnail.classList.add('current-gallery-item');
        });
      });
    }

    const productName = document.querySelector('.product-name');
    const subjectField = document.querySelector('#contact-form input[name="your-subject"]');
    const formTitle = document.querySelector('#contact-form h2');

    if(productName && subjectField) {
      formTitle.innerHTML = formTitle.textContent + '<span>' + productName.textContent + '</span>';
      subjectField.value = formTitle.textContent;
    }

  });