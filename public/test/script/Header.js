// import { getCurrentUrl } from "../utils/utils.js";

// // const basicUrl = "http://127.0.0.1:5500/src/pages";

// const routers = [
//   {
//     title: "TRANG CHỦ",
//     link: "/",
//   },
//   {
//     title: "SẢN PHẨM",
//     link: "/src/pages/products.html",
//   },
//   {
//     title: "TIN TỨC",
//     link: "/src/pages/services.html",
//   },
//   {
//     title: "LIÊN HỆ",
//     link: "/src/pages/contact.html",
//   },
// ]

// const routerRender = (router) => {
//   if (!router) return 'Error No Router'
//   // let result = getCurrentUrl().substring()
//   let active = router.link === getCurrentUrl();
//   if (active) {
//     return `<li
//     class="page relative s-phone:!text-[12px] tablet:text-sm desktop:text-lg nav-item group cursor-pointer laptop:text-sm s-laptop:text-sm text-xl font-semibold text-[#895609] mx-0 m-0 duration-200 nav-normal">
//     ${router.title}
//   </li>`
//   }
//   return `<li
//     class="page s-phone:!text-[12px] relative tablet:text-sm desktop:text-lg nav-item group cursor-pointer s-laptop:text-sm laptop:text-sm text-xl font-semibold text-white mx-0 m-0 duration-200 nav-normal">
//     <a class="block" href=${router.link} >  ${router.title}</a>
//     <div
//       class="w-0 group-hover:w-[80%] h-[3px] absolute bottom-0 transform left-1/2 -translate-x-1/2 bg-white ease-in-out duration-150 -mb-1">
//     </div>
//   </li>`
// }

// const routersRender = () => {
//   let render = '';
//   routers.forEach(router => {
//     render += routerRender(router);
//   })
//   const routersId = document.getElementById('routers');
//   routersId.innerHTML = render;

// }

// routersRender();

const setFixedHeader = () => {
    window.onscroll = () => {
        let isFixedHeader = window.scrollY > 20;
        let headerId = document.getElementById("header");
        let containerId = document.getElementById("container");
        let containerClasslist = containerId.classList;
        let headerClasslist = headerId.classList;
        let windowWidth = window.innerWidth < 450;
        if (windowWidth && isFixedHeader) {
            document.getElementById("logo").style.display = "none";
            document.getElementById("hotline").style.display = "none";
        } else {
            document.getElementById("logo").style.display = "block";
            document.getElementById("hotline").style.display = "flex";
        }

        if (!isFixedHeader) {
            headerClasslist.replace("fixed", "relative");
            containerClasslist.remove("pt-[7rem]");
            headerClasslist.remove("isSticky");
            // headerClasslist.add('isNotSticky');
            return;
        }
        headerClasslist.replace("relative", "fixed");
        containerClasslist.add("pt-[7rem]");
        headerClasslist.add("isSticky");
        // headerClasslist.remove('isNotSticky')
    };
};

setFixedHeader();
