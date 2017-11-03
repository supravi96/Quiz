<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz</title>
    <?php include 'template/all_includes.php';?>
</head>
<body ng-app="App" ng-controller="AppCtrl">
    <div class="container" ng-controller="round1Ctrl">
        <div style="margin-top:90px"></div>
        <div class="round-table-container">
            <div class="panel panel-info">
                <div class="panel-heading forms text-center">
                    <div class="panel-title forms">
                        Qualifier Round
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th width="30%">Team Name</th>
                                <th width="70%">Scores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John</td>
                                <td>
                                    <div class="">
                                        <input class="form-control" type="text">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>
                                    <div class="">
                                        <input class="form-control" type="text">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>
                                    <div class="">
                                        <input class="form-control" type="text">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button class="btn btn-info submit-btn"> Submit Round Score</button>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php base_url();?>includes/js/app.js"></script>
<script src="<?php base_url();?>includes/js/controller/round1.js"></script>
</html>