
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
                                    <h2>About my project</h2>
                                    <div class="description">
										<p>
											Hello my name is Bernard Dublin-Green. Let me introduce you to my project, watchers forum is a simple application developed for <strong>VANHACK'S ACCELERATOR PROGRAM STAGE 2 </strong>. 
											<br>It was developed to meet the requirement of the program, which is:
										</p>
										
										<ul>
											<li>Landing page with all Posts;</li>
											<li>Post's category;</li>
											<li>Commenting system;</li>
											<li>Login/Logout with permission to edit only owned Posts/Comments;</li>
										</ul>
										<br>
										<p>Features of watchers forum:</p>
										<ul>
											<li>Landing page with all topic</li>
											<li>About  page</li>
											<li>Topic category</li>
											<li>Topic commenting system</li>
											<li>Contact page</li>
											<li>Survey Q & A</li>
											<li>Survey opinion poll</li>
											<li>Search Topics</li>
										</ul>
										
										<br>
										<p>The application is a PHP application build on Codeigniter framework. Which is a lightweight MVC framework. I tried to make it simple. I didn't use .htaccess file to clean up the url.  I didn't use full text searching for the search.
										 All this was to make the installation and setup of the application easy. The designed was built to fit mobile, tablet and laptop.  I used a database table prefix of van_. 
										 I tried to make it production ready, which is why i added some features not included in the requirements.</p>
										 <p>The installation instruction is inside the readme.md file but i will include it here just incase.</p>
										<br>
										
										<pre>
### Installation
    # REQUIREMENT
    - THE DATABASE ATTACHED TO THE PROJECT
    - PROJECT FILES AND ASSETS

    ------------------------------------------------------

    #DB INSTALL (STEP 1)
    Create a new database then import the project database file. It's called van_hack_forum_db
    I called it van_hack_forum_db because i assume alot of people will name their db (van_hack) or something similar.
    Don't forget to assign a user to the database and please remember the username and password.
    You need it to configure the database for the application.

    #PROJECT FILES (STEP 2)
    Copy all project files to a web accessible folder.

    ### DATABASE CONFIGURATION (STEP 3)
    Configure the db setting. It's located at application/config/database.php
    You change the 

	    'hostname' => 'localhost',
	    'username' => 'root',
	    'password' => '',
	    'database' => 'van_hack_forum_db',

    to match your own database and database user configuration.
										</pre>
										
										<br><hr><br>
										<h3>Login details</h3>
										<p>Username: vanhack</p>
										<p>Password: vanhack</p>
                                    </div>

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
