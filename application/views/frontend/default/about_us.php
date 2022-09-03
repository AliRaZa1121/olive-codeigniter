<?php $section_1 = $this->crud_model->get_content_settings('about', 'section-1'); ?>
<style>
section.org-first-fold, section.arc-first-fold {
    background-image: url(<?php echo base_url('uploads/system/' . $section_1['image']); ?>);
   /* min-height: 500px !important;*/
}
.Timeline_One {
  padding: 50px 0 20px;
}
.Timeline_One .Item {
  padding: 0 0px;
  margin-bottom: 50px;
  position: relative;
  color: #fff;
}
.Timeline_One .Item .IconBox {
  width: 48px;
  height: 48px;
  background: #e95b1d;
  border-radius: 50%;
  align-items:center;
  justify-content: center;
  display:flex;
}
.Timeline_One .Item .DescBox {
  margin: 25px 0 0;
}
.Timeline_One .Item .DescBox h4 {
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
}
.Timeline_One .Item .DescBox p {
  font-size: 11px;
}
.Timeline_One .Item .tail {
  position: relative;
   background: rgba(255,255,255,0.15);
   width: 1px;
   height: 50px;
   border-radius: 2px;
}
.Timeline_One .Item:before,
.Timeline_One .Item:after {
  content: "";
  position:absolute;
}
.Timeline_One .Item:before {
  height: 0px;
  bottom: 0px;
  border-bottom:1px solid rgba(255,255,255,0.15);
  width: 80%;
  left: 10%;
}
.Timeline_One .Item:after {
  right: 10%;
  bottom: -3px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #fff;
}
.Timeline_One .Item:first-child:before,
.Timeline_One .Item:last-child:before{
  width: 40%;
  left: 50%;
}


/* TWO */
.Timeline_Two {
  margin: 0 0 50px;
}
.Timeline_Two .Item {
  padding: 0 0 50px;
  position: relative;
}
.Timeline_Two .Item .IconBox {
  width: 48px;
  height: 48px;
  background: #fff;
  border-radius: 50%;
  color: var(--bgColor);
  align-items:center;
  justify-content: center;
  display:flex;
  position:relative;
  margin-top: 5px;
  box-shadow: 6px 8px 5px rgb(0 0 0 / 30%), inset 1px 2px 0px rgb(255 255 255), inset 2px 5px 2px rgb(0 0 0 / 2%);
}
.Timeline_Two .Item .IconBox:before,
.Timeline_Two .Item .IconBox:after {
  position:absolute;
  content: "";
}
.Timeline_Two .Item .IconBox:before {
  background:  var(--bgColor);
  width: 160%;
  height: 160%;
  top: -30%;
  left: -30%;
  border-radius: 50%;
  z-index: -1;
}
.Timeline_Two .Item .IconBox:after {
  bottom: -60%;
  clip-path: ellipse(10% 45% at 50% 50%);
  width: 70px;
  height: 80px;
  background:  var(--bgColor);
  z-index: -1;
}
.Timeline_Two .Item .DescBox {
  margin: 100px 0 0;
}
.Timeline_Two .Item .DescBox h4 {
  position: relative;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  color: var(--bgColor);
}
.Timeline_Two .Item .DescBox h4 {
  position: relative;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  color: var(--bgColor);
  padding:0 20px;
  height: 40px;
  overflow: hidden;
}
.Timeline_Two .Item .DescBox p {
  font-size: 11px;
}
.Timeline_Two .Item .tail {
   position: absolute;
   background: var(--bgColor);
   width: 10px;
   height: 10px;
   border-radius: 5px;
   top: 110px;
   box-shadow: 0px 0px 0px 2px #fff, 0px 0px 0px 4px  var(--bgColor);
}

.Timeline_Two .Item:before {
  content: "";
  position:absolute;
  height: 0px;
  top: 115px;
  border-bottom:1px dashed #cfcfcf;
  width: 100%;
  left: 0%;
}
.Timeline_Two .Item:first-child:before{
  width: 60%;
  left: 50%;
}
.Timeline_Two .Item:last-child:before {
  width: 60%;
  right: 50%;
  left: auto;
}
</style>
<section class="org-first-fold">
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
<section class="category-course-list-area">
    <div class="container">
        <div class="row">
            <div class="col" style="padding: 35px;">
                <?php echo get_frontend_settings('about_us'); ?>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="Timeline_One d-flex justify-content-between align-items-center flex-md-row flex-column">
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

<section class="mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
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
<section class="bg-dark">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12 text-center text-white mt-5">
	            <h3>How we do it.</h3>
	        </div>
	    </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="Timeline_One d-flex justify-content-between align-items-center flex-md-row flex-column">
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

<?php $section = $this->crud_model->get_content_settings('about', 'section-2'); ?>
<section class="org-third-fold">
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