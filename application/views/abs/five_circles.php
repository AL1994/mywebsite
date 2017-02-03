<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>奥运五环</title>
<style type="text/css"> 
.round, .round:after{
    border-width:10px;
    border-style:solid;
    border-color:transparent;
    width:140px;
    height:140px;
    border-radius:100px;
    position:absolute;
}
.round:after{
    left:-10px;
    top:-10px;
    content:"";
}
.blue {
    border-color:blue;
    border-right-color:transparent;
}
.blue:after {
    border-right-color:blue;
    z-index:1;
}
.yellow {
    border-color:yellow;
    left:180px;
    border-right-color:transparent;
}
.yellow:after {
    border-right-color:yellow;
    z-index:1;
}
.red {
    border-color:red;
    left:360px;
    border-left-color:transparent;
}
.red:after {
    border-left-color:red;
    z-index:-1;
}
.green {
    border-color:green;
    top:80px;
    left:90px;
    border-right-color:transparent;
}
.green:after {
    border-right-color:green;
    z-index:-1;
}
.black {
    border-color:black;
    top:80px;
    left:270px;
    border-right-color:transparent;
}
.black:after {
    border-right-color:black;
    z-index:-1;
}​
</style>   
</head> 
<body> 
<div class="round blue"></div>
<div class="round yellow"></div>
<div class="round red"></div>
<div class="round green"></div>
<div class="round black"></div>​
</body> 
</html> 