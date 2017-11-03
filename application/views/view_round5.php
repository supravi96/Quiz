<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz</title>
    <?php include 'template/all_includes.php';?>
</head>

<body ng-app="App" ng-controller="AppCtrl">
    <div class="container" ng-controller="round5Ctrl">
        <div style="margin-top:90px"></div>        
        <div class="situation">
            <ul class="questions top-margin list-group">
                <li class="list-group-item question-container">
                    <div class="question">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat totam minus numquam placeat. Facere
                        repellendus voluptas repudiandae praesentium? At ut quia adipisci molestiae quos, reprehenderit
                    obcaecati cupiditate beatae magni quod.</div>
                    <div class="clearfix options">
                        <div class="pull-right ">
                            <div class="slidecontainer clearfix">
                                <input type="range" min="0" max="10" value="0" ng-model="slider" class="slider pull-left" id="myRange">
                                <div class="score pull-left">Score:
                                    <span id="sliderValue">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</body>

</html>