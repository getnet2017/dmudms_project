<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .vertical-menu {
        width: 150px;
        height: 100%;
        overflow-y: auto;
    }

    .vertical-menu a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
        text-decoration: none;
    }

    .vertical-menu a:hover {
        background-color: #ccc;
    }

    .vertical-menu a.active {
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>

    <h1>Vertical Scroll Menu</h1>

    <div class="vertical-menu">
        <a href="#" class="active">Home</a>
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        <a href="#">Link 4</a>
        <a href="#">Link 5</a>
        <a href="#">Link 6</a>
        <a href="#">Link 7</a>
        <a href="#">Link 8</a>
        <a href="#">Link 9</a>
        <a href="#">Link 10</a>
    </div>

</body>

</html>