<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>



<section class="category-course-list-area">
    <div class="container">
        <div class="row mb-3 mt-0">
          <div class="col-md-12 text-center">
            <h1 class="fw-700"><?php echo site_phrase('sign_up'); ?></h1>
            <p class="text-14px"><?php echo site_phrase('sign_up_and_start_learning'); ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block text-center">
            <img class="mt-5" width="80%" src="<?php echo base_url('uploads/olive-images/sign-up.png'); ?>">
            
          </div>
          <div class="col-lg-6">
            <div class="sign-up-form">
              <?php if(get_settings('fb_social_login')) include "facebook_login.php"; ?>
              <form action="<?php echo site_url('login/register'); ?>" method="post" id="sign_up">
                  
                  <input type="hidden"  name="is_instructor" value="0" />
                  
                <div class="form-group">
                  <label for="full_name"><?php echo site_phrase('full_name'); ?></label>
                  <div class="input-group">
                    <span class="input-group-text bg-white" for="full_name"><i class="fas fa-user"></i></span>
                    <input type="text" name="full_name" class="form-control" placeholder="<?php echo site_phrase('full_name'); ?>" aria-label="<?php echo site_phrase('full_name'); ?>" aria-describedby="<?php echo site_phrase('full_name'); ?>" id="full_name" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="username"><?php echo site_phrase('username'); ?></label>
                  <div class="input-group">
                    <span class="input-group-text bg-white" for="username"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="<?php echo site_phrase('username'); ?>" aria-label="<?php echo site_phrase('username'); ?>" aria-describedby="<?php echo site_phrase('username'); ?>" id="username" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="registration-email"><?php echo site_phrase('email'); ?></label>
                  <div class="input-group">
                    <span class="input-group-text bg-white" for="email"><i class="fas fa-user"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="<?php echo site_phrase('email'); ?>" aria-label="<?php echo site_phrase('email'); ?>" aria-describedby="<?php echo site_phrase('email'); ?>" id="registration-email" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="registration-password"><?php echo site_phrase('password'); ?></label>
                  <div class="input-group">
                    <span class="input-group-text bg-white" for="password"><i class="fas fa-user"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="<?php echo site_phrase('password'); ?>" aria-label="<?php echo site_phrase('password'); ?>" aria-describedby="<?php echo site_phrase('password'); ?>" id="registration-password" required>
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="registration-password"><?php echo site_phrase('Phone'); ?></label>
                  <div class="input-group">
                    <input type="tel" class="form-control contact"  name="phone" >
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                     <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                </div>
                

               <div class="form-group">
                   
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="terms" id="terms" value="1" required>
                      <label class="form-check-label" for="inlineRadio2"><a href="<?php echo site_url('home/terms_and_condition') ?>">Terms and Condition</a></label>
                    </div>
                </div>

                <?php if(get_frontend_settings('recaptcha_status')): ?>
                  <div class="form-group mt-4 mb-0">
                    <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                  <button type="submit" class="btn red radius-10 mt-4 w-100"><?php echo site_phrase('sign_up'); ?></button>
                </div>

                <div class="form-group mt-4 mb-0 text-center">
                  <?php echo site_phrase('already_have_an_account'); ?>?
                  <a class="text-15px fw-700" href="<?php echo site_url('home/login') ?>"><?php echo site_phrase('login'); ?></a>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</section>