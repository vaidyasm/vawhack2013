<html>
<head>
    <title>VAW</title>
    <link href="app/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <style>
        #main{
            margin-top: 60px;
        }
        #information_input_form{
            margin-top: 20px;
        }
     </style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="nav-collapse collapse">
                    <ul class="nav pull-left">
                        <li class="active">
                            <a href="http://vawhackdevel.com/">Home</a>
                        </li>
                        <li>
                            <a href="http://vawhackdevel.com?page=login">Login</a>
                        </li>
                     </ul>
                </div><!-- nav-collapse -->
            </div><!-- container -->
        </div><!-- navbar-inner -->
    </div>
    <div class="clearfix"></div>
    <div id="main" class="container">
        <?php 
        if(isset($_GET["page"]))
            require_once('app/pages/'.$_GET['page'].".php");
        else
            require_once('app/pages/home.php');
        ?>
    </div>
    <div id="footer">
    </div>
    <script src="app/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>