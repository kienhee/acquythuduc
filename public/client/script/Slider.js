var swiper = new Swiper(".mySwiper", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + ' inline-block">' + "</span>";
    },
  },
});
// const images = [
//   { src: '/src/assets/images/banner_1.c41ce791.png' },
//   { src: '/src/assets/images/banner_2.b9dca191.png' },
//   { src: '/src/assets/images/banner_1.c41ce791.png' },
//   { src: '/src/assets/images/banner_2.b9dca191.png' }
// ]

// const renderSlideItem = (image, index) => {
//   return `<div class="swiper-slide">
//   <img class="w-full h-full" src="${image.src}" alt="ảnh ${index + 1}" />
// </div>`;
// }

// const renderSlileItems = () => {
//   let render = "";
//   images.forEach((image, index) => {
//     render += renderSlideItem(image, index);
//   })
//   let sliderId = document.getElementById('slider');
//   sliderId.innerHTML = render;
// }

// renderSlileItems();

