<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="mdl/material.indigo-pink.min.css">
    <link rel="stylesheet" href="mdl/icon.css">
    <script type="text/javascript" src="mdl/material.min.js"></script>
    <title>Study Jam</title>
</head>
<body>
    <button id="show-dialog" type="button" class="mdl-button">Show Dialog</button>
    <dialog class="mdl-dialog">
        <h4 class="mdl-dialog__title">Allow Data Connection</h4>
        <div class="mdl-dialog__content">
            <p>Allowing is to collect data will let us get you the information you want faster.</p>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button">Agree</button>
            <button type="button" class="mdl-button close">Disagree</button>
        </div>
    </dialog>
    <script>
        var dialog = document.querySelector('dialog');
        var showDialogButton = document.querySelector('#show-dialog');
        if(! dialog.showModal){
            dialogPolyfill.registerDialog(dialog);

        }

        showDialogButton.addEventListener('click', function () {
            dialog.showModal();

        });

        dialog.querySelector('.close').addEventListener('click', function () {
            dialog.close();
        });


    </script>
</body>