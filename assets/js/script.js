document.addEventListener('DOMContentLoaded', function() {
    // Sélection des éléments du DOM
    const categoryFilter = document.getElementById('category-filter');
    const sortBy = document.getElementById('sort-by');
    const productsContainer = document.querySelector('.products');
    
    // Données des produits (pour le filtrage et le tri)
    const products = Array.from(document.querySelectorAll('.product')).map(product => {
        return {
            element: product,
            category: product.getAttribute('data-category') || 'all',
            price: parseFloat(product.querySelector('.price').textContent.replace(' DT', '').trim()),
            name: product.querySelector('h3').textContent
        };
    });

    // Fonction pour appliquer les filtres et le tri
    function updateProducts() {
        const category = categoryFilter.value;
        const sortValue = sortBy.value;
        
        // Filtrer par catégorie
        let filteredProducts = products;
        if (category !== 'all') {
            filteredProducts = products.filter(product => product.category === category);
        }
        
        // Trier les produits
        filteredProducts.sort((a, b) => {
            switch(sortValue) {
                case 'price-low':
                    return a.price - b.price;
                case 'price-high':
                    return b.price - a.price;
            
                default:
                    return 0; // Ordre par défaut (comme dans le HTML)
            }
        });
        
        // Vider le conteneur
        productsContainer.innerHTML = '';
        
        // Ajouter les produits triés/filtrés
        filteredProducts.forEach(product => {
            productsContainer.appendChild(product.element);
        });
    }
    
    // Écouteurs d'événements
    categoryFilter.addEventListener('change', updateProducts);
    sortBy.addEventListener('change', updateProducts);
    
    // Optionnel: Stocker les préférences dans localStorage
    categoryFilter.addEventListener('change', function() {
        localStorage.setItem('productCategoryPreference', this.value);
    });
    
    sortBy.addEventListener('change', function() {
        localStorage.setItem('productSortPreference', this.value);
    });
    
    // Au chargement de la page, appliquer les préférences sauvegardées
    const savedCategory = localStorage.getItem('productCategoryPreference');
    const savedSort = localStorage.getItem('productSortPreference');
    
    if (savedCategory) {
        categoryFilter.value = savedCategory;
    }
    
    if (savedSort) {
        sortBy.value = savedSort;
    }
    
    // Appliquer les filtres initiaux
    updateProducts();
});     