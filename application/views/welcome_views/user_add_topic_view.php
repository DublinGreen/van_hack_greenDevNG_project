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
													<span class="label-title"><?php echo($this->session->userdata('username')); ?> add topic</span>
												</a>
											</div>
										</div>									
											<div class="col-md-12 home-post-text"><br>
											  <?php
														if(!empty($warning)){
																echo("<p class='text-warning'>{$warning}</p>");
														}
														
														if(!empty($message)){
																echo("<p class='text-info'>{$message}</p>");
														}
                                                 ?>
												<?php echo validation_errors(); ?>
												
													  <datalist id=addCategoryList>
														<?php 
															$addCategories = $this->ApplicationModel->getForumCategories();	
															
															foreach($addCategories as $addCategory){
																echo("<option label='{$addCategory->name}' value='{$addCategory->name}'>");	
															}
														?>
													</datalist>
												
												<form action="<?php echo(base_url()  . "index.php/welcome/addTopic"); ?>" method="post" id="commentform" class="comment-form">
                                                    <div class="row">
                                                        <div class="comment-form-author form-group col-md-6">
															<span class="lable">Title:</span> 
                                                            <input required="" placeholder="Title*"  name="title" type="text" class="form-control">
                                                        </div>
                                                        <div class="comment-form-email form-group col-md-6">
															<span class="lable">Category:</span> 
															<input required=""  list="addCategoryList" placeholder="Category*"  name="category" type="text" class="form-control">
                                                        </div>
														<div class="comment-form-comment form-group col-md-12">
															<span class="lable">Content:</span> 
                                                            <textarea required="" placeholder="Content.." name="content" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-submit form-group col-md-12">
                                                            <input name="submit" type="submit" class="btn btn-primary" value="Add Topic">
                                                        </div>
                                                    </div>
                                                </form>
												<br><hr><br>
											</div>

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
