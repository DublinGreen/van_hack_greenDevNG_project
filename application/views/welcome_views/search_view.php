
        <div id="main-content" class="site-main-content">
        <div id="home-main-content" class="site-home-main-content">

            <div class="uni-about">

                <div class="uni-about-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                               				
								<h1>Search</h1>
								<p>Input your search below:</p>
								<div class="blog_search">
								<form method="post" action="<?php echo(base_url() . "index.php/welcome/search"); ?>">
									<?php echo validation_errors(); ?>
									<input required list=searchList type="text" name="q" value="<?php echo set_value('q'); ?>" id="q" placeholder="type and hit enter" style="border-radius: 15px;padding-left: 5px;">
									<input type="button" value="Search" class="btn btn-danger">	
								</form>
								<br><hr><br>
								<?php
										if(isset($searchResults)){
												if(!empty($searchResults)){
													foreach($searchResults as $post){
															//Translate time_added from timestamp to readable time format
															$publishDate = strtotime($post->time_added,time());
															$publishDateFormat = strftime("%Y/%m/%d",$publishDate);
															$publishDateFormat2 = date("l jS \of F Y",$publishDate);
															
															$category = $this->ApplicationModel->getCategoryByName($post->category); //Post category resultSet
											?>
											
													<div class="col-md-12 home-post-text"><br>
														<h2>
															<a target="display" href="<?php echo(base_url() . "index.php/welcome/viewTopic/{$post->id}/{$category->name}"); ?>" >
																<?php echo($post->title); ?> 
															</a>
															<?php 
																$comments = $this->ApplicationModel->getForumTopicComments($post->id); 
																$commentTotal = count($comments);
															?>
															<span class="badge"><?php echo($commentTotal); ?></span>
														</h2><br>
														<p><?php echo($post->content); ?></p>
														<div class="category">
															<a target="display" href="<?php echo(base_url() . "index.php/welcome/category/{$category->name}"); ?>"><?php echo($category->name); ?></a>
														</div><br>
														<div class="time">
															<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted"><?php echo($publishDateFormat2); ?></span></a>
														</div>
														<br><hr><br>
													</div>
											<?php
													}
											}else{
													?>	
														<div class="alert alert-warning">
																<img class="img img-responsive pull-left" src="<?php echo(base_url() . "public_assets/image/eyes_gif.gif"); ?>" alt="eye image"/>
																<h3 class="pull-left text-muted">&nbsp;&nbsp; So sorry, we got noting under  <?php echo $searchTerm; ?></h3>
																<div class="clearfix"></div>
														</div>
											<?php
											}
										}
											?>
											
									<div class="clearfix"></div>

									<br><br><hr><br>
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
