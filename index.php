<?php

require(dirname(__FILE__) . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');

$wwwroot = $CFG->wwwroot;

defined('MOODLE_INTERNAL') || die;

$context = context_system::instance();
require_capability('report/moodleanalyst:view', $context);

$googleLibs = 'https://www.google.com/jsapi?autoload={%22modules%22:[{%22name%22:%22visualization%22,%22version%22:%221%22,%22packages%22:[%22table%22,%22corechart%22,%22controls%22]}]}';
/*
 * Old referrer to angular.html 
  echo '<script type="text/javascript">
  window.location = "/report/moodleanalyst/html/angular.html";
  </script>';
 */

echo '<html>
    <head>
        <title>Moodle AnalyST</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="' . $wwwroot . '/report/moodleanalyst/pix/favicon.ico" type="image/x-icon" />
        
        <!-- Bootstrap core CSS-->
        <link rel="stylesheet" href="' . $wwwroot . '/report/moodleanalyst/css/bootstrap.min.css" />
        
        <!-- Bootstrap core CSS-->
        <link rel="stylesheet" href="' . $wwwroot . '/report/moodleanalyst/css/ownModifications.css" />
        
        <!-- jQuery core CSS -->
        <link rel="stylesheet" href="' . $wwwroot . '/report/moodleanalyst/css/jquery-ui.min.css" />
    </head>
    
    <body ng-app="overview" style="padding-top:40px">
        <div class="wrapper">
                <div style="padding-top:0px"  class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header navbar-right">
                            <button type="button" data-toggle="collapse" data-target="#navbar_sc" class="navbar-toggle collapsed">
                                <span class="sr-only">Toggle nav</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="' . $wwwroot . '/report/moodleanalyst/index.php" class="navbar-brand"> 
                                <span><img alt="Brand" src="' . $wwwroot . '/report/moodleanalyst/pix/favicon.ico">&nbsp;Moodle Analyst Support Tool</span>
                            </a>
                        </div>
                        <div id="navbar_sc" class="collapse navbar-collapse" role="tabpanel">
                            <ul class="nav navbar-nav" role="tablist" id="myTabList">
                                <li role="presentation" class="active">
                                    <a id="tablink_home" href="#tabs-1" role="tab" data-toggle="tab">
                                        <span class="glyphicon glyphicon-home"></span> {{vocabulary.sitehome}}
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a id="tablink_createnewcourse" href="#tabs-2" role="tab" data-toggle="tab">
                                        <span class="glyphicon glyphicon-plus"></span> {{vocabulary.newcourse}}
                                    </a>
                                </li>
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                        <span class="glyphicon glyphicon-stats"></span> {{vocabulary.statistics}}<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li role="presentation"><a id="tablink_newusers" href="#tabs-3" role="tab" data-toggle="tab">{{vocabulary.newusers}}</a></li>
                                        <li role="presentation"><a id="tablink_inactiveusers" href="#tabs-4" role="tab" data-toggle="tab">Inactive users</a></li>
                                        <li role="presentation"><a id="tablink_emptycourses" href="#tabs-5" role="tab" data-toggle="tab">Empty courses</a></li>
                                    </ul>
                                </li>
                                <!--
                                <li role="presentation"><a id="tablink_dummy" href="#tabs-8" role="tab" data-toggle="tab">
                                        <span class="glyphicon glyphicon-wrench"></span> dummy
                                    </a>
                                </li>
                                -->
                            </ul>
                        </div>
                    </div> <!-- container-fluid -->
                </div> <!-- navbar -->
                
                <div class="tab-content well container-fluid" id="tabs">
                    <div role="tabpanel" class="tab-pane fade active in" id="tabs-1">
                        <overview></overview>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-2">
                        <newcourseform></newcourseform>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-3">
                        <div ng-include="\'' . $wwwroot . '/report/moodleanalyst/html/newusers.tpl.html\'"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-4">
                        <div ng-include="\'' . $wwwroot . '/report/moodleanalyst/html/inactiveusers.tpl.html\'"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-5">
                        <div ng-include="\'' . $wwwroot . '/report/moodleanalyst/html/emptycourses.tpl.html\'"></div>
                    </div>
                </div> <!-- tab-content -->
                
                <footer class="navbar-inverse navbar-fixed-bottom">
                    <div class="container-fluid">
                        <p class="pull-right" id="backtotop">
                            <a href="" target="_self" style="color:#A4A4A4;">
                                {{vocabulary.backtotop}}
                            </a>
                        </p>
                        <p style="color:#A4A4A4;">
                            <span class="glyphicon glyphicon-copyright-mark"></span> All Rights reserved.
                        </p>
                    </div>
                </footer>
        </div> <!-- wrapper -->
        
        
        <!-- JavaScript -->
        <!-- ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- jQuery core JS -->
        <script src="' . $wwwroot . '/report/moodleanalyst/js/jquery-1.11.2.js"></script>
        
        <!-- Google Visualization API -->
        <script type="text/javascript" src="'.$googleLibs.'"></script>
        <!-- Include AngularJS -->
        <script src="'.$wwwroot.'/report/moodleanalyst/js/angularlib.js"></script>
        
        
        <!-- Include custom JS -->
        <script id="angularJSloader" src="' . $wwwroot . '/report/moodleanalyst/js/angular.js" wwwroot="' . $wwwroot . '"></script>
        
        
        
        <!-- Bootstrap core JS -->
        <script src="' . $wwwroot . '/report/moodleanalyst/js/bootstrap.min.js"></script>
        
        <!-- Custom JS -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".navbar-nav a").click(function (e) {
                    e.preventDefault();
                });
                
                $(".navbar-brand").click(function (e) {
                    e.preventDefault();
                    $("#myTabList a[href=\"#tabs-1\"]").tab("show");
                });
                
                $("#backtotop").click(function (e) {
                    e.preventDefault();
                    $("html, body").animate({scrollTop: 0}, 800);
                });
            });
        </script>
        
        
    </body>
</html>';