<?php include "includes/header.php" ?>



<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p> Rupnagar R/A, Mirpur-2<br> Dhaka-1216, Bangladesh</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="50">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p> sakibulislam285@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
               <p>+8801914603437</p>
            </div>
          </div>

        
        </div>

      </div>
    </section><!-- End Contact Us Section -->







<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="section-title">
                        <h2>Location</h2>
                    </div>
                  <img width="100%" height="auto" src="assets/img/map.PNG" alt="">
    
                </div>
                <div class="col-md-8 mb-4">
                       
                  <form action="contact.php" method="post">
                    <div class="form-group">
                      <label for="email">Enter Your Email:</label>
                      <input type="email" class="form-control" id="email" required placeholder="Enter valid email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="">Enter Your Name:</label>
                      <input type="text" class="form-control" id="" required placeholder="Enter your name" name="names">
                    </div>
                    <div class="form-group">
                      <label for="">Enter Your Contact No:</label>
                      <input type="text" class="form-control" id="" required placeholder="01XXXXXXXXX" name="contact">
                    </div>
                     <div class="form-group">
                      <label for="">Your Massage:</label>
                    <textarea class="form-control" rows="5" name="msg" required id="" placeholder="Write your message here..."></textarea>
                    </div>
                   <input type="submit" class="btn btn-primary" name="send_msg" value="Send Now!">
                 </form>
                </div>
            </div>
    
                 
           
            
        </div>
    </div>
        


</div>

<br><br>


<?php include "includes/footer.php" ?>	