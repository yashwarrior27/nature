
<!-- footer -->
<footer>
  <div class="container-fluid ">
    <div class="row justify-content-center justify-content-md-end bg9">
      <div class="col-10 col-md-7 text-color2 pt-4">
        <h5> <b>QUICK CONTACT</b></h5>
        <p>Please submit your email &amp; phone number and we will get back to you as soon as possible.</p>
        <div class="row pt-4 pb-4 d-none " id="msgsuccess">
          <div class="col-4 col-sm-4">
        
            <div style="text-align: end;"><img src="assets/success-green-check-mark.png" class="imgs" alt=""></div>

          </div>
          <div class="col-8 col-sm-6 text-center pt-2" style="    color: rgba(255,255,255,.5);">
                <h3>Thank You!</h3>
                <h5>Your Submission has been sent.</h5>
          </div>
        </div>
             
          <div class="form-row " id="cform">
            <div class="col-md-6">
              <input type="text" onblur="namerequire()" id="name" class="form-control inpcol border-0" name="name" placeholder="First name:*" style="height: 50px;">
              <span id="nameerror" class="text-danger"></span>
                <div class="form-row mt-2">
                  <div class="col-md-6 mb-2">
                    <input type="email" onblur="emailrequire()" id="email" name="email" class="form-control inpcol border-0" placeholder="Email Address:*" style="height: 50px;">
                    <span id="emailerror" class="text-danger"></span>
                  </div>
                  <div class="col-md-6 mb-2">
                    <input type="number"  onblur="phonerequire()" id="number" name="phone" class="form-control inpcol border-0" placeholder="Phone Number:*" style="height: 50px;">
                    <span id="numbererror" class="text-danger"></span>
                  </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group">
                <textarea class="form-control inpcol border-0" id="msg"  rows="4" name="message" placeholder="Your Message"></textarea>
                <div class="mt-2" style="text-align: end;"><button type="submit" id="submits" name="submits" class="btn fbtn pl-3 pr-3">SEND</button></div>
              </div>
            </div>
          </div>
      </div>
      <script> 
        function  namerequire(){
          let name=document.getElementById("name").value;
          if(name.trim()==""){
            document.getElementById("nameerror").innerHTML="*Name Filed is Required"
            return 0;
          }
          else{ document.getElementById("nameerror").innerHTML="";
            return 1;
          }
        }
        function  emailrequire(){
          let email=document.getElementById("email").value;
          let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(email.trim()==""){
            document.getElementById("emailerror").innerHTML="*Email Filed is Required"
            return 0;
          }
          else if(!email.match(mailformat)){
            document.getElementById("emailerror").innerHTML="*Enter The Correct Email"
            return 0;
          }
          else{ document.getElementById("emailerror").innerHTML="";
            return 1;
          }
        }

        function phonerequire(){
          let phone=document.getElementById("number").value;
          if(phone==""){
            document.getElementById("numbererror").innerHTML="*Phone Filed is Required"
            return 0;
          }
          
          else{ document.getElementById("numbererror").innerHTML="";
            return 1;
          }
          
        }
        document.getElementById("submits").addEventListener('click',function(){
                       let nameval=  namerequire();  
                       let emailval= emailrequire(); 
                       let phoneval = phonerequire();   
                       if(nameval==1 && emailval==1 && phoneval==1){
                        let name=document.getElementById("name").value;
                       let email=document.getElementById("email").value;
                       let number=document.getElementById("number").value;
                       let msg=document.getElementById("msg").value;
                       fetch("contact_us.php",{
                      method:"POST",
                       body:JSON.stringify({
                       'name':name,
                     'email':email,
                  'number':number,
                'msg':msg
              }),
              headers:{
           'Content-type':'application/json; charset=UTF-8',
       },
       }).then((response)=>{return response.text()}).then((data)=>{
         if(data==1){
              document.getElementById("cform").classList.add("d-none");
              document.getElementById("msgsuccess").classList.remove("d-none");
         }
       });
                       }
  
            })



        
      </script>
      <?php
    $q3="SELECT * FROM footer";
    $ans3=mysqli_query($conn,$q3);
    $fdata2=mysqli_fetch_assoc($ans3);
    ?>

      <div class="col-4 d-none d-md-block text-break text-color2 pt-4" style="background-color: rgb(19,19,19)
      ;">
      <?= $fdata2['content']; ?>

      </div>
    </div>
    
    <div class="row pt-3 pb-3 justify-content-center" style="background-color: rgb(14,14,14);">
      <div class=" col-6 col-md-4 order-0 order-md-0">
        <ul class="nav justify-content-md-end" style="padding: 20px;">
          <li class="nav-item">
            <a class="nav-link text-color2 py-0 flink" href="<?= $fdata2['faqlink']; ?>"><?= $fdata2['faq']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-color2 py-0 flink" href="<?= $fdata2['tclink']; ?>" style="border-left: .2px solid rgba(115,115,115,.2);"><?= $fdata2['tc']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-color2 py-0 flink" style="border-left: .2px solid rgba(115,115,115,.2);"  href="<?= $fdata2['pplink']; ?>"><?= $fdata2['pp']; ?></a>
          </li>
        </ul>
      </div>
      <div class="col-6 col-md-4 order-2 order-md-1">
        <img src="assets/<?= $fdata2['image']; ?>"  class="img-fluid mx-auto my-auto d-block " alt="">
        <p class="text-center mb-0" style="font-size: .8em; color: gray;"><?= $fdata2['cr']; ?><br class="none"> All Rights Reserved. </p>

      </div>
      <div class="col-6 col-md-4 order-1 d-flex order-md-2 ">
        <a class="nav-link text-color2 pl-3  pt-4 " href="<?= $hrow['flink']; ?>"><i class="fab fa-facebook-f"></i></a>
        <a class="nav-link text-color2  pl-3 pt-4" href="<?= $hrow['ylink']; ?>"><i class="fab fa-youtube"></i></a>
        <a class="nav-link text-color2  pl-3 pt-4" href="<?= $hrow['llink']; ?>"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
  </div>
  </footer>

</html>
