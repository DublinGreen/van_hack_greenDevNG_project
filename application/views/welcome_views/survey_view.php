    <div id="main-content" class="site-main-content">
        <div id="home-main-content" class="site-home-main-content">

            <div class="uni-contact">

                <div class="uni-about-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="breadcrumb breadcrumb-search">
                                    <a href="<?php echo( base_url() ); ?>">Home</a>
                                    <a href="<?php echo(base_url() . "index.php/welcome/survey"); ?>" class="active">Survey</a>
                                </div>

                                <div class="uni-about-content">
									   <h3 style="font-size: 2em;" class="text-center"><?php echo($this->appName); ?> Survey</h3><br><hr>
									   <div  style="padding: 3%;">
										   <?php  //echo $this->ApplicationModel->getIP(); ?>
											<ol>
									   <?php
											$surveys = $this->ApplicationModel->getSurvey();
											foreach($surveys as $survey){												
												$expireDate = strtotime($survey->expire,time());
												$todayDate = time();
												$surveyDateFormat = date("l jS \of F Y",$expireDate);
																								
												if($expireDate >= $todayDate ){
													//NOT EXPIRED
													if($survey->type == "OPINION"){
														//OPINION SURVEY
											?>
														<li>
															<p class="text-muted"><i class="fa fa-tag" aria-hidden="true"></i> <?php echo($survey->type); ?> SURVEY (<?php echo(ucfirst($survey->region)); ?>)
															<a class="btn btn-warning" href="<?php echo(base_url() . "index.php/welcome/surveyOpinion/{$survey->id}") ?>">Take Survey <i class="fa fa-group" aria-hidden="true"></i></a></p>
															<p style="font-size: 1.7em"><?php echo($survey->question); ?></p>
															<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted">Expires on <?php echo($surveyDateFormat); ?></span></a>
															<br><hr><br>
														</li>
											<?php			
													}else{
														//Q & A SURVEY
														$surveyOptions = $this->ApplicationModel->getOptionsForSurvey($survey->id);
											?>
														<li>
															<p class="text-muted"><i class="fa fa-tags" aria-hidden="true"></i> Q & A SURVEY (<?php echo(ucfirst($survey->region)); ?>)</p>
															<p style="font-size: 1.7em"><?php echo($survey->question); ?></p>
															<ol style="list-style-type: lower-alpha">
															<?php
																$surveyAnswers = $this->ApplicationModel->getSurveyAnswers($survey->id);
																$surveyAnswersOptionA = $this->ApplicationModel->getSurveyAnswersOptionCount($survey->id,"A");
																$surveyAnswersOptionB = $this->ApplicationModel->getSurveyAnswersOptionCount($survey->id,"B");
																$surveyAnswersOptionC = $this->ApplicationModel->getSurveyAnswersOptionCount($survey->id,"C");
																$surveyAnswersOptionD = $this->ApplicationModel->getSurveyAnswersOptionCount($survey->id,"D");
																
																//calculate percentage for all;
																$A = ($surveyAnswersOptionA->total / count($surveyAnswers))  *  100; $A = round($A);
																$B = ($surveyAnswersOptionB->total / count($surveyAnswers))  *  100; $B = round($B);
																$C = ($surveyAnswersOptionC->total / count($surveyAnswers))  *  100; $C = round($C);
																$D = ($surveyAnswersOptionD->total / count($surveyAnswers)) *  100; $D = round($D);															
																
																$perArray = array($A,$B,$C,$D);
																$maxPer = max($perArray);	
																$minPer = min($perArray);
																
																$this->ApplicationModel->updateSurveyQAndAResults($survey->id,$survey->question,
																		$A,$B,$C,$D);
																																
																if(count($surveyOptions) > 0){
																	foreach($surveyOptions as $surveyOption){
																		$i = $surveyOption->options_slot;
																																				
																		$a = $survey->id;
																		$surveyCookie = $this->session->userdata("governance_watchers_{$a}");
															?>
																	<li>
																		<div class="col-md-7">
																			<?php echo(ucwords($surveyOption->option));  ?>  	
																		</div>
																		<div class="col-md-5">
																			<?php
																				//not mean accept cookie true value and remove option to take survey vote
																				if($surveyCookie != "yes"){
																			?>
																				<a href="<?php echo(base_url() . "index.php/welcome/surveySubmitQANDA/{$survey->id}/{$surveyOption->id}"); ?>" class="btn btn-link" >Vote <?php echo(ucwords($surveyOption->option)); ?> <i class="fa fa-thumbs-up"></i></a>
																				<span class="badge pull-left" <?php echo $maxPer == $$i ? "style='color: #0f0;font-size: 1.5em;margin-bottom: 10px'": ''   ?>  <?php echo $minPer == $$i ? "style='color: #f00;font-size: 1.5em;margin-bottom: 10px'": "style='color: #fff600;font-size: 1.5em;margin-bottom: 10px'"   ?>>
																					<?php echo($$i . "%"); ?>
																				</span>
																			<?php		
																				}else{
																			?>
																				<span class="badge pull-left" <?php echo $maxPer == $$i ? "style='color: #0f0;font-size: 1.5em;margin-bottom: 10px'": ''   ?>  <?php echo $minPer == $$i ? "style='color: #f00;font-size: 1.5em;margin-bottom: 10px'": "style='color: #fff600;font-size: 1.5em;margin-bottom: 10px'"   ?>>
																					<?php echo($$i . "%"); ?>
																				</span>
																			<?php		
																				}
																			?>
																		</div>
																		<div class="clearfix"></div>
																	</li>
															<?php		
																	}
																}
															?>
																<div class="clearfix"></div>
															</ol>
															<p class="text-muted"><i class="fa fa-users"></i> Number of voters (<?php echo(count($surveyAnswers)); ?>)</p>
															<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted">Expires on <?php echo($surveyDateFormat); ?></span></a>
															<br><hr><br>
														</li>												
											<?php		
													}
												?>
									<?php
												}
											}
									   ?>
											</ol>
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
