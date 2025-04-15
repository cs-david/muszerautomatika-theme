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
    navText: [
			'<span aria-label="' + 'Lépj az előző képre' + '">&#x2039;</span>',
			'<span aria-label="' + 'Lépj az következő képre' + '">&#x203a;</span>'
		],
    navElement: 'button type="button" aria-label="Képgaléria navigáció"',
  });
});

document.addEventListener('DOMContentLoaded', function() {

  // Cookie Banner

  const banner = document.getElementById('cookie-banner');
  const acceptBtn = document.getElementById('accept-cookies');

  if (!localStorage.getItem('cookiesAccepted')) {
    banner.style.display = 'block';
    banner.setAttribute('aria-hidden', 'false');
  }

  acceptBtn.addEventListener('click', () => {
    const expirationDate = new Date();
    expirationDate.setFullYear(expirationDate.getFullYear() + 1);
    localStorage.setItem('cookiesAccepted', JSON.stringify({ value: 'true', expires: expirationDate.toISOString() }));
    banner.style.display = 'none';
    banner.setAttribute('aria-hidden', 'true');
  });

  // Scroll to top button 

  const scrollToTopButton = document.querySelector('.jump-to-top');

  let scrollPosition = 0;
  const viewPortHeight = window.innerHeight;

  window.addEventListener('scroll', () => {
    scrollPosition = window.scrollY;

    if(scrollPosition > (viewPortHeight * 2)) {
      scrollToTopButton.style.opacity = (scrollPosition - viewPortHeight * 2) / viewPortHeight;
      scrollToTopButton.setAttribute("aria-hidden", "false");
      scrollToTopButton.disabled = false;
    } else { 
      scrollToTopButton.setAttribute("aria-hidden", "true");
      scrollToTopButton.disabled = true;
      scrollToTopButton.style.opacity = 0;
    }
  });

  // Product Image Gallery

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

    // Accordion

    const accordion = document.querySelectorAll('.accordion-section');

    if (accordion) {
    accordion.forEach((acc) => {
      acc.querySelector('.accordion-section-header').addEventListener('click', () => {
  
        const isActive = acc.querySelector('.accordion-section-header').classList.contains("expanded-accordion-section-header");

        accordion.forEach((allAcc) => {
          allAcc.querySelector('.accordion-section-header').classList.remove('expanded-accordion-section-header');
          allAcc.querySelector('.accordion-section-content').classList.remove('expanded-accordion-section-content');
        });

        if (!isActive) {
          acc.querySelector('.accordion-section-header').classList.toggle('expanded-accordion-section-header');
          acc.querySelector('.accordion-section-content').classList.toggle('expanded-accordion-section-content');
        }

      });
    });
  }

  // Product Category Menu
  
  const parentButtons = document.querySelectorAll('.has_subcat button');

    parentButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
          button.parentElement.classList.toggle('cat-open');
        });
    });

  // FOA filter

  const allProducts = document.querySelectorAll('.type-termek');

  const allFoaInput = document.querySelectorAll('.foa-item');

  const notFound = document.querySelector('.not-found-message');

  allFoaInput.forEach(input => {
    input.addEventListener('change', (e) => {
      let activeFoas = [];
      allFoaInput.forEach((input) => {
        if(input.checked) {
          activeFoas.push(input.value);
        }
      });

      if(activeFoas.length != 0) {
        allProducts.forEach(product => {
          product.classList.add('hide-product');
          product.setAttribute('aria-hidden', 'true'); 
        })
  
        activeFoas.forEach(product => {
          const hideThese = document.querySelectorAll('.alkalmazasi_teruletek-' + product);
          hideThese.forEach(hideit => {
            hideit.classList.remove('hide-product');
            hideit.setAttribute('aria-hidden', 'false'); 
          })
        })

      } else {
        allProducts.forEach(product => {
          product.classList.remove('hide-product');
          product.setAttribute('aria-hidden', 'false'); 
        })
      }

      document.getElementById("product-list").scrollIntoView({ behavior: "smooth" });

      let allVisibleProducts = document.querySelectorAll('.type-termek:not(.hide-product)');

      if(allVisibleProducts.length === 0) {
        notFound.classList.add('show-not-found');
        notFound.setAttribute('aria-hidden', 'false'); 
    } else {
        notFound.classList.remove('show-not-found');
        notFound.setAttribute('aria-hidden', 'true'); 
      }

      

    })
  })

});