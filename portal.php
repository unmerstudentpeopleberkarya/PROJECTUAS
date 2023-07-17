
<style>
	header.masthead{
		background-image: url('<?php echo validate_image($_settings->info('cover')) ?>') !important;
	}
	header.masthead .container{
		background:#0000006b;
	}
</style>
<!-- Masthead-->
<header class="masthead">
	<div class="container">
		
		<div class="masthead-heading text-uppercase">Labuan Bajo</div>
		<a class="btn btn-primary btn-xl text-uppercase" href="#home">Lihat Travel</a>
	</div>
</header>
<!-- Services-->
<section>
	<div class="container">
		<h2 class="text-center">Gallery</h2>				
			<a href="" class=""><img src="images/100.jpg" class="img-responsive" alt="/">
			<a href="" class="swipebox"><img src="images/111.jpg" class="img-responsive" alt="/">
			<a href="" class="swipebox"><img src="images/112.jpg" class="img-responsive" alt="/">
			<a href="" class="swipebox"><img src="images/113.jpg" class="img-responsive" alt="/">
							
	</div>	
</section>
<section class ="page-section bg-dark" id="home">
	<div class ="container">
		<h2 class="text-center">Paket travel & hotel</h2>
	<div class="d-flex w-100 justify-content-center">
		<hr class="border-warning" style="border:3px solid" width="15%">
	</div>
	<div class="row">
		<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() limit 3");
			while($row = $packages->fetch_assoc() ):
				$cover='';
				if(is_dir(base_app.'uploads/package_'.$row['id'])){
					$img = scandir(base_app.'uploads/package_'.$row['id']);
					$k = array_search('.',$img);
					if($k !== false)
						unset($img[$k]);
					$k = array_search('..',$img);
					if($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));

				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count = $review->num_rows;
				$rate = 0;
				while($r = $review->fetch_assoc()){
					$rate += $r['rate'];
				}
				if($rate > 0 && $review_count > 0)
				$rate = number_format($rate/$review_count,0,"");
		?>
			<div class="col-md-4 p-4 ">
				<div class="card w-100 rounded-0">
					<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
					<div class="card-body">
					<h5 class="card-title truncate-1 w-100"><?php echo $row['title'] ?></h5><br>
					<div class=" w-100 d-flex justify-content-start">
						<div class="stars stars-small">
								<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label> 
								<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label> 
								<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label> 
								<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label> 
								<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label> 
						</div>
                    </div>
    				<p class="card-text truncate"><?php echo $row['description'] ?></p>
					<div class="w-100 d-flex justify-content-end">
						<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-warning">Lihat Paket & Hotel <i class="fa fa-arrow-right"></i></a>
					</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<div class="d-flex w-100 justify-content-end">
		<a href="./?page=packages" class="btn btn-flat btn-warning mr-4">Jelajah Paket & Hotel <i class="fa fa-arrow-right"></i></a>
	</div>
	</div>
</section>
<!-- About-->
<section class="page-section" id="about">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">About Us</h2>
		</div>
		<div>
			<div class="card w-100">
				<div class="card-body">
					<?php echo file_get_contents(base_app.'about.html') ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog-posts grid-system">
  <div class="container">
    <div class="all-blog-posts">
      <h2 class="text-center">Petugas Kami</h2>
      <br>
      <div class="row">
        <div class="col-md-4 col-sm-8">
          <div class="blog-post">
            <div class="blog-thumb">
				<a href="" class=""><img src="images/19f5a70d-eb21-4df9-be5e-2060fcd52ba5.jpg" class="img-responsive" alt="/">
            </div>
            <div class="down-content">
              <a href="blog-details.html"><h4>Satrio Adrian Alvi Hariri</h4></a>
              <p>21083000080</p>
			 <ul class="post-info">    
                <a href="https://m.facebook.com/muhamad.roin.58" class="social" target='_BLANK'><i class="fab fa-facebook-f"></i></a> |
                <a href="https://api.whatsapp.com/send?phone=+6281382055381&text=saya ingin melakukan pemesanan." class="social" target='_BLANK'><i class="fab fa-whatsapp"></i></a> |
                <a href="https://twitter.com/RoinMuhamad" class="social" target='_BLANK'><i class="fab fa-twitter"></i></a>
              </ul>
              
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="blog-post">
            <div class="blog-thumb">
				<a href="" class=""><img src="images/WhatsApp Image 2023-07-10 at 13.42.17.jpeg" class="img-responsive" alt="/">
            </div>
            <div class="down-content">
              <a href="blog-details.html"><h4>Paulus Wolo Betan </h4></a>
              <p>21083000060</p>
			  <ul class="post-info">    
                <a href="https://m.facebook.com/muhamad.roin.58" class="social" target='_BLANK'><i class="fab fa-facebook-f"></i></a> |
                <a href="https://api.whatsapp.com/send?phone=+6281382055381&text=saya ingin melakukan pemesanan." class="social" target='_BLANK'><i class="fab fa-whatsapp"></i></a> |
                <a href="https://twitter.com/RoinMuhamad" class="social" target='_BLANK'><i class="fab fa-twitter"></i></a>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="blog-post">
            <div class="blog-thumb">
				<a href="" class=""><img src="images/bfbb41e5-09e4-4739-8748-7f1faa0a4922.jpg" class="img-responsive" alt="/">
            </div>
            <div class="down-content">
              <a href="blog-details.html"><h4>Gregorius Deristho</h4></a>
              
              <p>21083000087</p>
			  <ul class="post-info">    
                <a href="https://m.facebook.com/muhamad.roin.58" class="social" target='_BLANK'><i class="fab fa-facebook-f"></i></a> |
                <a href="https://api.whatsapp.com/send?phone=+6281382055381&text=saya ingin melakukan pemesanan." class="social" target='_BLANK'><i class="fab fa-whatsapp"></i></a> |
                <a href="https://twitter.com/RoinMuhamad" class="social" target='_BLANK'><i class="fab fa-twitter"></i></a>
              </ul>
              
            </div>
          </div>
		  <div class="col-md-4 col-sm-6">
          <div class="blog-post">
            <div class="blog-thumb">
				<a href="" class=""><img src="images/cade67e9-ab1e-4330-87d1-7f7cabc656fd.jpg" class="img-responsive" alt="/">
            </div>
            <div class="down-content">
              <a href="blog-details.html"><h4>Gregorius Alquinus</h4></a>
              
              <p>21083000189</p>
			  <ul class="post-info">    
                <a href="https://m.facebook.com/muhamad.roin.58" class="social" target='_BLANK'><i class="fab fa-facebook-f"></i></a> |
                <a href="https://api.whatsapp.com/send?phone=+6281382055381&text=saya ingin melakukan pemesanan." class="social" target='_BLANK'><i class="fab fa-whatsapp"></i></a> |
                <a href="https://twitter.com/RoinMuhamad" class="social" target='_BLANK'><i class="fab fa-twitter"></i></a>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Contact Us</h2>
			<h3 class="section-subheading text-muted">Kirim pesan kepada kami untuk pertanyaan.</h3>
		</div>
		<!-- * * * * * * * * * * * * * * *-->
		<!-- * * SB Forms Contact Form * *-->
		<!-- * * * * * * * * * * * * * * *-->
		<!-- This form is pre-integrated with SB Forms.-->
		<!-- To make this form functional, sign up at-->
		<!-- https://startbootstrap.com/solution/contact-forms-->
		<!-- to get an API token!-->
		<form id="contactForm" >
			<div class="row align-items-stretch mb-5">
				<div class="col-md-6">
					<div class="form-group">
						<!-- Name input-->
						<input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required />
					</div>
					<div class="form-group">
						<!-- Email address input-->
						<input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
					</div>
					<div class="form-group mb-md-0">
						<input class="form-control" id="subject" name="subject" type="subject" placeholder="Subject *" required />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-textarea mb-md-0">
						<!-- Message input-->
						<textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
					</div>
				</div>
			</div>
			<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Kirim Pesan</button></div>
		</form>
	</div>
</section>
<script>
$(function(){
	$('#contactForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:_base_url_+"classes/Master.php?f=save_inquiry",
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("an error occured",'error')
				end_loader()
			},
			success:function(resp){
				if(typeof resp == 'object' && resp.status == 'success'){
					alert_toast("Inquiry sent",'success')
					$('#contactForm').get(0).reset()
				}else{
					console.log(resp)
					alert_toast("an error occured",'error')
					end_loader()
				}
			}
		})
	})
})
</script>