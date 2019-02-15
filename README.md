# Gucci
#### A base theme for throwing up custom ACF Blocks super quick by Anna Cantrell 🌈
This theme uses [SCSS](https://sass-lang.com/).

## Development

1. Install [Node.js](https://nodejs.org/en/).
2. [Install gulp globally](https://github.com/gulpjs/gulp/blob/v3.9.1/docs/getting-started.md) by running `npm install --global gulp-cli` in your terminal. Then run `npm link gulp` in your root directory.
3. While in the repo root directory, run `npm install` from your terminal.
4. In that same directory, run `gulp` from your terminal.
6. Make changes in `library/src/scss/**/*.scss` and `/functions.js`.
7. See changes reflected in `./style.css` and `./functions.min.js`.

## Building new ACF blocks

1. Go to `library/theme-functions/acf-blocks.php`
2. Copy and paste the `acf_register_block` function and customize its content.
3. Add field groups like you normally would in the acf field builder UI. Preface your groups with "Block:"
4. Go to `library/template-parts/blocks` and name your new block `section-{block-name}`. The name must be the name you registers the block as.
5. To create your own category go to `acf-blocks.php` and add a new array to the block cateogries function.
