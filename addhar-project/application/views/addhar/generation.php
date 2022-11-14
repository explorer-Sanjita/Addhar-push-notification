<?php $this->load->view('addhar/header'); ?>
<div id="breadcrumb" class="tjbase-breadcrumb" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="tjbase-module breadcrumb-style col-xs-12" id="tjmod-335">
				<div class="module-content">
					<ul itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb breadcrumb-style col-xs-12">
						<li class="active">
							<span class="divider icon-location"></span>
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" href="#" class="pathway"><span itemprop="name">About your ADDhar</span></a>

							<span class="divider">
								<img src="../../media/system/images/arrow.png" alt="" /> </span>
							<meta itemprop="position" content="2">
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
							<span itemprop="name">
								ADDhar Generation </span>
							<meta itemprop="position" content="3">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="main-content" class="tjbase-mainbodyblock  parentid-2376  com_content view-article ">
	<div class="container">
		<div id="mainbody" class="row tjbase-mainbody">
			<div id="maincontent" class="col-xs-12 col-sm-12" role="main">
				<div class="col-10 pull-left">
					<script type="text/javascript">
						;
						(function($) {
							$.fn.sharePopup = function(e, intWidth, intHeight, blnResize) {

								// Prevent default anchor event
								e.preventDefault();

								// Set values for window
								intWidth = intWidth || '500';
								intHeight = intHeight || '400';
								strResize = (blnResize ? 'yes' : 'no');

								// Set title and open popup with focus on it
								var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
									strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
									objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
							}

							$(document).ready(function($) {
								$('.contentshare').on("click", function(e) {
									$(this).sharePopup(e);
								});
							});

						}(jQuery));
					</script>
					<div class="itempage">
						<div class="cs-top-gradient"></div>
						<div class="item-page" itemscope itemtype="https://schema.org/Article">
							<meta itemprop="inLanguage" content="en-GB" />
							<div class="page-header">
							</div>
							<div class="fields-container search-result-design">
							</div>
							<div itemprop="articleBody">
								<h1 class="content-heading">
									ADDhar generation &amp; issue </h1>
								<p>ADDhar Generation involves process like quality check, packet validation,
									demographic and biometric de-duplication etc. ADDhar is generated
									successfully only if:</p>
								<ul>
									<li><span class="li-text">Quality of enrolment data meets prescribed
											standards laid down by UIDAI.</span></li>
									<li><span class="li-text">The enrolment packet passes all the validations
											done in CIDR</span></li>
									<li><span class="li-text">No Demographic/Biometric duplicate is found</span>
									</li>
								</ul>
								<p>If any of the above conditions is not satisfied, then ADDhar number will not
									be issued and the enrolment gets rejected. The processes leading to ADDhar
									generation are explained below.</p>
								<h2>Uploading resident’s Data to CIDR</h2>
								<p>Each resident enrolment is in a form of software packet which gets encrypted
									after completion of enrolment in the client itself and is uploaded to the
									central ID repository (CIDR) using the upload client provided to the
									Enrolment Agencies by UIDAI. The uploaded packet records are maintained in
									the client software to prevent duplicate packets being uploaded to the
									server, thus saving the processing time as well as packet rejection. All the
									data transfer to the server is performed using secured file transfer
									Protocol and so there is no chance of leakage of data to any unauthorised
									agency. The documents received from resident are also scanned and becomes
									part of enrolment packet which is uploaded to CIDR.</p>
								<p><b>CIDR Sanity Checks:</b> Each enrolment packet is exhaustively checked for
									validity – checksums, packet meta data, etc. – in the CIDR DMZ using
									automated process before it is moved to the production zone of CIDR for
									processing.</p>
								<p><b>Data Archival:</b> In CIDR, the contents of packet are read and stored in
									a table before archiving to ensure that the data is kept securely. The
									archival system has the following requirements:</p>
								<ul>
									<li><span class="li-text">All original packets (enrolments, updates, etc.)
											are required to be archived as-is, and “forever”, ensuring high
											availability, and zero data loss</span></li>
									<li><span class="li-text">Archived packet is kept securely and separated
											from core enrolment and authentication systems.</span></li>
									<li><span class="li-text">Archival system may allow on-demand data retrieval
											with appropriate access control and approvals. </span></li>
									<li><span class="li-text">Regular back up of Archived data is taken to
											ensure zero data loss. </span></li>
								</ul>
								<h2>Main Processing Pipeline</h2>
								<p>After the sanity checks pass, the enrolment packet is passed onto the main
									processing pipeline. At a high level, this includes the following stages:
								</p>
								<p><b>Automated Data Validation: </b>Following validation checks are done in
									CIDR for demographic data</p>
								<ul>
									<li><span class="li-text">Name &amp; Address validations </span></li>
									<li><span class="li-text">Language Validations </span></li>
									<li><span class="li-text">Pincode and Administrative regions </span></li>
									<li><span class="li-text">Operator, Supervisor, Introducer Validations
										</span></li>
									<li><span class="li-text">Other Data &amp; Process Validations </span></li>
								</ul>
								<p><b>Demographic De-duplication: </b>Demographic de-duplication is used
									primarily to catch trivial duplicates (non-fraudulent cases where all the
									demographic fields are identical) that are inadvertently submitted to the
									system, e.g., when a resident has not received ADDhar number few days after
									enrolment and decides to re-enrol at an enrolment station again. It is also
									used to de-duplicate children under the age of 5 year as biometrics data is
									not captured for children as per UIDAI policy. The goal of demographic
									de-duplication is to filter these cases and hence reduce the number of
									trivial duplicates going for biometric de-duplication.</p>
								<p><b>Manual Quality Checks: </b>Enrolment packets are sent for manual quality
									checks, where various quality check operators check the data for demographic
									and photo quality issues. This includes sanity tests against the resident
									photo – existence of human image, gross errors in gender and age, gender and
									photo mismatch as well as issues with the captured data (eg. transliteration
									errors).</p>
								<p><b>Biometric De-duplication:</b> Once a packet passes all validations, and
									demographic checks, it is sent to the biometrics sub-system for biometric
									de-duplication. Automated Biometric Identification System ( ABIS) systems
									from 3 different vendors are used to ensure the highest levels of accuracy
									and performance. The vendors are incentivised based on their accuracy and
									performance to ensure that they continue to improve the performance of their
									systems. These vendors are provided with resident’s anonymized biometrics
									along with a reference number (generated in CIDR) without disclosing
									identity of the residents. The ABIS system compares the resident’s
									biometrics with all existing biometrics in their gallery to find duplicates,
									if any.</p>
								<p><b>Manual Adjudication: </b>All duplicates identified by ABIS systems are
									sent to the adjudication module. The purpose of this module is to ensure no
									resident’s enrolment is rejected due to potential false matches of the ABIS
									systems.</p>
								<h2>ADDhar Issuance</h2>
								<p>ADDhar number is allotted after determining the uniqueness of the resident.
									The resident’s demographics data is associated with this ADDhar number and
									so it can be used as an identity proof. This information is also sent to the
									authentication systems, so that resident authentication can be performed
									successfully.</p>
								<h2>ADDhar Letter Delivery</h2>
								<p>After ADDhar generation, the data is shared with print partner. The print
									partner is responsible for printing the letter (including tracking
									information), and delivering it to the logistics partner. The logistics
									partner (India Post) is then responsible for the delivery of the physical
									letter to the resident.</p>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						window.addEventListener('load', function() {
							if (!navigator.share) {
								jQuery('.mobileshare').hide();
								jQuery('.webshare').show();
							} else {
								jQuery('.mobileshare').show();
								jQuery('.webshare').hide();

								document.getElementById('sharebtn').addEventListener('click', function() {
									navigator.share({
										title: "ADDhar generation & issue",
										text: "ADDhar Generation involves process like quality check, packet validation, demographic and biometric de-duplication etc. ADDhar is generated successf",
										url: "https://uidai.gov.in/my-ADDhar/about-your-ADDhar/ADDhar-generation.html"
									});
								});
							}
						});
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('addhar/footer'); ?>