    <div id="main-content" class="site-main-content">
        <div id="home-main-content" class="site-home-main-content">

            <div class="uni-contact">

                <div class="uni-about-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="breadcrumb breadcrumb-search">
                                    <a href="<?php echo( base_url() ); ?>">Home</a>
                                    <a href="<?php echo(base_url() . "index.php/welcome/contact"); ?>" class="active">Contact</a>
                                </div>

                                <div class="uni-about-content">

                                    <div class="uni-contact-form" style="margin-top: -15%">
                                        <div class="form-comment">
                                            <div id="respond" class="comment-respond">
                                                <h3 id="reply-title" class="comment-reply-title">
                                                    Send us an email
                                                </h3>
                                                <?php
														if(!empty($warning)){
																echo("<p>{$warning}</p>");
														}
														
														if(!empty($message)){
																echo("<p>{$message}</p>");
														}
                                                 ?>
												<?php echo validation_errors(); ?>
                                                <form action="<?php echo(base_url() . "index.php/welcome/contact"); ?>" method="post" id="commentform" class="comment-form">
                                                    <div class="row">
                                                        <div class="comment-form-comment form-group col-md-12">
                                                            <textarea required placeholder="Comment..." id="comment" name="comment" class="form-control"><?php echo set_value('comment'); ?></textarea>
                                                        </div>
                                                        <div class="comment-form-author form-group col-md-4">
                                                            <input required placeholder="Name *" id="author" name="author" type="text" value="<?php echo set_value('author'); ?>" class="form-control">
                                                        </div>
                                                        <div class="comment-form-email form-group col-md-4">
                                                            <input required placeholder="Email *" id="email" name="email" type="text" value="<?php echo set_value('email'); ?>" class="form-control">
                                                        </div>
                                                        <div class="comment-form-url form-group col-md-4">
                                                            <input placeholder="Website" id="url" name="url" type="text" value="<?php echo set_value('url'); ?>" class="form-control">
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

                                </aside>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
