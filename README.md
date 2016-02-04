# WordPress Sussy and Gulp Starter Theme

Version: 1.1.1

## Author:

Benoît Vigouroux ( [@chantdeleau](http://twitter.com/mattbanks) / [watermelon-pixels.fr](http://watermelon-pixels.fr/) )

## Summary

WordPress Starter Theme for use as a starting template for building custom themes. Uses SCSS and AutoPrefixr, Sussy Grid, HTML5 Boilerplate with Modernizr and Normalize.css, and Gulp for all processing tasks..

## Usage

The theme is setup to use [Gulp](http://gulpjs.com/) to compile SCSS, run it through [AutoPrefixr](https://github.com/ai/autoprefixer), lint, concatenate and minify JavaScript (with source maps), optimize images, and [LiveReload](http://livereload.com/) the browser (with extension), with flexibility to add any additional tasks via the Gruntfile. Alternatively, you can use [CodeKit](http://incident57.com/codekit/) or whatever else you prefer to compile the SCSS and manage the JavaScript.

Rename folder to your theme name, change the `style.scss` intro block to your theme information. Open the theme directory in terminal and run `npm install` to pull in all Grunt dependencies. Run `grunt` to execute tasks. Code as you will. If you have the LiveReload browser extension, it will reload after any SCSS or JS changes.

- Compile `assets/styles/style.scss` to `style.css`
- Compile `assets/styles/editor-style.scss` to `editor-style.css`
- Concatenate and minify plugins in `assets/js/vendor` and `assets/js/source/plugins.js` to `assets/js/plugins.min.js`
- Minify and lint `assets/js/source/main.js` to `assets/js/main.min.js`
- ??
- Profit

To concatenate and minify your jQuery plugins, add them to the `assets/js/vendor` directory and add the `js` filename and path to the `Gulpfile` `uglify` task. Previous versions of the starter theme automatically pulled all plugins in the `vendor` directory, but this has changed to allow more granular control and for managing plugins and assets with bower.


### REQUIRED

* Install [npm](http://blog.npmjs.org/post/85484771375/how-to-install-npm).
* Install [Gulp](http://gulpjs.com/): `npm install gulp -g`.
* Download or clone this repo: `https://github.com/watermelon-pixels/wordpress-gulp-susy.git`.


### Bower

Supports [bower](https://github.com/bower/bower) to install and manage JavaScript dependencies in the `assets/js/vendor` folder.

### Image Optimization
To optimize images, run `Gulp imagemin`. This was also included in the default `watch` task, but there are currently a few issues with processing images multiple times and removing their contents.

### Features

1. Normalized stylesheet for cross-browser compatibility using Normalize.css version 3 (IE8+)
2. Easy to customize
3. Flexible grid based on work from [Chris Coyier](https://twitter.com/chriscoyier)
4. Media Queries can be nested in each selector using SASS
5. SCSS with plenty of mixins ready to go
6. Grunt for processing all SASS, JavaScript and images
7. Much much more


### Credits

Without these projects, this WordPress Starter Theme wouldn't be where it is today.

* [HTML5 Boilerplate](http://html5boilerplate.com)
* [Normalize.css](http://necolas.github.com/normalize.css)
* [SASS / SCSS](http://sass-lang.com/)
* [AutoPrefixr](https://github.com/ai/autoprefixer)
* [Don't Overthink It Grids](css-tricks.com/dont-overthink-it-grids/)
* [Underscores Theme](https://github.com/Automattic/_s)
* [Gulp](http://gulpjs.com/)
