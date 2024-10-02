window.onload = function () {
    const parentElement = document.querySelector('[x-show="showDropdown1"]');

    const childElements = parentElement.children;

    const menuLis = Array.from(childElements);
    let paddingTop = '127px';

    if (parentElement) {
        parentElement.addEventListener('mouseenter', () => {
            //paddingTop = (window.innerHeight < 540) ? '124px' : '127px';
            menuLis.forEach((el, key) => {
              //  if (el.querySelector('ul').classList.contains('third-level-to-bottom')) {
                    el.querySelector('ul').style.maxHeight = `calc(100vh - ${el.getBoundingClientRect().top}px - 10px)`;
                //}
                //else {
                 //   el.querySelector('ul').style.maxHeight = `calc(100vh - ${window.innerHeight - el.getBoundingClientRect().bottom}px - ${paddingTop})`;
                //}
            });
        });
    }
}