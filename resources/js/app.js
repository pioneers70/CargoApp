import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import $ from "jquery";
import "/node_modules/select2/dist/css/select2.css";
import 'select2-bootstrap-5-theme/dist/select2-bootstrap-5-theme.css';
import '../css/app.css';
import { initializeSelect2 } from "./select2-initialize";
import select2 from 'select2';
import './add-item';

window.$ = $;
select2();

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
