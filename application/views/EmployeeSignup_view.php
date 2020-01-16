<?php
/*
 * @author Visheshagya
 */
include('analytics/googleAnalytics.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">

        <title>Employee Signup: Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/two-column.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">

        <!-- jQuery -->
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    </head>

    <body>
        <div class="content-full-height">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="Expert"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" id="login" style="font-size: 20px; color: white">Login</a></li>          
                        </ul>
                    </div><!-- nav-collapse -->
                </div>
            </nav>

            <!-- body content -->
            <div class="two-column-con">
                <div class="container">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content ">
                            <div class="tab-pane downarrow active">
                                <ul class="nav nav-tabs">
                                    <li id="personalTab" class="active">
                                        <a  href="#" onclick="showPreviousTab()" data-toggle="tab">Personal</a>
                                    </li>
                                    <li id="professionalTab">
                                        <a onclick="showNextTab()"data-toggle="tab">Professional</a>
                                    </li>
                                </ul>
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <form class="form-horizontal" method="POST" action="<?php echo base_url();?>JobPortal/addEmployee" id="employeeSignupForm" name="employeeSignupForm" onsubmit="return(submitForm())">
                                            <fieldset>
                                                <div id="personalDataTab">
                                                    <div class="alert alert-info text-center">Enter Personal Information (STEP 1 OF 2)</div>
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                            <div class="col-md-4">
                                                                <input autofocus="true" id="expertName" name="expertName" type="text" placeholder="Name" required class="form-control input-md">
                                                                 <input   name="userType" type="hidden"  value="employee">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                            <div class="col-md-4">
                                                                <input name="expertEmailId" id="expertEmailId" type="email" placeholder="e.g abc@xyz.com" required class="form-control input-md" onchange="checkEmailId(this.value)">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">+91</span>
                                                                    <input name="expertMobileNumber" id="expertMobileNumber" class="form-control" placeholder="e.g 9999999999" type="text" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity(Mobile Number shoulid be 10 digit .')">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center form-group">									  
                                                            <a role="button" class="btn btn-sm btn-primary" onclick="showNextTab()">Next</a>
                                                        </div>
                                                    </div>
                                                </div>                                            <!--one page -->
                                                <div id="professionalDataTab" style="display: none" >
                                                    <div class="alert alert-info text-center">Enter Professional Information (STEP 2 OF 2)</div>
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                    <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Total Years of Work Experience</label>
                                                            <div class="col-md-4">
                                                                <select id="totalYearWorkExperience" name="totalYearWorkExperience" class="form-control" >
                                                                    
                                                                    <?php 
                                                                     for($i=0;$i<25;$i++)
                                                                     {
                                                                        echo "<option>".$i."</option>";
                                                                     } 
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Industry</label>
                                                            <div class="col-md-4">
                                                                <select id="industryTypeId" class="form-control" name=" Industry" >
                                    <option  >Select</option>
                                    <option >Accounting/Finance</option>
                                    <option >Advertising/PR/MR/Events</option>
                                    <option  >Agriculture/Dairy</option>
                                    <option >Animation</option>
                                    <option >Architecture/Interior Designing</option>
                                    <option>Auto/Auto Ancillary</option><option  >Aviation / Aerospace Firms</option><option  >Banking/Financial Services/Broking</option>
                                    <option  >BPO/ITES</option><option>Brewery / Distillery</option>
                                    <option  >Broadcasting</option>
                                    <option  >Ceramics /Sanitary ware</option>
                                    <option  >Chemicals/PetroChemical/Plastic/Rubber</option>
                                    <option  >Construction/Engineering/Cement/Metals</option>
                                    <option  >Consumer Durables</option>
                                    <option >Courier/Transportation/Freight</option>
                                    <option  >Defence/Government</option>
                                    <option  >Education/Teaching/Training</option>
                                    <option >Electricals / Switchgears</option>
                                    <option >Export/Import</option>
                                    <option  >Facility Management</option>
                                    <option >Fertilizers/Pesticides</option>
                                    <option  >FMCG/Foods/Beverage</option>
                                    <option  >Food Processing</option>
                                    <option  >Fresher/Trainee</option>
                                    <option  >Gems &amp; Jewellery</option>
                                    <option  >Glass</option>
                                    <option  >Heat Ventilation Air Conditioning</option>
                                    <option >Hotels/Restaurants/Airlines/Travel</option>
                                    <option  >Industrial Products/Heavy Machinery</option>
                                    <option  >Insurance</option>
                                    <option  >Internet/Ecommerce</option>
                                    <option  >IT-Hardware &amp; Networking</option>
                                    <option  >IT-Software/Software Services</option>
                                    <option  >KPO / Research /Analytics</option>
                                    <option  >Leather</option>
                                    <option  >Legal</option>
                                    <option  >Media/Dotcom/Entertainment</option>
                                    <option  >Medical/Healthcare/Hospital</option>
                                    <option  >Mining</option>
                                    <option  >NGO/Social Services</option>
                                    <option  >Office Equipment/Automation</option>
                                    <option  >Oil and Gas/Power/Infrastructure/Energy</option>
                                    <option  >Paper</option>
                                    <option >Pharma/Biotech/Clinical Research</option>
                                    <option >Printing/Packaging</option>
                                    <option v >Publishing</option>
                                    <option  >Real Estate/Property</option>
                                    <option  >Recruitment</option>
                                    <option  >Retail</option>
                                    <option  >Security/Law Enforcement</option>
                                    <option  >Semiconductors/Electronics</option>
                                    <option  >Shipping/Marine</option>
                                    <option  >Steel</option>
                                    <option  >Strategy /Management Consulting Firms</option>
                                    <option  >Sugar</option>
                                    <option  >Telcom/ISP</option>
                                    <option  >Textiles/Garments/Accessories</option>
                                    <option  >Tyres</option>
                                    <option >Water Treatment / Waste Management</option>
                                    <option  >Wellness/Fitness/Sports</option>
                                    <option  >Other</option>                                   
                                    </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Current Location:</label>
                                                            <div class="col-md-4">
                                                                 <select   name="current_Location" class="form-control" >
                                        <option value="-1" >Select</option> 
                                        <optgroup class="optGrp" label="------Top Metropolitan Cities------"></optgroup>  
                                        <option  >Ahmedabad</option>
                                          <option  >Bengaluru / Bangalore</option>
                                            <option >Chandigarh</option>  
                                            <option  >Chennai</option>  
                                            <option  >Delhi</option>
                                              <option  >Gurgaon</option>
                                                <option  >Hyderabad / Secunderabad</option> 
                                                 <option  >Kolkata</option>
                                                   <option  >Mumbai</option> 
                                                    <option >Noida</option>  
                                                    <option  >Pune</option> 
                                                    <optgroup class="optGrp" label="------Andhra Pradesh------">
                                                        
                                                    </optgroup>
                                                      <option  >Anantapur</option> 
                                                       <option  >Chitoor</option>  
                                                       <option >Eluru</option>
                                                         <option  >Gannavaram</option> 
                                                          <option >Guntakal</option>
                                                            <option >Guntur</option>  
                                                            <option  >Kadapa/Cuddapah</option>  <option >Kakinada</option>  <option  >Kurnool</option>  <option  >Machilipatnam</option>  
                                                            <option  >Nandyal</option> 
                                                             <option >Nellore</option>  
                                                             <option  >Ongole</option>  
                                                             <option  >Rajahmundry</option> 
                                                              <option  >Tada</option>  
                                                              <option >Tirupati</option> 
                                                               <option  >Vijayawada</option>  
                                                               <option  >Visakhapatnam</option> 
                                                                <option >Vizianagaram</option> 
                                                                 <option  >Andhra Pradesh - Other</option>
                                                                  <optgroup class="optGrp" label="------Arunachal Pradesh------"></optgroup> 
                                                                   <option  >Itanagar</option> 
                                                                    <option >Arunachal Pradesh - Other</option>
                                                                     <optgroup class="optGrp" label="------Assam------"></optgroup>  
                                                                     <option >Dibrugarh</option> 
                                                                      <option  >Guwahati</option>  
                                                                      <option  >Silchar</option>  
                                                                      <option  >Assam - Other</option>
                                                                       <optgroup class="optGrp" label="------Bihar------"></optgroup>  
                                                                       <option  >Bhagalpur</option>  
                                                                       <option  >Patna</option> 
                                                                        <option  >Bihar - Other</option> <optgroup class="optGrp" label="------Chhattisgarh------"></optgroup>  <option  >Bhillai</option> 
                                                                         <option  >Bilaspur</option>  
                                                                         <option  >Korba</option>
                                                                           <option >Raipur</option>
                                                                             <option  >Raigarh</option>
                                                                               <option  >Chhattisgarh - Other</option> <optgroup class="optGrp" label="------Goa------"></optgroup>  <option >Panjim / Panaji</option>
                                                                                 <option  >Vasco Da Gama</option> 
                                                                                  <option  >Goa - Other</option>
                                                                                   <optgroup class="optGrp" label="------Gujarat------"></optgroup>  <option  >Ahmedabad</option> 
                                                                                    <option  >Anand</option>  <option  >Ankleshwar</option>  <option  >Bharuch</option>  <option  >Bhavnagar</option>  <option  >Bhuj</option> 
                                                                                     <option value="330" >Dahej</option> 
                                                                                      <option value="332" >Gandhidham</option>  <option value="58" >Gandhinagar</option>  <option value="59" >Gir</option>  <option value="60" >Jamnagar</option>  <option value="61" >Kandla</option>  <option value="62" >Porbandar</option>  <option value="342" >Mehsana</option>  <option value="63" >Rajkot</option>  <option value="64" >Surat</option>  <option value="65" >Vadodara / Baroda</option>  <option value="66" >Valsad</option>  <option value="67" >Vapi</option>  <option value="68" >Gujarat - Other</option> <optgroup class="optGrp" label="------Haryana------"></optgroup>  <option value="70" >Ambala</option>  <option value="71" >Chandigarh</option>  <option value="72" >Faridabad</option>  <option value="73" >Gurgaon</option>  <option value="74" >Hisar</option>  <option value="75" >Karnal</option>  <option value="76" >Kurukshetra</option>  <option value="77" >Panipat</option>  <option value="78" >Rohtak</option>  <option value="79" >Haryana - Other</option> <optgroup class="optGrp" label="------Himachal Pradesh------"></optgroup>  <option value="239" >Baddi</option>  <option value="81" >Dalhousie</option>  <option value="82" >Dharmasala</option>  <option value="83" >Kulu/Manali</option>  <option value="84" >Shimla</option>  <option value="85" >Himachal Pradesh - Other</option> <optgroup class="optGrp" label="------Jammu &amp; Kashmir------"></optgroup>  <option value="87" >Jammu</option>  <option value="88" >Srinagar</option>  <option value="89" >Jammu and Kashmir - Other</option> <optgroup class="optGrp" label="------Jharkhand------"></optgroup>  <option value="91" >Bokaro</option>  <option value="92" >Dhanbad</option>  <option value="93" >Jamshedpur</option>  <option value="94" >Ranchi</option>  <option value="95" >Jharkhand - Other</option> <optgroup class="optGrp" label="------Karnataka------"></optgroup>  <option value="97" >Bengaluru / Bangalore</option>  <option value="98" >Belgaum</option>  <option value="99" >Bellary</option>  <option value="100" >Bidar</option>  <option value="348" >Davangere</option>  <option value="101" >Dharwad</option>  <option value="102" >Gulbarga</option>  <option value="103" >Hubli</option>  <option value="104" >Kolar</option>  <option value="105" >Mangalore</option>  <option value="106" >Mysoru / Mysore</option>  <option value="107" >Karnataka - Other</option> <optgroup class="optGrp" label="------Kerala------"></optgroup>  <option value="109" >Calicut</option>  <option value="110" >Cochin</option>  <option value="111" >Ernakulam</option>  <option value="241" >Idukki</option>  <option value="112" >Kannur</option>  <option value="242" >Kasargode</option>  <option value="113" >Kochi</option>  <option value="114" >Kollam</option>  <option value="115" >Kottayam</option>  <option value="116" >Kozhikode</option>  <option value="244" >Malappuram</option>  <option value="117" >Palakkad</option>  <option value="118" >Palghat</option>  <option value="245" >Pathanamthitta</option>  <option value="119" >Thrissur</option>  <option value="120" >Trivandrum</option>  <option value="248" >Wayanad</option>  <option value="121" >Kerala - Other</option> <optgroup class="optGrp" label="------Madhya Pradesh------"></optgroup>  <option value="123" >Bhopal</option>  <option value="124" >Gwalior</option>  <option value="125" >Indore</option>  <option value="126" >Jabalpur</option>  <option value="335" >Katni</option>  <option value="127" >Ujjain</option>  <option value="128" >Madhya Pradesh - Other</option> <optgroup class="optGrp" label="------Maharashtra------"></optgroup>  <option value="130" >Ahmednagar</option>  <option value="131" >Aurangabad</option>  <option value="341" >Chandrapur</option>  <option value="132" >Jalgaon</option>  <option value="133" >Kolhapur</option>  <option value="349" >Khopoli</option>  <option value="134" >Mumbai</option>  <option value="135" >Mumbai Suburbs</option>  <option value="136" >Nagpur</option>  <option value="137" >Nasik</option>  <option value="138" >Navi Mumbai</option>  <option value="139" >Pune</option>  <option value="346" >Ratnagiri</option>  <option value="140" >Solapur</option>  <option value="344" >Vasai</option>  <option value="141" >Maharashtra - Other</option> <optgroup class="optGrp" label="------Manipur------"></optgroup>  <option value="143" >Imphal</option>  <option value="144" >Manipur - Other</option> <optgroup class="optGrp" label="------Meghalaya------"></optgroup>  <option value="146" >Shillong</option>  <option value="147" >Meghalaya - Other</option> <optgroup class="optGrp" label="------Mizoram------"></optgroup>  <option value="149" >Aizawl</option>  <option value="150" >Mizoram - Other</option> <optgroup class="optGrp" label="------Nagaland------"></optgroup>  <option  >Dimapur</option>  <option  >Nagaland - Other</option> <optgroup class="optGrp" label="------Orissa------"></optgroup>  <option  >Bhubaneshwar</option>  <option  >Cuttack</option>  <option  >Jharsuguda</option>  <option  >Paradeep</option>  <option  >Puri</option>  <option  >Rourkela</option>  <option  >Sambalpur</option>  <option  >Orissa - Other</option> <optgroup class="optGrp" label="------Punjab------"></optgroup>  <option  >Amritsar</option>  <option  >Bathinda</option>  <option  >Chandigarh</option>  <option  >Jalandhar</option>  <option  >Ludhiana</option>  <option  >Mohali</option>  <option  >Pathankot</option>  <option  >Patiala</option>  <option  >Punjab - Other</option> <optgroup class="optGrp" label="------Rajasthan------"></optgroup>  <option  >Ajmer</option>  <option  >Barmer</option>  <option  >Bhilwara</option>  <option  >Jaipur</option>  <option  >Jaisalmer</option>  <option  >Jodhpur</option>  <option  >Kota</option>  <option  >Neemrana</option>  <option  >Udaipur</option>  <option  >Rajasthan - Other</option> <optgroup class="optGrp" label="------Sikkim------"></optgroup>  <option  >Gangtok</option>  <option  >Sikkim - Other</option> <optgroup class="optGrp" label="------Tamil Nadu------"></optgroup>  <option  >Chennai</option>  <option  >Coimbatore</option>  <option  >Cuddalore</option>  <option  >Erode</option>  <option >Hosur</option>  <option  >Madurai</option>  <option  >Nagercoil</option>  <option>Ooty</option>  <option  >Salem</option>  <option  >Thanjavur</option>  <option  >Tirunelveli</option>  <option  >Trichy</option>  <option  >Tuticorin</option>  <option  >Vellore</option>  <option  >Tamil Nadu - Other</option> <optgroup class="optGrp" label="------Telangana------"></optgroup>  <option >Adilabad</option>  <option  >Bhadrachalam</option>  <option  >Godavarikhani</option>  <option  >Hanumakonda</option>  <option  >Hyderabad / Secunderabad</option>  <option  >Karimnagar</option>  <option  >Khammam</option>  <option  >Kodad</option>  <option  >Kothagudem</option>  <option  >Mahaboobnagar/Mahabubnagar</option>  <option  >Mancherial</option>  <option  >Medak</option>  <option  >Nalgonda</option>  <option  >Nizamabad</option>  <option  >Rangareddy</option>  <option  >Razole</option>  <option  >Sangareddy</option>  <option  >Siddipet</option>  <option  >Suryapet</option>  <option  >Tuni</option>  <option  >Warangal</option>  <option  >Telangana - Other</option> <optgroup class="optGrp" label="------Tripura------"></optgroup>  <option  >Agartala</option>  <option  >Tripura - Other</option> <optgroup class="optGrp" label="------Union Territories------"></optgroup>  <option  >Chandigarh</option>  <option  >Dadra &amp; Nagar Haveli - Silvassa</option>  <option  >Daman &amp; Diu</option>  <option  >Delhi</option>  <option  >Lakshadweep</option>  <option  >Pondicherry</option> <optgroup class="optGrp" label="------Uttar Pradesh------"></optgroup>  <option  >Agra</option>  <option  >Aligarh</option>  <option  >Allahabad</option>  <option  >Bareilly</option>  <option  >Bijnor</option>  <option  >Faizabad</option>  <option  >Ghaziabad</option>  
                                                                                      <option  >Gorakhpur</option>  <option  >Greater Noida</option>  <option  >Kanpur</option>  <option  >Lucknow</option>  <option  >Mathura</option>  <option  >Meerut</option>  <option  >Moradabad</option>  <option  >Noida</option>  <option value="333" >Saharanpur</option> 
                                                                                       <option  >Varanasi / Banaras</option>  <option  >Uttar Pradesh - Other</option> <optgroup class="optGrp" label="------Uttaranchal------"></optgroup>  <option  >Dehradun</option>  <option  >Haldwani</option>  <option  >Kashipur</option>  <option  >Roorkee</option>  <option  >Uttaranchal - Other</option> <optgroup class="optGrp" label="------West Bengal------"></optgroup>  <option  >Asansol</option>  <option  >Burdwan</option>  <option  >Durgapur</option>  <option  >Haldia</option>  <option  >Kharagpur</option>  <option  >Kolkata</option>  <option  >Siliguri</option>  <option  >West Bengal - Other</option> <optgroup class="optGrp" label="------Other------"></optgroup>  <option  >Other</option>                                     </select>
                                     <input type="checkbox" name="relocated" id="countryCheckBox" value="1" />
                                      <label >OPEN TO RELOCATION</label>

                                                            </div>
                                                        </div>
                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Functional Area:</label>
                                                            <div class="col-md-4">
                                                                 <select id="funcAreaId" class="form-control" name="funcAreaId"  >
                                     <option value="-1" >Select</option>  <option value="1" >Accounts / Finance / Tax / CS / Audit</option>  <option value="46" >Agent</option>  <option value="81" >Analytics &amp; Business Intelligence</option>  <option value="2" >Architecture / Interior Design</option>  <option value="6" >Banking / Insurance</option>  <option value="5" >Content / Journalism</option>  <option value="7" >Corporate Planning / Consulting</option>  <option value="21" >Engineering Design / R&amp;D</option>  <option value="10" >Export / Import / Merchandising</option>  <option value="42" >Fashion / Garments / Merchandising</option>  <option value="45" >Guards / Security Services</option>  <option value="4" >Hotels / Restaurants</option>  <option value="12" >HR / Administration / IR</option>  <option value="62" >IT Software - Client Server</option>  <option value="72" >IT Software - Mainframe</option>  <option value="74" >IT Software - Middleware</option>  <option value="73" >IT Software - Mobile</option>  <option value="75" selected>IT Software - Other</option>  <option value="68" >IT Software - System Programming</option>  <option value="69" >IT Software - Telecom Software</option>  <option value="61" >IT Software - Application Programming / Maintenance</option>  <option value="63" >IT Software - DBA / Datawarehousing</option>  <option value="71" >IT Software - E-Commerce / Internet Technologies</option>  <option value="65" >IT Software - Embedded /EDA /VLSI /ASIC /Chip Des.</option>  <option value="64" >IT Software - ERP / CRM</option>  <option value="66" >IT Software - Network Administration / Security</option>  <option value="67" >IT Software - QA &amp; Testing</option>  <option value="70" >IT Software - Systems / EDP / MIS</option>  <option value="37" >IT- Hardware / Telecom / Technical Staff / Support</option>  <option value="8" >ITES / BPO / KPO / Customer Service / Operations</option>  <option value="13" >Legal</option>  <option value="15" >Marketing / Advertising / MR / PR</option>  <option value="18" >Packaging</option>  <option value="16" >Pharma / Biotech / Healthcare / Medical / R&amp;D</option>  <option value="19" >Production / Maintenance / Quality</option>  <option value="14" >Purchase / Logistics / Supply Chain</option>  <option value="22" >Sales / BD</option>  <option value="11" >Secretary / Front Office / Data Entry</option>  <option value="9" >Self Employed / Consultants</option>  <option value="82" >Shipping</option>  <option value="20" >Site Engineering / Project Management</option>  <option value="36" >Teaching / Education</option>  <option value="44" >Ticketing / Travel / Airlines</option>  <option value="39" >Top Management</option>  <option value="43" >TV / Films / Production</option>  <option value="3" >Web / Graphic Design / Visualiser</option>  <option value="41" >Other</option>                                     </select>

                                                            </div>
                                                        </div>                 

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Primary Professional Category</label>
                                                            <div class="col-md-4">
                                                                <select id="categoryId" name="categoryId" class="form-control" onchange="fetchSubCategoryDetails(this.value)">
                                                                    <option value="0">--SELECT--</option>
                                                                    <?php foreach ($expertCategories as $eCategory) { ?>
                                                                        <option value=<?php echo $eCategory->categoryId; ?>><?php echo $eCategory->categoryName; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectmultiple">What Types of service you offer?</label>
                                                            <div class="col-md-4 " >
                                                                <p id="subCat" name="subCat" style="border: 1px solid lightgray; border-radius: 2%;padding: 2%" ></p>
                                                            </div>
                                                        </div>
                                                       
                                                      
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Membership #</label>  
                                                            <div class="col-md-4">
                                                                <input id="expertMembershipNumber" required name="expertMembershipNumber" type="text" placeholder="e.g ASDC34WE" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Practicing Since</label>
                                                            <div class="col-md-4">
                                                                <input type="text" required min="1947" name="expertProfessionalCareerStartYear" id="expertProfessionalCareerStartYear"placeholder="e.g 2016" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Institute/Bar Council Name</label>  
                                                            <div class="col-md-4">
                                                                <input id="expertInstitueName" required name="expertInstitueName" type="text" placeholder=" e.g Institute Name" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <div class="col-md-4" >
                                                        <button>Add Employer/Designation</button>
                                                        </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">ORGANIZATION #</label>  
                                                            <div class="col-md-4">
                                                                <input id="ORGANIZATION" required name="ORGANIZATION" type="text" placeholder="ORGANIZATION NAME " class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">DESIGNATION #</label>  
                                                            <div class="col-md-4">
                                                                <input id="ORGANIZATION" required name="DESIGNATION" type="text" placeholder="DESIGNATION" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"></label>
                                                            <div class="col-md-4">
                                                                <div class="checkbox">
                                                                    <label for="checkboxes-0">
                                                                        <input type="checkbox" required name="termsAndCondition" id="termsAndCondition" value="1">
                                                                        <a href="ExpertTermsAndCondition" target="_blank">I agree to the Terms and Conditions</a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center form-group">								 
                                                            <button class="btn btn-sm btn-primary" onclick="submitForm()">SIGNUP</button>								  
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>		
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end body content -->
        <!-- Footer -->
                <?php include('loginFooter.php') ?>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <script>
                                                                function showNextTab()
                                                                {
                                                                    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                                                    var expertName = $('#expertName').val();
                                                                    var emailId = $("#expertEmailId").val();
                                                                    emailId = $.trim(emailId);
                                                                    var flag = 1;
                                                                    $.ajax({
                                                                        url: "<?php echo base_url(); ?>Ajaxcalls/checkEmployeeEmailId",
                                                                        type: 'POST',
                                                                        data: {'emailId': emailId,'userType':'Employee'},
                                                                        async: false,
                                                                        success: function (response) {
                                                                            var verifyResult = JSON.parse(response);
                                                                            if (verifyResult.verificationResult !== 0)
                                                                            {
                                                                                $('#expertEmailId').parent('div').addClass('has-error');
                                                                                $("#expertEmailId").focus();
                                                                                $("#emailError").modal('show');
                                                                                flag = 0;
                                                                                return false;
                                                                            }
                                                                        }
                                                                    });
                                                                    if (flag == 0)
                                                                    {
                                                                        $('#expertEmailId').parent('div').addClass('has-error');
                                                                        $("#expertEmailId").focus();
                                                                        $("#emailError").modal('show');
                                                                        return false;
                                                                    } else if ($.trim(expertName) === "")
                                                                    {
                                                                        $('#expertName').parent('div').addClass('has-error');
                                                                        $('#expertName').focus();

                                                                        return false;
                                                                    } else if (isNaN($("#expertMobileNumber").val()))
                                                                    {
                                                                        $("#expertMobileNumber").parent('div').addClass('has-error');
                                                                        return false;
                                                                    } else if ($("#expertMobileNumber").val().length != 10)
                                                                    {
                                                                        $("#expertMobileNumber").parent('div').addClass('has-error');
                                                                        $("#expertMobileNumber").focus();
                                                                        return false;
                                                                    } else if (!re.test($("#expertEmailId").val()))
                                                                    {
                                                                        $('#expertEmailId').parent('div').addClass('has-error');
                                                                        $("#expertEmailId").focus();
                                                                        return false;
                                                                    }
                                                                    if ($("#expertEmailId").val().trim() === "")
                                                                    {
                                                                        $('#expertEmailId').parent('div').addClass('has-error');
                                                                        $("#expertEmailId").focus();
                                                                    } else
                                                                    {
                                                                        $("#personalDataTab").hide();
                                                                        $("#personalTab").removeClass('active');
                                                                        $("#professionalTab").addClass('active');
                                                                        $("#professionalDataTab").show();
                                                                    }
                                                                }
                                                                function showPreviousTab()
                                                                {
                                                                    $("#professionalDataTab").hide();
                                                                    $("#personalDataTab").show();
                                                                    $("#personalTab").addClass('active');
                                                                    $("#professionalTab").removeClass('active');

                                                                }
                                                                function submitForm()
                                                                {
                                                                    var fflag = 1;
                                                                    var categoryId = $("#categoryId").val();
                                                                    if (categoryId == 0)
                                                                    {
                                                                        $('#categoryId').parent('div').addClass('has-error');
                                                                        $('#categoryId').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    var okay = -1;
                                                                    $(".subCategoryId").each(function () {
                                                                        if ($(".subCategoryId").is(':checked'))
                                                                        {
                                                                            okay = 1;
                                                                        }
                                                                    });
                                                                    if (okay === -1)
                                                                    {
                                                                        $('#subCategoryId').parent('div').addClass('has-error');
                                                                        $('#subCategoryId').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }

                                                                    var expertMembershipNumber = $("#expertMembershipNumber").val();
                                                                    if ($.trim(expertMembershipNumber) === "")
                                                                    {
                                                                        $('#expertMembershipNumber').parent('div').addClass('has-error');
                                                                        $('#expertMembershipNumber').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }

                                                                    var expertProfessionalCareerStartYear = $("#expertProfessionalCareerStartYear").val();
                                                                    if ($.trim(expertProfessionalCareerStartYear) === "")
                                                                    {
                                                                        $('#expertProfessionalCareerStartYear').parent('div').addClass('has-error');
                                                                        $('#expertProfessionalCareerStartYear').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    var expertInstitueName = $("#expertInstitueName").val();
                                                                    if ($.trim(expertInstitueName) === "")
                                                                    {
                                                                        $('#expertInstitueName').parent('div').addClass('has-error');
                                                                        $('#expertInstitueName').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    if (document.getElementById('termsAndCondition').checked)
                                                                    {
                                                                    } else
                                                                    {
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    if (fflag == 1)
                                                                    {
                                                                        return true;
                                                                        alert("success");
                                                                    }
                                                                }
//  To fetch the subcategory details based on the category id
                                                                function fetchSubCategoryDetails(categoryId)
                                                                {
                                                                    if (categoryId > 0)
                                                                    {
                                                                        $.ajax({
                                                                            url: "<?php echo base_url(); ?>Ajaxcalls/fetchSubCategoryDetails",
                                                                            type: 'POST',
                                                                            data: {'categoryId': categoryId},
                                                                            success: function (subCategoryDetails) {
                                                                                var subCatgoryData = JSON.parse(subCategoryDetails);
                                                                                var checkboxes = '';
                                                                                $.each(subCatgoryData, function (i, item) {
                                                                                    checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" id = "subCategoryId" class="subCategoryId" name="subCategoryId[]" value=' + subCatgoryData[i].subCategoryId + '>' + subCatgoryData[i].subCategoryName + '</label></div>';
                                                                                });
                                                                                document.getElementById('subCat').innerHTML = checkboxes;
                                                                            }});
                                                                    } else
                                                                    {
                                                                        document.getElementById('subCat').innerHTML = "";
                                                                    }

                                                                }
                                                                function checkEmailId(emailId)
                                                                {
                                                                    $.ajax({
                                                                        url: "<?php echo base_url(); ?>Ajaxcalls/checkEmployeeEmailId",
                                                                        type: 'POST',
                                                                        data: {'emailId': emailId,'userType':'Employee'},
                                                                        success: function (response) {
                                                                            var verifyResult = JSON.parse(response);
                                                                            if (verifyResult.verificationResult !== 0)
                                                                            {
                                                                                $('#expertEmailId').parent('div').addClass('has-error');
                                                                                $("#expertEmailId").focus();
                                                                                $("#emailError").modal('show');
                                                                                return false;
                                                                            }
                                                                        }
                                                                    });
                                                                }
        </script> 
        <?php include('ExpertLoginPopUp_view.php'); ?>
        <?php include('EmailErrorPopUp_view.php'); ?>
    </body>
</html>