window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    require('summernote');
    require('summernote/dist/summernote-bs4.css');
    require('summernote/dist/summernote-bs4.js');
    require('summernote/dist/lang/summernote-ru-RU.js');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
