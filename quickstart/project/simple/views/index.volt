<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Quickstart</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta content="le51" name="author">
        <link rel="shortcut icon" href="/favicon.ico">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        {{ assets.outputCss() }}
        <style>
            @media (max-width: 800px) {
              .sm-content {
                margin:0;
                padding:0;
              }
              .content-wrapper{
                background: #fff;
              }
              .invoice{
                border:0px;
              }
            }
        </style>
    </head>
    {{ content() }}
    <script>

    </script>
</html>
