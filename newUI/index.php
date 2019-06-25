<?php
include('loginpage.php');

if(isset($_SESSION['login_user'])){
  header("location: profile.php");
}
?>

<html>
<head>
  <script type="text/javascript" src="javascript/jquery-3.3.1.js" ></script>
  <link href="stylesheet/headstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/mainstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/footstyle.css" rel="stylesheet" type="text/css">
  <script>
  $(function(){
    $("#header").load("header.php");
    $("#footer").load("footer.php");
  });
  </script>
</head>
<body>
  <div id="header"></div>
  <div class="midbackground" style="display:inline-block;">
    <hr></hr>
    <div class="mainphotobox">
      <img src="images/mainpage.jpg" style="width:450px; border:5px solid white">
    </div>
    <div class="maintextbox">
      <p class="pheading">
        BfC Software
      </p>
      <p>
      BfC Software
      This is a customised programme developed by HAQ:
      Centre for Child Rights for doing Budget for Children Analysis (BfC).
      It was released by Dr. Syeda Hameed, Member of Planning Commission of India, in November 2010.
      </p>
      <p class="pheading">
        Budget for Children (BfC)
      </p>
      <p>
      Budget for Children (BfC) is an attempt to disaggregate from all government
      (Union/State) allocations made for different programmes and schemes, those made specifically for children.
      </p>
      <p>
      The budget of any government is the most concrete expression of the government's intention,
      policies, priorities, decisions and performance. Hence many groups has been using budget
       as a tool monitor the state performance. Initiatives in budget analysis were undertaken
       in the country at state level with respect to Dalits, the tribal community and rural
       development etc. However, the focus on children was missing from any such analysis.
      </p>
      <p>
      The budget for children work (BfC) in India began in 2000 with a decadal analysis of the Union Budget by HAQ.
      Released in September 11, 2001, HAQ's Budget for Children (BfC) analysis was the first endeavour of its kind
      in the country. The document established the need for such analyses and set the initial direction for developing
      a methodology to do this more effectively. Since then HAQ has been undertaking BfC analysis every year.
      (To know more about BfC visit this page)
      </p>
      <p>
      Along with Union Budget HAQ has also been analysing budgets of the state government in selected states.
      So far it has worked in the states of Andhra Pradesh, Himachal Pradesh, Odisha, West Bengal, Assam, Uttar Pradesh,
      Delhi, Jharkhand and Madhya Pradesh. In the states HAQ works with partner organization and the partnership is based
      on the premises that HAQ build the capacity of the team on the methodology of Budget for Children and assist them
      to develop an advocacy plan to further the issues of children with various stakeholders.
      </p>
      <p>
      With the expansion of budget work, a need was felt to develop a customised programme where reports are automatically
      generated once data is entered and thus reducing the time spent doing manual calculation, and also making the whole
       process much more speedy and effective.
      </p>
      <p>
      With this in mind HAQ decided to develop a customised software.
      After a series of meetings and input sharing with the HAQ team, the software programmers
      (eDimensions Business Support) have been able to develop the BfC Software.
      Since it is the first of its kind, it was a challenge that we had not foreseen when we embarked on it,
      unaware of what it means to design and develop a software programme.
      But we did not give up, after several trials and errors, it is ready.
      </p>
    </div>
    <iframe class="mainvideo" width="560" height="315" src="https://www.youtube.com/embed/tau2BTJUdGE" frameborder="0"
    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
  </div>
  <div id="footer"></div>
</body>
</html>
