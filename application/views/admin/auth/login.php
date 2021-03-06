<?php extend('admin/base') ?>

<?php startblock('content') ?>

  <div class="container">

    <form class="form-signin" role="form" method ="POST" action="<?php echo base_url('auth/login');?>">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input name='username' type="text" class="form-control" placeholder="Username" required autofocus>
      <input name='password' type="password" class="form-control" placeholder="Password" required>
      <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

  </div> <!-- /container -->
<?php endblock() ?>

<?php end_extend() ?>