
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="vk-sec-footer">
                        <div class="container">
                            <div class="row">
                                <div class="vk-footer">
                                    <div class="footer-main-content-element col-sm-4">
                                        <aside class="widget">
                                            <div class="widget-title">
                                                <a href="#"><img src="<?php echo base_url() . "public_assets/"; ?>image/watchers.png"" alt="Watchers" class="img-responsive"></a>
                                            </div>
                                            <div class="widget-content">
                                                <div class="vk-footer-1">

                                                    <div class="vk-footer-1-content">
                                                        <p>
															Simple forum application for VANHACK'S ACCELERATOR PROGRAM (STAGE 2)
                                                        </p>
                                                        <div class="vk-footer-1-address">
                                                            <ul>
                                                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> <span> 16, Ajah Lekki Lagos Nigeria.</span></li>
                                                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <span><a href="mailto:info@governancewatchers.com">info@watchers.com</a></span></li>
                                                                <li><i class="fa fa-headphones" aria-hidden="true"></i> <span> +2348095060650</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="vk-footer-1-icon">
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
                                        </aside>
                                    </div>
                                    <div class="footer-main-content-element col-sm-4">
                                        <aside class="widget">
                                            <h3 class="widget-title"> Latest Topic</h3>
                                            <div class="widget-content">
                                                <div class="vk-footer-2">
                                                    <div class="vk-footer-2-content">
                                                        <ul>
															<?php
																$posts = $this->ApplicationModel->getForumPosts();
																foreach($posts as $post){
																		static $counter = 0;
																		if($counter <= 2){
																			$publishDate = strtotime($post->time_added,time());
																			$publishDateFormat = strftime("%Y/%m/%d",$publishDate);
																			$publishDateFormat2 = date("l jS \of F Y",$publishDate);
															?>
																	<li>
																		<div class="vk-footer-content" style="padding-left: 0px;">
																			<div class="vk-footer-title">
																				<h2><a href="#"><a href="<?php echo(base_url() . "index.php/welcome/viewTopic/{$post->id}/$post->category"); ?>"><?php echo($post->content); ?> </a></a></h2>
																			</div>
																			<div class="vk-footer-time">
																				<div class="time"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo($publishDateFormat2); ?></div>
																			</div>
																		</div>
																		<div class="clearfix"></div>
																	</li>
															<?php
																		}
																		$counter++;
																}	
															?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="footer-main-content-element col-sm-4">
                                        <aside class="widget">
                                            <h3 class="widget-title">Twitter Feed</h3>
                                            <div class="widget-content">
                                                <div class="vk-footer-3">
                                                    <div class="vk-footer-3-content">
                                                        <p>
                                                            <span><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Watchers</a></span>
                                                            Twitter Feed
                                                        </p>
                                                        <div class="time">about 5 days ago</div>

                                                        <p>
                                                            <span><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Watchers</a></span>
                                                            Twitter Feed
                                                        </p>
                                                        <div class="time">about 5 days ago</div>

                                                        <p>
                                                            <span><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Watchers</a></span>
                                                            Twitter Feed
                                                        </p>
                                                        <div class="time">about 5 days ago</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="vk-sub-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="vk-sub-footer-1">
                                            <p>
                                                <span>Watchers</span>
                                                -  Forum & Survey
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-2">
                                        <div class="vk-sub-footer-2">
                                            <ul>
                                                <li><a href="<?php echo(base_url() . "index.php/welcome/contact"); ?>">Contact us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

        <script src="<?php echo base_url() . "public_assets/"; ?>js/jquery-2.0.2.min.js"></script>
        <script src="<?php echo base_url() . "public_assets/"; ?>js/jquery.sticky.js"></script>
        <script src="<?php echo base_url() . "public_assets/"; ?>js/masonry.min.js"></script>
        <script src="<?php echo base_url() . "public_assets/"; ?>js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() . "public_assets/"; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() . "public_assets/"; ?>dist/owl.carousel.js"></script>
        <script src="<?php echo base_url() . "public_assets/"; ?>js/main.js"></script>
        <script src="<?php echo base_url() . "public_assets/"; ?>js/bootstrap-hover-tabs.js"></script>
    </body>
</html>
