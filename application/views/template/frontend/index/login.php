<style type="text/css">
  body {
  padding-top: 40px;
  padding-bottom: 40px;
  
}

.form-signin {
  max-width: 330px;
  
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
    
    <form class="form-signin" role="form" method="post" action="<?php echo site_url('login/loginprocess'); ?>">
      <input type="text" class="form-control" placeholder="Username" name="username">
      <input type="password" class="form-control" placeholder="Password" name="password">

      <p class="col-lg-12 bg-danger" style="padding:10px;"><?php echo $this->session->flashdata('error'); ?> </p>
      
      <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
    </form>
  
