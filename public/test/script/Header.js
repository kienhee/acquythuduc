
const setFixedHeader = () => {
    window.onscroll = () => {
        let isFixedHeader = window.scrollY > 100;
        let headerId = document.getElementById("header");
        let containerId = document.getElementById("container");
        let containerClasslist = containerId.classList;
        let headerClasslist = headerId.classList;
        let windowWidth = window.innerWidth < 450;
        if (windowWidth && isFixedHeader) {
            document.getElementById("search").style.display = "none";
        } else {
            document.getElementById("search").style.display = "flex";
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
