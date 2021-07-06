// Variables
const menuToggle = document.querySelector(".menu-toggle");
const menuList = document.querySelector(".menu__list");
const menuItemHasChildrenElements = document.querySelectorAll(
  ".menu-item-has-children"
);

if (window.innerWidth < 1200) {
  menuToggle.addEventListener("click", (e) => {
    e.preventDefault();
    if (menuList.classList.contains("open")) {
      menuList.classList.remove("open");
      menuToggle.classList.remove("menu-open");
    } else {
      menuList.classList.add("open");
      menuToggle.classList.add("menu-open");
    }
  });

  menuItemHasChildrenElements.forEach((item) => {
    let itemLink = item.querySelector(":scope > a");
    itemLink.addEventListener("click", (e) => {
      e.preventDefault();
      if (item.classList.contains("open")) {
        item.classList.remove("open");
      } else {
        item.classList.add("open");
      }
    });
  });
} else {
  menuItemHasChildrenElements.forEach((item) => {
    let itemLink = item.querySelector(":scope > a");
    itemLink.addEventListener("click", (e) => {
      e.preventDefault();
    });
  });
}
