		<div id="main-content" class="site-main-content">
			<div id="home-main-content" class="site-home-main-content">

				<div id="vk-home-default-body">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div id="vk-home-default-left">
									<div class="cointainer">
										<div class="uni-sticker-label">
											<?php $category = $this->ApplicationModel->getCategoryByName($post->category); //Post category resultSet ?>
											<div class="label-info">
												<a href="<?php echo(base_url() . "index.php/welcome/category/{$category->name}"); ?>">
													<img src="<?php echo(base_url() . "public_assets/"); ?>image/icon/fire.png" alt="" class="img-responsive img-gen">
													<img src="<?php echo(base_url() . "public_assets/"); ?>image/fire-red.png" alt="" class="img-responsive img-hover">
													<span class="label-title"><?php echo($category->name); ?></span>
												</a>
											</div>
										</div>
										<?php
											if(!empty($post)){
													//Translate time_added from timestamp to readable time format
													$publishDate = strtotime($post->time_added,time());
													$publishDateFormat = strftime("%Y/%m/%d",$publishDate);
													$publishDateFormat2 = date("l jS \of F Y",$publishDate);
													
									?>
									
											<div class="col-md-12 home-post-text"><br>
												<h1 class="text-center">
													<a href="<?php echo(base_url() . "index.php/welcome/viewTopic/{$post->id}/{$category->name}"); ?>" >
														<?php echo($post->title); ?> 
													</a>
												</h1><br>
												<p class="main-topic-paragraph"><?php echo($post->content); ?></p>
												<div class="category">
													<a href="<?php echo(base_url() . "index.php/welcome/category/{$category->name}"); ?>"><?php echo($category->name); ?></a>
												</div><br>
												<div class="time">
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted"><?php echo($publishDateFormat2); ?></span></a>
												</div>
												<br><hr><br>
											</div>
									<?php
											}	
										?>
									<div class="clearfix"></div>
									
									
									</div>
								
									<br>
									<h3>Comments</h3><br>
									<?php
										if(!empty($comments)){
											foreach($comments as $comment){
												$commentDate = strtotime($comment->time_added,time());
												$commentDateFormat = date("l jS \of F Y",$commentDate);
									?>
											<div class="comments">
												<div class="comment_content">
													<p style="font-size: 0.8em;"><?php echo($comment->comment); ?></p>
												</div>
												<p style="color: #fff;"><i class="fa fa-user"></i> <?php echo(ucwords($comment->name)); ?>,  <i class="fa fa-envelope"></i>  <?php echo($comment->email); ?></p>
												<p><i class="fa fa-calendar"></i> <?php echo($commentDateFormat	); ?></p>
											</div><br>
									<?php
											}
										}
									?>
									<div class="clearfix"></div>
									<hr><br><br><br>
                                    <div class="uni-contact-form" style="margin-top: -15%">
                                        <div class="form-comment">
                                            <div id="respond" class="comment-respond">
                                                <h3>
                                                    Tell us what you think?
                                                </h3>
                                                <?php
														if(!empty($warning)){
																echo("<p class='text-warning'>{$warning}</p>");
														}
														
														if(!empty($message)){
																echo("<p class='text-info'>{$message}</p>");
														}
                                                 ?>
												<?php echo validation_errors(); ?>
                                                <form action="<?php echo(base_url() . "index.php/welcome/viewTopic/{$post->id}/{$category->name}/"); ?>" method="post" id="commentform" class="comment-form">
                                                    <input type="hidden" name="post_id" value="<?php echo($post->id); ?>" />
                                                    <div class="row">
                                                        <div class="comment-form-comment form-group col-md-12">
                                                            <textarea required placeholder="Comment..." required id="comment" name="comment" class="form-control"><?php echo set_value('comment'); ?></textarea>
                                                        </div>
                                                        <div class="comment-form-author form-group col-md-6">
                                                            <input required placeholder="Name *" required id="author" name="author" type="text" value="<?php echo set_value('author'); ?>" class="form-control">
                                                        </div>
                                                        <div class="comment-form-email form-group col-md-6">
                                                            <input required placeholder="Email *" required id="email" name="email" type="email" value="<?php echo set_value('email'); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-submit form-group col-md-12">
                                                            <input name="submit" type="submit" id="submit" class="submit" value="Send">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- #respond -->
                                        </div>
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
