		<div id="main-content" class="site-main-content">
			<div id="home-main-content" class="site-home-main-content">

				<div id="vk-home-default-body">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div id="vk-home-default-left">
									<div class="cointainer">
										<div class="uni-sticker-label">
											<div class="label-info">
												<a href="#">
													<img src="<?php echo(base_url() . "public_assets/"); ?>image/icon/fire.png" alt="" class="img-responsive img-gen">
													<img src="<?php echo(base_url() . "public_assets/"); ?>image/fire-red.png" alt="" class="img-responsive img-hover">
													<span class="label-title"><?php $category = strtolower($category); echo(ucwords($category)); ?> Topics</span>
												</a>
											</div>
										</div>
										<?php
											if(!empty($posts)){
												foreach($posts as $post){
														//Translate time_added from timestamp to readable time format
														$publishDate = strtotime($post->time_added,time());
														$publishDateFormat = strftime("%Y/%m/%d",$publishDate);
														$publishDateFormat2 = date("l jS \of F Y",$publishDate);
														
														$category = $this->ApplicationModel->getCategoryByName($post->category); //Post category resultSet
										?>
										
												<div class="col-md-12 home-post-text"><br>
													<h2>
														<a href="<?php echo(base_url() . "index.php/welcome/viewTopic/{$post->id}/{$category->name}"); ?>" >
															<?php echo($post->title); ?> 
														</a>
													</h2><br>
													<p><?php echo($post->content); ?></p>
													<div class="category">
														<a href="<?php echo(base_url() . "index.php/welcome/category/{$category->name}" ); ?>"><?php echo($category->name); ?></a>
													</div><br>
													<!--<a href="<?php echo(base_url() . "blog/{$publishDateFormat}/"); ?>"> Read more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>-->
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
													<h3 class="pull-left text-muted">&nbsp;&nbsp; So sorry, we got noting under  <?php echo $category; ?></h3>
													<div class="clearfix"></div>
											</div>
										<?php		
											}	
										?>
									<div class="clearfix"></div>
									</div>

								</div>
							</div>
							<aside class="col-md-4">
								<aside class="widget-area">

									<aside class="widget">
										<div class="widget-content">
											<div class="vk-home-default-right-ad">
												<a href="#" target="_blank"><img src="<?php echo(base_url() . "public_assets/image/side-advert.jpg"); ?>" alt="side advert" title="side advert" class="img-responsive" /></a>
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
															echo("<li><a href='". base_url() . "blog/categories/" ."'>$category->name</a></li>");
														}
													?>
                                                </ul>
											</div>
										</div>
									</aside>

								</aside>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</div>
