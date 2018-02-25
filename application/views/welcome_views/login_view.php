
        <div id="main-content" class="site-main-content">
        <div id="home-main-content" class="site-home-main-content">

            <div class="uni-about">

                <div class="uni-about-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <!--<div class="breadcrumb breadcrumb-search">
                                    <a href="#">Home</a>
                                    <a href="<?php echo(base_url() . "about/"); ?>" class="active">about</a>
                                </div>-->

                                <div class="uni-about-content">
									
									<?php
											if(!empty($warning)){
													echo("<p class='text-warning'>{$warning}</p>");
											}
											
											if(!empty($message)){
													echo("<p class='text-info'>{$message}</p>");
											}
									 ?>
									<?php echo validation_errors(); ?>
									<form action="<?php echo(base_url()); ?>index.php/welcome/login" method="post">
											<div class="row">
												<div class="form-group col-md-6">
													<input required="" placeholder="Username *" name="username" type="text" value="<?php echo set_value('username'); ?>" class="form-control">
												</div>
												<div class="col-md-6">
													<input required="" placeholder="Password *" name="password" type="password" value="<?php echo set_value('password'); ?>" class="form-control">
												</div>
												<div class="form-submit form-group col-md-12">
													<button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Submit</button>
												</div>
											</div>
									</form>
									<br><br>
									
                                    <!-- CONTACT INFORMATION-->
                                    <div class="uni-about-contact-info">
                                        <h2>Contact Infomation</h2>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="uni-about-contact-info-left">
                                                    <ul>
                                                        <li>
                                                            <h4><i class="fa fa-home" aria-hidden="true"></i> Office Address</h4>
                                                            6, Ajah Lekki Lagos Nigeria.<br>
                                                        </li>
                                                        <li>
                                                            <h4><i class="fa fa-envelope" aria-hidden="true"></i> Office Email</h4>
															<p>info@watchers.com</p>
                                                            <p>support@watchers.com</p>
                                                        </li>
                                                        <li>
                                                            <h4><i class="fa fa-phone" aria-hidden="true"></i> Tel</h4>
                                                            <p>+2348095060650</p>
                                                            <p>+2347032090809</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="uni-about-contact-info-right">
                                                    <div class="uni-about-contact-map">
                                                        <iframe class="map" src="https://maps.google.com/maps?q=Ijapo estate akure&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen=""></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <aside class="widget-area">

                                    <aside class="widget">
                                        <div class="widget-content">
                                            <div class="vk-home-default-right-ad">
                                                    <a href="#" target="_blank"><img src="<?php echo(base_url() . "public_assets/image/side-advert.jpg"); ?>" alt="side advert" title="side advert" class="img-responsive" /></a>
                                            </div>
                                        </div>
                                    </aside>

                                    <aside class="widget">
                                        <div class="widget-content">
                                            <div class="vk-home-default-right-facebook">
                                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&amp;tabs=timeline&amp;width=340&amp;height=500&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="340" height="500" style="border:none;overflow:hidden"></iframe>
                                            </div>
                                        </div>
                                    </aside>

                                    <aside class="widget">
                                        <h3 class="widget-title">Stay Connected</h3>
                                        <div class="widget-content">
                                            <div class="vk-home-default-right-stay">
                                                <div class="vk-right-stay-body">
                                                    <a class="btn btn-block btn-social btn-facebook">
                                                        <span class="icon"><i class="fa fa-facebook"></i></span>
                                                        <span class="info"> 2134 Like</span>
                                                        <span class="text">Like</span>
                                                    </a>
                                                    <a class="btn btn-block btn-social btn-twitter">
                                                        <span class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                                        <span class="info"> 13634 Follows</span>
                                                        <span class="text">Follows</span>
                                                    </a>
                                                    <a class="btn btn-block btn-social btn-youtube">
                                                        <span class="icon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                        <span class="info">10634 Subscribers</span>
                                                        <span class="text">Subscribe</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>

                                    <aside class="widget">
                                        <h3 class="widget-title">Tags</h3>
                                        <div class="widget-content">											
                                            <div class="vk-home-default-right-tags">
                                                <ul>
													<?php  
														$postCategories = $this->ApplicationModel->getForumCategories();
														foreach($postCategories as $category){
															echo("<li><a href='". base_url() . "welcome/categories/{$category->name}" ."'>$category->name</a></li>");
														}
													?>
                                                </ul>
                                            </div>
                                        </div>
                                    </aside>

                                </aside>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
x
