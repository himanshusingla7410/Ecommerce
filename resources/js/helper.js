export function feedback(ele) {
    ele.classList.remove('hidden')
    setTimeout(() => ele.classList.add('hidden'), 3000)

}