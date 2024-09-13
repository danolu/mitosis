
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import jQuery from 'jquery';
window.$ = jQuery;
window.jQuery = jQuery;

import DataTable from 'datatables.net-bs5';
window.DataTable = DataTable;
import 'datatables.net-buttons-bs5';
import 'datatables.net-buttons/js/buttons.colVis.mjs';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import DateTime from 'datatables.net-datetime';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import feather from 'feather-icons';
window.feather = feather;

import PerfectScrollbar from 'perfect-scrollbar';
window.PerfectScrollbar = PerfectScrollbar;

import Swal from 'sweetalert2';
window.Swal = Swal;

import Clipboard from 'clipboard';
window.Clipboard = Clipboard;

