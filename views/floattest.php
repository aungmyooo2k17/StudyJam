<htmL>
<head>
    <style>


        .container-float {
            margin: 1em;
            position: fixed;
            bottom: 0;
            right: 0;
        }
        .container-float:hover .buttons-float:not(:last-of-type) {
            width: 40px;
            height: 40px;
            margin: 15px auto 0;
            opacity: 1;
        }
        .container-float:hover .rotate-spn {
            background-image: url("http://goo.gl/0eJslQ");
            transform: rotate(0deg);
        }

        .buttons-float {
            display: block;
            width: 35px;
            height: 35px;
            margin: 20px auto 0;
            text-decoration: none;
            position: relative;
            border-radius: 50%;
            box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 0px 4px 12px -7px rgba(0, 0, 0, 0.15);
            opacity: 0;
            transition: .2s;
        }
        .buttons-float:nth-last-of-type(2) {
            transition-delay: 20ms;
        }
        .buttons-float:nth-last-of-type(3) {
            transition-delay: 40ms;
        }
        .buttons-float:nth-last-of-type(4) {
            transition-delay: 60ms;
        }
        .buttons-float:nth-last-of-type(5) {
            transition-delay: 80ms;
        }
        .buttons-float:nth-last-of-type(6) {
            transition-delay: 100ms;
        }
        .buttons-float:nth-last-of-type(1) {
            width: 56px;
            height: 56px;
            opacity: 1;
        }
        .buttons-float:nth-last-of-type(2) {
            background: #D2A518 url("http://goo.gl/XVUbvp") center no-repeat;
        }
        .buttons-float:nth-last-of-type(3) {
            background: #3C80F6 url("https://goo.gl/xdZJHE") center no-repeat;
        }
        .buttons-float:nth-last-of-type(4) {
            background-image: url("https://goo.gl/OEKh8Y");
            background-size: contain;
        }
        .buttons-float:nth-last-of-type(5) {
            background-image: url("https://goo.gl/SrERjY");
            background-size: contain;
        }
        .buttons-float:nth-last-of-type(6) {
            background-image: url("http://goo.gl/c5kspt");
            background-size: contain;
        }
        .buttons-float:hover {
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);
        }

        #spn {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        #spn.rotate-spn {
            background: #DB4437 url("http://goo.gl/EfgECT") center no-repeat;
            position: absolute;
            transform: rotate(90deg);
            transition: .3s;
        }

        [tooltip]:before {
            content: attr(tooltip);
            background: #585858;
            padding: 5px 7px;
            margin-right: 10px;
            border-radius: 2px;
            color: #FFF;
            font: 500 12px Roboto;
            white-space: nowrap;
            position: absolute;
            bottom: 20%;
            right: 100%;
            visibility: hidden;
            opacity: 0;
            transition: .3s;
        }
        [tooltip]:hover:before {
            visibility: visible;
            opacity: 1;
        }

    </style>
</head>
<body>


<nav class="container-float">
    <a class="buttons-float" href="http://codepen.io/koenigsegg1" target="_blank" tooltip="Kyle Lavery"></a>
    <a class="buttons-float" href="#" tooltip="Xavier"></a>
    <a class="buttons-float" href="#" tooltip="James"></a>
    <a class="buttons-float" href="#" tooltip="Reminders"></a>
    <a class="buttons-float" href="#" tooltip="Invite to Inbox"></a>
    <a class="buttons-float" href="#" tooltip="Compose">
        <span id="spn" class="rotate-spn"></span>
    </a>
</nav>
</body>
</htmL>