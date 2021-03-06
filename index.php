<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" ng-app> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Class Project</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet/less" href="less/style.less">
    <script src="js/libs/less-1.3.0.min.js"></script>

    <!-- Use SimpLESS (Win/Linux/Mac) or LESS.app (Mac) to compile your .less files
    to style.css, and replace the 2 lines above by this one:

    <link rel="stylesheet" href="less/style.css">
    -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.0.js"><\/script>')</script>

    <script src="js/libs/bootstrap/bootstrap.min.js"></script>

    <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>

    <script src="js/libs/angular-1.0.1.js"></script>
    <script src="js/controllers.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="chosen/chosen.css" />

  </head>
  <body  ng-controller="mainCtrl">

    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <div class="container-fluid">
      <div class="page-header">
        <span class="pull-right"><a href="#">Admin</a> / <a href="#">Logout</a></span>
        <h1>
          Biomedical Diagnostic System <small>class project prototype</small>
        </h1>
      </div>
      <div class="row-fluid">
        <div class="span2">
          <form class="form-search">
            <h3>Device</h3>
            <select ng-model="deviceSelect" ng-options="c.name group by c.manu for c in devices" ng-change="updateModels()">
              <option value="">-- chose device --</option>
            </select>
            <br>
            <br />
            <h3>Model</h3 >
            <select ng-model="modelSelect" ng-options="c.model for c in models" ng-change="updateErrors()">
              <option value="">-- chose model --</option>
            </select>
            <br />
            <br />
            <h3>Error Code</h3>
            <select ng-model="errorSelect" ng-options="c.error_code for c in errors">
              <option value="">-- chose code --</option>
            </select>
            <br />
            <br />
            <button type="button" class="btn btn-large btn-primary" ng-click="viewError()">View</button>
          </form>
        </div>
        <div class="span10">
          <ul id="myTab" class="nav nav-tabs">
            <li class="active">
              <a href="#add" data-toggle="tab">
                Add Device
                <i class="icon-plus-sign"></i>
              </a>
            </li>
            <li class="">
              <a href="#model2" data-toggle="tab">{{result.manu}}</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active" id="add">
              <form class="form-horizontal" name="addEntryForm">
                <legend>Add a New Device</legend>
                <div class="control-group">
                  <label class="control-label" for="inputManu">Manufacturer</label>
                  <div class="controls">
                    <input type="text" id="inputManu" ng-model="inputManu" placeholder="Manufacturer">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputName">Device Name</label>
                  <div class="controls">
                    <input type="text" id="inputName" ng-model="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputModel">Device Model</label>
                  <div class="controls">
                    <input type="text" id="inputModel" ng-model="inputModel" placeholder="ID">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputErrorCode">Error Code</label>
                  <div class="controls">
                    <input type="text" id="inputErrorCode" ng-model="inputErrorCode" placeholder="Error Code">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputProblem">Meaning of Error Code</label>
                  <div class="controls">
                    <textarea class="span6" id="inputProblem" rows="5" cols="30" ng-model="inputProblem"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputSolution">Problem Solution</label>
                  <div class="controls">
                    <textarea class="span6" id="inputSolution" rows=5 cols=30 ng-model="inputSolution" ></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <button type="submit" class="btn" ng-click='submitNewEntry()'>Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="model2">
              <div class="span6">
                <legend>{{result.name}} <small>{{result.model}}</small></legend>
                <dl>
                  <dt><i class="icon-warning-sign"></i> Error Code</dt>
                  <dd><p class="lead errorText">{{result.error_code}}</p></dd>
                  <dt><i class="icon-question-sign"></i> Meaning of Error Code</dt>
                  <dd><p class="lead descriptionText">{{result.meaning}}</p></dd>
                  <dt><i class="icon-ok-sign"></i> Solution</dt>
                  <dd><p class="lead solutionText">{{result.solution}}</p></dd>
                </dl>
                <br />
                <br />
                <a class="btn" href="#"><i class="icon-thumbs-up"></i> <span style="color:green;">14</span></a>
                <a class="btn" href="#"><i class="icon-thumbs-down"></i> <span style="color:red;">4</span></a>
              </div>
              <div class="span5">
                <legend><small>comments</small></legend>
                <p id='commentBoxP' style='display: none'>
                  <textarea class="span6" id="" rows="5" cols="30" ></textarea>
                  <a href="#" class="btn btn-link" onclick="hideCommentBox()">submit</a>
                </p>
                <p>
                  <a href="#" class="btn btn-link" onclick="showCommentBox()" >add comment</a>
                </p>
                <blockquote>
                  <p>verified</p>
                  <small><cite title="Source Title">Admin</cite> (<a href="#">delete</a>)</small>
                  <br />
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <footer>
      <p></p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
