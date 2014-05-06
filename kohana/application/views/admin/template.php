<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" <?php echo isset($calendar_app) ? $calendar_app : null; ?> 
      <?php echo isset($app) ? $app: null; ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <title>
            Trinity Roof Inspections
        </title>
        <meta name="apple-mobile-web-app-capable" content="no">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="viewport" content="width=device-width,initial-scale=0.69,user-scalable=yes,maximum-scale=1.00"><?php echo $css; ?><!--[if lte IE 8]>
        <script type="text/javascript" src="js/excanvas.min.js"></script>
    <![endif]-->
        <?php if (isset($maps) && $maps) {
                echo "<script type=\"text/javascript\">
                          var locations = " . json_encode($locations->as_array()). ";" .
                     "</script>"; 
            }

            if (isset($events)) {
                echo "<script type=\"text/javascript\">
                          var locations = " . json_encode($events->as_array()). ";" .
                         "var inspectors = " . json_encode($inspectors->as_array()) . ";" .
                     "</script>"; 
            }



            ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="container" class="<?php echo $homepage ? 'no-bg' : ''; ?>">
                <div id="top">
                    <h1 id="logo">
                        <a href="/"></a>
                    </h1>
                    <div id="labels">
                        <?php echo $logged_in; ?>
                    </div><?php echo $admin_menu; ?>
                </div>
                <div class="plain">
                    &nbsp;
                </div><?php if (!$homepage) {  
                                  if (isset($side_bar)) {
                                      echo $side_bar;
                                  } else { ?>
                <div id="left">
                    <div class="box submenu">
                        <div class="content">
                            <ul>
                                <li class="current">
                                    <a href="/users/index">Users</a>
                                    <ul>
                                        <li>
                                            <a href="/users/new">Add new User</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><?php }} ?>
                <div id="right" class="<?php echo $homepage ? ' margin-small ' : null; ?>">
                    <?php echo isset($success_message) ? "<div class=\"section\"><div class=\"message info\"><span>" . $success_message . "</span></div></div>" : null; ?><?php echo isset($error) ? "<div class=\"section\"><div class=\"message error\"><span>" . $error . "</span></div></div>" : null; ?><?php echo $content; ?>
                </div>
            </div>
        </div><?php echo $js; ?>
    </body>
</html>