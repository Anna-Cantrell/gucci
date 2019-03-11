# Gucci
#### A base theme for throwing up custom ACF Blocks super quick by Anna Cantrell 🌈
This theme uses [SCSS](https://sass-lang.com/).

## Development

1. Install [Node.js](https://nodejs.org/en/).
2. This package uses gulp 3.9.1, running gulp later than 4.0 will result in errors. For this reason I've included gulp 3.9.1 in `package.json`
3. While in the repo root directory, run `npm install` from your terminal.
4. In that same directory, run `gulp` from your terminal.
6. Make changes in `library/src/scss/**/*.scss` and `library/src/js/functions.js`.
7. See changes reflected in `./style.css` and `library/js/functions.min.js`.

## Building new ACF blocks
This theme **REQUIRES** the beta version of ACF PRO to work properly.
If you are an ACF PRO customer, you can take ACF Blocks for a spin today by downloading the latest beta version.
To test ACF PRO 5.8.0-beta1, please [login to your store account](https://www.advancedcustomfields.com/my-account)
and click the *See all versions* link alongside your license. Download, extract and replace ‘advanced-custom-fields-pro’ plugin folder contents.

1. Go to `library/theme-functions/acf-blocks.php`
2. Copy and paste the `acf_register_block` function and customize its content.
3. Add field groups like you normally would in the acf field builder UI. Preface your groups with "Block:"
4. Go to `library/template-parts/blocks` and name your new block `section-{block-name}`. The name must be the name you registers the block as.
5. To create your own category go to `acf-blocks.php` and add a new array to the block cateogries function.
