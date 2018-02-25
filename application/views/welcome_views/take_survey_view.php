    <div id="main-content" class="site-main-content">
        <div id="home-main-content" class="site-home-main-content">

            <div class="uni-contact">

                <div class="uni-about-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="breadcrumb breadcrumb-search">
                                    <a href="<?php echo( base_url() ); ?>">Home</a>
                                    <a href="<?php echo(base_url() . "index.php/page/surveyOpinion/{$id}"); ?>" class="active">Survey Opinion</a>
                                </div>

                                <div class="uni-about-content">
									<?php											
											$expireDate = strtotime($survey->expire,time());
											$todayDate = time();												
											$surveyDateFormat = date("l jS \of F Y",$expireDate);
											
											if($expireDate <= $todayDate ){
												//the survey has expired 
												redirect('/index.php/welcome/survey', 'survey', 301);// with 301 redirect
											}
									?>
									<p class="text-muted"><i class="fa fa-tag" aria-hidden="true"></i> <?php echo($survey->type); ?> SURVEY (<?php echo(ucfirst($survey->region)); ?>)
										<!--<a class="btn btn-warning" href="<?php echo(base_url() . "page/surveyOpinion/{$survey->id}") ?>">Take Survey <i class="fa fa-group" aria-hidden="true"></i></a>-->
									</p>
									<p style="font-size: 3em"><?php echo($survey->question); ?></p>
									<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted">Expires on <?php echo($surveyDateFormat); ?></span></a>
									<br><br><hr><br>
									<h3>Comments</h3><br>
									<?php
										if(!empty($surveyAnswers)){
											foreach($surveyAnswers as $surveyAnswer){
												$answerDate = strtotime($surveyAnswer->time_added,time());
												$surveyAnswerDateFormat = date("l jS \of F Y",$answerDate);
									?>
											<div class="comments">
												<div class="comment_content">
													<p style="font-size: 0.8em;"><?php echo($surveyAnswer->answer); ?></p>
												</div>
												<p style="color: #fff;"><i class="fa fa-user"></i> <?php echo(ucwords($surveyAnswer->name)); ?>, <i class="fa fa-calendar"></i> <?php echo($surveyAnswerDateFormat	); ?> </p>
											</div><br>
									<?php
											}
										}
									?>
									
									<hr>
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
                                                <form action="<?php echo(base_url() . "index.php/welcome/surveyOpinion/{$id}"); ?>" method="post" id="commentform" class="comment-form">
                                                    <div class="row">
                                                        <div class="comment-form-comment form-group col-md-12">
                                                            <textarea required placeholder="Comment..." required id="comment" name="comment" class="form-control"><?php echo set_value('comment'); ?></textarea>
                                                        </div>
                                                        <div class="comment-form-author form-group col-md-4">
                                                            <input required placeholder="Name *" required id="author" name="author" type="text" value="<?php echo set_value('author'); ?>" class="form-control">
                                                        </div>
                                                        <div class="comment-form-email form-group col-md-4">
                                                            <input required placeholder="Email *" required id="email" name="email" type="email" value="<?php echo set_value('email'); ?>" class="form-control">
                                                        </div>
                                                        <div class="comment-form-url form-group col-md-4">
                                                            <input placeholder="Telephone" name="tel" type="text" value="<?php echo set_value('tel'); ?>" class="form-control">
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
                                            <div class="vk-home-default-right-ad">
												<a href="#" target="_blank"><img src="<?php echo(base_url() . "public_assets/image/side-advert.jpg"); ?>" alt="side advert" title="side advert" class="img-responsive" /></a>
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
