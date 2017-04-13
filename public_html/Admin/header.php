<!-------------Admin Navbar-------------------->

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-link"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li class="nav-link"><a href="question.php"><i class="fa fa-question" aria-hidden="true"></i> Questions</a></li>
        <li class="nav-link"><a href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> FAQ</a></li>
        <li class="nav-link"><a href="#aboutId"><i class="fa fa-user" aria-hidden="true"></i> About US</a></li>
        <li class="dropdown nav-link"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-tasks" aria-hidden="true"></i> Rules <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="terms&Conditions.php">Terms & Conditions</a></li>
                <li><a href="paymentMethods.php">Payment Methods</a></li>
                <li><a href="hajjRules.php">Hajj Rules</a></li>
            </ul>
        </li>
        <li class="nav-link"><a href="#contactId"><i class="fa fa-phone" aria-hidden="true"></i> Contact US</a></li>
        <li class="nav-link"><a href="#newsId"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</a></li>
        <li class="nav-link"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<img src="images/header_image.jpg" class="img-responsive" alt="Header Image">