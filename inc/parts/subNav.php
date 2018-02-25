<?php
  if(Session::Chk('user') == true) {
    $session = Session::GetSession('user');
    $dbInstance = new DB();
    $get = $dbInstance->Get("users", "WHERE u_email = '". $session ."'");
  }
?>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleNavs" aria-controls="toggleNavs" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="toggleNavs">
      <ul class="navbar-nav ml-auto">
        <?php if(!Session::Chk('user')) { ?>
        <li class="nav-item">
          <a href="auth.php?a=login" class="btn btn-primary col-md-12"><i class="fas fa-sign-in-alt mr-1"></i>Login</a>
        </li>
        <li class="nav-item">
          <a href="auth.php?a=register" class="btn btn-outline-light col-md-12"><i class="fas fa-user-plus mr-1"></i>Join</a>
        </li>
        <?php }else if(Session::Chk('user')) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php 
          if($get->u_pic == '') {
          ?>
            <img id="u-spic" src="users/def/u_def.png" class="img-p" alt="">
          <?php
           }else {
          ?>
            <img id="u-spic" src="<?php echo $get->u_pic; ?>" class="img-p" alt="">
          <?php  } ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.php?p=linkCP"><i class="fas fa-address-card"></i> Your Profile</a>
            <a class="dropdown-item" href="profile.php?p=settings"><i class="fas fa-sliders-h"></i> Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php?logout=true"><i class="fas fa-sign-out-alt"></i>LogOut</a>
          </div>
        </li>
        <?php } ?>
      </ul>