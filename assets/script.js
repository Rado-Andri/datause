document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const cardContainer = document.getElementById('cardContainer');
    const cards = cardContainer.getElementsByClassName('card');

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();

        for (const card of cards) {
            const content = card.innerText.toLowerCase();
            if (content.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        }
    });
});
