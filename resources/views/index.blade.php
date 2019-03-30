<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
        <title>
        @yield('title')
        </title>
        </meta>
        <base href="{{asset('')}}">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
    </head>
    <body>
        @yield('content')
        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>