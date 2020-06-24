<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        @font-face {
          font-family: 'FontAwesome';
          src: url('http://localhost:8000/viralget/public/static/assets/fonts/fontawesome-webfont.eot');
          src: url('http://localhost:8000/viralget/public/static/assets/fonts/fontawesome-webfont.eot') format('embedded-opentype'),
           url('http://localhost:8000/viralget/public/static/assets/fonts/fontawesome-webfont.woff2') format('woff2'),
            url('http://localhost:8000/viralget/public/static/assets/fonts/fontawesome-webfont.woff') format('woff'),
             url('http://localhost:8000/viralget/public/static/assets/fonts/fontawesome-webfont.ttf') format('ttf'),
              /* url('http://localhost:8000/viralget/public/static/assets/fonts/fontawesome-webfont.svg') format('svg'); */
          font-weight: normal;
          font-style: normal;
        }
        .fa {
          display: inline-block;
          font: normal normal normal 14px/1 FontAwesome;
          font-size: inherit;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
        }
        /* makes the font 33% larger relative to the icon container */
        .fa-lg {
          font-size: 1.33333333em;
          line-height: 0.75em;
          vertical-align: -15%;
        }
        .fa-2x {
          font-size: 2em;
        }
        .fa-3x {
          font-size: 3em;
        }
        .fa-4x {
          font-size: 4em;
        }
        .fa-5x {
          font-size: 5em;
        }
        .fa-fw {
          width: 1.28571429em;
          text-align: center;
        }
        .fa-ul {
          padding-left: 0;
          margin-left: 2.14285714em;
          list-style-type: none;
        }
        .fa-ul > li {
          position: relative;
        }
        .fa-li {
          position: absolute;
          left: -2.14285714em;
          width: 2.14285714em;
          top: 0.14285714em;
          text-align: center;
        }
        .fa-li.fa-lg {
          left: -1.85714286em;
        }
        .fa-border {
          padding: .2em .25em .15em;
          border: solid 0.08em #eeeeee;
          border-radius: .1em;
        }
        .fa-pull-left {
          float: left;
        }
        .fa-pull-right {
          float: right;
        }
        .fa.fa-pull-left {
          margin-right: .3em;
        }
        .fa.fa-pull-right {
          margin-left: .3em;
        }
        /* Deprecated as of 4.4.0 */
        .pull-right {
          float: right;
        }
        .pull-left {
          float: left;
        }
        .fa.pull-left {
          margin-right: .3em;
        }
        .fa.pull-right {
          margin-left: .3em;
        }
        .fa-spin {
          -webkit-animation: fa-spin 2s infinite linear;
          animation: fa-spin 2s infinite linear;
        }
        .fa-pulse {
          -webkit-animation: fa-spin 1s infinite steps(8);
          animation: fa-spin 1s infinite steps(8);
        }
        @-webkit-keyframes fa-spin {
          0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg);
          }
        }
        @keyframes fa-spin {
          0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg);
          }
        }
        .fa-rotate-90 {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
          -webkit-transform: rotate(90deg);
          -ms-transform: rotate(90deg);
          transform: rotate(90deg);
        }
        .fa-rotate-180 {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
          -webkit-transform: rotate(180deg);
          -ms-transform: rotate(180deg);
          transform: rotate(180deg);
        }
        .fa-rotate-270 {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
          -webkit-transform: rotate(270deg);
          -ms-transform: rotate(270deg);
          transform: rotate(270deg);
        }
        .fa-flip-horizontal {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
          -webkit-transform: scale(-1, 1);
          -ms-transform: scale(-1, 1);
          transform: scale(-1, 1);
        }
        .fa-flip-vertical {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
          -webkit-transform: scale(1, -1);
          -ms-transform: scale(1, -1);
          transform: scale(1, -1);
        }
        :root .fa-rotate-90,
        :root .fa-rotate-180,
        :root .fa-rotate-270,
        :root .fa-flip-horizontal,
        :root .fa-flip-vertical {
          filter: none;
        }
        .fa-stack {
          position: relative;
          display: inline-block;
          width: 2em;
          height: 2em;
          line-height: 2em;
          vertical-align: middle;
        }
        .fa-stack-1x,
        .fa-stack-2x {
          position: absolute;
          left: 0;
          width: 100%;
          text-align: center;
        }
        .fa-stack-1x {
          line-height: inherit;
        }
        .fa-stack-2x {
          font-size: 2em;
        }
        .fa-inverse {
          color: #ffffff;
        }
        /* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
          readers do not read off random characters that represent icons */
        .fa-glass:before {
          content: "\f000";
        }
        .fa-music:before {
          content: "\f001";
        }
        .fa-search:before {
          content: "\f002";
        }
        .fa-envelope-o:before {
          content: "\f003";
        }
        .fa-heart:before {
          content: "\f004";
        }
        .fa-star:before {
          content: "\f005";
        }
        .fa-star-o:before {
          content: "\f006";
        }
        .fa-user:before {
          content: "\f007";
        }
        .fa-film:before {
          content: "\f008";
        }
        .fa-th-large:before {
          content: "\f009";
        }
        .fa-th:before {
          content: "\f00a";
        }
        .fa-th-list:before {
          content: "\f00b";
        }
        .fa-check:before {
          content: "\f00c";
        }
        .fa-remove:before,
        .fa-close:before,
        .fa-times:before {
          content: "\f00d";
        }
        .fa-search-plus:before {
          content: "\f00e";
        }
        .fa-search-minus:before {
          content: "\f010";
        }
        .fa-power-off:before {
          content: "\f011";
        }
        .fa-signal:before {
          content: "\f012";
        }
        .fa-gear:before,
        .fa-cog:before {
          content: "\f013";
        }
        .fa-trash-o:before {
          content: "\f014";
        }
        .fa-home:before {
          content: "\f015";
        }
        .fa-file-o:before {
          content: "\f016";
        }
        .fa-clock-o:before {
          content: "\f017";
        }
        .fa-road:before {
          content: "\f018";
        }
        .fa-download:before {
          content: "\f019";
        }
        .fa-arrow-circle-o-down:before {
          content: "\f01a";
        }
        .fa-arrow-circle-o-up:before {
          content: "\f01b";
        }
        .fa-inbox:before {
          content: "\f01c";
        }
        .fa-play-circle-o:before {
          content: "\f01d";
        }
        .fa-rotate-right:before,
        .fa-repeat:before {
          content: "\f01e";
        }
        .fa-refresh:before {
          content: "\f021";
        }
        .fa-list-alt:before {
          content: "\f022";
        }
        .fa-lock:before {
          content: "\f023";
        }
        .fa-flag:before {
          content: "\f024";
        }
        .fa-headphones:before {
          content: "\f025";
        }
        .fa-volume-off:before {
          content: "\f026";
        }
        .fa-volume-down:before {
          content: "\f027";
        }
        .fa-volume-up:before {
          content: "\f028";
        }
        .fa-qrcode:before {
          content: "\f029";
        }
        .fa-barcode:before {
          content: "\f02a";
        }
        .fa-tag:before {
          content: "\f02b";
        }
        .fa-tags:before {
          content: "\f02c";
        }
        .fa-book:before {
          content: "\f02d";
        }
        .fa-bookmark:before {
          content: "\f02e";
        }
        .fa-print:before {
          content: "\f02f";
        }
        .fa-camera:before {
          content: "\f030";
        }
        .fa-font:before {
          content: "\f031";
        }
        .fa-bold:before {
          content: "\f032";
        }
        .fa-italic:before {
          content: "\f033";
        }
        .fa-text-height:before {
          content: "\f034";
        }
        .fa-text-width:before {
          content: "\f035";
        }
        .fa-align-left:before {
          content: "\f036";
        }
        .fa-align-center:before {
          content: "\f037";
        }
        .fa-align-right:before {
          content: "\f038";
        }
        .fa-align-justify:before {
          content: "\f039";
        }
        .fa-list:before {
          content: "\f03a";
        }
        .fa-dedent:before,
        .fa-outdent:before {
          content: "\f03b";
        }
        .fa-indent:before {
          content: "\f03c";
        }
        .fa-video-camera:before {
          content: "\f03d";
        }
        .fa-photo:before,
        .fa-image:before,
        .fa-picture-o:before {
          content: "\f03e";
        }
        .fa-pencil:before {
          content: "\f040";
        }
        .fa-map-marker:before {
          content: "\f041";
        }
        .fa-adjust:before {
          content: "\f042";
        }
        .fa-tint:before {
          content: "\f043";
        }
        .fa-edit:before,
        .fa-pencil-square-o:before {
          content: "\f044";
        }
        .fa-share-square-o:before {
          content: "\f045";
        }
        .fa-check-square-o:before {
          content: "\f046";
        }
        .fa-arrows:before {
          content: "\f047";
        }
        .fa-step-backward:before {
          content: "\f048";
        }
        .fa-fast-backward:before {
          content: "\f049";
        }
        .fa-backward:before {
          content: "\f04a";
        }
        .fa-play:before {
          content: "\f04b";
        }
        .fa-pause:before {
          content: "\f04c";
        }
        .fa-stop:before {
          content: "\f04d";
        }
        .fa-forward:before {
          content: "\f04e";
        }
        .fa-fast-forward:before {
          content: "\f050";
        }
        .fa-step-forward:before {
          content: "\f051";
        }
        .fa-eject:before {
          content: "\f052";
        }
        .fa-chevron-left:before {
          content: "\f053";
        }
        .fa-chevron-right:before {
          content: "\f054";
        }
        .fa-plus-circle:before {
          content: "\f055";
        }
        .fa-minus-circle:before {
          content: "\f056";
        }
        .fa-times-circle:before {
          content: "\f057";
        }
        .fa-check-circle:before {
          content: "\f058";
        }
        .fa-question-circle:before {
          content: "\f059";
        }
        .fa-info-circle:before {
          content: "\f05a";
        }
        .fa-crosshairs:before {
          content: "\f05b";
        }
        .fa-times-circle-o:before {
          content: "\f05c";
        }
        .fa-check-circle-o:before {
          content: "\f05d";
        }
        .fa-ban:before {
          content: "\f05e";
        }
        .fa-arrow-left:before {
          content: "\f060";
        }
        .fa-arrow-right:before {
          content: "\f061";
        }
        .fa-arrow-up:before {
          content: "\f062";
        }
        .fa-arrow-down:before {
          content: "\f063";
        }
        .fa-mail-forward:before,
        .fa-share:before {
          content: "\f064";
        }
        .fa-expand:before {
          content: "\f065";
        }
        .fa-compress:before {
          content: "\f066";
        }
        .fa-plus:before {
          content: "\f067";
        }
        .fa-minus:before {
          content: "\f068";
        }
        .fa-asterisk:before {
          content: "\f069";
        }
        .fa-exclamation-circle:before {
          content: "\f06a";
        }
        .fa-gift:before {
          content: "\f06b";
        }
        .fa-leaf:before {
          content: "\f06c";
        }
        .fa-fire:before {
          content: "\f06d";
        }
        .fa-eye:before {
          content: "\f06e";
        }
        .fa-eye-slash:before {
          content: "\f070";
        }
        .fa-warning:before,
        .fa-exclamation-triangle:before {
          content: "\f071";
        }
        .fa-plane:before {
          content: "\f072";
        }
        .fa-calendar:before {
          content: "\f073";
        }
        .fa-random:before {
          content: "\f074";
        }
        .fa-comment:before {
          content: "\f075";
        }
        .fa-magnet:before {
          content: "\f076";
        }
        .fa-chevron-up:before {
          content: "\f077";
        }
        .fa-chevron-down:before {
          content: "\f078";
        }
        .fa-retweet:before {
          content: "\f079";
        }
        .fa-shopping-cart:before {
          content: "\f07a";
        }
        .fa-folder:before {
          content: "\f07b";
        }
        .fa-folder-open:before {
          content: "\f07c";
        }
        .fa-arrows-v:before {
          content: "\f07d";
        }
        .fa-arrows-h:before {
          content: "\f07e";
        }
        .fa-bar-chart-o:before,
        .fa-bar-chart:before {
          content: "\f080";
        }
        .fa-twitter-square:before {
          content: "\f081";
        }
        .fa-facebook-square:before {
          content: "\f082";
        }
        .fa-camera-retro:before {
          content: "\f083";
        }
        .fa-key:before {
          content: "\f084";
        }
        .fa-gears:before,
        .fa-cogs:before {
          content: "\f085";
        }
        .fa-comments:before {
          content: "\f086";
        }
        .fa-thumbs-o-up:before {
          content: "\f087";
        }
        .fa-thumbs-o-down:before {
          content: "\f088";
        }
        .fa-star-half:before {
          content: "\f089";
        }
        .fa-heart-o:before {
          content: "\f08a";
        }
        .fa-sign-out:before {
          content: "\f08b";
        }
        .fa-linkedin-square:before {
          content: "\f08c";
        }
        .fa-thumb-tack:before {
          content: "\f08d";
        }
        .fa-external-link:before {
          content: "\f08e";
        }
        .fa-sign-in:before {
          content: "\f090";
        }
        .fa-trophy:before {
          content: "\f091";
        }
        .fa-github-square:before {
          content: "\f092";
        }
        .fa-upload:before {
          content: "\f093";
        }
        .fa-lemon-o:before {
          content: "\f094";
        }
        .fa-phone:before {
          content: "\f095";
        }
        .fa-square-o:before {
          content: "\f096";
        }
        .fa-bookmark-o:before {
          content: "\f097";
        }
        .fa-phone-square:before {
          content: "\f098";
        }
        .fa-twitter:before {
          content: "\f099";
        }
        .fa-facebook-f:before,
        .fa-facebook:before {
          content: "\f09a";
        }
        .fa-github:before {
          content: "\f09b";
        }
        .fa-unlock:before {
          content: "\f09c";
        }
        .fa-credit-card:before {
          content: "\f09d";
        }
        .fa-feed:before,
        .fa-rss:before {
          content: "\f09e";
        }
        .fa-hdd-o:before {
          content: "\f0a0";
        }
        .fa-bullhorn:before {
          content: "\f0a1";
        }
        .fa-bell:before {
          content: "\f0f3";
        }
        .fa-certificate:before {
          content: "\f0a3";
        }
        .fa-hand-o-right:before {
          content: "\f0a4";
        }
        .fa-hand-o-left:before {
          content: "\f0a5";
        }
        .fa-hand-o-up:before {
          content: "\f0a6";
        }
        .fa-hand-o-down:before {
          content: "\f0a7";
        }
        .fa-arrow-circle-left:before {
          content: "\f0a8";
        }
        .fa-arrow-circle-right:before {
          content: "\f0a9";
        }
        .fa-arrow-circle-up:before {
          content: "\f0aa";
        }
        .fa-arrow-circle-down:before {
          content: "\f0ab";
        }
        .fa-globe:before {
          content: "\f0ac";
        }
        .fa-wrench:before {
          content: "\f0ad";
        }
        .fa-tasks:before {
          content: "\f0ae";
        }
        .fa-filter:before {
          content: "\f0b0";
        }
        .fa-briefcase:before {
          content: "\f0b1";
        }
        .fa-arrows-alt:before {
          content: "\f0b2";
        }
        .fa-group:before,
        .fa-users:before {
          content: "\f0c0";
        }
        .fa-chain:before,
        .fa-link:before {
          content: "\f0c1";
        }
        .fa-cloud:before {
          content: "\f0c2";
        }
        .fa-flask:before {
          content: "\f0c3";
        }
        .fa-cut:before,
        .fa-scissors:before {
          content: "\f0c4";
        }
        .fa-copy:before,
        .fa-files-o:before {
          content: "\f0c5";
        }
        .fa-paperclip:before {
          content: "\f0c6";
        }
        .fa-save:before,
        .fa-floppy-o:before {
          content: "\f0c7";
        }
        .fa-square:before {
          content: "\f0c8";
        }
        .fa-navicon:before,
        .fa-reorder:before,
        .fa-bars:before {
          content: "\f0c9";
        }
        .fa-list-ul:before {
          content: "\f0ca";
        }
        .fa-list-ol:before {
          content: "\f0cb";
        }
        .fa-strikethrough:before {
          content: "\f0cc";
        }
        .fa-underline:before {
          content: "\f0cd";
        }
        .fa-table:before {
          content: "\f0ce";
        }
        .fa-magic:before {
          content: "\f0d0";
        }
        .fa-truck:before {
          content: "\f0d1";
        }
        .fa-pinterest:before {
          content: "\f0d2";
        }
        .fa-pinterest-square:before {
          content: "\f0d3";
        }
        .fa-google-plus-square:before {
          content: "\f0d4";
        }
        .fa-google-plus:before {
          content: "\f0d5";
        }
        .fa-money:before {
          content: "\f0d6";
        }
        .fa-caret-down:before {
          content: "\f0d7";
        }
        .fa-caret-up:before {
          content: "\f0d8";
        }
        .fa-caret-left:before {
          content: "\f0d9";
        }
        .fa-caret-right:before {
          content: "\f0da";
        }
        .fa-columns:before {
          content: "\f0db";
        }
        .fa-unsorted:before,
        .fa-sort:before {
          content: "\f0dc";
        }
        .fa-sort-down:before,
        .fa-sort-desc:before {
          content: "\f0dd";
        }
        .fa-sort-up:before,
        .fa-sort-asc:before {
          content: "\f0de";
        }
        .fa-envelope:before {
          content: "\f0e0";
        }
        .fa-linkedin:before {
          content: "\f0e1";
        }
        .fa-rotate-left:before,
        .fa-undo:before {
          content: "\f0e2";
        }
        .fa-legal:before,
        .fa-gavel:before {
          content: "\f0e3";
        }
        .fa-dashboard:before,
        .fa-tachometer:before {
          content: "\f0e4";
        }
        .fa-comment-o:before {
          content: "\f0e5";
        }
        .fa-comments-o:before {
          content: "\f0e6";
        }
        .fa-flash:before,
        .fa-bolt:before {
          content: "\f0e7";
        }
        .fa-sitemap:before {
          content: "\f0e8";
        }
        .fa-umbrella:before {
          content: "\f0e9";
        }
        .fa-paste:before,
        .fa-clipboard:before {
          content: "\f0ea";
        }
        .fa-lightbulb-o:before {
          content: "\f0eb";
        }
        .fa-exchange:before {
          content: "\f0ec";
        }
        .fa-cloud-download:before {
          content: "\f0ed";
        }
        .fa-cloud-upload:before {
          content: "\f0ee";
        }
        .fa-user-md:before {
          content: "\f0f0";
        }
        .fa-stethoscope:before {
          content: "\f0f1";
        }
        .fa-suitcase:before {
          content: "\f0f2";
        }
        .fa-bell-o:before {
          content: "\f0a2";
        }
        .fa-coffee:before {
          content: "\f0f4";
        }
        .fa-cutlery:before {
          content: "\f0f5";
        }
        .fa-file-text-o:before {
          content: "\f0f6";
        }
        .fa-building-o:before {
          content: "\f0f7";
        }
        .fa-hospital-o:before {
          content: "\f0f8";
        }
        .fa-ambulance:before {
          content: "\f0f9";
        }
        .fa-medkit:before {
          content: "\f0fa";
        }
        .fa-fighter-jet:before {
          content: "\f0fb";
        }
        .fa-beer:before {
          content: "\f0fc";
        }
        .fa-h-square:before {
          content: "\f0fd";
        }
        .fa-plus-square:before {
          content: "\f0fe";
        }
        .fa-angle-double-left:before {
          content: "\f100";
        }
        .fa-angle-double-right:before {
          content: "\f101";
        }
        .fa-angle-double-up:before {
          content: "\f102";
        }
        .fa-angle-double-down:before {
          content: "\f103";
        }
        .fa-angle-left:before {
          content: "\f104";
        }
        .fa-angle-right:before {
          content: "\f105";
        }
        .fa-angle-up:before {
          content: "\f106";
        }
        .fa-angle-down:before {
          content: "\f107";
        }
        .fa-desktop:before {
          content: "\f108";
        }
        .fa-laptop:before {
          content: "\f109";
        }
        .fa-tablet:before {
          content: "\f10a";
        }
        .fa-mobile-phone:before,
        .fa-mobile:before {
          content: "\f10b";
        }
        .fa-circle-o:before {
          content: "\f10c";
        }
        .fa-quote-left:before {
          content: "\f10d";
        }
        .fa-quote-right:before {
          content: "\f10e";
        }
        .fa-spinner:before {
          content: "\f110";
        }
        .fa-circle:before {
          content: "\f111";
        }
        .fa-mail-reply:before,
        .fa-reply:before {
          content: "\f112";
        }
        .fa-github-alt:before {
          content: "\f113";
        }
        .fa-folder-o:before {
          content: "\f114";
        }
        .fa-folder-open-o:before {
          content: "\f115";
        }
        .fa-smile-o:before {
          content: "\f118";
        }
        .fa-frown-o:before {
          content: "\f119";
        }
        .fa-meh-o:before {
          content: "\f11a";
        }
        .fa-gamepad:before {
          content: "\f11b";
        }
        .fa-keyboard-o:before {
          content: "\f11c";
        }
        .fa-flag-o:before {
          content: "\f11d";
        }
        .fa-flag-checkered:before {
          content: "\f11e";
        }
        .fa-terminal:before {
          content: "\f120";
        }
        .fa-code:before {
          content: "\f121";
        }
        .fa-mail-reply-all:before,
        .fa-reply-all:before {
          content: "\f122";
        }
        .fa-star-half-empty:before,
        .fa-star-half-full:before,
        .fa-star-half-o:before {
          content: "\f123";
        }
        .fa-location-arrow:before {
          content: "\f124";
        }
        .fa-crop:before {
          content: "\f125";
        }
        .fa-code-fork:before {
          content: "\f126";
        }
        .fa-unlink:before,
        .fa-chain-broken:before {
          content: "\f127";
        }
        .fa-question:before {
          content: "\f128";
        }
        .fa-info:before {
          content: "\f129";
        }
        .fa-exclamation:before {
          content: "\f12a";
        }
        .fa-superscript:before {
          content: "\f12b";
        }
        .fa-subscript:before {
          content: "\f12c";
        }
        .fa-eraser:before {
          content: "\f12d";
        }
        .fa-puzzle-piece:before {
          content: "\f12e";
        }
        .fa-microphone:before {
          content: "\f130";
        }
        .fa-microphone-slash:before {
          content: "\f131";
        }
        .fa-shield:before {
          content: "\f132";
        }
        .fa-calendar-o:before {
          content: "\f133";
        }
        .fa-fire-extinguisher:before {
          content: "\f134";
        }
        .fa-rocket:before {
          content: "\f135";
        }
        .fa-maxcdn:before {
          content: "\f136";
        }
        .fa-chevron-circle-left:before {
          content: "\f137";
        }
        .fa-chevron-circle-right:before {
          content: "\f138";
        }
        .fa-chevron-circle-up:before {
          content: "\f139";
        }
        .fa-chevron-circle-down:before {
          content: "\f13a";
        }
        .fa-html5:before {
          content: "\f13b";
        }
        .fa-css3:before {
          content: "\f13c";
        }
        .fa-anchor:before {
          content: "\f13d";
        }
        .fa-unlock-alt:before {
          content: "\f13e";
        }
        .fa-bullseye:before {
          content: "\f140";
        }
        .fa-ellipsis-h:before {
          content: "\f141";
        }
        .fa-ellipsis-v:before {
          content: "\f142";
        }
        .fa-rss-square:before {
          content: "\f143";
        }
        .fa-play-circle:before {
          content: "\f144";
        }
        .fa-ticket:before {
          content: "\f145";
        }
        .fa-minus-square:before {
          content: "\f146";
        }
        .fa-minus-square-o:before {
          content: "\f147";
        }
        .fa-level-up:before {
          content: "\f148";
        }
        .fa-level-down:before {
          content: "\f149";
        }
        .fa-check-square:before {
          content: "\f14a";
        }
        .fa-pencil-square:before {
          content: "\f14b";
        }
        .fa-external-link-square:before {
          content: "\f14c";
        }
        .fa-share-square:before {
          content: "\f14d";
        }
        .fa-compass:before {
          content: "\f14e";
        }
        .fa-toggle-down:before,
        .fa-caret-square-o-down:before {
          content: "\f150";
        }
        .fa-toggle-up:before,
        .fa-caret-square-o-up:before {
          content: "\f151";
        }
        .fa-toggle-right:before,
        .fa-caret-square-o-right:before {
          content: "\f152";
        }
        .fa-euro:before,
        .fa-eur:before {
          content: "\f153";
        }
        .fa-gbp:before {
          content: "\f154";
        }
        .fa-dollar:before,
        .fa-usd:before {
          content: "\f155";
        }
        .fa-rupee:before,
        .fa-inr:before {
          content: "\f156";
        }
        .fa-cny:before,
        .fa-rmb:before,
        .fa-yen:before,
        .fa-jpy:before {
          content: "\f157";
        }
        .fa-ruble:before,
        .fa-rouble:before,
        .fa-rub:before {
          content: "\f158";
        }
        .fa-won:before,
        .fa-krw:before {
          content: "\f159";
        }
        .fa-bitcoin:before,
        .fa-btc:before {
          content: "\f15a";
        }
        .fa-file:before {
          content: "\f15b";
        }
        .fa-file-text:before {
          content: "\f15c";
        }
        .fa-sort-alpha-asc:before {
          content: "\f15d";
        }
        .fa-sort-alpha-desc:before {
          content: "\f15e";
        }
        .fa-sort-amount-asc:before {
          content: "\f160";
        }
        .fa-sort-amount-desc:before {
          content: "\f161";
        }
        .fa-sort-numeric-asc:before {
          content: "\f162";
        }
        .fa-sort-numeric-desc:before {
          content: "\f163";
        }
        .fa-thumbs-up:before {
          content: "\f164";
        }
        .fa-thumbs-down:before {
          content: "\f165";
        }
        .fa-youtube-square:before {
          content: "\f166";
        }
        .fa-youtube:before {
          content: "\f167";
        }
        .fa-xing:before {
          content: "\f168";
        }
        .fa-xing-square:before {
          content: "\f169";
        }
        .fa-youtube-play:before {
          content: "\f16a";
        }
        .fa-dropbox:before {
          content: "\f16b";
        }
        .fa-stack-overflow:before {
          content: "\f16c";
        }
        .fa-instagram:before {
          content: "\f16d";
        }
        .fa-flickr:before {
          content: "\f16e";
        }
        .fa-adn:before {
          content: "\f170";
        }
        .fa-bitbucket:before {
          content: "\f171";
        }
        .fa-bitbucket-square:before {
          content: "\f172";
        }
        .fa-tumblr:before {
          content: "\f173";
        }
        .fa-tumblr-square:before {
          content: "\f174";
        }
        .fa-long-arrow-down:before {
          content: "\f175";
        }
        .fa-long-arrow-up:before {
          content: "\f176";
        }
        .fa-long-arrow-left:before {
          content: "\f177";
        }
        .fa-long-arrow-right:before {
          content: "\f178";
        }
        .fa-apple:before {
          content: "\f179";
        }
        .fa-windows:before {
          content: "\f17a";
        }
        .fa-android:before {
          content: "\f17b";
        }
        .fa-linux:before {
          content: "\f17c";
        }
        .fa-dribbble:before {
          content: "\f17d";
        }
        .fa-skype:before {
          content: "\f17e";
        }
        .fa-foursquare:before {
          content: "\f180";
        }
        .fa-trello:before {
          content: "\f181";
        }
        .fa-female:before {
          content: "\f182";
        }
        .fa-male:before {
          content: "\f183";
        }
        .fa-gittip:before,
        .fa-gratipay:before {
          content: "\f184";
        }
        .fa-sun-o:before {
          content: "\f185";
        }
        .fa-moon-o:before {
          content: "\f186";
        }
        .fa-archive:before {
          content: "\f187";
        }
        .fa-bug:before {
          content: "\f188";
        }
        .fa-vk:before {
          content: "\f189";
        }
        .fa-weibo:before {
          content: "\f18a";
        }
        .fa-renren:before {
          content: "\f18b";
        }
        .fa-pagelines:before {
          content: "\f18c";
        }
        .fa-stack-exchange:before {
          content: "\f18d";
        }
        .fa-arrow-circle-o-right:before {
          content: "\f18e";
        }
        .fa-arrow-circle-o-left:before {
          content: "\f190";
        }
        .fa-toggle-left:before,
        .fa-caret-square-o-left:before {
          content: "\f191";
        }
        .fa-dot-circle-o:before {
          content: "\f192";
        }
        .fa-wheelchair:before {
          content: "\f193";
        }
        .fa-vimeo-square:before {
          content: "\f194";
        }
        .fa-turkish-lira:before,
        .fa-try:before {
          content: "\f195";
        }
        .fa-plus-square-o:before {
          content: "\f196";
        }
        .fa-space-shuttle:before {
          content: "\f197";
        }
        .fa-slack:before {
          content: "\f198";
        }
        .fa-envelope-square:before {
          content: "\f199";
        }
        .fa-wordpress:before {
          content: "\f19a";
        }
        .fa-openid:before {
          content: "\f19b";
        }
        .fa-institution:before,
        .fa-bank:before,
        .fa-university:before {
          content: "\f19c";
        }
        .fa-mortar-board:before,
        .fa-graduation-cap:before {
          content: "\f19d";
        }
        .fa-yahoo:before {
          content: "\f19e";
        }
        .fa-google:before {
          content: "\f1a0";
        }
        .fa-reddit:before {
          content: "\f1a1";
        }
        .fa-reddit-square:before {
          content: "\f1a2";
        }
        .fa-stumbleupon-circle:before {
          content: "\f1a3";
        }
        .fa-stumbleupon:before {
          content: "\f1a4";
        }
        .fa-delicious:before {
          content: "\f1a5";
        }
        .fa-digg:before {
          content: "\f1a6";
        }
        .fa-pied-piper-pp:before {
          content: "\f1a7";
        }
        .fa-pied-piper-alt:before {
          content: "\f1a8";
        }
        .fa-drupal:before {
          content: "\f1a9";
        }
        .fa-joomla:before {
          content: "\f1aa";
        }
        .fa-language:before {
          content: "\f1ab";
        }
        .fa-fax:before {
          content: "\f1ac";
        }
        .fa-building:before {
          content: "\f1ad";
        }
        .fa-child:before {
          content: "\f1ae";
        }
        .fa-paw:before {
          content: "\f1b0";
        }
        .fa-spoon:before {
          content: "\f1b1";
        }
        .fa-cube:before {
          content: "\f1b2";
        }
        .fa-cubes:before {
          content: "\f1b3";
        }
        .fa-behance:before {
          content: "\f1b4";
        }
        .fa-behance-square:before {
          content: "\f1b5";
        }
        .fa-steam:before {
          content: "\f1b6";
        }
        .fa-steam-square:before {
          content: "\f1b7";
        }
        .fa-recycle:before {
          content: "\f1b8";
        }
        .fa-automobile:before,
        .fa-car:before {
          content: "\f1b9";
        }
        .fa-cab:before,
        .fa-taxi:before {
          content: "\f1ba";
        }
        .fa-tree:before {
          content: "\f1bb";
        }
        .fa-spotify:before {
          content: "\f1bc";
        }
        .fa-deviantart:before {
          content: "\f1bd";
        }
        .fa-soundcloud:before {
          content: "\f1be";
        }
        .fa-database:before {
          content: "\f1c0";
        }
        .fa-file-pdf-o:before {
          content: "\f1c1";
        }
        .fa-file-word-o:before {
          content: "\f1c2";
        }
        .fa-file-excel-o:before {
          content: "\f1c3";
        }
        .fa-file-powerpoint-o:before {
          content: "\f1c4";
        }
        .fa-file-photo-o:before,
        .fa-file-picture-o:before,
        .fa-file-image-o:before {
          content: "\f1c5";
        }
        .fa-file-zip-o:before,
        .fa-file-archive-o:before {
          content: "\f1c6";
        }
        .fa-file-sound-o:before,
        .fa-file-audio-o:before {
          content: "\f1c7";
        }
        .fa-file-movie-o:before,
        .fa-file-video-o:before {
          content: "\f1c8";
        }
        .fa-file-code-o:before {
          content: "\f1c9";
        }
        .fa-vine:before {
          content: "\f1ca";
        }
        .fa-codepen:before {
          content: "\f1cb";
        }
        .fa-jsfiddle:before {
          content: "\f1cc";
        }
        .fa-life-bouy:before,
        .fa-life-buoy:before,
        .fa-life-saver:before,
        .fa-support:before,
        .fa-life-ring:before {
          content: "\f1cd";
        }
        .fa-circle-o-notch:before {
          content: "\f1ce";
        }
        .fa-ra:before,
        .fa-resistance:before,
        .fa-rebel:before {
          content: "\f1d0";
        }
        .fa-ge:before,
        .fa-empire:before {
          content: "\f1d1";
        }
        .fa-git-square:before {
          content: "\f1d2";
        }
        .fa-git:before {
          content: "\f1d3";
        }
        .fa-y-combinator-square:before,
        .fa-yc-square:before,
        .fa-hacker-news:before {
          content: "\f1d4";
        }
        .fa-tencent-weibo:before {
          content: "\f1d5";
        }
        .fa-qq:before {
          content: "\f1d6";
        }
        .fa-wechat:before,
        .fa-weixin:before {
          content: "\f1d7";
        }
        .fa-send:before,
        .fa-paper-plane:before {
          content: "\f1d8";
        }
        .fa-send-o:before,
        .fa-paper-plane-o:before {
          content: "\f1d9";
        }
        .fa-history:before {
          content: "\f1da";
        }
        .fa-circle-thin:before {
          content: "\f1db";
        }
        .fa-header:before {
          content: "\f1dc";
        }
        .fa-paragraph:before {
          content: "\f1dd";
        }
        .fa-sliders:before {
          content: "\f1de";
        }
        .fa-share-alt:before {
          content: "\f1e0";
        }
        .fa-share-alt-square:before {
          content: "\f1e1";
        }
        .fa-bomb:before {
          content: "\f1e2";
        }
        .fa-soccer-ball-o:before,
        .fa-futbol-o:before {
          content: "\f1e3";
        }
        .fa-tty:before {
          content: "\f1e4";
        }
        .fa-binoculars:before {
          content: "\f1e5";
        }
        .fa-plug:before {
          content: "\f1e6";
        }
        .fa-slideshare:before {
          content: "\f1e7";
        }
        .fa-twitch:before {
          content: "\f1e8";
        }
        .fa-yelp:before {
          content: "\f1e9";
        }
        .fa-newspaper-o:before {
          content: "\f1ea";
        }
        .fa-wifi:before {
          content: "\f1eb";
        }
        .fa-calculator:before {
          content: "\f1ec";
        }
        .fa-paypal:before {
          content: "\f1ed";
        }
        .fa-google-wallet:before {
          content: "\f1ee";
        }
        .fa-cc-visa:before {
          content: "\f1f0";
        }
        .fa-cc-mastercard:before {
          content: "\f1f1";
        }
        .fa-cc-discover:before {
          content: "\f1f2";
        }
        .fa-cc-amex:before {
          content: "\f1f3";
        }
        .fa-cc-paypal:before {
          content: "\f1f4";
        }
        .fa-cc-stripe:before {
          content: "\f1f5";
        }
        .fa-bell-slash:before {
          content: "\f1f6";
        }
        .fa-bell-slash-o:before {
          content: "\f1f7";
        }
        .fa-trash:before {
          content: "\f1f8";
        }
        .fa-copyright:before {
          content: "\f1f9";
        }
        .fa-at:before {
          content: "\f1fa";
        }
        .fa-eyedropper:before {
          content: "\f1fb";
        }
        .fa-paint-brush:before {
          content: "\f1fc";
        }
        .fa-birthday-cake:before {
          content: "\f1fd";
        }
        .fa-area-chart:before {
          content: "\f1fe";
        }
        .fa-pie-chart:before {
          content: "\f200";
        }
        .fa-line-chart:before {
          content: "\f201";
        }
        .fa-lastfm:before {
          content: "\f202";
        }
        .fa-lastfm-square:before {
          content: "\f203";
        }
        .fa-toggle-off:before {
          content: "\f204";
        }
        .fa-toggle-on:before {
          content: "\f205";
        }
        .fa-bicycle:before {
          content: "\f206";
        }
        .fa-bus:before {
          content: "\f207";
        }
        .fa-ioxhost:before {
          content: "\f208";
        }
        .fa-angellist:before {
          content: "\f209";
        }
        .fa-cc:before {
          content: "\f20a";
        }
        .fa-shekel:before,
        .fa-sheqel:before,
        .fa-ils:before {
          content: "\f20b";
        }
        .fa-meanpath:before {
          content: "\f20c";
        }
        .fa-buysellads:before {
          content: "\f20d";
        }
        .fa-connectdevelop:before {
          content: "\f20e";
        }
        .fa-dashcube:before {
          content: "\f210";
        }
        .fa-forumbee:before {
          content: "\f211";
        }
        .fa-leanpub:before {
          content: "\f212";
        }
        .fa-sellsy:before {
          content: "\f213";
        }
        .fa-shirtsinbulk:before {
          content: "\f214";
        }
        .fa-simplybuilt:before {
          content: "\f215";
        }
        .fa-skyatlas:before {
          content: "\f216";
        }
        .fa-cart-plus:before {
          content: "\f217";
        }
        .fa-cart-arrow-down:before {
          content: "\f218";
        }
        .fa-diamond:before {
          content: "\f219";
        }
        .fa-ship:before {
          content: "\f21a";
        }
        .fa-user-secret:before {
          content: "\f21b";
        }
        .fa-motorcycle:before {
          content: "\f21c";
        }
        .fa-street-view:before {
          content: "\f21d";
        }
        .fa-heartbeat:before {
          content: "\f21e";
        }
        .fa-venus:before {
          content: "\f221";
        }
        .fa-mars:before {
          content: "\f222";
        }
        .fa-mercury:before {
          content: "\f223";
        }
        .fa-intersex:before,
        .fa-transgender:before {
          content: "\f224";
        }
        .fa-transgender-alt:before {
          content: "\f225";
        }
        .fa-venus-double:before {
          content: "\f226";
        }
        .fa-mars-double:before {
          content: "\f227";
        }
        .fa-venus-mars:before {
          content: "\f228";
        }
        .fa-mars-stroke:before {
          content: "\f229";
        }
        .fa-mars-stroke-v:before {
          content: "\f22a";
        }
        .fa-mars-stroke-h:before {
          content: "\f22b";
        }
        .fa-neuter:before {
          content: "\f22c";
        }
        .fa-genderless:before {
          content: "\f22d";
        }
        .fa-facebook-official:before {
          content: "\f230";
        }
        .fa-pinterest-p:before {
          content: "\f231";
        }
        .fa-whatsapp:before {
          content: "\f232";
        }
        .fa-server:before {
          content: "\f233";
        }
        .fa-user-plus:before {
          content: "\f234";
        }
        .fa-user-times:before {
          content: "\f235";
        }
        .fa-hotel:before,
        .fa-bed:before {
          content: "\f236";
        }
        .fa-viacoin:before {
          content: "\f237";
        }
        .fa-train:before {
          content: "\f238";
        }
        .fa-subway:before {
          content: "\f239";
        }
        .fa-medium:before {
          content: "\f23a";
        }
        .fa-yc:before,
        .fa-y-combinator:before {
          content: "\f23b";
        }
        .fa-optin-monster:before {
          content: "\f23c";
        }
        .fa-opencart:before {
          content: "\f23d";
        }
        .fa-expeditedssl:before {
          content: "\f23e";
        }
        .fa-battery-4:before,
        .fa-battery:before,
        .fa-battery-full:before {
          content: "\f240";
        }
        .fa-battery-3:before,
        .fa-battery-three-quarters:before {
          content: "\f241";
        }
        .fa-battery-2:before,
        .fa-battery-half:before {
          content: "\f242";
        }
        .fa-battery-1:before,
        .fa-battery-quarter:before {
          content: "\f243";
        }
        .fa-battery-0:before,
        .fa-battery-empty:before {
          content: "\f244";
        }
        .fa-mouse-pointer:before {
          content: "\f245";
        }
        .fa-i-cursor:before {
          content: "\f246";
        }
        .fa-object-group:before {
          content: "\f247";
        }
        .fa-object-ungroup:before {
          content: "\f248";
        }
        .fa-sticky-note:before {
          content: "\f249";
        }
        .fa-sticky-note-o:before {
          content: "\f24a";
        }
        .fa-cc-jcb:before {
          content: "\f24b";
        }
        .fa-cc-diners-club:before {
          content: "\f24c";
        }
        .fa-clone:before {
          content: "\f24d";
        }
        .fa-balance-scale:before {
          content: "\f24e";
        }
        .fa-hourglass-o:before {
          content: "\f250";
        }
        .fa-hourglass-1:before,
        .fa-hourglass-start:before {
          content: "\f251";
        }
        .fa-hourglass-2:before,
        .fa-hourglass-half:before {
          content: "\f252";
        }
        .fa-hourglass-3:before,
        .fa-hourglass-end:before {
          content: "\f253";
        }
        .fa-hourglass:before {
          content: "\f254";
        }
        .fa-hand-grab-o:before,
        .fa-hand-rock-o:before {
          content: "\f255";
        }
        .fa-hand-stop-o:before,
        .fa-hand-paper-o:before {
          content: "\f256";
        }
        .fa-hand-scissors-o:before {
          content: "\f257";
        }
        .fa-hand-lizard-o:before {
          content: "\f258";
        }
        .fa-hand-spock-o:before {
          content: "\f259";
        }
        .fa-hand-pointer-o:before {
          content: "\f25a";
        }
        .fa-hand-peace-o:before {
          content: "\f25b";
        }
        .fa-trademark:before {
          content: "\f25c";
        }
        .fa-registered:before {
          content: "\f25d";
        }
        .fa-creative-commons:before {
          content: "\f25e";
        }
        .fa-gg:before {
          content: "\f260";
        }
        .fa-gg-circle:before {
          content: "\f261";
        }
        .fa-tripadvisor:before {
          content: "\f262";
        }
        .fa-odnoklassniki:before {
          content: "\f263";
        }
        .fa-odnoklassniki-square:before {
          content: "\f264";
        }
        .fa-get-pocket:before {
          content: "\f265";
        }
        .fa-wikipedia-w:before {
          content: "\f266";
        }
        .fa-safari:before {
          content: "\f267";
        }
        .fa-chrome:before {
          content: "\f268";
        }
        .fa-firefox:before {
          content: "\f269";
        }
        .fa-opera:before {
          content: "\f26a";
        }
        .fa-internet-explorer:before {
          content: "\f26b";
        }
        .fa-tv:before,
        .fa-television:before {
          content: "\f26c";
        }
        .fa-contao:before {
          content: "\f26d";
        }
        .fa-500px:before {
          content: "\f26e";
        }
        .fa-amazon:before {
          content: "\f270";
        }
        .fa-calendar-plus-o:before {
          content: "\f271";
        }
        .fa-calendar-minus-o:before {
          content: "\f272";
        }
        .fa-calendar-times-o:before {
          content: "\f273";
        }
        .fa-calendar-check-o:before {
          content: "\f274";
        }
        .fa-industry:before {
          content: "\f275";
        }
        .fa-map-pin:before {
          content: "\f276";
        }
        .fa-map-signs:before {
          content: "\f277";
        }
        .fa-map-o:before {
          content: "\f278";
        }
        .fa-map:before {
          content: "\f279";
        }
        .fa-commenting:before {
          content: "\f27a";
        }
        .fa-commenting-o:before {
          content: "\f27b";
        }
        .fa-houzz:before {
          content: "\f27c";
        }
        .fa-vimeo:before {
          content: "\f27d";
        }
        .fa-black-tie:before {
          content: "\f27e";
        }
        .fa-fonticons:before {
          content: "\f280";
        }
        .fa-reddit-alien:before {
          content: "\f281";
        }
        .fa-edge:before {
          content: "\f282";
        }
        .fa-credit-card-alt:before {
          content: "\f283";
        }
        .fa-codiepie:before {
          content: "\f284";
        }
        .fa-modx:before {
          content: "\f285";
        }
        .fa-fort-awesome:before {
          content: "\f286";
        }
        .fa-usb:before {
          content: "\f287";
        }
        .fa-product-hunt:before {
          content: "\f288";
        }
        .fa-mixcloud:before {
          content: "\f289";
        }
        .fa-scribd:before {
          content: "\f28a";
        }
        .fa-pause-circle:before {
          content: "\f28b";
        }
        .fa-pause-circle-o:before {
          content: "\f28c";
        }
        .fa-stop-circle:before {
          content: "\f28d";
        }
        .fa-stop-circle-o:before {
          content: "\f28e";
        }
        .fa-shopping-bag:before {
          content: "\f290";
        }
        .fa-shopping-basket:before {
          content: "\f291";
        }
        .fa-hashtag:before {
          content: "\f292";
        }
        .fa-bluetooth:before {
          content: "\f293";
        }
        .fa-bluetooth-b:before {
          content: "\f294";
        }
        .fa-percent:before {
          content: "\f295";
        }
        .fa-gitlab:before {
          content: "\f296";
        }
        .fa-wpbeginner:before {
          content: "\f297";
        }
        .fa-wpforms:before {
          content: "\f298";
        }
        .fa-envira:before {
          content: "\f299";
        }
        .fa-universal-access:before {
          content: "\f29a";
        }
        .fa-wheelchair-alt:before {
          content: "\f29b";
        }
        .fa-question-circle-o:before {
          content: "\f29c";
        }
        .fa-blind:before {
          content: "\f29d";
        }
        .fa-audio-description:before {
          content: "\f29e";
        }
        .fa-volume-control-phone:before {
          content: "\f2a0";
        }
        .fa-braille:before {
          content: "\f2a1";
        }
        .fa-assistive-listening-systems:before {
          content: "\f2a2";
        }
        .fa-asl-interpreting:before,
        .fa-american-sign-language-interpreting:before {
          content: "\f2a3";
        }
        .fa-deafness:before,
        .fa-hard-of-hearing:before,
        .fa-deaf:before {
          content: "\f2a4";
        }
        .fa-glide:before {
          content: "\f2a5";
        }
        .fa-glide-g:before {
          content: "\f2a6";
        }
        .fa-signing:before,
        .fa-sign-language:before {
          content: "\f2a7";
        }
        .fa-low-vision:before {
          content: "\f2a8";
        }
        .fa-viadeo:before {
          content: "\f2a9";
        }
        .fa-viadeo-square:before {
          content: "\f2aa";
        }
        .fa-snapchat:before {
          content: "\f2ab";
        }
        .fa-snapchat-ghost:before {
          content: "\f2ac";
        }
        .fa-snapchat-square:before {
          content: "\f2ad";
        }
        .fa-pied-piper:before {
          content: "\f2ae";
        }
        .fa-first-order:before {
          content: "\f2b0";
        }
        .fa-yoast:before {
          content: "\f2b1";
        }
        .fa-themeisle:before {
          content: "\f2b2";
        }
        .fa-google-plus-circle:before,
        .fa-google-plus-official:before {
          content: "\f2b3";
        }
        .fa-fa:before,
        .fa-font-awesome:before {
          content: "\f2b4";
        }
        .fa-handshake-o:before {
          content: "\f2b5";
        }
        .fa-envelope-open:before {
          content: "\f2b6";
        }
        .fa-envelope-open-o:before {
          content: "\f2b7";
        }
        .fa-linode:before {
          content: "\f2b8";
        }
        .fa-address-book:before {
          content: "\f2b9";
        }
        .fa-address-book-o:before {
          content: "\f2ba";
        }
        .fa-vcard:before,
        .fa-address-card:before {
          content: "\f2bb";
        }
        .fa-vcard-o:before,
        .fa-address-card-o:before {
          content: "\f2bc";
        }
        .fa-user-circle:before {
          content: "\f2bd";
        }
        .fa-user-circle-o:before {
          content: "\f2be";
        }
        .fa-user-o:before {
          content: "\f2c0";
        }
        .fa-id-badge:before {
          content: "\f2c1";
        }
        .fa-drivers-license:before,
        .fa-id-card:before {
          content: "\f2c2";
        }
        .fa-drivers-license-o:before,
        .fa-id-card-o:before {
          content: "\f2c3";
        }
        .fa-quora:before {
          content: "\f2c4";
        }
        .fa-free-code-camp:before {
          content: "\f2c5";
        }
        .fa-telegram:before {
          content: "\f2c6";
        }
        .fa-thermometer-4:before,
        .fa-thermometer:before,
        .fa-thermometer-full:before {
          content: "\f2c7";
        }
        .fa-thermometer-3:before,
        .fa-thermometer-three-quarters:before {
          content: "\f2c8";
        }
        .fa-thermometer-2:before,
        .fa-thermometer-half:before {
          content: "\f2c9";
        }
        .fa-thermometer-1:before,
        .fa-thermometer-quarter:before {
          content: "\f2ca";
        }
        .fa-thermometer-0:before,
        .fa-thermometer-empty:before {
          content: "\f2cb";
        }
        .fa-shower:before {
          content: "\f2cc";
        }
        .fa-bathtub:before,
        .fa-s15:before,
        .fa-bath:before {
          content: "\f2cd";
        }
        .fa-podcast:before {
          content: "\f2ce";
        }
        .fa-window-maximize:before {
          content: "\f2d0";
        }
        .fa-window-minimize:before {
          content: "\f2d1";
        }
        .fa-window-restore:before {
          content: "\f2d2";
        }
        .fa-times-rectangle:before,
        .fa-window-close:before {
          content: "\f2d3";
        }
        .fa-times-rectangle-o:before,
        .fa-window-close-o:before {
          content: "\f2d4";
        }
        .fa-bandcamp:before {
          content: "\f2d5";
        }
        .fa-grav:before {
          content: "\f2d6";
        }
        .fa-etsy:before {
          content: "\f2d7";
        }
        .fa-imdb:before {
          content: "\f2d8";
        }
        .fa-ravelry:before {
          content: "\f2d9";
        }
        .fa-eercast:before {
          content: "\f2da";
        }
        .fa-microchip:before {
          content: "\f2db";
        }
        .fa-snowflake-o:before {
          content: "\f2dc";
        }
        .fa-superpowers:before {
          content: "\f2dd";
        }
        .fa-wpexplorer:before {
          content: "\f2de";
        }
        .fa-meetup:before {
          content: "\f2e0";
        }
        .sr-only {
          position: absolute;
          width: 1px;
          height: 1px;
          padding: 0;
          margin: -1px;
          overflow: hidden;
          clip: rect(0, 0, 0, 0);
          border: 0;
        }
        .sr-only-focusable:active,
        .sr-only-focusable:focus {
          position: static;
          width: auto;
          height: auto;
          margin: 0;
          overflow: visible;
          clip: auto;
        }

    </style>

    <style>
              @charset "UTF-8";
        :root {
          --blue: #50a1ff;
          --indigo: #6610f2;
          --purple: #926dde;
          --pink: #e83e8c;
          --red: #ff4954;
          --orange: #ffbe00;
          --yellow: #ffba00;
          --green: #3cd458;
          --teal: #20c997;
          --cyan: #17a2b8;
          --white: #fff;
          --gray: #868e96;
          --gray-dark: #343a40;
          --primary: #50a1ff;
          --secondary: #e9ecf0;
          --success: #3cd458;
          --info: #926dde;
          --warning: #ffba00;
          --danger: #ff4954;
          --light: #f8f9fa;
          --dark: #191919;
          --breakpoint-xs: 0;
          --breakpoint-sm: 576px;
          --breakpoint-md: 768px;
          --breakpoint-lg: 992px;
          --breakpoint-xl: 1200px;
          --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
          --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }

        *,
        *::before,
        *::after {
          -webkit-box-sizing: border-box;
                  box-sizing: border-box; }

        html {
          font-family: sans-serif;
          line-height: 1.15;
          -webkit-text-size-adjust: 100%;
          -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }

        article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
          display: block; }

        body {
          margin: 0;
          font-family: "Open Sans", sans-serif;
          font-size: 0.9375rem;
          font-weight: 300;
          line-height: 1.9;
          color: #757575;
          text-align: left;
          background-color: #ffffff; }

        [tabindex="-1"]:focus {
          outline: 0 !important; }

        hr {
          -webkit-box-sizing: content-box;
                  box-sizing: content-box;
          height: 0;
          overflow: visible; }

        h1, h2, h3, h4, h5, h6 {
          margin-top: 0;
          margin-bottom: 0.5rem; }

        p {
          margin-top: 0;
          margin-bottom: 1rem; }

        abbr[title],
        abbr[data-original-title] {
          text-decoration: underline;
          -webkit-text-decoration: underline dotted;
                  text-decoration: underline dotted;
          cursor: help;
          border-bottom: 0;
          text-decoration-skip-ink: none; }

        address {
          margin-bottom: 1rem;
          font-style: normal;
          line-height: inherit; }

        ol,
        ul,
        dl {
          margin-top: 0;
          margin-bottom: 1rem; }

        ol ol,
        ul ul,
        ol ul,
        ul ol {
          margin-bottom: 0; }

        dt {
          font-weight: 600; }

        dd {
          margin-bottom: .5rem;
          margin-left: 0; }

        blockquote {
          margin: 0 0 1rem; }

        b,
        strong {
          font-weight: bolder; }

        small {
          font-size: 80%; }

        sub,
        sup {
          position: relative;
          font-size: 75%;
          line-height: 0;
          vertical-align: baseline; }

        sub {
          bottom: -.25em; }

        sup {
          top: -.5em; }

        a {
          color: #50a1ff;
          text-decoration: none;
          background-color: transparent; }
          a:hover {
            color: #0478ff;
            text-decoration: underline; }

        a:not([href]):not([tabindex]) {
          color: inherit;
          text-decoration: none; }
          a:not([href]):not([tabindex]):hover, a:not([href]):not([tabindex]):focus {
            color: inherit;
            text-decoration: none; }
          a:not([href]):not([tabindex]):focus {
            outline: 0; }

        pre,
        code,
        kbd,
        samp {
          font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
          font-size: 1em; }

        pre {
          margin-top: 0;
          margin-bottom: 1rem;
          overflow: auto; }

        figure {
          margin: 0 0 1rem; }

        img {
          vertical-align: middle;
          border-style: none; }

        svg {
          overflow: hidden;
          vertical-align: middle; }

        table {
          border-collapse: collapse; }

        caption {
          padding-top: 0.75rem;
          padding-bottom: 0.75rem;
          color: #868e96;
          text-align: left;
          caption-side: bottom; }

        th {
          text-align: inherit; }

        label {
          display: inline-block;
          margin-bottom: 0.5rem; }

        button {
          border-radius: 0; }

        button:focus {
          outline: 1px dotted;
          outline: 5px auto -webkit-focus-ring-color; }

        input,
        button,
        select,
        optgroup,
        textarea {
          margin: 0;
          font-family: inherit;
          font-size: inherit;
          line-height: inherit; }

        button,
        input {
          overflow: visible; }

        button,
        select {
          text-transform: none; }

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
          -webkit-appearance: button; }

        button::-moz-focus-inner,
        [type="button"]::-moz-focus-inner,
        [type="reset"]::-moz-focus-inner,
        [type="submit"]::-moz-focus-inner {
          padding: 0;
          border-style: none; }

        input[type="radio"],
        input[type="checkbox"] {
          -webkit-box-sizing: border-box;
                  box-sizing: border-box;
          padding: 0; }

        input[type="date"],
        input[type="time"],
        input[type="datetime-local"],
        input[type="month"] {
          -webkit-appearance: listbox; }

        textarea {
          overflow: auto;
          resize: vertical; }

        fieldset {
          min-width: 0;
          padding: 0;
          margin: 0;
          border: 0; }

        legend {
          display: block;
          width: 100%;
          max-width: 100%;
          padding: 0;
          margin-bottom: .5rem;
          font-size: 1.5rem;
          line-height: inherit;
          color: inherit;
          white-space: normal; }

        progress {
          vertical-align: baseline; }

        [type="number"]::-webkit-inner-spin-button,
        [type="number"]::-webkit-outer-spin-button {
          height: auto; }

        [type="search"] {
          outline-offset: -2px;
          -webkit-appearance: none; }

        [type="search"]::-webkit-search-decoration {
          -webkit-appearance: none; }

        ::-webkit-file-upload-button {
          font: inherit;
          -webkit-appearance: button; }

        output {
          display: inline-block; }

        summary {
          display: list-item;
          cursor: pointer; }

        template {
          display: none; }

        [hidden] {
          display: none !important; }

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
          margin-bottom: 0.5rem;
          font-family: Dosis, sans-serif;
          font-weight: 400;
          line-height: 1.5;
          color: #323d47; }

        h1, .h1 {
          font-size: 2.57813rem; }

        h2, .h2 {
          font-size: 2.10938rem; }

        h3, .h3 {
          font-size: 1.75781rem; }

        h4, .h4 {
          font-size: 1.52344rem; }

        h5, .h5 {
          font-size: 1.23047rem; }

        h6, .h6 {
          font-size: 1.05469rem; }

        .lead, .pricing-4 .plan-price p {
          font-size: 1.17188rem;
          font-weight: 300; }

        .display-1 {
          font-size: 5rem;
          font-weight: 200;
          line-height: 1.5; }

        .display-2 {
          font-size: 4rem;
          font-weight: 200;
          line-height: 1.5; }

        .display-3 {
          font-size: 3.5rem;
          font-weight: 200;
          line-height: 1.5; }

        .display-4 {
          font-size: 3rem;
          font-weight: 200;
          line-height: 1.5; }

        hr {
          margin-top: 1rem;
          margin-bottom: 1rem;
          border: 0;
          border-top: 1px solid rgba(0, 0, 0, 0.1); }

        small,
        .small {
          font-size: 85%;
          font-weight: 400; }

        mark,
        .mark {
          padding: 0.2em;
          background-color: #fcf8e3; }

        .list-unstyled {
          padding-left: 0;
          list-style: none; }

        .list-inline {
          padding-left: 0;
          list-style: none; }

        .list-inline-item {
          display: inline-block; }
          .list-inline-item:not(:last-child) {
            margin-right: 0.5rem; }

        .initialism {
          font-size: 90%;
          text-transform: uppercase; }

        .blockquote {
          margin-bottom: 1rem;
          font-size: 1.17188rem; }

        .blockquote-footer {
          display: block;
          font-size: 85%;
          color: #868e96; }
          .blockquote-footer::before {
            content: "\2014\00A0"; }

        .img-fluid {
          max-width: 100%;
          height: auto; }

        .img-thumbnail {
          padding: 0.25rem;
          background-color: #ffffff;
          border: 1px solid #dee2e6;
          border-radius: 0.25rem;
          max-width: 100%;
          height: auto; }

        .figure {
          display: inline-block; }

        .figure-img {
          margin-bottom: 0.5rem;
          line-height: 1; }

        .figure-caption {
          font-size: 90%;
          color: #868e96; }

        code {
          font-size: 87.5%;
          color: #e83e8c;
          word-break: break-word; }
          a > code {
            color: inherit; }

        kbd {
          padding: 0.2rem 0.4rem;
          font-size: 87.5%;
          color: #fff;
          background-color: #212529;
          border-radius: 0.125rem; }
          kbd kbd {
            padding: 0;
            font-size: 100%;
            font-weight: 600; }

        pre {
          display: block;
          font-size: 87.5%;
          color: #212529; }
          pre code {
            font-size: inherit;
            color: inherit;
            word-break: normal; }

        .pre-scrollable {
          max-height: 340px;
          overflow-y: scroll; }

        .container {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto; }
          @media (min-width: 576px) {
            .container {
              max-width: 540px; } }
          @media (min-width: 768px) {
            .container {
              max-width: 720px; } }
          @media (min-width: 992px) {
            .container {
              max-width: 960px; } }
          @media (min-width: 1200px) {
            .container {
              max-width: 1140px; } }

        .container-fluid {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto; }

        .row {
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap;
          margin-right: -15px;
          margin-left: -15px; }

        .no-gutters {
          margin-right: 0;
          margin-left: 0; }
          .no-gutters > .col,
          .no-gutters > [class*="col-"] {
            padding-right: 0;
            padding-left: 0; }

        .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
        .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
        .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
        .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
        .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
        .col-xl-auto {
          position: relative;
          width: 100%;
          padding-right: 15px;
          padding-left: 15px; }

        .col {
          flex-basis: 0;
          -webkit-box-flex: 1;
                  flex-grow: 1;
          max-width: 100%; }

        .col-auto {
          -webkit-box-flex: 0;
                  flex: 0 0 auto;
          width: auto;
          max-width: 100%; }

        .col-1 {
          -webkit-box-flex: 0;
                  flex: 0 0 8.33333%;
          max-width: 8.33333%; }

        .col-2 {
          -webkit-box-flex: 0;
                  flex: 0 0 16.66667%;
          max-width: 16.66667%; }

        .col-3 {
          -webkit-box-flex: 0;
                  flex: 0 0 25%;
          max-width: 25%; }

        .col-4 {
          -webkit-box-flex: 0;
                  flex: 0 0 33.33333%;
          max-width: 33.33333%; }

        .col-5 {
          -webkit-box-flex: 0;
                  flex: 0 0 41.66667%;
          max-width: 41.66667%; }

        .col-6 {
          -webkit-box-flex: 0;
                  flex: 0 0 50%;
          max-width: 50%; }

        .col-7 {
          -webkit-box-flex: 0;
                  flex: 0 0 58.33333%;
          max-width: 58.33333%; }

        .col-8 {
          -webkit-box-flex: 0;
                  flex: 0 0 66.66667%;
          max-width: 66.66667%; }

        .col-9 {
          -webkit-box-flex: 0;
                  flex: 0 0 75%;
          max-width: 75%; }

        .col-10 {
          -webkit-box-flex: 0;
                  flex: 0 0 83.33333%;
          max-width: 83.33333%; }

        .col-11 {
          -webkit-box-flex: 0;
                  flex: 0 0 91.66667%;
          max-width: 91.66667%; }

        .col-12 {
          -webkit-box-flex: 0;
                  flex: 0 0 100%;
          max-width: 100%; }

        .order-first {
          -webkit-box-ordinal-group: 0;
                  order: -1; }

        .order-last {
          -webkit-box-ordinal-group: 14;
                  order: 13; }

        .order-0 {
          -webkit-box-ordinal-group: 1;
                  order: 0; }

        .order-1 {
          -webkit-box-ordinal-group: 2;
                  order: 1; }

        .order-2 {
          -webkit-box-ordinal-group: 3;
                  order: 2; }

        .order-3 {
          -webkit-box-ordinal-group: 4;
                  order: 3; }

        .order-4 {
          -webkit-box-ordinal-group: 5;
                  order: 4; }

        .order-5 {
          -webkit-box-ordinal-group: 6;
                  order: 5; }

        .order-6 {
          -webkit-box-ordinal-group: 7;
                  order: 6; }

        .order-7 {
          -webkit-box-ordinal-group: 8;
                  order: 7; }

        .order-8 {
          -webkit-box-ordinal-group: 9;
                  order: 8; }

        .order-9 {
          -webkit-box-ordinal-group: 10;
                  order: 9; }

        .order-10 {
          -webkit-box-ordinal-group: 11;
                  order: 10; }

        .order-11 {
          -webkit-box-ordinal-group: 12;
                  order: 11; }

        .order-12 {
          -webkit-box-ordinal-group: 13;
                  order: 12; }

        .offset-1 {
          margin-left: 8.33333%; }

        .offset-2 {
          margin-left: 16.66667%; }

        .offset-3 {
          margin-left: 25%; }

        .offset-4 {
          margin-left: 33.33333%; }

        .offset-5 {
          margin-left: 41.66667%; }

        .offset-6 {
          margin-left: 50%; }

        .offset-7 {
          margin-left: 58.33333%; }

        .offset-8 {
          margin-left: 66.66667%; }

        .offset-9 {
          margin-left: 75%; }

        .offset-10 {
          margin-left: 83.33333%; }

        .offset-11 {
          margin-left: 91.66667%; }

        @media (min-width: 576px) {
          .col-sm {
            flex-basis: 0;
            -webkit-box-flex: 1;
                    flex-grow: 1;
            max-width: 100%; }
          .col-sm-auto {
            -webkit-box-flex: 0;
                    flex: 0 0 auto;
            width: auto;
            max-width: 100%; }
          .col-sm-1 {
            -webkit-box-flex: 0;
                    flex: 0 0 8.33333%;
            max-width: 8.33333%; }
          .col-sm-2 {
            -webkit-box-flex: 0;
                    flex: 0 0 16.66667%;
            max-width: 16.66667%; }
          .col-sm-3 {
            -webkit-box-flex: 0;
                    flex: 0 0 25%;
            max-width: 25%; }
          .col-sm-4 {
            -webkit-box-flex: 0;
                    flex: 0 0 33.33333%;
            max-width: 33.33333%; }
          .col-sm-5 {
            -webkit-box-flex: 0;
                    flex: 0 0 41.66667%;
            max-width: 41.66667%; }
          .col-sm-6 {
            -webkit-box-flex: 0;
                    flex: 0 0 50%;
            max-width: 50%; }
          .col-sm-7 {
            -webkit-box-flex: 0;
                    flex: 0 0 58.33333%;
            max-width: 58.33333%; }
          .col-sm-8 {
            -webkit-box-flex: 0;
                    flex: 0 0 66.66667%;
            max-width: 66.66667%; }
          .col-sm-9 {
            -webkit-box-flex: 0;
                    flex: 0 0 75%;
            max-width: 75%; }
          .col-sm-10 {
            -webkit-box-flex: 0;
                    flex: 0 0 83.33333%;
            max-width: 83.33333%; }
          .col-sm-11 {
            -webkit-box-flex: 0;
                    flex: 0 0 91.66667%;
            max-width: 91.66667%; }
          .col-sm-12 {
            -webkit-box-flex: 0;
                    flex: 0 0 100%;
            max-width: 100%; }
          .order-sm-first {
            -webkit-box-ordinal-group: 0;
                    order: -1; }
          .order-sm-last {
            -webkit-box-ordinal-group: 14;
                    order: 13; }
          .order-sm-0 {
            -webkit-box-ordinal-group: 1;
                    order: 0; }
          .order-sm-1 {
            -webkit-box-ordinal-group: 2;
                    order: 1; }
          .order-sm-2 {
            -webkit-box-ordinal-group: 3;
                    order: 2; }
          .order-sm-3 {
            -webkit-box-ordinal-group: 4;
                    order: 3; }
          .order-sm-4 {
            -webkit-box-ordinal-group: 5;
                    order: 4; }
          .order-sm-5 {
            -webkit-box-ordinal-group: 6;
                    order: 5; }
          .order-sm-6 {
            -webkit-box-ordinal-group: 7;
                    order: 6; }
          .order-sm-7 {
            -webkit-box-ordinal-group: 8;
                    order: 7; }
          .order-sm-8 {
            -webkit-box-ordinal-group: 9;
                    order: 8; }
          .order-sm-9 {
            -webkit-box-ordinal-group: 10;
                    order: 9; }
          .order-sm-10 {
            -webkit-box-ordinal-group: 11;
                    order: 10; }
          .order-sm-11 {
            -webkit-box-ordinal-group: 12;
                    order: 11; }
          .order-sm-12 {
            -webkit-box-ordinal-group: 13;
                    order: 12; }
          .offset-sm-0 {
            margin-left: 0; }
          .offset-sm-1 {
            margin-left: 8.33333%; }
          .offset-sm-2 {
            margin-left: 16.66667%; }
          .offset-sm-3 {
            margin-left: 25%; }
          .offset-sm-4 {
            margin-left: 33.33333%; }
          .offset-sm-5 {
            margin-left: 41.66667%; }
          .offset-sm-6 {
            margin-left: 50%; }
          .offset-sm-7 {
            margin-left: 58.33333%; }
          .offset-sm-8 {
            margin-left: 66.66667%; }
          .offset-sm-9 {
            margin-left: 75%; }
          .offset-sm-10 {
            margin-left: 83.33333%; }
          .offset-sm-11 {
            margin-left: 91.66667%; } }

        @media (min-width: 768px) {
          .col-md {
            flex-basis: 0;
            -webkit-box-flex: 1;
                    flex-grow: 1;
            max-width: 100%; }
          .col-md-auto {
            -webkit-box-flex: 0;
                    flex: 0 0 auto;
            width: auto;
            max-width: 100%; }
          .col-md-1 {
            -webkit-box-flex: 0;
                    flex: 0 0 8.33333%;
            max-width: 8.33333%; }
          .col-md-2 {
            -webkit-box-flex: 0;
                    flex: 0 0 16.66667%;
            max-width: 16.66667%; }
          .col-md-3 {
            -webkit-box-flex: 0;
                    flex: 0 0 25%;
            max-width: 25%; }
          .col-md-4 {
            -webkit-box-flex: 0;
                    flex: 0 0 33.33333%;
            max-width: 33.33333%; }
          .col-md-5 {
            -webkit-box-flex: 0;
                    flex: 0 0 41.66667%;
            max-width: 41.66667%; }
          .col-md-6 {
            -webkit-box-flex: 0;
                    flex: 0 0 50%;
            max-width: 50%; }
          .col-md-7 {
            -webkit-box-flex: 0;
                    flex: 0 0 58.33333%;
            max-width: 58.33333%; }
          .col-md-8 {
            -webkit-box-flex: 0;
                    flex: 0 0 66.66667%;
            max-width: 66.66667%; }
          .col-md-9 {
            -webkit-box-flex: 0;
                    flex: 0 0 75%;
            max-width: 75%; }
          .col-md-10 {
            -webkit-box-flex: 0;
                    flex: 0 0 83.33333%;
            max-width: 83.33333%; }
          .col-md-11 {
            -webkit-box-flex: 0;
                    flex: 0 0 91.66667%;
            max-width: 91.66667%; }
          .col-md-12 {
            -webkit-box-flex: 0;
                    flex: 0 0 100%;
            max-width: 100%; }
          .order-md-first {
            -webkit-box-ordinal-group: 0;
                    order: -1; }
          .order-md-last {
            -webkit-box-ordinal-group: 14;
                    order: 13; }
          .order-md-0 {
            -webkit-box-ordinal-group: 1;
                    order: 0; }
          .order-md-1 {
            -webkit-box-ordinal-group: 2;
                    order: 1; }
          .order-md-2 {
            -webkit-box-ordinal-group: 3;
                    order: 2; }
          .order-md-3 {
            -webkit-box-ordinal-group: 4;
                    order: 3; }
          .order-md-4 {
            -webkit-box-ordinal-group: 5;
                    order: 4; }
          .order-md-5 {
            -webkit-box-ordinal-group: 6;
                    order: 5; }
          .order-md-6 {
            -webkit-box-ordinal-group: 7;
                    order: 6; }
          .order-md-7 {
            -webkit-box-ordinal-group: 8;
                    order: 7; }
          .order-md-8 {
            -webkit-box-ordinal-group: 9;
                    order: 8; }
          .order-md-9 {
            -webkit-box-ordinal-group: 10;
                    order: 9; }
          .order-md-10 {
            -webkit-box-ordinal-group: 11;
                    order: 10; }
          .order-md-11 {
            -webkit-box-ordinal-group: 12;
                    order: 11; }
          .order-md-12 {
            -webkit-box-ordinal-group: 13;
                    order: 12; }
          .offset-md-0 {
            margin-left: 0; }
          .offset-md-1 {
            margin-left: 8.33333%; }
          .offset-md-2 {
            margin-left: 16.66667%; }
          .offset-md-3 {
            margin-left: 25%; }
          .offset-md-4 {
            margin-left: 33.33333%; }
          .offset-md-5 {
            margin-left: 41.66667%; }
          .offset-md-6 {
            margin-left: 50%; }
          .offset-md-7 {
            margin-left: 58.33333%; }
          .offset-md-8 {
            margin-left: 66.66667%; }
          .offset-md-9 {
            margin-left: 75%; }
          .offset-md-10 {
            margin-left: 83.33333%; }
          .offset-md-11 {
            margin-left: 91.66667%; } }

        @media (min-width: 992px) {
          .col-lg {
            flex-basis: 0;
            -webkit-box-flex: 1;
                    flex-grow: 1;
            max-width: 100%; }
          .col-lg-auto {
            -webkit-box-flex: 0;
                    flex: 0 0 auto;
            width: auto;
            max-width: 100%; }
          .col-lg-1 {
            -webkit-box-flex: 0;
                    flex: 0 0 8.33333%;
            max-width: 8.33333%; }
          .col-lg-2 {
            -webkit-box-flex: 0;
                    flex: 0 0 16.66667%;
            max-width: 16.66667%; }
          .col-lg-3 {
            -webkit-box-flex: 0;
                    flex: 0 0 25%;
            max-width: 25%; }
          .col-lg-4 {
            -webkit-box-flex: 0;
                    flex: 0 0 33.33333%;
            max-width: 33.33333%; }
          .col-lg-5 {
            -webkit-box-flex: 0;
                    flex: 0 0 41.66667%;
            max-width: 41.66667%; }
          .col-lg-6 {
            -webkit-box-flex: 0;
                    flex: 0 0 50%;
            max-width: 50%; }
          .col-lg-7 {
            -webkit-box-flex: 0;
                    flex: 0 0 58.33333%;
            max-width: 58.33333%; }
          .col-lg-8 {
            -webkit-box-flex: 0;
                    flex: 0 0 66.66667%;
            max-width: 66.66667%; }
          .col-lg-9 {
            -webkit-box-flex: 0;
                    flex: 0 0 75%;
            max-width: 75%; }
          .col-lg-10 {
            -webkit-box-flex: 0;
                    flex: 0 0 83.33333%;
            max-width: 83.33333%; }
          .col-lg-11 {
            -webkit-box-flex: 0;
                    flex: 0 0 91.66667%;
            max-width: 91.66667%; }
          .col-lg-12 {
            -webkit-box-flex: 0;
                    flex: 0 0 100%;
            max-width: 100%; }
          .order-lg-first {
            -webkit-box-ordinal-group: 0;
                    order: -1; }
          .order-lg-last {
            -webkit-box-ordinal-group: 14;
                    order: 13; }
          .order-lg-0 {
            -webkit-box-ordinal-group: 1;
                    order: 0; }
          .order-lg-1 {
            -webkit-box-ordinal-group: 2;
                    order: 1; }
          .order-lg-2 {
            -webkit-box-ordinal-group: 3;
                    order: 2; }
          .order-lg-3 {
            -webkit-box-ordinal-group: 4;
                    order: 3; }
          .order-lg-4 {
            -webkit-box-ordinal-group: 5;
                    order: 4; }
          .order-lg-5 {
            -webkit-box-ordinal-group: 6;
                    order: 5; }
          .order-lg-6 {
            -webkit-box-ordinal-group: 7;
                    order: 6; }
          .order-lg-7 {
            -webkit-box-ordinal-group: 8;
                    order: 7; }
          .order-lg-8 {
            -webkit-box-ordinal-group: 9;
                    order: 8; }
          .order-lg-9 {
            -webkit-box-ordinal-group: 10;
                    order: 9; }
          .order-lg-10 {
            -webkit-box-ordinal-group: 11;
                    order: 10; }
          .order-lg-11 {
            -webkit-box-ordinal-group: 12;
                    order: 11; }
          .order-lg-12 {
            -webkit-box-ordinal-group: 13;
                    order: 12; }
          .offset-lg-0 {
            margin-left: 0; }
          .offset-lg-1 {
            margin-left: 8.33333%; }
          .offset-lg-2 {
            margin-left: 16.66667%; }
          .offset-lg-3 {
            margin-left: 25%; }
          .offset-lg-4 {
            margin-left: 33.33333%; }
          .offset-lg-5 {
            margin-left: 41.66667%; }
          .offset-lg-6 {
            margin-left: 50%; }
          .offset-lg-7 {
            margin-left: 58.33333%; }
          .offset-lg-8 {
            margin-left: 66.66667%; }
          .offset-lg-9 {
            margin-left: 75%; }
          .offset-lg-10 {
            margin-left: 83.33333%; }
          .offset-lg-11 {
            margin-left: 91.66667%; } }

        @media (min-width: 1200px) {
          .col-xl {
            flex-basis: 0;
            -webkit-box-flex: 1;
                    flex-grow: 1;
            max-width: 100%; }
          .col-xl-auto {
            -webkit-box-flex: 0;
                    flex: 0 0 auto;
            width: auto;
            max-width: 100%; }
          .col-xl-1 {
            -webkit-box-flex: 0;
                    flex: 0 0 8.33333%;
            max-width: 8.33333%; }
          .col-xl-2 {
            -webkit-box-flex: 0;
                    flex: 0 0 16.66667%;
            max-width: 16.66667%; }
          .col-xl-3 {
            -webkit-box-flex: 0;
                    flex: 0 0 25%;
            max-width: 25%; }
          .col-xl-4 {
            -webkit-box-flex: 0;
                    flex: 0 0 33.33333%;
            max-width: 33.33333%; }
          .col-xl-5 {
            -webkit-box-flex: 0;
                    flex: 0 0 41.66667%;
            max-width: 41.66667%; }
          .col-xl-6 {
            -webkit-box-flex: 0;
                    flex: 0 0 50%;
            max-width: 50%; }
          .col-xl-7 {
            -webkit-box-flex: 0;
                    flex: 0 0 58.33333%;
            max-width: 58.33333%; }
          .col-xl-8 {
            -webkit-box-flex: 0;
                    flex: 0 0 66.66667%;
            max-width: 66.66667%; }
          .col-xl-9 {
            -webkit-box-flex: 0;
                    flex: 0 0 75%;
            max-width: 75%; }
          .col-xl-10 {
            -webkit-box-flex: 0;
                    flex: 0 0 83.33333%;
            max-width: 83.33333%; }
          .col-xl-11 {
            -webkit-box-flex: 0;
                    flex: 0 0 91.66667%;
            max-width: 91.66667%; }
          .col-xl-12 {
            -webkit-box-flex: 0;
                    flex: 0 0 100%;
            max-width: 100%; }
          .order-xl-first {
            -webkit-box-ordinal-group: 0;
                    order: -1; }
          .order-xl-last {
            -webkit-box-ordinal-group: 14;
                    order: 13; }
          .order-xl-0 {
            -webkit-box-ordinal-group: 1;
                    order: 0; }
          .order-xl-1 {
            -webkit-box-ordinal-group: 2;
                    order: 1; }
          .order-xl-2 {
            -webkit-box-ordinal-group: 3;
                    order: 2; }
          .order-xl-3 {
            -webkit-box-ordinal-group: 4;
                    order: 3; }
          .order-xl-4 {
            -webkit-box-ordinal-group: 5;
                    order: 4; }
          .order-xl-5 {
            -webkit-box-ordinal-group: 6;
                    order: 5; }
          .order-xl-6 {
            -webkit-box-ordinal-group: 7;
                    order: 6; }
          .order-xl-7 {
            -webkit-box-ordinal-group: 8;
                    order: 7; }
          .order-xl-8 {
            -webkit-box-ordinal-group: 9;
                    order: 8; }
          .order-xl-9 {
            -webkit-box-ordinal-group: 10;
                    order: 9; }
          .order-xl-10 {
            -webkit-box-ordinal-group: 11;
                    order: 10; }
          .order-xl-11 {
            -webkit-box-ordinal-group: 12;
                    order: 11; }
          .order-xl-12 {
            -webkit-box-ordinal-group: 13;
                    order: 12; }
          .offset-xl-0 {
            margin-left: 0; }
          .offset-xl-1 {
            margin-left: 8.33333%; }
          .offset-xl-2 {
            margin-left: 16.66667%; }
          .offset-xl-3 {
            margin-left: 25%; }
          .offset-xl-4 {
            margin-left: 33.33333%; }
          .offset-xl-5 {
            margin-left: 41.66667%; }
          .offset-xl-6 {
            margin-left: 50%; }
          .offset-xl-7 {
            margin-left: 58.33333%; }
          .offset-xl-8 {
            margin-left: 66.66667%; }
          .offset-xl-9 {
            margin-left: 75%; }
          .offset-xl-10 {
            margin-left: 83.33333%; }
          .offset-xl-11 {
            margin-left: 91.66667%; } }

        .table {
          width: 100%;
          margin-bottom: 1rem;
          background-color: transparent; }
          .table th,
          .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #f1f2f3; }
          .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #f1f2f3; }
          .table tbody + tbody {
            border-top: 2px solid #f1f2f3; }
          .table .table {
            background-color: #ffffff; }

        .table-sm th,
        .table-sm td {
          padding: 0.3rem; }

        .table-bordered {
          border: 1px solid #f1f2f3; }
          .table-bordered th,
          .table-bordered td {
            border: 1px solid #f1f2f3; }
          .table-bordered thead th,
          .table-bordered thead td {
            border-bottom-width: 2px; }

        .table-borderless th,
        .table-borderless td,
        .table-borderless thead th,
        .table-borderless tbody + tbody {
          border: 0; }

        .table-striped tbody tr:nth-of-type(odd) {
          background-color: #fcfdfe; }

        .table-hover tbody tr:hover {
          background-color: #f9fafb; }

        .table-primary,
        .table-primary > th,
        .table-primary > td {
          background-color: #cee5ff; }

        .table-primary th,
        .table-primary td,
        .table-primary thead th,
        .table-primary tbody + tbody {
          border-color: #a4ceff; }

        .table-hover .table-primary:hover {
          background-color: #b5d7ff; }
          .table-hover .table-primary:hover > td,
          .table-hover .table-primary:hover > th {
            background-color: #b5d7ff; }

        .table-secondary,
        .table-secondary > th,
        .table-secondary > td {
          background-color: #f9fafb; }

        .table-secondary th,
        .table-secondary td,
        .table-secondary thead th,
        .table-secondary tbody + tbody {
          border-color: #f4f5f7; }

        .table-hover .table-secondary:hover {
          background-color: #eaedf1; }
          .table-hover .table-secondary:hover > td,
          .table-hover .table-secondary:hover > th {
            background-color: #eaedf1; }

        .table-success,
        .table-success > th,
        .table-success > td {
          background-color: #c8f3d0; }

        .table-success th,
        .table-success td,
        .table-success thead th,
        .table-success tbody + tbody {
          border-color: #9ae9a8; }

        .table-hover .table-success:hover {
          background-color: #b3eebe; }
          .table-hover .table-success:hover > td,
          .table-hover .table-success:hover > th {
            background-color: #b3eebe; }

        .table-info,
        .table-info > th,
        .table-info > td {
          background-color: #e0d6f6; }

        .table-info th,
        .table-info td,
        .table-info thead th,
        .table-info tbody + tbody {
          border-color: #c6b3ee; }

        .table-hover .table-info:hover {
          background-color: #d0c1f1; }
          .table-hover .table-info:hover > td,
          .table-hover .table-info:hover > th {
            background-color: #d0c1f1; }

        .table-warning,
        .table-warning > th,
        .table-warning > td {
          background-color: #ffecb8; }

        .table-warning th,
        .table-warning td,
        .table-warning thead th,
        .table-warning tbody + tbody {
          border-color: #ffdb7a; }

        .table-hover .table-warning:hover {
          background-color: #ffe59f; }
          .table-hover .table-warning:hover > td,
          .table-hover .table-warning:hover > th {
            background-color: #ffe59f; }

        .table-danger,
        .table-danger > th,
        .table-danger > td {
          background-color: #ffcccf; }

        .table-danger th,
        .table-danger td,
        .table-danger thead th,
        .table-danger tbody + tbody {
          border-color: #ffa0a6; }

        .table-hover .table-danger:hover {
          background-color: #ffb3b7; }
          .table-hover .table-danger:hover > td,
          .table-hover .table-danger:hover > th {
            background-color: #ffb3b7; }

        .table-light,
        .table-light > th,
        .table-light > td {
          background-color: #fdfdfe; }

        .table-light th,
        .table-light td,
        .table-light thead th,
        .table-light tbody + tbody {
          border-color: #fbfcfc; }

        .table-hover .table-light:hover {
          background-color: #ececf6; }
          .table-hover .table-light:hover > td,
          .table-hover .table-light:hover > th {
            background-color: #ececf6; }

        .table-dark,
        .table-dark > th,
        .table-dark > td {
          background-color: #bfbfbf; }

        .table-dark th,
        .table-dark td,
        .table-dark thead th,
        .table-dark tbody + tbody {
          border-color: #878787; }

        .table-hover .table-dark:hover {
          background-color: #b2b2b2; }
          .table-hover .table-dark:hover > td,
          .table-hover .table-dark:hover > th {
            background-color: #b2b2b2; }

        .table-active,
        .table-active > th,
        .table-active > td {
          background-color: #f5f6f7; }

        .table-hover .table-active:hover {
          background-color: #e7e9ec; }
          .table-hover .table-active:hover > td,
          .table-hover .table-active:hover > th {
            background-color: #e7e9ec; }

        .table .thead-dark th {
          color: #fff;
          background-color: #212529;
          border-color: #32383e; }

        .table .thead-light th {
          color: #323d47;
          background-color: #fafbfb;
          border-color: #f1f2f3; }

        .table-dark {
          color: #fff;
          background-color: #212529; }
          .table-dark th,
          .table-dark td,
          .table-dark thead th {
            border-color: #32383e; }
          .table-dark.table-bordered {
            border: 0; }
          .table-dark.table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05); }
          .table-dark.table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.075); }

        @media (max-width: 575.98px) {
          .table-responsive-sm {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar; }
            .table-responsive-sm > .table-bordered {
              border: 0; } }

        @media (max-width: 767.98px) {
          .table-responsive-md {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar; }
            .table-responsive-md > .table-bordered {
              border: 0; } }

        @media (max-width: 991.98px) {
          .table-responsive-lg {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar; }
            .table-responsive-lg > .table-bordered {
              border: 0; } }

        @media (max-width: 1199.98px) {
          .table-responsive-xl {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar; }
            .table-responsive-xl > .table-bordered {
              border: 0; } }

        .table-responsive {
          display: block;
          width: 100%;
          overflow-x: auto;
          -webkit-overflow-scrolling: touch;
          -ms-overflow-style: -ms-autohiding-scrollbar; }
          .table-responsive > .table-bordered {
            border: 0; }

        .form-control {
          display: block;
          width: 100%;
          height: calc(2.53125rem + 2px);
          padding: 0.375rem 0.75rem;
          font-size: 0.9375rem;
          font-weight: 300;
          line-height: 1.9;
          color: #999999;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #eaeff4;
          border-radius: 2px;
          -webkit-transition: all 0.3s ease-out;
          transition: all 0.3s ease-out; }
          @media screen and (prefers-reduced-motion: reduce) {
            .form-control {
              -webkit-transition: none;
              transition: none; } }
          .form-control::-ms-expand {
            background-color: transparent;
            border: 0; }
          .form-control:focus {
            color: #323d47;
            background-color: #fff;
            border-color: #f1f2f3;
            outline: 0;
            -webkit-box-shadow: 0 0 40px rgba(0, 0, 0, 0.045);
                    box-shadow: 0 0 40px rgba(0, 0, 0, 0.045); }
          .form-control::-webkit-input-placeholder {
            color: #c9ccce;
            opacity: 1; }
          .form-control::-moz-placeholder {
            color: #c9ccce;
            opacity: 1; }
          .form-control:-ms-input-placeholder {
            color: #c9ccce;
            opacity: 1; }
          .form-control::-ms-input-placeholder {
            color: #c9ccce;
            opacity: 1; }
          .form-control::placeholder {
            color: #c9ccce;
            opacity: 1; }
          .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1; }

        select.form-control:focus::-ms-value {
          color: #999999;
          background-color: #fff; }

        .form-control-file,
        .form-control-range {
          display: block;
          width: 100%; }

        .col-form-label {
          padding-top: calc(0.375rem + 1px);
          padding-bottom: calc(0.375rem + 1px);
          margin-bottom: 0;
          font-size: inherit;
          line-height: 1.9; }

        .col-form-label-lg {
          padding-top: calc(0.375rem + 1px);
          padding-bottom: calc(0.375rem + 1px);
          font-size: 1.0625rem;
          line-height: 2.2; }

        .col-form-label-sm {
          padding-top: calc(0.375rem + 1px);
          padding-bottom: calc(0.375rem + 1px);
          font-size: 0.9375rem;
          line-height: 1.5; }

        .form-control-plaintext {
          display: block;
          width: 100%;
          padding-top: 0.375rem;
          padding-bottom: 0.375rem;
          margin-bottom: 0;
          line-height: 1.9;
          color: #757575;
          background-color: transparent;
          border: solid transparent;
          border-width: 1px 0; }
          .form-control-plaintext.form-control-sm, .form-control-plaintext.form-control-lg {
            padding-right: 0;
            padding-left: 0; }

        .form-control-sm {
          height: calc(2.15625rem + 2px);
          padding: 0.375rem 0.5rem;
          font-size: 0.9375rem;
          line-height: 1.5;
          border-radius: 2px; }

        .form-control-lg {
          height: calc(3.0875rem + 2px);
          padding: 0.375rem 1rem;
          font-size: 1.0625rem;
          line-height: 2.2;
          border-radius: 2px; }

        select.form-control[size], select.form-control[multiple] {
          height: auto; }

        textarea.form-control {
          height: auto; }

        .form-group {
          margin-bottom: 1rem; }

        .form-text {
          display: block;
          margin-top: 0.25rem; }

        .form-row {
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap;
          margin-right: -5px;
          margin-left: -5px; }
          .form-row > .col,
          .form-row > [class*="col-"] {
            padding-right: 5px;
            padding-left: 5px; }

        .form-check {
          position: relative;
          display: block;
          padding-left: 1.25rem; }

        .form-check-input {
          position: absolute;
          margin-top: 0.3rem;
          margin-left: -1.25rem; }
          .form-check-input:disabled ~ .form-check-label {
            color: #868e96; }

        .form-check-label {
          margin-bottom: 0; }

        .form-check-inline {
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-align: center;
                  align-items: center;
          padding-left: 0;
          margin-right: 0.75rem; }
          .form-check-inline .form-check-input {
            position: static;
            margin-top: 0;
            margin-right: 0.3125rem;
            margin-left: 0; }

        .valid-feedback {
          display: none;
          width: 100%;
          margin-top: 0.25rem;
          font-size: 85%;
          color: #3cd458; }

        .valid-tooltip {
          position: absolute;
          top: 100%;
          z-index: 5;
          display: none;
          max-width: 100%;
          padding: 0.25rem 0.5rem;
          margin-top: .1rem;
          font-size: 0.875rem;
          line-height: 1.9;
          color: #fff;
          background-color: rgba(60, 212, 88, 0.9);
          border-radius: 0.25rem; }

        .was-validated .form-control:valid, .form-control.is-valid {
          border-color: #3cd458;
          padding-right: 2.53125rem;
          background-repeat: no-repeat;
          background-position: center right calc(2.53125rem / 4);
          -webkit-background-size: calc(2.53125rem / 2) calc(2.53125rem / 2);
                  background-size: calc(2.53125rem / 2) calc(2.53125rem / 2);}
          .was-validated .form-control:valid:focus, .form-control.is-valid:focus {
            border-color: #3cd458;
            -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25);
                    box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25); }
          .was-validated .form-control:valid ~ .valid-feedback,
          .was-validated .form-control:valid ~ .valid-tooltip, .form-control.is-valid ~ .valid-feedback,
          .form-control.is-valid ~ .valid-tooltip {
            display: block; }

        .was-validated textarea.form-control:valid, textarea.form-control.is-valid {
          padding-right: 2.53125rem;
          background-position: top calc(2.53125rem / 4) right calc(2.53125rem / 4); }

        .was-validated .custom-select:valid, .custom-select.is-valid {
          border-color: #3cd458;
          padding-right: 3.64844rem;
        }  .was-validated .custom-select:valid:focus, .custom-select.is-valid:focus {
            border-color: #3cd458;
            -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25);
                    box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25); }
          .was-validated .custom-select:valid ~ .valid-feedback,
          .was-validated .custom-select:valid ~ .valid-tooltip, .custom-select.is-valid ~ .valid-feedback,
          .custom-select.is-valid ~ .valid-tooltip {
            display: block; }

        .was-validated .form-control-file:valid ~ .valid-feedback,
        .was-validated .form-control-file:valid ~ .valid-tooltip, .form-control-file.is-valid ~ .valid-feedback,
        .form-control-file.is-valid ~ .valid-tooltip {
          display: block; }

        .was-validated .form-check-input:valid ~ .form-check-label, .form-check-input.is-valid ~ .form-check-label {
          color: #3cd458; }

        .was-validated .form-check-input:valid ~ .valid-feedback,
        .was-validated .form-check-input:valid ~ .valid-tooltip, .form-check-input.is-valid ~ .valid-feedback,
        .form-check-input.is-valid ~ .valid-tooltip {
          display: block; }

        .was-validated .custom-control-input:valid ~ .custom-control-label, .custom-control-input.is-valid ~ .custom-control-label {
          color: #3cd458; }
          .was-validated .custom-control-input:valid ~ .custom-control-label::before, .custom-control-input.is-valid ~ .custom-control-label::before {
            border-color: #3cd458; }

        .was-validated .custom-control-input:valid ~ .valid-feedback,
        .was-validated .custom-control-input:valid ~ .valid-tooltip, .custom-control-input.is-valid ~ .valid-feedback,
        .custom-control-input.is-valid ~ .valid-tooltip {
          display: block; }

        .was-validated .custom-control-input:valid:checked ~ .custom-control-label::before, .custom-control-input.is-valid:checked ~ .custom-control-label::before {
          border-color: #66dd7c;
          background-color: #66dd7c; }

        .was-validated .custom-control-input:valid:focus ~ .custom-control-label::before, .custom-control-input.is-valid:focus ~ .custom-control-label::before {
          -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25);
                  box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25); }

        .was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {
          border-color: #3cd458; }

        .was-validated .custom-file-input:valid ~ .custom-file-label, .custom-file-input.is-valid ~ .custom-file-label {
          border-color: #3cd458; }

        .was-validated .custom-file-input:valid ~ .valid-feedback,
        .was-validated .custom-file-input:valid ~ .valid-tooltip, .custom-file-input.is-valid ~ .valid-feedback,
        .custom-file-input.is-valid ~ .valid-tooltip {
          display: block; }

        .was-validated .custom-file-input:valid:focus ~ .custom-file-label, .custom-file-input.is-valid:focus ~ .custom-file-label {
          border-color: #3cd458;
          -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25);
                  box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.25); }

        .invalid-feedback {
          display: none;
          width: 100%;
          margin-top: 0.25rem;
          font-size: 85%;
          color: #ff4954; }

        .invalid-tooltip {
          position: absolute;
          top: 100%;
          z-index: 5;
          display: none;
          max-width: 100%;
          padding: 0.25rem 0.5rem;
          margin-top: .1rem;
          font-size: 0.875rem;
          line-height: 1.9;
          color: #fff;
          background-color: rgba(255, 73, 84, 0.9);
          border-radius: 0.25rem; }

        .was-validated .form-control:invalid, .form-control.is-invalid {
          border-color: #ff4954;
          padding-right: 2.53125rem;
          background-repeat: no-repeat;
          background-position: center right calc(2.53125rem / 4);
          -webkit-background-size: calc(2.53125rem / 2) calc(2.53125rem / 2);
                  background-size: calc(2.53125rem / 2) calc(2.53125rem / 2);
        }  .was-validated .form-control:invalid:focus, .form-control.is-invalid:focus {
            border-color: #ff4954;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25);
                    box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25); }
          .was-validated .form-control:invalid ~ .invalid-feedback,
          .was-validated .form-control:invalid ~ .invalid-tooltip, .form-control.is-invalid ~ .invalid-feedback,
          .form-control.is-invalid ~ .invalid-tooltip {
            display: block; }

        .was-validated textarea.form-control:invalid, textarea.form-control.is-invalid {
          padding-right: 2.53125rem;
          background-position: top calc(2.53125rem / 4) right calc(2.53125rem / 4); }

        .was-validated .custom-select:invalid, .custom-select.is-invalid {
          border-color: #ff4954;
          padding-right: 3.64844rem;
        }  .was-validated .custom-select:invalid:focus, .custom-select.is-invalid:focus {
            border-color: #ff4954;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25);
                    box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25); }
          .was-validated .custom-select:invalid ~ .invalid-feedback,
          .was-validated .custom-select:invalid ~ .invalid-tooltip, .custom-select.is-invalid ~ .invalid-feedback,
          .custom-select.is-invalid ~ .invalid-tooltip {
            display: block; }

        .was-validated .form-control-file:invalid ~ .invalid-feedback,
        .was-validated .form-control-file:invalid ~ .invalid-tooltip, .form-control-file.is-invalid ~ .invalid-feedback,
        .form-control-file.is-invalid ~ .invalid-tooltip {
          display: block; }

        .was-validated .form-check-input:invalid ~ .form-check-label, .form-check-input.is-invalid ~ .form-check-label {
          color: #ff4954; }

        .was-validated .form-check-input:invalid ~ .invalid-feedback,
        .was-validated .form-check-input:invalid ~ .invalid-tooltip, .form-check-input.is-invalid ~ .invalid-feedback,
        .form-check-input.is-invalid ~ .invalid-tooltip {
          display: block; }

        .was-validated .custom-control-input:invalid ~ .custom-control-label, .custom-control-input.is-invalid ~ .custom-control-label {
          color: #ff4954; }
          .was-validated .custom-control-input:invalid ~ .custom-control-label::before, .custom-control-input.is-invalid ~ .custom-control-label::before {
            border-color: #ff4954; }

        .was-validated .custom-control-input:invalid ~ .invalid-feedback,
        .was-validated .custom-control-input:invalid ~ .invalid-tooltip, .custom-control-input.is-invalid ~ .invalid-feedback,
        .custom-control-input.is-invalid ~ .invalid-tooltip {
          display: block; }

        .was-validated .custom-control-input:invalid:checked ~ .custom-control-label::before, .custom-control-input.is-invalid:checked ~ .custom-control-label::before {
          border-color: #ff7c84;
          background-color: #ff7c84; }

        .was-validated .custom-control-input:invalid:focus ~ .custom-control-label::before, .custom-control-input.is-invalid:focus ~ .custom-control-label::before {
          -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25);
                  box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25); }

        .was-validated .custom-control-input:invalid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-invalid:focus:not(:checked) ~ .custom-control-label::before {
          border-color: #ff4954; }

        .was-validated .custom-file-input:invalid ~ .custom-file-label, .custom-file-input.is-invalid ~ .custom-file-label {
          border-color: #ff4954; }

        .was-validated .custom-file-input:invalid ~ .invalid-feedback,
        .was-validated .custom-file-input:invalid ~ .invalid-tooltip, .custom-file-input.is-invalid ~ .invalid-feedback,
        .custom-file-input.is-invalid ~ .invalid-tooltip {
          display: block; }

        .was-validated .custom-file-input:invalid:focus ~ .custom-file-label, .custom-file-input.is-invalid:focus ~ .custom-file-label {
          border-color: #ff4954;
          -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25);
                  box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.25); }

        .form-inline {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: horizontal;
          -webkit-box-direction: normal;
                  flex-flow: row wrap;
          -webkit-box-align: center;
                  align-items: center; }
          .form-inline .form-check {
            width: 100%; }
          @media (min-width: 576px) {
            .form-inline label {
              display: -webkit-box;
              display: flex;
              -webkit-box-align: center;
                      align-items: center;
              -webkit-box-pack: center;
                      justify-content: center;
              margin-bottom: 0; }
            .form-inline .form-group {
              display: -webkit-box;
              display: flex;
              -webkit-box-flex: 0;
                      flex: 0 0 auto;
              -webkit-box-orient: horizontal;
              -webkit-box-direction: normal;
                      flex-flow: row wrap;
              -webkit-box-align: center;
                      align-items: center;
              margin-bottom: 0; }
            .form-inline .form-control {
              display: inline-block;
              width: auto;
              vertical-align: middle; }
            .form-inline .form-control-plaintext {
              display: inline-block; }
            .form-inline .input-group,
            .form-inline .custom-select {
              width: auto; }
            .form-inline .form-check {
              display: -webkit-box;
              display: flex;
              -webkit-box-align: center;
                      align-items: center;
              -webkit-box-pack: center;
                      justify-content: center;
              width: auto;
              padding-left: 0; }
            .form-inline .form-check-input {
              position: relative;
              margin-top: 0;
              margin-right: 0.25rem;
              margin-left: 0; }
            .form-inline .custom-control {
              -webkit-box-align: center;
                      align-items: center;
              -webkit-box-pack: center;
                      justify-content: center; }
            .form-inline .custom-control-label {
              margin-bottom: 0; } }

        .btn {
          display: inline-block;
          font-weight: 600;
          color: #757575;
          text-align: center;
          vertical-align: middle;
          -webkit-user-select: none;
            -moz-user-select: none;
              -ms-user-select: none;
                  user-select: none;
          background-color: transparent;
          border: 1px solid transparent;
          padding: 0.375rem 0.75rem;
          font-size: 0.9375rem;
          line-height: 1.9;
          border-radius: 0.25rem;
          -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out; }
          @media screen and (prefers-reduced-motion: reduce) {
            .btn {
              -webkit-transition: none;
              transition: none; } }
          .btn:hover {
            color: #757575;
            text-decoration: none; }
          .btn:focus, .btn.focus {
            outline: 0;
            -webkit-box-shadow: none;
                    box-shadow: none; }
          .btn.disabled, .btn:disabled {
            opacity: 0.65; }
          .btn:not(:disabled):not(.disabled) {
            cursor: pointer; }

        a.btn.disabled,
        fieldset:disabled a.btn {
          pointer-events: none; }

        .btn-primary {
          color: #fff;
          background-color: #50a1ff;
          border-color: #50a1ff; }
          .btn-primary:hover {
            color: #fff;
            background-color: #3c96ff;
            border-color: #3c96ff;
            -webkit-box-shadow: 0 1px 10px rgba(80, 161, 255, 0.4);
                    box-shadow: 0 1px 10px rgba(80, 161, 255, 0.4); }
          .btn-primary:focus, .btn-primary.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5);
                    box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5); }
          .btn-primary.disabled, .btn-primary:disabled {
            background-color: #50a1ff;
            border-color: #50a1ff; }
          .btn-primary:not([disabled]):not(.disabled):active, .btn-primary:not([disabled]):not(.disabled).active,
          .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #278bff;
            border-color: #278bff;
            -webkit-box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5);
                    box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5); }

        .btn-secondary {
          color: #757575;
          background-color: #e9ecf0;
          border-color: #e9ecf0; }
          .btn-secondary:hover {
            color: #757575;
            background-color: #dde2e8;
            border-color: #dde2e8;
            -webkit-box-shadow: 0 1px 10px rgba(233, 236, 240, 0.4);
                    box-shadow: 0 1px 10px rgba(233, 236, 240, 0.4); }
          .btn-secondary:focus, .btn-secondary.focus {
            color: #757575;
            -webkit-box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5);
                    box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5); }
          .btn-secondary.disabled, .btn-secondary:disabled {
            background-color: #e9ecf0;
            border-color: #e9ecf0; }
          .btn-secondary:not([disabled]):not(.disabled):active, .btn-secondary:not([disabled]):not(.disabled).active,
          .show > .btn-secondary.dropdown-toggle {
            color: #757575;
            background-color: #d1d7df;
            border-color: #d1d7df;
            -webkit-box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5);
                    box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5); }

        .btn-success {
          color: #fff;
          background-color: #3cd458;
          border-color: #3cd458; }
          .btn-success:hover {
            color: #fff;
            background-color: #2dce4b;
            border-color: #2dce4b;
            -webkit-box-shadow: 0 1px 10px rgba(60, 212, 88, 0.4);
                    box-shadow: 0 1px 10px rgba(60, 212, 88, 0.4); }
          .btn-success:focus, .btn-success.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5);
                    box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5); }
          .btn-success.disabled, .btn-success:disabled {
            background-color: #3cd458;
            border-color: #3cd458; }
          .btn-success:not([disabled]):not(.disabled):active, .btn-success:not([disabled]):not(.disabled).active,
          .show > .btn-success.dropdown-toggle {
            color: #fff;
            background-color: #2abd45;
            border-color: #2abd45;
            -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5);
                    box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5); }

        .btn-info {
          color: #fff;
          background-color: #926dde;
          border-color: #926dde; }
          .btn-info:hover {
            color: #fff;
            background-color: #865cda;
            border-color: #865cda;
            -webkit-box-shadow: 0 1px 10px rgba(146, 109, 222, 0.4);
                    box-shadow: 0 1px 10px rgba(146, 109, 222, 0.4); }
          .btn-info:focus, .btn-info.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5);
                    box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5); }
          .btn-info.disabled, .btn-info:disabled {
            background-color: #926dde;
            border-color: #926dde; }
          .btn-info:not([disabled]):not(.disabled):active, .btn-info:not([disabled]):not(.disabled).active,
          .show > .btn-info.dropdown-toggle {
            color: #fff;
            background-color: #794cd6;
            border-color: #794cd6;
            -webkit-box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5);
                    box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5); }

        .btn-warning {
          color: #fff;
          background-color: #ffba00;
          border-color: #ffba00; }
          .btn-warning:hover {
            color: #fff;
            background-color: #ebab00;
            border-color: #ebab00;
            -webkit-box-shadow: 0 1px 10px rgba(255, 186, 0, 0.4);
                    box-shadow: 0 1px 10px rgba(255, 186, 0, 0.4); }
          .btn-warning:focus, .btn-warning.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5); }
          .btn-warning.disabled, .btn-warning:disabled {
            background-color: #ffba00;
            border-color: #ffba00; }
          .btn-warning:not([disabled]):not(.disabled):active, .btn-warning:not([disabled]):not(.disabled).active,
          .show > .btn-warning.dropdown-toggle {
            color: #fff;
            background-color: #d69c00;
            border-color: #d69c00;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5); }

        .btn-danger {
          color: #fff;
          background-color: #ff4954;
          border-color: #ff4954; }
          .btn-danger:hover {
            color: #fff;
            background-color: #ff3541;
            border-color: #ff3541;
            -webkit-box-shadow: 0 1px 10px rgba(255, 73, 84, 0.4);
                    box-shadow: 0 1px 10px rgba(255, 73, 84, 0.4); }
          .btn-danger:focus, .btn-danger.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5); }
          .btn-danger.disabled, .btn-danger:disabled {
            background-color: #ff4954;
            border-color: #ff4954; }
          .btn-danger:not([disabled]):not(.disabled):active, .btn-danger:not([disabled]):not(.disabled).active,
          .show > .btn-danger.dropdown-toggle {
            color: #fff;
            background-color: #ff202e;
            border-color: #ff202e;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5); }

        .btn-light {
          color: #757575;
          background-color: #f8f9fa;
          border-color: #f8f9fa; }
          .btn-light:hover {
            color: #757575;
            background-color: #eceff2;
            border-color: #eceff2;
            -webkit-box-shadow: 0 1px 10px rgba(248, 249, 250, 0.4);
                    box-shadow: 0 1px 10px rgba(248, 249, 250, 0.4); }
          .btn-light:focus, .btn-light.focus {
            color: #757575;
            -webkit-box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5);
                    box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5); }
          .btn-light.disabled, .btn-light:disabled {
            background-color: #f8f9fa;
            border-color: #f8f9fa; }
          .btn-light:not([disabled]):not(.disabled):active, .btn-light:not([disabled]):not(.disabled).active,
          .show > .btn-light.dropdown-toggle {
            color: #757575;
            background-color: #e0e5e9;
            border-color: #e0e5e9;
            -webkit-box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5);
                    box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5); }

        .btn-dark {
          color: #fff;
          background-color: #191919;
          border-color: #191919; }
          .btn-dark:hover {
            color: #fff;
            background-color: #0f0f0f;
            border-color: #0f0f0f;
            -webkit-box-shadow: 0 1px 10px rgba(25, 25, 25, 0.4);
                    box-shadow: 0 1px 10px rgba(25, 25, 25, 0.4); }
          .btn-dark:focus, .btn-dark.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5);
                    box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5); }
          .btn-dark.disabled, .btn-dark:disabled {
            background-color: #191919;
            border-color: #191919; }
          .btn-dark:not([disabled]):not(.disabled):active, .btn-dark:not([disabled]):not(.disabled).active,
          .show > .btn-dark.dropdown-toggle {
            color: #fff;
            background-color: #050505;
            border-color: #050505;
            -webkit-box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5);
                    box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5); }

        .btn-outline-primary {
          color: #50a1ff;
          background-color: transparent;
          background-image: none;
          border-color: #50a1ff; }
          .btn-outline-primary:focus, .btn-outline-primary.focus {
            color: #50a1ff;
            -webkit-box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5);
                    box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5); }
          .btn-outline-primary:hover {
            color: #fff;
            background-color: #50a1ff;
            border-color: #50a1ff;
            -webkit-box-shadow: 0 1px 10px rgba(80, 161, 255, 0.4);
                    box-shadow: 0 1px 10px rgba(80, 161, 255, 0.4); }
          .btn-outline-primary.disabled, .btn-outline-primary:disabled {
            color: #50a1ff;
            background-color: transparent; }
          .btn-outline-primary:not([disabled]):not(.disabled):active, .btn-outline-primary:not([disabled]):not(.disabled).active,
          .show > .btn-outline-primary.dropdown-toggle {
            color: #fff;
            background-color: #50a1ff;
            border-color: #50a1ff;
            -webkit-box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5);
                    box-shadow: 0 0 0 0rem rgba(80, 161, 255, 0.5); }

        .btn-outline-secondary {
          color: #e9ecf0;
          background-color: transparent;
          background-image: none;
          border-color: #e9ecf0; }
          .btn-outline-secondary:focus, .btn-outline-secondary.focus {
            color: #e9ecf0;
            -webkit-box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5);
                    box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5); }
          .btn-outline-secondary:hover {
            color: #757575;
            background-color: #e9ecf0;
            border-color: #e9ecf0;
            -webkit-box-shadow: 0 1px 10px rgba(233, 236, 240, 0.4);
                    box-shadow: 0 1px 10px rgba(233, 236, 240, 0.4); }
          .btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
            color: #e9ecf0;
            background-color: transparent; }
          .btn-outline-secondary:not([disabled]):not(.disabled):active, .btn-outline-secondary:not([disabled]):not(.disabled).active,
          .show > .btn-outline-secondary.dropdown-toggle {
            color: #757575;
            background-color: #e9ecf0;
            border-color: #e9ecf0;
            -webkit-box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5);
                    box-shadow: 0 0 0 0rem rgba(233, 236, 240, 0.5); }

        .btn-outline-success {
          color: #3cd458;
          background-color: transparent;
          background-image: none;
          border-color: #3cd458; }
          .btn-outline-success:focus, .btn-outline-success.focus {
            color: #3cd458;
            -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5);
                    box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5); }
          .btn-outline-success:hover {
            color: #fff;
            background-color: #3cd458;
            border-color: #3cd458;
            -webkit-box-shadow: 0 1px 10px rgba(60, 212, 88, 0.4);
                    box-shadow: 0 1px 10px rgba(60, 212, 88, 0.4); }
          .btn-outline-success.disabled, .btn-outline-success:disabled {
            color: #3cd458;
            background-color: transparent; }
          .btn-outline-success:not([disabled]):not(.disabled):active, .btn-outline-success:not([disabled]):not(.disabled).active,
          .show > .btn-outline-success.dropdown-toggle {
            color: #fff;
            background-color: #3cd458;
            border-color: #3cd458;
            -webkit-box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5);
                    box-shadow: 0 0 0 0rem rgba(60, 212, 88, 0.5); }

        .btn-outline-info {
          color: #926dde;
          background-color: transparent;
          background-image: none;
          border-color: #926dde; }
          .btn-outline-info:focus, .btn-outline-info.focus {
            color: #926dde;
            -webkit-box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5);
                    box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5); }
          .btn-outline-info:hover {
            color: #fff;
            background-color: #926dde;
            border-color: #926dde;
            -webkit-box-shadow: 0 1px 10px rgba(146, 109, 222, 0.4);
                    box-shadow: 0 1px 10px rgba(146, 109, 222, 0.4); }
          .btn-outline-info.disabled, .btn-outline-info:disabled {
            color: #926dde;
            background-color: transparent; }
          .btn-outline-info:not([disabled]):not(.disabled):active, .btn-outline-info:not([disabled]):not(.disabled).active,
          .show > .btn-outline-info.dropdown-toggle {
            color: #fff;
            background-color: #926dde;
            border-color: #926dde;
            -webkit-box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5);
                    box-shadow: 0 0 0 0rem rgba(146, 109, 222, 0.5); }

        .btn-outline-warning {
          color: #ffba00;
          background-color: transparent;
          background-image: none;
          border-color: #ffba00; }
          .btn-outline-warning:focus, .btn-outline-warning.focus {
            color: #ffba00;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5); }
          .btn-outline-warning:hover {
            color: #fff;
            background-color: #ffba00;
            border-color: #ffba00;
            -webkit-box-shadow: 0 1px 10px rgba(255, 186, 0, 0.4);
                    box-shadow: 0 1px 10px rgba(255, 186, 0, 0.4); }
          .btn-outline-warning.disabled, .btn-outline-warning:disabled {
            color: #ffba00;
            background-color: transparent; }
          .btn-outline-warning:not([disabled]):not(.disabled):active, .btn-outline-warning:not([disabled]):not(.disabled).active,
          .show > .btn-outline-warning.dropdown-toggle {
            color: #fff;
            background-color: #ffba00;
            border-color: #ffba00;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 186, 0, 0.5); }

        .btn-outline-danger {
          color: #ff4954;
          background-color: transparent;
          background-image: none;
          border-color: #ff4954; }
          .btn-outline-danger:focus, .btn-outline-danger.focus {
            color: #ff4954;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5); }
          .btn-outline-danger:hover {
            color: #fff;
            background-color: #ff4954;
            border-color: #ff4954;
            -webkit-box-shadow: 0 1px 10px rgba(255, 73, 84, 0.4);
                    box-shadow: 0 1px 10px rgba(255, 73, 84, 0.4); }
          .btn-outline-danger.disabled, .btn-outline-danger:disabled {
            color: #ff4954;
            background-color: transparent; }
          .btn-outline-danger:not([disabled]):not(.disabled):active, .btn-outline-danger:not([disabled]):not(.disabled).active,
          .show > .btn-outline-danger.dropdown-toggle {
            color: #fff;
            background-color: #ff4954;
            border-color: #ff4954;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 73, 84, 0.5); }

        .btn-outline-light {
          color: #f8f9fa;
          background-color: transparent;
          background-image: none;
          border-color: #f8f9fa; }
          .btn-outline-light:focus, .btn-outline-light.focus {
            color: #f8f9fa;
            -webkit-box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5);
                    box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5); }
          .btn-outline-light:hover {
            color: #757575;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
            -webkit-box-shadow: 0 1px 10px rgba(248, 249, 250, 0.4);
                    box-shadow: 0 1px 10px rgba(248, 249, 250, 0.4); }
          .btn-outline-light.disabled, .btn-outline-light:disabled {
            color: #f8f9fa;
            background-color: transparent; }
          .btn-outline-light:not([disabled]):not(.disabled):active, .btn-outline-light:not([disabled]):not(.disabled).active,
          .show > .btn-outline-light.dropdown-toggle {
            color: #757575;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
            -webkit-box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5);
                    box-shadow: 0 0 0 0rem rgba(248, 249, 250, 0.5); }

        .btn-outline-dark {
          color: #191919;
          background-color: transparent;
          background-image: none;
          border-color: #191919; }
          .btn-outline-dark:focus, .btn-outline-dark.focus {
            color: #191919;
            -webkit-box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5);
                    box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5); }
          .btn-outline-dark:hover {
            color: #fff;
            background-color: #191919;
            border-color: #191919;
            -webkit-box-shadow: 0 1px 10px rgba(25, 25, 25, 0.4);
                    box-shadow: 0 1px 10px rgba(25, 25, 25, 0.4); }
          .btn-outline-dark.disabled, .btn-outline-dark:disabled {
            color: #191919;
            background-color: transparent; }
          .btn-outline-dark:not([disabled]):not(.disabled):active, .btn-outline-dark:not([disabled]):not(.disabled).active,
          .show > .btn-outline-dark.dropdown-toggle {
            color: #fff;
            background-color: #191919;
            border-color: #191919;
            -webkit-box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5);
                    box-shadow: 0 0 0 0rem rgba(25, 25, 25, 0.5); }

        .btn-link {
          font-weight: 400;
          color: #50a1ff; }
          .btn-link:hover {
            color: #0478ff;
            text-decoration: underline; }
          .btn-link:focus, .btn-link.focus {
            text-decoration: underline;
            -webkit-box-shadow: none;
                    box-shadow: none; }
          .btn-link:disabled, .btn-link.disabled {
            color: #868e96;
            pointer-events: none; }

        .btn-lg, .btn-group-lg > .btn, .input-group-lg > .input-group-prepend > .btn,
        .input-group-lg > .input-group-append > .btn {
          padding: 0.375rem 1rem;
          font-size: 1.0625rem;
          line-height: 2.2;
          border-radius: 0.3rem; }

        .btn-sm, .btn-group-sm > .btn, .input-group-sm > .input-group-prepend > .btn,
        .input-group-sm > .input-group-append > .btn {
          padding: 0.375rem 0.5rem;
          font-size: 0.9375rem;
          line-height: 1.5;
          border-radius: 0.125rem; }

        .btn-block {
          display: block;
          width: 100%; }
          .btn-block + .btn-block {
            margin-top: 0.5rem; }

        input[type="submit"].btn-block,
        input[type="reset"].btn-block,
        input[type="button"].btn-block {
          width: 100%; }

        .fade {
          -webkit-transition: opacity 0.15s linear;
          transition: opacity 0.15s linear; }
          @media screen and (prefers-reduced-motion: reduce) {
            .fade {
              -webkit-transition: none;
              transition: none; } }
          .fade:not(.show) {
            opacity: 0; }

        .collapse:not(.show) {
          display: none; }

        .collapsing {
          position: relative;
          height: 0;
          overflow: hidden;
          -webkit-transition: height 0.35s ease;
          transition: height 0.35s ease; }
          @media screen and (prefers-reduced-motion: reduce) {
            .collapsing {
              -webkit-transition: none;
              transition: none; } }

        .dropup,
        .dropright,
        .dropdown,
        .dropleft {
          position: relative; }

        .dropdown-toggle::after {
          display: inline-block;
          margin-left: 0.255em;
          vertical-align: 0.255em;
          content: "";
          border-top: 0.3em solid;
          border-right: 0.3em solid transparent;
          border-bottom: 0;
          border-left: 0.3em solid transparent; }

        .dropdown-toggle:empty::after {
          margin-left: 0; }

        .dropdown-menu {
          position: absolute;
          top: 100%;
          left: 0;
          z-index: 1000;
          display: none;
          float: left;
          min-width: 10rem;
          padding: 0.5rem 0;
          margin: 0.125rem 0 0;
          font-size: 0.9375rem;
          color: #757575;
          text-align: left;
          list-style: none;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid rgba(0, 0, 0, 0.15);
          border-radius: 0.25rem; }

        .dropdown-menu-right {
          right: 0;
          left: auto; }

        @media (min-width: 576px) {
          .dropdown-menu-sm-right {
            right: 0;
            left: auto; } }

        @media (min-width: 768px) {
          .dropdown-menu-md-right {
            right: 0;
            left: auto; } }

        @media (min-width: 992px) {
          .dropdown-menu-lg-right {
            right: 0;
            left: auto; } }

        @media (min-width: 1200px) {
          .dropdown-menu-xl-right {
            right: 0;
            left: auto; } }

        .dropdown-menu-left {
          right: auto;
          left: 0; }

        @media (min-width: 576px) {
          .dropdown-menu-sm-left {
            right: auto;
            left: 0; } }

        @media (min-width: 768px) {
          .dropdown-menu-md-left {
            right: auto;
            left: 0; } }

        @media (min-width: 992px) {
          .dropdown-menu-lg-left {
            right: auto;
            left: 0; } }

        @media (min-width: 1200px) {
          .dropdown-menu-xl-left {
            right: auto;
            left: 0; } }

        .dropup .dropdown-menu {
          top: auto;
          bottom: 100%;
          margin-top: 0;
          margin-bottom: 0.125rem; }

        .dropup .dropdown-toggle::after {
          display: inline-block;
          margin-left: 0.255em;
          vertical-align: 0.255em;
          content: "";
          border-top: 0;
          border-right: 0.3em solid transparent;
          border-bottom: 0.3em solid;
          border-left: 0.3em solid transparent; }

        .dropup .dropdown-toggle:empty::after {
          margin-left: 0; }

        .dropright .dropdown-menu {
          top: 0;
          right: auto;
          left: 100%;
          margin-top: 0;
          margin-left: 0.125rem; }

        .dropright .dropdown-toggle::after {
          display: inline-block;
          margin-left: 0.255em;
          vertical-align: 0.255em;
          content: "";
          border-top: 0.3em solid transparent;
          border-right: 0;
          border-bottom: 0.3em solid transparent;
          border-left: 0.3em solid; }

        .dropright .dropdown-toggle:empty::after {
          margin-left: 0; }

        .dropright .dropdown-toggle::after {
          vertical-align: 0; }

        .dropleft .dropdown-menu {
          top: 0;
          right: 100%;
          left: auto;
          margin-top: 0;
          margin-right: 0.125rem; }

        .dropleft .dropdown-toggle::after {
          display: inline-block;
          margin-left: 0.255em;
          vertical-align: 0.255em;
          content: ""; }

        .dropleft .dropdown-toggle::after {
          display: none; }

        .dropleft .dropdown-toggle::before {
          display: inline-block;
          margin-right: 0.255em;
          vertical-align: 0.255em;
          content: "";
          border-top: 0.3em solid transparent;
          border-right: 0.3em solid;
          border-bottom: 0.3em solid transparent; }

        .dropleft .dropdown-toggle:empty::after {
          margin-left: 0; }

        .dropleft .dropdown-toggle::before {
          vertical-align: 0; }

        .dropdown-menu[x-placement^="top"], .dropdown-menu[x-placement^="right"], .dropdown-menu[x-placement^="bottom"], .dropdown-menu[x-placement^="left"] {
          right: auto;
          bottom: auto; }

        .dropdown-divider {
          height: 0;
          margin: 0.5rem 0;
          overflow: hidden;
          border-top: 1px solid #e9ecef; }

        .dropdown-item {
          display: block;
          width: 100%;
          padding: 0.25rem 1.5rem;
          clear: both;
          font-weight: 400;
          color: #212529;
          text-align: inherit;
          white-space: nowrap;
          background-color: transparent;
          border: 0; }
          .dropdown-item:first-child {
            border-top-left-radius: calc(0.25rem - 1px);
            border-top-right-radius: calc(0.25rem - 1px); }
          .dropdown-item:last-child {
            border-bottom-right-radius: calc(0.25rem - 1px);
            border-bottom-left-radius: calc(0.25rem - 1px); }
          .dropdown-item:hover, .dropdown-item:focus {
            color: #16181b;
            text-decoration: none;
            background-color: #f8f9fa; }
          .dropdown-item.active, .dropdown-item:active {
            color: #fff;
            text-decoration: none;
            background-color: #50a1ff; }
          .dropdown-item.disabled, .dropdown-item:disabled {
            color: #868e96;
            pointer-events: none;
            background-color: transparent; }

        .dropdown-menu.show {
          display: block; }

        .dropdown-header {
          display: block;
          padding: 0.5rem 1.5rem;
          margin-bottom: 0;
          font-size: 0.9375rem;
          color: #868e96;
          white-space: nowrap; }

        .dropdown-item-text {
          display: block;
          padding: 0.25rem 1.5rem;
          color: #212529; }

        .btn-group,
        .btn-group-vertical {
          position: relative;
          display: -webkit-inline-box;
          display: inline-flex;
          vertical-align: middle; }
          .btn-group > .btn,
          .btn-group-vertical > .btn {
            position: relative;
            -webkit-box-flex: 1;
                    flex: 1 1 auto; }
            .btn-group > .btn:hover,
            .btn-group-vertical > .btn:hover {
              z-index: 1; }
            .btn-group > .btn:focus, .btn-group > .btn:active, .btn-group > .btn.active,
            .btn-group-vertical > .btn:focus,
            .btn-group-vertical > .btn:active,
            .btn-group-vertical > .btn.active {
              z-index: 1; }

        .btn-toolbar {
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap;
          -webkit-box-pack: start;
                  justify-content: flex-start; }
          .btn-toolbar .input-group {
            width: auto; }

        .btn-group > .btn:not(:first-child),
        .btn-group > .btn-group:not(:first-child) {
          margin-left: -1px; }

        .btn-group > .btn:not(:last-child):not(.dropdown-toggle),
        .btn-group > .btn-group:not(:last-child) > .btn {
          border-top-right-radius: 0;
          border-bottom-right-radius: 0; }

        .btn-group > .btn:not(:first-child),
        .btn-group > .btn-group:not(:first-child) > .btn {
          border-top-left-radius: 0;
          border-bottom-left-radius: 0; }

        .dropdown-toggle-split {
          padding-right: 0.5625rem;
          padding-left: 0.5625rem; }
          .dropdown-toggle-split::after,
          .dropup .dropdown-toggle-split::after,
          .dropright .dropdown-toggle-split::after {
            margin-left: 0; }
          .dropleft .dropdown-toggle-split::before {
            margin-right: 0; }

        .btn-sm + .dropdown-toggle-split, .btn-group-sm > .btn + .dropdown-toggle-split, .input-group-sm > .input-group-prepend > .btn + .dropdown-toggle-split, .input-group-sm > .input-group-append > .btn + .dropdown-toggle-split {
          padding-right: 0.375rem;
          padding-left: 0.375rem; }

        .btn-lg + .dropdown-toggle-split, .btn-group-lg > .btn + .dropdown-toggle-split, .input-group-lg > .input-group-prepend > .btn + .dropdown-toggle-split, .input-group-lg > .input-group-append > .btn + .dropdown-toggle-split {
          padding-right: 0.75rem;
          padding-left: 0.75rem; }

        .btn-group-vertical {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          -webkit-box-align: start;
                  align-items: flex-start;
          -webkit-box-pack: center;
                  justify-content: center; }
          .btn-group-vertical > .btn,
          .btn-group-vertical > .btn-group {
            width: 100%; }
          .btn-group-vertical > .btn:not(:first-child),
          .btn-group-vertical > .btn-group:not(:first-child) {
            margin-top: -1px; }
          .btn-group-vertical > .btn:not(:last-child):not(.dropdown-toggle),
          .btn-group-vertical > .btn-group:not(:last-child) > .btn {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0; }
          .btn-group-vertical > .btn:not(:first-child),
          .btn-group-vertical > .btn-group:not(:first-child) > .btn {
            border-top-left-radius: 0;
            border-top-right-radius: 0; }

        .btn-group-toggle > .btn,
        .btn-group-toggle > .btn-group > .btn {
          margin-bottom: 0; }
          .btn-group-toggle > .btn input[type="radio"],
          .btn-group-toggle > .btn input[type="checkbox"],
          .btn-group-toggle > .btn-group > .btn input[type="radio"],
          .btn-group-toggle > .btn-group > .btn input[type="checkbox"] {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none; }

        .input-group {
          position: relative;
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap;
          -webkit-box-align: stretch;
                  align-items: stretch;
          width: 100%; }
          .input-group > .form-control,
          .input-group > .form-control-plaintext,
          .input-group > .custom-select,
          .input-group > .custom-file {
            position: relative;
            -webkit-box-flex: 1;
                    flex: 1 1 auto;
            width: 1%;
            margin-bottom: 0; }
            .input-group > .form-control + .form-control,
            .input-group > .form-control + .custom-select,
            .input-group > .form-control + .custom-file,
            .input-group > .form-control-plaintext + .form-control,
            .input-group > .form-control-plaintext + .custom-select,
            .input-group > .form-control-plaintext + .custom-file,
            .input-group > .custom-select + .form-control,
            .input-group > .custom-select + .custom-select,
            .input-group > .custom-select + .custom-file,
            .input-group > .custom-file + .form-control,
            .input-group > .custom-file + .custom-select,
            .input-group > .custom-file + .custom-file {
              margin-left: -1px; }
          .input-group > .form-control:focus,
          .input-group > .custom-select:focus,
          .input-group > .custom-file .custom-file-input:focus ~ .custom-file-label {
            z-index: 3; }
          .input-group > .custom-file .custom-file-input:focus {
            z-index: 4; }
          .input-group > .form-control:not(:last-child),
          .input-group > .custom-select:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0; }
          .input-group > .form-control:not(:first-child),
          .input-group > .custom-select:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0; }
          .input-group > .custom-file {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
                    align-items: center; }
            .input-group > .custom-file:not(:last-child) .custom-file-label,
            .input-group > .custom-file:not(:last-child) .custom-file-label::after {
              border-top-right-radius: 0;
              border-bottom-right-radius: 0; }
            .input-group > .custom-file:not(:first-child) .custom-file-label {
              border-top-left-radius: 0;
              border-bottom-left-radius: 0; }

        .input-group-prepend,
        .input-group-append {
          display: -webkit-box;
          display: flex; }
          .input-group-prepend .btn,
          .input-group-append .btn {
            position: relative;
            z-index: 2; }
            .input-group-prepend .btn:focus,
            .input-group-append .btn:focus {
              z-index: 3; }
          .input-group-prepend .btn + .btn,
          .input-group-prepend .btn + .input-group-text,
          .input-group-prepend .input-group-text + .input-group-text,
          .input-group-prepend .input-group-text + .btn,
          .input-group-append .btn + .btn,
          .input-group-append .btn + .input-group-text,
          .input-group-append .input-group-text + .input-group-text,
          .input-group-append .input-group-text + .btn {
            margin-left: -1px; }

        .input-group-prepend {
          margin-right: -1px; }

        .input-group-append {
          margin-left: -1px; }

        .input-group-text {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          padding: 0.375rem 0.75rem;
          margin-bottom: 0;
          font-size: 0.9375rem;
          font-weight: 400;
          line-height: 1.9;
          color: #999999;
          text-align: center;
          white-space: nowrap;
          background-color: #e9ecef;
          border: 1px solid #eaeff4;
          border-radius: 2px; }
          .input-group-text input[type="radio"],
          .input-group-text input[type="checkbox"] {
            margin-top: 0; }

        .input-group-lg > .form-control:not(textarea),
        .input-group-lg > .custom-select {
          height: calc(3.0875rem + 2px); }

        .input-group-lg > .form-control,
        .input-group-lg > .custom-select,
        .input-group-lg > .input-group-prepend > .input-group-text,
        .input-group-lg > .input-group-append > .input-group-text,
        .input-group-lg > .input-group-prepend > .btn,
        .input-group-lg > .input-group-append > .btn {
          padding: 0.375rem 1rem;
          font-size: 1.0625rem;
          line-height: 2.2;
          border-radius: 2px; }

        .input-group-sm > .form-control:not(textarea),
        .input-group-sm > .custom-select {
          height: calc(2.15625rem + 2px); }

        .input-group-sm > .form-control,
        .input-group-sm > .custom-select,
        .input-group-sm > .input-group-prepend > .input-group-text,
        .input-group-sm > .input-group-append > .input-group-text,
        .input-group-sm > .input-group-prepend > .btn,
        .input-group-sm > .input-group-append > .btn {
          padding: 0.375rem 0.5rem;
          font-size: 0.9375rem;
          line-height: 1.5;
          border-radius: 2px; }

        .input-group-lg > .custom-select,
        .input-group-sm > .custom-select {
          padding-right: 1.75rem; }

        .input-group > .input-group-prepend > .btn,
        .input-group > .input-group-prepend > .input-group-text,
        .input-group > .input-group-append:not(:last-child) > .btn,
        .input-group > .input-group-append:not(:last-child) > .input-group-text,
        .input-group > .input-group-append:last-child > .btn:not(:last-child):not(.dropdown-toggle),
        .input-group > .input-group-append:last-child > .input-group-text:not(:last-child) {
          border-top-right-radius: 0;
          border-bottom-right-radius: 0; }

        .input-group > .input-group-append > .btn,
        .input-group > .input-group-append > .input-group-text,
        .input-group > .input-group-prepend:not(:first-child) > .btn,
        .input-group > .input-group-prepend:not(:first-child) > .input-group-text,
        .input-group > .input-group-prepend:first-child > .btn:not(:first-child),
        .input-group > .input-group-prepend:first-child > .input-group-text:not(:first-child) {
          border-top-left-radius: 0;
          border-bottom-left-radius: 0; }

        .custom-control {
          position: relative;
          display: block;
          min-height: 1.78125rem;
          padding-left: 1.625rem; }

        .custom-control-inline {
          display: -webkit-inline-box;
          display: inline-flex;
          margin-right: 1rem; }

        .custom-control-input {
          position: absolute;
          z-index: -1;
          opacity: 0; }
          .custom-control-input:checked ~ .custom-control-label::before {
            color: #fff;
            border-color: #fafbfb;
            background-color: #fafbfb; }
          .custom-control-input:focus ~ .custom-control-label::before {
            -webkit-box-shadow: none;
                    box-shadow: none; }
          .custom-control-input:focus:not(:checked) ~ .custom-control-label::before {
            border-color: #f1f2f3; }
          .custom-control-input:not(:disabled):active ~ .custom-control-label::before {
            color: #fff;
            background-color: #fafbfb;
            border-color: #fafbfb; }
          .custom-control-input:disabled ~ .custom-control-label {
            color: #868e96; }
            .custom-control-input:disabled ~ .custom-control-label::before {
              background-color: #fafbfb; }

        .custom-control-label {
          position: relative;
          margin-bottom: 0;
          vertical-align: top; }
          .custom-control-label::before {
            position: absolute;
            top: 0.32813rem;
            left: -1.625rem;
            display: block;
            width: 1.125rem;
            height: 1.125rem;
            pointer-events: none;
            content: "";
            background-color: #fafbfb;
            border: #adb5bd solid 1px; }
          .custom-control-label::after {
            position: absolute;
            top: 0.32813rem;
            left: -1.625rem;
            display: block;
            width: 1.125rem;
            height: 1.125rem;
            content: "";
            background-repeat: no-repeat;
            background-position: center center;
            -webkit-background-size: 50% 50%;
                    background-size: 50% 50%; }

        .custom-checkbox .custom-control-label::before {
          border-radius: 0; }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
          background-image: none; }

        .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
          border-color: #fafbfb;
          background-color: #fafbfb; }

        .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::after {
          background-image: none; }

        .custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
          background-color: #fafbfb; }

        .custom-checkbox .custom-control-input:disabled:indeterminate ~ .custom-control-label::before {
          background-color: #fafbfb; }

        .custom-radio .custom-control-label::before {
          border-radius: 50%; }

        .custom-radio .custom-control-input:checked ~ .custom-control-label::after {
          background-image: none; }

        .custom-radio .custom-control-input:disabled:checked ~ .custom-control-label::before {
          background-color: #fafbfb; }

        .custom-switch {
          padding-left: 2.46875rem; }
          .custom-switch .custom-control-label::before {
            left: -2.46875rem;
            width: 1.96875rem;
            pointer-events: all;
            border-radius: 0.5625rem; }
          .custom-switch .custom-control-label::after {
            top: calc(0.32813rem + 2px);
            left: calc(-2.46875rem + 2px);
            width: calc(1.125rem - 4px);
            height: calc(1.125rem - 4px);
            background-color: #adb5bd;
            border-radius: 0.5625rem;
            -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out; }
            @media screen and (prefers-reduced-motion: reduce) {
              .custom-switch .custom-control-label::after {
                -webkit-transition: none;
                transition: none; } }
          .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
            background-color: #fafbfb;
            -webkit-transform: translateX(0.84375rem);
                    transform: translateX(0.84375rem); }
          .custom-switch .custom-control-input:disabled:checked ~ .custom-control-label::before {
            background-color: #fafbfb; }

        .custom-select {
          display: inline-block;
          width: 100%;
          height: calc(2.53125rem + 2px);
          padding: 0.375rem 1.75rem 0.375rem 0.75rem;
          font-weight: 300;
          line-height: 1.9;
          color: #999999;
          vertical-align: middle;
          background-color: #fff;
          border: 1px solid #eaeff4;
          border-radius: 0.25rem;
          -webkit-appearance: none;
            -moz-appearance: none;
                  appearance: none; }
          .custom-select:focus {
            border-color: #f1f2f3;
            outline: 0;
            -webkit-box-shadow: 0 0 0 0rem rgba(241, 242, 243, 0.5);
                    box-shadow: 0 0 0 0rem rgba(241, 242, 243, 0.5); }
            .custom-select:focus::-ms-value {
              color: #999999;
              background-color: #fff; }
          .custom-select[multiple], .custom-select[size]:not([size="1"]) {
            height: auto;
            padding-right: 0.75rem;
            background-image: none; }
          .custom-select:disabled {
            color: #868e96;
            background-color: #e9ecef; }
          .custom-select::-ms-expand {
            opacity: 0; }

        .custom-select-sm {
          height: calc(2.15625rem + 2px);
          padding-top: 0.375rem;
          padding-bottom: 0.375rem;
          padding-left: 0.5rem;
          font-size: 0.9375rem; }

        .custom-select-lg {
          height: calc(3.0875rem + 2px);
          padding-top: 0.375rem;
          padding-bottom: 0.375rem;
          padding-left: 1rem;
          font-size: 1.0625rem; }

        .custom-file {
          position: relative;
          display: inline-block;
          width: 100%;
          height: calc(2.53125rem + 2px);
          margin-bottom: 0; }

        .custom-file-input {
          position: relative;
          z-index: 2;
          width: 100%;
          height: calc(2.53125rem + 2px);
          margin: 0;
          opacity: 0; }
          .custom-file-input:focus ~ .custom-file-label {
            border-color: #f1f2f3;
            -webkit-box-shadow: 0 0 40px rgba(0, 0, 0, 0.045);
                    box-shadow: 0 0 40px rgba(0, 0, 0, 0.045); }
          .custom-file-input:disabled ~ .custom-file-label {
            background-color: #e9ecef; }
          .custom-file-input:lang(en) ~ .custom-file-label::after {
            content: "Browse"; }
          .custom-file-input ~ .custom-file-label[data-browse]::after {
            content: attr(data-browse); }

        .custom-file-label {
          position: absolute;
          top: 0;
          right: 0;
          left: 0;
          z-index: 1;
          height: calc(2.53125rem + 2px);
          padding: 0.375rem 0.75rem;
          font-weight: 300;
          line-height: 1.9;
          color: #999999;
          background-color: #fff;
          border: 1px solid #eaeff4;
          border-radius: 2px; }
          .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: 2.53125rem;
            padding: 0.375rem 0.75rem;
            line-height: 1.9;
            color: #999999;
            content: "Browse";
            background-color: #e9ecef;
            border-left: inherit;
            border-radius: 0 2px 2px 0; }

        .custom-range {
          width: 100%;
          height: calc(1rem + 0rem);
          padding: 0;
          background-color: transparent;
          -webkit-appearance: none;
            -moz-appearance: none;
                  appearance: none; }
          .custom-range:focus {
            outline: none; }
            .custom-range:focus::-webkit-slider-thumb {
              -webkit-box-shadow: 0 0 0 1px #ffffff, 0 0 40px rgba(0, 0, 0, 0.045);
                      box-shadow: 0 0 0 1px #ffffff, 0 0 40px rgba(0, 0, 0, 0.045); }
            .custom-range:focus::-moz-range-thumb {
              box-shadow: 0 0 0 1px #ffffff, 0 0 40px rgba(0, 0, 0, 0.045); }
            .custom-range:focus::-ms-thumb {
              box-shadow: 0 0 0 1px #ffffff, 0 0 40px rgba(0, 0, 0, 0.045); }
          .custom-range::-moz-focus-outer {
            border: 0; }
          .custom-range::-webkit-slider-thumb {
            width: 1rem;
            height: 1rem;
            margin-top: -0.25rem;
            background-color: #50a1ff;
            border: 0;
            border-radius: 1rem;
            -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -webkit-appearance: none;
                    appearance: none; }
            @media screen and (prefers-reduced-motion: reduce) {
              .custom-range::-webkit-slider-thumb {
                -webkit-transition: none;
                transition: none; } }
            .custom-range::-webkit-slider-thumb:active {
              background-color: white; }
          .custom-range::-webkit-slider-runnable-track {
            width: 100%;
            height: 0.5rem;
            color: transparent;
            cursor: pointer;
            background-color: #dee2e6;
            border-color: transparent;
            border-radius: 1rem; }
          .custom-range::-moz-range-thumb {
            width: 1rem;
            height: 1rem;
            background-color: #50a1ff;
            border: 0;
            border-radius: 1rem;
            -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -moz-appearance: none;
                appearance: none; }
            @media screen and (prefers-reduced-motion: reduce) {
              .custom-range::-moz-range-thumb {
                -webkit-transition: none;
                transition: none; } }
            .custom-range::-moz-range-thumb:active {
              background-color: white; }
          .custom-range::-moz-range-track {
            width: 100%;
            height: 0.5rem;
            color: transparent;
            cursor: pointer;
            background-color: #dee2e6;
            border-color: transparent;
            border-radius: 1rem; }
          .custom-range::-ms-thumb {
            width: 1rem;
            height: 1rem;
            margin-top: 0;
            margin-right: 0rem;
            margin-left: 0rem;
            background-color: #50a1ff;
            border: 0;
            border-radius: 1rem;
            -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            appearance: none; }
            @media screen and (prefers-reduced-motion: reduce) {
              .custom-range::-ms-thumb {
                -webkit-transition: none;
                transition: none; } }
            .custom-range::-ms-thumb:active {
              background-color: white; }
          .custom-range::-ms-track {
            width: 100%;
            height: 0.5rem;
            color: transparent;
            cursor: pointer;
            background-color: transparent;
            border-color: transparent;
            border-width: 0.5rem; }
          .custom-range::-ms-fill-lower {
            background-color: #dee2e6;
            border-radius: 1rem; }
          .custom-range::-ms-fill-upper {
            margin-right: 15px;
            background-color: #dee2e6;
            border-radius: 1rem; }
          .custom-range:disabled::-webkit-slider-thumb {
            background-color: #adb5bd; }
          .custom-range:disabled::-webkit-slider-runnable-track {
            cursor: default; }
          .custom-range:disabled::-moz-range-thumb {
            background-color: #adb5bd; }
          .custom-range:disabled::-moz-range-track {
            cursor: default; }
          .custom-range:disabled::-ms-thumb {
            background-color: #adb5bd; }

        .custom-control-label::before,
        .custom-file-label,
        .custom-select {
          -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out; }
          @media screen and (prefers-reduced-motion: reduce) {
            .custom-control-label::before,
            .custom-file-label,
            .custom-select {
              -webkit-transition: none;
              transition: none; } }

        .nav {
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap;
          padding-left: 0;
          margin-bottom: 0;
          list-style: none; }

        .nav-link {
          display: block;
          padding: 0.5rem 1rem; }
          .nav-link:hover, .nav-link:focus {
            text-decoration: none; }
          .nav-link.disabled {
            color: #a5b3c7;
            pointer-events: none;
            cursor: default; }

        .nav-tabs {
          border-bottom: 1px solid #f1f2f3; }
          .nav-tabs .nav-item {
            margin-bottom: -1px; }
          .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: 0;
            border-top-right-radius: 0; }
            .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
              border-color: transparent transparent #f1f2f3; }
            .nav-tabs .nav-link.disabled {
              color: #a5b3c7;
              background-color: transparent;
              border-color: transparent; }
          .nav-tabs .nav-link.active,
          .nav-tabs .nav-item.show .nav-link {
            color: #757575;
            background-color: #ffffff;
            border-color: #50a1ff #f1f2f3 #ffffff; }
          .nav-tabs .dropdown-menu {
            margin-top: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0; }

        .nav-pills .nav-link {
          border-radius: 0.125rem; }

        .nav-pills .nav-link.active,
        .nav-pills .show > .nav-link {
          color: #757575;
          background-color: #e9ecf0; }

        .nav-fill .nav-item {
          -webkit-box-flex: 1;
                  flex: 1 1 auto;
          text-align: center; }

        .nav-justified .nav-item {
          flex-basis: 0;
          -webkit-box-flex: 1;
                  flex-grow: 1;
          text-align: center; }

        .tab-content > .tab-pane {
          display: none; }

        .tab-content > .active {
          display: block; }

        .navbar {
          position: relative;
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: justify;
                  justify-content: space-between;
          padding: 0.5rem 1rem; }
          .navbar > .container,
          .navbar > .container-fluid {
            display: -webkit-box;
            display: flex;
            flex-wrap: wrap;
            -webkit-box-align: center;
                    align-items: center;
            -webkit-box-pack: justify;
                    justify-content: space-between; }

        .navbar-brand {
          display: inline-block;
          padding-top: 0;
          padding-bottom: 0;
          margin-right: 1rem;
          font-size: 1.0625rem;
          line-height: inherit;
          white-space: nowrap; }
          .navbar-brand:hover, .navbar-brand:focus {
            text-decoration: none; }

        .navbar-nav {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          padding-left: 0;
          margin-bottom: 0;
          list-style: none; }
          .navbar-nav .nav-link {
            padding-right: 0;
            padding-left: 0; }
          .navbar-nav .dropdown-menu {
            position: static;
            float: none; }

        .navbar-text {
          display: inline-block;
          padding-top: 0.5rem;
          padding-bottom: 0.5rem; }

        .navbar-collapse {
          flex-basis: 100%;
          -webkit-box-flex: 1;
                  flex-grow: 1;
          -webkit-box-align: center;
                  align-items: center; }

        .navbar-toggler {
          padding: 0.25rem 0.75rem;
          font-size: 1.0625rem;
          line-height: 1;
          background-color: transparent;
          border: 1px solid transparent;
          border-radius: 0.25rem; }
          .navbar-toggler:hover, .navbar-toggler:focus {
            text-decoration: none; }
          .navbar-toggler:not(:disabled):not(.disabled) {
            cursor: pointer; }

        .navbar-toggler-icon {
          display: inline-block;
          width: 1.5em;
          height: 1.5em;
          vertical-align: middle;
          content: "";
          background: no-repeat center center;
          -webkit-background-size: 100% 100%;
                  background-size: 100% 100%; }

        @media (max-width: 575.98px) {
          .navbar-expand-sm > .container,
          .navbar-expand-sm > .container-fluid {
            padding-right: 0;
            padding-left: 0; } }

        @media (min-width: 576px) {
          .navbar-expand-sm {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-flow: row nowrap;
            -webkit-box-pack: start;
                    justify-content: flex-start; }
            .navbar-expand-sm .navbar-nav {
              -webkit-box-orient: horizontal;
              -webkit-box-direction: normal;
                      flex-direction: row; }
              .navbar-expand-sm .navbar-nav .dropdown-menu {
                position: absolute; }
              .navbar-expand-sm .navbar-nav .nav-link {
                padding-right: 0.5rem;
                padding-left: 0.5rem; }
            .navbar-expand-sm > .container,
            .navbar-expand-sm > .container-fluid {
              flex-wrap: nowrap; }
            .navbar-expand-sm .navbar-collapse {
              display: -webkit-box !important;
              display: flex !important;
              flex-basis: auto; }
            .navbar-expand-sm .navbar-toggler {
              display: none; } }

        @media (max-width: 767.98px) {
          .navbar-expand-md > .container,
          .navbar-expand-md > .container-fluid {
            padding-right: 0;
            padding-left: 0; } }

        @media (min-width: 768px) {
          .navbar-expand-md {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-flow: row nowrap;
            -webkit-box-pack: start;
                    justify-content: flex-start; }
            .navbar-expand-md .navbar-nav {
              -webkit-box-orient: horizontal;
              -webkit-box-direction: normal;
                      flex-direction: row; }
              .navbar-expand-md .navbar-nav .dropdown-menu {
                position: absolute; }
              .navbar-expand-md .navbar-nav .nav-link {
                padding-right: 0.5rem;
                padding-left: 0.5rem; }
            .navbar-expand-md > .container,
            .navbar-expand-md > .container-fluid {
              flex-wrap: nowrap; }
            .navbar-expand-md .navbar-collapse {
              display: -webkit-box !important;
              display: flex !important;
              flex-basis: auto; }
            .navbar-expand-md .navbar-toggler {
              display: none; } }

        @media (max-width: 991.98px) {
          .navbar-expand-lg > .container,
          .navbar-expand-lg > .container-fluid {
            padding-right: 0;
            padding-left: 0; } }

        @media (min-width: 992px) {
          .navbar-expand-lg {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-flow: row nowrap;
            -webkit-box-pack: start;
                    justify-content: flex-start; }
            .navbar-expand-lg .navbar-nav {
              -webkit-box-orient: horizontal;
              -webkit-box-direction: normal;
                      flex-direction: row; }
              .navbar-expand-lg .navbar-nav .dropdown-menu {
                position: absolute; }
              .navbar-expand-lg .navbar-nav .nav-link {
                padding-right: 0.5rem;
                padding-left: 0.5rem; }
            .navbar-expand-lg > .container,
            .navbar-expand-lg > .container-fluid {
              flex-wrap: nowrap; }
            .navbar-expand-lg .navbar-collapse {
              display: -webkit-box !important;
              display: flex !important;
              flex-basis: auto; }
            .navbar-expand-lg .navbar-toggler {
              display: none; } }

        @media (max-width: 1199.98px) {
          .navbar-expand-xl > .container,
          .navbar-expand-xl > .container-fluid {
            padding-right: 0;
            padding-left: 0; } }

        @media (min-width: 1200px) {
          .navbar-expand-xl {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-flow: row nowrap;
            -webkit-box-pack: start;
                    justify-content: flex-start; }
            .navbar-expand-xl .navbar-nav {
              -webkit-box-orient: horizontal;
              -webkit-box-direction: normal;
                      flex-direction: row; }
              .navbar-expand-xl .navbar-nav .dropdown-menu {
                position: absolute; }
              .navbar-expand-xl .navbar-nav .nav-link {
                padding-right: 0.5rem;
                padding-left: 0.5rem; }
            .navbar-expand-xl > .container,
            .navbar-expand-xl > .container-fluid {
              flex-wrap: nowrap; }
            .navbar-expand-xl .navbar-collapse {
              display: -webkit-box !important;
              display: flex !important;
              flex-basis: auto; }
            .navbar-expand-xl .navbar-toggler {
              display: none; } }

        .navbar-expand {
          -webkit-box-orient: horizontal;
          -webkit-box-direction: normal;
                  flex-flow: row nowrap;
          -webkit-box-pack: start;
                  justify-content: flex-start; }
          .navbar-expand > .container,
          .navbar-expand > .container-fluid {
            padding-right: 0;
            padding-left: 0; }
          .navbar-expand .navbar-nav {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-direction: row; }
            .navbar-expand .navbar-nav .dropdown-menu {
              position: absolute; }
            .navbar-expand .navbar-nav .nav-link {
              padding-right: 0.5rem;
              padding-left: 0.5rem; }
          .navbar-expand > .container,
          .navbar-expand > .container-fluid {
            flex-wrap: nowrap; }
          .navbar-expand .navbar-collapse {
            display: -webkit-box !important;
            display: flex !important;
            flex-basis: auto; }
          .navbar-expand .navbar-toggler {
            display: none; }

        .navbar-light .navbar-brand {
          color: rgba(0, 0, 0, 0.9); }
          .navbar-light .navbar-brand:hover, .navbar-light .navbar-brand:focus {
            color: rgba(0, 0, 0, 0.9); }

        .navbar-light .navbar-nav .nav-link {
          color: rgba(255, 255, 255, 0.65); }
          .navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
            color: rgba(0, 0, 0, 0.7); }
          .navbar-light .navbar-nav .nav-link.disabled {
            color: rgba(0, 0, 0, 0.3); }

        .navbar-light .navbar-nav .show > .nav-link,
        .navbar-light .navbar-nav .active > .nav-link,
        .navbar-light .navbar-nav .nav-link.show,
        .navbar-light .navbar-nav .nav-link.active {
          color: rgba(0, 0, 0, 0.9); }

        .navbar-light .navbar-toggler {
          color: rgba(255, 255, 255, 0.65);
          border-color: rgba(0, 0, 0, 0.1); }

        .navbar-light .navbar-toggler-icon {
        }
        .navbar-light .navbar-text {
          color: rgba(255, 255, 255, 0.65); }
          .navbar-light .navbar-text a {
            color: rgba(0, 0, 0, 0.9); }
            .navbar-light .navbar-text a:hover, .navbar-light .navbar-text a:focus {
              color: rgba(0, 0, 0, 0.9); }

        .navbar-dark .navbar-brand {
          color: #fff; }
          .navbar-dark .navbar-brand:hover, .navbar-dark .navbar-brand:focus {
            color: #fff; }

        .navbar-dark .navbar-nav .nav-link {
          color: rgba(117, 117, 117, 0.8); }
          .navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
            color: rgba(255, 255, 255, 0.75); }
          .navbar-dark .navbar-nav .nav-link.disabled {
            color: rgba(255, 255, 255, 0.25); }

        .navbar-dark .navbar-nav .show > .nav-link,
        .navbar-dark .navbar-nav .active > .nav-link,
        .navbar-dark .navbar-nav .nav-link.show,
        .navbar-dark .navbar-nav .nav-link.active {
          color: #fff; }

        .navbar-dark .navbar-toggler {
          color: rgba(117, 117, 117, 0.8);
          border-color: rgba(255, 255, 255, 0.1); }

        .navbar-dark .navbar-toggler-icon {
        }
        .navbar-dark .navbar-text {
          color: rgba(117, 117, 117, 0.8); }
          .navbar-dark .navbar-text a {
            color: #fff; }
            .navbar-dark .navbar-text a:hover, .navbar-dark .navbar-text a:focus {
              color: #fff; }

        .card {
          position: relative;
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          background-color: #fff;
          background-clip: border-box;
          border: 0 solid rgba(0, 0, 0, 0.125);
          border-radius: 0.25rem; }
          .card > hr {
            margin-right: 0;
            margin-left: 0; }
          .card > .list-group:first-child .list-group-item:first-child {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem; }
          .card > .list-group:last-child .list-group-item:last-child {
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem; }

        .card-body {
          -webkit-box-flex: 1;
                  flex: 1 1 auto;
          padding: 1.25rem; }

        .card-title {
          margin-bottom: 0.75rem; }

        .card-subtitle {
          margin-top: -0.375rem;
          margin-bottom: 0; }

        .card-text:last-child {
          margin-bottom: 0; }

        .card-link:hover {
          text-decoration: none; }

        .card-link + .card-link {
          margin-left: 1.25rem; }

        .card-header {
          padding: 0.75rem 1.25rem;
          margin-bottom: 0;
          color: inherit;
          background-color: rgba(0, 0, 0, 0.03);
          border-bottom: 0 solid rgba(0, 0, 0, 0.125); }
          .card-header:first-child {
            border-radius: calc(0.25rem - 0) calc(0.25rem - 0) 0 0; }
          .card-header + .list-group .list-group-item:first-child {
            border-top: 0; }

        .card-footer {
          padding: 0.75rem 1.25rem;
          background-color: rgba(0, 0, 0, 0.03);
          border-top: 0 solid rgba(0, 0, 0, 0.125); }
          .card-footer:last-child {
            border-radius: 0 0 calc(0.25rem - 0) calc(0.25rem - 0); }

        .card-header-tabs {
          margin-right: -0.625rem;
          margin-bottom: -0.75rem;
          margin-left: -0.625rem;
          border-bottom: 0; }

        .card-header-pills {
          margin-right: -0.625rem;
          margin-left: -0.625rem; }

        .card-img-overlay {
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          padding: 1.25rem; }

        .card-img {
          width: 100%;
          border-radius: calc(0.25rem - 0); }

        .card-img-top {
          width: 100%;
          border-top-left-radius: calc(0.25rem - 0);
          border-top-right-radius: calc(0.25rem - 0); }

        .card-img-bottom {
          width: 100%;
          border-bottom-right-radius: calc(0.25rem - 0);
          border-bottom-left-radius: calc(0.25rem - 0); }

        .card-deck {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column; }
          .card-deck .card {
            margin-bottom: 15px; }
          @media (min-width: 576px) {
            .card-deck {
              -webkit-box-orient: horizontal;
              -webkit-box-direction: normal;
                      flex-flow: row wrap;
              margin-right: -15px;
              margin-left: -15px; }
              .card-deck .card {
                display: -webkit-box;
                display: flex;
                -webkit-box-flex: 1;
                        flex: 1 0 0%;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                        flex-direction: column;
                margin-right: 15px;
                margin-bottom: 0;
                margin-left: 15px; } }

        .card-group {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column; }
          .card-group > .card {
            margin-bottom: 15px; }
          @media (min-width: 576px) {
            .card-group {
              -webkit-box-orient: horizontal;
              -webkit-box-direction: normal;
                      flex-flow: row wrap; }
              .card-group > .card {
                -webkit-box-flex: 1;
                        flex: 1 0 0%;
                margin-bottom: 0; }
                .card-group > .card + .card {
                  margin-left: 0;
                  border-left: 0; }
                .card-group > .card:first-child {
                  border-top-right-radius: 0;
                  border-bottom-right-radius: 0; }
                  .card-group > .card:first-child .card-img-top,
                  .card-group > .card:first-child .card-header {
                    border-top-right-radius: 0; }
                  .card-group > .card:first-child .card-img-bottom,
                  .card-group > .card:first-child .card-footer {
                    border-bottom-right-radius: 0; }
                .card-group > .card:last-child {
                  border-top-left-radius: 0;
                  border-bottom-left-radius: 0; }
                  .card-group > .card:last-child .card-img-top,
                  .card-group > .card:last-child .card-header {
                    border-top-left-radius: 0; }
                  .card-group > .card:last-child .card-img-bottom,
                  .card-group > .card:last-child .card-footer {
                    border-bottom-left-radius: 0; }
                .card-group > .card:only-child {
                  border-radius: 0.25rem; }
                  .card-group > .card:only-child .card-img-top,
                  .card-group > .card:only-child .card-header {
                    border-top-left-radius: 0.25rem;
                    border-top-right-radius: 0.25rem; }
                  .card-group > .card:only-child .card-img-bottom,
                  .card-group > .card:only-child .card-footer {
                    border-bottom-right-radius: 0.25rem;
                    border-bottom-left-radius: 0.25rem; }
                .card-group > .card:not(:first-child):not(:last-child):not(:only-child) {
                  border-radius: 0; }
                  .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-img-top,
                  .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
                  .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-header,
                  .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-footer {
                    border-radius: 0; } }

        .card-columns .card {
          margin-bottom: 0.75rem; }

        @media (min-width: 576px) {
          .card-columns {
            -webkit-column-count: 3;
              -moz-column-count: 3;
                    column-count: 3;
            -webkit-column-gap: 1.25rem;
              -moz-column-gap: 1.25rem;
                    column-gap: 1.25rem;
            orphans: 1;
            widows: 1; }
            .card-columns .card {
              display: inline-block;
              width: 100%; } }

        .accordion .card {
          overflow: hidden; }
          .accordion .card:not(:first-of-type) .card-header:first-child {
            border-radius: 0; }
          .accordion .card:not(:first-of-type):not(:last-of-type) {
            border-bottom: 0;
            border-radius: 0; }
          .accordion .card:first-of-type {
            border-bottom: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0; }
          .accordion .card:last-of-type {
            border-top-left-radius: 0;
            border-top-right-radius: 0; }
          .accordion .card .card-header {
            margin-bottom: 0; }

        .breadcrumb {
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap;
          padding: 0.75rem 1rem;
          margin-bottom: 1rem;
          list-style: none;
          background-color: transparent;
          border-radius: 0.25rem; }

        .breadcrumb-item + .breadcrumb-item {
          padding-left: 0.5rem; }
          .breadcrumb-item + .breadcrumb-item::before {
            display: inline-block;
            padding-right: 0.5rem;
            color: #bfc5ca;
            content: ""; }

        .breadcrumb-item + .breadcrumb-item:hover::before {
          text-decoration: underline; }

        .breadcrumb-item + .breadcrumb-item:hover::before {
          text-decoration: none; }

        .breadcrumb-item.active {
          color: #757575; }

        .pagination {
          display: -webkit-box;
          display: flex;
          padding-left: 0;
          list-style: none;
          border-radius: 0.25rem; }

        .page-link {
          position: relative;
          display: block;
          padding: 0.5rem 0.75rem;
          margin-left: -1px;
          line-height: 32px;
          color: #757575;
          background-color: #fff;
          border: 1px solid #eaeff4; }
          .page-link:hover {
            z-index: 2;
            color: #757575;
            text-decoration: none;
            background-color: #fafbfb;
            border-color: #eaeff4; }
          .page-link:focus {
            z-index: 2;
            outline: 0;
            -webkit-box-shadow: none;
                    box-shadow: none; }
          .page-link:not(:disabled):not(.disabled) {
            cursor: pointer; }

        .page-item:first-child .page-link {
          margin-left: 0;
          border-top-left-radius: 0.25rem;
          border-bottom-left-radius: 0.25rem; }

        .page-item:last-child .page-link {
          border-top-right-radius: 0.25rem;
          border-bottom-right-radius: 0.25rem; }

        .page-item.active .page-link {
          z-index: 1;
          color: #fff;
          background-color: #50a1ff;
          border-color: #50a1ff; }

        .page-item.disabled .page-link {
          color: #868e96;
          pointer-events: none;
          cursor: auto;
          background-color: #fff;
          border-color: #dee2e6; }

        .pagination-lg .page-link {
          padding: 0.75rem 1.5rem;
          font-size: 1.0625rem;
          line-height: 2.2; }

        .pagination-lg .page-item:first-child .page-link {
          border-top-left-radius: 0.3rem;
          border-bottom-left-radius: 0.3rem; }

        .pagination-lg .page-item:last-child .page-link {
          border-top-right-radius: 0.3rem;
          border-bottom-right-radius: 0.3rem; }

        .pagination-sm .page-link {
          padding: 0.25rem 0.5rem;
          font-size: 0.9375rem;
          line-height: 1.5; }

        .pagination-sm .page-item:first-child .page-link {
          border-top-left-radius: 0.125rem;
          border-bottom-left-radius: 0.125rem; }

        .pagination-sm .page-item:last-child .page-link {
          border-top-right-radius: 0.125rem;
          border-bottom-right-radius: 0.125rem; }

        .badge {
          display: inline-block;
          padding: 0.25em 0.5em;
          font-size: 80%;
          font-weight: 400;
          line-height: 1;
          text-align: center;
          white-space: nowrap;
          vertical-align: baseline;
          border-radius: 0.125rem; }
          a.badge:hover, a.badge:focus {
            text-decoration: none; }
          .badge:empty {
            display: none; }

        .btn .badge {
          position: relative;
          top: -1px; }

        .badge-pill {
          padding-right: 0.75em;
          padding-left: 0.75em;
          border-radius: 10rem; }

        .badge-primary {
          color: #fff;
          background-color: #50a1ff; }
          a.badge-primary:hover, a.badge-primary:focus {
            color: #fff;
            background-color: #1d86ff; }

        .badge-secondary {
          color: #757575;
          background-color: #e9ecf0; }
          a.badge-secondary:hover, a.badge-secondary:focus {
            color: #757575;
            background-color: #cbd2db; }

        .badge-success {
          color: #fff;
          background-color: #3cd458; }
          a.badge-success:hover, a.badge-success:focus {
            color: #fff;
            background-color: #28b542; }

        .badge-info {
          color: #fff;
          background-color: #926dde; }
          a.badge-info:hover, a.badge-info:focus {
            color: #fff;
            background-color: #7343d5; }

        .badge-warning {
          color: #fff;
          background-color: #ffba00; }
          a.badge-warning:hover, a.badge-warning:focus {
            color: #fff;
            background-color: #cc9500; }

        .badge-danger {
          color: #fff;
          background-color: #ff4954; }
          a.badge-danger:hover, a.badge-danger:focus {
            color: #fff;
            background-color: #ff1624; }

        .badge-light {
          color: #757575;
          background-color: #f8f9fa; }
          a.badge-light:hover, a.badge-light:focus {
            color: #757575;
            background-color: #dae0e5; }

        .badge-dark {
          color: #fff;
          background-color: #191919; }
          a.badge-dark:hover, a.badge-dark:focus {
            color: #fff;
            background-color: black; }

        .jumbotron {
          padding: 2rem 1rem;
          margin-bottom: 2rem;
          background-color: #e9ecef;
          border-radius: 0.3rem; }
          @media (min-width: 576px) {
            .jumbotron {
              padding: 4rem 2rem; } }

        .jumbotron-fluid {
          padding-right: 0;
          padding-left: 0;
          border-radius: 0; }

        .alert {
          position: relative;
          padding: 0.75rem 1.25rem;
          margin-bottom: 1rem;
          border: 1px solid transparent;
          border-radius: 0.25rem; }

        .alert-heading {
          color: inherit; }

        .alert-link {
          font-weight: 600; }

        .alert-dismissible {
          padding-right: 3.90625rem; }
          .alert-dismissible .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.75rem 1.25rem;
            color: inherit; }

        .alert-primary {
          color: #2a5485;
          background-color: #dcecff;
          border-color: #cee5ff; }
          .alert-primary hr {
            border-top-color: #b5d7ff; }
          .alert-primary .alert-link {
            color: #1e3c5e; }

        .alert-secondary {
          color: #797b7d;
          background-color: #fbfbfc;
          border-color: #f9fafb; }
          .alert-secondary hr {
            border-top-color: #eaedf1; }
          .alert-secondary .alert-link {
            color: #606263; }

        .alert-success {
          color: #1f6e2e;
          background-color: #d8f6de;
          border-color: #c8f3d0; }
          .alert-success hr {
            border-top-color: #b3eebe; }
          .alert-success .alert-link {
            color: #14461d; }

        .alert-info {
          color: #4c3973;
          background-color: #e9e2f8;
          border-color: #e0d6f6; }
          .alert-info hr {
            border-top-color: #d0c1f1; }
          .alert-info .alert-link {
            color: #352851; }

        .alert-warning {
          color: #856100;
          background-color: #fff1cc;
          border-color: #ffecb8; }
          .alert-warning hr {
            border-top-color: #ffe59f; }
          .alert-warning .alert-link {
            color: #523c00; }

        .alert-danger {
          color: #85262c;
          background-color: #ffdbdd;
          border-color: #ffcccf; }
          .alert-danger hr {
            border-top-color: #ffb3b7; }
          .alert-danger .alert-link {
            color: #5d1b1f; }

        .alert-light {
          color: #818182;
          background-color: #fefefe;
          border-color: #fdfdfe; }
          .alert-light hr {
            border-top-color: #ececf6; }
          .alert-light .alert-link {
            color: #686868; }

        .alert-dark {
          color: #0d0d0d;
          background-color: #d1d1d1;
          border-color: #bfbfbf; }
          .alert-dark hr {
            border-top-color: #b2b2b2; }
          .alert-dark .alert-link {
            color: black; }

        @-webkit-keyframes progress-bar-stripes {
          from {
            background-position: 1rem 0; }
          to {
            background-position: 0 0; } }

        @keyframes progress-bar-stripes {
          from {
            background-position: 1rem 0; }
          to {
            background-position: 0 0; } }

        .progress {
          display: -webkit-box;
          display: flex;
          height: 1rem;
          overflow: hidden;
          font-size: 0.70313rem;
          background-color: #f5f6f7;
          border-radius: 0.125rem; }

        .progress-bar {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          -webkit-box-pack: center;
                  justify-content: center;
          color: #fff;
          text-align: center;
          white-space: nowrap;
          background-color: #50a1ff;
          -webkit-transition: width 0.6s ease;
          transition: width 0.6s ease; }
          @media screen and (prefers-reduced-motion: reduce) {
            .progress-bar {
              -webkit-transition: none;
              transition: none; } }

        .progress-bar-striped {
          background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
          background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
          -webkit-background-size: 1rem 1rem;
                  background-size: 1rem 1rem; }

        .progress-bar-animated {
          -webkit-animation: progress-bar-stripes 1s linear infinite;
                  animation: progress-bar-stripes 1s linear infinite; }

        .media {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: start;
                  align-items: flex-start; }

        .media-body {
          -webkit-box-flex: 1;
                  flex: 1; }

        .list-group {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          padding-left: 0;
          margin-bottom: 0; }

        .list-group-item-action {
          width: 100%;
          color: #495057;
          text-align: inherit; }
          .list-group-item-action:hover, .list-group-item-action:focus {
            color: #495057;
            text-decoration: none;
            background-color: #f8f9fa; }
          .list-group-item-action:active {
            color: #757575;
            background-color: #e9ecef; }

        .list-group-item {
          position: relative;
          display: block;
          padding: 0.75rem 1.25rem;
          margin-bottom: -1px;
          background-color: #fff;
          border: 1px solid rgba(0, 0, 0, 0.125); }
          .list-group-item:first-child {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem; }
          .list-group-item:last-child {
            margin-bottom: 0;
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem; }
          .list-group-item:hover, .list-group-item:focus {
            z-index: 1;
            text-decoration: none; }
          .list-group-item.disabled, .list-group-item:disabled {
            color: #868e96;
            pointer-events: none;
            background-color: #fff; }
          .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #50a1ff;
            border-color: #50a1ff; }

        .list-group-flush .list-group-item {
          border-right: 0;
          border-left: 0;
          border-radius: 0; }
          .list-group-flush .list-group-item:last-child {
            margin-bottom: -1px; }

        .list-group-flush:first-child .list-group-item:first-child {
          border-top: 0; }

        .list-group-flush:last-child .list-group-item:last-child {
          margin-bottom: 0;
          border-bottom: 0; }

        .list-group-item-primary {
          color: #2a5485;
          background-color: #cee5ff; }
          .list-group-item-primary.list-group-item-action:hover, .list-group-item-primary.list-group-item-action:focus {
            color: #2a5485;
            background-color: #b5d7ff; }
          .list-group-item-primary.list-group-item-action.active {
            color: #fff;
            background-color: #2a5485;
            border-color: #2a5485; }

        .list-group-item-secondary {
          color: #797b7d;
          background-color: #f9fafb; }
          .list-group-item-secondary.list-group-item-action:hover, .list-group-item-secondary.list-group-item-action:focus {
            color: #797b7d;
            background-color: #eaedf1; }
          .list-group-item-secondary.list-group-item-action.active {
            color: #fff;
            background-color: #797b7d;
            border-color: #797b7d; }

        .list-group-item-success {
          color: #1f6e2e;
          background-color: #c8f3d0; }
          .list-group-item-success.list-group-item-action:hover, .list-group-item-success.list-group-item-action:focus {
            color: #1f6e2e;
            background-color: #b3eebe; }
          .list-group-item-success.list-group-item-action.active {
            color: #fff;
            background-color: #1f6e2e;
            border-color: #1f6e2e; }

        .list-group-item-info {
          color: #4c3973;
          background-color: #e0d6f6; }
          .list-group-item-info.list-group-item-action:hover, .list-group-item-info.list-group-item-action:focus {
            color: #4c3973;
            background-color: #d0c1f1; }
          .list-group-item-info.list-group-item-action.active {
            color: #fff;
            background-color: #4c3973;
            border-color: #4c3973; }

        .list-group-item-warning {
          color: #856100;
          background-color: #ffecb8; }
          .list-group-item-warning.list-group-item-action:hover, .list-group-item-warning.list-group-item-action:focus {
            color: #856100;
            background-color: #ffe59f; }
          .list-group-item-warning.list-group-item-action.active {
            color: #fff;
            background-color: #856100;
            border-color: #856100; }

        .list-group-item-danger {
          color: #85262c;
          background-color: #ffcccf; }
          .list-group-item-danger.list-group-item-action:hover, .list-group-item-danger.list-group-item-action:focus {
            color: #85262c;
            background-color: #ffb3b7; }
          .list-group-item-danger.list-group-item-action.active {
            color: #fff;
            background-color: #85262c;
            border-color: #85262c; }

        .list-group-item-light {
          color: #818182;
          background-color: #fdfdfe; }
          .list-group-item-light.list-group-item-action:hover, .list-group-item-light.list-group-item-action:focus {
            color: #818182;
            background-color: #ececf6; }
          .list-group-item-light.list-group-item-action.active {
            color: #fff;
            background-color: #818182;
            border-color: #818182; }

        .list-group-item-dark {
          color: #0d0d0d;
          background-color: #bfbfbf; }
          .list-group-item-dark.list-group-item-action:hover, .list-group-item-dark.list-group-item-action:focus {
            color: #0d0d0d;
            background-color: #b2b2b2; }
          .list-group-item-dark.list-group-item-action.active {
            color: #fff;
            background-color: #0d0d0d;
            border-color: #0d0d0d; }

        .close {
          float: right;
          font-size: 1.40625rem;
          font-weight: 600;
          line-height: 1;
          color: #000;
          text-shadow: none;
          opacity: .5; }
          .close:hover {
            color: #000;
            text-decoration: none; }
          .close:not(:disabled):not(.disabled) {
            cursor: pointer; }
            .close:not(:disabled):not(.disabled):hover, .close:not(:disabled):not(.disabled):focus {
              opacity: .75; }

        button.close {
          padding: 0;
          background-color: transparent;
          border: 0;
          -webkit-appearance: none;
            -moz-appearance: none;
                  appearance: none; }

        a.close.disabled {
          pointer-events: none; }

        .modal-open {
          overflow: hidden; }
          .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto; }

        .modal {
          position: fixed;
          top: 0;
          left: 0;
          z-index: 1050;
          display: none;
          width: 100%;
          height: 100%;
          overflow: hidden;
          outline: 0; }

        .modal-dialog {
          position: relative;
          width: auto;
          margin: 0.5rem;
          pointer-events: none; }
          .modal.fade .modal-dialog {
            -webkit-transition: -webkit-transform 0.3s ease-out;
            transition: -webkit-transform 0.3s ease-out;
            transition: transform 0.3s ease-out;
            transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
            -webkit-transform: translate(0, -50px);
                    transform: translate(0, -50px); }
            @media screen and (prefers-reduced-motion: reduce) {
              .modal.fade .modal-dialog {
                -webkit-transition: none;
                transition: none; } }
          .modal.show .modal-dialog {
            -webkit-transform: none;
                    transform: none; }

        .modal-dialog-centered {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          min-height: calc(100% - (0.5rem * 2)); }
          .modal-dialog-centered::before {
            display: block;
            height: calc(100vh - (0.5rem * 2));
            content: ""; }

        .modal-content {
          position: relative;
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          width: 100%;
          pointer-events: auto;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid rgba(0, 0, 0, 0.2);
          border-radius: 0.3rem;
          outline: 0; }

        .modal-backdrop {
          position: fixed;
          top: 0;
          left: 0;
          z-index: 1040;
          width: 100vw;
          height: 100vh;
          background-color: #000; }
          .modal-backdrop.fade {
            opacity: 0; }
          .modal-backdrop.show {
            opacity: 0.5; }

        .modal-header {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: start;
                  align-items: flex-start;
          -webkit-box-pack: justify;
                  justify-content: space-between;
          padding: 1.75rem;
          border-bottom: 1px solid #f1f2f3;
          border-top-left-radius: 0.3rem;
          border-top-right-radius: 0.3rem; }
          .modal-header .close {
            padding: 1.75rem;
            margin: -1rem -1rem -1rem auto; }

        .modal-title {
          margin-bottom: 0;
          line-height: 1.9; }

        .modal-body {
          position: relative;
          -webkit-box-flex: 1;
                  flex: 1 1 auto;
          padding: 1.75rem; }

        .modal-footer {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: end;
                  justify-content: flex-end;
          padding: 1.75rem;
          border-top: 1px solid #f1f2f3;
          border-bottom-right-radius: 0.3rem;
          border-bottom-left-radius: 0.3rem; }
          .modal-footer > :not(:first-child) {
            margin-left: .25rem; }
          .modal-footer > :not(:last-child) {
            margin-right: .25rem; }

        .modal-scrollbar-measure {
          position: absolute;
          top: -9999px;
          width: 50px;
          height: 50px;
          overflow: scroll; }

        @media (min-width: 576px) {
          .modal-dialog {
            max-width: 540px;
            margin: 1.75rem auto; }
          .modal-dialog-centered {
            min-height: calc(100% - (1.75rem * 2)); }
            .modal-dialog-centered::before {
              height: calc(100vh - (1.75rem * 2)); }
          .modal-sm {
            max-width: 360px; } }

        @media (min-width: 992px) {
          .modal-lg,
          .modal-xl {
            max-width: 800px; } }

        @media (min-width: 1200px) {
          .modal-xl {
            max-width: 1140px; } }

        .tooltip {
          position: absolute;
          z-index: 1070;
          display: block;
          margin: 0;
          font-family: "Open Sans", sans-serif;
          font-style: normal;
          font-weight: 400;
          line-height: 1.9;
          text-align: left;
          text-align: start;
          text-decoration: none;
          text-shadow: none;
          text-transform: none;
          letter-spacing: normal;
          word-break: normal;
          word-spacing: normal;
          white-space: normal;
          line-break: auto;
          font-size: 0.875rem;
          word-wrap: break-word;
          opacity: 0; }
          .tooltip.show {
            opacity: 0.9; }
          .tooltip .arrow {
            position: absolute;
            display: block;
            width: 0.8rem;
            height: 0.4rem; }
            .tooltip .arrow::before {
              position: absolute;
              content: "";
              border-color: transparent;
              border-style: solid; }

        .bs-tooltip-top, .bs-tooltip-auto[x-placement^="top"] {
          padding: 0.4rem 0; }
          .bs-tooltip-top .arrow, .bs-tooltip-auto[x-placement^="top"] .arrow {
            bottom: 0; }
            .bs-tooltip-top .arrow::before, .bs-tooltip-auto[x-placement^="top"] .arrow::before {
              top: 0;
              border-width: 0.4rem 0.4rem 0;
              border-top-color: #000; }

        .bs-tooltip-right, .bs-tooltip-auto[x-placement^="right"] {
          padding: 0 0.4rem; }
          .bs-tooltip-right .arrow, .bs-tooltip-auto[x-placement^="right"] .arrow {
            left: 0;
            width: 0.4rem;
            height: 0.8rem; }
            .bs-tooltip-right .arrow::before, .bs-tooltip-auto[x-placement^="right"] .arrow::before {
              right: 0;
              border-width: 0.4rem 0.4rem 0.4rem 0;
              border-right-color: #000; }

        .bs-tooltip-bottom, .bs-tooltip-auto[x-placement^="bottom"] {
          padding: 0.4rem 0; }
          .bs-tooltip-bottom .arrow, .bs-tooltip-auto[x-placement^="bottom"] .arrow {
            top: 0; }
            .bs-tooltip-bottom .arrow::before, .bs-tooltip-auto[x-placement^="bottom"] .arrow::before {
              bottom: 0;
              border-width: 0 0.4rem 0.4rem;
              border-bottom-color: #000; }

        .bs-tooltip-left, .bs-tooltip-auto[x-placement^="left"] {
          padding: 0 0.4rem; }
          .bs-tooltip-left .arrow, .bs-tooltip-auto[x-placement^="left"] .arrow {
            right: 0;
            width: 0.4rem;
            height: 0.8rem; }
            .bs-tooltip-left .arrow::before, .bs-tooltip-auto[x-placement^="left"] .arrow::before {
              left: 0;
              border-width: 0.4rem 0 0.4rem 0.4rem;
              border-left-color: #000; }

        .tooltip-inner {
          max-width: 200px;
          padding: 0.25rem 0.5rem;
          color: #fff;
          text-align: center;
          background-color: #000;
          border-radius: 0.25rem; }

        .popover {
          position: absolute;
          top: 0;
          left: 0;
          z-index: 1060;
          display: block;
          max-width: 276px;
          font-family: "Open Sans", sans-serif;
          font-style: normal;
          font-weight: 400;
          line-height: 1.9;
          text-align: left;
          text-align: start;
          text-decoration: none;
          text-shadow: none;
          text-transform: none;
          letter-spacing: normal;
          word-break: normal;
          word-spacing: normal;
          white-space: normal;
          line-break: auto;
          font-size: 0.875rem;
          word-wrap: break-word;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #f1f2f3;
          border-radius: 0.3rem; }
          .popover .arrow {
            position: absolute;
            display: block;
            width: 0.6rem;
            height: 0.3rem;
            margin: 0 0.3rem; }
            .popover .arrow::before, .popover .arrow::after {
              position: absolute;
              display: block;
              content: "";
              border-color: transparent;
              border-style: solid; }

        .bs-popover-top, .bs-popover-auto[x-placement^="top"] {
          margin-bottom: 0.3rem; }
          .bs-popover-top .arrow, .bs-popover-auto[x-placement^="top"] .arrow {
            bottom: calc((0.3rem + 1px) * -1); }
          .bs-popover-top .arrow::before, .bs-popover-auto[x-placement^="top"] .arrow::before,
          .bs-popover-top .arrow::after,
          .bs-popover-auto[x-placement^="top"] .arrow::after {
            border-width: 0.3rem 0.3rem 0; }
          .bs-popover-top .arrow::before, .bs-popover-auto[x-placement^="top"] .arrow::before {
            bottom: 0;
            border-top-color: #f1f2f3; }
          
          .bs-popover-top .arrow::after,
          .bs-popover-auto[x-placement^="top"] .arrow::after {
            bottom: 1px;
            border-top-color: #fff; }

        .bs-popover-right, .bs-popover-auto[x-placement^="right"] {
          margin-left: 0.3rem; }
          .bs-popover-right .arrow, .bs-popover-auto[x-placement^="right"] .arrow {
            left: calc((0.3rem + 1px) * -1);
            width: 0.3rem;
            height: 0.6rem;
            margin: 0.3rem 0; }
          .bs-popover-right .arrow::before, .bs-popover-auto[x-placement^="right"] .arrow::before,
          .bs-popover-right .arrow::after,
          .bs-popover-auto[x-placement^="right"] .arrow::after {
            border-width: 0.3rem 0.3rem 0.3rem 0; }
          .bs-popover-right .arrow::before, .bs-popover-auto[x-placement^="right"] .arrow::before {
            left: 0;
            border-right-color: #f1f2f3; }
          
          .bs-popover-right .arrow::after,
          .bs-popover-auto[x-placement^="right"] .arrow::after {
            left: 1px;
            border-right-color: #fff; }

        .bs-popover-bottom, .bs-popover-auto[x-placement^="bottom"] {
          margin-top: 0.3rem; }
          .bs-popover-bottom .arrow, .bs-popover-auto[x-placement^="bottom"] .arrow {
            top: calc((0.3rem + 1px) * -1); }
          .bs-popover-bottom .arrow::before, .bs-popover-auto[x-placement^="bottom"] .arrow::before,
          .bs-popover-bottom .arrow::after,
          .bs-popover-auto[x-placement^="bottom"] .arrow::after {
            border-width: 0 0.3rem 0.3rem 0.3rem; }
          .bs-popover-bottom .arrow::before, .bs-popover-auto[x-placement^="bottom"] .arrow::before {
            top: 0;
            border-bottom-color: #f1f2f3; }
          
          .bs-popover-bottom .arrow::after,
          .bs-popover-auto[x-placement^="bottom"] .arrow::after {
            top: 1px;
            border-bottom-color: #fff; }
          .bs-popover-bottom .popover-header::before, .bs-popover-auto[x-placement^="bottom"] .popover-header::before {
            position: absolute;
            top: 0;
            left: 50%;
            display: block;
            width: 0.6rem;
            margin-left: -0.3rem;
            content: "";
            border-bottom: 1px solid #f9fafb; }

        .bs-popover-left, .bs-popover-auto[x-placement^="left"] {
          margin-right: 0.3rem; }
          .bs-popover-left .arrow, .bs-popover-auto[x-placement^="left"] .arrow {
            right: calc((0.3rem + 1px) * -1);
            width: 0.3rem;
            height: 0.6rem;
            margin: 0.3rem 0; }
          .bs-popover-left .arrow::before, .bs-popover-auto[x-placement^="left"] .arrow::before,
          .bs-popover-left .arrow::after,
          .bs-popover-auto[x-placement^="left"] .arrow::after {
            border-width: 0.3rem 0 0.3rem 0.3rem; }
          .bs-popover-left .arrow::before, .bs-popover-auto[x-placement^="left"] .arrow::before {
            right: 0;
            border-left-color: #f1f2f3; }
          
          .bs-popover-left .arrow::after,
          .bs-popover-auto[x-placement^="left"] .arrow::after {
            right: 1px;
            border-left-color: #fff; }

        .popover-header {
          padding: 0.5rem 0.75rem;
          margin-bottom: 0;
          font-size: 0.9375rem;
          color: #323d47;
          background-color: #f9fafb;
          border-bottom: 1px solid #eaedf1;
          border-top-left-radius: calc(0.3rem - 1px);
          border-top-right-radius: calc(0.3rem - 1px); }
          .popover-header:empty {
            display: none; }

        .popover-body {
          padding: 0.5rem 0.75rem;
          color: #757575; }

        .carousel {
          position: relative; }

        .carousel.pointer-event {
          touch-action: pan-y; }

        .carousel-inner {
          position: relative;
          width: 100%;
          overflow: hidden; }
          .carousel-inner::after {
            display: block;
            clear: both;
            content: ""; }

        .carousel-item {
          position: relative;
          display: none;
          float: left;
          width: 100%;
          margin-right: -100%;
          -webkit-backface-visibility: hidden;
                  backface-visibility: hidden;
          -webkit-transition: -webkit-transform 0.6s ease-in-out;
          transition: -webkit-transform 0.6s ease-in-out;
          transition: transform 0.6s ease-in-out;
          transition: transform 0.6s ease-in-out, -webkit-transform 0.6s ease-in-out; }
          @media screen and (prefers-reduced-motion: reduce) {
            .carousel-item {
              -webkit-transition: none;
              transition: none; } }

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
          display: block; }

        .carousel-item-next:not(.carousel-item-left),
        .active.carousel-item-right {
          -webkit-transform: translateX(100%);
                  transform: translateX(100%); }

        .carousel-item-prev:not(.carousel-item-right),
        .active.carousel-item-left {
          -webkit-transform: translateX(-100%);
                  transform: translateX(-100%); }

        .carousel-fade .carousel-item {
          opacity: 0;
          -webkit-transition-property: opacity;
          transition-property: opacity;
          -webkit-transform: none;
                  transform: none; }

        .carousel-fade .carousel-item.active,
        .carousel-fade .carousel-item-next.carousel-item-left,
        .carousel-fade .carousel-item-prev.carousel-item-right {
          z-index: 1;
          opacity: 1; }

        .carousel-fade .active.carousel-item-left,
        .carousel-fade .active.carousel-item-right {
          z-index: 0;
          opacity: 0;
          -webkit-transition: 0s 0.6s opacity;
          transition: 0s 0.6s opacity; }
          @media screen and (prefers-reduced-motion: reduce) {
            .carousel-fade .active.carousel-item-left,
            .carousel-fade .active.carousel-item-right {
              -webkit-transition: none;
              transition: none; } }

        .carousel-control-prev,
        .carousel-control-next {
          position: absolute;
          top: 0;
          bottom: 0;
          z-index: 1;
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: center;
                  justify-content: center;
          width: 15%;
          color: #fff;
          text-align: center;
          opacity: 0.5;
          -webkit-transition: opacity 0.15s ease;
          transition: opacity 0.15s ease; }
          @media screen and (prefers-reduced-motion: reduce) {
            .carousel-control-prev,
            .carousel-control-next {
              -webkit-transition: none;
              transition: none; } }
          .carousel-control-prev:hover, .carousel-control-prev:focus,
          .carousel-control-next:hover,
          .carousel-control-next:focus {
            color: #fff;
            text-decoration: none;
            outline: 0;
            opacity: 0.9; }

        .carousel-control-prev {
          left: 0; }

        .carousel-control-next {
          right: 0; }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
          display: inline-block;
          width: 20px;
          height: 20px;
          background: transparent no-repeat center center;
          -webkit-background-size: 100% 100%;
                  background-size: 100% 100%; }

        .carousel-indicators {
          position: absolute;
          right: 0;
          bottom: 0;
          left: 0;
          z-index: 15;
          display: -webkit-box;
          display: flex;
          -webkit-box-pack: center;
                  justify-content: center;
          padding-left: 0;
          margin-right: 15%;
          margin-left: 15%;
          list-style: none; }
          .carousel-indicators li {
            -webkit-box-sizing: content-box;
                    box-sizing: content-box;
            -webkit-box-flex: 0;
                    flex: 0 1 auto;
            width: 30px;
            height: 3px;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #fff;
            background-clip: padding-box;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            opacity: .5;
            -webkit-transition: opacity 0.6s ease;
            transition: opacity 0.6s ease; }
            @media screen and (prefers-reduced-motion: reduce) {
              .carousel-indicators li {
                -webkit-transition: none;
                transition: none; } }
          .carousel-indicators .active {
            opacity: 1; }

        .carousel-caption {
          position: absolute;
          right: 15%;
          bottom: 20px;
          left: 15%;
          z-index: 10;
          padding-top: 20px;
          padding-bottom: 20px;
          color: #fff;
          text-align: center; }

        .align-baseline {
          vertical-align: baseline !important; }

        .align-top {
          vertical-align: top !important; }

        .align-middle {
          vertical-align: middle !important; }

        .align-bottom {
          vertical-align: bottom !important; }

        .align-text-bottom {
          vertical-align: text-bottom !important; }

        .align-text-top {
          vertical-align: text-top !important; }

        .bg-primary {
          background-color: #50a1ff !important; }

        a.bg-primary:hover, a.bg-primary:focus,
        button.bg-primary:hover,
        button.bg-primary:focus {
          background-color: #1d86ff !important; }

        .bg-secondary {
          background-color: #e9ecf0 !important; }

        a.bg-secondary:hover, a.bg-secondary:focus,
        button.bg-secondary:hover,
        button.bg-secondary:focus {
          background-color: #cbd2db !important; }

        .bg-success {
          background-color: #3cd458 !important; }

        a.bg-success:hover, a.bg-success:focus,
        button.bg-success:hover,
        button.bg-success:focus {
          background-color: #28b542 !important; }

        .bg-info {
          background-color: #926dde !important; }

        a.bg-info:hover, a.bg-info:focus,
        button.bg-info:hover,
        button.bg-info:focus {
          background-color: #7343d5 !important; }

        .bg-warning {
          background-color: #ffba00 !important; }

        a.bg-warning:hover, a.bg-warning:focus,
        button.bg-warning:hover,
        button.bg-warning:focus {
          background-color: #cc9500 !important; }

        .bg-danger {
          background-color: #ff4954 !important; }

        a.bg-danger:hover, a.bg-danger:focus,
        button.bg-danger:hover,
        button.bg-danger:focus {
          background-color: #ff1624 !important; }

        .bg-light {
          background-color: #f8f9fa !important; }

        a.bg-light:hover, a.bg-light:focus,
        button.bg-light:hover,
        button.bg-light:focus {
          background-color: #dae0e5 !important; }

        .bg-dark {
          background-color: #191919 !important; }

        a.bg-dark:hover, a.bg-dark:focus,
        button.bg-dark:hover,
        button.bg-dark:focus {
          background-color: black !important; }

        .bg-white {
          background-color: #fff !important; }

        .bg-transparent {
          background-color: transparent !important; }

        .border {
          border: 1px solid #f1f2f3 !important; }

        .border-top {
          border-top: 1px solid #f1f2f3 !important; }

        .border-right {
          border-right: 1px solid #f1f2f3 !important; }

        .border-bottom {
          border-bottom: 1px solid #f1f2f3 !important; }

        .border-left {
          border-left: 1px solid #f1f2f3 !important; }

        .border-0 {
          border: 0 !important; }

        .border-top-0 {
          border-top: 0 !important; }

        .border-right-0 {
          border-right: 0 !important; }

        .border-bottom-0 {
          border-bottom: 0 !important; }

        .border-left-0 {
          border-left: 0 !important; }

        .border-primary {
          border-color: #50a1ff !important; }

        .border-secondary {
          border-color: #e9ecf0 !important; }

        .border-success {
          border-color: #3cd458 !important; }

        .border-info {
          border-color: #926dde !important; }

        .border-warning {
          border-color: #ffba00 !important; }

        .border-danger {
          border-color: #ff4954 !important; }

        .border-light {
          border-color: #f8f9fa !important; }

        .border-dark {
          border-color: #191919 !important; }

        .border-white {
          border-color: #fff !important; }

        .rounded {
          border-radius: 0.25rem !important; }

        .rounded-top {
          border-top-left-radius: 0.25rem !important;
          border-top-right-radius: 0.25rem !important; }

        .rounded-right {
          border-top-right-radius: 0.25rem !important;
          border-bottom-right-radius: 0.25rem !important; }

        .rounded-bottom {
          border-bottom-right-radius: 0.25rem !important;
          border-bottom-left-radius: 0.25rem !important; }

        .rounded-left {
          border-top-left-radius: 0.25rem !important;
          border-bottom-left-radius: 0.25rem !important; }

        .rounded-circle {
          border-radius: 50% !important; }

        .rounded-pill {
          border-radius: 50rem !important; }

        .rounded-0 {
          border-radius: 0 !important; }

        .clearfix::after {
          display: block;
          clear: both;
          content: ""; }

        .d-none {
          display: none !important; }

        .d-inline {
          display: inline !important; }

        .d-inline-block {
          display: inline-block !important; }

        .d-block {
          display: block !important; }

        .d-table {
          display: table !important; }

        .d-table-row {
          display: table-row !important; }

        .d-table-cell {
          display: table-cell !important; }

        .d-flex {
          display: -webkit-box !important;
          display: flex !important; }

        .d-inline-flex {
          display: -webkit-inline-box !important;
          display: inline-flex !important; }

        @media (min-width: 576px) {
          .d-sm-none {
            display: none !important; }
          .d-sm-inline {
            display: inline !important; }
          .d-sm-inline-block {
            display: inline-block !important; }
          .d-sm-block {
            display: block !important; }
          .d-sm-table {
            display: table !important; }
          .d-sm-table-row {
            display: table-row !important; }
          .d-sm-table-cell {
            display: table-cell !important; }
          .d-sm-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .d-sm-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; } }

        @media (min-width: 768px) {
          .d-md-none {
            display: none !important; }
          .d-md-inline {
            display: inline !important; }
          .d-md-inline-block {
            display: inline-block !important; }
          .d-md-block {
            display: block !important; }
          .d-md-table {
            display: table !important; }
          .d-md-table-row {
            display: table-row !important; }
          .d-md-table-cell {
            display: table-cell !important; }
          .d-md-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .d-md-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; } }

        @media (min-width: 992px) {
          .d-lg-none {
            display: none !important; }
          .d-lg-inline {
            display: inline !important; }
          .d-lg-inline-block {
            display: inline-block !important; }
          .d-lg-block {
            display: block !important; }
          .d-lg-table {
            display: table !important; }
          .d-lg-table-row {
            display: table-row !important; }
          .d-lg-table-cell {
            display: table-cell !important; }
          .d-lg-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .d-lg-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; } }

        @media (min-width: 1200px) {
          .d-xl-none {
            display: none !important; }
          .d-xl-inline {
            display: inline !important; }
          .d-xl-inline-block {
            display: inline-block !important; }
          .d-xl-block {
            display: block !important; }
          .d-xl-table {
            display: table !important; }
          .d-xl-table-row {
            display: table-row !important; }
          .d-xl-table-cell {
            display: table-cell !important; }
          .d-xl-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .d-xl-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; } }

        @media print {
          .d-print-none {
            display: none !important; }
          .d-print-inline {
            display: inline !important; }
          .d-print-inline-block {
            display: inline-block !important; }
          .d-print-block {
            display: block !important; }
          .d-print-table {
            display: table !important; }
          .d-print-table-row {
            display: table-row !important; }
          .d-print-table-cell {
            display: table-cell !important; }
          .d-print-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .d-print-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; } }

        .embed-responsive {
          position: relative;
          display: block;
          width: 100%;
          padding: 0;
          overflow: hidden; }
          .embed-responsive::before {
            display: block;
            content: ""; }
          .embed-responsive .embed-responsive-item,
          .embed-responsive iframe,
          .embed-responsive embed,
          .embed-responsive object,
          .embed-responsive video {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0; }

        .embed-responsive-21by9::before {
          padding-top: 42.85714%; }

        .embed-responsive-16by9::before {
          padding-top: 56.25%; }

        .embed-responsive-3by4::before {
          padding-top: 133.33333%; }

        .embed-responsive-1by1::before {
          padding-top: 100%; }

        .flex-row {
          -webkit-box-orient: horizontal !important;
          -webkit-box-direction: normal !important;
                  flex-direction: row !important; }

        .flex-column {
          -webkit-box-orient: vertical !important;
          -webkit-box-direction: normal !important;
                  flex-direction: column !important; }

        .flex-row-reverse {
          -webkit-box-orient: horizontal !important;
          -webkit-box-direction: reverse !important;
                  flex-direction: row-reverse !important; }

        .flex-column-reverse {
          -webkit-box-orient: vertical !important;
          -webkit-box-direction: reverse !important;
                  flex-direction: column-reverse !important; }

        .flex-wrap {
          flex-wrap: wrap !important; }

        .flex-nowrap {
          flex-wrap: nowrap !important; }

        .flex-wrap-reverse {
          flex-wrap: wrap-reverse !important; }

        .flex-fill {
          -webkit-box-flex: 1 !important;
                  flex: 1 1 auto !important; }

        .flex-grow-0 {
          -webkit-box-flex: 0 !important;
                  flex-grow: 0 !important; }

        .flex-grow-1 {
          -webkit-box-flex: 1 !important;
                  flex-grow: 1 !important; }

        .flex-shrink-0 {
          flex-shrink: 0 !important; }

        .flex-shrink-1 {
          flex-shrink: 1 !important; }

        .justify-content-start {
          -webkit-box-pack: start !important;
                  justify-content: flex-start !important; }

        .justify-content-end {
          -webkit-box-pack: end !important;
                  justify-content: flex-end !important; }

        .justify-content-center, .nav.nav-center {
          -webkit-box-pack: center !important;
                  justify-content: center !important; }

        .justify-content-between {
          -webkit-box-pack: justify !important;
                  justify-content: space-between !important; }

        .justify-content-around {
          justify-content: space-around !important; }

        .align-items-start {
          -webkit-box-align: start !important;
                  align-items: flex-start !important; }

        .align-items-end {
          -webkit-box-align: end !important;
                  align-items: flex-end !important; }

        .align-items-center {
          -webkit-box-align: center !important;
                  align-items: center !important; }

        .align-items-baseline {
          -webkit-box-align: baseline !important;
                  align-items: baseline !important; }

        .align-items-stretch {
          -webkit-box-align: stretch !important;
                  align-items: stretch !important; }

        .align-content-start {
          align-content: flex-start !important; }

        .align-content-end {
          align-content: flex-end !important; }

        .align-content-center {
          align-content: center !important; }

        .align-content-between {
          align-content: space-between !important; }

        .align-content-around {
          align-content: space-around !important; }

        .align-content-stretch {
          align-content: stretch !important; }

        .align-self-auto {
          align-self: auto !important; }

        .align-self-start {
          align-self: flex-start !important; }

        .align-self-end {
          align-self: flex-end !important; }

        .align-self-center {
          align-self: center !important; }

        .align-self-baseline {
          align-self: baseline !important; }

        .align-self-stretch {
          align-self: stretch !important; }

        @media (min-width: 576px) {
          .flex-sm-row {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: normal !important;
                    flex-direction: row !important; }
          .flex-sm-column {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
                    flex-direction: column !important; }
          .flex-sm-row-reverse {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: row-reverse !important; }
          .flex-sm-column-reverse {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: column-reverse !important; }
          .flex-sm-wrap {
            flex-wrap: wrap !important; }
          .flex-sm-nowrap {
            flex-wrap: nowrap !important; }
          .flex-sm-wrap-reverse {
            flex-wrap: wrap-reverse !important; }
          .flex-sm-fill {
            -webkit-box-flex: 1 !important;
                    flex: 1 1 auto !important; }
          .flex-sm-grow-0 {
            -webkit-box-flex: 0 !important;
                    flex-grow: 0 !important; }
          .flex-sm-grow-1 {
            -webkit-box-flex: 1 !important;
                    flex-grow: 1 !important; }
          .flex-sm-shrink-0 {
            flex-shrink: 0 !important; }
          .flex-sm-shrink-1 {
            flex-shrink: 1 !important; }
          .justify-content-sm-start {
            -webkit-box-pack: start !important;
                    justify-content: flex-start !important; }
          .justify-content-sm-end {
            -webkit-box-pack: end !important;
                    justify-content: flex-end !important; }
          .justify-content-sm-center {
            -webkit-box-pack: center !important;
                    justify-content: center !important; }
          .justify-content-sm-between {
            -webkit-box-pack: justify !important;
                    justify-content: space-between !important; }
          .justify-content-sm-around {
            justify-content: space-around !important; }
          .align-items-sm-start {
            -webkit-box-align: start !important;
                    align-items: flex-start !important; }
          .align-items-sm-end {
            -webkit-box-align: end !important;
                    align-items: flex-end !important; }
          .align-items-sm-center {
            -webkit-box-align: center !important;
                    align-items: center !important; }
          .align-items-sm-baseline {
            -webkit-box-align: baseline !important;
                    align-items: baseline !important; }
          .align-items-sm-stretch {
            -webkit-box-align: stretch !important;
                    align-items: stretch !important; }
          .align-content-sm-start {
            align-content: flex-start !important; }
          .align-content-sm-end {
            align-content: flex-end !important; }
          .align-content-sm-center {
            align-content: center !important; }
          .align-content-sm-between {
            align-content: space-between !important; }
          .align-content-sm-around {
            align-content: space-around !important; }
          .align-content-sm-stretch {
            align-content: stretch !important; }
          .align-self-sm-auto {
            align-self: auto !important; }
          .align-self-sm-start {
            align-self: flex-start !important; }
          .align-self-sm-end {
            align-self: flex-end !important; }
          .align-self-sm-center {
            align-self: center !important; }
          .align-self-sm-baseline {
            align-self: baseline !important; }
          .align-self-sm-stretch {
            align-self: stretch !important; } }

        @media (min-width: 768px) {
          .flex-md-row {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: normal !important;
                    flex-direction: row !important; }
          .flex-md-column {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
                    flex-direction: column !important; }
          .flex-md-row-reverse {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: row-reverse !important; }
          .flex-md-column-reverse {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: column-reverse !important; }
          .flex-md-wrap {
            flex-wrap: wrap !important; }
          .flex-md-nowrap {
            flex-wrap: nowrap !important; }
          .flex-md-wrap-reverse {
            flex-wrap: wrap-reverse !important; }
          .flex-md-fill {
            -webkit-box-flex: 1 !important;
                    flex: 1 1 auto !important; }
          .flex-md-grow-0 {
            -webkit-box-flex: 0 !important;
                    flex-grow: 0 !important; }
          .flex-md-grow-1 {
            -webkit-box-flex: 1 !important;
                    flex-grow: 1 !important; }
          .flex-md-shrink-0 {
            flex-shrink: 0 !important; }
          .flex-md-shrink-1 {
            flex-shrink: 1 !important; }
          .justify-content-md-start {
            -webkit-box-pack: start !important;
                    justify-content: flex-start !important; }
          .justify-content-md-end {
            -webkit-box-pack: end !important;
                    justify-content: flex-end !important; }
          .justify-content-md-center {
            -webkit-box-pack: center !important;
                    justify-content: center !important; }
          .justify-content-md-between {
            -webkit-box-pack: justify !important;
                    justify-content: space-between !important; }
          .justify-content-md-around {
            justify-content: space-around !important; }
          .align-items-md-start {
            -webkit-box-align: start !important;
                    align-items: flex-start !important; }
          .align-items-md-end {
            -webkit-box-align: end !important;
                    align-items: flex-end !important; }
          .align-items-md-center {
            -webkit-box-align: center !important;
                    align-items: center !important; }
          .align-items-md-baseline {
            -webkit-box-align: baseline !important;
                    align-items: baseline !important; }
          .align-items-md-stretch {
            -webkit-box-align: stretch !important;
                    align-items: stretch !important; }
          .align-content-md-start {
            align-content: flex-start !important; }
          .align-content-md-end {
            align-content: flex-end !important; }
          .align-content-md-center {
            align-content: center !important; }
          .align-content-md-between {
            align-content: space-between !important; }
          .align-content-md-around {
            align-content: space-around !important; }
          .align-content-md-stretch {
            align-content: stretch !important; }
          .align-self-md-auto {
            align-self: auto !important; }
          .align-self-md-start {
            align-self: flex-start !important; }
          .align-self-md-end {
            align-self: flex-end !important; }
          .align-self-md-center {
            align-self: center !important; }
          .align-self-md-baseline {
            align-self: baseline !important; }
          .align-self-md-stretch {
            align-self: stretch !important; } }

        @media (min-width: 992px) {
          .flex-lg-row {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: normal !important;
                    flex-direction: row !important; }
          .flex-lg-column {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
                    flex-direction: column !important; }
          .flex-lg-row-reverse {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: row-reverse !important; }
          .flex-lg-column-reverse {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: column-reverse !important; }
          .flex-lg-wrap {
            flex-wrap: wrap !important; }
          .flex-lg-nowrap {
            flex-wrap: nowrap !important; }
          .flex-lg-wrap-reverse {
            flex-wrap: wrap-reverse !important; }
          .flex-lg-fill {
            -webkit-box-flex: 1 !important;
                    flex: 1 1 auto !important; }
          .flex-lg-grow-0 {
            -webkit-box-flex: 0 !important;
                    flex-grow: 0 !important; }
          .flex-lg-grow-1 {
            -webkit-box-flex: 1 !important;
                    flex-grow: 1 !important; }
          .flex-lg-shrink-0 {
            flex-shrink: 0 !important; }
          .flex-lg-shrink-1 {
            flex-shrink: 1 !important; }
          .justify-content-lg-start {
            -webkit-box-pack: start !important;
                    justify-content: flex-start !important; }
          .justify-content-lg-end {
            -webkit-box-pack: end !important;
                    justify-content: flex-end !important; }
          .justify-content-lg-center {
            -webkit-box-pack: center !important;
                    justify-content: center !important; }
          .justify-content-lg-between {
            -webkit-box-pack: justify !important;
                    justify-content: space-between !important; }
          .justify-content-lg-around {
            justify-content: space-around !important; }
          .align-items-lg-start {
            -webkit-box-align: start !important;
                    align-items: flex-start !important; }
          .align-items-lg-end {
            -webkit-box-align: end !important;
                    align-items: flex-end !important; }
          .align-items-lg-center {
            -webkit-box-align: center !important;
                    align-items: center !important; }
          .align-items-lg-baseline {
            -webkit-box-align: baseline !important;
                    align-items: baseline !important; }
          .align-items-lg-stretch {
            -webkit-box-align: stretch !important;
                    align-items: stretch !important; }
          .align-content-lg-start {
            align-content: flex-start !important; }
          .align-content-lg-end {
            align-content: flex-end !important; }
          .align-content-lg-center {
            align-content: center !important; }
          .align-content-lg-between {
            align-content: space-between !important; }
          .align-content-lg-around {
            align-content: space-around !important; }
          .align-content-lg-stretch {
            align-content: stretch !important; }
          .align-self-lg-auto {
            align-self: auto !important; }
          .align-self-lg-start {
            align-self: flex-start !important; }
          .align-self-lg-end {
            align-self: flex-end !important; }
          .align-self-lg-center {
            align-self: center !important; }
          .align-self-lg-baseline {
            align-self: baseline !important; }
          .align-self-lg-stretch {
            align-self: stretch !important; } }

        @media (min-width: 1200px) {
          .flex-xl-row {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: normal !important;
                    flex-direction: row !important; }
          .flex-xl-column {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
                    flex-direction: column !important; }
          .flex-xl-row-reverse {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: row-reverse !important; }
          .flex-xl-column-reverse {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: reverse !important;
                    flex-direction: column-reverse !important; }
          .flex-xl-wrap {
            flex-wrap: wrap !important; }
          .flex-xl-nowrap {
            flex-wrap: nowrap !important; }
          .flex-xl-wrap-reverse {
            flex-wrap: wrap-reverse !important; }
          .flex-xl-fill {
            -webkit-box-flex: 1 !important;
                    flex: 1 1 auto !important; }
          .flex-xl-grow-0 {
            -webkit-box-flex: 0 !important;
                    flex-grow: 0 !important; }
          .flex-xl-grow-1 {
            -webkit-box-flex: 1 !important;
                    flex-grow: 1 !important; }
          .flex-xl-shrink-0 {
            flex-shrink: 0 !important; }
          .flex-xl-shrink-1 {
            flex-shrink: 1 !important; }
          .justify-content-xl-start {
            -webkit-box-pack: start !important;
                    justify-content: flex-start !important; }
          .justify-content-xl-end {
            -webkit-box-pack: end !important;
                    justify-content: flex-end !important; }
          .justify-content-xl-center {
            -webkit-box-pack: center !important;
                    justify-content: center !important; }
          .justify-content-xl-between {
            -webkit-box-pack: justify !important;
                    justify-content: space-between !important; }
          .justify-content-xl-around {
            justify-content: space-around !important; }
          .align-items-xl-start {
            -webkit-box-align: start !important;
                    align-items: flex-start !important; }
          .align-items-xl-end {
            -webkit-box-align: end !important;
                    align-items: flex-end !important; }
          .align-items-xl-center {
            -webkit-box-align: center !important;
                    align-items: center !important; }
          .align-items-xl-baseline {
            -webkit-box-align: baseline !important;
                    align-items: baseline !important; }
          .align-items-xl-stretch {
            -webkit-box-align: stretch !important;
                    align-items: stretch !important; }
          .align-content-xl-start {
            align-content: flex-start !important; }
          .align-content-xl-end {
            align-content: flex-end !important; }
          .align-content-xl-center {
            align-content: center !important; }
          .align-content-xl-between {
            align-content: space-between !important; }
          .align-content-xl-around {
            align-content: space-around !important; }
          .align-content-xl-stretch {
            align-content: stretch !important; }
          .align-self-xl-auto {
            align-self: auto !important; }
          .align-self-xl-start {
            align-self: flex-start !important; }
          .align-self-xl-end {
            align-self: flex-end !important; }
          .align-self-xl-center {
            align-self: center !important; }
          .align-self-xl-baseline {
            align-self: baseline !important; }
          .align-self-xl-stretch {
            align-self: stretch !important; } }

        .float-left {
          float: left !important; }

        .float-right {
          float: right !important; }

        .float-none {
          float: none !important; }

        @media (min-width: 576px) {
          .float-sm-left {
            float: left !important; }
          .float-sm-right {
            float: right !important; }
          .float-sm-none {
            float: none !important; } }

        @media (min-width: 768px) {
          .float-md-left {
            float: left !important; }
          .float-md-right {
            float: right !important; }
          .float-md-none {
            float: none !important; } }

        @media (min-width: 992px) {
          .float-lg-left {
            float: left !important; }
          .float-lg-right {
            float: right !important; }
          .float-lg-none {
            float: none !important; } }

        @media (min-width: 1200px) {
          .float-xl-left {
            float: left !important; }
          .float-xl-right {
            float: right !important; }
          .float-xl-none {
            float: none !important; } }

        .overflow-auto {
          overflow: auto !important; }

        .overflow-hidden {
          overflow: hidden !important; }

        .position-static {
          position: static !important; }

        .position-relative {
          position: relative !important; }

        .position-absolute {
          position: absolute !important; }

        .position-fixed {
          position: fixed !important; }

        .position-sticky {
          position: -webkit-sticky !important;
          position: sticky !important; }

        .fixed-top {
          position: fixed;
          top: 0;
          right: 0;
          left: 0;
          z-index: 1030; }

        .fixed-bottom {
          position: fixed;
          right: 0;
          bottom: 0;
          left: 0;
          z-index: 1030; }

        @supports ((position: -webkit-sticky) or (position: sticky)) {
          .sticky-top {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            z-index: 1020; } }

        .sr-only {
          position: absolute;
          width: 1px;
          height: 1px;
          padding: 0;
          overflow: hidden;
          clip: rect(0, 0, 0, 0);
          white-space: nowrap;
          border: 0; }

        .sr-only-focusable:active, .sr-only-focusable:focus {
          position: static;
          width: auto;
          height: auto;
          overflow: visible;
          clip: auto;
          white-space: normal; }

        .shadow-sm {
          -webkit-box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
                  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; }

        .shadow {
          -webkit-box-shadow: 0 1px 15px rgba(0, 0, 0, 0.05) !important;
                  box-shadow: 0 1px 15px rgba(0, 0, 0, 0.05) !important; }

        .shadow-lg {
          -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
                  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important; }

        .shadow-none {
          -webkit-box-shadow: none !important;
                  box-shadow: none !important; }

        .w-25 {
          width: 25% !important; }

        .w-50 {
          width: 50% !important; }

        .w-75 {
          width: 75% !important; }

        .w-100 {
          width: 100% !important; }

        .w-auto {
          width: auto !important; }

        .w-5 {
          width: 5% !important; }

        .w-10 {
          width: 10% !important; }

        .w-15 {
          width: 15% !important; }

        .w-20 {
          width: 20% !important; }

        .w-30 {
          width: 30% !important; }

        .w-40 {
          width: 40% !important; }

        .w-60 {
          width: 60% !important; }

        .w-70 {
          width: 70% !important; }

        .w-80 {
          width: 80% !important; }

        .w-90 {
          width: 90% !important; }

        .h-25 {
          height: 25% !important; }

        .h-50 {
          height: 50% !important; }

        .h-75 {
          height: 75% !important; }

        .h-100 {
          height: 100% !important; }

        .h-auto {
          height: auto !important; }

        .h-5 {
          height: 5% !important; }

        .h-10 {
          height: 10% !important; }

        .h-15 {
          height: 15% !important; }

        .h-20 {
          height: 20% !important; }

        .h-30 {
          height: 30% !important; }

        .h-40 {
          height: 40% !important; }

        .h-60 {
          height: 60% !important; }

        .h-70 {
          height: 70% !important; }

        .h-80 {
          height: 80% !important; }

        .h-90 {
          height: 90% !important; }

        .mw-100 {
          max-width: 100% !important; }

        .mh-100 {
          max-height: 100% !important; }

        .min-vw-100 {
          min-width: 100vw !important; }

        .min-vh-100 {
          min-height: 100vh !important; }

        .vw-100 {
          width: 100vw !important; }

        .vh-100 {
          height: 100vh !important; }

        .m-0 {
          margin: 0 !important; }

        .mt-0,
        .my-0 {
          margin-top: 0 !important; }

        .mr-0,
        .mx-0 {
          margin-right: 0 !important; }

        .mb-0,
        .my-0 {
          margin-bottom: 0 !important; }

        .ml-0,
        .mx-0 {
          margin-left: 0 !important; }

        .m-1 {
          margin: 0.25rem !important; }

        .mt-1,
        .my-1 {
          margin-top: 0.25rem !important; }

        .mr-1,
        .mx-1 {
          margin-right: 0.25rem !important; }

        .mb-1,
        .my-1 {
          margin-bottom: 0.25rem !important; }

        .ml-1,
        .mx-1 {
          margin-left: 0.25rem !important; }

        .m-2 {
          margin: 0.5rem !important; }

        .mt-2,
        .my-2 {
          margin-top: 0.5rem !important; }

        .mr-2,
        .mx-2 {
          margin-right: 0.5rem !important; }

        .mb-2,
        .my-2 {
          margin-bottom: 0.5rem !important; }

        .ml-2,
        .mx-2 {
          margin-left: 0.5rem !important; }

        .m-3 {
          margin: 0.75rem !important; }

        .mt-3,
        .my-3 {
          margin-top: 0.75rem !important; }

        .mr-3,
        .mx-3 {
          margin-right: 0.75rem !important; }

        .mb-3,
        .my-3 {
          margin-bottom: 0.75rem !important; }

        .ml-3,
        .mx-3 {
          margin-left: 0.75rem !important; }

        .m-4 {
          margin: 1rem !important; }

        .mt-4,
        .my-4 {
          margin-top: 1rem !important; }

        .mr-4,
        .mx-4 {
          margin-right: 1rem !important; }

        .mb-4,
        .my-4 {
          margin-bottom: 1rem !important; }

        .ml-4,
        .mx-4 {
          margin-left: 1rem !important; }

        .m-5 {
          margin: 1.5rem !important; }

        .mt-5,
        .my-5 {
          margin-top: 1.5rem !important; }

        .mr-5,
        .mx-5 {
          margin-right: 1.5rem !important; }

        .mb-5,
        .my-5 {
          margin-bottom: 1.5rem !important; }

        .ml-5,
        .mx-5 {
          margin-left: 1.5rem !important; }

        .m-6 {
          margin: 2rem !important; }

        .mt-6,
        .my-6 {
          margin-top: 2rem !important; }

        .mr-6,
        .mx-6 {
          margin-right: 2rem !important; }

        .mb-6,
        .my-6 {
          margin-bottom: 2rem !important; }

        .ml-6,
        .mx-6 {
          margin-left: 2rem !important; }

        .m-7 {
          margin: 3rem !important; }

        .mt-7,
        .my-7 {
          margin-top: 3rem !important; }

        .mr-7,
        .mx-7 {
          margin-right: 3rem !important; }

        .mb-7,
        .my-7 {
          margin-bottom: 3rem !important; }

        .ml-7,
        .mx-7 {
          margin-left: 3rem !important; }

        .m-8 {
          margin: 5rem !important; }

        .mt-8,
        .my-8 {
          margin-top: 5rem !important; }

        .mr-8,
        .mx-8 {
          margin-right: 5rem !important; }

        .mb-8,
        .my-8 {
          margin-bottom: 5rem !important; }

        .ml-8,
        .mx-8 {
          margin-left: 5rem !important; }

        .m-9 {
          margin: 7rem !important; }

        .mt-9,
        .my-9 {
          margin-top: 7rem !important; }

        .mr-9,
        .mx-9 {
          margin-right: 7rem !important; }

        .mb-9,
        .my-9 {
          margin-bottom: 7rem !important; }

        .ml-9,
        .mx-9 {
          margin-left: 7rem !important; }

        .m-10 {
          margin: 9rem !important; }

        .mt-10,
        .my-10 {
          margin-top: 9rem !important; }

        .mr-10,
        .mx-10 {
          margin-right: 9rem !important; }

        .mb-10,
        .my-10 {
          margin-bottom: 9rem !important; }

        .ml-10,
        .mx-10 {
          margin-left: 9rem !important; }

        .m-11 {
          margin: 11rem !important; }

        .mt-11,
        .my-11 {
          margin-top: 11rem !important; }

        .mr-11,
        .mx-11 {
          margin-right: 11rem !important; }

        .mb-11,
        .my-11 {
          margin-bottom: 11rem !important; }

        .ml-11,
        .mx-11 {
          margin-left: 11rem !important; }

        .m-12 {
          margin: 13rem !important; }

        .mt-12,
        .my-12 {
          margin-top: 13rem !important; }

        .mr-12,
        .mx-12 {
          margin-right: 13rem !important; }

        .mb-12,
        .my-12 {
          margin-bottom: 13rem !important; }

        .ml-12,
        .mx-12 {
          margin-left: 13rem !important; }

        .m-13 {
          margin: 16rem !important; }

        .mt-13,
        .my-13 {
          margin-top: 16rem !important; }

        .mr-13,
        .mx-13 {
          margin-right: 16rem !important; }

        .mb-13,
        .my-13 {
          margin-bottom: 16rem !important; }

        .ml-13,
        .mx-13 {
          margin-left: 16rem !important; }

        .p-0 {
          padding: 0 !important; }

        .pt-0,
        .py-0 {
          padding-top: 0 !important; }

        .pr-0,
        .px-0 {
          padding-right: 0 !important; }

        .pb-0,
        .py-0 {
          padding-bottom: 0 !important; }

        .pl-0,
        .px-0 {
          padding-left: 0 !important; }

        .p-1 {
          padding: 0.25rem !important; }

        .pt-1,
        .py-1 {
          padding-top: 0.25rem !important; }

        .pr-1,
        .px-1 {
          padding-right: 0.25rem !important; }

        .pb-1,
        .py-1 {
          padding-bottom: 0.25rem !important; }

        .pl-1,
        .px-1 {
          padding-left: 0.25rem !important; }

        .p-2 {
          padding: 0.5rem !important; }

        .pt-2,
        .py-2 {
          padding-top: 0.5rem !important; }

        .pr-2,
        .px-2 {
          padding-right: 0.5rem !important; }

        .pb-2,
        .py-2 {
          padding-bottom: 0.5rem !important; }

        .pl-2,
        .px-2 {
          padding-left: 0.5rem !important; }

        .p-3 {
          padding: 0.75rem !important; }

        .pt-3,
        .py-3 {
          padding-top: 0.75rem !important; }

        .pr-3,
        .px-3 {
          padding-right: 0.75rem !important; }

        .pb-3,
        .py-3 {
          padding-bottom: 0.75rem !important; }

        .pl-3,
        .px-3 {
          padding-left: 0.75rem !important; }

        .p-4 {
          padding: 1rem !important; }

        .pt-4,
        .py-4 {
          padding-top: 1rem !important; }

        .pr-4,
        .px-4 {
          padding-right: 1rem !important; }

        .pb-4,
        .py-4 {
          padding-bottom: 1rem !important; }

        .pl-4,
        .px-4 {
          padding-left: 1rem !important; }

        .p-5 {
          padding: 1.5rem !important; }

        .pt-5,
        .py-5 {
          padding-top: 1.5rem !important; }

        .pr-5,
        .px-5 {
          padding-right: 1.5rem !important; }

        .pb-5,
        .py-5 {
          padding-bottom: 1.5rem !important; }

        .pl-5,
        .px-5 {
          padding-left: 1.5rem !important; }

        .p-6 {
          padding: 2rem !important; }

        .pt-6,
        .py-6 {
          padding-top: 2rem !important; }

        .pr-6,
        .px-6 {
          padding-right: 2rem !important; }

        .pb-6,
        .py-6 {
          padding-bottom: 2rem !important; }

        .pl-6,
        .px-6 {
          padding-left: 2rem !important; }

        .p-7 {
          padding: 3rem !important; }

        .pt-7,
        .py-7 {
          padding-top: 3rem !important; }

        .pr-7,
        .px-7 {
          padding-right: 3rem !important; }

        .pb-7,
        .py-7 {
          padding-bottom: 3rem !important; }

        .pl-7,
        .px-7 {
          padding-left: 3rem !important; }

        .p-8 {
          padding: 5rem !important; }

        .pt-8,
        .py-8 {
          padding-top: 5rem !important; }

        .pr-8,
        .px-8 {
          padding-right: 5rem !important; }

        .pb-8,
        .py-8 {
          padding-bottom: 5rem !important; }

        .pl-8,
        .px-8 {
          padding-left: 5rem !important; }

        .p-9 {
          padding: 7rem !important; }

        .pt-9,
        .py-9 {
          padding-top: 7rem !important; }

        .pr-9,
        .px-9 {
          padding-right: 7rem !important; }

        .pb-9,
        .py-9 {
          padding-bottom: 7rem !important; }

        .pl-9,
        .px-9 {
          padding-left: 7rem !important; }

        .p-10 {
          padding: 9rem !important; }

        .pt-10,
        .py-10 {
          padding-top: 9rem !important; }

        .pr-10,
        .px-10 {
          padding-right: 9rem !important; }

        .pb-10,
        .py-10 {
          padding-bottom: 9rem !important; }

        .pl-10,
        .px-10 {
          padding-left: 9rem !important; }

        .p-11 {
          padding: 11rem !important; }

        .pt-11,
        .py-11 {
          padding-top: 11rem !important; }

        .pr-11,
        .px-11 {
          padding-right: 11rem !important; }

        .pb-11,
        .py-11 {
          padding-bottom: 11rem !important; }

        .pl-11,
        .px-11 {
          padding-left: 11rem !important; }

        .p-12 {
          padding: 13rem !important; }

        .pt-12,
        .py-12 {
          padding-top: 13rem !important; }

        .pr-12,
        .px-12 {
          padding-right: 13rem !important; }

        .pb-12,
        .py-12 {
          padding-bottom: 13rem !important; }

        .pl-12,
        .px-12 {
          padding-left: 13rem !important; }

        .p-13 {
          padding: 16rem !important; }

        .pt-13,
        .py-13 {
          padding-top: 16rem !important; }

        .pr-13,
        .px-13 {
          padding-right: 16rem !important; }

        .pb-13,
        .py-13 {
          padding-bottom: 16rem !important; }

        .pl-13,
        .px-13 {
          padding-left: 16rem !important; }

        .m-n1 {
          margin: -0.25rem !important; }

        .mt-n1,
        .my-n1 {
          margin-top: -0.25rem !important; }

        .mr-n1,
        .mx-n1 {
          margin-right: -0.25rem !important; }

        .mb-n1,
        .my-n1 {
          margin-bottom: -0.25rem !important; }

        .ml-n1,
        .mx-n1 {
          margin-left: -0.25rem !important; }

        .m-n2 {
          margin: -0.5rem !important; }

        .mt-n2,
        .my-n2 {
          margin-top: -0.5rem !important; }

        .mr-n2,
        .mx-n2 {
          margin-right: -0.5rem !important; }

        .mb-n2,
        .my-n2 {
          margin-bottom: -0.5rem !important; }

        .ml-n2,
        .mx-n2 {
          margin-left: -0.5rem !important; }

        .m-n3 {
          margin: -0.75rem !important; }

        .mt-n3,
        .my-n3 {
          margin-top: -0.75rem !important; }

        .mr-n3,
        .mx-n3 {
          margin-right: -0.75rem !important; }

        .mb-n3,
        .my-n3 {
          margin-bottom: -0.75rem !important; }

        .ml-n3,
        .mx-n3 {
          margin-left: -0.75rem !important; }

        .m-n4 {
          margin: -1rem !important; }

        .mt-n4,
        .my-n4 {
          margin-top: -1rem !important; }

        .mr-n4,
        .mx-n4 {
          margin-right: -1rem !important; }

        .mb-n4,
        .my-n4 {
          margin-bottom: -1rem !important; }

        .ml-n4,
        .mx-n4 {
          margin-left: -1rem !important; }

        .m-n5 {
          margin: -1.5rem !important; }

        .mt-n5,
        .my-n5 {
          margin-top: -1.5rem !important; }

        .mr-n5,
        .mx-n5 {
          margin-right: -1.5rem !important; }

        .mb-n5,
        .my-n5 {
          margin-bottom: -1.5rem !important; }

        .ml-n5,
        .mx-n5 {
          margin-left: -1.5rem !important; }

        .m-n6 {
          margin: -2rem !important; }

        .mt-n6,
        .my-n6 {
          margin-top: -2rem !important; }

        .mr-n6,
        .mx-n6 {
          margin-right: -2rem !important; }

        .mb-n6,
        .my-n6 {
          margin-bottom: -2rem !important; }

        .ml-n6,
        .mx-n6 {
          margin-left: -2rem !important; }

        .m-n7 {
          margin: -3rem !important; }

        .mt-n7,
        .my-n7 {
          margin-top: -3rem !important; }

        .mr-n7,
        .mx-n7 {
          margin-right: -3rem !important; }

        .mb-n7,
        .my-n7 {
          margin-bottom: -3rem !important; }

        .ml-n7,
        .mx-n7 {
          margin-left: -3rem !important; }

        .m-n8 {
          margin: -5rem !important; }

        .mt-n8,
        .my-n8 {
          margin-top: -5rem !important; }

        .mr-n8,
        .mx-n8 {
          margin-right: -5rem !important; }

        .mb-n8,
        .my-n8 {
          margin-bottom: -5rem !important; }

        .ml-n8,
        .mx-n8 {
          margin-left: -5rem !important; }

        .m-n9 {
          margin: -7rem !important; }

        .mt-n9,
        .my-n9 {
          margin-top: -7rem !important; }

        .mr-n9,
        .mx-n9 {
          margin-right: -7rem !important; }

        .mb-n9,
        .my-n9 {
          margin-bottom: -7rem !important; }

        .ml-n9,
        .mx-n9 {
          margin-left: -7rem !important; }

        .m-n10 {
          margin: -9rem !important; }

        .mt-n10,
        .my-n10 {
          margin-top: -9rem !important; }

        .mr-n10,
        .mx-n10 {
          margin-right: -9rem !important; }

        .mb-n10,
        .my-n10 {
          margin-bottom: -9rem !important; }

        .ml-n10,
        .mx-n10 {
          margin-left: -9rem !important; }

        .m-n11 {
          margin: -11rem !important; }

        .mt-n11,
        .my-n11 {
          margin-top: -11rem !important; }

        .mr-n11,
        .mx-n11 {
          margin-right: -11rem !important; }

        .mb-n11,
        .my-n11 {
          margin-bottom: -11rem !important; }

        .ml-n11,
        .mx-n11 {
          margin-left: -11rem !important; }

        .m-n12 {
          margin: -13rem !important; }

        .mt-n12,
        .my-n12 {
          margin-top: -13rem !important; }

        .mr-n12,
        .mx-n12 {
          margin-right: -13rem !important; }

        .mb-n12,
        .my-n12 {
          margin-bottom: -13rem !important; }

        .ml-n12,
        .mx-n12 {
          margin-left: -13rem !important; }

        .m-n13 {
          margin: -16rem !important; }

        .mt-n13,
        .my-n13 {
          margin-top: -16rem !important; }

        .mr-n13,
        .mx-n13 {
          margin-right: -16rem !important; }

        .mb-n13,
        .my-n13 {
          margin-bottom: -16rem !important; }

        .ml-n13,
        .mx-n13 {
          margin-left: -16rem !important; }

        .m-auto {
          margin: auto !important; }

        .mt-auto,
        .my-auto {
          margin-top: auto !important; }

        .mr-auto,
        .mx-auto {
          margin-right: auto !important; }

        .mb-auto,
        .my-auto {
          margin-bottom: auto !important; }

        .ml-auto,
        .mx-auto {
          margin-left: auto !important; }

        @media (min-width: 576px) {
          .m-sm-0 {
            margin: 0 !important; }
          .mt-sm-0,
          .my-sm-0 {
            margin-top: 0 !important; }
          .mr-sm-0,
          .mx-sm-0 {
            margin-right: 0 !important; }
          .mb-sm-0,
          .my-sm-0 {
            margin-bottom: 0 !important; }
          .ml-sm-0,
          .mx-sm-0 {
            margin-left: 0 !important; }
          .m-sm-1 {
            margin: 0.25rem !important; }
          .mt-sm-1,
          .my-sm-1 {
            margin-top: 0.25rem !important; }
          .mr-sm-1,
          .mx-sm-1 {
            margin-right: 0.25rem !important; }
          .mb-sm-1,
          .my-sm-1 {
            margin-bottom: 0.25rem !important; }
          .ml-sm-1,
          .mx-sm-1 {
            margin-left: 0.25rem !important; }
          .m-sm-2 {
            margin: 0.5rem !important; }
          .mt-sm-2,
          .my-sm-2 {
            margin-top: 0.5rem !important; }
          .mr-sm-2,
          .mx-sm-2 {
            margin-right: 0.5rem !important; }
          .mb-sm-2,
          .my-sm-2 {
            margin-bottom: 0.5rem !important; }
          .ml-sm-2,
          .mx-sm-2 {
            margin-left: 0.5rem !important; }
          .m-sm-3 {
            margin: 0.75rem !important; }
          .mt-sm-3,
          .my-sm-3 {
            margin-top: 0.75rem !important; }
          .mr-sm-3,
          .mx-sm-3 {
            margin-right: 0.75rem !important; }
          .mb-sm-3,
          .my-sm-3 {
            margin-bottom: 0.75rem !important; }
          .ml-sm-3,
          .mx-sm-3 {
            margin-left: 0.75rem !important; }
          .m-sm-4 {
            margin: 1rem !important; }
          .mt-sm-4,
          .my-sm-4 {
            margin-top: 1rem !important; }
          .mr-sm-4,
          .mx-sm-4 {
            margin-right: 1rem !important; }
          .mb-sm-4,
          .my-sm-4 {
            margin-bottom: 1rem !important; }
          .ml-sm-4,
          .mx-sm-4 {
            margin-left: 1rem !important; }
          .m-sm-5 {
            margin: 1.5rem !important; }
          .mt-sm-5,
          .my-sm-5 {
            margin-top: 1.5rem !important; }
          .mr-sm-5,
          .mx-sm-5 {
            margin-right: 1.5rem !important; }
          .mb-sm-5,
          .my-sm-5 {
            margin-bottom: 1.5rem !important; }
          .ml-sm-5,
          .mx-sm-5 {
            margin-left: 1.5rem !important; }
          .m-sm-6 {
            margin: 2rem !important; }
          .mt-sm-6,
          .my-sm-6 {
            margin-top: 2rem !important; }
          .mr-sm-6,
          .mx-sm-6 {
            margin-right: 2rem !important; }
          .mb-sm-6,
          .my-sm-6 {
            margin-bottom: 2rem !important; }
          .ml-sm-6,
          .mx-sm-6 {
            margin-left: 2rem !important; }
          .m-sm-7 {
            margin: 3rem !important; }
          .mt-sm-7,
          .my-sm-7 {
            margin-top: 3rem !important; }
          .mr-sm-7,
          .mx-sm-7 {
            margin-right: 3rem !important; }
          .mb-sm-7,
          .my-sm-7 {
            margin-bottom: 3rem !important; }
          .ml-sm-7,
          .mx-sm-7 {
            margin-left: 3rem !important; }
          .m-sm-8 {
            margin: 5rem !important; }
          .mt-sm-8,
          .my-sm-8 {
            margin-top: 5rem !important; }
          .mr-sm-8,
          .mx-sm-8 {
            margin-right: 5rem !important; }
          .mb-sm-8,
          .my-sm-8 {
            margin-bottom: 5rem !important; }
          .ml-sm-8,
          .mx-sm-8 {
            margin-left: 5rem !important; }
          .m-sm-9 {
            margin: 7rem !important; }
          .mt-sm-9,
          .my-sm-9 {
            margin-top: 7rem !important; }
          .mr-sm-9,
          .mx-sm-9 {
            margin-right: 7rem !important; }
          .mb-sm-9,
          .my-sm-9 {
            margin-bottom: 7rem !important; }
          .ml-sm-9,
          .mx-sm-9 {
            margin-left: 7rem !important; }
          .m-sm-10 {
            margin: 9rem !important; }
          .mt-sm-10,
          .my-sm-10 {
            margin-top: 9rem !important; }
          .mr-sm-10,
          .mx-sm-10 {
            margin-right: 9rem !important; }
          .mb-sm-10,
          .my-sm-10 {
            margin-bottom: 9rem !important; }
          .ml-sm-10,
          .mx-sm-10 {
            margin-left: 9rem !important; }
          .m-sm-11 {
            margin: 11rem !important; }
          .mt-sm-11,
          .my-sm-11 {
            margin-top: 11rem !important; }
          .mr-sm-11,
          .mx-sm-11 {
            margin-right: 11rem !important; }
          .mb-sm-11,
          .my-sm-11 {
            margin-bottom: 11rem !important; }
          .ml-sm-11,
          .mx-sm-11 {
            margin-left: 11rem !important; }
          .m-sm-12 {
            margin: 13rem !important; }
          .mt-sm-12,
          .my-sm-12 {
            margin-top: 13rem !important; }
          .mr-sm-12,
          .mx-sm-12 {
            margin-right: 13rem !important; }
          .mb-sm-12,
          .my-sm-12 {
            margin-bottom: 13rem !important; }
          .ml-sm-12,
          .mx-sm-12 {
            margin-left: 13rem !important; }
          .m-sm-13 {
            margin: 16rem !important; }
          .mt-sm-13,
          .my-sm-13 {
            margin-top: 16rem !important; }
          .mr-sm-13,
          .mx-sm-13 {
            margin-right: 16rem !important; }
          .mb-sm-13,
          .my-sm-13 {
            margin-bottom: 16rem !important; }
          .ml-sm-13,
          .mx-sm-13 {
            margin-left: 16rem !important; }
          .p-sm-0 {
            padding: 0 !important; }
          .pt-sm-0,
          .py-sm-0 {
            padding-top: 0 !important; }
          .pr-sm-0,
          .px-sm-0 {
            padding-right: 0 !important; }
          .pb-sm-0,
          .py-sm-0 {
            padding-bottom: 0 !important; }
          .pl-sm-0,
          .px-sm-0 {
            padding-left: 0 !important; }
          .p-sm-1 {
            padding: 0.25rem !important; }
          .pt-sm-1,
          .py-sm-1 {
            padding-top: 0.25rem !important; }
          .pr-sm-1,
          .px-sm-1 {
            padding-right: 0.25rem !important; }
          .pb-sm-1,
          .py-sm-1 {
            padding-bottom: 0.25rem !important; }
          .pl-sm-1,
          .px-sm-1 {
            padding-left: 0.25rem !important; }
          .p-sm-2 {
            padding: 0.5rem !important; }
          .pt-sm-2,
          .py-sm-2 {
            padding-top: 0.5rem !important; }
          .pr-sm-2,
          .px-sm-2 {
            padding-right: 0.5rem !important; }
          .pb-sm-2,
          .py-sm-2 {
            padding-bottom: 0.5rem !important; }
          .pl-sm-2,
          .px-sm-2 {
            padding-left: 0.5rem !important; }
          .p-sm-3 {
            padding: 0.75rem !important; }
          .pt-sm-3,
          .py-sm-3 {
            padding-top: 0.75rem !important; }
          .pr-sm-3,
          .px-sm-3 {
            padding-right: 0.75rem !important; }
          .pb-sm-3,
          .py-sm-3 {
            padding-bottom: 0.75rem !important; }
          .pl-sm-3,
          .px-sm-3 {
            padding-left: 0.75rem !important; }
          .p-sm-4 {
            padding: 1rem !important; }
          .pt-sm-4,
          .py-sm-4 {
            padding-top: 1rem !important; }
          .pr-sm-4,
          .px-sm-4 {
            padding-right: 1rem !important; }
          .pb-sm-4,
          .py-sm-4 {
            padding-bottom: 1rem !important; }
          .pl-sm-4,
          .px-sm-4 {
            padding-left: 1rem !important; }
          .p-sm-5 {
            padding: 1.5rem !important; }
          .pt-sm-5,
          .py-sm-5 {
            padding-top: 1.5rem !important; }
          .pr-sm-5,
          .px-sm-5 {
            padding-right: 1.5rem !important; }
          .pb-sm-5,
          .py-sm-5 {
            padding-bottom: 1.5rem !important; }
          .pl-sm-5,
          .px-sm-5 {
            padding-left: 1.5rem !important; }
          .p-sm-6 {
            padding: 2rem !important; }
          .pt-sm-6,
          .py-sm-6 {
            padding-top: 2rem !important; }
          .pr-sm-6,
          .px-sm-6 {
            padding-right: 2rem !important; }
          .pb-sm-6,
          .py-sm-6 {
            padding-bottom: 2rem !important; }
          .pl-sm-6,
          .px-sm-6 {
            padding-left: 2rem !important; }
          .p-sm-7 {
            padding: 3rem !important; }
          .pt-sm-7,
          .py-sm-7 {
            padding-top: 3rem !important; }
          .pr-sm-7,
          .px-sm-7 {
            padding-right: 3rem !important; }
          .pb-sm-7,
          .py-sm-7 {
            padding-bottom: 3rem !important; }
          .pl-sm-7,
          .px-sm-7 {
            padding-left: 3rem !important; }
          .p-sm-8 {
            padding: 5rem !important; }
          .pt-sm-8,
          .py-sm-8 {
            padding-top: 5rem !important; }
          .pr-sm-8,
          .px-sm-8 {
            padding-right: 5rem !important; }
          .pb-sm-8,
          .py-sm-8 {
            padding-bottom: 5rem !important; }
          .pl-sm-8,
          .px-sm-8 {
            padding-left: 5rem !important; }
          .p-sm-9 {
            padding: 7rem !important; }
          .pt-sm-9,
          .py-sm-9 {
            padding-top: 7rem !important; }
          .pr-sm-9,
          .px-sm-9 {
            padding-right: 7rem !important; }
          .pb-sm-9,
          .py-sm-9 {
            padding-bottom: 7rem !important; }
          .pl-sm-9,
          .px-sm-9 {
            padding-left: 7rem !important; }
          .p-sm-10 {
            padding: 9rem !important; }
          .pt-sm-10,
          .py-sm-10 {
            padding-top: 9rem !important; }
          .pr-sm-10,
          .px-sm-10 {
            padding-right: 9rem !important; }
          .pb-sm-10,
          .py-sm-10 {
            padding-bottom: 9rem !important; }
          .pl-sm-10,
          .px-sm-10 {
            padding-left: 9rem !important; }
          .p-sm-11 {
            padding: 11rem !important; }
          .pt-sm-11,
          .py-sm-11 {
            padding-top: 11rem !important; }
          .pr-sm-11,
          .px-sm-11 {
            padding-right: 11rem !important; }
          .pb-sm-11,
          .py-sm-11 {
            padding-bottom: 11rem !important; }
          .pl-sm-11,
          .px-sm-11 {
            padding-left: 11rem !important; }
          .p-sm-12 {
            padding: 13rem !important; }
          .pt-sm-12,
          .py-sm-12 {
            padding-top: 13rem !important; }
          .pr-sm-12,
          .px-sm-12 {
            padding-right: 13rem !important; }
          .pb-sm-12,
          .py-sm-12 {
            padding-bottom: 13rem !important; }
          .pl-sm-12,
          .px-sm-12 {
            padding-left: 13rem !important; }
          .p-sm-13 {
            padding: 16rem !important; }
          .pt-sm-13,
          .py-sm-13 {
            padding-top: 16rem !important; }
          .pr-sm-13,
          .px-sm-13 {
            padding-right: 16rem !important; }
          .pb-sm-13,
          .py-sm-13 {
            padding-bottom: 16rem !important; }
          .pl-sm-13,
          .px-sm-13 {
            padding-left: 16rem !important; }
          .m-sm-n1 {
            margin: -0.25rem !important; }
          .mt-sm-n1,
          .my-sm-n1 {
            margin-top: -0.25rem !important; }
          .mr-sm-n1,
          .mx-sm-n1 {
            margin-right: -0.25rem !important; }
          .mb-sm-n1,
          .my-sm-n1 {
            margin-bottom: -0.25rem !important; }
          .ml-sm-n1,
          .mx-sm-n1 {
            margin-left: -0.25rem !important; }
          .m-sm-n2 {
            margin: -0.5rem !important; }
          .mt-sm-n2,
          .my-sm-n2 {
            margin-top: -0.5rem !important; }
          .mr-sm-n2,
          .mx-sm-n2 {
            margin-right: -0.5rem !important; }
          .mb-sm-n2,
          .my-sm-n2 {
            margin-bottom: -0.5rem !important; }
          .ml-sm-n2,
          .mx-sm-n2 {
            margin-left: -0.5rem !important; }
          .m-sm-n3 {
            margin: -0.75rem !important; }
          .mt-sm-n3,
          .my-sm-n3 {
            margin-top: -0.75rem !important; }
          .mr-sm-n3,
          .mx-sm-n3 {
            margin-right: -0.75rem !important; }
          .mb-sm-n3,
          .my-sm-n3 {
            margin-bottom: -0.75rem !important; }
          .ml-sm-n3,
          .mx-sm-n3 {
            margin-left: -0.75rem !important; }
          .m-sm-n4 {
            margin: -1rem !important; }
          .mt-sm-n4,
          .my-sm-n4 {
            margin-top: -1rem !important; }
          .mr-sm-n4,
          .mx-sm-n4 {
            margin-right: -1rem !important; }
          .mb-sm-n4,
          .my-sm-n4 {
            margin-bottom: -1rem !important; }
          .ml-sm-n4,
          .mx-sm-n4 {
            margin-left: -1rem !important; }
          .m-sm-n5 {
            margin: -1.5rem !important; }
          .mt-sm-n5,
          .my-sm-n5 {
            margin-top: -1.5rem !important; }
          .mr-sm-n5,
          .mx-sm-n5 {
            margin-right: -1.5rem !important; }
          .mb-sm-n5,
          .my-sm-n5 {
            margin-bottom: -1.5rem !important; }
          .ml-sm-n5,
          .mx-sm-n5 {
            margin-left: -1.5rem !important; }
          .m-sm-n6 {
            margin: -2rem !important; }
          .mt-sm-n6,
          .my-sm-n6 {
            margin-top: -2rem !important; }
          .mr-sm-n6,
          .mx-sm-n6 {
            margin-right: -2rem !important; }
          .mb-sm-n6,
          .my-sm-n6 {
            margin-bottom: -2rem !important; }
          .ml-sm-n6,
          .mx-sm-n6 {
            margin-left: -2rem !important; }
          .m-sm-n7 {
            margin: -3rem !important; }
          .mt-sm-n7,
          .my-sm-n7 {
            margin-top: -3rem !important; }
          .mr-sm-n7,
          .mx-sm-n7 {
            margin-right: -3rem !important; }
          .mb-sm-n7,
          .my-sm-n7 {
            margin-bottom: -3rem !important; }
          .ml-sm-n7,
          .mx-sm-n7 {
            margin-left: -3rem !important; }
          .m-sm-n8 {
            margin: -5rem !important; }
          .mt-sm-n8,
          .my-sm-n8 {
            margin-top: -5rem !important; }
          .mr-sm-n8,
          .mx-sm-n8 {
            margin-right: -5rem !important; }
          .mb-sm-n8,
          .my-sm-n8 {
            margin-bottom: -5rem !important; }
          .ml-sm-n8,
          .mx-sm-n8 {
            margin-left: -5rem !important; }
          .m-sm-n9 {
            margin: -7rem !important; }
          .mt-sm-n9,
          .my-sm-n9 {
            margin-top: -7rem !important; }
          .mr-sm-n9,
          .mx-sm-n9 {
            margin-right: -7rem !important; }
          .mb-sm-n9,
          .my-sm-n9 {
            margin-bottom: -7rem !important; }
          .ml-sm-n9,
          .mx-sm-n9 {
            margin-left: -7rem !important; }
          .m-sm-n10 {
            margin: -9rem !important; }
          .mt-sm-n10,
          .my-sm-n10 {
            margin-top: -9rem !important; }
          .mr-sm-n10,
          .mx-sm-n10 {
            margin-right: -9rem !important; }
          .mb-sm-n10,
          .my-sm-n10 {
            margin-bottom: -9rem !important; }
          .ml-sm-n10,
          .mx-sm-n10 {
            margin-left: -9rem !important; }
          .m-sm-n11 {
            margin: -11rem !important; }
          .mt-sm-n11,
          .my-sm-n11 {
            margin-top: -11rem !important; }
          .mr-sm-n11,
          .mx-sm-n11 {
            margin-right: -11rem !important; }
          .mb-sm-n11,
          .my-sm-n11 {
            margin-bottom: -11rem !important; }
          .ml-sm-n11,
          .mx-sm-n11 {
            margin-left: -11rem !important; }
          .m-sm-n12 {
            margin: -13rem !important; }
          .mt-sm-n12,
          .my-sm-n12 {
            margin-top: -13rem !important; }
          .mr-sm-n12,
          .mx-sm-n12 {
            margin-right: -13rem !important; }
          .mb-sm-n12,
          .my-sm-n12 {
            margin-bottom: -13rem !important; }
          .ml-sm-n12,
          .mx-sm-n12 {
            margin-left: -13rem !important; }
          .m-sm-n13 {
            margin: -16rem !important; }
          .mt-sm-n13,
          .my-sm-n13 {
            margin-top: -16rem !important; }
          .mr-sm-n13,
          .mx-sm-n13 {
            margin-right: -16rem !important; }
          .mb-sm-n13,
          .my-sm-n13 {
            margin-bottom: -16rem !important; }
          .ml-sm-n13,
          .mx-sm-n13 {
            margin-left: -16rem !important; }
          .m-sm-auto {
            margin: auto !important; }
          .mt-sm-auto,
          .my-sm-auto {
            margin-top: auto !important; }
          .mr-sm-auto,
          .mx-sm-auto {
            margin-right: auto !important; }
          .mb-sm-auto,
          .my-sm-auto {
            margin-bottom: auto !important; }
          .ml-sm-auto,
          .mx-sm-auto {
            margin-left: auto !important; } }

        @media (min-width: 768px) {
          .m-md-0 {
            margin: 0 !important; }
          .mt-md-0,
          .my-md-0 {
            margin-top: 0 !important; }
          .mr-md-0,
          .mx-md-0 {
            margin-right: 0 !important; }
          .mb-md-0,
          .my-md-0 {
            margin-bottom: 0 !important; }
          .ml-md-0,
          .mx-md-0 {
            margin-left: 0 !important; }
          .m-md-1 {
            margin: 0.25rem !important; }
          .mt-md-1,
          .my-md-1 {
            margin-top: 0.25rem !important; }
          .mr-md-1,
          .mx-md-1 {
            margin-right: 0.25rem !important; }
          .mb-md-1,
          .my-md-1 {
            margin-bottom: 0.25rem !important; }
          .ml-md-1,
          .mx-md-1 {
            margin-left: 0.25rem !important; }
          .m-md-2 {
            margin: 0.5rem !important; }
          .mt-md-2,
          .my-md-2 {
            margin-top: 0.5rem !important; }
          .mr-md-2,
          .mx-md-2 {
            margin-right: 0.5rem !important; }
          .mb-md-2,
          .my-md-2 {
            margin-bottom: 0.5rem !important; }
          .ml-md-2,
          .mx-md-2 {
            margin-left: 0.5rem !important; }
          .m-md-3 {
            margin: 0.75rem !important; }
          .mt-md-3,
          .my-md-3 {
            margin-top: 0.75rem !important; }
          .mr-md-3,
          .mx-md-3 {
            margin-right: 0.75rem !important; }
          .mb-md-3,
          .my-md-3 {
            margin-bottom: 0.75rem !important; }
          .ml-md-3,
          .mx-md-3 {
            margin-left: 0.75rem !important; }
          .m-md-4 {
            margin: 1rem !important; }
          .mt-md-4,
          .my-md-4 {
            margin-top: 1rem !important; }
          .mr-md-4,
          .mx-md-4 {
            margin-right: 1rem !important; }
          .mb-md-4,
          .my-md-4 {
            margin-bottom: 1rem !important; }
          .ml-md-4,
          .mx-md-4 {
            margin-left: 1rem !important; }
          .m-md-5 {
            margin: 1.5rem !important; }
          .mt-md-5,
          .my-md-5 {
            margin-top: 1.5rem !important; }
          .mr-md-5,
          .mx-md-5 {
            margin-right: 1.5rem !important; }
          .mb-md-5,
          .my-md-5 {
            margin-bottom: 1.5rem !important; }
          .ml-md-5,
          .mx-md-5 {
            margin-left: 1.5rem !important; }
          .m-md-6 {
            margin: 2rem !important; }
          .mt-md-6,
          .my-md-6 {
            margin-top: 2rem !important; }
          .mr-md-6,
          .mx-md-6 {
            margin-right: 2rem !important; }
          .mb-md-6,
          .my-md-6 {
            margin-bottom: 2rem !important; }
          .ml-md-6,
          .mx-md-6 {
            margin-left: 2rem !important; }
          .m-md-7 {
            margin: 3rem !important; }
          .mt-md-7,
          .my-md-7 {
            margin-top: 3rem !important; }
          .mr-md-7,
          .mx-md-7 {
            margin-right: 3rem !important; }
          .mb-md-7,
          .my-md-7 {
            margin-bottom: 3rem !important; }
          .ml-md-7,
          .mx-md-7 {
            margin-left: 3rem !important; }
          .m-md-8 {
            margin: 5rem !important; }
          .mt-md-8,
          .my-md-8 {
            margin-top: 5rem !important; }
          .mr-md-8,
          .mx-md-8 {
            margin-right: 5rem !important; }
          .mb-md-8,
          .my-md-8 {
            margin-bottom: 5rem !important; }
          .ml-md-8,
          .mx-md-8 {
            margin-left: 5rem !important; }
          .m-md-9 {
            margin: 7rem !important; }
          .mt-md-9,
          .my-md-9 {
            margin-top: 7rem !important; }
          .mr-md-9,
          .mx-md-9 {
            margin-right: 7rem !important; }
          .mb-md-9,
          .my-md-9 {
            margin-bottom: 7rem !important; }
          .ml-md-9,
          .mx-md-9 {
            margin-left: 7rem !important; }
          .m-md-10 {
            margin: 9rem !important; }
          .mt-md-10,
          .my-md-10 {
            margin-top: 9rem !important; }
          .mr-md-10,
          .mx-md-10 {
            margin-right: 9rem !important; }
          .mb-md-10,
          .my-md-10 {
            margin-bottom: 9rem !important; }
          .ml-md-10,
          .mx-md-10 {
            margin-left: 9rem !important; }
          .m-md-11 {
            margin: 11rem !important; }
          .mt-md-11,
          .my-md-11 {
            margin-top: 11rem !important; }
          .mr-md-11,
          .mx-md-11 {
            margin-right: 11rem !important; }
          .mb-md-11,
          .my-md-11 {
            margin-bottom: 11rem !important; }
          .ml-md-11,
          .mx-md-11 {
            margin-left: 11rem !important; }
          .m-md-12 {
            margin: 13rem !important; }
          .mt-md-12,
          .my-md-12 {
            margin-top: 13rem !important; }
          .mr-md-12,
          .mx-md-12 {
            margin-right: 13rem !important; }
          .mb-md-12,
          .my-md-12 {
            margin-bottom: 13rem !important; }
          .ml-md-12,
          .mx-md-12 {
            margin-left: 13rem !important; }
          .m-md-13 {
            margin: 16rem !important; }
          .mt-md-13,
          .my-md-13 {
            margin-top: 16rem !important; }
          .mr-md-13,
          .mx-md-13 {
            margin-right: 16rem !important; }
          .mb-md-13,
          .my-md-13 {
            margin-bottom: 16rem !important; }
          .ml-md-13,
          .mx-md-13 {
            margin-left: 16rem !important; }
          .p-md-0 {
            padding: 0 !important; }
          .pt-md-0,
          .py-md-0 {
            padding-top: 0 !important; }
          .pr-md-0,
          .px-md-0 {
            padding-right: 0 !important; }
          .pb-md-0,
          .py-md-0 {
            padding-bottom: 0 !important; }
          .pl-md-0,
          .px-md-0 {
            padding-left: 0 !important; }
          .p-md-1 {
            padding: 0.25rem !important; }
          .pt-md-1,
          .py-md-1 {
            padding-top: 0.25rem !important; }
          .pr-md-1,
          .px-md-1 {
            padding-right: 0.25rem !important; }
          .pb-md-1,
          .py-md-1 {
            padding-bottom: 0.25rem !important; }
          .pl-md-1,
          .px-md-1 {
            padding-left: 0.25rem !important; }
          .p-md-2 {
            padding: 0.5rem !important; }
          .pt-md-2,
          .py-md-2 {
            padding-top: 0.5rem !important; }
          .pr-md-2,
          .px-md-2 {
            padding-right: 0.5rem !important; }
          .pb-md-2,
          .py-md-2 {
            padding-bottom: 0.5rem !important; }
          .pl-md-2,
          .px-md-2 {
            padding-left: 0.5rem !important; }
          .p-md-3 {
            padding: 0.75rem !important; }
          .pt-md-3,
          .py-md-3 {
            padding-top: 0.75rem !important; }
          .pr-md-3,
          .px-md-3 {
            padding-right: 0.75rem !important; }
          .pb-md-3,
          .py-md-3 {
            padding-bottom: 0.75rem !important; }
          .pl-md-3,
          .px-md-3 {
            padding-left: 0.75rem !important; }
          .p-md-4 {
            padding: 1rem !important; }
          .pt-md-4,
          .py-md-4 {
            padding-top: 1rem !important; }
          .pr-md-4,
          .px-md-4 {
            padding-right: 1rem !important; }
          .pb-md-4,
          .py-md-4 {
            padding-bottom: 1rem !important; }
          .pl-md-4,
          .px-md-4 {
            padding-left: 1rem !important; }
          .p-md-5 {
            padding: 1.5rem !important; }
          .pt-md-5,
          .py-md-5 {
            padding-top: 1.5rem !important; }
          .pr-md-5,
          .px-md-5 {
            padding-right: 1.5rem !important; }
          .pb-md-5,
          .py-md-5 {
            padding-bottom: 1.5rem !important; }
          .pl-md-5,
          .px-md-5 {
            padding-left: 1.5rem !important; }
          .p-md-6 {
            padding: 2rem !important; }
          .pt-md-6,
          .py-md-6 {
            padding-top: 2rem !important; }
          .pr-md-6,
          .px-md-6 {
            padding-right: 2rem !important; }
          .pb-md-6,
          .py-md-6 {
            padding-bottom: 2rem !important; }
          .pl-md-6,
          .px-md-6 {
            padding-left: 2rem !important; }
          .p-md-7 {
            padding: 3rem !important; }
          .pt-md-7,
          .py-md-7 {
            padding-top: 3rem !important; }
          .pr-md-7,
          .px-md-7 {
            padding-right: 3rem !important; }
          .pb-md-7,
          .py-md-7 {
            padding-bottom: 3rem !important; }
          .pl-md-7,
          .px-md-7 {
            padding-left: 3rem !important; }
          .p-md-8 {
            padding: 5rem !important; }
          .pt-md-8,
          .py-md-8 {
            padding-top: 5rem !important; }
          .pr-md-8,
          .px-md-8 {
            padding-right: 5rem !important; }
          .pb-md-8,
          .py-md-8 {
            padding-bottom: 5rem !important; }
          .pl-md-8,
          .px-md-8 {
            padding-left: 5rem !important; }
          .p-md-9 {
            padding: 7rem !important; }
          .pt-md-9,
          .py-md-9 {
            padding-top: 7rem !important; }
          .pr-md-9,
          .px-md-9 {
            padding-right: 7rem !important; }
          .pb-md-9,
          .py-md-9 {
            padding-bottom: 7rem !important; }
          .pl-md-9,
          .px-md-9 {
            padding-left: 7rem !important; }
          .p-md-10 {
            padding: 9rem !important; }
          .pt-md-10,
          .py-md-10 {
            padding-top: 9rem !important; }
          .pr-md-10,
          .px-md-10 {
            padding-right: 9rem !important; }
          .pb-md-10,
          .py-md-10 {
            padding-bottom: 9rem !important; }
          .pl-md-10,
          .px-md-10 {
            padding-left: 9rem !important; }
          .p-md-11 {
            padding: 11rem !important; }
          .pt-md-11,
          .py-md-11 {
            padding-top: 11rem !important; }
          .pr-md-11,
          .px-md-11 {
            padding-right: 11rem !important; }
          .pb-md-11,
          .py-md-11 {
            padding-bottom: 11rem !important; }
          .pl-md-11,
          .px-md-11 {
            padding-left: 11rem !important; }
          .p-md-12 {
            padding: 13rem !important; }
          .pt-md-12,
          .py-md-12 {
            padding-top: 13rem !important; }
          .pr-md-12,
          .px-md-12 {
            padding-right: 13rem !important; }
          .pb-md-12,
          .py-md-12 {
            padding-bottom: 13rem !important; }
          .pl-md-12,
          .px-md-12 {
            padding-left: 13rem !important; }
          .p-md-13 {
            padding: 16rem !important; }
          .pt-md-13,
          .py-md-13 {
            padding-top: 16rem !important; }
          .pr-md-13,
          .px-md-13 {
            padding-right: 16rem !important; }
          .pb-md-13,
          .py-md-13 {
            padding-bottom: 16rem !important; }
          .pl-md-13,
          .px-md-13 {
            padding-left: 16rem !important; }
          .m-md-n1 {
            margin: -0.25rem !important; }
          .mt-md-n1,
          .my-md-n1 {
            margin-top: -0.25rem !important; }
          .mr-md-n1,
          .mx-md-n1 {
            margin-right: -0.25rem !important; }
          .mb-md-n1,
          .my-md-n1 {
            margin-bottom: -0.25rem !important; }
          .ml-md-n1,
          .mx-md-n1 {
            margin-left: -0.25rem !important; }
          .m-md-n2 {
            margin: -0.5rem !important; }
          .mt-md-n2,
          .my-md-n2 {
            margin-top: -0.5rem !important; }
          .mr-md-n2,
          .mx-md-n2 {
            margin-right: -0.5rem !important; }
          .mb-md-n2,
          .my-md-n2 {
            margin-bottom: -0.5rem !important; }
          .ml-md-n2,
          .mx-md-n2 {
            margin-left: -0.5rem !important; }
          .m-md-n3 {
            margin: -0.75rem !important; }
          .mt-md-n3,
          .my-md-n3 {
            margin-top: -0.75rem !important; }
          .mr-md-n3,
          .mx-md-n3 {
            margin-right: -0.75rem !important; }
          .mb-md-n3,
          .my-md-n3 {
            margin-bottom: -0.75rem !important; }
          .ml-md-n3,
          .mx-md-n3 {
            margin-left: -0.75rem !important; }
          .m-md-n4 {
            margin: -1rem !important; }
          .mt-md-n4,
          .my-md-n4 {
            margin-top: -1rem !important; }
          .mr-md-n4,
          .mx-md-n4 {
            margin-right: -1rem !important; }
          .mb-md-n4,
          .my-md-n4 {
            margin-bottom: -1rem !important; }
          .ml-md-n4,
          .mx-md-n4 {
            margin-left: -1rem !important; }
          .m-md-n5 {
            margin: -1.5rem !important; }
          .mt-md-n5,
          .my-md-n5 {
            margin-top: -1.5rem !important; }
          .mr-md-n5,
          .mx-md-n5 {
            margin-right: -1.5rem !important; }
          .mb-md-n5,
          .my-md-n5 {
            margin-bottom: -1.5rem !important; }
          .ml-md-n5,
          .mx-md-n5 {
            margin-left: -1.5rem !important; }
          .m-md-n6 {
            margin: -2rem !important; }
          .mt-md-n6,
          .my-md-n6 {
            margin-top: -2rem !important; }
          .mr-md-n6,
          .mx-md-n6 {
            margin-right: -2rem !important; }
          .mb-md-n6,
          .my-md-n6 {
            margin-bottom: -2rem !important; }
          .ml-md-n6,
          .mx-md-n6 {
            margin-left: -2rem !important; }
          .m-md-n7 {
            margin: -3rem !important; }
          .mt-md-n7,
          .my-md-n7 {
            margin-top: -3rem !important; }
          .mr-md-n7,
          .mx-md-n7 {
            margin-right: -3rem !important; }
          .mb-md-n7,
          .my-md-n7 {
            margin-bottom: -3rem !important; }
          .ml-md-n7,
          .mx-md-n7 {
            margin-left: -3rem !important; }
          .m-md-n8 {
            margin: -5rem !important; }
          .mt-md-n8,
          .my-md-n8 {
            margin-top: -5rem !important; }
          .mr-md-n8,
          .mx-md-n8 {
            margin-right: -5rem !important; }
          .mb-md-n8,
          .my-md-n8 {
            margin-bottom: -5rem !important; }
          .ml-md-n8,
          .mx-md-n8 {
            margin-left: -5rem !important; }
          .m-md-n9 {
            margin: -7rem !important; }
          .mt-md-n9,
          .my-md-n9 {
            margin-top: -7rem !important; }
          .mr-md-n9,
          .mx-md-n9 {
            margin-right: -7rem !important; }
          .mb-md-n9,
          .my-md-n9 {
            margin-bottom: -7rem !important; }
          .ml-md-n9,
          .mx-md-n9 {
            margin-left: -7rem !important; }
          .m-md-n10 {
            margin: -9rem !important; }
          .mt-md-n10,
          .my-md-n10 {
            margin-top: -9rem !important; }
          .mr-md-n10,
          .mx-md-n10 {
            margin-right: -9rem !important; }
          .mb-md-n10,
          .my-md-n10 {
            margin-bottom: -9rem !important; }
          .ml-md-n10,
          .mx-md-n10 {
            margin-left: -9rem !important; }
          .m-md-n11 {
            margin: -11rem !important; }
          .mt-md-n11,
          .my-md-n11 {
            margin-top: -11rem !important; }
          .mr-md-n11,
          .mx-md-n11 {
            margin-right: -11rem !important; }
          .mb-md-n11,
          .my-md-n11 {
            margin-bottom: -11rem !important; }
          .ml-md-n11,
          .mx-md-n11 {
            margin-left: -11rem !important; }
          .m-md-n12 {
            margin: -13rem !important; }
          .mt-md-n12,
          .my-md-n12 {
            margin-top: -13rem !important; }
          .mr-md-n12,
          .mx-md-n12 {
            margin-right: -13rem !important; }
          .mb-md-n12,
          .my-md-n12 {
            margin-bottom: -13rem !important; }
          .ml-md-n12,
          .mx-md-n12 {
            margin-left: -13rem !important; }
          .m-md-n13 {
            margin: -16rem !important; }
          .mt-md-n13,
          .my-md-n13 {
            margin-top: -16rem !important; }
          .mr-md-n13,
          .mx-md-n13 {
            margin-right: -16rem !important; }
          .mb-md-n13,
          .my-md-n13 {
            margin-bottom: -16rem !important; }
          .ml-md-n13,
          .mx-md-n13 {
            margin-left: -16rem !important; }
          .m-md-auto {
            margin: auto !important; }
          .mt-md-auto,
          .my-md-auto {
            margin-top: auto !important; }
          .mr-md-auto,
          .mx-md-auto {
            margin-right: auto !important; }
          .mb-md-auto,
          .my-md-auto {
            margin-bottom: auto !important; }
          .ml-md-auto,
          .mx-md-auto {
            margin-left: auto !important; } }

        @media (min-width: 992px) {
          .m-lg-0 {
            margin: 0 !important; }
          .mt-lg-0,
          .my-lg-0 {
            margin-top: 0 !important; }
          .mr-lg-0,
          .mx-lg-0 {
            margin-right: 0 !important; }
          .mb-lg-0,
          .my-lg-0 {
            margin-bottom: 0 !important; }
          .ml-lg-0,
          .mx-lg-0 {
            margin-left: 0 !important; }
          .m-lg-1 {
            margin: 0.25rem !important; }
          .mt-lg-1,
          .my-lg-1 {
            margin-top: 0.25rem !important; }
          .mr-lg-1,
          .mx-lg-1 {
            margin-right: 0.25rem !important; }
          .mb-lg-1,
          .my-lg-1 {
            margin-bottom: 0.25rem !important; }
          .ml-lg-1,
          .mx-lg-1 {
            margin-left: 0.25rem !important; }
          .m-lg-2 {
            margin: 0.5rem !important; }
          .mt-lg-2,
          .my-lg-2 {
            margin-top: 0.5rem !important; }
          .mr-lg-2,
          .mx-lg-2 {
            margin-right: 0.5rem !important; }
          .mb-lg-2,
          .my-lg-2 {
            margin-bottom: 0.5rem !important; }
          .ml-lg-2,
          .mx-lg-2 {
            margin-left: 0.5rem !important; }
          .m-lg-3 {
            margin: 0.75rem !important; }
          .mt-lg-3,
          .my-lg-3 {
            margin-top: 0.75rem !important; }
          .mr-lg-3,
          .mx-lg-3 {
            margin-right: 0.75rem !important; }
          .mb-lg-3,
          .my-lg-3 {
            margin-bottom: 0.75rem !important; }
          .ml-lg-3,
          .mx-lg-3 {
            margin-left: 0.75rem !important; }
          .m-lg-4 {
            margin: 1rem !important; }
          .mt-lg-4,
          .my-lg-4 {
            margin-top: 1rem !important; }
          .mr-lg-4,
          .mx-lg-4 {
            margin-right: 1rem !important; }
          .mb-lg-4,
          .my-lg-4 {
            margin-bottom: 1rem !important; }
          .ml-lg-4,
          .mx-lg-4 {
            margin-left: 1rem !important; }
          .m-lg-5 {
            margin: 1.5rem !important; }
          .mt-lg-5,
          .my-lg-5 {
            margin-top: 1.5rem !important; }
          .mr-lg-5,
          .mx-lg-5 {
            margin-right: 1.5rem !important; }
          .mb-lg-5,
          .my-lg-5 {
            margin-bottom: 1.5rem !important; }
          .ml-lg-5,
          .mx-lg-5 {
            margin-left: 1.5rem !important; }
          .m-lg-6 {
            margin: 2rem !important; }
          .mt-lg-6,
          .my-lg-6 {
            margin-top: 2rem !important; }
          .mr-lg-6,
          .mx-lg-6 {
            margin-right: 2rem !important; }
          .mb-lg-6,
          .my-lg-6 {
            margin-bottom: 2rem !important; }
          .ml-lg-6,
          .mx-lg-6 {
            margin-left: 2rem !important; }
          .m-lg-7 {
            margin: 3rem !important; }
          .mt-lg-7,
          .my-lg-7 {
            margin-top: 3rem !important; }
          .mr-lg-7,
          .mx-lg-7 {
            margin-right: 3rem !important; }
          .mb-lg-7,
          .my-lg-7 {
            margin-bottom: 3rem !important; }
          .ml-lg-7,
          .mx-lg-7 {
            margin-left: 3rem !important; }
          .m-lg-8 {
            margin: 5rem !important; }
          .mt-lg-8,
          .my-lg-8 {
            margin-top: 5rem !important; }
          .mr-lg-8,
          .mx-lg-8 {
            margin-right: 5rem !important; }
          .mb-lg-8,
          .my-lg-8 {
            margin-bottom: 5rem !important; }
          .ml-lg-8,
          .mx-lg-8 {
            margin-left: 5rem !important; }
          .m-lg-9 {
            margin: 7rem !important; }
          .mt-lg-9,
          .my-lg-9 {
            margin-top: 7rem !important; }
          .mr-lg-9,
          .mx-lg-9 {
            margin-right: 7rem !important; }
          .mb-lg-9,
          .my-lg-9 {
            margin-bottom: 7rem !important; }
          .ml-lg-9,
          .mx-lg-9 {
            margin-left: 7rem !important; }
          .m-lg-10 {
            margin: 9rem !important; }
          .mt-lg-10,
          .my-lg-10 {
            margin-top: 9rem !important; }
          .mr-lg-10,
          .mx-lg-10 {
            margin-right: 9rem !important; }
          .mb-lg-10,
          .my-lg-10 {
            margin-bottom: 9rem !important; }
          .ml-lg-10,
          .mx-lg-10 {
            margin-left: 9rem !important; }
          .m-lg-11 {
            margin: 11rem !important; }
          .mt-lg-11,
          .my-lg-11 {
            margin-top: 11rem !important; }
          .mr-lg-11,
          .mx-lg-11 {
            margin-right: 11rem !important; }
          .mb-lg-11,
          .my-lg-11 {
            margin-bottom: 11rem !important; }
          .ml-lg-11,
          .mx-lg-11 {
            margin-left: 11rem !important; }
          .m-lg-12 {
            margin: 13rem !important; }
          .mt-lg-12,
          .my-lg-12 {
            margin-top: 13rem !important; }
          .mr-lg-12,
          .mx-lg-12 {
            margin-right: 13rem !important; }
          .mb-lg-12,
          .my-lg-12 {
            margin-bottom: 13rem !important; }
          .ml-lg-12,
          .mx-lg-12 {
            margin-left: 13rem !important; }
          .m-lg-13 {
            margin: 16rem !important; }
          .mt-lg-13,
          .my-lg-13 {
            margin-top: 16rem !important; }
          .mr-lg-13,
          .mx-lg-13 {
            margin-right: 16rem !important; }
          .mb-lg-13,
          .my-lg-13 {
            margin-bottom: 16rem !important; }
          .ml-lg-13,
          .mx-lg-13 {
            margin-left: 16rem !important; }
          .p-lg-0 {
            padding: 0 !important; }
          .pt-lg-0,
          .py-lg-0 {
            padding-top: 0 !important; }
          .pr-lg-0,
          .px-lg-0 {
            padding-right: 0 !important; }
          .pb-lg-0,
          .py-lg-0 {
            padding-bottom: 0 !important; }
          .pl-lg-0,
          .px-lg-0 {
            padding-left: 0 !important; }
          .p-lg-1 {
            padding: 0.25rem !important; }
          .pt-lg-1,
          .py-lg-1 {
            padding-top: 0.25rem !important; }
          .pr-lg-1,
          .px-lg-1 {
            padding-right: 0.25rem !important; }
          .pb-lg-1,
          .py-lg-1 {
            padding-bottom: 0.25rem !important; }
          .pl-lg-1,
          .px-lg-1 {
            padding-left: 0.25rem !important; }
          .p-lg-2 {
            padding: 0.5rem !important; }
          .pt-lg-2,
          .py-lg-2 {
            padding-top: 0.5rem !important; }
          .pr-lg-2,
          .px-lg-2 {
            padding-right: 0.5rem !important; }
          .pb-lg-2,
          .py-lg-2 {
            padding-bottom: 0.5rem !important; }
          .pl-lg-2,
          .px-lg-2 {
            padding-left: 0.5rem !important; }
          .p-lg-3 {
            padding: 0.75rem !important; }
          .pt-lg-3,
          .py-lg-3 {
            padding-top: 0.75rem !important; }
          .pr-lg-3,
          .px-lg-3 {
            padding-right: 0.75rem !important; }
          .pb-lg-3,
          .py-lg-3 {
            padding-bottom: 0.75rem !important; }
          .pl-lg-3,
          .px-lg-3 {
            padding-left: 0.75rem !important; }
          .p-lg-4 {
            padding: 1rem !important; }
          .pt-lg-4,
          .py-lg-4 {
            padding-top: 1rem !important; }
          .pr-lg-4,
          .px-lg-4 {
            padding-right: 1rem !important; }
          .pb-lg-4,
          .py-lg-4 {
            padding-bottom: 1rem !important; }
          .pl-lg-4,
          .px-lg-4 {
            padding-left: 1rem !important; }
          .p-lg-5 {
            padding: 1.5rem !important; }
          .pt-lg-5,
          .py-lg-5 {
            padding-top: 1.5rem !important; }
          .pr-lg-5,
          .px-lg-5 {
            padding-right: 1.5rem !important; }
          .pb-lg-5,
          .py-lg-5 {
            padding-bottom: 1.5rem !important; }
          .pl-lg-5,
          .px-lg-5 {
            padding-left: 1.5rem !important; }
          .p-lg-6 {
            padding: 2rem !important; }
          .pt-lg-6,
          .py-lg-6 {
            padding-top: 2rem !important; }
          .pr-lg-6,
          .px-lg-6 {
            padding-right: 2rem !important; }
          .pb-lg-6,
          .py-lg-6 {
            padding-bottom: 2rem !important; }
          .pl-lg-6,
          .px-lg-6 {
            padding-left: 2rem !important; }
          .p-lg-7 {
            padding: 3rem !important; }
          .pt-lg-7,
          .py-lg-7 {
            padding-top: 3rem !important; }
          .pr-lg-7,
          .px-lg-7 {
            padding-right: 3rem !important; }
          .pb-lg-7,
          .py-lg-7 {
            padding-bottom: 3rem !important; }
          .pl-lg-7,
          .px-lg-7 {
            padding-left: 3rem !important; }
          .p-lg-8 {
            padding: 5rem !important; }
          .pt-lg-8,
          .py-lg-8 {
            padding-top: 5rem !important; }
          .pr-lg-8,
          .px-lg-8 {
            padding-right: 5rem !important; }
          .pb-lg-8,
          .py-lg-8 {
            padding-bottom: 5rem !important; }
          .pl-lg-8,
          .px-lg-8 {
            padding-left: 5rem !important; }
          .p-lg-9 {
            padding: 7rem !important; }
          .pt-lg-9,
          .py-lg-9 {
            padding-top: 7rem !important; }
          .pr-lg-9,
          .px-lg-9 {
            padding-right: 7rem !important; }
          .pb-lg-9,
          .py-lg-9 {
            padding-bottom: 7rem !important; }
          .pl-lg-9,
          .px-lg-9 {
            padding-left: 7rem !important; }
          .p-lg-10 {
            padding: 9rem !important; }
          .pt-lg-10,
          .py-lg-10 {
            padding-top: 9rem !important; }
          .pr-lg-10,
          .px-lg-10 {
            padding-right: 9rem !important; }
          .pb-lg-10,
          .py-lg-10 {
            padding-bottom: 9rem !important; }
          .pl-lg-10,
          .px-lg-10 {
            padding-left: 9rem !important; }
          .p-lg-11 {
            padding: 11rem !important; }
          .pt-lg-11,
          .py-lg-11 {
            padding-top: 11rem !important; }
          .pr-lg-11,
          .px-lg-11 {
            padding-right: 11rem !important; }
          .pb-lg-11,
          .py-lg-11 {
            padding-bottom: 11rem !important; }
          .pl-lg-11,
          .px-lg-11 {
            padding-left: 11rem !important; }
          .p-lg-12 {
            padding: 13rem !important; }
          .pt-lg-12,
          .py-lg-12 {
            padding-top: 13rem !important; }
          .pr-lg-12,
          .px-lg-12 {
            padding-right: 13rem !important; }
          .pb-lg-12,
          .py-lg-12 {
            padding-bottom: 13rem !important; }
          .pl-lg-12,
          .px-lg-12 {
            padding-left: 13rem !important; }
          .p-lg-13 {
            padding: 16rem !important; }
          .pt-lg-13,
          .py-lg-13 {
            padding-top: 16rem !important; }
          .pr-lg-13,
          .px-lg-13 {
            padding-right: 16rem !important; }
          .pb-lg-13,
          .py-lg-13 {
            padding-bottom: 16rem !important; }
          .pl-lg-13,
          .px-lg-13 {
            padding-left: 16rem !important; }
          .m-lg-n1 {
            margin: -0.25rem !important; }
          .mt-lg-n1,
          .my-lg-n1 {
            margin-top: -0.25rem !important; }
          .mr-lg-n1,
          .mx-lg-n1 {
            margin-right: -0.25rem !important; }
          .mb-lg-n1,
          .my-lg-n1 {
            margin-bottom: -0.25rem !important; }
          .ml-lg-n1,
          .mx-lg-n1 {
            margin-left: -0.25rem !important; }
          .m-lg-n2 {
            margin: -0.5rem !important; }
          .mt-lg-n2,
          .my-lg-n2 {
            margin-top: -0.5rem !important; }
          .mr-lg-n2,
          .mx-lg-n2 {
            margin-right: -0.5rem !important; }
          .mb-lg-n2,
          .my-lg-n2 {
            margin-bottom: -0.5rem !important; }
          .ml-lg-n2,
          .mx-lg-n2 {
            margin-left: -0.5rem !important; }
          .m-lg-n3 {
            margin: -0.75rem !important; }
          .mt-lg-n3,
          .my-lg-n3 {
            margin-top: -0.75rem !important; }
          .mr-lg-n3,
          .mx-lg-n3 {
            margin-right: -0.75rem !important; }
          .mb-lg-n3,
          .my-lg-n3 {
            margin-bottom: -0.75rem !important; }
          .ml-lg-n3,
          .mx-lg-n3 {
            margin-left: -0.75rem !important; }
          .m-lg-n4 {
            margin: -1rem !important; }
          .mt-lg-n4,
          .my-lg-n4 {
            margin-top: -1rem !important; }
          .mr-lg-n4,
          .mx-lg-n4 {
            margin-right: -1rem !important; }
          .mb-lg-n4,
          .my-lg-n4 {
            margin-bottom: -1rem !important; }
          .ml-lg-n4,
          .mx-lg-n4 {
            margin-left: -1rem !important; }
          .m-lg-n5 {
            margin: -1.5rem !important; }
          .mt-lg-n5,
          .my-lg-n5 {
            margin-top: -1.5rem !important; }
          .mr-lg-n5,
          .mx-lg-n5 {
            margin-right: -1.5rem !important; }
          .mb-lg-n5,
          .my-lg-n5 {
            margin-bottom: -1.5rem !important; }
          .ml-lg-n5,
          .mx-lg-n5 {
            margin-left: -1.5rem !important; }
          .m-lg-n6 {
            margin: -2rem !important; }
          .mt-lg-n6,
          .my-lg-n6 {
            margin-top: -2rem !important; }
          .mr-lg-n6,
          .mx-lg-n6 {
            margin-right: -2rem !important; }
          .mb-lg-n6,
          .my-lg-n6 {
            margin-bottom: -2rem !important; }
          .ml-lg-n6,
          .mx-lg-n6 {
            margin-left: -2rem !important; }
          .m-lg-n7 {
            margin: -3rem !important; }
          .mt-lg-n7,
          .my-lg-n7 {
            margin-top: -3rem !important; }
          .mr-lg-n7,
          .mx-lg-n7 {
            margin-right: -3rem !important; }
          .mb-lg-n7,
          .my-lg-n7 {
            margin-bottom: -3rem !important; }
          .ml-lg-n7,
          .mx-lg-n7 {
            margin-left: -3rem !important; }
          .m-lg-n8 {
            margin: -5rem !important; }
          .mt-lg-n8,
          .my-lg-n8 {
            margin-top: -5rem !important; }
          .mr-lg-n8,
          .mx-lg-n8 {
            margin-right: -5rem !important; }
          .mb-lg-n8,
          .my-lg-n8 {
            margin-bottom: -5rem !important; }
          .ml-lg-n8,
          .mx-lg-n8 {
            margin-left: -5rem !important; }
          .m-lg-n9 {
            margin: -7rem !important; }
          .mt-lg-n9,
          .my-lg-n9 {
            margin-top: -7rem !important; }
          .mr-lg-n9,
          .mx-lg-n9 {
            margin-right: -7rem !important; }
          .mb-lg-n9,
          .my-lg-n9 {
            margin-bottom: -7rem !important; }
          .ml-lg-n9,
          .mx-lg-n9 {
            margin-left: -7rem !important; }
          .m-lg-n10 {
            margin: -9rem !important; }
          .mt-lg-n10,
          .my-lg-n10 {
            margin-top: -9rem !important; }
          .mr-lg-n10,
          .mx-lg-n10 {
            margin-right: -9rem !important; }
          .mb-lg-n10,
          .my-lg-n10 {
            margin-bottom: -9rem !important; }
          .ml-lg-n10,
          .mx-lg-n10 {
            margin-left: -9rem !important; }
          .m-lg-n11 {
            margin: -11rem !important; }
          .mt-lg-n11,
          .my-lg-n11 {
            margin-top: -11rem !important; }
          .mr-lg-n11,
          .mx-lg-n11 {
            margin-right: -11rem !important; }
          .mb-lg-n11,
          .my-lg-n11 {
            margin-bottom: -11rem !important; }
          .ml-lg-n11,
          .mx-lg-n11 {
            margin-left: -11rem !important; }
          .m-lg-n12 {
            margin: -13rem !important; }
          .mt-lg-n12,
          .my-lg-n12 {
            margin-top: -13rem !important; }
          .mr-lg-n12,
          .mx-lg-n12 {
            margin-right: -13rem !important; }
          .mb-lg-n12,
          .my-lg-n12 {
            margin-bottom: -13rem !important; }
          .ml-lg-n12,
          .mx-lg-n12 {
            margin-left: -13rem !important; }
          .m-lg-n13 {
            margin: -16rem !important; }
          .mt-lg-n13,
          .my-lg-n13 {
            margin-top: -16rem !important; }
          .mr-lg-n13,
          .mx-lg-n13 {
            margin-right: -16rem !important; }
          .mb-lg-n13,
          .my-lg-n13 {
            margin-bottom: -16rem !important; }
          .ml-lg-n13,
          .mx-lg-n13 {
            margin-left: -16rem !important; }
          .m-lg-auto {
            margin: auto !important; }
          .mt-lg-auto,
          .my-lg-auto {
            margin-top: auto !important; }
          .mr-lg-auto,
          .mx-lg-auto {
            margin-right: auto !important; }
          .mb-lg-auto,
          .my-lg-auto {
            margin-bottom: auto !important; }
          .ml-lg-auto,
          .mx-lg-auto {
            margin-left: auto !important; } }

        @media (min-width: 1200px) {
          .m-xl-0 {
            margin: 0 !important; }
          .mt-xl-0,
          .my-xl-0 {
            margin-top: 0 !important; }
          .mr-xl-0,
          .mx-xl-0 {
            margin-right: 0 !important; }
          .mb-xl-0,
          .my-xl-0 {
            margin-bottom: 0 !important; }
          .ml-xl-0,
          .mx-xl-0 {
            margin-left: 0 !important; }
          .m-xl-1 {
            margin: 0.25rem !important; }
          .mt-xl-1,
          .my-xl-1 {
            margin-top: 0.25rem !important; }
          .mr-xl-1,
          .mx-xl-1 {
            margin-right: 0.25rem !important; }
          .mb-xl-1,
          .my-xl-1 {
            margin-bottom: 0.25rem !important; }
          .ml-xl-1,
          .mx-xl-1 {
            margin-left: 0.25rem !important; }
          .m-xl-2 {
            margin: 0.5rem !important; }
          .mt-xl-2,
          .my-xl-2 {
            margin-top: 0.5rem !important; }
          .mr-xl-2,
          .mx-xl-2 {
            margin-right: 0.5rem !important; }
          .mb-xl-2,
          .my-xl-2 {
            margin-bottom: 0.5rem !important; }
          .ml-xl-2,
          .mx-xl-2 {
            margin-left: 0.5rem !important; }
          .m-xl-3 {
            margin: 0.75rem !important; }
          .mt-xl-3,
          .my-xl-3 {
            margin-top: 0.75rem !important; }
          .mr-xl-3,
          .mx-xl-3 {
            margin-right: 0.75rem !important; }
          .mb-xl-3,
          .my-xl-3 {
            margin-bottom: 0.75rem !important; }
          .ml-xl-3,
          .mx-xl-3 {
            margin-left: 0.75rem !important; }
          .m-xl-4 {
            margin: 1rem !important; }
          .mt-xl-4,
          .my-xl-4 {
            margin-top: 1rem !important; }
          .mr-xl-4,
          .mx-xl-4 {
            margin-right: 1rem !important; }
          .mb-xl-4,
          .my-xl-4 {
            margin-bottom: 1rem !important; }
          .ml-xl-4,
          .mx-xl-4 {
            margin-left: 1rem !important; }
          .m-xl-5 {
            margin: 1.5rem !important; }
          .mt-xl-5,
          .my-xl-5 {
            margin-top: 1.5rem !important; }
          .mr-xl-5,
          .mx-xl-5 {
            margin-right: 1.5rem !important; }
          .mb-xl-5,
          .my-xl-5 {
            margin-bottom: 1.5rem !important; }
          .ml-xl-5,
          .mx-xl-5 {
            margin-left: 1.5rem !important; }
          .m-xl-6 {
            margin: 2rem !important; }
          .mt-xl-6,
          .my-xl-6 {
            margin-top: 2rem !important; }
          .mr-xl-6,
          .mx-xl-6 {
            margin-right: 2rem !important; }
          .mb-xl-6,
          .my-xl-6 {
            margin-bottom: 2rem !important; }
          .ml-xl-6,
          .mx-xl-6 {
            margin-left: 2rem !important; }
          .m-xl-7 {
            margin: 3rem !important; }
          .mt-xl-7,
          .my-xl-7 {
            margin-top: 3rem !important; }
          .mr-xl-7,
          .mx-xl-7 {
            margin-right: 3rem !important; }
          .mb-xl-7,
          .my-xl-7 {
            margin-bottom: 3rem !important; }
          .ml-xl-7,
          .mx-xl-7 {
            margin-left: 3rem !important; }
          .m-xl-8 {
            margin: 5rem !important; }
          .mt-xl-8,
          .my-xl-8 {
            margin-top: 5rem !important; }
          .mr-xl-8,
          .mx-xl-8 {
            margin-right: 5rem !important; }
          .mb-xl-8,
          .my-xl-8 {
            margin-bottom: 5rem !important; }
          .ml-xl-8,
          .mx-xl-8 {
            margin-left: 5rem !important; }
          .m-xl-9 {
            margin: 7rem !important; }
          .mt-xl-9,
          .my-xl-9 {
            margin-top: 7rem !important; }
          .mr-xl-9,
          .mx-xl-9 {
            margin-right: 7rem !important; }
          .mb-xl-9,
          .my-xl-9 {
            margin-bottom: 7rem !important; }
          .ml-xl-9,
          .mx-xl-9 {
            margin-left: 7rem !important; }
          .m-xl-10 {
            margin: 9rem !important; }
          .mt-xl-10,
          .my-xl-10 {
            margin-top: 9rem !important; }
          .mr-xl-10,
          .mx-xl-10 {
            margin-right: 9rem !important; }
          .mb-xl-10,
          .my-xl-10 {
            margin-bottom: 9rem !important; }
          .ml-xl-10,
          .mx-xl-10 {
            margin-left: 9rem !important; }
          .m-xl-11 {
            margin: 11rem !important; }
          .mt-xl-11,
          .my-xl-11 {
            margin-top: 11rem !important; }
          .mr-xl-11,
          .mx-xl-11 {
            margin-right: 11rem !important; }
          .mb-xl-11,
          .my-xl-11 {
            margin-bottom: 11rem !important; }
          .ml-xl-11,
          .mx-xl-11 {
            margin-left: 11rem !important; }
          .m-xl-12 {
            margin: 13rem !important; }
          .mt-xl-12,
          .my-xl-12 {
            margin-top: 13rem !important; }
          .mr-xl-12,
          .mx-xl-12 {
            margin-right: 13rem !important; }
          .mb-xl-12,
          .my-xl-12 {
            margin-bottom: 13rem !important; }
          .ml-xl-12,
          .mx-xl-12 {
            margin-left: 13rem !important; }
          .m-xl-13 {
            margin: 16rem !important; }
          .mt-xl-13,
          .my-xl-13 {
            margin-top: 16rem !important; }
          .mr-xl-13,
          .mx-xl-13 {
            margin-right: 16rem !important; }
          .mb-xl-13,
          .my-xl-13 {
            margin-bottom: 16rem !important; }
          .ml-xl-13,
          .mx-xl-13 {
            margin-left: 16rem !important; }
          .p-xl-0 {
            padding: 0 !important; }
          .pt-xl-0,
          .py-xl-0 {
            padding-top: 0 !important; }
          .pr-xl-0,
          .px-xl-0 {
            padding-right: 0 !important; }
          .pb-xl-0,
          .py-xl-0 {
            padding-bottom: 0 !important; }
          .pl-xl-0,
          .px-xl-0 {
            padding-left: 0 !important; }
          .p-xl-1 {
            padding: 0.25rem !important; }
          .pt-xl-1,
          .py-xl-1 {
            padding-top: 0.25rem !important; }
          .pr-xl-1,
          .px-xl-1 {
            padding-right: 0.25rem !important; }
          .pb-xl-1,
          .py-xl-1 {
            padding-bottom: 0.25rem !important; }
          .pl-xl-1,
          .px-xl-1 {
            padding-left: 0.25rem !important; }
          .p-xl-2 {
            padding: 0.5rem !important; }
          .pt-xl-2,
          .py-xl-2 {
            padding-top: 0.5rem !important; }
          .pr-xl-2,
          .px-xl-2 {
            padding-right: 0.5rem !important; }
          .pb-xl-2,
          .py-xl-2 {
            padding-bottom: 0.5rem !important; }
          .pl-xl-2,
          .px-xl-2 {
            padding-left: 0.5rem !important; }
          .p-xl-3 {
            padding: 0.75rem !important; }
          .pt-xl-3,
          .py-xl-3 {
            padding-top: 0.75rem !important; }
          .pr-xl-3,
          .px-xl-3 {
            padding-right: 0.75rem !important; }
          .pb-xl-3,
          .py-xl-3 {
            padding-bottom: 0.75rem !important; }
          .pl-xl-3,
          .px-xl-3 {
            padding-left: 0.75rem !important; }
          .p-xl-4 {
            padding: 1rem !important; }
          .pt-xl-4,
          .py-xl-4 {
            padding-top: 1rem !important; }
          .pr-xl-4,
          .px-xl-4 {
            padding-right: 1rem !important; }
          .pb-xl-4,
          .py-xl-4 {
            padding-bottom: 1rem !important; }
          .pl-xl-4,
          .px-xl-4 {
            padding-left: 1rem !important; }
          .p-xl-5 {
            padding: 1.5rem !important; }
          .pt-xl-5,
          .py-xl-5 {
            padding-top: 1.5rem !important; }
          .pr-xl-5,
          .px-xl-5 {
            padding-right: 1.5rem !important; }
          .pb-xl-5,
          .py-xl-5 {
            padding-bottom: 1.5rem !important; }
          .pl-xl-5,
          .px-xl-5 {
            padding-left: 1.5rem !important; }
          .p-xl-6 {
            padding: 2rem !important; }
          .pt-xl-6,
          .py-xl-6 {
            padding-top: 2rem !important; }
          .pr-xl-6,
          .px-xl-6 {
            padding-right: 2rem !important; }
          .pb-xl-6,
          .py-xl-6 {
            padding-bottom: 2rem !important; }
          .pl-xl-6,
          .px-xl-6 {
            padding-left: 2rem !important; }
          .p-xl-7 {
            padding: 3rem !important; }
          .pt-xl-7,
          .py-xl-7 {
            padding-top: 3rem !important; }
          .pr-xl-7,
          .px-xl-7 {
            padding-right: 3rem !important; }
          .pb-xl-7,
          .py-xl-7 {
            padding-bottom: 3rem !important; }
          .pl-xl-7,
          .px-xl-7 {
            padding-left: 3rem !important; }
          .p-xl-8 {
            padding: 5rem !important; }
          .pt-xl-8,
          .py-xl-8 {
            padding-top: 5rem !important; }
          .pr-xl-8,
          .px-xl-8 {
            padding-right: 5rem !important; }
          .pb-xl-8,
          .py-xl-8 {
            padding-bottom: 5rem !important; }
          .pl-xl-8,
          .px-xl-8 {
            padding-left: 5rem !important; }
          .p-xl-9 {
            padding: 7rem !important; }
          .pt-xl-9,
          .py-xl-9 {
            padding-top: 7rem !important; }
          .pr-xl-9,
          .px-xl-9 {
            padding-right: 7rem !important; }
          .pb-xl-9,
          .py-xl-9 {
            padding-bottom: 7rem !important; }
          .pl-xl-9,
          .px-xl-9 {
            padding-left: 7rem !important; }
          .p-xl-10 {
            padding: 9rem !important; }
          .pt-xl-10,
          .py-xl-10 {
            padding-top: 9rem !important; }
          .pr-xl-10,
          .px-xl-10 {
            padding-right: 9rem !important; }
          .pb-xl-10,
          .py-xl-10 {
            padding-bottom: 9rem !important; }
          .pl-xl-10,
          .px-xl-10 {
            padding-left: 9rem !important; }
          .p-xl-11 {
            padding: 11rem !important; }
          .pt-xl-11,
          .py-xl-11 {
            padding-top: 11rem !important; }
          .pr-xl-11,
          .px-xl-11 {
            padding-right: 11rem !important; }
          .pb-xl-11,
          .py-xl-11 {
            padding-bottom: 11rem !important; }
          .pl-xl-11,
          .px-xl-11 {
            padding-left: 11rem !important; }
          .p-xl-12 {
            padding: 13rem !important; }
          .pt-xl-12,
          .py-xl-12 {
            padding-top: 13rem !important; }
          .pr-xl-12,
          .px-xl-12 {
            padding-right: 13rem !important; }
          .pb-xl-12,
          .py-xl-12 {
            padding-bottom: 13rem !important; }
          .pl-xl-12,
          .px-xl-12 {
            padding-left: 13rem !important; }
          .p-xl-13 {
            padding: 16rem !important; }
          .pt-xl-13,
          .py-xl-13 {
            padding-top: 16rem !important; }
          .pr-xl-13,
          .px-xl-13 {
            padding-right: 16rem !important; }
          .pb-xl-13,
          .py-xl-13 {
            padding-bottom: 16rem !important; }
          .pl-xl-13,
          .px-xl-13 {
            padding-left: 16rem !important; }
          .m-xl-n1 {
            margin: -0.25rem !important; }
          .mt-xl-n1,
          .my-xl-n1 {
            margin-top: -0.25rem !important; }
          .mr-xl-n1,
          .mx-xl-n1 {
            margin-right: -0.25rem !important; }
          .mb-xl-n1,
          .my-xl-n1 {
            margin-bottom: -0.25rem !important; }
          .ml-xl-n1,
          .mx-xl-n1 {
            margin-left: -0.25rem !important; }
          .m-xl-n2 {
            margin: -0.5rem !important; }
          .mt-xl-n2,
          .my-xl-n2 {
            margin-top: -0.5rem !important; }
          .mr-xl-n2,
          .mx-xl-n2 {
            margin-right: -0.5rem !important; }
          .mb-xl-n2,
          .my-xl-n2 {
            margin-bottom: -0.5rem !important; }
          .ml-xl-n2,
          .mx-xl-n2 {
            margin-left: -0.5rem !important; }
          .m-xl-n3 {
            margin: -0.75rem !important; }
          .mt-xl-n3,
          .my-xl-n3 {
            margin-top: -0.75rem !important; }
          .mr-xl-n3,
          .mx-xl-n3 {
            margin-right: -0.75rem !important; }
          .mb-xl-n3,
          .my-xl-n3 {
            margin-bottom: -0.75rem !important; }
          .ml-xl-n3,
          .mx-xl-n3 {
            margin-left: -0.75rem !important; }
          .m-xl-n4 {
            margin: -1rem !important; }
          .mt-xl-n4,
          .my-xl-n4 {
            margin-top: -1rem !important; }
          .mr-xl-n4,
          .mx-xl-n4 {
            margin-right: -1rem !important; }
          .mb-xl-n4,
          .my-xl-n4 {
            margin-bottom: -1rem !important; }
          .ml-xl-n4,
          .mx-xl-n4 {
            margin-left: -1rem !important; }
          .m-xl-n5 {
            margin: -1.5rem !important; }
          .mt-xl-n5,
          .my-xl-n5 {
            margin-top: -1.5rem !important; }
          .mr-xl-n5,
          .mx-xl-n5 {
            margin-right: -1.5rem !important; }
          .mb-xl-n5,
          .my-xl-n5 {
            margin-bottom: -1.5rem !important; }
          .ml-xl-n5,
          .mx-xl-n5 {
            margin-left: -1.5rem !important; }
          .m-xl-n6 {
            margin: -2rem !important; }
          .mt-xl-n6,
          .my-xl-n6 {
            margin-top: -2rem !important; }
          .mr-xl-n6,
          .mx-xl-n6 {
            margin-right: -2rem !important; }
          .mb-xl-n6,
          .my-xl-n6 {
            margin-bottom: -2rem !important; }
          .ml-xl-n6,
          .mx-xl-n6 {
            margin-left: -2rem !important; }
          .m-xl-n7 {
            margin: -3rem !important; }
          .mt-xl-n7,
          .my-xl-n7 {
            margin-top: -3rem !important; }
          .mr-xl-n7,
          .mx-xl-n7 {
            margin-right: -3rem !important; }
          .mb-xl-n7,
          .my-xl-n7 {
            margin-bottom: -3rem !important; }
          .ml-xl-n7,
          .mx-xl-n7 {
            margin-left: -3rem !important; }
          .m-xl-n8 {
            margin: -5rem !important; }
          .mt-xl-n8,
          .my-xl-n8 {
            margin-top: -5rem !important; }
          .mr-xl-n8,
          .mx-xl-n8 {
            margin-right: -5rem !important; }
          .mb-xl-n8,
          .my-xl-n8 {
            margin-bottom: -5rem !important; }
          .ml-xl-n8,
          .mx-xl-n8 {
            margin-left: -5rem !important; }
          .m-xl-n9 {
            margin: -7rem !important; }
          .mt-xl-n9,
          .my-xl-n9 {
            margin-top: -7rem !important; }
          .mr-xl-n9,
          .mx-xl-n9 {
            margin-right: -7rem !important; }
          .mb-xl-n9,
          .my-xl-n9 {
            margin-bottom: -7rem !important; }
          .ml-xl-n9,
          .mx-xl-n9 {
            margin-left: -7rem !important; }
          .m-xl-n10 {
            margin: -9rem !important; }
          .mt-xl-n10,
          .my-xl-n10 {
            margin-top: -9rem !important; }
          .mr-xl-n10,
          .mx-xl-n10 {
            margin-right: -9rem !important; }
          .mb-xl-n10,
          .my-xl-n10 {
            margin-bottom: -9rem !important; }
          .ml-xl-n10,
          .mx-xl-n10 {
            margin-left: -9rem !important; }
          .m-xl-n11 {
            margin: -11rem !important; }
          .mt-xl-n11,
          .my-xl-n11 {
            margin-top: -11rem !important; }
          .mr-xl-n11,
          .mx-xl-n11 {
            margin-right: -11rem !important; }
          .mb-xl-n11,
          .my-xl-n11 {
            margin-bottom: -11rem !important; }
          .ml-xl-n11,
          .mx-xl-n11 {
            margin-left: -11rem !important; }
          .m-xl-n12 {
            margin: -13rem !important; }
          .mt-xl-n12,
          .my-xl-n12 {
            margin-top: -13rem !important; }
          .mr-xl-n12,
          .mx-xl-n12 {
            margin-right: -13rem !important; }
          .mb-xl-n12,
          .my-xl-n12 {
            margin-bottom: -13rem !important; }
          .ml-xl-n12,
          .mx-xl-n12 {
            margin-left: -13rem !important; }
          .m-xl-n13 {
            margin: -16rem !important; }
          .mt-xl-n13,
          .my-xl-n13 {
            margin-top: -16rem !important; }
          .mr-xl-n13,
          .mx-xl-n13 {
            margin-right: -16rem !important; }
          .mb-xl-n13,
          .my-xl-n13 {
            margin-bottom: -16rem !important; }
          .ml-xl-n13,
          .mx-xl-n13 {
            margin-left: -16rem !important; }
          .m-xl-auto {
            margin: auto !important; }
          .mt-xl-auto,
          .my-xl-auto {
            margin-top: auto !important; }
          .mr-xl-auto,
          .mx-xl-auto {
            margin-right: auto !important; }
          .mb-xl-auto,
          .my-xl-auto {
            margin-bottom: auto !important; }
          .ml-xl-auto,
          .mx-xl-auto {
            margin-left: auto !important; } }

        .text-monospace {
          font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }

        .text-justify {
          text-align: justify !important; }

        .text-wrap {
          white-space: normal !important; }

        .text-nowrap {
          white-space: nowrap !important; }

        .text-truncate {
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap; }

        .text-left {
          text-align: left !important; }

        .text-right {
          text-align: right !important; }

        .text-center {
          text-align: center !important; }

        @media (min-width: 576px) {
          .text-sm-left {
            text-align: left !important; }
          .text-sm-right {
            text-align: right !important; }
          .text-sm-center {
            text-align: center !important; } }

        @media (min-width: 768px) {
          .text-md-left {
            text-align: left !important; }
          .text-md-right {
            text-align: right !important; }
          .text-md-center {
            text-align: center !important; } }

        @media (min-width: 992px) {
          .text-lg-left {
            text-align: left !important; }
          .text-lg-right {
            text-align: right !important; }
          .text-lg-center {
            text-align: center !important; } }

        @media (min-width: 1200px) {
          .text-xl-left {
            text-align: left !important; }
          .text-xl-right {
            text-align: right !important; }
          .text-xl-center {
            text-align: center !important; } }

        .text-lowercase {
          text-transform: lowercase !important; }

        .text-uppercase {
          text-transform: uppercase !important; }

        .text-capitalize {
          text-transform: capitalize !important; }

        .font-weight-light {
          font-weight: 300 !important; }

        .font-weight-lighter {
          font-weight: lighter !important; }

        .font-weight-normal {
          font-weight: 400 !important; }

        .font-weight-bold {
          font-weight: 600 !important; }

        .font-weight-bolder {
          font-weight: bolder !important; }

        .font-italic {
          font-style: italic !important; }

        .text-white {
          color: #fff !important; }

        .text-primary {
          color: #50a1ff !important; }

        a.text-primary:hover, a.text-primary:focus {
          color: #0478ff !important; }

        .text-secondary {
          color: #e9ecf0 !important; }

        a.text-secondary:hover, a.text-secondary:focus {
          color: #bcc5d1 !important; }

        .text-success {
          color: #3cd458 !important; }

        a.text-success:hover, a.text-success:focus {
          color: #23a03a !important; }

        .text-info {
          color: #926dde !important; }

        a.text-info:hover, a.text-info:focus {
          color: #642fd0 !important; }

        .text-warning {
          color: #ffba00 !important; }

        a.text-warning:hover, a.text-warning:focus {
          color: #b38200 !important; }

        .text-danger {
          color: #ff4954 !important; }

        a.text-danger:hover, a.text-danger:focus {
          color: #fc000f !important; }

        .text-light {
          color: #f8f9fa !important; }

        a.text-light:hover, a.text-light:focus {
          color: #cbd3da !important; }

        .text-dark {
          color: #191919 !important; }

        a.text-dark:hover, a.text-dark:focus {
          color: black !important; }

        .text-body {
          color: #757575 !important; }

        .text-muted {
          color: #868e96 !important; }

        .text-black-50 {
          color: rgba(0, 0, 0, 0.5) !important; }

        .text-white-50 {
          color: rgba(255, 255, 255, 0.5) !important; }

        .text-hide {
          font: 0/0 a;
          color: transparent;
          text-shadow: none;
          background-color: transparent;
          border: 0; }

        .text-decoration-none {
          text-decoration: none !important; }

        .text-reset {
          color: inherit !important; }

        .visible {
          visibility: visible !important; }

        .invisible {
          visibility: hidden !important; }

        @media print {
          *,
          *::before,
          *::after {
            text-shadow: none !important;
            -webkit-box-shadow: none !important;
                    box-shadow: none !important; }
          a:not(.btn) {
            text-decoration: underline; }
          abbr[title]::after {
            content: " (" attr(title) ")"; }
          pre {
            white-space: pre-wrap !important; }
          pre,
          blockquote {
            border: 1px solid #adb5bd;
            page-break-inside: avoid; }
          thead {
            display: table-header-group; }
          tr,
          img {
            page-break-inside: avoid; }
          p,
          h2,
          h3 {
            orphans: 3;
            widows: 3; }
          h2,
          h3 {
            page-break-after: avoid; }
          @page {
            size: a3; }
          body {
            min-width: 992px !important; }
          .container {
            min-width: 992px !important; }
          .navbar {
            display: none; }
          .badge {
            border: 1px solid #000; }
          .table {
            border-collapse: collapse !important; }
            .table td,
            .table th {
              background-color: #fff !important; }
          .table-bordered th,
          .table-bordered td {
            border: 1px solid #dee2e6 !important; }
          .table-dark {
            color: inherit; }
            .table-dark th,
            .table-dark td,
            .table-dark thead th,
            .table-dark tbody + tbody {
              border-color: #f1f2f3; }
          .table .thead-dark th {
            color: inherit;
            border-color: #f1f2f3; } }

        body[data-aos-duration='50'] [data-aos], [data-aos][data-aos][data-aos-duration='50'] {
          -webkit-transition-duration: 50ms;
                  transition-duration: 50ms; }

        body[data-aos-delay='50'] [data-aos], [data-aos][data-aos][data-aos-delay='50'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='50'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='50'].aos-animate {
            -webkit-transition-delay: 50ms;
                    transition-delay: 50ms; }

        body[data-aos-duration='100'] [data-aos], [data-aos][data-aos][data-aos-duration='100'] {
          -webkit-transition-duration: 100ms;
                  transition-duration: 100ms; }

        body[data-aos-delay='100'] [data-aos], [data-aos][data-aos][data-aos-delay='100'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='100'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='100'].aos-animate {
            -webkit-transition-delay: 100ms;
                    transition-delay: 100ms; }

        body[data-aos-duration='150'] [data-aos], [data-aos][data-aos][data-aos-duration='150'] {
          -webkit-transition-duration: 150ms;
                  transition-duration: 150ms; }

        body[data-aos-delay='150'] [data-aos], [data-aos][data-aos][data-aos-delay='150'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='150'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='150'].aos-animate {
            -webkit-transition-delay: 150ms;
                    transition-delay: 150ms; }

        body[data-aos-duration='200'] [data-aos], [data-aos][data-aos][data-aos-duration='200'] {
          -webkit-transition-duration: 200ms;
                  transition-duration: 200ms; }

        body[data-aos-delay='200'] [data-aos], [data-aos][data-aos][data-aos-delay='200'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='200'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='200'].aos-animate {
            -webkit-transition-delay: 200ms;
                    transition-delay: 200ms; }

        body[data-aos-duration='250'] [data-aos], [data-aos][data-aos][data-aos-duration='250'] {
          -webkit-transition-duration: 250ms;
                  transition-duration: 250ms; }

        body[data-aos-delay='250'] [data-aos], [data-aos][data-aos][data-aos-delay='250'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='250'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='250'].aos-animate {
            -webkit-transition-delay: 250ms;
                    transition-delay: 250ms; }

        body[data-aos-duration='300'] [data-aos], [data-aos][data-aos][data-aos-duration='300'] {
          -webkit-transition-duration: 300ms;
                  transition-duration: 300ms; }

        body[data-aos-delay='300'] [data-aos], [data-aos][data-aos][data-aos-delay='300'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='300'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='300'].aos-animate {
            -webkit-transition-delay: 300ms;
                    transition-delay: 300ms; }

        body[data-aos-duration='350'] [data-aos], [data-aos][data-aos][data-aos-duration='350'] {
          -webkit-transition-duration: 350ms;
                  transition-duration: 350ms; }

        body[data-aos-delay='350'] [data-aos], [data-aos][data-aos][data-aos-delay='350'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='350'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='350'].aos-animate {
            -webkit-transition-delay: 350ms;
                    transition-delay: 350ms; }

        body[data-aos-duration='400'] [data-aos], [data-aos][data-aos][data-aos-duration='400'] {
          -webkit-transition-duration: 400ms;
                  transition-duration: 400ms; }

        body[data-aos-delay='400'] [data-aos], [data-aos][data-aos][data-aos-delay='400'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='400'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='400'].aos-animate {
            -webkit-transition-delay: 400ms;
                    transition-delay: 400ms; }

        body[data-aos-duration='450'] [data-aos], [data-aos][data-aos][data-aos-duration='450'] {
          -webkit-transition-duration: 450ms;
                  transition-duration: 450ms; }

        body[data-aos-delay='450'] [data-aos], [data-aos][data-aos][data-aos-delay='450'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='450'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='450'].aos-animate {
            -webkit-transition-delay: 450ms;
                    transition-delay: 450ms; }

        body[data-aos-duration='500'] [data-aos], [data-aos][data-aos][data-aos-duration='500'] {
          -webkit-transition-duration: 500ms;
                  transition-duration: 500ms; }

        body[data-aos-delay='500'] [data-aos], [data-aos][data-aos][data-aos-delay='500'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='500'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='500'].aos-animate {
            -webkit-transition-delay: 500ms;
                    transition-delay: 500ms; }

        body[data-aos-duration='550'] [data-aos], [data-aos][data-aos][data-aos-duration='550'] {
          -webkit-transition-duration: 550ms;
                  transition-duration: 550ms; }

        body[data-aos-delay='550'] [data-aos], [data-aos][data-aos][data-aos-delay='550'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='550'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='550'].aos-animate {
            -webkit-transition-delay: 550ms;
                    transition-delay: 550ms; }

        body[data-aos-duration='600'] [data-aos], [data-aos][data-aos][data-aos-duration='600'] {
          -webkit-transition-duration: 600ms;
                  transition-duration: 600ms; }

        body[data-aos-delay='600'] [data-aos], [data-aos][data-aos][data-aos-delay='600'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='600'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='600'].aos-animate {
            -webkit-transition-delay: 600ms;
                    transition-delay: 600ms; }

        body[data-aos-duration='650'] [data-aos], [data-aos][data-aos][data-aos-duration='650'] {
          -webkit-transition-duration: 650ms;
                  transition-duration: 650ms; }

        body[data-aos-delay='650'] [data-aos], [data-aos][data-aos][data-aos-delay='650'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='650'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='650'].aos-animate {
            -webkit-transition-delay: 650ms;
                    transition-delay: 650ms; }

        body[data-aos-duration='700'] [data-aos], [data-aos][data-aos][data-aos-duration='700'] {
          -webkit-transition-duration: 700ms;
                  transition-duration: 700ms; }

        body[data-aos-delay='700'] [data-aos], [data-aos][data-aos][data-aos-delay='700'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='700'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='700'].aos-animate {
            -webkit-transition-delay: 700ms;
                    transition-delay: 700ms; }

        body[data-aos-duration='750'] [data-aos], [data-aos][data-aos][data-aos-duration='750'] {
          -webkit-transition-duration: 750ms;
                  transition-duration: 750ms; }

        body[data-aos-delay='750'] [data-aos], [data-aos][data-aos][data-aos-delay='750'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='750'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='750'].aos-animate {
            -webkit-transition-delay: 750ms;
                    transition-delay: 750ms; }

        body[data-aos-duration='800'] [data-aos], [data-aos][data-aos][data-aos-duration='800'] {
          -webkit-transition-duration: 800ms;
                  transition-duration: 800ms; }

        body[data-aos-delay='800'] [data-aos], [data-aos][data-aos][data-aos-delay='800'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='800'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='800'].aos-animate {
            -webkit-transition-delay: 800ms;
                    transition-delay: 800ms; }

        body[data-aos-duration='850'] [data-aos], [data-aos][data-aos][data-aos-duration='850'] {
          -webkit-transition-duration: 850ms;
                  transition-duration: 850ms; }

        body[data-aos-delay='850'] [data-aos], [data-aos][data-aos][data-aos-delay='850'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='850'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='850'].aos-animate {
            -webkit-transition-delay: 850ms;
                    transition-delay: 850ms; }

        body[data-aos-duration='900'] [data-aos], [data-aos][data-aos][data-aos-duration='900'] {
          -webkit-transition-duration: 900ms;
                  transition-duration: 900ms; }

        body[data-aos-delay='900'] [data-aos], [data-aos][data-aos][data-aos-delay='900'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='900'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='900'].aos-animate {
            -webkit-transition-delay: 900ms;
                    transition-delay: 900ms; }

        body[data-aos-duration='950'] [data-aos], [data-aos][data-aos][data-aos-duration='950'] {
          -webkit-transition-duration: 950ms;
                  transition-duration: 950ms; }

        body[data-aos-delay='950'] [data-aos], [data-aos][data-aos][data-aos-delay='950'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='950'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='950'].aos-animate {
            -webkit-transition-delay: 950ms;
                    transition-delay: 950ms; }

        body[data-aos-duration='1000'] [data-aos], [data-aos][data-aos][data-aos-duration='1000'] {
          -webkit-transition-duration: 1000ms;
                  transition-duration: 1000ms; }

        body[data-aos-delay='1000'] [data-aos], [data-aos][data-aos][data-aos-delay='1000'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1000'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1000'].aos-animate {
            -webkit-transition-delay: 1000ms;
                    transition-delay: 1000ms; }

        body[data-aos-duration='1050'] [data-aos], [data-aos][data-aos][data-aos-duration='1050'] {
          -webkit-transition-duration: 1050ms;
                  transition-duration: 1050ms; }

        body[data-aos-delay='1050'] [data-aos], [data-aos][data-aos][data-aos-delay='1050'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1050'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1050'].aos-animate {
            -webkit-transition-delay: 1050ms;
                    transition-delay: 1050ms; }

        body[data-aos-duration='1100'] [data-aos], [data-aos][data-aos][data-aos-duration='1100'] {
          -webkit-transition-duration: 1100ms;
                  transition-duration: 1100ms; }

        body[data-aos-delay='1100'] [data-aos], [data-aos][data-aos][data-aos-delay='1100'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1100'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1100'].aos-animate {
            -webkit-transition-delay: 1100ms;
                    transition-delay: 1100ms; }

        body[data-aos-duration='1150'] [data-aos], [data-aos][data-aos][data-aos-duration='1150'] {
          -webkit-transition-duration: 1150ms;
                  transition-duration: 1150ms; }

        body[data-aos-delay='1150'] [data-aos], [data-aos][data-aos][data-aos-delay='1150'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1150'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1150'].aos-animate {
            -webkit-transition-delay: 1150ms;
                    transition-delay: 1150ms; }

        body[data-aos-duration='1200'] [data-aos], [data-aos][data-aos][data-aos-duration='1200'] {
          -webkit-transition-duration: 1200ms;
                  transition-duration: 1200ms; }

        body[data-aos-delay='1200'] [data-aos], [data-aos][data-aos][data-aos-delay='1200'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1200'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1200'].aos-animate {
            -webkit-transition-delay: 1200ms;
                    transition-delay: 1200ms; }

        body[data-aos-duration='1250'] [data-aos], [data-aos][data-aos][data-aos-duration='1250'] {
          -webkit-transition-duration: 1250ms;
                  transition-duration: 1250ms; }

        body[data-aos-delay='1250'] [data-aos], [data-aos][data-aos][data-aos-delay='1250'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1250'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1250'].aos-animate {
            -webkit-transition-delay: 1250ms;
                    transition-delay: 1250ms; }

        body[data-aos-duration='1300'] [data-aos], [data-aos][data-aos][data-aos-duration='1300'] {
          -webkit-transition-duration: 1300ms;
                  transition-duration: 1300ms; }

        body[data-aos-delay='1300'] [data-aos], [data-aos][data-aos][data-aos-delay='1300'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1300'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1300'].aos-animate {
            -webkit-transition-delay: 1300ms;
                    transition-delay: 1300ms; }

        body[data-aos-duration='1350'] [data-aos], [data-aos][data-aos][data-aos-duration='1350'] {
          -webkit-transition-duration: 1350ms;
                  transition-duration: 1350ms; }

        body[data-aos-delay='1350'] [data-aos], [data-aos][data-aos][data-aos-delay='1350'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1350'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1350'].aos-animate {
            -webkit-transition-delay: 1350ms;
                    transition-delay: 1350ms; }

        body[data-aos-duration='1400'] [data-aos], [data-aos][data-aos][data-aos-duration='1400'] {
          -webkit-transition-duration: 1400ms;
                  transition-duration: 1400ms; }

        body[data-aos-delay='1400'] [data-aos], [data-aos][data-aos][data-aos-delay='1400'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1400'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1400'].aos-animate {
            -webkit-transition-delay: 1400ms;
                    transition-delay: 1400ms; }

        body[data-aos-duration='1450'] [data-aos], [data-aos][data-aos][data-aos-duration='1450'] {
          -webkit-transition-duration: 1450ms;
                  transition-duration: 1450ms; }

        body[data-aos-delay='1450'] [data-aos], [data-aos][data-aos][data-aos-delay='1450'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1450'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1450'].aos-animate {
            -webkit-transition-delay: 1450ms;
                    transition-delay: 1450ms; }

        body[data-aos-duration='1500'] [data-aos], [data-aos][data-aos][data-aos-duration='1500'] {
          -webkit-transition-duration: 1500ms;
                  transition-duration: 1500ms; }

        body[data-aos-delay='1500'] [data-aos], [data-aos][data-aos][data-aos-delay='1500'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1500'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1500'].aos-animate {
            -webkit-transition-delay: 1500ms;
                    transition-delay: 1500ms; }

        body[data-aos-duration='1550'] [data-aos], [data-aos][data-aos][data-aos-duration='1550'] {
          -webkit-transition-duration: 1550ms;
                  transition-duration: 1550ms; }

        body[data-aos-delay='1550'] [data-aos], [data-aos][data-aos][data-aos-delay='1550'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1550'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1550'].aos-animate {
            -webkit-transition-delay: 1550ms;
                    transition-delay: 1550ms; }

        body[data-aos-duration='1600'] [data-aos], [data-aos][data-aos][data-aos-duration='1600'] {
          -webkit-transition-duration: 1600ms;
                  transition-duration: 1600ms; }

        body[data-aos-delay='1600'] [data-aos], [data-aos][data-aos][data-aos-delay='1600'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1600'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1600'].aos-animate {
            -webkit-transition-delay: 1600ms;
                    transition-delay: 1600ms; }

        body[data-aos-duration='1650'] [data-aos], [data-aos][data-aos][data-aos-duration='1650'] {
          -webkit-transition-duration: 1650ms;
                  transition-duration: 1650ms; }

        body[data-aos-delay='1650'] [data-aos], [data-aos][data-aos][data-aos-delay='1650'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1650'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1650'].aos-animate {
            -webkit-transition-delay: 1650ms;
                    transition-delay: 1650ms; }

        body[data-aos-duration='1700'] [data-aos], [data-aos][data-aos][data-aos-duration='1700'] {
          -webkit-transition-duration: 1700ms;
                  transition-duration: 1700ms; }

        body[data-aos-delay='1700'] [data-aos], [data-aos][data-aos][data-aos-delay='1700'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1700'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1700'].aos-animate {
            -webkit-transition-delay: 1700ms;
                    transition-delay: 1700ms; }

        body[data-aos-duration='1750'] [data-aos], [data-aos][data-aos][data-aos-duration='1750'] {
          -webkit-transition-duration: 1750ms;
                  transition-duration: 1750ms; }

        body[data-aos-delay='1750'] [data-aos], [data-aos][data-aos][data-aos-delay='1750'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1750'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1750'].aos-animate {
            -webkit-transition-delay: 1750ms;
                    transition-delay: 1750ms; }

        body[data-aos-duration='1800'] [data-aos], [data-aos][data-aos][data-aos-duration='1800'] {
          -webkit-transition-duration: 1800ms;
                  transition-duration: 1800ms; }

        body[data-aos-delay='1800'] [data-aos], [data-aos][data-aos][data-aos-delay='1800'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1800'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1800'].aos-animate {
            -webkit-transition-delay: 1800ms;
                    transition-delay: 1800ms; }

        body[data-aos-duration='1850'] [data-aos], [data-aos][data-aos][data-aos-duration='1850'] {
          -webkit-transition-duration: 1850ms;
                  transition-duration: 1850ms; }

        body[data-aos-delay='1850'] [data-aos], [data-aos][data-aos][data-aos-delay='1850'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1850'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1850'].aos-animate {
            -webkit-transition-delay: 1850ms;
                    transition-delay: 1850ms; }

        body[data-aos-duration='1900'] [data-aos], [data-aos][data-aos][data-aos-duration='1900'] {
          -webkit-transition-duration: 1900ms;
                  transition-duration: 1900ms; }

        body[data-aos-delay='1900'] [data-aos], [data-aos][data-aos][data-aos-delay='1900'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1900'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1900'].aos-animate {
            -webkit-transition-delay: 1900ms;
                    transition-delay: 1900ms; }

        body[data-aos-duration='1950'] [data-aos], [data-aos][data-aos][data-aos-duration='1950'] {
          -webkit-transition-duration: 1950ms;
                  transition-duration: 1950ms; }

        body[data-aos-delay='1950'] [data-aos], [data-aos][data-aos][data-aos-delay='1950'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='1950'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='1950'].aos-animate {
            -webkit-transition-delay: 1950ms;
                    transition-delay: 1950ms; }

        body[data-aos-duration='2000'] [data-aos], [data-aos][data-aos][data-aos-duration='2000'] {
          -webkit-transition-duration: 2000ms;
                  transition-duration: 2000ms; }

        body[data-aos-delay='2000'] [data-aos], [data-aos][data-aos][data-aos-delay='2000'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2000'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2000'].aos-animate {
            -webkit-transition-delay: 2000ms;
                    transition-delay: 2000ms; }

        body[data-aos-duration='2050'] [data-aos], [data-aos][data-aos][data-aos-duration='2050'] {
          -webkit-transition-duration: 2050ms;
                  transition-duration: 2050ms; }

        body[data-aos-delay='2050'] [data-aos], [data-aos][data-aos][data-aos-delay='2050'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2050'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2050'].aos-animate {
            -webkit-transition-delay: 2050ms;
                    transition-delay: 2050ms; }

        body[data-aos-duration='2100'] [data-aos], [data-aos][data-aos][data-aos-duration='2100'] {
          -webkit-transition-duration: 2100ms;
                  transition-duration: 2100ms; }

        body[data-aos-delay='2100'] [data-aos], [data-aos][data-aos][data-aos-delay='2100'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2100'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2100'].aos-animate {
            -webkit-transition-delay: 2100ms;
                    transition-delay: 2100ms; }

        body[data-aos-duration='2150'] [data-aos], [data-aos][data-aos][data-aos-duration='2150'] {
          -webkit-transition-duration: 2150ms;
                  transition-duration: 2150ms; }

        body[data-aos-delay='2150'] [data-aos], [data-aos][data-aos][data-aos-delay='2150'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2150'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2150'].aos-animate {
            -webkit-transition-delay: 2150ms;
                    transition-delay: 2150ms; }

        body[data-aos-duration='2200'] [data-aos], [data-aos][data-aos][data-aos-duration='2200'] {
          -webkit-transition-duration: 2200ms;
                  transition-duration: 2200ms; }

        body[data-aos-delay='2200'] [data-aos], [data-aos][data-aos][data-aos-delay='2200'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2200'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2200'].aos-animate {
            -webkit-transition-delay: 2200ms;
                    transition-delay: 2200ms; }

        body[data-aos-duration='2250'] [data-aos], [data-aos][data-aos][data-aos-duration='2250'] {
          -webkit-transition-duration: 2250ms;
                  transition-duration: 2250ms; }

        body[data-aos-delay='2250'] [data-aos], [data-aos][data-aos][data-aos-delay='2250'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2250'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2250'].aos-animate {
            -webkit-transition-delay: 2250ms;
                    transition-delay: 2250ms; }

        body[data-aos-duration='2300'] [data-aos], [data-aos][data-aos][data-aos-duration='2300'] {
          -webkit-transition-duration: 2300ms;
                  transition-duration: 2300ms; }

        body[data-aos-delay='2300'] [data-aos], [data-aos][data-aos][data-aos-delay='2300'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2300'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2300'].aos-animate {
            -webkit-transition-delay: 2300ms;
                    transition-delay: 2300ms; }

        body[data-aos-duration='2350'] [data-aos], [data-aos][data-aos][data-aos-duration='2350'] {
          -webkit-transition-duration: 2350ms;
                  transition-duration: 2350ms; }

        body[data-aos-delay='2350'] [data-aos], [data-aos][data-aos][data-aos-delay='2350'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2350'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2350'].aos-animate {
            -webkit-transition-delay: 2350ms;
                    transition-delay: 2350ms; }

        body[data-aos-duration='2400'] [data-aos], [data-aos][data-aos][data-aos-duration='2400'] {
          -webkit-transition-duration: 2400ms;
                  transition-duration: 2400ms; }

        body[data-aos-delay='2400'] [data-aos], [data-aos][data-aos][data-aos-delay='2400'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2400'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2400'].aos-animate {
            -webkit-transition-delay: 2400ms;
                    transition-delay: 2400ms; }

        body[data-aos-duration='2450'] [data-aos], [data-aos][data-aos][data-aos-duration='2450'] {
          -webkit-transition-duration: 2450ms;
                  transition-duration: 2450ms; }

        body[data-aos-delay='2450'] [data-aos], [data-aos][data-aos][data-aos-delay='2450'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2450'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2450'].aos-animate {
            -webkit-transition-delay: 2450ms;
                    transition-delay: 2450ms; }

        body[data-aos-duration='2500'] [data-aos], [data-aos][data-aos][data-aos-duration='2500'] {
          -webkit-transition-duration: 2500ms;
                  transition-duration: 2500ms; }

        body[data-aos-delay='2500'] [data-aos], [data-aos][data-aos][data-aos-delay='2500'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2500'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2500'].aos-animate {
            -webkit-transition-delay: 2500ms;
                    transition-delay: 2500ms; }

        body[data-aos-duration='2550'] [data-aos], [data-aos][data-aos][data-aos-duration='2550'] {
          -webkit-transition-duration: 2550ms;
                  transition-duration: 2550ms; }

        body[data-aos-delay='2550'] [data-aos], [data-aos][data-aos][data-aos-delay='2550'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2550'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2550'].aos-animate {
            -webkit-transition-delay: 2550ms;
                    transition-delay: 2550ms; }

        body[data-aos-duration='2600'] [data-aos], [data-aos][data-aos][data-aos-duration='2600'] {
          -webkit-transition-duration: 2600ms;
                  transition-duration: 2600ms; }

        body[data-aos-delay='2600'] [data-aos], [data-aos][data-aos][data-aos-delay='2600'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2600'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2600'].aos-animate {
            -webkit-transition-delay: 2600ms;
                    transition-delay: 2600ms; }

        body[data-aos-duration='2650'] [data-aos], [data-aos][data-aos][data-aos-duration='2650'] {
          -webkit-transition-duration: 2650ms;
                  transition-duration: 2650ms; }

        body[data-aos-delay='2650'] [data-aos], [data-aos][data-aos][data-aos-delay='2650'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2650'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2650'].aos-animate {
            -webkit-transition-delay: 2650ms;
                    transition-delay: 2650ms; }

        body[data-aos-duration='2700'] [data-aos], [data-aos][data-aos][data-aos-duration='2700'] {
          -webkit-transition-duration: 2700ms;
                  transition-duration: 2700ms; }

        body[data-aos-delay='2700'] [data-aos], [data-aos][data-aos][data-aos-delay='2700'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2700'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2700'].aos-animate {
            -webkit-transition-delay: 2700ms;
                    transition-delay: 2700ms; }

        body[data-aos-duration='2750'] [data-aos], [data-aos][data-aos][data-aos-duration='2750'] {
          -webkit-transition-duration: 2750ms;
                  transition-duration: 2750ms; }

        body[data-aos-delay='2750'] [data-aos], [data-aos][data-aos][data-aos-delay='2750'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2750'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2750'].aos-animate {
            -webkit-transition-delay: 2750ms;
                    transition-delay: 2750ms; }

        body[data-aos-duration='2800'] [data-aos], [data-aos][data-aos][data-aos-duration='2800'] {
          -webkit-transition-duration: 2800ms;
                  transition-duration: 2800ms; }

        body[data-aos-delay='2800'] [data-aos], [data-aos][data-aos][data-aos-delay='2800'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2800'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2800'].aos-animate {
            -webkit-transition-delay: 2800ms;
                    transition-delay: 2800ms; }

        body[data-aos-duration='2850'] [data-aos], [data-aos][data-aos][data-aos-duration='2850'] {
          -webkit-transition-duration: 2850ms;
                  transition-duration: 2850ms; }

        body[data-aos-delay='2850'] [data-aos], [data-aos][data-aos][data-aos-delay='2850'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2850'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2850'].aos-animate {
            -webkit-transition-delay: 2850ms;
                    transition-delay: 2850ms; }

        body[data-aos-duration='2900'] [data-aos], [data-aos][data-aos][data-aos-duration='2900'] {
          -webkit-transition-duration: 2900ms;
                  transition-duration: 2900ms; }

        body[data-aos-delay='2900'] [data-aos], [data-aos][data-aos][data-aos-delay='2900'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2900'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2900'].aos-animate {
            -webkit-transition-delay: 2900ms;
                    transition-delay: 2900ms; }

        body[data-aos-duration='2950'] [data-aos], [data-aos][data-aos][data-aos-duration='2950'] {
          -webkit-transition-duration: 2950ms;
                  transition-duration: 2950ms; }

        body[data-aos-delay='2950'] [data-aos], [data-aos][data-aos][data-aos-delay='2950'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='2950'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='2950'].aos-animate {
            -webkit-transition-delay: 2950ms;
                    transition-delay: 2950ms; }

        body[data-aos-duration='3000'] [data-aos], [data-aos][data-aos][data-aos-duration='3000'] {
          -webkit-transition-duration: 3000ms;
                  transition-duration: 3000ms; }

        body[data-aos-delay='3000'] [data-aos], [data-aos][data-aos][data-aos-delay='3000'] {
          -webkit-transition-delay: 0;
                  transition-delay: 0; }
          body[data-aos-delay='3000'] [data-aos].aos-animate, [data-aos][data-aos][data-aos-delay='3000'].aos-animate {
            -webkit-transition-delay: 3000ms;
                    transition-delay: 3000ms; }

        body[data-aos-easing="linear"] [data-aos], [data-aos][data-aos][data-aos-easing="linear"] {
          -webkit-transition-timing-function: cubic-bezier(0.25, 0.25, 0.75, 0.75);
                  transition-timing-function: cubic-bezier(0.25, 0.25, 0.75, 0.75); }

        body[data-aos-easing="ease"] [data-aos], [data-aos][data-aos][data-aos-easing="ease"] {
          -webkit-transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
                  transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1); }

        body[data-aos-easing="ease-in"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in"] {
          -webkit-transition-timing-function: cubic-bezier(0.42, 0, 1, 1);
                  transition-timing-function: cubic-bezier(0.42, 0, 1, 1); }

        body[data-aos-easing="ease-out"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-out"] {
          -webkit-transition-timing-function: cubic-bezier(0, 0, 0.58, 1);
                  transition-timing-function: cubic-bezier(0, 0, 0.58, 1); }

        body[data-aos-easing="ease-in-out"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-out"] {
          -webkit-transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
                  transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1); }

        body[data-aos-easing="ease-in-back"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-back"] {
          -webkit-transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, 0.045);
                  transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, 0.045); }

        body[data-aos-easing="ease-out-back"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-out-back"] {
          -webkit-transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
                  transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275); }

        body[data-aos-easing="ease-in-out-back"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-out-back"] {
          -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
                  transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55); }

        body[data-aos-easing="ease-in-sine"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-sine"] {
          -webkit-transition-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
                  transition-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715); }

        body[data-aos-easing="ease-out-sine"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-out-sine"] {
          -webkit-transition-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
                  transition-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1); }

        body[data-aos-easing="ease-in-out-sine"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-out-sine"] {
          -webkit-transition-timing-function: cubic-bezier(0.445, 0.05, 0.55, 0.95);
                  transition-timing-function: cubic-bezier(0.445, 0.05, 0.55, 0.95); }

        body[data-aos-easing="ease-in-quad"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-quad"] {
          -webkit-transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
                  transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53); }

        body[data-aos-easing="ease-out-quad"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-out-quad"] {
          -webkit-transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
                  transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94); }

        body[data-aos-easing="ease-in-out-quad"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-out-quad"] {
          -webkit-transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
                  transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955); }

        body[data-aos-easing="ease-in-cubic"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-cubic"] {
          -webkit-transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
                  transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53); }

        body[data-aos-easing="ease-out-cubic"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-out-cubic"] {
          -webkit-transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
                  transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94); }

        body[data-aos-easing="ease-in-out-cubic"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-out-cubic"] {
          -webkit-transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
                  transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955); }

        body[data-aos-easing="ease-in-quart"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-quart"] {
          -webkit-transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
                  transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53); }

        body[data-aos-easing="ease-out-quart"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-out-quart"] {
          -webkit-transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
                  transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94); }

        body[data-aos-easing="ease-in-out-quart"] [data-aos], [data-aos][data-aos][data-aos-easing="ease-in-out-quart"] {
          -webkit-transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
                  transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955); }

        /**
        * Fade animations:
        * fade
        * fade-up, fade-down, fade-left, fade-right
        * fade-up-right, fade-up-left, fade-down-right, fade-down-left
        */
        [data-aos^='fade'][data-aos^='fade'] {
          opacity: 0;
          -webkit-transition-property: opacity, -webkit-transform;
          transition-property: opacity, -webkit-transform;
          transition-property: opacity, transform;
          transition-property: opacity, transform, -webkit-transform; }
          [data-aos^='fade'][data-aos^='fade'].aos-animate {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0); }

        [data-aos='fade-up'] {
          -webkit-transform: translate3d(0, 100px, 0);
                  transform: translate3d(0, 100px, 0); }

        [data-aos='fade-down'] {
          -webkit-transform: translate3d(0, -100px, 0);
                  transform: translate3d(0, -100px, 0); }

        [data-aos='fade-right'] {
          -webkit-transform: translate3d(-100px, 0, 0);
                  transform: translate3d(-100px, 0, 0); }

        [data-aos='fade-left'] {
          -webkit-transform: translate3d(100px, 0, 0);
                  transform: translate3d(100px, 0, 0); }

        [data-aos='fade-up-right'] {
          -webkit-transform: translate3d(-100px, 100px, 0);
                  transform: translate3d(-100px, 100px, 0); }

        [data-aos='fade-up-left'] {
          -webkit-transform: translate3d(100px, 100px, 0);
                  transform: translate3d(100px, 100px, 0); }

        [data-aos='fade-down-right'] {
          -webkit-transform: translate3d(-100px, -100px, 0);
                  transform: translate3d(-100px, -100px, 0); }

        [data-aos='fade-down-left'] {
          -webkit-transform: translate3d(100px, -100px, 0);
                  transform: translate3d(100px, -100px, 0); }

        /**
        * Zoom animations:
        * zoom-in, zoom-in-up, zoom-in-down, zoom-in-left, zoom-in-right
        * zoom-out, zoom-out-up, zoom-out-down, zoom-out-left, zoom-out-right
        */
        [data-aos^='zoom'][data-aos^='zoom'] {
          opacity: 0;
          -webkit-transition-property: opacity, -webkit-transform;
          transition-property: opacity, -webkit-transform;
          transition-property: opacity, transform;
          transition-property: opacity, transform, -webkit-transform; }
          [data-aos^='zoom'][data-aos^='zoom'].aos-animate {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(1);
                    transform: translate3d(0, 0, 0) scale(1); }

        [data-aos='zoom-in'] {
          -webkit-transform: scale(0.6);
                  transform: scale(0.6); }

        [data-aos='zoom-in-up'] {
          -webkit-transform: translate3d(0, 100px, 0) scale(0.6);
                  transform: translate3d(0, 100px, 0) scale(0.6); }

        [data-aos='zoom-in-down'] {
          -webkit-transform: translate3d(0, -100px, 0) scale(0.6);
                  transform: translate3d(0, -100px, 0) scale(0.6); }

        [data-aos='zoom-in-right'] {
          -webkit-transform: translate3d(-100px, 0, 0) scale(0.6);
                  transform: translate3d(-100px, 0, 0) scale(0.6); }

        [data-aos='zoom-in-left'] {
          -webkit-transform: translate3d(100px, 0, 0) scale(0.6);
                  transform: translate3d(100px, 0, 0) scale(0.6); }

        [data-aos='zoom-out'] {
          -webkit-transform: scale(1.2);
                  transform: scale(1.2); }

        [data-aos='zoom-out-up'] {
          -webkit-transform: translate3d(0, 100px, 0) scale(1.2);
                  transform: translate3d(0, 100px, 0) scale(1.2); }

        [data-aos='zoom-out-down'] {
          -webkit-transform: translate3d(0, -100px, 0) scale(1.2);
                  transform: translate3d(0, -100px, 0) scale(1.2); }

        [data-aos='zoom-out-right'] {
          -webkit-transform: translate3d(-100px, 0, 0) scale(1.2);
                  transform: translate3d(-100px, 0, 0) scale(1.2); }

        [data-aos='zoom-out-left'] {
          -webkit-transform: translate3d(100px, 0, 0) scale(1.2);
                  transform: translate3d(100px, 0, 0) scale(1.2); }

        /**
        * Slide animations
        */
        [data-aos^='slide'][data-aos^='slide'] {
          -webkit-transition-property: -webkit-transform;
          transition-property: -webkit-transform;
          transition-property: transform;
          transition-property: transform, -webkit-transform; }
          [data-aos^='slide'][data-aos^='slide'].aos-animate {
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0); }

        [data-aos='slide-up'] {
          -webkit-transform: translate3d(0, 100%, 0);
                  transform: translate3d(0, 100%, 0); }

        [data-aos='slide-down'] {
          -webkit-transform: translate3d(0, -100%, 0);
                  transform: translate3d(0, -100%, 0); }

        [data-aos='slide-right'] {
          -webkit-transform: translate3d(-100%, 0, 0);
                  transform: translate3d(-100%, 0, 0); }

        [data-aos='slide-left'] {
          -webkit-transform: translate3d(100%, 0, 0);
                  transform: translate3d(100%, 0, 0); }

        /**
        * Flip animations:
        * flip-left, flip-right, flip-up, flip-down
        */
        [data-aos^='flip'][data-aos^='flip'] {
          -webkit-backface-visibility: hidden;
                  backface-visibility: hidden;
          -webkit-transition-property: -webkit-transform;
          transition-property: -webkit-transform;
          transition-property: transform;
          transition-property: transform, -webkit-transform; }

        [data-aos='flip-left'] {
          -webkit-transform: perspective(2500px) rotateY(-100deg);
                  transform: perspective(2500px) rotateY(-100deg); }
          [data-aos='flip-left'].aos-animate {
            -webkit-transform: perspective(2500px) rotateY(0);
                    transform: perspective(2500px) rotateY(0); }

        [data-aos='flip-right'] {
          -webkit-transform: perspective(2500px) rotateY(100deg);
                  transform: perspective(2500px) rotateY(100deg); }
          [data-aos='flip-right'].aos-animate {
            -webkit-transform: perspective(2500px) rotateY(0);
                    transform: perspective(2500px) rotateY(0); }

        [data-aos='flip-up'] {
          -webkit-transform: perspective(2500px) rotateX(-100deg);
                  transform: perspective(2500px) rotateX(-100deg); }
          [data-aos='flip-up'].aos-animate {
            -webkit-transform: perspective(2500px) rotateX(0);
                    transform: perspective(2500px) rotateX(0); }

        [data-aos='flip-down'] {
          -webkit-transform: perspective(2500px) rotateX(100deg);
                  transform: perspective(2500px) rotateX(100deg); }
          [data-aos='flip-down'].aos-animate {
            -webkit-transform: perspective(2500px) rotateX(0);
                    transform: perspective(2500px) rotateX(0); }

        .constellation {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%; }

        .countdown {
          text-align: center; }
          .countdown .col {
            padding: 0; }
          .countdown h5 {
            font-weight: 500;
            font-size: 3rem;
            margin-bottom: 0;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem; }
          .countdown small {
            display: block;
            font-size: 0.8325rem;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem; }
          @media (max-width: 767.98px) {
            .countdown h5 {
              font-size: 2rem; }
            .countdown small {
              font-size: 0.75rem; } }

        .countdown-uppercase small {
          text-transform: uppercase; }

        .countdown-sm h5 {
          font-size: 2.5rem; }

        .countdown-sm small {
          font-size: 0.75rem; }

        @media (max-width: 767.98px) {
          .countdown-sm h5 {
            font-size: 28px; }
          .countdown-sm small {
            font-size: 0.625rem; } }

        .countdown-lg h5 {
          font-size: 3.5rem; }

        .countdown-lg small {
          font-size: 0.875rem; }

        @media (max-width: 767.98px) {
          .countdown-lg h5 {
            font-size: 2.25rem; }
          .countdown-lg small {
            font-size: 0.75rem; } }

        .countdown-outline .col {
          border: 1px solid rgba(117, 117, 117, 0.5);
          border-radius: 0.125rem; }

        .countdown-outline h5 {
          border-bottom: 1px solid rgba(117, 117, 117, 0.5); }

        .countdown-light .col {
          border-color: rgba(255, 255, 255, 0.5); }

        .countdown-light h5,
        .countdown-light small {
          color: rgba(255, 255, 255, 0.85);
          border-color: rgba(255, 255, 255, 0.5); }

        /*!
        *  Font Awesome 4.7.0 by @davegandy - http://fontawesome.io - @fontawesome
        *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
        */
        /* FONT PATH
        * -------------------------- */

        .fa {
          display: inline-block;
          font: normal normal normal 14px/1 FontAwesome;
          font-size: inherit;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale; }

        /* makes the font 33% larger relative to the icon container */
        .fa-lg {
          font-size: 1.33333em;
          line-height: 0.75em;
          vertical-align: -15%; }

        .fa-2x {
          font-size: 2em; }

        .fa-3x {
          font-size: 3em; }

        .fa-4x {
          font-size: 4em; }

        .fa-5x {
          font-size: 5em; }

        .fa-fw {
          width: 1.28571em;
          text-align: center; }

        .fa-ul {
          padding-left: 0;
          margin-left: 2.14286em;
          list-style-type: none; }
          .fa-ul > li {
            position: relative; }

        .fa-li {
          position: absolute;
          left: -2.14286em;
          width: 2.14286em;
          top: 0.14286em;
          text-align: center; }
          .fa-li.fa-lg {
            left: -1.85714em; }

        .fa-border {
          padding: .2em .25em .15em;
          border: solid 0.08em #eee;
          border-radius: .1em; }

        .fa-pull-left {
          float: left; }

        .fa-pull-right {
          float: right; }

        .fa.fa-pull-left {
          margin-right: .3em; }

        .fa.fa-pull-right {
          margin-left: .3em; }

        /* Deprecated as of 4.4.0 */
        .pull-right {
          float: right; }

        .pull-left {
          float: left; }

        .fa.pull-left {
          margin-right: .3em; }

        .fa.pull-right {
          margin-left: .3em; }

        .fa-spin {
          -webkit-animation: fa-spin 2s infinite linear;
          animation: fa-spin 2s infinite linear; }

        .fa-pulse {
          -webkit-animation: fa-spin 1s infinite steps(8);
          animation: fa-spin 1s infinite steps(8); }

        @-webkit-keyframes fa-spin {
          0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg); }
          100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg); } }

        @keyframes fa-spin {
          0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg); }
          100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg); } }

        .fa-rotate-90 {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
          -webkit-transform: rotate(90deg);
          transform: rotate(90deg); }

        .fa-rotate-180 {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
          -webkit-transform: rotate(180deg);
          transform: rotate(180deg); }

        .fa-rotate-270 {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
          -webkit-transform: rotate(270deg);
          transform: rotate(270deg); }

        .fa-flip-horizontal {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
          -webkit-transform: scale(-1, 1);
          transform: scale(-1, 1); }

        .fa-flip-vertical {
          -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
          -webkit-transform: scale(1, -1);
          transform: scale(1, -1); }

        :root .fa-rotate-90,
        :root .fa-rotate-180,
        :root .fa-rotate-270,
        :root .fa-flip-horizontal,
        :root .fa-flip-vertical {
          -webkit-filter: none;
                  filter: none; }

        .fa-stack {
          position: relative;
          display: inline-block;
          width: 2em;
          height: 2em;
          line-height: 2em;
          vertical-align: middle; }

        .fa-stack-1x, .fa-stack-2x {
          position: absolute;
          left: 0;
          width: 100%;
          text-align: center; }

        .fa-stack-1x {
          line-height: inherit; }

        .fa-stack-2x {
          font-size: 2em; }

        .fa-inverse {
          color: #fff; }

        /* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
          readers do not read off random characters that represent icons */
        .fa-glass:before {
          content: ""; }

        .fa-music:before {
          content: ""; }

        .fa-search:before {
          content: ""; }

        .fa-envelope-o:before {
          content: ""; }

        .fa-heart:before {
          content: ""; }

        .fa-star:before {
          content: ""; }

        .fa-star-o:before {
          content: ""; }

        .fa-user:before {
          content: ""; }

        .fa-film:before {
          content: ""; }

        .fa-th-large:before {
          content: ""; }

        .fa-th:before {
          content: ""; }

        .fa-th-list:before {
          content: ""; }

        .fa-check:before {
          content: ""; }

        .fa-remove:before,
        .fa-close:before,
        .fa-times:before {
          content: ""; }

        .fa-search-plus:before {
          content: ""; }

        .fa-search-minus:before {
          content: ""; }

        .fa-power-off:before {
          content: ""; }

        .fa-signal:before {
          content: ""; }

        .fa-gear:before,
        .fa-cog:before {
          content: ""; }

        .fa-trash-o:before {
          content: ""; }

        .fa-home:before {
          content: ""; }

        .fa-file-o:before {
          content: ""; }

        .fa-clock-o:before {
          content: ""; }

        .fa-road:before {
          content: ""; }

        .fa-download:before {
          content: ""; }

        .fa-arrow-circle-o-down:before {
          content: ""; }

        .fa-arrow-circle-o-up:before {
          content: ""; }

        .fa-inbox:before {
          content: ""; }

        .fa-play-circle-o:before {
          content: ""; }

        .fa-rotate-right:before,
        .fa-repeat:before {
          content: ""; }

        .fa-refresh:before {
          content: ""; }

        .fa-list-alt:before {
          content: ""; }

        .fa-lock:before {
          content: ""; }

        .fa-flag:before {
          content: ""; }

        .fa-headphones:before {
          content: ""; }

        .fa-volume-off:before {
          content: ""; }

        .fa-volume-down:before {
          content: ""; }

        .fa-volume-up:before {
          content: ""; }

        .fa-qrcode:before {
          content: ""; }

        .fa-barcode:before {
          content: ""; }

        .fa-tag:before {
          content: ""; }

        .fa-tags:before {
          content: ""; }

        .fa-book:before {
          content: ""; }

        .fa-bookmark:before {
          content: ""; }

        .fa-print:before {
          content: ""; }

        .fa-camera:before {
          content: ""; }

        .fa-font:before {
          content: ""; }

        .fa-bold:before {
          content: ""; }

        .fa-italic:before {
          content: ""; }

        .fa-text-height:before {
          content: ""; }

        .fa-text-width:before {
          content: ""; }

        .fa-align-left:before {
          content: ""; }

        .fa-align-center:before {
          content: ""; }

        .fa-align-right:before {
          content: ""; }

        .fa-align-justify:before {
          content: ""; }

        .fa-list:before {
          content: ""; }

        .fa-dedent:before,
        .fa-outdent:before {
          content: ""; }

        .fa-indent:before {
          content: ""; }

        .fa-video-camera:before {
          content: ""; }

        .fa-photo:before,
        .fa-image:before,
        .fa-picture-o:before {
          content: ""; }

        .fa-pencil:before {
          content: ""; }

        .fa-map-marker:before {
          content: ""; }

        .fa-adjust:before {
          content: ""; }

        .fa-tint:before {
          content: ""; }

        .fa-edit:before,
        .fa-pencil-square-o:before {
          content: ""; }

        .fa-share-square-o:before {
          content: ""; }

        .fa-check-square-o:before {
          content: ""; }

        .fa-arrows:before {
          content: ""; }

        .fa-step-backward:before {
          content: ""; }

        .fa-fast-backward:before {
          content: ""; }

        .fa-backward:before {
          content: ""; }

        .fa-play:before {
          content: ""; }

        .fa-pause:before {
          content: ""; }

        .fa-stop:before {
          content: ""; }

        .fa-forward:before {
          content: ""; }

        .fa-fast-forward:before {
          content: ""; }

        .fa-step-forward:before {
          content: ""; }

        .fa-eject:before {
          content: ""; }

        .fa-chevron-left:before {
          content: ""; }

        .fa-chevron-right:before {
          content: ""; }

        .fa-plus-circle:before {
          content: ""; }

        .fa-minus-circle:before {
          content: ""; }

        .fa-times-circle:before {
          content: ""; }

        .fa-check-circle:before {
          content: ""; }

        .fa-question-circle:before {
          content: ""; }

        .fa-info-circle:before {
          content: ""; }

        .fa-crosshairs:before {
          content: ""; }

        .fa-times-circle-o:before {
          content: ""; }

        .fa-check-circle-o:before {
          content: ""; }

        .fa-ban:before {
          content: ""; }

        .fa-arrow-left:before {
          content: ""; }

        .fa-arrow-right:before {
          content: ""; }

        .fa-arrow-up:before {
          content: ""; }

        .fa-arrow-down:before {
          content: ""; }

        .fa-mail-forward:before,
        .fa-share:before {
          content: ""; }

        .fa-expand:before {
          content: ""; }

        .fa-compress:before {
          content: ""; }

        .fa-plus:before {
          content: ""; }

        .fa-minus:before {
          content: ""; }

        .fa-asterisk:before {
          content: ""; }

        .fa-exclamation-circle:before {
          content: ""; }

        .fa-gift:before {
          content: ""; }

        .fa-leaf:before {
          content: ""; }

        .fa-fire:before {
          content: ""; }

        .fa-eye:before {
          content: ""; }

        .fa-eye-slash:before {
          content: ""; }

        .fa-warning:before,
        .fa-exclamation-triangle:before {
          content: ""; }

        .fa-plane:before {
          content: ""; }

        .fa-calendar:before {
          content: ""; }

        .fa-random:before {
          content: ""; }

        .fa-comment:before {
          content: ""; }

        .fa-magnet:before {
          content: ""; }

        .fa-chevron-up:before {
          content: ""; }

        .fa-chevron-down:before {
          content: ""; }

        .fa-retweet:before {
          content: ""; }

        .fa-shopping-cart:before {
          content: ""; }

        .fa-folder:before {
          content: ""; }

        .fa-folder-open:before {
          content: ""; }

        .fa-arrows-v:before {
          content: ""; }

        .fa-arrows-h:before {
          content: ""; }

        .fa-bar-chart-o:before,
        .fa-bar-chart:before {
          content: ""; }

        .fa-twitter-square:before {
          content: ""; }

        .fa-facebook-square:before {
          content: ""; }

        .fa-camera-retro:before {
          content: ""; }

        .fa-key:before {
          content: ""; }

        .fa-gears:before,
        .fa-cogs:before {
          content: ""; }

        .fa-comments:before {
          content: ""; }

        .fa-thumbs-o-up:before {
          content: ""; }

        .fa-thumbs-o-down:before {
          content: ""; }

        .fa-star-half:before {
          content: ""; }

        .fa-heart-o:before {
          content: ""; }

        .fa-sign-out:before {
          content: ""; }

        .fa-linkedin-square:before {
          content: ""; }

        .fa-thumb-tack:before {
          content: ""; }

        .fa-external-link:before {
          content: ""; }

        .fa-sign-in:before {
          content: ""; }

        .fa-trophy:before {
          content: ""; }

        .fa-github-square:before {
          content: ""; }

        .fa-upload:before {
          content: ""; }

        .fa-lemon-o:before {
          content: ""; }

        .fa-phone:before {
          content: ""; }

        .fa-square-o:before {
          content: ""; }

        .fa-bookmark-o:before {
          content: ""; }

        .fa-phone-square:before {
          content: ""; }

        .fa-twitter:before {
          content: ""; }

        .fa-facebook-f:before,
        .fa-facebook:before {
          content: ""; }

        .fa-github:before {
          content: ""; }

        .fa-unlock:before {
          content: ""; }

        .fa-credit-card:before {
          content: ""; }

        .fa-feed:before,
        .fa-rss:before {
          content: ""; }

        .fa-hdd-o:before {
          content: ""; }

        .fa-bullhorn:before {
          content: ""; }

        .fa-bell:before {
          content: ""; }

        .fa-certificate:before {
          content: ""; }

        .fa-hand-o-right:before {
          content: ""; }

        .fa-hand-o-left:before {
          content: ""; }

        .fa-hand-o-up:before {
          content: ""; }

        .fa-hand-o-down:before {
          content: ""; }

        .fa-arrow-circle-left:before {
          content: ""; }

        .fa-arrow-circle-right:before {
          content: ""; }

        .fa-arrow-circle-up:before {
          content: ""; }

        .fa-arrow-circle-down:before {
          content: ""; }

        .fa-globe:before {
          content: ""; }

        .fa-wrench:before {
          content: ""; }

        .fa-tasks:before {
          content: ""; }

        .fa-filter:before {
          content: ""; }

        .fa-briefcase:before {
          content: ""; }

        .fa-arrows-alt:before {
          content: ""; }

        .fa-group:before,
        .fa-users:before {
          content: ""; }

        .fa-chain:before,
        .fa-link:before {
          content: ""; }

        .fa-cloud:before {
          content: ""; }

        .fa-flask:before {
          content: ""; }

        .fa-cut:before,
        .fa-scissors:before {
          content: ""; }

        .fa-copy:before,
        .fa-files-o:before {
          content: ""; }

        .fa-paperclip:before {
          content: ""; }

        .fa-save:before,
        .fa-floppy-o:before {
          content: ""; }

        .fa-square:before {
          content: ""; }

        .fa-navicon:before,
        .fa-reorder:before,
        .fa-bars:before {
          content: ""; }

        .fa-list-ul:before {
          content: ""; }

        .fa-list-ol:before {
          content: ""; }

        .fa-strikethrough:before {
          content: ""; }

        .fa-underline:before {
          content: ""; }

        .fa-table:before {
          content: ""; }

        .fa-magic:before {
          content: ""; }

        .fa-truck:before {
          content: ""; }

        .fa-pinterest:before {
          content: ""; }

        .fa-pinterest-square:before {
          content: ""; }

        .fa-google-plus-square:before {
          content: ""; }

        .fa-google-plus:before {
          content: ""; }

        .fa-money:before {
          content: ""; }

        .fa-caret-down:before {
          content: ""; }

        .fa-caret-up:before {
          content: ""; }

        .fa-caret-left:before {
          content: ""; }

        .fa-caret-right:before {
          content: ""; }

        .fa-columns:before {
          content: ""; }

        .fa-unsorted:before,
        .fa-sort:before {
          content: ""; }

        .fa-sort-down:before,
        .fa-sort-desc:before {
          content: ""; }

        .fa-sort-up:before,
        .fa-sort-asc:before {
          content: ""; }

        .fa-envelope:before {
          content: ""; }

        .fa-linkedin:before {
          content: ""; }

        .fa-rotate-left:before,
        .fa-undo:before {
          content: ""; }

        .fa-legal:before,
        .fa-gavel:before {
          content: ""; }

        .fa-dashboard:before,
        .fa-tachometer:before {
          content: ""; }

        .fa-comment-o:before {
          content: ""; }

        .fa-comments-o:before {
          content: ""; }

        .fa-flash:before,
        .fa-bolt:before {
          content: ""; }

        .fa-sitemap:before {
          content: ""; }

        .fa-umbrella:before {
          content: ""; }

        .fa-paste:before,
        .fa-clipboard:before {
          content: ""; }

        .fa-lightbulb-o:before {
          content: ""; }

        .fa-exchange:before {
          content: ""; }

        .fa-cloud-download:before {
          content: ""; }

        .fa-cloud-upload:before {
          content: ""; }

        .fa-user-md:before {
          content: ""; }

        .fa-stethoscope:before {
          content: ""; }

        .fa-suitcase:before {
          content: ""; }

        .fa-bell-o:before {
          content: ""; }

        .fa-coffee:before {
          content: ""; }

        .fa-cutlery:before {
          content: ""; }

        .fa-file-text-o:before {
          content: ""; }

        .fa-building-o:before {
          content: ""; }

        .fa-hospital-o:before {
          content: ""; }

        .fa-ambulance:before {
          content: ""; }

        .fa-medkit:before {
          content: ""; }

        .fa-fighter-jet:before {
          content: ""; }

        .fa-beer:before {
          content: ""; }

        .fa-h-square:before {
          content: ""; }

        .fa-plus-square:before {
          content: ""; }

        .fa-angle-double-left:before {
          content: ""; }

        .fa-angle-double-right:before {
          content: ""; }

        .fa-angle-double-up:before {
          content: ""; }

        .fa-angle-double-down:before {
          content: ""; }

        .fa-angle-left:before {
          content: ""; }

        .fa-angle-right:before {
          content: ""; }

        .fa-angle-up:before {
          content: ""; }

        .fa-angle-down:before {
          content: ""; }

        .fa-desktop:before {
          content: ""; }

        .fa-laptop:before {
          content: ""; }

        .fa-tablet:before {
          content: ""; }

        .fa-mobile-phone:before,
        .fa-mobile:before {
          content: ""; }

        .fa-circle-o:before {
          content: ""; }

        .fa-quote-left:before {
          content: ""; }

        .fa-quote-right:before {
          content: ""; }

        .fa-spinner:before {
          content: ""; }

        .fa-circle:before {
          content: ""; }

        .fa-mail-reply:before,
        .fa-reply:before {
          content: ""; }

        .fa-github-alt:before {
          content: ""; }

        .fa-folder-o:before {
          content: ""; }

        .fa-folder-open-o:before {
          content: ""; }

        .fa-smile-o:before {
          content: ""; }

        .fa-frown-o:before {
          content: ""; }

        .fa-meh-o:before {
          content: ""; }

        .fa-gamepad:before {
          content: ""; }

        .fa-keyboard-o:before {
          content: ""; }

        .fa-flag-o:before {
          content: ""; }

        .fa-flag-checkered:before {
          content: ""; }

        .fa-terminal:before {
          content: ""; }

        .fa-code:before {
          content: ""; }

        .fa-mail-reply-all:before,
        .fa-reply-all:before {
          content: ""; }

        .fa-star-half-empty:before,
        .fa-star-half-full:before,
        .fa-star-half-o:before {
          content: ""; }

        .fa-location-arrow:before {
          content: ""; }

        .fa-crop:before {
          content: ""; }

        .fa-code-fork:before {
          content: ""; }

        .fa-unlink:before,
        .fa-chain-broken:before {
          content: ""; }

        .fa-question:before {
          content: ""; }

        .fa-info:before {
          content: ""; }

        .fa-exclamation:before {
          content: ""; }

        .fa-superscript:before {
          content: ""; }

        .fa-subscript:before {
          content: ""; }

        .fa-eraser:before {
          content: ""; }

        .fa-puzzle-piece:before {
          content: ""; }

        .fa-microphone:before {
          content: ""; }

        .fa-microphone-slash:before {
          content: ""; }

        .fa-shield:before {
          content: ""; }

        .fa-calendar-o:before {
          content: ""; }

        .fa-fire-extinguisher:before {
          content: ""; }

        .fa-rocket:before {
          content: ""; }

        .fa-maxcdn:before {
          content: ""; }

        .fa-chevron-circle-left:before {
          content: ""; }

        .fa-chevron-circle-right:before {
          content: ""; }

        .fa-chevron-circle-up:before {
          content: ""; }

        .fa-chevron-circle-down:before {
          content: ""; }

        .fa-html5:before {
          content: ""; }

        .fa-css3:before {
          content: ""; }

        .fa-anchor:before {
          content: ""; }

        .fa-unlock-alt:before {
          content: ""; }

        .fa-bullseye:before {
          content: ""; }

        .fa-ellipsis-h:before {
          content: ""; }

        .fa-ellipsis-v:before {
          content: ""; }

        .fa-rss-square:before {
          content: ""; }

        .fa-play-circle:before {
          content: ""; }

        .fa-ticket:before {
          content: ""; }

        .fa-minus-square:before {
          content: ""; }

        .fa-minus-square-o:before {
          content: ""; }

        .fa-level-up:before {
          content: ""; }

        .fa-level-down:before {
          content: ""; }

        .fa-check-square:before {
          content: ""; }

        .fa-pencil-square:before {
          content: ""; }

        .fa-external-link-square:before {
          content: ""; }

        .fa-share-square:before {
          content: ""; }

        .fa-compass:before {
          content: ""; }

        .fa-toggle-down:before,
        .fa-caret-square-o-down:before {
          content: ""; }

        .fa-toggle-up:before,
        .fa-caret-square-o-up:before {
          content: ""; }

        .fa-toggle-right:before,
        .fa-caret-square-o-right:before {
          content: ""; }

        .fa-euro:before,
        .fa-eur:before {
          content: ""; }

        .fa-gbp:before {
          content: ""; }

        .fa-dollar:before,
        .fa-usd:before {
          content: ""; }

        .fa-rupee:before,
        .fa-inr:before {
          content: ""; }

        .fa-cny:before,
        .fa-rmb:before,
        .fa-yen:before,
        .fa-jpy:before {
          content: ""; }

        .fa-ruble:before,
        .fa-rouble:before,
        .fa-rub:before {
          content: ""; }

        .fa-won:before,
        .fa-krw:before {
          content: ""; }

        .fa-bitcoin:before,
        .fa-btc:before {
          content: ""; }

        .fa-file:before {
          content: ""; }

        .fa-file-text:before {
          content: ""; }

        .fa-sort-alpha-asc:before {
          content: ""; }

        .fa-sort-alpha-desc:before {
          content: ""; }

        .fa-sort-amount-asc:before {
          content: ""; }

        .fa-sort-amount-desc:before {
          content: ""; }

        .fa-sort-numeric-asc:before {
          content: ""; }

        .fa-sort-numeric-desc:before {
          content: ""; }

        .fa-thumbs-up:before {
          content: ""; }

        .fa-thumbs-down:before {
          content: ""; }

        .fa-youtube-square:before {
          content: ""; }

        .fa-youtube:before {
          content: ""; }

        .fa-xing:before {
          content: ""; }

        .fa-xing-square:before {
          content: ""; }

        .fa-youtube-play:before {
          content: ""; }

        .fa-dropbox:before {
          content: ""; }

        .fa-stack-overflow:before {
          content: ""; }

        .fa-instagram:before {
          content: ""; }

        .fa-flickr:before {
          content: ""; }

        .fa-adn:before {
          content: ""; }

        .fa-bitbucket:before {
          content: ""; }

        .fa-bitbucket-square:before {
          content: ""; }

        .fa-tumblr:before {
          content: ""; }

        .fa-tumblr-square:before {
          content: ""; }

        .fa-long-arrow-down:before {
          content: ""; }

        .fa-long-arrow-up:before {
          content: ""; }

        .fa-long-arrow-left:before {
          content: ""; }

        .fa-long-arrow-right:before {
          content: ""; }

        .fa-apple:before {
          content: ""; }

        .fa-windows:before {
          content: ""; }

        .fa-android:before {
          content: ""; }

        .fa-linux:before {
          content: ""; }

        .fa-dribbble:before {
          content: ""; }

        .fa-skype:before {
          content: ""; }

        .fa-foursquare:before {
          content: ""; }

        .fa-trello:before {
          content: ""; }

        .fa-female:before {
          content: ""; }

        .fa-male:before {
          content: ""; }

        .fa-gittip:before,
        .fa-gratipay:before {
          content: ""; }

        .fa-sun-o:before {
          content: ""; }

        .fa-moon-o:before {
          content: ""; }

        .fa-archive:before {
          content: ""; }

        .fa-bug:before {
          content: ""; }

        .fa-vk:before {
          content: ""; }

        .fa-weibo:before {
          content: ""; }

        .fa-renren:before {
          content: ""; }

        .fa-pagelines:before {
          content: ""; }

        .fa-stack-exchange:before {
          content: ""; }

        .fa-arrow-circle-o-right:before {
          content: ""; }

        .fa-arrow-circle-o-left:before {
          content: ""; }

        .fa-toggle-left:before,
        .fa-caret-square-o-left:before {
          content: ""; }

        .fa-dot-circle-o:before {
          content: ""; }

        .fa-wheelchair:before {
          content: ""; }

        .fa-vimeo-square:before {
          content: ""; }

        .fa-turkish-lira:before,
        .fa-try:before {
          content: ""; }

        .fa-plus-square-o:before {
          content: ""; }

        .fa-space-shuttle:before {
          content: ""; }

        .fa-slack:before {
          content: ""; }

        .fa-envelope-square:before {
          content: ""; }

        .fa-wordpress:before {
          content: ""; }

        .fa-openid:before {
          content: ""; }

        .fa-institution:before,
        .fa-bank:before,
        .fa-university:before {
          content: ""; }

        .fa-mortar-board:before,
        .fa-graduation-cap:before {
          content: ""; }

        .fa-yahoo:before {
          content: ""; }

        .fa-google:before {
          content: ""; }

        .fa-reddit:before {
          content: ""; }

        .fa-reddit-square:before {
          content: ""; }

        .fa-stumbleupon-circle:before {
          content: ""; }

        .fa-stumbleupon:before {
          content: ""; }

        .fa-delicious:before {
          content: ""; }

        .fa-digg:before {
          content: ""; }

        .fa-pied-piper-pp:before {
          content: ""; }

        .fa-pied-piper-alt:before {
          content: ""; }

        .fa-drupal:before {
          content: ""; }

        .fa-joomla:before {
          content: ""; }

        .fa-language:before {
          content: ""; }

        .fa-fax:before {
          content: ""; }

        .fa-building:before {
          content: ""; }

        .fa-child:before {
          content: ""; }

        .fa-paw:before {
          content: ""; }

        .fa-spoon:before {
          content: ""; }

        .fa-cube:before {
          content: ""; }

        .fa-cubes:before {
          content: ""; }

        .fa-behance:before {
          content: ""; }

        .fa-behance-square:before {
          content: ""; }

        .fa-steam:before {
          content: ""; }

        .fa-steam-square:before {
          content: ""; }

        .fa-recycle:before {
          content: ""; }

        .fa-automobile:before,
        .fa-car:before {
          content: ""; }

        .fa-cab:before,
        .fa-taxi:before {
          content: ""; }

        .fa-tree:before {
          content: ""; }

        .fa-spotify:before {
          content: ""; }

        .fa-deviantart:before {
          content: ""; }

        .fa-soundcloud:before {
          content: ""; }

        .fa-database:before {
          content: ""; }

        .fa-file-pdf-o:before {
          content: ""; }

        .fa-file-word-o:before {
          content: ""; }

        .fa-file-excel-o:before {
          content: ""; }

        .fa-file-powerpoint-o:before {
          content: ""; }

        .fa-file-photo-o:before,
        .fa-file-picture-o:before,
        .fa-file-image-o:before {
          content: ""; }

        .fa-file-zip-o:before,
        .fa-file-archive-o:before {
          content: ""; }

        .fa-file-sound-o:before,
        .fa-file-audio-o:before {
          content: ""; }

        .fa-file-movie-o:before,
        .fa-file-video-o:before {
          content: ""; }

        .fa-file-code-o:before {
          content: ""; }

        .fa-vine:before {
          content: ""; }

        .fa-codepen:before {
          content: ""; }

        .fa-jsfiddle:before {
          content: ""; }

        .fa-life-bouy:before,
        .fa-life-buoy:before,
        .fa-life-saver:before,
        .fa-support:before,
        .fa-life-ring:before {
          content: ""; }

        .fa-circle-o-notch:before {
          content: ""; }

        .fa-ra:before,
        .fa-resistance:before,
        .fa-rebel:before {
          content: ""; }

        .fa-ge:before,
        .fa-empire:before {
          content: ""; }

        .fa-git-square:before {
          content: ""; }

        .fa-git:before {
          content: ""; }

        .fa-y-combinator-square:before,
        .fa-yc-square:before,
        .fa-hacker-news:before {
          content: ""; }

        .fa-tencent-weibo:before {
          content: ""; }

        .fa-qq:before {
          content: ""; }

        .fa-wechat:before,
        .fa-weixin:before {
          content: ""; }

        .fa-send:before,
        .fa-paper-plane:before {
          content: ""; }

        .fa-send-o:before,
        .fa-paper-plane-o:before {
          content: ""; }

        .fa-history:before {
          content: ""; }

        .fa-circle-thin:before {
          content: ""; }

        .fa-header:before {
          content: ""; }

        .fa-paragraph:before {
          content: ""; }

        .fa-sliders:before {
          content: ""; }

        .fa-share-alt:before {
          content: ""; }

        .fa-share-alt-square:before {
          content: ""; }

        .fa-bomb:before {
          content: ""; }

        .fa-soccer-ball-o:before,
        .fa-futbol-o:before {
          content: ""; }

        .fa-tty:before {
          content: ""; }

        .fa-binoculars:before {
          content: ""; }

        .fa-plug:before {
          content: ""; }

        .fa-slideshare:before {
          content: ""; }

        .fa-twitch:before {
          content: ""; }

        .fa-yelp:before {
          content: ""; }

        .fa-newspaper-o:before {
          content: ""; }

        .fa-wifi:before {
          content: ""; }

        .fa-calculator:before {
          content: ""; }

        .fa-paypal:before {
          content: ""; }

        .fa-google-wallet:before {
          content: ""; }

        .fa-cc-visa:before {
          content: ""; }

        .fa-cc-mastercard:before {
          content: ""; }

        .fa-cc-discover:before {
          content: ""; }

        .fa-cc-amex:before {
          content: ""; }

        .fa-cc-paypal:before {
          content: ""; }

        .fa-cc-stripe:before {
          content: ""; }

        .fa-bell-slash:before {
          content: ""; }

        .fa-bell-slash-o:before {
          content: ""; }

        .fa-trash:before {
          content: ""; }

        .fa-copyright:before {
          content: ""; }

        .fa-at:before {
          content: ""; }

        .fa-eyedropper:before {
          content: ""; }

        .fa-paint-brush:before {
          content: ""; }

        .fa-birthday-cake:before {
          content: ""; }

        .fa-area-chart:before {
          content: ""; }

        .fa-pie-chart:before {
          content: ""; }

        .fa-line-chart:before {
          content: ""; }

        .fa-lastfm:before {
          content: ""; }

        .fa-lastfm-square:before {
          content: ""; }

        .fa-toggle-off:before {
          content: ""; }

        .fa-toggle-on:before {
          content: ""; }

        .fa-bicycle:before {
          content: ""; }

        .fa-bus:before {
          content: ""; }

        .fa-ioxhost:before {
          content: ""; }

        .fa-angellist:before {
          content: ""; }

        .fa-cc:before {
          content: ""; }

        .fa-shekel:before,
        .fa-sheqel:before,
        .fa-ils:before {
          content: ""; }

        .fa-meanpath:before {
          content: ""; }

        .fa-buysellads:before {
          content: ""; }

        .fa-connectdevelop:before {
          content: ""; }

        .fa-dashcube:before {
          content: ""; }

        .fa-forumbee:before {
          content: ""; }

        .fa-leanpub:before {
          content: ""; }

        .fa-sellsy:before {
          content: ""; }

        .fa-shirtsinbulk:before {
          content: ""; }

        .fa-simplybuilt:before {
          content: ""; }

        .fa-skyatlas:before {
          content: ""; }

        .fa-cart-plus:before {
          content: ""; }

        .fa-cart-arrow-down:before {
          content: ""; }

        .fa-diamond:before {
          content: ""; }

        .fa-ship:before {
          content: ""; }

        .fa-user-secret:before {
          content: ""; }

        .fa-motorcycle:before {
          content: ""; }

        .fa-street-view:before {
          content: ""; }

        .fa-heartbeat:before {
          content: ""; }

        .fa-venus:before {
          content: ""; }

        .fa-mars:before {
          content: ""; }

        .fa-mercury:before {
          content: ""; }

        .fa-intersex:before,
        .fa-transgender:before {
          content: ""; }

        .fa-transgender-alt:before {
          content: ""; }

        .fa-venus-double:before {
          content: ""; }

        .fa-mars-double:before {
          content: ""; }

        .fa-venus-mars:before {
          content: ""; }

        .fa-mars-stroke:before {
          content: ""; }

        .fa-mars-stroke-v:before {
          content: ""; }

        .fa-mars-stroke-h:before {
          content: ""; }

        .fa-neuter:before {
          content: ""; }

        .fa-genderless:before {
          content: ""; }

        .fa-facebook-official:before {
          content: ""; }

        .fa-pinterest-p:before {
          content: ""; }

        .fa-whatsapp:before {
          content: ""; }

        .fa-server:before {
          content: ""; }

        .fa-user-plus:before {
          content: ""; }

        .fa-user-times:before {
          content: ""; }

        .fa-hotel:before,
        .fa-bed:before {
          content: ""; }

        .fa-viacoin:before {
          content: ""; }

        .fa-train:before {
          content: ""; }

        .fa-subway:before {
          content: ""; }

        .fa-medium:before {
          content: ""; }

        .fa-yc:before,
        .fa-y-combinator:before {
          content: ""; }

        .fa-optin-monster:before {
          content: ""; }

        .fa-opencart:before {
          content: ""; }

        .fa-expeditedssl:before {
          content: ""; }

        .fa-battery-4:before,
        .fa-battery:before,
        .fa-battery-full:before {
          content: ""; }

        .fa-battery-3:before,
        .fa-battery-three-quarters:before {
          content: ""; }

        .fa-battery-2:before,
        .fa-battery-half:before {
          content: ""; }

        .fa-battery-1:before,
        .fa-battery-quarter:before {
          content: ""; }

        .fa-battery-0:before,
        .fa-battery-empty:before {
          content: ""; }

        .fa-mouse-pointer:before {
          content: ""; }

        .fa-i-cursor:before {
          content: ""; }

        .fa-object-group:before {
          content: ""; }

        .fa-object-ungroup:before {
          content: ""; }

        .fa-sticky-note:before {
          content: ""; }

        .fa-sticky-note-o:before {
          content: ""; }

        .fa-cc-jcb:before {
          content: ""; }

        .fa-cc-diners-club:before {
          content: ""; }

        .fa-clone:before {
          content: ""; }

        .fa-balance-scale:before {
          content: ""; }

        .fa-hourglass-o:before {
          content: ""; }

        .fa-hourglass-1:before,
        .fa-hourglass-start:before {
          content: ""; }

        .fa-hourglass-2:before,
        .fa-hourglass-half:before {
          content: ""; }

        .fa-hourglass-3:before,
        .fa-hourglass-end:before {
          content: ""; }

        .fa-hourglass:before {
          content: ""; }

        .fa-hand-grab-o:before,
        .fa-hand-rock-o:before {
          content: ""; }

        .fa-hand-stop-o:before,
        .fa-hand-paper-o:before {
          content: ""; }

        .fa-hand-scissors-o:before {
          content: ""; }

        .fa-hand-lizard-o:before {
          content: ""; }

        .fa-hand-spock-o:before {
          content: ""; }

        .fa-hand-pointer-o:before {
          content: ""; }

        .fa-hand-peace-o:before {
          content: ""; }

        .fa-trademark:before {
          content: ""; }

        .fa-registered:before {
          content: ""; }

        .fa-creative-commons:before {
          content: ""; }

        .fa-gg:before {
          content: ""; }

        .fa-gg-circle:before {
          content: ""; }

        .fa-tripadvisor:before {
          content: ""; }

        .fa-odnoklassniki:before {
          content: ""; }

        .fa-odnoklassniki-square:before {
          content: ""; }

        .fa-get-pocket:before {
          content: ""; }

        .fa-wikipedia-w:before {
          content: ""; }

        .fa-safari:before {
          content: ""; }

        .fa-chrome:before {
          content: ""; }

        .fa-firefox:before {
          content: ""; }

        .fa-opera:before {
          content: ""; }

        .fa-internet-explorer:before {
          content: ""; }

        .fa-tv:before,
        .fa-television:before {
          content: ""; }

        .fa-contao:before {
          content: ""; }

        .fa-500px:before {
          content: ""; }

        .fa-amazon:before {
          content: ""; }

        .fa-calendar-plus-o:before {
          content: ""; }

        .fa-calendar-minus-o:before {
          content: ""; }

        .fa-calendar-times-o:before {
          content: ""; }

        .fa-calendar-check-o:before {
          content: ""; }

        .fa-industry:before {
          content: ""; }

        .fa-map-pin:before {
          content: ""; }

        .fa-map-signs:before {
          content: ""; }

        .fa-map-o:before {
          content: ""; }

        .fa-map:before {
          content: ""; }

        .fa-commenting:before {
          content: ""; }

        .fa-commenting-o:before {
          content: ""; }

        .fa-houzz:before {
          content: ""; }

        .fa-vimeo:before {
          content: ""; }

        .fa-black-tie:before {
          content: ""; }

        .fa-fonticons:before {
          content: ""; }

        .fa-reddit-alien:before {
          content: ""; }

        .fa-edge:before {
          content: ""; }

        .fa-credit-card-alt:before {
          content: ""; }

        .fa-codiepie:before {
          content: ""; }

        .fa-modx:before {
          content: ""; }

        .fa-fort-awesome:before {
          content: ""; }

        .fa-usb:before {
          content: ""; }

        .fa-product-hunt:before {
          content: ""; }

        .fa-mixcloud:before {
          content: ""; }

        .fa-scribd:before {
          content: ""; }

        .fa-pause-circle:before {
          content: ""; }

        .fa-pause-circle-o:before {
          content: ""; }

        .fa-stop-circle:before {
          content: ""; }

        .fa-stop-circle-o:before {
          content: ""; }

        .fa-shopping-bag:before {
          content: ""; }

        .fa-shopping-basket:before {
          content: ""; }

        .fa-hashtag:before {
          content: ""; }

        .fa-bluetooth:before {
          content: ""; }

        .fa-bluetooth-b:before {
          content: ""; }

        .fa-percent:before {
          content: ""; }

        .fa-gitlab:before {
          content: ""; }

        .fa-wpbeginner:before {
          content: ""; }

        .fa-wpforms:before {
          content: ""; }

        .fa-envira:before {
          content: ""; }

        .fa-universal-access:before {
          content: ""; }

        .fa-wheelchair-alt:before {
          content: ""; }

        .fa-question-circle-o:before {
          content: ""; }

        .fa-blind:before {
          content: ""; }

        .fa-audio-description:before {
          content: ""; }

        .fa-volume-control-phone:before {
          content: ""; }

        .fa-braille:before {
          content: ""; }

        .fa-assistive-listening-systems:before {
          content: ""; }

        .fa-asl-interpreting:before,
        .fa-american-sign-language-interpreting:before {
          content: ""; }

        .fa-deafness:before,
        .fa-hard-of-hearing:before,
        .fa-deaf:before {
          content: ""; }

        .fa-glide:before {
          content: ""; }

        .fa-glide-g:before {
          content: ""; }

        .fa-signing:before,
        .fa-sign-language:before {
          content: ""; }

        .fa-low-vision:before {
          content: ""; }

        .fa-viadeo:before {
          content: ""; }

        .fa-viadeo-square:before {
          content: ""; }

        .fa-snapchat:before {
          content: ""; }

        .fa-snapchat-ghost:before {
          content: ""; }

        .fa-snapchat-square:before {
          content: ""; }

        .fa-pied-piper:before {
          content: ""; }

        .fa-first-order:before {
          content: ""; }

        .fa-yoast:before {
          content: ""; }

        .fa-themeisle:before {
          content: ""; }

        .fa-google-plus-circle:before,
        .fa-google-plus-official:before {
          content: ""; }

        .fa-fa:before,
        .fa-font-awesome:before {
          content: ""; }

        .fa-handshake-o:before {
          content: ""; }

        .fa-envelope-open:before {
          content: ""; }

        .fa-envelope-open-o:before {
          content: ""; }

        .fa-linode:before {
          content: ""; }

        .fa-address-book:before {
          content: ""; }

        .fa-address-book-o:before {
          content: ""; }

        .fa-vcard:before,
        .fa-address-card:before {
          content: ""; }

        .fa-vcard-o:before,
        .fa-address-card-o:before {
          content: ""; }

        .fa-user-circle:before {
          content: ""; }

        .fa-user-circle-o:before {
          content: ""; }

        .fa-user-o:before {
          content: ""; }

        .fa-id-badge:before {
          content: ""; }

        .fa-drivers-license:before,
        .fa-id-card:before {
          content: ""; }

        .fa-drivers-license-o:before,
        .fa-id-card-o:before {
          content: ""; }

        .fa-quora:before {
          content: ""; }

        .fa-free-code-camp:before {
          content: ""; }

        .fa-telegram:before {
          content: ""; }

        .fa-thermometer-4:before,
        .fa-thermometer:before,
        .fa-thermometer-full:before {
          content: ""; }

        .fa-thermometer-3:before,
        .fa-thermometer-three-quarters:before {
          content: ""; }

        .fa-thermometer-2:before,
        .fa-thermometer-half:before {
          content: ""; }

        .fa-thermometer-1:before,
        .fa-thermometer-quarter:before {
          content: ""; }

        .fa-thermometer-0:before,
        .fa-thermometer-empty:before {
          content: ""; }

        .fa-shower:before {
          content: ""; }

        .fa-bathtub:before,
        .fa-s15:before,
        .fa-bath:before {
          content: ""; }

        .fa-podcast:before {
          content: ""; }

        .fa-window-maximize:before {
          content: ""; }

        .fa-window-minimize:before {
          content: ""; }

        .fa-window-restore:before {
          content: ""; }

        .fa-times-rectangle:before,
        .fa-window-close:before {
          content: ""; }

        .fa-times-rectangle-o:before,
        .fa-window-close-o:before {
          content: ""; }

        .fa-bandcamp:before {
          content: ""; }

        .fa-grav:before {
          content: ""; }

        .fa-etsy:before {
          content: ""; }

        .fa-imdb:before {
          content: ""; }

        .fa-ravelry:before {
          content: ""; }

        .fa-eercast:before {
          content: ""; }

        .fa-microchip:before {
          content: ""; }

        .fa-snowflake-o:before {
          content: ""; }

        .fa-superpowers:before {
          content: ""; }

        .fa-wpexplorer:before {
          content: ""; }

        .fa-meetup:before {
          content: ""; }

        .sr-only {
          position: absolute;
          width: 1px;
          height: 1px;
          padding: 0;
          margin: -1px;
          overflow: hidden;
          clip: rect(0, 0, 0, 0);
          border: 0; }

        .sr-only-focusable:active, .sr-only-focusable:focus {
          position: static;
          width: auto;
          height: auto;
          margin: 0;
          overflow: visible;
          clip: auto; }


        /* Use the following CSS code if you want to use data attributes for inserting your icons */
        [data-icon]:before {
          font-family: 'et-line';
          content: attr(data-icon);
          speak: none;
          font-weight: normal;
          font-variant: normal;
          text-transform: none;
          line-height: 1;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
          display: inline-block; }

        /* Use the following CSS code if you want to have a class per icon */
        /*
        Instead of a list of all class selectors,
        you can use the generic selector below, but it's slower:
        [class*="icon-"] {
        */
        .icon-mobile, .icon-laptop, .icon-desktop, .icon-tablet, .icon-phone, .icon-document, .icon-documents, .icon-search, .icon-clipboard, .icon-newspaper, .icon-notebook, .icon-book-open, .icon-browser, .icon-calendar, .icon-presentation, .icon-picture, .icon-pictures, .icon-video, .icon-camera, .icon-printer, .icon-toolbox, .icon-briefcase, .icon-wallet, .icon-gift, .icon-bargraph, .icon-grid, .icon-expand, .icon-focus, .icon-edit, .icon-adjustments, .icon-ribbon, .icon-hourglass, .icon-lock, .icon-megaphone, .icon-shield, .icon-trophy, .icon-flag, .icon-map, .icon-puzzle, .icon-basket, .icon-envelope, .icon-streetsign, .icon-telescope, .icon-gears, .icon-key, .icon-paperclip, .icon-attachment, .icon-pricetags, .icon-lightbulb, .icon-layers, .icon-pencil, .icon-tools, .icon-tools-2, .icon-scissors, .icon-paintbrush, .icon-magnifying-glass, .icon-circle-compass, .icon-linegraph, .icon-mic, .icon-strategy, .icon-beaker, .icon-caution, .icon-recycle, .icon-anchor, .icon-profile-male, .icon-profile-female, .icon-bike, .icon-wine, .icon-hotairballoon, .icon-globe, .icon-genius, .icon-map-pin, .icon-dial, .icon-chat, .icon-heart, .icon-cloud, .icon-upload, .icon-download, .icon-target, .icon-hazardous, .icon-piechart, .icon-speedometer, .icon-global, .icon-compass, .icon-lifesaver, .icon-clock, .icon-aperture, .icon-quote, .icon-scope, .icon-alarmclock, .icon-refresh, .icon-happy, .icon-sad, .icon-facebook, .icon-twitter, .icon-googleplus, .icon-rss, .icon-tumblr, .icon-linkedin, .icon-dribbble {
          font-family: 'et-line';
          speak: none;
          font-style: normal;
          font-weight: normal;
          font-variant: normal;
          text-transform: none;
          line-height: 1;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
          display: inline-block; }

        .icon-mobile:before {
          content: "\e000"; }

        .icon-laptop:before {
          content: "\e001"; }

        .icon-desktop:before {
          content: "\e002"; }

        .icon-tablet:before {
          content: "\e003"; }

        .icon-phone:before {
          content: "\e004"; }

        .icon-document:before {
          content: "\e005"; }

        .icon-documents:before {
          content: "\e006"; }

        .icon-search:before {
          content: "\e007"; }

        .icon-clipboard:before {
          content: "\e008"; }

        .icon-newspaper:before {
          content: "\e009"; }

        .icon-notebook:before {
          content: "\e00a"; }

        .icon-book-open:before {
          content: "\e00b"; }

        .icon-browser:before {
          content: "\e00c"; }

        .icon-calendar:before {
          content: "\e00d"; }

        .icon-presentation:before {
          content: "\e00e"; }

        .icon-picture:before {
          content: "\e00f"; }

        .icon-pictures:before {
          content: "\e010"; }

        .icon-video:before {
          content: "\e011"; }

        .icon-camera:before {
          content: "\e012"; }

        .icon-printer:before {
          content: "\e013"; }

        .icon-toolbox:before {
          content: "\e014"; }

        .icon-briefcase:before {
          content: "\e015"; }

        .icon-wallet:before {
          content: "\e016"; }

        .icon-gift:before {
          content: "\e017"; }

        .icon-bargraph:before {
          content: "\e018"; }

        .icon-grid:before {
          content: "\e019"; }

        .icon-expand:before {
          content: "\e01a"; }

        .icon-focus:before {
          content: "\e01b"; }

        .icon-edit:before {
          content: "\e01c"; }

        .icon-adjustments:before {
          content: "\e01d"; }

        .icon-ribbon:before {
          content: "\e01e"; }

        .icon-hourglass:before {
          content: "\e01f"; }

        .icon-lock:before {
          content: "\e020"; }

        .icon-megaphone:before {
          content: "\e021"; }

        .icon-shield:before {
          content: "\e022"; }

        .icon-trophy:before {
          content: "\e023"; }

        .icon-flag:before {
          content: "\e024"; }

        .icon-map:before {
          content: "\e025"; }

        .icon-puzzle:before {
          content: "\e026"; }

        .icon-basket:before {
          content: "\e027"; }

        .icon-envelope:before {
          content: "\e028"; }

        .icon-streetsign:before {
          content: "\e029"; }

        .icon-telescope:before {
          content: "\e02a"; }

        .icon-gears:before {
          content: "\e02b"; }

        .icon-key:before {
          content: "\e02c"; }

        .icon-paperclip:before {
          content: "\e02d"; }

        .icon-attachment:before {
          content: "\e02e"; }

        .icon-pricetags:before {
          content: "\e02f"; }

        .icon-lightbulb:before {
          content: "\e030"; }

        .icon-layers:before {
          content: "\e031"; }

        .icon-pencil:before {
          content: "\e032"; }

        .icon-tools:before {
          content: "\e033"; }

        .icon-tools-2:before {
          content: "\e034"; }

        .icon-scissors:before {
          content: "\e035"; }

        .icon-paintbrush:before {
          content: "\e036"; }

        .icon-magnifying-glass:before {
          content: "\e037"; }

        .icon-circle-compass:before {
          content: "\e038"; }

        .icon-linegraph:before {
          content: "\e039"; }

        .icon-mic:before {
          content: "\e03a"; }

        .icon-strategy:before {
          content: "\e03b"; }

        .icon-beaker:before {
          content: "\e03c"; }

        .icon-caution:before {
          content: "\e03d"; }

        .icon-recycle:before {
          content: "\e03e"; }

        .icon-anchor:before {
          content: "\e03f"; }

        .icon-profile-male:before {
          content: "\e040"; }

        .icon-profile-female:before {
          content: "\e041"; }

        .icon-bike:before {
          content: "\e042"; }

        .icon-wine:before {
          content: "\e043"; }

        .icon-hotairballoon:before {
          content: "\e044"; }

        .icon-globe:before {
          content: "\e045"; }

        .icon-genius:before {
          content: "\e046"; }

        .icon-map-pin:before {
          content: "\e047"; }

        .icon-dial:before {
          content: "\e048"; }

        .icon-chat:before {
          content: "\e049"; }

        .icon-heart:before {
          content: "\e04a"; }

        .icon-cloud:before {
          content: "\e04b"; }

        .icon-upload:before {
          content: "\e04c"; }

        .icon-download:before {
          content: "\e04d"; }

        .icon-target:before {
          content: "\e04e"; }

        .icon-hazardous:before {
          content: "\e04f"; }

        .icon-piechart:before {
          content: "\e050"; }

        .icon-speedometer:before {
          content: "\e051"; }

        .icon-global:before {
          content: "\e052"; }

        .icon-compass:before {
          content: "\e053"; }

        .icon-lifesaver:before {
          content: "\e054"; }

        .icon-clock:before {
          content: "\e055"; }

        .icon-aperture:before {
          content: "\e056"; }

        .icon-quote:before {
          content: "\e057"; }

        .icon-scope:before {
          content: "\e058"; }

        .icon-alarmclock:before {
          content: "\e059"; }

        .icon-refresh:before {
          content: "\e05a"; }

        .icon-happy:before {
          content: "\e05b"; }

        .icon-sad:before {
          content: "\e05c"; }

        .icon-facebook:before {
          content: "\e05d"; }

        .icon-twitter:before {
          content: "\e05e"; }

        .icon-googleplus:before {
          content: "\e05f"; }

        .icon-rss:before {
          content: "\e060"; }

        .icon-tumblr:before {
          content: "\e061"; }

        .icon-linkedin:before {
          content: "\e062"; }

        .icon-dribbble:before {
          content: "\e063"; }


        [class^="ti-"], [class*=" ti-"] {
          font-family: 'themify';
          speak: none;
          font-style: normal;
          font-weight: normal;
          font-variant: normal;
          text-transform: none;
          line-height: 1;
          /* Better Font Rendering =========== */
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale; }

        .ti-wand:before {
          content: "\e600"; }

        .ti-volume:before {
          content: "\e601"; }

        .ti-user:before {
          content: "\e602"; }

        .ti-unlock:before {
          content: "\e603"; }

        .ti-unlink:before {
          content: "\e604"; }

        .ti-trash:before {
          content: "\e605"; }

        .ti-thought:before {
          content: "\e606"; }

        .ti-target:before {
          content: "\e607"; }

        .ti-tag:before {
          content: "\e608"; }

        .ti-tablet:before {
          content: "\e609"; }

        .ti-star:before {
          content: "\e60a"; }

        .ti-spray:before {
          content: "\e60b"; }

        .ti-signal:before {
          content: "\e60c"; }

        .ti-shopping-cart:before {
          content: "\e60d"; }

        .ti-shopping-cart-full:before {
          content: "\e60e"; }

        .ti-settings:before {
          content: "\e60f"; }

        .ti-search:before {
          content: "\e610"; }

        .ti-zoom-in:before {
          content: "\e611"; }

        .ti-zoom-out:before {
          content: "\e612"; }

        .ti-cut:before {
          content: "\e613"; }

        .ti-ruler:before {
          content: "\e614"; }

        .ti-ruler-pencil:before {
          content: "\e615"; }

        .ti-ruler-alt:before {
          content: "\e616"; }

        .ti-bookmark:before {
          content: "\e617"; }

        .ti-bookmark-alt:before {
          content: "\e618"; }

        .ti-reload:before {
          content: "\e619"; }

        .ti-plus:before {
          content: "\e61a"; }

        .ti-pin:before {
          content: "\e61b"; }

        .ti-pencil:before {
          content: "\e61c"; }

        .ti-pencil-alt:before {
          content: "\e61d"; }

        .ti-paint-roller:before {
          content: "\e61e"; }

        .ti-paint-bucket:before {
          content: "\e61f"; }

        .ti-na:before {
          content: "\e620"; }

        .ti-mobile:before {
          content: "\e621"; }

        .ti-minus:before {
          content: "\e622"; }

        .ti-medall:before {
          content: "\e623"; }

        .ti-medall-alt:before {
          content: "\e624"; }

        .ti-marker:before {
          content: "\e625"; }

        .ti-marker-alt:before {
          content: "\e626"; }

        .ti-arrow-up:before {
          content: "\e627"; }

        .ti-arrow-right:before {
          content: "\e628"; }

        .ti-arrow-left:before {
          content: "\e629"; }

        .ti-arrow-down:before {
          content: "\e62a"; }

        .ti-lock:before {
          content: "\e62b"; }

        .ti-location-arrow:before {
          content: "\e62c"; }

        .ti-link:before {
          content: "\e62d"; }

        .ti-layout:before {
          content: "\e62e"; }

        .ti-layers:before {
          content: "\e62f"; }

        .ti-layers-alt:before {
          content: "\e630"; }

        .ti-key:before {
          content: "\e631"; }

        .ti-import:before {
          content: "\e632"; }

        .ti-image:before {
          content: "\e633"; }

        .ti-heart:before {
          content: "\e634"; }

        .ti-heart-broken:before {
          content: "\e635"; }

        .ti-hand-stop:before {
          content: "\e636"; }

        .ti-hand-open:before {
          content: "\e637"; }

        .ti-hand-drag:before {
          content: "\e638"; }

        .ti-folder:before {
          content: "\e639"; }

        .ti-flag:before {
          content: "\e63a"; }

        .ti-flag-alt:before {
          content: "\e63b"; }

        .ti-flag-alt-2:before {
          content: "\e63c"; }

        .ti-eye:before {
          content: "\e63d"; }

        .ti-export:before {
          content: "\e63e"; }

        .ti-exchange-vertical:before {
          content: "\e63f"; }

        .ti-desktop:before {
          content: "\e640"; }

        .ti-cup:before {
          content: "\e641"; }

        .ti-crown:before {
          content: "\e642"; }

        .ti-comments:before {
          content: "\e643"; }

        .ti-comment:before {
          content: "\e644"; }

        .ti-comment-alt:before {
          content: "\e645"; }

        .ti-close:before {
          content: "\e646"; }

        .ti-clip:before {
          content: "\e647"; }

        .ti-angle-up:before {
          content: "\e648"; }

        .ti-angle-right:before {
          content: "\e649"; }

        .ti-angle-left:before {
          content: "\e64a"; }

        .ti-angle-down:before {
          content: "\e64b"; }

        .ti-check:before {
          content: "\e64c"; }

        .ti-check-box:before {
          content: "\e64d"; }

        .ti-camera:before {
          content: "\e64e"; }

        .ti-announcement:before {
          content: "\e64f"; }

        .ti-brush:before {
          content: "\e650"; }

        .ti-briefcase:before {
          content: "\e651"; }

        .ti-bolt:before {
          content: "\e652"; }

        .ti-bolt-alt:before {
          content: "\e653"; }

        .ti-blackboard:before {
          content: "\e654"; }

        .ti-bag:before {
          content: "\e655"; }

        .ti-move:before {
          content: "\e656"; }

        .ti-arrows-vertical:before {
          content: "\e657"; }

        .ti-arrows-horizontal:before {
          content: "\e658"; }

        .ti-fullscreen:before {
          content: "\e659"; }

        .ti-arrow-top-right:before {
          content: "\e65a"; }

        .ti-arrow-top-left:before {
          content: "\e65b"; }

        .ti-arrow-circle-up:before {
          content: "\e65c"; }

        .ti-arrow-circle-right:before {
          content: "\e65d"; }

        .ti-arrow-circle-left:before {
          content: "\e65e"; }

        .ti-arrow-circle-down:before {
          content: "\e65f"; }

        .ti-angle-double-up:before {
          content: "\e660"; }

        .ti-angle-double-right:before {
          content: "\e661"; }

        .ti-angle-double-left:before {
          content: "\e662"; }

        .ti-angle-double-down:before {
          content: "\e663"; }

        .ti-zip:before {
          content: "\e664"; }

        .ti-world:before {
          content: "\e665"; }

        .ti-wheelchair:before {
          content: "\e666"; }

        .ti-view-list:before {
          content: "\e667"; }

        .ti-view-list-alt:before {
          content: "\e668"; }

        .ti-view-grid:before {
          content: "\e669"; }

        .ti-uppercase:before {
          content: "\e66a"; }

        .ti-upload:before {
          content: "\e66b"; }

        .ti-underline:before {
          content: "\e66c"; }

        .ti-truck:before {
          content: "\e66d"; }

        .ti-timer:before {
          content: "\e66e"; }

        .ti-ticket:before {
          content: "\e66f"; }

        .ti-thumb-up:before {
          content: "\e670"; }

        .ti-thumb-down:before {
          content: "\e671"; }

        .ti-text:before {
          content: "\e672"; }

        .ti-stats-up:before {
          content: "\e673"; }

        .ti-stats-down:before {
          content: "\e674"; }

        .ti-split-v:before {
          content: "\e675"; }

        .ti-split-h:before {
          content: "\e676"; }

        .ti-smallcap:before {
          content: "\e677"; }

        .ti-shine:before {
          content: "\e678"; }

        .ti-shift-right:before {
          content: "\e679"; }

        .ti-shift-left:before {
          content: "\e67a"; }

        .ti-shield:before {
          content: "\e67b"; }

        .ti-notepad:before {
          content: "\e67c"; }

        .ti-server:before {
          content: "\e67d"; }

        .ti-quote-right:before {
          content: "\e67e"; }

        .ti-quote-left:before {
          content: "\e67f"; }

        .ti-pulse:before {
          content: "\e680"; }

        .ti-printer:before {
          content: "\e681"; }

        .ti-power-off:before {
          content: "\e682"; }

        .ti-plug:before {
          content: "\e683"; }

        .ti-pie-chart:before {
          content: "\e684"; }

        .ti-paragraph:before {
          content: "\e685"; }

        .ti-panel:before {
          content: "\e686"; }

        .ti-package:before {
          content: "\e687"; }

        .ti-music:before {
          content: "\e688"; }

        .ti-music-alt:before {
          content: "\e689"; }

        .ti-mouse:before {
          content: "\e68a"; }

        .ti-mouse-alt:before {
          content: "\e68b"; }

        .ti-money:before {
          content: "\e68c"; }

        .ti-microphone:before {
          content: "\e68d"; }

        .ti-menu:before {
          content: "\e68e"; }

        .ti-menu-alt:before {
          content: "\e68f"; }

        .ti-map:before {
          content: "\e690"; }

        .ti-map-alt:before {
          content: "\e691"; }

        .ti-loop:before {
          content: "\e692"; }

        .ti-location-pin:before {
          content: "\e693"; }

        .ti-list:before {
          content: "\e694"; }

        .ti-light-bulb:before {
          content: "\e695"; }

        .ti-Italic:before {
          content: "\e696"; }

        .ti-info:before {
          content: "\e697"; }

        .ti-infinite:before {
          content: "\e698"; }

        .ti-id-badge:before {
          content: "\e699"; }

        .ti-hummer:before {
          content: "\e69a"; }

        .ti-home:before {
          content: "\e69b"; }

        .ti-help:before {
          content: "\e69c"; }

        .ti-headphone:before {
          content: "\e69d"; }

        .ti-harddrives:before {
          content: "\e69e"; }

        .ti-harddrive:before {
          content: "\e69f"; }

        .ti-gift:before {
          content: "\e6a0"; }

        .ti-game:before {
          content: "\e6a1"; }

        .ti-filter:before {
          content: "\e6a2"; }

        .ti-files:before {
          content: "\e6a3"; }

        .ti-file:before {
          content: "\e6a4"; }

        .ti-eraser:before {
          content: "\e6a5"; }

        .ti-envelope:before {
          content: "\e6a6"; }

        .ti-download:before {
          content: "\e6a7"; }

        .ti-direction:before {
          content: "\e6a8"; }

        .ti-direction-alt:before {
          content: "\e6a9"; }

        .ti-dashboard:before {
          content: "\e6aa"; }

        .ti-control-stop:before {
          content: "\e6ab"; }

        .ti-control-shuffle:before {
          content: "\e6ac"; }

        .ti-control-play:before {
          content: "\e6ad"; }

        .ti-control-pause:before {
          content: "\e6ae"; }

        .ti-control-forward:before {
          content: "\e6af"; }

        .ti-control-backward:before {
          content: "\e6b0"; }

        .ti-cloud:before {
          content: "\e6b1"; }

        .ti-cloud-up:before {
          content: "\e6b2"; }

        .ti-cloud-down:before {
          content: "\e6b3"; }

        .ti-clipboard:before {
          content: "\e6b4"; }

        .ti-car:before {
          content: "\e6b5"; }

        .ti-calendar:before {
          content: "\e6b6"; }

        .ti-book:before {
          content: "\e6b7"; }

        .ti-bell:before {
          content: "\e6b8"; }

        .ti-basketball:before {
          content: "\e6b9"; }

        .ti-bar-chart:before {
          content: "\e6ba"; }

        .ti-bar-chart-alt:before {
          content: "\e6bb"; }

        .ti-back-right:before {
          content: "\e6bc"; }

        .ti-back-left:before {
          content: "\e6bd"; }

        .ti-arrows-corner:before {
          content: "\e6be"; }

        .ti-archive:before {
          content: "\e6bf"; }

        .ti-anchor:before {
          content: "\e6c0"; }

        .ti-align-right:before {
          content: "\e6c1"; }

        .ti-align-left:before {
          content: "\e6c2"; }

        .ti-align-justify:before {
          content: "\e6c3"; }

        .ti-align-center:before {
          content: "\e6c4"; }

        .ti-alert:before {
          content: "\e6c5"; }

        .ti-alarm-clock:before {
          content: "\e6c6"; }

        .ti-agenda:before {
          content: "\e6c7"; }

        .ti-write:before {
          content: "\e6c8"; }

        .ti-window:before {
          content: "\e6c9"; }

        .ti-widgetized:before {
          content: "\e6ca"; }

        .ti-widget:before {
          content: "\e6cb"; }

        .ti-widget-alt:before {
          content: "\e6cc"; }

        .ti-wallet:before {
          content: "\e6cd"; }

        .ti-video-clapper:before {
          content: "\e6ce"; }

        .ti-video-camera:before {
          content: "\e6cf"; }

        .ti-vector:before {
          content: "\e6d0"; }

        .ti-themify-logo:before {
          content: "\e6d1"; }

        .ti-themify-favicon:before {
          content: "\e6d2"; }

        .ti-themify-favicon-alt:before {
          content: "\e6d3"; }

        .ti-support:before {
          content: "\e6d4"; }

        .ti-stamp:before {
          content: "\e6d5"; }

        .ti-split-v-alt:before {
          content: "\e6d6"; }

        .ti-slice:before {
          content: "\e6d7"; }

        .ti-shortcode:before {
          content: "\e6d8"; }

        .ti-shift-right-alt:before {
          content: "\e6d9"; }

        .ti-shift-left-alt:before {
          content: "\e6da"; }

        .ti-ruler-alt-2:before {
          content: "\e6db"; }

        .ti-receipt:before {
          content: "\e6dc"; }

        .ti-pin2:before {
          content: "\e6dd"; }

        .ti-pin-alt:before {
          content: "\e6de"; }

        .ti-pencil-alt2:before {
          content: "\e6df"; }

        .ti-palette:before {
          content: "\e6e0"; }

        .ti-more:before {
          content: "\e6e1"; }

        .ti-more-alt:before {
          content: "\e6e2"; }

        .ti-microphone-alt:before {
          content: "\e6e3"; }

        .ti-magnet:before {
          content: "\e6e4"; }

        .ti-line-double:before {
          content: "\e6e5"; }

        .ti-line-dotted:before {
          content: "\e6e6"; }

        .ti-line-dashed:before {
          content: "\e6e7"; }

        .ti-layout-width-full:before {
          content: "\e6e8"; }

        .ti-layout-width-default:before {
          content: "\e6e9"; }

        .ti-layout-width-default-alt:before {
          content: "\e6ea"; }

        .ti-layout-tab:before {
          content: "\e6eb"; }

        .ti-layout-tab-window:before {
          content: "\e6ec"; }

        .ti-layout-tab-v:before {
          content: "\e6ed"; }

        .ti-layout-tab-min:before {
          content: "\e6ee"; }

        .ti-layout-slider:before {
          content: "\e6ef"; }

        .ti-layout-slider-alt:before {
          content: "\e6f0"; }

        .ti-layout-sidebar-right:before {
          content: "\e6f1"; }

        .ti-layout-sidebar-none:before {
          content: "\e6f2"; }

        .ti-layout-sidebar-left:before {
          content: "\e6f3"; }

        .ti-layout-placeholder:before {
          content: "\e6f4"; }

        .ti-layout-menu:before {
          content: "\e6f5"; }

        .ti-layout-menu-v:before {
          content: "\e6f6"; }

        .ti-layout-menu-separated:before {
          content: "\e6f7"; }

        .ti-layout-menu-full:before {
          content: "\e6f8"; }

        .ti-layout-media-right-alt:before {
          content: "\e6f9"; }

        .ti-layout-media-right:before {
          content: "\e6fa"; }

        .ti-layout-media-overlay:before {
          content: "\e6fb"; }

        .ti-layout-media-overlay-alt:before {
          content: "\e6fc"; }

        .ti-layout-media-overlay-alt-2:before {
          content: "\e6fd"; }

        .ti-layout-media-left-alt:before {
          content: "\e6fe"; }

        .ti-layout-media-left:before {
          content: "\e6ff"; }

        .ti-layout-media-center-alt:before {
          content: "\e700"; }

        .ti-layout-media-center:before {
          content: "\e701"; }

        .ti-layout-list-thumb:before {
          content: "\e702"; }

        .ti-layout-list-thumb-alt:before {
          content: "\e703"; }

        .ti-layout-list-post:before {
          content: "\e704"; }

        .ti-layout-list-large-image:before {
          content: "\e705"; }

        .ti-layout-line-solid:before {
          content: "\e706"; }

        .ti-layout-grid4:before {
          content: "\e707"; }

        .ti-layout-grid3:before {
          content: "\e708"; }

        .ti-layout-grid2:before {
          content: "\e709"; }

        .ti-layout-grid2-thumb:before {
          content: "\e70a"; }

        .ti-layout-cta-right:before {
          content: "\e70b"; }

        .ti-layout-cta-left:before {
          content: "\e70c"; }

        .ti-layout-cta-center:before {
          content: "\e70d"; }

        .ti-layout-cta-btn-right:before {
          content: "\e70e"; }

        .ti-layout-cta-btn-left:before {
          content: "\e70f"; }

        .ti-layout-column4:before {
          content: "\e710"; }

        .ti-layout-column3:before {
          content: "\e711"; }

        .ti-layout-column2:before {
          content: "\e712"; }

        .ti-layout-accordion-separated:before {
          content: "\e713"; }

        .ti-layout-accordion-merged:before {
          content: "\e714"; }

        .ti-layout-accordion-list:before {
          content: "\e715"; }

        .ti-ink-pen:before {
          content: "\e716"; }

        .ti-info-alt:before {
          content: "\e717"; }

        .ti-help-alt:before {
          content: "\e718"; }

        .ti-headphone-alt:before {
          content: "\e719"; }

        .ti-hand-point-up:before {
          content: "\e71a"; }

        .ti-hand-point-right:before {
          content: "\e71b"; }

        .ti-hand-point-left:before {
          content: "\e71c"; }

        .ti-hand-point-down:before {
          content: "\e71d"; }

        .ti-gallery:before {
          content: "\e71e"; }

        .ti-face-smile:before {
          content: "\e71f"; }

        .ti-face-sad:before {
          content: "\e720"; }

        .ti-credit-card:before {
          content: "\e721"; }

        .ti-control-skip-forward:before {
          content: "\e722"; }

        .ti-control-skip-backward:before {
          content: "\e723"; }

        .ti-control-record:before {
          content: "\e724"; }

        .ti-control-eject:before {
          content: "\e725"; }

        .ti-comments-smiley:before {
          content: "\e726"; }

        .ti-brush-alt:before {
          content: "\e727"; }

        .ti-youtube:before {
          content: "\e728"; }

        .ti-vimeo:before {
          content: "\e729"; }

        .ti-twitter:before {
          content: "\e72a"; }

        .ti-time:before {
          content: "\e72b"; }

        .ti-tumblr:before {
          content: "\e72c"; }

        .ti-skype:before {
          content: "\e72d"; }

        .ti-share:before {
          content: "\e72e"; }

        .ti-share-alt:before {
          content: "\e72f"; }

        .ti-rocket:before {
          content: "\e730"; }

        .ti-pinterest:before {
          content: "\e731"; }

        .ti-new-window:before {
          content: "\e732"; }

        .ti-microsoft:before {
          content: "\e733"; }

        .ti-list-ol:before {
          content: "\e734"; }

        .ti-linkedin:before {
          content: "\e735"; }

        .ti-layout-sidebar-2:before {
          content: "\e736"; }

        .ti-layout-grid4-alt:before {
          content: "\e737"; }

        .ti-layout-grid3-alt:before {
          content: "\e738"; }

        .ti-layout-grid2-alt:before {
          content: "\e739"; }

        .ti-layout-column4-alt:before {
          content: "\e73a"; }

        .ti-layout-column3-alt:before {
          content: "\e73b"; }

        .ti-layout-column2-alt:before {
          content: "\e73c"; }

        .ti-instagram:before {
          content: "\e73d"; }

        .ti-google:before {
          content: "\e73e"; }

        .ti-github:before {
          content: "\e73f"; }

        .ti-flickr:before {
          content: "\e740"; }

        .ti-facebook:before {
          content: "\e741"; }

        .ti-dropbox:before {
          content: "\e742"; }

        .ti-dribbble:before {
          content: "\e743"; }

        .ti-apple:before {
          content: "\e744"; }

        .ti-android:before {
          content: "\e745"; }

        .ti-save:before {
          content: "\e746"; }

        .ti-save-alt:before {
          content: "\e747"; }

        .ti-yahoo:before {
          content: "\e748"; }

        .ti-wordpress:before {
          content: "\e749"; }

        .ti-vimeo-alt:before {
          content: "\e74a"; }

        .ti-twitter-alt:before {
          content: "\e74b"; }

        .ti-tumblr-alt:before {
          content: "\e74c"; }

        .ti-trello:before {
          content: "\e74d"; }

        .ti-stack-overflow:before {
          content: "\e74e"; }

        .ti-soundcloud:before {
          content: "\e74f"; }

        .ti-sharethis:before {
          content: "\e750"; }

        .ti-sharethis-alt:before {
          content: "\e751"; }

        .ti-reddit:before {
          content: "\e752"; }

        .ti-pinterest-alt:before {
          content: "\e753"; }

        .ti-microsoft-alt:before {
          content: "\e754"; }

        .ti-linux:before {
          content: "\e755"; }

        .ti-jsfiddle:before {
          content: "\e756"; }

        .ti-joomla:before {
          content: "\e757"; }

        .ti-html5:before {
          content: "\e758"; }

        .ti-flickr-alt:before {
          content: "\e759"; }

        .ti-email:before {
          content: "\e75a"; }

        .ti-drupal:before {
          content: "\e75b"; }

        .ti-dropbox-alt:before {
          content: "\e75c"; }

        .ti-css3:before {
          content: "\e75d"; }

        .ti-rss:before {
          content: "\e75e"; }

        .ti-rss-alt:before {
          content: "\e75f"; }

        [data-parallax],
        [data-video],
        .jarallax {
          position: relative;
          z-index: 0; }

        /* Slider */
        .slick-slider {
          position: relative;
          display: block;
          -webkit-box-sizing: border-box;
                  box-sizing: border-box;
          -webkit-touch-callout: none;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          touch-action: pan-y;
          -webkit-tap-highlight-color: transparent; }

        .slick-list {
          position: relative;
          overflow: hidden;
          display: block;
          margin: 0;
          padding: 0; }
          .slick-list:focus {
            outline: none; }
          .slick-list.dragging {
            cursor: pointer;
            cursor: hand; }

        .slick-slider .slick-track,
        .slick-slider .slick-list {
          -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0); }

        .slick-track {
          position: relative;
          left: 0;
          top: 0;
          display: block;
          margin-left: auto;
          margin-right: auto; }
          .slick-track:before, .slick-track:after {
            content: "";
            display: table; }
          .slick-track:after {
            clear: both; }
          .slick-loading .slick-track {
            visibility: hidden; }

        .slick-slide {
          float: left;
          height: 100%;
          min-height: 1px;
          display: none; }
          [dir="rtl"] .slick-slide {
            float: right; }
          .slick-slide img {
            display: block; }
          .slick-slide.slick-loading img {
            display: none; }
          .slick-slide.dragging img {
            pointer-events: none; }
          .slick-initialized .slick-slide {
            display: block; }
          .slick-loading .slick-slide {
            visibility: hidden; }
          .slick-vertical .slick-slide {
            display: block;
            height: auto;
            border: 1px solid transparent; }

        .slick-arrow.slick-hidden {
          display: none; }

        .slick-slide img {
          margin-left: auto;
          margin-right: auto;
          display: inline-block; }

        .slider-center-focused .slick-slide {
          opacity: 0.2;
          -webkit-transition: 0.5s ease-out;
          transition: 0.5s ease-out; }

        .slider-center-focused .slick-center {
          opacity: 1; }

        .slick-prev,
        .slick-next {
          position: absolute;
          display: block;
          height: 50px;
          width: 36px;
          line-height: 0px;
          font-size: 0px;
          cursor: pointer;
          top: 50%;
          -webkit-transform: translate(0, -50%);
                  transform: translate(0, -50%);
          padding: 0;
          border: none;
          outline: none;
          background-color: rgba(0, 0, 0, 0.2);
          -webkit-transition: .3s ease-out;
          transition: .3s ease-out;
          z-index: 1; }
          .slick-prev:hover,
          .slick-next:hover {
            outline: none;
            background-color: rgba(0, 0, 0, 0.3); }
            .slick-prev:hover::before,
            .slick-next:hover::before {
              border-right-color: #fff;
              border-bottom-color: #fff; }
          .slick-prev.slick-disabled::before,
          .slick-next.slick-disabled::before {
            opacity: 0.5; }
          .slick-prev::before,
          .slick-next::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-right: 1px solid rgba(255, 255, 255, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.7);
            -webkit-transition: 0.3s ease-out;
            transition: 0.3s ease-out; }

        .slick-prev {
          left: 0;
          border-top-right-radius: 4px;
          border-bottom-right-radius: 4px; }
          .slick-prev::before {
            -webkit-transform: rotate(135deg);
                    transform: rotate(135deg);
            margin-right: -2px; }

        .slick-next {
          right: 0;
          border-top-left-radius: 4px;
          border-bottom-left-radius: 4px; }
          .slick-next::before {
            -webkit-transform: rotate(-45deg);
                    transform: rotate(-45deg);
            margin-left: -2px; }

        .slider-arrows-circle-light .slick-prev,
        .slider-arrows-circle-light .slick-next {
          width: 40px;
          height: 40px;
          background-color: rgba(255, 255, 255, 0.95);
          border-radius: 10rem;
          border: 1px solid #eaeff4;
          opacity: 0.7; }
          .slider-arrows-circle-light .slick-prev::before,
          .slider-arrows-circle-light .slick-next::before {
            border-right-color: rgba(0, 0, 0, 0.3);
            border-bottom-color: rgba(0, 0, 0, 0.3); }
          .slider-arrows-circle-light .slick-prev:hover,
          .slider-arrows-circle-light .slick-next:hover {
            opacity: 1;
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.08); }
            .slider-arrows-circle-light .slick-prev:hover::before,
            .slider-arrows-circle-light .slick-next:hover::before {
              border-right-color: rgba(0, 0, 0, 0.5);
              border-bottom-color: rgba(0, 0, 0, 0.5); }

        .slider-arrows-circle-light .slick-prev {
          left: 1rem; }

        .slider-arrows-circle-light .slick-next {
          right: 1rem; }

        .slider-arrows-circle-dark .slick-prev,
        .slider-arrows-circle-dark .slick-next {
          width: 40px;
          height: 40px;
          background-color: rgba(0, 0, 0, 0.6);
          border-radius: 10rem;
          opacity: 0.7; }
          .slider-arrows-circle-dark .slick-prev::before,
          .slider-arrows-circle-dark .slick-next::before {
            border-right-color: rgba(255, 255, 255, 0.6);
            border-bottom-color: rgba(255, 255, 255, 0.6); }
          .slider-arrows-circle-dark .slick-prev:hover,
          .slider-arrows-circle-dark .slick-next:hover {
            opacity: 1;
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.08); }
            .slider-arrows-circle-dark .slick-prev:hover::before,
            .slider-arrows-circle-dark .slick-next:hover::before {
              border-right-color: rgba(255, 255, 255, 0.9);
              border-bottom-color: rgba(255, 255, 255, 0.9); }

        .slider-arrows-circle-dark .slick-prev {
          left: 1rem; }

        .slider-arrows-circle-dark .slick-next {
          right: 1rem; }

        .slider-arrows-flash-dark .slick-prev,
        .slider-arrows-flash-dark .slick-next {
          width: 40px;
          height: 40px;
          background-color: transparent; }
          .slider-arrows-flash-dark .slick-prev::before,
          .slider-arrows-flash-dark .slick-next::before {
            position: absolute;
            top: 50%;
            width: 11px;
            height: 11px;
            margin-top: -5px;
            border-width: 1px;
            border-right-color: rgba(0, 0, 0, 0.2);
            border-bottom-color: rgba(0, 0, 0, 0.2); }
          .slider-arrows-flash-dark .slick-prev::after,
          .slider-arrows-flash-dark .slick-next::after {
            content: '';
            display: inline-block;
            position: absolute;
            top: 50%;
            width: 24px;
            height: 1px;
            background-color: rgba(0, 0, 0, 0.2);
            -webkit-transition: 0.3s ease-out;
            transition: 0.3s ease-out; }
          .slider-arrows-flash-dark .slick-prev:hover::before,
          .slider-arrows-flash-dark .slick-next:hover::before {
            border-right-color: rgba(0, 0, 0, 0.5);
            border-bottom-color: rgba(0, 0, 0, 0.5); }
          .slider-arrows-flash-dark .slick-prev:hover::after,
          .slider-arrows-flash-dark .slick-next:hover::after {
            background-color: rgba(0, 0, 0, 0.5); }

        .slider-arrows-flash-dark .slick-prev {
          left: 1rem; }
          .slider-arrows-flash-dark .slick-prev::before, .slider-arrows-flash-dark .slick-prev::after {
            left: 9px; }

        .slider-arrows-flash-dark .slick-next {
          right: 1rem; }
          .slider-arrows-flash-dark .slick-next::before, .slider-arrows-flash-dark .slick-next::after {
            right: 9px; }

        .slider-arrows-flash-light .slick-prev,
        .slider-arrows-flash-light .slick-next {
          width: 40px;
          height: 40px;
          background-color: transparent; }
          .slider-arrows-flash-light .slick-prev::before,
          .slider-arrows-flash-light .slick-next::before {
            position: absolute;
            top: 50%;
            width: 11px;
            height: 11px;
            margin-top: -5px;
            border-width: 1px;
            border-right-color: rgba(255, 255, 255, 0.5);
            border-bottom-color: rgba(255, 255, 255, 0.5); }
          .slider-arrows-flash-light .slick-prev::after,
          .slider-arrows-flash-light .slick-next::after {
            content: '';
            display: inline-block;
            position: absolute;
            top: 50%;
            width: 24px;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.5);
            -webkit-transition: 0.3s ease-out;
            transition: 0.3s ease-out; }
          .slider-arrows-flash-light .slick-prev:hover::before,
          .slider-arrows-flash-light .slick-next:hover::before {
            border-right-color: rgba(255, 255, 255, 0.9);
            border-bottom-color: rgba(255, 255, 255, 0.9); }
          .slider-arrows-flash-light .slick-prev:hover::after,
          .slider-arrows-flash-light .slick-next:hover::after {
            background-color: rgba(255, 255, 255, 0.9); }

        .slider-arrows-flash-light .slick-prev {
          left: 1rem; }
          .slider-arrows-flash-light .slick-prev::before, .slider-arrows-flash-light .slick-prev::after {
            left: 9px; }

        .slider-arrows-flash-light .slick-next {
          right: 1rem; }
          .slider-arrows-flash-light .slick-next::before, .slider-arrows-flash-light .slick-next::after {
            right: 9px; }

        .slick-dotted.slick-slider {
          margin-bottom: 35px; }

        .slick-dots {
          position: absolute;
          bottom: -35px;
          list-style: none;
          display: -webkit-box;
          display: flex;
          align-content: center;
          -webkit-box-pack: center;
                  justify-content: center;
          padding: 0;
          margin: 0;
          width: 100%; }
          .slick-dots li {
            margin: 0 5px;
            padding: 8px 6px;
            line-height: 1px;
            cursor: pointer; }
            .slick-dots li button {
              border: 1px solid #929daf;
              padding: 0;
              background: transparent;
              height: 6px;
              width: 6px;
              border-radius: 10rem;
              font-size: 0;
              cursor: pointer;
              -webkit-transition: .3s ease;
              transition: .3s ease; }
              .slick-dots li button:hover {
                outline: none; }
            .slick-dots li.slick-active button {
              background-color: #929daf; }

        .slider-dots-inside.slick-slider {
          margin-bottom: 0; }
          .slider-dots-inside.slick-slider .slick-dots {
            bottom: 1rem;
            opacity: 0.8; }

        .slider-dots-fill .slick-dots button {
          border: none;
          background-color: #eaeff4; }

        .slider-dots-fill .slick-dots .slick-active button {
          background-color: #929daf; }

        .slider-dots-fill-primary .slick-dots button {
          border: none;
          background-color: #eaeff4; }

        .slider-dots-fill-primary .slick-dots .slick-active button {
          background-color: #50a1ff; }

        .slider-dots-line .slick-dots li {
          padding-left: 2px;
          padding-right: 2px; }

        .slider-dots-line .slick-dots button {
          border: none;
          width: 24px;
          height: 2px;
          background-color: #eaeff4; }

        .slider-dots-line .slick-dots .slick-active button {
          width: 34px;
          background-color: #929daf; }

        .slider-dots-white .slick-dots button {
          border-color: rgba(255, 255, 255, 0.7);
          background-color: rgba(255, 255, 255, 0.5); }

        .slider-dots-white .slick-dots .slick-active button {
          background-color: rgba(255, 255, 255, 0.95); }

        /*! Lity - v2.3.1 - 2018-04-20
        * http://sorgalla.com/lity/
        * Copyright (c) 2015-2018 Jan Sorgalla; Licensed MIT */
        .lity {
          z-index: 9990;
          position: fixed;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          white-space: nowrap;
          background: #0b0b0b;
          background: rgba(0, 0, 0, 0.9);
          outline: none !important;
          opacity: 0;
          -webkit-transition: opacity 0.3s ease;
          transition: opacity 0.3s ease; }

        .lity.lity-opened {
          opacity: 1; }

        .lity.lity-closed {
          opacity: 0; }

        .lity * {
          -webkit-box-sizing: border-box;
          box-sizing: border-box; }

        .lity-wrap {
          z-index: 9990;
          position: fixed;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          text-align: center;
          outline: none !important; }

        .lity-wrap:before {
          content: '';
          display: inline-block;
          height: 100%;
          vertical-align: middle;
          margin-right: -0.25em; }

        .lity-loader {
          z-index: 9991;
          color: #fff;
          position: absolute;
          top: 50%;
          margin-top: -0.8em;
          width: 100%;
          text-align: center;
          font-size: 14px;
          font-family: Arial, Helvetica, sans-serif;
          opacity: 0;
          -webkit-transition: opacity 0.3s ease;
          transition: opacity 0.3s ease; }

        .lity-loading .lity-loader {
          opacity: 1; }

        .lity-container {
          z-index: 9992;
          position: relative;
          text-align: left;
          vertical-align: middle;
          display: inline-block;
          white-space: normal;
          max-width: 100%;
          max-height: 100%;
          outline: none !important; }

        .lity-content {
          z-index: 9993;
          width: 100%;
          -webkit-transform: scale(1);
          transform: scale(1);
          -webkit-transition: -webkit-transform 0.3s ease;
          transition: -webkit-transform 0.3s ease;
          transition: transform 0.3s ease;
          transition: transform 0.3s ease, -webkit-transform 0.3s ease; }

        .lity-loading .lity-content,
        .lity-closed .lity-content {
          -webkit-transform: scale(0.8);
          transform: scale(0.8); }

        .lity-content:after {
          content: '';
          position: absolute;
          left: 0;
          top: 0;
          bottom: 0;
          display: block;
          right: 0;
          width: auto;
          height: auto;
          z-index: -1;
          -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
          box-shadow: 0 0 8px rgba(0, 0, 0, 0.6); }

        .lity-close {
          z-index: 9994;
          width: 35px;
          height: 35px;
          position: fixed;
          right: 0;
          top: 0;
          -webkit-appearance: none;
          cursor: pointer;
          text-decoration: none;
          text-align: center;
          padding: 0;
          color: #fff;
          font-style: normal;
          font-size: 35px;
          font-family: Arial, Baskerville, monospace;
          line-height: 35px;
          text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
          border: 0;
          background: none;
          outline: none;
          -webkit-box-shadow: none;
          box-shadow: none; }

        .lity-close::-moz-focus-inner {
          border: 0;
          padding: 0; }

        .lity-close:hover,
        .lity-close:focus,
        .lity-close:active,
        .lity-close:visited {
          text-decoration: none;
          text-align: center;
          padding: 0;
          color: #fff;
          font-style: normal;
          font-size: 35px;
          font-family: Arial, Baskerville, monospace;
          line-height: 35px;
          text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
          border: 0;
          background: none;
          outline: none;
          -webkit-box-shadow: none;
          box-shadow: none; }

        .lity-close:active {
          top: 1px; }

        /* Image */
        .lity-image img {
          max-width: 100%;
          display: block;
          line-height: 0;
          border: 0; }

        /* iFrame */
        .lity-iframe .lity-container,
        .lity-youtube .lity-container,
        .lity-vimeo .lity-container,
        .lity-facebookvideo .lity-container,
        .lity-googlemaps .lity-container {
          width: 100%;
          max-width: 964px; }

        .lity-iframe-container {
          width: 100%;
          height: 0;
          padding-top: 56.25%;
          overflow: auto;
          pointer-events: auto;
          -webkit-transform: translateZ(0);
          transform: translateZ(0);
          -webkit-overflow-scrolling: touch; }

        .lity-iframe-container iframe {
          position: absolute;
          display: block;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
          box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
          background: #000; }

        .lity-hide {
          display: none; }

        .lity-close {
          font-family: "Open Sans", sans-serif;
          font-weight: 100;
          opacity: 0.6;
          padding: 0.5rem 1rem;
          width: auto;
          height: auto;
          -webkit-transition: 0.3s ease;
          transition: 0.3s ease; }
          .lity-close:hover,
          .lity-close:focus,
          .lity-close:active,
          .lity-close:visited {
            font-family: "Open Sans", sans-serif;
            font-weight: 100;
            opacity: 1;
            padding: 0.5rem 1rem; }
          .lity-close:active {
            top: 0; }

        .lity-iframe-container iframe {
          -webkit-box-shadow: none;
                  box-shadow: none; }

        /*! PhotoSwipe main CSS by Dmitry Semenov | photoswipe.com | MIT license */
        /*
          Styles for basic PhotoSwipe functionality (sliding area, open/close transitions)
        */
        /* pswp = photoswipe */
        .pswp {
          display: none;
          position: absolute;
          width: 100%;
          height: 100%;
          left: 0;
          top: 0;
          overflow: hidden;
          touch-action: none;
          z-index: 1500;
          -webkit-text-size-adjust: 100%;
          /* create separate layer, to avoid paint on window.onscroll in webkit/blink */
          -webkit-backface-visibility: hidden;
          outline: none; }
          .pswp * {
            -webkit-box-sizing: border-box;
                    box-sizing: border-box; }
          .pswp img {
            max-width: none; }

        /* style is added when JS option showHideOpacity is set to true */
        .pswp--animate_opacity {
          /* 0.001, because opacity:0 doesn't trigger Paint action, which causes lag at start of transition */
          opacity: 0.001;
          will-change: opacity;
          /* for open/close transition */
          -webkit-transition: opacity 333ms cubic-bezier(0.4, 0, 0.22, 1);
          transition: opacity 333ms cubic-bezier(0.4, 0, 0.22, 1); }

        .pswp--open {
          display: block; }

        .pswp--zoom-allowed .pswp__img {
          /* autoprefixer: off */
          cursor: -webkit-zoom-in;
          cursor: -moz-zoom-in;
          cursor: zoom-in; }

        .pswp--zoomed-in .pswp__img {
          /* autoprefixer: off */
          cursor: -webkit-grab;
          cursor: -moz-grab;
          cursor: grab; }

        .pswp--dragging .pswp__img {
          /* autoprefixer: off */
          cursor: -webkit-grabbing;
          cursor: -moz-grabbing;
          cursor: grabbing; }

        /*
          Background is added as a separate element.
          As animating opacity is much faster than animating rgba() background-color.
        */
        .pswp__bg {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          background: #000;
          opacity: 0;
          -webkit-transform: translateZ(0);
                  transform: translateZ(0);
          -webkit-backface-visibility: hidden;
          will-change: opacity; }

        .pswp__scroll-wrap {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: hidden; }

        .pswp__container,
        .pswp__zoom-wrap {
          touch-action: none;
          position: absolute;
          left: 0;
          right: 0;
          top: 0;
          bottom: 0; }

        /* Prevent selection and tap highlights */
        .pswp__container,
        .pswp__img {
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
              user-select: none;
          -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
          -webkit-touch-callout: none; }

        .pswp__zoom-wrap {
          position: absolute;
          width: 100%;
          -webkit-transform-origin: left top;
          transform-origin: left top;
          /* for open/close transition */
          -webkit-transition: -webkit-transform 333ms cubic-bezier(0.4, 0, 0.22, 1);
          transition: -webkit-transform 333ms cubic-bezier(0.4, 0, 0.22, 1);
          transition: transform 333ms cubic-bezier(0.4, 0, 0.22, 1);
          transition: transform 333ms cubic-bezier(0.4, 0, 0.22, 1), -webkit-transform 333ms cubic-bezier(0.4, 0, 0.22, 1); }

        .pswp__bg {
          will-change: opacity;
          /* for open/close transition */
          -webkit-transition: opacity 333ms cubic-bezier(0.4, 0, 0.22, 1);
          transition: opacity 333ms cubic-bezier(0.4, 0, 0.22, 1); }

        .pswp--animated-in .pswp__bg,
        .pswp--animated-in .pswp__zoom-wrap {
          -webkit-transition: none;
          transition: none; }

        .pswp__container,
        .pswp__zoom-wrap {
          -webkit-backface-visibility: hidden; }

        .pswp__item {
          position: absolute;
          left: 0;
          right: 0;
          top: 0;
          bottom: 0;
          overflow: hidden; }

        .pswp__img {
          position: absolute;
          width: auto;
          height: auto;
          top: 0;
          left: 0; }

        /*
          stretched thumbnail or div placeholder element (see below)
          style is added to avoid flickering in webkit/blink when layers overlap
        */
        .pswp__img--placeholder {
          -webkit-backface-visibility: hidden; }

        /*
          div element that matches size of large image
          large image loads on top of it
        */
        .pswp__img--placeholder--blank {
          background: #222; }

        .pswp--ie .pswp__img {
          width: 100% !important;
          height: auto !important;
          left: 0;
          top: 0; }

        /*
          Error message appears when image is not loaded
          (JS option errorMsg controls markup)
        */
        .pswp__error-msg {
          position: absolute;
          left: 0;
          top: 50%;
          width: 100%;
          text-align: center;
          font-size: 14px;
          line-height: 16px;
          margin-top: -8px;
          color: #CCC; }

        .pswp__error-msg a {
          color: #CCC;
          text-decoration: underline; }

        /*! PhotoSwipe Default UI CSS by Dmitry Semenov | photoswipe.com | MIT license */
        /*

          Contents:

          1. Buttons
          2. Share modal and links
          3. Index indicator ("1 of X" counter)
          4. Caption
          5. Loading indicator
          6. Additional styles (root element, top bar, idle state, hidden state, etc.)

        */
        /*
          
          1. Buttons

        */
        /* <button> css reset */
        .pswp__button {
          width: 44px;
          height: 44px;
          position: relative;
          background: none;
          cursor: pointer;
          overflow: visible;
          -webkit-appearance: none;
          display: block;
          border: 0;
          padding: 0;
          margin: 0;
          float: right;
          opacity: 0.75;
          -webkit-transition: opacity 0.2s;
          transition: opacity 0.2s;
          -webkit-box-shadow: none;
                  box-shadow: none; }
          .pswp__button:focus, .pswp__button:hover {
            opacity: 1; }
          .pswp__button:active {
            outline: none;
            opacity: 0.9; }
          .pswp__button::-moz-focus-inner {
            padding: 0;
            border: 0; }

        /* pswp__ui--over-close class it added when mouse is over element that should close gallery */
        .pswp__ui--over-close .pswp__button--close {
          opacity: 1; }

        .pswp__button,
        .pswp__button--arrow--left:before,
        .pswp__button--arrow--right:before {
          -webkit-background-size: 264px 88px;
                  background-size: 264px 88px;
          width: 44px;
          height: 44px; }

        @media (-webkit-min-device-pixel-ratio: 1.1), (-webkit-min-device-pixel-ratio: 1.09375), (min-resolution: 105dpi), (min-resolution: 1.1dppx) {
          /* Serve SVG sprite if browser supports SVG and resolution is more than 105dpi */
          .pswp--svg .pswp__button,
          .pswp--svg .pswp__button--arrow--left:before,
          .pswp--svg .pswp__button--arrow--right:before {
          }
          .pswp--svg .pswp__button--arrow--left,
          .pswp--svg .pswp__button--arrow--right {
            background: none; } }

        .pswp__button--close {
          background-position: 0 -44px; }

        .pswp__button--share {
          background-position: -44px -44px; }

        .pswp__button--fs {
          display: none; }

        .pswp--supports-fs .pswp__button--fs {
          display: block; }

        .pswp--fs .pswp__button--fs {
          background-position: -44px 0; }

        .pswp__button--zoom {
          display: none;
          background-position: -88px 0; }

        .pswp--zoom-allowed .pswp__button--zoom {
          display: block; }

        .pswp--zoomed-in .pswp__button--zoom {
          background-position: -132px 0; }

        /* no arrows on touch screens */
        .pswp--touch .pswp__button--arrow--left,
        .pswp--touch .pswp__button--arrow--right {
          visibility: hidden; }

        /*
          Arrow buttons hit area
          (icon is added to :before pseudo-element)
        */
        .pswp__button--arrow--left,
        .pswp__button--arrow--right {
          background: none;
          top: 50%;
          margin-top: -50px;
          width: 70px;
          height: 100px;
          position: absolute; }

        .pswp__button--arrow--left {
          left: 0; }

        .pswp__button--arrow--right {
          right: 0; }

        .pswp__button--arrow--left:before,
        .pswp__button--arrow--right:before {
          content: '';
          top: 35px;
          background-color: rgba(0, 0, 0, 0.3);
          height: 30px;
          width: 32px;
          position: absolute; }

        .pswp__button--arrow--left:before {
          left: 6px;
          background-position: -138px -44px; }

        .pswp__button--arrow--right:before {
          right: 6px;
          background-position: -94px -44px; }

        /*

          2. Share modal/popup and links

        */
        .pswp__counter,
        .pswp__share-modal {
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
              user-select: none; }

        .pswp__share-modal {
          display: block;
          background: rgba(0, 0, 0, 0.5);
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          padding: 10px;
          position: absolute;
          z-index: 1600;
          opacity: 0;
          -webkit-transition: opacity 0.25s ease-out;
          transition: opacity 0.25s ease-out;
          -webkit-backface-visibility: hidden;
          will-change: opacity; }

        .pswp__share-modal--hidden {
          display: none; }

        .pswp__share-tooltip {
          z-index: 1620;
          position: absolute;
          background: #FFF;
          top: 56px;
          border-radius: 2px;
          display: block;
          width: auto;
          right: 44px;
          -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
                  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
          -webkit-transform: translateY(6px);
                  transform: translateY(6px);
          -webkit-transition: -webkit-transform 0.25s;
          transition: -webkit-transform 0.25s;
          transition: transform 0.25s;
          transition: transform 0.25s, -webkit-transform 0.25s;
          -webkit-backface-visibility: hidden;
          will-change: transform; }
          .pswp__share-tooltip a {
            display: block;
            padding: 8px 12px;
            color: #000;
            text-decoration: none;
            font-size: 14px;
            line-height: 18px; }
            .pswp__share-tooltip a:hover {
              text-decoration: none;
              color: #000; }
            .pswp__share-tooltip a:first-child {
              /* round corners on the first/last list item */
              border-radius: 2px 2px 0 0; }
            .pswp__share-tooltip a:last-child {
              border-radius: 0 0 2px 2px; }

        .pswp__share-modal--fade-in {
          opacity: 1; }
          .pswp__share-modal--fade-in .pswp__share-tooltip {
            -webkit-transform: translateY(0);
                    transform: translateY(0); }

        /* increase size of share links on touch devices */
        .pswp--touch .pswp__share-tooltip a {
          padding: 16px 12px; }

        a.pswp__share--facebook:before {
          content: '';
          display: block;
          width: 0;
          height: 0;
          position: absolute;
          top: -12px;
          right: 15px;
          border: 6px solid rgba(0, 0, 0, 0);
          border-bottom-color: #FFF;
          -webkit-pointer-events: none;
          -moz-pointer-events: none;
          pointer-events: none; }

        a.pswp__share--facebook:hover {
          background: #3E5C9A;
          color: #FFF; }
          a.pswp__share--facebook:hover:before {
            border-bottom-color: #3E5C9A; }

        a.pswp__share--twitter:hover {
          background: #55ACEE;
          color: #FFF; }

        a.pswp__share--pinterest:hover {
          background: #CCC;
          color: #CE272D; }

        a.pswp__share--download:hover {
          background: #DDD; }

        /*

          3. Index indicator ("1 of X" counter)

        */
        .pswp__counter {
          position: absolute;
          left: 0;
          top: 0;
          height: 44px;
          font-size: 13px;
          line-height: 44px;
          color: #FFF;
          opacity: 0.75;
          padding: 0 10px; }

        /*
          
          4. Caption

        */
        .pswp__caption {
          position: absolute;
          left: 0;
          bottom: 0;
          width: 100%;
          min-height: 44px; }
          .pswp__caption small {
            font-size: 11px;
            color: #BBB; }

        .pswp__caption__center {
          text-align: left;
          max-width: 420px;
          margin: 0 auto;
          font-size: 13px;
          padding: 10px;
          line-height: 20px;
          color: #CCC; }

        .pswp__caption--empty {
          display: none; }

        /* Fake caption element, used to calculate height of next/prev image */
        .pswp__caption--fake {
          visibility: hidden; }

        /*

          5. Loading indicator (preloader)

          You can play with it here - http://codepen.io/dimsemenov/pen/yyBWoR

        */
        .pswp__preloader {
          width: 44px;
          height: 44px;
          position: absolute;
          top: 0;
          left: 50%;
          margin-left: -22px;
          opacity: 0;
          -webkit-transition: opacity 0.25s ease-out;
          transition: opacity 0.25s ease-out;
          will-change: opacity;
          direction: ltr; }

        .pswp__preloader__icn {
          width: 20px;
          height: 20px;
          margin: 12px; }

        .pswp__preloader--active {
          opacity: 1; }
          .pswp__preloader--active .pswp__preloader__icn {
            /* We use .gif in browsers that don't support CSS animation */
        }

        .pswp--css_animation .pswp__preloader--active {
          opacity: 1; }
          .pswp--css_animation .pswp__preloader--active .pswp__preloader__icn {
            -webkit-animation: clockwise 500ms linear infinite;
                    animation: clockwise 500ms linear infinite; }
          .pswp--css_animation .pswp__preloader--active .pswp__preloader__donut {
            -webkit-animation: donut-rotate 1000ms cubic-bezier(0.4, 0, 0.22, 1) infinite;
                    animation: donut-rotate 1000ms cubic-bezier(0.4, 0, 0.22, 1) infinite; }

        .pswp--css_animation .pswp__preloader__icn {
          background: none;
          opacity: 0.75;
          width: 14px;
          height: 14px;
          position: absolute;
          left: 15px;
          top: 15px;
          margin: 0; }

        .pswp--css_animation .pswp__preloader__cut {
          /* 
              The idea of animating inner circle is based on Polymer ("material") loading indicator 
              by Keanu Lee https://blog.keanulee.com/2014/10/20/the-tale-of-three-spinners.html
            */
          position: relative;
          width: 7px;
          height: 14px;
          overflow: hidden; }

        .pswp--css_animation .pswp__preloader__donut {
          -webkit-box-sizing: border-box;
                  box-sizing: border-box;
          width: 14px;
          height: 14px;
          border: 2px solid #FFF;
          border-radius: 50%;
          border-left-color: transparent;
          border-bottom-color: transparent;
          position: absolute;
          top: 0;
          left: 0;
          background: none;
          margin: 0; }

        @media screen and (max-width: 1024px) {
          .pswp__preloader {
            position: relative;
            left: auto;
            top: auto;
            margin: 0;
            float: right; } }

        @-webkit-keyframes clockwise {
          0% {
            -webkit-transform: rotate(0deg);
                    transform: rotate(0deg); }
          100% {
            -webkit-transform: rotate(360deg);
                    transform: rotate(360deg); } }

        @keyframes clockwise {
          0% {
            -webkit-transform: rotate(0deg);
                    transform: rotate(0deg); }
          100% {
            -webkit-transform: rotate(360deg);
                    transform: rotate(360deg); } }

        @-webkit-keyframes donut-rotate {
          0% {
            -webkit-transform: rotate(0);
                    transform: rotate(0); }
          50% {
            -webkit-transform: rotate(-140deg);
                    transform: rotate(-140deg); }
          100% {
            -webkit-transform: rotate(0);
                    transform: rotate(0); } }

        @keyframes donut-rotate {
          0% {
            -webkit-transform: rotate(0);
                    transform: rotate(0); }
          50% {
            -webkit-transform: rotate(-140deg);
                    transform: rotate(-140deg); }
          100% {
            -webkit-transform: rotate(0);
                    transform: rotate(0); } }

        /*
          
          6. Additional styles

        */
        /* root element of UI */
        .pswp__ui {
          -webkit-font-smoothing: auto;
          visibility: visible;
          opacity: 1;
          z-index: 1550; }

        /* top black bar with buttons and "1 of X" indicator */
        .pswp__top-bar {
          position: absolute;
          left: 0;
          top: 0;
          height: 44px;
          width: 100%; }

        .pswp__caption,
        .pswp__top-bar,
        .pswp--has_mouse .pswp__button--arrow--left,
        .pswp--has_mouse .pswp__button--arrow--right {
          -webkit-backface-visibility: hidden;
          will-change: opacity;
          -webkit-transition: opacity 333ms cubic-bezier(0.4, 0, 0.22, 1);
          transition: opacity 333ms cubic-bezier(0.4, 0, 0.22, 1); }

        /* pswp--has_mouse class is added only when two subsequent mousemove events occur */
        .pswp--has_mouse .pswp__button--arrow--left,
        .pswp--has_mouse .pswp__button--arrow--right {
          visibility: visible; }

        .pswp__top-bar,
        .pswp__caption {
          background-color: rgba(0, 0, 0, 0.5); }

        /* pswp__ui--fit class is added when main image "fits" between top bar and bottom bar (caption) */
        .pswp__ui--fit .pswp__top-bar,
        .pswp__ui--fit .pswp__caption {
          background-color: rgba(0, 0, 0, 0.3); }

        /* pswp__ui--idle class is added when mouse isn't moving for several seconds (JS option timeToIdle) */
        .pswp__ui--idle .pswp__top-bar {
          opacity: 0; }

        .pswp__ui--idle .pswp__button--arrow--left,
        .pswp__ui--idle .pswp__button--arrow--right {
          opacity: 0; }

        /*
          pswp__ui--hidden class is added when controls are hidden
          e.g. when user taps to toggle visibility of controls
        */
        .pswp__ui--hidden .pswp__top-bar,
        .pswp__ui--hidden .pswp__caption,
        .pswp__ui--hidden .pswp__button--arrow--left,
        .pswp__ui--hidden .pswp__button--arrow--right {
          /* Force paint & create composition layer for controls. */
          opacity: 0.001; }

        /* pswp__ui--one-slide class is added when there is just one item in gallery */
        .pswp__ui--one-slide .pswp__button--arrow--left,
        .pswp__ui--one-slide .pswp__button--arrow--right,
        .pswp__ui--one-slide .pswp__counter {
          display: none; }

        .pswp__element--disabled {
          display: none !important; }

        .pswp--minimal--dark .pswp__top-bar {
          background: none; }

        .typed-cursor {
          font-weight: 200;
          opacity: 1;
          -webkit-animation: blink 0.7s infinite;
                  animation: blink 0.7s infinite; }

        [data-type].text-primary + .typed-cursor {
          color: #50a1ff; }

        [data-type].text-secondary + .typed-cursor {
          color: #e9ecf0; }

        [data-type].text-success + .typed-cursor {
          color: #3cd458; }

        [data-type].text-info + .typed-cursor {
          color: #926dde; }

        [data-type].text-warning + .typed-cursor {
          color: #ffba00; }

        [data-type].text-danger + .typed-cursor {
          color: #ff4954; }

        [data-type].text-light + .typed-cursor {
          color: #f8f9fa; }

        [data-type].text-dark + .typed-cursor {
          color: #191919; }

        @-webkit-keyframes blink {
          0% {
            opacity: 1; }
          50% {
            opacity: 0; }
          100% {
            opacity: 1; } }

        @keyframes blink {
          0% {
            opacity: 1; }
          50% {
            opacity: 0; }
          100% {
            opacity: 1; } }

        a {
          color: #50a1ff;
          -webkit-transition: .2s linear;
          transition: .2s linear; }
          a:hover, a:focus {
            color: #50a1ff;
            text-decoration: none;
            outline: none; }
          a.anchor::before {
            content: '#';
            vertical-align: text-bottom; }

        .link-color-default a {
          color: #757575; }
          .link-color-default a:hover, .link-color-default a:focus {
            color: #50a1ff; }

        b,
        strong {
          font-weight: 600; }

        del {
          opacity: .6; }

        .semibold {
          font-weight: 400; }

        .lead, .pricing-4 .plan-price p {
          font-size: 1.125rem; }

        .label {
          display: block;
          font-weight: 600;
          font-size: 13px;
          text-transform: uppercase;
          letter-spacing: 2px; }

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
          color: #323d47;
          letter-spacing: 0.5px; }
          h1 small, h2 small, h3 small, h4 small, h5 small, h6 small,
          .h1 small, .h2 small, .h3 small, .h4 small, .h5 small, .h6 small {
            font-size: 65%;
            color: #929daf; }
          h1 strong,
          h1 b, h2 strong,
          h2 b, h3 strong,
          h3 b, h4 strong,
          h4 b, h5 strong,
          h5 b, h6 strong,
          h6 b,
          .h1 strong,
          .h1 b, .h2 strong,
          .h2 b, .h3 strong,
          .h3 b, .h4 strong,
          .h4 b, .h5 strong,
          .h5 b, .h6 strong,
          .h6 b {
            font-weight: 500; }
          h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
          .h1 a, .h2 a, .h3 a, .h4 a, .h5 a, .h6 a {
            color: #323d47; }
            h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
            .h1 a:hover, .h2 a:hover, .h3 a:hover, .h4 a:hover, .h5 a:hover, .h6 a:hover {
              color: #50a1ff; }
          h1 .anchor, h2 .anchor, h3 .anchor, h4 .anchor, h5 .anchor, h6 .anchor,
          .h1 .anchor, .h2 .anchor, .h3 .anchor, .h4 .anchor, .h5 .anchor, .h6 .anchor {
            position: absolute;
            right: 100%;
            opacity: 0;
            color: #50a1ff; }
          h1.anchor-visible .anchor,
          h1:hover .anchor, h2.anchor-visible .anchor,
          h2:hover .anchor, h3.anchor-visible .anchor,
          h3:hover .anchor, h4.anchor-visible .anchor,
          h4:hover .anchor, h5.anchor-visible .anchor,
          h5:hover .anchor, h6.anchor-visible .anchor,
          h6:hover .anchor,
          .h1.anchor-visible .anchor,
          .h1:hover .anchor, .h2.anchor-visible .anchor,
          .h2:hover .anchor, .h3.anchor-visible .anchor,
          .h3:hover .anchor, .h4.anchor-visible .anchor,
          .h4:hover .anchor, .h5.anchor-visible .anchor,
          .h5:hover .anchor, .h6.anchor-visible .anchor,
          .h6:hover .anchor {
            opacity: 0.5; }
            h1.anchor-visible .anchor:hover,
            h1:hover .anchor:hover, h2.anchor-visible .anchor:hover,
            h2:hover .anchor:hover, h3.anchor-visible .anchor:hover,
            h3:hover .anchor:hover, h4.anchor-visible .anchor:hover,
            h4:hover .anchor:hover, h5.anchor-visible .anchor:hover,
            h5:hover .anchor:hover, h6.anchor-visible .anchor:hover,
            h6:hover .anchor:hover,
            .h1.anchor-visible .anchor:hover,
            .h1:hover .anchor:hover, .h2.anchor-visible .anchor:hover,
            .h2:hover .anchor:hover, .h3.anchor-visible .anchor:hover,
            .h3:hover .anchor:hover, .h4.anchor-visible .anchor:hover,
            .h4:hover .anchor:hover, .h5.anchor-visible .anchor:hover,
            .h5:hover .anchor:hover, .h6.anchor-visible .anchor:hover,
            .h6:hover .anchor:hover {
              opacity: 0.8; }

        h1, .h1 {
          font-weight: 400; }

        h2, .h2 {
          font-weight: 400; }

        h3, .h3 {
          font-weight: 400; }

        h4, .h4 {
          font-weight: 400; }

        h5, .h5 {
          font-weight: 400; }

        h6, .h6 {
          font-weight: 500; }

        h6, .h6 {
          letter-spacing: 0.75px; }
          h6.bold, .h6.bold {
            text-transform: uppercase;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: .5px; }
            h6.bold::before, .h6.bold::before {
              content: '\2014 \00A0'; }

        .heading-alt {
          font-family: "Open Sans", sans-serif;
          letter-spacing: 0; }

        .blockquote {
          text-align: center;
          margin-bottom: 2rem; }
          .blockquote .quote-sign::before {
            content: '“';
            display: block;
            font-size: 9rem;
            line-height: .2;
            font-weight: 600;
            padding-top: 4rem;
            opacity: .1; }
          .blockquote .quote-sign-end::before {
            content: '”'; }
          .blockquote p::before,
          .blockquote p::after {
            font-size: 1.5rem;
            line-height: 1;
            opacity: .5; }
          .blockquote p::before {
            content: '“';
            margin-left: -13px;
            padding-right: 4px; }
          .blockquote p::after {
            content: '”';
            margin-right: -13px;
            padding-left: 4px; }
          .blockquote footer {
            color: #757575;
            font-size: 0.875rem;
            margin-top: 1.5rem; }
            .blockquote footer::before {
              content: '\2014';
              margin-right: 0.5rem; }
          @media (max-width: 991.98px) {
            .blockquote {
              padding-left: 2rem;
              padding-right: 2rem;
              margin-bottom: 2rem; }
              .blockquote .quote-sign::before {
                font-size: 5rem; } }

        .text-quoted::before, .text-quoted::after {
          opacity: .7; }

        .text-quoted::before {
          content: '“';
          padding-right: 2px; }

        .text-quoted::after {
          content: '”';
          padding-left: 2px; }

        hr {
          border-top-color: rgba(117, 117, 117, 0.09);
          margin: 2rem auto; }

        .hr-dash {
          border-top-style: dashed; }

        .hr-dot {
          border-top-style: dotted; }

        .hr-light {
          border-top-color: rgba(117, 117, 117, 0.05); }

        .mark-underline {
          padding-bottom: 2px;
          border-bottom: 1px dashed white; }

        .divider {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-flex: 0;
                  flex: 0;
          color: #929daf;
          font-size: 0.8375rem;
          letter-spacing: .5px;
          margin: 2rem auto;
          width: 100%; }
          .divider::before, .divider::after {
            content: '';
            -webkit-box-flex: 1;
                    flex-grow: 1;
            border-top: 1px solid #eaeff4; }
          .divider::before {
            margin-right: 1rem; }
          .divider::after {
            margin-left: 1rem; }

        ::-moz-selection {
          background: #74b4ff;
          color: #fff; }

        ::selection {
          background: #74b4ff;
          color: #fff; }

        ::-moz-selection {
          background: #74b4ff;
          color: #fff; }

        @media (max-width: 767.98px) {
          html {
            font-size: 0.87891rem; } }

        img {
          max-width: 100%;
          height: auto; }

        .img-thumbnail {
          padding: 0.25rem;
          border-color: #f4f7f9;
          border-radius: 3px; }

        .img-outside-right {
          overflow: hidden; }
          .img-outside-right img {
            width: 100%;
            -webkit-transform: translateX(15%);
                    transform: translateX(15%); }

        .avatar {
          border-radius: 10rem;
          width: 48px;
          height: 48px; }

        .avatar-xxs {
          width: 22px;
          height: 22px; }

        .avatar-xs {
          width: 34px;
          height: 34px; }

        .avatar-sm {
          width: 40px;
          height: 40px; }

        .avatar-lg {
          width: 56px;
          height: 56px; }

        .avatar-xl {
          width: 64px;
          height: 64px; }

        .img-fadein {
          opacity: .75;
          -webkit-transition: .5s;
          transition: .5s; }
          .img-fadein:hover {
            opacity: 1; }

        .table {
          border: 1px solid #f1f2f3; }

        .table th {
          border-top: 0;
          font-weight: 400; }

        .table thead th {
          border-bottom: 1px solid #eaeff4; }

        .table-hover tbody tr {
          -webkit-transition: background-color 0.2s linear;
          transition: background-color 0.2s linear; }

        .table-sm th,
        .table-sm td {
          padding: .5rem; }

        .table-lg th,
        .table-lg td {
          padding: 1rem; }

        .media-list .media {
          border-bottom: 1px solid #f1f2f3;
          padding-top: 1.5rem;
          padding-bottom: 1.5rem; }
          .media-list .media:last-child {
            border-bottom: none; }

        video {
          max-width: 100%; }

        .video-wrapper {
          position: relative;
          display: block;
          width: 100%;
          padding: 0;
          overflow: hidden; }
          .video-wrapper::before {
            display: block;
            content: "";
            z-index: 0; }
          .video-wrapper.ratio-21x9::before {
            padding-top: 42.85714%; }
          .video-wrapper.ratio-16x9::before {
            padding-top: 56.25%; }
          .video-wrapper.ratio-4x3::before {
            padding-top: 75%; }
          .video-wrapper.ratio-1x1::before {
            padding-top: 100%; }
          .video-wrapper .poster {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            -webkit-background-size: cover;
                    background-size: cover;
            background-position: 50% 50%;
            border-radius: inherit;
            z-index: 1;
            -webkit-transition: .3s;
            transition: .3s; }
          .video-wrapper .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
            z-index: 2;
            -webkit-transition: .3s;
            transition: .3s; }
            .video-wrapper .btn:hover {
              -webkit-transform: translate(-50%, -50%);
                      transform: translate(-50%, -50%); }
          .video-wrapper iframe {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
            border-radius: inherit; }
          .video-wrapper.reveal .poster,
          .video-wrapper.reveal .btn {
            opacity: 0;
            visibility: hidden;
            -webkit-transition: 0.8s linear;
            transition: 0.8s linear; }

        .video-btn-wrapper {
          position: relative; }
          .video-btn-wrapper .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
            -webkit-transition: .3s;
            transition: .3s; }

        .bg-video {
          position: absolute;
          object-fit: cover;
          width: 100%;
          height: 100%;
          z-index: -100; }

        .card {
          border: 0;
          -webkit-transition: .5s;
          transition: .5s; }
          .card.bg-img .card-body {
            position: relative; }
          .card.text-white a {
            color: rgba(255, 255, 255, 0.8); }
          .card > .alert,
          .card .card-body .alert {
            border-radius: 0;
            margin-bottom: 0; }
          .card > .nav-tabs,
          .card .card-body .nav-tabs {
            margin-bottom: 0; }
          .card > .table {
            margin-bottom: 0; }
            .card > .table tr td:first-child,
            .card > .table tr th:first-child {
              padding-left: 20px; }
            .card > .table tr td:last-child,
            .card > .table tr th:last-child {
              padding-right: 20px; }
          .card .card-hover-show {
            opacity: 0;
            -webkit-transition: .3s linear;
            transition: .3s linear; }
          .card:hover .card-hover-show {
            opacity: 1; }

        .card-title {
          color: inherit; }

        .card-footer {
          background-color: #fff;
          border-top: 1px solid #f1f2f3; }

        .card-body-bottom {
          -webkit-box-flex: 0;
                  flex: 0 0 auto;
          position: absolute;
          bottom: 0; }

        .card-shadow {
          -webkit-box-shadow: 0 1px 25px rgba(0, 0, 0, 0.05);
                  box-shadow: 0 1px 25px rgba(0, 0, 0, 0.05); }

        .card-hover-shadow:hover {
          -webkit-box-shadow: 0 1px 35px rgba(0, 0, 0, 0.07);
                  box-shadow: 0 1px 35px rgba(0, 0, 0, 0.07); }

        .card-img-top {
          position: relative;
          border-top-left-radius: 0.25rem;
          border-top-right-radius: 0.25rem; }
          .card-img-top img {
            border-radius: inherit; }
          .card-img-top .badges {
            position: absolute;
            top: 0;
            padding: 1rem 1.25rem; }
          .card-img-top .badges-right {
            right: 0; }

        .card-img-bottom {
          border-bottom-right-radius: 0.25rem;
          border-bottom-left-radius: 0.25rem; }

        .card-hover {
          display: -webkit-box;
          display: flex;
          -webkit-box-flex: 1;
                  flex: 1 1 auto;
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border-radius: inherit;
          overflow: hidden;
          visibility: hidden;
          opacity: 0; }
          .card-hover.bg-img {
            position: absolute; }
          .card-hover[data-animation] {
            -webkit-transition: 0.4s ease-out;
            transition: 0.4s ease-out; }
          .card-hover[data-animation="zoom"] {
            -webkit-transform: scale(0, 0);
                    transform: scale(0, 0); }
          .card-hover[data-animation="slide-up"] {
            top: 100%; }
          .card-hover[data-animation="slide-down"] {
            top: -100%; }
          .card-hover[data-animation="slide-left"] {
            left: 100%; }
          .card-hover[data-animation="slide-right"] {
            left: -100%; }
          .card:hover .card-hover {
            top: 0;
            left: 0;
            visibility: visible;
            opacity: 1; }
            .card:hover .card-hover[data-animation="zoom"] {
              -webkit-transform: scale(1, 1);
                      transform: scale(1, 1); }
          .card-hover .card-body {
            position: relative; }

        .card-columns .card {
          margin-bottom: 1.5rem; }

        @media (max-width: 1199.98px) {
          .card-columns {
            -webkit-column-count: 2;
              -moz-column-count: 2;
                    column-count: 2; } }

        @media (max-width: 767.98px) {
          .card-columns {
            -webkit-column-count: 1;
              -moz-column-count: 1;
                    column-count: 1; } }

        pre {
          background-color: #fcfdfd;
          padding: 12px;
          border: 1px solid #f1f2f3;
          border-left: 3px solid #50a1ff;
          -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.02);
                  box-shadow: 0 0 15px rgba(0, 0, 0, 0.02); }

        .pre-scrollable {
          max-height: 350px;
          overflow-y: auto; }

        .fa {
          font-weight: inherit; }

        .iconbox {
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-pack: center;
                  justify-content: center;
          -webkit-box-align: center;
                  align-items: center;
          width: 38px;
          height: 38px;
          line-height: 38px;
          background-color: #f5f6f7;
          color: #999999;
          border-radius: 10rem; }
          .iconbox.iconbox-xs {
            width: 24px;
            height: 24px;
            line-height: 24px;
            font-size: .6875rem; }
          .iconbox.iconbox-sm {
            width: 32px;
            height: 32px;
            line-height: 32px;
            font-size: .75rem; }
          .iconbox.iconbox-lg, .step-icon .iconbox {
            width: 48px;
            height: 48px;
            line-height: 48px;
            font-size: 1.25rem; }
          .iconbox.iconbox-xl {
            width: 64px;
            height: 64px;
            line-height: 64px;
            font-size: 1.5rem; }
          .iconbox.iconbox-xxl {
            width: 96px;
            height: 96px;
            line-height: 96px;
            font-size: 2rem; }

        .iconbox-sq {
          border-radius: 0; }

        .iconbox-outline {
          border: 1px solid #f1f2f3;
          background-color: transparent; }

        .accordion .card {
          background-color: #fff;
          border: 1px solid #f1f2f3 !important;
          margin-bottom: 16px; }
          .accordion .card:last-child {
            margin-bottom: 0; }

        .accordion .card-title {
          margin-bottom: 0;
          padding-left: 20px;
          padding-right: 20px;
          background-color: #f9fafb; }

        .accordion .card-title a {
          display: block;
          padding: 16px 33px;
          color: #323d47; }
          .accordion .card-title a::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-left: 1px solid #757575;
            border-top: 1px solid #757575;
            margin-right: 20px;
            margin-left: -33px;
            margin-bottom: 3px;
            -webkit-transform: rotate(45deg);
                    transform: rotate(45deg);
            -webkit-transition: .2s linear;
            transition: .2s linear; }
          .accordion .card-title a.collapsed::before {
            -webkit-transform: rotate(-135deg);
                    transform: rotate(-135deg); }

        .accordion-connected {
          border: 1px solid #f1f2f3; }
          .accordion-connected .card {
            margin-bottom: 0;
            border: 0 !important;
            border-bottom: 1px solid #f1f2f3 !important; }
            .accordion-connected .card:last-child {
              border-bottom: 0 !important; }
          .accordion-connected .card-title {
            border-bottom: 0; }
            .accordion-connected .card-title a {
              padding-top: 20px;
              padding-bottom: 20px; }

        .accordion-light .card-title {
          background-color: #fff; }

        .accordion-arrow-right .card-title a {
          padding-left: 0;
          padding-right: 0; }
          .accordion-arrow-right .card-title a::before {
            float: right;
            margin-left: 0;
            margin-right: 0;
            margin-top: 10px; }

        .alert {
          border-width: 0;
          border-left-width: 4px;
          border-radius: 0; }

        .badge {
          padding-top: 5px;
          padding-bottom: 5px; }
          .badge:empty {
            display: inline-block; }

        .badge-pale.badge-primary {
          color: #4387d6;
          background-color: #eef4fc; }

        .badge-pale.badge-secondary {
          background-color: #f0f4f7; }

        .badge-pale.badge-success {
          color: #32b24a;
          background-color: #eefcf0; }

        .badge-pale.badge-info {
          color: #7b5cba;
          background-color: #f2eefc; }

        .badge-pale.badge-warning {
          color: #d69c00;
          background-color: #fcf8ee; }

        .badge-pale.badge-danger {
          color: #d63d47;
          background-color: #fceeef; }

        .badge-pale.badge-light {
          background-color: #ffffff; }

        .badge-pale.badge-dark {
          color: #151515;
          background-color: #e5e5e5; }

        .badge-glass.badge-primary {
          background-color: rgba(80, 161, 255, 0.55);
          color: #fff; }

        .badge-glass.badge-secondary {
          background-color: rgba(233, 236, 240, 0.55);
          color: #fff; }

        .badge-glass.badge-success {
          background-color: rgba(60, 212, 88, 0.55);
          color: #fff; }

        .badge-glass.badge-info {
          background-color: rgba(146, 109, 222, 0.55);
          color: #fff; }

        .badge-glass.badge-warning {
          background-color: rgba(255, 186, 0, 0.55);
          color: #fff; }

        .badge-glass.badge-danger {
          background-color: rgba(255, 73, 84, 0.55);
          color: #fff; }

        .badge-glass.badge-light {
          background-color: rgba(248, 249, 250, 0.55);
          color: #fff; }

        .badge-glass.badge-dark {
          background-color: rgba(25, 25, 25, 0.55);
          color: #fff; }

        .badge-dot {
          width: 6px;
          height: 6px;
          padding: 0;
          border-radius: 100%;
          vertical-align: middle; }

        .badge-ring {
          position: relative;
          width: 8px;
          height: 8px;
          padding: 0;
          border-radius: 100%;
          vertical-align: middle; }
          .badge-ring::after {
            content: '';
            position: absolute;
            top: 1px;
            left: 1px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #fff;
            -webkit-transform: scale(1);
                    transform: scale(1);
            -webkit-transition: .3s;
            transition: .3s; }
          .badge-ring.fill::after {
            -webkit-transform: scale(0);
                    transform: scale(0); }

        .badge-number {
          position: relative;
          top: -10px;
          margin-left: -0.5rem;
          font-size: 0.75rem;
          padding: 2px 4px;
          border-radius: 10rem;
          min-width: 1rem;
          min-height: 1rem; }

        .breadcrumb {
          margin-bottom: 0; }

        .breadcrumb-item + .breadcrumb-item {
          padding-left: 0; }
          .breadcrumb-item + .breadcrumb-item::before {
            padding: 0;
            margin: 0 0.75rem;
            width: 4px;
            height: 4px;
            border-right: 1px solid #bfc5ca;
            border-top: 1px solid #bfc5ca;
            vertical-align: middle;
            -webkit-transform: rotate(45deg);
                    transform: rotate(45deg); }

        .breadcrumb-item a {
          color: #999999; }
          .breadcrumb-item a:hover {
            color: #50a1ff; }

        .btn {
          font-size: 11px;
          padding: 8px 26px 6px;
          letter-spacing: 1.7px;
          text-transform: uppercase;
          border-radius: 2px;
          outline: none;
          -webkit-transition: 0.15s linear;
          transition: 0.15s linear; }

        button:focus {
          outline: none; }

        .btn-link:hover,
        .btn-link:focus {
          -webkit-text-decoration: normal;
                  text-decoration: normal; }

        .btn-outline-secondary {
          color: #929daf; }

        .btn-white {
          color: #757575;
          background-color: #fff;
          border-color: #fff; }
          .btn-white:hover {
            color: #757575;
            background-color: whitesmoke;
            border-color: whitesmoke;
            -webkit-box-shadow: 0 1px 10px rgba(255, 255, 255, 0.4);
                    box-shadow: 0 1px 10px rgba(255, 255, 255, 0.4); }
          .btn-white:focus, .btn-white.focus {
            color: #757575;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 255, 255, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 255, 255, 0.5); }
          .btn-white.disabled, .btn-white:disabled {
            background-color: #fff;
            border-color: #fff; }
          .btn-white:not([disabled]):not(.disabled):active, .btn-white:not([disabled]):not(.disabled).active,
          .show > .btn-white.dropdown-toggle {
            color: #757575;
            background-color: #ebebeb;
            border-color: #ebebeb;
            -webkit-box-shadow: 0 0 0 0rem rgba(255, 255, 255, 0.5);
                    box-shadow: 0 0 0 0rem rgba(255, 255, 255, 0.5); }
          .btn-white:hover {
            background-color: #fff;
            border-color: #fff;
            color: #323d47; }

        .btn-facebook {
          color: #fff;
          background-color: #3b5998;
          border-color: #3b5998; }
          .btn-facebook:hover {
            color: #fff;
            background-color: #355089;
            border-color: #355089;
            -webkit-box-shadow: 0 1px 10px rgba(59, 89, 152, 0.4);
                    box-shadow: 0 1px 10px rgba(59, 89, 152, 0.4); }
          .btn-facebook:focus, .btn-facebook.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(59, 89, 152, 0.5);
                    box-shadow: 0 0 0 0rem rgba(59, 89, 152, 0.5); }
          .btn-facebook.disabled, .btn-facebook:disabled {
            background-color: #3b5998;
            border-color: #3b5998; }
          .btn-facebook:not([disabled]):not(.disabled):active, .btn-facebook:not([disabled]):not(.disabled).active,
          .show > .btn-facebook.dropdown-toggle {
            color: #fff;
            background-color: #30487b;
            border-color: #30487b;
            -webkit-box-shadow: 0 0 0 0rem rgba(59, 89, 152, 0.5);
                    box-shadow: 0 0 0 0rem rgba(59, 89, 152, 0.5); }

        .btn-google {
          color: #fff;
          background-color: #dd4b39;
          border-color: #dd4b39; }
          .btn-google:hover {
            color: #fff;
            background-color: #da3b28;
            border-color: #da3b28;
            -webkit-box-shadow: 0 1px 10px rgba(221, 75, 57, 0.4);
                    box-shadow: 0 1px 10px rgba(221, 75, 57, 0.4); }
          .btn-google:focus, .btn-google.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(221, 75, 57, 0.5);
                    box-shadow: 0 0 0 0rem rgba(221, 75, 57, 0.5); }
          .btn-google.disabled, .btn-google:disabled {
            background-color: #dd4b39;
            border-color: #dd4b39; }
          .btn-google:not([disabled]):not(.disabled):active, .btn-google:not([disabled]):not(.disabled).active,
          .show > .btn-google.dropdown-toggle {
            color: #fff;
            background-color: #ca3523;
            border-color: #ca3523;
            -webkit-box-shadow: 0 0 0 0rem rgba(221, 75, 57, 0.5);
                    box-shadow: 0 0 0 0rem rgba(221, 75, 57, 0.5); }

        .btn-twitter {
          color: #fff;
          background-color: #00aced;
          border-color: #00aced; }
          .btn-twitter:hover {
            color: #fff;
            background-color: #009dd9;
            border-color: #009dd9;
            -webkit-box-shadow: 0 1px 10px rgba(0, 172, 237, 0.4);
                    box-shadow: 0 1px 10px rgba(0, 172, 237, 0.4); }
          .btn-twitter:focus, .btn-twitter.focus {
            color: #fff;
            -webkit-box-shadow: 0 0 0 0rem rgba(0, 172, 237, 0.5);
                    box-shadow: 0 0 0 0rem rgba(0, 172, 237, 0.5); }
          .btn-twitter.disabled, .btn-twitter:disabled {
            background-color: #00aced;
            border-color: #00aced; }
          .btn-twitter:not([disabled]):not(.disabled):active, .btn-twitter:not([disabled]):not(.disabled).active,
          .show > .btn-twitter.dropdown-toggle {
            color: #fff;
            background-color: #008ec4;
            border-color: #008ec4;
            -webkit-box-shadow: 0 0 0 0rem rgba(0, 172, 237, 0.5);
                    box-shadow: 0 0 0 0rem rgba(0, 172, 237, 0.5); }

        .btn-xs {
          padding: 4px 12px 3px;
          font-size: 10px; }

        .btn-sm, .btn-group-sm > .btn, .input-group-sm > .input-group-prepend > .btn,
        .input-group-sm > .input-group-append > .btn {
          padding: 8px 20px 6px;
          font-size: 11px; }

        .btn-lg, .btn-group-lg > .btn, .input-group-lg > .input-group-prepend > .btn,
        .input-group-lg > .input-group-append > .btn {
          padding: 7px 32px 6px;
          font-size: 12px; }

        .btn-xl {
          padding: 10px 38px 10px;
          font-size: 13px; }

        .btn-round {
          border-radius: 10rem; }

        .btn-circle {
          width: 56px;
          height: 56px;
          padding: 0;
          border-radius: 10rem;
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: center;
                  justify-content: center;
          font-size: 1rem; }
          .btn-circle .fa-play {
            margin-left: 4px;
            font-size: 0.875rem; }
          .btn-circle.btn-xs {
            width: 40px;
            height: 40px;
            font-size: 0.875rem; }
          .btn-circle.btn-sm, .btn-group-sm > .btn-circle.btn, .input-group-sm > .input-group-prepend > .btn-circle.btn,
          .input-group-sm > .input-group-append > .btn-circle.btn {
            width: 48px;
            height: 48px;
            font-size: 0.9325rem; }
          .btn-circle.btn-lg, .btn-group-lg > .btn-circle.btn, .input-group-lg > .input-group-prepend > .btn-circle.btn,
          .input-group-lg > .input-group-append > .btn-circle.btn {
            width: 64px;
            height: 64px;
            font-size: 1.25rem; }
          .btn-circle.btn-xl {
            width: 72px;
            height: 72px;
            font-size: 1.5rem; }

        .btn-glass.btn-primary {
          background-color: rgba(80, 161, 255, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-primary:hover {
            background-color: rgba(80, 161, 255, 0.9); }

        .btn-glass.btn-secondary {
          background-color: rgba(233, 236, 240, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-secondary:hover {
            background-color: rgba(233, 236, 240, 0.9); }

        .btn-glass.btn-success {
          background-color: rgba(60, 212, 88, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-success:hover {
            background-color: rgba(60, 212, 88, 0.9); }

        .btn-glass.btn-info {
          background-color: rgba(146, 109, 222, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-info:hover {
            background-color: rgba(146, 109, 222, 0.9); }

        .btn-glass.btn-warning {
          background-color: rgba(255, 186, 0, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-warning:hover {
            background-color: rgba(255, 186, 0, 0.9); }

        .btn-glass.btn-danger {
          background-color: rgba(255, 73, 84, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-danger:hover {
            background-color: rgba(255, 73, 84, 0.9); }

        .btn-glass.btn-light {
          background-color: rgba(248, 249, 250, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-light:hover {
            background-color: rgba(248, 249, 250, 0.9); }

        .btn-glass.btn-dark {
          background-color: rgba(25, 25, 25, 0.6);
          border-color: transparent;
          color: #fff; }
          .btn-glass.btn-dark:hover {
            background-color: rgba(25, 25, 25, 0.9); }

        .btn-label {
          position: relative;
          padding-left: 52px;
          overflow: hidden; }
          .btn-label label {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 36px;
            line-height: inherit;
            padding-top: 5px;
            padding-bottom: 5px;
            background-color: rgba(0, 0, 0, 0.1);
            cursor: pointer;
            margin-bottom: 0; }
          .btn-label.btn-xl {
            padding-left: 62px; }
            .btn-label.btn-xl label {
              width: 46px; }
          .btn-label.btn-lg, .btn-group-lg > .btn-label.btn, .input-group-lg > .input-group-prepend > .btn-label.btn,
          .input-group-lg > .input-group-append > .btn-label.btn {
            padding-left: 56px; }
            .btn-label.btn-lg label, .btn-group-lg > .btn-label.btn label, .input-group-lg > .input-group-prepend > .btn-label.btn label, .input-group-lg > .input-group-append > .btn-label.btn label {
              width: 40px; }
          .btn-label.btn-sm, .btn-group-sm > .btn-label.btn, .input-group-sm > .input-group-prepend > .btn-label.btn,
          .input-group-sm > .input-group-append > .btn-label.btn {
            padding-left: 48px; }
            .btn-label.btn-sm label, .btn-group-sm > .btn-label.btn label, .input-group-sm > .input-group-prepend > .btn-label.btn label, .input-group-sm > .input-group-append > .btn-label.btn label {
              width: 32px; }
          .btn-label.btn-xs {
            padding-left: 43px; }
            .btn-label.btn-xs label {
              width: 27px;
              padding-top: 1px; }

        .btn-square {
          padding-left: 5px;
          padding-right: 5px;
          width: 36px;
          height: 36px; }
          .btn-square.btn-xl {
            width: 46px;
            height: 46px; }
          .btn-square.btn-lg, .btn-group-lg > .btn-square.btn, .input-group-lg > .input-group-prepend > .btn-square.btn,
          .input-group-lg > .input-group-append > .btn-square.btn {
            width: 40px;
            height: 40px; }
          .btn-square.btn-sm, .btn-group-sm > .btn-square.btn, .input-group-sm > .input-group-prepend > .btn-square.btn,
          .input-group-sm > .input-group-append > .btn-square.btn {
            width: 32px;
            height: 32px; }
          .btn-square.btn-xs {
            width: 27px;
            height: 27px; }

        .dropdown-toggle {
          cursor: pointer; }
          .dropdown-toggle::after,
          .dropup .dropdown-toggle::after {
            content: '';
            width: 4px;
            height: 4px;
            vertical-align: initial;
            margin-left: 0.5rem;
            vertical-align: middle;
            border: none;
            border-right: 1px solid;
            border-bottom: 1px solid; }
          .dropdown-toggle::after {
            -webkit-transform: rotate(45deg);
                    transform: rotate(45deg); }
          .dropup .dropdown-toggle::after {
            -webkit-transform: rotate(-135deg);
                    transform: rotate(-135deg); }
          .dropdown-toggle.no-caret::after {
            display: none; }

        .dropdown-menu {
          padding: 10px 16px;
          font-size: 14px;
          margin-top: 5px;
          border: none;
          -webkit-box-shadow: 0 2px 25px rgba(0, 0, 0, 0.07);
                  box-shadow: 0 2px 25px rgba(0, 0, 0, 0.07); }
          .dropdown-menu *:last-child {
            margin-bottom: 0; }

        .dropdown-item {
          padding-left: 0;
          padding-right: 0;
          color: #999999;
          background-color: transparent;
          opacity: .8; }
          .dropdown-item:hover {
            color: #757575;
            opacity: 1; }
          .dropdown-item:active, .dropdown-item:hover, .dropdown-item:focus {
            background-color: transparent; }

        .dropdown-header {
          padding-left: 0;
          padding-right: 0;
          letter-spacing: 1px;
          font-size: 0.8325rem;
          font-weight: 500;
          color: #757575;
          text-transform: uppercase; }

        .dropdown-divider {
          background-color: #f1f2f3;
          margin-left: -1rem;
          margin-right: -1rem; }

        .open-on-hover:hover .dropdown-menu,
        .open-on-hover:focus .dropdown-menu,
        .open-on-hover.show .dropdown-menu {
          display: block;
          margin-top: 0; }

        .gallery {
          display: -webkit-box;
          display: flex;
          flex-wrap: wrap; }

        .gallery-item {
          position: relative;
          flex-basis: 50%;
          padding: 0.25rem;
          display: block; }
          .gallery-item img {
            object-fit: cover;
            width: 100%;
            height: 100%; }

        .gallery-item-overlay {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: center;
                  justify-content: center;
          position: absolute;
          top: 0.25rem;
          left: 0.25rem;
          right: 0.25rem;
          bottom: 0.25rem;
          background-color: rgba(0, 0, 0, 0.4);
          color: #fff;
          font-size: 1.75rem;
          -webkit-transition: 0.3s ease-out;
          transition: 0.3s ease-out; }
          .gallery-item-overlay:hover {
            background-color: rgba(0, 0, 0, 0.45); }

        .gallery.items-connected .gallery-item {
          padding: 0; }

        .gallery.items-connected .gallery-item-overlay {
          top: 0;
          left: 0;
          right: 0;
          bottom: 0; }

        .gallery-extra-items {
          display: none; }

        .gallery-3-type1 .gallery-item {
          flex-basis: 33.33%; }

        .gallery-3-type2 .gallery-item {
          flex-basis: 100%; }

        .gallery-3-type2 .gallery-item:nth-child(n+2) {
          flex-basis: 50%; }

        .gallery-3-type3 .gallery-item {
          flex-basis: 50%; }

        .gallery-3-type3 .gallery-item:nth-child(n+3) {
          flex-basis: 100%; }

        .gallery-3-type4 > .gallery-item {
          flex-basis: 60%; }

        .gallery-3-type4 .gallery-item-group {
          flex-basis: 40%; }

        .gallery-3-type5 > .gallery-item {
          flex-basis: 60%; }

        .gallery-3-type5 .gallery-item-group {
          flex-basis: 40%; }

        .gallery-4-type1 .gallery-item {
          flex-basis: 25%; }

        .gallery-4-type2 .gallery-item {
          flex-basis: 100%; }

        .gallery-4-type2 .gallery-item:nth-child(n+2) {
          flex-basis: 33.33%; }

        .gallery-4-type3 .gallery-item {
          flex-basis: 33.33%; }

        .gallery-4-type3 .gallery-item:nth-child(n+4) {
          flex-basis: 100%; }

        .gallery-4-type4 > .gallery-item {
          flex-basis: 70%; }

        .gallery-4-type4 .gallery-item-group {
          flex-basis: 30%; }

        .gallery-4-type5 > .gallery-item {
          flex-basis: 70%; }

        .gallery-4-type5 .gallery-item-group {
          flex-basis: 30%; }

        .modal .close {
          font-weight: 100; }

        .modal-dialog {
          margin-top: 0;
          margin-bottom: 0;
          display: -webkit-box;
          display: flex;
          height: 100%; }

        .modal-content {
          margin-top: auto;
          margin-bottom: auto;
          border: none; }

        .modal-header,
        .modal-footer {
          padding-top: 1rem;
          padding-bottom: 1rem; }

        .modal-body > .close {
          position: absolute;
          top: 0;
          right: 0;
          padding: 0.5rem 0.75rem;
          z-index: 1; }

        .modal.fade:not(.modal-top):not(.modal-bottom) .modal-dialog {
          -webkit-transform: translate(0, 0);
                  transform: translate(0, 0); }

        .modal-top .modal-content {
          margin-top: 3rem; }

        .modal-bottom.modal.fade .modal-dialog {
          -webkit-transform: translate(0, 0);
                  transform: translate(0, 0);
          overflow: hidden; }
          .modal-bottom.modal.fade .modal-dialog .modal-content {
            margin-bottom: 0;
            -webkit-transform: translate(0, 100%);
                    transform: translate(0, 100%);
            -webkit-transition: 0.3s ease-out;
            transition: 0.3s ease-out; }

        .modal-bottom.modal.show .modal-dialog .modal-content {
          margin-bottom: 3rem;
          -webkit-transform: translate(0, 0);
                  transform: translate(0, 0);
          -webkit-transition: 0.3s ease-out;
          transition: 0.3s ease-out; }

        .modal-long {
          height: auto;
          margin-top: 1.75rem;
          margin-bottom: 1.75rem; }

        .nav.flex-column .nav-link {
          padding: 2px 0; }
          .nav.flex-column .nav-link:first-child {
            padding-top: 0; }

        .nav-link {
          color: #757575;
          font-weight: 400; }

        .nav-link.active,
        .nav-item.show .nav-link {
          color: #50a1ff; }

        .nav-divider {
          display: block;
          margin: 0.5rem 1.125rem;
          height: 1px;
          background-color: rgba(127, 127, 127, 0.1); }

        .nav-uppercase > .nav-link,
        .nav-uppercase > .nav-item > .nav-link {
          text-transform: uppercase;
          letter-spacing: 1px;
          font-size: 0.85em;
          word-spacing: 2px; }

        .nav-bold .nav-item {
          font-weight: 600; }

        .nav-bold .nav-link {
          font-weight: 600;
          letter-spacing: 1px;
          font-size: 0.85em;
          word-spacing: 2px; }

        .nav-bolder .nav-item {
          font-weight: 700; }

        .nav-bolder .nav-link {
          font-weight: 700;
          letter-spacing: 1px;
          font-size: 0.8em;
          word-spacing: 2px; }

        .nav-lead .nav-link {
          font-size: 1rem; }

        .nav-pills .nav-link, .nav-pills.flex-column .nav-link {
          padding: 3px 1rem; }

        .nav-slash .nav-item {
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-align: center;
                  align-items: center; }
          .nav-slash .nav-item::after {
            content: '/';
            font-weight: 400;
            opacity: 0.6; }
          .nav-slash .nav-item:last-child::after {
            display: none; }

        .nav-dot .nav-item {
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-align: center;
                  align-items: center; }
          .nav-dot .nav-item::after {
            content: "\2022";
            font-weight: 100;
            opacity: 0.75; }
          .nav-dot .nav-item:last-child::after {
            display: none; }

        .nav-iconic .nav-link {
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          -webkit-box-align: center;
                  align-items: center; }
          .nav-iconic .nav-link i {
            margin-bottom: 1rem; }

        .nav-sidebar {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          font-weight: 400; }
          .nav-sidebar .nav-item {
            margin: 4px 0;
            padding-right: 5px;
            overflow: hidden;
            flex-shrink: 0; }
            .nav-sidebar .nav-item > .nav-link {
              font-weight: 500; }
          .nav-sidebar .nav-link {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
                    justify-content: space-between;
            padding: 3px 0;
            line-height: 1.5; }
          .nav-sidebar .nav-angle {
            font-family: themify;
            font-style: normal;
            font-size: 8px;
            display: inline-block;
            line-height: 24px;
            -webkit-transition: -webkit-transform 0.5s;
            transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            transition: transform 0.5s, -webkit-transform 0.5s;
            color: #757575; }
            .nav-sidebar .nav-angle::before {
              content: "\e649"; }
            .nav-sidebar .nav-angle.rotate {
              -webkit-transform: rotate(90deg);
                      transform: rotate(90deg); }
          .nav-sidebar .nav {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            font-size: 0.875rem;
            margin-left: 1rem;
            margin-top: 0.5rem;
            flex-wrap: nowrap;
            display: none; }
            .nav-sidebar .nav .nav {
              display: -webkit-box;
              display: flex;
              font-size: 95%;
              margin-left: 0.75rem;
              margin-top: 0; }
              .nav-sidebar .nav .nav .nav-item {
                margin-top: 1px;
                margin-bottom: 1px; }
            .nav-sidebar .nav .nav-link {
              flex-shrink: 0; }
          .nav-sidebar .show > .nav-link .nav-angle {
            -webkit-transform: rotate(90deg);
                    transform: rotate(90deg); }
          .nav-sidebar .show > .nav {
            display: block; }
          .nav-sidebar .nav-link.active {
            color: #50a1ff; }
            .nav-sidebar .nav-link.active + .nav {
              display: block; }
          .nav-sidebar .nav-item > .nav-link.active {
            color: #757575;
            -webkit-transition: none;
            transition: none; }
          .nav-sidebar a {
            color: rgba(0, 0, 0, 0.6); }
            .nav-sidebar a:hover {
              color: rgba(0, 0, 0, 0.8); }
          .nav-sidebar .nav-header {
            color: #323d47;
            font-weight: 500;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem; }

        .nav-sidebar-hero > .nav-item {
          border-bottom: 1px dashed #eaeff4;
          padding-top: 2px;
          padding-bottom: 6px; }
          .nav-sidebar-hero > .nav-item:last-child {
            border-bottom: none; }
          .nav-sidebar-hero > .nav-item > .nav-link {
            font-size: 1.125rem;
            font-weight: 400;
            padding: 8px 0; }

        .nav-sidebar-hero .nav-item > .nav-link {
          font-weight: 400; }

        .nav-sidebar-hero .nav {
          font-size: 1rem; }

        .nav-sidebar-hero .nav-link.active {
          font-weight: 500; }

        .nav-sidebar-pill .nav-item > .nav-link.active {
          color: #50a1ff; }
          .nav-sidebar-pill .nav-item > .nav-link.active > .nav-angle {
            -webkit-transform: rotate(90deg);
                    transform: rotate(90deg); }

        .nav-sidebar-pill .nav {
          margin-left: 0.5rem; }

        .nav-sidebar-pill .nav .nav-link {
          display: table;
          border-radius: 10rem;
          padding: 6px 16px; }
          .nav-sidebar-pill .nav .nav-link.active {
            background-color: rgba(80, 161, 255, 0.1); }

        .nav-page {
          display: block;
          position: fixed;
          top: 50%;
          right: 20px;
          width: 34px;
          border-radius: 10rem;
          padding: 7px 0;
          text-align: center;
          background-color: #191919;
          opacity: 0;
          -webkit-transform: translateY(-50%);
                  transform: translateY(-50%);
          -webkit-transition: .5s ease-out;
          transition: .5s ease-out; }
          .body-scrolled .nav-page {
            opacity: .5; }
          .nav-page:hover {
            opacity: .65; }
          .nav-page.nav-page-left {
            right: auto;
            left: 20px; }
          .nav-page .nav-item {
            position: relative;
            display: block;
            padding: 0; }
          .nav-page .nav-link {
            display: inline-block;
            width: 8px;
            height: 8px;
            padding: 0;
            border-radius: 4px;
            background-color: #fff;
            opacity: .5; }
            .nav-page .nav-link:hover, .nav-page .nav-link.active {
              opacity: 1; }
            .nav-page .nav-link::before {
              content: '';
              position: absolute;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0; }

        .nav-dark .nav-link {
          color: rgba(117, 117, 117, 0.65); }

        .nav-dark .nav-link:hover,
        .nav-dark .nav-link.active,
        .nav-dark .nav-item.show .nav-link {
          color: #323d47; }

        .nav-dark .nav-link.disabled {
          color: #a5b3c7; }

        .nav-light .nav-link {
          color: rgba(255, 255, 255, 0.65); }

        .nav-light .nav-link:hover,
        .nav-light .nav-link.active,
        .nav-light .nav-item.show .nav-link {
          color: #fff; }

        .nav-light .nav-link.disabled {
          color: rgba(255, 255, 255, 0.5); }

        .nav-light.nav-pills .nav-link.active,
        .nav-light.nav-pills .show > .nav-link {
          background-color: rgba(255, 255, 255, 0.25); }

        .nav-trim .nav-link:first-child {
          padding-left: 0; }

        .nav-trim .nav-link:last-child {
          padding-right: 0; }

        .nav-transform-none .nav-link {
          text-transform: none !important; }

        [data-overlay],
        [data-overlay-light] {
          position: relative; }

        [data-overlay]::before,
        [data-overlay-light]::before {
          position: absolute;
          content: '';
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background: #191919;
          border-radius: inherit; }

        [data-overlay-light]::before {
          background: #fff; }

        [data-overlay-primary]::before {
          background: #50a1ff; }

        [data-overlay="1"]::before {
          opacity: 0.1; }

        [data-overlay="2"]::before {
          opacity: 0.2; }

        [data-overlay="3"]::before {
          opacity: 0.3; }

        [data-overlay="4"]::before {
          opacity: 0.4; }

        [data-overlay="5"]::before {
          opacity: 0.5; }

        [data-overlay="6"]::before {
          opacity: 0.6; }

        [data-overlay="7"]::before {
          opacity: 0.7; }

        [data-overlay="8"]::before {
          opacity: 0.8; }

        [data-overlay="9"]::before {
          opacity: 0.9; }

        [data-overlay-light="1"]::before {
          opacity: 0.1; }

        [data-overlay-light="2"]::before {
          opacity: 0.2; }

        [data-overlay-light="3"]::before {
          opacity: 0.3; }

        [data-overlay-light="4"]::before {
          opacity: 0.4; }

        [data-overlay-light="5"]::before {
          opacity: 0.5; }

        [data-overlay-light="6"]::before {
          opacity: 0.6; }

        [data-overlay-light="7"]::before {
          opacity: 0.7; }

        [data-overlay-light="8"]::before {
          opacity: 0.8; }

        [data-overlay-light="9"]::before {
          opacity: 0.9; }

        [data-scrim-top],
        [data-scrim-bottom] {
          position: relative; }

        [data-scrim-top]::before,
        [data-scrim-bottom]::before {
          position: absolute;
          content: '';
          top: 0;
          left: 0;
          right: 0;
          bottom: 20%;
          background: -webkit-gradient(linear, left top, left bottom, from(#191919), to(rgba(0, 0, 0, 0)));
          background: -webkit-linear-gradient(top, #191919 0%, rgba(0, 0, 0, 0) 100%);
          background: linear-gradient(to bottom, #191919 0%, rgba(0, 0, 0, 0) 100%);
          z-index: 0;
          border-radius: inherit; }

        [data-scrim-bottom]::before {
          top: 20%;
          bottom: 0;
          background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0)), to(#191919));
          background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, #191919 100%);
          background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, #191919 100%); }

        [data-scrim-top="1"]::before,
        [data-scrim-bottom="1"]::before {
          opacity: 0.1; }

        [data-scrim-top="2"]::before,
        [data-scrim-bottom="2"]::before {
          opacity: 0.2; }

        [data-scrim-top="3"]::before,
        [data-scrim-bottom="3"]::before {
          opacity: 0.3; }

        [data-scrim-top="4"]::before,
        [data-scrim-bottom="4"]::before {
          opacity: 0.4; }

        [data-scrim-top="5"]::before,
        [data-scrim-bottom="5"]::before {
          opacity: 0.5; }

        [data-scrim-top="6"]::before,
        [data-scrim-bottom="6"]::before {
          opacity: 0.6; }

        [data-scrim-top="7"]::before,
        [data-scrim-bottom="7"]::before {
          opacity: 0.7; }

        [data-scrim-top="8"]::before,
        [data-scrim-bottom="8"]::before {
          opacity: 0.8; }

        [data-scrim-top="9"]::before,
        [data-scrim-bottom="9"]::before {
          opacity: 0.9; }

        [data-scrim-top="0"]::before,
        [data-scrim-bottom="0"]::before {
          opacity: 0; }

        .overlay {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          opacity: 0.5;
          border-radius: inherit; }

        .page-link {
          margin: 0 3px;
          padding: 0;
          text-align: center;
          min-width: 32px; }

        .page-link,
        .page-item:last-child .page-link,
        .page-item:first-child .page-link {
          border-radius: 2px; }

        .page-item.disabled {
          opacity: 0.6; }

        .popover {
          -webkit-box-shadow: 0 1px 15px rgba(0, 0, 0, 0.05);
                  box-shadow: 0 1px 15px rgba(0, 0, 0, 0.05); }

        .timeline {
          position: relative;
          list-style: none;
          padding: 1rem 0;
          margin: 0; }
          .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            margin-left: -1px;
            background-color: #50a1ff; }

        .timeline-item {
          position: relative;
          width: 50%;
          padding: 1rem 0;
          padding-right: 2.5rem;
          text-align: right; }
          .timeline-item::before {
            content: '';
            position: absolute;
            right: -8px;
            top: 1.35rem;
            display: inline-block;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid #50a1ff;
            background-color: #fff; }
          .timeline-item:nth-child(even) {
            margin-left: 50%;
            padding-left: 2.5rem;
            padding-right: 0;
            text-align: left; }
            .timeline-item:nth-child(even)::before {
              right: auto;
              left: -8px; }

        .timeline-horizontal {
          display: -webkit-box;
          display: flex; }
          .timeline-horizontal::before {
            left: 0;
            bottom: auto;
            right: 0;
            width: 100%;
            height: 2px; }
          .timeline-horizontal .timeline-item {
            padding: 1.5rem 1rem;
            text-align: left; }
            .timeline-horizontal .timeline-item::before {
              top: -1.5rem;
              left: 0.75rem; }
            .timeline-horizontal .timeline-item:nth-child(even) {
              margin-left: 0; }

        @media (max-width: 767.98px) {
          .timeline::before {
            left: 8px; }
          .timeline-item {
            width: 100%;
            text-align: left;
            padding-left: 2.5rem;
            padding-right: 0; }
            .timeline-item::before {
              top: 1.25rem;
              left: 1px; }
            .timeline-item:nth-child(even) {
              margin-left: 0rem; }
              .timeline-item:nth-child(even)::before {
                left: 1px; }
          .timeline-horizontal {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column; }
            .timeline-horizontal::before {
              right: auto;
              bottom: 0;
              width: 2px;
              height: 100%; }
            .timeline-horizontal .timeline-item {
              padding: 1rem 0;
              padding-left: 2.5rem; }
              .timeline-horizontal .timeline-item::before {
                top: 1.25rem;
                left: 1px; } }

        .step {
          list-style: none;
          margin: 0; }

        .step-item {
          display: -webkit-box;
          display: flex;
          padding: 1rem 0; }

        .step-icon {
          position: relative;
          width: 7rem;
          flex-shrink: 0;
          text-align: center; }
          .step-icon .iconbox {
            color: #bfc5ca;
            background-color: #eaeff4;
            font-size: 1.5rem; }
          .step-icon::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 48px;
            bottom: -2rem;
            margin-left: -1px;
            border-left: 2px dashed #eaeff4; }

        .step-content {
          margin-left: 1rem; }

        .step .step-item:last-child .step-icon::before {
          bottom: 1rem; }

        .scroll-down-1 span {
          display: inline-block;
          width: 24px;
          height: 24px;
          margin: 0 5px;
          border-left: 1px solid #000;
          border-bottom: 1px solid #000;
          -webkit-transform: rotate(-45deg);
                  transform: rotate(-45deg);
          -webkit-animation: scrollDown1 2s infinite;
                  animation: scrollDown1 2s infinite; }

        @-webkit-keyframes scrollDown1 {
          0% {
            -webkit-transform: rotate(-45deg) translate(0, 0);
                    transform: rotate(-45deg) translate(0, 0); }
          20% {
            -webkit-transform: rotate(-45deg) translate(-16px, 16px);
                    transform: rotate(-45deg) translate(-16px, 16px); }
          40% {
            -webkit-transform: rotate(-45deg) translate(0, 0);
                    transform: rotate(-45deg) translate(0, 0); } }

        @keyframes scrollDown1 {
          0% {
            -webkit-transform: rotate(-45deg) translate(0, 0);
                    transform: rotate(-45deg) translate(0, 0); }
          20% {
            -webkit-transform: rotate(-45deg) translate(-16px, 16px);
                    transform: rotate(-45deg) translate(-16px, 16px); }
          40% {
            -webkit-transform: rotate(-45deg) translate(0, 0);
                    transform: rotate(-45deg) translate(0, 0); } }

        .scroll-down-2 span {
          display: inline-block;
          width: 24px;
          height: 24px;
          margin: 0 5px;
          border-left: 1px solid #000;
          border-bottom: 1px solid #000;
          -webkit-transform: rotate(-45deg);
                  transform: rotate(-45deg);
          -webkit-animation: scrollDown2 2s infinite;
                  animation: scrollDown2 2s infinite; }

        @-webkit-keyframes scrollDown2 {
          0% {
            -webkit-transform: rotate(-45deg) translate(0, 0);
                    transform: rotate(-45deg) translate(0, 0);
            opacity: 0; }
          50% {
            opacity: 1; }
          100% {
            -webkit-transform: rotate(-45deg) translate(-20px, 20px);
                    transform: rotate(-45deg) translate(-20px, 20px);
            opacity: 0; } }

        @keyframes scrollDown2 {
          0% {
            -webkit-transform: rotate(-45deg) translate(0, 0);
                    transform: rotate(-45deg) translate(0, 0);
            opacity: 0; }
          50% {
            opacity: 1; }
          100% {
            -webkit-transform: rotate(-45deg) translate(-20px, 20px);
                    transform: rotate(-45deg) translate(-20px, 20px);
            opacity: 0; } }

        .scroll-down-3 {
          position: relative; }
          .scroll-down-3 span {
            position: absolute;
            display: inline-block;
            width: 24px;
            height: 24px;
            margin: 0 5px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
            -webkit-transform: rotate(-45deg);
                    transform: rotate(-45deg);
            -webkit-animation: scrollDown3 2s infinite;
                    animation: scrollDown3 2s infinite;
            opacity: 0; }
            .scroll-down-3 span:nth-of-type(1) {
              -webkit-animation-delay: 0s;
                      animation-delay: 0s; }
            .scroll-down-3 span:nth-of-type(2) {
              top: 16px;
              -webkit-animation-delay: .15s;
                      animation-delay: .15s; }
            .scroll-down-3 span:nth-of-type(3) {
              top: 32px;
              -webkit-animation-delay: .3s;
                      animation-delay: .3s; }

        @-webkit-keyframes scrollDown3 {
          0% {
            opacity: 0; }
          50% {
            opacity: 1; }
          100% {
            opacity: 0; } }

        @keyframes scrollDown3 {
          0% {
            opacity: 0; }
          50% {
            opacity: 1; }
          100% {
            opacity: 0; } }

        .scroll-down-4 span {
          position: relative;
          display: inline-block;
          width: 30px;
          height: 50px;
          border: 1px solid #000;
          border-radius: 50px;
          opacity: .5; }
          .scroll-down-4 span::before {
            position: absolute;
            top: 10px;
            left: 50%;
            content: '';
            width: 6px;
            height: 6px;
            margin-left: -3px;
            background-color: #000;
            border-radius: 100%; }

        .scroll-down-5 span {
          position: relative;
          display: inline-block;
          width: 30px;
          height: 50px;
          border: 1px solid #000;
          border-radius: 50px;
          opacity: .5; }
          .scroll-down-5 span::before {
            position: absolute;
            top: 10px;
            left: 50%;
            content: '';
            width: 6px;
            height: 6px;
            margin-left: -3px;
            background-color: #000;
            border-radius: 100%;
            -webkit-animation: scrollDown5 2s infinite;
                    animation: scrollDown5 2s infinite; }

        @-webkit-keyframes scrollDown5 {
          0% {
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0);
            opacity: 0; }
          40% {
            opacity: 1; }
          80% {
            -webkit-transform: translate(0, 20px);
                    transform: translate(0, 20px);
            opacity: 0; }
          100% {
            opacity: 0; } }

        @keyframes scrollDown5 {
          0% {
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0);
            opacity: 0; }
          40% {
            opacity: 1; }
          80% {
            -webkit-transform: translate(0, 20px);
                    transform: translate(0, 20px);
            opacity: 0; }
          100% {
            opacity: 0; } }

        .scroll-down-white span {
          border-color: #fff; }
          .scroll-down-white span::before {
            background-color: #fff; }

        .scroll-top {
          position: fixed;
          bottom: 30px;
          right: 30px;
          font-weight: 300;
          opacity: 0;
          -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
          z-index: 1000;
          -webkit-transition: .5s ease-in-out;
          transition: .5s ease-in-out; }
          .header-scrolled .scroll-top {
            opacity: 0.6; }
          .scroll-top:hover {
            opacity: 1;
            -webkit-transform: translateY(-2px);
                    transform: translateY(-2px);
            -webkit-transition: .2s ease-out;
            transition: .2s ease-out; }
          .scroll-top .fa {
            font-size: 24px;
            margin-bottom: 4px; }

        @media (max-width: 991.98px) {
          .scroll-top {
            right: 15px;
            bottom: 5px;
            width: 34px;
            height: 34px;
            line-height: 34px; }
            .scroll-top .fa {
              font-size: 15px; } }

        .social a {
          display: inline-block;
          width: 32px;
          height: 32px;
          line-height: 32px;
          margin-right: 4px;
          margin-bottom: 4px;
          text-align: center;
          color: inherit;
          font-size: 1rem;
          border-radius: 3px;
          opacity: 0.8;
          -webkit-transition: .4s ease-out;
          transition: .4s ease-out; }
          .social a:hover {
            opacity: 1; }
          .social a:last-child {
            margin-right: 0; }
          .social a.social-facebook:hover {
            color: #3b5998; }
          .social a.social-google:hover {
            color: #dd4b39; }
          .social a.social-gplus:hover {
            color: #dd4b39; }
          .social a.social-twitter:hover {
            color: #00aced; }
          .social a.social-linkedin:hover {
            color: #007bb6; }
          .social a.social-pinterest:hover {
            color: #cb2027; }
          .social a.social-git:hover {
            color: #666666; }
          .social a.social-tumblr:hover {
            color: #32506d; }
          .social a.social-vimeo:hover {
            color: #aad450; }
          .social a.social-youtube:hover {
            color: #bb0000; }
          .social a.social-flickr:hover {
            color: #ff0084; }
          .social a.social-reddit:hover {
            color: #ff4500; }
          .social a.social-dribbble:hover {
            color: #ea4c89; }
          .social a.social-skype:hover {
            color: #00aff0; }
          .social a.social-instagram:hover {
            color: #517fa4; }
          .social a.social-lastfm:hover {
            color: #c3000d; }
          .social a.social-soundcloud:hover {
            color: #ff8800; }
          .social a.social-behance:hover {
            color: #1769ff; }
          .social a.social-envato:hover {
            color: #82b541; }
          .social a.social-medium:hover {
            color: #00ab6c; }
          .social a.social-spotify:hover {
            color: #1db954; }
          .social a.social-quora:hover {
            color: #a82400; }
          .social a.social-xing:hover {
            color: #026466; }
          .social a.social-snapchat:hover {
            color: #fffc00; }
          .social a.social-telegram:hover {
            color: #0088cc; }
          .social a.social-whatsapp:hover {
            color: #075e54; }
          .social a.social-rss:hover {
            color: #f26522; }

        .social-vertical {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column; }

        .social-sm a {
          width: 28px;
          height: 28px;
          line-height: 28px;
          margin-right: 2px;
          margin-bottom: 2px;
          font-size: 0.8125rem; }

        .social-lg a {
          width: 38px;
          height: 38px;
          line-height: 36px;
          margin-right: 6px;
          margin-bottom: 6px;
          font-size: 1.25rem; }

        .social-inline a {
          width: auto;
          height: auto;
          margin-right: 1rem; }

        .social-brand a.social-facebook {
          color: #3b5998; }

        .social-brand a.social-google {
          color: #dd4b39; }

        .social-brand a.social-gplus {
          color: #dd4b39; }

        .social-brand a.social-twitter {
          color: #00aced; }

        .social-brand a.social-linkedin {
          color: #007bb6; }

        .social-brand a.social-pinterest {
          color: #cb2027; }

        .social-brand a.social-git {
          color: #666666; }

        .social-brand a.social-tumblr {
          color: #32506d; }

        .social-brand a.social-vimeo {
          color: #aad450; }

        .social-brand a.social-youtube {
          color: #bb0000; }

        .social-brand a.social-flickr {
          color: #ff0084; }

        .social-brand a.social-reddit {
          color: #ff4500; }

        .social-brand a.social-dribbble {
          color: #ea4c89; }

        .social-brand a.social-skype {
          color: #00aff0; }

        .social-brand a.social-instagram {
          color: #517fa4; }

        .social-brand a.social-lastfm {
          color: #c3000d; }

        .social-brand a.social-soundcloud {
          color: #ff8800; }

        .social-brand a.social-behance {
          color: #1769ff; }

        .social-brand a.social-envato {
          color: #82b541; }

        .social-brand a.social-medium {
          color: #00ab6c; }

        .social-brand a.social-spotify {
          color: #1db954; }

        .social-brand a.social-quora {
          color: #a82400; }

        .social-brand a.social-xing {
          color: #026466; }

        .social-brand a.social-snapchat {
          color: #fffc00; }

        .social-brand a.social-telegram {
          color: #0088cc; }

        .social-brand a.social-whatsapp {
          color: #075e54; }

        .social-brand a.social-rss {
          color: #f26522; }

        .social-gray a {
          color: #929daf; }
          .social-gray a:hover {
            color: #757575 !important; }

        .social-light a {
          color: rgba(255, 255, 255, 0.65); }
          .social-light a:hover {
            color: #fff !important; }

        .social-bg-brand a {
          color: #fff;
          opacity: 1; }
          .social-bg-brand a:hover {
            color: #fff !important; }

        .social-bg-brand .social-facebook {
          background-color: #3b5998; }

        .social-bg-brand .social-google {
          background-color: #dd4b39; }

        .social-bg-brand .social-gplus {
          background-color: #dd4b39; }

        .social-bg-brand .social-twitter {
          background-color: #00aced; }

        .social-bg-brand .social-linkedin {
          background-color: #007bb6; }

        .social-bg-brand .social-pinterest {
          background-color: #cb2027; }

        .social-bg-brand .social-git {
          background-color: #666666; }

        .social-bg-brand .social-tumblr {
          background-color: #32506d; }

        .social-bg-brand .social-vimeo {
          background-color: #aad450; }

        .social-bg-brand .social-youtube {
          background-color: #bb0000; }

        .social-bg-brand .social-flickr {
          background-color: #ff0084; }

        .social-bg-brand .social-reddit {
          background-color: #ff4500; }

        .social-bg-brand .social-dribbble {
          background-color: #ea4c89; }

        .social-bg-brand .social-skype {
          background-color: #00aff0; }

        .social-bg-brand .social-instagram {
          background-color: #517fa4; }

        .social-bg-brand .social-lastfm {
          background-color: #c3000d; }

        .social-bg-brand .social-soundcloud {
          background-color: #ff8800; }

        .social-bg-brand .social-behance {
          background-color: #1769ff; }

        .social-bg-brand .social-envato {
          background-color: #82b541; }

        .social-bg-brand .social-medium {
          background-color: #00ab6c; }

        .social-bg-brand .social-spotify {
          background-color: #1db954; }

        .social-bg-brand .social-quora {
          background-color: #a82400; }

        .social-bg-brand .social-xing {
          background-color: #026466; }

        .social-bg-brand .social-snapchat {
          background-color: #fffc00; }

        .social-bg-brand .social-telegram {
          background-color: #0088cc; }

        .social-bg-brand .social-whatsapp {
          background-color: #075e54; }

        .social-bg-brand .social-rss {
          background-color: #f26522; }

        .social-bg-pale-brand a {
          opacity: 1; }

        .social-bg-pale-brand .social-facebook {
          color: #3b5998;
          background-color: #e7ebf3; }
          .social-bg-pale-brand .social-facebook:hover {
            color: #3b5998 !important;
            background-color: #d8deea !important; }

        .social-bg-pale-brand .social-google {
          color: #dd4b39;
          background-color: #fbe9e7; }
          .social-bg-pale-brand .social-google:hover {
            color: #dd4b39 !important;
            background-color: #f8dbd7 !important; }

        .social-bg-pale-brand .social-gplus {
          color: #dd4b39;
          background-color: #fbe9e7; }
          .social-bg-pale-brand .social-gplus:hover {
            color: #dd4b39 !important;
            background-color: #f8dbd7 !important; }

        .social-bg-pale-brand .social-twitter {
          color: #00aced;
          background-color: #e0f5fd; }
          .social-bg-pale-brand .social-twitter:hover {
            color: #00aced !important;
            background-color: #cceefb !important; }

        .social-bg-pale-brand .social-linkedin {
          color: #007bb6;
          background-color: #e0eff6; }
          .social-bg-pale-brand .social-linkedin:hover {
            color: #007bb6 !important;
            background-color: #cce5f0 !important; }

        .social-bg-pale-brand .social-pinterest {
          color: #cb2027;
          background-color: #f9e4e5; }
          .social-bg-pale-brand .social-pinterest:hover {
            color: #cb2027 !important;
            background-color: #f5d2d4 !important; }

        .social-bg-pale-brand .social-git {
          color: #666666;
          background-color: #ededed; }
          .social-bg-pale-brand .social-git:hover {
            color: #666666 !important;
            background-color: #e0e0e0 !important; }

        .social-bg-pale-brand .social-tumblr {
          color: #32506d;
          background-color: #e6eaed; }
          .social-bg-pale-brand .social-tumblr:hover {
            color: #32506d !important;
            background-color: #d6dce2 !important; }

        .social-bg-pale-brand .social-vimeo {
          color: #aad450;
          background-color: #f5faea; }
          .social-bg-pale-brand .social-vimeo:hover {
            color: #aad450 !important;
            background-color: #eef6dc !important; }

        .social-bg-pale-brand .social-youtube {
          color: #bb0000;
          background-color: #f7e0e0; }
          .social-bg-pale-brand .social-youtube:hover {
            color: #bb0000 !important;
            background-color: #f1cccc !important; }

        .social-bg-pale-brand .social-flickr {
          color: #ff0084;
          background-color: #ffe0f0; }
          .social-bg-pale-brand .social-flickr:hover {
            color: #ff0084 !important;
            background-color: #ffcce6 !important; }

        .social-bg-pale-brand .social-reddit {
          color: #ff4500;
          background-color: #ffe9e0; }
          .social-bg-pale-brand .social-reddit:hover {
            color: #ff4500 !important;
            background-color: #ffdacc !important; }

        .social-bg-pale-brand .social-dribbble {
          color: #ea4c89;
          background-color: #fceaf1; }
          .social-bg-pale-brand .social-dribbble:hover {
            color: #ea4c89 !important;
            background-color: #fbdbe7 !important; }

        .social-bg-pale-brand .social-skype {
          color: #00aff0;
          background-color: #e0f5fd; }
          .social-bg-pale-brand .social-skype:hover {
            color: #00aff0 !important;
            background-color: #cceffc !important; }

        .social-bg-pale-brand .social-instagram {
          color: #517fa4;
          background-color: #eaf0f4; }
          .social-bg-pale-brand .social-instagram:hover {
            color: #517fa4 !important;
            background-color: #dce5ed !important; }

        .social-bg-pale-brand .social-lastfm {
          color: #c3000d;
          background-color: #f8e0e2; }
          .social-bg-pale-brand .social-lastfm:hover {
            color: #c3000d !important;
            background-color: #f3cccf !important; }

        .social-bg-pale-brand .social-soundcloud {
          color: #ff8800;
          background-color: #fff1e0; }
          .social-bg-pale-brand .social-soundcloud:hover {
            color: #ff8800 !important;
            background-color: #ffe7cc !important; }

        .social-bg-pale-brand .social-behance {
          color: #1769ff;
          background-color: #e3edff; }
          .social-bg-pale-brand .social-behance:hover {
            color: #1769ff !important;
            background-color: #d1e1ff !important; }

        .social-bg-pale-brand .social-envato {
          color: #82b541;
          background-color: #f0f6e8; }
          .social-bg-pale-brand .social-envato:hover {
            color: #82b541 !important;
            background-color: #e6f0d9 !important; }

        .social-bg-pale-brand .social-medium {
          color: #00ab6c;
          background-color: #e0f5ed; }
          .social-bg-pale-brand .social-medium:hover {
            color: #00ab6c !important;
            background-color: #cceee2 !important; }

        .social-bg-pale-brand .social-spotify {
          color: #1db954;
          background-color: #e4f7ea; }
          .social-bg-pale-brand .social-spotify:hover {
            color: #1db954 !important;
            background-color: #d2f1dd !important; }

        .social-bg-pale-brand .social-quora {
          color: #a82400;
          background-color: #f5e5e0; }
          .social-bg-pale-brand .social-quora:hover {
            color: #a82400 !important;
            background-color: #eed3cc !important; }

        .social-bg-pale-brand .social-xing {
          color: #026466;
          background-color: #e1eced; }
          .social-bg-pale-brand .social-xing:hover {
            color: #026466 !important;
            background-color: #cce0e0 !important; }

        .social-bg-pale-brand .social-snapchat {
          color: #fffc00;
          background-color: lightyellow; }
          .social-bg-pale-brand .social-snapchat:hover {
            color: #fffc00 !important;
            background-color: #fffecc !important; }

        .social-bg-pale-brand .social-telegram {
          color: #0088cc;
          background-color: #e0f1f9; }
          .social-bg-pale-brand .social-telegram:hover {
            color: #0088cc !important;
            background-color: #cce7f5 !important; }

        .social-bg-pale-brand .social-whatsapp {
          color: #075e54;
          background-color: #e1ecea; }
          .social-bg-pale-brand .social-whatsapp:hover {
            color: #075e54 !important;
            background-color: #cddfdd !important; }

        .social-bg-pale-brand .social-rss {
          color: #f26522;
          background-color: #fdede4; }
          .social-bg-pale-brand .social-rss:hover {
            color: #f26522 !important;
            background-color: #fce0d3 !important; }

        .social-bg-gray a {
          color: #929daf;
          border: none;
          background-color: #fafbfb; }

        .social-bg-light a {
          border: none;
          background-color: #fff; }

        .social-bg-dark a {
          border: none;
          color: rgba(255, 255, 255, 0.6);
          background-color: rgba(255, 255, 255, 0.1); }
          .social-bg-dark a:hover {
            color: rgba(255, 255, 255, 0.8) !important;
            background-color: rgba(255, 255, 255, 0.15) !important; }

        .social-hover-primary a:hover {
          color: #50a1ff !important; }

        .social-hover-bg-brand a.social-facebook:hover {
          background-color: #3b5998;
          color: #fff; }

        .social-hover-bg-brand a.social-google:hover {
          background-color: #dd4b39;
          color: #fff; }

        .social-hover-bg-brand a.social-gplus:hover {
          background-color: #dd4b39;
          color: #fff; }

        .social-hover-bg-brand a.social-twitter:hover {
          background-color: #00aced;
          color: #fff; }

        .social-hover-bg-brand a.social-linkedin:hover {
          background-color: #007bb6;
          color: #fff; }

        .social-hover-bg-brand a.social-pinterest:hover {
          background-color: #cb2027;
          color: #fff; }

        .social-hover-bg-brand a.social-git:hover {
          background-color: #666666;
          color: #fff; }

        .social-hover-bg-brand a.social-tumblr:hover {
          background-color: #32506d;
          color: #fff; }

        .social-hover-bg-brand a.social-vimeo:hover {
          background-color: #aad450;
          color: #fff; }

        .social-hover-bg-brand a.social-youtube:hover {
          background-color: #bb0000;
          color: #fff; }

        .social-hover-bg-brand a.social-flickr:hover {
          background-color: #ff0084;
          color: #fff; }

        .social-hover-bg-brand a.social-reddit:hover {
          background-color: #ff4500;
          color: #fff; }

        .social-hover-bg-brand a.social-dribbble:hover {
          background-color: #ea4c89;
          color: #fff; }

        .social-hover-bg-brand a.social-skype:hover {
          background-color: #00aff0;
          color: #fff; }

        .social-hover-bg-brand a.social-instagram:hover {
          background-color: #517fa4;
          color: #fff; }

        .social-hover-bg-brand a.social-lastfm:hover {
          background-color: #c3000d;
          color: #fff; }

        .social-hover-bg-brand a.social-soundcloud:hover {
          background-color: #ff8800;
          color: #fff; }

        .social-hover-bg-brand a.social-behance:hover {
          background-color: #1769ff;
          color: #fff; }

        .social-hover-bg-brand a.social-envato:hover {
          background-color: #82b541;
          color: #fff; }

        .social-hover-bg-brand a.social-medium:hover {
          background-color: #00ab6c;
          color: #fff; }

        .social-hover-bg-brand a.social-spotify:hover {
          background-color: #1db954;
          color: #fff; }

        .social-hover-bg-brand a.social-quora:hover {
          background-color: #a82400;
          color: #fff; }

        .social-hover-bg-brand a.social-xing:hover {
          background-color: #026466;
          color: #fff; }

        .social-hover-bg-brand a.social-snapchat:hover {
          background-color: #fffc00;
          color: #fff; }

        .social-hover-bg-brand a.social-telegram:hover {
          background-color: #0088cc;
          color: #fff; }

        .social-hover-bg-brand a.social-whatsapp:hover {
          background-color: #075e54;
          color: #fff; }

        .social-hover-bg-brand a.social-rss:hover {
          background-color: #f26522;
          color: #fff; }

        .social-rounded a {
          border-radius: 50%;
          border: 1px solid #f1f2f3; }

        .social-rounded.social-gray a {
          border-color: #f5f6f7; }

        .social-rounded.social-light a {
          border-color: rgba(255, 255, 255, 0.5);
          font-size: 0.8125rem; }

        .social-rounded.social-light.social-sm a {
          font-size: 0.6875rem; }

        .social-rounded.social-light.social-lg a {
          font-size: 0.9375rem; }

        .social-bordered a {
          border: 1px solid #eaeff4; }

        .social-bordered.social-gray a {
          border-color: #f5f6f7; }

        .social-bordered.social-light a {
          border-color: rgba(255, 255, 255, 0.6); }

        .social-cycling a:hover i {
          -webkit-animation: cycle .4s forwards;
                  animation: cycle .4s forwards; }

        @-webkit-keyframes cycle {
          49% {
            -webkit-transform: translateY(-100%);
                    transform: translateY(-100%); }
          50% {
            opacity: 0;
            -webkit-transform: translateY(100%);
                    transform: translateY(100%); }
          51% {
            opacity: 1; } }

        @keyframes cycle {
          49% {
            -webkit-transform: translateY(-100%);
                    transform: translateY(-100%); }
          50% {
            opacity: 0;
            -webkit-transform: translateY(100%);
                    transform: translateY(100%); }
          51% {
            opacity: 1; } }

        .nav-tabs .nav-link {
          border-top-width: 2px; }

        .nav-tabs-minimal {
          border-bottom: 1px solid #f1f2f3; }
          .nav-tabs-minimal .nav-link {
            border-bottom: 2px solid transparent; }
          .nav-tabs-minimal .nav-link.active,
          .nav-tabs-minimal .nav-item.show .nav-link {
            border-bottom-color: #50a1ff; }

        .nav-tabs-outline {
          -webkit-box-pack: center;
                  justify-content: center; }
          .nav-tabs-outline .nav-link {
            padding: 0.25rem 1.25rem;
            border: 1px solid #191919;
            color: #191919;
            text-transform: uppercase;
            font-size: 0.8325rem;
            letter-spacing: 1px; }
            .nav-tabs-outline .nav-link:hover, .nav-tabs-outline .nav-link.active {
              color: #fff;
              background-color: #191919; }
            .nav-tabs-outline .nav-link.disabled {
              opacity: 0.5;
              cursor: default; }
              .nav-tabs-outline .nav-link.disabled:hover {
                color: #191919;
                background-color: transparent; }
          .nav-tabs-outline .nav-item {
            min-width: 120px;
            text-align: center; }
            .nav-tabs-outline .nav-item + .nav-item .nav-link {
              border-left-width: 0; }
            .nav-tabs-outline .nav-item:first-child .nav-link {
              border-top-left-radius: 10rem;
              border-bottom-left-radius: 10rem; }
            .nav-tabs-outline .nav-item:last-child .nav-link {
              border-top-right-radius: 10rem;
              border-bottom-right-radius: 10rem; }
          .nav-tabs-outline.nav-separated .nav-item {
            min-width: 150px;
            padding: 0.25rem 0.5rem; }
            .nav-tabs-outline.nav-separated .nav-item + .nav-item .nav-link {
              border-left-width: 1px; }
          .nav-tabs-outline.nav-separated .nav-link {
            border-radius: 10rem; }
          @media (max-width: 991.98px) {
            .nav-tabs-outline .nav-item {
              min-width: 150px;
              padding: 0.25rem 0.5rem; }
              .nav-tabs-outline .nav-item + .nav-item .nav-link {
                border-left-width: 1px; }
            .nav-tabs-outline .nav-link {
              border-radius: 10rem; } }

        .nav-tabs-border {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column; }
          .nav-tabs-border .nav-link {
            border: 1px solid transparent;
            padding: 1.25rem 1.5rem;
            border-radius: 5px;
            opacity: 0.75; }
            .nav-tabs-border .nav-link:hover {
              opacity: 1;
              color: #757575; }
          .nav-tabs-border .nav-link.active,
          .nav-tabs-border .nav-item.show .nav-link {
            opacity: 1;
            color: #757575;
            border-color: #f1f2f3; }
          .nav-tabs-border .nav-link.disabled {
            opacity: 0.6; }

        .nav-tabs-gray {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column; }
          .nav-tabs-gray .nav-link {
            padding: 1.5rem 1.75rem;
            border-radius: 5px;
            opacity: 0.75; }
            .nav-tabs-gray .nav-link:hover {
              opacity: 1;
              color: #757575; }
          .nav-tabs-gray .nav-link.active,
          .nav-tabs-gray .nav-item.show .nav-link {
            opacity: 1;
            color: #757575;
            background-color: #f9fafb; }
          .nav-tabs-gray .nav-link.disabled {
            opacity: 0.6; }

        .nav-tabs-shadow {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column; }
          .nav-tabs-shadow .nav-link {
            padding: 1.5rem 1.75rem;
            border-radius: 5px;
            opacity: 0.75; }
            .nav-tabs-shadow .nav-link:hover {
              opacity: 1;
              color: #757575; }
          .nav-tabs-shadow .nav-link.active,
          .nav-tabs-shadow .nav-item.show .nav-link {
            opacity: 1;
            color: #757575;
            background-color: #fff;
            -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05); }
          .nav-tabs-shadow .nav-link.disabled {
            opacity: 0.6; }

        .rating {
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-orient: horizontal;
          -webkit-box-direction: normal;
                  flex-direction: row;
          list-style: none;
          margin: 0;
          padding: 0; }
          .rating label {
            color: #ffba00;
            cursor: default; }
            .rating label::before {
              margin-right: 5px;
              display: inline-block; }
          .rating label.active {
            color: #ffba00; }
          .rating label.empty {
            color: #ecf0f0; }

        .rating-xs label::before {
          margin-right: 1px;
          font-size: 11px; }

        .rating-sm label::before {
          margin-right: 2px;
          font-size: 13px; }

        .rating-lg label::before {
          font-size: 18px; }

        .custom-control {
          padding-left: 0;
          min-height: auto; }

        .custom-control-input:checked ~ .custom-control-label::after {
          -webkit-transform: scale(1);
                  transform: scale(1); }

        .custom-control-input:disabled ~ .custom-control-label {
          opacity: .7; }
          .custom-control-input:disabled ~ .custom-control-label::before, .custom-control-input:disabled ~ .custom-control-label::after {
            opacity: 0.7; }

        .custom-control-label {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          font-weight: 300; }
          .custom-control-label::before {
            position: static;
            top: auto;
            border: 1px solid #eaeff4;
            margin-right: 0.5rem; }
          .custom-control-label::after {
            -webkit-transform: scale(0);
                    transform: scale(0);
            -webkit-transition: -webkit-transform .3s;
            transition: -webkit-transform .3s;
            transition: transform .3s;
            transition: transform .3s, -webkit-transform .3s; }

        .custom-radio {
          cursor: pointer; }
          .custom-radio .custom-control-label::after {
            top: 8px;
            left: 0.3125rem;
            border-radius: 50%;
            width: 0.5rem;
            height: 0.5rem;
            background-color: #50a1ff; }

        .custom-checkbox {
          cursor: pointer; }
          .custom-checkbox .custom-control-label::after {
            top: 50%;
            left: 6px;
            margin-top: -6px;
            width: 5px;
            height: 10px;
            border: solid #50a1ff;
            border-width: 0 1px 1px 0;
            -webkit-transform: scale(0) rotate(35deg);
                    transform: scale(0) rotate(35deg); }
          .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
            -webkit-transform: scale(1) rotate(35deg);
                    transform: scale(1) rotate(35deg); }

        .switch {
          position: relative;
          min-height: 1.9rem; }

        .switch-inline {
          display: -webkit-inline-box;
          display: inline-flex;
          margin-right: 1rem; }

        .switch-input {
          position: absolute;
          z-index: -1;
          opacity: 0; }
          .switch-input:checked ~ .switch-label::before {
            border-color: #cee5ff; }
          .switch-input:checked ~ .switch-label::after {
            background: #50a1ff;
            left: 24px; }
          .switch-input:disabled ~ .switch-label {
            opacity: .5; }

        .switch-label {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          font-weight: 300;
          margin-bottom: 0; }
          .switch-label::before {
            content: '';
            width: 40px;
            height: 20px;
            background: transparent;
            border: 2px solid #f1f2f3;
            border-radius: 20px;
            margin-right: 0.5rem;
            -webkit-transition: 0.3s;
            transition: 0.3s; }
          .switch-label::after {
            content: '';
            display: block;
            position: absolute;
            top: 6px;
            left: 4px;
            width: 12px;
            height: 12px;
            cursor: inherit;
            background: #e8e8e8;
            border-radius: 50%;
            -webkit-transition: 0.3s;
            transition: 0.3s; }

        .switch-stacked .switch {
          display: inline; }
          .switch-stacked .switch::after {
            display: block;
            margin-bottom: .25rem;
            content: ""; }

        /*
        .switch {
          font-weight: 300;
          letter-spacing: 0;
          margin-bottom: 0;
          line-height: $height-sm;
          cursor: pointer;
          white-space: nowrap;

          input {
            display: none;

            &:checked ~ .switch-indicator {
              border-color: theme-color-level('primary', -9);
              //background: lighten($color-primary, 20%);

              &::after {
                background: $color-primary;
                left: calc(100% - 14px);
                box-shadow: 0px 0px 3px $color-bg-lightest;
              }
            }

            &:disabled ~ span {
              cursor: default;
              opacity: .5;
            }
          }

          &.disabled {
            opacity: .5;
            cursor: default;
          }

        }

        .switch-indicator {
          position: relative;
          display: inline-block;
          width: 40px;
          height: 20px;
          background: transparent;
          border: 2px solid $color-divider-light;
          border-radius: 20px;
          vertical-align: middle;
          transition: 0.3s;


          &::after {
            content: '';
            display: block;
            position: absolute;
            top: 2px;
            left: 2px;
            width: 12px;
            height: 12px;
            transition: 0.3s;
            cursor: inherit;
            background: $color-divider-dark;
            border-radius: 50%;
          }
        }

        .switch-description {
          padding-left: 6px;
        }


        //
        // Stacked
        //
        .switch-stacked .switch {
          display: inline;

          &::after {
            display: block;
            margin-bottom: .25rem;
            content: "";
          }

        }
        */
        .form-control {
          font-weight: 300; }
          .form-control option {
            font-weight: 300; }

        label {
          font-weight: 400;
          font-size: 13px;
          letter-spacing: .5px;
          margin-bottom: 4px; }
          label.require::after {
            content: '*';
            color: #ff4954;
            font-weight: 500;
            margin-left: 8px; }

        .form-row .btn-block {
          height: 100%; }

        select:invalid {
          color: red; }

        .file-group {
          position: relative;
          overflow: hidden; }
          .file-group input[type="file"] {
            position: absolute;
            opacity: 0;
            z-index: -1;
            width: 20px; }
          .file-group .file-value {
            background-color: #fff; }

        .file-group-inline {
          display: inline-block; }

        .custom-file input {
          cursor: pointer; }

        .custom-file-label {
          font-size: 0.9375rem;
          color: #c9ccce;
          font-weight: 300; }
          .custom-file-label::after {
            cursor: pointer;
            font-weight: 400; }

        [data-form="mailer"] .d-on-success {
          display: none; }

        .input-group {
          border: 1px solid #eaeff4;
          border-radius: 2px;
          -webkit-transition: all 0.3s ease-out;
          transition: all 0.3s ease-out; }
          .input-group.focus {
            border-color: #f1f2f3;
            -webkit-box-shadow: 0 0 40px rgba(0, 0, 0, 0.045);
                    box-shadow: 0 0 40px rgba(0, 0, 0, 0.045); }
          .input-group .form-control {
            -webkit-box-shadow: none;
                    box-shadow: none;
            border: none;
            border-radius: 0; }

        .input-group-prepend,
        .input-group-append {
          margin-left: 0;
          margin-right: 0; }
          .input-group-prepend .btn,
          .input-group-append .btn {
            height: calc(100% + 2px);
            margin: -1px; }

        /*
        .input-group-prepend .input-group-text {
          padding-right: 0;
        }
        */
        .input-group-text {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: center;
                  justify-content: center;
          padding-top: 0;
          padding-bottom: 0;
          background-color: #fff;
          border: none;
          color: #c9ccce;
          font-weight: 300;
          border-radius: 0;
          height: 100%; }
          .input-group-text .custom-control {
            margin-bottom: 0; }
          .input-group-text + .form-control {
            padding-left: 0; }

        .input-group .form-control:not(:last-child),
        .input-group-text:not(:last-child) {
          border-right: 0; }

        .input-group .form-control:not(:first-child),
        .input-group-text:not(:first-child) {
          border-left: 0; }

        .input-group-prepend .btn {
          margin-right: 0; }

        .input-group-append .btn {
          margin-left: 0; }

        .input-group-prepend .input-group-text:last-child {
          padding-right: 0; }

        .was-validated .input-group:valid, .input-group.is-valid {
          border-color: #3cd458; }
          .was-validated .input-group:valid .valid-feedback,
          .was-validated .input-group:valid .valid-tooltip,
          .was-validated .input-group:valid ~ .valid-feedback,
          .was-validated .input-group:valid ~ .valid-tooltip, .input-group.is-valid .valid-feedback,
          .input-group.is-valid .valid-tooltip,
          .input-group.is-valid ~ .valid-feedback,
          .input-group.is-valid ~ .valid-tooltip {
            display: block; }

        .was-validated .input-group:invalid, .input-group.is-invalid {
          border-color: #ff4954; }
          .was-validated .input-group:invalid .invalid-feedback,
          .was-validated .input-group:invalid .invalid-tooltip,
          .was-validated .input-group:invalid ~ .invalid-feedback,
          .was-validated .input-group:invalid ~ .invalid-tooltip, .input-group.is-invalid .invalid-feedback,
          .input-group.is-invalid .invalid-tooltip,
          .input-group.is-invalid ~ .invalid-feedback,
          .input-group.is-invalid ~ .invalid-tooltip {
            display: block; }

        .input-border .form-control:focus,
        .input-border .input-group.focus {
          border-color: #96c7ff;
          -webkit-box-shadow: none;
                  box-shadow: none; }

        .input-line .form-control {
          border-color: transparent;
          padding-left: 0;
          padding-right: 0;
          background-color: transparent;
          -webkit-background-size: 0 1px, 100% 1px;
                  background-size: 0 1px, 100% 1px;
          background-repeat: no-repeat;
          background-position: center bottom, center calc(100%);
          background-image: -webkit-gradient(linear, left top, left bottom, from(#96c7ff), to(#96c7ff)), -webkit-gradient(linear, left top, left bottom, from(#eaeff4), to(#eaeff4));
          background-image: -webkit-linear-gradient(#96c7ff, #96c7ff), -webkit-linear-gradient(#eaeff4, #eaeff4);
          background-image: linear-gradient(#96c7ff, #96c7ff), linear-gradient(#eaeff4, #eaeff4);
          -webkit-transition: background 0.3s;
          transition: background 0.3s; }
          .input-line .form-control:focus, .input-line .form-control.focus {
            -webkit-background-size: 100% 1px, 100% 1px;
                    background-size: 100% 1px, 100% 1px;
            border-color: transparent;
            -webkit-box-shadow: none;
                    box-shadow: none; }
          .input-line .form-control:disabled, .input-line .form-control[readonly] {
            background-color: #fff;
            opacity: 0.7; }
          .input-line .form-control.is-valid {
            background-image: -webkit-gradient(linear, left top, left bottom, from(#96c7ff), to(#96c7ff)), -webkit-gradient(linear, left top, left bottom, from(#3cd458), to(#3cd458));
            background-image: -webkit-linear-gradient(#96c7ff, #96c7ff), -webkit-linear-gradient(#3cd458, #3cd458);
            background-image: linear-gradient(#96c7ff, #96c7ff), linear-gradient(#3cd458, #3cd458); }
          .input-line .form-control.is-invalid {
            background-image: -webkit-gradient(linear, left top, left bottom, from(#96c7ff), to(#96c7ff)), -webkit-gradient(linear, left top, left bottom, from(#ff4954), to(#ff4954));
            background-image: -webkit-linear-gradient(#96c7ff, #96c7ff), -webkit-linear-gradient(#ff4954, #ff4954);
            background-image: linear-gradient(#96c7ff, #96c7ff), linear-gradient(#ff4954, #ff4954); }

        .input-line .input-group {
          border: none; }
          .input-line .input-group.focus {
            -webkit-box-shadow: none;
                    box-shadow: none; }

        .input-line .input-group-prepend .btn,
        .input-line .input-group-append .btn {
          height: 100%;
          margin: 0; }

        .input-line .input-group-text {
          background-color: transparent; }

        .input-line .input-group-prepend .input-group-text:last-child {
          padding-right: 0.75rem; }

        .input-round .form-control,
        .input-round .input-group,
        .input-round .input-group-text,
        .input-round .input-group .btn {
          border-radius: 10rem; }

        .input-round .form-control {
          padding-left: 1rem;
          padding-right: 1rem; }

        .input-round textarea.form-control {
          border-radius: 2px; }

        .input-round .input-group-text {
          padding-left: 1rem;
          padding-right: 1rem;
          opacity: .8; }
          .input-round .input-group-text + .form-control {
            padding-left: 0; }

        .input-round .form-control-lg,
        .input-round .input-group-lg .form-control {
          padding-left: 1.5rem;
          padding-right: 1.5rem; }

        .input-glass .form-control {
          border: none;
          background-color: rgba(255, 255, 255, 0.2);
          font-weight: 400;
          color: rgba(255, 255, 255, 0.8); }
          .input-glass .form-control.is-valid {
            background-color: rgba(60, 212, 88, 0.2); }
          .input-glass .form-control.is-invalid {
            background-color: rgba(255, 73, 84, 0.2); }
          .input-glass .form-control::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-glass .form-control::-moz-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-glass .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-glass .form-control::-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-glass .form-control::placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-glass .form-control:focus {
            -webkit-box-shadow: none;
                    box-shadow: none;
            color: #fff; }

        .input-glass select option {
          color: #323d47; }

        .input-glass label {
          opacity: .8; }

        .input-glass .input-group {
          border: none; }

        .input-glass .input-group-prepend .btn,
        .input-glass .input-group-append .btn {
          height: 100%;
          margin: 0; }

        .input-glass .input-group-text {
          background-color: rgba(255, 255, 255, 0.2);
          border: none;
          color: rgba(255, 255, 255, 0.8); }

        .input-glass.input-round .input-group {
          background-color: rgba(255, 255, 255, 0.2); }
          .input-glass.input-round .input-group .form-control,
          .input-glass.input-round .input-group .input-group-text {
            background-color: transparent; }

        .input-transparent .form-control {
          border-color: rgba(255, 255, 255, 0.3);
          background-color: transparent;
          color: rgba(255, 255, 255, 0.8); }
          .input-transparent .form-control.is-valid {
            border-color: rgba(60, 212, 88, 0.4); }
          .input-transparent .form-control.is-invalid {
            border-color: rgba(255, 73, 84, 0.4); }
          .input-transparent .form-control::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-transparent .form-control::-moz-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-transparent .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-transparent .form-control::-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-transparent .form-control::placeholder {
            color: rgba(255, 255, 255, 0.65); }
          .input-transparent .form-control:focus {
            -webkit-box-shadow: none;
                    box-shadow: none;
            border-color: rgba(255, 255, 255, 0.5);
            color: #fff; }

        .input-transparent select option {
          color: #323d47; }

        .input-transparent label {
          opacity: .8; }

        .input-transparent .input-group {
          border-color: rgba(255, 255, 255, 0.3); }
          .input-transparent .input-group.focus {
            -webkit-box-shadow: none;
                    box-shadow: none;
            border-color: rgba(255, 255, 255, 0.5);
            color: #fff; }
          .input-transparent .input-group .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.3); }
          .input-transparent .input-group .input-group-prepend .btn-outline-light {
            border-top-width: 0;
            border-left-width: 0;
            border-bottom-width: 0; }
          .input-transparent .input-group .input-group-append .btn-outline-light {
            border-top-width: 0;
            border-right-width: 0;
            border-bottom-width: 0; }

        .input-transparent .input-group-text {
          background-color: transparent;
          border-color: rgba(255, 255, 255, 0.3);
          color: rgba(255, 255, 255, 0.75); }

        .feature-1 .feature-icon {
          font-size: 3rem;
          line-height: 1;
          margin-bottom: 1.75rem;
          color: #929daf; }

        .feature-2 .feature-icon {
          font-size: 2.5rem;
          line-height: 1;
          margin-bottom: 1.5rem;
          color: #929daf; }

        .feature-2 h5, .feature-2 h6 {
          text-transform: uppercase;
          font-weight: 500;
          letter-spacing: 2px; }

        .partner {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: center;
                  justify-content: center;
          text-align: center;
          flex-wrap: wrap; }
          .partner img {
            margin: 16px 24px;
            max-width: 100%; }
          .partner [class*="col-"] img {
            margin: 0; }

        .partner-sm img {
          height: 20px; }

        .portfolio-1 {
          position: relative;
          overflow: hidden;
          display: block; }
          .portfolio-1::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #50a1ff;
            opacity: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            z-index: 1; }
          .portfolio-1::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 1px solid #fff;
            opacity: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            z-index: 2; }
          .portfolio-1:hover::before {
            opacity: .8; }
          .portfolio-1:hover::after {
            opacity: .8;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px; }
          .portfolio-1:hover img {
            -webkit-transform: scale(1.1);
                    transform: scale(1.1); }
          .portfolio-1:hover .portfolio-detail {
            opacity: 1; }
          .portfolio-1 img {
            -webkit-transition: all 0.3s;
            transition: all 0.3s; }
          .portfolio-1 .portfolio-detail {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
                    transform: translateY(-50%);
            opacity: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            color: #fff;
            z-index: 3; }
          .portfolio-1 h5 {
            color: #fff;
            margin-bottom: 0; }
          .portfolio-1 p {
            font-size: 13px; }

        .project-detail {
          list-style: none;
          padding-left: 0; }
          .project-detail li:not(:last-child) {
            margin-bottom: 1.5rem; }
          .project-detail strong {
            display: block;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #323d47; }

        .press-kit {
          position: relative;
          overflow: hidden;
          display: block;
          min-height: 160px;
          text-align: center;
          border: 1px solid #f1f2f3;
          border-radius: 3px; }
          .press-kit::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #191919;
            opacity: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            z-index: 1; }
          .press-kit:hover::before {
            opacity: .5; }
          .press-kit:hover .asset-details {
            opacity: 1; }
          .press-kit img {
            -webkit-transition: all 0.3s;
            transition: all 0.3s; }
          .press-kit .asset-details {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
                    transform: translateY(-50%);
            opacity: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            color: #fff;
            z-index: 3; }
          .press-kit h5 {
            color: #fff;
            margin-bottom: 0; }
          .press-kit p {
            font-size: 13px; }

        .price-unit {
          display: inline-block;
          font-size: 16px;
          vertical-align: text-top;
          margin-right: -10px;
          margin-top: 16px; }

        .plan-period {
          display: inline-block;
          font-size: 12px;
          vertical-align: text-bottom;
          margin-left: -10px;
          margin-bottom: 14px;
          color: #929daf; }

        .pricing-1 {
          background-color: #fff;
          border: 1px solid #f1f2f3;
          border-radius: 5px;
          text-align: center;
          -webkit-transition: .5s;
          transition: .5s; }
          .pricing-1.popular, .pricing-1:hover {
            -webkit-box-shadow: 0 0 25px rgba(0, 0, 0, 0.07);
                    box-shadow: 0 0 25px rgba(0, 0, 0, 0.07); }
          .pricing-1 .plan-name {
            padding: 16px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 600;
            border-bottom: 1px solid #f1f2f3;
            background-color: #fcfdfe; }
          .pricing-1 .price {
            font-size: 60px;
            font-weight: 600; }

        .pricing-2 {
          text-align: center; }
          .pricing-2 .price {
            font-size: 5rem;
            font-weight: 200;
            opacity: .9; }
          .pricing-2 .plan-name {
            text-transform: uppercase;
            font-weight: 500;
            font-size: 0.8325rem;
            opacity: .9; }
          .pricing-2 .plan-description {
            opacity: .9; }

        .pricing-3 {
          text-align: center;
          padding: 2rem;
          border-radius: 10px; }
          .pricing-3.popular {
            background-color: #fafbfb;
            position: relative; }
          .pricing-3 .popular-tag {
            position: absolute;
            top: 0;
            left: 40px;
            background-color: #3cd458;
            color: #fff;
            padding: 1px 0.75rem;
            padding-right: 1.5rem;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1.5px;
            font-weight: 400;
            border-top-right-radius: 5rem;
            border-bottom-right-radius: 5rem;
            -webkit-transform: rotate(90deg);
                    transform: rotate(90deg);
            -webkit-transform-origin: top left;
                    transform-origin: top left; }
          .pricing-3 .price {
            font-size: 3.75rem;
            font-weight: 500;
            margin-top: 1rem;
            margin-bottom: 1.5rem; }
          .pricing-3 .plan-name {
            text-transform: uppercase;
            font-weight: 600;
            font-size: 0.8325rem;
            letter-spacing: 1px;
            opacity: .9; }
          .pricing-3 ul {
            list-style: none;
            padding-left: 0; }

        .pricing-4 {
          -webkit-box-align: center;
                  align-items: center;
          color: #757575;
          border: 1px solid #f1f2f3; }
          .pricing-4.popular, .pricing-4:hover, .pricing-4:focus {
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
            color: #757575; }
          .pricing-4 .plan-description {
            background-color: #fafbfb;
            padding: 2rem; }
            .pricing-4 .plan-description h5 {
              font-weight: 500; }
          .pricing-4 .plan-price {
            text-align: center; }
            .pricing-4 .plan-price h3 {
              font-weight: 300;
              font-size: 2.25rem;
              padding-top: 1rem; }
              .pricing-4 .plan-price h3 small {
                font-weight: 300;
                font-size: 0.8325rem; }

        .product-1 {
          position: relative;
          display: block;
          border: 1px solid #f1f2f3;
          border-radius: 3px;
          padding: 1rem 1.25rem;
          background-color: #fcfdfe;
          color: #757575; }
          .product-1:hover {
            background-color: #f9fafb;
            color: #757575; }
            .product-1:hover img {
              -webkit-transform: scale(1.01);
                      transform: scale(1.01); }
          .product-1 img {
            -webkit-transition: all 0.3s;
            transition: all 0.3s; }
            .product-1 img + .product-detail {
              margin-top: 1rem; }
          .product-1 .product-detail {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-direction: row;
            -webkit-box-pack: justify;
                    justify-content: space-between; }
            .product-1 .product-detail h5, .product-1 .product-detail h6 {
              margin-bottom: 0.25rem; }
            .product-1 .product-detail p {
              font-size: 0.875rem;
              color: #929daf;
              line-height: 1.4; }
            .product-1 .product-detail .product-price {
              font-weight: 100;
              font-size: 1.5rem;
              letter-spacing: 1px;
              padding-left: 1rem;
              white-space: nowrap; }
              .product-1 .product-detail .product-price .unit {
                font-size: 0.75rem;
                vertical-align: text-top; }
              .product-1 .product-detail .product-price s {
                color: #d3d3d3;
                margin-right: 0.5rem;
                font-size: 65%;
                vertical-align: middle; }
          .product-1 .badge-pos-left,
          .product-1 .badge-pos-right {
            position: absolute;
            padding-top: 3px;
            padding-bottom: 4px;
            font-size: 11px;
            top: -0.5rem;
            z-index: 1; }
          .product-1 .badge-pos-left {
            left: -0.5rem; }
          .product-1 .badge-pos-right {
            right: -0.5rem; }

        .product-2 .product-media {
          position: relative;
          display: block;
          border-radius: 0.35rem;
          margin-bottom: 1rem; }
          .product-2 .product-media, .product-2 .product-media:hover {
            background-color: #f9fafb; }

        .product-2 .product-detail {
          text-align: center; }
          .product-2 .product-detail .product-price s {
            color: #d3d3d3;
            margin-right: 0.5rem; }

        .product-2 .badge-pos-left,
        .product-2 .badge-pos-right {
          position: absolute;
          padding-top: 3px;
          padding-bottom: 4px;
          font-size: 11px;
          top: 0.5rem;
          z-index: 1; }

        .product-2 .badge-pos-left {
          left: 0.5rem; }

        .product-2 .badge-pos-right {
          right: 0.5rem; }

        .product-3 {
          position: relative;
          background-color: #fff;
          border-radius: 0.25rem;
          -webkit-transition: 0.3s ease-out;
          transition: 0.3s ease-out; }
          .product-3 .product-media {
            border-radius: inherit; }
          .product-3 .product-detail {
            padding: 1rem;
            text-align: center; }
            .product-3 .product-detail .product-price s {
              color: #d3d3d3;
              margin-right: 0.5rem; }
          .product-3 .badge-pos-left,
          .product-3 .badge-pos-right {
            position: absolute;
            padding-top: 3px;
            padding-bottom: 4px;
            font-size: 11px;
            top: -0.5rem;
            z-index: 1; }
          .product-3 .badge-pos-left {
            left: -0.5rem; }
          .product-3 .badge-pos-right {
            right: -0.5rem; }

        .table-cart {
          border: 1px solid #eaeff4;
          border-top: none; }
          .table-cart td {
            vertical-align: middle;
            border-top-color: #eaeff4;
            padding-left: 12px;
            padding-right: 12px; }
          .table-cart tr td:first-child {
            padding-left: 30px; }
          .table-cart tr td:last-child {
            padding-right: 30px;
            text-align: right; }
          .table-cart h5 {
            font-size: 1rem;
            margin-bottom: 0; }
          .table-cart p {
            font-size: 13px;
            color: #929daf;
            line-height: 1.4;
            margin-bottom: 0; }
          .table-cart img {
            max-height: 80px; }
          .table-cart label {
            font-size: 12px;
            display: inline-block;
            padding-right: 8px; }
          .table-cart input {
            max-width: 60px;
            display: inline-block; }
          .table-cart .item-remove {
            color: #929daf; }
            .table-cart .item-remove:hover {
              color: #ff4954; }
          .table-cart .price {
            font-weight: 100; }

        .cart-price {
          border: 1px solid #eaeff4;
          border-radius: 3px;
          margin-bottom: 1rem;
          padding: 20px;
          background-color: #fcfdfe; }
          .cart-price .flexbox p {
            margin-bottom: 4px; }
          .cart-price .flexbox strong {
            font-weight: 400;
            font-size: .9em; }

        .team-1 {
          text-align: center; }
          .team-1 img {
            border-radius: .25rem;
            margin-bottom: 2rem; }
          .team-1 h5,
          .team-1 h6 {
            letter-spacing: 1px; }
            .team-1 h5 small,
            .team-1 h6 small {
              text-transform: uppercase;
              display: block;
              padding-top: 0.75rem; }
          .team-1 small {
            display: block;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            color: #929daf; }
          .team-1 p {
            opacity: .9; }

        .team-2 {
          text-align: center; }
          .team-2 img {
            border-radius: 10rem;
            margin-bottom: 2rem; }
          .team-2 small {
            display: block;
            letter-spacing: 1px;
            margin-bottom: 1rem; }

        .team-3 {
          display: -webkit-box;
          display: flex; }
          .team-3 img {
            border-radius: .25rem;
            max-width: 128px; }
          .team-3 .team-img {
            flex-shrink: 0; }
          .team-3 .team-body {
            padding-left: 2rem; }
          .team-3 small {
            display: block;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            text-transform: uppercase; }
          .team-3 p {
            opacity: .9; }
          @media (max-width: 991.98px) {
            .team-3 img {
              max-width: 56px; } }

        body {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          min-height: 100vh; }

        .container-xs,
        .container-sm {
          width: 100%;
          padding: 0 15px;
          margin: 0 auto; }

        .container-xs {
          max-width: 540px; }

        .container-sm {
          max-width: 640px; }

        .main-container {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: stretch;
                  align-items: stretch;
          position: relative; }
          .main-container.container-fluid {
            padding-left: 30px;
            padding-right: 30px; }

        .main-content {
          -webkit-box-flex: 1;
                  flex-grow: 1; }

        .backdrop {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          height: 100vh;
          cursor: pointer; }

        .layout-centered .main-content {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          justify-content: space-around; }
          .layout-centered .main-content .section {
            width: 100%; }

        .footer {
          padding: 1.25rem 0;
          border-top: 1px solid #f1f2f3; }

        .row.no-gap {
          margin-left: 0;
          margin-right: 0; }
          .row.no-gap > .col,
          .row.no-gap > [class*="col-"] {
            padding-right: 0;
            padding-left: 0; }

        .row.gap-1 {
          margin-left: -4px;
          margin-right: -4px; }
          .row.gap-1 > .col,
          .row.gap-1 > [class*="col-"] {
            padding-left: 4px;
            padding-right: 4px; }

        .row.gap-2 {
          margin-left: -8px;
          margin-right: -8px; }
          .row.gap-2 > .col,
          .row.gap-2 > [class*="col-"] {
            padding-left: 8px;
            padding-right: 8px; }

        .row.gap-3 {
          margin-left: -15px;
          margin-right: -15px; }
          .row.gap-3 > .col,
          .row.gap-3 > [class*="col-"] {
            padding-left: 15px;
            padding-right: 15px; }

        .row.gap-4 {
          margin-left: -15px;
          margin-right: -15px; }
          .row.gap-4 > .col,
          .row.gap-4 > [class*="col-"] {
            padding-left: 15px;
            padding-right: 15px; }

        .row.gap-5 {
          margin-left: -15px;
          margin-right: -15px; }
          .row.gap-5 > .col,
          .row.gap-5 > [class*="col-"] {
            padding-left: 15px;
            padding-right: 15px; }

        .row.gap-y {
          margin-top: -15px;
          margin-bottom: -15px; }
          .row.gap-y > .col,
          .row.gap-y > [class*="col-"] {
            padding-top: 15px;
            padding-bottom: 15px; }
          .row.gap-y.gap-1 {
            margin-top: -4px;
            margin-bottom: -4px; }
            .row.gap-y.gap-1 > .col,
            .row.gap-y.gap-1 > [class*="col-"] {
              padding-top: 4px;
              padding-bottom: 4px; }
          .row.gap-y.gap-2 {
            margin-top: -8px;
            margin-bottom: -8px; }
            .row.gap-y.gap-2 > .col,
            .row.gap-y.gap-2 > [class*="col-"] {
              padding-top: 8px;
              padding-bottom: 8px; }
          .row.gap-y.gap-3 {
            margin-top: -15px;
            margin-bottom: -15px; }
            .row.gap-y.gap-3 > .col,
            .row.gap-y.gap-3 > [class*="col-"] {
              padding-top: 15px;
              padding-bottom: 15px; }
          .row.gap-y.gap-4 {
            margin-top: -15px;
            margin-bottom: -15px; }
            .row.gap-y.gap-4 > .col,
            .row.gap-y.gap-4 > [class*="col-"] {
              padding-top: 15px;
              padding-bottom: 15px; }
          .row.gap-y.gap-5 {
            margin-top: -15px;
            margin-bottom: -15px; }
            .row.gap-y.gap-5 > .col,
            .row.gap-y.gap-5 > [class*="col-"] {
              padding-top: 15px;
              padding-bottom: 15px; }

        .flexbox {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          -webkit-box-pack: justify;
                  justify-content: space-between; }
          .flexbox > * {
            display: inline-block;
            margin-left: 4px;
            margin-right: 4px; }
            .flexbox > *:first-child {
              margin-left: 0; }
            .flexbox > *:last-child {
              margin-right: 0; }
          .flexbox.no-gap > * {
            margin-left: 0;
            margin-right: 0; }

        ul.flexbox {
          list-style: none;
          padding-left: 0;
          margin-bottom: 0; }

        .flexbox-vertical {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          -webkit-box-pack: justify;
                  justify-content: space-between; }
          .flexbox-vertical.no-gap > * {
            margin-top: 0;
            margin-bottom: 0; }

        .flex-grow-all > *,
        .flex-cols-wide > *,
        .flex-col-wide,
        .flex-grow {
          -webkit-box-flex: 1;
                  flex: 1; }

        .flex-grow-1 {
          -webkit-box-flex: 1;
                  flex-grow: 1; }

        .flex-grow-2 {
          -webkit-box-flex: 2;
                  flex-grow: 2; }

        .flex-grow-3 {
          -webkit-box-flex: 3;
                  flex-grow: 3; }

        .flex-grow-4 {
          -webkit-box-flex: 4;
                  flex-grow: 4; }

        .flex-grow-5 {
          -webkit-box-flex: 5;
                  flex-grow: 5; }

        .flex-grow-6 {
          -webkit-box-flex: 6;
                  flex-grow: 6; }

        .flex-grow-7 {
          -webkit-box-flex: 7;
                  flex-grow: 7; }

        .flex-grow-8 {
          -webkit-box-flex: 8;
                  flex-grow: 8; }

        .flex-grow-9 {
          -webkit-box-flex: 9;
                  flex-grow: 9; }

        .flex-grow-0 {
          -webkit-box-flex: 0;
                  flex-grow: 0; }

        .masonry-grid {
          -webkit-column-count: 3;
            -moz-column-count: 3;
                  column-count: 3;
          -webkit-column-gap: 30px;
            -moz-column-gap: 30px;
                  column-gap: 30px; }
          .masonry-grid.no-gap {
            -webkit-column-gap: 0;
              -moz-column-gap: 0;
                    column-gap: 0; }
            .masonry-grid.no-gap .masonry-item {
              padding-bottom: 0; }
          .masonry-grid.gap-1 {
            -webkit-column-gap: 8px;
              -moz-column-gap: 8px;
                    column-gap: 8px; }
            .masonry-grid.gap-1 .masonry-item {
              padding-bottom: 8px; }
          .masonry-grid.gap-2 {
            -webkit-column-gap: 16px;
              -moz-column-gap: 16px;
                    column-gap: 16px; }
            .masonry-grid.gap-2 .masonry-item {
              padding-bottom: 16px; }
          .masonry-grid.gap-3 {
            -webkit-column-gap: 30px;
              -moz-column-gap: 30px;
                    column-gap: 30px; }
            .masonry-grid.gap-3 .masonry-item {
              padding-bottom: 30px; }
          .masonry-grid.gap-4 {
            -webkit-column-gap: 48px;
              -moz-column-gap: 48px;
                    column-gap: 48px; }
            .masonry-grid.gap-4 .masonry-item {
              padding-bottom: 48px; }
          .masonry-grid.gap-5 {
            -webkit-column-gap: 64px;
              -moz-column-gap: 64px;
                    column-gap: 64px; }
            .masonry-grid.gap-5 .masonry-item {
              padding-bottom: 64px; }

        .masonry-cols-2 {
          -webkit-column-count: 2;
            -moz-column-count: 2;
                  column-count: 2; }

        .masonry-cols-3 {
          -webkit-column-count: 3;
            -moz-column-count: 3;
                  column-count: 3; }

        .masonry-cols-4 {
          -webkit-column-count: 4;
            -moz-column-count: 4;
                  column-count: 4; }

        .masonry-cols-5 {
          -webkit-column-count: 5;
            -moz-column-count: 5;
                  column-count: 5; }

        .masonry-item {
          display: block;
          -webkit-column-break-inside: avoid;
                  break-inside: avoid;
          padding-bottom: 30px; }

        .topbar {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          background-color: #fff;
          border-bottom: 1px solid #f1f2f3;
          height: 40px;
          z-index: 1001;
          display: none; }
          .topbar > .container,
          .topbar > .container-fluid {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
                    justify-content: space-between;
            -webkit-box-align: center;
                    align-items: center;
            flex-wrap: wrap;
            height: inherit; }
          .topbar.text-white {
            border-bottom-color: rgba(255, 255, 255, 0.05); }

        .topbar-divider {
          display: inline-block;
          height: 12px;
          width: 1px;
          background-color: rgba(127, 127, 127, 0.15);
          margin: 0 1rem;
          margin-bottom: 2px;
          vertical-align: middle; }

        @media (min-width: 576px) {
          body:not(.body-scrolled) .topbar.d-sm-flex ~ .navbar {
            top: 40px; } }

        @media (min-width: 768px) {
          body:not(.body-scrolled) .topbar.d-md-flex ~ .navbar {
            top: 40px; } }

        @media (min-width: 992px) {
          body:not(.body-scrolled) .topbar.d-lg-flex ~ .navbar {
            top: 40px; } }

        @media (min-width: 1200px) {
          body:not(.body-scrolled) .topbar.d-xl-flex ~ .navbar {
            top: 40px; } }

        body:not(.body-scrolled) .topbar.d-flex ~ .navbar {
          top: 40px; }

        .navbar {
          position: absolute;
          top: 10px;
          left: 0;
          right: 0;
          z-index: 1000;
          -webkit-transition: background-color .3s ease-out, -webkit-transform .3s ease-out;
          transition: background-color .3s ease-out, -webkit-transform .3s ease-out;
          transition: transform .3s ease-out, background-color .3s ease-out;
          transition: transform .3s ease-out, background-color .3s ease-out, -webkit-transform .3s ease-out;
          padding-top: 0;
          padding-bottom: 0;
          min-height: 56px; }
          .modal-open .navbar {
            right: 16px; }
          .navbar .row {
            -webkit-box-align: center;
                    align-items: center;
            -webkit-box-flex: 1;
                    flex-grow: 1; }
          .navbar-scrolled .navbar {
            top: 0; }
          .navbar .container > .btn,
          .navbar .container-fluid > .btn {
            flex-shrink: 0; }

        .navbar-offset-0 {
          top: 0; }

        .navbar-left {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          flex-shrink: 0; }

        [data-navbar="static"] {
          position: static;
          border-bottom: 1px solid #eaeff4;
          top: auto; }

        [data-navbar="fixed"] {
          position: fixed; }
          .navbar-scrolled [data-navbar="fixed"] {
            background-color: rgba(255, 255, 255, 0.99);
            -webkit-box-shadow: 0 1px 9px rgba(0, 0, 0, 0.05);
                    box-shadow: 0 1px 9px rgba(0, 0, 0, 0.05); }
            .navbar-scrolled [data-navbar="fixed"] .d-stick-none {
              display: none !important; }
            .navbar-scrolled [data-navbar="fixed"] .d-stick-block {
              display: block !important; }
            .navbar-scrolled [data-navbar="fixed"] .d-stick-flex {
              display: -webkit-box !important;
              display: flex !important; }
            .navbar-scrolled [data-navbar="fixed"] .d-stick-inline-flex {
              display: -webkit-inline-box !important;
              display: inline-flex !important; }
            .navbar-scrolled [data-navbar="fixed"] .d-stick-inline-block {
              display: inline-block !important; }

        .body-scrolled [data-navbar="sticky"] {
          -webkit-transform: translate(0, -100%);
                  transform: translate(0, -100%); }

        .navbar-scrolled [data-navbar="sticky"] {
          position: fixed; }

        .header-scrolled [data-navbar="sticky"] {
          top: 0;
          -webkit-transform: translate(0, 0);
                  transform: translate(0, 0);
          background-color: rgba(255, 255, 255, 0.99);
          -webkit-box-shadow: 0 1px 9px rgba(0, 0, 0, 0.05);
                  box-shadow: 0 1px 9px rgba(0, 0, 0, 0.05); }
          .header-scrolled [data-navbar="sticky"] .d-stick-none {
            display: none !important; }
          .header-scrolled [data-navbar="sticky"] .d-stick-block {
            display: block !important; }
          .header-scrolled [data-navbar="sticky"] .d-stick-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .header-scrolled [data-navbar="sticky"] .d-stick-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; }
          .header-scrolled [data-navbar="sticky"] .d-stick-inline-block {
            display: inline-block !important; }

        .body-scrolled [data-navbar="smart"] {
          -webkit-transform: translate(0, -100%);
                  transform: translate(0, -100%); }

        .navbar-scrolled [data-navbar="smart"] {
          position: fixed; }

        [data-navbar="smart"].stick {
          top: 0;
          -webkit-transform: translate(0, 0);
                  transform: translate(0, 0);
          -webkit-box-shadow: 0 1px 9px rgba(0, 0, 0, 0.05);
                  box-shadow: 0 1px 9px rgba(0, 0, 0, 0.05);
          background-color: rgba(255, 255, 255, 0.99);
          box-shadow: 0 1px 9px rgba(0, 0, 0, 0.05); }
          [data-navbar="smart"].stick .d-stick-none {
            display: none !important; }
          [data-navbar="smart"].stick .d-stick-block {
            display: block !important; }
          [data-navbar="smart"].stick .d-stick-flex {
            display: -webkit-box !important;
            display: flex !important; }
          [data-navbar="smart"].stick .d-stick-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; }
          [data-navbar="smart"].stick .d-stick-inline-block {
            display: inline-block !important; }

        .navbar-brand {
          display: -webkit-inline-box;
          display: inline-flex;
          -webkit-box-align: center;
                  align-items: center; }
          .navbar-brand img {
            vertical-align: baseline; }

        .navbar-divider {
          display: inline-block;
          height: 16px;
          width: 1px;
          background-color: #fff;
          margin: 0 1rem;
          opacity: 0.15; }

        .navbar-toggler {
          margin-right: 1rem;
          border: none;
          cursor: pointer;
          font-size: 1.5rem; }

        .nav-navbar {
          position: relative; }
          .nav-navbar .nav-item {
            position: relative; }
          .nav-navbar > .nav-item > .nav-link,
          .nav-navbar > .nav-link {
            line-height: 56px;
            padding-top: 0;
            padding-bottom: 0; }
          .nav-navbar .nav-link {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.87em;
            word-spacing: 2px;
            padding-left: 1.125rem;
            padding-right: 1.125rem; }
          .nav-navbar .arrow {
            display: inline-block;
            width: 0;
            height: 0;
            margin-bottom: 2px;
            border-left: 3px solid transparent;
            border-right: 3px solid transparent; }
          .nav-navbar .nav-item:hover > .nav {
            opacity: 1;
            visibility: visible;
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0); }
          .nav-navbar .nav-item.nav-mega:hover .nav {
            opacity: 1;
            visibility: visible; }
          .nav-navbar.nav-text-normal .nav-link {
            text-transform: none; }

        .nav-navbar .nav {
          position: absolute;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          min-width: 11rem;
          padding-top: 0.5rem;
          padding-bottom: 0.5rem;
          background-color: #fff;
          -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.04);
                  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.04);
          border-radius: 3px;
          -webkit-transition: 0.3s ease-out;
          transition: 0.3s ease-out;
          opacity: 0;
          visibility: hidden;
          -webkit-transform: translate(0, -8px);
                  transform: translate(0, -8px);
          z-index: 1; }
          .nav-navbar .nav.align-right {
            right: 0; }
          .nav-navbar .nav.columns-2 {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-direction: row;
            min-width: 22rem; }
            .nav-navbar .nav.columns-2 > .nav-link,
            .nav-navbar .nav.columns-2 > .nav-item {
              flex-basis: 50%; }
          .nav-navbar .nav.columns-3 {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                    flex-direction: row;
            min-width: 33rem; }
            .nav-navbar .nav.columns-3 > .nav-link,
            .nav-navbar .nav.columns-3 > .nav-item {
              flex-basis: 33.3333%; }
          .nav-navbar .nav .nav-link {
            font-weight: 400;
            text-transform: none;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            letter-spacing: 0.5px;
            color: rgba(117, 117, 117, 0.8); }
          .nav-navbar .nav .arrow {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            margin-top: -2px;
            font-style: normal;
            border: none;
            opacity: 0.7;
            width: 5px;
            height: 5px;
            border-top: 1px solid rgba(117, 117, 117, 0.8);
            border-right: 1px solid rgba(117, 117, 117, 0.8);
            border-top-width: 1px !important;
            -webkit-transform: rotate(45deg);
                    transform: rotate(45deg); }
          .nav-navbar .nav .nav-item.show > .nav-link,
          .nav-navbar .nav .nav-item:hover > .nav-link,
          .nav-navbar .nav .nav-link.show,
          .nav-navbar .nav .nav-link:hover {
            color: #555555; }
            .nav-navbar .nav .nav-item.show > .nav-link .arrow,
            .nav-navbar .nav .nav-item:hover > .nav-link .arrow,
            .nav-navbar .nav .nav-link.show .arrow,
            .nav-navbar .nav .nav-link:hover .arrow {
              border-top-color: #555555;
              border-right-color: #555555; }
          .nav-navbar .nav .nav-item.active > .nav-link,
          .nav-navbar .nav .nav-link.active {
            font-weight: 600;
            color: #323d47; }
            .nav-navbar .nav .nav-item.active > .nav-link .arrow,
            .nav-navbar .nav .nav-link.active .arrow {
              border-top-color: #323d47;
              border-right-color: #323d47; }
          .nav-navbar .nav .nav {
            top: 0;
            left: 99%;
            -webkit-transform: translate(-8px, 0);
                    transform: translate(-8px, 0); }
          .nav-navbar .nav.align-right .nav {
            left: auto;
            right: 99%;
            -webkit-transform: translate(8px, 0);
                    transform: translate(8px, 0); }

        .nav-navbar .nav-mega {
          position: static; }
          .nav-navbar .nav-mega .nav {
            left: 0;
            min-width: 100%; }
            .nav-navbar .nav-mega .nav .nav {
              position: static;
              background-color: transparent;
              padding: 0;
              -webkit-box-shadow: none;
                      box-shadow: none;
              -webkit-transform: none;
                      transform: none; }
          .nav-navbar .nav-mega .row {
            -webkit-box-align: start;
                    align-items: flex-start; }

        .navbar-mobile {
          display: -webkit-box;
          display: flex;
          -webkit-box-align: center;
                  align-items: center;
          width: 100%; }

        .backdrop-navbar {
          background-color: rgba(255, 255, 255, 0.95);
          z-index: 1001; }

        .navbar-open {
          overflow: hidden; }
          .navbar-open .navbar {
            -webkit-box-shadow: none;
                    box-shadow: none; }
            .navbar-open .navbar .logo-dark {
              display: inline-block; }
            .navbar-open .navbar .logo-light {
              display: none; }
            .navbar-open .navbar .navbar-toggler {
              color: rgba(117, 117, 117, 0.8); }
              .navbar-open .navbar .navbar-toggler:hover {
                color: #555555; }
            .navbar-open .navbar .navbar-divider {
              background-color: rgba(117, 117, 117, 0.8); }
            .navbar-open .navbar .nav-navbar > .nav-item > .nav-link,
            .navbar-open .navbar .nav-navbar > .nav-link {
              color: rgba(117, 117, 117, 0.8); }
              .navbar-open .navbar .nav-navbar > .nav-item > .nav-link > .arrow,
              .navbar-open .navbar .nav-navbar > .nav-link > .arrow {
                border-top: 3px solid rgba(117, 117, 117, 0.8); }
            .navbar-open .navbar .nav-navbar > .nav-item.show > .nav-link,
            .navbar-open .navbar .nav-navbar > .nav-item:hover > .nav-link,
            .navbar-open .navbar .nav-navbar > .nav-link.show,
            .navbar-open .navbar .nav-navbar > .nav-link:hover {
              color: #555555; }
              .navbar-open .navbar .nav-navbar > .nav-item.show > .nav-link > .arrow,
              .navbar-open .navbar .nav-navbar > .nav-item:hover > .nav-link > .arrow,
              .navbar-open .navbar .nav-navbar > .nav-link.show > .arrow,
              .navbar-open .navbar .nav-navbar > .nav-link:hover > .arrow {
                border-top-color: inherit; }
            .navbar-open .navbar .nav-navbar > .nav-item.active > .nav-link,
            .navbar-open .navbar .nav-navbar > .nav-item > .nav-link.active,
            .navbar-open .navbar .nav-navbar > .nav-link.active {
              color: #323d47; }
              .navbar-open .navbar .nav-navbar > .nav-item.active > .nav-link > .arrow,
              .navbar-open .navbar .nav-navbar > .nav-item > .nav-link.active > .arrow,
              .navbar-open .navbar .nav-navbar > .nav-link.active > .arrow {
                border-top-color: inherit; }
          .navbar-open .navbar-mobile {
            left: 0 !important;
            -webkit-box-shadow: 2px 0 9px rgba(0, 0, 0, 0.05);
                    box-shadow: 2px 0 9px rgba(0, 0, 0, 0.05); }

        @media (max-width: 575.98px) {
          .navbar-expand-sm .navbar-mobile {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            -webkit-box-align: start;
                    align-items: flex-start;
            width: 300px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -300px;
            bottom: 0;
            padding: 20px;
            background-color: #fff;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-transition: left 0.3s ease;
            transition: left 0.3s ease;
            z-index: 1002; }
            .navbar-expand-sm .navbar-mobile > * {
              padding-top: 10px;
              padding-bottom: 10px; }
          .navbar-expand-sm .navbar-divider {
            display: block;
            height: 1px;
            width: 100%;
            margin: 1rem 0;
            padding: 0; }
          .navbar-expand-sm .nav-navbar:not(.nav-inline) {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            flex-wrap: nowrap;
            width: 100%; }
            .navbar-expand-sm .nav-navbar:not(.nav-inline) > .nav-item > .nav-link,
            .navbar-expand-sm .nav-navbar:not(.nav-inline) > .nav-link {
              min-height: inherit;
              line-height: inherit;
              padding-top: 0.75rem;
              padding-bottom: 0.75rem;
              font-size: 0.95rem;
              text-transform: none; }
            .navbar-expand-sm .nav-navbar:not(.nav-inline) .arrow {
              float: right;
              margin-top: 12px;
              -webkit-transform: rotate(-90deg);
                      transform: rotate(-90deg); }
            .navbar-expand-sm .nav-navbar:not(.nav-inline) .nav-divider {
              display: none; }
            .navbar-expand-sm .nav-navbar:not(.nav-inline) > .nav-item > .nav {
              display: none;
              border-left: 1px dashed rgba(0, 0, 0, 0.08); }
              .navbar-expand-sm .nav-navbar:not(.nav-inline) > .nav-item > .nav::before {
                content: '';
                display: inline-block;
                position: absolute;
                top: 9px;
                left: -4px;
                bottom: 15px;
                border-left: 1px dashed rgba(0, 0, 0, 0.08);
                display: none; }
          .navbar-expand-sm .nav-navbar .nav {
            position: static;
            visibility: visible;
            opacity: 1;
            -webkit-box-shadow: none;
                    box-shadow: none;
            margin-left: 1.25rem;
            padding-top: 0;
            padding-bottom: 0;
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0); }
            .navbar-expand-sm .nav-navbar .nav.columns-2, .navbar-expand-sm .nav-navbar .nav.columns-3 {
              -webkit-box-orient: vertical;
              -webkit-box-direction: normal;
                      flex-direction: column;
              min-width: 100%; }
              .navbar-expand-sm .nav-navbar .nav.columns-2 > .nav-link,
              .navbar-expand-sm .nav-navbar .nav.columns-2 > .nav-item, .navbar-expand-sm .nav-navbar .nav.columns-3 > .nav-link,
              .navbar-expand-sm .nav-navbar .nav.columns-3 > .nav-item {
                flex-basis: 100%; }
            .navbar-expand-sm .nav-navbar .nav .nav-link {
              padding-top: 0.375rem;
              padding-bottom: 0.375rem;
              font-size: 0.875rem; }
          .navbar-expand-sm .d-mobile-none {
            display: none !important; }
          .navbar-expand-sm .d-mobile-block {
            display: block !important; }
          .navbar-expand-sm .d-mobile-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .navbar-expand-sm .d-mobile-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; }
          .navbar-expand-sm .d-mobile-inline-block {
            display: inline-block !important; } }

        @media (min-width: 576px) {
          .navbar-expand-sm .backdrop-navbar {
            display: none; } }

        @media (max-width: 767.98px) {
          .navbar-expand-md .navbar-mobile {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            -webkit-box-align: start;
                    align-items: flex-start;
            width: 300px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -300px;
            bottom: 0;
            padding: 20px;
            background-color: #fff;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-transition: left 0.3s ease;
            transition: left 0.3s ease;
            z-index: 1002; }
            .navbar-expand-md .navbar-mobile > * {
              padding-top: 10px;
              padding-bottom: 10px; }
          .navbar-expand-md .navbar-divider {
            display: block;
            height: 1px;
            width: 100%;
            margin: 1rem 0;
            padding: 0; }
          .navbar-expand-md .nav-navbar:not(.nav-inline) {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            flex-wrap: nowrap;
            width: 100%; }
            .navbar-expand-md .nav-navbar:not(.nav-inline) > .nav-item > .nav-link,
            .navbar-expand-md .nav-navbar:not(.nav-inline) > .nav-link {
              min-height: inherit;
              line-height: inherit;
              padding-top: 0.75rem;
              padding-bottom: 0.75rem;
              font-size: 0.95rem;
              text-transform: none; }
            .navbar-expand-md .nav-navbar:not(.nav-inline) .arrow {
              float: right;
              margin-top: 12px;
              -webkit-transform: rotate(-90deg);
                      transform: rotate(-90deg); }
            .navbar-expand-md .nav-navbar:not(.nav-inline) .nav-divider {
              display: none; }
            .navbar-expand-md .nav-navbar:not(.nav-inline) > .nav-item > .nav {
              display: none;
              border-left: 1px dashed rgba(0, 0, 0, 0.08); }
              .navbar-expand-md .nav-navbar:not(.nav-inline) > .nav-item > .nav::before {
                content: '';
                display: inline-block;
                position: absolute;
                top: 9px;
                left: -4px;
                bottom: 15px;
                border-left: 1px dashed rgba(0, 0, 0, 0.08);
                display: none; }
          .navbar-expand-md .nav-navbar .nav {
            position: static;
            visibility: visible;
            opacity: 1;
            -webkit-box-shadow: none;
                    box-shadow: none;
            margin-left: 1.25rem;
            padding-top: 0;
            padding-bottom: 0;
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0); }
            .navbar-expand-md .nav-navbar .nav.columns-2, .navbar-expand-md .nav-navbar .nav.columns-3 {
              -webkit-box-orient: vertical;
              -webkit-box-direction: normal;
                      flex-direction: column;
              min-width: 100%; }
              .navbar-expand-md .nav-navbar .nav.columns-2 > .nav-link,
              .navbar-expand-md .nav-navbar .nav.columns-2 > .nav-item, .navbar-expand-md .nav-navbar .nav.columns-3 > .nav-link,
              .navbar-expand-md .nav-navbar .nav.columns-3 > .nav-item {
                flex-basis: 100%; }
            .navbar-expand-md .nav-navbar .nav .nav-link {
              padding-top: 0.375rem;
              padding-bottom: 0.375rem;
              font-size: 0.875rem; }
          .navbar-expand-md .d-mobile-none {
            display: none !important; }
          .navbar-expand-md .d-mobile-block {
            display: block !important; }
          .navbar-expand-md .d-mobile-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .navbar-expand-md .d-mobile-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; }
          .navbar-expand-md .d-mobile-inline-block {
            display: inline-block !important; } }

        @media (min-width: 768px) {
          .navbar-expand-md .backdrop-navbar {
            display: none; } }

        @media (max-width: 991.98px) {
          .navbar-expand-lg .navbar-mobile {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            -webkit-box-align: start;
                    align-items: flex-start;
            width: 300px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -300px;
            bottom: 0;
            padding: 20px;
            background-color: #fff;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-transition: left 0.3s ease;
            transition: left 0.3s ease;
            z-index: 1002; }
            .navbar-expand-lg .navbar-mobile > * {
              padding-top: 10px;
              padding-bottom: 10px; }
          .navbar-expand-lg .navbar-divider {
            display: block;
            height: 1px;
            width: 100%;
            margin: 1rem 0;
            padding: 0; }
          .navbar-expand-lg .nav-navbar:not(.nav-inline) {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            flex-wrap: nowrap;
            width: 100%; }
            .navbar-expand-lg .nav-navbar:not(.nav-inline) > .nav-item > .nav-link,
            .navbar-expand-lg .nav-navbar:not(.nav-inline) > .nav-link {
              min-height: inherit;
              line-height: inherit;
              padding-top: 0.75rem;
              padding-bottom: 0.75rem;
              font-size: 0.95rem;
              text-transform: none; }
            .navbar-expand-lg .nav-navbar:not(.nav-inline) .arrow {
              float: right;
              margin-top: 12px;
              -webkit-transform: rotate(-90deg);
                      transform: rotate(-90deg); }
            .navbar-expand-lg .nav-navbar:not(.nav-inline) .nav-divider {
              display: none; }
            .navbar-expand-lg .nav-navbar:not(.nav-inline) > .nav-item > .nav {
              display: none;
              border-left: 1px dashed rgba(0, 0, 0, 0.08); }
              .navbar-expand-lg .nav-navbar:not(.nav-inline) > .nav-item > .nav::before {
                content: '';
                display: inline-block;
                position: absolute;
                top: 9px;
                left: -4px;
                bottom: 15px;
                border-left: 1px dashed rgba(0, 0, 0, 0.08);
                display: none; }
          .navbar-expand-lg .nav-navbar .nav {
            position: static;
            visibility: visible;
            opacity: 1;
            -webkit-box-shadow: none;
                    box-shadow: none;
            margin-left: 1.25rem;
            padding-top: 0;
            padding-bottom: 0;
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0); }
            .navbar-expand-lg .nav-navbar .nav.columns-2, .navbar-expand-lg .nav-navbar .nav.columns-3 {
              -webkit-box-orient: vertical;
              -webkit-box-direction: normal;
                      flex-direction: column;
              min-width: 100%; }
              .navbar-expand-lg .nav-navbar .nav.columns-2 > .nav-link,
              .navbar-expand-lg .nav-navbar .nav.columns-2 > .nav-item, .navbar-expand-lg .nav-navbar .nav.columns-3 > .nav-link,
              .navbar-expand-lg .nav-navbar .nav.columns-3 > .nav-item {
                flex-basis: 100%; }
            .navbar-expand-lg .nav-navbar .nav .nav-link {
              padding-top: 0.375rem;
              padding-bottom: 0.375rem;
              font-size: 0.875rem; }
          .navbar-expand-lg .d-mobile-none {
            display: none !important; }
          .navbar-expand-lg .d-mobile-block {
            display: block !important; }
          .navbar-expand-lg .d-mobile-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .navbar-expand-lg .d-mobile-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; }
          .navbar-expand-lg .d-mobile-inline-block {
            display: inline-block !important; } }

        @media (min-width: 992px) {
          .navbar-expand-lg .backdrop-navbar {
            display: none; } }

        @media (max-width: 1199.98px) {
          .navbar-expand-xl .navbar-mobile {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            -webkit-box-align: start;
                    align-items: flex-start;
            width: 300px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -300px;
            bottom: 0;
            padding: 20px;
            background-color: #fff;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-transition: left 0.3s ease;
            transition: left 0.3s ease;
            z-index: 1002; }
            .navbar-expand-xl .navbar-mobile > * {
              padding-top: 10px;
              padding-bottom: 10px; }
          .navbar-expand-xl .navbar-divider {
            display: block;
            height: 1px;
            width: 100%;
            margin: 1rem 0;
            padding: 0; }
          .navbar-expand-xl .nav-navbar:not(.nav-inline) {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            flex-wrap: nowrap;
            width: 100%; }
            .navbar-expand-xl .nav-navbar:not(.nav-inline) > .nav-item > .nav-link,
            .navbar-expand-xl .nav-navbar:not(.nav-inline) > .nav-link {
              min-height: inherit;
              line-height: inherit;
              padding-top: 0.75rem;
              padding-bottom: 0.75rem;
              font-size: 0.95rem;
              text-transform: none; }
            .navbar-expand-xl .nav-navbar:not(.nav-inline) .arrow {
              float: right;
              margin-top: 12px;
              -webkit-transform: rotate(-90deg);
                      transform: rotate(-90deg); }
            .navbar-expand-xl .nav-navbar:not(.nav-inline) .nav-divider {
              display: none; }
            .navbar-expand-xl .nav-navbar:not(.nav-inline) > .nav-item > .nav {
              display: none;
              border-left: 1px dashed rgba(0, 0, 0, 0.08); }
              .navbar-expand-xl .nav-navbar:not(.nav-inline) > .nav-item > .nav::before {
                content: '';
                display: inline-block;
                position: absolute;
                top: 9px;
                left: -4px;
                bottom: 15px;
                border-left: 1px dashed rgba(0, 0, 0, 0.08);
                display: none; }
          .navbar-expand-xl .nav-navbar .nav {
            position: static;
            visibility: visible;
            opacity: 1;
            -webkit-box-shadow: none;
                    box-shadow: none;
            margin-left: 1.25rem;
            padding-top: 0;
            padding-bottom: 0;
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0); }
            .navbar-expand-xl .nav-navbar .nav.columns-2, .navbar-expand-xl .nav-navbar .nav.columns-3 {
              -webkit-box-orient: vertical;
              -webkit-box-direction: normal;
                      flex-direction: column;
              min-width: 100%; }
              .navbar-expand-xl .nav-navbar .nav.columns-2 > .nav-link,
              .navbar-expand-xl .nav-navbar .nav.columns-2 > .nav-item, .navbar-expand-xl .nav-navbar .nav.columns-3 > .nav-link,
              .navbar-expand-xl .nav-navbar .nav.columns-3 > .nav-item {
                flex-basis: 100%; }
            .navbar-expand-xl .nav-navbar .nav .nav-link {
              padding-top: 0.375rem;
              padding-bottom: 0.375rem;
              font-size: 0.875rem; }
          .navbar-expand-xl .d-mobile-none {
            display: none !important; }
          .navbar-expand-xl .d-mobile-block {
            display: block !important; }
          .navbar-expand-xl .d-mobile-flex {
            display: -webkit-box !important;
            display: flex !important; }
          .navbar-expand-xl .d-mobile-inline-flex {
            display: -webkit-inline-box !important;
            display: inline-flex !important; }
          .navbar-expand-xl .d-mobile-inline-block {
            display: inline-block !important; } }

        @media (min-width: 1200px) {
          .navbar-expand-xl .backdrop-navbar {
            display: none; } }

        .navbar-expand .navbar-mobile {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          -webkit-box-align: start;
                  align-items: flex-start;
          width: 300px;
          height: 100vh;
          position: fixed;
          top: 0;
          left: -300px;
          bottom: 0;
          padding: 20px;
          background-color: #fff;
          overflow-y: auto;
          overflow-x: hidden;
          -webkit-transition: left 0.3s ease;
          transition: left 0.3s ease;
          z-index: 1002; }
          .navbar-expand .navbar-mobile > * {
            padding-top: 10px;
            padding-bottom: 10px; }

        .navbar-expand .navbar-divider {
          display: block;
          height: 1px;
          width: 100%;
          margin: 1rem 0;
          padding: 0; }

        .navbar-expand .nav-navbar:not(.nav-inline) {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          flex-wrap: nowrap;
          width: 100%; }
          .navbar-expand .nav-navbar:not(.nav-inline) > .nav-item > .nav-link,
          .navbar-expand .nav-navbar:not(.nav-inline) > .nav-link {
            min-height: inherit;
            line-height: inherit;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            font-size: 0.95rem;
            text-transform: none; }
          .navbar-expand .nav-navbar:not(.nav-inline) .arrow {
            float: right;
            margin-top: 12px;
            -webkit-transform: rotate(-90deg);
                    transform: rotate(-90deg); }
          .navbar-expand .nav-navbar:not(.nav-inline) .nav-divider {
            display: none; }
          .navbar-expand .nav-navbar:not(.nav-inline) > .nav-item > .nav {
            display: none;
            border-left: 1px dashed rgba(0, 0, 0, 0.08); }
            .navbar-expand .nav-navbar:not(.nav-inline) > .nav-item > .nav::before {
              content: '';
              display: inline-block;
              position: absolute;
              top: 9px;
              left: -4px;
              bottom: 15px;
              border-left: 1px dashed rgba(0, 0, 0, 0.08);
              display: none; }

        .navbar-expand .nav-navbar .nav {
          position: static;
          visibility: visible;
          opacity: 1;
          -webkit-box-shadow: none;
                  box-shadow: none;
          margin-left: 1.25rem;
          padding-top: 0;
          padding-bottom: 0;
          -webkit-transform: translate(0, 0);
                  transform: translate(0, 0); }
          .navbar-expand .nav-navbar .nav.columns-2, .navbar-expand .nav-navbar .nav.columns-3 {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                    flex-direction: column;
            min-width: 100%; }
            .navbar-expand .nav-navbar .nav.columns-2 > .nav-link,
            .navbar-expand .nav-navbar .nav.columns-2 > .nav-item, .navbar-expand .nav-navbar .nav.columns-3 > .nav-link,
            .navbar-expand .nav-navbar .nav.columns-3 > .nav-item {
              flex-basis: 100%; }
          .navbar-expand .nav-navbar .nav .nav-link {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
            font-size: 0.875rem; }

        .navbar-expand .d-mobile-none {
          display: none !important; }

        .navbar-expand .d-mobile-block {
          display: block !important; }

        .navbar-expand .d-mobile-flex {
          display: -webkit-box !important;
          display: flex !important; }

        .navbar-expand .d-mobile-inline-flex {
          display: -webkit-inline-box !important;
          display: inline-flex !important; }

        .navbar-expand .d-mobile-inline-block {
          display: inline-block !important; }

        .navbar-expand .backdrop-navbar {
          display: none; }

        .navbar-light .logo-dark,
        .navbar-stick-light.stick .logo-dark {
          display: none; }

        .navbar-light .logo-light,
        .navbar-stick-light.stick .logo-light {
          display: inline-block; }

        .navbar-light .navbar-toggler,
        .navbar-stick-light.stick .navbar-toggler {
          color: rgba(255, 255, 255, 0.65); }
          .navbar-light .navbar-toggler:hover,
          .navbar-stick-light.stick .navbar-toggler:hover {
            color: #fff; }

        .navbar-light .navbar-divider,
        .navbar-stick-light.stick .navbar-divider {
          background-color: rgba(255, 255, 255, 0.65); }

        .navbar-light .nav-navbar > .nav-item > .nav-link,
        .navbar-light .nav-navbar > .nav-link,
        .navbar-stick-light.stick .nav-navbar > .nav-item > .nav-link,
        .navbar-stick-light.stick .nav-navbar > .nav-link {
          color: rgba(255, 255, 255, 0.65); }
          .navbar-light .nav-navbar > .nav-item > .nav-link > .arrow,
          .navbar-light .nav-navbar > .nav-link > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-item > .nav-link > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-link > .arrow {
            border-top: 3px solid rgba(255, 255, 255, 0.65); }

        .navbar-light .nav-navbar > .nav-item.show > .nav-link,
        .navbar-light .nav-navbar > .nav-item:hover > .nav-link,
        .navbar-light .nav-navbar > .nav-link.show,
        .navbar-light .nav-navbar > .nav-link:hover,
        .navbar-stick-light.stick .nav-navbar > .nav-item.show > .nav-link,
        .navbar-stick-light.stick .nav-navbar > .nav-item:hover > .nav-link,
        .navbar-stick-light.stick .nav-navbar > .nav-link.show,
        .navbar-stick-light.stick .nav-navbar > .nav-link:hover {
          color: #fff; }
          .navbar-light .nav-navbar > .nav-item.show > .nav-link > .arrow,
          .navbar-light .nav-navbar > .nav-item:hover > .nav-link > .arrow,
          .navbar-light .nav-navbar > .nav-link.show > .arrow,
          .navbar-light .nav-navbar > .nav-link:hover > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-item.show > .nav-link > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-item:hover > .nav-link > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-link.show > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-link:hover > .arrow {
            border-top-color: inherit; }

        .navbar-light .nav-navbar > .nav-item.active > .nav-link,
        .navbar-light .nav-navbar > .nav-item > .nav-link.active,
        .navbar-light .nav-navbar > .nav-link.active,
        .navbar-stick-light.stick .nav-navbar > .nav-item.active > .nav-link,
        .navbar-stick-light.stick .nav-navbar > .nav-item > .nav-link.active,
        .navbar-stick-light.stick .nav-navbar > .nav-link.active {
          color: #fff; }
          .navbar-light .nav-navbar > .nav-item.active > .nav-link > .arrow,
          .navbar-light .nav-navbar > .nav-item > .nav-link.active > .arrow,
          .navbar-light .nav-navbar > .nav-link.active > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-item.active > .nav-link > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-item > .nav-link.active > .arrow,
          .navbar-stick-light.stick .nav-navbar > .nav-link.active > .arrow {
            border-top-color: inherit; }

        .navbar-dark .logo-dark,
        .navbar-stick-dark.stick .logo-dark {
          display: inline-block; }

        .navbar-dark .logo-light,
        .navbar-stick-dark.stick .logo-light {
          display: none; }

        .navbar-dark .navbar-toggler,
        .navbar-stick-dark.stick .navbar-toggler {
          color: rgba(117, 117, 117, 0.8); }
          .navbar-dark .navbar-toggler:hover,
          .navbar-stick-dark.stick .navbar-toggler:hover {
            color: #555555; }

        .navbar-dark .navbar-divider,
        .navbar-stick-dark.stick .navbar-divider {
          background-color: rgba(117, 117, 117, 0.8); }

        .navbar-dark .nav-navbar > .nav-item > .nav-link,
        .navbar-dark .nav-navbar > .nav-link,
        .navbar-stick-dark.stick .nav-navbar > .nav-item > .nav-link,
        .navbar-stick-dark.stick .nav-navbar > .nav-link {
          color: rgba(117, 117, 117, 0.8); }
          .navbar-dark .nav-navbar > .nav-item > .nav-link > .arrow,
          .navbar-dark .nav-navbar > .nav-link > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-item > .nav-link > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-link > .arrow {
            border-top: 3px solid rgba(117, 117, 117, 0.8); }

        .navbar-dark .nav-navbar > .nav-item.show > .nav-link,
        .navbar-dark .nav-navbar > .nav-item:hover > .nav-link,
        .navbar-dark .nav-navbar > .nav-link.show,
        .navbar-dark .nav-navbar > .nav-link:hover,
        .navbar-stick-dark.stick .nav-navbar > .nav-item.show > .nav-link,
        .navbar-stick-dark.stick .nav-navbar > .nav-item:hover > .nav-link,
        .navbar-stick-dark.stick .nav-navbar > .nav-link.show,
        .navbar-stick-dark.stick .nav-navbar > .nav-link:hover {
          color: #555555; }
          .navbar-dark .nav-navbar > .nav-item.show > .nav-link > .arrow,
          .navbar-dark .nav-navbar > .nav-item:hover > .nav-link > .arrow,
          .navbar-dark .nav-navbar > .nav-link.show > .arrow,
          .navbar-dark .nav-navbar > .nav-link:hover > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-item.show > .nav-link > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-item:hover > .nav-link > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-link.show > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-link:hover > .arrow {
            border-top-color: inherit; }

        .navbar-dark .nav-navbar > .nav-item.active > .nav-link,
        .navbar-dark .nav-navbar > .nav-item > .nav-link.active,
        .navbar-dark .nav-navbar > .nav-link.active,
        .navbar-stick-dark.stick .nav-navbar > .nav-item.active > .nav-link,
        .navbar-stick-dark.stick .nav-navbar > .nav-item > .nav-link.active,
        .navbar-stick-dark.stick .nav-navbar > .nav-link.active {
          color: #323d47; }
          .navbar-dark .nav-navbar > .nav-item.active > .nav-link > .arrow,
          .navbar-dark .nav-navbar > .nav-item > .nav-link.active > .arrow,
          .navbar-dark .nav-navbar > .nav-link.active > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-item.active > .nav-link > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-item > .nav-link.active > .arrow,
          .navbar-stick-dark.stick .nav-navbar > .nav-link.active > .arrow {
            border-top-color: inherit; }

        /*
        .navbar {
          min-height: 90px;
        }
        .nav-navbar > .nav-item > .nav-link {
          line-height: 90px;
        }
        .nav-navbar > .nav-link {
          line-height: 90px;
        }
        */
        .offcanvas {
          position: relative;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          padding: 1.5rem;
          background-color: #fff;
          -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
                  box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
          z-index: 1010;
          visibility: hidden; }
          .offcanvas > .container,
          .offcanvas > .container-fluid {
            position: relative;
            height: 100%; }
          .offcanvas[data-animation] {
            -webkit-transition: 0.4s ease-out;
            transition: 0.4s ease-out; }
          .offcanvas[data-animation="fade"] {
            opacity: 0; }
          .offcanvas[data-animation="slide-up"] {
            opacity: 1;
            -webkit-transform: translate(0, 100%);
                    transform: translate(0, 100%); }
          .offcanvas[data-animation="slide-down"] {
            -webkit-transform: translate(0, -100%);
                    transform: translate(0, -100%); }
          .offcanvas[data-animation="slide-left"] {
            left: auto;
            right: 0;
            -webkit-transform: translate(100%, 0);
                    transform: translate(100%, 0); }
          .offcanvas[data-animation="slide-right"] {
            -webkit-transform: translate(-100%, 0);
                    transform: translate(-100%, 0); }
          .offcanvas.show {
            visibility: visible;
            opacity: 1;
            -webkit-transform: translate(0, 0);
                    transform: translate(0, 0); }
          .offcanvas .close {
            float: none;
            padding: 0.75rem 1rem;
            font-weight: 100;
            font-size: 2.5rem;
            -webkit-transition: color 0.3s ease-out;
            transition: color 0.3s ease-out; }
          .offcanvas .close:not(.position-static) {
            position: absolute;
            top: 0;
            right: 0; }
          .offcanvas.bg-img {
            position: fixed; }

        .backdrop-offcanvas {
          z-index: 1009; }

        .popup {
          position: fixed;
          right: 2rem;
          bottom: 2rem;
          padding: 1.5rem;
          background-color: #fff;
          border: 1px solid #f1f2f3;
          border-radius: 0.25rem;
          -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
                  box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
          -webkit-transition: 0.4s ease-out;
          transition: 0.4s ease-out;
          z-index: 1010;
          visibility: hidden;
          opacity: 0; }
          .popup.show {
            visibility: visible;
            opacity: 1;
            -webkit-transform: translate(0, 0) !important;
                    transform: translate(0, 0) !important; }
            .popup.show[data-position$="-center"] {
              -webkit-transform: translate(-50%, 0) !important;
                      transform: translate(-50%, 0) !important; }
          .popup[data-position="top-left"] {
            right: auto;
            bottom: auto;
            top: 2rem;
            left: 2rem; }
          .popup[data-position="top-right"] {
            bottom: auto;
            top: 2rem; }
          .popup[data-position="bottom-left"] {
            right: auto;
            left: 2rem; }
          .popup[data-position="top-center"] {
            right: auto;
            bottom: auto;
            top: 2rem;
            left: 50%;
            -webkit-transform: translate(-50%);
                    transform: translate(-50%); }
          .popup[data-position="bottom-center"] {
            right: auto;
            left: 50%;
            -webkit-transform: translate(-50%);
                    transform: translate(-50%); }
          .popup[data-animation="slide-up"] {
            -webkit-transform: translate(0, 100%);
                    transform: translate(0, 100%); }
            .popup[data-animation="slide-up"][data-position$="-center"] {
              -webkit-transform: translate(-50%, 100%);
                      transform: translate(-50%, 100%); }
          .popup[data-animation="slide-down"] {
            -webkit-transform: translate(0, -100%);
                    transform: translate(0, -100%); }
            .popup[data-animation="slide-down"][data-position$="-center"] {
              -webkit-transform: translate(-50%, -100%);
                      transform: translate(-50%, -100%); }
          .popup[data-animation="slide-left"] {
            -webkit-transform: translate(100%, 0);
                    transform: translate(100%, 0); }
          .popup[data-animation="slide-right"] {
            -webkit-transform: translate(-100%, 0);
                    transform: translate(-100%, 0); }
          .popup .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.75rem 1rem;
            font-weight: 100;
            -webkit-transition: 0.3s ease-out;
            transition: 0.3s ease-out; }

        .header {
          position: relative;
          background-position: center;
          -webkit-background-size: cover;
                  background-size: cover;
          background-repeat: no-repeat;
          padding-top: 146px;
          padding-bottom: 90px; }
          .header > .container,
          .header > .container-fluid {
            position: relative;
            height: 100%; }
          .header.h-fullscreen {
            padding-top: 90px; }

        .section {
          position: relative;
          border-bottom: none;
          background-position: center center;
          -webkit-background-size: cover;
                  background-size: cover;
          background-repeat: no-repeat;
          padding-top: 7rem;
          padding-bottom: 7rem; }
          .section > .container,
          .section > .container-fluid,
          .section > .container-wide {
            position: relative;
            height: 100%; }
          @media (max-width: 991.98px) {
            .section {
              padding-top: 5rem;
              padding-bottom: 5rem; } }

        .section-header {
          text-align: center;
          max-width: 70%;
          margin: 0 auto 70px; }
          .section-header small {
            display: inline-block;
            font-size: 0.6875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.75px;
            margin-bottom: 1.5rem;
            word-spacing: 2px;
            color: rgba(153, 153, 153, 0.6); }
          .section-header hr {
            width: 50px;
            margin-top: 2.5rem;
            margin-bottom: 1.5rem; }
          .section-header p {
            font-size: 1.0625rem; }
            .section-header p.lead, .section-header .pricing-4 .plan-price p, .pricing-4 .plan-price .section-header p {
              font-size: 1.125rem; }
          @media (max-width: 991.98px) {
            .section-header {
              max-width: 90%; } }

        /*
        .section[data-parallax] {
          background-color: transparent;
        }


        .parallax-slider {
          animation: fadein 2s;
        }

        @keyframes fadein {
          from { opacity: 0; }
          to   { opacity: 1; }
        }
        */
        .section-video {
          overflow: hidden;
          padding-top: 0;
          padding-bottom: 0; }
          .section-video > .container,
          .section-video > .container-fluid,
          .section-video > .container-wide {
            padding-top: 90px;
            padding-bottom: 90px; }

        .section-dialog {
          background-color: #fff;
          padding: 1rem;
          border-radius: 4px; }
          @media (min-width: 768px) {
            .section-dialog {
              padding: 20px 24px; } }
          @media (min-width: 992px) {
            .section-dialog {
              padding: 30px 32px; } }

        .sidebar {
          display: -webkit-box;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
                  flex-direction: column;
          padding-top: 7rem;
          padding-bottom: 7rem; }
          .sidebar hr {
            margin-top: 30px;
            margin-bottom: 30px;
            border-top-style: solid; }
          .sidebar .nav-sidebar {
            height: 100%; }
          @media (max-width: 991.98px) {
            .sidebar {
              padding-top: 5rem;
              padding-bottom: 5rem; } }

        .sidebar-fixed {
          position: fixed;
          top: 0;
          left: -240px;
          bottom: 0;
          width: 240px;
          background-color: #fff;
          border-right: 1px solid #f1f2f3;
          z-index: 1000;
          -webkit-transition: left 0.3s ease-out;
          transition: left 0.3s ease-out; }
          .sidebar-open .sidebar-fixed {
            left: 0;
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05); }

        .sidebar-sticky.stick:not(.is-mobile-wide) {
          position: fixed;
          top: 0; }

        .sidebar-sticky.is-mobile-wide {
          padding-bottom: 0 !important; }

        .sidebar-header {
          text-align: center;
          padding-bottom: 30px;
          margin-bottom: 30px;
          border-bottom: 1px solid #f1f2f3; }

        .sidebar-title {
          font-weight: 600;
          letter-spacing: 1px;
          text-transform: uppercase;
          font-size: .85em;
          margin-bottom: 1rem; }

        .sidebar-body {
          position: relative;
          padding-right: 20px; }

        .sidebar-footer {
          text-align: center;
          padding: 20px 0;
          margin-top: 30px;
          border-top: 1px solid #f1f2f3; }

        .sidebar-toggler {
          padding: .25rem .75rem;
          font-size: 1.25rem;
          line-height: 1;
          cursor: pointer;
          background: 0 0;
          border: none;
          border-radius: .25rem;
          margin-right: 0.5rem;
          margin-bottom: -1px; }

        .backdrop-sidebar {
          z-index: 999; }

        @media (min-width: 576px) {
          .sidebar-fixed.sidebar-expand-sm {
            position: fixed;
            left: 0;
            background-color: #f5f6f7;
            -webkit-box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015);
                    box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015); }
            .sidebar-fixed.sidebar-expand-sm ~ .main-content {
              margin-left: 240px; } }

        @media (min-width: 768px) {
          .sidebar-fixed.sidebar-expand-md {
            position: fixed;
            left: 0;
            background-color: #f5f6f7;
            -webkit-box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015);
                    box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015); }
            .sidebar-fixed.sidebar-expand-md ~ .main-content {
              margin-left: 240px; } }

        @media (min-width: 992px) {
          .sidebar-fixed.sidebar-expand-lg {
            position: fixed;
            left: 0;
            background-color: #f5f6f7;
            -webkit-box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015);
                    box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015); }
            .sidebar-fixed.sidebar-expand-lg ~ .main-content {
              margin-left: 240px; } }

        @media (min-width: 1200px) {
          .sidebar-fixed.sidebar-expand-xl {
            position: fixed;
            left: 0;
            background-color: #f5f6f7;
            -webkit-box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015);
                    box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015); }
            .sidebar-fixed.sidebar-expand-xl ~ .main-content {
              margin-left: 240px; } }

        .sidebar-fixed.sidebar-expand {
          position: fixed;
          left: 0;
          background-color: #f5f6f7;
          -webkit-box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015);
                  box-shadow: 3px 0 5px rgba(0, 0, 0, 0.015); }
          .sidebar-fixed.sidebar-expand ~ .main-content {
            margin-left: 240px; }

        [data-sticky="true"].stick:not(.navbar) {
          position: fixed;
          top: 0; }

        .bt-1, .border-top-1 {
          border-top: 1px solid #f1f2f3; }

        .bl-1, .border-left-1 {
          border-left: 1px solid #f1f2f3; }

        .br-1, .border-right-1 {
          border-right: 1px solid #f1f2f3; }

        .bb-1, .border-bottom-1 {
          border-bottom: 1px solid #f1f2f3; }

        .bt-2, .border-top-2 {
          border-top: 2px solid #f1f2f3; }

        .bl-2, .border-left-2 {
          border-left: 2px solid #f1f2f3; }

        .br-2, .border-right-2 {
          border-right: 2px solid #f1f2f3; }

        .bb-2, .border-bottom-2 {
          border-bottom: 2px solid #f1f2f3; }

        .bt-3, .border-top-3 {
          border-top: 3px solid #f1f2f3; }

        .bl-3, .border-left-3 {
          border-left: 3px solid #f1f2f3; }

        .br-3, .border-right-3 {
          border-right: 3px solid #f1f2f3; }

        .bb-3, .border-bottom-3 {
          border-bottom: 3px solid #f1f2f3; }

        .bt-0, .border-top-0 {
          border-top-width: 0; }

        .bl-0, .border-left-0 {
          border-left-width: 0; }

        .br-0, .border-right-0 {
          border-right-width: 0; }

        .bb-0, .border-bottom-0 {
          border-bottom-width: 0; }

        .b-1 {
          border: 1px solid #f1f2f3; }

        .b-2 {
          border: 2px solid #f1f2f3; }

        .b-3 {
          border: 3px solid #f1f2f3; }

        .b-0 {
          border-width: 0; }

        .rounded-md {
          border-radius: 0.5rem !important; }

        .rounded-lg {
          border-radius: 0.75rem !important; }

        .rounded-xl {
          border-radius: 1rem !important; }

        .border-glass,
        .border-glass-1 {
          border-color: rgba(255, 255, 255, 0.35) !important; }

        .border-glass-2 {
          border-color: rgba(255, 255, 255, 0.25) !important; }

        .border-glass-3 {
          border-color: rgba(255, 255, 255, 0.15) !important; }

        .bg-gray {
          background-color: #fafbfb; }

        .bg-pale-primary {
          background-color: #eef4fc !important; }

        .bg-pale-secondary {
          background-color: #f0f4f7 !important; }

        .bg-pale-success {
          background-color: #eefcf0 !important; }

        .bg-pale-danger {
          background-color: #fceeef !important; }

        .bg-pale-warning {
          background-color: #fcf8ee !important; }

        .bg-pale-info {
          background-color: #f2eefc !important; }

        .bg-pale-light {
          background-color: #ffffff !important; }

        .bg-pale-dark {
          background-color: #e5e5e5 !important; }

        .bg-gradient-primary {
          background-image: -webkit-linear-gradient(45deg, #50a1ff 0%, #88bfff 100%) !important;
          background-image: linear-gradient(45deg, #50a1ff 0%, #88bfff 100%) !important; }

        .bg-gradient-secondary {
          background-image: -webkit-linear-gradient(45deg, #e9ecf0 0%, #f0f2f5 100%) !important;
          background-image: linear-gradient(45deg, #e9ecf0 0%, #f0f2f5 100%) !important; }

        .bg-gradient-success {
          background-image: -webkit-linear-gradient(45deg, #3cd458 0%, #7ae28d 100%) !important;
          background-image: linear-gradient(45deg, #3cd458 0%, #7ae28d 100%) !important; }

        .bg-gradient-danger {
          background-image: -webkit-linear-gradient(45deg, #ff4954 0%, #ff838b 100%) !important;
          background-image: linear-gradient(45deg, #ff4954 0%, #ff838b 100%) !important; }

        .bg-gradient-warning {
          background-image: -webkit-linear-gradient(45deg, #ffba00 0%, #ffd052 100%) !important;
          background-image: linear-gradient(45deg, #ffba00 0%, #ffd052 100%) !important; }

        .bg-gradient-info {
          background-image: -webkit-linear-gradient(45deg, #926dde 0%, #b59ce9 100%) !important;
          background-image: linear-gradient(45deg, #926dde 0%, #b59ce9 100%) !important; }

        .bg-gradient-dark {
          background-image: -webkit-linear-gradient(45deg, #191919 0%, #636363 100%) !important;
          background-image: linear-gradient(45deg, #191919 0%, #636363 100%) !important; }

        .text-default {
          color: #757575 !important; }

        a.text-default:hover, a.text-default:focus {
          color: #4f4f4f !important; }

        .text-light {
          color: #999999 !important; }

        a.text-light:hover, a.text-light:focus {
          color: #737373 !important; }

        .text-lighter {
          color: #bfc5ca !important; }

        a.text-lighter:hover, a.text-lighter:focus {
          color: #959fa7 !important; }

        .text-lightest {
          color: #d3d3d3 !important; }

        a.text-lightest:hover, a.text-lightest:focus {
          color: #adadad !important; }

        .text-inherit {
          color: inherit; }

        .bg-img {
          background-position: center;
          -webkit-background-size: cover;
                  background-size: cover;
          background-repeat: no-repeat; }

        .bg-fixed {
          background-attachment: fixed; }

        @media (max-width: 640px) {
          .bg-fixed {
            background-attachment: initial; } }

        .bg-repeat {
          background-repeat: repeat;
          -webkit-background-size: auto auto;
                  background-size: auto; }

        .bg-img-left {
          background-position: left center; }

        .bg-img-right {
          background-position: right center; }

        .bg-img-top {
          background-position: center top; }

        .bg-img-bottom {
          background-position: center bottom; }

        .bg-size-contain {
          -webkit-background-size: contain;
                  background-size: contain; }

        .opacity-0 {
          opacity: 0; }

        .opacity-5 {
          opacity: 0.05 !important; }

        .opacity-10 {
          opacity: 0.1 !important; }

        .opacity-15 {
          opacity: 0.15 !important; }

        .opacity-20 {
          opacity: 0.2 !important; }

        .opacity-25 {
          opacity: 0.25 !important; }

        .opacity-30 {
          opacity: 0.3 !important; }

        .opacity-35 {
          opacity: 0.35 !important; }

        .opacity-40 {
          opacity: 0.4 !important; }

        .opacity-45 {
          opacity: 0.45 !important; }

        .opacity-50 {
          opacity: 0.5 !important; }

        .opacity-55 {
          opacity: 0.55 !important; }

        .opacity-60 {
          opacity: 0.6 !important; }

        .opacity-65 {
          opacity: 0.65 !important; }

        .opacity-70 {
          opacity: 0.7 !important; }

        .opacity-75 {
          opacity: 0.75 !important; }

        .opacity-80 {
          opacity: 0.8 !important; }

        .opacity-85 {
          opacity: 0.85 !important; }

        .opacity-90 {
          opacity: 0.9 !important; }

        .opacity-95 {
          opacity: 0.95 !important; }

        .opacity-100 {
          opacity: 1 !important; }

        .shadow-0, .hover-shadow-0:hover {
          -webkit-box-shadow: none;
                  box-shadow: none; }

        .shadow-1, .product-3, .hover-shadow-1:hover {
          -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 4px rgba(0, 0, 0, 0.06); }

        .shadow-2, .portfolio-2 img, .hover-shadow-2:hover {
          -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 8px rgba(0, 0, 0, 0.06); }

        .shadow-3, .hover-shadow-3:hover {
          -webkit-box-shadow: 0 0 12px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 12px rgba(0, 0, 0, 0.06); }

        .shadow-4, .hover-shadow-4:hover {
          -webkit-box-shadow: 0 0 18px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 18px rgba(0, 0, 0, 0.06); }

        .shadow-5, .hover-shadow-5:hover, .portfolio-2 img:hover {
          -webkit-box-shadow: 0 0 26px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 26px rgba(0, 0, 0, 0.06); }

        .shadow-6, .hover-shadow-6:hover, .product-3:hover {
          -webkit-box-shadow: 0 0 36px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 36px rgba(0, 0, 0, 0.06); }

        .shadow-7, .hover-shadow-7:hover {
          -webkit-box-shadow: 0 0 48px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 48px rgba(0, 0, 0, 0.06); }

        .shadow-8, .hover-shadow-8:hover {
          -webkit-box-shadow: 0 0 60px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 60px rgba(0, 0, 0, 0.06); }

        .shadow-9, .hover-shadow-9:hover {
          -webkit-box-shadow: 0 0 74px rgba(0, 0, 0, 0.06);
                  box-shadow: 0 0 74px rgba(0, 0, 0, 0.06); }

        .overflow-hidden {
          overflow: hidden; }

        .transition {
          -webkit-transition: 0.3s ease-out;
          transition: 0.3s ease-out; }

        .cursor-pointer {
          cursor: pointer; }

        .hover-move-up {
          display: block;
          -webkit-transition: 0.2s ease-out;
          transition: 0.2s ease-out; }
          .hover-move-up:hover {
            -webkit-transform: translateY(-0.5rem);
                    transform: translateY(-0.5rem); }

        .fit-cover {
          object-fit: cover; }

        .fill-parent {
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          width: 100%;
          height: 100%; }

        .text-hue-rotate {
          color: #f35626;
          background-image: -webkit-linear-gradient(92deg, #f35626, #feab3a);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          -webkit-animation: hue-rotate 60s infinite linear; }

        .bg-hue-rotate {
          -webkit-animation: hue-rotate 30s linear infinite; }

        @-webkit-keyframes hue {
          from {
            -webkit-filter: hue-rotate(0deg); }
          to {
            -webkit-filter: hue-rotate(-360deg); } }

        .flex-grow-0 {
          -webkit-box-flex: 0;
                  flex-grow: 0; }

        .w-125 {
          width: 125px !important; }

        .h-125 {
          height: 125px !important; }

        .mw-125 {
          min-width: 125px !important; }

        .mh-125 {
          min-height: 125px !important; }

        .w-150 {
          width: 150px !important; }

        .h-150 {
          height: 150px !important; }

        .mw-150 {
          min-width: 150px !important; }

        .mh-150 {
          min-height: 150px !important; }

        .w-175 {
          width: 175px !important; }

        .h-175 {
          height: 175px !important; }

        .mw-175 {
          min-width: 175px !important; }

        .mh-175 {
          min-height: 175px !important; }

        .w-200 {
          width: 200px !important; }

        .h-200 {
          height: 200px !important; }

        .mw-200 {
          min-width: 200px !important; }

        .mh-200 {
          min-height: 200px !important; }

        .w-250 {
          width: 250px !important; }

        .h-250 {
          height: 250px !important; }

        .mw-250 {
          min-width: 250px !important; }

        .mh-250 {
          min-height: 250px !important; }

        .w-300 {
          width: 300px !important; }

        .h-300 {
          height: 300px !important; }

        .mw-300 {
          min-width: 300px !important; }

        .mh-300 {
          min-height: 300px !important; }

        .w-350 {
          width: 350px !important; }

        .h-350 {
          height: 350px !important; }

        .mw-350 {
          min-width: 350px !important; }

        .mh-350 {
          min-height: 350px !important; }

        .w-400 {
          width: 400px !important; }

        .h-400 {
          height: 400px !important; }

        .mw-400 {
          min-width: 400px !important; }

        .mh-400 {
          min-height: 400px !important; }

        .w-500 {
          width: 500px !important; }

        .h-500 {
          height: 500px !important; }

        .mw-500 {
          min-width: 500px !important; }

        .mh-500 {
          min-height: 500px !important; }

        .w-600 {
          width: 600px !important; }

        .h-600 {
          height: 600px !important; }

        .mw-600 {
          min-width: 600px !important; }

        .mh-600 {
          min-height: 600px !important; }

        .w-700 {
          width: 700px !important; }

        .h-700 {
          height: 700px !important; }

        .mw-700 {
          min-width: 700px !important; }

        .mh-700 {
          min-height: 700px !important; }

        .w-800 {
          width: 800px !important; }

        .h-800 {
          height: 800px !important; }

        .mw-800 {
          min-width: 800px !important; }

        .mh-800 {
          min-height: 800px !important; }

        .w-900 {
          width: 900px !important; }

        .h-900 {
          height: 900px !important; }

        .mw-900 {
          min-width: 900px !important; }

        .mh-900 {
          min-height: 900px !important; }

        .w-5px {
          width: 5px !important; }

        .h-5px {
          height: 5px !important; }

        .w-10px {
          width: 10px !important; }

        .h-10px {
          height: 10px !important; }

        .w-15px {
          width: 15px !important; }

        .h-15px {
          height: 15px !important; }

        .w-20px {
          width: 20px !important; }

        .h-20px {
          height: 20px !important; }

        .w-25px {
          width: 25px !important; }

        .h-25px {
          height: 25px !important; }

        .w-30px {
          width: 30px !important; }

        .h-30px {
          height: 30px !important; }

        .w-35px {
          width: 35px !important; }

        .h-35px {
          height: 35px !important; }

        .w-40px {
          width: 40px !important; }

        .h-40px {
          height: 40px !important; }

        .w-45px {
          width: 45px !important; }

        .h-45px {
          height: 45px !important; }

        .w-50px {
          width: 50px !important; }

        .h-50px {
          height: 50px !important; }

        .w-55px {
          width: 55px !important; }

        .h-55px {
          height: 55px !important; }

        .w-60px {
          width: 60px !important; }

        .h-60px {
          height: 60px !important; }

        .w-65px {
          width: 65px !important; }

        .h-65px {
          height: 65px !important; }

        .w-70px {
          width: 70px !important; }

        .h-70px {
          height: 70px !important; }

        .w-75px {
          width: 75px !important; }

        .h-75px {
          height: 75px !important; }

        .w-80px {
          width: 80px !important; }

        .h-80px {
          height: 80px !important; }

        .w-85px {
          width: 85px !important; }

        .h-85px {
          height: 85px !important; }

        .w-90px {
          width: 90px !important; }

        .h-90px {
          height: 90px !important; }

        .w-95px {
          width: 95px !important; }

        .h-95px {
          height: 95px !important; }

        .w-100px {
          width: 100px !important; }

        .h-100px {
          height: 100px !important; }

        .h-auto {
          height: auto; }

        .w-auto {
          width: auto; }

        .w-fullscreen, .w-100vw {
          width: 100vw !important; }

        .h-fullscreen, .h-100vh {
          height: 100vh !important; }

        .mw-fullscreen, .mw-100vw {
          min-width: 100vw !important; }

        .mh-fullscreen, .mh-100vh {
          min-height: 100vh !important; }

        @media (max-height: 640px) {
          .h-fullscreen {
            height: auto !important; } }

        .gap-x-1 > * {
          display: inline-block;
          margin-left: 2px;
          margin-right: 2px; }
          .gap-x-1 > *:first-child {
            margin-left: 0; }
          .gap-x-1 > *:last-child {
            margin-right: 0; }

        .gap-x-2 > * {
          display: inline-block;
          margin-left: 4px;
          margin-right: 4px; }
          .gap-x-2 > *:first-child {
            margin-left: 0; }
          .gap-x-2 > *:last-child {
            margin-right: 0; }

        .gap-x > *,
        .gap-x-3 > * {
          display: inline-block;
          margin-left: 8px;
          margin-right: 8px; }
          .gap-x > *:first-child,
          .gap-x-3 > *:first-child {
            margin-left: 0; }
          .gap-x > *:last-child,
          .gap-x-3 > *:last-child {
            margin-right: 0; }

        .gap-x-4 > * {
          display: inline-block;
          margin-left: 12px;
          margin-right: 12px; }
          .gap-x-4 > *:first-child {
            margin-left: 0; }
          .gap-x-4 > *:last-child {
            margin-right: 0; }

        .gap-x-5 > * {
          display: inline-block;
          margin-left: 16px;
          margin-right: 16px; }
          .gap-x-5 > *:first-child {
            margin-left: 0; }
          .gap-x-5 > *:last-child {
            margin-right: 0; }

        .gap-x-6 > * {
          display: inline-block;
          margin-left: 24px;
          margin-right: 24px; }
          .gap-x-6 > *:first-child {
            margin-left: 0; }
          .gap-x-6 > *:last-child {
            margin-right: 0; }

        .gap-x-7 > * {
          display: inline-block;
          margin-left: 32px;
          margin-right: 32px; }
          .gap-x-7 > *:first-child {
            margin-left: 0; }
          .gap-x-7 > *:last-child {
            margin-right: 0; }

        .gap-xy-1 {
          margin: -2px; }
          .gap-xy-1 > * {
            display: inline-block;
            margin: 2px; }

        .gap-xy-2 {
          margin: -4px; }
          .gap-xy-2 > * {
            display: inline-block;
            margin: 4px; }

        .gap-xy,
        .gap-xy-3 {
          margin: -8px; }
          .gap-xy > *,
          .gap-xy-3 > * {
            display: inline-block;
            margin: 8px; }

        .gap-xy-4 {
          margin: -12px; }
          .gap-xy-4 > * {
            display: inline-block;
            margin: 12px; }

        .gap-xy-5 {
          margin: -16px; }
          .gap-xy-5 > * {
            display: inline-block;
            margin: 16px; }

        .gap-xy-6 {
          margin: -24px; }
          .gap-xy-6 > * {
            display: inline-block;
            margin: 24px; }

        .gap-xy-7 {
          margin: -32px; }
          .gap-xy-7 > * {
            display: inline-block;
            margin: 32px; }

        .font-body {
          font-family: "Open Sans", sans-serif; }

        .font-title {
          font-family: Dosis, sans-serif; 
        }

        .fs-6,
        .font-size-6 {
          font-size: 6px !important; }

        .fs-7,
        .font-size-7 {
          font-size: 7px !important; }

        .fs-8,
        .font-size-8 {
          font-size: 8px !important; }

        .fs-9,
        .font-size-9 {
          font-size: 9px !important; }

        .fs-10,
        .font-size-10 {
          font-size: 10px !important; }

        .fs-11,
        .font-size-11 {
          font-size: 11px !important; }

        .fs-12,
        .font-size-12 {
          font-size: 12px !important; }

        .fs-13,
        .font-size-13 {
          font-size: 13px !important; }

        .fs-14,
        .font-size-14 {
          font-size: 14px !important; }

        .fs-15,
        .font-size-15 {
          font-size: 15px !important; }

        .fs-16,
        .font-size-16 {
          font-size: 16px !important; }

        .fs-17,
        .font-size-17 {
          font-size: 17px !important; }

        .fs-18,
        .font-size-18 {
          font-size: 18px !important; }

        .fs-19,
        .font-size-19 {
          font-size: 19px !important; }

        .fs-20,
        .font-size-20 {
          font-size: 20px !important; }

        .lead-1 {
          font-size: 1.05469rem !important; }

        .lead-2 {
          font-size: 1.17188rem !important; }

        .lead-3 {
          font-size: 1.40625rem !important; }

        .lead-4 {
          font-size: 1.64063rem !important; }

        .lead-5 {
          font-size: 1.875rem !important; }

        .lead-6 {
          font-size: 2.34375rem !important; }

        .lead-7 {
          font-size: 3.04688rem !important; }

        .lead-8 {
          font-size: 3.75rem !important; }

        .lead-9 {
          font-size: 4.6875rem !important; }

        .small-1 {
          font-size: 0.87891rem !important; }

        .small-2 {
          font-size: 0.82031rem !important; }

        .small-3 {
          font-size: 0.76172rem !important; }

        .small-4 {
          font-size: 0.70313rem !important; }

        .small-5 {
          font-size: 0.64453rem !important; }

        .small-6 {
          font-size: 0.58594rem !important; }

        .small-7 {
          font-size: 0.52734rem !important; }

        .small-8 {
          font-size: 0.46875rem !important; }

        .small-9 {
          font-size: 0.41016rem !important; }

        .fw-100,
        .font-weight-100 {
          font-weight: 100 !important; }

        .fw-200,
        .font-weight-200 {
          font-weight: 200 !important; }

        .fw-300,
        .font-weight-300 {
          font-weight: 300 !important; }

        .fw-400,
        .font-weight-400 {
          font-weight: 400 !important; }

        .fw-500,
        .font-weight-500 {
          font-weight: 500 !important; }

        .fw-600,
        .font-weight-600 {
          font-weight: 600 !important; }

        .fw-700,
        .font-weight-700 {
          font-weight: 700 !important; }

        .fw-800,
        .font-weight-800 {
          font-weight: 800 !important; }

        .fw-900,
        .font-weight-900 {
          font-weight: 900 !important; }

        .lh-1,
        .line-height-1 {
          line-height: 1; }

        .lh-2,
        .line-height-2 {
          line-height: 1.3; }

        .lh-3,
        .line-height-3 {
          line-height: 1.45; }

        .lh-4,
        .line-height-4 {
          line-height: 1.6; }

        .lh-5,
        .line-height-5 {
          line-height: 1.75; }

        .lh-6,
        .line-height-6 {
          line-height: 1.9; }

        .lh-7,
        .line-height-7 {
          line-height: 2.05; }

        .lh-8,
        .line-height-8 {
          line-height: 2.2; }

        .lh-9,
        .line-height-9 {
          line-height: 2.35; }

        .ls-0,
        .letter-spacing-0 {
          letter-spacing: 0px; }

        .ls-1,
        .letter-spacing-1 {
          letter-spacing: 1px; }

        .ls-2,
        .letter-spacing-2 {
          letter-spacing: 2px; }

        .ls-3,
        .letter-spacing-3 {
          letter-spacing: 3px; }

        .ls-4,
        .letter-spacing-4 {
          letter-spacing: 4px; }

        .ls-5,
        .letter-spacing-5 {
          letter-spacing: 5px; }

        .text-truncate {
          width: auto;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis; }

        .card-outline {
          background-color: transparent;
          border: 1px solid rgba(255, 255, 255, 0.3); }

        .card-hover-inverse:hover {
          background-color: #191919;
          border-color: #191919; }

        .text-white {
          color: rgba(255, 255, 255, 0.85) !important; }
          .text-white h1, .text-white h2, .text-white h3, .text-white h4, .text-white h5, .text-white h6,
          .text-white .h1, .text-white .h2, .text-white .h3, .text-white .h4, .text-white .h5, .text-white .h6 {
            color: #fff; }
          .text-white a:not(.btn):not(.dropdown-item) {
            color: rgba(255, 255, 255, 0.8); }
          .text-white hr {
            border-top-color: rgba(255, 255, 255, 0.15); }
          .text-white p {
            color: rgba(255, 255, 255, 0.85); }
          .text-white code {
            background-color: rgba(255, 255, 255, 0.1);
            color: #eee; }
          .text-white small,
          .text-white .small {
            color: rgba(255, 255, 255, 0.8); }
          .text-white .divider {
            color: rgba(255, 255, 255, 0.5); }
            .text-white .divider::before, .text-white .divider::after {
              border-top-color: rgba(255, 255, 255, 0.15); }
          .text-white .section-header small {
            color: rgba(255, 255, 255, 0.6); }
          .text-white .rating label.empty {
            color: rgba(255, 255, 255, 0.3); }
          .text-white .card-inverse {
            background-color: rgba(255, 255, 255, 0.1); }
          .text-white .btn-outline-light {
            color: rgba(255, 255, 255, 0.6);
            border-color: rgba(255, 255, 255, 0.3); }
            .text-white .btn-outline-light:hover {
              color: #757575; }
          .text-white .close {
            color: rgba(255, 255, 255, 0.85); }

        /*# sourceMappingURL=page.css.map */

    </style>
    
    <style>
      .report-overview{
        background-color: #1B8BF9;
        color: white;
        height: 250px;
        padding: 500px;
      }

      .report-overview td{
        padding: 50px;
        margin-top: 40px;
      }

      .table-data-borderless{
        border: none;
      }
    </style>
  </head>


<body>
  <div class="container">
    <table class="table table-borderless">
        <tbody>
          <tr>
            <td>
              <p
                class="lead-8 lh-1 fw-700 counted"
                data-provide="countup"
                data-from="0"
                :data-to="number(potential_impact)"
              >
                Viralget
              </p>
              </td>
            <td> 
              <br>               
              <h6 id="block-2" class="block-number">
                {{ $data['report_days'] }} profiling report for:
                <strong>@dayo_daveed</strong>
              </h6>
              <p>
                <small>
                  <span class="icon-calendar"></span> &nbsp; "date_from" - "date_to"
                </small>
              </p>
            </td>
          </tr>
        </tbody>
      </table>

      <table class="table table-borderless">
        <tbody>
          <tr>
            <td>
                <div class="col-md-6 text-center">
                  <img
                    class="rounded-circle"
                    width="200px"
                    :src="_avatar"
                    :alt="name"
                  />
                  <br />
                  <div class="row">
                    <div class="col-md-8 mx-md-auto">
                      <h5>About {{ $data['name'] }}</h5>
                      <h6>@ {{ $data['handle'] }}</h6>
                      <p>{{ $data['about'] }}</p>
                      <p><i class="icon-scope"></i> {{ $data['location'] }}</p>
                    </div>
                  </div>
                </div>
            </td>
            
            <td>
              <table class="table table-data-borderless table-borderless">
                <tbody>
                  <tr>
                    <td>
                      <div class="col-md-4 text-center">
                        <h4>Impressions</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            11111111111111111111111
                          </h2>
                        </>
                      </div>
                    </td>
                    <td> 
                      <div class="col-md-4 text-center">
                        <h4>Reach</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['reach'] }}
                          </h2>
                        </>
                      </div>
                    </td>
                    <td> 
                      <div class="col-md-4 text-center">
                        <h4>Total Engagements</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['total_engagements'] }}
                          </h2>
                        </>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col-md-4 text-center">
                        <h4>Total Posts</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['total_tweets'] }}
                          </h2>
                        </>
                      </div>
                    </td>
                    <td> 
                      <div class="col-md-4 text-center">
                        <h4>Average Likes</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['averageLikes'] }}
                          </h2>
                        </>
                      </div>
                    </td>
                    <td> 
                      <div class="col-md-4 text-center">
                        <h4>Average Retweets</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['averageRetweets'] }}
                          </h2>
                        </>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col-md-4 text-center">
                        <h4>Followers</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['followers'] }}
                          </h2>
                        </>
                      </div>
                    </td>
                    <td> 
                      <div class="col-md-4 text-center">
                        <h4>Following</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['following'] }}
                          </h2>
                        </>
                      </div>
                    </td>
                    <td> 
                      <div class="col-md-4 text-center">
                        <h4>Engagement Rate</h4>
                        <p>
                          <h2
                            data-provide="countup"
                            data-from="0"
                            :data-to="parseInt(numberFormat(impressions))"
                            class="counted"
                          >
                            {{ $data['engagement_rate'] }}%
                          </h2>
                        </>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>

    <div class="row">
        <table class="table shadow bg-white table-hover table-striped">
          <tr>
            <td width="70%">
              <div class="col-md-6">
                <h5 class="fw-500 my-4">
                  Most Retweeted Tweets In The Last 30 Days
                </h5>
                <table class="table shadow bg-white table-hover table-striped">
                  <tr>
                    <td width="70%">
                      <div eet text</p>
                        <p>
                          <small
                            ><strong
                              >Posted on
                              2002-20-20</strong
                            ></small
                          >
                        </p>
                        <p>
                          <i class="fa fa-retweet text-primary"></i>
                          retweet_count &nbsp;&nbsp;
                          <i class="fa fa-heart text-danger"></i>
                          favorite_count
                        </p>
                        <hr class="my-7" />
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
            
            <td width="70%">
              <div class="col-md-6">
                <h5 class="fw-500 my-4">
                  Most Retweeted Tweets
                </h5>
                <table class="table shadow bg-white table-hover table-striped">
                  <tr>
                    <td width="70%">
                      <div>
                        <p>retweet text</p>
                        <p>
                          <small
                            ><strong
                              >Posted on
                              2002-20-20</strong
                            ></small
                          >
                        </p>
                        <p>
                          <i class="fa fa-retweet text-primary"></i>
                          retweet_count &nbsp;&nbsp;
                          <i class="fa fa-heart text-danger"></i>
                          favorite_count
                        </p>
                        <hr class="my-7" />
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
        </table>
    </div>
</body>
</html>
