<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>"> 
    <link rel="icon" href="<?php echo base_url('images/logo/Logo_final.png'); ?>">
	
</head>
<body>

<div class="index-container">

    <div class="homepage">

        <div class="homepage-container">
    
                                                <!--    H   E   A   D   E   R   -->
            <div class="header">
                
                <div class="logo-container">
                    <a href="http://localhost/GitHub/travelagency/index.php/Account/showHomepage">
                        <img src="<?php echo base_url('images/logo/web_logo.png'); ?>" alt="">
                    </a>
                </div>
    
                <div class="list-container">
                    <ul>
                        <li><a href="#aboutUs">About us</a></li>
                        <li><a href="http://localhost/GitHub/travelagency/index.php/Account/redirect_signIn">Tour Packages</a></li>
                        <li><a href="reviews">Reviews</a></li>
                        <li><a href="#contacts">Contacts</a></li>
                        
                        <a href="http://localhost/GitHub/travelagency/index.php/Account/redirect_signIn">
                            <button type="button" class="loginButton" id="headerButton" onclick="sendEmail()">Log in</button>
                        </a>
                        
                    </ul>
                </div>
    
            </div>
    
            <div class="featured-container">
    
                <div class="featured-header-container">
                    <h1>Nusa Penida</h1>
                    <p>Nusa Penida is a picturesque island located southeast of Bali, Indonesia, known for its stunning cliffs, crystal-clear waters, and vibrant marine life. Visitors can explore breathtaking natural attractions such as Kelingking Beach and Angel's Billabong, offering unforgettable experiences amidst unspoiled beauty.</p>
                </div>
    
                <div class="lower-featured-container">
                    <div class="form-container">
                        <form id="form">
                            <input type="text" name="" id="email-textbox" placeholder="Email">
                            <button type="button" class="" onclick="sendEmail()">Send</button>
                        </form>
                    </div>
                    
                    <div class="featured-tour-summary">
                        <p>25,000 PHP — 5 DAYS — 4 NIGHTS</p>
                    </div>
                </div>
    
            </div>
    
        </div>
    
    </div>
    
        
                                <!--    A B O U T u s   -->
    
        <div class="aboutus-container">

            <div class="aboutUs-proper">
                
                <div class="aboutus-header">
                    <h3 id="aboutUs">About us</h3>
                </div>
        
                <div class="ourInfo-container">
                    
                    <div class="companyDescription">
                        <p>At Bedan Travel and Tours, we are more than just a company — we are your dedicated companion in crafting dream vacations. Established with a firm commitment to excellence, we specialize in curating bespoke travel experiences that transcend the ordinary.</p>
						
                        <img id="img1" src="<?php echo base_url('images/asia/bali/pura lempuyang.jpg'); ?>" alt="">
                        <img id="img2" src="<?php echo base_url('images/asia/bali/tanah-lot-bali.jpg'); ?>" alt="">
                        <img id="img3" src="<?php echo base_url('images/asia/bali/Nusa-Penida-Snorkeling-5.jpg'); ?>" alt="">
                    </div>
					
                    <div class="targetAudience">
                        <img id="img4" src="<?php echo base_url('images/asia/ph/2D1NMountPulagHikingandCampingExperience.jpg'); ?>" alt="">
                        <p>Our target customers are diverse adventurers seeking to embark on unforgettable journeys tailored to their unique preferences and interests. Whether you're a solo explorer craving solitude amidst nature's grandeur, a couple yearning for a romantic escape to exotic locales, or a family in search of bonding experiences that create lifelong memories, Bedan Travel and Tours is your ideal partner.</p>
                    </div>
        
                    <div class="additionalCompanyDescription">
                        <p>Behind every exceptional travel experience is a team of dedicated professionals committed to making dreams come true. At Bedan Travel and Tours, our dynamic team comprises individuals who share a passion for exploration, a deep-seated love for travel, and a wealth of expertise in the tourism industry. Led by visionaries Paul Joshua G. Mapula, Jul-Andrei T. Aningalan, John Ariel A. Marquez, Sean Andrei Jeremy Labrador, and Kyle Villa.</p>
                    </div>
                
            </div>
    
            
    
                <div class="visionMission">
                    <h3>Vision and Mission</h3>
                    <p>To become the leading provider of bespoke travel experiences, recognized for our unwavering commitment to excellence, innovation, and personalized service. We envision a world where every traveler's dream vacation becomes a reality, crafted with care and tailored to their unique preferences.</p>
                    <p>At Bedan Travel and Tours, our mission is to inspire and empower travelers to explore the wonders of the world with confidence, curiosity, and authenticity. We strive to:</p>
                    <p id="mission">1. Deliver Exceptional Experiences — We are dedicated to curating unforgettable journeys that exceed our customers' expectations, leaving them with cherished memories that last a lifetime.</p>
                    <p id="mission">2. Provide Personalized Service — We prioritize our customers' needs and preferences, offering tailor-made travel solutions that reflect their individual interests, passions, and desires.</p>
                    <p id="mission">3. Promote Sustainability — We are committed to promoting responsible travel practices that respect local cultures, support environmental conservation, and contribute to the well-being of communities worldwide.</p>
                    <p id="mission">4. Foster Innovation — We continuously seek new ways to enhance the travel experience through innovative technologies, creative partnerships, and forward-thinking strategies.</p>
                    <p id="mission">5. Cultivate Trust and Transparency — We uphold the highest standards of integrity, honesty, and transparency in all our interactions, building lasting relationships based on trust and mutual respect.</p>
                
                </div>
    
                <div class="policies">
                    <h3>Policies</h3>
                    <p>At Bedan Travel and Tours, our commitment to customer satisfaction is unwavering. We ensure that every aspect of our customers' travel experience meets their expectations, and if any concerns arise, we diligently address them to find a satisfactory resolution. Transparency is fundamental to our business ethos, and we provide clear, accurate pricing for our travel packages, free from hidden fees or surcharges. Environmental responsibility is paramount to us, as we strive to minimize our impact on the planet by reducing waste, conserving resources, and supporting initiatives that protect natural habitats and biodiversity. Upholding ethical business practices is non-negotiable for us; we conduct our affairs with integrity, honesty, and respect for laws and regulations. Protecting our customers' privacy and security is paramount, and we implement robust data protection measures to ensure compliance with data privacy laws. Additionally, we are dedicated to continuous improvement, welcoming feedback and suggestions to enhance our services and innovate for the future.</p>
                </div>
                
                
            </div>
    
        </div>

        <!--    R E V I E W S   -->
        <div class="review-container">

            <h3 id="review">Reviews</h3>

            <div class="reviewBehind">

                <a href="">
                    <div class="featuredReview-container">

                        <div class="featuredTextboxReview">                                    
                            <h4>Andrey</h4>

                            <p>— Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis eius consectetur ducimus dolorem modi accusantium, minus tempore, ratione ullam porro sunt, voluptates cupiditate voluptas quas nam temporibus ab eaque fuga.</p>
                        </div>
						
                        <div class="featuredReviewImage-container">
                            <img src="<?php echo base_url('images/reviews/andre.png'); ?>" alt="">
                        </div>
						
                        <div class="featuredReviewNextArrow-container">
                            <img src="https://cdn-icons-png.flaticon.com/512/2989/2989981.png" alt="">
                        </div>

                    </div>
                </a>

            </div>
        </div>
    
    
                 <!--    C O N T A C T S   -->
    
                 <div class="contacts-container">
    
                    <h3 id="contacts">Contacts</h3>
            
                    <div class="contacts-grid-wrapper">
            
                        <div class="calling-card">
            
                            <div class="calling-card-container">
            
                                <h4>Let's talk about your booking!</h4>
            
                                <p id="addDescription">We are here to answer your questions and help you</p>
            
                                <div class="calling-contacts-container">
            
                                    <div class="callThrough" name="ourMobile">
                                        <img src="https://cdn-icons-png.flaticon.com/512/25/25453.png" alt="">
                                        <p>0995 854 1242</p>
                                    </div>
            
                                    <div class="callThrough" name="ourGmail">
                                        <img src="https://cdn-icons-png.flaticon.com/512/542/542689.png" alt="">
                                        <p>bedantnt@gmail.com</p>
                                    </div>
            
                                    <div class="callThrough" name="ourIg">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1384/1384031.png" alt="">
                                        <p>@bedantravelntours</p>
                                    </div>
            
                                    <div class="callThrough" name="ourFb">
                                        <img src="	https://cdn-icons-png.flaticon.com/512/2175/2175193.png" alt="">
                                        <p>Bedan Travel & Tours</p>
                                    </div>
            
                                </div>
            
                            </div>
            
                        </div>
            
            
                        <div class="contacts-form">
            
                            <div class="contacts-form-container">
            
                                <h4>Leave a request for a tour</h4>
            
                                <div class="request-form-container">
            
                                    <div class="form-input-textbox">
                                        <p>Name</p>
                                        <input type="text" id="form-input-textbox" placeholder="" name="requesterName">
                                    </div>
            
                                    <div class="form-input-textbox">
                                        <p>Telephone</p>
                                        <input type="text" id="form-input-textbox" placeholder="" name="requesterTelephone">
                                    </div>
            
                                    <div class="form-input-textbox">
                                        <p>Email</p>
                                        <input type="text" id="form-input-textbox" placeholder="" name="requesterEmail">
                                    </div>
            
                                    <div class="form-input-textbox">
                                        <p>Tour Package</p>
                                        <select id="" placeholder="" name="requesterTourPackage">
                                            <option value="" disabled selected></option>
                                            <option value="uzbekistan-tourValue">Uzbekistan</option>
                                            <option value="siargao-tourValue">Siargao</option>
                                            <option value="jolo-tourValue">Jolo, Sulu</option>
                                            <option value="maldives-tourValue">Maldives</option>
                                            <option value="seychelles-tourValue">Seychelles</option>
                                            <option value="santorini-tourValue">Santorini, Greece</option>
                                            <option value="bali-tourValue">Bali, Indonesia</option>
                                            <option value="siquijor-tourValue">Siquijor, Philippines</option>
                                            <option value="maui-tourValue">Maui, Hawaii</option>
                                            <option value="borabora-tourValue">Bora Bora, French Polynesia</option>
                                        </select>
                                    </div>
            
                                    <div class="form-input-textbox">
                                        <p id="Pdate">Date (Start/end)</p>
                                        <input type="date" id="requesterStartDate" name="requesterStartDate">
                                        <p>&nbsp &nbsp—</p>
                                        <input type="date" id="requesterEndDate" name="requesterEndDate">
                                    </div>
            
                                    <div class="form-input-textbox">
                                        <p id="PnumOfPeople">Number of people</p>
                                        <input type="text" id="form-input-textbox" placeholder="" name="requesterNumOfPeople">
                                    </div>
            
                                </div>
            
                                <button type="submit" id="RequestButton" onclick="">Send</button>
            
                            </div>
            
                        </div>
            
                    </div>
            
                </div>
    
    
                                <!--    F O O T E R   -->
        <div class="footer">
    
            <div class="header">
                
                <div class="logo-container">
                    <a href="http://localhost/travelagency_ci/index.php/Account/showHomepage">
                        <img src="<?php echo base_url('images/logo/Logo_final.png'); ?>" alt="">
                    </a>
                </div>
    
                <div class="list-container">
                    <ul>
                        <li><a href="#aboutUs">About us</a></li>
                        <li><a href="webpages/signInUser.html">Tour Packages</a></li>
                        <li><a href="reviews">Reviews</a></li>
                        <li><a href="#contacts">Contacts</a></li>
                    </ul>
                </div>
    
            </div>
    
        </div>

</div>

</body>
</html>
