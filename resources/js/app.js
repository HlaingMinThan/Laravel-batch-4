import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';

window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '#blog-textarea',

        /* TinyMCE configuration options */
        skin: false,
        content_css: false
    });
});

//package 2