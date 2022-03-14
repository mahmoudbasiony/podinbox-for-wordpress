# PodInbox



Installation
---------------

### Requirements

`podinbox` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Setup

To start using all the tools that come with `podinbox`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands
- `gulp watch` : watches all SASS and ES files under assets folder and recompiles &minify them to css and js when they change.

- `gulp build` : Compiles & Minify assets and generates a .pot file in the `languages/` directory.

- `gulp clean` : Deletes all minified assets and languages files.

- `gulp buildPlugin` : generates a .zip archive for distribution, excluding development and system files.
