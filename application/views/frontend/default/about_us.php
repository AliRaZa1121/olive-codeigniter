<script src="https://kit.fontawesome.com/eea93b01d7.js" crossorigin="anonymous"></script> 
<?php $section_1 = $this->crud_model->get_content_settings('about', 'section-1'); ?>
<style>
section.org-first-fold, section.arc-first-fold {
    background-image: url(<?php echo base_url('uploads/system/' . $section_1['image']); ?>);
   /* min-height: 500px !important;*/
}
.font-14 {
    font-size:14px;
}
.core-image {
    height: 100%; 
    width: auto; 
    margin-right: -12%;
}
@media only screen and (max-width: 992px){
    .core-image {
        height: auto; 
        width: 100%; 
        margin-right: 0%;
    }
    .fa-ul {
        margin: 0px !important;
    }
    .fa-ul li span {
        margin-right: 0px;
    }
}
</style>

<section class="HeroBanner pb-0 section">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6">
                <h1 class="mb-4">
                    <span>Helping</span>
                    <span class="clr-orange">companies</span>
                    <span>to win through</span>
                    <span class="clr-orange">Their People!</span>
                </h1>
            </div>
            <div class="col-lg-6 d-flex align-items-end justify-content-center">
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
                <p>We are a pioneering executive coaching firm that develops teams, individuals, and organisations all around the world, from Dubai to Dublin. </p>
                <p>Our coaches have been hand-picked based on their leadership skills, business acumen and shared values. Coming from various backgrounds, our coaches have worked with individuals and teams in global organisations, start-ups and scaleups – both within the UAE and internationally. </p>
                <p>We support our clients to help their answer this vital question. Why do some organisations get better results than others? The answer has to do with people.</p>
                <p>People are the difference between one company and the next. In our view at Olive Inc, how senior leadership teams approach people is what makes the difference between failure and success. </p>
                <p>‘When the senior leadership team is engaged, align on the vision, direction of the company, values and priorities, they become unstoppable’.</p>
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
<section class="section py-0 bg-Waves">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>
                    Meet the <span>team</span>
                </h2>
            </div>
        </div>
        <div class="row d-flex align-items-stretch">
            <div class="col-lg-6 mt-5 mt-lg-0 mx-auto">
                <div class="card w-100">
                  <div class="card-body p-0">
                    <div class="d-flex flex-column py-4 px-3 w-100 bg-orange text-white">
                        <h5 class="card-title text-center">Trevor Mapondera</h5>
                        <h6 class="text-center">Founder & CEO</h6>
                    </div>
                    <div class="py-4 px-3 w-100" style="text-align: justify; text-justify: inter-word;">
                        <p class="card-text">Trevor’s career started in healthcare as founder and CEO of Catalyst Care Group, a leading provider of home care in the UK. With over 20 years’ experience, he became adept at developing and guiding high-performance leadership teams. As his peers and clients increasingly started asking for his recipe to success, Trevor saw an opportunity to found Olive Inc. </p>
                        <p class="card-text">And so the company was born in 2022 to develop strong leaders, highly aligned teams and a people first culture that creates self-managing businesses.</p>
                        <p class="card-text">Trevor believes in investing in people. Starting with self-awareness and evaluating how each individual impacts others, he uses the business as a vehicle for self-discovery whilst creating incremental value and results through a company’s greatest asset: their people. </p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-0 section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 px-0 overflow-hidden d-lg-flex justify-content-lg-end align-items-lg-center">
                <img src="<?php echo base_url(); ?>/assets/frontend/default/img/two-people-training.jpg" class="core-image" />
            </div>
            <div class="col-lg-6 bg-orange p-5 overflow-hidden position-relative OrangeBox">
                <img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" class="position-absolute" />
                <img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" class="position-absolute" />
                <div class="TXTBox p-lg-5 p-lg-4 p-3 text-white">
                    <h2 class="text-white mb-3">Our Core Values</h2>
                    <p class="text-white">Our Senior Coaching Team enables true alignment for senior leadership to lead as ONE</p>
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fa fa-align-center" aria-hidden="true"></i></span><span> Alignment</span>
                            <p class="text-white font-14 my-3">Ensuring that everyone in the business has clarity of the vision and values</p></li>
                        <li><span class="fa-li"><i class="fa fa-question" aria-hidden="true"></i></span><span> Curiosity</span>
                            <p class="text-white font-14 my-3">Having the constant itch for more knowledge. We look at a problem or process and together, explore a variety of ways to address it</p></li>
                        <li><span class="fa-li"><i class="fa fa-bahai" aria-hidden="true"></i></span><span>Impact</span>
                            <p class="text-white font-14 my-3">Being intentional about making tomorrow different and better for our clients, our business and ourselves</p></li>
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
                        <p>The purpose of our Leadership Business Development is to align on outcome between Senior Leaders and CEO/Founder</p>
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
                        <p>We support changes from the very top by assisting with board evaluation, governance and recruiting new board members</p>
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
                        <p>Irrespective of how we collaborate with an organisation, our main goal is for the company to get the right leadership</p>
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
                <p class="text-white">Senior Executives require time and space to strategise with a trusted advisor.</p>
                <p class="text-white">Our coaching sessions provide you space, concentration, and confidentiality you need to handle your top priorities while keeping the bigger picture in mind.</p>
            </div>
        </div>
    </div>
</section>
<section class="pt-0 section">
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 px-4 p-lg-5 shadow-lg bg-white">
                <div class="row">
                    <div class="col-lg-4 border-bottom border-md-end py-4 px-4 p-lg-5 pb-lg-0">
                        <h3>ADAPT TO <span>SCHEDULES</span></h3>
                        <p>At the most senior levels, time is valuable and scarce. Schedules are crowded yet unpredictable as opportunities and crises emerge.</p>
                        <p>We offer tailored options that carve out the necessary time and space for reflection and visioning while maintaining the flexibility to address emerging situations. C-level leaders often appreciate off-hours coaching work, private coaching retreats, and other formats that fit with time and priorities.</p>
                    </div>
                    <div class="col-lg-4 border-bottom border-md-end py-4 px-4 p-lg-5 pb-lg-0">
                        <h3>ALIGNMENT BETWEEN THE <span>CEO & SENIOR EXECUTIVE</span></h3>
                        <p>The first step towards focusing an entire organisation on a single, relevant, and well-understood business strategy is a very strong alignment of the Senior Leadership Team, Sales,Marketing and Operations. Senior leadership teams come to us to test their alignment and to build a roadmap towards alignment to achieve record impact for their organisations and their people.</p>
                    </div>
                    <div class="col-lg-4 py-4 px-4 p-lg-5 pb-0">
                        <h3>GET THE <span>CONTEXT RIGHT</span></h3>
                        <p>This entails swiftly grasping an individual leader's willingness to learn and be challenged in a healthy way, as well as imparting new knowledge to kickstart a successful coaching partnership.</p>
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
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-center pt-3">
            <div class="col-lg-6">
                <h3>
                    ONE TO ONE COACHING FOR <span>SENIOR LEADERS AND EXECUTIVE</span>
                </h3>
                <p>Senior Managers make decisions that determine the company's future. These require sound knowledge of the complex business world, aligning and fulfilling the vision of the CEO, getting honest feedback, and more.</p>
                <p>We match Leaders with experienced coaches, who will ignite leaders’ journey of self-discovery and maximise their impact through people. We introduce tried and tested tools to improve productivity and achieve scaling of the business.</p>
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
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Chemistry</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Due Deligence</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Leadership Accelerator</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>One-Two-One Mentoring</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Review Regular-Reviews To</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
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
                <p>In an age of increasing complexity, executing a successful strategy is more demanding than ever before. Becoming a high-performance senior leadership team involves trusting each other’s intentions, alignment on what is most important and agreeing to one vision.</p>
                <p>When we create the opportunity for a senior leadership team to share a learning experience and leverage  their own strengths, magic happens. Most senior leaders have never asked their CEO the most important priority for the company for a particular quarter or period of time.  Implementing these little habits have proven to deliver fascinating results.</p>
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
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Expectation Setting</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
                    <div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Stakeholder Interviews + Survey Activation</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Data Generator</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Candidate Debrief + Action Plan</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Candidate + Manager Alignment</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
						</div>
                        <div class="tail"></div>
					</div>
					<div class="Item d-flex align-items-center flex-column text-center">
						<div class="IconBox">
							<i class="fa fa-check"></i>
						</div>
						<div class="DescBox">
							<h4>Exco Development Plannign With HR</h4>
							<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
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
                    TEAM HEALTH <span>ASSESSMENT</span>
                </h3>
                <p>A dysfunctional senior leadership team can generate unneeded disruption, poor delivery and strategic failure. More importantly, it can putt innocent employee’s jobs at risk unnecessarily.</p>
                <p>In most companies the best work and value is delivered through people, but this reliant on effective leadership. Senior leadership must achieve psychological safety, team synergy and a shared vision to unlocking their team’s full potential.</p>
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