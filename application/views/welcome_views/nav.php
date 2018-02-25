<body onload="startTime()">
    <!--Load Page-->
    <div class="load-page">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
    <!-- Mobile nav -->
    <nav class="visible-sm visible-xs mobile-menu-container mobile-nav">
        <div class="menu-mobile-nav navbar-toggle">
            <span class="icon-search-mobile"><i class="fa fa-search" aria-hidden="true"></i></span>
            <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </div>
        <div id="cssmenu" class="animated">
            <div class="uni-icons-close"><i class="fa fa-times" aria-hidden="true"></i></div>
            <ul class="nav navbar-nav animated">
                <li class="home-icon"><a href='<?php echo(base_url()); ?>'>Home</a></li>
                <li><a href='<?php echo(base_url() . "index.php/welcome/about"); ?>'>About</a></li>
                <li class="has-sub"><a href='#'>Topics</a>
					<ul>
						<?php
							$postCategories = $this->ApplicationModel->getForumCategories();
							foreach($postCategories as $category){
								echo("<li><a href='". base_url() . "index.php/welcome/category/{$category->name}" ."'>" . strtoupper($category->name) ."</a></li>");
							}
						?>
					</ul>
                </li>
                <li><a href='<?php echo(base_url() . "index.php/welcome/"); ?>'>Survey</a></li>
                <li><a href='<?php echo(base_url() . "index.php/welcome/contact"); ?>'>Contact</a></li>
            </ul>
            <div class="uni-nav-mobile-bottom">
                <div class="form-search-wrapper-mobile">
					<form method="post" action="<?php echo(base_url() . "index.php/welcome/search") ?>">
						<div class="input-group">
							<input required list=searchList  name="q" type="text" class="form-control" placeholder="Search">
							<input type="submit" value="Search" class="btn btn-danger">
						</div>
					</form>
					
				  <datalist id=searchList>
						<?php 
							$searchPosts = $this->ApplicationModel->getForumPosts();	
							$searchCategories = $this->ApplicationModel->getForumCategories();	
							
							foreach($searchPosts as $searchPost){
								echo("<option label='{$searchPost->title}' value='{$searchPost->title}'>");	
							}
							
							foreach($searchCategories as $searchCategory){
								echo("<option label='{$searchCategory->name}' value='{$searchCategory->name}'>");	
							}
						?>
					</datalist>
					
					
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </nav>
    <!-- End mobile menu -->



    <div id="wrapper-container" class="site-wrapper-container">
        <header>
            <div class="vk-header-default">
                <div class="container-fluid">
                    <div class="row">
                        <div class="vk-top-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="vk-top-header-1">
                                            <ul>
                                                <li><a href="<?php echo(base_url() . "index.php/welcome/contact"); ?>"> Contact</a></li>
                                                <li><a href="<?php echo(base_url() . "index.php/welcome/login"); ?>">Login</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="vk-top-header-2">
                                            <ul>
                                                <li><span id="datetime-current"></span></li>
                                                <li>-</li>
                                                <li><span id="year-current"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="vk-top-header-3">
                                            <ul>
                                                <li><a target="_blank" href="<?php echo($social_facebook); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="<?php echo($social_twitter); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="<?php echo($social_google); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="<?php echo($social_instagram); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="<?php echo($social_youtube); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="vk-between-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="vk-between-header-logo">
                                            <a href="<?php echo(base_url() . "index.php/welcome/index"); ?>"><img src="<?php echo base_url() . "public_assets/"; ?>image/watchers.png" alt="" class="img-responsive"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-md-offset-1">
                                        <div class="vk-between-header-banner">
                                            <a href="#"><img src="<?php echo base_url() . "public_assets/"; ?>image/ad_top.jpg" alt="advert" title="top advert" class="img-responsive" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="visible-md visible-lg vk-bottom-header uni-sticky">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="cssmenu">
                                            <ul>
                                                <li class="home-icon"><a href='<?php echo(base_url() ); ?>'><i class="fa fa-home" aria-hidden="true"></i></a>
                                                </li>
                                                <li><a href='<?php echo(base_url() . "index.php/welcome/about/"); ?>'>About</a></li>
												<li class="has-sub"><a href='#'>Topics</a>
													<ul>
														<?php
															$postCategories = $this->ApplicationModel->getForumCategories();
															foreach($postCategories as $category){
																echo("<li><a href='". base_url() . "index.php/welcome/category/{$category->name}" ."'>" . strtoupper($category->name) ."</a></li>");
															}
														?>
													</ul>
												</li>
												<li><a href='<?php echo(base_url() . "index.php/welcome/survey"); ?>'>Survey</a></li>
												<li><a href='<?php echo(base_url() . "index.php/welcome/contact"); ?>'>Contact</a></li>
												
												<?php 
													$authBool = $this->ApplicationModel->authUser(); 
													
													if($authBool){
												?>
													<li class="has-sub"><a href='#'><?php echo($this->session->userdata('username')); ?></a>
														<ul>
															<li><a href='<?php echo(base_url() . "index.php/welcome/userTopics"); ?>'>Topics</a></li>
															<li><a href='<?php echo(base_url() . "index.php/welcome/addTopic"); ?>'>Add Topic</a></li>
															<li><a href='<?php echo(base_url() . "index.php/welcome/logout"); ?>'>Logout</a></li>
														</ul>
													</li>
												<?php
													}
												?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="vk-bottom-header-search toggle-form">
                                            <a href="<?php echo(base_url() . "index.php/welcome/search") ?>">
												<i class="fa fa-search" aria-hidden="true"></i>
											</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Form search-->
                                <div class="form-search-wrapper">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-addon success"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                                
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
