if (window.innerWidth < 768) {
  const swiper = new Swiper(".swiper-container", {
    // Optional parameters
    loop: true,

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
} else {
  const swiper = new Swiper(".swiper-container", {
    // Optional parameters
    loop: true,

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}
