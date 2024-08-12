    <?php

use Cake\ORM\TableRegistry;
?>
<style>     

    body,html {
        font-family: Poppins, sans-serif
    }
    a,a:focus,a:hover,a>* {
        outline: 0;
        text-decoration: none
    }
    .form-control,.navbar a,.overlay:before,a {
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s
    }
    .d-flex,.v-align {
        display: -webkit-box;
        display: -ms-flexbox
    }

    .d-table,.height-100,body,html {
        height: 100%
    }

    .overlay:before,.rt-btn2::after,.rt-btn:after,.rt-btn:before {
        content: ""
    }

    .scale-toggle,.search-box button,a,a>* {
        cursor: pointer
    }

    body {
        font-size: 14px;
        line-height: 26px;
        font-weight: 400;
        color: #5c5c5c;
        background-color: #fff;
        overflow-x: hidden;
        -webkit-text-size-adjust: 100%;
        -webkit-overflow-scrolling: touch;
        -webkit-font-smoothing: antialiased
    }

    .fix,.overlay-scale {
        overflow: hidden
    }

    body,html {
        width: 100%
    }

    ::-moz-selection {
        background: #ff214f;
        text-shadow: none;
        color: #fff
    }

    ::selection {
        background: #ff214f;
        text-shadow: none;
        color: #fff
    }

    .browserupgrade {
        margin: .2em 0;
        background: #ccc;
        color: #000;
        padding: .2em 0
    }

    .bg-img-1,.bg-img-2,.bg-img-3,.bg-img-4,.bg-img-5 {
        background-repeat: no-repeat;
        background-attachment: scroll
    }

    a,h1,h2,h3,h4,h5,h6 {
        color: #232323;
        text-transform: capitalize
    }

    img {
        max-width: 100%
    }

    .clear {
        clear: both
    }

    a {
        font-family: Montserrat, sans-serif;
        font-weight: 500;
        line-height: 1
    }
    .form-control,navbar a,a {
        transition: all .3s ease 0s
    }

    p {
        font-family: Poppins, sans-serif;
        font-size: 18px;
        line-height: 32px;
        font-weight: 400;
        color: #5c5c5c;
        margin: 0
    }

    h1,h2,h3,h4,h5,h6 {
        font-family: Montserrat, sans-serif;
        font-weight: 600;
        margin: 0 0 15px;
        -webkit-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease
    }

    h1,h2 {
        font-weight: 700;
        font-family: Poppins, sans-serif
    }

    .white-color,h2,h5 {
        color: #fff
    }

    h1 {
        font-size: 44px
    }

    h2 {
        font-size: 30px
    }

    h3 {
        font-size: 22px
    }

    h4 {
        font-size: 20px
    }

    h5 {
        font-size: 15px
    }

    h6 {
        font-size: 14px;
        font-weight: 400
    }

    .poppins {
        font-family: Poppins, sans-serif
    }

    .montserrat {
        font-family: Montserrat, sans-serif
    }

    .custom-tab .nav-tabs>li>a,.social-link a,
    .video-btn>h5 {
        font-family: Poppins, sans-serif
    }

    .no-margin {
        margin: 0
    }

    .no-gutter>[class*=col-] {
        padding-right: 0;
        padding-left: 0
    }

    .no-padding {
        padding: 0
    }

    .section-padding {
        padding: 25px 0;
        float: left;
        width: 100%;
    }
    .section-pt {
        padding-top: 150px
    }

    .section-pb {
        padding-bottom: 150px
    }

    .theme-color {

        color:#ff6c00
    }

    .l-height {
        line-height: 1
    }

    .mr-auto {
        margin-right: auto
    }

    .justify-end {
        -ms-flex-pack: end;
        -webkit-box-pack: end;
        justify-content: flex-end
    }

    .d-flex {
        display: flex
    }

    .d-inblock {
        display: inline-block
    }

    .column-center {
        float: none!important;
        margin-left: auto!important;
        margin-right: auto!important
    }

    .relative {
        position: relative
    }

    .absolute {
        position: absolute
    }

    .fixed {
        position: fixed
    }

    .percent-20 {
        width: 20%
    }

    .percent-25 {
        width: 25%
    }

    .percent-33 {
        width: 33.333%
    }

    .percent-50 {
        width: 50%
    }

    .percent-66 {
        width: 66.666%
    }

    .d-table,
    .percent-100 {
        width: 100%
    }

    .mt-5 {
        margin-top: 5px
    }

    .mt-10 {
        margin-top: 10px
    }

    .mt-15 {
        margin-top: 15px
    }

    .mt-20 {
        margin-top: 20px
    }

    .mt-25 {
        margin-top: 25px
    }

    .mt-30 {
        margin-top: 30px
    }

    .mt-35 {
        margin-top: 35px
    }

    .mt-40 {
        margin-top: 40px
    }

    .mt-45 {
        margin-top: 45px
    }

    .mt-50 {
        margin-top: 50px
    }

    .mt-70 {
        margin-top: 70px
    }

    .mt-90 {
        margin-top: 0
    }

    .mt-100 {
        margin-top: 100px
    }

    .mb-5 {
        margin-bottom: 5px
    }

    .mb-10 {
        margin-bottom: 10px
    }

    .mb-15 {
        margin-bottom: 15px
    }

    .mb-20 {
        margin-bottom: 20px
    }

    .mb-25 {
        margin-bottom: 25px
    }

    .mb-30 {
        margin-bottom: 30px
    }

    .mb-35 {
        margin-bottom: 35px
    }

    .mb-40 {
        margin-bottom: 40px
    }

    .mb-45 {
        margin-bottom: 45px
    }

    .mb-50 {
        margin-bottom: 50px
    }

    .mb-55 {
        margin-bottom: 55px
    }

    .mb-60 {
        margin-bottom: 60px
    }

    .mb-65 {
        margin-bottom: 65px
    }

    .mb-70 {
        margin-bottom: 70px
    }

    .mb-75 {
        margin-bottom: 75px
    }

    .mb-85 {
        margin-bottom: 85px
    }

    .mb-90 {
        margin-bottom: 90px
    }

    @media screen and (max-width:767px) {
        .section-padding {
            padding: 100px 0
        }
        .section-pt {
            padding-top: 100px
        }
        .section-pb {
            padding-bottom: 100px
        }
        .percent-20,
        .percent-25,
        .percent-33,
        .percent-50,
        .percent-66 {
            width: 100%
        }
        .mt-100,
        .mt-40,
        .mt-45,
        .mt-50 {
            margin-top: 30px
        }
        .mt-90 {
            margin-top: 60px
        }
        .mt-70 {
            margin-top: 40px
        }
        .mb-90 {
            margin-bottom: 60px
        }
        .mb-70,
        .mb-75,
        .mb-85 {
            margin-bottom: 50px
        }
        .mb-60,
        .mb-65 {
            margin-bottom: 40px
        }
    }

    .mtb-15 {
        margin: 15px 0
    }

    .ml-5 {
        margin-left: 5px
    }

    .ml-10 {
        margin-left: 10px
    }

    .ml-15 {
        margin-left: 15px
    }

    .ml-20 {
        margin-left: 20px
    }

    .ml-25 {
        margin-left: 25px
    }

    .ml-30 {
        margin-left: 30px
    }

    .ml-35 {
        margin-left: 35px
    }

    .ml-40 {
        margin-left: 40px
    }

    .ml-45 {
        margin-left: 45px
    }

    .ml-50 {
        margin-left: 50px
    }

    .mr-5 {
        margin-right: 5px
    }

    .mr-10 {
        margin-right: 10px
    }

    .mr-15 {
        margin-right: 15px
    }

    .mr-20 {
        /*margin-right: 20px*/
    }

    .mr-25 {
        margin-right: 25px
    }

    .mr-30 {
        margin-right: 30px
    }

    .mr-35 {
        margin-right: 35px
    }

    .mr-40 {
        margin-right: 40px
    }

    .mr-45 {
        margin-right: 45px
    }

    .mr-50 {
        margin-right: 50px
    }

    .pt-5 {
        padding-top: 5px
    }

    .pt-10 {
        padding-top: 10px
    }

    .pt-15 {
        padding-top: 15px
    }

    .pt-20 {
        padding-top: 20px
    }

    .pt-25 {
        padding-top: 25px
    }

    .pt-30 {
        padding-top: 30px
    }

    .pt-35 {
        padding-top: 35px
    }

    .pt-40 {
        padding-top: 40px
    }

    .pt-45 {
        padding-top: 45px
    }

    .pt-50 {
        padding-top: 50px
    }

    .pt-60 {
        padding-top: 60px
    }

    .pt-65 {
        padding-top: 65px
    }

    .pt-80 {
        padding-top: 80px
    }

    .pt-100 {
        padding-top: 100px
    }

    .pt-170 {
        padding-top: 170px
    }

    .pb-5 {
        padding-bottom: 5px
    }

    .pb-10 {
        padding-bottom: 10px
    }

    .pb-15 {
        padding-bottom: 15px
    }

    .pb-20 {
        padding-bottom: 20px
    }

    .pb-25 {
        padding-bottom: 25px
    }

    .pb-30 {
        padding-bottom: 30px
    }

    .pb-35 {
        padding-bottom: 35px
    }

    .pb-40 {
        padding-bottom: 40px
    }

    .pb-45 {
        padding-bottom: 45px
    }

    .pb-50 {
        padding-bottom: 50px
    }

    .pb-70 {
        padding-bottom: 70px
    }

    .pb-80 {
        padding-bottom: 80px
    }

    @media screen and (max-width:767px) {
        .pt-80 {
            padding-top: 50px
        }
        .pt-100 {
            padding-top: 80px
        }
        .pt-170 {
            padding-top: 120px
        }
        .pb-70,
        .pb-80 {
            padding-bottom: 50px
        }
        .row.pb-80 {
            padding-bottom: 0
        }
    }

    .ptb-5 {
        padding-top: 5px;
        padding-bottom: 5px
    }

    .ptb-10 {
        padding-top: 10px;
        padding-bottom: 10px
    }

    .ptb-15 {
        padding-top: 15px;
        padding-bottom: 15px
    }

    .ptb-20 {
        padding-top: 20px;
        padding-bottom: 20px
    }

    .ptb-25 {
        padding-top: 25px;
        padding-bottom: 25px
    }

    .ptb-30 {
        padding-top: 30px;
        padding-bottom: 30px
    }

    .ptb-35 {
        padding-top: 35px;
        padding-bottom: 35px
    }

    .ptb-40 {
        padding-top: 40px;
        padding-bottom: 40px
    }

    .ptb-45 {
        padding-top: 45px;
        padding-bottom: 45px
    }

    .ptb-50 {
        padding-top: 50px;
        padding-bottom: 50px
    }

    .ptb-100 {
        padding-top: 100px;
        padding-bottom: 100px
    }

    .ptb-120 {
        padding-top: 120px;
        padding-bottom: 120px
    }

    .ptb-200 {
        padding-top: 200px;
        padding-bottom: 200px
    }

    .pl-5 {
        padding-left: 5px
    }

    .pl-10 {
        padding-left: 10px
    }

    .pl-15 {
        padding-left: 15px
    }

    .pl-20 {
        padding-left: 20px
    }

    .pl-25 {
        padding-left: 25px
    }

    .pl-30 {
        padding-left: 30px
    }

    .pl-35 {
        padding-left: 35px
    }

    .pl-40 {
        padding-left: 40px
    }

    .pl-45 {
        padding-left: 45px
    }

    .pl-50 {
        padding-left: 50px
    }

    .pl-60 {
        padding-left: 60px
    }

    .pr-5 {
        padding-right: 5px
    }

    .pr-10 {
        padding-right: 10px
    }

    .pr-15 {
        padding-right: 15px
    }

    .pr-20 {
        padding-right: 20px
    }

    .pr-25 {
        padding-right: 25px
    }

    .pr-30 {
        padding-right: 30px
    }

    .pr-35 {
        padding-right: 35px
    }

    .pr-40 {
        padding-right: 40px
    }

    .pr-45 {
        padding-right: 45px
    }

    .pr-50 {
        padding-right: 50px
    }

    .pr-60 {
        padding-right: 60px
    }

    .plr-20 {
        padding-left: 20px;
        padding-right: 20px
    }

    .plr-50 {
        padding-left: 50px;
        padding-right: 50px
    }

    .plr-150 {
        padding-left: 150px;
        padding-right: 150px
    }

    .plr-260 {
        padding-left: 260px;
        padding-right: 260px
    }

    @media screen and (max-width:767px) {
        .ptb-100,
        .ptb-120,
        .ptb-200 {
            padding-bottom: 80px;
            padding-top: 80px
        }
        .plr-150,
        .plr-260 {
            padding-left: 30px;
            padding-right: 30px
        }
        .font-30 {
            font-size: 25px
        }
        .font-35,
        .font-40,
        .font-42,
        .font-90,
        h1 {
            font-size: 30px
        }
    }

    .white-bg {
        background-color: #fff
    }

    .black-bg {
        background-color: #030d27
    }

    .gray-bg {
        background-color: #f4f4f4
    }

    .theme-bg {
        background-color: #41228e
    }

    .bg-img-1 {
        background-image: url(../img/bg/1.png);
        background-position: center center
    }

    .bg-img-2 {
        background-image: url(<?php echo HTTP_ROOT; ?>img/blog/2.png);
        background-position: top center
    }

    .bg-img-3 {
        background-image: url(../img/bg/3.png);
        background-position: center 70%
    }

    .bg-img-4 {
        background-image: url(../img/bg/4.png);
        background-position: left center
    }

    .bg-img-5 {
        background-image: url(../img/bg/5.png);
        background-position: center left
    }

    .bg-img-6 {
        background-image: url(../img/bg/6.png);
        background-attachment: scroll;
        background-position: top center;
        background-repeat: no-repeat
    }

    .bg-img-10,
    .bg-img-11,
    .bg-img-7,
    .bg-img-8,
    .bg-img-9 {
        background-position: center center;
        background-size: cover;
        background-attachment: scroll;
        background-repeat: no-repeat
    }

    .bg-img-7 {
        background-image: url(../img/bg/7.jpg)
    }

    .bg-img-8 {
        background-image: url(../img/bg/8.jpg)
    }

    .bg-img-9 {
        background-image: url(../img/bg/9.jpg)
    }

    .bg-img-10 {
        background-image: url(../img/bg/10.jpg)
    }

    .bg-img-11 {
        background-image: url(../img/bg/11.jpg)
    }

    .bg-pattern-1 {
        background-image: url(../img/bg/pattern/1.png);
        background-attachment: scroll;
        background-size: cover;
        background-repeat: no-repeat
    }

    .bg-pattern-2 {
        background-image: url(../img/bg/pattern/2.png);
        background-attachment: scroll;
        background-size: cover;
        background-repeat: no-repeat
    }

    .add-image {
        background-image: url(../img/service/add-1.jpg);
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover
    }

    .add-image-2 {
        background-image: url(../img/bg/add-2.jpg);
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover
    }

    .error-image {
        background-attachment: scroll;
        background-image: url(../img/bg/error.jpg);
        background-position: center bottom;
        background-repeat: no-repeat;
        background-size: auto 100%
    }

    @media only screen and (min-width:1200px) {
        .error-image {
            background-size: auto auto
        }
    }

    .overlay {
        position: relative
    }

    .overlay:before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(65, 34, 142, .9);
        transition: all .3s ease 0s
    }

    .overlay .container {
        position: relative;
        z-index: 2
    }

    .overlay.dark-1:before {
        background-color: rgba(3, 13, 39, .9)
    }

    .overlay.dark-2:before {
        background-color: rgba(3, 13, 39, .86)
    }

    .overlay.dark-3:before {
        background-color: rgba(3, 13, 39, .8)
    }

    .overlay.dark-4:before {
        background-color: rgba(0, 0, 0, .3)
    }

    .overlay.dark-5:before {
        background-color: rgba(3, 13, 39, .2)
    }

    .overlay.dark-6:before {
        background-color: rgba(3, 13, 39, .6)
    }

    .overlay.light-1:before {
        background-color: rgba(255, 255, 255, .5)
    }

    .overlay-1:before {
        background-color: rgba(255, 33, 89, .9)
    }

    .overlay-2:before {
        background-color: rgba(65, 34, 142, .85)
    }

    .overlay-3:before {
        background-color: rgba(9, 212, 222, .9)
    }

    .overlay-4:before {
        background-color: rgba(9, 212, 222, .8)
    }

    .d-table {
        display: table
    }

    .dt-cell {
        display: table-cell;
        vertical-align: middle
    }

    .v-align {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .row-eq-height {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }

    .btn {
        background-color: #09d4de;
        border: 0;
        border-radius: 0;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        height: 48px;
        line-height: 48px;
        padding: 0 40px;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s;
        color: #fff;
        letter-spacing: 1px
    }

    .btn.sm-btn {
        font-size: 12px;
        font-weight: 600;
        height: 40px;
        letter-spacing: 0;
        line-height: 40px;
        padding: 0 25px
    }

    .btn:hover {
        background-color: #ff214f
    }

    .btn i.material-icons {
        font-size: 20px
    }

    .btn.focus,
    .btn:focus,
    .btn:hover {
        color: #fff;
        border-color: #ff214f
    }

    .btn:focus,
    button:focus {
        outline: 0!important
    }

    .slick-slide:focus,
    input:focus,
    select:focus,
    textarea:focus {
        outline: 0
    }

    .btn.border {
        background-color: transparent;
        border: 2px solid #fff
    }

    .btn.border:hover {
        background-color: #ff214f;
        border-color: #ff214f
    }

    .rt-btn {
        position: relative
    }

    .rt-btn:after,
    .rt-btn:before {
        position: absolute;
        width: 50%;
        height: 2px;
        background-color: #09d4de;
        -webkit-transition: .3s;
        -o-transition: .3s;
        transition: .3s
    }

    .rt-btn:hover:after,
    .rt-btn:hover:before {
        background-color: #ff214f;
        width: 100%
    }

    .rt-btn:before {
        right: 0;
        top: -6px
    }

    .rt-btn:after {
        left: 0;
        bottom: -6px
    }

    .rt-btn2 {
        position: relative;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        background-color: #ff214f
    }

    .rt-btn2::after {
        background-color: #ce002b;
        height: 100%;
        left: 0;
        opacity: 0;
        position: absolute;
        top: 0;
        -webkit-transform: scale(.7, .5);
        -ms-transform: scale(.7, .5);
        transform: scale(.7, .5);
        -webkit-transition: all .4s ease 0s;
        -o-transition: all .4s ease 0s;
        transition: all .4s ease 0s;
        width: 100%;
        z-index: -1
    }

    .rt-btn2:hover::after {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    @media screen and (max-width:767px) {
        .lg-bgn {
            font-size: 14px
        }
    }

    .form-control {
        border-radius: 0
    }

    .input-field {
        margin-top: 45px
    }

    .input-field label {
        color: #999;
        top: 0;
        left: 0;
        font-size: 14px;
        line-height: 16px;
        font-weight: 400;
        margin: 0
    }

    .input-field label.active {
        font-size: 12px
    }

    .custom-input label {
        font-weight: 400
    }

    .custom-input label.error {
        position: absolute;
        top: -30px
    }

    i[class^=flaticon-] {
        line-height: 50px;
        display: inline-block
    }

    i[class^=flaticon-]:before {
        font-size: 45px;
        margin-left: 0
    }

    /*** 
    
    ====================================================================
      02 - Theme menu Style
    ====================================================================
    
     ***/

    ul,
    ul li {
        list-style: none;
        margin: 0;
        padding: 0
    }

    nav,
    nav ul li.active,
    nav ul li:hover {
        background-color: transparent
    }

    nav ul,
    nav ul li {
        float: none
    }

    nav ul a {
        font-size: inherit
    }

    @media only screen and (min-width:1200px) {
        .container {
            width: 1200px
        }
    }

    @media only screen and (max-width:749px) {
        .container {
            width: 100%
        }
    }

    @media only screen and (max-width:601px) {
        .container {
            width: 100%
        }
    }

    .container .row {
        margin-right: -15px;
        margin-left: -15px
    }

    .row .col {
        padding-right: 15px;
        padding-left: 15px
    }

    sub {
        bottom: 0
    }

    .nav-tabs {
        border-bottom: 0 none
    }

    .nav.nav-tabs li a {
        border-radius: 0;
        margin: 0;
        padding: 0
    }

    .nav.nav-tabs li a:focus,
    .nav.nav-tabs li.active a:focus,
    .nav.nav-tabs li:hover a:focus {
        border: none;
        border-bottom: 2px solid #ff214f
    }

    .custom-tab .nav-tabs>li>a {
        border: none;
        border-bottom: 2px solid #232323;
        font-size: 16px;
        font-weight: 600;
        line-height: 35px;
        padding: 0 10px
    }

    .custom-tab .nav-tabs>li:first-child>a {
        padding-left: 0
    }

    .custom-tab .nav-tabs li.active a,
    .custom-tab .nav-tabs li:hover a {
        background-color: transparent;
        border-color: #ff214f;
        color: #ff214f
    }

    .heading {
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0)
    }

    .heading>h3 {
        font-family: Poppins, sans-serif;
        text-transform: lowercase
    }

    .heading>div.shape {
        left: 120px;
        position: absolute!important;
        right: 0;
        top: -40px;
        z-index: -1
    }

    .custom-select,
    .social-icon li a {
        position: relative
    }

    select {
        -moz-appearance: none;
        -webkit-appearance: none
    }

    input::-moz-placeholder,
    textarea::-moz-placeholder {
        opacity: 1
    }

    input::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder {
        opacity: 1;
        color: #888
    }

    input::-ms-input-placeholder,
    textarea::-ms-input-placeholder {
        opacity: 1;
        color: #888
    }

    .custom-input input,
    .custom-input textarea,
    .custom-select select {
        border: 1px solid #d1d1d1;
        border-radius: 3px;
        -webkit-box-shadow: none;
        box-shadow: none;
        margin-bottom: 30px;
        padding: 0 20px;
        line-height: 54px;
        height: 54px;
        color: #888;
        font-weight: 400;
        width: 100%;
        background-color: transparent;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s
    }

    .custom-input input:focus,
    .custom-input textarea:focus,
    .custom-select select:focus {
        border-color: #ff214f
    }

    .custom-input textarea {
        height: 130px
    }

    .social-link li {
        float: left;
        margin-right: 25px
    }

    .social-link li:last-child {
        margin-right: 0
    }

    .social-link a {
        color: #6c7281;
        font-weight: 300
    }

    .mainmenu li a,
    .mega-column h5 {
        font-weight: 700;
        text-transform: uppercase
    }

    .social-link a:hover {
        color: #fff
    }

    .social-icon li {
        float: left
    }

    .social-icon li a {
        display: block;
        font-size: 14px;
        margin: 0 10px;
        padding: 0;
        text-align: center;
        z-index: 2;
        color: #2c2c2c
    }

    .social-icon.style1 li a::after,
    .social-icon.style2 li a::after {
        background-color: #ff214f;
        position: absolute;
        content: "";
        left: 0
    }

    .social-icon li a:hover {
        color: #ff214f
    }

    .social-icon.style1 li a {
        font-size: 20px;
        height: 42px;
        width: 42px;
        line-height: 42px;
        margin: 0 5px;
        color: #fff;
        border-radius: 50%
    }

    .social-icon.style1 li a::after {
        border-radius: 50%;
        height: 100%;
        opacity: 0;
        top: 0;
        -webkit-transform: scale(1.3);
        -ms-transform: scale(1.3);
        transform: scale(1.3);
        -webkit-transition: all .4s ease 0s;
        -o-transition: all .4s ease 0s;
        transition: all .4s ease 0s;
        width: 100%;
        z-index: -1
    }

    .social-icon.style1 li a:hover::after {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .social-icon.style1 li a:hover {
        color: #fff
    }

    .social-icon.style2 li a {
        color: #232323;
        font-size: 16px;
        margin: 0 3px;
        width: 40px
    }

    .social-icon.style2 li a:hover {
        color: #ff214f
    }

    .social-icon.style2 li:first-child a {
        margin-left: 0
    }

    .social-icon.style2 li a::after {
        top: -10px;
        height: 2px;
        margin: 0 auto;
        right: 0;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s;
        width: 0
    }

    .social-icon.style2 li a:hover::after {
        width: 11px
    }

    .horizontal-line div {
        background: #878787;
        height: 2px;
        margin: 0;
        width: 76px
    }

    .divider hr.line,
    hr.line {
        background-color: #ff214f
    }

    .horizontal-line div.top {
        margin-bottom: 4px;
        width: 180px
    }

    .center .horizontal-line div {
        margin: 0 auto
    }

    .center .horizontal-line div.top {
        margin-bottom: 4px
    }

    hr.line {
        border: 0;
        height: 2px;
        margin: 0;
        width: 20px
    }

    .divider hr.line {
        width: 100%;
        height: 1px
    }

    .divider hr.line.white {
        background-color: rgba(255, 255, 255, .2);
        width: 100%
    }

    .v-shape {
        background-color: #222429;
        display: block;
        height: 40px;
        margin: 10px auto;
        position: relative;
        width: 2px
    }

    .v-shape::after,
    .v-shape::before {
        background-color: #222429;
        bottom: 0;
        content: "";
        height: 24px;
        margin: auto 6px;
        position: absolute;
        top: 0;
        width: 2px
    }

    .v-shape::after {
        right: 0
    }

    .v-shape::before {
        left: 0
    }

    .v-shape.white,
    .v-shape.white::after,
    .v-shape.white::before {
        background-color: #fff
    }

    .navbar-collapse {
        padding: 0
    }

    .mainmenu li {
        float: left;
        margin: 0 16px
    }

    .mainmenu li:last-child {
        margin-right: 2px
    }

    .mainmenu li a {
        display: block;
        font-size: 13px;
        line-height: inherit;
        padding: 0 2px;
        letter-spacing: .4px;
        position: relative;
        color: #fff
    }

    .transparent-white .mainmenu li a {
        color: #222429
    }

    .mainmenu li a.active,
    .mainmenu li:hover a {
        color: #ff214f
    }

    .mainmenu li a::after,
    .portfolio-menu li::after {
        background-color: #ff214f;
        top: 50%;
        margin-top: -1px;
        content: "";
        height: 2px;
        right: 0;
        position: absolute;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s;
        width: 0
    }

    .mainmenu li a.active::after,
    .mainmenu li a:hover::after,
    .portfolio-menu li.active::after,
    .portfolio-menu li:hover::after {
        width: 100%;
        left: 0;
        right: auto
    }

    nav>ul>li>a {
        -webkit-transition: 0s;
        -o-transition: 0s;
        transition: 0s
    }

    .mainmenu .navigation>li>ul,
    .mainmenu .sub-menu {
        position: absolute;
        width: 300px;
        line-height: 1;
        z-index: 100;
        background-color: #fff;
        visibility: hidden;
        padding: 35px 0;
        opacity: 0;
        -webkit-box-shadow: 0 0 15px 0 rgba(30, 28, 28, .1);
        box-shadow: 0 0 15px 0 rgba(30, 28, 28, .1)
    }

    .mainmenu .navigation>li>ul {
        left: 0;
        top: 100%
    }

    .mainmenu .navigation>li:hover>ul {
        opacity: 1;
        visibility: visible
    }

    .mainmenu .navigation>li>ul,
    .mainmenu .navigation>li>ul li {
        -webkit-transform: translate3d(0, -5px, 0);
        transform: translate3d(0, -5px, 0);
        transition: transform .3s ease-out 0s, -webkit-transform .3s ease-out 0s
    }

    .mainmenu .navigation>li:hover>ul,
    .mainmenu .navigation>li:hover>ul li {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }

    .mainmenu .navigation>li>ul li {
        float: none;
        margin: 0;
        padding: 5px 0 5px 50px;
        position: relative;
        width: 100%
    }

    .mainmenu .navigation>li>ul li a {
        font-size: 12px;
        color: #232323;
        display: inline-block;
        padding: 8px 0;
        text-align: left
    }

    .mainmenu .navigation>li>ul ul li:hover a,
    .mainmenu .navigation>li>ul>li a.active,
    .mainmenu .navigation>li>ul>li:hover>a {
        color: #ff214f
    }

    .dropdown ul a i {
        font-size: 15px;
        position: relative;
        padding-left: 2px;
        float: right;
        top: -2px
    }

    .mainmenu .sub-menu {
        left: -100%;
        top: 10px;
        -webkit-transform: translate3d(-15px, 0, 0);
        transform: translate3d(-15px, 0, 0);
        transition: transform .2s ease-out, opacity .2s ease-out, -webkit-transform .2s ease-out
    }

    .mainmenu .dropdown li:hover .sub-menu {
        opacity: 1;
        top: 0;
        visibility: visible;
        -webkit-transform: translate3d(-1px, 0, 0);
        transform: translate3d(-1px, 0, 0)
    }

    .mega-menu {
        position: inherit
    }

    .mainmenu .mega-menu .mega-wrap {
        padding: 80px 0 100px;
        width: 100%;
        text-align: center
    }

    .mega-menu .mega-column {
        display: inline-table;
        padding: 0!important;
        text-align: left;
        width: 300px!important
    }

    .mega-menu .mega-column:last-child {
        width: auto!important
    }

    .mega-column h5 {
        color: #232323;
        font-size: 16px;
        margin-bottom: 20px
    }

    .mega-menu .mega-column li {
        padding: 3px 0!important
    }

    .navbar-toggle .icon-bar {
        background-color: #fff
    }

    .side-menu .navbar-toggle .icon-bar,
    .transparent-white .navbar-toggle .icon-bar {
        background-color: #222429
    }

    .transparent-white .navbar-collapse {
        border-top: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 0;
        padding-right: 0
    }

    .mainmenu .navbar-collapse>ul li.dropdown .dropdown-btn {
        border-radius: 3px;
        cursor: pointer;
        height: 26px;
        position: absolute;
        right: 10px;
        top: 6px;
        width: 30px;
        z-index: 5;
        display: none
    }

    .mainmenu .navbar-collapse>ul li.dropdown .dropdown-btn::after {
        content: "\f107";
        font-size: 20px;
        height: 100%;
        left: 0;
        line-height: 26px;
        position: absolute;
        text-align: center;
        top: 0;
        width: 100%;
        font-family: FontAwesome;
        color: #fff
    }

    .mainmenu .navbar-collapse>ul li.sub-dropdown .dropdown-btn::after {
        color: #000
    }

    .mainmenu .navbar-collapse>ul li.dropdown .dropdown-btn.submenu-icon::after {
        content: "\f106"
    }

    @media (max-width:767px),
    (min-width:768px) and (max-width:991px) {
        .mainmenu {
            width: 100%
        }
        .mainmenu .navbar-collapse {
            height: 300px;
            position: absolute;
            right: 0;
            top: 25px;
            width: 100%
        }
        .mainmenu .navbar-collapse>ul li.dropdown .dropdown-btn {
            display: block
        }
        .mainmenu .navigation>li {
            line-height: 30px
        }
        .mainmenu .navigation>li>.dropdown-btn {
            top: 10px
        }
        .mainmenu .navbar-collapse>.navigation>li ul {
            display: none;
            left: auto!important;
            opacity: 1;
            position: relative;
            right: auto!important;
            top: auto!important;
            -webkit-transition: none 0s ease 0s!important;
            -o-transition: none 0s ease 0s!important;
            transition: none 0s ease 0s!important;
            visibility: visible;
            width: 100%
        }
        .header-bottom .left,
        .mainmenu .navigation li {
            float: none
        }
        .navbar-toggle {
            position: absolute;
            right: 50px;
            top: 20px;
            -webkit-transition: all .3s ease 0s;
            -o-transition: all .3s ease 0s;
            transition: all .3s ease 0s
        }
        .header-top .navbar-collapse {
            background: #fff;
            padding-right: 15px;
            padding-left: 15px;
            -webkit-box-shadow: 0 1px 4px rgba(2, 3, 3, .1);
            box-shadow: 0 1px 4px rgba(2, 3, 3, .1)
        }
        .mainmenu .navigation {
            z-index: 999;
            position: relative
        }
        .mainmenu li:last-child {
            margin-right: 19px
        }
        .dropdown ul a i,
        .mainmenu li a::after {
            display: none
        }
        .mainmenu li.active a,
        .mainmenu li:hover a {
            color: #000
        }
        .mainmenu .navigation>li>ul,
        .mainmenu .navigation>li>ul li,
        .mainmenu .sub-menu {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }
        .mainmenu .navigation>li>ul {
            margin-top: 10px;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            padding: 25px 0
        }
        .mainmenu .navigation>li>ul li {
            padding: 5px 5px 5px 15px
        }
        .mainmenu .sub-menu {
            -webkit-box-shadow: none;
            box-shadow: none;
            padding: 10px 0
        }
        .mainmenu .mega-menu .mega-wrap {
            padding: 30px 0 15px 20px
        }
        .mega-menu .mega-column {
            display: block;
            width: 100%!important
        }
        .mega-column h5 {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 10px;
            margin-top: 15px
        }
        .mega-column:first-child h5 {
            margin-top: 0
        }
        .mega-column .dropdown-btn::after {
            top: -14px!important
        }
        .transparent-white .mainmenu li a {
            color: #fff
        }
    }

    .side-menu .mainmenu {
        line-height: 40px;
        padding: 200px 0
    }

    .side-menu .mainmenu li {
        float: none;
        margin: 0
    }

    .side-menu .mainmenu li a {
        color: #222429;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s
    }

    .header-top.is-sticky .mainmenu a:hover,
    .header-top.is-sticky .mainmenu li.active a,
    .side-menu .mainmenu li a.active,
    .side-menu .mainmenu li a:hover {
        color: #ff214f
    }

    .side-menu .mainmenu li a::after {
        left: 0
    }

    .side-menu .mainmenu li a.active::after,
    .side-menu .mainmenu li a:hover::after {
        width: 40px
    }

    .side-menu .mainmenu .navigation>li>ul {
        left: 100%;
        top: 0
    }

    .side-menu .dropdown li:hover .sub-menu {
        -webkit-transform: translate3d(1px, 0, 0);
        transform: translate3d(1px, 0, 0)
    }

    .side-menu .mainmenu .sub-menu {
        left: 100%
    }

    header.is-sticky {
        line-height: 80px
    }

    .is-sticky .logo .visible {
        display: none!important
    }

    .is-sticky .logo .hidden {
        display: inline-block!important
    }

    #active-sticky.is-sticky {
        left: 0;
        top: 0;
        width: 100%;
        z-index: 999;
        -webkit-box-shadow: 0 1px 4px rgba(2, 3, 3, .15);
        box-shadow: 0 1px 4px rgba(2, 3, 3, .15);
        padding: 0;
        background-color: #111
    }

    #active-sticky.transparent-white.is-sticky {
        background-color: #fff
    }

    @media (max-width:767px),
    (min-width:768px) and (max-width:991px) {
        .navbar-header {
            display: block
        }
        .mainmenu nav.navbar-collapse {
            background: #ff214f;
            display: block;
            opacity: 0;
            padding: 15px 0;
            position: absolute;
            right: 0;
            top: 110%;
            -webkit-transition: all .4s ease 0s;
            -o-transition: all .4s ease 0s;
            transition: all .4s ease 0s;
            visibility: hidden;
            width: 290px!important
        }
        .mainmenu nav.navbar-collapse.in {
            opacity: 1;
            top: 100%;
            visibility: visible
        }
        .mainmenu nav ul li {
            float: none;
            margin-bottom: 10px;
            padding: 0 15px
        }
        #active-sticky.is-sticky {
            padding: 10px 0
        }
        .is-sticky .navbar-toggle {
            top: 12px
        }
    }

    .scale-toggle {
        display: block;
        color: #fff
    }

    .transparent-white .scale-toggle {
        color: #222429
    }

    .scale-toggle i {
        display: block;
        font-size: 13px;
        line-height: inherit;
        margin: 0 25px
    }

    .scale-toggle i.fa-bars {
        font-size: 17px
    }

    .overlay-scale {
        background: rgba(0, 0, 0, .8);
        bottom: 0;
        height: 100vh;
        left: 0;
        margin: 0;
        opacity: 0;
        position: fixed;
        right: 0;
        top: 0;
        -webkit-transition: all .3s cubic-bezier(.4, 0, 1, 1) 0s;
        -o-transition: all .3s cubic-bezier(.4, 0, 1, 1) 0s;
        transition: all .3s cubic-bezier(.4, 0, 1, 1) 0s;
        visibility: hidden;
        width: 100%;
        z-index: 9999999
    }

    .carousel-control,
    .overlay-scale form.search-box,
    .slick-arrow {
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        position: absolute
    }

    .open .overlay-scale {
        opacity: 1;
        visibility: visible
    }


    /*** 
    
    ====================================================================
      03 - Theme Banner
    ====================================================================
    
     ***/

    .open .wrapper,
    body.open {
        height: 100vh
    }

    body.open {
        overflow-y: scroll
    }

    .admin-box .text,
    .comment-list .text,
    .comment-list li,
    .container-outside,
    .featured-service .thumb,
    .gridder-list,
    .hover-style4 .single-portfolio>a,
    .open .wrapper,
    .portfolio-area .portfolio-item,
    .preloader,
    .single-service,
    .style2 .team-member .thumb,
    .style3 .single-service .desc,
    .video-btn>h5,
    .widget .recent-post .desc,
    .widget .recent-post li {
        overflow: hidden
    }

    .close-scale {
        cursor: url(../img/icons/close.png), auto;
        height: 100%;
        position: absolute;
        width: 100%
    }

    .overlay-scale form.search-box {
        bottom: 0;
        height: 60px;
        left: 0;
        margin: auto;
        right: 0;
        top: 0;
        z-index: 10;
        max-width: 100%;
        width: 600px;
        transition: all .3s ease 0s;
        opacity: 0;
        -webkit-transform: scale(1.6);
        -ms-transform: scale(1.6);
        transform: scale(1.6)
    }

    .open .overlay-scale form.search-box {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .overlay-scale .search-box input {
        border: 0;
        font-style: italic;
        line-height: 60px;
        padding: 0 20px;
        width: 100%;
        font-size: 20px
    }

    .overlay-scale .search-box button {
        background-color: #ff214f;
        border: 0;
        color: #fff;
        font-size: 22px;
        line-height: 2.71;
        position: absolute;
        right: 0;
        top: 23px;
        width: 70px;
        -webkit-padding-after: 0
    }

    .is-sticky .overlay-scale .search-box button {
        top: 8px
    }

    @media screen and (max-width:767px) {
        .overlay-scale form.search-box {
            width: 95%
        }
        .overlay-scale .search-box button {
            top: 13px
        }
        .is-sticky .overlay-scale .search-box button {
            top: 3px
        }
    }

    /*** 
    
    ====================================================================
      04 - Carousel
    ====================================================================
    
     ***/

    .carousel-control,
    .slick-arrow {
        background: rgba(35, 35, 35, .4)!important;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 26px;
        height: 50px;
        line-height: 50px;
        margin-top: -25px;
        opacity: 0;
        text-align: center;
        top: 50%;
        transition: all .3s ease 0s;
        width: 50px;
        z-index: 2
    }

    .carousel-control:hover,
    .slick-arrow:hover {
        background: #030d27!important
    }

    .carousel-control.left,
    .slick-arrow.prev {
        left: 0
    }

    .carousel-control.right,
    .slick-arrow.next {
        right: 0
    }

    .carousel:hover .carousel-control.left,
    .slick-slider:hover .slick-arrow.prev {
        left: 20px
    }

    .carousel:hover .carousel-control.right,
    .slick-slider:hover .slick-arrow.next {
        right: 20px
    }

    .carousel:hover .carousel-control,
    .slick-slider:hover .slick-arrow {
        opacity: 1
    }

    .carousel-control:focus {
        opacity: 0
    }

    @media screen and (max-width:767px) {
        .carousel-control,
        .slick-arrow {
            height: 40px;
            line-height: 39px;
            margin-top: -20px;
            width: 40px
        }
    }

    .slick-dots {
        display: inline-block!important;
        margin-top: 90px
    }

    .slick-dots>li {
        float: left;
        margin: 0 5px
    }

    .slick-dots button {
        background-color: transparent;
        border: 1px solid #fff;
        border-radius: 3px;
        cursor: pointer;
        font-size: 0;
        height: 5px;
        padding: 0;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s;
        width: 25px;
        display: block
    }

    .slick-dots .slick-active button {
        background-color: #fff
    }

    #four-item .slick-dots {
        margin-top: 70px
    }

    #four-item .slick-dots button {
        border: 2px solid #fc345e;
        border-radius: 50%;
        height: 14px;
        width: 14px
    }

    #four-item .slick-dots .slick-active button {
        background-color: #fc345e
    }

    #centerMode .slick-dots {
        margin-top: 60px
    }

    #centerMode .slick-dots>li {
        margin: 0
    }

    #centerMode .slick-dots button {
        background-color: #d2d2d2;
        border: 0;
        border-radius: 0;
        font-size: 16px;
        height: 3px;
        width: 124px;
        line-height: 3;
        color: #1f2732;
        font-weight: 600
    }

    #centerMode .slick-dots .slick-active button {
        background-color: #1f2732
    }

    .container-outside {
        position: absolute;
        top: 0;
        right: 0;
        width: 47.1%;
        height: 100%
    }

    .overlay-shape::before {
        height: 731px;
        left: -40px;
        top: -130px;
        -webkit-transform: rotate(-30deg);
        -ms-transform: rotate(-30deg);
        transform: rotate(-30deg);
        width: 491px
    }

    .left.container-outside {
        right: inherit;
        left: 0
    }

    .left .overlay-shape::before {
        left: inherit;
        right: -40px;
        -webkit-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        transform: rotate(30deg)
    }

    .container-outside .heading {
        z-index: 5
    }

    #scene.wrapper {
        -webkit-backface-visibility: unset!important;
        backface-visibility: unset!important;
        -webkit-transform: unset!important;
        -ms-transform: unset!important;
        transform: unset!important;
        -webkit-transform-style: unset!important;
        transform-style: unset!important
    }

    header {
        line-height: 110px
    }

    header .logo {
        width: 120px
    }

    header.fixed {
        left: 0;
        top: 0;
        width: 100%;
        z-index: 5;
        padding-top: 15px;
        -webkit-transition: all .4s ease 0s;
        -o-transition: all .4s ease 0s;
        transition: all .4s ease 0s
    }

    .wrapper {
        width: 100%
    }

    .wrapper .side-menu {
        height: 100%;
        padding-left: 90px;
        width: 330px;
        z-index: 200
    }

    .side-menu header {
        line-height: 1
    }

    @media screen and (max-width:767px) {
        header {
            line-height: 90px
        }
        header.fixed {
            padding-top: 0
        }
        header .logo {
            width: 100px
        }
        #active-sticky.is-sticky {
            padding: 0
        }
        header.is-sticky {
            line-height: 70px
        }
    }

    @media (max-width:767px),
    (min-width:768px) and (max-width:991px) {
        .side-menu header {
            padding: 25px 15px;
            position: relative;
            z-index: 999
        }
        .side-menu header .logo {
            padding-top: 0
        }
        .side-menu .navbar-toggle {
            right: 0;
            top: 20px
        }
        .side-menu .mainmenu {
            line-height: 1;
            padding: 0
        }
        .wrapper .side-menu {
            float: none!important;
            height: auto;
            padding-left: 0;
            position: unset;
            width: 100%
        }
        .side-menu .mainmenu li a {
            color: #fff
        }
        .side-menu .mainmenu nav.navbar-collapse {
            right: 15px
        }
        .side-menu .mainmenu li a.active,
        .side-menu .mainmenu li a:hover {
            color: #222429
        }
        .side-menu .mainmenu .navigation>li {
            line-height: 36px
        }
        footer.side-footer {
            bottom: 10px;
            position: absolute;
            text-align: center;
            width: 100%
        }
        .side-footer .copyright {
            margin-top: 5px
        }
    }

    .circle-wrap,
    .curve-bottom {
        bottom: 0;
        left: 0;
        position: absolute
    }

    .slider-area .mouse-parallax {
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%
    }

    .slider-area .mouse-parallax>div {
        height: 100%
    }

    .slide-caption h1 {
        font-size: 80px;
        line-height: 85px
    }

    .slide-caption p {
        font-weight: 500;
        line-height: 34px
    }

    .height-545 {
        height: 545px
    }

    .style2.slide-caption h1 {
        font-size: 50px;
        line-height: 70px
    }

    .style3.slide-caption h1 {
        color: #222429
    }

    .style4.slide-caption h1 {
        font-size: 120px;
        line-height: 120px;
        font-weight: 800
    }

    /*** 
    
    ====================================================================
      05 - Bottom Shapes
    ====================================================================
    
     ***/

    .curve-bottom {
        height: 100%;
        width: 100%;
        background-image: url(../img/shape/2.png);
        background-repeat: no-repeat;
        background-position: bottom center
    }

    .circle-wrap {
        right: 0;
        top: 0;
        -webkit-transform: translate(50%, 50%);
        -ms-transform: translate(50%, 50%);
        transform: translate(50%, 50%)
    }

    .circle-wrap .circle {
        -webkit-animation: 4s cubic-bezier(.36, .11, .89, .32) 0s normal none infinite running scaleIn;
        animation: 4s cubic-bezier(.36, .11, .89, .32) 0s normal none infinite running scaleIn;
        border: 1px solid rgba(255, 255, 255, .1);
        border-radius: 50%;
        height: 150px;
        margin-left: -75px;
        margin-top: -75px;
        opacity: 0;
        position: absolute;
        width: 150px
    }

    @-webkit-keyframes scaleIn {
        from {
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
            opacity: 1
        }
        to {
            -webkit-transform: scale(6, 6);
            transform: scale(6, 6);
            opacity: 0
        }
    }

    @keyframes scaleIn {
        from {
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
            opacity: 1
        }
        to {
            -webkit-transform: scale(6, 6);
            transform: scale(6, 6);
            opacity: 0
        }
    }

    @media screen and (max-width:767px) {
        .slider-area.height-100 {
            height: 115%
        }
        .slide-caption h1 {
            font-size: 32px;
            line-height: 40px;
            margin-bottom: 15px;
            padding-top: 30px
        }
        .style2.slide-caption h1 {
            font-size: 30px;
            line-height: 45px
        }
        .style3.slide-caption h1 {
            font-size: 42px;
            line-height: 60px
        }
        .slide-caption p {
            font-size: 15px;
            line-height: 26px
        }
        .height-545 {
            height: 450px
        }
        .pagetitle.height-545 {
            height: 250px
        }
        .style4.slide-caption h1 {
            font-size: 40px;
            line-height: 50px;
            padding-top: 0;
            margin-bottom: 30px
        }
    }

    .style1 .image .shape,
    .style3 .image .shape {
        bottom: 200px;
        position: absolute;
        left: -40px;
        width: 100%
    }

    .image.relative>img {
        position: relative;
        z-index: 2
    }

    .video-btn.circle>a {
        background-color: #ff214f;
        border-radius: 50%;
        color: #fff;
        display: block;
        float: left;
        font-size: 18px;
        height: 53px;
        line-height: 53px;
        text-align: center;
        width: 53px;
        -webkit-animation: white-shadow 1s infinite, red-shadow 1s infinite;
        animation: white-shadow 1s infinite, red-shadow 1s infinite
    }

    .video-btn>h5 {
        color: #232323;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 0;
        padding: 18px 0 0 15px
    }

    .about-text h1 {
        line-height: 54px
    }

    .style1 .about-text {
        padding-left: 50px;
        margin-right: -40px
    }

    .style2 .video-btn {
        border-bottom: 3px dashed #41228e
    }

    .style2 .video-btn.circle>a {
        -webkit-animation-name: white-shadow, blue-shadow;
        animation-name: white-shadow, blue-shadow;
        background-color: #41228e;
        display: inline-block;
        float: none;
        position: relative;
        top: 26.5px
    }

    .style3.about-area .heading>div.shape {
        left: 50px
    }

    /*** 
    
    ====================================================================
      06 - Portfolio
    ====================================================================
    
     ***/

    .portfolio-menu ul {
        display: inline-block
    }

    .portfolio-menu ul li {
        color: #222429;
        cursor: pointer;
        float: left;
        font-family: Montserrat, sans-serif;
        font-size: 13px;
        font-weight: 700;
        line-height: 1;
        margin: 0 18px;
        position: relative;
        text-transform: uppercase;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s
    }

    .blog-post .content h4,
    .client-info .name h4,
    .client-info .name h6,
    .project-info li h5,
    .single-service h4,
    .team-member h3,
    .team-member h4 {
        font-family: Poppins, sans-serif
    }

    .portfolio-menu li::after {
        background-color: #ff214f;
        bottom: -3px;
        left: 0
    }

    .portfolio-menu ul li.active,
    .portfolio-menu ul li:hover {
        color: #ff214f
    }

    .portfolio-menu li.active::after,
    .portfolio-menu li:hover::after {
        width: 50%
    }

    @media screen and (max-width:767px) {
        .portfolio-menu ul li {
            margin: 8px 15px
        }
        .portfolio-menu .mb-70 {
            margin-bottom: 30px
        }
    }

    .portfolio-area .portfolio-grid {
        margin: 0 -15px -30px
    }

    .portfolio-area .grid-item,
    .portfolio-area .portfolio-item {
        margin-bottom: 30px;
        padding: 0 15px
    }

    .portfolio-area .portfolio-item {
        float: left
    }

    .single-portfolio.overlay::before {
        opacity: 0;
        -webkit-transition: all .5s ease 0s;
        -o-transition: all .5s ease 0s;
        transition: all .5s ease 0s;
        -webkit-transform: scaleX(1.2);
        -ms-transform: scaleX(1.2);
        transform: scaleX(1.2)
    }

    .project-title h3,
    .project-title h6,
    .style2 .single-service {
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s
    }

    .single-portfolio.overlay:hover::before {
        opacity: 1;
        -webkit-transform: scaleX(1);
        -ms-transform: scaleX(1);
        transform: scaleX(1)
    }

    .project-title {
        bottom: 35px;
        left: 35px;
        position: absolute;
        z-index: 2
    }

    .small .project-title {
        bottom: 20px;
        left: 30px
    }

    .project-title h3 {
        font-weight: 700
    }

    .project-title h3,
    .project-title h6 {
        opacity: 0;
        position: relative;
        top: 20px;
        transition: all .3s ease 0s
    }

    .project-title h6 {
        line-height: 24px;
        margin-bottom: 0;
        -webkit-transition-delay: 0s;
        -o-transition-delay: 0s;
        transition-delay: 0s
    }

    .single-portfolio:hover .project-title h6 {
        -webkit-transition-delay: .2s;
        -o-transition-delay: .2s;
        transition-delay: .2s
    }

    .single-portfolio:hover .project-title h3,
    .single-portfolio:hover .project-title h6 {
        opacity: 1;
        top: 0
    }

    .single-portfolio .icon a {
        color: #fff;
        display: block;
        font-size: 40px;
        opacity: 0;
        position: absolute;
        right: 60px;
        bottom: 65px;
        -webkit-transform: scale(.5);
        -ms-transform: scale(.5);
        transform: scale(.5);
        -webkit-transition: all .4s ease 0s;
        -o-transition: all .4s ease 0s;
        transition: all .4s ease 0s
    }

    .single-portfolio:hover .icon a {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .hover-style2 .project-title {
        bottom: 50%;
        left: 0;
        right: 0;
        text-align: center;
        margin-bottom: -30px
    }

    .hover-style2 .single-portfolio {
        cursor: pointer
    }

    .hover-style2 .project-title h3 {
        font-size: 24px
    }

    .gridder-list {
        display: inline-block;
        margin: 0 -2px -9px
    }

    .gridder-show {
        background-color: #030d27;
        display: block;
        float: left;
        position: relative;
        width: 100%
    }

    .gridder-padding {
        padding: 120px 0
    }

    .gridder-content {
        display: none
    }

    .gridder-navigation .gridder-close {
        cursor: pointer;
        height: 30px;
        padding: 7px;
        position: absolute;
        right: 10px;
        top: 10px;
        width: 30px;
        z-index: 2;
        background-image: url(../img/icons/close.png);
        background-repeat: no-repeat;
        background-position: center center
    }

    .gridder-nav {
        background: #293147;
        color: #fff;
        display: block;
        font-size: 30px;
        height: 100px;
        line-height: 100px;
        margin-top: -50px;
        position: absolute;
        text-align: center;
        top: 50%;
        width: 50px
    }

    .gridder-nav.next {
        right: 0
    }

    .gridder-nav.prev {
        left: 0
    }

    .gridder-nav.disabled {
        cursor: not-allowed;
        opacity: .5
    }

    .selectedItem .single-portfolio.overlay::before {
        opacity: 1;
        -webkit-transform: scaleX(1);
        -ms-transform: scaleX(1);
        transform: scaleX(1)
    }

    .project-details p {
        font-size: 16px;
        font-weight: 500;
        line-height: 28px
    }

    .gridder-grid .project-details p {
        color: #bebebe;
        width: 410px
    }

    .project-info li {
        margin-bottom: 25px
    }

    .project-info li h5 {
        margin-bottom: 10px
    }

    .project-info li p {
        font-size: 15px;
        font-weight: 400;
        line-height: 1
    }

    .gridderGallery {
        margin-right: 28px
    }

    @media screen and (max-width:767px) {
        .gridder-padding {
            padding: 60px 0
        }
        .project-details.pt-65.pl-35 {
            padding-left: 0;
            padding-top: 30px
        }
        .project-details h2 {
            font-size: 25px
        }
        .gridder-grid .project-details p {
            width: auto
        }
        .gridder-nav {
            height: 70px;
            line-height: 70px;
            margin-top: -35px;
            width: 30px;
            z-index: 2
        }
        .gridderGallery {
            margin-right: 0
        }
    }

    .portfolio-three .portfolio-grid {
        margin: 0 -30px -60px
    }

    .portfolio-three .grid-item {
        margin-bottom: 60px;
        padding: 0 30px
    }

    .hover-style3 .single-portfolio.overlay::before {
        top: unset;
        bottom: 0;
        height: 0;
        right: 0;
        width: 100%;
        -webkit-transform: unset;
        -ms-transform: unset;
        transform: unset;
        -webkit-transition: all .5s cubic-bezier(.77, 0, .175, 1) 0s;
        -o-transition: all .5s cubic-bezier(.77, 0, .175, 1) 0s;
        transition: all .5s cubic-bezier(.77, 0, .175, 1) 0s
    }

    .hover-style3 .single-portfolio.overlay:hover::before {
        bottom: auto;
        height: 100%;
        top: 0
    }

    #four-item .slick-list {
        margin: 0 -15px
    }

    #four-item .slick-slide {
        margin: 0 15px
    }

    .hover-style4 .single-portfolio>a {
        display: block
    }

    .hover-style4 .single-portfolio>a img {
        -webkit-transition: all .3s ease-in-out 0s;
        -o-transition: all .3s ease-in-out 0s;
        transition: all .3s ease-in-out 0s
    }

    .hover-style4 .single-portfolio:hover>a img {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1)
    }

    .hover-style4 .project-title {
        position: inherit
    }

    .hover-style4 .single-portfolio .project-title h3 {
        top: 0;
        opacity: 1;
        color: #232323
    }

    .hover-style4 .single-portfolio .project-title a:hover h3 {
        color: #ff214f
    }

    .hover-style4 .project-title h5 {
        color: #232323;
        font-size: 14px;
        font-weight: 400
    }

    .wrapper .portfolio-five {
        padding-left: 330px
    }

    .portfolio-five .grid-item {
        margin-bottom: 10px;
        padding: 0 5px
    }

    .portfolio-five .portfolio-grid {
        margin: 0 -5px -10px
    }

    .portfolio-five .single-portfolio.overlay::before {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9);
        -webkit-transition: all .6s ease 0s;
        -o-transition: all .6s ease 0s;
        transition: all .6s ease 0s
    }

    .portfolio-five .single-portfolio:hover.overlay::before {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    @media (max-width:767px),
    (min-width:768px) and (max-width:991px) {
        .wrapper .portfolio-five {
            padding-left: 0
        }
        .portfolio-five .portfolio-grid {
            margin: 0
        }
        .portfolio-five .grid-item {
            margin-bottom: 15px;
            padding: 0 15px
        }
        .portfolio-five .load-btn {
            margin-bottom: 100px
        }
    }

    .portfolio-six .slick-slider {
        padding: 0 8px
    }

    .portfolio-six .grid-item {
        margin-bottom: 0;
        padding: 0 8px
    }

    .portfolio-six .single-portfolio.overlay::before {
        -webkit-transform: scaleY(.8);
        -ms-transform: scaleY(.8);
        transform: scaleY(.8)
    }

    .portfolio-six .single-portfolio:hover.overlay::before {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .portfolio-six .project-title h3 {
        color: #fff
    }

    .portfolio-six .project-title h5 {
        opacity: 0
    }

    .portfolio-six .single-portfolio:hover h5 {
        opacity: 1
    }

    .one-item.testimonial {
        cursor: move
    }

    span.quotes {
        font-size: 200px;
        font-weight: 500;
        line-height: 1;
        position: absolute;
        top: 0;
        left: 0;
        right: 0
    }

    .testimonial .item>p {
        font-size: 24px;
        line-height: 40px;
        margin-top: 65px
    }

    /*** 
    
    ====================================================================
      07 - Clients
    ====================================================================
    
     ***/

    .client-info {
        display: inline-block
    }

    .client-info .name {
        display: block;
        float: left
    }

    .client-info>img {
        border-radius: 50%;
        float: left;
        width: 80px
    }

    .testimonial-box .item {
        padding: 85px 50px 0 70px
    }

    .testimonial-box {
        border-radius: 8px
    }

    .testimonial-box.style2 .item>p {
        color: #313131;
        font-size: 18px;
        line-height: 31px;
        margin-top: 0
    }

    .style2 .client-info .name h4 {
        color: #2f2f2f;
        font-weight: 700
    }

    .style2 .client-info .name h6 {
        font-size: 15px
    }

    .testimonial-box .slick-dots {
        display: -webkit-box!important;
        display: -ms-flexbox!important;
        display: flex!important;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin-top: 30px
    }

    .testimonial-box .slick-dots button {
        background-color: #2f2f2f;
        border: 0;
        border-radius: 50%;
        height: 8px;
        width: 8px
    }

    .testimonial-box .slick-dots .slick-active button {
        background-color: #ff214f
    }

    /*** 
    
    ====================================================================
      08 - Team
    ====================================================================
    
     ***/

    .team-member .social-icon {
        left: 0;
        margin-top: -32px;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 50%;
        -webkit-transition: all .5s ease 0s;
        -o-transition: all .5s ease 0s;
        transition: all .5s ease 0s
    }

    .team-member:hover .social-icon {
        opacity: 1
    }

    .team-member .thumb.overlay::before {
        opacity: 0;
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1)
    }

    .team-member:hover .thumb.overlay::before {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .team-member h3 {
        font-size: 26px;
        font-weight: 700
    }

    .team-member h4 {
        font-size: 18px;
        font-weight: 400
    }

    .team-member>p {
        color: #696969;
        font-size: 15px;
        line-height: 26px
    }

    .style2 .team-member:hover .thumb img {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1)
    }

    .style2 .team-member .thumb img {
        -webkit-transition: all .4s ease 0s;
        -o-transition: all .4s ease 0s;
        transition: all .4s ease 0s
    }

    .style2 .team-member .social-icon {
        left: -10px;
        margin-top: 15px;
        opacity: 1;
        position: relative;
        top: 0
    }

    .style2 .team-member .social-icon li a {
        color: #ff214f;
        font-size: 16px;
        -webkit-transition: all 0s ease 0s;
        -o-transition: all 0s ease 0s;
        transition: all 0s ease 0s
    }

    .style2 .team-member .social-icon li a:hover {
        -webkit-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2)
    }

    .style1.fun-facts-area.overlay::before {
        background-image: url(../img/bg/pattern/1.png)
    }

    .single-facts .icon {
        color: #fff;
        font-size: 60px
    }

    .single-facts .text {
        overflow: hidden
    }

    .single-facts .text>h1 {
        font-size: 44px;
        font-weight: 800
    }

    .single-facts hr.line {
        background-color: #fff;
        height: 1px;
        width: 88px
    }

    .single-service .service-bg,
    .single-service.overlay::before {
        -webkit-transition: all .4s ease 0s;
        -o-transition: all .4s ease 0s;
        transition: all .4s ease 0s
    }

    .single-service {
        border-radius: 10px;
        -webkit-box-shadow: 0 5px 10px 0 rgba(33, 29, 30, .15);
        box-shadow: 0 5px 10px 0 rgba(33, 29, 30, .15);
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0)
    }

    .single-service.overlay::before {
        opacity: 0;
        border-radius: 10px
    }

    /*** 
    
    ====================================================================
      09 - Services
    ====================================================================
    
     ***/

    .service-bg.bg-1 {
        background-image: url(../img/service/1.jpg)
    }

    .service-bg.bg-2 {
        background-image: url(../img/service/2.jpg)
    }

    .service-bg.bg-3 {
        background-image: url(../img/service/3.jpg)
    }

    .service-bg.bg-4 {
        background-image: url(../img/service/4.jpg)
    }

    .single-service .service-bg {
        position: absolute;
        height: 100%;
        width: 100%;
        opacity: 0;
        left: 0;
        top: 0;
        z-index: -1
    }

    .single-service:hover .service-bg,
    .single-service:hover.overlay::before {
        opacity: 1
    }

    .single-service .text {
        padding: 100px 20px
    }

    .single-service .relative {
        z-index: 2
    }

    .single-service i {
        color: #ff214f;
        font-size: 60px;
        margin-bottom: 15px
    }

    .single-service p {
        color: #575656;
        font-size: 15px;
        line-height: 30px
    }

    .single-service:hover h4,
    .single-service:hover i,
    .single-service:hover p,
    .style2 .single-service h4,
    .style2 .single-service i,
    .style2 .single-service p,
    .style3 .single-service h4,
    .style3 .single-service i {
        color: #fff
    }

    .services-area.style2 .row {
        margin: 0 -130px
    }

    .services-area.style2 .single-service .text {
        padding: 85px 30px 80px
    }

    .style2 .single-service {
        border: 2px solid #1d263d;
        transition: all .3s ease 0s
    }

    .style1.brand-logo li img,
    a.read-more i {
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s
    }

    .style2 .single-service:hover {
        background-color: #030d27;
        border-color: transparent
    }

    .theme-bg.style2 .single-service {
        border-color: #5d41a5;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .theme-bg.style2 .single-service:hover {
        background-color: #5d41a5
    }

    .bg-style.style2 .single-service {
        border-color: transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
        background-color: rgba(255, 255, 255, .08)
    }

    .bg-style.style2 .single-service:hover {
        background-color: rgba(255, 255, 255, .15)
    }

    .height-600 {
        height: 600px
    }

    .equal-style {
        padding: 0 170px 0 120px
    }

    .style3 .single-service .icon {
        width: 60px;
        float: left
    }

    .style3 .single-service i {
        font-size: 40px;
        margin-bottom: 0;
        line-height: 38px
    }

    .style3 .single-service h4 {
        font-size: 16px;
        font-weight: 500
    }

    .style3 .single-service p {
        color: #858585;
        font-size: 14px;
        line-height: 26px
    }

    .style1.brand-logo {
        margin: 0 -45px
    }

    .style1.brand-logo ul>li {
        float: left;
        margin-right: 175px
    }

    .style1.brand-logo ul>li:last-child {
        margin-right: 0
    }

    .style1.brand-logo li img {
        -webkit-filter: brightness(0) invert(1);
        filter: brightness(0) invert(1);
        transition: all .3s ease 0s
    }

    .style1.brand-logo ul>li:hover img {
        -webkit-filter: unset;
        filter: unset
    }

    .style1 .blog-post {
        -webkit-box-shadow: 0 5px 10px 0 rgba(33, 29, 30, .15);
        box-shadow: 0 5px 10px 0 rgba(33, 29, 30, .15)
    }

    .style1 .blog-post .content {
        padding: 35px 25px 35px 40px
    }

    /*** 
    
    ====================================================================
      10 - Blog
    ====================================================================
    
     ***/

    .blog-post .thumb img {
        -webkit-transition: all .3s ease-in-out 0s;
        -o-transition: all .3s ease-in-out 0s;
        transition: all .3s ease-in-out 0s
    }

    .blog-post:hover .thumb img {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1)
    }

    .blog-post .content>h5 {
        font-size: 14px
    }

    .blog-post .content h4 {
        font-size: 18px;
        font-weight: 700;
        line-height: 26px;
        color: #232f3e;
    }

    .blog-post .content a:hover h4 {
        color: #ef6b03
    }

    .blog-post .content>p {
        color: #7f7f7f;
        font-size: 14px;
        line-height: 25px
    }

    a.read-more {
        font-size: 13px
    }
    a.read-more:hover{
        color: #ef6a21;
    }
    a.read-more i {
        padding-left: 5px;
        transition: all .3s ease 0s
    }

    a.read-more:hover i {
        padding-left: 10px
    }

    .side-footer .social-icon ul {
        margin-left: -10px
    }

    .side-footer .social-icon h6 {
        color: #2c2c2c;
        font-size: 12px;
        font-weight: 700
    }

    .side-footer .copyright>p,
    .side-footer .copyright>p a {
        color: #2c2c2c;
        font-weight: 400
    }

    .footer-widget .title h5 {
        font-weight: 700
    }

    .footer-widget.about>p {
        font-family: Montserrat, sans-serif;
        font-size: 14px;
        line-height: 26px
    }

    .admin-box .text h3,
    .admin-box .text>h6,
    .column-2 .project-title h3,
    .column-2 .project-title h6,
    .column-3 .project-title h3,
    .column-3 .project-title h6,
    .comment-area .title h4,
    .comment-list .text h3,
    .copyright>p a,
    .featured-service>h3,
    .gallery-type .project-title h6,
    .hover-style5 .project-title h6,
    .info-box p,
    .info-box p a,
    .masonry-type .project-title h6,
    .pinterest-type .project-title h6,
    .single-post .content h3,
    .standard-type .single-portfolio .project-title h3,
    .tag-share a,
    .widget .category li a {
        font-family: Poppins, sans-serif
    }

    .footer-widget.contact-info li,
    .footer-widget.contact-info li a {
        font-weight: 500
    }

    .footer-widget.contact-info li a {
        text-transform: lowercase
    }

    .footer-widget.contact-info li,
    .footer-widget.contact-info li a,
    .footer-widget.footer-menu a {
        line-height: 32px
    }

    .footer-widget.contact-info li a:hover,
    .footer-widget.footer-menu a:hover {
        color: #fff
    }

    .copyright>p,
    .footer-widget.about>p,
    .footer-widget.contact-info li,
    .footer-widget.contact-info li a,
    .footer-widget.footer-menu a {
        color: #6c7281
    }

    footer .social-link {
        padding-top: 4px
    }

    .copyright>p {
        font-size: 14px;
        font-weight: 300
    }

    .copyright>p a {
        color: #fff;
        font-weight: 300
    }

    .copyright>p a:hover {
        color: #ff214f
    }

    .my-info>h1 {
        line-height: 54px
    }

    .my-info>p {
        color: #232323;
        line-height: 30px
    }

    .skill-progress {
        width: 420px
    }

    .skill-bar {
        margin-bottom: 13px
    }

    .skill-progress .skill-bar:last-child {
        margin-bottom: 0
    }

    .progress-wrapper {
        width: 100%;
        z-index: 10
    }

    /*** 
    
    ====================================================================
      Progress bar
    ====================================================================
    
     ***/

    .progress-mark {
        float: right
    }

    .progress-mark span,
    .progress-title-holder {
        color: #363636;
        font-weight: 600
    }

    .progress-mark span {
        font-size: 16px;
        color: #3d3d3d
    }

    .progress-outter {
        background-color: #eee
    }

    .progress-content {
        background-color: #030d27;
        width: 0%
    }

    .skill-bar:nth-child(1) .progress-content {
        background-color: #ff214f
    }

    .skill-bar:nth-child(3) .progress-content {
        background-color: #41228e
    }

    .progress-content,
    .progress-outter {
        height: 8px
    }

    .clients-text h2 {
        color: #232323;
        line-height: 42px
    }

    .clients-text p {
        margin-right: -25px
    }

    .client-logos>ul {
        border: 1px solid #d5d5d5;
        padding: 40px
    }

    .client-logos li {
        display: flex;
        display: -webkit-box;
        display: -ms-flexbox;
        float: left;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 50%
    }

    .client-logos li a {
        display: table-cell;
        vertical-align: middle;
        height: 200px
    }

    .client-logos li:nth-child(-n+2) {
        border-bottom: 1px solid #d5d5d5
    }

    .client-logos li:nth-child(2n+1) {
        border-right: 1px solid #d5d5d5
    }

    .client-logos li img {
        -webkit-filter: brightness(0) invert(0);
        filter: brightness(0) invert(0);
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s
    }

    .client-logos li:hover img {
        -webkit-filter: brightness(1) invert(0);
        filter: brightness(1) invert(0)
    }

    .cta-text>h1 {
        line-height: 52px;
        text-transform: inherit;
        margin-top: -6px
    }

    /*** 
    
    ====================================================================
      feature services
    ====================================================================
    
     ***/

    .featured-service .thumb img {
        -webkit-transition: all .5s ease 0s;
        -o-transition: all .5s ease 0s;
        transition: all .5s ease 0s
    }

    .featured-service:hover .thumb img {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1)
    }

    .featured-service>p {
        color: #999;
        font-size: 15px;
        line-height: 28px
    }

    .best-service h2 {
        color: #232323;
        line-height: 42px
    }

    .best-service .tab-content p {
        font-size: 16px;
        line-height: 28px;
        margin-right: -20px
    }

    .best-service-area.style1 .image .shape {
        bottom: 100px;
        left: -20px
    }

    .classic .blog-post .content {
        padding-top: 48px
    }

    .classic .blog-post .content>p,
    .list-blog .blog-post .content>p {
        color: #636363
    }

    .classic .blog-post .divider,
    .list-blog .blog-post .divider,
    .masonry .blog-post .divider {
        margin: 18px 0 20px
    }

    .classic .blog-post .divider hr.line,
    .list-blog .blog-post .divider hr.line,
    .masonry .blog-post .divider hr.line {
        background-color: #c9c9c9
    }

    @media only screen and (min-width:1200px) {
        .standard .blog-post {
            margin-left: -30px;
            margin-right: -30px
        }
    }

    .standard .blog-post .content h4 {
        font-size: 24px
    }

    .standard .blog-post .content>p {
        color: #6e6e6e;
        font-size: 16px;
        line-height: 28px
    }

    .standard .blog-post .thumb img {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .standard .blog-post .overlay::before,
    .standard .blog-post .video-btn {
        opacity: 0;
        z-index: 2
    }

    .standard .blog-post:hover .overlay::before,
    .standard .blog-post:hover .video-btn {
        opacity: 1
    }

    .portfolio-details .thumb .video-btn,
    .standard .blog-post .video-btn {
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transition: all .4s ease 0s;
        -o-transition: all .4s ease 0s;
        transition: all .4s ease 0s;
        z-index: 5
    }

    /*** 
    
    ====================================================================
      Post Gallery
    ====================================================================
    
     ***/

    .post-gallery .carousel-control {
        background-color: #fff!important;
        background-image: none!important;
        border-radius: 0;
        color: #232323;
        font-size: 30px;
        height: 80px;
        line-height: 80px;
        margin-top: -40px;
        width: 48px
    }

    .post-gallery .carousel-control:hover {
        background-color: #ff214f!important;
        color: #fff
    }

    .post-gallery .carousel .carousel-control.left {
        left: 0
    }

    .post-gallery .carousel .carousel-control.right {
        right: 0
    }

    .blog-post.without-thumb {
        -webkit-box-shadow: 0 0 1px rgba(30, 27, 28, .5) inset;
        box-shadow: 0 0 1px rgba(30, 27, 28, .5) inset;
        padding: 45px 27px 35px 35px
    }

    .blog-post.on-bg .content {
        background-color: rgba(3, 13, 39, .85);
        height: 100%;
        left: 0;
        padding: 40px 25px 0 37px;
        position: absolute;
        top: 0;
        width: 100%
    }

    .blog-post.on-bg .content a,
    .blog-post.on-bg .content h4,
    .blog-post.on-bg .content p,
    .image-blog .blog-post .content h4 {
        color: #fff
    }

    .blog-post.on-bg .content a:hover {
        color: #ff214f
    }

    .image-blog .blog-post .thumb img {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .image-blog .blog-post .content {
        position: absolute;
        bottom: 30px;
        left: 40px;
        z-index: 5
    }

    .image-blog .blog-post .content a:hover h4 {
        color: #fff
    }

    .image-blog .blog-post .overlay,
    .image-blog .blog-post .overlay:after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255, .8)), to(transparent));
        background: -webkit-linear-gradient(rgba(255, 255, 255, .8), transparent);
        background: -o-linear-gradient(rgba(255, 255, 255, .8), transparent);
        background: linear-gradient(rgba(255, 255, 255, .8), transparent)
    }

    .image-blog .blog-post .overlay:after {
        content: "";
        -webkit-transition: opacity .5s ease-out;
        -o-transition: opacity .5s ease-out;
        transition: opacity .5s ease-out;
        opacity: 1;
        background: -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(3, 13, 39, .8)));
        background: -webkit-linear-gradient(transparent, rgba(3, 13, 39, .8));
        background: -o-linear-gradient(transparent, rgba(3, 13, 39, .8));
        background: linear-gradient(transparent, rgba(3, 13, 39, .8))
    }

    .image-blog .blog-post:hover .overlay:after {
        opacity: 0
    }

    .image-blog .blog-post .overlay::before {
        top: 100%;
        -webkit-transition: all .5s ease 0s;
        -o-transition: all .5s ease 0s;
        transition: all .5s ease 0s;
        background: -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 33, 79, .8)));
        background: -webkit-linear-gradient(transparent, rgba(255, 33, 79, .8));
        background: -o-linear-gradient(transparent, rgba(255, 33, 79, .8));
        background: linear-gradient(transparent, rgba(255, 33, 79, .8))
    }

    .image-blog .blog-post:hover .overlay::before {
        top: 0
    }

    .single-post .content>p {
        color: #6e6e6e;
        font-size: 16px
    }

    .single-post .content h3 {
        font-size: 24px;
        font-weight: 700
    }

    /*** 
    
    ====================================================================
      Blockquote
    ====================================================================
    
     ***/

    blockquote p {
        color: #525252;
        font-size: 20px;
        line-height: 34px;
        margin-bottom: 15px
    }

    blockquote.gray-bg i {
        color: #565656;
        font-size: 44px;
        margin-bottom: 10px
    }

    blockquote>h4 {
        color: #3e3e3e;
        font-weight: 700
    }

    .single-post blockquote {
        border: 0;
        padding: 45px 0
    }

    blockquote hr.line {
        background-color: #3e3e3e;
        margin: 0 auto;
        width: 40px
    }

    /*** 
    
    ====================================================================
      Share icons
    ====================================================================
    
     ***/

    .tag-share strong {
        color: #3e3e3e;
        font-size: 16px;
        font-weight: 600
    }

    .tag-share a {
        color: #6e6e6e;
        font-size: 16px;
        font-weight: 400;
        padding-left: 5px
    }

    .single-post .divider hr.line {
        background-color: #d8d8d8
    }

    .tag-share .social-icon {
        position: relative;
        top: 5px
    }

    .tag-share .social-icon li a {
        color: #575757
    }

    .tag-share .social-icon li a:hover,
    .tag-share a:hover {
        color: #ff214f
    }

    .admin-box {
        border: 1px solid #d8d8d8;
        padding: 35px 30px 35px 40px
    }

    .admin-img,
    .commenter-img {
        width: 100px
    }

    .admin-box .text h3,
    .comment-list .text h3 {
        color: #3e3e3e;
        font-size: 20px;
        font-weight: 700
    }

    .admin-box .text>h6 {
        font-weight: 600;
        margin-bottom: 3px
    }

    .admin-box .text>h6,
    .admin-box .text>p,
    .comment-list .text>p {
        color: #6e6e6e
    }

    .admin-box .text>p,
    .comment-list .text>p {
        font-size: 16px;
        line-height: 26px
    }

    .comment-area .title h4 {
        color: #3e3e3e;
        font-weight: 700;
        text-transform: uppercase
    }

    .comment-area .title hr.line {
        background-color: #3e3e3e;
        width: 60px
    }

    .reply-btn a {
        border: 1px solid #ececec;
        border-radius: 5px;
        color: #343434;
        display: block;
        font-size: 12px;
        font-weight: 600;
        height: 26px;
        line-height: 24px;
        padding: 0 20px
    }

    .reply-btn a:hover {
        background-color: #ff214f;
        border-color: #ff214f;
        color: #fff
    }

    .comment-list li {
        margin-bottom: 40px
    }

    .comment-list li:last-child {
        margin-bottom: 0
    }

    .comment-list li.reply {
        border-bottom: 1px solid #d8d8d8;
        border-top: 1px solid #d8d8d8;
        margin-left: 125px;
        margin-top: -10px;
        padding: 40px 0
    }

    .comment-box .custom-input input,
    .comment-box .custom-input textarea {
        background-color: #fcfcfc;
        border-color: #ececec;
        border-radius: 5px;
        color: #707070;
        height: 46px;
        line-height: 46px
    }

    .comment-box .custom-input textarea {
        height: 125px
    }

    .audio-post iframe {
        width: 100%
    }

    .rt-pagination ul {
        display: inline-block;
        margin-bottom: -9px
    }

    .rt-pagination li {
        float: left;
        margin: 0 10px
    }

    .rt-pagination li a {
        border: 2px solid #232f3e;
        color: #232f3e;
        display: block;
        height: 50px;
        line-height: 48px;
        width: 50px;
        font-weight: 700;
        font-size: 20px
    }

    .rt-pagination .active>a,
    .rt-pagination li:hover a {
        border-color: #f76c02;
        color: #f76c02
    }

    .sidebar .widget-title {
        border-bottom: 1px solid #d8d8d8
    }

    .sidebar .widget {
        padding: 30px
    }

    .sidebar .widget-title>h4 {
        font-family: Poppins, sans-serif;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 13px
    }

    /*** 
    
    ====================================================================
      Widgets
    ====================================================================
    
     ***/

    .widget .search input {
        border: 0;
        color: #9e9e9e;
        height: 40px;
        padding: 0 15px;
        width: 100%
    }

    .widget .search form {
        position: relative
    }

    .widget .search button {
        background-color: #fff;
        border: 0;
        color: #f07a00;
        height: 40px;
        position: absolute;
        top: 0;
        right: 0;
        width: 40px
    }

    .widget .about>p,
    .widget .category li a {
        color: #6c6c6c;
        font-size: 14px;
        font-weight: 500
    }

    .widget .about>p {
        line-height: 26px;
        margin-right: -10px;
        padding-top: 25px
    }

    .widget .category li {
        line-height: 32px
    }

    .widget .category li a {
        line-height: 34px;
        display: block
    }

    .widget .category li a:hover,
    .widget .recent-post .desc a:hover p {
        color: #fc345e
    }

    .widget .recent-post li {
        display: block;
        margin-bottom: 20px
    }

    .widget .recent-post li:last-child {
        margin-bottom: 0
    }

    .widget .recent-post .desc {
        padding-top: 3px
    }

    .widget .recent-post .desc h6 {
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 5px
    }

    .widget .recent-post .desc p {
        color: #393939;
        font-size: 14px;
        font-weight: 600;
        line-height: 22px;
        margin-right: -2px;
        text-transform: none;
        -webkit-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s
    }

    /*** 
    
    ====================================================================
      Info Boxes
    ====================================================================
    
     ***/

    .info-box i {
        color: #232323;
        font-size: 45px;
        font-weight: 600;
        margin-bottom: 30px
    }

    .info-box h6 {
        font-weight: 700;
        text-transform: uppercase
    }

    .info-box p,
    .info-box p a {
        color: #585858;
        display: block;
        font-weight: 500;
        line-height: 28px;
        font-size: 16px
    }

    .info-box p a {
        text-transform: lowercase
    }

    .info-box p a:hover {
        color: #ff214f
    }

    .contact-info-area .equal-style {
        padding: 0 0 0 60px;
        width: 700px
    }

    .info-box.mb-135 {
        margin-bottom: 135px
    }

    /*** 
    
    ====================================================================
      Contact Form
    ====================================================================
    
     ***/

    #googleMap.google-map {
        width: 100%
    }

    @media (max-width:767px) {
        #googleMap.google-map {
            height: 350px;
            width: 100%
        }
    }

    .standard-type .single-portfolio .project-title h3 {
        color: #1f2732
    }

    .carusel-type .project-title a:hover h3,
    .column-2 .project-title a:hover h3,
    .column-3 .project-title a:hover h3,
    .column-4 .project-title h5,
    .column-5.wide .project-title a:hover h3,
    .masonry-type .project-title a:hover h3,
    .pinterest-type .project-title a:hover h3 {
        color: #ff214f
    }

    .standard-type .single-portfolio .project-title h5 {
        color: #ff214f;
        font-size: 15px;
        font-weight: 500
    }

    .pinterest-type .container .row {
        margin-left: -5px;
        margin-right: -5px
    }

    .pinterest-type>.container {
        margin-bottom: -10px
    }

    .pinterest-type .col-xs-12 {
        padding-left: 5px;
        padding-right: 5px
    }

    .pinterest-type .single-portfolio.overlay::before {
        -webkit-transform: scaleY(1.1);
        -ms-transform: scaleY(1.1);
        transform: scaleY(1.1)
    }

    .pinterest-type .single-portfolio:hover.overlay::before {
        -webkit-transform: scaleY(1);
        -ms-transform: scaleY(1);
        transform: scaleY(1)
    }

    .pinterest-type .project-title {
        bottom: 30px;
        left: 20px
    }

    .masonry-type .project-title h3,
    .pinterest-type .project-title h3 {
        font-size: 20px
    }

    /*** 
    
    ====================================================================
      Hover Styles
    ====================================================================
    
     ***/

    .hover-style5 .project-title h6,
    .masonry-type .project-title h6,
    .pinterest-type .project-title h6 {
        line-height: 1;
        font-size: 13px
    }

    .masonry-type .portfolio-grid {
        margin: 0 -5px -10px
    }

    .masonry-type .portfolio-grid .grid-item {
        margin-bottom: 10px;
        padding: 0 5px
    }

    .gallery-type .project-title h6 {
        font-size: 15px;
        font-weight: 500
    }

    .gallery-type .single-portfolio.overlay::before {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1)
    }

    .gallery-type .single-portfolio:hover.overlay::before {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .gridder-type .gridder-show {
        width: calc(100% - 2px)
    }

    .gridder-type .gridder-padding {
        padding: 80px 0
    }

    .gridder-type .gridderGallery .item img,
    .gridder-type .project-thumb img {
        width: 100%
    }

    .gridder-type .gridder-grid .project-details p {
        width: auto
    }

    .hover-style5 .single-portfolio {
        position: relative;
        cursor: pointer
    }

    .column-3 .hover-style2 .single-portfolio,
    .column-5.wide .single-portfolio {
        cursor: inherit
    }

    .hover-style5 .project-title {
        bottom: 0;
        left: 0;
        padding: 30px 10px 30px 40px;
        -webkit-transform: translateY(100%);
        -ms-transform: translateY(100%);
        transform: translateY(100%);
        -webkit-transition: -webkit-transform .4s ease-in-out 0s;
        -o-transition: transform .4s ease-in-out 0s;
        transition: transform .4s ease-in-out 0s;
        transition: transform .4s ease-in-out 0s, -webkit-transform .4s ease-in-out 0s;
        width: 100%
    }

    .project-title .inner {
        -webkit-transform: translateY(-250%);
        -ms-transform: translateY(-250%);
        transform: translateY(-250%);
        -webkit-transition: -webkit-transform .4s ease-in-out 0s;
        -o-transition: transform .4s ease-in-out 0s;
        transition: transform .4s ease-in-out 0s;
        transition: transform .4s ease-in-out 0s, -webkit-transform .4s ease-in-out 0s
    }

    .hover-style5 .single-portfolio:hover .project-title,
    .hover-style5 .single-portfolio:hover .project-title .inner,
    .selectedItem .single-portfolio .project-title,
    .selectedItem .single-portfolio .project-title .inner {
        -webkit-transform: translateY(1px);
        -ms-transform: translateY(1px);
        transform: translateY(1px)
    }

    .hover-style5 .project-title h3 {
        font-size: 24px
    }

    .hover-style5 .project-title h6 {
        font-size: 15px;
        font-weight: 500
    }

    .hover-style5 .project-title h3,
    .hover-style5 .project-title h6 {
        opacity: 1;
        top: 0
    }

    .carusel-type .single-portfolio {
        margin: 0 14px
    }

    .carusel-type .hover-style5 .single-portfolio .project-title,
    .carusel-type .hover-style5 .single-portfolio .project-title .inner {
        -webkit-transform: translateY(100%);
        -ms-transform: translateY(100%);
        transform: translateY(100%)
    }

    .carusel-type .slick-current .single-portfolio .project-title,
    .carusel-type .slick-current .single-portfolio .project-title .inner {
        -webkit-transform: translateY(-1px);
        -ms-transform: translateY(-1px);
        transform: translateY(-1px)
    }

    .carusel-type .slick-slide img {
        -webkit-transition: all .5s ease 0s;
        -o-transition: all .5s ease 0s;
        transition: all .5s ease 0s
    }

    .carusel-type .slick-slide.slick-current img {
        -webkit-transform: translateY(-10%);
        -ms-transform: translateY(-10%);
        transform: translateY(-10%)
    }

    /*** 
    
    ====================================================================
      Portfolio Details
    ====================================================================
    
     ***/

    .carusel-type .hover-style5 .project-title {
        border-bottom: 3px solid #ff214f
    }

    .column-2 .single-portfolio.overlay::before {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .column-2 .project-title {
        bottom: 60px;
        left: 70px
    }

    .column-2 .project-title h3 {
        font-size: 26px;
        font-weight: 600
    }

    .column-2 .project-title h6 {
        font-size: 16px;
        font-weight: 500
    }

    .column-3 .hover-style2 .project-title h3 {
        font-size: 22px;
        font-weight: 600
    }

    .column-3 .single-portfolio .icon a {
        right: 0;
        left: 0;
        bottom: 65px
    }

    .column-3 .hover-style2 .project-title {
        margin-bottom: -50px
    }

    .column-3 .single-portfolio.overlay::before {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .column-3 .single-portfolio:hover.overlay::before {
        -webkit-transform: scale(.92);
        -ms-transform: scale(.92);
        transform: scale(.92)
    }

    .column-3 .hover-style2 .project-title h6 {
        font-size: 16px;
        font-weight: 500
    }

    .column-3.wide .hover-style2 .project-title {
        left: 80px;
        text-align: left;
        margin-bottom: -53px
    }

    .column-3.wide .single-portfolio .icon a {
        right: inherit
    }

    .column-3.wide .hover-style2 .project-title h3 {
        font-size: 24px
    }

    .column-3.wide .project-title h6 {
        line-height: 1;
        margin-bottom: 10px
    }

    .column-3.wide .single-portfolio.overlay::before {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .column-4 .project-title h3 {
        font-size: 20px
    }

    .column-4 .project-title h5 {
        font-weight: 500
    }

    .column-4.wide .col-xs-12 {
        padding-left: 10px;
        padding-right: 10px
    }

    .column-4.wide .single-portfolio.overlay::before {
        -webkit-transform: scaleX(1);
        -ms-transform: scaleX(1);
        transform: scaleX(1)
    }

    .column-4.wide .project-title {
        margin-bottom: -35px
    }

    .column-4.wide .project-title h3 {
        font-weight: 600
    }

    .column-4.wide .project-title h6 {
        font-size: 16px;
        font-weight: 500
    }

    .project-title hr.line {
        background-color: #fff;
        height: 1px;
        margin: 15px auto 0;
        -webkit-transition: all .6s ease 0s;
        -o-transition: all .6s ease 0s;
        transition: all .6s ease 0s;
        width: 0;
        opacity: 0
    }

    .single-portfolio:hover .project-title hr.line {
        width: 140px;
        opacity: 1
    }

    .column-5.wide .project-title h3 {
        font-size: 22px;
        font-weight: 600
    }

    .column-5.wide .project-title h6 {
        color: #09d4de;
        font-weight: 500;
        margin-bottom: 5px
    }

    .column-5.wide .project-title {
        padding: 25px 10px 25px 30px
    }

    @media (max-width:767px) {
        .gridder-type .gridder-show .plr-50 {
            padding: 0 20px
        }
        .gridder-type .project-details h2 {
            font-size: 22px
        }
        .gridder-type .gridder-padding {
            padding: 60px 0
        }
        .carusel-type .hover-style5 .project-title {
            padding: 10px 0
        }
        .hover-style5 .project-title h3 {
            font-size: 18px;
            margin-bottom: 5px
        }
        #centerMode .slick-dots button {
            width: 30px
        }
    }

    .portfolio-details .project-details h1 {
        font-size: 36px
    }

    .portfolio-details .project-details p {
        font-size: 18px;
        font-weight: 400;
        line-height: 32px
    }

    .portfolio-details .project-info>ul {
        display: inline-block
    }

    .portfolio-details .project-info li {
        margin-bottom: 0;
        float: left;
        margin-left: 65px;
        padding-left: 65px;
        border-left: 1px solid #818181
    }

    .portfolio-details .project-info li:first-child {
        border-left: 0;
        margin-left: 0;
        padding-left: 0
    }

    .portfolio-details .project-info li h5 {
        color: #4c4c4c
    }

    .portfolio-details .project-info li p {
        color: #818181;
        line-height: 1
    }

    .portfolio-details .experience h1 {
        font-size: 30px
    }

    .portfolio-details .experience p {
        font-size: 16px;
        font-weight: 500;
        line-height: 30px
    }

    .portfolio-details .skill-progress p {
        font-weight: 600;
        margin-bottom: 5px
    }

    @media only screen and (min-width:1200px) {
        .pinterest-type .project-title {
            left: 40px
        }
        .portfolio-details .skill-progress {
            margin-left: -30px
        }
        .portfolio-details .experience p {
            margin-right: -30px
        }
    }

    .portfolio-details .masonry-thumb .grid-item {
        margin-bottom: 30px;
        padding: 0 15px
    }

    .portfolio-details .masonry-thumb {
        margin: 0 -15px -30px
    }

    .portfolio-details .thumb-gallery .item {
        float: left;
        margin-bottom: 15px;
        padding: 0 7.5px
    }

    .project-info-2 li {
        margin-bottom: 5px
    }

    .portfolio-details .project-info-2 p {
        color: #818181;
        font-size: 15px
    }

    .portfolio-next-prev a,
    .project-info-2 li span {
        color: #4c4c4c;
        font-weight: 600
    }

    .project-info-2 li span {
        font-size: 15px
    }

    .portfolio-details.on-side .experience p {
        margin-right: 20px
    }

    .simple-masonry .project-info-2 li {
        margin-bottom: 15px
    }

    .simple-masonry .project-info-2 p {
        line-height: 26px
    }

    .simple-masonry .experience p {
        margin-right: 0
    }

    .simple-masonry .project-info-2 li span {
        display: block
    }

    .portfolio-next-prev a:hover {
        color: #ff214f
    }

    .portfolio-next-prev a i {
        font-size: 22px;
        position: relative;
        top: 3px
    }

    .portfolio-next-prev a i.fa-angle-left {
        padding-right: 8px
    }

    .portfolio-next-prev a i.fa-angle-right {
        padding-left: 8px
    }

    .error-btn {
        bottom: 29%;
        left: 0;
        position: absolute;
        right: 0
    }

    @media (max-width:767px),
    (min-width:768px) and (max-width:991px) {
        .style1 .blog-post .content {
            padding: 25px 10px 20px 20px
        }
        .equal-style.height-600 {
            height: auto
        }
        .info-box.mb-135 {
            margin-bottom: 30px
        }
        .contact-info-area .equal-style {
            padding: 0;
            width: 100%
        }
        .error-btn {
            bottom: 20%
        }
        .sidebar.pl-50 {
            padding-left: 0
        }
        .gridder-type .gridderGallery.plr-20,
        .gridder-type .project-thumb.plr-20 {
            padding: 0 0 20px
        }
        .column-2 .project-title {
            bottom: 30px;
            left: 30px
        }
        .single-portfolio .icon a {
            bottom: 100px
        }
        .column-3.wide .hover-style2 .project-title {
            left: 30px
        }
        .portfolio-details.on-side .experience p {
            margin-right: 0
        }
        .experience.pt-100 {
            padding-top: 30px
        }
        .project-details.pl-40 {
            padding-left: 0
        }
    }

    /*** 
    
    ====================================================================
      PreLoader
    ====================================================================
    
     ***/

    #loading-wrap,
    .preloader {
        position: fixed;
        top: 0;
        left: 0
    }

    #loading-wrap {
        background-color: #41228e;
        height: 100%;
        width: 100%;
        z-index: 100000
    }

    .preloader {
        right: 0;
        bottom: 0;
        z-index: 100
    }

    .preloader .pre-container {
        position: absolute;
        left: 50%;
        top: 50%;
        bottom: auto;
        right: auto;
        -webkit-transform: translateX(-50%) translateY(-50%);
        -ms-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        text-align: center
    }

    .preloader .logo-circle {
        position: relative;
        width: 30px;
        height: 30px;
        margin: 0 auto;
        border-radius: 50%;
        -webkit-animation: white-shadow 1s infinite;
        animation: white-shadow 1s infinite
    }

    .pre-container>img {
        margin-top: -52px;
        z-index: 5;
        position: relative
    }

    @-webkit-keyframes white-shadow {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(255, 255, 255, .4);
            box-shadow: 0 0 0 0 rgba(255, 255, 255, .4);
            -webkit-transition: box-shadow .3s ease-in-out
        }
        100% {
            -webkit-box-shadow: 0 0 0 30px transparent;
            box-shadow: 0 0 0 30px transparent;
            -webkit-transform: translate3d(0, 0, 0);
            -webkit-transition: box-shadow .4s ease-in-out
        }
    }

    @keyframes white-shadow {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(255, 255, 255, .4);
            box-shadow: 0 0 0 0 rgba(255, 255, 255, .4);
            -webkit-transition: box-shadow .3s ease-in-out;
            -webkit-transition: -webkit-box-shadow .3s ease-in-out;
            -o-transition: box-shadow .3s ease-in-out;
            transition: box-shadow .3s ease-in-out;
            transition: box-shadow .3s ease-in-out, -webkit-box-shadow .3s ease-in-out
        }
        100% {
            -webkit-box-shadow: 0 0 0 30px transparent;
            box-shadow: 0 0 0 30px transparent;
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            -webkit-transition: box-shadow .4s ease-in-out;
            -webkit-transition: -webkit-box-shadow .4s ease-in-out;
            -o-transition: box-shadow .4s ease-in-out;
            transition: box-shadow .4s ease-in-out;
            transition: box-shadow .4s ease-in-out, -webkit-box-shadow .4s ease-in-out
        }
    }

    @-webkit-keyframes red-shadow {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(255, 33, 79, .4);
            box-shadow: 0 0 0 0 rgba(255, 33, 79, .4)
        }
        100% {
            -webkit-box-shadow: 0 0 0 30px transparent;
            box-shadow: 0 0 0 30px transparent
        }
    }

    @keyframes red-shadow {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(255, 33, 79, .4);
            box-shadow: 0 0 0 0 rgba(255, 33, 79, .4)
        }
        100% {
            -webkit-box-shadow: 0 0 0 30px transparent;
            box-shadow: 0 0 0 30px transparent
        }
    }

    @-webkit-keyframes blue-shadow {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(65, 34, 142, .4);
            box-shadow: 0 0 0 0 rgba(65, 34, 142, .4)
        }
        100% {
            -webkit-box-shadow: 0 0 0 30px transparent;
            box-shadow: 0 0 0 30px transparent
        }
    }

    @keyframes blue-shadow {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(65, 34, 142, .4);
            box-shadow: 0 0 0 0 rgba(65, 34, 142, .4)
        }
        100% {
            -webkit-box-shadow: 0 0 0 30px transparent;
            box-shadow: 0 0 0 30px transparent
        }
    }

    #scrollUp {
        background-color: #ff214f;
        bottom: 81px;
        -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, .6);
        box-shadow: 0 2px 10px rgba(0, 0, 0, .6);
        height: 40px;
        right: 25px;
        text-align: center;
        width: 35px
    }

    #scrollUp i {
        color: #fff;
        font-size: 28px;
        line-height: 38px;
        text-align: center
    }

    #scrollUp:hover {
        background: #111;
        -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, .3);
        box-shadow: 0 0 5px rgba(0, 0, 0, .3)
    }

    @media (max-width:767px) {
        #scrollUp {
            bottom: 20px;
            right: 5px
        }
    }
    .banner-box{
        float: left;
        width: 100%;
        background: url(images/banner-final1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        padding: 7% 0px;
        position: relative;
    }
    .banner-box.footer-inner-banner2{
    background: url(images/footer-banner2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
    .banner-box::after {
        content: "";
        position: absolute;
        background: rgba(0, 0, 0, 0.66);
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
    }
    .banner-box h2 {
        font-size: 42px;
        font-family: 'Amazon Ember';
        font-weight: bold;
        text-align: center;
        margin: 0;
        padding: 0;
        color: #ffffff;
        position: relative;
        z-index: 11;
        text-transform: uppercase;
    }
    .bannerwidth{
        width:100%;
    }
    .blog-sectio .banner-box{
        margin-top: -6px;
        margin-bottom: 0;
    }
    .three-person {
        float: left;
        width: 100%;
        /* text-align: left; */
        /* border-bottom: 2px solid #232f3e; */
        margin-bottom: 5px;
        text-align: center;
    }
    .three-person ul{
        float: left;
        width:100%;
        border-bottom: 2px solid #232f3e;
    }

    .three-person ul li {
        display: inline-block;
        float: none;
    }
    .three-person ul li:first-child{
        border-left: none;
    }
    .three-person .nav.nav-tabs li a {
        display: inline-block;
        color: #232f3e !important;
        text-transform: uppercase;
        font-family: "Amazon Ember", Arial, sans-serif;
        font-weight: bold;
        font-size: 16px;
        padding: 14px 45px;
        position: relative;
        border: none !important;
    }
    .three-person .nav.nav-tabs li a:hover,.three-person .nav.nav-tabs li.active a{
        color: #ef7600 !important;
        background: none !important;
    }
    .three-person .nav.nav-tabs li a:hover:after,.three-person .nav.nav-tabs li.active a:after
    {
        height: 2px;
        background: #ef7600;
        content: "";
        position: absolute;
        left: 0;
        bottom: -1px;
        width:100%;
    }
    .stories {
        float: left;
        width: 100%;
        background: #f4f4f4;
        padding: 9px 20px;
        font-weight: bold;
        color: #232f3e;
        border: 1px solid #efefef;
        font-size: 20px;
    }
    .tab-pane {
        margin-top: 0;
    }

.footer-social ul li a {
    padding: 5px 2px;
}
    @media only screen and (max-width:1199px) {
      .three-person ul li {
        padding: 0 10px;
       }
    }
    @media only screen and (max-width:991px) {
        .three-person ul li {
            padding: 0 15px;
        }
        .stories{
            padding-left: 0;
        }
    }
    @media only screen and (max-width:767px) {
        .three-person .nav.nav-tabs li {
            margin-bottom: 0;
        }
        .three-person .nav.nav-tabs li a {
    width: 100%;
}
.menu-bar.menu-list label p img{
        margin-top: -5px;
}
.section-padding {
    padding: 20px 0;
}
.sidebar.pl-50 {
    padding-left: 0;
    display: none;
}
#menu {
    top: 58px;
}
.menu-list {
    width: 40px;
}
}
</style>


<section class="page-sections blog-sectio">
    <div class="banner-box footer-inner-banner2">
        <div class="bannerwidth">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                <ul>
                    <li><a href="https://drapefit.com/">HOME</a></li>
                    <li><b>></b></li>
                    <li>The Style Guide</li>
                </ul>
                    <h2>The Style Guide</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="three-person">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <ul class="nav nav-tabs">
                        <?php
                        $b = 1;
                        foreach ($blogCategory as $bc) {
                            ?>
                            <li <?php if ($b == 1) { ?>class="active" <?php } ?>><a data-toggle="tab" href="#tab<?php echo $bc->id ?>"><i class="fa fa-male"></i> <?php echo $bc->category_name ?></a></li>

                            <?php
                            $b++;
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area list-blog white-bg section-padding" style="">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8">
                    <div class="tab-content">
                        <?php
                        $bc = 1;
                        foreach ($blogCategory as $bc) {
                            $blogs = TableRegistry::get('Blogs');
                            $Bdata = $blogs->find('all')->where(['blog_category_id' => $bc->id])->order(['id' => 'DESC']);
                            ?>

                            <div id="tab<?php echo $bc->id; ?>" class="tab-pane fade <?php if ($bc->id == 8) { ?>in active <?php } ?>">
                                <h3 class="stories">Recent Stories</h3>
                                <?php foreach ($Bdata as $bdata) { ?>
                                    <div class="blog-post mb-60">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                <div class="thumb fix mr-20">
                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details?title=<?php echo $this->Custom->makeSeoUrl($bdata->blog_title) . '-' . $bdata->id; ?>"><img src="<?php echo HTTP_ROOT . BLOGIMG . $bdata->blog_image; ?>" alt="<?php echo $bdata->blog_title; ?>" /></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                <div class="content pt-15">
                                                    <h5 class="theme-color mb-5"><?php echo date('d M,y', strtotime($bdata->created)); ?></h5>
                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details?title=<?php echo $this->Custom->makeSeoUrl($bdata->blog_title) . '-' . $bdata->id; ?>"><h4 class="text-capitalize mb-10">
                                                            <?php echo $bdata->blog_title; ?>
                                                        </h4></a>
                                                    <div class="divider"><hr class="line"/></div>
                                                    <p class="mb-10">
                                                        <?php echo $this->Custom->shortLength($bdata->blog_shotdesc, 100); ?>
                                                    </p>
                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details?title=<?php echo $this->Custom->makeSeoUrl($bdata->blog_title) . '-' . $bdata->id; ?>" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- Blog Post -->
                                <!--                                <div class="blog-post mb-60">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-11 col-md-6">
                                                                            <div class="thumb fix mr-20">
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo2.jpg" alt="Thumbnail" /></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-11 col-md-6">
                                                                            <div class="content pt-15">
                                                                                <h5 class="theme-color mb-5">15 October 2019</h5>
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                                        Order Now  Get the style : Leather skirt, $35 , DRAPE FIT 
                                
                                                                                    </h4></a>
                                                                                <div class="divider"><hr class="line"/></div>
                                                                                <p class="mb-10">
                                                                                    Breathe some fresh life into your favorite knit sweater by styling it with a pair of matching pants for a monochromatic look.
                                                                                </p>
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                <!-- Blog Post -->
                                <!--                                <h3 class="stories">Previous Stories</h3>
                                                                <div class="blog-post mb-60">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-11 col-md-6">
                                                                            <div class="thumb fix mr-20">
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo3.jpg" alt="Thumbnail" /></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-11 col-md-6">
                                                                            <div class="content pt-15">
                                                                                <h5 class="theme-color mb-5">19 September 2019</h5>
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                                        Order Now  Get the style :Turtle Neck Sweater , $30 , DRAPE FIT
                                                                                    </h4></a>
                                                                                <div class="divider"><hr class="line"/></div>
                                                                                <p class="mb-10">
                                                                                    A long-sleeve maxi dress styled with boots is always an effortlessly chic outfit formula.
                                                                                </p>
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 Blog Post 
                                                                <div class="blog-post mb-60">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-11 col-md-6">
                                                                            <div class="thumb fix mr-20">
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo4.jpg" alt="Thumbnail" /></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-11 col-md-6">
                                                                            <div class="content pt-15">
                                                                                <h5 class="theme-color mb-5">13 September 2019</h5>
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                                        Order Now  Get the style :Maxi Dress, $25 , DRAPE FIT 
                                                                                    </h4></a>
                                                                                <div class="divider"><hr class="line"/></div>
                                                                                <p class="mb-10">
                                                                                    Top off a sweater and skirt with a pair of contrasting knee-high boots that will instantly make your look pop.
                                                                                </p>
                                                                                <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                            </div>

                            <?php
                            $bc++;
                        }
                        ?>
                        <!--                        <div id="women" class="tab-pane fade">
                                                    <h3 class="stories">Recent Stories</h3>
                                                    <div class="blog-post mb-60">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="thumb fix mr-20">
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo2.jpg" alt="Thumbnail" /></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="content pt-15">
                                                                    <h5 class="theme-color mb-5">15 October 2019</h5>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                            Order Now  Get the style : Leather skirt, $35 , DRAPE FIT 
                        
                                                                        </h4></a>
                                                                    <div class="divider"><hr class="line"/></div>
                                                                    <p class="mb-10">
                                                                        Breathe some fresh life into your favorite knit sweater by styling it with a pair of matching pants for a monochromatic look.
                                                                    </p>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     Blog Post 
                                                    <h3 class="stories">Previous Stories</h3>
                                                    <div class="blog-post mb-60">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="thumb fix mr-20">
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo3.jpg" alt="Thumbnail" /></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="content pt-15">
                                                                    <h5 class="theme-color mb-5">19 September 2019</h5>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                            Order Now  Get the style :Turtle Neck Sweater , $30 , DRAPE FIT
                                                                        </h4></a>
                                                                    <div class="divider"><hr class="line"/></div>
                                                                    <p class="mb-10">
                                                                        A long-sleeve maxi dress styled with boots is always an effortlessly chic outfit formula.
                                                                    </p>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     Blog Post 
                                                    <div class="blog-post mb-60">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="thumb fix mr-20">
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo4.jpg" alt="Thumbnail" /></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="content pt-15">
                                                                    <h5 class="theme-color mb-5">13 September 2019</h5>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                            Order Now  Get the style :Maxi Dress, $25 , DRAPE FIT 
                                                                        </h4></a>
                                                                    <div class="divider"><hr class="line"/></div>
                                                                    <p class="mb-10">
                                                                        Top off a sweater and skirt with a pair of contrasting knee-high boots that will instantly make your look pop.
                                                                    </p>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="kids" class="tab-pane fade">
                                                    <h3 class="stories">Recent Stories</h3>
                                                    <div class="blog-post mb-60">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="thumb fix mr-20">
                                                                    <a href="<?php echo HTTP_ROOT; ?>"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo1.jpg" alt="Thumbnail" /></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="content pt-15">
                                                                    <h5 class="theme-color mb-5">20 September 2019</h5>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                            By DRAPE FIT 
                                                                        </h4></a>
                                                                    <div class="divider"><hr class="line"/></div>
                                                                    <p class="mb-10">
                                                                        Cool weather is a fun time for layering on your favorite clothes, but you need more than that when the weather gets....
                                                                    </p>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3 class="stories">Previous Stories</h3>
                                                    <div class="blog-post mb-60">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="thumb fix mr-20">
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><img src="<?php echo HTTP_ROOT; ?>img/blog/list/photo4.jpg" alt="Thumbnail" /></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-11 col-md-6">
                                                                <div class="content pt-15">
                                                                    <h5 class="theme-color mb-5">13 September 2019</h5>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details"><h4 class="text-capitalize mb-10">
                                                                            Order Now  Get the style :Maxi Dress, $25 , DRAPE FIT 
                                                                        </h4></a>
                                                                    <div class="divider"><hr class="line"/></div>
                                                                    <p class="mb-10">
                                                                        Top off a sweater and skirt with a pair of contrasting knee-high boots that will instantly make your look pop.
                                                                    </p>
                                                                    <a href="<?php echo HTTP_ROOT; ?>blog-details" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-4">
                    <div class="sidebar pl-50">
                        <div class="widget gray-bg mb-30">
                            <div class="widget-title mb-25">
                                <h4>Search</h4>
                            </div>
                            <div class="search">
                                <form action="#">
                                    <input type="search" name="search" placeholder="Search For..." />
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Widget End -->
                        <!-- <div class="widget gray-bg mb-30">
                            <div class="widget-title mb-25">
                                <h4>About Me</h4>
                            </div>
                            <div class="about">
                                <img src="<?php echo HTTP_ROOT; ?>img/blog/sidebar/about.jpg" alt="Thumbnail" />
                                <p>If you are going to use a passage of Lorem you need to be surthere isn't anything embarrassi hidden in the middle of text.</p>
                            </div>
                        </div> -->
                        <!-- Widget End -->
                        <!-- <div class="widget gray-bg mb-30">
                            <div class="widget-title mb-25">
                                <h4>Categories</h4>
                            </div>
                            <div class="category">
                                <ul>
                                    <li><a href="#">Winter <span>(10)</span></a></li>
                                    <li><a href="#">Fall <span>(08)</span></a></li>
                                    <li><a href="#">Maternity Style <span>(05)</span></a></li>
                                    <li><a href="#">Kids Summer <span>(05)</span></a></li>
                                    <li><a href="#">Men’s Summer <span>(12)</span></a></li>
                                    <li><a href="#">UI/UX Design <span>(30)</span></a></li>
                                    <li><a href="#">WordPress <span>(14)</span></a></li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- Widget End -->
                        <!-- <div class="widget gray-bg">
                            <div class="widget-title mb-25">
                                <h4>Recent Posts</h4>
                            </div>
                            <div class="recent-post">
                                <ul>
                                    <li>
                                        <div class="thumb pull-left">
                                            <img src="<?php echo HTTP_ROOT; ?>img/blog/sidebar/1.jpg" alt="Thumbnail" />
                                        </div>
                                        <div class="desc pl-15">
                                            <h6 class="theme-color">18 September 2019</h6>
                                            <a href="<?php echo HTTP_ROOT; ?>blog-details"><p>
                                                    Predefined chunks As the first true generato.
                                                </p></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb pull-left">
                                            <img src="<?php echo HTTP_ROOT; ?>img/blog/sidebar/2.jpg" alt="Thumbnail" />
                                        </div>
                                        <div class="desc pl-15">
                                            <h6 class="theme-color">10 September 2019</h6>
                                            <a href="<?php echo HTTP_ROOT; ?>blog-details"><p>
                                                    Are going to use pass age of Lorem Ipsum.
                                                </p></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb pull-left">
                                            <img src="<?php echo HTTP_ROOT; ?>img/blog/sidebar/3.jpg" alt="Thumbnail" />
                                        </div>
                                        <div class="desc pl-15">
                                            <h6 class="theme-color">18 September 2019</h6>
                                            <a href="<?php echo HTTP_ROOT; ?>blog-details"><p>
                                                    On the Internet. It uses diction of over.
                                                </p></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- Widget End -->
                    </div>
                </div>
                <!-- Sidebar End -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="rt-pagination mt-90 text-center">
                        <ul class="clearfix">
                            <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="javascript:void(0)">2</a></li>
                        </ul>
                    </div>
                    <!-- Pagination -->
                </div>
            </div>
        </div>
</section>
