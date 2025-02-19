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
    nav:true,
    autoplay: true,
    autoplaySpeed: 3000,
    autoplayHoverPause: true,
    itemElement: "figure",
    navContainer: ".my-nav",
    dotsContainer: ".my-dots",
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
    const accordion = document.querySelectorAll('.accordion-section');

    if (accordion) {
    accordion.forEach((acc) => {
      acc.querySelector('.accordion-section-header').addEventListener('click', () => {
  
        const isActive = acc.querySelector('.accordion-section-header').classList.contains("expanded-accordion-section-header");

        // Close all panels
        accordion.forEach((allAcc) => {
          allAcc.querySelector('.accordion-section-header').classList.remove('expanded-accordion-section-header');
          allAcc.querySelector('.accordion-section-content').classList.remove('expanded-accordion-section-content');
        });

        // Toggle current panel
        if (!isActive) {
          acc.querySelector('.accordion-section-header').classList.toggle('expanded-accordion-section-header');
          acc.querySelector('.accordion-section-content').classList.toggle('expanded-accordion-section-content');
        }

      });
    });
  }
    const parentButtons = document.querySelectorAll('.has_subcat button');

    parentButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
          button.parentElement.classList.toggle('cat-open');
        });
    });

  });