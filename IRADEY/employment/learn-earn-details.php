<?php /*Template Name: Learn & Earn Details */ 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$sector = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $sector= $wp_query->query_vars['flag']; $sector = str_replace('-',' ',$sector);}

if($sector=='Humanities ') $sector='Humanities (Soft Skills)';

if($sector=='' && $_POST['sector']=='')
{  
  wp_redirect(site_url());
  exit; 
}
if(!empty($sector)) $_POST['sector']=$sector;

?>
<?php get_header(); 
//$sector_name = $_POST['sector'];
$page_data = get_page_by_path( 'learn-and-earn-details' );
$logo_image = get_field( "logo", $page_data->ID );
?>
<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php if($_POST['sector']!='') echo $_POST['sector']; else echo 'Learn and Earn';?></h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Employment</a></li>
        <li class="breadcrumb-item "><a href="#">Learn and Earn </a></li>
        <?php if($_POST['sector']!=''){?>
          <li class="breadcrumb-item active"><?php echo $_POST['sector'];?></li>
        <?php }?>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <?php if ($_POST['sector']=='Agriculture') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/agriculture.png"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">"If you give me rice, I'll eat today. If you teach me how to grow rice, I'll eat everyday." - Mahatma Gandhi. Among the four sectors of Indian Economy, Agriculture is the primary source of livelihood for about 58% of India’s population. It is one of the major sector growing in the country since decades. Fruit and Vegetable production, Gardenig, Fisheries, Bee cultivation for honey production, cultivation of Medicinal plants etc are all included under agriculture as a whole. In this filled, there is a huge demand for both skilled and unskilled labours. This sector encourages the farmers to upgrade self with the modern techniques and process needed for farming. With Government of India's focus on developing Northeast as hub of organic cultivation. It brings an enormous opportunities for agripreneurs in production through cultivation. Under Learn and Earn, let's gear up and explore Agriculture in India as well as in North-east India. </p>


            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Travel and Tourism') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/Travel-and-Tourism.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">According to WTTC, India ranked 10th among 185 countries in terms of travel & tourism's total contribution to GDP in 2019, which opens huge market in India, offering a diverse portfolio of niche tourism products - adventure, medical, sports, eco-tourism, film, rural and religious tourism. North East India particularly has huge potential for this sector- from the untouched snowy mountain caps to lush green fields, we have it all here. Diploma in Travel & Tourism courses gives you in-depth knowledge to thrive in the tourism industry by teaching business concepts specific to the field. The field of travel and tourism deals with taking care of tourists, hospitality management, travel management, tour management, etc. It offers diverse job opportunities- Travel Analyst, Management Trainee, Travel Consultant, Travel Agent, Travel Sales Consultant, and many more !
Explore deep into the wide range of training institutes available in our Learn and Earn segment and discover your untapped potential !</p>


            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Animal Husbandry') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/animal_husbandry.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">A large number of Indian farmers depend upon animal husbandry for their livelihood. Globally the scope of animal husbandry is quite extensive. This sector encourages the farmers to upgrade self with the modern techniques and process needed for farming. There are ample jobs in this field like supplying of meat, egg, milk, wool, etc. The animal husbandry plays a vital role in increasing Indian economy. Animal husbandry is the branch of agriculture science. Animal husbandry professionals can run their own farms. One can also find work in more specialized areas. Under such an area farm professionals are responsible for breeding, marketing and caring for the animals on the farm. Under this Learn and Earn segment, let's gear up and explore Animal husbandry in India and particularly in the North-eastern states as well. </p>

            </div>
          </div>
        <?php } ?>


        <?php if ($_POST['sector']=='Textile and Apparel') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/textile_and_apparel.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">India's Textiles and Apparel Industry contributed 2%  to the GDP, 12% to export earnings and held 5% of the global trade in textiles and apparel in 2018-19. This industry generates employment opportunities for both skilled and unskilled labour. Collecting raw materials or fabrics and turning the fabrics into clothing with different designs, embroidery, stiching, etc are the basic operational structure of the Textile and Apparel industry. Under Learn and Earn, students can learn the art of making clothes and become Fashion Designer, Tailor, Ornamentalist and set up a business themselves or work in Multinational Companies. </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Automobile') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/automobile.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">In 2020, according to the Indian Automobile Industry Report, India was the fifth-largest auto market with 3.49 million units combined sold in the passenger and commercial vehicles category. The Automobile industry of India, currently manufactures 26 mn vehicles including Passenger Vehicles, Commercial Vehicles, Three Wheelers, Two Wheelers, and quadricycles out of which 4.7 mn are exported.  The high rise in demand in this sector also brings many opportunities for employment. Under Learn and earn, ITI Mechanic Motor Vehicle or ITI Automobile is a technical Course related to different types of vehicle reparing. </p>

            </div>
          </div>
        <?php } ?>


        <?php if ($_POST['sector']=='Banking and Finance') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/banking_finance.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">Banking and finance explores the constantly changing world of money, shares, credit and investments. The benefits of choosing this wonderful career are limitless; endless career options, robust salary offer, well acquinted with broking, consulting, funds management, and insurance to name a few. The courses under this field is more professional than being an academic one. Hence, needs a little research before choosing the perfect institute. Here's providing you with a wide range of institutes to choose from alongwith their contact details and training areas. Invest your time to go through your dream course especially curated for the Business Minds of the North-East India ! </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Beauty and Wellness') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/beauty_and_wellness.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">'If you feel "burnout" setting in, if you feel demoralized and exhausted, it is best, for the sake of evreryone, to withdraw and restore yourself'. - Dalai Lama. Today, there is a growing  awareness towards self-care, to groom self and look good, and thus the high in demand for beauty and wellness sector in the Indian market. This industry generates employment and provides earning opprtunities for many. This sector includes courses like Cosmetology, Reflexology Skin Treatments (Facial, Manicure, Pedicure, Waxing, Day Make up, Eyebrow/lash tinting)Nail Art, Thai Massage, Ayurvedic Spa Therapies Courses etc. </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Capital goods and Manufacturing') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/Capital-Goods-and-Manufacturing.jpeg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">Draughtsman (Civil), Fitter, Machinist, Welder, Turner are some of the basic courses taught under the sector Capital Goods and Manufacturing. More the number of machines in the industries, more will be the need of human resource in this sector to manage them. A student who wants to build a career in this field can apply for such courses after class 10 under various training institutions like ITIs and VTPs. To acquire more knowledge on this sector, keep exploring!</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Civil and Construction') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/civil_and_construction.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">The Highways! The Bridzes! The Flats! The Emporiums! The Malls!  India's construction industry was valued at over 2.7 trillion Indian rupees in the fourth quarter of 2020. It goes without saying that the Civil & construction industry is a very important sector of the economy. It involves an array of activities like constructing, altering, maintaining, repairing, and demolishing of buildings. People with higher and better levels of skills face the challenges more effectively and grab the opportunities.  This sector generates employment opportunities for both skilled and unskiled labour, provides working opportunities from a daily wage labourer to the Architect.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Craft') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/no_record_found_banner.png"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">Description will be here</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Health and Paramedical') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/paramedical.JPG"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">A Paramedic is a person who helps the doctor in specialised area and facilities for better diagnosis treatments and therapy. There is an increasing demand for paramedics professionals both in India and in abroad as well. In India, Paramedical Courses are academic programmes that emphasise Job placement. Paramedical courses are profession-oriented medical training courses that enable students to develop a career in the medical industry in a short amount of time and at a low cost. Numerous Medical Certificate and Diploma degrees in the paramedic stream are available in India after completing Class 10 and Class 12 from a variety of top-ranking universities offering high-paying professions. Paramedical provides various Bachelor’s courses, diploma courses, Certificate coueses, prograduate courses in various grounds such as B.Sc Nursing, Diploma in OT Technology, Diploma in Rural Health care, ANM, GNM etc. covering the areas Physiotherapy, Dialysis Technology, Nursing, Audiologist and Speech Therapist, X-Ray technology, Anaesthesia Technology, Physiotherapy, Dialysis Technology etc. In this segment under learn and earn you will get details about the course and career opportunities of Health and Paramedical sector in India.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Logistics and Shipping') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/logistics.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">The logistics services in India have been of prime importance in the country since time immemorial. From transporting bulky goods from one state to another and now carrying almost everything via eCommerce, logistics solutions have come a long way.  Be it young or old, newbies or professionals, logistics has opportunities for everyone. It is an industry with 11 sub-sectors like transportation, warehousing, operations, IT, and customer services. Jobs in this industry range are technical, mechanical, or analytical in nature. some of the job roles an aspirant can get into are packaging, warehousing, fulfillment, and distribution. The industry comprises activities like storage, freight management, supply chain management, managing vendors and partners, transportation, handling damage claims, and much more You will get the details of this zone which has been provided in this segment of Learn and Earn.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Hospitality and Hotel Management') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/hospitality_and_hotel_management.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">People love to travel, to rejuvenate themselves, and so the need of the home stays, resorts and the hotels. Even the exploration of various cuisines is in demand, and thus the increase in number of restaurants.Want to work in the cruise, or want to serve welcoming facilities to the toursists, or want to manage a resort or a hotel? Then this sector is absolutely for you. This sector provides courses like Diploma in Hospitality Operations, Diploma in Hotel Management, Hospitality Industry Managerial Accounting, Supervision in Hospitality, Hotel Management and Catering Technology etc. In the 21st century, this is a sector that is rising fast and garbing attention which further provides unlimited job opprtunities. Explore this section and enjoy the benefits provided! Keep Learning and Keep Growing.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='IT-ITeS and Computer Science' or $_POST['sector']=='IT ITeS and Computer Science') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/compuiter_science.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">The IT industry accounted for 8% of India’s GDP in 2020 and has scope for highest growth in exports in the coming years. "Power to Empower', the motto of 'Digital India' launched by Prime Minister Narendra Modi encourages us to study and learn more about computers, and build our strength in Information Technology. Under IT-ITeS and Computer Science, the students can learn about Computer hardware and software installation, introduction of DOS and Linux OS, Word processing, Electronic spreadsheet, Open office and PowerPoint, Database management system, Computer communication and the internet etc. After completing this course, students can join into IT Companies, Computer Operator in School-College or in any Company Assistant Programmer, Lab Assistant, Computer trainer, Network Administration Database management etc. Entrepreneurs can start the business by opening Cyber Cafe, Photography, etc. </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Sports and Fitness') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/sports_and_fitness.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $sector;?></h4> -->

              <p class="text-white pr-md-5">Do you have an inborn passion for sports? You would be glad to know that the market size of the sports industry across India was over 16 billion Indian rupees in 2020. Enough to prove that the market is vast, and opportunities are unlimited. The various fields include professional player, sports engineering, sports science, sports marketing, sports coaches, sports sponsorship, sports tourism, sports broadcasting, physiology, fan development, event and venue management, sports psychology, sports PR, etc Passion first, and everything will fall at place. and, you've already fell in the right place- our 'Learn and Earn' segment especially curated for enthusiatic souls like you. Look for the best institute and shoot !! </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Plumbing') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/plumbing.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Plumbers play a very important role in our life as they are directly linked to the precious "Water". Whenever there is a leakage, we need a Plumber, we need them to repair any issues with pipes. In India, Plumbing sector has a huge demand. This sector is on the frontline of how we use water and energy. Job opportunities under this sector are Plumber, Maintenance and Servicing Assistant, Pipe Layer/Plumber Pipeline, Pipe Fitter, Plumber (Welder), Sanitary Fixtures, Fitter Assistant, (Pumps and E/M Mechanic) etc. </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Electrical - Power' or $_POST['sector']=='Electrical Power') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/electricals.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Electricity demand in the country has increased rapidly and is expected to rise in the future. This sector generates employment through various fields. Wireman installs various kinds of electrical wiring such as cleat, conduit, casing, concealed etc. in houses, factories, workshops and other establishments for light and power supply. Job opportunities after completion of this course are like Service/Maintenance Technician for domestic appliances in Reputed Companies, join in Local Electricity Board, can repair electrical appliances in electrical shops, can become contractor for domestic wiring and industrial wiring etc. </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Retail and Marketing') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/retail.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Retail is the sale of goods and services from an enterprise to the final consumer. Retail marketing is the process by which retailers promote awareness and interest of their goods and services in an effort to generate sales from their consumers. India ranked 73 in the United Nations Conference on Trade and Development's Business-to-Consumer (B2C) E-commerce Index 2019. India is the world’s fifth-largest global destination in the retail space and ranked 63 in World Bank’s Doing Business 2020. Today, almost every household is depended on Online Shopping may it be for clothes, furniture, electronics, food or vegetables. After completing the course, one can become Sales and Marketing Manager, join in Agencies and Companies also have a part time job like delivery persons alongwith studies and other works.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Mechanical') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/mechanical.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Mechanical engineering is an engineering branch that combines engineering physics and mathematics principles with materials science to design, analyze, manufacture, and maintain mechanical systems. Diploma in Mechanical Engineering seeks to provide more accessible and quality education and training to manufacturing or production personnel to meet the practical work needs of manufacturing or production industry and prepare them for the changes in techniques, technologies, markets and employment patterns. After completion of the course, one can choose from a variety of job profiles to work: Safety Engineers, Emissions Research Specialists, Performance Engineers, Vehicle Dynamics Controllers, Operations Research Managers. Forge your Mind, Shape your Career and Weld your Life !</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Aviation Sector') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/aviation.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Aviation sector  in India has emerged as one of the fastest growing industries in India during the last three years. India has become the third largest domestic aviation market in the world. India’s aviation industry is largely untapped with huge growth opportunities, considering that air transport is still expensive for majority of the country’s population, of which nearly 40% is the upwardly mobile middle class.  If a person has considerable skills he can opt for a career  under viation sector, which has opened avenues for Customer service roles in airline ticketing, check-in, cabin crew, Ground Duty Service workers etc.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Fire and Safety') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/fire_and_safety.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">A fire can happen at any place and at any time, it is needless to say that it causes harm and has the potential to damage several lives and property. The main principle of Fire safety is preventing the fire event and to manage its impact by prevention, detection & communication, occupant protection, containment and extinguishment. A fire safety job is also considered to a noble job where you get to serve for the people. Fire Fighters are considered as heroes as they save lives and help people. The aspirants needs a to pass matriculation to become a Fire Fighter. There is also Fire safety engineering which is one of the toughest and also a demanding career. There are several diploma courses for fire safety like Safety Management, Industrial safety, Fire sub Office etc. This segment of Learn and Earn can help you to get the details of these courses.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Media and Entertainment') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/media_and_entertainment.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Media comes in different avenues to the people such as Television, Films, Radio, Animation, Music, Gaming, Digital Advertising, Live events, Prints etc. The Indian Media and Entertainment Industry has grown at a very fast pace since 2016 and with the Covid situation this industry in 2020 had outshined world wide with its different platforms. The evolving lifestyle also is one of the reason for its growth. Career opportunities in this field is huge as there are multiple choices like Advertising, Anchoring, Broad Casting engineering, Radio jockeying, Video editing, Print, Graphics, Website Designing, Event Planning, Sound Engineering etc. Here in this segment, you can find the details of the career options.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Domestic Workers') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/domestic_worker.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Domestic work provides an important livelihood source preferrably for women who under certain circumstances couldn't complete their preliminary education and has a strong desire to live a financially independent life.The various job profiles available are Child Care Taker, General Housekeeping, Elderly Care Taker. Dear Domestic Worker, you make life work for millions of families and we're here to make this process work for you. Select the best training institute for yourself and go ahead with your pious thought of 'helping others'.</p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Electronics') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/electronics.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">An Apple iPhone, to iPads, Refrigerators, Washing Machines, Television and many other are in huge demand as this sector generates consumers from all ages. Hence, this sector also demands manpower at a huge chunk.  Electronic Mechanic is capable of installing, repairing and maintaining computer hardware and networking, electronic equipment like cell phones, LED lights, chips, oscilloscope, solar system and they have a knowledge of electrical engineering and accessories. After completion of the course candidates can get jobs in electronics manufacturing companies, can initiate start-ups, can have their own shops for electronics etc.
              </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Food and Beverages') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/food_and_beverages.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->

              <p class="text-white pr-md-5">Our country is blessed with an abundance of fruits and vegetable crops. Baking, Cooking, preserving of food all are included under this sector. Successful processing and preservation of foods can lead to number of economic activities like newer techniques of fruit and vegetable preservation, starting up a small- scale industry or production unit or developing new products, etc. Varied Cuisines from all over the country like South Indian Dosa, Hyderabadi Biryani, Punjab ka Lassi, Sweets of Uttar Pradesh, Omita Khar and Duck with Kumura of Assam, Thupka and Momos of Sikkim, Bamboo Shoot from northeast India, are all in high demand all over the country and thus the rise in Dhabas, Bakery Shops, Restaurants, Food Preserving Industrues especially for frozen food, pickles are all in high demand and which finally generates a huge number of employment opportunities. Love for the Cuisines or love for cooking and baking, all under one sector "Food and Beverages", scroll down and explore for more!
              </p>

            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Furniture and Fitting') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/furniture.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">The Furniture and fitting industry of India is an vibrant emerging sector. The growing urbanization, the fast growing economy, online shopping, the increasing use of social media are the few factors leading to the growth of this sector. This field is meant for both skilled and unskilled labours. The students who are interested in this field can look for career verticals like Furniture Designer, Product Manager, Logistics and Warehouse manager, Sales Manager and Team etc.
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Gem and Jwellery' or $_POST['sector']=='Gem and Jewellery') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/gems_and_jewelry.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">Jewellery is a significant part of all the various culture of our country. Jewellery making is an art form in itself and to make it more attractive it is topped with jems. There are more than 2.5 million jewellery shops in India. This industry with time has changed interms of fashion and industry and with this the industry is emerging stronger. The career in this field requires both skilled and unskilled labours, Jewellery Designer, Product Manager, etc are few of the career verticals in this field. This segment of Learn and Earn will provide  more detailed information of this field.
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Telecom') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/telecom.png"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">Like every other  sector in the newly digitized world, telecoms is in the midst of a significant transformation. Currently, India is the world’s second-largest telecommunications market with a subscriber base of 1.16 billion and has registered strong growth in the last decade. Telecom industries are constantly changing to meet customers' demands and keep up with the latest technologies, new job opportunities are popping up every day.Those who are interested in starting a career in this field need specific technical training. Most companies require a bachelor's or a master's degree and industry-related certifications, such as Cisco Certified Internetwork Expert etc. The details of such a course has been provided in this segment of Learn and Earn
              </p>
              
            </div>
          </div>
        <?php } ?>


         <?php if ($_POST['sector']=='Yoga and Naturopathy') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/yoga_and_naturaopathy.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">"Yoga takes you to the present moment, the only place where life exists". - quote by Patanjali. The growing health and fitness consiciousness of the people makes Yoga and Naturopathy one of the most vibrant sector of the economy. practice of yoga by the international community is sky rocketting .With governmnent's initiative of popularilizing yoga it creates a lot of opportunity for youth as instructors and as well as in health tourism sector. Furthermore, under naturopathy, there is demand for modern treatments with traditional methods like using home made paste from medicinal plants to treat illness like cough, common cold, skin allergies etc. Government of India has introduced 'Ministry of Ayush' in 2014 to promote awareness on immunity gained from Ayurveda, Yoga, Naturopathy, Unani, Siddha, Sowa-Rigpa and Homoeopathy.
              </p>
              
            </div>
          </div>
        <?php } ?>
        

        <?php if ($_POST['sector']=='Teacher Training') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/teacher_training.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">Education helps in character building of an individual and to do that the teachers plays an important role. Education is a necessity for every society to make it civilised. The teachers are the major player in imparting education and bringing out the hidden talents of a student. To get trained as a teacher in India there are various options like BA B. Ed, B.Sc and B. Ed Integrated Course, D. El, B.P. Ed, B. Ed,Pre & Primary Teachers' Training, Montessori Teachers Training, Ed etc. You can go through this segment of Learn and Earn and get a greater details on these courses here.
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Infrastructure and Equipment') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/infrastructure_and_equipments.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">All the infrastructures and equipments from land resources, raw materials, providing capital goods, machines and managing the infrastructures of various departments like Hotels, Hospitals, Roads, Commercial Flats, Government offices, Construction works, Playgrounds and many more demands human resource to monitor them. And today, we have some institutions providing training on such courses which will later on help the students to build a career on providing and managing infrastructure. It is one of the new course to be be grown. Keep exploring this segment to update yourself for upcoming courses in the future!
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Handicraft and Carpet') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/handicraft_and_carpet.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">That wooden showpiece to the wall hanging of our drawing rooms and balcony brings a vibrant and cozy environment in the house! Handloom Industry is one of the richest and vibrant aspects of Indian Cultural Heritage. Hand made dresses, utensils, curtains, furnitures, decoratives, silk clothes produced from silkworm are all found in almost every households of India. This industry generates employment in huge number as it completly depends on labour intensive technique. This industry helps the unskilled labours to earn and live in a prosporous way and also empowers the woman to become entrepreneurs. Courses under this sectors can be like Toy making, Embroidery, Zardosi Costume designing etc. This industry depicts the richness in Indian Cultural diversity. With over 4.3 million people directly and indirectly involved in the production, the handloom industry is the second-largest employment provider for the rural population in India after agriculture.
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Rubber') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/rubber.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">The Indian Rubber Industry is one of the largest industry with an annual turnover of 12000 crores. India is the largest producer in the world and third largest consumer of Natural Rubber. A minimum graduation can lead to a good career in this field but specialisation in the subject gives an added advantage. Employment opportunities here are mostly in the sector of Civil, Aviation, Aeronautics, Railways and Agricultural transport, Textile Engineering industries, Pharmaceuticals, Mines, Steel plants etc. Details of this field has been provided in this segment of Learn and Earn.
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Green jobs') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/green_jobs.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">Green Jobs are the key contributors to the preservation of environment. They mainly contribute to the benefits of the environment. It also promotes Sustainable Development through renewable energy, energy storage, green construction, green transportation etc. The careers in Green Jobs includes Renewable sector, Waste management,  Green Transport etc. The details on Green Jobs has been provided in this segment of Learn and Earn.
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Skills for PWD') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/Skill_for _PWD.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">A special treatment for the special people on the planet! This segement of Learn and Earn provides the sources of varied skills and courses given by various institutions in India especially for the Persons with Disability to make them independent. Department of Empowerment of Persons with Disabilities (Divyangjan) under Ministry of Social Justice & Empowerment is wholeheartedly working for the betterment of the special people and thus now a days, there are many training institutions both government and private providing various courses like Art & Culture, Education & Literacy, Environment and Forests, Health and Family welfare, Women's Development and Empowerment, Youth Affairs, Nutrition course, course on HIV/AIDS etc.Keep exploring for more information on it!
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Humanities (Soft Skills)') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/Humanities-Soft-Skills.png"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">"Communication- the human connection' is the key to personal and career success" quote by Paul J. Meyer. Soft Skills are desirable in all kind of professions may it be a Mutinational Company or Schools. or Hospitals or any other. Soft Skills mainly prioritise on the quality output of human resource whereas, hard skills/technical skills focuses more on the quantity output of human resource. Soft Skill helps an individual to grow both personally and professionally. After completing this course, one can become a trainer by self, can join in Call Centres, become a English Teacher, or teacher for any other languages, 
              </p>
              
            </div>
          </div>
        <?php } ?>

        <?php if ($_POST['sector']=='Fashion Technology') 
        { ?>
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img   src="<?php echo get_template_directory_uri(). '/assets/'?>img/learn_and_earn_images/fashion_technology.png"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $_POST['sector'];?></h4> -->
              
              <p class="text-white pr-md-5">Traditional or Western? Or may be Fusion! We all love to wear designer clothes, follow brands and go along the fashion trends. In India, despite of all the challenges aftermath Pandemic, Fashion Industry is at its peak. Being the part of 'Unity in Diversity', varied cultures and varied ideas comes along from 'Chikankari' of Lucknow, 'Pat-Muga' of Assam, Banarasi Silk etc. Some of the traditional costumes of Northeast India are: Mekhela Chador of Assam, Jainsem of Meghalaya, Kho or Bakhu of Sikkim, Alungstu of Nagaland, Innaphi and Phanek of Manipur, Rikutu Gamcha or Kubai and Risas and Rignai of Tripura, Puan of Mizoram, Shawls and Wraps of Arunachal Pradesh. The students ater completetion of the course can become Fashion designer, start their own Boutiques, or set up a business, join leather companies, jewellery houses, can become fashion show organisers etc. Want to showcase your talent of creativity with full of designs? Scroll down, and explore for more!
              </p>
              
            </div>
          </div>
        <?php } ?>


      </div>
    </div>
  </div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form action="<?php echo site_url()?>/learn-and-earn-details" id="form_id" method="post">
  <div class="inner-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 nf-sidebar-c-width">

          <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
            <div class="widget mb-20 widget-padding white-bg">
              
              <?php $var = get_field_object('field_60d4229160436');?>
              <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>) </span></a>
                <div class="widget-link collapse show" id="state-filter">
                  <ul class="sidebar-link nf-sidebar-scroll">
                    <?php 


                    $k=0;
                    sort($var['choices']);
                    foreach($var['choices'] as $choice)
                    {
                      if($_POST['state']==$choice) $checked = 'checked'; 
                      else if(is_array($_POST['state']) && in_array($choice,$_POST['state'])) $checked = 'checked'; 
                      else  $checked = ''; 
                      echo '
                      <li>
                      <div class="nf-checkbox-wrap">
                      <input class="check_state" value="'.$choice.'" class="check_state" type="checkbox" '.$checked.' id="state_'.$k.'" name="state[]">
                      <label for="state_'.$k.'">'.$choice.'</label>
                      </div>
                      </li>
                      ';
                      $k++;
                    }
                    ?>

                  </ul>
                </div>
                <?php $var = get_field_object('field_60d422f160437');?>
              <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Sector (<?php echo count($var['choices']);?>)</span>
              </a>
              <div class="widget-link collapse show" id="department-filter">
                <ul class="sidebar-link nf-sidebar-scroll">
                  <?php 

                  $k=0;
                  sort($var['choices']);
                  foreach($var['choices'] as $choice)
                  {
                    if($_POST['sector']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['choice']) && in_array($choice,$_POST['sector'])) $checked = 'checked'; 
                    else  $checked = ''; 
                    echo '
                    <li>
                    <div class="nf-checkbox-wrap">
                    <input class="check_sector" value="'.$choice.'" class="check_sector" type="checkbox" '.$checked.' id="sector_'.$k.'" name="sector">
                    <label for="sector_'.$k.'">'.$choice.'</label>
                    </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>


                </ul>
              </div>

                <?php 
              //ajax start  
                if(!empty($_POST['state']) )
                {
                  if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
                  $sts_state = array(
                    'key'     =>  'state',
                    'value'    =>  $_POST['state'],
                    'compare'  => 'IN'
                  );
                }  
                if(!empty($_POST['sector']) )
                {
                  if(!is_array($_POST['sector'])) $_POST['sector']=[$_POST['sector']];
                  $sts_sector = array(
                    'key'     =>  'sector',
                    'value'    =>  $_POST['sector'],
                    'compare'  => 'IN'
                  );
                }  
                $args = array(
                  'post_type'   => 'learn_and_earn',
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'meta_query'     =>  array(
                    array(
                      'relation' => 'AND',
                      $sts_state,
                      $sts_sector
                    )
                  )
                );  
                $the_query = new WP_Query( $args );
                $return_course=array();

                if( $the_query->have_posts() ){
                  while( $the_query->have_posts() ){ 
                    $the_query->the_post(); 
                    $values= get_fields();
                    $return_course[]=$values['course'];
                  }
                }
                $return_course = array_filter(array_unique($return_course));
                if(!empty($_POST['course']) && !in_array($_POST['course'], $return_course)) $_POST['course']='';
                wp_reset_query();
          //ajax end

                $var = get_field_object('field_60d4234c60438');?>
                <a class="btn-link nf-color-6" data-toggle="collapse" href="#department-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course.png" alt="department"> <span>  Courses Offered (<?php echo count($return_course);//count($var['choices']);?>)</span>
                </a>
                <div class="widget-link collapse show" id="department-filter">
                  <ul class="sidebar-link">
                    <?php 
                    $k=0;
                    sort($return_course);
                        //foreach($var['choices'] as $choice)
                    foreach($return_course as $choice)

                    {
                      if($_POST['course']==$choice) $checked = 'checked'; 
                      else if(is_array($_POST['course']) && in_array($choice,$_POST['course'])) $checked = 'checked'; 
                      else  $checked = ''; 
                      echo '
                      <li>
                      <div class="nf-checkbox-wrap">
                      <input class="check_course" value="'.$choice.'" class="check_course" type="checkbox" '.$checked.' id="course_'.$k.'" name="course">
                      <label for="course_'.$k.'">'.$choice.'</label>
                      </div>
                      </li>
                      ';
                      $k++;
                    }
                    ?>

                  </ul>
                </div>
              </div>
            </div>

          </div>

          <?php
          if(!empty($_POST['sector']))
          {

            if(!is_array($_POST['sector'])) $_POST['sector']=[$_POST['sector']];

            $sts_dept = array(
              'key'     =>  'sector',
              'value'    =>  $_POST['sector'],
              'compare'  => 'IN'
            );

          }
          if(!empty($_POST['state']))
          {
            if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

            $sts = array(
              'key'     =>  'state',
              'value'    =>  $_POST['state'],
              'compare'  => 'IN'
            );
          }
          if(!empty($_POST['course']))
          {
            if(!is_array($_POST['course'])) $_POST['course']=[$_POST['course']];

            $sts_c = array(
              'key'     =>  'course',
              'value'    =>  $_POST['course'],
              'compare'  => 'IN'
            );
          }
          if($_POST['keyword']!='')
          {
            $keyw = array(
              'relation' => 'OR',
              array(
                'key'     =>  'sector',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'title',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'course',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'state',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'contact_no',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'email_id',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),

              array(
                'key'     =>  'training_category',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'address',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
            );
          } 
          $blog_args = array(
            'post_type' => 'learn_and_earn',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'paged' => $paged, 
            'meta_query'     =>  array(
              array(
                'relation' => 'AND',
                $sts_c,
                $sts,
                $sts_dept,
                $keyw
              )
            )
          );

          $blog_posts = new WP_Query($blog_args);
                                  //echo "<pre>";
                                 // print_r($blog_posts);

          $tot_blog_args = array(
            'post_type' => 'learn_and_earn',
            'post_status' => 'publish',
            'meta_key'    => 'sector',
            'meta_value'  => $_POST['sector'],
            'posts_per_page' => -1,
            'meta_query'     =>  array(
              array(
                'relation' => 'AND',
                $sts_c,
                $sts,
                $sts_dept,
                $keyw
              )
            )
          );
          $tot_blog_posts = new WP_Query($tot_blog_args);
          ?>


          <div class="col-12 col-lg-8 nf-listing-c-width">
            <?php if(!empty($_POST['state']) or !empty($_POST['sector']) or !empty($_POST['course'])){?>
              <div class="nf-state-listing-block">
               <div class="row">
                <?php if(!empty($_POST['state'])){?>
                  <div class="col-12 col-lg-4">
                    <a href="#">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                      <span><?php if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>
                    </a>
                  </div>
                <?php }?>

                <?php if(!empty($_POST['sector'])){?>
                  <div class="col-12 col-lg-4">
                    <a href="#">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t1">
                      <span><?php if(is_array($_POST['sector'])) echo Implode(',<br>',$_POST['sector']);else echo $_POST['sector'];?></span>
                    </a>
                  </div>
                <?php }?>


                <?php if(!empty($_POST['course'])){?>
                 <div class="col-12 col-lg-3">
                  <a href="#">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course.png" class="nf-w-t2">
                    <span><?php if(is_array($_POST['course'])) echo Implode(',<br>',$_POST['course']);else echo $_POST['course'];?></span>
                  </a>
                </div>
              <?php }?>
              

            </div> 
          </div>
        <?php }?>
        <div class="nf-top-filter-wrap">
          <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo $tot_blog_posts->post_count;?></span>)</h2>
          <div class="nf-search-form">
            <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
            <button type="submit">
              <i class="ti-search"></i>
            </button>
          </div>
        </div>
        <div class="nf-top-result-list nf-updetails-wrap">
          <div class="row">

            <?php
            $record=0;
            while($blog_posts->have_posts()) {
              $blog_posts->the_post(); 

              $values= get_fields();

              if($values)
              {
                $sector='';
                $title='';
                $sub_title='';
                                    //$logo='';
                $state='';
                $sector='';
                $course='';
                $training_category='';
                $training_duration='';
                $contact_no='';
                $email_id='';
                $address='';
                $portal_link='';



                foreach($values as $key => $value)
                {
                  if($key=='sector'){ $sector = $value;  }  
                  if($key=='title'){ $title = $value;  } 
                  if($key=='sub_title'){ $sub_title = $value;  } 
                                        //if($key=='logo'){ $logo = $value;  } 
                  if($key=='state'){ $state = $value;  } 
                  if($key=='sector'){ $sector = $value;  } 
                  if($key=='course'){ $course = $value;  } 
                  if($key=='training_category'){ $training_category = $value;  } 
                  if($key=='training_duration'){ $training_duration = $value;  } 
                  if($key=='contact_no'){ $contact_no = $value;  } 
                  if($key=='email_id'){ $email_id = $value;  } 
                  if($key=='address'){ $address = $value;  } 
                  if($key=='portal_link'){ $portal_link = $value;  } 

                }
              }
            /*if(((isset($_POST) && 
              ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              && ($_POST['sector']==$sector or $_POST['sector']=='' or (is_array($_POST['sector']) && in_array($sector,$_POST['sector'])))
              && ($_POST['course']==$course or $_POST['course']=='' or (is_array($_POST['course']) && in_array($course,$_POST['course'])))

               && (($_POST['keyword']!='' && (strpos($title, $_POST['keyword']) !== false or strpos($state, $_POST['keyword']) !== false or strpos($course, $_POST['keyword']) !== false or strpos($sector, $_POST['keyword']) !== false or strpos($contact_no, $_POST['keyword']) !== false or strpos($email_id, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

             ) or !isset($_POST)) ){ */
              $record=$record+1;                   
              ?>


              <div class="col-xl-6 col-lg-12 nf-nedetails-cardblue">
                <div class="nf-cart">
                  <div class="nf-cart-header">
                    <div class="nf-left-content">
                      <span class="nf-updetails-logo"><img src="<?php echo $logo_image;?>"></span>
                      <div class="nf-l-title">
                        <h3 class="text-white nf-f-size-16"><?php echo $title;?></h3>
                        <!--<small class="text-white"><?php echo $sub_title;?></small>-->
                      </div>
                    </div>
                  </div>
                  <div class="cart-body nf-employment-listing p-4 pl-5 ml-4">
                    <div class="row mb-2">
                      <span class="col-12 col-md-5 border-right nf-f-size-14">Training Category</span>
                      <label class="col-12 col-md-7 nf-f-size-14 training-category"><?php echo $training_category;?></label>
                    </div>
                    <div class="row">
                      <span class="col-12 col-md-5 border-right nf-f-size-14">Training Duration</span>
                      <label class="col-12 col-md-7 nf-f-size-14"><?php echo $training_duration;?></label>
                    </div>
                    <hr class="my-3" />
                    <div class="row mb-3 nf-ledetails-contact">
                      <div class="col-xl-6 col-lg-12">
                       <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/callIcon.png" alt="callIcon" />
                       <span>
                        <label class="font-weight-normal mb-0 w-100">Contact Details</label>
                        <label><a href="tel:<?php echo $contact_no;?>"><?php echo $contact_no;?></a></label>
                      </span>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                     <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/mailIcon.png" alt="callIcon" />
                     <span>
                      <label class="font-weight-normal mb-0 w-100">Email Id</label>
                      <label><a href="mailto:<?php echo $email_id;?>"><?php echo $email_id;?></a></label>
                    </span>
                  </div>
                </div>
                <div class="row nf-ledetails-link">
                  <div class="col-xl-6 col-lg-12">
                   <label>Address</label>
                   <p class="address-txt"><?php echo $address;?></p>
                 </div>
                 <div class="col-xl-6 col-lg-12">
                   <label class="w-100 mb-3">Portal Link</label>
                   <a target="_blank" href="<?php echo $portal_link;?>">Visit Portal</a>
                 </div>
               </div>
             </div>
           </div>
         </div>

          <?php //}
        }
        ?>
      </div>
      <?php
      if(count($blog_posts->posts)==0) echo 'No Record Found';
          // Step  3 : Call the Pagination Function Here  
      if (function_exists("cpt_pagination")) {
       cpt_pagination($blog_posts->max_num_pages); 
     }
     ?>   



				 


            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Study tour in north section  -->


  <!-- footer start -->
  <?php get_footer(); ?>
  <script type="text/javascript">

      /*$(document).ready(function(){
          $('.check_sector').click(function() {
              $('.check_sector').not(this).prop('checked', false);
              document.getElementById("form_id").submit();
          });
      });
      $(document).ready(function(){
          $('.check_state').click(function() {
              $('.check_state').not(this).prop('checked', false);
              document.getElementById("form_id").submit();
          });
      });
      $(document).ready(function(){
          $('.check_course').click(function() {
              $('.check_course').not(this).prop('checked', false);
              document.getElementById("form_id").submit();
          });
        });*/

        document.body.scrollTop = 500;
        document.documentElement.scrollTop = 500;

        window.onload = function(){
    //jQuery("#totcount").html('<?php //echo $record;?>');
  };

  $( ".page-link" ).click(function() {
    $('#form_id').attr('action',this.href); 
    $( "#form_id" ).submit();
      //alert(this.href);
      return false;
    });

  $(document).ready(function(){
    $('.check_state').click(function() {
      $('.check_state').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });

  $(document).ready(function(){
    $('.check_sector').click(function() {
      $('.check_sector').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });

  $(document).ready(function(){
    $('.check_course').click(function() {
      $('.check_course').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });
</script>