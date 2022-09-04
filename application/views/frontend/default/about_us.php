<script src="https://kit.fontawesome.com/eea93b01d7.js" crossorigin="anonymous"></script> 
<?php $section_1 = $this->crud_model->get_content_settings('about', 'section-1'); ?>
<style>
section.org-first-fold, section.arc-first-fold {
    background-image: url(<?php echo base_url('uploads/system/' . $section_1['image']); ?>);
   /* min-height: 500px !important;*/
}
</style>

<section class="HeroBanner pb-0 section">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-5">
                <h1 class="mb-4">
                    <span>Building Productive</span>
                    <span class="clr-orange">WOrkforce</span>
                    <span>EMPOWERING</span>
                    <span class="clr-orange">Leadership!</span>
                </h1>
            </div>
            <div class="col-lg-7 d-flex align-items-end justify-content-center">
                <img src="<?php echo base_url(); ?>/assets/frontend/default/img/business-women.png" class="w-100" />
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-center">
            <div class="col-lg-6">
                <h2>
                    About <span>us</span>
                </h2>
                <p>We are a renowned Executive Coaching firm that develops Teams, individuals, and organizations locally and internationally. we have hand-picked our coaches based on their business track records, and different backgrounds but with the same shared values. therefore, we can provide our clients with highly qualified Executive Coaching consultants weather it’s in U.A.E and across the world.</p>
                <p>Coached in a variety of organizations ranging from globally recognized corporations to start-ups. We also understand that our clients have high expectations and that giving up valuable time requires a visible ROI.</p>
                <p>Olive Inc executive coaching consultants thrive at their jobs by keeping things simple while being adaptable to the most complicated, important, and contradictory challenges.</p>
            </div>
            <div class="col-lg-5 mt-5 mt-lg-0 offset-lg-1">
                <div class="ImgBoxContainer">
                    <span class="Figure1"></span>
                    <span class="Figure2"></span>
                    <span class="Figure3"></span>
                    <div class="ImgBox">
                        <img src="<?php echo base_url(); ?>/assets/frontend/default/img/Image14.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-0 section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 px-0" style="background: url('<?php echo base_url(); ?>/assets/frontend/default/img/two-people-training.jpg');background-position: center center;">
            </div>
            <div class="col-lg-6 bg-orange p-5 overflow-hidden position-relative OrangeBox">
                <img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" class="position-absolute" />
                <img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" class="position-absolute" />
                <div class="TXTBox p-lg-5 p-lg-4 p-3 text-white">
                    <h2 class="text-white">Our Core Values</h2>
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fa fa-align-center"></i></span> Alignment</li>
                        <li><span class="fa-li"><i class="fa fa-question"></i></span> Curiosity</li>
                        <li><span class="fa-li"><i class="fa fa-bahai"></i></span> Impact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-logo section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>
                    Who We <span>Serves</span>
                </h2>
            </div>
        </div>
        <div class="row ServiceBox">
            <div class="col-lg-4 mb-4">
                <div class="Item bg-white shadow p-5 pb-3 h-100">
                    <div class="ImgBox overflow-hidden">
                        <img src="<?php echo base_url(); ?>/assets/frontend/default/img/Image18.jpg" />
                        <div class="overlay"></div>
                    </div>
                    <div class="ItemContainer">                        
                        <div class="IconBox mt-3 mb-5">
                            <i class="far fa-chess-king fa-3x"></i>
                        </div>
                        <h5 class="mt-2 mb-3">LEADERS</h5>
                        <p>The main foundation of our Leadership Business Development is to align the outcome between Senior Leaders and CEO/Founder</p>
                    </div>
                </div>                
            </div>
            <div class="col-lg-4 mb-4">
                <div class="Item bg-white shadow p-5 pb-3 h-100">
                    <div class="ImgBox overflow-hidden">
                        <img src="<?php echo base_url(); ?>/assets/frontend/default/img/Image19.jpg" />
                        <div class="overlay"></div>
                    </div>
                    <div class="ItemContainer">
                        <div class="IconBox mt-3 mb-5">
                            <i class="far fa-user fa-3x"></i>
                        </div>
                        <h5 class="mt-2 mb-3">BOARD ADVISORY</h5>
                        <p>Irrespective of how we collaborate with an organization, our main goal is that organization able to get the right leadership. Alignment Strategies</p>
                    </div>
                </div>                
            </div>
            <div class="col-lg-4 mb-4">
                <div class="Item bg-white shadow p-5 pb-3 h-100">
                    <div class="ImgBox overflow-hidden">
                        <img src="<?php echo base_url(); ?>/assets/frontend/default/img/Image20.jpg" />
                        <div class="overlay"></div>
                    </div>
                    <div class="ItemContainer">
                        <div class="IconBox mt-3 mb-5">
                            <i class="far fa-building fa-3x"></i>
                        </div>
                        <h5 class="mt-2 mb-3">ORGANIZATION</h5>
                        <p>Irrespective of how we collaborate with an organization, our main goal is that organization able to get the right leadership. Alignment Strategies</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark pb-250 overflow-hidden section">
    <div class="Fgr1"><img src="<?php echo base_url(); ?>/assets/frontend/default/img/figure6.png" /></div>
    <div class="Fgr2"><img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" /></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="text-white">Our Approach</h2>
                <p class="text-white">Senior Executives require time and space to strategize with a trusted advisor. Our coaching sessions provide you the space, concentration, and confidentiality you need to handle your top priorities while keeping the larger picture in mind. Our Senior Executive Coaching programs are intended to;</p>
            </div>
        </div>
    </div>
</section>
<section class="pt-0 section">
    <div class="container">
        <div class="row">
            <div class="col-12 p-5 shadow-lg bg-white">
                <div class="row">
                    <div class="col-lg-4 border-bottom border-md-end p-5 pb-lg-0">
                        <h3>ADAPT TO <span>SCHEDULES</span></h3>
                        <p>At the most senior levels, time is valuable and scarce. Schedules are crowded yet unpredictable as opportunities and crises emerge.</p>
                        <p>We offer tailored options that carve out the necessary time and space for reflection and visioning while maintaining the flexibility to address emerging situations. C level leaders often appreciate off-hours coaching work, private coaching retreats, and other formats that fit with time and priorities.</p>
                    </div>
                    <div class="col-lg-4 border-bottom border-md-end p-5 pb-lg-0">
                        <h3>ALIGNMENT BETWEEN THE <span>CEO & SENIOR EXECUTIVE</span></h3>
                        <p>The first step towards focusing an entire organization on a single, relevant, and well-understood business strategy is a very strong alignment of the Executive Team</p>
                    </div>
                    <div class="col-lg-4 p-5 pb-0">
                        <h3>GET THE <span>CONTEXT RIGHT</span></h3>
                        <p>Context establishes the stage for coaching. This entails swiftly grasping the leader's stresses, obstacles, and expectations. We invest time upfront learning about the main stakeholders and understanding what is at risk.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-Waves pt-0 section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Our <span>Services</span></h2>
            </div>
        </div>
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-center mt-lg-5 pt-lg-5 pt-3">
            <div class="col-lg-6">
                <h3>
                    ONE TO ONE COACHING FOR SENIOR <span>LEADERS AND EXECUTIVE</span>
                </h3>
                <p>Senior Managers make decision that determines the company's future. which require a full acknowledgment of the complex business world, aligning and fulfilling the vision of the CEO, getting honest feedback, and more.</p>
                <p>We match Leaders with experienced former Senior managers or executives and certified coaches to provide a unique and completely customized approach that helps develop a further and drive performance demanded in today's competitive turbulent and ambiguous environment.</p>
            </div>
            <div class="col-lg-5 offset-lg-1 my-5">
                <div class="ImgBoxContainer">
                    <span class="Figure1"></span>
                    <span class="Figure2"></span>
                    <span class="Figure3"></span>
                    <div class="ImgBox">
                        <img src="<?php echo base_url(); ?>/assets/frontend/default/img/Image15.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark overflow-hidden section">
    <div class="Fgr1"><img src="<?php echo base_url(); ?>/assets/frontend/default/img/figure6.png" /></div>
    <div class="Fgr2"><img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" /></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="text-white">How we do it?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="Timeline_One d-flex justify-content-between align-items-center flex-md-row flex-column overflow-auto">
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Matching</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Chemistry</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Due Deligence</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Leadership Accelerator</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>One-Two-One Mentoring</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Review Regular-Reviews To</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
<section class="bg-Waves pt-0 section">
    <div class="container">        
        <div class="row d-lg-flex flex-lg-row-reverse justify-content-lg-center align-items-lg-center mt-5 pt-5">
            <div class="col-lg-6">
                <h3>
                    TEAM BASED <span>COACHING</span>
                </h3>
                <p>In an age of change, successful strategy execution needs more from leadership teams than ever before. Becoming a REAL TEAM involves trust from all, a focus on what is most important, and dedication to one. That's why we offer Team Coaching.</p>
                <p>our program is mix of lessons and insight from business, sport and the military in a pragmatic strategy that develops and engage a high-performance leadership team that enhance impacts.</p>
            </div>
            <div class="col-lg-5 my-5 offset-lg-1">
                <div class="ImgBoxContainer">
                    <span class="Figure1"></span>
                    <span class="Figure2"></span>
                    <span class="Figure3"></span>
                    <div class="ImgBox">
                        <img src="<?php echo base_url(); ?>/assets/frontend/default/img/Image16.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark overflow-hidden section">
    <div class="Fgr1"><img src="<?php echo base_url(); ?>/assets/frontend/default/img/figure6.png" /></div>
    <div class="Fgr2"><img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" /></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="text-white">How we do it?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="Timeline_One d-flex justify-content-between align-items-center flex-md-row flex-column overflow-auto">
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Framework Development</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Expectation Setting</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Stakeholder Interviews + Survey Activation</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Data Generator</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Candidate Debrief + Action Plan</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Candidate + Manager Alignment</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Exco Development Plannign With HR</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
<section class="bg-Waves pt-0 section">
    <div class="container">        
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-center mt-5 pt-5">
            <div class="col-lg-6">
                <h3>
                    Team Effectiveness <span>Assessment</span>
                </h3>
                <p>A dysfunctional team can generate unneeded disruption, poor delivery, and strategic failure.</p>
                <p>Nowadays, it is nearly difficult to avoid being a team player. If you're not on an official team at work, chances are you're part of one in some manner. Knowing your collaboration skills and shortcomings is critical for your personal and professional development.</p>
                <p>The 360 methods of evaluation used by Olive Inc triangulates previous experience, present company environment, and future aspirations to assist in aligning teams members with organizational goals</p>
                <p>We recognize the significance of an individual's impact in the matrix and investigate where an individual fits into the corporate plan. Finally, team members leave our assessment process with a thorough awareness of the leadership levers that must be pulled to develop their careers and move the needle for the organization.</p>
            </div>
            <div class="col-lg-5 my-5 offset-lg-1">
                <div class="ImgBoxContainer">
                    <span class="Figure1"></span>
                    <span class="Figure2"></span>
                    <span class="Figure3"></span>
                    <div class="ImgBox">
                        <img src="<?php echo base_url(); ?>/assets/frontend/default/img/Image17.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2>How we <span>do it?</span></h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 d-flex overflow-auto">
                <div class="Timeline_Two d-flex justify-content-between align-items-center flex-md-row flex-column">
					<div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #66B9FB;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Initial Planing</h4>
							<p>With Key Sponsors</p>
						</div>
                        <div class="tail"></div>
					</div> 
                    <div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #72DF8E;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Interviews</h4>
							<p>With Team Members</p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #F97757;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Diagnostic Assesment</h4>
							<p>Optional</p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #FFCD63;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Final Planning</h4>
							<p>With Sponsor</p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #FE940D;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Team Based Sessions</h4>
							<p>&nbsp;</p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #F79690;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Debrief</h4>
							<p>With Sponsors</p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #C99DCE;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Follow Up Sessions</h4>
							<p>&nbsp;</p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center" style="--bgColor: #72CDBE;">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Individuals Sessions</h4>
							<p>Optional</p>
						</div>
                        <div class="tail"></div>
					</div>
				</div> 
            </div>
        </div>
    </div>
</section>

<section class="org-first-fold d-none overflow-hidden">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content">
                    <!--h1 class="text-uppercase fw-bold clr-yellow d-none"><?php echo $page_title; ?></h1-->
                    <!-- <h4 class="text-white">Lorem ipsum dolor Lorem ipsum</h4>
                    <p class="text-white mb-1">lorem ipsum</p>
                    <p class="text-white mb-1">Lorem ipsum dolor Lorem ipsum</p>
                    <p class="text-white mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="category-course-list-area d-none">
    <div class="container">
        <div class="row">
            <div class="col" style="padding: 35px;">
                <?php echo get_frontend_settings('about_us'); ?>
            </div>
        </div>
    </div>
</section>

<?php $section = $this->crud_model->get_content_settings('about', 'section-2'); ?>
<section class="org-third-fold section pt-0">
    <div class="border-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="fold-title mb-0">
                        <h2 class="text-uppercase fw-bold clr-black text-center"><?php echo $section['title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center mt-5">
            <div class="col-lg-6">
                <div class="fold-content">
                    <p><?php echo $section['description_1']; ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="fold-thumbnail mt-5">
                    <img class="img-fluid" src="<?php echo base_url('uploads/system/' . $section['image']); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>