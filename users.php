<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body style="background: blue;">
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar b<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand py-2 px-4" href="index.html">:)</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="program.php" class="nav-link">Categories</a></li>
            <li class="nav-item  active"><a href="users.php" class="nav-link">Users</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
            <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
            <li class="nav-item"><a href="functions.php" class="nav-link">Functionalities</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section class="hero-wrap js-fullheight" style="background-image: url('images/bg_users.jpg'); height:500px;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread">User profile</h1>
            
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-appointment" style = "height:500px;">
			<div class="overlay"></div>
    	<div class="container-wrap" style = "margin-top:-100px;">
    		<div class="row no-gutters d-md-flex align-items-center" style = "margin-top:-100px;">
    			<div class="col-md-6 d-flex align-self-stretch img" style="background-image: url(images/about-3.jpg);">
    			</div>
	    		<div class="col-md-6 appointment ftco-animate" style = "margin-top:-100px;">
	    			<h3 class="mb-3">Upload Act</h3>
	    			<form action="#" class="appointment-form">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="Act category" id="act_cat" style="width:300px;">
		    				
		    					<input type="text" class="form-control" id="username" placeholder="Username" style="width:300px;">
		    				
	    				
	    				
		    			
		              <input type="text" class="form-control" id="caption" placeholder="Caption" style="width:300px;">
		            </div>
                    </div>
		            <div class="form-group ml-md-4" >
		              <input type="file" id ="upload_file" class="btn btn-primary py-3 px-4" style = "width:250px;">
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Upload Act" id="submit_act" class="btn btn-primary py-3 px-4" onclick="upload();">
		            </div>
	    				</div>
	    			</form>
	    		</div>    			
    		</div>
    	</div>
    <script>
        document.getElementById("submit_act").addEventListener("change", upload)
        function readFile() {
            ele = document.getElementById("upload_file");
          if (ele.files && ele.files[0]) {
            
            var FR= new FileReader();
            
            FR.addEventListener("load", function(e) {
              document.getElementById("upload_file").src       = e.target.result;
                alert(e.target.result);
                //alert(e.target);
                var base = e.target.result;
                alert(base);
                var req = new XMLHttpRequest();
                req.onreadystatechange = function()
                {
                    if(this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                    } else {
                        this.innerHTML = "waste...";
                    }
                }
                
                var d = new Date();
                actid = Math.floor(Math.random() * 10000) + 999;
                localStorage.setItem(actid, base);
                username = document.getElementById('username').value;
                timestamp = d.getFullYear().toString() + '-' + d.getMonth().toString()+'-'+ d.getDate().toString() + ":" + d.getHours().toString() +'-'+ d.getMinutes().toString() +'-'+ d.getSeconds().toString();
                caption = document.getElementById('caption').value;
                cat = caption = document.getElementById('act_cat').value;
                req.open('POST', ' http://127.0.0.1:5000/api/v1/acts ', true);
                req.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=utf-8');
                var sent = {"actId": actid, "username":username, "timestamp": timestamp,"caption":caption ,"categoryName":cat ,"imgB64":base }
                var data = JSON.stringify(sent);
                req.send(data);  
                
            }); 
            
            FR.readAsDataURL( ele.files[0] );
            
          }
          
        }
        
   
        
        function upload(){
        
        readFile();
        
      }
        
</script>	
    	
    </section>
    
    
    
    
    <br>
    <br>
    <section class="ftco-appointment" style = "height:500px;">
			<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch img" style="background-image: url(images/add_user.jpg);height:500px;margin-top:0px;">
    			</div>
	    		<div class="col-md-6 appointment ftco-animate">
	    			<h3 class="mb-3">Add user</h3>
	    			<form action="#" class="appointment-form">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input id = "name" type="text" class="form-control" placeholder="unique username">
		    				</div>
		    				<div class="form-group">
		    					<input id = "password" type="text" class="form-control" placeholder="password">
		    				</div>
	    				</div>
	    			
		            
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Add user" class="btn btn-primary py-3 px-4" id="btn-post" onclick="do_ajax();">
		            </div>
	    				</div>
	    			</form>
	    		</div>    			
    		</div>
    	</div>
    	
    	<script type="text/javascript">
      function do_ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function()
        {
          if(this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
          } else {
            result.innerHTML = "waste...";
          }
        }
        
        var pass = document.getElementById('password').value;
        pass = SHA1(pass);
        alert(pass);
        req.open('POST', ' http://127.0.0.1:5000/api/v1/users ', true);
        req.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=utf-8');
        var sent = {"username": document.getElementById('name').value, "password":pass}
        var data = JSON.stringify(sent);
        req.send(data);
        
      }
      
      /**
* Secure Hash Algorithm (SHA1)
* http://www.webtoolkit.info/
**/
function SHA1(msg) {
 function rotate_left(n,s) {
 var t4 = ( n<<s ) | (n>>>(32-s));
 return t4;
 };
 function lsb_hex(val) {
 var str='';
 var i;
 var vh;
 var vl;
 for( i=0; i<=6; i+=2 ) {
 vh = (val>>>(i*4+4))&0x0f;
 vl = (val>>>(i*4))&0x0f;
 str += vh.toString(16) + vl.toString(16);
 }
 return str;
 };
 function cvt_hex(val) {
 var str='';
 var i;
 var v;
 for( i=7; i>=0; i-- ) {
 v = (val>>>(i*4))&0x0f;
 str += v.toString(16);
 }
 return str;
 };
 function Utf8Encode(string) {
 string = string.replace(/\r\n/g,'\n');
 var utftext = '';
 for (var n = 0; n < string.length; n++) {
 var c = string.charCodeAt(n);
 if (c < 128) {
 utftext += String.fromCharCode(c);
 }
 else if((c > 127) && (c < 2048)) {
 utftext += String.fromCharCode((c >> 6) | 192);
 utftext += String.fromCharCode((c & 63) | 128);
 }
 else {
 utftext += String.fromCharCode((c >> 12) | 224);
 utftext += String.fromCharCode(((c >> 6) & 63) | 128);
 utftext += String.fromCharCode((c & 63) | 128);
 }
 }
 return utftext;
 };
 var blockstart;
 var i, j;
 var W = new Array(80);
 var H0 = 0x67452301;
 var H1 = 0xEFCDAB89;
 var H2 = 0x98BADCFE;
 var H3 = 0x10325476;
 var H4 = 0xC3D2E1F0;
 var A, B, C, D, E;
 var temp;
 msg = Utf8Encode(msg);
 var msg_len = msg.length;
 var word_array = new Array();
 for( i=0; i<msg_len-3; i+=4 ) {
 j = msg.charCodeAt(i)<<24 | msg.charCodeAt(i+1)<<16 |
 msg.charCodeAt(i+2)<<8 | msg.charCodeAt(i+3);
 word_array.push( j );
 }
 switch( msg_len % 4 ) {
 case 0:
 i = 0x080000000;
 break;
 case 1:
 i = msg.charCodeAt(msg_len-1)<<24 | 0x0800000;
 break;
 case 2:
 i = msg.charCodeAt(msg_len-2)<<24 | msg.charCodeAt(msg_len-1)<<16 | 0x08000;
 break;
 case 3:
 i = msg.charCodeAt(msg_len-3)<<24 | msg.charCodeAt(msg_len-2)<<16 | msg.charCodeAt(msg_len-1)<<8 | 0x80;
 break;
 }
 word_array.push( i );
 while( (word_array.length % 16) != 14 ) word_array.push( 0 );
 word_array.push( msg_len>>>29 );
 word_array.push( (msg_len<<3)&0x0ffffffff );
 for ( blockstart=0; blockstart<word_array.length; blockstart+=16 ) {
 for( i=0; i<16; i++ ) W[i] = word_array[blockstart+i];
 for( i=16; i<=79; i++ ) W[i] = rotate_left(W[i-3] ^ W[i-8] ^ W[i-14] ^ W[i-16], 1);
 A = H0;
 B = H1;
 C = H2;
 D = H3;
 E = H4;
 for( i= 0; i<=19; i++ ) {
 temp = (rotate_left(A,5) + ((B&C) | (~B&D)) + E + W[i] + 0x5A827999) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=20; i<=39; i++ ) {
 temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=40; i<=59; i++ ) {
 temp = (rotate_left(A,5) + ((B&C) | (B&D) | (C&D)) + E + W[i] + 0x8F1BBCDC) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=60; i<=79; i++ ) {
 temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 H0 = (H0 + A) & 0x0ffffffff;
 H1 = (H1 + B) & 0x0ffffffff;
 H2 = (H2 + C) & 0x0ffffffff;
 H3 = (H3 + D) & 0x0ffffffff;
 H4 = (H4 + E) & 0x0ffffffff;
 }
 var temp = cvt_hex(H0) + cvt_hex(H1) + cvt_hex(H2) + cvt_hex(H3) + cvt_hex(H4);

 return temp.toLowerCase();
}
    </script>
    	
    </section>
    <br>
    <br>
    <section class="ftco-appointment" style = "height:500px;">
			<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch img" style="background-image: url(images/rmusr.png);width:500px;margin-top:0px;">
    			</div>
	    		<div class="col-md-6 appointment ftco-animate">
	    			<h3 class="mb-3" style="margin-top=-1000px;">Remove user</h3>
	    			<form action="#" class="appointment-form">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input id = "delname" type="text" class="form-control" placeholder="unique username">
		    				</div>
	    			
		            
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Remove user" class="btn btn-primary py-3 px-4" id="btn-post" onclick="do_delete();">
		            </div>
	    				</div>
	    			</form>
	    		</div>    			
    		</div>
    	</div>
    	
    	<script type="text/javascript">
      function do_delete() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function()
        {
          if(this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
          } else {
            result.innerHTML = "waste...";
          }
        }
        
        url = ' http://127.0.0.1:5000/api/v1/users/'+document.getElementById('delname').value
        req.open('DELETE',url, true);
        req.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=utf-8');
        var sent = {}
        var data = JSON.stringify(sent);
        req.send(data);
        
      }
    </script>
    	
    </section>


    <section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	
            <h2 class="mb-1">Top Users</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-lg-3 d-flex">
    				<div class="coach align-items-stretch">
	    				<div class="img" style="background-image: url(images/person_1.jpg);"></div>
	    				<div class="text bg-white p-4 ftco-animate">
	    					<h3><a href="#">Tiger</a></h3>
	    					<p>This would be actually replaced by users text.</p>
	    					<ul class="ftco-social-media d-flex mt-4">
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a></li>
	              </ul>
	    					<p></p>
	    				</div>
	    			</div>
    			</div>
    			<div class="col-lg-3 d-flex">
    				<div class="coach d-md-flex flex-column-reverse align-items-stretch">
	    				<div class="img" style="background-image: url(images/person_4.jpg);"></div>
	    				<div class="text bg-white p-4 ftco-animate">
	    					
	    					<h3><a href="#">Appu</a></h3>
	    					<p>This would be actually replaced by users text.</p>
	    					<ul class="ftco-social-media d-flex mt-4">
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a></li>
	              </ul>
	    					<p></p>
	    				</div>
	    			</div>
    			</div>
    			<div class="col-lg-3 d-flex">
    				<div class="coach align-items-stretch">
	    				<div class="img" style="background-image: url(images/person_3.jpg);"></div>
	    				<div class="text bg-white p-4 ftco-animate">
	    					
	    					<h3><a href="#">Zebra</a></h3>
	    					<p>This would be actually replaced by users text.</p>
	    					<ul class="ftco-social-media d-flex mt-4">
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a></li>
	              </ul>
	    					<p></p>
	    				</div>
	    			</div>
    			</div>
    			<div class="col-lg-3 d-flex">
    				<div class="coach d-md-flex flex-column-reverse align-items-stretch">
	    				<div class="img" style="background-image: url(images/person_2.jpg);"></div>
	    				<div class="text bg-white p-4 ftco-animate">
	    					
	    					<h3><a href="#">Panda</a></h3>
	    					<p>This would be actually replaced by users text.</p>
	    					<ul class="ftco-social-media d-flex mt-4">
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a></li>
	                <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a></li>
	              </ul>
	    					<p></p>
	    				</div>
	    			</div>
    			</div>

    			
    		</div>
    	</div>
    </section>

    

    <footer class="ftco-footer ftco-section img">
      <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have any Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">PES university, Bangalore</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">9999900000</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@selfielessacts.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
