document.addEventListener('alpine:init', () => {
    Alpine.data('products', () => ({
        items: [
            {id: 1, name: 'Beef Teriyaki', img: 'beef.jpg', price: 35000},
            {id: 2, name: 'Robusta Brazil', img: '2.jpg', price: 30000},
            {id: 3, name: 'Robusta Brazil', img: '3.jpg', price: 40000},
            {id: 4, name: 'Robusta Brazil', img: '4.jpg', price: 50000}
            
        ],
    }))
})