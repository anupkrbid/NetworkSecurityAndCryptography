<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Network Security and Crytography</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="images/favicon.ico"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Network Security <span>and Cryptography</span></h1>
				<nav class="codrops-demos">
					<span style="color: #7cbcd6;"><strong>Welcome Back, <span style="color: #0c5978;"> Dealer</span></strong></span>
                    <a href="#" class="current-demo">Dealer Dashboard</a>
                    <a href="#tologin">Log in</a>
                    <a href="#toregister">Sign up</a>
                    <a href="#">Client Details</a>
                    <a href="#">Sign Out&ensp;<i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a>
				</nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <h1>Dealer Dashboard</h1> 
                            <p>
                                Invite Code List
                            </p>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Head 1</th>
                                        <th>Head 2</th>
                                        <th>Head 3</th>
                                        <th>Actions</th>
                                     <!--    <th>Head 5</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Content 1</td>
                                        <td>Content 2</td>
                                        <td>Content 3</td>
                                        <th>&ensp;
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-ban fa-lg" aria-hidden="true"></i></button>
                                        </th>
                                     <!--    <td>Content 5</td> -->
                                    </tr>
                                    <tr>
                                        <td>Content 1</td>
                                        <td>Content 2</td>
                                        <td>Content 3</td>
                                        <th>&ensp;
                                            <a href="#"><button class="btn btn-info btn-xs"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button></a>
                                            <a href="#"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button></a>
                                            <a href="#"><button class="btn btn-danger btn-xs"><i class="fa fa-ban fa-lg" aria-hidden="true"></i></button></a>

                                        </th>
                                        <!-- <td>Content 5</td> -->
                                    </tr>
                                    <tr>
                                        <td>Content 1</td>
                                        <td>Content 2</td>
                                        <td>Content 3</td>
                                        <th>&ensp;
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-ban fa-lg" aria-hidden="true"></i></button>
                                        </th>
<!--                                         <td>Content 5</td> -->
                                    </tr>
                                    <tr>
                                        <td>Content 1</td>
                                        <td>Content 2</td>
                                        <td>Content 3</td>
                                        <th>&ensp;
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-ban fa-lg" aria-hidden="true"></i></button>
                                        </th>
                                        <!-- <td>Content 5</td> -->
                                    </tr>
                                    <tr>
                                        <td>Content 1</td>
                                        <td>Content 2</td>
                                        <td>Content 3</td>
                                        <th>&ensp;
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-ban fa-lg" aria-hidden="true"></i></button>
                                        </th>
                                        <!-- <td>Content 5</td> -->
                                    </tr>
                                    <tr>
                                        <td>Content 1</td>
                                        <td>Content 2</td>
                                        <td>Content 3</td>
                                        <th>&ensp;
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-ban fa-lg" aria-hidden="true"></i></button>
                                        </th>
                                        <!-- <td>Content 5</td> -->
                                    </tr>
                                    <tr>
                                        <td>Content 1</td>
                                        <td>Content 2</td>
                                        <td>Content 3</td>
                                        <th>&ensp;
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-ban fa-lg" aria-hidden="true"></i></button>
                                        </th>
                                       <!--  <td>Content 5</td> -->
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        <div id="register" class="animate form">
                            <form  action="#" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your Name</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="eg. my secure name" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your Email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="eg. mysecuremail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your Password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please Confirm Your Password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your Invite Code </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="text" placeholder="eg. Y8fh8126"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									<strong>Already a Member ?</strong>
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
     <!--    <script type="text/javascript" src="scripts/table.js"></script> -->
    </body>
</html>