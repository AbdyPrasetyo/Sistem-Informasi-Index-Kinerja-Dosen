import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import 'select2/dist/css/select2.min.css';
import $ from 'jquery';
import 'select2';
$(document).ready(function () {
    $('.select2').select2();
});

// Import Select2 JS file
window.Alpine = Alpine;

Alpine.start();
