document.addEventListener('DOMContentLoaded', function() {
    const sidebar       = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const searchInput   = document.getElementById('search-input');
    const searchBtn     = document.getElementById('search-btn');
    const videoGrid     = document.getElementById('video-grid');
    const noResults     = document.getElementById('no-results');
    const noResultsQuery = document.getElementById('no-results-query');
    const subsExpand    = document.getElementById('subs-expand');
    const subsChevron   = document.getElementById('subs-chevron');
    const subsExpandText = document.getElementById('subs-expand-text');
    const subsExtras    = document.querySelectorAll('.sub-extra');

    let subsOpen = false;

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-hidden');
            document.body.classList.toggle('sidebar-collapsed');
        });
    }

    if (subsExpand) {
        subsExpand.addEventListener('click', function() {
            subsOpen = !subsOpen;
            subsExtras.forEach(function(el) {
                el.style.display = subsOpen ? 'flex' : 'none';
            });
            if (subsChevron) {
                subsChevron.className = subsOpen
                    ? 'fa-solid fa-chevron-up'
                    : 'fa-solid fa-chevron-down';
            }
            if (subsExpandText) subsExpandText.textContent = subsOpen ? 'Zwiń' : 'Rozwiń';
        });
    }

    function filterVideos() {
        if (!videoGrid) return;
        const query    = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const activeEl = document.querySelector('.sidebar [data-category].active');
        const category = activeEl ? activeEl.dataset.category : 'all';
        const cards    = videoGrid.querySelectorAll('.video-card');
        let visible    = 0;

        cards.forEach(function(card) {
            const matchesQuery    = !query || card.dataset.title.includes(query) || card.dataset.channel.includes(query);
            const matchesCategory = category === 'all' || card.dataset.category === category;
            card.style.display    = matchesQuery && matchesCategory ? '' : 'none';
            if (matchesQuery && matchesCategory) visible++;
        });

        if (noResults) {
            noResults.style.display = visible === 0 ? 'flex' : 'none';
            if (noResultsQuery) noResultsQuery.textContent = query || category;
        }
    }

    window.filterCategory = function(category, el) {
        document.querySelectorAll('.sidebar [data-category]').forEach(function(item) {
            item.classList.remove('active');
        });
        if (el) el.classList.add('active');
        filterVideos();
    };

    if (searchBtn) searchBtn.addEventListener('click', filterVideos);

    if (searchInput) {
        searchInput.addEventListener('input', filterVideos);
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') filterVideos();
        });

        const urlParams = new URLSearchParams(window.location.search);
        const qParam    = urlParams.get('q');
        if (qParam) {
            searchInput.value = qParam;
            filterVideos();
        }
    }
});

