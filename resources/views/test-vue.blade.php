<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Vue</title>
</head>
<body>
    <div id="app">
        <p>Test Vuejs</p>
    </div>
    <script src="https://unpkg.com/vue"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                name: ''
            },
            mounted: function() {
                console.log('init vue')
            }
        });
    </script>
</body>
</html>