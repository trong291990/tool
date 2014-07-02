<!DOCTYPE html>
<html>
    <head>
        <title>SFR tool  <?php echo View::yieldContent('title') ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="/assets/clean/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/clean/css/font-awesome.min.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
        <link href="/assets/clean/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <div role="navigation" id="main-nav" class="navbar navbar-default">
            <div class="container">
              <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Project name</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="/admin">Home</a></li>
                  <li><a href="/admin/project">Projects</a></li>
                  <li><a href="/admin/member">Members</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="../navbar/">Default</a></li>
                  <li><a href="../navbar-static-top/">Static top</a></li>
                  <li class="active"><a href="./">Fixed top</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
        </div>
        <div id="alert-page">
            <div  class="container">
                <div  class="col-sm-8 col-sm-offset-2">
                    <?php 
                    if (Session::has('message')){
                        $message = Session::get('message');
                        echo HTML::alert('success',$message,'Success');
                    }
                    if (Session::has('error_message')){
                        $message = Session::get('error_message');
                        echo HTML::alert('danger',$message,'Success');
                    }
                    if (Session::has('warning_message')){
                        $message = Session::get('error_message');
                        echo HTML::alert('warning',$message,'Warning');
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="page-content container">
            <?php echo $content;?>
        </div>
        <div id="footer">
            Copyright 2014 - SRF Software
        </div>
        <script type="text/javascript" src="/assets/clean/js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="/assets/clean/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/assets/clean/js/scrum.js"></script>
        <?php echo View::yieldContent('script') ?>
    </body>
</html>
