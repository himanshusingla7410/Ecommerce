export function feedback(ele) {
    if (ele.classList.contains('hidden')) {
        ele.classList.remove('hidden')
    }
    setTimeout(() => ele.classList.add('hidden'), 3000)

}