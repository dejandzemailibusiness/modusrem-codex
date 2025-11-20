const galleryGrid = document.getElementById('gallery-grid');

async function loadGallery() {
  try {
    const response = await fetch('assets/uploads/gallery.json');
    if (!response.ok) throw new Error('Gallery manifest missing');
    const items = await response.json();
    renderGallery(items);
  } catch (err) {
    galleryGrid.innerHTML = `<p class="muted">Add a <code>gallery.json</code> file inside <code>assets/uploads</code> to show your own visuals. See README for the format.</p>`;
    console.warn('Gallery not loaded', err);
  }
}

function renderGallery(items) {
  if (!Array.isArray(items) || items.length === 0) {
    galleryGrid.innerHTML = '<p class="muted">Add entries to gallery.json to display your work.</p>';
    return;
  }

  galleryGrid.innerHTML = items
    .map(
      (item) => `
      <article class="gallery__card">
        <img src="${item.src}" alt="${item.alt || 'Project visual'}" loading="lazy" />
        <div class="gallery__content">
          <h3>${item.title || 'New visual'}</h3>
          <p class="muted">${item.description || ''}</p>
        </div>
      </article>`
    )
    .join('');
}

loadGallery();
