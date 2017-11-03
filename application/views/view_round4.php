<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz</title>
    <?php include 'template/all_includes.php';?>
</head>

<body ng-app="App" ng-controller="AppCtrl">
    <div class="container" ng-controller="round4Ctrl">
        <div style="margin-top:90px"></div>
        <div class="speedometer">
            <div class="clearfix">
                <div class="pull-right">
                    <span class="timer" ng-model="totalTime">{{totalTime}}</span>
                    <button class="btn btn-info btn-lg" ng-click="startRound()">{{aboutRound}}</button>
                </div>
            </div>
            <ul class="questions top-margin list-group">     
              <!-- <li class="list-group-item question-container" ng-repeat="x in questionSet"> -->
                <li class="list-group-item question-container">
                    <!-- <div class="question">{{x.question}}</div> -->
                    <div class="question">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat totam minus numquam placeat. Facere
                        repellendus voluptas repudiandae praesentium? At ut quia adipisci molestiae quos, reprehenderit obcaecati
                    cupiditate beatae magni quod.</div>

                    <div class="clearfix options">
                        <div class="pull-right">
                            <div class="radio">
                                <label>
                                    <!-- <input type="radio" ng-model="{{x.points}}" value="10" name="optradio">Correct -->
                                    <input type="radio" ng-model="radioValue" value="10" name="optradio">Correct
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" ng-model="radioValue" value="0" name="optradio">Wrong
                                </label>
                            </div>

                            <div class="radio ">
                                <label>
                                    <input type="radio" ng-model="radioValue" value="0" name="optradio">Did not answer
                                </label>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div>
                <button class="btn btn-info btn-lg" ng-click="submit()" type="submit">Submit</button>                
            </div>
        </div>
    </div>

</body>
<script src="<?php base_url();?>includes/js/app.js"></script>
<script src="<?php base_url();?>includes/js/controller/round4.js"></script>
</html>