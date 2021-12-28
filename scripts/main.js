import '../styles/main.scss';

import $ from 'jquery';
import AOS from 'aos';
import slick from 'slick-carousel';
import React from 'react';
import ReactDom from 'react-dom';
import Newsletter from './newsletter';

$(() => {
    AOS.init({
        offset: 300
    });

    $('.testimonials--slider').slick({
        nextArrow: $('.fa-chevron-right'),
        prevArrow: $('.fa-chevron-left'),
    });

    ReactDom.render(<Newsletter />, document.getElementById('newsletter'))
});

console.log(page);