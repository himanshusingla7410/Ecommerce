export function feedback(ele) {
    if (ele.classList.contains('hidden')) {
        ele.classList.remove('hidden')
    }
    setTimeout(() => ele.classList.add('hidden'), 3000)

}

export function imageSwitcher(images) {

    images.forEach(image => {
        image.addEventListener('mouseenter', () => {
            const hoversrc = image.getAttribute('data-pic');
            image.src = hoversrc;
        })

        image.addEventListener('mouseleave', () => {
            const originalsrc = image.getAttribute('data-original');
            image.src = originalsrc;
        })
    })
}