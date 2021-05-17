<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href="{{asset('')}}">
  <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/client/dest/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/client/dest/vendors/colorbox/example3/colorbox.css">
  <link rel="stylesheet" href="assets/client/dest/rs-plugin/css/settings.css">
  <link rel="stylesheet" href="assets/client/dest/rs-plugin/css/responsive.css">
  <link rel="stylesheet" title="style" href="assets/client/dest/css/style.css">
  <link rel="stylesheet" href="assets/client/dest/css/animate.css">
  <link rel="stylesheet" title="style" href="assets/client/dest/css/huong-style.css">
</head>

<body>

  @include('client.partial.header')
  <!-- #header -->

  @yield('content')

  @include('client.partial.footer')
  <!-- #footer -->


  <!-- include js files -->
  <script src="assets/client/dest/js/jquery.js"></script>
  <script src="assets/client/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="assets/client/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
  <script src="assets/client/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
  <script src="assets/client/dest/vendors/animo/Animo.js"></script>
  <script src="assets/client/dest/vendors/dug/dug.js"></script>
  <script src="assets/client/dest/js/scripts.min.js"></script>
  <script src="assets/client/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script src="assets/client/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <script src="assets/client/dest/js/waypoints.min.js"></script>
  <script src="assets/client/dest/js/wow.min.js"></script>
  <!--customjs-->
  <script src="assets/client/dest/js/custom2.js"></script>
  <!-- partial -->
  <script src="assets/client/dest/js/partial.js"></script>

  <script>
    jQuery(".alert").fadeTo(2000, 500).slideDown(500, function() {
      jQuery(".alert").slideUp(300);
    });
  </script>
</body>

</html>