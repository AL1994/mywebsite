  <header>
	<div class="logo f_l">
      <a href="admin/welcome/webIndex"><img src="assets/admin/files/img/logo.png"></a>
    </div>
    <nav class="topnav" id="topnav">
      <a href="admin/welcome/webIndex" id="topnav_current">
        <span>首页</span>
        <span class="en">Protal</span>
      </a>
      <a href="admin/welcome/webAbout">
        <span>关于我</span>
        <span class="en">About</span>
      </a>
      <a href="admin/welcome/webResume">
        <span>My简历</span>
        <span class="en">Resume</span>
      </a>
      <a href="admin/welcome/webRecord">
        <span>日志档</span>
        <span class="en">Record</span>
      </a>
      <a href="admin/welcome/webCloud">
        <span>云标签</span>
        <span class="en">Cloud</span>
      </a>
      <a href="admin/welcome/webGuestbook">
        <span>留言版</span>
        <span class="en">Guestbook</span>
      </a>
      <div id="reg">
        <?php
          $user = $this->session->userdata('user');
          if($user){
            echo "<a href='javascript:;' class='log1'>".$user->username."已登录</a>";
            echo " <a href='admin/admin/login_out' id='logout'>注销</a>";
          }else{
           echo " <a href='javascript:;' onClick=\"laryer_set('500','300','注册','admin/admin/web_register')\" class='reg'>注册</a>
                    <a href='javascript:;' onClick=\"laryer_set('500','300','登录','admin/admin/web_login')\" class='log'>登录</a>";
          }
        ?>


      </div>
    </nav>
  </header>