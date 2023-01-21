let listVideo = document.querySelectorAll(".videos__list__menu .videos__menu__item");
let mainVideo = document.querySelector(".videos__cart__item a");
let videos__menu__title = document.querySelector(".videos__cart__item .videos__menu__title");

listVideo.forEach(a => {
  a.onclick = () => {
    listVideo.forEach(videos__menu__item => videos__menu__item.classList.remove("active"));
    a.classList.add("active");
    if (a.classList.contains("active")) {
      let href = a.children[0].getAttribute("href");
      mainVideo.href = href;
      let text = a.children[1].innerHTML;
      videos__menu__title.innerHTML = text;
    }
  };
});