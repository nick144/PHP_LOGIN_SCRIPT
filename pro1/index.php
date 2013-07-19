<?php
    include('header.php');
?>

<?php 
$username = 'test1';
$obj = new Users;
echo $obj->createUser($username);
?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo APPURL; ?>"><?php echo APPNAME; ?> <?php echo APPVER; ?></a>
          <div class="nav-collapse collapse">
		  <?php if($loggedin) { ?>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
			<?php } ?>
            <form class="navbar-form pull-right" action="<?php echo APPURL; ?>" method="post">
              <input class="span2" type="text" placeholder="Username" name="username">
              <input class="span2" type="password" placeholder="Password" name="password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>