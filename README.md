# ModusRem site

A refreshed, colorful single-page site for ModusRem with a dynamic gallery fed by GitHub-hosted images.

## Usage

Open `index.html` directly in a browser or host the folder on any static host (GitHub Pages, Netlify, Vercel, S3, etc.). No build step is required.

### Previewing locally
1. From the project root, start a simple web server:
   ```bash
   python -m http.server 8000
   ```
2. Visit `http://localhost:8000` in your browser to view the site. Any edits you make to the HTML/CSS/JS files will refresh on reload.
3. Press `Ctrl + C` in the terminal to stop the server when you’re done.

### Updating the gallery with GitHub uploads
1. Drop new image files into `assets/uploads/` using the GitHub web UI or a commit.
2. Edit `assets/uploads/gallery.json` to point to your images. Example entry:
   ```json
   {
     "title": "New launch visual",
     "description": "Short line about the image.",
     "src": "assets/uploads/your-image-file.png",
     "alt": "Accessible description"
   }
   ```
3. Commit/push. On the next deploy, the gallery will render the updated list automatically.

You can also reference externally hosted images (e.g., CDN links) in `src`.

## Structure
- `index.html` – single-page markup with hero, services, process, and gallery sections.
- `styles/main.css` – neon gradient-inspired styling with responsive layout.
- `scripts/main.js` – loads `assets/uploads/gallery.json` and renders the cards.
- `assets/uploads/gallery.json` – gallery manifest you can edit to change displayed images.

## Development notes
- Fonts are pulled from Google Fonts (`Inter` and `Manrope`).
- Colors lean on electric cyan + violet with glassmorphism-style panels.
