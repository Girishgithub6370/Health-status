<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive digital health site </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="doctor2.css">
    
   

</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['submit'])){
                $error="yes";
            }
        }
    ?>
    
<!-- header section starts  -->

<header>

    <a href="#" class="logo"><i >Doctor's Portal</i></a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="Index1.html">home</a>
        <a href="#departments">Departments</a>
        <a href="#cardiology">Cardiology</a>
        <a href="#neurology">Neurology</a>
        <a href="#gynaecology">Gynaecology</a>
        <a href="#dermatology">Dermatology</a>
        <a href="#ent">ENT</a>

        
    </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->
<p><?php if(isset($error)){
    echo "You have no logined to access the doctor's details please login first";
} ?></p>
 <form action="Doctor's_Portal.php" method="post">
            <select name="special" class="select" >
                <option value="select">Searching for doctor</option>
            <option value="orthopadic">orthopadic</option>
            <option value="medicine specialist">medicine specialist</option>
            <option value="surgeon">surgeon</option>
            </select>
            <input type="submit" value="Submit" name="submit">
        </form>
<section class="home" id="home">

    <div class="content">
       
        <h3>Digital Health</h3>
        <p> Today, our health care system has changed dramatically,
             but it’s still too difficult for families in rural America to find quality, affordable health care. 
             And I know many families here in Iowa are worried about even more rural hospitals closing.
             Telemedicine can help  -- and we should streamline licensing and explore how to make that reimbursable under Medicare.</p>
        <a href="#" class="btn">Explore</a>
    </div>

    <div class="images">
        <img src="digital-health-trs.jpg" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- speciality section starts  -->

<section class="departments" id="departments">

    <h1 class="heading"> Doctor<span>of different Departments</span> </h1>

    <div class="box-container">

        <div class="box">
            <img class="image" src="Cardiology.jpg" alt="Cardiology">
            <div class="content">
                <img src="Cardiology2.jpg" alt="Cardiology">
                <h3>Cardiology</h3>
                <p>Cardiology is a medical specialty and a branch of internal medicine concerned with disorders of the heart.
                     It deals with the diagnosis and treatment of such conditions as congenital heart defects, coronary artery disease,
                      electrophysiology, heart failure and valvular heart disease.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="neurology.jpg" alt="Neurology">
            <div class="content">
                <img src="neurology2.jpg" alt="">
                <h3>Neurology</h3>
                <p>Neurology is a branch of medicine dealing with disorders of the nervous system. Neurology deals with the diagnosis and 
                    treatment of all categories of conditions and disease involving the brain, the spinal cord and the peripheral nerves.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="Gyneocology.jpg" alt="Gynaecology">
            <div class="content">
                <img src="Gyneocology2.jpg" alt="Gyneocology">
                <h3>Gynaecology</h3>
                <p>Gynaecology or gynecology is the area of medicine that involves the treatment of women's diseases, especially those of the 
                    reproductive organs. It is often paired with the field of obstetrics, forming the combined area of obstetrics and gynecology.</p>
                
            </div>
        </div>
        <div class="box">
            <img class="image" src="Dermatology.jpg" alt="">
            <div class="content">
                <img src="Dermatology2.jpg" alt="">
                <h3>Dermatology</h3>
                <p>Dermatology is the branch of medicine dealing with the skin. It is a speciality with both medical and surgical aspects.
                   A dermatologist is a specialist medical doctor who manages diseases related to skin, hair, nails, and some cosmetic problems.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="ENT.jpg" alt="">
            <div class="content">
                <img src="ENT2.jpg" alt="">
                <h3>ENT</h3>
                <p>An ear, nose, and throat doctor (ENT) specializes in everything having to do with those parts of the body.
                     They’re also called otolaryngologists.</p>
            </div>
        </div>
        

    </div>

</section>

<!-- speciality section ends -->

<!-- popular section starts  -->

<section class="cardiology" id="cardiology">

    <h1 class="heading"> Popular <span>Cardiology</span> Doctors </h1>

    <div class="box-container">

        <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="AdultCAR.jpg" alt="">
            <h3>Adult Cardiology</h3>
            
            <a href="#" class="btn">Connect</a>
        </div>
        <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="HeartDis.jpg" alt="">
            <h3>Heart Disorder</h3>
            
            <a href="#" class="btn">Connect</a>
        </div>
        <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="cardianArrhy.jpg" alt="">
            <h3>Cardiac Arrhythmia</h3>
            
            <a href="#" class="btn">Connect</a>
        </div>
        <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="Cardiac-Arrest.jpg" alt="">
            <h3>Cardiac Arrest</h3>
            
            <a href="#" class="btn">Connect</a>
        </div>
        

    </div>

</section>

<!-- popular section ends -->

<!-- steps section starts  -->

<div class="neurology">

    <h1 class="heading">Doctors of <span>Neurology</span></h1>

    <section class="steps">

        <div class="box">
            <img src="neurology.jpg" alt="">
            <h3>choose your nation and favorite food</h3>
        </div>
        <div class="box">
            <img src="neurology2.jpg" alt="">
            <h3>free and fast delivery</h3>
        </div>
        <div class="box">
            <img src="neurology.jpg" alt="">
            <h3>easy payments methods</h3>
        </div>
        <div class="box">
            <img src="neurology2.jpg" alt="">
            <h3>and finally, enjoy your food</h3>
        </div>
    
    </section>

</div>

<!-- steps section ends -->

<!-- gallery section starts  -->

<section class="gyneocology" id="gynaecology">

    <h1 class="heading"> Our Doctors in<span> Gynaecology </span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="Gyneocology2.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology2.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology2.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology2.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="Gyneocology2.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>

    </div>

</section>

<!-- gallery section ends -->

<!-- review section starts  -->

<section class="dermatology" id="dermatology">

    <h1 class="heading"> Our Doctors<span>Dermatology</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="Dermatology2.jpg" alt="">
            <h3>Sristi Gupta</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Incredibale services.Highly recommeded</p>
        </div>
        <div class="box">
            <img src="Dermatology.jpg" alt="">
            <h3>Rishi Jain</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>I had a great time eating delicious food with your services.Most importantly ,every food and drink on your menu tasted great!</p>
        </div>
        <div class="box">
            <img src="Dermatology2.jpg" alt="">
            <h3>Kirti Saha</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>One of the best services I have ever experience.You can just give ypur location and will find any type of food at your door step.I will give 6 star for your services</p>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- ent section starts  -->

<section class="ent" id="ent">

    <h1 class="heading"> <span>our</span> ENT Doctors </h1>

    <div class="row">
        
        <div class="image">
            <img src="ENT2.jpg" alt="">
        </div>

        

    </div>

</section>

<!-- order section ends -->

<!-- footer section  -->

<section class="footer">

    <div class="share">
        <a href="#https://www.facebook.com/ritika.mahanta.12" class="btn">facebook</a>
        <a href="#" class="btn">twitter</a>
        <a href="#https://www.instagram.com/ritikamahanta4058/" class="btn">instagram</a>;
        <a href="#" class="btn">pinterest</a>
        <a href="#" class="btn">linkedin</a>
    </div>

    <h1 class="credit"> created by <span> project group members(Pritimayee,Aparna,Ritika) </span> | all rights reserved! </h1>

</section>

<!-- scroll top button  -->
<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

<!-- loader  -->
<div class="loader-container">
    <img src="digital-health.gif" alt="">
</div>
<!-- custom js file link  -->
<script src="Doctor.js"></script>


</body>
</html>