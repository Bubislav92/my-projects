document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.photo-item');
    
    // Function to show/hide items with a smooth transition
    const filterGallery = (category) => {
        galleryItems.forEach(item => {
            if (category === 'all' || item.classList.contains(category)) {
                // Remove hidden class and add a class for smooth reveal
                item.classList.remove('hidden');
            } else {
                // Add hidden class
                item.classList.add('hidden');
            }
        });
    };

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active-filter'));
            button.classList.add('active-filter');
            const category = button.dataset.category;
            filterGallery(category);
        });
    });

    // Initial load: show all items
    filterGallery('all');
});