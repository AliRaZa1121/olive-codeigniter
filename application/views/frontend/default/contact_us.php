<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<section class="contact-section"></section>
<section class="contact-second-fold">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="contact-form-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="contact-title">
                                <h2>Get In Touch</h2>
                                <p>we are here for you! how can we help you?</p>
                            </div>
                            <div class="contact-form">
                                <form action="<?php echo site_url('home/contact_us/submit'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="tel" placeholder="Phone Number" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Message" name="message" required rows="3"></textarea>
                                    </div>
                                    
                                       <?php if(get_frontend_settings('recaptcha_status')): ?>
                                        <div class="form-group">
                                          <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                                        </div>
                                      <?php endif; ?>
                                      
                                    <button class="contact-btn" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="contact-info">
                                
                                <div class="contact-info-detail">
                                    <ul>
                                         <li>
								            <i class="fas fa-phone"></i>
								            <a href="tel:<?php echo get_settings('phone');  ?>"><span><?php echo get_settings('phone');  ?></span></a>
							            </li>
							             <li>
								           <i class="fas fa-envelope"></i>
								           <a href="mailto:<?php echo get_settings('system_email');  ?>"><span><?php echo get_settings('system_email');  ?></span></a>
							            </li>
							              <li>
								            <i class="fas fa-map-marker-alt"></i>
								            <span><?php echo get_settings('address');  ?></span>
							            </li>
                                    </ul>
                                </div>
                                <div class="contact-social-icon">
                                
                                
                                    <ul>
                                        <li>
								            <a href="<?php echo get_frontend_settings('facebook');  ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
							            </li>
                                         <li>
								            <a href="<?php echo get_frontend_settings('twitter');  ?>" class="instagram"><i class="fab fa-instagram"></i></a>
							            </li>
							             <li>
								           <a href="<?php echo get_frontend_settings('linkedin');  ?>"  class="linkedin"><i class="fab fa-linkedin-in"></i></a>
								            
							            </li>
                                    </ul>
                                
                            </div>
                            </div>
                            <div class="contact-form-image">
                                <img class="img-fluid" src="https://olive.minibigcrm.com/uploads/olive-images/log-in.png">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <iframe width="100%" height="300px" src="<?php echo get_settings('address_link');  ?>"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>