class LazyLoader {

    constructor() {
        this.setObserver()
        this.cacheDOM()
    }


    cacheDOM() {
        this.sections = document.querySelectorAll('.section')
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


}

document.addEventListener('DOMContentLoaded', () => new LazyLoader())