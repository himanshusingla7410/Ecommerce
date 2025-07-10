import { imageSwitcher } from "./helper"

class viewAndFilterHandler {

    constructor() {
        // this.setObserver()
        this.cacheDOM()
        this.listenForEvents()
    }


    cacheDOM() {
        this.sections = document.querySelectorAll('.section')
        this.grid = document.querySelector('.product-grid')
        this.btnWideView = document.querySelector('.wide-view')
        this.btnMediumView = document.querySelector('.medium-view')
        this.btnSmallView = document.querySelector('.small-view')
        this.sizes = document.querySelectorAll('.size-selector')
        this.colors = document.querySelectorAll('.color-selector')
        this.queryString = 0
        this.productCount = document.querySelector('#count')
        this.slider = document.getElementById('slider');
        this.minPrice = document.getElementById('min-price');
        this.maxPrice = document.getElementById('max-price');
        this.qs = new URLSearchParams()

    }

    listenForEvents() {
        this.changeProductGrid()
        this.selector(this.sizes, 'size')
        this.selector(this.colors, 'color')
        this.priceSlider()

    }


    setObserver() {

        this.observer = new IntersectionObserver((entries) => {

            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    this.preloadData(entry)
                    this.observer.unobserve(entry.target)
                }
            })


        }, { threshold: 0.2 })

        console.log(this.sections)

        this.sections.forEach(section => this.observer.observe(section))
    }

    async preloadData(entry) {
        // entry.target.preventDefault();

        const response = await fetch('/preload', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
        })

        if (!response.ok) {
            throw new Error(response.text())
        }

        const data = await response.json()

        if (data.status === 'success') {
            console.log('success')

            console.log(data.data)

        }

    }

    changeProductGrid() {

        const fields = new Map([
            [this.btnMediumView, 'grid-cols-4'],
            [this.btnWideView, 'grid-cols-2'],
            [this.btnSmallView, 'grid-cols-6'],
        ])

        fields.forEach((gridCls, btn) => {

            btn.addEventListener('click', () => {
                this.resetBtn()
                this.grid.classList.remove('grid-cols-4', 'grid-cols-2', 'grid-cols-6')
                this.grid.classList.add(gridCls)
                btn.classList.add('text-black')
            })
        })

    }

    updateGrid($data) {

        this.grid.innerHTML = $data
        this.productCount.innerHTML = this.grid.querySelectorAll('a').length
        if (this.grid.querySelectorAll('a').length === 0) {
            this.grid.classList.remove('grid')
        } else {
            this.grid.classList.add('grid')
        }
        
        imageSwitcher(document.querySelectorAll('#landing-page'))

    }

    resetBtn() {
        document.querySelector('.sub-head').querySelectorAll('button').forEach((button) => {
            button.classList.contains('text-black') ? button.classList.remove('text-black') : ""
        })
    }

    selector(elements, filterOption) {

        elements.forEach((element) => {
            element.addEventListener('click', (e) => {
                e.target.previousElementSibling.classList.toggle('hidden')
                e.target.parentElement.classList.toggle('font-semibold')
                e.target.parentElement.classList.contains('font-semibold') ? this.filter(this.buildQuery(filterOption, e.target.textContent)) : this.filter(this.modifyQuery(filterOption, e.target.textContent))
            })
        })

    }

    async filter(q) {

        try {
            const response = await fetch(`/api/filter?${q}`)

            if (!response.ok) {
                throw new Error(await response.text())
            }

            const data = await response.text()
            if (data) {
                this.updateGrid(data)
            }
        }
        catch (error) {
            throw new Error(`Failed to load: ${error.message}`)
        }

    }

    buildQuery(key, value) {

        this.qs.append(key, value)
        return this.qs.toString()

    }

    modifyQuery(key, value) {

        this.qs.delete(key, value)
        return this.qs.toString()
    }


    priceSlider() {

        noUiSlider.create(this.slider, {
            start: [100, 4500],
            connect: true,
            range: {
                'min': 0,
                'max': 5000
            }
        });

        this.slider.noUiSlider.on('update', (values, handle) => {
            let value = Math.round(values[handle]);
            handle === 0 ? this.minPrice.textContent = `${value}` : this.maxPrice.textContent = `${value}`;
        });

        this.slider.noUiSlider.on('change', (values, handle) => {
            let value = Math.round(values[handle])
            handle === 0 ? this.filter(this.buildQuery('min-price', value)) : this.filter(this.buildQuery('max-price', value))
        })
    }



}

document.addEventListener('DOMContentLoaded', () => new viewAndFilterHandler())



