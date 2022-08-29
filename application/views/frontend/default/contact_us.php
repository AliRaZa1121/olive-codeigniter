<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<section class="contact-section"></section>
<section class="contact-second-fold">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-form-box">
                    <div class="row">
                        <div class="col-lg-6">
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
                                        <div class="form-group mt-4 mb-0">
                                          <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                                        </div>
                                      <?php endif; ?>
                                      
                                    <button class="contact-btn" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
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
								            <a href="<?php echo get_frontend_settings('facebook');  ?>"><i class="fab fa-facebook-f"></i></a>
								            
							            </li>
                                         <li>
								            <a href="<?php echo get_frontend_settings('twitter');  ?>"><i class="fab fa-twitter"></i></a>

								            
							            </li>
							             <li>
								           <a href="<?php echo get_frontend_settings('linkedin');  ?>"><i class="fab fa-linkedin-in"></i></a>
								            
							            </li>
                                    </ul>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.5134407337896!2d55.2602652!3d25.185901899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69d09681df43%3A0xc222838ff425a54!2sIris%20Bay%20-%20Business%20Bay%20-%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1661760686376!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>